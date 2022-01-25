<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkup extends CI_Controller {
    function __construct(){
        parent::__construct();
        if($this->session->userdata('email')=='')
            redirect('login/logout');
            
        if($this->session->userdata('userType')==PERMIT_PASIEN){
            redirect('login/permit');
        }
    }
    
    public function index()
	{
	    $this->load->helper('form');
        $this->load->model('Pasien_model');
        $this->load->model('Obat_model');
	    
	    $data['page']='checkup/form';
        $data['pasien']= $this->Pasien_model->get();
        $data['obat'] = $this->Obat_model->get();
        $this->load->view('main', $data);
        
        //echo '<pre>';print_r($data);'</pre>';
    }
    
    public function listdata(){
        $data['page']='checkup/list_checkup';
        $this->load->view('main',$data);
    }
}