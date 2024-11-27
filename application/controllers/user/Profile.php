<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->Adminmodel->userloggedIn();
	}


	public function index()
	{
		$data = array(
			'title' => 'Update Profile'
		);
		$data['userId'] = $userId = $this->session->userdata('USER_ID');
		$data['data'] = $this->Adminmodel->get('users', true, 'id', $userId);

		$this->load->view('user/header', $data);
		$this->load->view('user/sidebar');
		$this->load->view('user/profile');
		$this->load->view('user/footer');
	}


	public function save()
	{
		$userId = $this->session->userdata('USER_ID');

		if ($this->input->post('fname')) {
			
            $dob = '';
			if($this->input->post('dob')){
				$dob = date('Y-m-d', strtotime($this->input->post('dob')));
			}
			
			$mydata = array(
				'fname'      => $this->testInput($this->input->post('fname')),
				'lname'      => $this->testInput($this->input->post('lname')),
				'email'      => $this->testInput($this->input->post('email')),
				'dob'        => $dob,
				'phone'      => $this->testInput($this->input->post('phone')),
				'phone_2'    => $this->testInput($this->input->post('phone_2')),
				'address'    => $this->testInput($this->input->post('address')),
				'address_2'  => $this->testInput($this->input->post('address_2')),
				'country'    => $this->testInput($this->input->post('country')),
				'state'      => $this->testInput($this->input->post('state')),
				'city'       => $this->testInput($this->input->post('city')),
				'zipcode'    => $this->testInput($this->input->post('zipcode')),
			);

			if (!empty($_FILES['profilePic']['name']) || $this->input->post('oldProfilePic')) {

				$config['upload_path'] = './uploads/profile/';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size']  = '10240';

				$this->load->library('upload');
				$this->upload->initialize($config);

				if ( ! $this->upload->do_upload('profilePic')){
					$error = strip_tags($this->upload->display_errors());
				} else {
					$logoArray = $this->upload->data();
					$oldProfilePic = $this->input->post('oldProfilePic');
					$mydata['image'] = $logoArray['file_name'];
				}
			}

			if (!$this->Adminmodel->update($mydata, 'users', ['id'=>$userId])) {
				$msg = 'error';
			} else {
				if (!empty($oldProfilePic) && $oldProfilePic != '' && !is_null($oldProfilePic) && file_exists('./uploads/profile/'.$oldProfilePic)) {
					@unlink('./uploads/profile/'.$oldProfilePic);
				}

				$msg = '["Profile updated successfully.", "success", "#A5DC86"]';
			}
			$this->session->set_flashdata('msg', $msg);
		}
		redirect(base_url('user/profile'),'refresh');
	}
    public function testInput($data)
	{
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	public function check_store_name()
	{
		if ($this->input->post('storeName')) {
			$storeName = $this->testInput($this->input->post('storeName'));
			if ($this->mymodel->count('users', ['store_name'=>$storeName]) > 0) {
				echo 'This Store Name is already taken!';
			} else {
				echo '';
			}
		}
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */