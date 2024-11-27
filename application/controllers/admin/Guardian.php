<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Guardian extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->Adminmodel->loggedIn();
	}

   public function index()
	{
		$data = array(
			'title' => 'Manage Guardian',
			'page' => 'guardian',
			'subpage' => 'guardian'
		);
      

        $data['guardian'] = $this->Adminmodel->get_all_record('id, first_name, last_name, email, phone, address, status', 'users', array('user_type' => 'Guardian'), array('id', 'DESC'), '');
		
		//$data['sportslist'] = $this->Adminmodel->get_all_record('*', 'sports', '', array('id', 'DESC'), '');
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/guardian');
		$this->load->view('admin/footer');
	}
	
	public function add()
	{
		$data = array(
			'title' => 'Add Guardian',
			'page' => 'guardian',
			'subpage' => 'guardian'
		);
      

        //$data['guardian'] = $this->Adminmodel->get_all_record('id, first_name, last_name, email, phone, address, status', 'users', array('user_type' => 'Guardian'), array('id', 'DESC'), '');

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/add_guardian');
		$this->load->view('admin/footer');
	}
	
	public function addguardian(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('fname', 'First Name', 'required|trim');
			$this->form_validation->set_rules('lname', 'Last Name', 'required|trim');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check'); 
			$this->form_validation->set_rules('phone', 'Phone', 'required|trim');
			$this->form_validation->set_rules('address', 'Address', 'required|trim');
			$this->form_validation->set_rules('status', 'Status', 'required|trim');
			$this->form_validation->set_rules('password', 'password', 'required|trim|min_length[8]');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
			
			if($this->form_validation->run() == true){
				
			 if(!empty(strip_tags($this->input->post('profileImg')))){
				// $config['upload_path'] = 'uploads/profile_image'; # check path is correct
					// $config['allowed_types'] = 'jpg|png|jpeg'; # add video extenstion on here
					// $config['overwrite'] = FALSE;
					// $config['remove_spaces'] = TRUE;
					// $image_name = preg_replace("/\s+/", "_", $_FILES['profile_image']['name']);
					// $config['file_name'] = $image_name;
					// $this->load->library('upload', $config);
					// $this->upload->initialize($config);
					// if (!$this->upload->do_upload('profile_image')) {
						// $array = array('error' => true, 'profile_image_error' => $this->upload->display_errors());
						// echo json_encode($array);
						// exit();
					// } else {
						 //$url = $image_name;
						 $data = array(
							
							 'first_name' => strip_tags($this->input->post('fname')),
						     'last_name' => strip_tags($this->input->post('lname')),
							 'email' => strip_tags($this->input->post('email')),
							 'phone' => strip_tags($this->input->post('phone')),
							 'profile_image' => strip_tags($this->input->post('profileImg')),
							 'address' => strip_tags($this->input->post('address')),
							 'latitude' => strip_tags($this->input->post('latitude')),
							 'longitude' => strip_tags($this->input->post('longitude')),
							 'password' => md5($this->input->post('longitude')),
							 'status' => strip_tags($this->input->post('status')),
							 'user_type' => 'Guardian',
							 'created_at'   => date('Y-m-d H:i:s')
						 );
						 $result= $this->Adminmodel->add('users', $data);
						 if($result){
							if(!empty($this->input->post('coverImg'))){
								$CoverImgdata = array('cover_image' => $this->input->post('coverImg'));
								$this->Adminmodel->update($CoverImgdata, 'users', array('id' => $result));
							}
							$response['status'] = 1;
							$response['message'] = 'Guardian addedd successfully.';
						 }else{
							 $response['status'] = 0;
							 $response['message'] = 'Some error ocure.Please try again.';
						 }
					 
			 }else{
					$data = array(
						
						'first_name' => strip_tags($this->input->post('fname')),
						'last_name' => strip_tags($this->input->post('lname')),
						'email' => strip_tags($this->input->post('email')),
						'phone' => strip_tags($this->input->post('phone')),
						'address' => strip_tags($this->input->post('address')),
						'latitude' => strip_tags($this->input->post('latitude')),
						'longitude' => strip_tags($this->input->post('longitude')),
						'password' => md5($this->input->post('longitude')),
						'status' => strip_tags($this->input->post('status')),
						'user_type' => 'Guardian',
						'created_at'   => date('Y-m-d H:i:s')
					);
					$result= $this->Adminmodel->add('users', $data);
					if($result){
						
						if(!empty($this->input->post('coverImg'))){
							$CoverImgdata = array('cover_image' => $this->input->post('coverImg'));
							$this->Adminmodel->update($CoverImgdata, 'users', array('id' => $result));
						}
						$response['status'] = 1;
						$response['message'] = 'Team coach addedd successfully.';
					}else{
						$response['status'] = 0;
						$response['message'] = 'Some error ocure.Please try again.';
					}
			}
		}else{
			  $response = array(
				'vali_error'   => 1,
				'pass_error' => form_error('password'),
				'cnfpass_error' => form_error('confirm_password'),
				'email_error' => form_error('email'),
				'fname_error' => form_error('fname'),
				'lname_error' => form_error('lname'),
				'phone_error' => form_error('phone'),
				'address_error' => form_error('address'),
				'status_error' => form_error('status')
				);
		}
	}
		
		echo json_encode($response);
	}
	
	public function edit($id)
	{
		$data = array(
			'title' => 'Edit Guardian',
			'page' => 'guardian',
			'subpage' => 'guardian'
		);
      

        $data['guardian'] = $this->Adminmodel->get_all_record('*', 'users', array('id' => $id), '', 1);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_guardian');
		$this->load->view('admin/footer');
	}
	
	public function editguardian(){
		$userId = strip_tags($this->input->post('user_id'));
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('fname', 'First Name', 'required|trim');
			$this->form_validation->set_rules('lname', 'Last Name', 'required|trim');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
			$this->form_validation->set_rules('phone', 'Phone', 'required|trim');
			$this->form_validation->set_rules('address', 'Address', 'required|trim');
			$this->form_validation->set_rules('status', 'Status', 'required|trim');
			if($this->form_validation->run() == true){
				
			 if(!empty(strip_tags($this->input->post('profileImg')))){
						 $data = array(
							
							 'first_name' => strip_tags($this->input->post('fname')),
						     'last_name' => strip_tags($this->input->post('lname')),
							 'email' => strip_tags($this->input->post('email')),
							 'phone' => strip_tags($this->input->post('phone')),
							 'profile_image' => strip_tags($this->input->post('profileImg')),
							 'address' => strip_tags($this->input->post('address')),
							 'latitude' => strip_tags($this->input->post('latitude')),
							 'longitude' => strip_tags($this->input->post('longitude')),
							 'password' => md5($this->input->post('longitude')),
							 'status' => strip_tags($this->input->post('status')),
							 'user_type' => 'Guardian',
							 'created_at'   => date('Y-m-d H:i:s')
						 );
						 $result= $this->Adminmodel->update($data, 'users', array('id' => $userId));
						 if($result){
							if(!empty($this->input->post('coverImg'))){
								$CoverImgdata = array('cover_image' => $this->input->post('coverImg'));
								$this->Adminmodel->update($CoverImgdata, 'users', array('id' => $result));
							}
							$response['status'] = 1;
							$response['message'] = 'Guardian updated successfully.';
						 }else{
							 $response['status'] = 0;
							 $response['message'] = 'Some error ocure.Please try again.';
						 }
					 
			 }else{
					$data = array(
						
						'first_name' => strip_tags($this->input->post('fname')),
						'last_name' => strip_tags($this->input->post('lname')),
						'email' => strip_tags($this->input->post('email')),
						'phone' => strip_tags($this->input->post('phone')),
						'address' => strip_tags($this->input->post('address')),
						'latitude' => strip_tags($this->input->post('latitude')),
						'longitude' => strip_tags($this->input->post('longitude')),
						'password' => md5($this->input->post('longitude')),
						'status' => strip_tags($this->input->post('status')),
						'user_type' => 'Guardian',
						'created_at'   => date('Y-m-d H:i:s')
					);
					$result= $this->Adminmodel->update($data, 'users', array('id' => $userId));
					if($result){
						
						if(!empty($this->input->post('coverImg'))){
							$CoverImgdata = array('cover_image' => $this->input->post('coverImg'));
							$this->Adminmodel->update($CoverImgdata, 'users', array('id' => $result));
						}
						$response['status'] = 1;
						$response['message'] = 'Guardian updated successfully.';
					}else{
						$response['status'] = 0;
						$response['message'] = 'Some error ocure.Please try again.';
					}
			}
		}else{
			  $response = array(
				'vali_error'   => 1,
				'pass_error' => form_error('password'),
				'cnfpass_error' => form_error('confirm_password'),
				'email_error' => form_error('email'),
				'fname_error' => form_error('fname'),
				'lname_error' => form_error('lname'),
				'phone_error' => form_error('phone'),
				'address_error' => form_error('address'),
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
		$image_name = 'uploads/guardian/'.$imageName;
		file_put_contents($image_name, $data);
	    echo $imageName;
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
	
	public function view($id)
	{
		$data = array(
			'title' => 'View Guardian',
			'page' => 'guardian',
			'subpage' => 'guardian'
		);
      

        $data['guardian'] = $this->Adminmodel->get_all_record('*', 'users', array('id' => $id), '', 1);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/view_guardian');
		$this->load->view('admin/footer');
	}
	
	function delete($id){
		if(empty($id)){
			return false;
		}
		$result = $this->db->query('delete from users where id = '.$id.'');
		if($result){
			$msg = '["Guardian is deleted successfully.", "success", "#A5DC86"]';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/guardian'),'refresh');
		}else{
			$msg = 'error';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/guardian'),'refresh');
		}
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
	
}	