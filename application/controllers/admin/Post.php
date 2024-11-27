<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Post extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->Adminmodel->loggedIn();
		$this->load->model('Adminmodel');
	}
	public function Allpost($id)
	{
		if(empty($id)){
		  return false;
		}
		
		$data = array(
			'title' => 'Post',
			'page' => 'post',
			'subpage' => '',
		);
		$data['post'] = $this->Adminmodel->get_all_record('*', 'post', array('user_id' => $id), array('id', 'DESC'), '');
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/manage_post');
		$this->load->view('admin/footer');
	}
	function add($id){
		
		if(empty($id)){
		  return false;
		}
		
		$data = array(
			'title' => 'Add Post',
			'page' => 'post',
			'subpage' => '',
		);
		$data['userId'] = $id;
	    $this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/add_post');
		$this->load->view('admin/footer');
	}
	
	function submitImageGallery(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
		   if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0){
				$filesCount = count($_FILES['files']['name']); 
				for($i = 0; $i < $filesCount; $i++){ 
					$_FILES['file']['name']     = preg_replace("/\s+/", "_", $_FILES['files']['name'][$i]); 
					$_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
					$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
					$_FILES['file']['error']     = $_FILES['files']['error'][$i]; 
					$_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
					$uploadPath = 'uploads/post/'; 
					$config['upload_path'] = $uploadPath; 
					$config['allowed_types'] = 'jpg|jpeg|png|gif|mp4|ogg|ogv|3gp|mov|webm'; 
					$this->load->library('upload', $config); 
					$this->upload->initialize($config); 
					if($this->upload->do_upload('file')){ 
						// Uploaded file data 
						$fileData = $this->upload->data(); 
						$uploadData[$i]['image'] = $fileData['file_name']; 
						//$uploadData[$i]['userId'] = $this->input->post('userId');
						//$uploadData[$i]['status'] = $this->input->post('status');
				
					}else{  
						$this->session->set_flashdata('error', $this->upload->display_errors());
					} 
				}
				if(!empty($uploadData)){
					$data = array(
						'content' => strip_tags(trim($this->input->post('content'))),
						'user_id' => $this->input->post('userId'),
						'status' => $this->input->post('status'),
						'created_at' => date('Y-m-d H:i:s')
					);
					$result = $this->Adminmodel->add('post', $data);
					if($result){
						$postId = $result;
						$this->Adminmodel->uploadMultipleFilePost($postId, $uploadData);
						$response['status'] = '1';
						$response['message'] = 'Your post added sucussfully.';
					}
				}
				
		   }
		   
	   }
	   echo json_encode($response);
	}
	
	function edit($id){
		
		if(empty($id)){
		  return false;
		}
		
		$data = array(
			'title' => 'Edit Post',
			'page' => 'post',
			'subpage' => '',
		);
		$data['post'] = $this->Adminmodel->get_all_record('*', 'post', array('id' => $id), array('id', 'DESC'), '');
	    $this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_post');
		$this->load->view('admin/footer');
	}
	function deleteImage(){
		$id = $this->input->post('id');
		$delete = $this->db->delete('post_gallery', array('id' => $id));
		if($delete){ 
		  $status = 'ok'; 
		}else{ 
		  $status  = 'err'; 
		} 
		echo $status;die;
	}
	function editPost(){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
		   if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0){
				$filesCount = count($_FILES['files']['name']); 
				for($i = 0; $i < $filesCount; $i++){ 
					$_FILES['file']['name']     = preg_replace("/\s+/", "_", $_FILES['files']['name'][$i]); 
					$_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
					$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
					$_FILES['file']['error']     = $_FILES['files']['error'][$i]; 
					$_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
					$uploadPath = 'uploads/post/'; 
					$config['upload_path'] = $uploadPath; 
					$config['allowed_types'] = 'jpg|jpeg|png|gif|mp4|ogg|ogv|3gp|mov|webm'; 
					$this->load->library('upload', $config); 
					$this->upload->initialize($config); 
					if($this->upload->do_upload('file')){ 
						// Uploaded file data 
						$fileData = $this->upload->data(); 
						$uploadData[$i]['image'] = $fileData['file_name']; 
						//$uploadData[$i]['userId'] = $this->input->post('userId');
						//$uploadData[$i]['status'] = $this->input->post('status');
				
					}else{  
						$this->session->set_flashdata('error', $this->upload->display_errors());
					} 
				}
				if(!empty($uploadData)){
					$data = array(
						'content' => strip_tags(trim($this->input->post('content'))),
						'status' => $this->input->post('status'),
						'created_at' => date('Y-m-d H:i:s')
					);
					$result = $this->Adminmodel->update($data, 'post', array('id' => $this->input->post('postId')));
					if($result){
						$this->Adminmodel->uploadMultipleFilePost_update($this->input->post('postId'), $uploadData);
						$response['status'] = '1';
						$response['message'] = 'Your post updated sucussfully.';
						$response['userId'] = $this->input->post('userId');
					}
				}
				
		   }else{
			   $data = array(
					'content' => strip_tags(trim($this->input->post('content'))),
					'status' => $this->input->post('status'),
					'created_at' => date('Y-m-d H:i:s')
				);
				$result = $this->Adminmodel->update($data, 'post', array('id' => $this->input->post('postId')));
				if($result){
					$response['status'] = '1';
					$response['message'] = 'Your post updated sucussfully.';
					$response['userId'] = $this->input->post('userId');
				}
		   }
	   }
	   echo json_encode($response);
	}
	function editsubmitImageGallery(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
		   if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0){
				$filesCount = count($_FILES['files']['name']); 
				for($i = 0; $i < $filesCount; $i++){ 
				$_FILES['file']['name']     = preg_replace("/\s+/", "_", $_FILES['files']['name'][$i]); 
				$_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
				$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
				$_FILES['file']['error']     = $_FILES['files']['error'][$i]; 
				$_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
				$uploadPath = 'uploads/gallery/image'; 
				$config['upload_path'] = $uploadPath; 
				$config['allowed_types'] = 'jpg|jpeg|png|gif|mp4|ogg|ogv|3gp|mov|webm'; 
				$this->load->library('upload', $config); 
				$this->upload->initialize($config); 
				if($this->upload->do_upload('file')){ 
					// Uploaded file data 
					$fileData = $this->upload->data(); 
					$uploadData[$i]['image'] = $fileData['file_name']; 
					$uploadData[$i]['status'] = $this->input->post('status');
			
				}else{  
					$this->session->set_flashdata('error', $this->upload->display_errors());
				} 
				}
				if(!empty($uploadData)){
					$result = $this->Adminmodel->updateMultipleFile($uploadData, $this->input->post('imageId'));
					
					if($result){
						$previousUrl= $_SERVER['HTTP_REFERER'];
						$response['status'] = '1';
						$response['message'] = 'Your Images updated sucussfully.';
						$response['preURL'] = $previousUrl;
					}
				}
				
		   }
	   }
	   echo json_encode($response);
	}
	
	// function edit($id){
		
		// if(empty($id)){
		  // return false;
		// }
		
		// $data = array(
			// 'title' => 'Edit Player Images',
			// 'page' => 'Edit Image',
			// 'subpage' => '',
		// );
        // $data['gallery'] = $this->Adminmodel->get_all_record('*', 'player_img_gallery', array('id' => $id), '', '');	
	    // $this->load->view('admin/header', $data);
		// $this->load->view('admin/sidebar');
		// $this->load->view('admin/edit_player_image');
		// $this->load->view('admin/footer');
	// }
	
	public function changestatus()
	{
		if ($this->input->post('postId')) {
			$postId = $this->input->post('postId');
			$status = $this->input->post('status');
			if ($status == 1) {
				$msg = 'Your status is Activate';
			} else {
				$msg = 'Your status is Inctivate';
			}
			
			if ($this->Adminmodel->update(['status'=>$status], 'post', ['id'=>$postId])) {
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
	    $previousUrl= $_SERVER['HTTP_REFERER'];
		$result = $this->db->query('delete from post where id = '.$id.'');
		if($result){
			$this->db->query('delete from post_gallery where post_id = '.$id.'');
			$msg = '["Image is deleted successfully.", "success", "#A5DC86"]';
			$this->session->set_flashdata('msg', $msg);
			redirect($previousUrl,'refresh');
		}else{
			$msg = 'error';
			$this->session->set_flashdata('msg', $msg);
			redirect($previousUrl,'refresh');
		}
	}
}	