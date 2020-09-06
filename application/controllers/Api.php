<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Api_model');
		$this->load->model('Trade_model');
	}

	public function fetch_data(){
		header("Content-Type: application/json");
		$res =  $this->Api_model->fetch_data();
		echo json_encode($res);
        
        

	}

	public function data_insert(){
		header("Content-Type: application/json");
		if ($this->input->post('insert_action')) {
			$patner_info = array();
			$login_user = array()
           
            
			$fee = (int)$_POST['tin_no'];
			$vat_fee = (int)$this->Location_db->get_tax($_POST['district_name']);
			$total_fee = ($fee * ($vat_fee / 100)) + $fee;
			$track_id = $this->Website->gen_trackid();
			$check_track_id = $this->Website->checking_trackid($track_id);


			if (!empty($_POST['patner_name_en'][0])) {
				for ($i = 0; $i < count($_POST['patner_name_en']); $i++) {
					$data = array(
						"track_id" => $check_track_id,
						"en_name" => $_POST['patner_name_en'][$i],
						"bn_name" => (isset($_POST['patner_name_bn'][$i])) ? $_POST['patner_name_bn'][$i] : null,
						"number" => (isset($_POST['patner_mobile_number'][$i])) ? $_POST['patner_mobile_number'][$i] : null,
						"password" => $this->Website->genarate_password()
					);
					$parner_log = array(
						"user_name" => $_POST['patner_name_en'][$i],
						"password" => (isset($_POST['patner_mobile_number'][$i])) ? md5($_POST['patner_mobile_number'][$i]) : 12345,
						"phone" => (isset($_POST['patner_mobile_number'][$i])) ? $_POST['patner_mobile_number'][$i] : null,
						"app_trackid" => $check_track_id,
						"status" => 3
					);

					$patner_info[] = $data;
					$login_user[] = $parner_log;

				}
			}


			$busnies_info = array(
				"name_en" => $this->input->post('owner_name_en'),
				"name_bn" => $this->input->post('owner_name_bn'),
				"b_name" => $this->input->post('business_name'),
				"b_type" => $this->input->post('type_of_organization'),
				"number" => $this->input->post('owner_number'),
				"district_id" => $this->input->post('district_name'),
				"sub_district_id" => $this->input->post('sub_district_name'),
				"village_name" => $this->input->post('village_name'),
				"track_id" => $check_track_id,
				"image" => (!empty($_FILES['owner_photo']['name'])) ? $this->Website->image_validation('owner_photo') : NULL,
				"signature" => (!empty($_FILES['owner_signature']['name'])) ? $this->Website->image_validation('owner_signature') : NULL,
				"status" => 1,
				"create_by_ip" => $this->input->ip_address()

			);

			$main_user = array(
				"user_name" => $this->input->post('owner_name_en'),
				"password" => (isset($_POST['owner_number'])) ? md5($_POST['owner_number']) : 12345,
				"phone" => (isset($_POST['owner_number'])) ? $_POST['owner_number'] : null,
				"app_trackid" => $check_track_id,
				"status" => 2
			);

			$money = array(
				"trackid" => $check_track_id,
				"sonod_no" => $this->input->post('owner_no'),
				"b_type" => $this->input->post('type_of_organization'),
				"fee" => $fee,
				"vat" => number_format(($fee * ($vat_fee / 100)), 2),
				"total_fee" => $total_fee,
				"genarate_data" => date('Y-m-d')

			);

			// start transaction
			$this->db->trans_start();
			$this->db->insert("personalinfo", $busnies_info);
			$this->db->insert("admin_users", $main_user);
			$insert_id = $this->db->insert_id();
			if (count($patner_info) > 0):
				$this->db->insert_batch("patnerinfo", $patner_info);
				$this->db->insert_batch("admin_users", $login_user);
			endif;
			$this->db->insert("money", $money);
			$this->db->insert("trade_sonodno", array("sonod_no" => $this->input->post('owner_no')));
			$this->db->insert("table_trackingid", array("tracking_id" => $check_track_id));
			if ($this->db->trans_status() === false) {
				$this->db->trans_rollback();
				$this->db->trans_commit();
				echo json_encode(array("status" => "falid", "message" => "Fail to sync data with live"));
			}

			// Finally complete the transaction
			$this->db->trans_commit();

			echo json_encode(array("status" => "success", "message" => "Successfully data sync with server", "trackid" => $check_track_id));

		}else{
			echo json_encode(array("status" => "no response", "message" => "HTTP request not valid"));
		}
	}
    
    
    
    
     


}

?>
