<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_password extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->loggedIn();
	}

	public function index()
	{
		$data = array(
			'title' => 'Change Password'
		);
		$data['userId'] = $userId = $this->session->userdata('USER_ID');

		$this->load->view('user/header', $data);
		$this->load->view('user/sidebar');
		$this->load->view('user/change_password');
		$this->load->view('user/footer');
	}


	public function update()
	{
		$userId = $this->session->userdata('USER_ID');

		if ($this->input->post('c_password')) {

			$this->form_validation->set_rules('c_password', 'Current Password', 'trim|required');
			$this->form_validation->set_rules('n_password_confirmation', 'New Password', 'trim|required');
			$this->form_validation->set_rules('n_password', 'Repeat Password', 'trim|required|matches[n_password_confirmation]');
			$msg = '';

			if ($this->form_validation->run() == false) {
				if (form_error('c_password')) {
					$msg .= strip_tags(form_error('c_password'));
				}
				if (form_error('n_password_confirmation')) {
					$msg .= strip_tags(form_error('n_password_confirmation'));
				}
				if (form_error('n_password')) {
					$msg .= strip_tags(form_error('n_password'));
				}
			} else {
				$c_password = $this->input->post('c_password');
				$n_password = $this->input->post('n_password');
				$user = $this->Adminmodel->get('users', true, 'id', $userId);
                
                if($c_password == $n_password){
                	$msg = '["New Password can not be same as old password.", "warning", "#F29F06"]';
                } 

				elseif ($user->password != md5($c_password)) {
					
					$msg = '["You have entered wrong password.", "warning", "#F29F06"]';
				} else {

					$mydata['password'] = md5($n_password);

					if (!$this->Adminmodel->update($mydata, 'users', ['id'=>$userId])) {
						$msg = 'error';
					} else {
						$msg = '["Password changed successfully.", "success", "#A5DC86"]';
					}
				}
			}
			$this->session->set_flashdata('msg', $msg);
		}
		redirect(base_url('user/profile'),'refresh');
	}
	public function enc_password($password)
	{
		$encrypted_password = password_hash($password, PASSWORD_DEFAULT);
		return $encrypted_password;
	}


	public function my_encrypt($data)
	{
		return $this->my_simple_crypt($data, 'e');
	}


	public function my_decrypt($data) {
		return $this->my_simple_crypt($data, 'd');
	}

}
