<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Games extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->Adminmodel->loggedIn();
	}
	public function index()
	{
		$data = array(
			'title' => 'Manage Games',
			'page' => 'games',
			'subpage' => 'games',
			//'redirect' => 'lists'
		);
        $data['sportslist'] = $this->Adminmodel->get_all_record('*', 'sports', '', array('id', 'DESC'), '');
		$data['gamesList'] = $this->Adminmodel->get_all_record('id, game_name, game_type, sport_id, organizer_id, venue, created_at', 'games', '', array('id', 'DESC'), '');
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/games');
		$this->load->view('admin/footer');
	}
	
	public function add()
	{
		$data = array(
			'title' => 'Add Games',
			'page' => 'games',
			'subpage' => 'games',
			//'redirect' => 'lists'
		);
        $data['sportslist'] = $this->Adminmodel->get_all_record('*', 'sports', '', array('id', 'DESC'), '');
		//$data['gamesList'] = $this->Adminmodel->get_all_record('id, game_name, game_type, sport_id, organizer_id, venue, created_at', 'games', '', array('id', 'DESC'), '');
		$data['organiser'] = $this->Adminmodel->get_all_record('id, first_name, last_name', 'users', array('user_type' => 'Coach'), array('id', 'DESC'), '');
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/add_games');
		$this->load->view('admin/footer');
	}
	
	public function addGames(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
			// $game_type =  $this->input->post('game_type');
			// if($game_type == 'Tournament'){
				// $this->form_validation->set_rules('multiplesport[]', 'Sport', 'required|trim');
			// }elseif($game_type == 'One to One'){
				// $this->form_validation->set_rules('sport', 'Sport', 'required|trim');
			// }
			
			$this->form_validation->set_rules('game_name', 'Game Name', 'required|trim');
			$this->form_validation->set_rules('game_description', 'Game Description', 'required|trim');
			$this->form_validation->set_rules('sport', 'Sport', 'required|trim');
			$this->form_validation->set_rules('organizer', 'Organizer', 'required|trim');
			$this->form_validation->set_rules('address', 'Venue', 'required|trim');
			//$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
			//$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check'); 
			if($this->form_validation->run() == true){ 
			
				if(!empty(strip_tags($this->input->post('gameImg')))){
					
					// if(strip_tags($this->input->post('game_type')) == 'Tournament'){
					  // $sportId = implode(',',$this->input->post('multiplesport'));
					  // //print_r($sportId);die;
					// }elseif(strip_tags($this->input->post('game_type')) == 'One to One'){
					  // $sportId = $this->input->post('sport');
					// }
					$sportId = $this->input->post('sport');
					$data = array(
						'game_name' => strip_tags($this->input->post('game_name')),
						'game_description' => $this->input->post('game_description'),
						'game_type' => 'One to One',
						'sport_id' => $sportId,
						'organizer_id' => strip_tags($this->input->post('organizer')),
						'venue' => strip_tags($this->input->post('address')),
						'game_image' => strip_tags($this->input->post('gameImg')),
						'no_participant_teams' => strip_tags($this->input->post('no_teams')),
						'tournament_start_date' => date('Y-m-d', strtotime($this->input->post('t_startdate'))),
						'tournament_end_date' => date('Y-m-d', strtotime($this->input->post('t_enddate'))),
						'created_at'   => date('Y-m-d H:i:s')
					);
					$result= $this->Adminmodel->add('games', $data);
					if($result){
						$response['status'] = 1;
						$response['message'] = 'New game created successfully.';
					}else{
						$response['status'] = 0;
						$response['message'] = 'Some error ocure.Please try again.';
					}
				}else{
					// if(strip_tags($this->input->post('game_type')) == 'Tournament'){
					  // $sportId = implode(',',$this->input->post('multiplesport'));
					  // //print_r($sportId);die;
					// }elseif(strip_tags($this->input->post('game_type')) == 'One to One'){
					  // $sportId = $this->input->post('sport');
					// }
					$sportId = $this->input->post('sport');
					$data = array(
						'game_name' => strip_tags($this->input->post('game_name')),
						'game_description' => $this->input->post('game_description'),
						'game_type' => 'One to One',
						//'sport_id' => strip_tags($this->input->post('sport')),
						'sport_id' => $sportId,
						'organizer_id' => strip_tags($this->input->post('organizer')),
						'venue' => strip_tags($this->input->post('address')),
						'no_participant_teams' => strip_tags($this->input->post('no_teams')),
						'tournament_start_date' => date('Y-m-d', strtotime($this->input->post('t_startdate'))),
						'tournament_end_date' => date('Y-m-d', strtotime($this->input->post('t_enddate'))),
						'created_at'   => date('Y-m-d H:i:s')
					);
					$result= $this->Adminmodel->add('games', $data);
					if($result){
						$response['status'] = 1;
						$response['message'] = 'New game created successfully';
					}else{
						$response['status'] = 0;
						$response['message'] = 'Some error ocure.Please try again.';
					}
				}
		    }else{
			  $response = array(
				'vali_error'   => 1,
				'game_name_error' => form_error('game_name'),
				'game_description_error' => form_error('game_description'),
				//'game_type_error' => form_error('game_type'),
				'sport_error' => form_error('sport'),
				//'multiplesport_error' => form_error('multiplesport[]'),
				'organizer_error' => form_error('organizer'),
				'venue_error' => form_error('address'),
				);
		    }
		}
		echo json_encode($response);
	}
	
	function cropImage (){
		$data = $_POST['image'];
		$image_array_1 = explode(";", $data);
		$image_array_2 = explode(",", $image_array_1[1]);
		$data = base64_decode($image_array_2[1]);
		$imageName = time().'.png';
		$image_name = 'uploads/games/'.$imageName;
		file_put_contents($image_name, $data);
	    echo $imageName;
	}
	
	function getrganiser_bysport(){
		 if($this->input->post('sport_id')){
		$sportId = $this->input->post('sport_id');
		echo $this->Adminmodel->getrganiser_bysport($sportId);
		}
	}
	
	public function edit($id)
	{
		$data = array(
			'title' => 'Edit Games',
			'page' => 'games',
			'subpage' => 'games',
			//'redirect' => 'lists'
		);
        $data['sportslist'] = $this->Adminmodel->get_all_record('*', 'sports', '', array('id', 'DESC'), '');
		//$data['gamesList'] = $this->Adminmodel->get_all_record('id, game_name, game_type, sport_id, organizer_id, venue, created_at', 'games', '', array('id', 'DESC'), '');
		$data['games'] = $this->Adminmodel->get_by('games', 'single', array('id' => $id), '', 1);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_games');
		$this->load->view('admin/footer');
	}
	
	public function editGames(){
		$id = strip_tags($this->input->post('id'));
		// $game_type =  $this->input->post('game_type');
		// if($game_type == 'Tournament'){
			// $this->form_validation->set_rules('multiplesport[]', 'Sport', 'required|trim');
		// }elseif($game_type == 'One to One'){
			// $this->form_validation->set_rules('sport', 'Sport', 'required|trim');
		// }
		
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('game_name', 'Game Name', 'required|trim');
			$this->form_validation->set_rules('game_description', 'Game Description', 'required|trim');
			//$this->form_validation->set_rules('game_type', 'Game Type', 'required|trim');
			$this->form_validation->set_rules('sport', 'Sport', 'required|trim');
			$this->form_validation->set_rules('organizer', 'Organizer', 'required|trim');
			$this->form_validation->set_rules('address', 'Venue', 'required|trim');
			//$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
			//$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check'); 
			if($this->form_validation->run() == true){ 
				if(!empty(strip_tags($this->input->post('gameImg')))){
					// if(strip_tags($this->input->post('game_type')) == 'Tournament'){
					  // $sportId = implode(',',$this->input->post('multiplesport'));
					  // //print_r($sportId);die;
					// }elseif(strip_tags($this->input->post('game_type')) == 'One to One'){
					  // $sportId = $this->input->post('sport');
					// }
					$sportId = $this->input->post('sport');
					$data = array(
						'game_name' => strip_tags($this->input->post('game_name')),
						'game_description' => $this->input->post('game_description'),
						'game_type' => 'One to One',
						//'sport_id' => strip_tags($this->input->post('sport')),
						'sport_id' => $sportId,
						'organizer_id' => strip_tags($this->input->post('organizer')),
						'venue' => strip_tags($this->input->post('address')),
						'game_image' => strip_tags($this->input->post('gameImg')),
						'no_participant_teams' => strip_tags($this->input->post('no_teams')),
						'tournament_start_date' => date('Y-m-d', strtotime($this->input->post('t_startdate'))),
						'tournament_end_date' => date('Y-m-d', strtotime($this->input->post('t_enddate'))),
						'created_at'   => date('Y-m-d H:i:s')
					);
					$result= $this->Adminmodel->update($data, 'games', array('id' => $id));
					if($result){
						$response['status'] = 1;
						$response['message'] = 'New game updated successfully.';
					}else{
						$response['status'] = 0;
						$response['message'] = 'Some error ocure.Please try again.';
					}
				}else{
					
					// if(strip_tags($this->input->post('game_type')) == 'Tournament'){
					  // $sportId = implode(',',$this->input->post('multiplesport'));
					  // //print_r($sportId);die;
					// }elseif(strip_tags($this->input->post('game_type')) == 'One to One'){
					  // $sportId = $this->input->post('sport');
					// }
					$sportId = $this->input->post('sport');
					$data = array(
						'game_name' => strip_tags($this->input->post('game_name')),
						'game_description' => $this->input->post('game_description'),
						'game_type' => 'One to One',
						//'sport_id' => strip_tags($this->input->post('sport')),
						'sport_id' => $sportId,
						'organizer_id' => strip_tags($this->input->post('organizer')),
						'venue' => strip_tags($this->input->post('address')),
						'no_participant_teams' => strip_tags($this->input->post('no_teams')),
						'tournament_start_date' => date('Y-m-d', strtotime($this->input->post('t_startdate'))),
						'tournament_end_date' => date('Y-m-d', strtotime($this->input->post('t_enddate'))),
						'created_at'   => date('Y-m-d H:i:s')
					);
				
					$result= $this->Adminmodel->update($data, 'games', array('id' => $id));
					if($result){
						$response['status'] = 1;
						$response['message'] = 'New game updated successfully';
					}else{
						$response['status'] = 0;
						$response['message'] = 'Some error ocure.Please try again.';
					}
				}
		    }else{
			  $response = array(
				'vali_error'   => 1,
				'game_name_error' => form_error('game_name'),
				'game_description_error' => form_error('game_description'),
				//'game_type_error' => form_error('game_type'),
				'sport_error' => form_error('sport'),
				//'multiplesport_error' => form_error('multiplesport[]'),
				'organizer_error' => form_error('organizer'),
				'venue_error' => form_error('address'),
				);
		    }
		}
		echo json_encode($response);
	}
	
	public function view($id)
	{
		$data = array(
			'title' => 'View Game',
			'page' => 'games',
			'subpage' => 'games',
			//'redirect' => 'lists'
		);
        $data['gameInfo'] = $this->Adminmodel->get_by('games', 'single', array('id' => $id), '', 1);
		
		//$data['sportslist'] = $this->Adminmodel->get_all_record('*', 'sports', '', array('id', 'DESC'), '');
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/view_games');
		$this->load->view('admin/footer');
	}
	
	function delete($id){
		if(empty($id)){
		  return false;
		}
		
		$result = $this->db->query('delete from games where id = '.$id.'');
		if($result){
			$this->db->query('delete from invite_opponent where game_id = '.$id.'');
			$msg = '["games deleted successfully.", "success", "#A5DC86"]';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/games'),'refresh');
		}else{
			$msg = 'error';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/games'),'refresh');
		}
	}
	
	public function invite($id)
	{
		$data = array(
			'title' => 'Invite Team',
			'page' => 'games',
			'subpage' => 'games'
		);
		$where = "id != ".$id." AND user_type = 'Coach'";
        
        $data['opponent'] = $this->Adminmodel->get_all_record('id, first_name, last_name, team_name', 'users', $where, array('id', 'DESC'), '');
		$data['org'] = $this->Adminmodel->get_all_record('id, first_name, last_name', 'users', array('id' => $id), array('id', 'DESC'), 1);
        $data['getOppTeam'] = $this->db->query("select * from invite_opponent where sender_team = ".$id." AND game_type = 'One to One'")->row();
		//print_r($data['getOppTeam']);die;
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/send_team_invitation');
		$this->load->view('admin/footer');
	}
	function get_teamName(){
		 $user_id = $this->input->post('user_id');
		 $result = $this->db->query("select * from users where id = ".$user_id."")->row();
		 if($result){
			echo $result->team_name. '('.$result->first_name.' '.$result->last_name.')';
		 }
	}
	function sendInvite(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('orgname', 'Organizer', 'required|trim');
			$this->form_validation->set_rules('orgid', 'OrganizerId', 'required|trim');
			$this->form_validation->set_rules('opponent', 'Opponent', 'required|trim');
			if($this->form_validation->run() == true){ 
				$data = array(
					'sender_team' => strip_tags($this->input->post('orgid')),
					'receiver_team' => $this->input->post('opponent'),
					'game_id' => $this->input->post('gameid'),
					'game_type' => 'One to One',
					'status' => '1',
					'created_at'   => date('Y-m-d H:i:s')
				);
				//$result= $this->Adminmodel->add('invite_opponent', $data);
				$result= $this->Adminmodel->addInvite_Opponent('invite_opponent', 'id', array('sender_team' => $this->input->post('orgid')), array('sender_team' => $this->input->post('orgid')), $data);
				if($result){
					$oppEmail = $this->db->query("select email, team_name from users where id = ".@$this->input->post('opponent')."")->row();
					$selfEmail = $this->db->query("select team_name from users where id = ".@$this->input->post('orgid')."")->row();
                    $this->sendEmail(@$oppEmail->email, @$oppEmail->team_name, @$selfEmail->team_name);
					$response['status'] = 1;
					$response['message'] = 'You are added opponent team successfully.';
				}else{
					$response['status'] = 0;
					$response['message'] = 'Some error ocure.Please try again.';
				}
			}else{
			  $response = array(
					'vali_error'   => 1,
					'orgname_error' => form_error('orgname'),
					'orgid_error' => form_error('orgid'),
					'opponent_error' => form_error('opponent')
				);
		    }
		}
		echo json_encode($response);
	}
	
	function getwinnerOpt(){
		if(strip_tags($this->input->post('orgId'))){
			$orgId = $this->input->post('orgId');
			$stateId = $this->input->post('state_id');
			echo $this->Adminmodel->getwinnerOpt($orgId);
		}
	}
	
	function saveWinner(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('winner', 'Select Winner', 'required|trim');
			$this->form_validation->set_rules('orgId', 'Organizer', 'required|trim');
			if($this->form_validation->run() == true){ 
			$orgId = strip_tags($this->input->post('winner'));
			$Id = strip_tags($this->input->post('id'));
				$data = array(
					'winner_id' => strip_tags($this->input->post('winner')),
					//'status' => '0',
					'updated_at'   => date('Y-m-d H:i:s')
				);
				
				$result = $this->Adminmodel->update($data, 'invite_opponent', array('id' => $Id, 'game_type' => 'One to One', 'status' => '1'));
				//echo $this->db->last_query();die;
				if($result){
					$response['status'] = 1;
					$response['message'] = 'You are added winner successfully.';
				}else{
					$response['status'] = 0;
					$response['message'] = 'Some error ocure.Please try again.';
				}
			}else{
			  $response = array(
					'vali_error'   => 1,
					'winner_error' => form_error('winner'),
					'orgId_error' => form_error('orgId')
				);
		    }
		}
		echo json_encode($response);
	}
	function sendEmail($email = '', $oppTeam = '', $selfTeam = ''){
		require_once APPPATH.'third_party/email/vendor/autoload.php';
		$imagePath = base_url().'uploads/logos/logo1.png';
		$imagebackPath = '';	
		$message = "<!Doctype html>
		<html>
			<head>
			<meta charset='utf-8'>
			<meta name='viewport' content='width=device-width, initial-scale=1'>
			<title>Invite</title>
			<link href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap' rel='stylesheet'>
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
			<h1 style=' font-size: 30px; line-height: 32px; color: #0b0b0b; margin: 30px 0;'>Dear ".$oppTeam."</h1>
			<p style='font-size: 15px;color: #262626;line-height: 24px;margin: 20px 0;'>Your team has invited from ".$selfTeam." as opponent team.</p>
			<!--<p>Do not share your Code with anyone!</p>-->
			</div>
			<div style='background: #000;
			text-align: left;
			box-sizing: border-box;
			width: 100%;
			padding: 20px 50px;
			color: #fff;'>
			<p style='margin: 5px 0;font-size: 12px;'>Warm Regards,</p>
			<p style='margin: 5px 0;font-size: 12px;'>Digital Sport Resume Team</p>
			<p style='margin: 5px 0;font-size: 12px;'><strong>Email:</strong> <a href='#' style='color: #78daff;'>contact@digitalsport.com</a></p>
			<br/>
			<p style='margin: 5px 0;font-size: 11px;'>This is an automated response, please do not reply.</p>
			</div>
			</div>
			</body>
		</html>";
			$mail = new PHPMailer(true);
			//try {
				$mail->CharSet = 'UTF-8';
				$mail->SetFrom('contact@digitalsport.com','Digital Sport Resume');
				$mail->AddAddress(strip_tags($email));
				$mail->IsHTML(true);
				$mail->Subject = 'Invite Opponent';
				$mail->Body = $message;
				$mail->IsSMTP();
				$mail->SMTPAuth   = true; 
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
				$mail->Host       = "smtp.gmail.com";
				$mail->Port       = 587;  
				$mail->Username = 'rameshwebdev21@gmail.com';                
				$mail->Password = 'gqbtiijrzaljwkhz';
				$send = $mail->send();
				return $send;		
	}
}	