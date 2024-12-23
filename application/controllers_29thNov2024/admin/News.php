<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class News extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->Adminmodel->loggedIn();
	}

   public function index()
	{
		
		$data = array(
			'title' => 'Team News',
			'page' => 'team-news',
			'subpage' => 'team-coach'
		);
		
        $data['userId'] = $userId = $this->uri->segment(4);
        $data['news'] = $this->Adminmodel->get_all_record('id, image, description, status, heading', 'team_news', array('user_id' => $userId), array('id', 'DESC'), '');

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/news');
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
		if(empty($_GET['uId'])){
		    return false;
		}
		$uId = $_GET['uId'];
		$sponserId = $_GET['id'];
		$result = $this->db->query('delete from team_news where id = '.$sponserId.'');
		if($result){
			$msg = '["News is deleted successfully.", "success", "#A5DC86"]';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/news/index/'.$uId.''),'refresh');
		}else{
			$msg = 'error';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/news/index/'.$uId.''),'refresh');
		}
	}
}	