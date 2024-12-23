<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tournament extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->Adminmodel->loggedIn();
	}
	public function index()
	{
		$data = array(
			'title' => 'Manage Tournament',
			'page' => 'games',
			'subpage' => 'tournament',
			//'redirect' => 'lists'
		);
        $data['sportslist'] = $this->Adminmodel->get_all_record('*', 'sports', '', array('id', 'DESC'), '');
		$data['tournamentList'] = $this->Adminmodel->get_all_record('id, tournament_name, tournament_type, sport_id, organizer_id, venue, created_at', 'tournament', '', array('id', 'DESC'), '');
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/tournament');
		$this->load->view('admin/footer');
	}
	
	public function add()
	{
		$data = array(
			'title' => 'Add Tournament',
			'page' => 'games',
			'subpage' => 'tournament',
			//'redirect' => 'lists'
		);
        $data['sportslist'] = $this->Adminmodel->get_all_record('*', 'sports', '', array('id', 'DESC'), '');
		//$data['gamesList'] = $this->Adminmodel->get_all_record('id, game_name, game_type, sport_id, organizer_id, venue, created_at', 'games', '', array('id', 'DESC'), '');
		$data['organiser'] = $this->Adminmodel->get_all_record('id, first_name, last_name', 'users', array('user_type' => 'Coach'), array('id', 'DESC'), '');
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/add_tournament');
		$this->load->view('admin/footer');
	}
	
	public function addTournament(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
			// $game_type =  $this->input->post('game_type');
			// if($game_type == 'Tournament'){
				// $this->form_validation->set_rules('multiplesport[]', 'Sport', 'required|trim');
			// }elseif($game_type == 'One to One'){
				// $this->form_validation->set_rules('sport', 'Sport', 'required|trim');
			// }
			
			$this->form_validation->set_rules('tournament_name', 'Tournament Name', 'required|trim');
			$this->form_validation->set_rules('tournament_description', 'Tournament Description', 'required|trim');
			$this->form_validation->set_rules('multiplesport[]', 'Sport', 'required|trim');
			$this->form_validation->set_rules('organizer', 'Organizer', 'required|trim');
			$this->form_validation->set_rules('address', 'Venue', 'required|trim');
			//$this->form_validation->set_rules('date', 'Date', 'required|trim');
			$this->form_validation->set_rules('no_teams', 'Number of Teams', 'required|trim');
			$this->form_validation->set_rules('t_startdate', 'Start Date', 'required|trim');
			$this->form_validation->set_rules('t_enddate', 'End Date', 'required|trim');
			//$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
			//$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check'); 
			if($this->form_validation->run() == true){ 
			 
				if(!empty(strip_tags($this->input->post('tournamentImg')))){
					
					// if(strip_tags($this->input->post('game_type')) == 'Tournament'){
					  // $sportId = implode(',',$this->input->post('multiplesport'));
					  // //print_r($sportId);die;
					// }elseif(strip_tags($this->input->post('game_type')) == 'One to One'){
					  // $sportId = $this->input->post('sport');
					// }
					$sportId = implode(',',$this->input->post('multiplesport'));
					// print_r($sportId);die;
					$data = array(
						'tournament_name' => strip_tags($this->input->post('tournament_name')),
						'tournament_description' => $this->input->post('tournament_description'),
						'tournament_type' => 'Tournament',
						'sport_id' => $sportId,
						'organizer_id' => strip_tags($this->input->post('organizer')),
						'venue' => strip_tags($this->input->post('address')),
						'tournament_image' => strip_tags($this->input->post('tournamentImg')),
						'no_participant_teams' => strip_tags($this->input->post('no_teams')),
						'tournament_start_date' => date('Y-m-d', strtotime($this->input->post('t_startdate'))),
						'tournament_end_date' => date('Y-m-d', strtotime($this->input->post('t_enddate'))),
						'created_at'   => date('Y-m-d H:i:s')
					);
					$result= $this->Adminmodel->add('tournament', $data);
					if($result){
						$response['status'] = 1;
						$response['message'] = 'New Tournament created successfully.';
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
					$sportId = implode(',',$this->input->post('multiplesport'));
					$data = array(
						'tournament_name' => strip_tags($this->input->post('tournament_name')),
						'tournament_description' => $this->input->post('tournament_description'),
						'tournament_type' => 'Tournament',
						'sport_id' => $sportId,
						'organizer_id' => strip_tags($this->input->post('organizer')),
						'venue' => strip_tags($this->input->post('address')),
						//'tournament_image' => strip_tags($this->input->post('gameImg')),
						'no_participant_teams' => strip_tags($this->input->post('no_teams')),
						'tournament_start_date' => date('Y-m-d', strtotime($this->input->post('t_startdate'))),
						'tournament_end_date' => date('Y-m-d', strtotime($this->input->post('t_enddate'))),
						'created_at'   => date('Y-m-d H:i:s')
					);
					$result= $this->Adminmodel->add('tournament', $data);
					if($result){
						$response['status'] = 1;
						$response['message'] = 'New tournament created successfully';
					}else{
						$response['status'] = 0;
						$response['message'] = 'Some error ocure.Please try again.';
					}
				}
		    }else{
			  $response = array(
				'vali_error'   => 1,
				'game_name_error' => form_error('tournament_name'),
				'game_description_error' => form_error('tournament_description'),
				//'game_type_error' => form_error('game_type'),
				//'sport_error' => form_error('sport'),
				'multiplesport_error' => form_error('multiplesport[]'),
				'organizer_error' => form_error('organizer'),
				'no_teams_error' => form_error('no_teams'),
				't_startdate_error' => form_error('t_startdate'),
				't_enddate_error' => form_error('t_enddate'),
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
			'title' => 'Edit Tournament',
			'page' => 'games',
			'subpage' => 'tournament',
			//'redirect' => 'lists'
		);
        $data['sportslist'] = $this->Adminmodel->get_all_record('*', 'sports', '', array('id', 'DESC'), '');
		$data['organiser'] = $this->Adminmodel->get_all_record('id, first_name, last_name', 'users', array('user_type' => 'Coach'), array('id', 'DESC'), '');
		$data['tournament'] = $this->Adminmodel->get_by('tournament', 'single', array('id' => $id), '', 1);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_tournament');
		$this->load->view('admin/footer');
	}
	
	public function editTournament(){
		$id = strip_tags($this->input->post('id'));
		// $game_type =  $this->input->post('game_type');
		// if($game_type == 'Tournament'){
		// $this->form_validation->set_rules('multiplesport[]', 'Sport', 'required|trim');
		// }elseif($game_type == 'One to One'){
		// $this->form_validation->set_rules('sport', 'Sport', 'required|trim');
		// }
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			// $game_type =  $this->input->post('game_type');
			// if($game_type == 'Tournament'){
			// $this->form_validation->set_rules('multiplesport[]', 'Sport', 'required|trim');
			// }elseif($game_type == 'One to One'){
			// $this->form_validation->set_rules('sport', 'Sport', 'required|trim');
			// }
			$this->form_validation->set_rules('tournament_name', 'Tournament Name', 'required|trim');
			$this->form_validation->set_rules('tournament_description', 'Tournament Description', 'required|trim');
			$this->form_validation->set_rules('multiplesport[]', 'Sport', 'required|trim');
			$this->form_validation->set_rules('organizer', 'Organizer', 'required|trim');
			$this->form_validation->set_rules('address', 'Venue', 'required|trim');
			//$this->form_validation->set_rules('date', 'Date', 'required|trim');
			$this->form_validation->set_rules('no_teams', 'Number of Teams', 'required|trim');
			$this->form_validation->set_rules('t_startdate', 'Start Date', 'required|trim');
			$this->form_validation->set_rules('t_enddate', 'End Date', 'required|trim');
			//$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
			//$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check'); 
			if($this->form_validation->run() == true){ 
				if(!empty(strip_tags($this->input->post('tournamentImg')))){
						// if(strip_tags($this->input->post('game_type')) == 'Tournament'){
						// $sportId = implode(',',$this->input->post('multiplesport'));
						// //print_r($sportId);die;
						// }elseif(strip_tags($this->input->post('game_type')) == 'One to One'){
						// $sportId = $this->input->post('sport');
						// }
					$sportId = implode(',',$this->input->post('multiplesport'));
					// print_r($sportId);die;
					$data = array(
						'tournament_name' => strip_tags($this->input->post('tournament_name')),
						'tournament_description' => $this->input->post('tournament_description'),
						'tournament_type' => 'Tournament',
						'sport_id' => $sportId,
						'organizer_id' => strip_tags($this->input->post('organizer')),
						'venue' => strip_tags($this->input->post('address')),
						'tournament_image' => strip_tags($this->input->post('tournamentImg')),
						'no_participant_teams' => strip_tags($this->input->post('no_teams')),
						'tournament_start_date' => date('Y-m-d', strtotime($this->input->post('t_startdate'))),
						'tournament_end_date' => date('Y-m-d', strtotime($this->input->post('t_enddate'))),
						'created_at'   => date('Y-m-d H:i:s')
					);
					$result= $this->Adminmodel->update($data, 'tournament', array('id' => $id));
					if($result){
						$response['status'] = 1;
						$response['message'] = 'New Tournament updated successfully.';
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
					$sportId = implode(',',$this->input->post('multiplesport'));
					$data = array(
						'tournament_name' => strip_tags($this->input->post('tournament_name')),
						'tournament_description' => $this->input->post('tournament_description'),
						'tournament_type' => 'Tournament',
						'sport_id' => $sportId,
						'organizer_id' => strip_tags($this->input->post('organizer')),
						'venue' => strip_tags($this->input->post('address')),
						//'tournament_image' => strip_tags($this->input->post('gameImg')),
						'no_participant_teams' => strip_tags($this->input->post('no_teams')),
						'tournament_start_date' => date('Y-m-d', strtotime($this->input->post('t_startdate'))),
						'tournament_end_date' => date('Y-m-d', strtotime($this->input->post('t_enddate'))),
						'created_at'   => date('Y-m-d H:i:s')
					);
					$result= $this->Adminmodel->update($data, 'tournament', array('id' => $id));
					if($result){
						$response['status'] = 1;
						$response['message'] = 'New tournament updated successfully';
					}else{
						$response['status'] = 0;
						$response['message'] = 'Some error ocure.Please try again.';
					}
				}
		    }else{
			  $response = array(
					'vali_error'   => 1,
					'game_name_error' => form_error('tournament_name'),
					'game_description_error' => form_error('tournament_description'),
					//'game_type_error' => form_error('game_type'),
					//'sport_error' => form_error('sport'),
					'multiplesport_error' => form_error('multiplesport[]'),
					'organizer_error' => form_error('organizer'),
					'no_teams_error' => form_error('no_teams'),
					't_startdate_error' => form_error('t_startdate'),
					't_enddate_error' => form_error('t_enddate'),
					'venue_error' => form_error('address'),
				);
		    }
		}
		echo json_encode($response);
	}
	
	public function view($id)
	{
		$data = array(
			'title' => 'View Tournament',
			'page' => 'games',
			'subpage' => 'tournament',
			//'redirect' => 'lists'
		);
        $data['gameInfo'] = $this->Adminmodel->get_by('tournament', 'single', array('id' => $id), '', 1);
		
		//$data['sportslist'] = $this->Adminmodel->get_all_record('*', 'sports', '', array('id', 'DESC'), '');
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/view_tournament');
		$this->load->view('admin/footer');
	}
	
	function delete($id){
		if(empty($id)){
			return false;
		}
		$result = $this->db->query('delete from tournament where id = '.$id.'');
		if($result){
			$msg = '["Tournament deleted successfully.", "success", "#A5DC86"]';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/tournament'),'refresh');
		}else{
			$msg = 'error';
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/tournament'),'refresh');
		}
	}
	
	public function invite($id)
	{
		$data = array(
			'title' => 'Invite Team',
			'page' => 'tournament',
			'subpage' => 'tournament'
		);
		$where = "id != ".$id." AND user_type = 'Coach'";
        
        $data['opponent'] = $this->Adminmodel->get_all_record('id, first_name, last_name, team_name', 'users', $where, array('id', 'DESC'), '');
		$data['org'] = $this->Adminmodel->get_all_record('id, first_name, last_name', 'users', array('id' => $id), array('id', 'DESC'), 1);
        $data['opponentTeam'] = $this->Adminmodel->get_by('invite_tournament_opponent', 'single', array('sender_team' => $id), '', 1);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/send_tou_invitation');
		$this->load->view('admin/footer');
	}
	
	function sendInvite(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('orgname', 'Organizer', 'required|trim');
			$this->form_validation->set_rules('orgid', 'OrganizerId', 'required|trim');
			$this->form_validation->set_rules('opponent[]', 'Opponent', 'required|trim');
			if($this->form_validation->run() == true){ 
				$data = array(
					'sender_team' => strip_tags($this->input->post('orgid')),
					'receiver_team' => implode(',', $this->input->post('opponent')),
					'game_type' => 'Tournament',
					'status' => '1',
					'created_at'   => date('Y-m-d H:i:s')
				);
				$result= $this->Adminmodel->addInvite_Opponent('invite_tournament_opponent', 'id', array('sender_team' => $this->input->post('orgid')), array('sender_team' => $this->input->post('orgid')), $data);
				if($result){
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
					'opponent_error' => form_error('opponent[]')
				);
		    }
		}
		echo json_encode($response);
	}
	function getwinnerOpt(){
		if(strip_tags($this->input->post('orgId'))){
			 $orgId = $this->input->post('orgId');
			//$stateId = $this->input->post('state_id');
			echo  $this->Adminmodel->gettournamentwinnerOpt($orgId);
			 
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
					'updated_at'   => date('Y-m-d H:i:s')
				);
				
				$result = $this->Adminmodel->update($data, 'invite_tournament_opponent', array('id' => $Id, 'game_type' => 'Tournament', 'status' => '1'));
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
}	