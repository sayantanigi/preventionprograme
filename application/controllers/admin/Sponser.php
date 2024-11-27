<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sponser extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->Adminmodel->loggedIn();
	}

   public function index()
	{
		
		$data = array(
			'title' => 'Team Sponser',
			'page' => 'team-sponser',
			'subpage' => 'team-coach'
		);
		
        $data['userId'] = $userId = $this->uri->segment(4);
        $data['sponsers'] = $this->Adminmodel->get_all_record('id, image, user_id', 'sponser', array('user_id' => $userId), array('id', 'DESC'), '');
		//print_r( $data['sponsers'] );die;
        
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/sponser');
		$this->load->view('admin/footer');
	}
	
	 public function add()
	{
		
		$data = array(
			'title' => 'Add Sponser',
			'page' => 'team-sponser',
			'subpage' => 'team-coach'
		);
		
        

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/add_sponser');
		$this->load->view('admin/footer');
	}
	
	function addsponser(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if(!empty($_FILES['image']['name']) && count(array_filter($_FILES['image']['name'])) > 0){
				 $userId = $this->input->post('userId');
                 $filesCount = count($_FILES['image']['name']); 
					for($i = 0; $i < $filesCount; $i++){
						$_FILES['file']['name']     = $_FILES['image']['name'][$i]; 
						$_FILES['file']['type']     = $_FILES['image']['type'][$i]; 
						$_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'][$i]; 
						$_FILES['file']['error']     = $_FILES['image']['error'][$i]; 
						$_FILES['file']['size']     = $_FILES['image']['size'][$i]; 
						$config['upload_path'] = 'uploads/sponser'; 
						$config['allowed_types'] = 'jpg|png|jpeg|gif';
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						if (!$this->upload->do_upload('file')) {
							$this->session->set_flashdata('error', $this->upload->display_errors());
						}else{  
							$fileData = $this->upload->data();
							$uploadData[$i]['image'] = $fileData['file_name']; 
							$uploadData[$i]['userId'] = $userId; 
							
						} 
					}
					//print_r($uploadData);die;
					if(!empty($uploadData)){
						$result = $this->Adminmodel->add_multiple_image($uploadData);
						if($result){
							$response['status'] = 1;
							$response['message'] = 'Sponser addedd successfully.';
						}else{
							$response['status'] = 0;
							$response['message'] = 'Some error ocure.Please try again.';
						}
					}
				
				
		  }else{
			   $response = array(
					'vali_error'   => 1,
					'image_error' => 'Please select the images.'
				);
		  }
		}
		echo json_encode($response);	
	}
	
	public function edit($id)
	{
		$data = array(
			'title' => 'Edit Sponser',
			'page' => 'team-sponser',
			'subpage' => 'team-coach'
		);
		
		
        $data['sponser'] = $this->Adminmodel->get_by('sponser', 'single', array('id' => $id), '', 1);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_sponser');
		$this->load->view('admin/footer');
	}
	function editsponser(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$id = $this->input->post('userId');
			if(!empty($_FILES['upload_image']['name'])){
				//$filesCount = count($_FILES['upload_image']['name']); 
				$config['upload_path'] = 'uploads/sponser'; # check path is correct
				$config['allowed_types'] = 'jpg|png|jpeg|gif'; # add video extenstion on here
				$config['overwrite'] = FALSE;
				$config['remove_spaces'] = TRUE;
				$image_name = preg_replace("/\s+/", "_", $_FILES['upload_image']['name']);
				$config['file_name'] = $image_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('upload_image')) {
					$array = array('error' => true, 'profile_image_error' => $this->upload->display_errors());
					//echo json_encode($array);
					exit();
				} else {
					$url = $image_name;
					$data = array(
					'image' => $url,
					'updated_at'   => date('Y-m-d H:i:s')
					);
					$result = $this->Adminmodel->update($data, 'sponser', array('id' => $id));
					if($result){
						$response['status'] = 1;
						$response['message'] = 'Sponser updated successfully.';
					}else{
						$response['status'] = 0;
						$response['message'] = 'Some error ocure.Please try again.';
					}
				}	
			}else{
				$response = array(
					'vali_error'   => 1,
					'image_error' => 'Please select the images.'
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
		$result = $this->db->query('delete from sponser where id = '.$sponserId.'');
		if($result){
			$msg = '["Sponser is deleted successfully.", "success", "#A5DC86"]';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/sponser/index/'.$uId.''),'refresh');
		}else{
			$msg = 'error';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/sponser/index/'.$uId.''),'refresh');
		}
	}
	
}	