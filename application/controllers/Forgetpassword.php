<?php
defined('BASEPATH') or exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Forgetpassword extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('email');
        $this->load->model('Mymodel');
        $this->session->keep_flashdata('suc_msg');
    }
    public function index() {
        $data = array(
            'title' => 'Prevention Programme',
            'page' => 'Forget Password',
            'subpage' => 'forget-password',
        );
        $this->load->view('header', $data);
        $this->load->view('forget_password');
    }
    public function forgotpassemail(){
        //require_once APPPATH . 'third_party/email/vendor/autoload.php';
        require 'vendor/autoload.php';
        $con = array(
            'returnType' => 'forgetpassword',
            'conditions' => array(
                'email' => $this->input->post('email'),
                'status' => '1'
            )
        );
        $result = $this->Mymodel->Forget_Password($con);
        if (!empty($result)) {
            $settings = $this->Adminmodel->get('settings', true, 'settingId', 1);
            $mail = new PHPMailer(true);
            try {
                $htmlContent = "
                <body>
                    <div style='width:600px;margin: 0 auto;background: #fff; border: 1px solid #e6e6e6;'>
                        <div style='padding: 30px 30px 15px 30px;box-sizing: border-box;'>
                            <img src='cid:Logo' style='width:100px;float: right;margin-top: 0 auto;'>
                            <h3 style='padding-top:40px; line-height: 30px;'>Greetings from <span style='font-weight: 900;font-size: 35px;color: #F44C0D; display: block;'>Prevention Programme</span></h3>
                            <p style='font-size:24px;'>Hello ".$result->fname.",</p>
                            <p style='font-size:24px;'>We received a request to reset your password on Prevention Programme.</p>
                            <p style='font-size:24px;'>Please click the button below to reset your password.</p>
                            <p style='text-align: center;'>
                                <a href='".base_url('resetpassword/'.base64_encode($result->email))."' style='height: 50px; width: 300px; background: rgb(253,179,2); background: linear-gradient(0deg, rgba(253,179,2,1) 0%, rgba(244,77,9,1) 100%); text-align: center; font-size: 18px; color: #fff; border-radius: 12px; display: inline-block; line-height: 50px; text-decoration: none; text-transform: uppercase; font-weight: 600;'>RESET PASSWORD</a>
                            </p>
                            <p style='font-size:20px;'>If you did not request a password reset, please ignore this email.</p>
                            <p style='font-size:20px;'>Thank you!</p>
                            <p style='font-size:20px;list-style: none;'>Sincerely</p>
                            <p style='list-style: none;'><b>Prevention Programme</b></p>
                        </div>
                        <table style='width: 100%;'>
                            <tr>
                                <td style='height:30px;width:100%; background: red;padding: 10px 0px; font-size:13px; color: #fff; text-align: center;'>Copyright &copy; <?=date('Y')?> Prevention Programme. All rights reserved.</td>
                            </tr>
                        </table>
                    </div>
                </body>";
                $mail->CharSet = 'UTF-8';
                $mail->SetFrom('phptest@goigi.in', 'PHP Test');
                $mail->AddAddress($result->email);
                $mail->IsHTML(true);
                $mail->Subject = "Forgot Password Confirmation message from Prevention Programme";
                $mail->AddEmbeddedImage('uploads/logo/'.$get_setting->flogo, 'Logo');
                $mail->Body = $htmlContent;
                $mail->IsSMTP();
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Host = "mail.goigi.in";
                $mail->Port = 587; //587 465
                $mail->Username = "sayantan@goigi.in";
                $mail->Password = "Goigi#123456";
                $mail->send();
                echo json_encode(array('success', 'Please check your inbox. We have sent you an email to reset your password.'));
            } catch (Exception $e) {
                //echo json_encode(array('message', 'Something went wrong. Please try again later!'));
                echo json_encode(array('success', 'Please check your inbox. We have sent you an email to reset your password.'.base_url('resetpassword/'.base64_encode($result->email))));
            }
        }
    }
    public function reset($token) {
        $getUserData = $this->db->query("SELECT * FROM users WHERE email = '".base64_decode($token)."'")->row();
        $userId = $getUserData->id;
        $data = array(
            'title' => 'Prevention Programme',
            'page' => 'Reset Password',
            'subpage' => 'reset-password',
            'user_id' => $userId
        );
        $this->load->view('header', $data);
        $this->load->view('resetpassword');
    }
    public function update_password(){
        $getUserData = $this->db->query("SELECT * FROM users WHERE email = '".$_POST['user_id']."'")->row();
        $userEmail = $getUserData->email;
        $con = array(
            'returnType' => 'Reset',
            'conditions' => array(
                'password' => md5($_POST['password']),
                'id' => $_POST['user_id'],
                'status' => '1'
            )
        );
        $result = $this->Mymodel->Reset_Password($con);
        if (!empty($result)) {
            $this->session->set_flashdata("suc_msg", "Your password has been updated successfully.");
            redirect(base_url('login'));
        } else {
            $this->session->set_flashdata("login_fail", "Something Went Wrong. Your password has not updated.");
            redirect(base_url('resetpassword/'.base64_encode($userEmail)));
        }
    }
}