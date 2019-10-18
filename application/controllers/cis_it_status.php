<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cis_it_status extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->model('CisStatusM');
		$this->load->model('ITModel');
	}
	
	public function index()
	{
		
		$idfor_post_array = array($kode=0);
		foreach($this->CisStatusM->AmbilDataCisStatus("where id_status = '$kode'")->result_array() as $role){
			$idfor_post_array[] = $role['kode_role'];
		}
		
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
			'data_status_cis' => $this->CisStatusM->GetStatusCis()->result_array(),
			'namadept' => $this->ITModel->GetNamaDept()->result_array(),
			'koderoles' => $this->CisStatusM->GetKodeDept()->result_array(),
			//'optformulir' => $this->CisStatusM->GetKodeDept()->result_array(),
			'idfor_post' => $idfor_post_array,
		);
		
		$this->template->Display('cisstatusit/data_status',$data);
	}

	function add(){
		
		$this->load->model('detbarangm');
		
		$koderole=($this->session->userdata('koderole'));
		$dept = ($this->session->userdata('nama_role'));
		$nama_role = ($this->session->userdata('nama_role'));
		
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
			//'optcis' => $this->CisStatusM->AmbilDataCisStatus()->result_array(),
			'optrole' => $this->model->GetRole()->result_array(),
			//'status' => $this->model->GetStat()->result_array(),
			//'optformulir' => $this->CisStatusM->AmbilDataFormulir()->result_array(),
		);	
			
		$this->template->Display('cisstatusit/add_status',$data);
	}
	

	function savedata(){		
		$this->load->model('CisStatusM');
		
			$kode_role = $_POST['kode_role'];
			$status = $_POST['status'];
			$nama_cis = $_POST['nama_cis'];
			$mengetahui = $_POST['mengetahui'];
			$menyetujui = $_POST['menyetujui'];
			//$ttd_menyetujui = $_POST['ttd_menyetujui'];
			
			$userlog = ($this->session->userdata('nama')
			);
			
			date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("d-m-Y H:i:s");	
			
			$data = array(
			'kode_role' =>$kode_role,
			'status' =>$status,
			'nama_cis' =>$nama_cis,
			'mengetahui' =>$mengetahui,
			'menyetujui' =>$menyetujui,
			//'ttd_menyetujui' =>$ttd_menyetujui,
			'createdby' => $userlog ,
			'createddate' => $waktusaatini,
			);
					
				$result = $this->CisStatusM->Simpan('cisstatusit', $data);
				if($result == 1){
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan Data BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'cis_it_status');
				}else{
					$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan Data GAGAL di lakukan</strong></div>");
					header('location:'.base_ul().'cis_it_status');
		}
	}


	function edit($kode=0){
		
	$this->load->model('CisStatusM');
	
	$tampung = $this->CisStatusM->AmbilDataCisStatus("where id_status ='$kode'")->result_array();
	
	$role_post_array = array();
		foreach($this->CisStatusM->AmbilDataCisStatus("where id_status = '$kode'")->result_array() as $role){
			$role_post_array[] = $role['kode_role'];
	}
	
	$for_ttdmenger = array();
		foreach($this->CisStatusM->AmbilDataCisStatus("where id_status = '$kode'")->result_array() as $role){
			$for_ttdmenger[] = $role['ttd_mengetahui'];
		}
		
	$for_menyetujui = array();
		foreach($this->CisStatusM->AmbilDataCisStatus("where id_status = '$kode'")->result_array() as $role){
			$for_menyetujui[] = $role['ttd_menyetujui'];
	}
	
	
	$roles = ($this->session->userdata('nama_role'));
	$namaroles = ($this->session->userdata('nama'));
	
	
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),
			'foto' => $this->session->userdata('foto'),
			'id_status' => $tampung[0]['id_status'],
			'kode_role' => $tampung[0]['kode_role'],
			'status' => $tampung[0]['status'],
			'nama_cis' => $tampung[0]['nama_cis'],
			'mengetahui' => $tampung[0]['mengetahui'],
			'menyetujui' => $tampung[0]['menyetujui'],
			'ttd_mengetahui' => $tampung[0]['ttd_mengetahui'],
			'ttd_menyetujui' => $tampung[0]['ttd_menyetujui'],
			'tanggal' => $tampung[0]['tanggal'],
			'role' => $this->model->GetRole()->result_array(),
			'role_post' => $role_post_array,
			'idmengetahui' => $this->CisStatusM->AmbilDataTTDMengetahui("where role='$roles' AND nama_user='$namaroles'")->result_array(),
			'for_ttdmengetahui' => $for_ttdmenger,
			'idmenyetujui' => $this->CisStatusM->AmbilDataTTDMengetahui("where role='$roles' AND nama_user='$namaroles'")->result_array(),
			'for_ttdmenyetujui' => $for_menyetujui,
			);	
			
		$this->template->Display('cisstatusit/edit_status',$data);	
	}


	function Update(){	
		$this->load->model('CisStatusM');
		
		$id_status = $_POST['id_status'];
		$kode_role = $_POST['kode_role'];
        $status = $_POST['status'];
        $nama_cis = $_POST['nama_cis'];
		$mengetahui = $_POST['mengetahui'];
		$menyetujui = $_POST['menyetujui'];
        $ttd_mengetahui = $_POST['ttd_mengetahui'];
        $ttd_menyetujui = $_POST['ttd_menyetujui'];
        $tanggal = $_POST['tanggal'];
       
			
		
		$userlog = ($this->session->userdata('nama')
			);
			
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");	
		//$ttdapprovekadept =date("d-m-Y");
		
        $data = array(
			'id_status' => $this->input->post('id_status'),
			'kode_role' => $this->input->post('kode_role'),
			'status' => $this->input->post('status'),
			'nama_cis' => $this->input->post('nama_cis'),
			'mengetahui' => $this->input->post('mengetahui'),
			'menyetujui' => $this->input->post('menyetujui'),
			'ttd_mengetahui' => $this->input->post('ttd_mengetahui'),
			'ttd_menyetujui' => $this->input->post('ttd_menyetujui'),
			'tanggal' => $this->input->post('tanggal'),
			'updatedby' => $userlog ,
			'updateddate' => $waktusaatini,
			//'tanggal' => $ttdapprovekadept,
			);
			
		$where =array( 
			'id_status' => $id_status,

			);
		
		$res = $this->CisStatusM->Update($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update Data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'cis_it_status');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update Data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'cis_it_status');
		}
	}

		function hapus($id_status = 1){
		$this->load->model('CisStatusM');
		$result = $this->CisStatusM->Hapus('cisstatusit', array('id_status' => $id_status));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus Data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'cis_it_status');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus Data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'cis_it_status');
		}
	}
	
}