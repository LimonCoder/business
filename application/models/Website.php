<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Model
{
	public function login_history($id){
		$logindata = array(
			"user_id" => $id,
			"login_time" => date('Y-m-d H:i:s'),
			"device" =>  $this->input->user_agent(),
			"ip" =>  $this->input->ip_address()
		);
		$this->db->insert("login_history",$logindata);
		$last_id = $this->db->insert_id();
		$this->session->set_userdata(array("log_id"=>$last_id));
	}

	public function logout_history(){
		$logout_time = array(
			"logout_time" => date('Y-m-d H:i:s')
		);
		$user_id = $this->session->userdata('user_id');
		$log_id = $this->session->userdata('log_id');
		$this->db->trans_start();
		// logout history inserted //
		$this->db->where("id",$log_id);
		$this->db->where("user_id",$user_id);
		$this->db->update("login_history",$logout_time);
		$this->db->trans_complete();

	}


	public function key_set($num){
		if (strlen($num) == 1) {
			return "000".$num;
		}elseif (strlen($num) ==2){
			return "00".$num;
		}elseif (strlen($num) ==3){
			return "0".$num;
		}elseif (strlen($num) ==4){
			return $num;
		}
	}

	public function genarate_tin_id(){
		$result = $this->db->query('SELECT * FROM trade_sonodno')->num_rows()+1;
		$cy = date('Y');

		return $cy."345678".$this->key_set($result);



	}

	public function trade_no(){
		$result = $this->db->query('SELECT * FROM personalinfo')->num_rows()+1;


		return $this->key_set($result);
	}

	public function gen_trackid(){
		$valid_chars="1234567890";
		$random_string = "";
		$num_valid_chars = strlen($valid_chars);
		for ($i = 0; $i < 6; $i++)
		{
			$random_pick = mt_rand(1, $num_valid_chars);
			$random_char = $valid_chars[$random_pick-1];
			$random_string .= $random_char;
		}
		return $random_string;
	}


	public function ceb($en)
	{
		if($en=='.') return $en=".";
		if($en=='-') return $en="-";
		if($en==0) return $en="০";
		if($en==1) return $en="১";
		if($en==2) return $en="২";
		if($en==3) return $en="৩";
		if($en==4) return $en="৪";
		if($en==5) return $en="৫";
		if($en==6) return $en="৬";
		if($en==7) return $en="৭";
		if($en==8) return $en="৮";
		if($en==9) return $en="৯";
		if($en==10) return $en="১০";
		if($en==11) return $en="১১";
		if($en==12) return $en="১২";
		if($en==13) return $en="১৩";
		if($en==14) return $en="১৪";
		if($en==15) return $en="১৫";
		if($en==16) return $en="১৬";
		if($en==17) return $en="১৭";
		if($en==18) return $en="১৮";
		if($en==19) return $en="১৯";
		if($en==20) return $en="২০";
	}


	public function banglatk($fee){
		$taka="";
		$second=str_split($fee);
		for($i=0;$i<count($second);$i++):
			$en=$second[$i];
			$taka.=$this->ceb($en);
		endfor;
		return $taka;
	}

	public function checking_trackid($track_id){
		$this->db->where("tracking_id",$track_id)->get('table_trackingid')->row();

		if ($this->db->affected_rows() == 1){
			$trackid = $this->gen_trackid();
		}else{
			$trackid = $track_id;
		}

		return $trackid;

	}


	public function add_location($data){
	  $result =$this->db->insert("bd_location",$data);
	  return $result;
	}

	public function image_validation($image_name){

		$config['upload_path']          = './assets/img/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$this->load->library('upload', $config);
		if ($this->upload->do_upload($image_name))
		{
			return  $this->upload->data('file_name');

		}
	}

	public function genarate_password(){
		$alphabet = '1234567890$#&@ABCD';
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 6; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}





}
