<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Event extends CI_Controller 
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
			'page' => 'Event List',
			'subpage' => 'event',
		);
      
      
        $data['event'] = $this->Adminmodel->get_all_record('event_id, event_name, event_description, event_address, event_price, status, user_id', 'event', '', array('event_id', 'DESC'), '');
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/event');
		$this->load->view('admin/footer');
	}
	
	public function view($id)
	{
		if(empty($id)){
			return false;
		}
		$data = array(
			'title' => 'Made to Split',
			'page' => 'View Event',
			'subpage' => 'event',
		);
      
      
        $data['event'] = $this->Adminmodel->get_by('event', 'single', array('event_id' => $id), '', 1);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/view_event');
		$this->load->view('admin/footer');
	}
	
	public function add()
	{
		
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Add Event',
			'subpage' => 'event',
		);
      
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/add_event');
		$this->load->view('admin/footer');
	}
	
	function addEvent(){
		//$userId = $this->session->userdata('loguserId');
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('event_name', 'Event Name', 'required|trim'); 
			$this->form_validation->set_rules('event_description', 'Event Description', 'required|trim');
			$this->form_validation->set_rules('event_address', 'Event Address', 'required|trim');
			$this->form_validation->set_rules('event_price', 'Event Price', 'required|trim');
			$this->form_validation->set_rules('event_date', 'Event Date', 'required|trim');
			$this->form_validation->set_rules('event_time', 'Event Time', 'required|trim');
			$this->form_validation->set_rules('event_status', 'Event Status', 'required|trim');
			if($this->form_validation->run() == true){
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
								$uploadData[$i]['userId'] = '0'; 
							} 
						}
						//print_r($uploadData);die;
						if(!empty($uploadData)){
							$data = array(
								'event_name' => strip_tags($this->input->post('event_name')),
								'event_description' => strip_tags($this->input->post('event_description')),
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
								'status' => strip_tags($this->input->post('event_status')),
								'user_id' => '0',
								'slug' => url_title(strip_tags($this->input->post('event_name')), 'dash', true),
								'created_at'   => date('Y-m-d H:i:s')
							);
							$result= $this->Adminmodel->add('event', $data);
							if(!empty($result)){
								$eventId = $result;
								$result = $this->Adminmodel->add_multiple_listing_gallery($uploadData, 'event_gallery', $eventId);
								
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
					'event_status_err' => form_error('event_status'),
				);
			}
		}
		echo json_encode($response);
	}
	
	public function edit($id)
	{
		if(empty($id)){
			return false;
		}
		
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Edit Event',
			'subpage' => 'event',
		);
        $data['event'] = $this->Adminmodel->get_by('event', 'single', array('event_id' => $id), '', 1);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_event');
		$this->load->view('admin/footer');
	}
	
	function editEvent(){
		//$userId = $this->session->userdata('loguserId');
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('event_name', 'Event Name', 'required|trim'); 
			$this->form_validation->set_rules('event_description', 'Event Description', 'required|trim');
			$this->form_validation->set_rules('event_address', 'Event Address', 'required|trim');
			$this->form_validation->set_rules('event_price', 'Event Price', 'required|trim');
			$this->form_validation->set_rules('event_date', 'Event Date', 'required|trim');
			$this->form_validation->set_rules('event_time', 'Event Time', 'required|trim');
			$this->form_validation->set_rules('event_status', 'Event Status', 'required|trim');
			if($this->form_validation->run() == true){
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
								$uploadData[$i]['userId'] = '0'; 
							} 
						}
						//print_r($uploadData);die;
						if(!empty($uploadData)){
							$data = array(
								'event_name' => strip_tags($this->input->post('event_name')),
								'event_description' => strip_tags($this->input->post('event_description')),
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
								'status' => strip_tags($this->input->post('event_status')),
								'slug' => url_title(strip_tags($this->input->post('event_name')), 'dash', true),
								'updated_at'   => date('Y-m-d H:i:s')
							);
							$result= $this->Adminmodel->update($data, 'event', array('event_id' => $this->input->post('event_id')));
							if(!empty($result)){
								$eventId = $this->input->post('event_id');
								$result = $this->Adminmodel->add_multiple_listing_gallery($uploadData, 'event_gallery', $eventId);
								$response['status'] = 1;
								$response['message'] = 'Your event updated successfully.';
							}else{
								$response['status'] = 0;
								$response['message'] = 'Some error ocure.Please try again.';
							}
						}
				}else{
					$data = array(
						'event_name' => strip_tags($this->input->post('event_name')),
						'event_description' => strip_tags($this->input->post('event_description')),
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
						'status' => strip_tags($this->input->post('event_status')),
						'slug' => url_title(strip_tags($this->input->post('event_name')), 'dash', true),
						'updated_at'   => date('Y-m-d H:i:s')
					);
					$result= $this->Adminmodel->update($data, 'event', array('event_id' => $this->input->post('event_id')));
					if(!empty($result)){
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
					'event_status_err' => form_error('event_status'),
				);
			}
		}
		echo json_encode($response);
	}
	
	public function changestatus()
	{
		if ($this->input->post('userId')) {
			$userId = $this->input->post('userId');
			$status = $this->input->post('status');
			if ($status == 1) {
				$msg = 'event status is Activate';
			} else {
				$msg = 'event status is Inctivate';
			}
			if ($this->Adminmodel->update(['status'=>$status], 'event', ['event_id'=>$userId])) {
				echo '["'.$msg.'", "success", "#A5DC86"]';
			} else {
				echo '["Some error occured, Please try again!", "error", "#DD6B55"]';
			}
		}
	}
	function delete_event($id){
		if(empty($id)){
			return false;
		}
		$result = $this->db->query('delete from event where event_id = '.$id.'');
		if($result){
			$msg = '["Event is deleted successfully.", "success", "#A5DC86"]';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/event'),'refresh');
		}else{
			$msg = 'error';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/event'),'refresh');
		}
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
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			//$this->form_validation->set_rules('email[]', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('event_id', 'event Id', 'required|trim');
			if($this->form_validation->run() == true){
			    $event_id = $this->input->post('event_id');
			    $email = $this->input->post('email');
				$query = $this->db->query("select * from event where event_id = ".$event_id."");
				if($query->num_rows() > 0){
					$event = $query->row();
					$result = $this->Adminmodel->addInvitedPeople($email, $event_id);
					if($result){
						if(!empty($email) && $email != ''){
							foreach($email as $k => $v){
								if(!empty($v) && $v != ''){
									$this->sendMail($v, $event->event_name);
								}else{
									break;
								}
							}
						}
						$msg = '["You have invited people successfully.", "success", "#A5DC86"]';
						$this->session->set_flashdata('msg', $msg);
						redirect(base_url('admin/event/invite_people?eId='.$event_id.''),'refresh');
					}
				}
			}
		}
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Invite People For Event',
			'subpage' => 'event',
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/invite_people');
		$this->load->view('admin/footer');
	}
	
	function sendMail($email = '', $event_name){
		require_once APPPATH.'third_party/email/vendor/autoload.php';
		$from_email = "info@madetosplit.com"; 
		//$mesg = $this->load->view('email/forgetpassword',$data,true);
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
						<p style='font-size: 15px;color: #262626;line-height: 24px;margin: 20px 0;'>You have invited for ".$event_name." event from Chetan</p>
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
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->IsSMTP();
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'rameshwebdev21@gmail.com';                
		$mail->Password = 'gqbtiijrzaljwkhz';
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to
		$mail->setFrom('info@madetosplit.com');
		$mail->addAddress($email);
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'MadetoSplit Invited People for Event';
		$mail->Body    = $mesg;
		return $mail->send();
	}
	
	function invited_people($eventId){
		if(empty($eventId)){
			return false;
		}
		
		$data = array(
			'title' => 'Made to Split',
			'page' => 'Invited People For Event',
			'subpage' => 'event',
		);
		$data['user'] = $this->db->query("SELECT event_invited_people.id, event_invited_people.email, event_invited_people.transaction, event_invited_people.event_id, event_invited_people.distributed_event_price, event_invited_people.user_id, event_invited_people.status, (select fname from users where email = event_invited_people.email) as fname, (select lname from users where email = event_invited_people.email) as lname, (select id from users where email = event_invited_people.email) as userId FROM event_invited_people where event_invited_people.event_id = ".@$eventId."")->result();
		//print_r($user);die;
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/invited_people');
		$this->load->view('admin/footer');
	}
	
}	