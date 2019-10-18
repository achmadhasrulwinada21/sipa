<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Uraian extends CI_Controller {

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
		$data = array(
			
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),			
			'data_uraian' => $this->model->GetUraian("order by id_uraian desc")->result_array()
		);

		$this->template->display('uraian/data_uraian', $data);
	}

	function adduraian()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),			
			'cabang' => $this->session->userdata('cabang'),	
			'kd_uraian' => $this->model->GetUraian()->result_array(),
			'nama_uraian' => $this->model->GetUraian()->result_array()
		);
		
		$this->template->display('uraian/add_uraian', $data);
	}

	function savedata(){

		$id_uraian = '';
		$nama_uraian = $_POST['nama_uraian'];
		$kd_uraian = $_POST['kd_uraian'];		
		// $cdate = $_POST['cdate'];
		$nourut_layout = $_POST['nourut_layout'];

		$dt = new DateTime();

		date_default_timezone_set("Asia/Jakarta");
                //$waktu =date("d-m-Y H:i:s");

		$data = array(	
			// 'id_uraian'=> $id_uraian,
			'nama_uraian' => $nama_uraian,
			'kd_uraian' => $kd_uraian,
			//'cdate' => $waktu,
			'nourut_layout' => $nourut_layout,
			'createby' =>  $this->session->userdata('nama'),
			
			);
		
		$result = $this->model->Simpan('master_uraian', $data);
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'uraian');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'uraian');
		}		
	}

	function edituraian($kode=0){

	$data_uraian = $this->model->AmbilDataUraian("where id_uraian ='$kode'")->result_array();


	// 	$status_post_array = array();
	// 	foreach($this->model->AmbilDataUser("where id_user = '$kode'")->result_array() as $status){
	// 		$status_post_array[] = $status['status'];
	// 	}



	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),			
		'id_uraian' =>  $data_uraian[0]['id_uraian'],
		'nourut_layout' => $data_uraian[0]['nourut_layout'],
		'nama_uraian' =>  $data_uraian[0]['nama_uraian'],	
		'kd_uraian' => $data_uraian[0]['kd_uraian'],
		'data_uraian' => $this->model->AmbilDataUraian("where id_uraian = '$kode' order by id_uraian asc")->result_array()
			
	);

	
	$this->template->display('uraian/edit_uraian', $data);

	// 	// echo $data_user[0]['nama_user'];

	}


	function updateuraian(){
	
	$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("Y-m-d H:i:s");  

	$data = array(
	'id_uraian' =>$this->input->post('id_uraian'),
	'nourut_layout' =>$this->input->post('nourut_layout'),
	'nama_uraian' => $this->input->post('nama_uraian'),
	'kd_uraian' =>$this->input->post('kd_uraian'),
	'mdate' => $waktu,
	'updateby' =>  $this->session->userdata('nama'),
	);

	$hasil = $this->model->UpdateUraian($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'uraian');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'uraian');
	}
	}

	function hapusuraian($kode = 1){
		
	$result = $this->model->Hapus('master_uraian', array('id_uraian' => $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'uraian');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'uraian');
	}
	}
}

