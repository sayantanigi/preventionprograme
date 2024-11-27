<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Event extends CI_Controller {

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
		$this->session->keep_flashdata('msg');
		$this->session->keep_flashdata('paypal_login_success');

	} 
	public function index()
	{
		
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Event List',
			'subpage' => 'event',
		);
		//$event_id = [];
		$userId = $this->session->userdata('loguserId');
		$user_email = $this->Mymodel->get_single_row_info('email', 'users', 'id='.$userId.'', '', 1);
		// //echo $this->db->last_query();
		// //print_r($user_email);die;
		// $getinvite_people = $this->db->query("select email, event_id from event_invited_people where email = '".$user_email->email."'")->result();
		
		// //print_r($getinvite_people);

		// if(!empty($getinvite_people)){
			// foreach($getinvite_people as $k => $v){
				// $event_id[] = $v->event_id;
			// }
			// $event_id = join(",",$event_id);
		// }
        
		
        $query = $this->db->query("select * from event where status = '1' and (user_id = ".$userId." OR event_id IN(select event_id from event_invited_people where email = '".$user_email->email."')) ORDER BY event_id DESC LIMIT 2");
		$data['event'] = ($query->num_rows() > 0) ? $query->result() : FALSE;
		
		$query = $this->db->query("select * from event where status = '1' and (user_id = ".$userId." OR event_id IN(select event_id from event_invited_people where email = '".$user_email->email."')) ORDER BY event_id DESC");
		$data['eventCount'] = ($query->num_rows() > 0) ? $query->num_rows() : FALSE;
		
		$this->load->view('header', $data);
		$this->load->view('account/event');
		$this->load->view('footer');
	}
	
	public function add()
	{
		//print_r($this->Mymodel->check_subscription_exist());
		// echo $this->db->last_query();
		// die;
		if($this->Mymodel->check_subscription_exist() > 0){
			//return true;
		}else{
			redirect(base_url('subscription'));
		}
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Create an Event',
			'subpage' => 'event',
		);
		$userId = $this->session->userdata('loguserId');
        $data['get_cohost'] = $this->Mymodel->get_multiple_row_info('id, fname, lname', 'users', 'status = "1" and id != '.@$userId.'', 'id DESC', '');
		
		$this->load->view('header', $data);
		$this->load->view('account/add_event');
		$this->load->view('footer');
	}
	
	function addEvent(){
		$userId = $this->session->userdata('loguserId');
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('event_name', 'Event Name', 'required|trim'); 
			$this->form_validation->set_rules('event_description', 'Event Description', 'required|trim');
			$this->form_validation->set_rules('event_address', 'Event Address', 'required|trim');
			$this->form_validation->set_rules('event_price', 'Event Price', 'required|trim');
			$this->form_validation->set_rules('event_date', 'Event Date', 'required|trim');
			$this->form_validation->set_rules('event_time', 'Event Time', 'required|trim');
			$this->form_validation->set_rules('captcha', 'Captcha', 'required|trim'); 
			//$this->form_validation->set_rules('event_participant', 'No. of Event Participanr', 'required|trim|numeric');
			if($this->form_validation->run() == true){
				
				if(strcasecmp($_SESSION['EVENT_CAPTCHA_CODE'], $_POST['captcha']) != 0){
					$message = "<p>You have entered incorrect security code! Please try again.</p>";
					$response = array('vali_error' => 1, 'captcha_error' => $message);
					echo json_encode($response);
					exit();
				}
				
				if(!empty($_FILES['event_image']['name']) && count($_FILES['event_image']['name']) > 0){
					    $filesCount = count($_FILES['event_image']['name']); 
						for($i = 0; $i < $filesCount; $i++){
							$_FILES['file']['name']     = $_FILES['event_image']['name'][$i]; 
							$_FILES['file']['type']     = $_FILES['event_image']['type'][$i]; 
							$_FILES['file']['tmp_name'] = $_FILES['event_image']['tmp_name'][$i]; 
							$_FILES['file']['error']     = $_FILES['event_image']['error'][$i]; 
							$_FILES['file']['size']     = $_FILES['event_image']['size'][$i]; 
							$config['upload_path'] = 'uploads/event'; 
							$config['allowed_types'] = 'jpg|png|jpeg|gif';
							$this->load->library('upload', $config);
							$this->upload->initialize($config);
							if (!$this->upload->do_upload('file')) {
								$array = array('vali_error' => 1, 'event_image_err' => $this->upload->display_errors());
								echo json_encode($array);
								exit();
							}else{  
								$fileData = $this->upload->data();
								$uploadData[$i]['image'] = $fileData['file_name']; 
								$uploadData[$i]['userId'] = $userId; 
							} 
						}
						//print_r($uploadData);die;
						if(!empty($uploadData)){
							$data = array(
								'event_name' => strip_tags($this->input->post('event_name')),
								'event_description' => $this->input->post('event_description'),
								'event_address' => strip_tags($this->input->post('event_address')),
								'event_latitude' => strip_tags($this->input->post('event_latitude')),
								'event_longitude' => strip_tags($this->input->post('event_longitude')),
								'event_country' => strip_tags($this->input->post('event_country')),
								'event_state' => strip_tags($this->input->post('event_state')),
								'event_city' => strip_tags($this->input->post('event_city')),
								'event_zipcode' => strip_tags($this->input->post('event_zipcode')),
								'event_date' => date('Y-m-d', strtotime($this->input->post('event_date'))),
								'event_time' => date('h:i A', strtotime($this->input->post('event_time'))),
								'event_price' => $this->input->post('event_price'),
								//'co_host_id' => $this->input->post('co_host'),
								//'event_participant' => strip_tags($this->input->post('event_participant')),
								'status' => '1',
								'user_id' => $userId,
								'slug' => url_title(strip_tags($this->input->post('event_name')), 'dash', true),
								'created_at'   => date('Y-m-d H:i:s')
							);
							$result= $this->Mymodel->add('event', $data);
							if(!empty($result)){
								$eventId = $result;
								$result = $this->Mymodel->add_multiple_listing_gallery($uploadData, 'event_gallery', $eventId);
								
								$response['eventId'] = $eventId;
								$response['status'] = 1;
								$response['message'] = 'Your event added successfully.';
							}else{
								$response['status'] = 0;
								$response['message'] = 'Some error ocure.Please try again.';
							}
						}
					
					
				}else{
					$array = array('vali_error' => 1, 'event_image_err' => 'Event image is required.');
					echo json_encode($array);
					exit();
				}
			}else{
				$response = array(
					'vali_error'   => 1,
					'event_name_err' => form_error('event_name'),
					'event_description_err' => form_error('event_description'),
					'event_address_err' => form_error('event_address'),
					'event_price_err' => form_error('event_price'),
					'event_date_err' => form_error('event_date'),
					'event_time_err' => form_error('event_time'),
					'captcha_error' => form_error('captcha'),
					//'event_participant_err' => form_error('event_participant'),
				);
			}
		}
		echo json_encode($response);
	}
	
	public function details()
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
		$this->load->view('account/event_details');
		$this->load->view('footer');
	}
	
	public function edit()
	{
		
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Update Event',
			'subpage' => 'event',
		);
		
		if(empty($_GET['eId'])){
			return false;
		}
		$userId = $this->session->userdata('loguserId');
		
        $query = $this->db->query("select * from event where event_id = ".base64_decode(@$_GET['eId'])." ORDER BY event_id DESC LIMIT 1");
		$data['event'] = ($query->num_rows() > 0) ? $query->row() : FALSE;
		
		//$data['get_cohost'] = $this->Mymodel->get_multiple_row_info('id, fname, lname', 'users', 'status = "1" and id != '.@$userId.'', 'id DESC', '');
		$data['get_cohost'] = $this->db->query("select email from event_invited_people where event_id = ".base64_decode(@$_GET['eId'])."")->result();
		
		$this->load->view('header', $data);
		$this->load->view('account/edit_event');
		$this->load->view('footer');
	}
	
	function editEvent(){
		$userId = $this->session->userdata('loguserId');
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('event_name', 'Event Name', 'required|trim'); 
			$this->form_validation->set_rules('event_description', 'Event Description', 'required|trim');
			$this->form_validation->set_rules('event_address', 'Event Address', 'required|trim');
			$this->form_validation->set_rules('event_price', 'Event Price', 'required|trim');
			$this->form_validation->set_rules('event_date', 'Event Date', 'required|trim');
			$this->form_validation->set_rules('event_time', 'Event Time', 'required|trim');
			//$this->form_validation->set_rules('event_participant', 'No. of Event Participanr', 'required|trim|numeric');
			if($this->form_validation->run() == true){
				if(!empty($_FILES['event_image']['name']) && count($_FILES['event_image']['name']) > 0){
					 $filesCount = count($_FILES['event_image']['name']); 
						for($i = 0; $i < $filesCount; $i++){
							$_FILES['file']['name']     = $_FILES['event_image']['name'][$i]; 
							$_FILES['file']['type']     = $_FILES['event_image']['type'][$i]; 
							$_FILES['file']['tmp_name'] = $_FILES['event_image']['tmp_name'][$i]; 
							$_FILES['file']['error']    = $_FILES['event_image']['error'][$i]; 
							$_FILES['file']['size']     = $_FILES['event_image']['size'][$i]; 
							$config['upload_path'] = 'uploads/event'; 
							$config['allowed_types'] = 'jpg|png|jpeg|gif';
							$this->load->library('upload', $config);
							$this->upload->initialize($config);
							if (!$this->upload->do_upload('file')) {
								$array = array('vali_error' => 1, 'event_image_err' => $this->upload->display_errors());
								echo json_encode($array);
								exit();
							}else{  
								$fileData = $this->upload->data();
								$uploadData[$i]['image'] = $fileData['file_name']; 
								$uploadData[$i]['userId'] = $userId; 
							} 
						}
						//print_r($uploadData);die;
						if(!empty($uploadData)){
							$data = array(
								'event_name' => strip_tags($this->input->post('event_name')),
								'event_description' => $this->input->post('event_description'),
								'event_address' => strip_tags($this->input->post('event_address')),
								'event_latitude' => strip_tags($this->input->post('event_latitude')),
								'event_longitude' => strip_tags($this->input->post('event_longitude')),
								'event_country' => strip_tags($this->input->post('event_country')),
								'event_state' => strip_tags($this->input->post('event_state')),
								'event_city' => strip_tags($this->input->post('event_city')),
								'event_zipcode' => strip_tags($this->input->post('event_zipcode')),
								'event_participant' => strip_tags($this->input->post('event_participant')),
								'event_date' => date('Y-m-d', strtotime($this->input->post('event_date'))),
								'event_time' => date('h:i A', strtotime($this->input->post('event_time'))),
								'event_price' => $this->input->post('event_price'),
								'co_host_id' => $this->input->post('co_host'),
								'slug' => url_title(strip_tags($this->input->post('event_name')), 'dash', true),
								'created_at'   => date('Y-m-d H:i:s')
							);
							//$result= $this->Mymodel->add('event', $data);
							$result= $this->Mymodel->update($data, 'event', array('event_id' => strip_tags($this->input->post('event_id'))));
							if(!empty($result)){
								$eventId = strip_tags($this->input->post('event_id'));
								$result = $this->Mymodel->add_multiple_listing_gallery($uploadData, 'event_gallery', $eventId);
								$response['eventId'] = base64_encode($this->input->post('event_id'));
								$response['status'] = 1;
								$response['message'] = 'Your event added successfully.';
							}else{
								$response['status'] = 0;
								$response['message'] = 'Some error ocure.Please try again.';
							}
						}
					
					
				}else{
					$data = array(
						'event_name' => strip_tags($this->input->post('event_name')),
						'event_description' => $this->input->post('event_description'),
						'event_address' => strip_tags($this->input->post('event_address')),
						'event_latitude' => strip_tags($this->input->post('event_latitude')),
						'event_longitude' => strip_tags($this->input->post('event_longitude')),
						'event_country' => strip_tags($this->input->post('event_country')),
						'event_state' => strip_tags($this->input->post('event_state')),
						'event_city' => strip_tags($this->input->post('event_city')),
						'event_zipcode' => strip_tags($this->input->post('event_zipcode')),
						'event_date' => date('Y-m-d', strtotime($this->input->post('event_date'))),
						'event_time' => date('h:i A', strtotime($this->input->post('event_time'))),
						'event_price' => $this->input->post('event_price'),
						'co_host_id' => $this->input->post('co_host'),
						//'event_participant' => strip_tags($this->input->post('event_participant')),
						'slug' => url_title(strip_tags($this->input->post('event_name')), 'dash', true),
						'created_at'   => date('Y-m-d H:i:s')
					);
					$result= $this->Mymodel->update($data, 'event', array('event_id' => strip_tags($this->input->post('event_id'))));
					if(!empty($result)){
						$response['eventId'] = base64_encode($this->input->post('event_id'));
						$response['status'] = 1;
						$response['message'] = 'Your event updated successfully.';
					}else{
						$response['status'] = 0;
						$response['message'] = 'Some error ocure.Please try again.';
					}
				}
			}else{
				$response = array(
					'vali_error'   => 1,
					'event_name_err' => form_error('event_name'),
					'event_description_err' => form_error('event_description'),
					'event_address_err' => form_error('event_address'),
					'event_price_err' => form_error('event_price'),
					'event_date_err' => form_error('event_date'),
					'event_time_err' => form_error('event_time'),
					//'event_participant_err' => form_error('event_participant'),
				);
			}
		}
		echo json_encode($response);
	}
	
	function loadAllevent(){
		$newre = '';
        //$displayStar = '';
		//$userGoogleAdd = $this->Mymodel->userlatLong();
		if(!empty($_GET['lastId'])){
		    $lastId = $_GET['lastId'];
			$userId = $this->session->userdata('loguserId');
		    $user_email = $this->Mymodel->get_single_row_info('email', 'users', 'id='.$userId.'', '', 1);
	
				$query = $this->db->query("select * from event where event_id < ".$lastId." and status = '1' and (user_id = ".$userId." OR event_id IN(select event_id from event_invited_people where email = '".$user_email->email."')) ORDER BY event_id DESC LIMIT 4");
				
				$event = ($query->num_rows() > 0) ? $query->result():FALSE;
				if (is_array($event) || is_object($event)) {
					foreach($event as $k => $v){
					   $gallerySql = $this->db->query("select image from event_gallery where event_id = ".@$v->event_id." ORDER BY id DESC LIMIT 1")->row();
					   $eventImg = (!empty(@$gallerySql->image) ? base_url('uploads/event/'.@$gallerySql->image.'') : base_url('uploads/noimage.jpg'));
						$newre .='
							<div class="event-list-item event-list d-lg-flex align-items-center post-item" relid="'.$v->event_id.'">
								<div class="event-img">
									<a href="'.base_url('event/details?eId='.base64_encode(@$v->event_id).'').'"><img src="'.@$eventImg.'" alt="" style="width: 400px;height: 240px;"></a>
									<span class="cat">Featured</span>
								</div>
								<div class="event-list-content">
									<h3 class="title"><a href="'.base_url('event/details?eId='.base64_encode(@$v->event_id).'').'">'.@$v->event_name.'</a></h3>
									<div class="meta-data">
									<span><i class="far fa-clock"></i> '.@$v->event_time.'</span>
									<span><i class="fas fa-map-marker-alt"></i>'.@$v->event_address.'</span>
									</div>
									<div class="event-desc">
									    <p>'.strip_tags(substr(@$v->event_description,0,200)).'</p>
									</div>
									<a class="ticket-link" href="'.base_url('event/details?eId='.base64_encode(@$v->event_id).'').'">View Details</a>
								</div>
							</div>
						';
					}
				}
	
	    }
		echo $newre;
	}
	
	function my_event(){
		$data = array(
			'title' => 'Made to Split',
			'page' => 'My Event List',
			'subpage' => 'event',
		);
		$userId = $this->session->userdata('loguserId');
        $query = $this->db->query("select * from event where user_id = ".$userId." ORDER BY event_id DESC LIMIT 2");
		$data['event'] = ($query->num_rows() > 0) ? $query->result() : FALSE;
		
		$query = $this->db->query("select * from event where user_id = ".$userId." ORDER BY event_id DESC");
		$data['eventCount'] = ($query->num_rows() > 0) ? $query->num_rows() : FALSE;
		
		$this->load->view('header', $data);
		$this->load->view('account/my_event');
		$this->load->view('footer');
	}
	
	function loadMyevent(){
		$userId = $this->session->userdata('loguserId');
		$newre = '';
        //$displayStar = '';
		//$userGoogleAdd = $this->Mymodel->userlatLong();
		if(!empty($_GET['lastId'])){
		    $lastId = $_GET['lastId'];	
				$query = $this->db->query("select * from event where event_id < ".$lastId." and user_id = ".$userId." ORDER BY event_id DESC LIMIT 4");
				$event = ($query->num_rows() > 0) ? $query->result():FALSE;
				if (is_array($event) || is_object($event)) {
					foreach($event as $k => $v){
						
					   $gallerySql = $this->db->query("select image from event_gallery where event_id = ".@$v->event_id." ORDER BY id DESC LIMIT 1")->row();
					   $eventImg = (!empty(@$gallerySql->image) ? base_url('uploads/event/'.@$gallerySql->image.'') : base_url('uploads/noimage.jpg'));
						$newre .='
							<div class="event-list-item event-list d-lg-flex align-items-center post-item" relid="'.$v->event_id.'">
								<div class="event-img">
									<a href="'.base_url('event/details?eId='.base64_encode(@$v->event_id).'').'"><img src="'.@$eventImg.'" alt="" style="width: 400px;height: 240px;"></a>
									<span class="cat">Featured</span>
								</div>
								<div class="event-list-content">
									<h3 class="title"><a href="'.base_url('event/details?eId='.base64_encode(@$v->event_id).'').'">'.@$v->event_name.'</a></h3>
									<div class="meta-data">
									<span><i class="far fa-clock"></i> '.@$v->event_time.'</span>
									<span><i class="fas fa-map-marker-alt"></i>'.@$v->event_address.'</span>
									</div>
									<div class="event-desc">
									    <p>'.strip_tags(substr(@$v->event_description,0,200)).'</p>
									</div>
									<a class="ticket-link" href="'.base_url('event/details?eId='.base64_encode(@$v->event_id).'').'">View Details</a><br/><br/>
									<div class="meta-data">
										<span style="margin-left: 10px;font-size: 15px;"><a href="'.base_url('event/edit?eId='.base64_encode(@$v->event_id).'').'" title="Edit"><i class="far fa-edit"></i> </a></span>
										<span style="margin-left: 10px;font-size: 15px;"><a href="javascript:void(0);" title="Delete"  onclick="deleteMyevent('.@$v->event_id.')"><i class="fas fa-trash"></i></a> </span>
									</div>
								</div>
							</div>
						';
					}
				}
	
	    }
		echo $newre;
	}
	function deleteGallery(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$id = $this->input->post('id');
			$deleteQuery = $this->db->query("delete from event_gallery where id = ".$id."");
			if($deleteQuery){
				echo 1;
			}else{
				echo 0;
			}
		}
	}
	
	function invite_people(){
		if(empty(@$_GET['eId'])){
			return false;
		}
		/*$event_user_id = $this->Mymodel->get_single_row_info('user_id', 'event', 'event_id='.@$_GET['eId'].'', '', 1);
		$userId = $event_user_id->user_id;
		echo $this->Mymodel->check_monthly_invitepeople_limit($userId);die;*/
		//$userId = $this->session->userdata('loguserId');
		//get event user id
		
		$event_user_id = $this->Mymodel->get_single_row_info('user_id', 'event', 'event_id='.@$_GET['eId'].'', '', 1);
		$userId = $event_user_id->user_id;
		if($this->Mymodel->check_monthly_invitepeople_limit($userId) == '0'){
			// echo 'Limit is over for this month.';
			 //exit();
			if(!empty($this->session->flashdata('msg'))){
				$suc_invite_msg = $this->session->flashdata('msg');
			}else{
				$suc_invite_msg = '';
			}
			$msg = 'Your limit is over for this month.';
			$title = 'Limit Reached';
			redirect(base_url('event/sub_over?msg='.$msg.'&title='.$title.'&suc_msg='.$suc_invite_msg.''));
		}elseif($this->Mymodel->check_monthly_invitepeople_limit($userId) == 'free_limit_over'){
			 //echo 'Your free subscription invited people limit is over.';
			 //exit();
			if(!empty($this->session->flashdata('msg'))){
				$suc_invite_msg = $this->session->flashdata('msg');
			}else{
				$suc_invite_msg = '';
			}
			$msg = 'Your free subscription has reached its limit.';
			$title = 'Limit Reached';
			redirect(base_url('event/sub_over?msg='.$msg.'&title='.$title.'&suc_msg='.$suc_invite_msg.''));
		}elseif($this->Mymodel->check_monthly_invitepeople_limit($userId) == 'sub_over'){
			$msg = 'Your subscription plan is expired now.';
			$title = 'Subscription Expired';
			redirect(base_url('event/sub_over?msg='.$msg.'&title='.$title.''));
		}elseif($this->Mymodel->check_monthly_invitepeople_limit($userId) == 'total_invitaion_limit_over'){
			$msg = "You've reached your invite limit. Please upgrade your subscription.";
			$title = 'Invitation Limit Over';
			redirect(base_url('event/sub_over?msg='.$msg.'&title='.$title.''));
		}elseif($this->Mymodel->check_monthly_invitepeople_limit($userId) == 'sub_not_found'){
			$msg = 'Your account has not found any subscription, Please subscribe now.';
			$title = 'Subscription Not Found.';
			redirect(base_url('event/sub_over?msg='.$msg.'&title='.$title.''));
		}else{
			
		}
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
			$this->form_validation->set_rules('event_id', 'event Id', 'required|trim');
			if($this->form_validation->run() == true){
				//print_r($_POST);die;
				$event_id = $this->input->post('event_id');
				$subscription = $this->input->post('subscription');
				$email = array_filter($this->input->post('email'));
				//echo count($email);die;
				$query = $this->db->query("select * from event where event_id = ".$event_id."");
				if($query->num_rows() > 0){
					$event = $query->row();
					
					/*$existUser = $this->Mymodel->exist_invite_peoplecount($event_id);
					if($existUser > 0){
						$count = count(@$email) + $existUser;
						$amount = @$event->event_price / $count;
					}else{
						$count = count(@$email);
						$amount = @$event->event_price / $count;
					}*/
					
					$check_customize_payment = $this->Mymodel->get_single_row_info('customize_payment', 'users', 'id='.$userId.'', '', 1);
					$get_sub_id = $this->Mymodel->get_single_row_info('id', 'transaction', 'user_id='.$userId.' and payment_type = "1"', 'id DESC', 1);
					
					if($check_customize_payment->customize_payment == 1){
						
						$countemail = count(array_filter(@$_POST['email']));
						array_filter(@$_POST['amount']);
						for($i=0;$i<$countemail;$i++){
							$email = $_POST['email'][$i];
							$amount = $_POST['amount'][$i];
							$insert_distrubuted_price[] = $this->db->query("INSERT INTO event_invited_people (email, event_id, distributed_event_price, user_id, status, invited_people, created_at, tran_id)VALUES ('".@$email."', ".@$event_id.", ".@$amount.", ".@$userId.", '1', '".@$subscription."', '".date('Y-m-d H:i:s')."', '".@$get_sub_id->id."')");

						}
						if(!empty(@$insert_distrubuted_price)){
							$userInfo = $this->db->query("select fname, lname from users where id = ".@$event->user_id."")->row();
							$from = ucfirst(@$userInfo->fname) .' '. ucfirst(@$userInfo->lname);
							$subject = "You've been invited to (".@$event->event_name.")";
							$date = $event->event_date.' '.$event->event_time;
							for($i=0;$i<$countemail;$i++){
								$email = $_POST['email'][$i];
								$amount = $_POST['amount'][$i];
								$this->sendMail($email, $event->event_name, $from, $amount, $subject, $date);
								
								$this->db->query("UPDATE users set `total_invitation` = `total_invitation` - 1 where `id` = '".$userId."'");
							}
							
							$sms_invited_msg = "You've been invited to (".@$event->event_name.") \r\n";
							$sms_invited_msg .= "".base_url()."event/details?eId=".base64_encode(@$event_id)." \r\n";
							$sms_invited_msg .= "From : MadeToSplit ";
							for($i=0;$i<$countemail;$i++){
								$email = $_POST['email'][$i];
								$mobile = $_POST['mobile'][$i];
								$userInfo = $this->db->query("select id from users where email = '".@$email."'")->row();
								if(!empty($userInfo)){
									//'You have invited for ".$event_name."</strong> event from <strong>".@$from." '
									$msg = "You've been invited to (".@$event->event_name.") from ".@$from."";
									$this->Mymodel->sendMsg($userInfo->id, $msg);
								}
								if(!empty($mobile)){
									@$this->Mymodel->send_sms($mobile, $sms_invited_msg);
								}
								
							}
							//$msg = '["You have invited people successfully.", "success", "#A5DC86"]';
							$msg = 'You have invited people successfully.';
							$this->session->set_flashdata('msg', $msg);
							//echo $this->session->flashdata('msg');die;
							//redirect(base_url('event/invite-people?eId='.$event_id.''));
							redirect(base_url('event/details?eId='.base64_encode($event_id).''),'refresh');
						}
						
					}else{
					
						//$amount = @$event->event_price / @$event->event_participant;
						
						$existUser = $this->Mymodel->exist_invite_peoplecount($event_id);
						if($existUser > 0){
							$count = count(@$email) + $existUser;
							$amount = @$event->event_price / $count;
						}else{
							$count = count(@$email);
							$amount = @$event->event_price / $count;
						}
						
						$userInfo = $this->db->query("select fname, lname from users where id = ".@$event->user_id."")->row();
						$from = ucfirst(@$userInfo->fname) .' '. ucfirst(@$userInfo->lname);
						$result = $this->Mymodel->addInvitedPeople($email, $event_id, $amount, $subscription);
						
						
						if($result){
							$this->Mymodel->update_price($event_id, $amount);
							$subject = "You've been invited to (".@$event->event_name.")";
							$date = $event->event_date.' '.$event->event_time;
							if(!empty($email) && $email != ''){
								foreach($email as $k => $v){
									if(!empty($v) && $v != ''){
										$this->sendMail($v, $event->event_name, $from, $amount, $subject, $date);
										$this->db->query("UPDATE users set `total_invitation` = `total_invitation` - 1 where `id` = '".$userId."'");
									}else{
										break;
									}
									
								}
							}
							
							$sms_invited_msg = "You've been invited to (".@$event->event_name.") \r\n";
							$sms_invited_msg .= "".base_url()."event/details?eId=".base64_encode(@$event_id)." \r\n";
							$sms_invited_msg .= "From : MadeToSplit ";
							
							$countemail = count(array_filter(@$_POST['email']));
							for($i=0;$i<$countemail;$i++){
								$email = $_POST['email'][$i];
								$mobile = $_POST['mobile'][$i];
								// $userInfo = $this->db->query("select fname, lname, phone from users where email = '".@$email."'")->row();
								// if(!empty($userInfo)){
									// @$this->Mymodel->send_sms($userInfo->phone, $sms_invited_msg);
								// }
								
								$userInfo = $this->db->query("select id from users where email = '".@$email."'")->row();
								if(!empty($userInfo)){
									//'You have invited for ".$event_name."</strong> event from <strong>".@$from." '
									$msg = "You've been invited to (".@$event->event_name.") from ".@$from."";
									$this->Mymodel->sendMsg($userInfo->id, $msg);
								}
								
								if(!empty($mobile)){
									@$this->Mymodel->send_sms($mobile, $sms_invited_msg);
								}
								
							}
							
							//$msg = '["You have invited people successfully.", "success", "#A5DC86"]';
							$msg = 'You have invited people successfully.';
							$this->session->set_flashdata('msg', $msg);
							//redirect(base_url('event/invite-people?eId='.$event_id.''),'refresh');
							redirect(base_url('event/details?eId='.base64_encode($event_id).''),'refresh');
						}
				    }	
				}
			}
		}
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Invite People',
			'subpage' => 'event',
		);
        
		$data['check_custoPay'] = $this->Mymodel->get_single_row_info('customize_payment', 'users', 'id='.$userId.'', '', 1);
		$this->load->view('header', $data);
		$this->load->view('account/invite_people');
		$this->load->view('footer');
	}
	function sendMail($email = '', $event_name, $from, $amount, $subject, $date){
		require_once APPPATH.'third_party/email/vendor/autoload.php';
		$from_email = "info@madetosplit.com"; 
		$imagePath = base_url() . 'uploads/logos/logo.png';
		$imagebackPath = '';
		$mesg = "<!Doctype html>
		<html>
			<head>
				<meta charset='utf-8'>
				<meta name='viewport' content='width=device-width, initial-scale=1'>
				<title>Invite People</title>
				<link href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap' rel='stylesheet'>
				</head>
			<body>
				<div style='max-width:600px;
				margin:auto;
				border:1px solid #eee;
				box-shadow:0 0 10px rgba(0, 0, 0, .15);
				line-height:17px;
				font-size:13px;
				box-sizing:border-box; -webkit-print-color-adjust: exact;font-family: Poppins, sans-serif; background:url(".$imagebackPath.")'>
					<div style='padding:20px; box-sizing: border-box;text-align: center; background: #fff;'>
					    <a href='#'><img src='".$imagePath."' style='width: 350px; height80px;'></a>
					</div>
					<div style='width: 400px; margin:50px auto;background: #ffffffd1;padding: 50px;text-align: center;'>
						<h1 style='font-size: 30px; line-height: 32px; color: #0b0b0b; margin: 30px 0;'>Dear User</h1>
						<p style='font-size: 15px;color: #262626;line-height: 24px;margin: 20px 0;'>You have invited for <strong>".$event_name."</strong> event from <strong>".@$from." </strong></p>
						
						<p style='font-size: 15px;color: #262626;line-height: 24px;margin: 20px 0;'>Event date : <strong>".$date."</strong></p>
						
						<p style='font-size: 15px;color: #262626;line-height: 24px;margin: 20px 0;'>Event Price <strong>$".$amount."</strong>/Person</p>
						<a href='".base_url('login')."' >Register</a>
					</div>
					
					<div style='background: #000;
					text-align: left;
					box-sizing: border-box;
					width: 100%;
					padding: 20px 50px;
					color: #fff;'>
						<p style='margin: 5px 0;font-size: 12px;'>Warm Regards,</p>
						<p style='margin: 5px 0;font-size: 12px;'>Made to Split</p>
						<p style='margin: 5px 0;font-size: 12px;'><strong>Email:</strong> <a href='#' style='color: #78daff;'>info@madetosplit.com</a></p>
						<br/>
						<p style='margin: 5px 0;font-size: 11px;'>This is an automated response, please do not reply.</p>
					</div>
				</div>
			</body>
		</html>";

		$mail = new PHPMailer();
		$mail->SMTPDebug = 0;                               // Enable verbose debug output
		$mail->Host = 'smtp.office365.com';  // Specify main and backup SMTP servers
		$mail->IsSMTP();
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'info@madetosplit.com';                
		$mail->Password = 'M@d32spl1t';
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to
		$mail->setFrom('info@madetosplit.com');
		$mail->addAddress($email);
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = @$subject;
		$mail->Body    = $mesg;
		return $mail->send();
	}
	
	
	
	// function check_subscription_exist(){
		// $userId = $this->session->userdata('loguserId');
		// $current_date = date('Y-m-d H:i:s');
		// $query = $this->db->query("select * from transaction where user_id = ".@$userId." and payment_type = '1' and end_date >= '".@$current_date."' ORDER BY id DESC LIMIT 1");
		// $result = ($query->num_rows() > 0) ? $query->num_rows() : '';
		// return $result;
	// }
	
	function check_invite_limit(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$email = array_filter($this->input->post('email'));
			$count_email = count($email);
			//$userId = $this->session->userdata('loguserId');
			//echo $this->Mymodel->count_invite_people_byuser($userId);die;
			
			$event_user_id = $this->Mymodel->get_single_row_info('user_id', 'event', 'event_id='.@$this->input->post('event_id').'', '', 1);
		    $userId = $event_user_id->user_id;
		
			$current_date = date('Y-m-d H:i:s');
			
			
				$check_subscription = $this->db->query("select id, sub_id, subscription from transaction where user_id = ".$userId." ORDER BY id DESC LIMIT 1")->row();
				
				if(!empty(@$check_subscription)){
					if(@$check_subscription->subscription == 'Free'){
						$count_invite_people_byuser_freesub = $this->Mymodel->count_invite_people_byuser_freesub($userId);
						$getSub = $this->db->query("select * from subscription where id = ".@$check_subscription->sub_id." and status = '1'")->row();
						if($getSub->invitation_limit <= $count_invite_people_byuser_freesub){
						    $result = 0;
							$response['limt_over'] = $result;
						}else{
						    $result = 1;
							$response['limt_over'] = $result;
							
							$count_invit_people = !empty($this->Mymodel->count_invite_people_byuser_freesub($userId)) ? $this->Mymodel->count_invite_people_byuser_freesub($userId) : 0;
							$all_email_count = $count_invit_people + $count_email;
							if($getSub->invitation_limit < $all_email_count){
								//$cal_limit = $all_email_count - $getSub->invitation_limit;
								$cal_limit = $getSub->invitation_limit - $count_invit_people;
								$response['cal_limit'] = $cal_limit;
							}else{
							    $response['cal_limit_over'] = 0;
							}
						}
					}else{
						
						$query = $this->db->query("select sub_id, id from transaction where user_id = ".$userId." and payment_type = '1' and end_date >= '".@$current_date."' ORDER BY id DESC LIMIT 1");
						if($query->num_rows() > 0){
							$sub = $query->row();
			
							$getSub = $this->db->query("select * from subscription where id = ".@$sub->sub_id." and status = '1'")->row();
							$sub_limit = $getSub->invitation_limit;
							
                            $user_total_invitation = $this->db->query("select total_invitation from users where id = ".$userId."")->row();
							
							if($user_total_invitation->total_invitation < $count_email){
								//$cal_limit = $count_email - $user_total_invitation->total_invitation;
								$response['cal_limit'] = $user_total_invitation->total_invitation;
							}else{
							
								if($getSub->invitation_limit <= $this->Mymodel->count_invite_people_byuser($userId, $sub->id)){
									//echo 'your monthly limit is over. limit is: '.@$getSub->invitation_limit.'';
									$result = 0;
									$response['limt_over'] = $result;
								}else{
									// //echo 'not over monthly limit';
									// $result = 1;
									$result = 1;
									$response['limt_over'] = $result;
									$count_invit_people = !empty($this->Mymodel->count_invite_people_byuser($userId, $sub->id)) ? $this->Mymodel->count_invite_people_byuser($userId, $sub->id) : 0;
									$all_email_count = $count_invit_people + $count_email;
									if($getSub->invitation_limit < $all_email_count){
										//$cal_limit = $all_email_count - $getSub->invitation_limit;
										$cal_limit = $getSub->invitation_limit - $count_invit_people;
										$response['cal_limit'] = $cal_limit;
									}else{
										$response['cal_limit_over'] = 0;
									}
								}
							}
							
						}else{
							$response['no_data'] = 'not record available';
						}
						
					}
				}

		}
		echo json_encode($response);
	}
	
	
	function check_invite_limit_amount(){
		
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
			$email = array_filter($this->input->post('email'));
			$count_email = count($email);
			//$userId = $this->session->userdata('loguserId');
			//echo $this->Mymodel->count_invite_people_byuser($userId);die;
			$event_user_id = $this->Mymodel->get_single_row_info('user_id', 'event', 'event_id='.@$this->input->post('event_id').'', '', 1);
			//print_r($event_user_id);die;
		    $userId = $event_user_id->user_id;
			$current_date = date('Y-m-d H:i:s');
			
			$check_subscription = $this->db->query("select id, sub_id, subscription from transaction where user_id = ".$userId." ORDER BY id DESC LIMIT 1")->row();
			if(!empty(@$check_subscription)){
				if(@$check_subscription->subscription == 'Free'){
					
					$amount = array_filter($this->input->post('amount'));
					$clientamount = array_sum($amount);
				
				    $total_amount_sum = $this->Mymodel->total_sum(@$this->input->post('event_id'));
					$total_event_amount = $clientamount + $total_amount_sum->totalAmount;
						
					$count_invite_people_byuser_freesub = $this->Mymodel->count_invite_people_byuser_freesub($userId);
					$eventPrice = $this->Mymodel->get_single_row_info('event_price', 'event', 'event_id='.@$this->input->post('event_id').'', '', 1);
					//if(@$clientamount <= @$eventPrice->event_price){
					if(@$total_event_amount <= @$eventPrice->event_price){
						$getSub = $this->db->query("select * from subscription where id = ".@$check_subscription->sub_id." and status = '1'")->row();
						
						if($getSub->invitation_limit <= $count_invite_people_byuser_freesub){
							$result = 0;
							$response['limt_over'] = $result;
						}else{
							$result = 1;
							$response['limt_over'] = $result;
							
							$count_invit_people = !empty($this->Mymodel->count_invite_people_byuser_freesub($userId)) ? $this->Mymodel->count_invite_people_byuser_freesub($userId) : 0;
							$all_email_count = $count_invit_people + $count_email;
							if($getSub->invitation_limit < $all_email_count){
								//$cal_limit = $all_email_count - $getSub->invitation_limit;
								$cal_limit = $getSub->invitation_limit - $count_invit_people;
								$response['cal_limit'] = $cal_limit;
							}else{
								$response['cal_limit_over'] = 0;
							}
						}
					}else{
						$response['large_amount'] = 'Your have enter distributed amount greater than event amount. Please enter small amount.';
					}
				}else{
					$query = $this->db->query("select sub_id, id from transaction where user_id = ".$userId." and payment_type = '1' and end_date >= '".@$current_date."' ORDER BY id DESC LIMIT 1");
					if($query->num_rows() > 0){
						$sub = $query->row();
						
						$amount = array_filter($this->input->post('amount'));
						$clientamount = array_sum($amount);
						
						$total_amount_sum = $this->Mymodel->total_sum(@$this->input->post('event_id'));
						$total_event_amount = $clientamount + $total_amount_sum->totalAmount;
						//echo $total_event_amount;die;
						$eventPrice = $this->Mymodel->get_single_row_info('event_price', 'event', 'event_id='.@$this->input->post('event_id').'', '', 1);
						//if(@$clientamount <= @$eventPrice->event_price){
						if(@$total_event_amount <= @$eventPrice->event_price){
							$getSub = $this->db->query("select * from subscription where id = ".@$sub->sub_id." and status = '1'")->row();
							$sub_limit = $getSub->invitation_limit;
							$user_total_invitation = $this->db->query("select total_invitation from users where id = ".$userId."")->row();
							
							if($user_total_invitation->total_invitation < $count_email){
								//$cal_limit = $count_email - $user_total_invitation->total_invitation;
								$response['cal_limit'] = $user_total_invitation->total_invitation;
							}else{
								if($getSub->invitation_limit <= $this->Mymodel->count_invite_people_byuser($userId, $sub->id)){
									//echo 'your monthly limit is over. limit is: '.@$getSub->invitation_limit.'';
									$result = 0;
									$response['limt_over'] = $result;
								}else{
									// //echo 'not over monthly limit';
									// $result = 1;
									$result = 1;
									$response['limt_over'] = $result;
									$count_invit_people = !empty($this->Mymodel->count_invite_people_byuser($userId, $sub->id)) ? $this->Mymodel->count_invite_people_byuser($userId, $sub->id) : 0;
									$all_email_count = $count_invit_people + $count_email;
									if($getSub->invitation_limit < $all_email_count){
										//$cal_limit = $all_email_count - $getSub->invitation_limit;
										$cal_limit = $getSub->invitation_limit - $count_invit_people;
										$response['cal_limit'] = $cal_limit;
									}else{
										$response['cal_limit_over'] = 0;
									}
								}
							}
							
						}else{
							$response['large_amount'] = 'Your have enter distributed amount greater than event amount. Please enter small amount.';
						}

					}else{
						$response['no_data'] = 'not record available';
					}
				}
			}else{
				$response['no_data'] = 'not record available';
			}
			
			
			
		}
		echo json_encode($response);
	}
	
	function sub_over(){
		$data = array(
		'title' => 'Made to Split',
		'page' => 'Subscription and Limit Over',
		'subpage' => 'event',
		);

		$this->load->view('header', $data);
		$this->load->view('account/sub_over');
		$this->load->view('footer');
	}	
	function test(){
		$userId = $this->session->userdata('loguserId');
		echo $this->Mymodel->count_invite_people_byuser($userId);
	}
	
	function get_chat_user(){
		$html = '';
		$userId = $this->session->userdata('loguserId');
		$user_email = $this->Mymodel->get_single_row_info('email', 'users', 'id='.$userId.'', '', 1);
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$event_id = $this->input->post('event_id');
			$host_user_id = $this->input->post('host_user_id');
			$host_email = $this->Mymodel->get_single_row_info('email', 'users', 'id='.$host_user_id.'', '', 1);
			$get_invited_people = $this->db->query("select * from event_invited_people where event_id = ".@$event_id." and user_id = ".@$host_user_id." and email != '".@$user_email->email."'")->result();
			//if(!empty(@$get_invited_people)){
			
			$check_event = $this->db->query("select * from event where event_id = ".$event_id." and user_id = ".$userId."")->num_rows();
			if(@$check_event > 0){
				
			}else{
				$check_email_inevent = 	$this->db->query("select * from event_invited_people where event_id = ".@$event_id." and email = '".@$host_email->email."'")->num_rows();
				if(@$check_email_inevent > 0){

				}else{			
					$get_invited_people[] =   (object)['id' => 0,
						'email' => @$host_email->email,
						'event_id' => '',
						'distributed_event_price'=>'',
						'user_id' => '',
						'status' => '',
						'transaction' => '',
						'created_at' => '',
						'updated_at' => ''
					];
					
					
				}
			}
			
			$get_co_host = $this->Mymodel->get_single_row_info('co_host_id', 'event', 'event_id='.@$event_id.'', '', 1);
			
			if(!empty(@$get_co_host->co_host_id)){
				if(@$userId == @$get_co_host->co_host_id){
				
			    }else{
					$co_host_email = $this->Mymodel->get_single_row_info('email', 'users', 'id='.@$get_co_host->co_host_id.'', '', 1);
					$check_cohost_invited = $this->db->query("select * from event_invited_people where event_id = ".@$event_id." and email = '".@$co_host_email->email."'")->num_rows();
					
					if(@$check_cohost_invited > 0){
						
					}else{
						$get_invited_people[] =   (object)['id' => 0,
							'email' => @$co_host_email->email,
							'event_id' => '',
							'distributed_event_price'=>'',
							'user_id' => '',
							'status' => '',
							'transaction' => '',
							'created_at' => '',
							'updated_at' => ''
						];
					}
				}
			}
			
			//print_r($get_invited_people);die;
               //echo $this->db->last_query();die;
				foreach($get_invited_people as $k => $v){
					
					$get_register_user = $this->db->query("select id, fname, lname, email, image from users where (email = '".$v->email."' )  and status = '1'")->row();
					//print_r($get_register_user);die;
					
					if(!empty(@$get_register_user)){
						$msgCount = $this->countMsg($userId, $get_register_user->id);
						$html .='<div class="usermesslist" sender_id ='.@$userId.' receiver_id = '.@$get_register_user->id.'>
							<div class="d-flex align-items-center">
								<div>
									<img src="'.(!empty(@$get_register_user->image) ? base_url('uploads/profile/'.@$get_register_user->image.'') : base_url('uploads/unnamed.jpg')).'">
								</div>
								<div class="ps-2 flex-fill">
									<h3>'.@$get_register_user->fname .' '. @$get_register_user->lname.'</h3>
									<p>'.((@$host_email->email == $get_register_user->email) ? 'Event Host' : '').'</p>
									
								</div>
								'.((!empty(@$msgCount) && (@$msgCount > 0)) ? '<div id="msgCount_'.@$get_register_user->id.'" style="background: red;margin: 0px 171px;width: 25px;padding: 0px 10px;border-radius: 61px;color: white;font-size: 14px;font-weight: 900;position: absolute;">'.@$msgCount.'</div>' : '').'
								
								
								<div>
									<input type="checkbox" name="">
								</div>
							</div>
						</div>
						<div class="gropchtbtn">
						    <a href="javascript:void(0)" class="btn btn-primary btn-sm user_group_chat" sender_id ='.@$userId.' host_user_attr="'.@$host_user_id.'">Group Chat</a>
						</div>
						';
					}
				}
			//}
		}
		echo $html;
	}
	function countMsg($receiverId = '', $senderId = ''){

		    $select = "SELECT * FROM chat where receiver_id = ".$receiverId." and sender_id = ".$senderId." and status = '1' and group_msg IS NULL"; 
			$query = $this->db->query($select);
			$row = ($query->num_rows() > 0) ? $query->num_rows() : FALSE; 
			return $row;
	}
	function get_personal_chat(){
		$html = '';
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$sender_id = $this->input->post('sender_id');
			$receiver_id = $this->input->post('receiver_id');
			$event_id = $this->input->post('event_id');
			$get_receiver_info = $this->Mymodel->get_single_row_info('fname, lname, image', 'users', 'id='.$receiver_id.'', '', 1);
			$html .='	
			<div class="sidemessage-header d-flex justify-content-between align-items-center">
                <div>
                    <a href="#"><img src="'.(!empty(@$get_receiver_info->image) ? base_url('uploads/profile/'.@$get_receiver_info->image.'') : base_url('uploads/unnamed.jpg')).'">'.@$get_receiver_info->fname .' '. @$get_receiver_info->lname.'</a>
                </div>
                <div>
                    <ul class="listmsgheader">
                        <li><a href="#" class="closemsg"><i class="fa fa-times"></i></a></li>
                    </ul>
                </div>
            </div>
			
            <div class="sidemessage-body specific_preview" id="latest_insert_chat">
			
                
				'.$this->display_chat($sender_id, $receiver_id, $event_id).'
               
				
            </div>
				';
		}
		$response['html'] = $html;
		$response['sender_id'] = $sender_id;
		$response['receiver_id'] = $receiver_id;
		echo json_encode($response);
	}
	function display_chat($sender_id = '', $receiver_id = '', $event_id ){
		$output = '';
		$userId = $this->session->userdata('loguserId');
		
		$chat_query = $this->db->query("select * from chat where (sender_id = ".@$sender_id." and receiver_id = ".@$receiver_id." and event_id = ".$event_id." and group_msg IS NULL) OR (sender_id = ".@$receiver_id." and receiver_id = ".@$sender_id." and event_id = ".$event_id." and group_msg IS NULL) ");
		$result = ($chat_query->num_rows() > 0) ? $chat_query->result() : '';
		
		$sender_user_image = $this->Mymodel->get_single_row_info('image', 'users', 'id='.@$sender_id.'', '', 1);
		$receiver_user_image = $this->Mymodel->get_single_row_info('image', 'users', 'id='.@$receiver_id.'', '', 1);
		if (is_array($result) || is_object($result)) {
			foreach($result as $k => $v){
				
				if(@$v->sender_id == @$userId){
					
					$output .='<div class="outgoing_msg d-flex justify-content-end">
						<div class="messageinnerimg order-2">
							<img src="'.(!empty(@$sender_user_image->image) ? base_url('uploads/profile/'.@$sender_user_image->image.'') : base_url('uploads/unnamed.jpg')).'" alt="">
						</div>
						<div class="sent_msg">
						  <div>
							<p>'.@$v->message.'</p>
							
							<span class="time_date text-right mt-0">'.date('M d Y', strtotime(@$v->created_at)).' | '.date('h:i A', strtotime(@$v->created_at)).'</span>
							'.$this->check_file($v->image).'
							
							
						  </div>
						</div>
					</div>';
				}else{
					
					//echo $this->db->last_query();
					$output .='<div class="incoming_msg d-flex justify-content-start">
						<div class="messageinnerimg">
							<img src="'.(!empty(@$receiver_user_image->image) ? base_url('uploads/profile/'.@$receiver_user_image->image.'') : base_url('uploads/unnamed.jpg')).'" alt="">
						</div>
						<div class="sent_msg">
						  <div>
							<p>'.@$v->message.'</p>
							<span class="time_date text-right mt-0">'.date('M d Y', strtotime(@$v->created_at)).' | '.date('h:i A', strtotime(@$v->created_at)).'</span>
							'.$this->check_file($v->image).'
						  </div>
						</div>
					</div>';
				}
				
			}
	    }
		return $output;
	}
	
	function check_file($file = ''){
		$result = '';
		if(!empty($file)){
			$explodeFile = explode('.', $file);
			if($explodeFile[1] == 'jpg' OR $explodeFile[1] == 'jpeg' OR $explodeFile[1] == 'png'){
				$result.= '<br><img src="'.base_url('uploads/chat/'.@$file.'').'" style="width:30%"> &nbsp;&nbsp;<a href="'.base_url('uploads/chat/'.@$file.'').'" download><span class="fa fa-download"></span></a>';
				
				//$result.= '<div id="filename"><div id="file_0"><span class="fa-stack fa-lg"><i class="fa fa-file fa-stack-1x "></i><strong class="fa-stack-1x" style="color:#FFF; font-size:12px; margin-top:2px;"></strong></span> <span style="font-size:15px;font-weight:800">'.@$file.'</span>&nbsp;&nbsp;<a href="'.base_url('uploads/chat/'.@$file.'').'" download><span class="fa fa-download"></span></a></div></div>';
			}else{
				$result.= '<div id="filename"><div id="file_0"><span class="fa-stack fa-lg"><i class="fa fa-file fa-stack-1x "></i><strong class="fa-stack-1x" style="color:#FFF; font-size:12px; margin-top:2px;"></strong></span> <span style="font-size:15px;font-weight:800">'.@$file.'</span>&nbsp;&nbsp;<a href="'.base_url('uploads/chat/'.@$file.'').'" download><span class="fa fa-download"></span></a></div></div>';
			}
			
		}
		return $result;
	}
	function send_message(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
			$this->form_validation->set_rules('sender_id', 'Sender Id', 'required|trim|numeric');
			$this->form_validation->set_rules('receiver_id', 'Receiver Id', 'required|trim|numeric');
			$this->form_validation->set_rules('event_id', 'Event Id', 'required|trim|numeric');
			//$this->form_validation->set_rules('message', 'Message', 'required|trim');
			if($this->form_validation->run() == true){
				
				if(!empty($_FILES['image']['name'])){
					$config['upload_path'] = 'uploads/chat'; # check path is correct
					$config['allowed_types'] = 'pdf|jpg|png|jpeg|docx|xlsx|csv'; # add video extenstion on here
					$config['overwrite'] = FALSE;
					$config['remove_spaces'] = TRUE;
					$image_name = preg_replace("/\s+/", "_", $_FILES['image']['name']);
					$config['file_name'] = $image_name;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('image')) {
					$array = array('vali_error' => 1, 'product_image_err' => $this->upload->display_errors());
					echo json_encode($array);
					exit();
					}else {
						$sender_id = $this->input->post('sender_id');
						$receiver_id = $this->input->post('receiver_id');
						$event_id = $this->input->post('event_id');
						$message = $this->input->post('message');
						$data = array('sender_id' => $sender_id, 'receiver_id' => $receiver_id, 'event_id' => $event_id, 'message' => $message, 'status' => '1', 'header_noti_status' => '1', 'image' => $image_name, 'created_at' => date('Y-m-d H:i:s'));
						
						$result= $this->Mymodel->add('chat', $data);
						if(!empty($result)){
							$chat_id = $result;
							$response['chat_id'] = $chat_id;
							$response['status'] = 1;
							//$response['message'] = 'Your event added successfully.';
							$chat_query = $this->db->query("select * from chat where sender_id = ".@$sender_id." and receiver_id = ".@$receiver_id." and event_id = ".@$event_id." and id = ".@$chat_id."")->row();
							
							$user_image = $this->Mymodel->get_single_row_info('image', 'users', 'id='.$chat_query->sender_id.'', '', 1);
							//echo $this->db->last_query();
							
							$response['sender_image'] = !empty($user_image->image) ? base_url('uploads/profile/'.@$user_image->image.'') : base_url('uploads/unnamed.jpg');
							$response['sender_message'] = $chat_query->message;
							$response['sender_date'] = date('M d Y', strtotime($chat_query->created_at));
							$response['sender_time'] = date('h:i A', strtotime($chat_query->created_at));
							$response['sender_file'] = $image_name;
							
						}else{
							$response['status'] = 0;
							//$response['message'] = 'Some error ocure.Please try again.';
						}
					}
				}else{
					$sender_id = $this->input->post('sender_id');
					$receiver_id = $this->input->post('receiver_id');
					$event_id = $this->input->post('event_id');
					$message = $this->input->post('message');
					$data = array('sender_id' => $sender_id, 'receiver_id' => $receiver_id, 'event_id' => $event_id, 'message' => $message, 'status' => '1', 'header_noti_status' => '1', 'created_at' => date('Y-m-d H:i:s'));
					
					$result= $this->Mymodel->add('chat', $data);
					if(!empty($result)){
						$chat_id = $result;
						$response['chat_id'] = $chat_id;
						$response['status'] = 1;
						//$response['message'] = 'Your event added successfully.';
						$chat_query = $this->db->query("select * from chat where sender_id = ".@$sender_id." and receiver_id = ".@$receiver_id." and event_id = ".@$event_id." and id = ".@$chat_id."")->row();
						
						$user_image = $this->Mymodel->get_single_row_info('image', 'users', 'id='.$chat_query->sender_id.'', '', 1);
						//echo $this->db->last_query();
						
						$response['sender_image'] = !empty($user_image->image) ? base_url('uploads/profile/'.@$user_image->image.'') : base_url('uploads/unnamed.jpg');
						$response['sender_message'] = $chat_query->message;
						$response['sender_date'] = date('M d Y', strtotime($chat_query->created_at));
						$response['sender_time'] = date('h:i A', strtotime($chat_query->created_at));
						$response['sender_file'] = '';
						
					}else{
						$response['status'] = 0;
						//$response['message'] = 'Some error ocure.Please try again.';
					}
				}
				
			}else{
				$response = array(
					'vali_error'   => 1,
					'sender_id_err' => form_error('sender_id'),
					'receiver_id_err' => form_error('receiver_id'),
					'event_id_err' => form_error('event_id'),
					'message_err' => form_error('message'),
				);
			}
		}
		echo json_encode($response);
	}
	
	function update_msg_noti(){
		//print_r($_POST);
		$sender_id = $this->input->post('sender_id');
		$receiver_id = $this->input->post('receiver_id');
		
		$noti_update = $this->db->query("update chat set status = '0', header_noti_status = '0' where sender_id = ".@$sender_id." and receiver_id = ".@$receiver_id." and group_msg IS NULL");
		if(!empty($noti_update)){
			$response['status'] = 1;
		}else{
			$response['status'] = 0;
		}
		echo json_encode($response);
	}
	function get_msgnotification(){
		if(!empty($this->session->userdata('loguserId'))){
			$userId = $this->session->userdata('loguserId');
			$get_chat_msg = $this->db->query("select * from chat where FIND_IN_SET($userId, receiver_id) and status = '1' and header_noti_status = '1' ORDER BY id DESC LIMIT 1")->row();
			if(!empty(@$get_chat_msg)){
				$response['status'] = 1;
				$response['chat_id'] = @$get_chat_msg->id;
				$response['event_id'] = base64_encode(@$get_chat_msg->event_id);
				$response['sender_id'] = @$get_chat_msg->sender_id;
				$response['receiver_id'] = @$get_chat_msg->receiver_id;
				$response['group_msg'] = @$get_chat_msg->group_msg;
			}else{
				$response['status'] = 0;
			}
		}else{
			$response['status'] = 0;
		}
		echo json_encode($response);
	}
	
	function updatemsg_notification(){
		$chat_id = $this->input->post('chat_id');
		$event_id = $this->input->post('event_id');
		$noti_update = $this->db->query("update chat set header_noti_status = '0' where id = ".@$chat_id." and event_id = ".base64_decode(@$event_id)."");
		if(!empty($noti_update)){
			echo 1;
		}else{
			echo 0;
		}
	}
	
	function count_allnewmsg(){
		if(!empty($this->session->userdata('loguserId'))){
			$userId = $this->session->userdata('loguserId');
			$event_id = $this->input->post('event_id');
			$get_chat_msg = $this->db->query("select * from chat where receiver_id = ".@$userId." and event_id = ".@$event_id." and status = '1' and group_msg IS NULL")->num_rows();
			if($get_chat_msg > 0){
				echo $get_chat_msg;
			}else{
				echo 0;
			}
		}else{
			echo 'current user not login.';
		}
	}
	
	function deleteMyevent($id){
		if(empty($id)){
			return false;
		}
		$deleteQuery = $this->db->query("delete from event where event_id = ".$id."");
		if(!empty($deleteQuery)){
			$this->session->set_flashdata('msg', 'Your event deleted successfully.');
			redirect('event/my-event');
		}
	}
	
	function event_participant(){
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Event and Participant',
			'subpage' => 'event',
		);
       
	   	$userId = $this->session->userdata('loguserId');
		$query = $this->db->query("select * from users where status = '1' and id = ".@$userId." ORDER BY id DESC");
		$data['user'] = ($query->num_rows() > 0) ? $query->row() : FALSE;
		
        $query = $this->db->query("select event_id, event_name, event_date, event_time, event_description, event_price from event where status = '1' and user_id = ".$userId." ORDER BY event_id DESC");
		$data['list'] = ($query->num_rows() > 0) ? $query->result() : FALSE;
		$this->load->view('header', $data);
		$this->load->view('account/event_and_participant');
		$this->load->view('footer');
	}
	
	public function fetchBank()
	{
		$response = [];
		$html = '';
		$eId = $this->input->post('eId'); 
		//$details =$this->adminmodel->fetch_row('bank', "user_id='".$userId."'");
		//$query = $this->db->query("select * from event_invited_people where event_id = ".@$eId." and status = '1'");
		$query = $this->db->query("SELECT event_invited_people.id, event_invited_people.email, event_invited_people.transaction, event_invited_people.event_id, event_invited_people.distributed_event_price, event_invited_people.user_id, event_invited_people.status, (select fname from users where email = event_invited_people.email) as fname, (select lname from users where email = event_invited_people.email) as lname, (select id from users where email = event_invited_people.email) as userId FROM event_invited_people where event_invited_people.event_id = ".@$eId."");
		$result = ($query->num_rows() > 0) ? $query->result() : '';
		$html .='<table  class="table table-bordered table-striped">
		<thead>
		<tr>
		<th>Invited Guest </th>
		<th>Email </th>
		<th>Event Amount</th>
		<th>Balance</th>
		<th>Transaction</th>
		<th>Status</th>
		</tr>
		</thead>
		<tbody>';
			if (is_array($result) || is_object($result)) {
				foreach($result as $k => $v){
					$getUser = $this->db->query("select fname, id, lname from users where email = '".@$v->email."' and status = '1'")->row();
					$userName = !empty($getUser->fname) ? @$getUser->fname .' '. @$getUser->lname : 'New User - Awaiting user registration';
					
					if(!empty(@$v->fname) || !empty(@$v->lname)){
						$status = '<div style="color: white;background: green;width: 100%;padding: 5px;font-weight: 700;border-radius: 5px;">Registered</div>';
						//$status = '<div style="color: white;background: green;width: 64%;padding: 5px;font-weight: 700;border-radius: 5px;">Not register yet.</div>';
					}else{
						$status = '<div style="color: white;background: red;width: 100%;padding: 5px;font-weight: 700;border-radius: 5px;">Not registered.</div>';
					}
					if(!empty($getUser->id)){
					    $query = $this->db->query("select sum(amount) as totalAmount from transaction where user_id = ".$getUser->id." and event_id = ".$v->event_id." and payment_type = '2' and status = 'succeeded'")->row();
						$totolAmount = $query->totalAmount;
						$balance = $v->distributed_event_price - $totolAmount;
					}else{
						$balance = $v->distributed_event_price;
						$totolAmount = 0;
					}
					if($v->distributed_event_price == $totolAmount){
						$trans_status = 'Paid';
					}elseif($totolAmount == 0){
						$trans_status = 'Unpaid';
					}elseif($balance < $v->distributed_event_price){
						$trans_status = 'Paid in Part';
					}
					
					$html .= '
					<tr>
						<td>'.@$userName.'</td>
						<td>'.$v->email.'</td>
						<td>$'.$v->distributed_event_price.'</td>
						<td>$'.number_format(@$balance, 2).'</td>
						<td>
							<select data-value="'.@$v->userId.'" relid="'.@$v->event_id.'" id_attr="'.@$v->id.'" name="sub_status" row="12px" id="sub_status" class="substatusClass form-control" style="width: 60%;height: 50px;margin: 0px 30px;border: 1px solid black;">
								<option value="">Select</option>
								<option value="Paid" '.((@$trans_status == 'Paid') ? 'selected' : '').'>Paid</option>
								<option value="Not Paid" '.((@$trans_status == 'Unpaid') ? 'selected' : '').'>Unpaid</option>
							</select><br/>
							<p style="margin: 0px 55px;">'.@$trans_status.'</p>
						</td>
						<td>'.@$status.'</td>
					</tr>
					';
				}
				$response['html'] = $html;
			}else{
				$response['html'] = 'No data found.';
			}
		$html .='</tbody>
		</table>';
		echo json_encode($response);
	}
	
	function update_event_payment(){
		//print_r($_POST);die;
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$event_id = $this->input->post('event_id');
			$user_id = $this->input->post('user_id');
			$transaction = $this->input->post('transaction');
			$id = $this->input->post('id');
			$addamount = $this->input->post('amount');
			
			$get_user_count = $this->db->query("select id from users where id = ".@$user_id."")->num_rows();
			if($get_user_count > 0){
				$update_event_pay = $this->db->query("update event_invited_people set transaction = '".@$transaction."' where id = ".@$id." and event_id = ".@$event_id."");
				if($transaction == 'Paid'){
					if(!empty(@$update_event_pay)){
						
						$get_user = $this->db->query("select id, fname, lname, email, address, country, state, city, zipcode from users where id = ".@$user_id."")->row();
						$get_invited_people = $this->db->query("select distributed_event_price from event_invited_people where id = ".@$id." and event_id = ".@$event_id." ")->row();
						
						//print_r($addamount);die;
						if($addamount != ''){
							$amount = @$addamount;
						}else{
							$amount = @$get_invited_people->distributed_event_price;
						}
						//print_r($amount);die;
						$cardholder = @$get_user->fname .' '. @$get_user->lname;
						$user_id = @$user_id;
						$email =  @$get_user->email;
						$country =  @$get_user->country;
						$state =  @$get_user->state;
						$city =  @$get_user->city;
						$zipcode =  @$get_user->zipcode;
						$address = @$get_user->address;
						$currency = "USD";
						$orderID = "TEST_".$this->generate_otp(6);

						
						$tran_data = array(
							'user_name' => $cardholder, 'user_id' => $user_id, 'order_id' => $orderID, 'address' => $address, 'country' => $country, 'state' => $state, 'city' => $city, 'zipcode' => $zipcode, 'amount' => $amount, 'payment_type' => '2', 'status' => 'succeeded', 'currency' => 'usd', 'event_id' => $event_id, 'paid_by_admin' => '2', 'created_at' => date('Y-m-d H:i:s')
						);
						$result= $this->Adminmodel->add('transaction', $tran_data);
						if(!empty($result)){
							$response['status'] = 1;
							$response['message'] = 'You have successfully added a payment for this user.';
						}else{
							$response['status'] = 0;
							$response['message'] = 'some error occure.please try again.';
						}
					}
				}else{
					if(!empty(@$update_event_pay)){
						$delete_tran = $this->db->query("delete from transaction where user_id = ".@$user_id." and event_id = ".@$event_id." and payment_type = '2' and paid_by_admin = '2'");
						
						if(!empty($delete_tran)){
							$response['status'] = 1;
							$response['message'] = 'transaction deleted successfully.';
						}else{
							$response['status'] = 0;
							$response['message'] = 'some error occure.please try again.';
						}
					}
				}
			}else{
				$response['status'] = 0;
				$response['message'] = 'user not register yet.';
			}
			
		}
		echo json_encode($response);
	}
	public function generate_otp($length)
	{
		$characters = '123456789';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++)
		{
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	
	function email_already_exist(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$event_id = $this->input->post('event_id');
			$email = $_POST['email'];
			if(!empty($email)){
				$countemail =array_filter(@$email);
				//print_r($countemail);
				//echo $countemail;die;
				for($i = 0; $i < count($countemail); $i++){
				
                    // if($i == 0){
						// break;
					// }
					//echo 'email = '.$email[$i].'';
					$checkEmail = $this->db->query("select email from event_invited_people where email = '".$email[$i]."' and event_id = '".$event_id."'")->num_rows();
					 //echo $this->db->last_query();
					// echo $checkEmail;
					if($checkEmail > 0){
						$response['status'] = false; 
						$response['email'] = $email[$i]; 
						echo json_encode($response);
						return false;
						
					}
					
				}
				$response['status'] = true; 
				echo json_encode($response);
				return true;
			}
			  
			
		}
		
	}
	
	function remove_event_participant(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$eId = $this->input->post('eId');
			$participantId = $this->input->post('participantId');
			$userId = $this->session->userdata('loguserId');
			$remove_participant = $this->db->query("delete from event_invited_people where id = ".@$participantId."");
			if(!empty(@$remove_participant)){
				$user_pay_customize = $this->Mymodel->get_single_row_info('customize_payment', 'users', 'id='.$userId.'', '', 1);
				if($user_pay_customize->customize_payment == 0){
					$event_participant_count = $this->db->query("select email from event_invited_people where event_id = '".$eId."'")->num_rows();
					$event_price = $this->Mymodel->get_single_row_info('event_price', 'event', 'event_id='.$eId.'', '', 1);
					$distribute_amount = @$event_price->event_price / @$event_participant_count;
					$update = $this->db->query("update event_invited_people set distributed_event_price = '".@$distribute_amount."' where event_id = ".$eId."");
					
					if(!empty($update)){
						$response['status'] = 1;
						$response['message'] = 'Your event participant deleted successfully.';
					}else{
						$response['status'] = 0;
						$response['message'] = 'Some error occure,Please try again.';
					}
				}else{
					if(!empty($remove_participant)){
						$response['status'] = 1;
						$response['message'] = 'Your event participant deleted successfully.';
					}else{
						$response['status'] = 0;
						$response['message'] = 'Some error occure,Please try again.';
					}
				}

			}
		}
		echo json_encode(@$response);
	}
	
	function get_group_chat(){
		$html = '';
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$userId = $this->session->userdata('loguserId');
			$sender_id = $this->input->post('sender_id');
			$event_id = $this->input->post('event_id');
			$host_user_id = $this->input->post('host_user_attr');
			$host_email = $this->Mymodel->get_single_row_info('id, email', 'users', 'id='.$host_user_id.'', '', 1);
			//$get_receiver_info = $this->Mymodel->get_single_row_info('name, event_name, event_id', 'event', 'event_id='.$event_id.'', '', 1);
			$event_info = $this->db->query("select event_name, event_id, (select image from event_gallery where event_id = ".$event_id." LIMIT 1) as event_image from event where event_id = ".$event_id."")->row();
			$html .='	
			<div class="sidemessage-header d-flex justify-content-between align-items-center">
                <div>
                    <a href="#"><img src="'.(!empty(@$event_info->event_image) ? base_url('uploads/event/'.@$event_info->event_image.'') : base_url('uploads/noimage.jpg')).'">'.substr(@$event_info->event_name, 0, 30).'</a>
                </div>
                <div>
                    <ul class="listmsgheader">
                        <li><a href="#" class="closemsg"><i class="fa fa-times"></i></a></li>
                    </ul>
                </div>
            </div>
			
            <div class="sidemessage-body specific_preview_groupchat" id="latest_insert_groupchat">
                '.$this->display_group_chat($sender_id, $event_id).'
            </div>';
			
			
		}
		//$user_email = $this->Mymodel->get_single_row_info('id, email', 'users', 'id='.$userId.'', '', 1);
		
		//$get_invited_people = $this->db->query("select email from event_invited_people where event_id = ".@$event_id." and user_id = ".@$host_user_id." and email != '".@$user_email->email."'")->result();
		
		
		$response['html'] = $html;
		$response['sender_id'] = $sender_id;
		//$response['receiver_id'] = $receiver_id;
		$response['host_id'] = $host_email->id;
		echo json_encode($response);
	}
	function display_group_chat($sender_id, $event_id){
		
		$output = '';
		$userId = $this->session->userdata('loguserId');
		
		$chat_query = $this->db->query("select * from chat where event_id = ".$event_id." and group_msg = '1'");
		$result = ($chat_query->num_rows() > 0) ? $chat_query->result() : '';
		//print_r($result);die;
		
		$sender_user_image = $this->Mymodel->get_single_row_info('image', 'users', 'id='.@$sender_id.'', '', 1);
		//$receiver_user_image = $this->Mymodel->get_single_row_info('image', 'users', 'id='.@$receiver_id.'', '', 1);
		if (is_array($result) || is_object($result)) {
			foreach($result as $k => $v){
				$receiver_user_image = $this->Mymodel->get_single_row_info('image', 'users', 'id='.@$v->sender_id.'', '', 1);
				if(@$v->sender_id == @$userId){
					
					$output .='<div class="outgoing_msg d-flex justify-content-end">
						<div class="messageinnerimg order-2">
							<img src="'.(!empty(@$sender_user_image->image) ? base_url('uploads/profile/'.@$sender_user_image->image.'') : base_url('uploads/unnamed.jpg')).'" alt="">
						</div>
						<div class="sent_msg">
						  <div>
							<p>'.@$v->message.'</p>
							<span class="time_date text-right mt-0">'.date('M d Y', strtotime(@$v->created_at)).' | '.date('h:i A', strtotime(@$v->created_at)).'</span>
							'.$this->check_file($v->image).'
						  </div>
						</div>
					</div>';
				}else{
					
					//echo $this->db->last_query();
					$output .='<div class="incoming_msg d-flex justify-content-start">
						<div class="messageinnerimg">
							<img src="'.(!empty(@$receiver_user_image->image) ? base_url('uploads/profile/'.@$receiver_user_image->image.'') : base_url('uploads/unnamed.jpg')).'" alt="">
						</div>
						<div class="sent_msg">
						  <div>
							<p>'.@$v->message.'</p>
							<span class="time_date text-right mt-0">'.date('M d Y', strtotime(@$v->created_at)).' | '.date('h:i A', strtotime(@$v->created_at)).'</span>
							'.$this->check_file($v->image).'
						  </div>
						</div>
					</div>';
				}
				
			}
	    }
		return $output;
	
	}
	
	function send_group_chat(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
			$this->form_validation->set_rules('sender_id', 'Sender Id', 'required|trim|numeric');
			$this->form_validation->set_rules('host_id', 'Host Id', 'required|trim|numeric');
			$this->form_validation->set_rules('event_id', 'Event Id', 'required|trim|numeric');
			//$this->form_validation->set_rules('message', 'Message', 'required|trim');
			if($this->form_validation->run() == true){
				
				if(!empty($_FILES['image']['name'])){
					$config['upload_path'] = 'uploads/chat'; # check path is correct
					$config['allowed_types'] = 'pdf|jpg|png|jpeg|docx|xlsx|csv'; # add video extenstion on here
					$config['overwrite'] = FALSE;
					$config['remove_spaces'] = TRUE;
					$image_name = preg_replace("/\s+/", "_", $_FILES['image']['name']);
					$config['file_name'] = $image_name;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('image')) {
					$array = array('vali_error' => 1, 'image_err' => $this->upload->display_errors());
					echo json_encode($array);
					exit();
					}else {
						$sender_id = $this->input->post('sender_id');
						$host_id = $this->input->post('host_id');
						$event_id = $this->input->post('event_id');
						$message = $this->input->post('message');
						
						$host_data = $this->Mymodel->get_single_row_info('id, email', 'users', 'id='.@$host_id.'', '', 1);
						$my_data = $this->Mymodel->get_single_row_info('id, email', 'users', 'id='.@$sender_id.'', '', 1);
						$get_invited_people = $this->db->query("select * from event_invited_people where email != '".@$my_data->email."' and event_id = ".@$event_id."")->result();
						if(!empty($get_invited_people)){
							$check_host_exist = $this->db->query("select * from event_invited_people where email = '".@$host_data->email."' and event_id = ".@$event_id."")->num_rows();
							
							if($check_host_exist > 0){
								
							}else{
								$host_receiver_id = $this->Mymodel->get_single_row_info('id, email', 'users', 'email="'.@$host_data->email.'"', '', 1);
								$get_invited_people[] = (object)[
									'id' => 0,
									'email' => @$host_receiver_id->email,
									'event_id' => '',
									'distributed_event_price'=>'',
									'user_id' => '',
									'status' => '',
									'transaction' => '',
									'created_at' => '',
									'updated_at' => ''
								];
							}
							$receiver_id = [];
							foreach($get_invited_people as $k => $v){  
								$invited_people = $this->Mymodel->get_single_row_info('id', 'users', 'email="'.@$v->email.'"', '', 1);
								if(!empty($invited_people)){
									$receiver_id[] = $invited_people->id;
								}
							}
						}
						$data = array('sender_id' => $sender_id, 'receiver_id' => implode(',', $receiver_id), 'event_id' => $event_id, 'message' => $message, 'status' => '1', 'image' => $image_name, 'header_noti_status' => '1', 'created_at' => date('Y-m-d H:i:s'), 'group_msg' => '1');
						$result= $this->Mymodel->add('chat', $data);
						
						
						if(!empty($result)){
							$chat_id = $result;
							$response['chat_id'] = $chat_id;
							$response['status'] = 1;
							$receiverId = implode(',', @$receiver_id);
							$chat_query = $this->db->query("select * from chat where sender_id = ".@$sender_id." and receiver_id = '".@$receiverId."' and event_id = ".@$event_id." and id = ".@$chat_id."")->row();
							
							$user_image = $this->Mymodel->get_single_row_info('image', 'users', 'id='.$chat_query->sender_id.'', '', 1);
							//echo $this->db->last_query();
							
							$response['sender_image'] = !empty($user_image->image) ? base_url('uploads/profile/'.@$user_image->image.'') : base_url('uploads/unnamed.jpg');
							$response['sender_message'] = $chat_query->message;
							$response['sender_date'] = date('M d Y', strtotime($chat_query->created_at));
							$response['sender_time'] = date('h:i A', strtotime($chat_query->created_at));
							$response['sender_file'] = $image_name;
							
						}else{
							$response['status'] = 0;
							//$response['message'] = 'Some error ocure.Please try again.';
						}
					}
				}else{
					$sender_id = $this->input->post('sender_id');
					$host_id = $this->input->post('host_id');
					$event_id = $this->input->post('event_id');
					$message = $this->input->post('message');
					
					$host_data = $this->Mymodel->get_single_row_info('id, email', 'users', 'id='.@$host_id.'', '', 1);
					$my_data = $this->Mymodel->get_single_row_info('id, email', 'users', 'id='.@$sender_id.'', '', 1);
					$get_invited_people = $this->db->query("select * from event_invited_people where email != '".@$my_data->email."' and event_id = ".@$event_id."")->result();
					if(!empty($get_invited_people)){
						$check_host_exist = $this->db->query("select * from event_invited_people where email = '".@$host_data->email."' and event_id = ".@$event_id."")->num_rows();
						
						if($check_host_exist > 0){
							
						}else{
							$host_receiver_id = $this->Mymodel->get_single_row_info('id, email', 'users', 'email="'.@$host_data->email.'"', '', 1);
							$get_invited_people[] = (object)[
								'id' => 0,
								'email' => @$host_receiver_id->email,
								'event_id' => '',
								'distributed_event_price'=>'',
								'user_id' => '',
								'status' => '',
								'transaction' => '',
								'created_at' => '',
								'updated_at' => ''
							];
						}
						$receiver_id = [];
						foreach($get_invited_people as $k => $v){  
							$invited_people = $this->Mymodel->get_single_row_info('id', 'users', 'email="'.@$v->email.'"', '', 1);
							if(!empty($invited_people)){
								$receiver_id[] = $invited_people->id;
							}
						}
					}
					$data = array('sender_id' => $sender_id, 'receiver_id' => implode(',', $receiver_id), 'event_id' => $event_id, 'message' => $message, 'status' => '1', 'header_noti_status' => '1', 'created_at' => date('Y-m-d H:i:s'), 'group_msg' => '1');
					$result= $this->Mymodel->add('chat', $data);
					
					
					if(!empty($result)){
						$chat_id = $result;
						$response['chat_id'] = $chat_id;
						$response['status'] = 1;
						$receiverId = implode(',', @$receiver_id);
						$chat_query = $this->db->query("select * from chat where sender_id = ".@$sender_id." and receiver_id = '".@$receiverId."' and event_id = ".@$event_id." and id = ".@$chat_id."")->row();
						
						$user_image = $this->Mymodel->get_single_row_info('image', 'users', 'id='.$chat_query->sender_id.'', '', 1);
						//echo $this->db->last_query();
						
						$response['sender_image'] = !empty($user_image->image) ? base_url('uploads/profile/'.@$user_image->image.'') : base_url('uploads/unnamed.jpg');
						$response['sender_message'] = $chat_query->message;
						$response['sender_date'] = date('M d Y', strtotime($chat_query->created_at));
						$response['sender_time'] = date('h:i A', strtotime($chat_query->created_at));
						$response['sender_file'] = '';
						
					}else{
						$response['status'] = 0;
						//$response['message'] = 'Some error ocure.Please try again.';
					}
				}
				

			}else{
				$response = array(
					'vali_error'   => 1,
					'sender_id_err' => form_error('sender_id'),
					'receiver_id_err' => form_error('receiver_id'),
					'event_id_err' => form_error('event_id'),
					'message_err' => form_error('message'),
				);
			}
		}
		echo json_encode($response);
	}
	function get_invited_user_info(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$id = $this->input->post('id');
			$row = $this->db->query("select * from event_invited_people where id = ".@$id."")->row();
			$response['email'] = $row->email;
			$response['distributed_event_price'] = $row->distributed_event_price;
		}
		echo json_encode($response);
	}
	
	function update_invitee(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
			
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
			$this->form_validation->set_rules('amount', 'Amount', 'required|trim|numeric');
			if($this->form_validation->run() == true){
				$checkemailexist = $this->db->query("select * from event_invited_people where id =".trim(strip_tags($this->input->post('id')))."")->row();
				
				if(@$checkemailexist->email != trim(strip_tags(@$this->input->post('email')))){
					$email_exit = $this->db->query("select * from event_invited_people where email ='".$this->input->post('email')."' and event_id = ".$this->input->post('event_id')."")->num_rows();
					
					if($email_exit > 0){
						$response['email_exist'] = 'This email address is already invited for this event';
						echo json_encode($response);exit();
					}else{
						
						$clientamount = $this->input->post('amount');
						$total_amount_sum = $this->Mymodel->total_sum(trim(strip_tags(@$this->input->post('event_id'))));
						$total_event_amount = $clientamount + $total_amount_sum->totalAmount;
						$eventPrice = $this->Mymodel->get_single_row_info('event_price', 'event', 'event_id='.trim(strip_tags(@$this->input->post('event_id'))).'', '', 1);
						if(@$total_event_amount <= @$eventPrice->event_price){
							$data = array('email' => $this->input->post('email'), 'distributed_event_price' => $this->input->post('amount'));
							$result = $this->Mymodel->update($data, 'event_invited_people', array('event_id' => $this->input->post('event_id'), 'id' => $this->input->post('id')));
							if(!empty($result)){
								 // $event_info = $this->Mymodel->get_single_row_info('event_name, user_id', 'event', 'event_id='.trim(strip_tags(@$this->input->post('event_id'))).'', '', 1);
									
								 // $user_info = $this->Mymodel->get_single_row_info('fname, lname', 'users', 'id='.$event_info->user_id.'', '', 1);
								 // $from = $user_info->fname.' '.@$user_info->lname;
								 // $this->sendMail(@$this->input->post('email'), $event_info->event_name, $from, $this->input->post('amount'));
								
								$response['status'] = 1;
								$response['message'] = 'Invited people updated successfully.';
							}
						}else{
							$response['large_amount'] = 'Your have enter distributed amount greater than event amount.Please enter small amount.';
						}

					}
					
					
				}else{
					$clientamount = $this->input->post('amount');
					$total_amount_sum = $this->Mymodel->total_sum(trim(strip_tags(@$this->input->post('event_id'))));
					$total_event_amount = $clientamount + $total_amount_sum->totalAmount;
					$eventPrice = $this->Mymodel->get_single_row_info('event_price', 'event', 'event_id='.trim(strip_tags(@$this->input->post('event_id'))).'', '', 1);
					if(@$total_event_amount <= @$eventPrice->event_price){
						$data = array('email' => $this->input->post('email'), 'distributed_event_price' => $this->input->post('amount'));
						$result = $this->Mymodel->update($data, 'event_invited_people', array('event_id' => $this->input->post('event_id'), 'id' => $this->input->post('id')));
						if(!empty($result)){
							
							 // $event_info = $this->Mymodel->get_single_row_info('event_name, user_id', 'event', 'event_id='.trim(strip_tags(@$this->input->post('event_id'))).'', '', 1);
								
							 // $user_info = $this->Mymodel->get_single_row_info('fname, lname', 'users', 'id='.$event_info->user_id.'', '', 1);
							 // $from = $user_info->fname.' '.@$user_info->lname;
							 // $this->sendMail(@$this->input->post('email'), $event_info->event_name, $from, $this->input->post('amount'));
								
							$response['status'] = 1;
							$response['message'] = 'Invited people updated successfully.';
						}
					}else{
						$response['large_amount'] = 'Your have enter distributed amount greater than event amount.Please enter small amount.';
					}
					
				}
				
			}else{
				$response = array(
					'vali_error'   => 1,
					'email_err' => form_error('email'),
					'amount_err' => form_error('amount'),
				);
			}
		}
		echo json_encode($response);
	}
	
	function send_email_updated_invited(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if(!empty(@$this->input->post('event_id'))){
				$event_info = $this->Mymodel->get_single_row_info('event_name, user_id, event_date, event_time', 'event', 'event_id='.trim(strip_tags(@$this->input->post('event_id'))).'', '', 1);
				$user_info = $this->Mymodel->get_single_row_info('fname, lname', 'users', 'id='.$event_info->user_id.'', '', 1);
				$from = $user_info->fname.' '.@$user_info->lname;
				$date = $event_info->event_date.' '.$event_info->event_time;
				$send = $this->sendMail(@$this->input->post('email'), $event_info->event_name, $from, $this->input->post('amount'), $date);
				if(!empty($send)){
					echo 'send mail successfully.';
				}else{
					echo 'not sent.';
				}
			}
		}
	}
	function updated_event_notify(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if(!empty(@$this->input->post('event_id'))){
				$get_invited_people = $this->db->query("select * from event_invited_people where event_id = ".@$this->input->post('event_id')."")->result();
				if(!empty(@$get_invited_people)){
					$event_info = $this->Mymodel->get_single_row_info('event_name, user_id', 'event', 'event_id='.trim(strip_tags(@$this->input->post('event_id'))).'', '', 1);
					
		
						$from_email = "info@madetosplit.com"; 
						$imagePath = base_url() . 'uploads/logos/logo.png';
						$imagebackPath = '';
						$mesg = "<!Doctype html>
						<html>
							<head>
								<meta charset='utf-8'>
								<meta name='viewport' content='width=device-width, initial-scale=1'>
								<title>Invite People</title>
								<link href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap' rel='stylesheet'>
								</head>
							<body>
								<div style='max-width:600px;
								margin:auto;
								border:1px solid #eee;
								box-shadow:0 0 10px rgba(0, 0, 0, .15);
								line-height:17px;
								font-size:13px;
								box-sizing:border-box; -webkit-print-color-adjust: exact;font-family: Poppins, sans-serif; background:url(".$imagebackPath.")'>
									<div style='padding:20px; box-sizing: border-box;text-align: center; background: #fff;'>
										<a href='#'><img src='".$imagePath."' style='width: 350px; height80px;'></a>
									</div>
									<div style='width: 400px; margin:50px auto;background: #ffffffd1;padding: 50px;text-align: center;'>
										<h1 style=' font-size: 30px; line-height: 32px; color: #0b0b0b; margin: 30px 0;'>Dear User</h1>
										<p style='font-size: 15px;color: #262626;line-height: 24px;margin: 20px 0;'>There is update in event (".@$event_info->event_name."). Please check updated event. </p>

										<a href='".base_url('event/details?eId='.base64_encode(@$this->input->post('event_id')).'')."' >Check Here</a>
									</div>
									
									<div style='background: #000;
									text-align: left;
									box-sizing: border-box;
									width: 100%;
									padding: 20px 50px;
									color: #fff;'>
										<p style='margin: 5px 0;font-size: 12px;'>Warm Regards,</p>
										<p style='margin: 5px 0;font-size: 12px;'>Made to Split</p>
										<p style='margin: 5px 0;font-size: 12px;'><strong>Email:</strong> <a href='#' style='color: #78daff;'>info@madetosplit.com</a></p>
										<br/>
										<p style='margin: 5px 0;font-size: 11px;'>This is an automated response, please do not reply.</p>
									</div>
								</div>
							</body>
						</html>";
						$subject = "Updated event notify (".@$event_info->event_name.")";
						foreach(@$get_invited_people as $k => $v){
							$this->Mymodel->send_mail($v->email, $from_email, $mesg, $subject, 'info@madetosplit.com', 'M@d32spl1t');
							
							    $userInfo = $this->db->query("select id from users where email = '".@$v->email."'")->row();
								if(!empty($userInfo)){
									//'You have invited for ".$event_name."</strong> event from <strong>".@$from." '
									$msg = "Updated event notify (".@$event_info->event_name.")";
									$this->Mymodel->sendMsg($userInfo->id, $msg);
								}
						}
				}
			}
		}
	}
	function send_email_cohost(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$event_id = $this->input->post('event_id');
			$co_host_id = $this->input->post('co_host_id');
			
			$event_info = $this->Mymodel->get_single_row_info('event_id, event_name, user_id, event_address, event_date, event_time', 'event', 'event_id='.@$event_id.'', '', 1);
			$co_host_info = $this->Mymodel->get_single_row_info('id, fname, lname, email', 'users', 'id='.@$co_host_id.'', '', 1);
			$host_info = $this->Mymodel->get_single_row_info('id, fname, lname, email', 'users', 'id='.@$event_info->user_id.'', '', 1);
			$from_email = "info@madetosplit.com"; 
			$subject = "Selected as Co-Host (".@$event_info->event_name.")";
			$imagePath = base_url() . 'uploads/logos/logo.png';
			$imagebackPath = '';
			
			$mesg = "<!Doctype html>
				<html>
				<head>
					<meta charset='utf-8'>
					<meta name='viewport' content='width=device-width, initial-scale=1'>
					<title>Invite People</title>
					<link href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap' rel='stylesheet'>
					</head>
				<body>
					<div style='max-width:600px;
					margin:auto;
					border:1px solid #eee;
					box-shadow:0 0 10px rgba(0, 0, 0, .15);
					line-height:17px;
					font-size:13px;
					box-sizing:border-box; -webkit-print-color-adjust: exact;font-family: Poppins, sans-serif; background:url(".$imagebackPath.")'>
						<div style='padding:20px; box-sizing: border-box;text-align: center; background: #fff;'>
							<a href='#'><img src='".$imagePath."' style='width: 350px; height80px;'></a>
						</div>
						
						<div style='width: 400px; margin:50px auto;background: #ffffffd1;padding: 50px;text-align: center;'>
							<h1 style=' font-size: 30px; line-height: 32px; color: #0b0b0b; margin: 30px 0;'>Dear User</h1>
							<p style='font-size: 15px;color: #262626;line-height: 24px;margin: 20px 0;text-align: justify;'>You are selected as a Co-Host for <strong>(".@$event_info->event_name.")</strong> this event.</p>
						</div>
						
						
						
						<div style='margin: 0px 96px;margin-top: -60px;'>
							<span><strong>Event &nbsp; : &nbsp; </strong>  ".@$event_info->event_name."</span>	<br>
							<span><strong>Venue &nbsp; : &nbsp; </strong>".@$event_info->event_address."</span>	<br>
							<span><strong>Date & Time &nbsp; : &nbsp; </strong>".date('d M, Y', strtotime(@$event_info->event_date)) .' '.@$event_info->event_time."</span>
						</div><br>
						
						<div style='background: #f7931e;width: 20%;margin: 5px 13rem;border-radius: 7px;'>
						<a href='".base_url('event/details?eId='.base64_encode(@$event_info->event_id).'')."' style='padding: 9px 0px;position: absolute;margin: 0px 22px;text-decoration: none;font-size: 14px;font-weight: 900;color: white;'>Check Here</a><br><br>
						</div>
						
						<div style='background: #000;
						text-align: left;
						box-sizing: border-box;
						width: 100%;
						padding: 20px 50px;
						color: #fff;'>
							<p style='margin: 5px 0;font-size: 12px;'>Warm Regards,</p>
							<p style='margin: 5px 0;font-size: 12px;'>Made to Split</p>
							<p style='margin: 5px 0;font-size: 12px;'><strong>Email:</strong> <a href='#' style='color: #78daff;'>info@madetosplit.com</a></p>
							<br/>
							<p style='margin: 5px 0;font-size: 11px;'>This is an automated response, please do not reply.</p>
						</div>
					</div>
				</body>
			</html>";
			
			$this->Mymodel->send_mail($co_host_info->email, $from_email, $mesg, $subject, 'info@madetosplit.com', 'M@d32spl1t');
		}
	}
	
	function upload_csv(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$userId = $this->session->userdata('loguserId');
			$csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv','text/xls','text/xlsx');
			if(!empty($_FILES['file']['name'])){
				if(in_array($_FILES['file']['type'],$csvMimes)){
					if(is_uploaded_file($_FILES['file']['tmp_name'])){
						$event_info = $this->Mymodel->get_single_row_info('user_id, event_price', 'event', 'event_id='.$this->input->post('eventId').'', '', 1);
						$check_customize_payment = $this->Mymodel->get_single_row_info('customize_payment', 'users', 'id='.$event_info->user_id.'', '', 1);
						
						$get_sub_id = $this->Mymodel->get_single_row_info('id', 'transaction', 'user_id='.$event_info->user_id.' and payment_type = "1"', 'id DESC', 1);
						
						if($check_customize_payment->customize_payment == 1){
							$csv_explode_email = [];
							$csv_explode_amount = [];
							$csv_explode_phone = [];
							//open uploaded csv file with read only mode
							$csvFile = fopen($_FILES['file']['tmp_name'], 'r');
							// skip first line
							// if your csv file have no heading, just comment the next line
							fgetcsv($csvFile);
							$event_id = $this->input->post('eventId');
							$subscription = $this->input->post('subscription');
							while(($line = fgetcsv($csvFile)) !== FALSE){ 
								//print_r($line[0]);
								$csv_explode_email[] = $line[0];
								$csv_explode_amount[] = $line[1];
								$csv_explode_phone[] = $line[2];
								// $checkEmail = $this->db->query("select email from event_invited_people where email = '".$email."' and event_id = '".$event_id."'")->num_rows();
								// if($checkEmail > 0){
								// $response['status'] = false; 
								// $response['email'] = $email; 
								// echo json_encode($response);
								// //return false;
								// }
								// $duplicate = $this->return_dup($line[0]);
								// echo $duplicate;
							}
							$mobile_number = array_filter(@$csv_explode_phone);
							//$amount_filter = array_filter($csv_explode_amount);
							$amount_filter = $csv_explode_amount;
							//print_r($amount_filter);die;
							$array_email = !empty($this->showDups(array_filter($csv_explode_email))) ? $this->showDups(array_filter($csv_explode_email)) : '';
							$array_email_count = !empty($array_email) ? count((array)$array_email) : 0;
							//echo $array_email_count;die;
							if($array_email_count > 0){
								//print_r($array_email);
								$response['dublicate'] = 0;
								$response['dublicateEmail'] = $array_email;
								echo json_encode($response);
								return false;
							}else{
								//echo 'not duplicate';
								$check_mail = $this->validateEmail($csv_explode_email);
								//print_r($check_mail);die;
								if($check_mail['status'] == 0){
									$response['invalid_email_status'] = 0;
									$response['invalidEmail'] = $check_mail['invalid_email'];
									echo json_encode($response);
									return false;
								}
								
								// amount greater that event amount
                                $large_amount = $this->check_bulk_amount($event_id, $amount_filter);
								//print_r($large_amount);die;
								if(@$large_amount > @$event_info->event_price){
									$response['large_amount_status'] = 0;
									$response['message'] = 'Your have enter distributed amount greater than event amount.Please enter small amount.';
									echo json_encode($response);
									return false;
								}
								
								for($i = 0; $i < count($csv_explode_email); $i++){
									if(!empty($csv_explode_email[$i])){
										// print_r($csv_explode_email[$i]);
										// print_r($amount_filter[$i]);
										$result[] = $this->db->query("INSERT INTO event_invited_people (email, event_id, distributed_event_price, user_id, status, invited_people, created_at, tran_id)VALUES ('".@$csv_explode_email[$i]."', ".@$event_id.", ".@$amount_filter[$i].", ".@$event_info->user_id.", '1', '".@$subscription."', '".date('Y-m-d H:i:s')."', '".@$get_sub_id->id."')");
									}
								}
							}
							//print_r($array_email);
							if(!empty($result)){
								$response['status'] = 1;
								$response['message'] = 'You have invited people successfully.';
								$response['bulkemail'] = array_filter(@$csv_explode_email);
								$response['bulkmobile'] = @$mobile_number;
								//$response['bulkamount'] = @$amount_filter;
								$response['event_id'] = @$event_id;
							}else{
								$response['status'] = 0;
								$response['message'] = 'Some error occure, Please try again.';
							}
						}else{
							$csv_explode_email = [];
							$csv_explode_phone = [];
							//open uploaded csv file with read only mode
							$csvFile = fopen($_FILES['file']['tmp_name'], 'r');
							fgetcsv($csvFile);
							$event_id = $this->input->post('eventId');
							$subscription = $this->input->post('subscription');
							while(($line = fgetcsv($csvFile)) !== FALSE){ 
								//print_r($line[0]);
								$csv_explode_email[] = $line[0];
								$csv_explode_phone[] = $line[2];
							}
							$array_email = !empty($this->showDups(array_filter($csv_explode_email))) ? $this->showDups(array_filter($csv_explode_email)) : '';
							$array_email_count = !empty($array_email) ? count((array)$array_email) : 0;
							$mobile_number = array_filter(@$csv_explode_phone);
							//echo $array_email_count;die;
							if($array_email_count > 0){
								//print_r($array_email);
								$response['dublicate'] = 0;
								$response['dublicateEmail'] = $array_email;
								echo json_encode($response);
								return false;
							}else{
								//echo 'not duplicate';
								$check_mail = $this->validateEmail($csv_explode_email);
								//print_r($check_mail);die;
								if($check_mail['status'] == 0){
									$response['invalid_email_status'] = 0;
									$response['invalidEmail'] = $check_mail['invalid_email'];
									echo json_encode($response);
									return false;
								}
								
								//$count = count(array_filter(@$csv_explode_email));
								//$amount = @$event_info->event_price / $count;
								
								$existUser = $this->Mymodel->exist_invite_peoplecount($event_id);
								if($existUser > 0){
									$count = count(array_filter(@$csv_explode_email)) + $existUser;
									$amount = @$event_info->event_price / $count;
								}else{
									$count = count(array_filter(@$csv_explode_email));
									$amount = @$event_info->event_price / $count;
								}
							
								for($i = 0; $i < count($csv_explode_email); $i++){
									if(!empty($csv_explode_email[$i])){
										$result[] = $this->db->query("INSERT INTO event_invited_people (email, event_id, distributed_event_price, user_id, status, invited_people, created_at, tran_id)VALUES ('".@$csv_explode_email[$i]."', ".@$event_id.", ".@$amount.", ".@$event_info->user_id.", '1', '".@$subscription."', '".date('Y-m-d H:i:s')."', '".@$get_sub_id->id."')");
									}
								}
							}
							//print_r($array_email);
							if(!empty($result)){
								$this->Mymodel->update_price($event_id, $amount);
								$response['status'] = 1;
								$response['message'] = 'You have invited people successfully.';
								$response['bulkemail'] = array_filter(@$csv_explode_email);
								$response['bulkmobile'] = @$mobile_number;
								//$response['bulkamount'] = @$amount_filter;
								$response['event_id'] = @$event_id;
							}else{
								$response['status'] = 0;
								$response['message'] = 'Some error occure, Please try again.';
							}
						}
					}					
				}else{
					$response['status'] = 'file_not_support';
					$response['message'] = 'Your file type not supported.';
				}
			}else{
				$response['status'] = 'file_empty';
				$response['message'] = 'file is required.';
			}
		}
		echo json_encode($response);
	}
	function showDups($array)
	{
		$array_temp = array();
		foreach($array as $val)
		{
			if (!in_array($val, $array_temp))
			{
			    $array_temp[] = $val;
			}
			else
			{
			    //echo 'duplicate = ' . $val . '<br />';
				return $val;
			}
		}
	}
	
	function validateEmail($emails){
		$filter_email = array_filter($emails);
		for($i = 0; $i < count($filter_email); $i++){
			if (!filter_var($filter_email[$i], FILTER_VALIDATE_EMAIL)) {
				$response['status'] = 0;
				$response['invalid_email'] = $filter_email[$i];
				return $response;
			}
		}
		$response['status'] = 1;
		return $response;
	}
	
	function check_bulk_amount($event_id = '', $amount = ''){
		$guest_amount = array_sum($amount);
		$total_amount_sum = $this->Mymodel->total_sum(@$event_id);
		$total_event_amount = $guest_amount + $total_amount_sum->totalAmount;
		return $total_event_amount;
	}
	function send_mobile_sms(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$event_id = $this->input->post('event_id');
			$mobile = array_filter($this->input->post('mobile'));
			$event = $this->db->query("select * from event where event_id = ".$event_id."")->row();
			
			$sms_invited_msg = "You've been invited to (".@$event->event_name.") \r\n";
			$sms_invited_msg .= "".base_url()."event/details?eId=".base64_encode(@$event->event_id)." \r\n";
			$sms_invited_msg .= "From : MadeToSplit ";
			
			for($i = 0; $i < count($mobile); $i++){
				@$this->Mymodel->send_sms('+'.$mobile[$i], $sms_invited_msg);
			}
		}
	}
	function send_mail_via_bulk_upload(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$event_id = $this->input->post('event_id');
			$email = array_filter($this->input->post('email'));
			//$amount = array_filter($this->input->post('amount'));
			//print_r($_POST);
			$event_info = $this->Mymodel->get_single_row_info('event_id, event_name, event_date, user_id', 'event', 'event_id='.$event_id.'', '', 1);
			//print_r($event_info);die;
			$event_org_info = $this->Mymodel->get_single_row_info('id, fname, lname', 'users', 'id='.$event_info->user_id.'', '', 1);
			
			$subject = "You've been invited to (".@$event_info->event_name.")";
			@$from = @$event_org_info->fname .' '. @$event_org_info->lname;
				require_once APPPATH.'third_party/email/vendor/autoload.php';
				$from_email = "info@madetosplit.com"; 
				$imagePath = base_url() . 'uploads/logos/logo.png';
				$imagebackPath = '';
				$mesg = "<!Doctype html>
				<html>
					<head>
						<meta charset='utf-8'>
						<meta name='viewport' content='width=device-width, initial-scale=1'>
						<title>Invite People</title>
						<link href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap' rel='stylesheet'>
						</head>
					<body>
						<div style='max-width:600px;
						margin:auto;
						border:1px solid #eee;
						box-shadow:0 0 10px rgba(0, 0, 0, .15);
						line-height:17px;
						font-size:13px;
						box-sizing:border-box; -webkit-print-color-adjust: exact;font-family: Poppins, sans-serif; background:url(".$imagebackPath.")'>
							<div style='padding:20px; box-sizing: border-box;text-align: center; background: #fff;'>
								<a href='#'><img src='".$imagePath."' style='width: 350px; height80px;'></a>
							</div>
							<div style='width: 400px; margin:50px auto;background: #ffffffd1;padding: 50px;text-align: center;'>
								<h1 style=' font-size: 30px; line-height: 32px; color: #0b0b0b; margin: 30px 0;'>Dear User</h1>
								<p style='font-size: 15px;color: #262626;line-height: 24px;margin: 20px 0;'>You have invited for <strong>".@$event_info->event_name."</strong> event from <strong>".@$from." </strong></p>
								
								<p style='font-size: 15px;color: #262626;line-height: 24px;margin: 20px 0;'>Event date : <strong>".date('d M, Y', strtotime(@$event_info->event_date))."</strong></p>
								
								<a href='".base_url('login')."' >Register</a>
							</div>
							
							<div style='background: #000;
							text-align: left;
							box-sizing: border-box;
							width: 100%;
							padding: 20px 50px;
							color: #fff;'>
								<p style='margin: 5px 0;font-size: 12px;'>Warm Regards,</p>
								<p style='margin: 5px 0;font-size: 12px;'>Made to Split</p>
								<p style='margin: 5px 0;font-size: 12px;'><strong>Email:</strong> <a href='#' style='color: #78daff;'>info@madetosplit.com</a></p>
								<br/>
								<p style='margin: 5px 0;font-size: 11px;'>This is an automated response, please do not reply.</p>
							</div>
						</div>
					</body>
				</html>";
                $to=[];
			   
				foreach ($email as $value){
					$to[] = $value;
				}
                $result = $this->Mymodel->mail_send_management('info@madetosplit.com', 'info@madetosplit.com', $to, $mesg, @$subject, 'info@madetosplit.com', 'M@d32spl1t');
		}
	}
	
	function check_bulk_upload_email_exist(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$event_id = $this->input->post('event_id');
			$csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv','text/xls','text/xlsx');
			if(!empty($_FILES['file']['name'])){
				if(in_array($_FILES['file']['type'],$csvMimes)){
					if(is_uploaded_file($_FILES['file']['tmp_name'])){
						$csv_explode_email = [];
						$csvFile = fopen($_FILES['file']['tmp_name'], 'r');
						fgetcsv($csvFile);
						
						while(($line = fgetcsv($csvFile)) !== FALSE){
							$csv_explode_email[] = $line[0];
						}
						$array_email = array_filter($csv_explode_email);
						//echo json_encode($array_email);die;
						for($i = 0; $i < count($array_email); $i++){
						
							$checkEmail = $this->db->query("select email from event_invited_people where email = '".$array_email[$i]."' and event_id = '".$event_id."'")->num_rows();
							//echo $this->db->last_query();
							if($checkEmail > 0){
								$response['status'] = false; 
								$response['email'] = $array_email[$i]; 
								echo json_encode($response);
								return false;
							}
							
						}
						
						$response['status'] = true; 
						$response['email'] = @$array_email; 
						echo json_encode($response);
						return true;
					}
					
				}
				
            }				
		}
		
	}
	function connectingAccount(){
		require_once APPPATH.'third_party/stripe/vendor/autoload.php';
		if(!empty($this->input->post('userid'))){
			$userid = $this->input->post('userid');
			$event_id = $this->input->post('event_id');
			$user_info = $this->Mymodel->get_single_row_info('fname, lname, email', 'users', 'id='.$userid.'', '', 1);
			
			$stripe = new \Stripe\StripeClient('sk_test_51MPhgSIuZrwn6gWgucZ3pq3OGKnLaQMxviXsKtZb4F7tenDBs25KovJkAB4tii3db6CMW1tdWSk2CB9thQ8yOYdX00iUs05KRN');
			
			$account = $stripe->accounts->create(
				[
					'country' => 'US',
					'type' => 'express',
					'email' => ''.@$user_info->email.'',
					'capabilities' => [
						'card_payments' => ['requested' => true],
						'transfers' => ['requested' => true],
					],
				]
			);
			$stripe_acc_id = $account['id'];
			
			$link = $stripe->accountLinks->create(
				[
					'account' => $stripe_acc_id,
					'refresh_url' => base_url('event/details?eId='.base64_encode(@$event_id).''),
					'return_url' => base_url('event/details?eId='.base64_encode(@$event_id).'&stripe=connect'),
					'type' => 'account_onboarding',
				]
			);
			//print_r($link);die;
			$data = array('stripe_acc_id' => $stripe_acc_id, 'user_id' => $userid, 'email' => @$user_info->email, 'created' => $link['created'], 'expires_at' => $link['expires_at'], 'url' => $link['url']);
			$this->Mymodel->update_data('stripe_connected_acc', '*', 'user_id = '.$userid.' AND email = "'.@$user_info->email.'"', $data);
			
			//print_r($link['url']);
			//$response['account_link'] = $link['account_link'];
			$response['created'] = $link['created'];
			$response['expires_at'] = $link['expires_at'];
			$response['url'] = $link['url'];
		}
		echo json_encode($response);
	}
	
	function check_stripe_status(){
		if(!empty($this->input->post('id'))){
			$userid = $this->input->post('id');
			$stripedata = $this->Mymodel->get_single_row_info('stripe_acc_id', 'stripe_connected_acc', 'user_id='.$userid.'', '', 1);
			$skey = 'sk_test_51MPhgSIuZrwn6gWgucZ3pq3OGKnLaQMxviXsKtZb4F7tenDBs25KovJkAB4tii3db6CMW1tdWSk2CB9thQ8yOYdX00iUs05KRN';
			if(!empty($stripedata->stripe_acc_id)){
				$row = $this->get_stripe_info($stripedata->stripe_acc_id, $skey);
				$get_data = json_decode($row);
				//print_r($get_data);
				if(!empty($get_data->payouts_enabled) AND !empty($get_data->charges_enabled) AND $get_data->payouts_enabled == 1 AND $get_data->charges_enabled == 1){
					$response['connected'] = 1;
					$response['stripe_acc_id'] = $get_data->id;
				}else{
					$response['connected'] = 0;
					$response['stripe_acc_id'] = '';
				}
			}else{
				$response['connected'] = 0;
				$response['stripe_acc_id'] = '';
			}
		}
		echo json_encode($response);
	}
	
	function get_stripe_info($stripe_acc_id = '', $skey = ''){
		$url = 'https://api.stripe.com/v1/accounts/'.@$stripe_acc_id.'';
		//$skey = 'sk_test_51MPhgSIuZrwn6gWgucZ3pq3OGKnLaQMxviXsKtZb4F7tenDBs25KovJkAB4tii3db6CMW1tdWSk2CB9thQ8yOYdX00iUs05KRN';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "".$url."");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($token_request_body));
		curl_setopt($ch, CURLOPT_POST, 1);
		$headers = array();
		$headers[] = "Content-Type: application/x-www-form-urlencoded";
		$headers[] = "Authorization: Bearer ".$skey."";
		//$headers[] = "client_secret: ".STRIPE_SECRET_KEY."";
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$result = curl_exec($ch);
		//print_r($result);
		return $result;
	}
	
	function return_bck(){
		if(!empty(@$_GET['eId'])){
			
			$event_id = base64_decode(@$_GET['eId']);
			$this->session->set_userdata('for_paypal_eventid', $event_id);
			$return_url = 'https://madetosplit.com/event/return_bck';
			$client_id = 'AaGztJn1WXb-6YV20wy2ccDOg5rl8561u-ype_05_o2rMqmwAxpw2Pt5U_Jp9Oh7XGOQVhrkVeNLGOGh';
			$url ='https://www.sandbox.paypal.com/connect/?flowEntry=static&client_id='.$client_id.'&scope=email&redirect_uri='.$return_url.'';
			redirect($url);
		}elseif(!empty(@$_GET['code']) AND $_GET['scope'] == 'email'){
			$code =  @$_GET['code'];
			$scope = @$_GET['scope'];
			$client_id = 'AaGztJn1WXb-6YV20wy2ccDOg5rl8561u-ype_05_o2rMqmwAxpw2Pt5U_Jp9Oh7XGOQVhrkVeNLGOGh';
		    $secrete_id = 'EN796nVhXcmAZXL7yfDKugynBrrXoTTYIAfPL-R4yM-7yMcsPf0WWYj1JN0NPd7V4L60uNBwHg9vlCL9';
			$token = $this->get_access_token($client_id, $secrete_id, $code);
			$data = json_decode($token,true);
			
			if(!empty($data['access_token'])){
				
				$userId = $this->session->userdata('loguserId');
				$access_token =  $data['access_token'];
				$host_identity = $this->event_host_identity($access_token);
				$data = json_decode($host_identity,true);
				
				$store = array('email' => $data['email'], 'user_id' => $userId, 'email_verified' => $data['email_verified'], 'verified' => $data['verified'], 'created_at' => date('Y-m-d H:i:s'), 'status' => '1', 'event_id' => $this->session->userdata('for_paypal_eventid'));
			    $result = $this->Mymodel->update_data('paypal_payout_verified_email', '*', 'user_id = '.$userId.'', $store);
				if(!empty($result)){
					$this->session->set_flashdata('paypal_login_success', 'Your PayPal login has been successfully completed. We will make the event payment based on your PayPal email.');
					redirect(base_url('event/details?eId='.base64_encode($this->session->userdata('for_paypal_eventid')).''));
				}
			}else{
				echo 'access token is expired. please try go back on event details page and try again.';
			}
			
		}
	}
	
	function event_host_identity($access_token = ''){
		$authorizationString = $access_token;
		$curl = curl_init();

		$data = array(
		CURLOPT_URL => "https://api-m.sandbox.paypal.com/v1/identity/openidconnect/userinfo?schema=openid",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_SSL_VERIFYPEER => false,

		CURLOPT_HTTPHEADER => array(
		"Authorization: Bearer ".$authorizationString,
		'Content-Type:application/x-www-form-urlencoded'
		)
		);
		curl_setopt_array($curl, $data);
		$response = curl_exec($curl);
		curl_close($curl);
		return $response;
	}
	function get_access_token($client_id = '', $secret_id = '', $code = ''){
		
		if(!empty($client_id) AND !empty($secret_id)){
			$authorizationString = base64_encode($client_id . ':' . $secret_id);
		}else{
			$authorizationString = '';
		}
		
		$curl = curl_init();
		$data = array(
		CURLOPT_URL => "https://api-m.sandbox.paypal.com/v1/oauth2/token",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_POSTFIELDS => http_build_query(array(
		'grant_type'=>'authorization_code',
		'code'=> $code,
		)),
		CURLOPT_HTTPHEADER => array(
		"Authorization: Basic ".$authorizationString,
		)
		//CURLOPT_USERPWD => $base_token
		);
		curl_setopt_array($curl, $data);
		$response = curl_exec($curl);
		curl_close($curl);
		return $response;
	}
	
	function get_captcha(){
		// Generate captcha code
		$random_num    = md5(random_bytes(64));
		$captcha_code  = substr($random_num, 0, 6);

		// Assign captcha in session
		$_SESSION['EVENT_CAPTCHA_CODE'] = $captcha_code;

		// Create captcha image
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
	
	function newmail(){
		$msg = '<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="x-apple-disable-message-reformatting">  
    <title></title> 

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">

    
    <style>

        
        html,
body {
    margin: 0 auto !important;
    padding: 0 !important;
    height: 100% !important;
    width: 100% !important;
    background: #f1f1f1;
}


* {
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
}


div[style*="margin: 16px 0"] {
    margin: 0 !important;
}


table,
td {
    mso-table-lspace: 0pt !important;
    mso-table-rspace: 0pt !important;
}

table {
    border-spacing: 0 !important;
    border-collapse: collapse !important;
    table-layout: fixed !important;
    margin: 0 auto !important;
}


img {
    -ms-interpolation-mode:bicubic;
}


a {
    text-decoration: none;
}


.unstyle-auto-detected-links *,
.aBn {
    border-bottom: 0 !important;
    cursor: default !important;
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}


.a6S {
    display: none !important;
    opacity: 0.01 !important;
}


.im {
    color: inherit !important;
}


img.g-img + div {
    display: none !important;
}




@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
    u ~ div .email-container {
        min-width: 320px !important;
    }
}

@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
    u ~ div .email-container {
        min-width: 375px !important;
    }
}

