<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Website");
	}


	public function index()
	{
		$this->load->view('login');
		
	}

	// user login //
	public function can_login(){
		$username=$this->input->post('user_name',TRUE);
		$password=$this->input->post('password',TRUE);
		$password = md5($password);

		$data_searching = array('user_name' => $username, 'password' => $password);
		$this->db->where($data_searching);
		$query = $this->db->get("admin_users");
		$res = $query->row();
		$login = $query->num_rows();
		if ($login == 1){

			$newdata = array(
				'user_id' => $res->id,
				'username'  => $res->user_name,
				'email'  => $res->email,
				'app_trackid' => $res->app_trackid,
				'is_status'  => $res->status,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($newdata);

			$user_staus = array(
			 "status" => $res->status
			);

			$update =  $this->db->where("id",$res->id)->update("admin_users",$user_staus);

			if ($update){

				$this->Website->login_history($res->id);
				echo 1;

			}







		}else{
			echo 2;
		}
	}
}

?>
