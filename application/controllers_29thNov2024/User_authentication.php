<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_authentication extends CI_Controller {

 public function __construct()
 {
  parent::__construct();
  	$this->load->model('Mymodel');
	//$this->load->library('session');
	$this->session->keep_flashdata('already_account');
	require_once APPPATH . "libraries/google/vendor/autoload.php";
 }

 function index()
 {
	$google_client = new Google_Client();
	$google_client->setClientId('281872522440-c6rapbmdlvntn3aec31hklss43c4q5l5.apps.googleusercontent.com'); //Define your ClientID
	$google_client->setClientSecret('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'); //Define your Client Secret Key
	$redirect = base_url().'user_authentication';
	$google_client->setRedirectUri($redirect); //Define your Redirect Uri
	$google_client->addScope('email');
	$google_client->addScope('profile');
	if(isset($_GET["code"]))
	{
		$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
		if(!isset($token["error"]))
		{
			$google_client->setAccessToken($token['access_token']);
			$this->session->set_userdata('access_token', $token['access_token']);
			$google_service = new Google_Service_Oauth2($google_client);
			$userProfile = $google_service->userinfo->get();
			//print_r($userProfile);die;
			$userData['oauth_provider'] = 'google'; 
			$userData['oauth_uid']      = $userProfile['id']; 
			$userData['fname'] =  !empty($userProfile['given_name']) ? $userProfile['given_name'] : '' ;
			$userData['lname']  =  !empty($userProfile['family_name']) ? $userProfile['family_name'] : '' ;
			$userData['email']      =  !empty($userProfile['email']) ? $userProfile['email'] : '' ;
			$userData['status']   = '1'; 
			$userData['email_verify_status']   = '1'; 
			$exist = $this->Mymodel->already_exist($userData['email']);
			
			if(!empty($exist)){
				if($exist->oauth_provider == 'google'){
					
				}else{
					$already_account =  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<p>You already have an account. Please sign in with the email and password you used when you signed up.</p>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>';
					$this->session->set_flashdata('already_account', $already_account);
					redirect(base_url('login'),'refresh');
					exit();
				}
			}
			
			$userID = $this->Mymodel->Google_Login($userData);
			if(!empty($userID)){ 
				$getResult = $this->db->query("select id from users where id = ".$userID."")->row();
				$this->session->set_userdata('is_login', true);
				$this->session->set_userdata('loguserId', @$getResult->id);
				if ($this->session->userdata('loguserId') && $this->session->userdata('is_login')) {
					//add free default subscription
					$userId = $userID;
					$subId = $this->Mymodel->get_single_row_info('id', 'subscription', 'pck_type="Free"', '', 1);

					$fullname = strip_tags($userData['fname']) .' '. strip_tags($userData['lname']);
					$this->Mymodel->add('transaction', array('user_name' => $fullname, 'user_id' => $userId, 'sub_id' => @$subId->id, 'subscription' => 'Free', 'payment_type' => '1'));
					//add free default subscription
					redirect(base_url('dashboard'),'refresh');
				}
			}
		}
	}else{
		$url = $google_client->createAuthUrl();
		header("Location: $url");
		exit;
	}
}

 function logout()
 {
  $this->session->unset_userdata('access_token');

  $this->session->unset_userdata('user_data');

  redirect('google_login/login');
 }
 function version(){
     echo CI_VERSION;
 }
 
}
?>