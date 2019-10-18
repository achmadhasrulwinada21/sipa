<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supplier extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$data = array(
			
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),			
			'data_supplier' => $this->model->GetSupplier("order by id_supplier desc")->result_array()
		);

		$this->template->Display('supplier/data_supplier', $data);
	}

	function addsupplier()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),			
			'cabang' => $this->session->userdata('cabang'),	
			'kode_supplier' => $this->model->GetSupplier()->result_array(),
			// 'nama_supplier' => $this->model->GetSupplier()->result_array()
		);
		
		$this->template->Display('supplier/add_supplier', $data);
	}

	function savedata(){

		$id_supplier = '';
		$kode_supplier = $_POST['kode_supplier'];	
		$nama_supplier = $_POST['nama_supplier'];
		$alamat = $_POST['alamat'];
		$no_tlp = $_POST['no_tlp'];
		$email = $_POST['email'];

		$dt = new DateTime();

		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d-m-Y H:i:s");

		$data = array(	
			// 'id_uraian'=> $id_uraian,
			'kode_supplier' => $kode_supplier,
			'nama_supplier' => $nama_supplier,
			'alamat' => $alamat,
			'no_tlp' => $no_tlp,
			'email' => $email,
			'createdate' => $waktu,
			'createby' =>  $this->session->userdata('nama'),
			
			);
		
		$result = $this->model->Simpan('master_supplier', $data);
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'supplier');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'supplier');
		}		
	}

	function editsupplier($kode=0){

	$data_supplier = $this->model->AmbilDataSupplier("where id_supplier ='$kode'")->result_array();


	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),			
		'id_supplier' =>  $data_supplier[0]['id_supplier'],
		'kode_supplier' =>  $data_supplier[0]['kode_supplier'],
		'nama_supplier' =>  $data_supplier[0]['nama_supplier'],
		'alamat' =>  $data_supplier[0]['alamat'],
		'no_tlp' =>  $data_supplier[0]['no_tlp'],
		'email' =>  $data_supplier[0]['email'],
		'data_supplier' => $this->model->AmbilDataSupplier("where id_supplier = '$kode' order by id_supplier asc")->result_array()
			
	);

	
	$this->template->Display('supplier/edit_supplier', $data);


	}


	function updatesupplier(){
	
	$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d-m-Y H:i:s");  

	$data = array(
	'id_supplier' =>$this->input->post('id_supplier'),
	'kode_supplier' =>$this->input->post('kode_supplier'),
	'nama_supplier' => $this->input->post('nama_supplier'),
	'alamat' => $this->input->post('alamat'),
	'no_tlp' => $this->input->post('no_tlp'),
	'email' => $this->input->post('email'),
	'updatedate' => $waktu,
	'updateby' =>  $this->session->userdata('nama'),
	);

	$hasil = $this->model->UpdateSupplier($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'supplier');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'supplier');
	}
	}

	function hapussupplier($kode = 1){
		
	$result = $this->model->Hapus('master_supplier', array('id_supplier' => $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'supplier');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'supplier');
	}
	}
}

