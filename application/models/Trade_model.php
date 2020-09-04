<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Trade_model extends CI_Model
{

	private $select_coloum = array("p.id", "p.image","p.name_en","p.track_id","m.sonod_no","b.name business_name","m.genarate_data");



	public function make_qurey(){
		$this->db->select($this->select_coloum);
		$this->db->from("personalinfo p");
		$this->db->join('business_type b', 'b.id = p.b_type','inner');
		$this->db->join('money m', 'p.track_id = m.trackid','inner');

		if($this->session->userdata('is_status') == 2 || $this->session->userdata('is_status') == 3 ){
			$trackid = $this->session->userdata('app_trackid');
			$this->db->where('p.track_id',$trackid);
		}
		$this->db->where('m.genarate_data BETWEEN "'.$_POST['from_date'].'" and "'.$_POST['to_date'].'"');

		if (isset($_POST['search']['value'])){
			$this->db->group_start();
			$this->db->like("p.name_en",$_POST['search']['value']);
			$this->db->or_like("b.name",$_POST['search']['value']);
			$this->db->or_like("p.track_id",$_POST['search']['value']);
			$this->db->or_like("m.sonod_no",$_POST['search']['value']);
			$this->db->group_end();
		}

		if (isset($_POST['order'])){
			$this->db->order_by($this->select_coloum[$_POST['order'][0]['column']], $_POST['order'][0]['dir']);
		}elseif ($_POST['datesorting'] == "select"){
			$this->db->order_by("m.genarate_data","ASC");

		}
		else{
			$this->db->order_by("p.id","DESC");
		}

	}

	public function make_datable()
	{
		$this->make_qurey();
		if (isset($_POST["length"])){
			if($_POST["length"] != -1)
			{
				$this->db->limit($_POST['length'], $_POST['start']);
			}
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function get_filtered_data()
	{
		$this->make_qurey();
		$query = $this->db->get();
		return $query->num_rows();

	}
	public function get_all_data()
	{
		$this->db->select("*");
		$this->db->from("personalinfo");
		return $this->db->count_all_results();
	}



	public function trade_personal_info($id){
		$this->db->select(array("p.id sid","p.*","bd.name district_name","bd.tax","bs.name upozila_name","b.*"));
		$this->db->from('personalinfo p');
		$this->db->join('business_type b','p.b_type = b.id');
		$this->db->join('bd_location bd','p.district_id = bd.id');
		$this->db->join('bd_location bs','p.sub_district_id = bs.id');
		$this->db->where("track_id",$id);
		return $this->db->get()->row();
	}

	public function trade_money($id){
		return $this->db->where("trackid",$id)->get('money')->row();
	}
	public function trade_patner_info($id){
		$res = $this->db->where("track_id",$id)->get("patnerinfo");
		if ($this->db->affected_rows() > 0 ){
			return $res->result();
		}else{
			return NULL;
		}
	}

	public function single_trade_delete($trackid){
		$this->db->trans_start();
		$this->db->where('track_id', $trackid)->delete('personalinfo');
		$this->db->where('trackid', $trackid)->delete('money');
		$this->db->where('track_id', $trackid)->delete('patnerinfo');
		$this->db->where('app_trackid', $trackid)->delete('admin_users');
		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			$this->db->trans_commit();
			return array("status"=> "falid");
		}
		// Finally complete the transaction
		$this->db->trans_commit();

		return array("status"=> "success");

	}


	public function total_trade_lience(){
		return $this->db->count_all('personalinfo');
	}

}
