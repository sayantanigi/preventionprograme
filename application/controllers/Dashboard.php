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
        $this->load->view('header', $data);
        $this->load->view('account/dashboard');
        $this->load->view('footer');
    }
    public function updateplayerId() {
        $user_id = $this->session->userdata('loguserId');
        $getPlayerInfo = $this->Mymodel->get_ById('onesignal_users', array('user_id' => $user_id));
        if (@$getPlayerInfo[0]->signal_id) {
            $signal_id = $getPlayerInfo[0]->signal_id;
            $mydata = array(
                'player_id' => $this->input->post('player_id')
            );
            $result = $this->Mymodel->update_data_onsignal('onesignal_users', array('signal_id' => $signal_id), $mydata);
            if ($result) {
                echo "1";
            } else {
                echo "0";
            }
        } else {
            $addData = array(
                'user_id' => $user_id,
                'player_id' => $this->input->post('player_id'),
                'created_at' => date('Y-m-d H:m:i'),
            );
            $result = $this->Mymodel->add('onesignal_users', $addData);
            if ($result) {
                echo "1";
            } else {
                echo "0";
            }
        }
    }
    public function msgSent() {
        $userId = $this->session->userdata('loguserId');
        $msg = "Hello Common Message";
        $this->Mymodel->sendMsg($userId, $msg);
    }
}
