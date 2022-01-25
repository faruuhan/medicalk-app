<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

	public function index()
	{
		$data['page']='dokter/form';
		$data['dokter'] = array(
		                    (object)array(
		                        'iddokter'=>'',
		                        'namadokter'=>'',
		                        'telepon'=>'',
		                        'spesialis'=>''
                		        )
                		   );
		if($this->uri->segment(3) !=''){
		    $this->load->model('Dokter_model','dokter');
		    $data['dokter'] = $this->dokter->get(
	                array('iddokter'=>$this->uri->segment(3))
		        );
		    
		}
		
		$this->load->view('main', $data);
	}
	
	public function daftar()
	{
	    $this->load->model('Dokter_model','dokter');
	    
	    $data['list_dokter'] = $this->dokter->get();
		$data['page']='dokter/list';
		
		$this->load->view('main',$data);
	}
	
	public function submit()
	{
	    $this->load->model('dokter_model','dokter');
	    $dokter = $this->input->post();
	    $id = $this->input->post('iddokter');
	    
	    if($id==''){
	        $this->load->helper('autoid');
		    $dokter['iddokter']=getid('iddokter', 'dokter', 'DOK');
		    $this->dokter->add($dokter);   
	    }else
	        $this->dokter->edit($dokter,
	            array('iddokter'=>$id)
	        );
		
		redirect('Dokter/daftar');
	}
	
	public function delete()
	{
	    $id = $this->uri->segment(3);
	    $this->load->model('dokter_model','dokter');
	    $this->dokter->delete(
	        array('iddokter' => $id)
	   );
	   redirect('Dokter/daftar');
	}
}
