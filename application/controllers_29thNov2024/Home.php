<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mymodel');
		//$this->Mymodel->loggedIn();
	}  
	public function index()
	{
		
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Home',
			'subpage' => 'home',
		);
		
		$query = $this->db->query("select * from home_block where status = '1' LIMIT 1");
		$data['block'] = ($query->num_rows() > 0) ? $query->row() : FALSE;
		
		//completed event//
		$current_date = date('Y-m-d');
		$completed_query = $this->db->query("select event_id, event_name, event_description, event_date from event where status = '1' and event_date <='".$current_date."' ORDER BY event_id DESC LIMIT 3");
		$data['completed_event'] = ($completed_query->num_rows() > 0) ? $completed_query->result() : FALSE;
		
		//features//
		$query = $this->db->query("select * from features where status = '1'");
		$data['features'] = ($query->num_rows() > 0) ? $query->result() : FALSE;
		
		//event easy step process//
		$query = $this->db->query("select * from event_step_process where status = '1'");
		$data['process'] = ($query->num_rows() > 0) ? $query->result() : FALSE;
		
		//banner block//
		$query = $this->db->query("select * from banner_block where status = '1'");
		$data['banner'] = ($query->num_rows() > 0) ? $query->row() : FALSE;

		$this->load->view('header', $data);
		$this->load->view('home');
		$this->load->view('footer');
	}
	
	public function event_details()
	{
		
		$data = array(
			'title' => 'Made to Split',
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
