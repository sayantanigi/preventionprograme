<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Payment extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mymodel');
		$this->Mymodel->loggedIn();
		$this->session->keep_flashdata('host_not_connect_stripe');
	} 
	public function index()
	{
		if(empty(@$_GET['subId'])){
			return false;
		}
		
		if(empty(@$_GET['uId'])){
			return false;
		}
		
		if(empty(@$_GET['amo'])){
			return false;
		}
		
		
		
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			/*$days = '120 Days';
			echo $endDate = date('Y-m-d',strtotime(''.$days.'',strtotime(date('Y-m-d')))) . PHP_EOL;die;*/
			
			/*$checksub_beforeexpire = $this->Mymodel->checksubBefore_expied($this->session->userdata('loguserId'));
			$date_1 = date_create(date('Y-m-d'));
			$date_2 = date_create($checksub_beforeexpire->end_date);
			$diff = date_diff($date_1,$date_2);
			$sub_remaining_days = $diff->format("%a");
			$date = $this->get_expire_date('1-Month', $sub_remaining_days);
			print_r($date);die;*/
			
			require APPPATH . '/libraries/stripe-php/init.php';
			$this->form_validation->set_rules('stripeToken', 'stripeToken', 'trim|required');
			$this->form_validation->set_rules('card_name', 'Name of Card Holder', 'trim|required');
			$this->form_validation->set_rules('card_amount', 'Amount', 'trim|required');
			$this->form_validation->set_rules('card_sub_id', 'Card Subscription Id', 'trim|required');
			$this->form_validation->set_rules('card_number', 'Card Number', 'trim|required');
			$this->form_validation->set_rules('card_expiry_month', 'Month', 'trim|required');
			$this->form_validation->set_rules('card_expiry_year', 'Year', 'trim|required');
			$this->form_validation->set_rules('card_cvc', 'CVC', 'trim|required');
            if($this->form_validation->run() == true){ 
			
				$stripeToken = $this->input->post('stripeToken');
				$cardholder = strip_tags($this->input->post('card_name'));
				$amount = strip_tags($this->input->post('card_amount_1'));
				$sub_id = strip_tags($this->input->post('card_sub_id'));
				$card_number = strip_tags($this->input->post('card_number'));
				$expiry_month = strip_tags($this->input->post('card_expiry_month'));
				$expiry_year = strip_tags($this->input->post('card_expiry_year'));
				$cvc = strip_tags($this->input->post('card_cvc'));
				$user_id = strip_tags($this->input->post('card_user_id'));
				$email = strip_tags($this->input->post('card_email'));
				$country = strip_tags($this->input->post('card_country'));
				$state = strip_tags($this->input->post('card_state'));
				$city = strip_tags($this->input->post('card_city'));
				$zipcode = strip_tags($this->input->post('card_zipcode'));
				$address = strip_tags($this->input->post('card_address'));
				
				
				$stripe = array(
				"secret_key"      => "sk_test_51MPhgSIuZrwn6gWgucZ3pq3OGKnLaQMxviXsKtZb4F7tenDBs25KovJkAB4tii3db6CMW1tdWSk2CB9thQ8yOYdX00iUs05KRN",
				"publishable_key" => "pk_test_51MPhgSIuZrwn6gWggTu5pxq41l6ZODzSg2zZ1kjKynv3yR61OZDey3AcNm2iwioDVJqSuJ3TCXJCdOAJn1VaNfyk00QkWY7DPT"
				); 
				\Stripe\Stripe::setApiKey($stripe['secret_key']);
				
				
				$customer = \Stripe\Customer::create(array(
					'email' => @$email,
					'source'  => $stripeToken
				));
				
				$sub = $this->Mymodel->get_single_row_info('name, duration, invitation_limit', 'subscription', 'id = '.$sub_id.' and status = "1"', '', 1);
				$itemName = @$sub->name;
				$itemNumber = "Test_ITEM".$this->generate_otp(6);
				$itemPrice = $amount * 100;
				$currency = "USD";
				$orderID = "TEST_".$this->generate_otp(6);
				$duration = explode('-', $sub->duration);
				$planInterval = strtolower($duration[1]);
				$interval_count = $duration[0];
				// Create a plan 
				try { 
					$plan = \Stripe\Plan::create(array( 
					"product" => [ 
					    "name" => $itemName 
					], 
						"amount" => $itemPrice, 
						"currency" => $currency, 
						"interval" => @$planInterval, 
						"interval_count" => @$interval_count 
					)); 
				}catch(Exception $e) { 
				    $api_error = $e->getMessage(); 
				} 
				if(empty($api_error) && $plan){ 
				    // Creates a new subscription 
					try { 
						$subscription = \Stripe\Subscription::create(array( 
							"customer" => $customer->id, 
							"items" => array( 
								array( 
									"plan" => $plan->id, 
								), 
							), 
						)); 
					}catch(Exception $e) { 
						$api_error = $e->getMessage(); 
					} 
					
					if(empty($api_error) && $subscription){ 
					    $subsData = $subscription->jsonSerialize();
					    if($subsData['status'] == 'active'){
							
							$subscrID = $subsData['id']; 
							$custID = $subsData['customer']; 
							$planID = $subsData['plan']['id']; 
							$planAmount = ($subsData['plan']['amount']/100); 
							$planCurrency = $subsData['plan']['currency']; 
							$planinterval = $subsData['plan']['interval']; 
							$planIntervalCount = $subsData['plan']['interval_count']; 
							$created = date("Y-m-d H:i:s", $subsData['created']); 
							$current_period_start = date("Y-m-d H:i:s", $subsData['current_period_start']); 
							$current_period_end = date("Y-m-d H:i:s", $subsData['current_period_end']); 
							$paymentStatus = 'succeeded'; 
							
							$ordStatus = 'success'; 
							$statusMsg = 'Your Subscription Payment has been Successful!'; 
							
							
							$checksub_beforeexpire = $this->Mymodel->checksubBefore_expied($this->session->userdata('loguserId'));
							if(!empty($checksub_beforeexpire)){
								$date_1 = date_create(date('Y-m-d'));
								$date_2 = date_create($checksub_beforeexpire->end_date);
								$diff = date_diff($date_1,$date_2);
								$sub_remaining_days = $diff->format("%a");
								//$end_date = $this->get_expire_date(@$sub->duration, $sub_remaining_days);
								//print_r($end_date);die;
								$subDays = $sub_remaining_days . 'Days';
								$sub_end_date = date("Y-m-d", $subsData['current_period_end']);
								$end_date = date('Y-m-d',strtotime(''.$subDays.'',strtotime($sub_end_date))) . PHP_EOL;
								$sub_renue_end_date = date("Y-m-d", $subsData['current_period_end']);
								$extractDuration = explode('-', $sub->duration);
								$totalInvitation = $extractDuration[0] * $sub->invitation_limit;
								
								$previousInvi= $this->Mymodel->get_single_row_info('total_invitation', 'users', 'id = '.$user_id.' and status = "1"', '', 1);
								if(!empty($previousInvi->total_invitation)){
									$preIn = $previousInvi->total_invitation;
								}else{
									$preIn = 0;
								}
								$allTotalIn = $totalInvitation + $preIn;
								$update_query = $this->db->query("update users set total_invitation = '".$allTotalIn."', invitation_limit = '".$sub->invitation_limit."' where id = ".@$user_id."");
							}else{
								//$end_date = $this->end_date(@$sub->duration);
								$end_date = date("Y-m-d", $subsData['current_period_end']);
								$sub_renue_end_date = date("Y-m-d", $subsData['current_period_end']);
								$extractDuration = explode('-', $sub->duration);
								$totalInvitation = $extractDuration[0] * $sub->invitation_limit;
								
								$update_query = $this->db->query("update users set total_invitation = '".$totalInvitation."', invitation_limit = '".$sub->invitation_limit."' where id = ".@$user_id."");
							}
							
							$tran_data = array(
								'user_name' => $cardholder, 'user_id' => $user_id, 'sub_id' => $sub_id, 'order_id' => $orderID, 'tran_id' => $subscrID, 'card_number' => $card_number, 'card_exp_month' => $expiry_month, 'card_exp_year' => $expiry_year, 'address' => $address, 'country' => $country, 'state' => $state, 'city' => $city, 'zipcode' => $zipcode, 'amount' => $amount, 'payment_type' => '1', 'start_date' => date('Y-m-d H:i:s'), 'end_date' => $end_date, 'status' => $paymentStatus, 'currency' => $planCurrency, 'created_at' => date('Y-m-d H:i:s'), 'auto_renew_status' => '1', 'sub_renue_end_date' => $sub_renue_end_date
							);
							$result = $this->Mymodel->add('transaction', $tran_data);
							if(!empty($result)){
								$update_query = $this->db->query("update users set sub_id = '".@$sub_id."', auto_renew_status = '1' where id = ".@$user_id."");
								
								$msg = '<p>Your subscription payment has been successfully completed. Now you can create an event.<br>Transaction Id : '.@$subscrID.'</p>';
								$this->session->set_flashdata('msg', $msg);
								redirect(base_url('event/add'));
							}
						
					    }else{
						   $statusMsg = "Subscription activation failed!"; 
					    }
					 
					}else{
						$statusMsg = "Subscription creation failed! ".$api_error; 
					}
				}else{
					$statusMsg = "Plan creation failed! ".$api_error; 
				}			
			}
		}

		$data = array(
			'title' => 'Made to Split',
			'page' => 'Subscription Payment',
			'subpage' => 'payment',
		);
		
		$data['user'] = $this->Mymodel->get_single_row_info('fname, lname, email, address', 'users', 'id = '.base64_decode(@$_GET['uId']).' and status = "1"', '', 1);
		$data['subscription'] = $this->Mymodel->get_single_row_info('*', 'subscription', 'id = '.base64_decode(@$_GET['subId']).' and status = "1"', '', 1);
		$this->load->view('header', $data);
		$this->load->view('account/sub_payment');
		$this->load->view('footer');
	}
	
	function get_expire_date($duration = '', $remainingDays = ''){
		$return = '';
		
		if($duration == '1-Month'){
			$subDays = 30 + $remainingDays . 'Days';
			$endDate = date('Y-m-d',strtotime(''.$subDays.'',strtotime(date('Y-m-d')))) . PHP_EOL;
		}elseif($duration == '2-Month'){
			$subDays = 60 + $remainingDays . 'Days';
			$endDate = date('Y-m-d',strtotime(''.$subDays.'',strtotime(date('Y-m-d')))) . PHP_EOL;
		}elseif($duration == '3-Month'){
			$subDays = 90 + $remainingDays . 'Days';
			$endDate = date('Y-m-d',strtotime(''.$subDays.'',strtotime(date('Y-m-d')))) . PHP_EOL;
		}elseif($duration == '4-Month'){
			$subDays = 120 + $remainingDays . 'Days';
			$endDate = date('Y-m-d',strtotime(''.$subDays.'',strtotime(date('Y-m-d')))) . PHP_EOL;
		}elseif($duration == '5-Month'){
			$subDays = 150 + $remainingDays . 'Days';
			$endDate = date('Y-m-d',strtotime(''.$subDays.'',strtotime(date('Y-m-d')))) . PHP_EOL;
		}elseif($duration == '6-Month'){
			$subDays = 180 + $remainingDays . 'Days';
			$endDate = date('Y-m-d',strtotime(''.$subDays.'',strtotime(date('Y-m-d')))) . PHP_EOL;
		}elseif($duration == '7-Month'){
			$subDays = 210 + $remainingDays . 'Days';
			$endDate = date('Y-m-d',strtotime(''.$subDays.'',strtotime(date('Y-m-d')))) . PHP_EOL;
		}elseif($duration == '8-Month'){
			$subDays = 240 + $remainingDays . 'Days';
			$endDate = date('Y-m-d',strtotime(''.$subDays.'',strtotime(date('Y-m-d')))) . PHP_EOL;
		}elseif($duration == '9-Month'){
			$subDays = 270 + $remainingDays . 'Days';
			$endDate = date('Y-m-d',strtotime(''.$subDays.'',strtotime(date('Y-m-d')))) . PHP_EOL;
		}elseif($duration == '10-Month'){
			$subDays = 300 + $remainingDays . 'Days';
			$endDate = date('Y-m-d',strtotime(''.$subDays.'',strtotime(date('Y-m-d')))) . PHP_EOL;
		}elseif($duration == '11-Month'){
			$subDays = 330 + $remainingDays . 'Days';
			$endDate = date('Y-m-d',strtotime(''.$subDays.'',strtotime(date('Y-m-d')))) . PHP_EOL;
		}elseif($duration == '12-Month'){
			$subDays = 360 + $remainingDays . 'Days';
			$endDate = date('Y-m-d',strtotime(''.$subDays.'',strtotime(date('Y-m-d')))) . PHP_EOL;
		}elseif($duration == '1-Year'){
			$subDays = 360 + $remainingDays . 'Days';
			$endDate = date('Y-m-d',strtotime(''.$subDays.'',strtotime(date('Y-m-d')))) . PHP_EOL;
		}elseif($duration == '2-Year'){
			$subDays = 720 + $remainingDays . 'Days';
			$endDate = date('Y-m-d',strtotime(''.$subDays.'',strtotime(date('Y-m-d')))) . PHP_EOL;
		}
		return $endDate;	
	}
	
	function end_date($duration = ''){
		
		if($duration == '1-Month'){
			$days = '30 Days';
			$endDate = date('Y-m-d',strtotime(''.$days.'',strtotime(date('Y-m-d')))) . PHP_EOL;
		}elseif($duration == '2-Month'){
			$days = '60 Days';
			$endDate = date('Y-m-d',strtotime(''.$days.'',strtotime(date('Y-m-d')))) . PHP_EOL;
		}elseif($duration == '3-Month'){
			$days = '90 Days';
			$endDate = date('Y-m-d',strtotime(''.$days.'',strtotime(date('Y-m-d')))) . PHP_EOL;
		}elseif($duration == '4-Month'){
			$days = '120 Days';
			$endDate = date('Y-m-d',strtotime(''.$days.'',strtotime(date('Y-m-d')))) . PHP_EOL;
		}elseif($duration == '5-Month'){
			$days = '150 Days';
			$endDate = date('Y-m-d',strtotime(''.$days.'',strtotime(date('Y-m-d')))) . PHP_EOL;
		}elseif($duration == '6-Month'){
			$days = '180 Days';
			$endDate = date('Y-m-d',strtotime(''.$days.'',strtotime(date('Y-m-d')))) . PHP_EOL;
		}elseif($duration == '7-Month'){
			$days = '210 Days';
			$endDate = date('Y-m-d',strtotime(''.$days.'',strtotime(date('Y-m-d')))) . PHP_EOL;
		}elseif($duration == '8-Month'){
			$days = '240 Days';
			$endDate = date('Y-m-d',strtotime(''.$days.'',strtotime(date('Y-m-d')))) . PHP_EOL;
		}elseif($duration == '9-Month'){
			$days = '270 Days';
			$endDate = date('Y-m-d',strtotime(''.$days.'',strtotime(date('Y-m-d')))) . PHP_EOL;
		}elseif($duration == '10-Month'){
			$days = '300 Days';
			$endDate = date('Y-m-d',strtotime(''.$days.'',strtotime(date('Y-m-d')))) . PHP_EOL;
		}elseif($duration == '11-Month'){
			$days = '330 Days';
			$endDate = date('Y-m-d',strtotime(''.$days.'',strtotime(date('Y-m-d')))) . PHP_EOL;
		}elseif($duration == '12-Month'){
			$days = '360 Days';
			$endDate = date('Y-m-d',strtotime(''.$days.'',strtotime(date('Y-m-d')))) . PHP_EOL;
		}elseif($duration == '1-Year'){
			$days = '360 Days';
			$endDate = date('Y-m-d',strtotime(''.$days.'',strtotime(date('Y-m-d')))) . PHP_EOL;
		}elseif($duration == '2-Year'){
			$days = '720 Days';
			$endDate = date('Y-m-d',strtotime(''.$days.'',strtotime(date('Y-m-d')))) . PHP_EOL;
		}
		return $endDate;	
	}
	public function generate_otp($length)
	{
		$characters = '123456789';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++)
		{
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	
	function event(){
		if(empty(@$_GET['eId'])){
			return false;
		}
		
		if(empty(@$_GET['amo'])){
			return false;
		}
		
		 $event_id = base64_decode(@$_GET['eId']);
		$amount = base64_decode(@$_GET['amo']);
		 $userId = $this->session->userdata('loguserId');
		//$host_id = base64_decode(@$_GET['host']);
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Event Payment',
			'subpage' => 'payment',
		);
		
		$host = $this->Mymodel->get_single_row_info('stripe_acc_id', 'stripe_connected_acc', 'user_id = '.base64_decode(@$_GET['host']).'', '', 1);
		//print_r($host);die;
		if(!empty($host)){
			$host_stripe_acc_id = $host->stripe_acc_id;
		}else{
			$this->session->set_flashdata('host_not_connect_stripe', 'Sorry, the event host is not connected to a Stripe account. Please make payment offline.');
			redirect('event/details?eId='.base64_encode(@$event_id).'');
			return false;
		}
		
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			//print_r($_POST);die;
			require APPPATH . '/libraries/stripe-php/init.php';
			$this->form_validation->set_rules('stripeToken', 'stripeToken', 'trim|required');
			$this->form_validation->set_rules('card_name', 'Name of Card Holder', 'trim|required');
			$this->form_validation->set_rules('card_amount_1', 'Amount', 'trim|required');
			$this->form_validation->set_rules('card_number', 'Card Number', 'trim|required');
			$this->form_validation->set_rules('card_expiry_month', 'Month', 'trim|required');
			$this->form_validation->set_rules('card_expiry_year', 'Year', 'trim|required');
			$this->form_validation->set_rules('card_cvc', 'CVC', 'trim|required');
            if($this->form_validation->run() == true){
				//print_r($_POST);die;
				$stripeToken = $this->input->post('stripeToken');
				$cardholder = strip_tags($this->input->post('card_name'));
				$amount = strip_tags($this->input->post('card_amount_1'));
				$card_number = strip_tags($this->input->post('card_number'));
				$expiry_month = strip_tags($this->input->post('card_expiry_month'));
				$expiry_year = strip_tags($this->input->post('card_expiry_year'));
				$cvc = strip_tags($this->input->post('card_cvc'));
				$user_id = strip_tags($this->input->post('card_user_id'));
				$email = strip_tags($this->input->post('card_email'));
				$country = strip_tags($this->input->post('card_country'));
				$state = strip_tags($this->input->post('card_state'));
				$city = strip_tags($this->input->post('card_city'));
				$zipcode = strip_tags($this->input->post('card_zipcode'));
				$address = strip_tags($this->input->post('card_address'));
				$payment_in = strip_tags($this->input->post('payment_in'));
				
				$stripe = array(
					"secret_key"      => "sk_test_51MPhgSIuZrwn6gWgucZ3pq3OGKnLaQMxviXsKtZb4F7tenDBs25KovJkAB4tii3db6CMW1tdWSk2CB9thQ8yOYdX00iUs05KRN",
					"publishable_key" => "pk_test_51MPhgSIuZrwn6gWggTu5pxq41l6ZODzSg2zZ1kjKynv3yR61OZDey3AcNm2iwioDVJqSuJ3TCXJCdOAJn1VaNfyk00QkWY7DPT"
				); 
				\Stripe\Stripe::setApiKey($stripe['secret_key']);
				
				$customer = \Stripe\Customer::create(array(
					'email' => @$email,
					'source'  => $stripeToken
				));
                $event = $this->Mymodel->get_single_row_info('event_name', 'event', 'event_id = '.$event_id.' and status = "1"', '', 1);
				$itemName = @$event->name;
				$itemNumber = "Test_ITEM".$this->generate_otp(6);
				$itemPrice = $amount * 100;
				$currency = "USD";
				$orderID = "TEST_".$this->generate_otp(6);
				$payDetails = \Stripe\Charge::create(array(
						'amount'   => $itemPrice,
						'currency' => $currency,
						'customer' => $customer->id,
						'destination' => @$host_stripe_acc_id,
						'description' => $itemName,
						'metadata' => array(
						'order_id' => $orderID
					)
				)); 
				$paymenyResponse = $payDetails->jsonSerialize();
				
				if($paymenyResponse['amount_refunded'] == 0 && empty($paymenyResponse['failure_code']) && $paymenyResponse['paid'] == 1 && $paymenyResponse['captured'] == 1){
					$amountPaid = $paymenyResponse['amount'];
					$balanceTransaction = $paymenyResponse['balance_transaction'];
					$paidCurrency = $paymenyResponse['currency'];
					$paymentStatus = $paymenyResponse['status'];
					$paymentDate = date("Y-m-d H:i:s");
					if($paymentStatus == 'succeeded'){
						$tran_data = array(
					    	'user_name' => $cardholder, 'user_id' => $user_id, 'order_id' => $orderID, 'tran_id' => $balanceTransaction, 'card_number' => $card_number, 'card_exp_month' => $expiry_month, 'card_exp_year' => $expiry_year, 'address' => $address, 'country' => $country, 'state' => $state, 'city' => $city, 'zipcode' => $zipcode, 'amount' => $amount, 'payment_type' => '2', 'status' => $paymentStatus, 'currency' => $paidCurrency, 'event_id' => $event_id, 'payment_in' => $payment_in, 'created_at' => date('Y-m-d H:i:s')
						);
						$result = $this->Mymodel->add('transaction', $tran_data);
						if(!empty($result)){
							$update_query = $this->db->query("update event_invited_people set transaction = 'Paid' where email = '".@$email."' and event_id = ".@$event_id."");
							$msg = '<p>Your event payment has been successfully completed. Now you can create an event.<br>Transaction Id : '.@$balanceTransaction.'</p>';
							$this->session->set_flashdata('msg', $msg);
							redirect(base_url('event/details?eId='.@$_GET['eId'].''));
						}
						
					}
				} 
			}
		}
		$data['user'] = $this->Mymodel->get_single_row_info('fname, lname, email, address', 'users', 'id = '.@$userId.' and status = "1"', '', 1);
		$this->load->view('header', $data);
		$this->load->view('account/event_payment');
		$this->load->view('footer');
	}
	function paypal(){
		$event_name = 'test event';
		$userId = $this->session->userdata('loguserId');
		$item_number = 123;
		$price = 10;
		$this->load->library('paypal_lib'); 
		// Set variables for paypal form 
		$returnURL = base_url().'payment/success'; //payment success url 
		$cancelURL = base_url().'payment/cancel'; //payment cancel url 
		$notifyURL = base_url().'payment/ipn'; //ipn url 
		
		 // Add fields to paypal form 
        $this->paypal_lib->add_field('return', $returnURL); 
        $this->paypal_lib->add_field('cancel_return', $cancelURL); 
        $this->paypal_lib->add_field('notify_url', $notifyURL); 
        $this->paypal_lib->add_field('item_name', @$event_name); 
        $this->paypal_lib->add_field('custom', $userId); 
        $this->paypal_lib->add_field('item_number',  $item_number); 
        $this->paypal_lib->add_field('amount',  $price); 
         
        // Render paypal form 
        $this->paypal_lib->paypal_auto_form();
	}
	
	function new_pay(){
		$this->load->view('header');
		$this->load->view('account/sub_payment_new');
		$this->load->view('footer');
	}
	
	function stripeReturn(){
		if(!empty($_GET['userId'])){
			$useracc_info = $this->db->query("select * from stripe_connected_acc where user_id = ".$_GET['userId']."")->row();
			if(!empty($useracc_info)){
				$skey = 'sk_test_51MPhgSIuZrwn6gWgucZ3pq3OGKnLaQMxviXsKtZb4F7tenDBs25KovJkAB4tii3db6CMW1tdWSk2CB9thQ8yOYdX00iUs05KRN';
				if(!empty($useracc_info->stripe_acc_id)){
					$row = $this->get_stripe_info($useracc_info->stripe_acc_id, $skey);
					$get_data = json_decode($row);
					//print_r($get_data);die;
					if(!empty($get_data->payouts_enabled) AND !empty($get_data->charges_enabled) AND $get_data->payouts_enabled == 1 AND $get_data->charges_enabled == 1){
						$statusMsg = 'Your account is connected to stripe successfully.';
						$status = 'success';
						$userId = @$_GET['userId'];
						$stripeAccid = @$get_data->id;
						// echo "<br>Your account is connected to stripe successfully.<br>";
						// echo "UserId : "."".@$_GET['userId']."<br>";
						// echo "Stripe Account Id : "."".@$get_data->id."<br>";
						redirect(base_url("payment/stripeConnectStatus?statusMsg=".$statusMsg."&status=".$status."&stripeaccId=".$stripeAccid."&userId=".$userId.""),'refresh'); 
					}else{
						//echo 'Your account is not connected. Please try again.';
						$statusMsg = 'Your account is not connected. Please try again.';
						$status = 'fail';
						$userId = @$_GET['userId'];
						$stripeAccid = '';
						redirect(base_url("payment/stripeConnectStatus?statusMsg=".$statusMsg."&status=".$status."&stripeaccId=".$stripeAccid."&userId=".$userId.""),'refresh'); 
					}
				}else{
					//echo 'user stripe account id not found.';
					$statusMsg = 'user stripe account id not found.';
					$status = 'fail';
					$stripeAccid = '';
					$userId = @$_GET['userId'];
					redirect(base_url("payment/stripeConnectStatus?statusMsg=".$statusMsg."&status=".$status."&stripeaccId=".$stripeAccid."&userId=".$userId.""),'refresh'); 
				}
			}else{
				$statusMsg = 'user not found';
				//echo 'user not found.';
				$status = 'fail';
				$stripeAccid = '';
				$userId = @$_GET['userId'];
				redirect(base_url("payment/stripeConnectStatus?statusMsg=".$statusMsg."&status=".$status."&stripeaccId=".$stripeAccid."&userId=".$userId.""),'refresh'); 
			}
		}
	}
	function stripeConnectStatus(){
		echo "<br>".@$_GET['statusMsg']."<br>";
        echo "Status : "."<br>".@$_GET['status']."<br>";
        echo "Stripe Account Id : "."<br>".@$_GET['stripeaccId']."<br>";
        echo "UserId :"."<br>".@$_GET['userId'];
	}
	function get_stripe_info($stripe_acc_id = '', $skey = ''){
		$url = 'https://api.stripe.com/v1/accounts/'.@$stripe_acc_id.'';
		//$skey = 'sk_test_51MPhgSIuZrwn6gWgucZ3pq3OGKnLaQMxviXsKtZb4F7tenDBs25KovJkAB4tii3db6CMW1tdWSk2CB9thQ8yOYdX00iUs05KRN';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "".$url."");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($token_request_body));
		curl_setopt($ch, CURLOPT_POST, 1);
		$headers = array();
		$headers[] = "Content-Type: application/x-www-form-urlencoded";
		$headers[] = "Authorization: Bearer ".$skey."";
		//$headers[] = "client_secret: ".STRIPE_SECRET_KEY."";
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$result = curl_exec($ch);
		//print_r($result);
		return $result;
	}
	function paypalReturn(){
		echo $_SESSION['userid_paypal_connect'];die;
		if(!empty(@$_GET['code']) AND $_GET['scope'] == 'email'){
			$code =  @$_GET['code'];
			$scope = @$_GET['scope'];
			$client_id = 'AaGztJn1WXb-6YV20wy2ccDOg5rl8561u-ype_05_o2rMqmwAxpw2Pt5U_Jp9Oh7XGOQVhrkVeNLGOGh';
		    $secrete_id = 'EN796nVhXcmAZXL7yfDKugynBrrXoTTYIAfPL-R4yM-7yMcsPf0WWYj1JN0NPd7V4L60uNBwHg9vlCL9';
			$token = $this->get_access_token($client_id, $secrete_id, $code);
			$data = json_decode($token,true);
			
			if(!empty($data['access_token'])){
				
				echo $userId = $this->session->userdata('userid_paypal_connect');
				$access_token =  $data['access_token'];
				$host_identity = $this->event_host_identity($access_token);
				$data = json_decode($host_identity,true);
				print_r($data);die;
				$store = array('email' => $data['email'], 'user_id' => $userId, 'email_verified' => $data['email_verified'], 'verified' => $data['verified'], 'created_at' => date('Y-m-d H:i:s'), 'status' => '1', 'event_id' => $this->session->userdata('for_paypal_eventid'));
			    $result = $this->Mymodel->update_data('paypal_payout_verified_email', '*', 'user_id = '.$userId.'', $store);
				if(!empty($result)){
					
					//$this->session->set_flashdata('paypal_login_success', 'Your PayPal login has been successfully completed. We will make the event payment based on your PayPal email.');
					//redirect(base_url('event/details?eId='.base64_encode($this->session->userdata('for_paypal_eventid')).''));
					
					$statusMsg = 'Your PayPal login has been successfully completed. We will make the event payment based on your PayPal email.';
					$status = 'success';
					$verifiedEmail = $data['email_verified'];
					redirect(base_url("payment/paypalConnectStatus?statusMsg=".$statusMsg."&status=".$status."&verifiedEmail=".$verifiedEmail."&userId=".$userId.""),'refresh'); 
				}
			}else{
				$userId = $this->session->userdata('userid_paypal_connect');
				$statusMsg = 'access token is expired. please try go back on event details page and try again.';
				$status = 'fail';
				$verifiedEmail = '';
				redirect(base_url("payment/paypalConnectStatus?statusMsg=".$statusMsg."&status=".$status."&verifiedEmail=".$verifiedEmail."&userId=".$userId.""),'refresh'); 
					
				//echo 'access token is expired. please try go back on event details page and try again.';
			}
			
		}else{
			echo $userId = $this->session->userdata('userid_paypal_connect');
			$statusMsg = 'Some error occured, Please try again.';
			$status = 'fail';
			$verifiedEmail = '';
			redirect(base_url("payment/paypalConnectStatus?statusMsg=".$statusMsg."&status=".$status."&verifiedEmail=".$verifiedEmail."&userId=".$userId.""),'refresh'); 
		}
	}
	
	function event_host_identity($access_token = ''){
		$authorizationString = $access_token;
		$curl = curl_init();

		$data = array(
		CURLOPT_URL => "https://api-m.sandbox.paypal.com/v1/identity/openidconnect/userinfo?schema=openid",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_SSL_VERIFYPEER => false,

		CURLOPT_HTTPHEADER => array(
		"Authorization: Bearer ".$authorizationString,
		'Content-Type:application/x-www-form-urlencoded'
		)
		);
		curl_setopt_array($curl, $data);
		$response = curl_exec($curl);
		curl_close($curl);
		return $response;
	}
	function get_access_token($client_id = '', $secret_id = '', $code = ''){
		
		if(!empty($client_id) AND !empty($secret_id)){
			$authorizationString = base64_encode($client_id . ':' . $secret_id);
		}else{
			$authorizationString = '';
		}
		
		$curl = curl_init();
		$data = array(
		CURLOPT_URL => "https://api-m.sandbox.paypal.com/v1/oauth2/token",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_POSTFIELDS => http_build_query(array(
		'grant_type'=>'authorization_code',
		'code'=> $code,
		)),
		CURLOPT_HTTPHEADER => array(
		"Authorization: Basic ".$authorizationString,
		)
		//CURLOPT_USERPWD => $base_token
		);
		curl_setopt_array($curl, $data);
		$response = curl_exec($curl);
		curl_close($curl);
		return $response;
	}
	function paypalConnectStatus(){
		echo "<br>".@$_GET['statusMsg']."<br>";
        echo "Status : "."<br>".@$_GET['status']."<br>";
        echo "verifiedEmail : "."<br>".@$_GET['verifiedEmail']."<br>";
        echo "UserId :"."<br>".@$_GET['userId'];
	}
	
}