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
        $this->load->view('clinic_admin/header', $data);
        $this->load->view('clinic_admin/dashboard');
        $this->load->view('clinic_admin/footer');
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
        $this->load->view('clinic_admin/header', $data);
        $this->load->view('clinic_admin/profile_setting');
        $this->load->view('clinic_admin/footer');
    }
    public function update_profile() {
        if ($_FILES['profilePic']['name'] != '') {
			$src = $_FILES['profilePic']['tmp_name'];
			$filEnc = time();
			$avatar = rand(0000, 9999) . "_" . $_FILES['profilePic']['name'];
			$avatar1 = str_replace(array('(', ')', ' '), '', $avatar);
			$dest = getcwd() . '/uploads/clinic_admin/profilePic/' . $avatar1;
			if (move_uploaded_file($src, $dest)) {
				$image  = $avatar1;
				@unlink('uploads/clinic_admin/profilePic/' . $_POST['old_image']);
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
			$dest = getcwd() . '/uploads/clinic_admin/coverPic/' . $avatar1;
			if (move_uploaded_file($src, $dest)) {
				$bimage  = $avatar1;
				@unlink('uploads/clinic_admin/coverPic/' . $_POST['old_bimage']);
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
            redirect(base_url('clinic_admin/profile_settings'));
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
                redirect(base_url('clinic_admin/profile_settings'));
            }
        }
    }
    public function change_password() {
        $data = array(
            'password' => md5($_POST['password'])
        );
        $this->db->update('users', $data, "id='" . $_POST['u_id'] . "'");
        $this->session->set_flashdata('message', 'Password Updated Successfully');
        redirect(base_url('clinic_admin/profile_settings'));
    }
    /* All Clinic Section Star*/
    public function clinic() {
        $userId = $this->session->userdata('loguserId');
        $allclinicadminlist = $this->db->query("SELECT clinic.id AS cid, clinic.clinic_code, clinic.name as clinic_name, clinic.status AS clinic_status, users.id AS uaid, CONCAT(users.fname, ' ', users.lname) AS clinic_admin_name, users.email, users.status AS clinic_admin_status FROM users JOIN clinic ON clinic.id = users.clinic WHERE user_type = '3' AND clinic.status = '1' AND users.status = '1'")->result_array();
        $alldeactivatedclinicadminlist = $this->db->query("SELECT clinic.id AS cid, clinic.clinic_code, clinic.name as clinic_name, clinic.status AS clinic_status, users.id AS uaid, CONCAT(users.fname, ' ', users.lname) AS clinic_admin_name, users.email, users.status AS clinic_admin_status FROM users JOIN clinic ON clinic.id = users.clinic WHERE user_type = '3' AND clinic.status = '0' OR users.status = '0'")->result_array();

        $data = array(
            'title' => 'Prevention Programme',
            'page' => 'Clinic Management',
            'subpage' => 'clinic',
            'entity' => $this->db->query("SELECT * FROM clinic WHERE status = '1' ORDER BY name ASC")->result(),
            'allClinicAdminList' => $allclinicadminlist,
            'allDeactivatedClinicAdminList' => $alldeactivatedclinicadminlist
        );

        $this->load->view('clinic_admin/header', $data);
        $this->load->view('clinic_admin/clinic');
        $this->load->view('clinic_admin/footer');
    }
    public function check_clinic_name() {
        $clinic_name = $_POST['clinic_name'];
        $checkClinic_name = $this->db->query('SELECT * FROM clinic WHERE name = "'.$clinic_name.'"')->row();
        if(!empty($checkClinic_name)) {
            $msg = array('status'=>'error', 'message' => 'Clinic name already exists.');
        } else {
            $msg = array('status'=>'success', 'message' => 'Clinic name available.');
        }
        echo json_encode($msg);
    }
    public function add_clinic() {
        $userId = $this->session->userdata('loguserId');
        $getlastinsertedclinicID = $this->db->query("SELECT clinic_id FROM health_entity ORDER BY id DESC")->row();

        $data = array(
            'clinic_code' => random_int(100000, 999999),
            'name' => $_POST['clinic_name'],
            'status' => $_POST['clinic_status'],
            'added_by' => $userId,
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->db->insert('clinic', $data);
        $lastinsertedID = $this->db->insert_id();

        /*$datacadmin = array(
            'health_group_id' => $lastinsertedID,
            'fname' => '',
            'lname' => '',
            'email' => '',
            'status' => 1,
            'added_by' => $userId,
            'created_at'   => date('Y-m-d H:i:s')
        );
        $this->db->insert('health_group_admin', $datacadmin);*/

        $this->session->set_flashdata('message', 'Clinic added Successfully.');
        redirect(base_url('clinic_admin/clinic'));
    }
    public function edit_Clinic() {
        $clinic_id = $this->input->post('c_id');
        $getData = $this->db->query("SELECT * FROM clinic WHERE id = '".$clinic_id."'")->row();
        echo json_encode($getData);
    }
    public function update_clinic() {
        $cid = $_POST['edit_cid'];
        $data = array(
            'name' => $_POST['edit_clinicname'],
            'status' => $_POST['edit_clinicstatus'],
        );
        $this->db->update('clinic', $data, "id='" . $cid . "'");
        $this->session->set_flashdata('message', 'Clinic updated Successfully');
        redirect(base_url('clinic_admin/clinic'));
    }
    public function deleteclinicadmin() {
        $ca_id = $_POST['ca_id'];
        if ($this->db->query("DELETE FROM health_group_admin WHERE id = '".$ca_id."'")) {
            echo '["Clinic admin deleted successfully", "success", "#A5DC86"]';
        } else {
            echo '["Some error occured, Please try again!", "error", "#DD6B55"]';
        }
    }
    public function changeClinicAdminStatus() {
        $caId = $_POST['id'];
        $status = $_POST['status'];
        if ($status == 1) {
            $msg = 'Clinic admin activated successfully!';
        } else {
            $msg = 'Clinic admin deactivated successfully!';
        }
        $data = array('status'=> $status);
        if ($this->db->update('users', $data, "id='" . $caId . "'")) {
            echo '["' . $msg . '", "success", "#A5DC86"]';
        } else {
            echo '["Some error occured, Please try again!", "error", "#DD6B55"]';
        }
    }
    public function check_clinic_admin_email() {
        $email = $this->input->post('clinic_admin_email');
        $checkEmail = $this->db->query("SELECT * FROM users WHERE email = '".$email."'")->row();
        if (!empty($checkEmail)) {
            $response = array('status'=>'error', 'message'=>'The given email address already exists.');
        } else {
            $response = array('status'=>'success', 'message'=>'Email address available.');
        }
        echo json_encode($response);
    }
    public function add_clinic_admin() {
        $userId = $this->session->userdata('loguserId');
        $data = array(
            'participant_code' => strtotime(date('Y-m-d H:i:s')),
            'clinic' => $_POST['health_group_id'],
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'email' => $_POST['email'],
            'status' => $_POST['status'],
            'added_by' => $userId,
            'user_type' => '3',
            'created_at'   => date('Y-m-d H:i:s')
        );
        $this->db->insert('users', $data);
        $this->session->set_flashdata('message', 'Clinic admin added Successfully.');
        redirect(base_url('clinic_admin/clinic'));
    }
    public function edit_clinic_admin() {
        $ua_id = $this->input->post('ua_id');
        $getData = $this->db->query("SELECT * FROM users WHERE id = '".$ua_id."'")->row();
        echo json_encode($getData);
    }
    public function update_clinic_admin() {
        $data = array(
            'clinic' => $_POST['edit_health_group_id'],
            'fname' => $_POST['edit_clinicadminfname'],
            'lname' => $_POST['edit_clinicadminlname'],
            'email' => $_POST['edit_clinicadminemail'],
            'status' => $_POST['edit_clinicadminstatus']
        );
        $this->db->update('users', $data, "id='" . $_POST['edit_caid'] . "'");
        $this->session->set_flashdata('message', 'Clinic admin updated Successfully');
        redirect(base_url('clinic_admin/clinic'));
    }
    /** All Clinic Section End */

    /* Provider Section Start*/
    public function providers($id = false) {
        $userId = $this->session->userdata('loguserId');
        if(!empty($id)){
            $clinicData = $this->db->query("SELECT * FROM clinic WHERE clinic_code = '".$id."'")->row();
            $clinicID = $clinicData->id;
            $data = array(
                //'entity' => $this->db->query("SELECT * FROM health_entity WHERE id = '".$clinicID."' AND status = '1'")->result(),
                'clinic' => $this->db->query("SELECT * FROM clinic WHERE id = '".$clinicID."' AND status = '1' ORDER BY name ASC")->result(),
                'allProvider_list' => $this->db->query("SELECT * FROM users WHERE added_by = '".$userId."' AND clinic = '".$clinicID."' AND user_type = '5' ORDER BY id DESC")->result(),
                'allunassignedProvider_list' => $this->db->query("SELECT * FROM users WHERE status = '1' AND added_by = '".$userId."' AND clinic = '".$clinicID."'  AND user_type = '5' AND (assigned_to = '' OR assigned_to IS NULL) ORDER BY id DESC")->result(),
                'alldeactivatedProvider_list' => $this->db->query("SELECT * FROM users WHERE status != '1' AND added_by = '".$userId."' AND clinic = '".$clinicID."'  AND user_type = '5' ORDER BY id DESC")->result()
            );
        } else {
            $data = array(
                //'entity' => $this->db->query("SELECT * FROM health_entity WHERE status = '1' ORDER BY name ASC")->result(),
                'clinic' => $this->db->query("SELECT * FROM clinic WHERE status = '1' ORDER BY name ASC")->result(),
                'allProvider_list' => $this->db->query("SELECT * FROM users WHERE added_by = '".$userId."' AND user_type = '5' ORDER BY id DESC")->result(),
                'allunassignedProvider_list' => $this->db->query("SELECT * FROM users WHERE status = '1' AND added_by = '".$userId."' AND user_type = '5' AND (assigned_to = '' OR assigned_to IS NULL) ORDER BY id DESC")->result(),
                'alldeactivatedProvider_list' => $this->db->query("SELECT * FROM users WHERE status != '1' AND added_by = '".$userId."' AND user_type = '5' ORDER BY id DESC")->result()
            );
        }
        $data['title'] = 'Prevention Programme';
        $data['page'] = 'Provider Management';
        $data['subpage'] = 'providers';
        $this->load->view('clinic_admin/header', $data);
        $this->load->view('clinic_admin/providers');
        $this->load->view('clinic_admin/footer');
    }
    public function check_provider_email(){
        $email = $this->input->post('email');
        $checkEmail = $this->db->query("SELECT * FROM users WHERE email = '".$email."'")->row();
        if(!empty($checkEmail)) {
            $msg = array('status'=>'error', 'message' => 'Email Address already exists.');
        } else {
            $msg = array('status'=>'success', 'message' => 'Email Address available.');
        }
        echo json_encode($msg);
    }
    public function add_provider() {
        $data = array(
            'user_type' => '5',
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'email' => $_POST['email'],
            'gender' => $_POST['gender'],
            'dob' => $_POST['dob'],
            'phone' => $_POST['phone'],
            'provider_type' => $_POST['provider_type'],
            'health_etity' => $_POST['health_etity'],
            'clinic' => $_POST['clinic'],
            'address' => $_POST['address'],
            'address_2' => $_POST['address_2'],
            'country' => $_POST['country'],
            'city' => $_POST['city'],
            'state' => $_POST['state'],
            'zipcode' => $_POST['zipcode'],
            'degree' => $_POST['degree'],
            'specializations' => $_POST['specializations'],
            'certificates' => $_POST['certificates'],
            'license' => $_POST['license'],
            'status' => $_POST['status'],
            'added_by' => $_POST['uid'],
            'participant_code' => strtotime(date('Y-m-d H:i:s')),
            'created_at'   => date('Y-m-d H:i:s')
        );
        $this->db->insert('users', $data);
        $this->session->set_flashdata('message', 'Provider added Successfully');
        redirect(base_url('clinic_admin/providers'));
    }
    public function editProvider() {
        $user_id = $this->input->post('u_id');
        $getData = $this->db->query("SELECT * FROM users WHERE id = '".$user_id."'")->row();
        echo json_encode($getData);
    }
    public function update_provider() {
        $data = array(
            'fname' => $_POST['edit_fname'],
            'lname' => $_POST['edit_lname'],
            'email' => $_POST['edit_email'],
            'gender' => $_POST['edit_gender'],
            'dob' => $_POST['edit_dob'],
            'phone' => $_POST['edit_phone'],
            'provider_type' => $_POST['edit_provider_type'],
            'health_etity' => $_POST['edit_health_etity'],
            'clinic' => $_POST['edit_clinic'],
            'address' => $_POST['edit_address'],
            'address_2' => $_POST['edit_address_2'],
            'country' => $_POST['edit_country'],
            'city' => $_POST['edit_city'],
            'state' => $_POST['edit_state'],
            'zipcode' => $_POST['edit_zipcode'],
            'degree' => $_POST['edit_degree'],
            'specializations' => $_POST['edit_specializations'],
            'certificates' => $_POST['edit_certificates'],
            'license' => $_POST['edit_license'],
            'status' => $_POST['edit_status'],
        );
        $this->db->update('users', $data, "id='" . $_POST['provider_id'] . "'");
        $this->session->set_flashdata('message', 'Provider updated Successfully');
        redirect(base_url('clinic_admin/providers'));
    }
    public function detailsProvider() {
        $user_id = $this->input->post('u_id');
        $getData = $this->db->query("SELECT * FROM users WHERE id = '".$user_id."'")->row();
        $health_etity = $this->db->query("SELECT * FROM health_entity WHERE id = '".$getData->health_etity."'")->row();
        $clinic = $this->db->query("SELECT * FROM clinic_admin WHERE health_entity = '".$getData->clinic."'")->row();
        $provider = $this->db->query("SELECT * FROM provider WHERE id = '".$getData->provider."'")->row();
        $addedBy = $this->db->query("SELECT * FROM users WHERE id = '".$getData->added_by."'")->row();

        $getData->added_by_name = $addedBy ? $addedBy->fname." ".$addedBy->lname : null;
        $getData->health_entity_name = $health_etity ? $health_etity->name : null;
        $getData->clinic_name = $clinic ? $clinic->name : null;
        $getData->provider_name = $provider ? $provider->name : null;

        $updatedData = ["id" => $getData->id,"added_by" => $getData->added_by_name,"participant_code" => $getData->participant_code,"user_type" => $getData->user_type,"fname" => $getData->fname,"lname" => $getData->lname,"email" => $getData->email,"dob" => $getData->dob,"phone" => $getData->phone,"phone_2" => $getData->phone_2,"password" => $getData->password,"address" => $getData->address,"address_2" => $getData->address_2,"country" => $getData->country,"state" => $getData->state,"city" => $getData->city,"zipcode" => $getData->zipcode,"latitude" => $getData->latitude,"longitude" => $getData->longitude,"about" => $getData->about,"image" => $getData->image,"coverImage" => $getData->coverImage,"assigned_to" => $getData->assigned_to,"facebook" => $getData->facebook,"twitter" => $getData->twitter,"instagram" => $getData->instagram,"pinterest" => $getData->pinterest,"status" => $getData->status,"email_verify_token" => $getData->email_verify_token,"email_verify_status" => $getData->email_verify_status,"sub_id" => $getData->sub_id,"customize_payment" => $getData->customize_payment,"cashapp" => $getData->cashapp,"zelle" => $getData->zelle,"venmo" => $getData->venmo,"apple_pay" => $getData->apple_pay,"oauth_provider" => $getData->oauth_provider,"oauth_uid" => $getData->oauth_uid,"total_invitation" => $getData->total_invitation,"invitation_limit" => $getData->invitation_limit,"auto_renew_status" => $getData->auto_renew_status,"otp" => $getData->otp,"degree" => $getData->degree,"clinical_interests" => $getData->clinical_interests,"languages" => $getData->languages,"specializations" => $getData->specializations,"certificates" => $getData->certificates,"max_week" => $getData->max_week,"health_etity" => $getData->health_entity_name,"clinic" => $getData->clinic_name,"provider" => $getData->provider_name,"insurance_provider" => $getData->insurance_provider,"created_at" => $getData->created_at,"updated_at" => $getData->updated_at];
        echo json_encode($updatedData);
    }
    public function deleteProvider() {
        $user_id = $_POST['u_id'];
        $result = $this->db->query("DELETE FROM users WHERE id = '".$user_id."'");
        if($result) {
            $msg = array('success', 'Provider deleted Successfully');
        } else {
            $msg = array('error', 'Something went wrong. Please try again later.');
        }
        echo json_encode($msg);
    }
    /* Provider Section End*/

    /** Participants Section Start */
    public function participants($id = false) {
        $userId = $this->session->userdata('loguserId');
        if(!empty($id)){
            $data = array(
                'entity' => $this->db->query("SELECT * FROM health_entity WHERE status = '1' ORDER BY name ASC")->result(),
                'provider' => $this->db->query("SELECT * FROM users WHERE id = '".$id."'")->result(),
                'allParticipant_list' => $this->db->query("SELECT * FROM users WHERE provider = '".$id."' AND user_type = '1' ORDER BY id DESC")->result(),
                'allunassignedParticipant_list' => $this->db->query("SELECT * FROM users WHERE status = '1' AND provider = '".$id."' AND user_type = '1' AND (provider = '' OR provider IS NULL) ORDER BY id DESC")->result(),
                'alldeactivatedParticipant_list' => $this->db->query("SELECT * FROM users WHERE (status != '1' OR status = '' OR status IS NULL) AND added_by = '".$userId."' AND user_type = '1' ORDER BY id DESC")->result()
            );
        } else {
            $data = array(
                'entity' => $this->db->query("SELECT * FROM health_entity WHERE status = '1' ORDER BY name ASC")->result(),
                'provider' => $this->db->query("SELECT * FROM users WHERE user_type = '5' AND status = '1'")->result(),
                'allParticipant_list' => $this->db->query("SELECT * FROM users WHERE added_by = '".$userId."' AND user_type = '1' ORDER BY id DESC")->result(),
                'allunassignedParticipant_list' => $this->db->query("SELECT * FROM users WHERE status = '1' AND added_by = '".$userId."' AND user_type = '1' AND (provider = '' OR provider IS NULL) ORDER BY id DESC")->result(),
                'alldeactivatedParticipant_list' => $this->db->query("SELECT * FROM users WHERE (status != '1' OR status = '' OR status IS NULL) AND added_by = '".$userId."' AND user_type = '1' ORDER BY id DESC")->result()
            );
        }
        $data['title'] = 'Prevention Programme';
        $data['page'] = 'Participants Management';
        $data['subpage'] = 'participants';

        $this->load->view('clinic_admin/header', $data);
        $this->load->view('clinic_admin/participants');
        $this->load->view('clinic_admin/footer');
    }
    public function add_participant() {
        if ($_FILES['profilePic']['name'] != '') {
			$src = $_FILES['profilePic']['tmp_name'];
			$filEnc = time();
			$avatar = rand(0000, 9999) . "_" . $_FILES['profilePic']['name'];
			$avatar1 = str_replace(array('(', ')', ' '), '', $avatar);
			$dest = getcwd() . '/uploads/profile/'. $avatar1;
			if (move_uploaded_file($src, $dest)) {
				$image  = $avatar1;
				@unlink('uploads/profile/'. $_POST['old_image']);
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
			$dest = getcwd() . '/uploads/profile/'. $avatar1;
			if (move_uploaded_file($src, $dest)) {
				$bimage  = $avatar1;
				@unlink('uploads/profile/'. $_POST['old_bimage']);
			}
		} else {
			if(!empty($_POST['old_bimage'])) {
				$bimage  = $_POST['old_bimage'];
			} else {
				$bimage  = '';
			}
		}

        $data = array(
            'user_type' => '1',
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'email' => $_POST['email'],
            'dob' => $_POST['dob'],
            'phone' => $_POST['phone'],
            'phone_2' => $_POST['phone_2'],
            'health_etity' => $_POST['health_etity'],
            'clinic' => $_POST['clinic'],
            'provider' => $_POST['provider'],
            'insurance_provider' => $_POST['insurance_provider'],
            'image' => $image,
            'coverImage' => $bimage,
            'status' => $_POST['status'],
            'password' => md5($_POST['password']),
            'added_by' => $_POST['uid'],
            'participant_code' => strtotime(date('Y-m-d H:i:s')),
            'created_at'   => date('Y-m-d H:i:s')
        );
        $this->db->insert('users', $data);
        $this->session->set_flashdata('message', 'Participant added Successfully');
        redirect(base_url('clinic_admin/participants'));
    }
    public function check_participant_email(){
        $email = $this->input->post('email');
        $checkEmail = $this->db->query("SELECT * FROM users WHERE email = '".$email."'")->row();
        if(!empty($checkEmail)) {
            $msg = array('status'=>'error', 'message' => 'Email Address already exists.');
        } else {
            $msg = array('status'=>'success', 'message' => 'Email Address available.');
        }
        echo json_encode($msg);
    }
    public function editParticipant() {
        $user_id = $this->input->post('u_id');
        $getData = $this->db->query("SELECT * FROM users WHERE id = '".$user_id."'")->row();
        echo json_encode($getData);
    }
    public function update_participant() {
        if ($_FILES['edit_profilePic']['name'] != '') {
			$src = $_FILES['edit_profilePic']['tmp_name'];
			$filEnc = time();
			$avatar = rand(0000, 9999) . "_" . $_FILES['edit_profilePic']['name'];
			$avatar1 = str_replace(array('(', ')', ' '), '', $avatar);
			$dest = getcwd() . '/uploads/profile/'. $avatar1;
			if (move_uploaded_file($src, $dest)) {
				$image  = $avatar1;
				@unlink('uploads/profile/'. $_POST['old_image']);
			}
		} else {
			if(!empty($_POST['old_image'])) {
				$image  = $_POST['old_image'];
			} else {
				$image  = '';
			}
		}

        if ($_FILES['edit_backgroundPic']['name'] != '') {
			$src = $_FILES['edit_backgroundPic']['tmp_name'];
			$filEnc = time();
			$avatar = rand(0000, 9999) . "_" . $_FILES['edit_backgroundPic']['name'];
			$avatar1 = str_replace(array('(', ')', ' '), '', $avatar);
			$dest = getcwd() . '/uploads/profile/'. $avatar1;
			if (move_uploaded_file($src, $dest)) {
				$bimage  = $avatar1;
				@unlink('uploads/profile/'. $_POST['old_bimage']);
			}
		} else {
			if(!empty($_POST['old_bimage'])) {
				$bimage  = $_POST['old_bimage'];
			} else {
				$bimage  = '';
			}
		}

        $data = array(
            'fname' => $_POST['edit_fname'],
            'lname' => $_POST['edit_lname'],
            'email' => $_POST['edit_email'],
            'dob' => $_POST['edit_dob'],
            'phone' => $_POST['edit_phone'],
            'phone_2' => $_POST['edit_phone_2'],
            'health_etity' => $_POST['edit_health_etity'],
            'clinic' => $_POST['edit_clinic'],
            'provider' => $_POST['edit_provider'],
            'insurance_provider' => $_POST['edit_insurance_provider'],
            'image' => $image,
            'coverImage' => $bimage,
            'status' => $_POST['edit_status']
        );
        $this->db->update('users', $data, "id='" . $_POST['edit_uid'] . "'");
        $this->session->set_flashdata('message', 'Participant updated Successfully');
        redirect(base_url('clinic_admin/participants'));
    }
    public function deleteParticipant() {
        $user_id = $_POST['u_id'];
        $result = $this->db->query("DELETE FROM users WHERE id = '".$user_id."'");
        if($result) {
            $msg = array('success', 'Participant deleted Successfully');
        } else {
            $msg = array('error', 'Something went wrong. Please try again later.');
        }
        echo json_encode($msg);
    }
    public function assignToParticipant() {
        $user_id = $_POST['u_id'];
        $provider_id = $_POST['providerid'];
        $result = $this->db->query("UPDATE users SET provider = '".$provider_id."' WHERE id = '".$user_id."'");
        if($result) {
            $msg = array('success', 'Provider assigned successfully.');
        } else {
            $msg = array('error', 'Something went wrong. Please try again later.');
        }
        echo json_encode($msg);
    }
    /** Participants Section End */
}
