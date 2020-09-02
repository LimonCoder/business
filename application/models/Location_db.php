<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location_db extends CI_Model
{

	private $select_coloum = array("dis.id", "IF(dis.type = 1,dis.name,IF(dis.type = 2,upz.name, NULL)) as district_name","IF(dis.type =2, dis.name,NULL) as upozila_name", "dis.tax");



	public function make_qurey(){
		$this->db->select($this->select_coloum);
		$this->db->from("bd_location dis");
		$this->db->join('bd_location upz','upz.id = dis.parent_id','left');

		if (isset($_POST['search']['value'])){
			$this->db->like("IF(dis.type = 1,dis.name,IF(dis.type = 2,upz.name, NULL))",$_POST['search']['value']);
			$this->db->or_like("IF(dis.type =2, dis.name,NULL)",$_POST['search']['value']);
		}

		if (isset($_POST['order'])){
			$this->db->order_by($this->select_coloum[$_POST['order'][0]['column']], $_POST['order'][0]['dir']);
		}else{
			$this->db->order_by("dis.id","ASC");
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
		$this->db->from("bd_location");
		return $this->db->count_all_results();
	}



	public function get_upozila($id){
		$results = $this->db->where("parent_id",$id)->get("bd_location")->result();

		$html = '<option value="" >	চিহ্নিত করুন</option>';
		foreach ($results as $row ){
			$html .= '<option value="'.$row->id.'" >'.$row->name.'</option>';
		}
		return $html;
	}

	public function get_district(){
		$this->db->where("parent_id is NULL",NULL,FALSE);
		$this->db->where("type",1);
		$result = $this->db->get("bd_location")->result();
		return $result;
	}

	public function get_tax($id){
		$results = $this->db->where("id",$id)->get('bd_location')->row()->tax;
		return $results;
	}






}
