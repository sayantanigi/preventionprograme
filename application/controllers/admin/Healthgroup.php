<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Healthgroup extends CI_Controller 
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
			'page' => 'Health Group List',
			'subpage' => 'health-group',
		);
      
      
        $data['result'] = $this->Adminmodel->get_all_record('*', 'health_entity', '', array('id', 'DESC'), '');
		
		//$data['user_subscription'] = $this->Adminmodel->get_all_record('id, name', 'subscription', array('status' => '1'), array('name', 'ASC'), '');
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/healthgroup');
		$this->load->view('admin/footer');
	}

   public function add()
	{
		$data = array(
			'title' => 'Pact For Pain',
			'page' => 'Add Health Group',
			'subpage' => 'health-group',
		);
      
      
        //$data['userlist'] = $this->Adminmodel->get_all_record('id, fname, lname, email, phone, address, status, image, email_verify_status, sub_id, customize_payment', 'users', array('user_type' => 1), array('id', 'DESC'), '');
		
		//$data['user_subscription'] = $this->Adminmodel->get_all_record('id, name', 'subscription', array('status' => '1'), array('name', 'ASC'), '');
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/add_healthgroup');
		$this->load->view('admin/footer');
	}
	
	function saveHealthgroup(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('group_name', 'Health Group Name', 'required|trim');
			$this->form_validation->set_rules('status', 'Status', 'required|trim'); 
			if($this->form_validation->run() == true){
				
				$data = ['name' => $this->input->post('group_name'), 'status' => $this->input->post('status'), 'created_at' => date('Y-m-d H:i:s')];
				
				$result= $this->Adminmodel->add('health_entity', $data);
				if($result){
					
					$response['status'] = 1;
					$response['message'] = 'Health group name added successfully.';
				}else{
					$response['status'] = 0;
					$response['message'] = 'Some error occurred.Please try again.';
				}
				
			}else{
				$response = array(
					'vali_error'   => 1,
					'group_name_error' => form_error('group_name'),
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
			'page' => 'Add Health Group',
			'subpage' => 'health-group',
		);
      
      
        $data['result'] = $this->Adminmodel->get_by('health_entity', 'single', array('id' => $id), '', 1);
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_healthgroup');
		$this->load->view('admin/footer');
	}
	
	function updateHealthgroup(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('group_name', 'Health Group Name', 'required|trim');
			$this->form_validation->set_rules('status', 'Status', 'required|trim'); 
			if($this->form_validation->run() == true){
				
				$data = ['name' => $this->input->post('group_name'), 'status' => $this->input->post('status'), 'updated_at' => date('Y-m-d H:i:s')];
				
				$result= $this->Adminmodel->update($data, 'health_entity', array('id' => $this->input->post('id')));
				if($result){
					
					$response['status'] = 1;
					$response['message'] = 'Health group name updated successfully.';
				}else{
					$response['status'] = 0;
					$response['message'] = 'Some error occurred.Please try again.';
				}
				
			}else{
				$response = array(
					'vali_error'   => 1,
					'group_name_error' => form_error('group_name'),
					'status_error' => form_error('status')
				);
			}
		}
		echo json_encode($response);
	}
	
	function delete($id){
		if(empty($id)){
			return false;
		}
		$result = $this->db->query('delete from health_entity where id = '.$id.'');
		if($result){
			$msg = '["Health group name is deleted successfully.", "success", "#A5DC86"]';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/healthgroup'),'refresh');
		}else{
			$msg = 'error';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/healthgroup'),'refresh');
		}
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
			
			if ($this->Adminmodel->update(['status'=>$status], 'health_entity', ['id'=>$id])) {
				echo '["'.$msg.'", "success", "#A5DC86"]';
			} else {
				echo '["Some error occured, Please try again!", "error", "#DD6B55"]';
			}
		}
	}
	
	public function health_group_admin()
	{
		$data = array(
			'title' => 'Pact For Pain',
			'page' => 'Health Group Admin List',
			'subpage' => 'health-group-admin',
		);
      
      
        $data['result'] = $this->Adminmodel->get_all_record('*', 'health_group_admin', '', array('id', 'DESC'), '');
		
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/healthgroupadmin_list');
		$this->load->view('admin/footer');
	}
	
	public function add_healthgroup_admin()
	{
		$data = array(
			'title' => 'Pact For Pain',
			'page' => 'Add Health Group Admin',
			'subpage' => 'health-group-admin',
		);
      
      
        $data['healthgroup'] = $this->Adminmodel->get_all_record('*', 'health_entity', array('status' => 1), array('id', 'DESC'), '');
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/add_healthgroup_admin');
		$this->load->view('admin/footer');
	}
	
	
	
	
	function saveHealthgroup_admin(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('group', 'Health Group', 'required|trim');
			$this->form_validation->set_rules('fname', 'Health Group Admin First Name', 'required|trim');
			$this->form_validation->set_rules('lname', 'Health Group Admin Last Name', 'required|trim');
			$this->form_validation->set_rules('email', 'Health Group Email Id', 'required|trim');
			$this->form_validation->set_rules('status', 'Status', 'required|trim'); 
			if($this->form_validation->run() == true){
				
				$data = ['health_group_id' => $this->input->post('group'), 'fname' => $this->input->post('fname'), 'lname' => $this->input->post('lname'), 'email' => $this->input->post('email'), 'status' => $this->input->post('status'), 'created_at' => date('Y-m-d H:i:s')];
				
				$result= $this->Adminmodel->add('health_group_admin', $data);
				if($result){
					
					$response['status'] = 1;
					$response['message'] = 'Health group admin added successfully.';
				}else{
					$response['status'] = 0;
					$response['message'] = 'Some error occurred.Please try again.';
				}
				
			}else{
				$response = array(
					'vali_error'   => 1,
					'group_error' => form_error('group'),
					'fname_error' => form_error('fname'),
					'lname_error' => form_error('lname'),
					'email_error' => form_error('email'),
					'status_error' => form_error('status')
				);
			}
		}
		echo json_encode($response);
	}
	
	public function edit_healthgroup_admin($id)
	{
		
		$data = array(
			'title' => 'Pact For Pain',
			'page' => 'Add Health Group Admin',
			'subpage' => 'health-group-admin',
		);
      
      
        $data['healthgroup'] = $this->Adminmodel->get_all_record('*', 'health_entity', array('status' => 1), array('id', 'DESC'), '');
		$data['result'] = $this->Adminmodel->get_by('health_group_admin', 'single', array('id' => @$id), '', 1);
		
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_healthgroup_admin');
		$this->load->view('admin/footer');
	}
	
	function updateHealthgroup_admin(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('group', 'Health Group', 'required|trim');
			$this->form_validation->set_rules('fname', 'Health Group Admin First Name', 'required|trim');
			$this->form_validation->set_rules('lname', 'Health Group Admin Last Name', 'required|trim');
			$this->form_validation->set_rules('email', 'Health Group Email Id', 'required|trim');
			$this->form_validation->set_rules('status', 'Status', 'required|trim'); 
			if($this->form_validation->run() == true){
				
				$data = ['health_group_id' => $this->input->post('group'), 'fname' => $this->input->post('fname'), 'lname' => $this->input->post('lname'), 'email' => $this->input->post('email'), 'status' => $this->input->post('status'), 'created_at' => date('Y-m-d H:i:s')];
				
				//$result= $this->Adminmodel->add('health_group_admin', $data);
				$result= $this->Adminmodel->update($data, 'health_group_admin', array('id' => $this->input->post('id')));
				if($result){
					
					$response['status'] = 1;
					$response['message'] = 'Health group admin updated successfully.';
				}else{
					$response['status'] = 0;
					$response['message'] = 'Some error occurred.Please try again.';
				}
				
			}else{
				$response = array(
					'vali_error'   => 1,
					'group_error' => form_error('group'),
					'fname_error' => form_error('fname'),
					'lname_error' => form_error('lname'),
					'email_error' => form_error('email'),
					'status_error' => form_error('status')
				);
			}
		}
		echo json_encode($response);
	}
	
	public function changestatusHealthgroup_admin()
	{
		if ($this->input->post('id')) {
			$id = $this->input->post('id');
			$status = $this->input->post('status');
			if ($status == 1) {
				$msg = 'Your status is Activate';
			} else {
				$msg = 'Your status is Inctivate';
			}
			
			if ($this->Adminmodel->update(['status'=>$status], 'health_group_admin', ['id'=>$id])) {
				echo '["'.$msg.'", "success", "#A5DC86"]';
			} else {
				echo '["Some error occured, Please try again!", "error", "#DD6B55"]';
			}
		}
	}
	
	function delete_healthgroup_admin($id){
		if(empty($id)){
			return false;
		}
		$result = $this->db->query('delete from health_group_admin where id = '.$id.'');
		if($result){
			$msg = '["Health group admin is deleted successfully.", "success", "#A5DC86"]';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/healthgroup/health_group_admin'),'refresh');
		}else{
			$msg = 'error';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/healthgroup/health_group_admin'),'refresh');
		}
	}
	
	
}