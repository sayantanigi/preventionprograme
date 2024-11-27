<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emailvarify extends CI_Controller {
    function __construct() {
	  parent::__construct();
	  date_default_timezone_set("Asia/Kolkata");
      $this->load->model('mymodel');
	}
	public function index(){
		if(empty($_GET['key']) || empty($_GET['token'])){
			return false;
		}
		
		$email = $_GET['key'];
		$token = $_GET['token'];
		$sql = "SELECT * FROM `users` WHERE `email_verify_token`='".$token."' and `email`='".$email."'";
		$query = $this->db->query($sql);
	 
		
		if($query->num_rows() > 0){
			
			$updatesql = "UPDATE users set email_verify_status ='1', status = '1' WHERE email='" . $email . "'";
			$updatequery = $this->db->query($updatesql);
			
			$data['suc_msg'] = "Congratulations! Your email has been verified now. Please click below link and login";
			$result = $query->row();
			//$this->email_verified($result->display_name, $result->email);
		}else{
			$data['fail_msg'] = "This email has been not registered with us";
		}
		$data['page'] = "Email Verification";
	    $data['title'] = "KODfans";
	   
	    $this->load->view('header', $data);
		$this->load->view('emailvarify');
		$this->load->view('footer');
	}
	
	// function email_verified($name = '', $email = ''){
		// $this->load->library('email');
		// $htmlContent = $this->load->view('email/email_verified',$data,true);
		// $body = [
			// 'Messages' => [
				// [
					// 'From' => [
						// 'Email' => "info@kodfans.com",
						// 'Name' => "kodfans"
					// ],
					// 'To' => [
						// [
						// 'Email' => "".$email."",
						// 'Name' => "".$name.""
						// ],
					// ],

					// 'Subject' => "Kodfans Email Verified",
					// 'HTMLPart' => "".$htmlContent.""
				// ]
			// ]
		// ];

		// $ch = curl_init();
		// curl_setopt($ch, CURLOPT_URL, "https://api.mailjet.com/v3.1/send");
		// curl_setopt($ch, CURLOPT_POST, 1);
		// curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		// 'Content-Type: application/json')
		// );
		// curl_setopt($ch, CURLOPT_USERPWD, "70992995688d6ae0b0d855f98e22e3b8:acbe7d17660595dcbb2e59246bcde766");
		// $server_output = curl_exec($ch);
		// curl_close ($ch);
		// sleep(10);
		// return  $server_output;
	 // }
}