@media only screen and (min-device-width: 414px) {
    u ~ div .email-container {
        min-width: 414px !important;
    }
}
</style>

    <style>

.primary{
	background: #17bebb;
}
.bg_white{
	background: #ffffff;
}
.bg_light{
	background: #f7fafa;
}
.bg_black{
	background: #000000;
}
.bg_dark{
	background: rgba(0,0,0,.8);
}
.email-section{
	padding:2.5em;
}


.btn{
	padding: 10px 15px;
	display: inline-block;
}
.btn.btn-primary{
	border-radius: 5px;
	background: #17bebb;
	color: #ffffff;
}
.btn.btn-white{
	border-radius: 5px;
	background: #ffffff;
	color: #000000;
}
.btn.btn-white-outline{
	border-radius: 5px;
	background: transparent;
	border: 1px solid #fff;
	color: #fff;
}
.btn.btn-black-outline{
	border-radius: 0px;
	background: transparent;
	border: 2px solid #000;
	color: #000;
	font-weight: 700;
}
.btn-custom{
	color: rgba(0,0,0,.3);
	text-decoration: underline;
}

h1,h2,h3,h4,h5,h6{
	font-family: "Work Sans", sans-serif;
	color: #000000;
	margin-top: 0;
	font-weight: 400;
}

