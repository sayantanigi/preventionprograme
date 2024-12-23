<?php
defined('BASEPATH') or exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Clinic extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->Adminmodel->loggedIn();
    }
    /* Clinic Code Start*/
    public function index() {
        $data = array(
            'title' => 'Pact For Pain',
            'page' => 'Clinic List',
            'subpage' => 'clinic',
        );
        $data['clinic_list'] = $this->Adminmodel->get_all_record('*', 'clinic', '', array('id', 'DESC'), '');
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/clinic/clinic_list');
        $this->load->view('admin/footer');
    }
    public function check_clinic_name() {
        $clinic_name = $this->input->post('clinic_name');
        $checkName = $this->db->query("SELECT * FROM clinic WHERE name like '%".$clinic_name."%'")->row();
        if (!empty($checkName)) {
            $response = array('status'=>'error', 'message'=>'The given clinic name already exists.');
        } else {
            $response = array('status'=>'success', 'message'=>'Clinic name available.');
        }
        echo json_encode($response);
    }
    public function add_clinic() {
        $data = array(
            'title' => 'Pact For Pain',
            'page' => 'Add Clinic',
            'subpage' => 'clinic',
        );
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->form_validation->set_rules('clinic_name', 'Clinic Name', 'required|trim');
            if ($this->form_validation->run() == true) {
                $data = array(
                    'added_by' => '0',
                    'clinic_code' => random_int(100000, 999999),
                    'name' => strip_tags($this->input->post('clinic_name')),
                    'status' => $this->input->post('clinic_status'),
                    'created_at' => date('Y-m-d H:i:s')
                );
                $result = $this->Adminmodel->add('clinic', $data);
                if ($result) {
                    $msg = '["Clinic has been added successfully.", "success", "#A5DC86"]';
                    $this->session->set_flashdata('msg', $msg);
                    redirect(base_url('admin/clinic'), 'refresh');
                } else {
                    $msg = 'Some error occurred.Please try again.';
                    $this->session->set_flashdata('msg', $msg);
                    redirect(base_url('admin/clinic'), 'refresh');
                }
            }
        }
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/clinic/add_clinic');
        $this->load->view('admin/footer');
    }
    public function edit_clinic($id) {
        $data = array(
            'title' => 'Pact For Pain',
            'page' => 'Edit Clinic',
            'subpage' => 'clinic',
        );
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->form_validation->set_rules('clinic_name', 'Clinic Name', 'required|trim');
            if ($this->form_validation->run() == true) {
                $clinic_id = $this->input->post('clinic_id');
                $data = array(
                    'name' => strip_tags($this->input->post('clinic_name')),
                    'status' => strip_tags($this->input->post('clinic_status'))
                );
                $result = $this->Adminmodel->update($data, 'clinic', array('id' => $clinic_id));
                if ($result) {
                    $msg = '["Clinic has been updated successfully.", "success", "#A5DC86"]';
                    $this->session->set_flashdata('msg', $msg);
                    redirect(base_url('admin/clinic'), 'refresh');
                } else {
                    $msg = 'Some error occurred.Please try again.';
                    $this->session->set_flashdata('msg', $msg);
                    redirect(base_url('admin/clinic'), 'refresh');
                }
            }
        }
        $data['result'] = $this->Adminmodel->get_by('clinic', 'single', array('id' => $id), '', 1);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/clinic/edit_clinic');
        $this->load->view('admin/footer');
    }
    public function change_clinic_status() {
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
            $status = $this->input->post('status');
            if ($status == 1) {
                $msg = 'The clinic has been activated';
            } else {
                $msg = 'The clinic has been deactivated';
            }

            if ($this->Adminmodel->update(['status' => $status], 'clinic', ['id' => $id])) {
                echo '["' . $msg . '", "success", "#A5DC86"]';
            } else {
                echo '["Some error occured, Please try again!", "error", "#DD6B55"]';
            }
        }
    }
    public function delete_clinic($clinic_id) {
        $result = $this->db->query("DELETE FROM clinic WHERE id = '".$clinic_id."'");
        if($result > 0) {
            echo '["Clinic deleted successfully", "success", "#A5DC86"]';
        } else {
            echo '["Some error occured, Please try again!", "error", "#DD6B55"]';
        }
    }
    /* Clinic Code End*/

    /* Clinic Admin Code Start */
    public function clinic_admin() {
        $data = array(
            'title' => 'Pact For Pain',
            'page' => 'Clinic Admin List',
            'subpage' => 'clinic-admin',
        );
        $data['userlist'] = $this->Adminmodel->get_all_record('*', 'users', array('user_type' => 3), array('id', 'DESC'), '');
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/clinic/clinic_admin');
        $this->load->view('admin/footer');
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
        $data = array(
            'title' => 'Pact For Pain',
            'page' => 'Add Clinic Admin',
            'subpage' => 'clinic-admin',
            'clinic' => $this->db->query("SELECT * FROM clinic WHERE status = '1'")->result()
        );
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = array(
                'participant_code' => random_int(10000, 99999),
                'fname' => strip_tags($this->input->post('fname')),
                'lname' => strip_tags($this->input->post('lname')),
                'email' => strip_tags($this->input->post('email')),
                'phone' => strip_tags($this->input->post('phone')),
                'address' => strip_tags($this->input->post('address')),
                'city' => strip_tags($this->input->post('city')),
                'zipcode' => strip_tags($this->input->post('zipcode')),
                'certificates' => strip_tags($this->input->post('certificate')),
                'languages' => strip_tags($this->input->post('language')),
                'status' => '1',
                'clinic' => $this->input->post('clinic'),
                'user_type' => '3',
                'password' => md5($this->input->post('password')),
                'email_verify_status' => '1',
                'created_at' => date('Y-m-d H:i:s')
            );
            $result = $this->Adminmodel->add('users', $data);
            if ($result) {
                $msg = '["Clinic admin has been added successfully.", "success", "#A5DC86"]';
                $this->session->set_flashdata('msg', $msg);
                redirect(base_url('admin/clinic/clinic_admin'), 'refresh');
            } else {
                $msg = 'Some error occurred.Please try again.';
                $this->session->set_flashdata('msg', $msg);
                redirect(base_url('admin/clinic/clinic_admin'), 'refresh');
            }
        }
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/clinic/add_clinic_admin');
        $this->load->view('admin/footer');
    }
    public function edit_clinic_admin($id) {
        $data = array(
            'title' => 'Pact For Pain',
            'page' => 'Edit Clinic Admin',
            'subpage' => 'clinic-admin',
        );
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = array(
                'fname' => strip_tags($this->input->post('fname')),
                'lname' => strip_tags($this->input->post('lname')),
                'email' => strip_tags($this->input->post('email')),
                'phone' => strip_tags($this->input->post('phone')),
                'address' => strip_tags($this->input->post('address')),
                'city' => strip_tags($this->input->post('city')),
                'zipcode' => strip_tags($this->input->post('zipcode')),
                'certificates' => strip_tags($this->input->post('certificate')),
                'languages' => strip_tags($this->input->post('language')),
                'updated_at' => date('Y-m-d H:i:s')
            );
            $result = $this->Adminmodel->update($data, 'users', array('id' => $id));
            if ($result) {
                $msg = '["Clinic admin has been updated successfully.", "success", "#A5DC86"]';
                $this->session->set_flashdata('msg', $msg);
                redirect(base_url('admin/clinic/clinic_admin'), 'refresh');
            } else {
                $msg = 'Some error occurred.Please try again.';
                $this->session->set_flashdata('msg', $msg);
                redirect(base_url('admin/clinic/clinic_admin'), 'refresh');
            }
        }
        $data['result'] = $this->Adminmodel->get_by('users', 'single', array('id' => $id), '', 1);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/clinic/edit_clinic_admin');
        $this->load->view('admin/footer');
    }
    public function change_clinic_admin_status() {
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
            $status = $this->input->post('status');
            if ($status == 1) {
                $msg = 'The clinic admin has been activated';
            } else {
                $msg = 'The clinic admin has been deactivated';
            }

            if ($this->Adminmodel->update(['status' => $status], 'users', ['id' => $id])) {
                echo '["' . $msg . '", "success", "#A5DC86"]';
            } else {
                echo '["Some error occured, Please try again!", "error", "#DD6B55"]';
            }
        }
    }
    public function delete_clinic_admin($clinic_admin_id) {
        $result = $this->db->query("DELETE FROM users WHERE id = '".$clinic_admin_id."'");
        if($result > 0) {
            echo '["Clinic admin deleted successfully", "success", "#A5DC86"]';
        } else {
            echo '["Some error occured, Please try again!", "error", "#DD6B55"]';
        }
    }
}