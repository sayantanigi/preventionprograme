<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Mymodel');
        $this->Mymodel->loggedIn();
    }
    public function index() {
        // echo "11";die;
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
        $this->load->view('provider/header', $data);
        $this->load->view('provider/dashboard');
        $this->load->view('provider/footer');
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
        $this->load->view('provider/header', $data);
        $this->load->view('provider/profile_setting');
        $this->load->view('provider/footer');
    }
    public function update_profile() {
        if ($_FILES['profilePic']['name'] != '') {
			$src = $_FILES['profilePic']['tmp_name'];
			$filEnc = time();
			$avatar = rand(0000, 9999) . "_" . $_FILES['profilePic']['name'];
			$avatar1 = str_replace(array('(', ')', ' '), '', $avatar);
			$dest = getcwd() . '/uploads/provider/profilePic/' . $avatar1;
			if (move_uploaded_file($src, $dest)) {
				$image  = $avatar1;
				@unlink('uploads/provider/profilePic/' . $_POST['old_image']);
			}
		} else {
			if(!empty($_POST['old_image'])) {
				$image  = $_POST['old_image'];
			} else {
				$image  = '';
			}
		}
        if ($_FILES['backgroundPic']['name'] != '') {
			$src = $_FILES['backgroundPic']['tmp_name'];
			$filEnc = time();
			$avatar = rand(0000, 9999) . "_" . $_FILES['backgroundPic']['name'];
			$avatar1 = str_replace(array('(', ')', ' '), '', $avatar);
			$dest = getcwd() . '/uploads/provider/coverPic/' . $avatar1;
			if (move_uploaded_file($src, $dest)) {
				$bimage  = $avatar1;
				@unlink('uploads/provider/coverPic/' . $_POST['old_bimage']);
			}
		} else {
			if(!empty($_POST['old_bimage'])) {
				$bimage  = $_POST['old_bimage'];
			} else {
				$bimage  = '';
			}
		}
        if(!empty($_POST['uid'])){
            $data = array(
                'fname' => $_POST['fname'],
                'lname' => $_POST['lname'],
                'dob' => $_POST['dob'],
                'phone' => $_POST['phone'],
                'address' => $_POST['address'],
                'address_2' => $_POST['nearby_location'],
                'country' => $_POST['country'],
                'state' => $_POST['state'],
                'city' => $_POST['city'],
                'zipcode' => $_POST['zipcode'],
                'image' => $image,
                'coverImage' => $bimage,
                'about' => $_POST['about'],
            );
            $this->db->update('users', $data, "id='" . $_POST['uid'] . "'");
            $this->session->set_flashdata('message', 'Profile Updated Successfully');
            redirect(base_url('provider/profile_settings'));
        } else {
            $checkUserEmail = $this->db->query("SELECT * FROM users WHERE email = '".$_POST['email']."' AND id != '".$this->session->userdata('loguserId')."'")->row();
            if(!empty($checkUserEmail)) {
                $this->session->set_flashdata('error', 'Email already exists');
                redirect(base_url('profile'));
            } else {
                $data = array(
                    'firstname' => $_POST['fname'],
                    'lastname' => $_POST['lname'],
                    'dob' => $_POST['dob'],
                    'phone' => $_POST['phone'],
                    'address' => $_POST['address'],
                    'address_2' => $_POST['nearby_location'],
                    'country' => $_POST['country'],
                    'state' => $_POST['state'],
                    'city' => $_POST['city'],
                    'zipcode' => $_POST['zipcode'],
                    'profilePic' => $image,
                    'coverImage' => $bimage,
                    'about' => $_POST['about'],
                );
                //$this->Crud_model->SaveData('users', $data, "id='" . $this->session->userdata('loguserId') . "'");
                $this->db->update('users', $data, "id='" . $this->session->userdata('loguserId') . "'");
                $this->session->set_flashdata('message', 'Profile Updated Successfully');
                redirect(base_url('provider/profile_settings'));
            }
        }
    }
    public function change_password() {
        $data = array(
            'password' => md5($_POST['password'])
        );
        $this->db->update('users', $data, "id='" . $_POST['u_id'] . "'");
        $this->session->set_flashdata('message', 'Password Updated Successfully');



        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        redirect(base_url() . 'login');


        // redirect(base_url('provider/profile_settings'));
    }
    public function participants() {
        $userId = $this->session->userdata('loguserId');
        $data = array(
            'title' => 'Prevention Programme',
            'page' => 'Participants Management',
            'subpage' => 'participants',
            'entity' => $this->db->query("SELECT * FROM health_entity WHERE status = '1' ORDER BY name ASC")->result(),
            'participant_list' => $this->db->query("SELECT * FROM users WHERE added_by = '".$userId."'")->result()
        );

        $this->load->view('provider/header', $data);
        $this->load->view('provider/participants');
        $this->load->view('provider/footer');
    }
//     public function add_participant() {
//         if ($_FILES['profilePic']['name'] != '') {
// 			$src = $_FILES['profilePic']['tmp_name'];
// 			$filEnc = time();
// 			$avatar = rand(0000, 9999) . "_" . $_FILES['profilePic']['name'];
// 			$avatar1 = str_replace(array('(', ')', ' '), '', $avatar);
// 			$dest = getcwd() . '/uploads/profile/'. $avatar1;
// 			if (move_uploaded_file($src, $dest)) {
// 				$image  = $avatar1;
// 				@unlink('uploads/profile/'. $_POST['old_image']);
// 			}
// 		} else {
// 			if(!empty($_POST['old_image'])) {
// 				$image  = $_POST['old_image'];
// 			} else {
// 				$image  = '';
// 			}
// 		}

//         if ($_FILES['backgroundPic']['name'] != '') {
// 			$src = $_FILES['backgroundPic']['tmp_name'];
// 			$filEnc = time();
// 			$avatar = rand(0000, 9999) . "_" . $_FILES['backgroundPic']['name'];
// 			$avatar1 = str_replace(array('(', ')', ' '), '', $avatar);
// 			$dest = getcwd() . '/uploads/profile/'. $avatar1;
// 			if (move_uploaded_file($src, $dest)) {
// 				$bimage  = $avatar1;
// 				@unlink('uploads/profile/'. $_POST['old_bimage']);
// 			}
// 		} else {
// 			if(!empty($_POST['old_bimage'])) {
// 				$bimage  = $_POST['old_bimage'];
// 			} else {
// 				$bimage  = '';
// 			}
// 		}

//         $data = array(
//             'user_type' => '1',
//             'fname' => $_POST['fname'],
//             'lname' => $_POST['lname'],
//             'email' => $_POST['email'],
//             'dob' => $_POST['dob'],
//             'phone' => $_POST['phone'],
//             'phone_2' => $_POST['phone_2'],
//             'health_etity' => $_POST['health_etity'],
//             'clinic' => $_POST['clinic'],
//             'provider' => $_POST['provider'],
//             'insurance_provider' => $_POST['insurance_provider'],
//             'image' => $image,
//             'coverImage' => $bimage,
//             'status' => $_POST['status'],
//             'password' => md5($_POST['password']),
//             'added_by' => $_POST['uid'],
//             'participant_code' => strtotime(date('Y-m-d H:i:s')),
//             'created_at'   => date('Y-m-d H:i:s')
//         );
//         $this->db->insert('users', $data);
//         $this->session->set_flashdata('message', 'Participant added Successfully');
//         redirect(base_url('coach/participants'));
//     }
}
