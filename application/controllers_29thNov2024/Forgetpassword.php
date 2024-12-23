<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Forgetpassword extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('email');
		$this->load->model('Mymodel');
		$this->session->keep_flashdata('suc_msg');
	}

   public function index()
	{
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Forget Password',
			'subpage' => 'forget-password',
		);
      
        require_once APPPATH.'third_party/email/vendor/autoload.php';
        //$data['event'] = $this->Adminmodel->get_all_record('event_id, event_name, event_description, event_address, event_price, status', 'event', '', array('event_id', 'DESC'), '');
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
			if($this->form_validation->run() == true){
				$con = array( 
					'returnType' => 'forgetpassword', 
					'conditions' => array( 
						'email'=> $this->input->post('email'), 
						'status' => '1'
					) 
				);
				$result = $this->Mymodel->Forget_Password($con);
				if(!empty($result)){
					
					$from_email = "info@madetosplit.com"; 
					$email = $result[0]->email; 
					$data['encode_email'] = base64_encode($result[0]->email); 
					$mesg = $this->load->view('email/forgetpassword',$data,true);
					$mail = new PHPMailer();
					$mail->IsSMTP();
					$mail->SMTPDebug = 0;                               // Enable verbose debug output
					$mail->Host = 'smtp.office365.com';  // Specify main and backup SMTP servers
					$mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'info@madetosplit.com';                
					$mail->Password = 'M@d32spl1t';
					$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
					$mail->Port = 587;                                    // TCP port to connect to
					$mail->setFrom('info@madetosplit.com');
					$mail->addAddress($email);
					$mail->isHTML(true);                                  // Set email format to HTML
					$mail->Subject = 'MadetoSplit Reset Password';
					$mail->Body    = $mesg;
					$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';					
					//Send mail 
					if($mail->send()) {
						$this->session->set_flashdata("suc_msg","The link to reset your password has been sent to your email address."); 
						//echo $this->session->flashdata("suc_msg"); 
						//redirect(base_url().'forgetpassword'); 
					}else{
						echo 'Message could not be sent.';
						echo 'Mailer Error: ' . $mail->ErrorInfo;
					}
				} 
			}
		}
		$this->load->view('header', $data);
		$this->load->view('forget_password');
		$this->load->view('footer');
	}
	
	function reset(){
		if(empty($_GET['transaction'])){
			return false;
		}
		
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('password', 'password', 'required|trim|min_length[6]'); 
			$this->form_validation->set_rules('repeat_password', 'Repeat Password', 'required|matches[password]');
			if($this->form_validation->run() == true){ 
			$Email = base64_decode($_GET['transaction']);
			 $con = array( 
						'returnType' => 'Reset', 
						'conditions' => array( 
							'password'=> md5($this->input->post('password')), 
							'email'=> $Email, 
							'status' => '1'
						) 
					);
			    $result = $this->Mymodel->Reset_Password($con);
				//print_r($result);die;
				if(!empty($result)){
					$this->session->set_flashdata("suc_msg","Your password has been updated successfully."); 
					redirect(base_url().'forgetpassword/reset?transaction='.$_GET['transaction']);
				}else{
					$this->session->set_flashdata("login_fail","Your password has not updated...."); 
					redirect(base_url().'forgetpassword/reset?transaction='.$_GET['transaction']); 
				}
			}
		}
		
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Reset Password',
			'subpage' => 'reset-password',
		);
	    $this->load->view('header', $data);
		$this->load->view('resetpassword');
		$this->load->view('footer');
	}
	
}	