<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

	public function index()
	{
		$data['page']='pasien/form';
		$data['pasien'] = array(
		                    (object)array(
		                        'idpasien'=>'',
		                        'namapasien'=>'',
		                        'tgllahir'=>'',
		                        'alamat'=>'',
		                        'gender'=>'',
		                        'golongan'=>''
                		        )
                		   );
		if($this->uri->segment(3) !=''){
		    $this->load->model('Pasien_model','pasien');
		    $data['pasien'] = $this->pasien->get(
	                array('idpasien'=>$this->uri->segment(3))
		        );
		    
		}
		
		$this->load->view('main', $data);
	}
	
	public function daftar()
	{
	    $this->load->model('Pasien_model','pasien');
	    
	    $data['list_pasien'] = $this->pasien->get();
		$data['page']='pasien/list';
		
		$this->load->view('main',$data);
	}
	
	public function submit()
	{
	    $this->load->model('pasien_model','pasien');
	    $pasien = $this->input->post();
	    $id = $this->input->post('idpasien');
	    
	    if($id==''){
	        $this->load->helper('autoid');
		    $pasien['idpasien']=getid('idpasien', 'pasien', 'PS');
		    $this->pasien->add($pasien);   
	    }else
	        $this->pasien->edit($pasien,
	            array('idpasien'=>$id)
	        );
		
		redirect('Pasien/daftar');
	}
	
	public function delete()
	{
	    $id = $this->uri->segment(3);
	    $this->load->model('pasien_model','pasien');
	    $this->pasien->delete(
	        array('idpasien' => $id)
	   );
	   redirect('Pasien/daftar');
	}
}
