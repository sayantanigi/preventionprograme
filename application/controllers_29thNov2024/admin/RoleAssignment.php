<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class RoleAssignment extends CI_Controller 
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
			'page' => 'ROLE ASSIGNMENT MENU WISE',
			'subpage' => 'roleAssignment',
		);
      
      
        $data['menus'] = $this->Adminmodel->get_all_record('*', 'menus', '', array('name', 'ASC'), '');
        $data['list'] = $this->Adminmodel->get_all_record('*', 'role', '', array('name', 'ASC'), '');
		
		// $data['user_subscription'] = $this->Adminmodel->get_all_record('id, name', 'subscription', array('status' => '1'), array('name', 'ASC'), '');
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/role_assignment');
		$this->load->view('admin/footer');
	}
	
	public function storeOrUpdate()
    {
		
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
				$roleId = $_POST['role_id'];
				$menus =  $_POST['menus'];

				$menuIds = array_column($menus, 'menu_id');
				$menuIds = implode(",", $menuIds);
				$delete = $this->db->query("delete from role_assignments where role_id = ".@$roleId."");
				foreach ($menus as $menu) {
					$array = [
						
						
							'role_id' => $roleId,
							'menu_id' => $menu['menu_id'],
							'has_read_access' => $menu['has_read_access'],
							'has_write_access' => $menu['has_write_access'],
							'has_full_access' => $menu['has_full_access'],
							'status' => $menu['status'],
							'created_by' => 0, // or set it to the appropriate user ID
							'created_at' => date('Y-m-d H:i:s'),
						
				    ];
					$result= $this->Adminmodel->add('role_assignments', $array);
					//print_r($array);
				}
				
				
				$response['message'] = 'Role assignments updated successfully.';
				echo json_encode($response);
				
			
		}
        
    }
	
	public function getRoleAssignments($role_id)
    {
        //$assignments = RoleAssignment::where('role_id', $role_id)->get();
		$assignments = $this->db->query("select * from role_assignments where role_id = ".$role_id."")->result();
		//$response['assignments'] = $assignments;
		echo json_encode($assignments);
       // return response()->json($assignments);
    }
}