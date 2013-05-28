<?php

include 'DB.php';

class Map_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	
	public function get_coordinates(){
		$return = array();
		$this->db->select("lat,lng");
		$this->db->from("markers");
		$query = $this->db->get();
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
			array_push($return, $row);
		}
	}
	
	return $return;
	
	}
}