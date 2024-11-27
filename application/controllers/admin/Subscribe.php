<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Subscribe extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->Adminmodel->loggedIn();
	}

   public function subscriber()
	{
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Subscriber List',
			'subpage' => 'subscriber',
		);
      
      
		
		$data['subscriber'] = $this->Adminmodel->get_all_record('*', 'subscribe', '', array('id', 'DESC'), '');
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/subscriber');
		$this->load->view('admin/footer');
	}
	
	function deleteSub($id){
		if(empty($id)){
			return false;
		}
		$result = $this->db->query('delete from subscribe where id = '.$id.'');
		if($result){
			$msg = '["Subscriber is deleted successfully.", "success", "#A5DC86"]';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/subscribe/subscriber'),'refresh');
		}else{
			$msg = 'error';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/subscribe/subscriber'),'refresh');
		}
	}
	
	function downloadCsv(){
		$subscriber = $this->Adminmodel->get_all_record('*', 'subscribe', '', array('id', 'DESC'), '');
		if(!empty($subscriber)){
			$downloadTime = date('d-M-Y h:i A');
			$filename = "user_data" . date('Y-m-d') . ".xls";
    		
			    $output = '';
				$output.='<table border=1 width=80% height=30% align=left cellpadding=1 cellspacing=1>';
					$output.='<tr height=30%>';
						$output.='<th>#</th>';
						$output.='<th>Email</th>';
						$output.='<th>Date</th>';
					$output.='</tr>';
					$i = 1;
					foreach($subscriber as $key => $v){
						$output.='<tr>';
							$output.='<td>'. $i .'</td>';
							$output.='<td>'.@$v->email.'</td>';
							$output.='<td>'.(!empty(@$v->created_at) ? date('d F, Y', strtotime(@$v->created_at)) : '').'</td>';
						$output.='</tr>';
						$i++;
					}
				$output.='</table>';
				//header('Content-Type: application/xls');
                //header('Content-Disposition: attachment; filename="' . $filename . '"');
				 $path = "uploads/csv_files/".$filename;
				// //print_r($path);die;
				 $newOuput = file_put_contents($path, $output);
				 redirect($path);
		}
	}
}	