body{
	font-family: "Work Sans", sans-serif;
	font-weight: 400;
	font-size: 15px;
	line-height: 1.8;
	color: rgba(0,0,0,.4);
}

a{
	color: #17bebb;
}

table{
}


.logo h1{
	margin: 0;
}
.logo h1 a{
	color: #17bebb;
	font-size: 24px;
	font-weight: 700;
	font-family: "Work Sans", sans-serif;
}

.hero{
	position: relative;
	z-index: 0;
}

.hero .text{
	color: rgba(0,0,0,.3);
}
.hero .text h2{
	color: #000;
	font-size: 34px;
	margin-bottom: 15px;
	font-weight: 300;
	line-height: 1.2;
}
.hero .text h3{
	font-size: 24px;
	font-weight: 200;
}
.hero .text h2 span{
	font-weight: 600;
	color: #000;
}


.product-entry{
	display: block;
	position: relative;
	float: left;
	padding-top: 20px;
}
.product-entry .text{
	width: calc(100% - 125px);
	padding-left: 20px;
}
.product-entry .text h3{
	margin-bottom: 0;
	padding-bottom: 0;
}
.product-entry .text p{
	margin-top: 0;
}
.product-entry img, .product-entry .text{
	float: left;
}

ul.social{
	padding: 0;
}
ul.social li{
	display: inline-block;
	margin-right: 10px;
}


