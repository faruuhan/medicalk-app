<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_model extends CI_Model {
	var $table ="pasien";
	public function add($data)
	{
		$this->db->insert($this->table,$data);
	}
	
	public function edit($data,$where){
	    $this->db->where($where);
	    $this->db->update($this->table, $data);
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
	    $this->db->delete($this->table,$where);
	}
	
	public function getuserid(){
	    $this->db->select('idpasien')
	    ->from($this->table);
	    
	    $res = $this->db->get();
	    return $res->result();
	}
}