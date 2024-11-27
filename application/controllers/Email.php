<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Email extends CI_Controller {

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
	
	function template_management(){
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Template Management',
			'subpage' => 'email',
		);
		$userId = $this->session->userdata('loguserId');
		$data['result'] = $this->Mymodel->get_multiple_row_info('*', 'email_template', 'user_id = '.$userId.'', 'id DESC', '');
		$this->load->view('header', $data);
		$this->load->view('account/email_tem_management');
		$this->load->view('footer');
	}
	function create_template(){
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Create Template',
			'subpage' => 'email',
		);
		
		//$data['result'] = $this->Mymodel->get_multiple_row_info('*', 'email_template', '', 'id DESC', '');
		$this->load->view('header', $data);
		$this->load->view('account/email_tem_create');
		$this->load->view('footer');
	}
	function addTemplate(){
		$userId = $this->session->userdata('loguserId');
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('body', 'Body', 'required|trim'); 
			$this->form_validation->set_rules('subject', 'Subjecy', 'required|trim'); 
			if($this->form_validation->run() == true){
					if(!empty($_FILES['attachment']['name'])){
						$config['upload_path'] = 'uploads/email'; # check path is correct
						$config['allowed_types'] = 'jpg|png|jpeg|pdf|docx|xlxs|csv|gif'; # add video extenstion on here
						$config['overwrite'] = FALSE;
						$config['remove_spaces'] = TRUE;
						$image_name = preg_replace("/\s+/", "_", $_FILES['attachment']['name']);
						$config['file_name'] = $image_name;
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						if (!$this->upload->do_upload('attachment')) {
						$array = array('vali_error' => 1, 'attachment_err' => $this->upload->display_errors());
						echo json_encode($array);
						exit();
						}else {
							$data = array(
								'body' => $this->input->post('body'),
								'subject' => strip_tags($this->input->post('subject')),
								'attachment' => $image_name,
								'user_id' => $userId,
								'created_date'   => date('Y-m-d H:i:s')
							);
							$result= $this->Mymodel->add('email_template', $data);
							if($result){
								$response['status'] = 1;
								$response['message'] = 'Created email template successfully.';
							}else{
								$response['status'] = 0;
								$response['message'] = 'Some error ocure.Please try again.';
							}
						}
                    }else{
						$data = array(
							'body' => $this->input->post('body'),
							'subject' => strip_tags($this->input->post('subject')),
							'user_id' => $userId,
							'created_date'   => date('Y-m-d H:i:s')
						);
						$result= $this->Mymodel->add('email_template', $data);
						if($result){
							$response['status'] = 1;
							$response['message'] = 'Created email template successfully.';
						}else{
							$response['status'] = 0;
							$response['message'] = 'Some error ocure.Please try again.';
						}
					}					
		}else{
			$response = array(
				'vali_error'   => 1,
				'body_err' => form_error('body'),
				'subject_err' => form_error('subject')
			);
		}
		}
		echo json_encode($response);
	}
	function duplicate_template()
	{
		//$get_data=$this->Crud_model->get_single('email_template',"id='".$_POST['id']."'");
		$userId = $this->session->userdata('loguserId');
		$get_data = $this->Mymodel->get_single_row_info('*', 'email_template', 'id = '.@$_POST['id'].'', '', 1);
		$data=array(
			'subject'=>$get_data->subject,
			'body'=>$get_data->body,
			'attachment'=>$get_data->attachment,
			'type'=>'duplicate',
			'user_id'=>$userId,
			'created_date'=>date('Y-m-d H:i:s'),
		);
		$this->db->insert('email_template',$data);
		$this->session->set_flashdata('msg', 'Duplicate template created Successfully!');
		echo "1"; exit;
	}
	
	function edit_template(){
		if(empty(@$_GET['tId'])){
			return false;
		}
		//print_r($data['result']);
		
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Edit Template',
			'subpage' => 'email',
		);
		
		$tId = base64_decode(@$_GET['tId']);
		$data['result'] = $this->Mymodel->get_single_row_info('*', 'email_template', 'id = '.@$tId.'', '', 1);
		$this->load->view('header', $data);
		$this->load->view('account/edit_email_template');
		$this->load->view('footer');
	}
	
	function editTemplate(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('body', 'Body', 'required|trim'); 
			$this->form_validation->set_rules('subject', 'Subjecy', 'required|trim'); 
			if($this->form_validation->run() == true){
					if(!empty($_FILES['attachment']['name'])){
						$config['upload_path'] = 'uploads/email'; # check path is correct
						$config['allowed_types'] = 'jpg|png|jpeg|pdf|docx|xlxs|csv|gif'; # add video extenstion on here
						$config['overwrite'] = FALSE;
						$config['remove_spaces'] = TRUE;
						$image_name = preg_replace("/\s+/", "_", $_FILES['attachment']['name']);
						$config['file_name'] = $image_name;
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						if (!$this->upload->do_upload('attachment')) {
						$array = array('vali_error' => 1, 'attachment_err' => $this->upload->display_errors());
						echo json_encode($array);
						exit();
						}else {
							$data = array(
								'body' => $this->input->post('body'),
								'subject' => strip_tags($this->input->post('subject')),
								'attachment' => $image_name,
								'update_date'   => date('Y-m-d H:i:s')
							);
							//$result= $this->Mymodel->add('email_template', $data);
							$result= $this->Mymodel->update($data, 'email_template', array('id' => strip_tags($this->input->post('id'))));
							if(!empty($result)){
								$response['status'] = 1;
								$response['message'] = 'Email template updated successfully.';
							}else{
								$response['status'] = 0;
								$response['message'] = 'Some error ocure.Please try again.';
							}
						}
                    }else{
						$data = array(
							'body' => $this->input->post('body'),
							'subject' => strip_tags($this->input->post('subject')),
							'update_date'   => date('Y-m-d H:i:s')
						);
						$result= $this->Mymodel->update($data, 'email_template', array('id' => strip_tags($this->input->post('id'))));
						if(!empty($result)){
							$response['status'] = 1;
							$response['message'] = 'Email template updated successfully.';
						}else{
							$response['status'] = 0;
							$response['message'] = 'Some error ocure.Please try again.';
						}
					}					
					
					
			
		}else{
			  $response = array(
					'vali_error'   => 1,
					'body_err' => form_error('body'),
					'subject_err' => form_error('subject')
				);
		}
		}
		echo json_encode($response);
	}
	
	function delete_template(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$delete_query = $this->db->query("delete from email_template where id = ".$this->input->post('id')."");
			if(!empty($delete_query)){
                echo "1"; exit;
			}
		}
	}
	function get_recipients(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$select_query = $this->db->query("select recipients from compose_email where id = ".$this->input->post('id')."")->row();
			if(!empty($select_query)){
                echo $select_query->recipients;
			}
		}
	}
}	