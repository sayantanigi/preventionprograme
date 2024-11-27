<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	
	 public function __construct()
	{
		parent::__construct();
		$this->load->model('Mymodel');
		$this->Mymodel->loggedIn();
	}
	
	 public function edit(){
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Edit Profile',
			'subpage' => 'profile',
		);
		$userId = $this->session->userdata('loguserId');
		$query = $this->db->query("select * from users where status = '1' and id = ".@$userId." ORDER BY id DESC");
		$data['user'] = ($query->num_rows() > 0) ? $query->row() : FALSE;
		$this->load->view('header', $data);
		$this->load->view('account/edit_profile');
		$this->load->view('footer');
	}
	
	function editProfile(){
		$userId = $this->session->userdata('loguserId');
		
		$userEmail = $this->db->query("select email from users where id = ".@$userId."")->row();
		
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('fname', 'First Name', 'required|trim'); 
			$this->form_validation->set_rules('lname', 'Last Name', 'required|trim'); 
			if($userEmail->email != strip_tags($this->input->post('email'))){
			   $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|callback_email_check');
			} else {
			    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email'); 
			}
			$this->form_validation->set_rules('phone', 'Phone', 'required|trim'); 
			if($this->form_validation->run() == true){

					if(!empty($_FILES['profileImg']['name'])){
						$config['upload_path'] = 'uploads/profile'; # check path is correct
						$config['allowed_types'] = 'jpg|png|jpeg'; # add video extenstion on here
						$config['overwrite'] = FALSE;
						$config['remove_spaces'] = TRUE;
						$image_name = preg_replace("/\s+/", "_", $_FILES['profileImg']['name']);
						$config['file_name'] = $image_name;
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						if (!$this->upload->do_upload('profileImg')) {
						$array = array('vali_error' => 1, 'product_image_err' => $this->upload->display_errors());
						echo json_encode($array);
						exit();
						}else {
							$data = array(
								'fname' => strip_tags($this->input->post('fname')),
								'lname' => strip_tags($this->input->post('lname')),
								'email' => strip_tags($this->input->post('email')),
								'phone' => strip_tags($this->input->post('full')),
								'about' => strip_tags($this->input->post('about')),
								'address' => strip_tags($this->input->post('address')),
								'latitude' => strip_tags($this->input->post('latitude')),
								'longitude' => strip_tags($this->input->post('longitude')),
								'country' => strip_tags($this->input->post('country')),
								'state' => strip_tags($this->input->post('state')),
								'city' => strip_tags($this->input->post('city')),
								'zipcode' => strip_tags($this->input->post('zipcode')),
								'image' => $image_name,
								'facebook' => strip_tags($this->input->post('facebook')),
								'instagram' => strip_tags($this->input->post('instagram')),
								'twitter' => strip_tags($this->input->post('twitter')),
								'pinterest' => strip_tags($this->input->post('pinterest')),
								'cashapp' => strip_tags($this->input->post('cashapp')),
								'zelle' => strip_tags($this->input->post('zelle')),
								'venmo' => strip_tags($this->input->post('venmo')),
								'apple_pay' => strip_tags($this->input->post('apple_pay')),
								'updated_at'   => date('Y-m-d H:i:s')
							);
							$result= $this->Mymodel->update($data, 'users', array('id' => $userId));
							if($result){
								$response['status'] = 1;
								$response['message'] = 'Your profile information is updated successfully.';
							}else{
								$response['status'] = 0;
								$response['message'] = 'Some error ocure.Please try again.';
							}
						}
                    }else{
						$data = array(
							'fname' => strip_tags($this->input->post('fname')),
							'lname' => strip_tags($this->input->post('lname')),
							'email' => strip_tags($this->input->post('email')),
							'phone' => strip_tags($this->input->post('full')),
							'about' => strip_tags($this->input->post('about')),
							'address' => strip_tags($this->input->post('address')),
							'latitude' => strip_tags($this->input->post('latitude')),
							'longitude' => strip_tags($this->input->post('longitude')),
							'country' => strip_tags($this->input->post('country')),
							'state' => strip_tags($this->input->post('state')),
							'city' => strip_tags($this->input->post('city')),
							'zipcode' => strip_tags($this->input->post('zipcode')),
							'facebook' => strip_tags($this->input->post('facebook')),
							'instagram' => strip_tags($this->input->post('instagram')),
							'twitter' => strip_tags($this->input->post('twitter')),
							'pinterest' => strip_tags($this->input->post('pinterest')),
							'cashapp' => strip_tags($this->input->post('cashapp')),
							'zelle' => strip_tags($this->input->post('zelle')),
							'venmo' => strip_tags($this->input->post('venmo')),
							'apple_pay' => strip_tags($this->input->post('apple_pay')),
							'updated_at'   => date('Y-m-d H:i:s')
						);
						$result= $this->Mymodel->update($data, 'users', array('id' => $userId));
						if($result){
							$response['status'] = 1;
							$response['message'] = 'Your profile information is updated successfully.';
						}else{
							$response['status'] = 0;
							$response['message'] = 'Some error ocure.Please try again.';
						}
					}					
					
					
			
		}else{
			  $response = array(
					'vali_error'   => 1,
					'email_error' => form_error('email'),
					'phone_error' => form_error('phone'),
					'fname_error' => form_error('fname'),
					'lname_error' => form_error('lname')
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
        $checkEmail = $this->Mymodel->UniqueEmail($con); 
		if($checkEmail->num_rows() > 0){ 
            $this->form_validation->set_message('email_check', 'The given email already exists.'); 
            return FALSE; 
        }else{ 
            return TRUE; 
        } 
    }
	
	function change_password(){
		$userId = $this->session->userdata('loguserId');
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('current_pass', 'Enter Current Password', 'required|callback_password_check'); 
			$this->form_validation->set_rules('new_pass', 'Enter New Password', 'required|trim|min_length[6]'); 
			$this->form_validation->set_rules('cnf_pass', 'Re-enter New Password', 'required|matches[new_pass]'); 
			if($this->form_validation->run() == true) {
				$newpass = $this->input->post('new_pass');
				//print_r($newpass);die;
				$result = $this->Mymodel->update(array('password' => md5($newpass)), 'users', array('id' => $userId));
				
				if(!empty($result)){
					$response['status'] = 1;
					$response['message'] = 'Your password change successfully.';
				} else {
					$response['status'] = 0;
					$response['message'] = 'Some error ocure.Please try again.';
				}
			}else{
				$response = array(
					'vali_error'   => 1,
					'current_pass_error' => form_error('current_pass'),
					'new_pass_error' => form_error('new_pass'),
					'cnf_pass_error' => form_error('cnf_pass'),
				);
			}
		}
		echo json_encode($response);
	}
	
	public function password_check($oldpass){
        $userId = $this->session->userdata('loguserId');
        $getPassword = $this->Mymodel->getOldPassword($userId);

        if($getPassword[0]->password !== md5($oldpass)) {
            $this->form_validation->set_message('password_check', 'The {field} does not match');
            return false;
        }

        return true;
    }
	
}	
	