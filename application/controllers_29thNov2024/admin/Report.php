<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

use PaypalPayoutsSDK\Core\PayPalHttpClient;
use PaypalPayoutsSDK\Core\SandboxEnvironment;
use PaypalPayoutsSDK\Payouts\PayoutsPostRequest;
class Report extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->Adminmodel->loggedIn();
	}

    public function index()
	{
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Payment Report',
			'subpage' => 'payment_report',
		);
      
        $where = "(subscription IS NULL OR subscription = 'Paid') AND payment_type = '2'";
        $data['transaction'] = $this->Adminmodel->get_all_record('id, user_name, user_id, sub_id, event_id, order_id, tran_id, amount, payment_type, start_date, end_date, currency, status, paid_by_admin, payment_mode', 'transaction', $where, array('id', 'DESC'), '');
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/payment_report');
		$this->load->view('admin/footer');
	}
	
	function tran_delete($id){
		if(empty($id)){
		    return false;
		}
		$result = $this->db->query('delete from transaction where id = '.$id.'');
		if($result){
			$msg = '["Transaction is deleted successfully.", "success", "#A5DC86"]';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/transaction'),'refresh');
		}else{
			$msg = 'error';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/transaction'),'refresh');
		}
	}
	
	function get_paypal_email(){
		if(!empty($this->input->post('eventid'))){
			$eventid = $this->input->post('eventid');
			$event_info = $this->db->query("select user_id from event where event_id = ".@$eventid."")->row();
			$get_paypal_email = $this->db->query("select email, user_id from paypal_payout_verified_email where user_id = ".@$event_info->user_id."")->row();
			
			if(!empty($get_paypal_email)){
				$response['status'] = 1;
				$response['email'] = $get_paypal_email->email;
				$response['host_id'] = $get_paypal_email->user_id;
			}else{
				$response['status'] = 0;
				$response['email'] = '';
				$response['host_id'] = '';
			}
		}
		echo json_encode($response);
	}
	
	function paypalpayout(){
		require_once APPPATH.'third_party/paypal_payout/vendor/autoload.php';
		$clientId = "AaGztJn1WXb-6YV20wy2ccDOg5rl8561u-ype_05_o2rMqmwAxpw2Pt5U_Jp9Oh7XGOQVhrkVeNLGOGh";
		$clientSecret = "EN796nVhXcmAZXL7yfDKugynBrrXoTTYIAfPL-R4yM-7yMcsPf0WWYj1JN0NPd7V4L60uNBwHg9vlCL9";
		//$client_id = 'AaGztJn1WXb-6YV20wy2ccDOg5rl8561u-ype_05_o2rMqmwAxpw2Pt5U_Jp9Oh7XGOQVhrkVeNLGOGh';
		//$secrete_id = 'EN796nVhXcmAZXL7yfDKugynBrrXoTTYIAfPL-R4yM-7yMcsPf0WWYj1JN0NPd7V4L60uNBwHg9vlCL9';
		if(!empty($this->input->post('email'))){
			$email = $this->input->post('email');
			$amount = $this->input->post('amount');
			$host_id = $this->input->post('host_id');
			$guest_id = $this->input->post('guest_id');
			$tran_id = $this->input->post('tran_id');
			$sender_item_id = "Test_txn_".$this->generate_otp(6);
			$environment = new SandboxEnvironment($clientId, $clientSecret);
			$client = new PayPalHttpClient($environment);
			
			$request = new PayoutsPostRequest();
			$body= json_decode(
				'{
					"sender_batch_header":
					{
					   "email_subject": "Payouts txn"
					},
					"items": [
					{
						"recipient_type": "EMAIL",
						"receiver": "'.$email.'",
						"note": "Your event payout",
						"sender_item_id": "'.$sender_item_id.'",
						"amount":
						{
							"currency": "USD",
							"value": "'.$amount.'"
						}
					}]
				}',             
				true
			);
			$request->body = $body;
			//$client = PayPalClient::client();
			$response = $client->execute($request);
			if(!empty($response)){
				$batchId = $response->result->batch_header->payout_batch_id;
				$data = array('tran_id' => $tran_id, 'guest_id' => $guest_id, 'host_id' => $host_id, 'email' => $email, 'amount' => $amount, 'status' => 'success', 'sender_item_id' => $sender_item_id, 'batch_id' => $batchId);
				$result = $this->Adminmodel->add('payout_report', $data);
				if(!empty($result)){
					$response_1['status'] = 1;
					$response_1['message'] = 'Payout is successfully sent.';
				}else{
					$response_1['status'] = 0;
					$response_1['message'] = 'Some error ocure, Please try again.';
				}
			}
			echo json_encode($response_1);
			// print "Status Code: {$response->statusCode}\n";
			// print "Status: {$response->result->batch_header->batch_status}\n";
			// print "Batch ID: {$response->result->batch_header->payout_batch_id}\n";
			// print "Links:\n";
			// foreach($response->result->links as $link)
			// {
			// print "\t{$link->rel}: {$link->href}\tCall Type: {$link->method}\n";
			// }
			// echo json_encode($response->result, JSON_PRETTY_PRINT), "\n";
		}
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
	
	function view($id){
		if(empty($id)){
			return false;
		}
		
		$data = array(
			'title' => 'Made to Split',
			'page' => 'View Payment Report',
			'subpage' => 'payment_report',
		);
		
		$where = "id = ".@$id."";
        $data['result'] = $this->Adminmodel->get_all_record('*', 'transaction', $where, array('id', 'DESC'), '');
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/view_payment_report');
		$this->load->view('admin/footer');
	}
}	