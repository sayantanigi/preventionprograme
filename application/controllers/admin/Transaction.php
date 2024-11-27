<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Transaction extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->Adminmodel->loggedIn();
	}

    public function index()
	{
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Transaction List',
			'subpage' => 'transaction',
		);
      
        $where = "subscription IS NULL OR subscription = 'Paid'";
        $data['transaction'] = $this->Adminmodel->get_all_record('id, user_name, user_id, sub_id, order_id, tran_id, amount, payment_type, start_date, end_date, currency, status, paid_by_admin, payment_mode', 'transaction', $where, array('id', 'DESC'), '');
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/transaction');
		$this->load->view('admin/footer');
	}
	
	function tran_delete($id){
		if(empty($id)){
		    return false;
		}
		$result = $this->db->query('delete from transaction where id = '.$id.'');
		if($result){
			$msg = '["Transaction is deleted successfully.", "success", "#A5DC86"]';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/transaction'),'refresh');
		}else{
			$msg = 'error';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/transaction'),'refresh');
		}
	}
}	