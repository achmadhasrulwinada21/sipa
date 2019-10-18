<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_kinerja extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{

		$kodeadmin=($this->session->userdata('nama_role'));
		$koders=($this->session->userdata('namars'));

		

		$this->load->model('m_kinerja');
		
		$data = array(
			
			'nama' => $this->session->userdata('nama'),
			'cabang' => $this->session->userdata('cabang'),	
            'namars' => $this->session->userdata('namars'),	
            'nama_user' => $this->session->userdata('nama_user'),		
			'data_uraiankrs' => $this->m_kinerja->AmbilUraianKRS("order by id_uraiankrs asc")->result_array(),
			
		);
		

		 $this->template->Display('v_kinerja/data_uraiankrs', $data);

	}


	function adduraiankrs()
	{
		$this->load->model('m_kinerja');
		
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'namars' => $this->session->userdata('namars'),
			'nama_user' => $this->session->userdata('nama_user'),
			'foto' => $this->session->userdata('foto'),

			

		);

		
		$this->template->Display('v_kinerja/add_uraiankrs', $data);
	}

	function savedata(){
		$this->load->model('m_kinerja');
		$dt = new DateTime();

		date_default_timezone_set("Asia/Jakarta");

		// $id_krs = '';
		$waktu = date("d M Y H:i:s");
		$waktus = date("Ym");
		
		$kd_uraiankrs = $_POST['kd_uraiankrs'];
		$nama_uraiankrs = $_POST['nama_uraiankrs'];	
		
		
		
		$data = array();
        for ($i = 0; $i < count($this->input->post('kd_uraiankrs')); $i++)
        	 {
           $data[$i] = array(
               'periode' => $waktus,
               
               'kd_uraiankrs' => $kd_uraiankrs[$i],
               'nama_uraiankrs' => $nama_uraiankrs[$i],
               
               
               'createddate' => $waktu,

               'createdby' => $this->session->userdata('nama'),
            );
       }
        

		 echo json_encode($data);
		
		
		$result = $this->m_kinerja->Simpan($data);
		
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data user BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'C_kinerja');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-success'><strong>Simpan data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'C_kinerja');
		}		
	}


	

	function edituraiankrs($kode=0){

		$kodeadmin=($this->session->userdata('nama_role'));


	$this->load->model('m_kinerja');
	
	$data_abk = $this->m_kinerja->AmbilUraianKRS("where id_uraiankrs ='$kode'")->result_array();


	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'namars' => $this->session->userdata('namars'),
		'nama_user' => $this->session->userdata('nama_user'),
		'foto' => $this->session->userdata('foto'),
		'id_uraiankrs' => $data_abk[0]['id_uraiankrs'],
		
		'periode' => $data_abk[0]['periode'],		
		'kd_uraiankrs' => $data_abk[0]['kd_uraiankrs'],
		'nama_uraiankrs' => $data_abk[0]['nama_uraiankrs'],
			
		
		
		'data_uraiankrs' => $this->m_kinerja->AmbilUraianKRS("where id_uraiankrs = '$kode' order by id_uraiankrs asc")->result_array()
			
		);

	
		$this->template->Display('v_kinerja/edit_uraiankrs', $data);

	}

	function updateuraiankrs(){


	$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d M Y H:i:s");
        $waktus =date("Ym");

   
	$data = array(
	'id_uraiankrs' =>$this->input->post('id_uraiankrs'),
	'periode' =>$waktus,
	
	'kd_uraiankrs' =>$this->input->post('kd_uraiankrs'),
	'nama_uraiankrs' => $this->input->post('nama_uraiankrs'),
	
	

	'updatedby' =>  $this->session->userdata('nama'),
	'updateddate' =>  $waktu,
	
	);
	$this->load->model('m_kinerja');
	$hasil = $this->m_kinerja->UpdateUraianKRS($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'C_kinerja');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'C_kinerja');
	}
	}

	function hapusuraiankrs($kode = 1){
	$this->load->model('m_kinerja');	
	$result = $this->m_kinerja->Hapus('tb_uraiankrs', array('id_uraiankrs' => $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'C_kinerja');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'C_kinerja');
	}
	}
}

