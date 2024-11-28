<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->Adminmodel->userloggedIn();
	}
	public function index() {
		//echo CI_VERSION;DIE;
		$data = array(
			'title' => 'Dashboard',
			'page' => 'dashboard',
			'subpage' => ''
		);
		//print_r($this->session->userdata('USER_ID'));die;
		$this->load->view('user/header', $data);
		$this->load->view('user/sidebar');
		$this->load->view('user/dashboard');
		$this->load->view('user/footer');
	}
}