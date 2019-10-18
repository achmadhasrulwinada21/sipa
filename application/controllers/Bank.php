<?php 
class Bank extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	 function index()
	{
		$data = array(
			
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),			
			'data_bank' => $this->model->GetBank("order by id_bank desc")->result_array()
		);

		$this->template->display('bank/data_bank', $data);
	}

	function addbank()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),			
			'kode_bank' => $this->model->GetBank()->result_array(),
			'nama_bank' => $this->model->GetBank()->result_array()
		);
		
		$this->template->display('bank/add_bank', $data);
	}

	function savedata(){

		$id_bank = '';
		$kode_bank = $_POST['kode_bank'];	
		$nama_bank = $_POST['nama_bank'];
		$dt = new DateTime();

		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("Y-m-d H:i:s");

		$data = array(	
			// 'id_uraian'=> $id_uraian,
			'kode_bank' => $kode_bank,
			'nama_bank' => $nama_bank,
			'createdate' => $waktu,
			'createby' =>  $this->session->userdata('nama'),
			
			);
		
		$result = $this->model->Simpan('master_bank', $data);
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'Bank');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Bank');
		}		
	}

	function editbank($kode=0){

	$data_bank = $this->model->AmbilDataBank("where id_bank ='$kode'")->result_array();


	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),			
		'id_bank' =>  $data_bank[0]['id_bank'],
		'kode_bank' => $data_bank[0]['kode_bank'],
		'nama_bank' =>  $data_bank[0]['nama_bank'],	
		'data_bank' => $this->model->AmbilDataBank("where id_bank = '$kode' order by id_bank asc")->result_array()
			
	);

	
	$this->template->display('bank/edit_bank', $data);


	}


	function updatebank(){
	
	$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("Y-m-d H:i:s");  

	$data = array(
	'id_bank' =>$this->input->post('id_bank'),
	'kode_bank' =>$this->input->post('kode_bank'),
	'nama_bank' => $this->input->post('nama_bank'),
	'updatedate' => $waktu,
	'updateby' =>  $this->session->userdata('nama'),
	);

	$hasil = $this->model->UpdateBank($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'Bank');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'Bank');
	}
	}

	function hapusbank($kode = 1){
		
	$result = $this->model->Hapus('master_bank', array('id_bank' => $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'Bank');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'Bank');
	}
	}
}

