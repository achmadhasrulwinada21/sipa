<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index() {
		$this->load->model('obatreg');
	
		$data ['data_ajukan'] = $this->obatreg->GetprodukV_lop()->result_array();
		$data ['data_setuju'] = $this->obatreg->GetprodukV_lop(" where status = '10' ")->result_array();
		$data ['data_ditolak'] = $this->obatreg->GetprodukV_lop(" where status = 'ditolak' ")->result_array();
		$data ['data_rilis'] = $this->obatreg->GetprodukV_lop(" where status = '9' ")->result_array();
		//$data['data_ajukan'] = $this->obatreg->Get_v_jum_pengajuan()->result();
        
		$this->template->display('dashboard', $data);
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
	
	
	function profile() {

		$u_id = ($this->session->userdata('u_name'));
		
		//$data['data_user']=  $this->db->get('v_usergroup')->result();
		$data	['data_user'] = $this->model->Profile("where u_name ='$u_id'")->result();
	   
		$this->template->display('user/data_user2',$data);
    }
	
	

    public function __construct()
	{
		parent::__construct();
		$this->_cek_login();
	}
	private function _cek_login()
	{
		if(!$this->session->userdata('u_name')){            
			redirect(base_url().'backend');
		}
	}


}
