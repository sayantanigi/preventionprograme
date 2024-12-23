<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sports extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->Adminmodel->loggedIn();
	}

   public function index()
	{
		$data = array(
			'title' => 'Manage Sports',
			'page' => 'Manage Sports',
			'subpage' => 'sports',
			//'redirect' => 'lists'
		);
      

        $data['sportslist'] = $this->Adminmodel->get_all_record('*', 'sports', '', array('id', 'DESC'), '');
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/sports');
		$this->load->view('admin/footer');
	}
	public function add()
	{
		$data = array(
			'title' => 'Add Sports',
			'page' => 'Add Sports',
			'subpage' => 'sports',
			//'redirect' => 'lists'
		);
      
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/add_sports');
		$this->load->view('admin/footer');
	}
	public function addSports(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('sports', 'Sports Name', 'required'); 
			$this->form_validation->set_rules('status', 'Status', 'required'); 
			if($this->form_validation->run() == true){ 
					$data = array(
						'sports_name' => strip_tags($this->input->post('sports')),
						'status' => strip_tags($this->input->post('status')),
						'created_at'   => date('Y-m-d H:i:s')
					);
					$result= $this->Adminmodel->add('sports', $data);
					if($result){
						$response['status'] = 1;
						$response['message'] = 'Sports addedd successfully.';
					}else{
						$response['status'] = 0;
						$response['message'] = 'Some error ocure.Please try again.';
					}
			
		}else{
			  $response = array(
				'vali_error'   => 1,
				'sports_error' => form_error('sports'),
				'status_error' => form_error('status'),
				);
		}
		}
		echo json_encode($response);
	}

	
	
	function delete($id){
		if(empty($id)){
			return false;
		}
		$result = $this->db->query('delete from sports where id = '.$id.'');
		if($result){
			$msg = '["sport is deleted successfully.", "success", "#A5DC86"]';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/sports'),'refresh');
		}else{
			$msg = 'error';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/sports'),'refresh');
		}
	}
	
	public function edit($id)
	{
		$data = array(
			'title' => 'Edit Sports',
			'page' => 'Edit Sports',
			'subpage' => 'sports',
			//'redirect' => 'lists'
		);
        $data['sports'] = $this->Adminmodel->get_by('sports', 'single', array('id' => $id), '', 1);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_sports');
		$this->load->view('admin/footer');
	}
	
	public function editSports(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('sports', 'Sports Name', 'required'); 
			$this->form_validation->set_rules('status', 'Status', 'required'); 
			if($this->form_validation->run() == true){ 
			        $sportsId = strip_tags($this->input->post('sportsId'));
					$data = array(
						'sports_name' => strip_tags($this->input->post('sports')),
						'status' => strip_tags($this->input->post('status')),
						'created_at'   => date('Y-m-d H:i:s')
					);
					$result= $this->Adminmodel->update($data, 'sports', array('id' => $sportsId));
					if($result){
						$response['status'] = 1;
						$response['message'] = 'Sports updated successfully.';
					}else{
						$response['status'] = 0;
						$response['message'] = 'Some error ocure.Please try again.';
					}
			
		}else{
			  $response = array(
				'vali_error'   => 1,
				'sports_error' => form_error('sports'),
				'status_error' => form_error('status'),
				);
		}
		}
		echo json_encode($response);
	}
	
	public function changestatus()
	{
		if ($this->input->post('sportsId')) {
			$sportsId = $this->input->post('sportsId');
			$status = $this->input->post('status');
			if ($status == 1) {
				$msg = 'Sport status is Activate';
			} else {
				$msg = 'Sport status is Inctivate';
			}
			
			if ($this->Adminmodel->update(['status'=>$status], 'sports', ['id'=>$sportsId])) {
				echo '["'.$msg.'", "success", "#A5DC86"]';
			} else {
				echo '["Some error occured, Please try again!", "error", "#DD6B55"]';
			}
		}
	}
	

}	