.footer{
	border-top: 1px solid rgba(0,0,0,.05);
	color: rgba(0,0,0,.5);
}
.footer .heading{
	color: #000;
	font-size: 20px;
}
.footer ul{
	margin: 0;
	padding: 0;
}
.footer ul li{
	list-style: none;
	margin-bottom: 10px;
}
.footer ul li a{
	color: rgba(0,0,0,1);
}


@media screen and (max-width: 500px) {


}
</style>


</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;">
	<center style="width: 100%; background-color: #f1f1f1;">
    <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
      &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
    </div>
    <div style="max-width: 600px; margin: 0 auto;" class="email-container">
    
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
      	<tr>
          <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
          	<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
          		<tr>
          			<td class="logo" style="text-align: left;">
			            <h1><a href="#">Shop</a></h1>
			          </td>
          		</tr>
          	</table>
          </td>
	      </tr>
				<tr>
          <td valign="middle" class="hero bg_white" style="padding: 2em 0 2em 0;">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
            	<tr>
            		<td style="padding: 0 2.5em; text-align: left;">
            			<div class="text">
            				<h2>Ronald your shopping cart misses you</h2>
            				<h3>Amazing deals, updates, interesting news right in your inbox</h3>
            			</div>
            		</td>
            	</tr>
            </table>
          </td>
	      </tr>
	      <tr>
	      	<table class="bg_white" role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
	      		<tr style="border-bottom: 1px solid rgba(0,0,0,.05);">
					    <th width="80%" style="text-align:left; padding: 0 2.5em; color: #000; padding-bottom: 20px">Item</th>
					    <th width="20%" style="text-align:right; padding: 0 2.5em; color: #000; padding-bottom: 20px">Price</th>
					  </tr>
					  <tr style="border-bottom: 1px solid rgba(0,0,0,.05);">
					  	<td valign="middle" width="80%" style="text-align:left; padding: 0 2.5em;">
					  		<div class="product-entry">
					  			<img src="images/prod-1.jpg" alt="" style="width: 100px; max-width: 600px; height: auto; margin-bottom: 20px; display: block;">
					  			<div class="text">
					  				<h3>Analog Wrest Watch</h3>
					  				<span>Small</span>
					  				<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
					  			</div>
					  		</div>
					  	</td>
					  	<td valign="middle" width="20%" style="text-align:left; padding: 0 2.5em;">
					  		<span class="price" style="color: #000; font-size: 20px;">$120</span>
					  	</td>
					  </tr>
					  <tr style="border-bottom: 1px solid rgba(0,0,0,.05);">
					  	<td valign="middle" width="80%" style="text-align:left; padding: 0 2.5em;">
					  		<div class="product-entry">
					  			<img src="images/prod-2.jpg" alt="" style="width: 100px; max-width: 600px; height: auto; margin-bottom: 20px; display: block;">
					  			<div class="text">
					  				<h3>Analog Wrest Watch</h3>
					  				<span>Small</span>
					  				<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
					  			</div>
					  		</div>
					  	</td>
					  	<td valign="middle" width="20%" style="text-align:left; padding: 0 2.5em;">
					  		<span class="price" style="color: #000; font-size: 20px;">$120</span>
					  	</td>
					  </tr>
					  <tr>
					  	<td valign="middle" style="text-align:left; padding: 1em 2.5em;">
					  		<p><a href="#" class="btn btn-primary">Continue to your order</a></p>
					  	</td>
					  </tr>
	      	</table>
	      </tr>
     
     </table>
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
      	<tr>
          <td valign="middle" class="bg_light footer email-section">
            <table>
            	<tr>
                <td valign="top" width="33.333%" style="padding-top: 20px;">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-right: 10px;">
                      	<h3 class="heading">About</h3>
                      	<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                      </td>
                    </tr>
                  </table>
                </td>
                <td valign="top" width="33.333%" style="padding-top: 20px;">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-left: 5px; padding-right: 5px;">
                      	<h3 class="heading">Contact Info</h3>
                      	<ul>
					                <li><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
					                <li><span class="text">+2 392 3929 210</span></a></li>
					              </ul>
                      </td>
                    </tr>
                  </table>
                </td>
                <td valign="top" width="33.333%" style="padding-top: 20px;">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-left: 10px;">
                      	<h3 class="heading">Useful Links</h3>
                      	<ul>
					                <li><a href="#">Home</a></li>
					                <li><a href="#">Account</a></li>
					                <li><a href="#">Wishlist</a></li>
					                <li><a href="#">Order</a></li>
					              </ul>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td class="bg_white" style="text-align: center;">
          	<p>No longer want to receive these email? You can <a href="#" style="color: rgba(0,0,0,.8);">Unsubscribe here</a></p>
          </td>
        </tr>
      </table>

    </div>
  </center>
