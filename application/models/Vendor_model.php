<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor_model extends CI_Model {
	var $table ="vendor";
	
	public function get($filter = array()){
		$this->db->select('*')
			->from($this->table);
			
			if(count($filter)>0)
				$this->db->where($filter);
			
			$res = $this->db->get();
			
			return $res->result();
	}
}
		