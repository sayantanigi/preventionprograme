<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Subscribe extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mymodel');
	} 
	
	
	function addSubscriber(){
		//$userId = $this->session->userdata('loguserId');
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|callback_email_check'); 
			if($this->form_validation->run() == true){
				$data = array(
					'email' => strip_tags($this->input->post('email')),
					'created_at'   => date('Y-m-d H:i:s')
				);
				$result= $this->Mymodel->add('subscribe', $data);
				if(!empty($result)){
					$response['status'] = 1;
					$response['message'] = 'Your have subscribed successfully.';
				}else{
					$response['status'] = 0;
					$response['message'] = 'Some error ocure.Please try again.';
				}
			}else{
				$response = array(
					'vali_error'   => 1,
					'email_err' => form_error('email'),
				);
			}
		}
		echo json_encode($response);
	}
	
	public function email_check($str){ 
        $con = array( 
            'returnType' => 'count', 
            'conditions' => array( 
                'email' => $str 
            ) 
        ); 
        $checkEmail = $this->Mymodel->UniqueEmail_subscribe($con); 
		if($checkEmail->num_rows() > 0){ 
            $this->form_validation->set_message('email_check', 'The given email already exists.'); 
            return FALSE; 
        }else{ 
            return TRUE; 
        } 
    }
}