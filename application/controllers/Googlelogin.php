<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Googlelogin extends CI_Controller {

public function __construct()
{
	parent::__construct();
	require_once APPPATH.'third_party/src/Google_Client.php';
	require_once APPPATH.'third_party/src/contrib/Google_Oauth2Service.php';
	$this->load->model('Mymodel');
}
	
	
	
	public function login()
	{
	
		$clientId = '641008234339-5g91lime4svico4oeqjkjatsf25t5t73.apps.googleusercontent.com'; //Google client ID
		$clientSecret = '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'; //Google client secret
		$redirectURL = base_url() .'googlelogin/login';
		
		//https://curl.haxx.se/docs/caextract.html

		//Call Google API
		$gClient = new Google_Client();
		$gClient->setApplicationName('Login');
		$gClient->setClientId($clientId);
		$gClient->setClientSecret($clientSecret);
		$gClient->setRedirectUri($redirectURL);
		$google_oauthV2 = new Google_Oauth2Service($gClient);
		
		if(isset($_GET['code']))
		{
			$gClient->authenticate($_GET['code']);
			$_SESSION['token'] = $gClient->getAccessToken();
			header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
		}

		if (isset($_SESSION['token'])) 
		{
			$gClient->setAccessToken($_SESSION['token']);
		}
		
		if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
			$userData['oauth_provider'] = 'google'; 
            $userData['oauth_uid']      = $userProfile['id']; 
			$userData['fname'] =  !empty($userProfile['given_name']) ? $userProfile['given_name'] : '' ;
			$userData['lname']  =  !empty($userProfile['family_name']) ? $userProfile['family_name'] : '' ;
			$userData['email']      =  !empty($userProfile['email']) ? $userProfile['email'] : '' ;
			$userData['status']   = '1'; 
			$userData['email_verify_status']   = '1'; 
			$exist = $this->Mymodel->already_exist($userData['email']);
			if($exist > 0){
				
				$already_account =  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<p>You already have an account. Please sign in with the email and password you used when you signed up.</p>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>';
				$this->session->set_flashdata('already_account', $already_account);
				redirect(base_url('login'),'refresh');
				exit();
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
            }else{ 
               //$data['userData'] = array(); 
			   $this->session->set_flashdata('login_fail', 'Please enter correct details...');
			   redirect(base_url().'login'); 
            }			
        } 
		else 
		{
            $url = $gClient->createAuthUrl();
		    header("Location: $url");
            exit;
        }
	}
    function autoLogin($email, $password){
		$con = array( 
			'returnType' => 'single', 
			'conditions' => array( 
			'email'=> $email, 
			'password' => $password, 
			'status' => 1 
		) 
		);
		$result = $this->Db_Model->UserLogin($con);	
		if(!empty($result)){
			//print_r($result);
			$data = array(
			'isUserLoggedIn' => TRUE,
			'Id' => $result[0]->id,
			'name' => $result[0]->name,
			'status' => $result[0]->status,
			'joining_date' => $result[0]->created_at,
			); 
			$this->session->set_userdata($data);
			redirect(base_url().'account/my-dashboard'); 
		}else{
			$this->session->set_flashdata('login_fail', 'Please enter correct details...');
			redirect(base_url().'login'); 
		}
	}
	function randomPassword() {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 8; $i++) {
		$n = rand(0, $alphaLength);
		$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}	
}
