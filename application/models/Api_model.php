<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model {


	public function fetch_data(){
		$this->db->select(array("p.id", "p.image","p.name_en","p.track_id","m.sonod_no","b.name business_name","m.genarate_data"));
		$this->db->from("personalinfo p");
		$this->db->join('business_type b', 'b.id = p.b_type','inner');
		$this->db->join('money m', 'p.track_id = m.trackid','inner');
		return $this->db->get()->result_array();
	}

}
