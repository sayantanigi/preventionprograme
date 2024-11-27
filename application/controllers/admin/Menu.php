<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Menu extends CI_Controller 
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
			'page' => 'Menu List',
			'subpage' => 'menu',
		);
      
      
         $data['result'] = $this->Adminmodel->get_all_record('*', 'menus', '', array('id', 'DESC'), '');
		
		// $data['user_subscription'] = $this->Adminmodel->get_all_record('id, name', 'subscription', array('status' => '1'), array('name', 'ASC'), '');
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/menu');
		$this->load->view('admin/footer');
	}
	
	public function add()
	{
		$data = array(
			'title' => 'Pact For Pain',
			'page' => 'Add Menu',
			'subpage' => 'menu',
		);
      
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/add_menu');
		$this->load->view('admin/footer');
	}
	
	function saveMenu(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('menu', 'Menu Name', 'required|trim');
			$this->form_validation->set_rules('status', 'Status', 'required|trim'); 
			if($this->form_validation->run() == true){
				
				$data = ['name' => $this->input->post('menu'), 'status' => $this->input->post('status'), 'created_at' => date('Y-m-d H:i:s')];
				
				$result= $this->Adminmodel->add('menus', $data);
				if($result){
					
					$response['status'] = 1;
					$response['message'] = 'menu added successfully.';
				}else{
					$response['status'] = 0;
					$response['message'] = 'Some error occurred.Please try again.';
				}
				
			}else{
				$response = array(
					'vali_error'   => 1,
					'menu_error' => form_error('menu'),
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
			'page' => 'Edit Menu',
			'subpage' => 'menu',
		);
      
      
		$data['result'] = $this->Adminmodel->get_by('menus', 'single', array('id' => @$id), '', 1);
		
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_menu');
		$this->load->view('admin/footer');
	}
	
	function updateMenu(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('menu', 'Menu Name', 'required|trim');
			$this->form_validation->set_rules('status', 'Status', 'required|trim'); 
			if($this->form_validation->run() == true){
				
				$data = ['name' => $this->input->post('menu'), 'status' => $this->input->post('status'), 'updated_at' => date('Y-m-d H:i:s')];
				$result= $this->Adminmodel->update($data, 'menus', array('id' => $this->input->post('id')));
				if($result){
					$response['status'] = 1;
					$response['message'] = 'Menu updated successfully.';
				}else{
					$response['status'] = 0;
					$response['message'] = 'Some error occurred.Please try again.';
				}
				
			}else{
				$response = array(
					'vali_error'   => 1,
					'menu_error' => form_error('menu'),
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
			
			if ($this->Adminmodel->update(['status'=>$status], 'menus', ['id'=>$id])) {
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
		$result = $this->db->query('delete from menus where id = '.$id.'');
		if($result){
			$msg = '["Menu is deleted successfully.", "success", "#A5DC86"]';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/menu'),'refresh');
		}else{
			$msg = 'error';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/menu'),'refresh');
		}
	}
}