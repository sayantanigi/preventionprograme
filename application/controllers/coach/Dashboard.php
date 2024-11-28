<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Mymodel');
        $this->Mymodel->loggedIn();
    }
    public function index() {
        $data = array(
            'title' => 'Prevention Programme',
            'page' => 'Dashboard',
            'subpage' => 'dashboard',
        );
        $userId = $this->session->userdata('loguserId');
        $user_email = $this->Mymodel->get_single_row_info('email', 'users', 'id=' . $userId . '', '', 1);
        $current_date = date('Y-m-d');
        $data['latest_event'] = $this->db->query("select * from event where status = '1' and (user_id = " . $userId . " OR event_id IN(select event_id from event_invited_people where email = '" . $user_email->email . "') OR co_host_id = " . $userId . ") and event_date >= '" . $current_date . "' ORDER BY event_date ASC LIMIT 4")->result();
        $query = $this->db->query("select * from users where status = '1' and id = " . @$userId . " ORDER BY id DESC");
        $data['user'] = ($query->num_rows() > 0) ? $query->row() : FALSE;
        $this->load->view('coach/header', $data);
        $this->load->view('coach/dashboard');
        $this->load->view('coach/footer');
    }
    public function profile() {
        $userId = $this->session->userdata('loguserId');
        $loggeduserData = $this->db->query("SELECT * FROM users WHERE id = '".$userId."'")->row();
        $country = $this->db->query("SELECT * FROM countries WHERE flag = '1'")->result();
        $state = $this->db->query("SELECT * FROM states WHERE flag = '1'")->result();
        $city = $this->db->query("SELECT * FROM cities WHERE flag = '1'")->result();
        $data = array(
            'title' => 'Prevention Programme',
            'page' => 'Profile Setting',
            'subpage' => 'profile_setting',
            'userData' => $loggeduserData,
            'country' => $country,
            'state' => $state,
            'city' => $city
        );
        $this->load->view('coach/header', $data);
        $this->load->view('coach/profile_setting');
        $this->load->view('coach/footer');
    }
    public function update_profile() {
        if ($_FILES['profilePic']['name'] != '') {
			$src = $_FILES['profilePic']['tmp_name'];
			$filEnc = time();
			$avatar = rand(0000, 9999) . "_" . $_FILES['profilePic']['name'];
			$avatar1 = str_replace(array('(', ')', ' '), '', $avatar);
			$dest = getcwd() . '/uploads/coach/profilePic/' . $avatar1;
			if (move_uploaded_file($src, $dest)) {
				$image  = $avatar1;
				@unlink('uploads/coach/profilePic/' . $_POST['old_resume']);
			}
		} else {
			if(!empty($_POST['old_image'])) {
				$image  = $_POST['old_image'];
			} else {
				$image  = '';
			}
		}
        if(!empty($_POST['uid'])){
            if (!empty($_FILES['backgroundPic']['size'])) {
                $src = $_FILES['backgroundPic']['tmp_name'];
                $filEnc = time();
                $avatar = rand(0000, 9999) . "_" . $_FILES['backgroundPic']['name'];
                $avatar1 = str_replace(array('(', ')', ' '), '', $avatar);
                $dest = getcwd() . '/uploads/coach/coverPic/' . $avatar1;
                if (move_uploaded_file($src, $dest)) {
                    $bimage  = $avatar1;
                }
                if(!empty($bimage)) {
                    $file  = $bimage;
                } else if(!empty($_POST['old_bimage'])) {
                    $file  = $_POST['old_bimage'];
                } else {
                    $file  = "";
                }
            }
        } else {
            if (!empty($_FILES['backgroundPic']['size'])) {
                $src = $_FILES['backgroundPic']['tmp_name'];
                $filEnc = time();
                $avatar = rand(0000, 9999) . "_" . $_FILES['backgroundPic']['name'];
                $avatar1 = str_replace(array('(', ')', ' '), '', $avatar);
                $dest = getcwd() . '/uploads/coach/coverPic/' . $avatar1;
                if (move_uploaded_file($src, $dest)) {
                    $bimage  = $avatar1;
                }
                if(!empty($bimage)) {
                    $file  = $bimage;
                } else if(!empty($_POST['old_bimage'])) {
                    $file  = $_POST['old_bimage'];
                } else {
                    $file  = "";
                }
            }
        }
        if(!empty($_POST['uid'])){
            $data = array(
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'profilePic' => $image,
                'email' => $_POST['email'],
                'rate_enabled' => $_POST['rate_enabled'],
                'backgroundPic' => $bimage,
                'zip' => $_POST['zip'],
                'short_bio' => $_POST['short_bio'],
            );
            $this->Crud_model->SaveData('users', $data, "userId='" . $_POST['uid'] . "'");
            if($_POST['from_data_request']=='admin'){
                $this->session->set_flashdata('message', 'Profile Updated Successfull !');
                redirect(base_url('admin/users'));
            } else{
                $this->session->set_flashdata('message', 'Profile Updated Successfull !');
                redirect(base_url('homepage'));
            }
        } else {
            $checkUserEmail = $this->db->query("SELECT * FROM users WHERE email = '".$_POST['email']."' AND userId != '".$_SESSION['afrebay']['userId']."'")->row();
            if(!empty($checkUserEmail)) {
                $this->session->set_flashdata('error', 'Email already exists');
                redirect(base_url('profile'));
            } else {
                $data = array(
                    'firstname' => $_POST['firstname'],
                    'lastname' => $_POST['lastname'],
                    'profilePic' => $image,
                    'email' => $_POST['email'],
                    'rate_enabled' => $_POST['rate_enabled'],
                    'backgroundPic' => $bimage,
                    'zip' => $_POST['zip'],
                    'short_bio' => $_POST['short_bio'],
                );
                $this->Crud_model->SaveData('users', $data, "userId='" . $_SESSION['afrebay']['userId'] . "'");
                if($_POST['from_data_request']=='admin'){
                    $this->session->set_flashdata('message', 'Profile Updated Successfull !');
                    redirect(base_url('admin/users'));
                }
                else{
                    $this->session->set_flashdata('message', 'Profile Updated Successfull !');
                    redirect(base_url('homepage'));
                }
            }
        }
    }
    public function msgSent() {
        $userId = $this->session->userdata('loguserId');
        $msg = "Hello Common Message";
        $this->Mymodel->sendMsg($userId, $msg);
    }
}
