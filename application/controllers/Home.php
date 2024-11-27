<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
    public function __construct() {
		parent::__construct();
		$this->load->model('Mymodel');
		//$this->Mymodel->loggedIn();
	}
	public function index() {
		$data = array(
			'title' => 'Prevention Program',
			'page' => 'Home',
			'subpage' => 'home',
		);
		$query = $this->db->query("select * from home_block where status = '1' LIMIT 1");
		$data['block'] = ($query->num_rows() > 0) ? $query->row() : FALSE;
		$current_date = date('Y-m-d');
		$completed_query = $this->db->query("select event_id, event_name, event_description, event_date from event where status = '1' and event_date <='".$current_date."' ORDER BY event_id DESC LIMIT 3");
		$data['completed_event'] = ($completed_query->num_rows() > 0) ? $completed_query->result() : FALSE;
		$query = $this->db->query("select * from features where status = '1'");
		$data['features'] = ($query->num_rows() > 0) ? $query->result() : FALSE;
		$query = $this->db->query("select * from event_step_process where status = '1'");
		$data['process'] = ($query->num_rows() > 0) ? $query->result() : FALSE;
		$query = $this->db->query("select * from banner_block where status = '1'");
		$data['banner'] = ($query->num_rows() > 0) ? $query->row() : FALSE;
		$this->load->view('header_front', $data);
		$this->load->view('home');
		$this->load->view('footer_front');
	}
    public function event_details() {
		$data = array(
			'title' => 'Prevention Program',
			'page' => 'Event Details',
			'subpage' => 'event',
		);
		if(empty($_GET['eId'])){
			return false;
		}
		$query = $this->db->query("select * from event where event_id = ".base64_decode(@$_GET['eId'])." ORDER BY event_id DESC");
		$data['event'] = ($query->num_rows() > 0) ? $query->row() : FALSE;
		$this->load->view('header', $data);
		$this->load->view('eventdetails');
		$this->load->view('footer');
	}
}