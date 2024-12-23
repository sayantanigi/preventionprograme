<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Cronjob extends CI_Controller {

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
	} 
	public function event_reminder()
	{
		$get_event_reminder = $this->db->query("select event_id, user_id, event_name, event_date, event_time, event_address from event WHERE (event_date BETWEEN DATE_ADD(DATE(NOW()), INTERVAL 2 DAY) AND DATE_ADD(DATE(NOW()), INTERVAL 2 DAY)) OR (event_date BETWEEN DATE_ADD(DATE(NOW()), INTERVAL 1 DAY) AND DATE_ADD(DATE(NOW()), INTERVAL 1 DAY))");
		$result = ($get_event_reminder->num_rows() > 0) ? $get_event_reminder->result() : '';
		
		    $from_email = "info@madetosplit.com"; 
		    $imagebackPath = '';
		    $webUrl = "https://madetosplit.com/";
		//print_r($result);die;
			$imagePath = $webUrl . 'uploads/logos/logo.png';
		foreach($result as $k => $v){
			$subject = "Event Reminder (".@$v->event_name.")";
			$mesg = "<!Doctype html>
			<html>
				<head>
					<meta charset='utf-8'>
					<meta name='viewport' content='width=device-width, initial-scale=1'>
					<title>Invite People</title>
					<link href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap' rel='stylesheet'>
					</head>
				<body>
					<div style='max-width:600px;
					margin:auto;
					border:1px solid #eee;
					box-shadow:0 0 10px rgba(0, 0, 0, .15);
					line-height:17px;
					font-size:13px;
					box-sizing:border-box; -webkit-print-color-adjust: exact;font-family: Poppins, sans-serif; background:url(".$imagebackPath.")'>
						<div style='padding:20px; box-sizing: border-box;text-align: center; background: #fff;'>
							<a href='#'><img src='".$imagePath."' style='width: 100%;'></a>
						</div>
						<div style='margin: 50px auto;background: #ffffffd1;padding: 50px;text-align: center;'>
							<h1 style=' font-size: 30px; line-height: 32px; color: #0b0b0b; margin: 30px 0;'>Dear User</h1>
							<p style='font-size: 15px;color: #262626;line-height: 24px;text-align: justify;'>We hope this email finds you well. This is a friendly reminder that our event is just a few days away! We want to ensure you have all the details to make your experience as smooth as possible.</p>
						</div>
						
						<div style='margin: 0px 96px;margin-top: -60px;'>
							<span><strong>Event &nbsp; : &nbsp; </strong>  ".@$v->event_name."</span>	<br>
							<span><strong>Venue &nbsp; : &nbsp; </strong>".@$v->event_address."</span>	<br>
							<span><strong>Date & Time &nbsp; : &nbsp; </strong>".date('d M, Y', strtotime(@$v->event_date)) .' '.@$v->event_time."</span>
						</div><br>
						<div style='background: #f7931e;width: 100%;margin: 0 auto;border-radius: 7px;'>
						<a href='".base_url('event/details?eId='.base64_encode(@$v->event_id).'')."' style='padding: 7px 0px;position: absolute;text-decoration: none;font-size: 14px;color: white;left: 0;width: 100%;text-align: center;'>Check Here</a><br><br>
						</div>
						<div style='background: #000;
						text-align: left;
						box-sizing: border-box;
						width: 100%;
						padding: 20px 50px;
						color: #fff;'>
							<p style='margin: 5px 0;font-size: 12px;'>Warm Regards,</p>
							<p style='margin: 5px 0;font-size: 12px;'>Made to Split</p>
							<p style='margin: 5px 0;font-size: 12px;'><strong>Email:</strong> <a href='#' style='color: #78daff;'>info@madetosplit.com</a></p>
							<br/>
							<p style='margin: 5px 0;font-size: 11px;'>This is an automated response, please do not reply.</p>
						</div>
					</div>
				</body>
			</html>";
		
			$get_invited_people = $this->db->query("select * from event_invited_people where event_id = ".@$v->event_id."")->result();
			foreach($get_invited_people as $key => $value){
				$user_info = $this->Mymodel->get_single_row_info('id, email, fname, lname', 'users', 'email="'.$value->email.'"', '', 1);
				if(!empty($user_info)){
					$this->Mymodel->send_mail($user_info->email, $from_email, $mesg, $subject, 'info@madetosplit.com', 'M@d32spl1t');
					$this->Mymodel->sendMsg($user_info->id, $subject);
				}
			}
		}
	}
	function subscription_reminder(){
		$get_event_reminder = $this->db->query("select id, user_id, sub_id, start_date, end_date, status from transaction WHERE ((DATE(end_date) BETWEEN DATE_ADD(DATE(NOW()), INTERVAL 2 DAY) AND DATE_ADD(DATE(NOW()), INTERVAL 2 DAY)) OR (DATE(end_date) BETWEEN DATE_ADD(DATE(NOW()), INTERVAL 1 DAY) AND DATE_ADD(DATE(NOW()), INTERVAL 1 DAY))) AND payment_type = '1' AND subscription IS NULL AND status = 'succeeded'");
		$result = ($get_event_reminder->num_rows() > 0) ? $get_event_reminder->result() : '';
		//echo $this->db->last_query();die;
		//print_r($result);die;
	      	$subject = "Subscription Reminder";
			$from_email = "info@madetosplit.com"; 
			$webUrl = "https://madetosplit.com/";
			$imagePath = $webUrl . 'uploads/logos/logo.png';
			$imagebackPath = '';
		foreach($result as $k => $v){
			
			$user_info = $this->Mymodel->get_single_row_info('id, email, fname, lname', 'users', 'id="'.$v->user_id.'"', '', 1);
			$sub_info = $this->Mymodel->get_single_row_info('id, name', 'subscription', 'id="'.$v->sub_id.'"', '', 1);
			
			
				$mesg = "<!Doctype html>
				<html>
				<head>
					<meta charset='utf-8'>
					<meta name='viewport' content='width=device-width, initial-scale=1'>
					<title>Invite People</title>
					<link href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap' rel='stylesheet'>
					</head>
				<body>
					<div style='max-width:600px;
					margin:auto;
					border:1px solid #eee;
					box-shadow:0 0 10px rgba(0, 0, 0, .15);
					line-height:17px;
					font-size:13px;
					box-sizing:border-box; -webkit-print-color-adjust: exact;font-family: Poppins, sans-serif; background:url(".$imagebackPath.")'>
						<div style='padding:20px; box-sizing: border-box;text-align: center; background: #fff;'>
							<a href='#'><img src='".$imagePath."' style='width: 350px; height80px;'></a>
						</div>
						
						<div style='margin: 50px auto;background: #ffffffd1;padding: 50px;text-align: center;'>
							<h1 style=' font-size: 30px; line-height: 32px; color: #0b0b0b; margin: 30px 0;'>Dear User</h1>
							<p style='font-size: 15px;color: #262626;line-height: 24px;text-align: justify;'>We are reaching out to remind you that your subscription is expire on  <strong>".date('d M, Y', strtotime($v->end_date)).".</strong></p>
							
							<p style='font-size: 15px;color: #262626;line-height: 24px;text-align: justify;'>Please renew your subscription plan.</p>
						</div>
						
						
						
						<div style='margin: 0px 96px;margin-top: -60px;'>
							<span><strong>Plan &nbsp; : &nbsp; </strong> ".@$sub_info->name."</span><br>
							<span><strong>Expired on &nbsp; : &nbsp; </strong>".date('d M, Y', strtotime($v->end_date))."</span><br>
						</div><br>
						
						<div style='background: #f7931e;width: 100%;margin: 0 auto;border-radius: 7px;'>
						<a href='".base_url('subscription')."' style='padding: 7px 0px;position: absolute;text-decoration: none;font-size: 14px;color: white;left: 0;width: 100%;text-align: center;'>Renew Now</a><br><br>
						</div>
						
						<div style='background: #000;
						text-align: left;
						box-sizing: border-box;
						width: 100%;
						padding: 20px 50px;
						color: #fff;'>
							<p style='margin: 5px 0;font-size: 12px;'>Warm Regards,</p>
							<p style='margin: 5px 0;font-size: 12px;'>Made to Split</p>
							<p style='margin: 5px 0;font-size: 12px;'><strong>Email:</strong> <a href='#' style='color: #78daff;'>info@madetosplit.com</a></p>
							<br/>
							<p style='margin: 5px 0;font-size: 11px;'>This is an automated response, please do not reply.</p>
						</div>
					</div>
				</body>
			</html>";
			$this->Mymodel->send_mail($user_info->email, $from_email, $mesg, $subject, 'info@madetosplit.com', 'M@d32spl1t');
			$oneSignalMsg = "We are reaching out to remind you that your subscription is expire on ".date('d M, Y', strtotime($v->end_date)).".";
			$this->Mymodel->sendMsg($user_info->id, $oneSignalMsg);
		}
	}
	function test(){
		$imagePath = base_url() . 'uploads/logos/logo.png';
		$imagebackPath = '';
		$mesg = "<!Doctype html>
		<html>
			<head>
				<meta charset='utf-8'>
				<meta name='viewport' content='width=device-width, initial-scale=1'>
				<title>Invite People</title>
				<link href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap' rel='stylesheet'>
				</head>
			<body>
				<div style='max-width:600px;
				margin:auto;
				border:1px solid #eee;
				box-shadow:0 0 10px rgba(0, 0, 0, .15);
				line-height:17px;
				font-size:13px;
				box-sizing:border-box; -webkit-print-color-adjust: exact;font-family: Poppins, sans-serif; background:url(".$imagebackPath.")'>
					<div style='padding:20px; box-sizing: border-box;text-align: center; background: #fff;'>
						<a href='#'><img src='".$imagePath."' style='width: 350px; height80px;'></a>
					</div>
					
					<div style='width: 400px; margin:50px auto;background: #ffffffd1;padding: 50px;text-align: center;'>
						<h1 style=' font-size: 30px; line-height: 32px; color: #0b0b0b; margin: 30px 0;'>Dear User</h1>
						<p style='font-size: 15px;color: #262626;line-height: 24px;margin: 20px 0;text-align: justify;'>We are reaching out to remind you that your subscription is expire on  <strong>23 Jul 2023.</strong></p>
						
						<p style='font-size: 15px;color: #262626;line-height: 24px;margin: 20px 0;text-align: justify;'>Please renew your subscription plan.</p>
					</div>
					
					
					
					<div style='margin: 0px 96px;margin-top: -60px;'>
						<span><strong>Plan &nbsp; : &nbsp; </strong> Platinum</span><br>
						<span><strong>Expired on &nbsp; : &nbsp; </strong>23 Jul 2023</span><br>
					</div><br>
					
					<div style='background: #f7931e;width: 20%;margin: 5px 13rem;border-radius: 7px;'>
					<a href='' style='padding: 9px 0px;position: absolute;margin: 0px 22px;text-decoration: none;font-size: 14px;font-weight: 900;color: white;'>Renew Now</a><br><br>
					</div>
					
					<div style='background: #000;
					text-align: left;
					box-sizing: border-box;
					width: 100%;
					padding: 20px 50px;
					color: #fff;'>
						<p style='margin: 5px 0;font-size: 12px;'>Warm Regards,</p>
						<p style='margin: 5px 0;font-size: 12px;'>Made to Split</p>
						<p style='margin: 5px 0;font-size: 12px;'><strong>Email:</strong> <a href='#' style='color: #78daff;'>info@madetosplit.com</a></p>
						<br/>
						<p style='margin: 5px 0;font-size: 11px;'>This is an automated response, please do not reply.</p>
					</div>
				</div>
			</body>
		</html>";
		echo $mesg;
	}
	function test_function(){
	    require_once APPPATH.'third_party/email/vendor/autoload.php';
        $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'smtp.office365.com', // Your SMTP host
        'smtp_port' => 587, // Default port for SMTP
        'smtp_user' => 'info@madetosplit.com',
        'smtp_pass' => 'M@d32spl1t',
        'mailtype' => 'html',
        'charset' => 'iso-8859-1',
        'wordwrap' => TRUE
        );
        $message = 'Your msg';
        $this->load->library('email', $config);
        $this->email->from('info@madetosplit.com', 'Title');
        $this->email->to('igi201@goigi.in');
        $this->email->subject('Header');
        $this->email->message($message);
        $send = $this->email->send();
		print_r($send);die;
        if($this->email->send()) 
        {
         echo 'sent';
        }else{
              echo 'not sent';
        }
	}
	function test_temp(){
		 $imagebackPath = '';
		//print_r($result);die;
		$webUrl = "http://deve.igiapp.com/madetosplit/";
			$imagePath = $webUrl . 'uploads/logos/logo.png';
		echo $mesg = "<!Doctype html>
			<html>
				<head>
					<meta charset='utf-8'>
					<meta name='viewport' content='width=device-width, initial-scale=1'>
					<title>Invite People</title>
					<link href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap' rel='stylesheet'>
					</head>
				<body>
					<div style='max-width:600px;
					margin:auto;
					border:1px solid #eee;
					box-shadow:0 0 10px rgba(0, 0, 0, .15);
					line-height:17px;
					font-size:13px;
					box-sizing:border-box; -webkit-print-color-adjust: exact;font-family: Poppins, sans-serif; background:url(".$imagebackPath.")'>
						<div style='padding:20px; box-sizing: border-box;text-align: center; background: #fff;'>
							<a href='#'><img src='".$imagePath."' style='width: 100%;'></a>
						</div>
						<div style='margin: 50px auto;background: #ffffffd1;padding: 50px;text-align: center;'>
							<h1 style=' font-size: 30px; line-height: 32px; color: #0b0b0b; margin: 30px 0;'>Dear User</h1>
							<p style='font-size: 15px;color: #262626;line-height: 24px;text-align: justify;'>We hope this email finds you well. This is a friendly reminder that our event is just a few days away! We want to ensure you have all the details to make your experience as smooth as possible.</p>
						</div>
						
						
					
						<a href='https://www.google.co.in/' style='padding: 10px 35px; text-decoration: none; color: #ffffff; background-color:#f7931e; letter-spacing: 0.55px; text-align:left; line-height: 24px; font-family:'Open Sans',arial,sans-serif!important;'>Check Here</a><br><br>
						
						<div style='background: #000;
						text-align: left;
						box-sizing: border-box;
						width: 100%;
						padding: 20px 50px;
						color: #fff;'>
							<p style='margin: 5px 0;font-size: 12px;'>Warm Regards,</p>
							<p style='margin: 5px 0;font-size: 12px;'>Made to Split</p>
							<p style='margin: 5px 0;font-size: 12px;'><strong>Email:</strong> <a href='#' style='color: #78daff;'>info@madetosplit.com</a></p>
							<br/>
							<p style='margin: 5px 0;font-size: 11px;'>This is an automated response, please do not reply.</p>
						</div>
					</div>
				</body>
			</html>";
	}
	function testemail(){
		    $headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// More headers
			$headers .= 'From: <info@madetosplit.com>' . "\r\n";
			$subject = 'Digital Sports Resume Registration';	
			$to = 'chetanbele1994@gmail.com';	
			$pass = '123456';	
			$message = " 
			<h3>Your registration is successfully completed. Please see below details.</h3> 
			<p><b>Email: </b>".strip_tags(@$to)."</p> 
			<p><b>Password: </b>".@$pass."</p>";
			$send = mail($to, $subject, $message, $headers);
			if($send){
				echo 'send';
			}else{
				echo 'not send';
			}
	}
}