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
		$this->load->view('frontend/header_front', $data);
		$this->load->view('frontend/home');
		$this->load->view('frontend/footer_front');
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
    public function states_by_country() {
		$c_name = $this->input->post('country_name');
		$get_cid = $this->db->query("SELECT * FROM countries WHERE name = '".$c_name."'")->result_array();
		$state_list = $this->db->query("SELECT * FROM states WHERE country_id = '".$get_cid[0]['id']."'")->result_array();
		if(!empty($state_list)) {
			$html = "<option value=''>Select State</option>";
			foreach ($state_list as $row_data) {
				$html .= "<option value='".$row_data['name']."'>".ucfirst($row_data['name'])."</option>";
			}
		} else {
			$html = '';
		}
		echo $html;
	}

	public function cities_by_state() {
		$s_name = $this->input->post('state_name');
		$get_sid = $this->db->query("SELECT * FROM states WHERE name = '".$s_name."'")->result_array();
		$cities_list = $this->db->query("SELECT * FROM cities WHERE state_id = '".$get_sid[0]['id']."'")->result_array();
		if(!empty($cities_list)) {
			$html = "<option value=''>Select City</option>";
			foreach ($cities_list as $row_data) {
				$html .= "<option value='".$row_data['name']."'>".ucfirst($row_data['name'])."</option>";
			}
		} else {
			$html = '';
		}
		echo $html;
	}
    function health_etity(){
		$output = '<option value="">Select Clinic</option>';
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$health_etity = $this->input->post('health_etity');
			$etity = $this->db->query("select * from clinic_admin where health_entity = ".@$health_etity." AND status = '1'")->result();
			if($etity){
				foreach($etity as $k => $v){
					$output.= '<option value="'.@$v->id.'">'.@$v->name.'</option>';
				}
			}
		}
		echo $output;
	}
    function get_clinic(){
		$output = '<option value="">Select Provide</option>';
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$clinic = $this->input->post('clinic');
			$etity = $this->db->query("select * from provider where clinic_admin = ".@$clinic." AND status = '1'")->result();
			if($etity){
				foreach($etity as $k => $v){
					$output.= '<option value="'.@$v->id.'">'.@$v->name.'</option>';
				}
			}
		}
		echo $output;
	}
}