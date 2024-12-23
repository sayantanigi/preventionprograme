<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Contact extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->Adminmodel->loggedIn();
		require_once APPPATH.'third_party/email/vendor/autoload.php';
	}

   public function index()
	{
		
		$data = array(
			'title' => 'Contact',
			'page' => 'contact',
			'subpage' => 'contact-page'
		);

        $data['contact'] = $this->Adminmodel->get_all_record('*', 'contact', '', array('id', 'DESC'), '');

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/contact');
		$this->load->view('admin/footer');
	}
	 public function add(){
		
		$data = array(
			'title' => 'Add News',
			'page' => 'team-news',
			'subpage' => 'team-coach'
		);
		
        

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/add_news');
		$this->load->view('admin/footer');
	}
	function addnews(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('heading', 'Heading', 'required|trim');
			$this->form_validation->set_rules('description', 'Description', 'required|trim');
			$this->form_validation->set_rules('newsImg', 'Image', 'required|trim');
			$this->form_validation->set_rules('status', 'Status', 'required|trim');
			if($this->form_validation->run() == true){ 
					$data = array(
						
						'heading' => strip_tags($this->input->post('heading')),
						'description' => strip_tags($this->input->post('description')),
						'image' => strip_tags($this->input->post('newsImg')),
						'status' => strip_tags($this->input->post('status')),
						'user_id' => strip_tags($this->input->post('user_id')),
						'created_at'   => date('Y-m-d H:i:s')
					);
					$result= $this->Adminmodel->add('team_news', $data);
					if($result){
						
						$response['status'] = 1;
						$response['message'] = 'Achivement and news added successfully.';
					}else{
						$response['status'] = 0;
						$response['message'] = 'Some error ocure.Please try again.';
					}
			
		}else{
			$response = array(
				'vali_error'   => 1,
				'heading_error' => form_error('heading'),
				'description_error' => form_error('description'),
				'image_error' => form_error('newsImg'),
				'status_error' => form_error('status')
			);
		}
		}
		echo json_encode($response);	
	}
	function cropImage (){
		$data = $_POST['image'];
		$image_array_1 = explode(";", $data);
		$image_array_2 = explode(",", $image_array_1[1]);
		$data = base64_decode($image_array_2[1]);
		$imageName = time().'.png';
		$image_name = 'uploads/news/'.$imageName;
		file_put_contents($image_name, $data);
	    echo $imageName;
	}
	public function edit($id)
	{
		$data = array(
			'title' => 'Edit News',
			'page' => 'team-news',
			'subpage' => 'team-coach'
		);
		
		
        $data['news'] = $this->Adminmodel->get_by('team_news', 'single', array('id' => $id), '', 1);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_news');
		$this->load->view('admin/footer');
	}
	function editnews(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			//$this->form_validation->set_rules('heading', 'Heading', 'required|trim');
			$this->form_validation->set_rules('description', 'Description', 'required|trim');
			//$this->form_validation->set_rules('newsImg', 'Image', 'required|trim');
			$this->form_validation->set_rules('status', 'Status', 'required|trim');
			if($this->form_validation->run() == true){
				if(!empty($this->input->post('newsImg'))){
					$data = array(
						
						//'heading' => strip_tags($this->input->post('heading')),
						'description' => strip_tags($this->input->post('description')),
						'image' => strip_tags($this->input->post('newsImg')),
						'status' => strip_tags($this->input->post('status')),
						'updated_at'   => date('Y-m-d H:i:s')
					);
					$result = $this->Adminmodel->update($data, 'team_news', array('id' => $this->input->post('id')));
					if($result){
						
						$response['status'] = 1;
						$response['message'] = 'Achivement and news updated successfully.';
					}else{
						$response['status'] = 0;
						$response['message'] = 'Some error ocure.Please try again.';
					}
				}else{
					$data = array(
						
						//'heading' => strip_tags($this->input->post('heading')),
						'description' => strip_tags($this->input->post('description')),
						//'image' => strip_tags($this->input->post('newsImg')),
						'status' => strip_tags($this->input->post('status')),
						'updated_at'   => date('Y-m-d H:i:s')
					);
					$result = $this->Adminmodel->update($data, 'team_news', array('id' => $this->input->post('id')));
					if($result){
						
						$response['status'] = 1;
						$response['message'] = 'Achivement and news updated successfully.';
					}else{
						$response['status'] = 0;
						$response['message'] = 'Some error ocure.Please try again.';
					}
				}
					
			
		}else{ 
			$response = array(
				'vali_error'   => 1,
				//'heading_error' => form_error('heading'),  
				'description_error' => form_error('description'),
				'image_error' => form_error('newsImg'),
				'status_error' => form_error('status')
			);
		}
		}
		echo json_encode($response);	
	}
	
	function delete(){
		if(empty($_GET['id'])){
		    return false;
		}
		
		
		$contact_id = $_GET['id'];
		$result = $this->db->query('delete from contact where id = '.$contact_id.'');
		if($result){
			$msg = '["contact query is deleted successfully.", "success", "#A5DC86"]';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/contact'),'refresh');
		}else{
			$msg = 'error';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/contact'),'refresh');
		}
	}
	
	function send_mail($id){
		if(empty($id)){
			return false;
		}
		
		$data = array(
			'title' => 'Send Mail',
			'page' => 'contact',
			'subpage' => 'contact-page'
		);
		$data['contact'] = $this->Adminmodel->get_by('contact', 'single', array('id' => $id), '', 1);
		$data['from_email'] = $this->db->query("select email from settings ORDER BY settingId DESC LIMIT 1")->row();
		//print_r($data['contact']);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/send_contact_mail');
		$this->load->view('admin/footer');
	}
	
	function sendMail(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('from_email', 'From Mail', 'required|trim');
			$this->form_validation->set_rules('to_email', 'To Email', 'required|trim');
			$this->form_validation->set_rules('subject', 'Subject', 'required|trim');
			$this->form_validation->set_rules('description', 'Description', 'required|trim');
			if($this->form_validation->run() == true){
				
					/*$data = array(
						'description' => strip_tags($this->input->post('description')),
						'status' => strip_tags($this->input->post('status')),
						'updated_at'   => date('Y-m-d H:i:s')
					);
					$result = $this->Adminmodel->update($data, 'team_news', array('id' => $this->input->post('id')));
					if($result){
						$response['status'] = 1;
						$response['message'] = 'Achivement and news updated successfully.';
					}else{
						$response['status'] = 0;
						$response['message'] = 'Some error ocure.Please try again.';
					}*/
					
				$msg = "<p>".strip_tags($this->input->post('description'))."</p>";
				
				$mail = new PHPMailer();
				$mail->SMTPDebug = 0; //Enable verbose debug output
				$mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
				$mail->IsSMTP();
				$mail->SMTPAuth = true; // Enable SMTP authentication
				$mail->Username = 'rameshwebdev21@gmail.com';                
				$mail->Password = 'gqbtiijrzaljwkhz';
				$mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 587; // TCP port to connect to
				$mail->setFrom(strip_tags($this->input->post('from_email')));
				$mail->addAddress(strip_tags($this->input->post('to_email')));
				$mail->isHTML(true); // Set email format to HTML
				$mail->Subject = strip_tags($this->input->post('subject'));
				$mail->Body    = $msg;
				$result = $mail->send();
				if($result){
					$response['status'] = 1;
					$response['message'] = 'Mail send successfully.';
				}else{
					$response['status'] = 0;
					$response['message'] = 'Some error ocure.Please try again.';
				}
		}else{ 
			$response = array(
				'vali_error'   => 1,
				'from_email_error' => form_error('from_email'),
				'to_email_error' => form_error('to_email'),
				'description_error' => form_error('description'),
				'subject_error' => form_error('subject'),
			);
		}
		}
		echo json_encode($response);
	}
}	