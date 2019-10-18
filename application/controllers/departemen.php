<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Departemen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->_cek_login();
		//$this->load->helper('currency_format_helper');
	}	

	public function index()
	{		
		$this->load->model('m_departemen');
		$data = array
		(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),
			'data_departemen' => $this->m_departemen->GetDepartemen()->result_array()
		);

		$this->template->Display('departemen/data_dept',$data);
		//$this->load->view('departemen/data_dept', $data);
	}

	function adddepartemen()
	{
		$data = array
		(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),			
		);
		
		$this->template->Display('departemen/add_dept',$data);
		//$this->load->view('departemen/add_dept', $data);
	}

	function savedata()
	{				   
		$this->load->model('m_departemen');				
		$kode_depar  = $_POST['kode_depar'];
		$nama_depar = $_POST['nama_depar'];
		$email = $_POST['email'];
		//$userlog = ($this->session->userdata('nama')
		//);
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");				
	
		$data = array
		(	 		
	 		'kode_depar' =>$kode_depar,
	 		'nama_depar' =>$nama_depar,	 
	 		'email' =>$email,			
	 		//'createdby' =>$userlog,	 		
			'createdate' => $waktusaatini,
			'createby' =>  $this->session->userdata('nama'),
	 		//'createddate' => $waktu,
			//'createdby' =>  $this->session->userdata('nama'),
			
		);
				 								
		$result = $this->m_departemen->Simpan('master_departemen', $data);
		if($result == 1)
		{
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'departemen');
		}else
		{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_ul().'departemen');
		}					
	 }

	function editdepartemen($kode=0)
	{
		$this->load->model('m_departemen');
		$data_departemen = $this->m_departemen->AmbilDatadepartemen("where id_depar ='$kode'")->result_array();
	
		$data = array
		(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),			
			'id_depar' =>  $data_departemen[0]['id_depar'],			
			'kode_depar' => $data_departemen[0]['kode_depar'],
			'nama_depar' =>  $data_departemen[0]['nama_depar'],	
			'email' =>  $data_departemen[0]['email'],	
			'updateby' => $data_departemen[0]['updateby'],		
			'data_departemen' => $this->m_departemen->AmbilDatadepartemen("where id_depar = '$kode' order by id_depar asc")->result_array()			
		);
		
		$this->template->Display('departemen/edit_dept',$data);
		//$this->load->view('departemen/edit_dept', $data);
	}
	
	function updatedepartemen()
	{
		$data = array
		(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
		);
			
		$this->load->model('m_departemen');
		$id_depar = $_POST['id_depar'];
		$nama_depar = $_POST['nama_depar'];
		$kode_depar = $_POST['kode_depar'];	
		$email = $_POST['email'];									
		$userlog = ($this->session->userdata('nama'));
			
		date_default_timezone_set("Asia/Jakarta");
        $waktusaatini =date("d-m-Y H:i:s");	
		$waktuini =date("m-Y");	

        $data = array
		(		
			'id_depar' =>$id_depar,
			'nama_depar' =>$nama_depar,
			'kode_depar' =>$kode_depar,	
			'email' =>$email,		
			'updateby' => $userlog ,
			'updatedate' => $waktusaatini,		
		);
			
		$where =array
		( 
			'id_depar' => $id_depar,
	    );
		
		$res = $this->m_departemen->Updatedepartemen($data);
		if($res>=0)
		{
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'departemen');
		}else
		{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'departemen');
		}		
	}

	function hapusdepartemen($id_depar = 1)
	{	
		//$this->load->model('m_komponenbiaya');
		$result = $this->model->Hapus('master_departemen', array('id_depar' => $id_depar));
		if($result == 1)
		{
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'departemen');
		}else
		{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'departemen');
		}
	}
}

