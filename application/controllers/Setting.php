<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	
	 public function __construct()
	{
		parent::__construct();
		$this->load->model('Mymodel');
		$this->Mymodel->loggedIn();
	}
	
	 public function index(){
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Settings',
			'subpage' => 'setting',
		);


		$userId = $this->session->userdata('loguserId');
		$query = $this->db->query("select * from users where status = '1' and id = ".@$userId." ORDER BY id DESC");
		$data['user'] = ($query->num_rows() > 0) ? $query->row() : FALSE;
		$this->load->view('header', $data);
		$this->load->view('account/setting');
		$this->load->view('footer');
	}
	
	function changepassword(){
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Change Password',
			'subpage' => 'changepassword',
		);
		
		$userId = $this->session->userdata('loguserId');
		$query = $this->db->query("select * from users where status = '1' and id = ".@$userId." ORDER BY id DESC");
		$data['user'] = ($query->num_rows() > 0) ? $query->row() : FALSE;
		$this->load->view('header', $data);
		$this->load->view('account/changepassword');
		$this->load->view('footer');
	}
	
	function customize_pay(){
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Customize Payment',
			'subpage' => 'customizepay',
		);
		
		$userId = $this->session->userdata('loguserId');
		
		$query = $this->db->query("select * from users where status = '1' and id = ".@$userId." ORDER BY id DESC");
		$data['user'] = ($query->num_rows() > 0) ? $query->row() : FALSE;
		
		$data['customize_payment'] = $this->Mymodel->get_single_row_info('customize_payment, auto_renew_status', 'users', 'id='.$userId.'', '', 1);
		$this->load->view('header', $data);
		$this->load->view('account/customize_payment');
		$this->load->view('footer');
	}
	
	function change_paystatus(){
		
		if ($this->input->post('userId')) {
			$userId = $this->input->post('userId');
			$status = $this->input->post('status');
			if ($status == 1) {
				$msg = 'Your customize payment status is active.';
			} else {
				$msg = 'Your customize payment status is inactive';
			}
			
			if ($this->Adminmodel->update(['customize_payment'=>$status], 'users', ['id'=>$userId])) {
				$response['status'] = 1;
				$response['message'] = $msg;
				
			} else {
				$response['status'] = 0;
				$response['message'] = 'Some error occured, Please try again!.';
			}
		}
	    echo json_encode($response);
	}
	
	function delete_account($id){
		if(empty($id)){
			return false;
		}
		$userinfo = $this->Mymodel->get_single_row_info('email, image', 'users', 'id='.@$id.'', '', 1);
		$delete_user_query = $this->db->query("delete from users where id = ".$id."");
		$delete_userevent_query = $this->db->query("delete from event where user_id = ".$id."");
		$delete_user_eventgallery_query = $this->db->query("delete from event_gallery where user_id = ".$id."");
		$delete_invitedpeople_query = $this->db->query("delete from event_invited_people where user_id = ".$id."");
		$delete_chat_query = $this->db->query("delete from chat where sender_id = ".$id."");
		$imagePath = base_url('uploads/profile/'.@$userinfo->image.'');
		unlink($imagePath);
		redirect(base_url('login/logout'));
		
	}
	function payment_method(){
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Payment Method',
			'subpage' => 'pay_method',
		);
		
		$userId = $this->session->userdata('loguserId');
		
		//$query = $this->db->query("select * from users where status = '1' and id = ".@$userId." ORDER BY id DESC");
		//$data['user'] = ($query->num_rows() > 0) ? $query->row() : FALSE;
		
		//$data['customize_payment'] = $this->Mymodel->get_single_row_info('customize_payment', 'users', 'id='.$userId.'', '', 1);
		
		$data['check_stripe_connect'] = $this->db->query("select * from stripe_connected_acc where user_id = ".@$userId."")->num_rows();
	    $data['check_paypal_connect'] = $this->db->query("select * from paypal_payout_verified_email where user_id = ".@$userId."")->num_rows();
	   
		$this->load->view('header', $data);
		$this->load->view('account/payment_method');
		$this->load->view('footer');
	}
	function disconnectstripe(){
		$userId = $this->session->userdata('loguserId');
		$result = $this->db->query("update stripe_connected_acc set user_id = 'null' where user_id = ".$userId."");
		if($result){
			$this->session->set_flashdata('disconnect', 'Your stripe connection is disconnect successfully.');
			redirect(base_url('setting/payment-method'));
		}
	}
	
	function disconnectpaypal(){
		$userId = $this->session->userdata('loguserId');
		$result = $this->db->query("update paypal_payout_verified_email set user_id = 'null' where user_id = ".$userId."");
		if($result){
			$this->session->set_flashdata('disconnect', 'Your paypal connection is disconnect successfully.');
			redirect(base_url('setting/payment-method'));
		}
	}
	function cancelSubscription(){
		$update = [];
			require APPPATH . '/third_party/stripe/vendor/autoload.php';
			$stripe = new \Stripe\StripeClient('sk_test_51MPhgSIuZrwn6gWgucZ3pq3OGKnLaQMxviXsKtZb4F7tenDBs25KovJkAB4tii3db6CMW1tdWSk2CB9thQ8yOYdX00iUs05KRN');
			if ($this->input->post('userId')) {
				$userId = $this->input->post('userId');
				$status = $this->input->post('status');
				if($status == '0'){
					$current_date = date("Y-m-d");
					$subscription = $this->db->query("select * from transaction where user_id = '".@$userId."' AND payment_type = '1' AND DATE(end_date) >= '".@$current_date."' AND auto_renew_status = '1'")->result();
                    if(!empty(@$subscription)){
						foreach($subscription as $k => $v){
							$subId = $v->tran_id;
							$id = $v->id;
							
							$subCancel = $stripe->subscriptions->cancel("$subId", []);
							$subsData = $subCancel->jsonSerialize();
							if($subsData['status'] == 'canceled'){
								$update[] = $this->db->query("update transaction set auto_renew_status = '0' where id = '".@$id."'");
								$this->db->query("update users set auto_renew_status = '0' where id = '".@$userId."'");
							}
					    }
						$response['status'] = 1;
						$response['message'] = 'Your auto renew subscription is canceled.';
					}else{
						$this->db->query("update users set auto_renew_status = '".$status."' where id = '".@$userId."'");
						$response['status'] = 1;
						$response['message'] = 'Your auto renew subscription is canceled.';
					}
					
				}else{
					$this->db->query("update users set auto_renew_status = '".$status."' where id = '".@$userId."'");
					$response['status'] = 1;
					$response['message'] = 'Your auto renew subscription is start.';
				}
			}else{
				$response['status'] = 0;
				$response['message'] = 'Some error occure, Please try again.';
			}
	    echo json_encode($response);
	}
}	
	