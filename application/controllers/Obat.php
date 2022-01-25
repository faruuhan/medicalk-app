<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class obat extends CI_Controller {
	
	public function index()
	{	
		$this->load->model('vendor_model');
		$data['vendor'] = $this->vendor_model->get();
		$data['page']='obat/list_obat';
		$this->load->view('main',$data);
	}
	
	public function submit()
	{
	
		$this->load->helper('autoid');
		$this->load->model('obat_model','obat');
		
		$out['status'] = true;
		$out['messages'] = "";
		$id = getid('idobat', 'obat', 'OB');
		do{
			if($this->input->post('namaobat')==''){
				$out['status'] = false;
				$out['messages'] = "Nama Obat Harus diisi";
				break;
			}
			
		$obat = $this->input->post();
		$obat['idobat']=getid('idobat', 'obat', 'OB');
		$obat['lastinsert']=date('y-m-d');
		
		$res = $this->obat->add($obat);
		$out['status'] = $res;
		if($res){
			$out['messages'] = "Data Obat Berhasil ditambahkan Dengan Id :".$id;
			
		}
		
		}while(FALSE);
		
		echo json_encode($out);
		
	}
	
	public function listobat(){
	    $this->load->model('obat_model');
	    $obat = $this->obat_model->get();
	    $out= array();
	    
	    foreach($obat as $row)
	        $out[]=array($row->idobat,$row->namaobat,$row->harga,$row->expired,$row->stok);
	    
	    echo json_encode(array('data'=>$out));
	}
	
	public function Delete(){
	    $this->load->model('obat_model','obat');
	    $data = $this->input->post('data');
	    
	    $out['status'] =false;
	    $out['messages'] ="Gagal Menghapus data".$data[0];
	    
	    $res = $this->obat->delete(
	        array('idobat'=>$data[0])
	    );
	    
	    if($res){
	        $out['status'] =true;
	        $out['messages'] ="Berhasil Menghapus data dengan Id".$data[0];
	    }
	    
	    echo json_encode(array('data'=>$out));
	}
}