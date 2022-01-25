<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class obat_model extends CI_Model {
	var $table ="obat";
	public function add($data)
	{
		return $this->db->insert($this->table,$data);
	}
	
	public function get($filter = array()){
		$this->db->select('*')
			->from($this->table);
			
			if(count($filter)>0)
				$this->db->where($filter);
			
			$res = $this->db->get();
			
			return $res->result();
	}
	
	public function delete($where)
	{
	    return $this->db->delete($this->table,$where);
	}
}