</body>
</html>';
//echo $msg;
$this->Mymodel->send_mail('igi201@goigi.in', 'test@gmail.com', $msg, 'test', 'info@madetosplit.com', 'M@d32spl1t');
	}
	
	function testmail(){
		try {
		require_once APPPATH.'third_party/email/vendor/autoload.php';
		$mail = new PHPMailer();
		//$mail->SMTPDebug = 0; //Enable verbose debug output
		$mail->Host = 'smtp.office365.com'; // Specify main and backup SMTP servers
		$mail->IsSMTP();
		$mail->SMTPAuth = true; // Enable SMTP authentication
		$mail->Username = 'info@madetosplit.com';                
		$mail->Password = 'M@d32spl1t';
		$mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587; // TCP port to connect to
		$mail->setFrom('info@madetosplit.com');
		$mail->addAddress('chetanbele1994@gmail.com');
		
		$mail->isHTML(true); // Set email format to HTML
		$mail->Subject = 'test';
		$mail->Body    = 'test';
		$data = $mail->send();
		} catch (phpmailerException $e) {
		  echo $e->errorMessage(); //error messages from PHPMailer
		} catch (Exception $e) {
		  echo $e->getMessage();
		}
	}
	
	function timezone(){
		echo date_default_timezone_get();
		echo date('Y-m-d h:i A');

	}
	
	function checkmail(){
		    require_once APPPATH.'third_party/email/vendor/autoload.php';
			$mail = new PHPMailer(true);
 
			try {
				$mail->SMTPDebug = 2;                                       
				$mail->isSMTP();                                            
				$mail->Host       = 'smtp.office365.com';                    
				$mail->SMTPAuth   = true;                             
				$mail->Username   = "info@madetosplit.com";                 
				$mail->Password   = "M@d32spl1t";                        
				$mail->SMTPSecure = 'tls';                              
				$mail->Port       = 25;  
			 
				$mail->setFrom('info@madetosplit.com', 'Name');           
				$mail->addAddress('chetanbele1994@gmail.com');
				$mail->addAddress('igi201@goigi.in', 'Name');
				  
				$mail->isHTML(true);                                  
				$mail->Subject = 'Subject';
				$mail->Body    = 'HTML message body in <b>bold</b> ';
				$mail->AltBody = 'Body in plain text for non-HTML mail clients';
				$mail->send();
				echo "Mail has been sent successfully!";
			} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
 
	}
		
}
