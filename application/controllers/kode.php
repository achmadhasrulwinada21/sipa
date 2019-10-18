<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kode extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),			
			'data_kode' => $this->model->GetKode("order by idkode desc")->result_array()
		);

		$this->template->display('kode/data_kode', $data);
	}

	function addkode()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),			
			'idkode' => $this->model->GetKode()->result_array(),
		);
		
		$this->template->display('kode/add_kode', $data);
	}

	function savedata(){

		$idkode = '';
		$jabatan = $_POST['jabatan'];
		$kodettd = $_POST['kodettd'];			

		$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
       // $waktu =date("d-m-Y H:i:s");
       $waktu = date("Y-m-d H:i:s");  

		$data = array(	

			'jabatan' => $jabatan,
			'kodettd' => $kodettd,
			//'createdate' => $waktu,
			'createby' =>  $this->session->userdata('nama'),	
			);

		
		$result = $this->model->Simpan('master_kode', $data);
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data user BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'kode');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'kode');
		}		
	}

	function editkode($kode=0){

	$data_kode = $this->model->AmbilDataKode("where idkode ='$kode'")->result_array();



	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),			
		'idkode' =>  $data_kode[0]['idkode'],
		'jabatan' => $data_kode[0]['jabatan'],
		'kodettd' => $data_kode[0]['kodettd'],
		'createdate' =>  $data_kode[0]['createdate'],

		'data_kode' => $this->model->AmbilDataKode("where idkode = '$kode' order by idkode asc")->result_array()
			
	);

	
	$this->template->display('kode/edit_kode', $data);

	// 	// echo $data_user[0]['nama_user'];

	}


	function updatekode(){

	
	 	$idkode=$_POST['idkode'];
		$jabatan = $_POST['jabatan'];
		$kodettd = $_POST['kodettd'];		
		
		$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
       // $waktu =date("d-m-Y H:i:s");
           $waktu =date("Y-m-d H:i:s");


		$data = array(	

                        'idkode'=> $idkode,
			'jabatan' => $jabatan,
			'kodettd' => $kodettd,
			'updatedate' => $waktu,
			'updateby' =>  $this->session->userdata('nama'),
					
			);

	$hasil = $this->model->UpdateKode($data);
	if($hasil>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'kode');
	}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'kode');
		}
	}

	function hapuskode($id = 1){
		
		$result = $this->model->Hapus('master_kode', array('idkode' => $id));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'kode');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'kode');
		}
	}
}

