<?php 
class Tipeproduk extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	 function index()
	{
		$this->load->model('tipeprodukm');
		$data = array(
			
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),			
			'datatipe_produk' => $this->tipeprodukm->Getproduk("order by idpro asc")->result_array(),
			'id_tipe_produk' => $this->tipeprodukm->code_otomatis(),
		);

		$this->template->display('tipeproduk/datatipe_produk', $data);
	}

	function addkon()
	{
		$this->load->model('tipeprodukm');

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			'id_tipe_produk' => $this->tipeprodukm->code_otomatis(),			
		);
		
		$this->template->display('tipeproduk/addtipe_produk', $data);
	}

	function savedata(){

		$id_tipe_produk = $_POST['id_tipe_produk'];	
		$tipe_produk = $_POST['tipe_produk'];
		$dt = new DateTime();

		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("Y-m-d H:i:s");

		$data = array(	
			
			'id_tipe_produk' => $id_tipe_produk,
			'tipe_produk' => $tipe_produk,
			'createdate' => $waktu,
			'createby' =>  $this->session->userdata('nama'),
			
			);
		
		$result = $this->model->Simpan('master_tipe_produk', $data);
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'tipeproduk');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'tipeproduk');
		}		
	}

	function edittipeproduk($kode=0){
       $this->load->model('tipeprodukm');
	$data_bank = $this->tipeprodukm->Getproduk("where idpro ='$kode'")->result_array();


	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),			
		'idpro' =>  $data_bank[0]['idpro'],
		'id_tipe_produk' => $data_bank[0]['id_tipe_produk'],
		'tipe_produk' =>  $data_bank[0]['tipe_produk'],	
		
			
	);

	
	$this->template->display('tipeproduk/edittipe_produk', $data);


	}


	function updateproduk(){
	 $this->load->model('tipeprodukm');
	$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("Y-m-d H:i:s");  

	$data = array(
	'idpro' =>$this->input->post('idpro'),
	'id_tipe_produk' =>$this->input->post('id_tipe_produk'),
	'tipe_produk' => $this->input->post('tipe_produk'),
	'updatedate' => $waktu,
	'updateby' =>  $this->session->userdata('nama'),
	);

	$hasil = $this->tipeprodukm->Updateproduk($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'tipeproduk');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'tipeproduk');
	}
	}

	function hapusproduk($kode = 1){
		 $this->load->model('tipeprodukm');
	$result = $this->tipeprodukm->Hapus('master_tipe_produk', array('idpro' => $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'tipeproduk');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'tipeproduk');
	}
	}
}

