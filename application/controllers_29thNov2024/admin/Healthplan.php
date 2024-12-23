<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Healthplan extends CI_Controller 
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
			'page' => 'Health Plan List',
			'subpage' => 'health-plan',
		);
      
      
        $data['result'] = $this->Adminmodel->get_all_record('*', 'health_plan', '', array('id', 'DESC'), '');
		
		//$data['user_subscription'] = $this->Adminmodel->get_all_record('id, name', 'subscription', array('status' => '1'), array('name', 'ASC'), '');
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/healthplan');
		$this->load->view('admin/footer');
	}
	
	public function add()
	{
		$data = array(
			'title' => 'Pact For Pain',
			'page' => 'Add Health Plan',
			'subpage' => 'health-plan',
		);
      
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/add_healthplan');
		$this->load->view('admin/footer');
	}
	
	function saveHealthplan(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('plan_name', 'Health Plan Name', 'required|trim');
			$this->form_validation->set_rules('plan_desc', 'Health Plan Desc', 'required|trim');
			$this->form_validation->set_rules('plan_email', 'Health Email Id', 'required|trim');
			$this->form_validation->set_rules('status', 'Status', 'required|trim'); 
			if($this->form_validation->run() == true){
				
				$data = ['name' => $this->input->post('plan_name'), 'description' => $this->input->post('plan_desc'), 'email' => $this->input->post('plan_email'), 'status' => $this->input->post('status'), 'created_at' => date('Y-m-d H:i:s')];
				
				$result= $this->Adminmodel->add('health_plan', $data);
				if($result){
					
					$response['status'] = 1;
					$response['message'] = 'Health plan added successfully.';
				}else{
					$response['status'] = 0;
					$response['message'] = 'Some error occurred.Please try again.';
				}
				
			}else{
				$response = array(
					'vali_error'   => 1,
					'plan_name_error' => form_error('plan_name'),
					'plan_desc_error' => form_error('plan_desc'),
					'plan_email_error' => form_error('plan_email'),
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
			'page' => 'Edit Health Plan',
			'subpage' => 'health-plan',
		);
      
      
		$data['result'] = $this->Adminmodel->get_by('health_plan', 'single', array('id' => @$id), '', 1);
		
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_healthplan');
		$this->load->view('admin/footer');
	}
	
	function updateHealthplan(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('plan_name', 'Health Plan Name', 'required|trim');
			$this->form_validation->set_rules('plan_desc', 'Health Plan Desc', 'required|trim');
			$this->form_validation->set_rules('plan_email', 'Health Email Id', 'required|trim');
			$this->form_validation->set_rules('status', 'Status', 'required|trim'); 
			if($this->form_validation->run() == true){
				
				$data = ['name' => $this->input->post('plan_name'), 'description' => $this->input->post('plan_desc'), 'email' => $this->input->post('plan_email'), 'status' => $this->input->post('status'), 'created_at' => date('Y-m-d H:i:s')];
				
				//$result= $this->Adminmodel->add('health_plan', $data);
				$result= $this->Adminmodel->update($data, 'health_plan', array('id' => $this->input->post('id')));
				if($result){
					$response['status'] = 1;
					$response['message'] = 'Health plan updated successfully.';
				}else{
					$response['status'] = 0;
					$response['message'] = 'Some error occurred.Please try again.';
				}
				
			}else{
				$response = array(
					'vali_error'   => 1,
					'plan_name_error' => form_error('plan_name'),
					'plan_desc_error' => form_error('plan_desc'),
					'plan_email_error' => form_error('plan_email'),
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
			
			if ($this->Adminmodel->update(['status'=>$status], 'health_plan', ['id'=>$id])) {
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
		$result = $this->db->query('delete from health_plan where id = '.$id.'');
		if($result){
			$msg = '["Health plan is deleted successfully.", "success", "#A5DC86"]';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/healthplan'),'refresh');
		}else{
			$msg = 'error';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/healthplan'),'refresh');
		}
	}
}	