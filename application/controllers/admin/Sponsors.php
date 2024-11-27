<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Sponsors extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->Adminmodel->loggedIn();
	}
	
	
	public function index()
	{
		$data = array(
			'title' => 'Pact For Pain',
			'page' => 'Sponsors List',
			'subpage' => 'sponsors',
		);
      
      
        $data['result'] = $this->Adminmodel->get_all_record('*', 'sponsors', '', array('id', 'DESC'), '');
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/sponsors');
		$this->load->view('admin/footer');
	}
	
	public function add()
	{
		$data = array(
			'title' => 'Pact For Pain',
			'page' => 'Add Sponsor',
			'subpage' => 'sponsors',
		);
      
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/add_sponsors');
		$this->load->view('admin/footer');
	}
	
	function saveHealthplan(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('sponsor_name', 'Sponsor Name', 'required|trim');
			$this->form_validation->set_rules('sponsor_desc', 'Sponsor Desc', 'required|trim');
			$this->form_validation->set_rules('sponsor_email', 'Sponsor Email Id', 'required|trim');
			$this->form_validation->set_rules('status', 'Status', 'required|trim'); 
			if($this->form_validation->run() == true){
				
				$data = ['name' => $this->input->post('sponsor_name'), 'description' => $this->input->post('sponsor_desc'), 'email' => $this->input->post('sponsor_email'), 'status' => $this->input->post('status'), 'created_at' => date('Y-m-d H:i:s')];
				
				$result= $this->Adminmodel->add('sponsors', $data);
				if($result){
					
					$response['status'] = 1;
					$response['message'] = 'Sponsors added successfully.';
				}else{
					$response['status'] = 0;
					$response['message'] = 'Some error occurred.Please try again.';
				}
				
			}else{
				$response = array(
					'vali_error'   => 1,
					'sponsor_name_error' => form_error('sponsor_name'),
					'sponsor_desc_error' => form_error('sponsor_desc'),
					'sponsor_email_error' => form_error('sponsor_email'),
					'status_error' => form_error('status')
				);
			}
		}
		echo json_encode($response);
	}
	
	public function edit($id)
	{
		
		$data = array(
			'title' => 'Pact For Pain',
			'page' => 'Edit Sponsor',
			'subpage' => 'sponsors',
		);
      
      
		$data['result'] = $this->Adminmodel->get_by('sponsors', 'single', array('id' => @$id), '', 1);
		
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_sponsors');
		$this->load->view('admin/footer');
	}
	
	function updateHealthplan(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('sponsor_name', 'Sponsor Name', 'required|trim');
			$this->form_validation->set_rules('sponsor_desc', 'Sponsor Desc', 'required|trim');
			$this->form_validation->set_rules('sponsor_email', 'Sponsor Email Id', 'required|trim');
			if($this->form_validation->run() == true){
				
				$data = ['name' => $this->input->post('sponsor_name'), 'description' => $this->input->post('sponsor_desc'), 'email' => $this->input->post('sponsor_email'), 'status' => $this->input->post('status'), 'updated_at' => date('Y-m-d H:i:s')];
				
				//$result= $this->Adminmodel->add('health_plan', $data);
				$result= $this->Adminmodel->update($data, 'sponsors', array('id' => $this->input->post('id')));
				if($result){
					$response['status'] = 1;
					$response['message'] = 'Sponsors updated successfully.';
				}else{
					$response['status'] = 0;
					$response['message'] = 'Some error occurred.Please try again.';
				}
				
			}else{
				$response = array(
					'vali_error'   => 1,
					'sponsor_name_error' => form_error('sponsor_name'),
					'sponsor_desc_error' => form_error('sponsor_desc'),
					'sponsor_email_error' => form_error('sponsor_email'),
					'status_error' => form_error('status')
				);
			}
		}
		echo json_encode($response);
	}
	
	public function changestatus()
	{
		if ($this->input->post('id')) {
			$id = $this->input->post('id');
			$status = $this->input->post('status');
			if ($status == 1) {
				$msg = 'Your status is Activate';
			} else {
				$msg = 'Your status is Inctivate';
			}
			
			if ($this->Adminmodel->update(['status'=>$status], 'sponsors', ['id'=>$id])) {
				echo '["'.$msg.'", "success", "#A5DC86"]';
			} else {
				echo '["Some error occured, Please try again!", "error", "#DD6B55"]';
			}
		}
	}
	
	function delete($id){
		if(empty($id)){
			return false;
		}
		$result = $this->db->query('delete from sponsors where id = '.$id.'');
		if($result){
			$msg = '["Sponsors is deleted successfully.", "success", "#A5DC86"]';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/sponsors'),'refresh');
		}else{
			$msg = 'error';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/sponsors'),'refresh');
		}
	}
}	