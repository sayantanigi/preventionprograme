<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Feature extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->Adminmodel->loggedIn();
	}
	
	public function index()
	{
		$data = array(
			'title' => 'Manage Features',
			'page' => 'cms',
			'subpage' => 'feature'
		);

		$data['features'] = $this->db->query("select * from features ORDER BY id DESC")->result();
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/manage_feature');
		$this->load->view('admin/footer');
	}
	
	function add(){
		$data = array(
			'title' => 'Add Features',
			'page' => 'cms',
			'subpage' => 'feature'
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/add_feature');
		$this->load->view('admin/footer');
	}
	
	function addFeature(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('heading', 'Heading', 'required|trim');
			$this->form_validation->set_rules('description', 'Description', 'required|trim');
			$this->form_validation->set_rules('status', 'Status', 'required|trim');
			if($this->form_validation->run() == true){ 
				if(!empty($_FILES['upload_image']['name'])){
					$config['upload_path'] = 'uploads/feature'; # check path is correct
					$config['allowed_types'] = 'jpg|png|jpeg|gif|mov|mp4|3gp|ogg|ogv|webm'; # add video extenstion on here
					$config['overwrite'] = FALSE;
					$config['remove_spaces'] = TRUE;
					$image_name = preg_replace("/\s+/", "_", $_FILES['upload_image']['name']);
					$config['file_name'] = $image_name;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('upload_image')) {
						$array = array('error' => true, 'upload_image' => $this->upload->display_errors());
						echo json_encode($array);
						exit();
					}else {
						$url = $image_name;
						$data = array(
							'heading' => strip_tags($this->input->post('heading')),
							'description' => $this->input->post('description'),
							'image' => $image_name,
							'status' => strip_tags($this->input->post('status')),
							'updated_at'   => date('Y-m-d H:i:s')
						);
						$result= $this->Adminmodel->add('features', $data);
						if($result){
							$response['status'] = 1;
							$response['message'] = 'Feature added successfully.';
						}else{
							$response['status'] = 0;
							$response['message'] = 'Some error ocure.Please try again.';
						}
					}
				}else{
					$data = array(
						'heading' => strip_tags($this->input->post('heading')),
						'description' => $this->input->post('description'),
						'status' => strip_tags($this->input->post('status')),
						'updated_at'   => date('Y-m-d H:i:s')
					);
					$result= $this->Adminmodel->add('features', $data);
					if($result){
						$response['status'] = 1;
						$response['message'] = 'Feature added successfully.';
					}else{
						$response['status'] = 0;
						$response['message'] = 'Some error ocure.Please try again.';
					}
				}
			}else{
				$response = array(
					'vali_error'   => 1,
					'heading_error' => form_error('heading'),
					'description_error' => form_error('description'),
					'status_error' => form_error('status')
				);
			}
		}
		echo json_encode($response);
	}
	
	function edit($id){
		if(empty($id)){
			return false;
		}
		$data = array(
			'title' => 'Edit Features',
			'page' => 'cms',
			'subpage' => 'feature'
		);
		$data['feature'] = $this->Adminmodel->get_by('features', 'single', array('id' => $id), '', 1);
		//print_r($data['feature']);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_feature');
		$this->load->view('admin/footer');
	}
	
	function editFeature(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('heading', 'Heading', 'required|trim');
			$this->form_validation->set_rules('description', 'Description', 'required|trim');
			$this->form_validation->set_rules('status', 'Status', 'required|trim');
			if($this->form_validation->run() == true){ 
				if(!empty($_FILES['upload_image']['name'])){
					$config['upload_path'] = 'uploads/feature'; # check path is correct
					$config['allowed_types'] = 'jpg|png|jpeg|gif|mov|mp4|3gp|ogg|ogv|webm'; # add video extenstion on here
					$config['overwrite'] = FALSE;
					$config['remove_spaces'] = TRUE;
					$image_name = preg_replace("/\s+/", "_", $_FILES['upload_image']['name']);
					$config['file_name'] = $image_name;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('upload_image')) {
						$array = array('error' => true, 'upload_image' => $this->upload->display_errors());
						echo json_encode($array);
						exit();
					}else {
						$url = $image_name;
						$data = array(
							'heading' => strip_tags($this->input->post('heading')),
							'description' => $this->input->post('description'),
							'image' => $image_name,
							'status' => strip_tags($this->input->post('status')),
							'updated_at'   => date('Y-m-d H:i:s')
						);
						//$result= $this->Adminmodel->add('features', $data);
						$result= $this->Adminmodel->update($data, 'features', array('id' =>  $this->input->post('id')));
						if($result){
							$response['status'] = 1;
							$response['message'] = 'Feature updated successfully.';
						}else{
							$response['status'] = 0;
							$response['message'] = 'Some error ocure.Please try again.';
						}
					}
				}else{
					$data = array(
						'heading' => strip_tags($this->input->post('heading')),
						'description' => $this->input->post('description'),
						'status' => strip_tags($this->input->post('status')),
						'updated_at'   => date('Y-m-d H:i:s')
					);
					$result= $this->Adminmodel->update($data, 'features', array('id' =>  $this->input->post('id')));
					if($result){
						$response['status'] = 1;
						$response['message'] = 'Feature updated successfully.';
					}else{
						$response['status'] = 0;
						$response['message'] = 'Some error ocure.Please try again.';
					}
				}
			}else{
				$response = array(
					'vali_error'   => 1,
					'heading_error' => form_error('heading'),
					'description_error' => form_error('description'),
					'status_error' => form_error('status')
				);
			}
		}
		echo json_encode($response);
	}
	
	public function changestatus()
	{
		if ($this->input->post('faqId')) {
			$faqId = $this->input->post('faqId');
			$status = $this->input->post('status');
			if ($status == 1) {
				$msg = 'faq status is Activate';
			} else {
				$msg = 'faq status is Inctivate';
			}
			
			if ($this->Adminmodel->update(['status'=>$status], 'features', ['id'=>$faqId])) {
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
		$result = $this->db->query('delete from feature where id = '.$id.'');
		if($result){
			$msg = '["faq deleted successfully.", "success", "#A5DC86"]';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/feature'),'refresh');
		}else{
			$msg = 'error';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/feature'),'refresh');
		}
	}
}