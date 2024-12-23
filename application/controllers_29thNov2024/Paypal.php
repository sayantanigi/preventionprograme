<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Paypal extends CI_Controller {

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
		$this->load->library('paypal_lib'); 

	} 
	
	function index(){
		
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
		$data['event_id'] = $event_id;
		$data['user'] = $this->Mymodel->get_single_row_info('fname, lname, email, address', 'users', 'id = '.@$userId.' and status = "1"', '', 1);
		$this->load->view('header', $data);
		$this->load->view('account/paypal_payment');
		$this->load->view('footer');
	}
	function payment(){
		//$this->session->set_userdata('is_login', true);
        //$this->session->set_userdata('loguserId', $this->session->userdata('loguserId'));
		$userId = $this->session->userdata('loguserId');
		$event_id = $this->input->post('event_id');
		$event = $this->Mymodel->get_single_row_info('event_name', 'event', 'event_id = '.$event_id.' and status = "1"', '', 1);
		$event_name = $event->event_name;
		$item_number =  "TEST_".$this->generate_otp(6);
		$price = $this->input->post('card_amount_1');
		$payment_in = $this->input->post('payment_in');
		
		
		// Set variables for paypal form 
		$returnURL = base_url().'paypal/success'; //payment success url 
		$cancelURL = base_url().'paypal/cancel'; //payment cancel url 
		$notifyURL = base_url().'paypal/ipn'; //ipn url 
		
		 // Add fields to paypal form 
        $this->paypal_lib->add_field('return', $returnURL); 
        $this->paypal_lib->add_field('cancel_return', $cancelURL); 
        $this->paypal_lib->add_field('notify_url', $notifyURL); 
        $this->paypal_lib->add_field('item_name', @$event_name); 
        $this->paypal_lib->add_field('custom', $userId); 
        $this->paypal_lib->add_field('item_number',  $item_number); 
        $this->paypal_lib->add_field('amount',  $price); 
        //$this->paypal_lib->add_field('event_id',  $event_id); 
        $this->session->set_userdata('pay_event_id', $event_id);
        $this->session->set_userdata('payment_in', $payment_in);
        // Render paypal form 
        $this->paypal_lib->paypal_auto_form();
	}
	
	function success(){ 
       // $join_date = !empty($this->session->userdata('joining_date')) ? $this->session->userdata('joining_date') : ''; 
		// $today_date = date('Y-m-d');
		// $expiry_date = date('Y-m-d',strtotime('+30 days',strtotime($today_date))) . PHP_EOL;
		// $data = array();
        //get the transaction data
        $paypalInfo = $this->input->post();
		//print_r($paypalInfo);die;
		if(!empty($paypalInfo)){
			
			$user_id = $paypalInfo['custom'];
			$order_id    = $paypalInfo["item_number"];
			$txn_id    = $paypalInfo["txn_id"];
			$amount = $paypalInfo["mc_gross"];
			$currency_code = $paypalInfo["mc_currency"];
			$payer_email = $paypalInfo["payer_email"];
			
			if($paypalInfo["payment_status"] == 'Completed'){
				$status = 'succeeded';
			}else{
				$status = 'failed';
			}
			
			$created_at    = date('Y-m-d H:m:i');
			$payment_type    = 2;
			$payment_mode    = 2;
			$address = $paypalInfo["address_street"] .', '. $paypalInfo["address_city"] .', '. $paypalInfo["address_state"] .', '. $paypalInfo["address_country_code"];
			$event_id = !empty($this->session->userdata('pay_event_id')) ? $this->session->userdata('pay_event_id') : '';
			$user_name = $paypalInfo["first_name"] .' '. $paypalInfo["last_name"];
			$zipcode = $paypalInfo["address_zip"];
			$country = $paypalInfo["residence_country"];
			$state = $paypalInfo["address_state"];
			$city = $paypalInfo["address_city"];
			$paid_by_admin = 1;
			$payment_in = !empty($this->session->userdata('payment_in')) ? $this->session->userdata('payment_in') : '';
			$payer_id = $paypalInfo["payer_id"];
		    
			
			$data = array(
				'user_name' => $user_name,
				'user_id' => $user_id,
				'event_id' => $event_id,
				'order_id' => $order_id,
				'tran_id' => $txn_id,
				'address' => $address,
				'country' => $country,
				'state' => $state,
				'city' => $city,
				'zipcode' => $zipcode,
				'amount' => $amount,
				'payment_type' => $payment_type,
				'currency' => $currency_code,
				'status' => $status,
				'paid_by_admin' => $paid_by_admin,
				'payment_in' => $payment_in,
				'payment_mode' => $payment_mode,
				'payer_email' => $payer_email,
				'created_at' => $created_at
			);
			$result = $this->Mymodel->add('transaction', $data);
			
			if($result){
				$msg = '<p>Your event payment has been successfully completed.<br>Transaction Id : '.@$txn_id.'</p>';
				$this->session->set_flashdata('msg', $msg);
				redirect(base_url('event/details?eId='.base64_encode(@$event_id).''));
			}
		}
        //pass the transaction data to view
       // $this->load->view('success', $data); 
    }

	function ipn(){ 
		//$join_date = !empty($this->session->userdata('joining_date')) ? $this->session->userdata('joining_date') : ''; 
		//$today_date = date('Y-m-d');
		//$expiry_date = date('Y-m-d',strtotime('+30 days',strtotime($today_date))) . PHP_EOL;
		//paypal return transaction details array
		$paypalInfo    = $this->input->get();
		//print_r( $paypalInfo);die;
		$paypalURL = $this->paypal_lib->paypal_url;
		$result    = $this->paypal_lib->curlPost($paypalURL, $paypalInfo);
		//check whether the payment is verified
		if (preg_match("/VERIFIED/i", $result)) {
		}
		//insert the transaction data into the database
			
    }
	
	function login(){
		
			die;
			// $event_id = base64_decode(@$_GET['eId']);
			// $this->session->set_userdata('for_paypal_eventid', $event_id);
			// $return_url = 'http://127.0.0.1/madetosplit/paypal/login';
			// $client_id = 'AaGztJn1WXb-6YV20wy2ccDOg5rl8561u-ype_05_o2rMqmwAxpw2Pt5U_Jp9Oh7XGOQVhrkVeNLGOGh';
			// $url ='https://www.sandbox.paypal.com/connect/?flowEntry=static&client_id='.$client_id.'&scope=email&redirect_uri='.$return_url.'';
			// redirect($url);
		
	}
	 	
	function version(){
    echo CI_VERSION;

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
}