<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Checkup_model extends CI_Model {
    var $table ="checkup";
    var $tblItem ="checkup_item";
    var $tblPasien ="pasien";
    var $tblDokter ="dokter";
   
    public function add($data)
    {
        return $this->db->insert($this->table,$data);
    }
    public function get($filter = array()){
        $this->db->select('c.*, d.nadok, p.namapasien,
        sum(i.qty * i.hargasatuan) as harga')
            ->from($this->table." c")
            ->join($this->tblDokter.' d','d.idDokter=c.idDokter')
            ->join($this->tblPasien.' p','p.idpasien=c.idpasien')
            ->join($this->tblItem.' i','i.checkupId=c.checkupId')
           
            if(count($filter)>0)
                $this->db->where($filter);
           
            $this->db->group_by('c.checkupId');
            $res = $this->db->get();
            return $res->result();
    }
}