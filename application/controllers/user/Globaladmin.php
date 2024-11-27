<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Globaladmin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		//$this->Adminmodel->loggedIn();
		
		
	}

	public function index()
	{
		$data = array(
			'title' => 'Pact For Pain',
			'page' => 'Global Admin List',
			'subpage' => 'globaladmin'
		);
		
		//echo $this->session->has_userdata('userId');die; 
        $data['userlist'] = $this->Adminmodel->get_all_record('*', 'users', array('user_type' => 4), array('id', 'DESC'), '');
		$this->load->view('user/header', $data);
		$this->load->view('user/sidebar');
		$this->load->view('user/globaladmin');
		$this->load->view('user/footer');
	}
	
	public function add()
	{
		$data = array(
			'title' => 'Pact For Pain',
			'page' => 'Add Global Admin',
			'subpage' => 'globaladmin'
		);
		
		

		$this->load->view('user/header', $data);
		$this->load->view('user/sidebar');
		$this->load->view('user/add_global_admin');
		$this->load->view('user/footer');
	}
	
	public function addUser(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('password', 'password', 'required|trim|min_length[6]');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check'); 
			$this->form_validation->set_rules('fname', 'First Name', 'required|trim'); 
			$this->form_validation->set_rules('lname', 'Last Name', 'required|trim'); 
			$this->form_validation->set_rules('status', 'Status', 'required|trim'); 

			if($this->form_validation->run() == true){ 

				$data = array(					
					'fname' => strip_tags($this->input->post('fname')),
					'lname' => strip_tags($this->input->post('lname')),
					'email' => strip_tags($this->input->post('email')),
					'status' => strip_tags($this->input->post('status')),
					'password' => md5($this->input->post('password')),
					'user_type' => 4,
					'created_at' => date('Y-m-d H:i:s')
				);

				$result= $this->Adminmodel->add('users', $data);
				if($result){
					$response['status'] = 1;
					$response['message'] = 'Global admin added successfully.';
				}else{
					$response['status'] = 0;
					$response['message'] = 'Some error occurred.Please try again.';
				}

			}else{
				$response = array(
					'vali_error'   => 1,
					'pass_error' => form_error('password'),
					'cnfpass_error' => form_error('confirm_password'),
					'email_error' => form_error('email'),
					'fname_error' => form_error('fname'),
					'lname_error' => form_error('lname'),
					'status_error' => form_error('status'),
				);
			}
		}
		echo json_encode($response);
	}
	
	public function email_check($str){ 
        $con = array( 
            'returnType' => 'count', 
            'conditions' => array( 
                'email' => $str 
            ) 
        ); 
        $checkEmail = $this->Adminmodel->UniqueEmail($con); 
		if($checkEmail->num_rows() > 0){ 
            $this->form_validation->set_message('email_check', 'The given email already exists.'); 
            return FALSE; 
        }else{ 
            return TRUE; 
        } 
    }
	
	public function edit($id)
	{
		
		if(empty(@$id)){
			return false;exit();
		}
		
		$data = array(
			'title' => 'Pact For Pain',
			'page' => 'Edit Global Admin',
			'subpage' => 'globaladmin'
		);
		
		// //echo $this->session->has_userdata('userId');die; 
		// if($_SERVER['REQUEST_METHOD'] == 'POST'){
			// $mydata = array(
				// 'name' => $this->testInput($this->input->post('name')),
				// 'username' => $this->testInput($this->input->post('username')),
				// 'email' => $this->testInput($this->input->post('email')),
				// 'edited' => date('Y-m-d H:i:s'),
			// );
			
			// if (!empty($_FILES['profilePic']['name'])) {

				// $config['upload_path'] = './uploads/admin/';
				// $config['allowed_types'] = 'jpeg|jpg|png';
				// $config['max_size']  = '10240';

				// $this->load->library('upload');
				// $this->upload->initialize($config);

				// if ( ! $this->upload->do_upload('profilePic')){
					// $error = strip_tags($this->upload->display_errors());
				// } else {
					// $logoArray = $this->upload->data();
					// //$oldProfilePic = $this->input->post('oldProfilePic');
					// $mydata['profilePic'] = $logoArray['file_name'];
				// }
			// }
			
			// if($this->input->post('password')){
				// $mydata['password'] = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
			// }
			
			// $result= $this->Adminmodel->update($mydata, 'admin', array('userId' => $id));
			
			// if($result){
				
				// $this->session->set_flashdata('success', 'Global admin added successfully');
				// redirect(base_url('admin/globaladmin'));
			// }else{
				// $this->session->set_flashdata('error', 'Some error occurred.Please try again.');
				// redirect(base_url('admin/globaladmin'));
			// }
			
			
		// }
		
		$data['result'] = $this->Adminmodel->get_by('users', 'single', array('id' => $id), '', 1);

		$this->load->view('user/header', $data);
		$this->load->view('user/sidebar');
		$this->load->view('user/edit_global_admin');
		$this->load->view('user/footer');
	}
	
	public function editUser(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('id', 'id', 'required|trim');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
			$this->form_validation->set_rules('fname', 'First Name', 'required|trim'); 
			$this->form_validation->set_rules('lname', 'Last Name', 'required|trim'); 
			$this->form_validation->set_rules('status', 'Status', 'required|trim'); 

			if($this->form_validation->run() == true){ 

				$data = array(					
					'fname' => strip_tags($this->input->post('fname')),
					'lname' => strip_tags($this->input->post('lname')),
					'email' => strip_tags($this->input->post('email')),
					'status' => strip_tags($this->input->post('status')),
					'updated_at' => date('Y-m-d H:i:s')
				);
				if($this->input->post('password')){
					$data = array('password' => md5($this->input->post('password')));
				}

				$result= $this->Adminmodel->update(['id' => $this->input->post('id')], 'users', $data);
				if($result){
					$response['status'] = 1;
					$response['message'] = 'Global admin updated successfully.';
				}else{
					$response['status'] = 0;
					$response['message'] = 'Some error occurred.Please try again.';
				}

			}else{
				$response = array(
					'vali_error'   => 1,
					'pass_error' => form_error('password'),
					'email_error' => form_error('email'),
					'fname_error' => form_error('fname'),
					'lname_error' => form_error('lname'),
					'status_error' => form_error('status'),
					'id_error' => form_error('id'),
				);
			}
		}
		echo json_encode($response);
	}
	
	public function changestatus()
	{
		if ($this->input->post('userId')) {
			$userId = $this->input->post('userId');
			$status = $this->input->post('status');
			if ($status == 1) {
				$msg = 'Your status is Activate';
			} else {
				$msg = 'Your status is Inctivate';
			}
			
			if ($this->Adminmodel->update(['status'=>$status], 'users', ['id'=>$userId])) {
				echo '["'.$msg.'", "success", "#A5DC86"]';
			} else {
				echo '["Some error occured, Please try again!", "error", "#DD6B55"]';
			}
		}
	}
	
	function deleteUser($id){
		if(empty($id)){
			return false;
		}
		$result = $this->db->query('delete from users where id = '.$id.'');
		if($result){
			$msg = '["Global admin is deleted successfully.", "success", "#A5DC86"]';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('user/globaladmin'),'refresh');
		}else{
			$msg = 'error';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('user/globaladmin'),'refresh');
		}
	}
	 public function testInput($data)
	{
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	function crop_CoverImage (){
		$data = $_POST['image'];
		$image_array_1 = explode(";", $data);
		$image_array_2 = explode(",", $image_array_1[1]);
		$data = base64_decode($image_array_2[1]);
		$imageName = time().'.png';
		$image_name = 'uploads/profile/'.$imageName;
		file_put_contents($image_name, $data);
	    echo $imageName;
	}

}