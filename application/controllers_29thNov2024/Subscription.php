<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Subscription extends CI_Controller {

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
			'page' => 'Subscription',
			'subpage' => 'subscription',
		);
		
		$userId = $this->session->userdata('loguserId');
		$data['subId'] = $this->Mymodel->get_single_row_info('id, sub_id, start_date, end_date, subscription', 'transaction', 'user_id='.$userId.' and payment_type="1"', 'id DESC', 1);
		//print_r($data['subId']);
		
		$query = $this->db->query("select * from subscription where status = '1' ORDER BY CASE pck_type WHEN 'Free' THEN 1 ELSE 2 END ASC, id ASC");
		$data['sub'] = ($query->num_rows() > 0) ? $query->result() : FALSE;
		
		$data['userId'] = $this->session->userdata('loguserId');
		$this->load->view('header', $data);
		$this->load->view('account/subscription');
		$this->load->view('footer');
	}
}