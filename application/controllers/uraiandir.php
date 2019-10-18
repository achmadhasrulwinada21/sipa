<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uraiandir extends CI_Controller {

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

	public function index()
	{
		$this->load->model('eksdir');
		$data = array(
			
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),			
			'data_uraiandir' => $this->eksdir->GetUraian2("order by id_uraian desc")->result_array()
		);

	
		$this->template->display('uraiandir/data_uraiandir', $data);
	}

	function adduraiandir()
	{
		$this->load->model('eksdir');
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),			
			'cabang' => $this->session->userdata('cabang'),	
			'kd_uraian' => $this->eksdir->GetUraian2()->result_array(),
			'nama_uraian' => $this->eksdir->GetUraian2()->result_array()
		);
		
		$this->load->view('uraiandir/add_uraiandir', $data);
	}

	function savedata(){
		$this->load->model('eksdir');
		$id_uraian = '';
		$nama_uraian = $_POST['nama_uraian'];
		$kd_uraian = $_POST['kd_uraian'];		
		// $cdate = $_POST['cdate'];
		$dt = new DateTime();

		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d-m-Y H:i:s");
		$nourut_layout = $_POST['nourut_layout'];


		$data = array(	
			// 'id_uraian'=> $id_uraian,
			'nama_uraian' => $nama_uraian,
			'kd_uraian' => $kd_uraian,
			'cdate' => $waktu,
			'nourut_layout' => $nourut_layout,
			'createby' =>  $this->session->userdata('nama'),
			
			);
		
		$result = $this->eksdir->Simpan('master_uraian2', $data);
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data user BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'uraiandir');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'uraiandir');
		}		
	}

	function edituraianeksdir2($kode=0){
	$this->load->model('eksdir');
	$data_uraian = $this->eksdir->AmbilDataUraian2("where id_uraian ='$kode'")->result_array();


	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),			
		'id_uraian' =>  $data_uraian[0]['id_uraian'],
		'nourut_layout' => $data_uraian[0]['nourut_layout'],
		'nama_uraian' =>  $data_uraian[0]['nama_uraian'],	
		'kd_uraian' => $data_uraian[0]['kd_uraian'],
		'data_uraian' => $this->eksdir->AmbilDataUraian2("where id_uraian = '$kode' order by id_uraian asc")->result_array()
			
	);

	
	$this->template->display('uraiandir/edit_uraiandir', $data);

	

	}


	function updateuraiandir(){
	$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d-m-Y H:i:s");

	$data = array(
	'id_uraian' =>$this->input->post('id_uraian'),
	'nourut_layout' =>$this->input->post('nourut_layout'),
	'nama_uraian' => $this->input->post('nama_uraian'),
	'kd_uraian' =>$this->input->post('kd_uraian'),
	'mdate' => $waktu,
	'updateby' =>  $this->session->userdata('nama'),
	);
	$this->load->model('eksdir');
	$hasil = $this->eksdir->UpdateUraian2($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'uraiandir');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'uraiandir');
	}
	}

	function hapusuraiandir($kode = 1){
	$this->load->model('eksdir');	
	$result = $this->eksdir->Hapus('master_uraian2', array('id_uraian' => $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'uraiandir');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'uraiandir');
	}
	}
}

