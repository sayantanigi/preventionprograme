<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->Adminmodel->loggedIn();
		$this->load->model('Adminmodel');
	}

	public function index()
	{
		$data = array(
			'title' => 'Subscription',
			'page' => 'Subscription',
			'subpage' => 'subscription'
		);
	    $data['pcklist'] = $this->Adminmodel->get_all_record('id, name, description, amount, duration, user_type, pck_type, status', 'subscription', '', array('id', 'DESC'), '');
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/subscription');
		$this->load->view('admin/footer');
	}
	
	public function add()
	{
		$data = array(
			'title' => 'Add Subscription',
			'page' => 'Subscription',
			'subpage' => 'subscription'
		);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/add_sub');
		$this->load->view('admin/footer');
	}
	function addsub(){
		
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('pck_name', 'Subscription Name', 'required|trim');
			$this->form_validation->set_rules('pck_desc', 'Subscription description', 'required|trim');
			//$this->form_validation->set_rules('pck_amount', 'Subscription amount', 'required|trim'); 
			//$this->form_validation->set_rules('pck_duration_1', 'Subscription duration', 'required|trim'); 
			//$this->form_validation->set_rules('pck_duration_2', 'Subscription duration', 'required|trim'); 
			$this->form_validation->set_rules('pckstatus', 'status', 'required|trim'); 
			//$this->form_validation->set_rules('user_type', 'User Type', 'required|trim'); 
			$this->form_validation->set_rules('pck_type', 'Subscription Type', 'required|trim'); 
			if($this->form_validation->run() == true){
                    if($this->input->post('pck_type') == 'Paid'){
						$amount = strip_tags($this->input->post('pck_amount'));
					}else{
						$amount = '';
					}				
					$data = array(
						'name' => strip_tags($this->input->post('pck_name')),
						'description' => $this->input->post('pck_desc'),
						'amount' => $amount,
						'duration' => strip_tags($this->input->post('pck_duration_1')).'-'.strip_tags($this->input->post('pck_duration_2')),
						'status' => strip_tags($this->input->post('pckstatus')),
						'pck_type' => strip_tags($this->input->post('pck_type')),
						'invitation_limit' => strip_tags($this->input->post('invite_limit')),
						'invitation_limit_duaration' => strip_tags($this->input->post('invite_duration')),
						'created_at'   => date('Y-m-d H:i:s')
					);
					$result= $this->Adminmodel->add('subscription', $data);
					if($result){
						$response['status'] = 1;
						$response['message'] = 'Subscription addedd successfully.';
					}else{
						$response['status'] = 0;
						$response['message'] = 'Some error ocure.Please try again.';
					}
			//}
		}else{
			  $response = array(
					'vali_error'   => 1,
					'pck_name_error' => form_error('pck_name'),
					'pck_desc_error' => form_error('pck_desc'),
					//'pck_amount_error' => form_error('pck_amount'),
					//'pck_duration_1_error' => form_error('pck_duration_1'),
					//'pck_duration_2_error' => form_error('pck_duration_2'),
					'status_error' => form_error('pckstatus'),
					//'user_type_error' => form_error('user_type'),
					'pck_type_error' => form_error('pck_type'),
				);
		}
		}
		echo json_encode($response);
	}
    
		public function edit($id){
		$data = array(
			'title' => 'Edit Subscription',
			'page' => 'Subscription',
			'subpage' => 'subscription'
		);
        $data['pcklist'] = $this->Adminmodel->get_by('subscription', 'single', array('id' => $id), '', 1);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_sub');
		$this->load->view('admin/footer');
	}
	
		function editsub(){
		$packageId = strip_tags($this->input->post('pck_id'));
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('pck_name', 'Subscription name', 'required|trim');
			$this->form_validation->set_rules('pck_desc', 'Subscription description', 'required|trim');
			//$this->form_validation->set_rules('pck_amount', 'Subscription amount', 'required|trim|numeric'); 
			//$this->form_validation->set_rules('pck_duration_1', 'Subscription duration', 'required|trim'); 
			//$this->form_validation->set_rules('pck_duration_2', 'Subscription duration', 'required|trim'); 
			$this->form_validation->set_rules('pckstatus', 'status', 'required|trim');
            //$this->form_validation->set_rules('user_type', 'User Type', 'required|trim');
            $this->form_validation->set_rules('pck_type', 'Subscription Type', 'required|trim'); 			
			if($this->form_validation->run() == true){
                    if($this->input->post('pck_type') == 'Paid'){
						$amount = strip_tags($this->input->post('pck_amount'));
					}else{
						$amount = '';
					}				
					$data = array(
						'name' => strip_tags($this->input->post('pck_name')),
						'description' => $this->input->post('pck_desc'),
						'amount' => $amount,
						'duration' => strip_tags($this->input->post('pck_duration_1')).'-'.strip_tags($this->input->post('pck_duration_2')),
						'status' => strip_tags($this->input->post('pckstatus')),
						//'user_type' => strip_tags($this->input->post('user_type')),
						'pck_type' => strip_tags($this->input->post('pck_type')),
						'invitation_limit' => strip_tags($this->input->post('invite_limit')),
						'invitation_limit_duaration' => 'Per Month',
						'updated_at'   => date('Y-m-d H:i:s')
					);
					$result= $this->Adminmodel->update($data, 'subscription', array('id' => $packageId));
					if($result){
						$response['status'] = 1;
						$response['message'] = 'Subscription updated successfully.';
					}else{
						$response['status'] = 0;
						$response['message'] = 'Some error ocure.Please try again.';
					}
			//}
		}else{
			  $response = array(
					'vali_error'   => 1,
					'pck_name_error' => form_error('pck_name'),
					'pck_desc_error' => form_error('pck_desc'),
					//'pck_amount_error' => form_error('pck_amount'),
					//'pck_duration_1_error' => form_error('pck_duration_1'),
					//'pck_duration_2_error' => form_error('pck_duration_2'),
					'status_error' => form_error('pckstatus'),
					//'user_type_error' => form_error('user_type'),
				);
		}
		}
		echo json_encode($response);
	}
	function delete($id){
		if(empty($id)){
			return false;
		}
		$result = $this->db->query('delete from subscription where id = '.$id.'');
		if($result){
			$msg = '["Subscription is deleted successfully.", "success", "#A5DC86"]';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/subscription'),'refresh');
		}else{
			$msg = 'error';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/subscription'),'refresh');
		}
	}
	public function changestatus()
	{
		if ($this->input->post('pckId')) {
			$pckId = $this->input->post('pckId');
			$status = $this->input->post('status');
			if ($status == 1) {
				$msg = 'Subscription status is Activate';
			} else {
				$msg = 'Subscription status is Inctivate';
			}
			
			if ($this->Adminmodel->update(['status'=>$status], 'subscription', ['id'=>$pckId])) {
				echo '["'.$msg.'", "success", "#A5DC86"]';
			} else {
				echo '["Some error occured, Please try again!", "error", "#DD6B55"]';
			}
		}
	}
	
	
}