<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {
    
    public function index()
	{
		$this->load->model('Dokter_model','dokter');
		$data['list_dokter'] = $this->dokter->get();

		$this->load->model('Pasien_model','pasien');
		$data['list_pasien'] = $this->pasien->get();
		
		$data['page']='pengguna/form';
		$data['pengguna'] = array(
			(object)array(
				'idaccount'=>'',
				'email'=>'',
				'namaPengguna'=>'',
				'userType'=>'',
				'userAlias'=>'',
				'Password'=>''
				)
		   );
		if($this->uri->segment(3) !=''){
			$this->load->model('User_model','user');
			$data['pengguna'] = $this->user->get(
					array('idaccount'=>$this->uri->segment(3))
				);

		}
		//echo '<pre>';print_r($data);'</pre>';

	    $this->load->view('main', $data);
	}
	
	public function get_useralias()
	{
	    $type= $this->uri->segment(3);
		$data= array();
		
	   	if($type=='Pasien'){
			$this->db->select('idpasien');
			$data = $this->db->get('pasien');
	    }else if($type=='Dokter'){
			$this->db->select('iddokter');
			$data = $this->db->get('dokter');
	    }
		//echo json_encode(array('data'=>$data));
		echo print_r($data);
	}
	
		public function listaktif()
	{
	    $this->load->model('User_model','user');
		
		//$where = "Status='1'";
	    $data['list_user'] = $this->user->get('Status = 1');
		$data['page']='pengguna/listaktif';
		
		$this->load->view('main',$data);
	}

	public function listnonaktif()
	{
	    $this->load->model('User_model','user');
		
		//$where = "Status='0'";
	    $data['list_user'] = $this->user->get('Status = 0');
		$data['page']='pengguna/listnon';
		
		$this->load->view('main',$data);
	}

	public function active()
	{
		$id = $this->uri->segment(3);
		$data = array(
               'Status' => '1'
            );
		
		$this->db->where('idaccount', $id);
		$this->db->update('pengguna', $data); 
		
		redirect('Pengguna/listaktif');
	}

	public function nonactive()
	{
		$id = $this->uri->segment(3);
		$data = array(
               'Status' => '0'
            );
		
		$this->db->where('idaccount', $id);
		$this->db->update('pengguna', $data); 
		
		redirect('Pengguna/listnonaktif');
	}
	
	public function submit()
	{
	    $this->load->model('User_model','user');
	    $user = $this->input->post();
	    $id = $this->input->post('idaccount');
	    
	    if($id==''){
	        $this->load->helper('autoid');
		    $user['idaccount']=getid('idaccount', 'pengguna', 'ACC');
		    $this->user->add($user);   
	    }else
	        $this->user->edit($user,
	            array('idaccount'=>$id)
	        );
		
		redirect('Pengguna/listaktif');
	}
	
	public function delete()
	{
	    $id = $this->uri->segment(3);
	    $this->load->model('User_model','user');
	    $this->user->delete(
	        array('idaccount' => $id)
	   );
	   redirect('Pengguna/listnonaktif');
	}

	public function input()
	{
		$this->load->model('user_model','user');
		$this->load->helper('autoid');
		$id = $this->input->post('idaccount');
		$getiduser = getid('idaccount', 'pengguna', 'ACC');

		$email = $_POST['email'];
		$namaPengguna = $_POST['namaPengguna'];
		$userType = $_POST['userType'];
		$userAlias1 = $_POST['userAlias1'];
		$userAlias2 = $_POST['userAlias2'];
		$password = $_POST['Password'];
		$id = $_POST['idaccount'];

		if($id==''){
			if($userType=='Pasien'){
				$data = array(
					'idaccount' => $getiduser,
					'email' => $email ,
					'namaPengguna' => $namaPengguna ,
					'userType' => $userType,
					'userAlias' => $userAlias2,
					'Password' => $password,
					'Status' => '1'
				 );
			}else if($userType=='Dokter'){
				$data = array(
					'idaccount' => $getiduser,
					'email' => $email ,
					'namaPengguna' => $namaPengguna ,
					'userType' => $userType,
					'userAlias' => $userAlias1,
					'Password' => $password,
					'Status' => '1'
				 );
			}else{
				$data = array(
					'idaccount' => $getiduser,
					'email' => $email ,
					'namaPengguna' => $namaPengguna ,
					'userType' => $userType,
					'userAlias' => '',
					'Password' => $password,
					'Status' => '1'
				 );
			}
			$hasil = $this->db->insert('pengguna', $data);
			//echo '<pre>';print_r($hasil);'</pre>';
			
		}else{
			if($userType=='Pasien'){
				$data1 = array(
					'email' => $email ,
					'namaPengguna' => $namaPengguna ,
					'userType' => $userType,
					'userAlias' => $userAlias2,
					'Password' => $password,
					'Status' => '1'
				 );
			}else if($userType=='Dokter'){
				$data1 = array(
					'email' => $email ,
					'namaPengguna' => $namaPengguna ,
					'userType' => $userType,
					'userAlias' => $userAlias1,
					'Password' => $password,
					'Status' => '1'
				 );
			}else{
				$data1 = array(
					'email' => $email ,
					'namaPengguna' => $namaPengguna ,
					'userType' => $userType,
					'userAlias' => '',
					'Password' => $password,
					'Status' => '1'
				 );
				 
			}
			$this->db->where('idaccount', $id);
            $this->db->update('pengguna', $data1); 
		}
		 
		 //echo '<pre>';print_r($this->db->last_query());'</pre>';
		 
		 redirect('pengguna/listaktif'); 
	}
}