<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Login extends CI_Controller {

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
		$this->load->library('Facebook');
		
		error_reporting(0);
	} 
	public function index()
	{
		
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Login / Sign up',
			'subpage' => 'login',
		);
		
		if ($this->input->post('username')) {
			
			$this->form_validation->set_rules('username', 'Email', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if ($this->form_validation->run() == false) {
				$msg = '';
				if (form_error('username')) {
				    $msg .= strip_tags(form_error('username'));
				}
				if (form_error('password')) {
				    $msg .= strip_tags(form_error('password'));
				}
				
				$data['msg'] =  '<div class="alert alert-success alert-dismissible fade show" role="alert">
				'.$msg.'
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>';
				
			} else {
				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));
				
				$data['msg'] =  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				'.$this->Mymodel->login($username, $password).'!
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>';
				if ($this->session->userdata('loguserId') && $this->session->userdata('is_login')) {
					if ($this->input->get('redirectto')) {
					    //redirect(urldecode($this->input->get('redirectto')),'refresh');
					} else {
						
						if($this->input->post("remember")!='' && $this->input->post("remember") == '1') {
							setcookie ("loginId", $this->input->post('username'), time()+ (10 * 365 * 24 * 60 * 60));  
							setcookie ("loginPass",	$this->input->post('password'),	time()+ (10 * 365 * 24 * 60 * 60));
						} else {
							setcookie ("loginId",""); 
							setcookie ("loginPass","");
							unset($_COOKIE['loginId']); 
						}
					    redirect(base_url('dashboard'),'refresh');
					}
				}
			}
		}
		
		$this->load->view('header', $data);
		$this->load->view('login');
		$this->load->view('footer');
	}
	
	function register(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('fname', 'First Name', 'required|trim'); 
			$this->form_validation->set_rules('lname', 'Last Name', 'required|trim'); 
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check'); 
			$this->form_validation->set_rules('password', 'password', 'required|trim|min_length[6]');
			$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|matches[password]');
			
			if($this->form_validation->run() == true){ 
					$emailToken = md5($this->input->post('email')).rand(10,9999);
					$data = array(
						
						'fname' => strip_tags($this->input->post('fname')),
						'lname' => strip_tags($this->input->post('lname')),
						'email' => strip_tags($this->input->post('email')),
						'password' => md5($this->input->post('password')),
						'status' => '0',
						'email_verify_token' => $emailToken,
						'created_at'   => date('Y-m-d H:i:s')
					);
					$result= $this->Mymodel->add('users', $data);
					if($result){
						
						//add free default subscription
						$userId = $result;
						$subId = $this->Mymodel->get_single_row_info('id', 'subscription', 'pck_type="Free"', '', 1);
						$fullname = strip_tags($this->input->post('fname')) .' '. strip_tags($this->input->post('lname'));
                        $this->Mymodel->add('transaction', array('user_name' => $fullname, 'user_id' => $userId, 'sub_id' => @$subId->id, 'subscription' => 'Free', 'payment_type' => '1'));
						//add free default subscription
						
						$email =  strip_tags($this->input->post('email'));
						$data['verifyemail'] =  strip_tags($this->input->post('email'));
						$data['token'] =  $emailToken;
						$msg = $this->load->view('email/email_varification',$data,true);
						
						$this->Mymodel->send_mail($email, 'info@madetosplit.com', $msg, 'MadetoSplit Email Verification', 'info@madetosplit.com', 'M@d32spl1t');
						
						$response['status'] = 1;
						$response['message'] = 'Your registration is successfully completed.The link of email varification has been sent to your email address.please check your email inbox.';
					}else{
						$response['status'] = 0;
						$response['message'] = 'Some error ocure.Please try again.';
					}
			
		}else{
			  $response = array(
					'vali_error'   => 1,
					'pass_error' => form_error('password'),
					'cnfpass_error' => form_error('confirmpassword'),
					'email_error' => form_error('email'),
					'fname_error' => form_error('fname'),
					'lname_error' => form_error('lname')
				);
		}
		}
		echo json_encode($response);
	}
	
	public function email_check($str){ 
        $con = array( 
            'returnType' => 'count', 
            'conditions' => array( 
                'email' => $str 
            ) 
        ); 
        $checkEmail = $this->Mymodel->UniqueEmail($con); 
		if($checkEmail->num_rows() > 0){ 
            $this->form_validation->set_message('email_check', 'The given email already exists.'); 
            return FALSE; 
        }else{ 
            return TRUE; 
        } 
    }
	
	function logout(){
		$user_data = $this->session->all_userdata();
			foreach ($user_data as $key => $value) {
				if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
					$this->session->unset_userdata($key);
				}
			}
		$this->session->sess_destroy();
		 $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
    $this->output->set_header("Pragma: no-cache");
		redirect(base_url().'login');
	}
	
	public function fblogin()
	{
		// Authenticate user with facebook 
		if($this->facebook->is_authenticated()){ 
			// Get user info from facebook 
			$fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture'); 
			// Preparing data for database insertion 
			$userData['oauth_provider'] = 'facebook'; 
			$userData['oauth_uid']    = !empty($fbUser['id'])?$fbUser['id']:'';; 
			$userData['fname']    = !empty($fbUser['first_name'])?$fbUser['first_name']:''; 
			$userData['lname']    = !empty($fbUser['last_name'])?$fbUser['last_name']:''; 
			$userData['email']        = !empty($fbUser['email'])?$fbUser['email']:''; 
			$userData['created_at']   = date('Y-m-d H:m:i'); 
			$userData['status']   = '1'; 
			$userData['email_verify_status']   = '1'; 
			//$userData['gender']     = !empty($fbUser['gender'])?$fbUser['gender']:''; 
			//$userData['picture']    = !empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:''; 
			//print_r($userData);die;
			
			/*$exist = $this->Mymodel->already_exist($userData['email']);
			if($exist > 0){
				$already_account =  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<p>You already have an account. Please sign in with the email and password you used when you signed up.</p>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>';
				$this->session->set_flashdata('already_account', $already_account);
				redirect(base_url('login'),'refresh');
				exit();
			}*/
			$exist = $this->Mymodel->already_exist($userData['email']);
			if(!empty($exist)){
				if($exist->oauth_provider == 'facebook'){
					
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
			$userID = $this->Mymodel->Facebook_Login($userData); 
			// Check user data insert or update status 
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
			// Facebook logout URL 
			$data['logoutURL'] = $this->facebook->logout_url(); 
		}
	}
}
