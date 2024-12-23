<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

	
	 public function __construct()
	{
		parent::__construct();
		$this->load->model('Mymodel');
		$this->Mymodel->loggedIn();
	}
	
	 public function index(){
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Transaction',
			'subpage' => 'transaction',
		);
		$userId = $this->session->userdata('loguserId');
		
		// $event = $this->db->query("select event_id from event where user_id = ".$userId."")->result();
		// $event_id = [];
		// if(!empty($event)){
			// foreach($event as $k => $v){
				// $event_id[] = $v->event_id;
			// }
			// $eventId = join(",", $event_id);
		// }
		
		$query = $this->db->query("select * from users where status = '1' and id = ".@$userId." ORDER BY id DESC");
		$data['user'] = ($query->num_rows() > 0) ? $query->row() : FALSE;
		
		//$where = "event_id IN($eventId) and (subscription IS NULL OR subscription = 'Paid')";
		$where = "user_id=".@$userId." and (subscription IS NULL OR subscription = 'Paid')";
		$data['transaction'] = $this->Adminmodel->get_all_record('id, user_name, user_id, sub_id, order_id, tran_id, amount, payment_type, start_date, end_date, currency, status, paid_by_admin', 'transaction', $where, array('id', 'DESC'), '');
		//echo $this->db->last_query();
		//print_r($data['transaction']);die;
		$this->load->view('header', $data);
		$this->load->view('account/transaction');
		$this->load->view('footer');
	}
	
	function get_details(){
		$tranId = $this->input->post('tranId'); 
		//$details =$this->Adminmodel->get_all_record('*', 'transaction', "id='".$tranId."'", '', '');
		$details = $this->db->query("select transaction.*, (select name from subscription where id = transaction.sub_id) as subname from transaction where id=".$tranId."")->row();
		// if(!empty(@$details[0]->sub_id)){
			// $sub = $this->db->query("select name from subscription where id = ".@$details[0]->sub_id."")->row();
			// $details['subname'] = $sub->name;
		// }else{
			// $details['subname'] = '';
		// }
		echo json_encode($details);
	}
	
	
}	
	