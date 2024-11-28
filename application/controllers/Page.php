<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
    public function __construct() {
		parent::__construct();
		$this->load->model('Mymodel');
	}
	public function about() {
		$data = array(
			'title' => 'Prevention Program',
			'page' => 'About Us',
			'subpage' => 'about-us',
		);
		$query = $this->db->query("select * from about_us where status = '1' and slug = 'about' ORDER BY id DESC LIMIT 1");
		$data['about'] = ($query->num_rows() > 0) ? $query->row() : FALSE;
		$this->load->view('frontend/header_front', $data);
		$this->load->view('frontend/about');
		$this->load->view('frontend/footer_front');
	}
    public function preventingpain() {
		$data = array(
			'title' => 'Prevention Program',
			'page' => 'Preventing Pain',
			'subpage' => 'Preventing Pain',
		);
		$this->load->view('frontend/header_front', $data);
		$this->load->view('frontend/preventingpain');
		$this->load->view('frontend/footer_front');
	}
	public function faq() {
		$data = array(
			'title' => 'Prevention Program',
			'page' => 'FAQS',
			'subpage' => 'faq',
		);
		$query = $this->db->query("select * from faq where status = '1' ORDER BY id DESC");
		$data['faqs'] = ($query->num_rows() > 0) ? $query->result() : FALSE;
		//print_r($data['faqs']);die;
		$this->load->view('header', $data);
		$this->load->view('faq');
		$this->load->view('footer');
	}
	public function privacy_policy() {
		$data = array(
			'title' => 'Prevention Program',
			'page' => 'Privacy Policy',
			'subpage' => 'privacy-policy',
		);
		$query = $this->db->query("select * from about_us where status = '1' and slug = 'privacy' ORDER BY id DESC LIMIT 1");
		$data['privacy'] = ($query->num_rows() > 0) ? $query->row() : FALSE;
		$this->load->view('header', $data);
		$this->load->view('privacy_policy');
		$this->load->view('footer');
	}
	public function term() {
		$data = array(
			'title' => 'Prevention Program',
			'page' => 'Term & Condition',
			'subpage' => 'term-and-condition',
		);
		$query = $this->db->query("select * from about_us where status = '1' and slug = 'term' ORDER BY id DESC LIMIT 1");
		$data['term'] = ($query->num_rows() > 0) ? $query->row() : FALSE;
		$this->load->view('header', $data);
		$this->load->view('term');
		$this->load->view('footer');
	}
	public function help() {
		$data = array(
			'title' => 'Prevention Program',
			'page' => 'Help',
			'subpage' => 'help',
		);
		$query = $this->db->query("select * from about_us where status = '1' and slug = 'help' ORDER BY id DESC LIMIT 1");
		$data['help'] = ($query->num_rows() > 0) ? $query->row() : FALSE;
		$this->load->view('header', $data);
		$this->load->view('help');
		$this->load->view('footer');
	}
	public function contact() {
		$data = array(
			'title' => 'Prevention Program',
			'page' => 'Contact Us',
			'subpage' => 'contact-us',
		);
		$query = $this->db->query("select email from settings ORDER BY settingId DESC LIMIT 1");
		$data['setting'] = ($query->num_rows() > 0) ? $query->row() : FALSE;
		$this->load->view('frontend/header_front', $data);
		$this->load->view('frontend/contact');
		$this->load->view('frontend/footer_front');
	}
	function submitcontact(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('name', 'Name', 'required|trim');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
			$this->form_validation->set_rules('phone', 'Phone', 'required|trim|numeric');
			$this->form_validation->set_rules('subject', 'Subject', 'required|trim');
			$this->form_validation->set_rules('messege', 'Message', 'required|trim');
			$this->form_validation->set_rules('captcha', 'Captcha', 'required|trim');
			if($this->form_validation->run() == true){
				if(strcasecmp($_SESSION['CAPTCHA_CODE'], $_POST['captcha']) != 0){
				  $message = "<p>You have entered incorrect security code! Please try again.</p>";
				  $response = array('vali_error' => 1, 'captcha_error' => $message);
				  echo json_encode($response);
				  exit();
				}
				$data = array(
					'name' => strip_tags($this->input->post('name')),
					'email' => strip_tags($this->input->post('email')),
					'phone' => strip_tags($this->input->post('phone')),
					'subject' => strip_tags($this->input->post('subject')),
					'message' => strip_tags($this->input->post('messege')),
					'created_at'   => date('Y-m-d H:i:s')
				);
				$result= $this->Mymodel->add('contact', $data);
				if($result){
					$response['status'] = 1;
					$response['message'] = 'Your contact query submited successfully.we will get back to soon.';
				}else{
					$response['status'] = 0;
					$response['message'] = 'Some error ocure.Please try again.';
				}
			}else{
				$response = array(
					'vali_error'   => 1,
					'email_error' => form_error('email'),
					'phone_error' => form_error('phone'),
					'name_error' => form_error('name'),
					'subject_error' => form_error('subject'),
					'message_error' => form_error('messege'),
					'captcha_error' => form_error('captcha'),
				);
			}
		}
		echo json_encode($response);
	}
	function get_captcha(){
		$random_num    = md5(random_bytes(64));
		$captcha_code  = substr($random_num, 0, 6);
		$_SESSION['CAPTCHA_CODE'] = $captcha_code;
		$layer = imagecreatetruecolor(168, 37);
		$captcha_bg = imagecolorallocate($layer, 247, 174, 71);
		imagefill($layer, 0, 0, $captcha_bg);
		$captcha_text_color = imagecolorallocate($layer, 0, 0, 0);
		imagestring($layer, 5, 55, 10, $captcha_code, $captcha_text_color);
		header("Content-type: image/jpeg");
		$result = imagejpeg($layer);
		$response['imgae'] = $result;
		echo json_encode($response);
	}
	function random(){
		$random_num =  md5(random_bytes(64));
		 $captcha_code  = substr($random_num, 0, 6);
		 $layer = imagecreatetruecolor(168, 37);
		 $captcha_bg = imagecolorallocate($layer, 247, 174, 71);
		 imagefill($layer, 0, 0, $captcha_bg);
		echo $captcha_text_color = imagecolorallocate($layer, 0, 0, 0);
	}
}