<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Search extends CI_Controller {

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
		$this->Mymodel->loggedIn();
	} 
	public function index()
	{
		
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Search Event',
			'subpage' => 'event',
		);
		$where = '';
		$userId = $this->session->userdata('loguserId');
		$user_email = $this->Mymodel->get_single_row_info('email', 'users', 'id='.$userId.'', '', 1);
		
		if(!empty($_GET['latitude']) && !empty($_GET['longitude'])){ 
		    $latitude = $_GET['latitude']; 
			$longitude = $_GET['longitude']; 
		}else{
			if(!empty($_GET['location'])){
				$where = "and event_address LIKE '%".@$_GET['location']."%'";
			}else{
				$where .= '';
			}
		}
		
        if(!empty($_GET['event'])){
			$event = $_GET['event'];
			$where .= "and event_name LIKE '%".@$_GET['event']."%'";
		}else{
			$where .= '';
		}
		//echo $where;die;
		
		$sql_distance = $having = ''; 
		if(!empty($latitude) && !empty($longitude)){ 
			$sql_distance = " ,(((acos(sin((".$latitude."*pi()/180)) * sin((`event_latitude`*pi()/180))+cos((".$latitude."*pi()/180)) * cos((`event_latitude`*pi()/180)) * cos(((".$longitude."-`event_longitude`)*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance"; 
			$having = " HAVING (distance <= 100) "; 
			$order_by = ' distance ASC '; 
		}else{ 
		    $order_by = ' event_id DESC '; 
		}
		
		$sql = "SELECT * ".$sql_distance." FROM event where status = '1' and (user_id = ".$userId." OR event_id IN(select event_id from event_invited_people where email = '".$user_email->email."') OR co_host_id = ".$userId.") $where $having ORDER BY $order_by"; 
		$query = $this->db->query($sql);
		$data['event'] = ($query->num_rows() > 0) ? $query->result():FALSE;
		//echo $this->db->last_query();
		$this->load->view('header', $data);
		$this->load->view('account/event');
		$this->load->view('footer');
	}
	function my_event(){
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Search My Event',
			'subpage' => 'event',
		);
		
		$where = ''; 
		$userId = $this->session->userdata('loguserId');
		$user_email = $this->Mymodel->get_single_row_info('email', 'users', 'id='.$userId.'', '', 1);
		
		if(!empty($_GET['latitude']) && !empty($_GET['longitude'])){ 
		    $latitude = $_GET['latitude']; 
			$longitude = $_GET['longitude']; 
		}else{
			if(!empty($_GET['location'])){
				$where = "and event_address LIKE '%".@$_GET['location']."%'";
			}else{
				$where .= '';
			}
		}
		
        if(!empty($_GET['event'])){
			$event = $_GET['event'];
			$where .= "and event_name LIKE '%".@$_GET['event']."%'";
		}else{
			$where .= '';
		}
		//echo $where;die;
		
		$sql_distance = $having = ''; 
		if(!empty($latitude) && !empty($longitude)){ 
			$sql_distance = " ,(((acos(sin((".$latitude."*pi()/180)) * sin((`event_latitude`*pi()/180))+cos((".$latitude."*pi()/180)) * cos((`event_latitude`*pi()/180)) * cos(((".$longitude."-`event_longitude`)*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance"; 
			$having = " HAVING (distance <= 20) "; 
			$order_by = ' distance ASC '; 
		}else{ 
		    $order_by = ' event_id DESC '; 
		}
		
		$sql = "SELECT * ".$sql_distance." FROM event where status = '1' and user_id = ".$userId." $where $having ORDER BY $order_by"; 
		$query = $this->db->query($sql);
		$data['event'] = ($query->num_rows() > 0) ? $query->result():FALSE;
		//echo $this->db->last_query();
		
		$this->load->view('header', $data);
		$this->load->view('account/my_event');
		$this->load->view('footer');
	}
	
	
}	