<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Mailer extends CI_Controller {

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
		$this->session->keep_flashdata('msg');
	}
	
	function index(){
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Draft List',
			'subpage' => 'mailer',
		);
		$userId = $this->session->userdata('loguserId');
		$data['result'] = $this->Mymodel->get_multiple_row_info('*', 'compose_email', 'type = "draft" and user_id = '.$userId.'', 'id DESC', '');
		$this->load->view('header', $data);
		$this->load->view('account/draft_list');
		$this->load->view('footer');
	}
	
	function update(){
		if(empty(@$_GET['dId'])){
			return false;
		}
		
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Update Compose Email',
			'subpage' => 'mailer',
		);
		$userId = $this->session->userdata('loguserId');
		$data['result'] = $this->Mymodel->get_single_row_info('*', 'compose_email', 'id = '.base64_decode(@$_GET['dId']).'', '', 1);
	
		$data['event'] = $this->Mymodel->get_multiple_row_info('event_id, event_name', 'event', 'user_id = '.$userId.'', 'event_id DESC', '');
		$this->load->view('header', $data);
		$this->load->view('account/compose_email');
		$this->load->view('footer');
	}
	
	function get_guest(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$event_id = $this->input->post('id');
			//$guest = $this->Mymodel->get_multiple_row_info('id, email', 'event_invited_people', 'event_id = '.$event_id.'', 'id DESC', '');
			$guest = $this->db->query("select event_invited_people.id, event_invited_people.email, (select fname from users where email = event_invited_people.email) as fname,  (select lname from users where email = event_invited_people.email) as lname from event_invited_people where event_id = ".$event_id."")->result();
			//print_r($guest);
			// if(!empty($guest)){
				// $userinfo = $this->Mymodel->get_single_row_info('id, fname, lname, email', 'users', 'email = '.@$guest->email.'', '', 1);
			// }
				$output = '';
				foreach($guest as $row){
				    $output .= '<option value="'.(!empty($row->email) ? $row->email : '').'">'.$row->email .' ('.$row->fname .' '. $row->lname.') .'.'</option>';
				}
				$html['output'] = $output;
				echo json_encode($html);
		}
	}
	function send_mail(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$userId = $this->session->userdata('loguserId');
			
			if($_FILES['attachment']['name'] != '') {
				$src = $_FILES['attachment']['tmp_name'];
				$filEnc = time();
				$avatar ='mail'.'_'.rand(11111, 99999)."_".$_FILES['attachment']['name'];
				$avatar1 = str_replace(array('(', ')', ' '), '', $avatar);
				$dest = getcwd() . '/uploads/email/' . $avatar1;
				if (move_uploaded_file($src, $dest)) {
					$attachment  = $avatar1;
				}
			} else {
				//$attachment ='';
				$email_attach = $this->Mymodel->get_single_row_info('attachment', 'compose_email', 'id = '.@$_POST['id'].'', '', 1);
				if(!empty(@$email_attach)){
					$attachment = $email_attach->attachment;
				}else{
					$attachment = '';
				}
				
			}
			//print_r($attachment);die;
			
			if(isset($_POST['sent']))
			{
                $to=[];
			   
				foreach ($_POST['guest'] as $value){
					$to[] = $value;
				}
				
				$recipients = implode(',', $to);
				$email_data = array('body' => @$_POST['body'], 'attachment' => @$attachment);
				$msg = $this->load->view('account/email_management/email_template',$email_data,TRUE);
				$result = $this->Mymodel->mail_send_management('info@madetosplit.com', 'info@madetosplit.com', $to, $msg, @$_POST['subject'], 'info@madetosplit.com', 'M@d32spl1t');
				if(!empty($result)){
					
					$data = array('subject' => @$_POST['subject'], 'body' => @$_POST['body'], 'event_id' => @$_POST['event'], 'attachment' => $attachment, 'user_id' => @$userId, 'type' => 'send', 'status' => '1', 'update_date' => date('Y-m-d H:i:s'), 'recipients' => $recipients);
					$this->Mymodel->update($data, 'compose_email', array('id' => @$_POST['id']));
					$this->session->set_flashdata('msg', 'Sent successfully !!');
				    redirect(base_url('mailer'));
				}
				//echo $recipients;
				//print_r($result);
			}else{
				$to=[];
			   
				foreach ($_POST['guest'] as $value){
					$to[] = $value;
				}
				$recipients = implode(',', $to);
				$data = array('subject' => @$_POST['subject'], 'body' => @$_POST['body'], 'event_id' => @$_POST['event'], 'attachment' => $attachment, 'user_id' => @$userId, 'type' => 'draft', 'status' => '1', 'update_date' => date('Y-m-d H:i:s'), 'recipients' => $recipients);
				$this->Mymodel->update($data, 'compose_email', array('id' => @$_POST['id']));
				$this->session->set_flashdata('msg', 'Save successfully !!');
				redirect(base_url('mailer'));
			}
		}
	}
	function list_send_mail(){
		$data = array(
			'title' => 'Made to Split',
			'page' => 'List of Sent Mail',
			'subpage' => 'mailer',
		);
		$userId = $this->session->userdata('loguserId');
		$data['result'] = $this->Mymodel->get_multiple_row_info('*', 'compose_email', 'type = "send" and user_id = '.$userId.'', 'id DESC', '');
		$this->load->view('header', $data);
		$this->load->view('account/send_mail_list');
		$this->load->view('footer');
	}
	
	function delete_send_list(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$id = $this->input->post('id');
			$delete_query = $this->db->query("delete from compose_email where id = ".$id."");
			if(!empty($delete_query)){
				$response['status'] = 1;
				$response['message'] = 'mail deleted successfully.';
			}else{
				$response['status'] = 0;
				$response['message'] = 'error.';
			}
		}
		echo json_encode($response);
	}
	
	function existing_template(){
		$data = array(
			'title' => 'Made to Split',
			'page' => 'List of Template',
			'subpage' => 'mailer',
		);
		$userId = $this->session->userdata('loguserId');
		$data['result'] = $this->Mymodel->get_multiple_row_info('*', 'email_template', 'user_id = '.$userId.'', 'id DESC', '');
		$this->load->view('header', $data);
		$this->load->view('account/existing_template');
		$this->load->view('footer');
	}
	
	function add_use_template(){
		if(empty(@$_GET['id'])){
			return false;
		}
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Use Template',
			'subpage' => 'mailer',
		);
		$userId = $this->session->userdata('loguserId');
		$data['result'] = $this->Mymodel->get_single_row_info('*', 'email_template', 'id = '.base64_decode(@$_GET['id']).'', 'id DESC', '');
		//print_r($data['result']);
		$data['event'] = $this->Mymodel->get_multiple_row_info('event_id, event_name', 'event', 'user_id = '.$userId.'', 'event_id DESC', '');
		$this->load->view('header', $data);
		$this->load->view('account/add_use_template');
		$this->load->view('footer');
	}
	
	function save_use_template(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$userId = $this->session->userdata('loguserId');
			
			if($_FILES['attachment']['name'] != '') {
				$src = $_FILES['attachment']['tmp_name'];
				$filEnc = time();
				$avatar ='mail'.'_'.rand(11111, 99999)."_".$_FILES['attachment']['name'];
				$avatar1 = str_replace(array('(', ')', ' '), '', $avatar);
				$dest = getcwd() . '/uploads/email/' . $avatar1;
				if (move_uploaded_file($src, $dest)) {
					$attachment  = $avatar1;
				}
			} else {
				//$attachment ='';
				$email_attach = $this->Mymodel->get_single_row_info('attachment', 'email_template', 'id = '.@$_POST['id'].'', '', 1);
				if(!empty(@$email_attach)){
					$attachment = $email_attach->attachment;
				}else{
					$attachment = '';
				}
				
			}
			//print_r($attachment);die;
			
			if(isset($_POST['sent']))
			{
                $to=[];
			   
				foreach ($_POST['guest'] as $value){
					$to[] = $value;
				}
				
				$recipients = implode(',', $to);
				$email_data = array('body' => @$_POST['body'], 'attachment' => @$attachment);
				$msg = $this->load->view('account/email_management/email_template',$email_data,TRUE);
				$result = $this->Mymodel->mail_send_management('info@madetosplit.com', 'info@madetosplit.com', $to, $msg, @$_POST['subject'], 'info@madetosplit.com', 'M@d32spl1t');
				if(!empty($result)){
					
					$data = array('subject' => @$_POST['subject'], 'body' => @$_POST['body'], 'event_id' => @$_POST['event'], 'attachment' => $attachment, 'user_id' => @$userId, 'type' => 'send', 'status' => '1', 'update_date' => date('Y-m-d H:i:s'), 'recipients' => $recipients);
					$this->Mymodel->add('compose_email', $data);
					$this->session->set_flashdata('msg', 'Sent successfully !!');
				    redirect(base_url('mailer/existing_template'));
				}
				//echo $recipients;
				//print_r($result);
			}else{
				$to=[];
			   
				foreach ($_POST['guest'] as $value){
					$to[] = $value;
				}
				$recipients = implode(',', $to);
				$data = array('subject' => @$_POST['subject'], 'body' => @$_POST['body'], 'event_id' => @$_POST['event'], 'attachment' => $attachment, 'user_id' => @$userId, 'type' => 'draft', 'status' => '1', 'update_date' => date('Y-m-d H:i:s'), 'recipients' => $recipients);
				//$this->Mymodel->update($data, 'compose_email', array('id' => @$_POST['id']));
				$this->Mymodel->add('compose_email', $data);
				$this->session->set_flashdata('msg', 'Save successfully !!');
				redirect(base_url('mailer/existing_template'));
			}
		}
	}
	
	function new_compose_mail(){
		
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Compose New Mail',
			'subpage' => 'mailer',
		);
		$userId = $this->session->userdata('loguserId');
		$data['event'] = $this->Mymodel->get_multiple_row_info('event_id, event_name', 'event', 'user_id = '.$userId.'', 'event_id DESC', '');
		$this->load->view('header', $data);
		$this->load->view('account/compose_email');
		$this->load->view('footer');
	}
	
	function send_new_mail(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$userId = $this->session->userdata('loguserId');
			
			if($_FILES['attachment']['name'] != '') {
				$src = $_FILES['attachment']['tmp_name'];
				$filEnc = time();
				$avatar ='mail'.'_'.rand(11111, 99999)."_".$_FILES['attachment']['name'];
				$avatar1 = str_replace(array('(', ')', ' '), '', $avatar);
				$dest = getcwd() . '/uploads/email/' . $avatar1;
				if (move_uploaded_file($src, $dest)) {
					$attachment  = $avatar1;
				}
			} else {
				//$attachment ='';
				$email_attach = $this->Mymodel->get_single_row_info('attachment', 'email_template', 'id = '.@$_POST['id'].'', '', 1);
				if(!empty(@$email_attach)){
					$attachment = $email_attach->attachment;
				}else{
					$attachment = '';
				}
			}
			
			if(isset($_POST['sent']))
			{
                $to=[];
			   
				foreach ($_POST['guest'] as $value){
					$to[] = $value;
				}
				
				$recipients = implode(',', $to);
				$email_data = array('body' => @$_POST['body'], 'attachment' => @$attachment);
				$msg = $this->load->view('account/email_management/email_template',$email_data,TRUE);
				$result = $this->Mymodel->mail_send_management('info@madetosplit.com', 'info@madetosplit.com', $to, $msg, @$_POST['subject'], 'info@madetosplit.com', 'M@d32spl1t');
				if(!empty($result)){
					
					$data = array('subject' => @$_POST['subject'], 'body' => @$_POST['body'], 'event_id' => @$_POST['event'], 'attachment' => $attachment, 'user_id' => @$userId, 'type' => 'send', 'status' => '1', 'created_date' => date('Y-m-d H:i:s'), 'recipients' => $recipients);
					$this->Mymodel->add('compose_email', $data);
					$this->session->set_flashdata('msg', 'Sent successfully !!');
				    redirect(base_url('mailer/list_send_mail'));
				}
				//echo $recipients;
				//print_r($result);
			}else{
				$to=[];
			   
				foreach ($_POST['guest'] as $value){
					$to[] = $value;
				}
				$recipients = implode(',', $to);
				$data = array('subject' => @$_POST['subject'], 'body' => @$_POST['body'], 'event_id' => @$_POST['event'], 'attachment' => $attachment, 'user_id' => @$userId, 'type' => 'draft', 'status' => '1', 'created_date' => date('Y-m-d H:i:s'), 'recipients' => $recipients);
				//$this->Mymodel->update($data, 'compose_email', array('id' => @$_POST['id']));
				$this->Mymodel->add('compose_email', $data);
				$this->session->set_flashdata('msg', 'Save successfully !!');
				redirect(base_url('mailer/list_send_mail'));
			}
			
		}
	}
	
}	