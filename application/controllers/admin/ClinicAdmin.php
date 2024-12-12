<?php
defined('BASEPATH') or exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class ClinicAdmin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->Adminmodel->loggedIn();
    }

    public function index()
    {
        $data = array(
            'title' => 'Pact For Pain',
            'page' => 'Clinic Admin List',
            'subpage' => 'clinic-admin',
        );


        $data['userlist'] = $this->Adminmodel->get_all_record('*', 'users', array('user_type' => 3), array('id', 'DESC'), '');

        // $data['user_subscription'] = $this->Adminmodel->get_all_record('id, name', 'subscription', array('status' => '1'), array('name', 'ASC'), '');

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/clinic_admin');
        $this->load->view('admin/footer');
    }

    public function add()
    {
        $data = array(
            'title' => 'Pact For Pain',
            'page' => 'Add Clinic Admin',
            'subpage' => 'clinic-admin',
        );


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[8]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
            $this->form_validation->set_rules('fname', 'First Name', 'required|trim');
            $this->form_validation->set_rules('lname', 'Last Name', 'required|trim');
            $this->form_validation->set_rules('phone', 'Phone', 'required|trim');

            if ($this->form_validation->run() == true) {

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
                    'status' => '1',
                    'clinic' => $this->input->post('clinic'),
                    'user_type' => 3,
                    'password' => md5($this->input->post('password')),
                    'email_verify_status' => '1',
                    'created_at' => date('Y-m-d H:i:s')
                );

                $result = $this->Adminmodel->add('users', $data);
                if ($result) {
                    $msg = '["Clinic admin has been added successfully.", "success", "#A5DC86"]';
                    $this->session->set_flashdata('msg', $msg);
                    redirect(base_url('admin/clinicAdmin'), 'refresh');
                } else {
                    $msg = 'Some error occurred.Please try again.';
                    $this->session->set_flashdata('msg', $msg);
                    redirect(base_url('admin/clinicAdmin'), 'refresh');
                }

            }
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/add_clinic_admin');
        $this->load->view('admin/footer');
    }


    public function edit($id)
    {
        $data = array(
            'title' => 'Pact For Pain',
            'page' => 'Edit Clinic Admin',
            'subpage' => 'clinic-admin',
        );


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('fname', 'First Name', 'required|trim');
            $this->form_validation->set_rules('lname', 'Last Name', 'required|trim');
            $this->form_validation->set_rules('phone', 'Phone', 'required|trim');

            if ($this->form_validation->run() == true) {

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
                    'user_type' => 3,
                    'updated_at' => date('Y-m-d H:i:s')
                );


                $result = $this->Adminmodel->update($data, 'users', array('id' => $id));
                if ($result) {
                    $msg = '["Clinic admin has been updated successfully.", "success", "#A5DC86"]';
                    $this->session->set_flashdata('msg', $msg);
                    redirect(base_url('admin/clinicAdmin'), 'refresh');
                } else {
                    $msg = 'Some error occurred.Please try again.';
                    $this->session->set_flashdata('msg', $msg);
                    redirect(base_url('admin/clinicAdmin'), 'refresh');
                }

            }
        }
        $data['result'] = $this->Adminmodel->get_by('users', 'single', array('id' => $id), '', 1);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/edit_clinic_admin');
        $this->load->view('admin/footer');
    }

    public function email_check($str)
    {
        $con = array(
            'returnType' => 'count',
            'conditions' => array(
                'email' => $str
            )
        );
        $checkEmail = $this->Adminmodel->UniqueEmail($con);
        if ($checkEmail->num_rows() > 0) {
            $this->form_validation->set_message('email_check', 'The given email already exists.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function changestatus()
    {
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
            $status = $this->input->post('status');
            if ($status == 1) {
                $msg = 'Your status is Activate';
            } else {
                $msg = 'Your status is Inctivate';
            }

            if ($this->Adminmodel->update(['status' => $status], 'users', ['id' => $id])) {
                echo '["' . $msg . '", "success", "#A5DC86"]';
            } else {
                echo '["Some error occured, Please try again!", "error", "#DD6B55"]';
            }
        }
    }


}