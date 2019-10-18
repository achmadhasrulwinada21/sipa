<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KinerjaRuSak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{

		$kodeadmin=($this->session->userdata('nama_role'));
		$koders=($this->session->userdata('namars'));

		if($kodeadmin=='Marketing Rumah Sakit'){

		$this->load->model('kinerjars');
		
		$data = array(
			
			'nama' => $this->session->userdata('nama'),
			'cabang' => $this->session->userdata('cabang'),	
            'namars' => $this->session->userdata('namars'),	
            'nama_user' => $this->session->userdata('nama_user'),		
			'data_krs' => $this->kinerjars->AmbilKinerjaRS("where nama_rs ='$koders' order by id_krs desc")->result_array(),
			
		);
		

		 $this->template->Display('kinerjars/data_krs', $data);

	}elseif($kodeadmin=='Manager Marketing Rumah Sakit') {
		$this->load->model('kinerjars');
		$data = array(
			
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
           	'namars' => $this->session->userdata('namars'),
			'data_krsm' => $this->kinerjars->AmbilKinerjaRS("where nama_rs ='$koders' order by id_krs desc")->result_array(),
			'nama_user' => $this->session->userdata('nama_user'),	
			
		);
		

		$this->template->Display('kinerjars/data_krsm', $data);

	
	}elseif($kodeadmin=='Direktur Operasional dan Umum') {
		$this->load->model('kinerjars');
		$data = array(
			
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
           	'namars' => $this->session->userdata('namars'),						
			'data_krsd' => $this->kinerjars->getKrs("order by periode desc")->result_array(),
			'nama_user' => $this->session->userdata('nama_user'),	
			
		);
		

		$this->template->Display('kinerjars/data_krsd', $data);

	}
	
}


	function addkrs()
	{
		$this->load->model('kinerjars');
		
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'namars' => $this->session->userdata('namars'),
			'nama_user' => $this->session->userdata('nama_user'),
			'foto' => $this->session->userdata('foto'),

			

		);

		
		$this->template->Display('kinerjars/add_krs', $data);
	}

	function savedata(){
		$this->load->model('kinerjars');
		$dt = new DateTime();

		date_default_timezone_set("Asia/Jakarta");

		// $id_krs = '';
		$waktu = date("d M Y H:i:s");
		$waktus = date("Ym");
		$nama_rs = $_POST['nama_rs'];
		$uraian_rsk = $_POST['uraian_rsk'];
		$target_rsk = $_POST['target_rsk'];	
		$real_rsk = $_POST['real_rsk'];	
		
		
		$data = array();
        for ($i = 0; $i < count($this->input->post('uraian_rsk')); $i++)
        	 {
           $data[$i] = array(
               'periode' => $waktus,
               'nama_rs' => $nama_rs,
               'uraian_rsk' => $uraian_rsk[$i],
               'target_rsk' => $target_rsk[$i],
               'real_rsk' => $real_rsk[$i],
               
               'createddate' => $waktu,

               'createdby' => $this->session->userdata('nama'),
            );
       }
        

		 echo json_encode($data);
		
		
		$result = $this->kinerjars->Simpan($data);
		
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data user BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'kinerjarusak');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-success'><strong>Simpan data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'kinerjarusak');
		}		
	}


	

	function editkrs($kode=0){

		$kodeadmin=($this->session->userdata('nama_role'));


		if($kodeadmin=='Marketing Rumah Sakit'){
	$this->load->model('kinerjars');
	
	$data_abk = $this->kinerjars->AmbilKinerjaRS("where id_krs ='$kode'")->result_array();


	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'namars' => $this->session->userdata('namars'),
		'nama_user' => $this->session->userdata('nama_user'),
		'foto' => $this->session->userdata('foto'),
		'id_krs' => $data_abk[0]['id_krs'],
		'nama_rs' => $data_abk[0]['nama_rs'],	
		'periode' => $data_abk[0]['periode'],		
		'uraian_rsk' => $data_abk[0]['uraian_rsk'],
		'target_rsk' => $data_abk[0]['target_rsk'],
		'real_rsk' =>  $data_abk[0]['real_rsk'],	
		
		
		'data_krs' => $this->kinerjars->AmbilKinerjaRS("where id_krs = '$kode' order by id_krs asc")->result_array()
			
	);

	
	$this->template->Display('kinerjars/edit_krs', $data);

	
	}else{

		$this->load->model('kinerjars');
		$data_abk = $this->kinerjars->AmbilKinerjaRS("where id_krs ='$kode'")->result_array();
		$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'nama_user' => $this->session->userdata('nama_user'),
		'foto' => $this->session->userdata('foto'),
		'id_krs' => $data_abk[0]['id_krs'],
		'nama_rs' => $data_abk[0]['nama_rs'],	
		'periode' => $data_abk[0]['periode'],		
		'uraian_rsk' => $data_abk[0]['uraian_rsk'],
		'target_rsk' => $data_abk[0]['target_rsk'],
		'real_rsk' =>  $data_abk[0]['real_rsk'],	
		
		
		'data_krs1' => $this->kinerjars->AmbilKinerjaRS("where id_krs = '$kode' order by id_krs asc")->result_array()
			
	);

	
	$this->template->Display('kinerjars/edit_krsm', $data);
	}
}

	function updatekrs(){


	$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d M Y H:i:s");
        $waktus =date("Ym");

   
	$data = array(
	'id_krs' =>$this->input->post('id_krs'),
	'periode' =>$waktus,
	//'nama_rs' =>$this->input->post('nama_rs'),
	'uraian_rsk' =>$this->input->post('uraian_rsk'),
	'target_rsk' => $this->input->post('target_rsk'),
	'real_rsk' =>$this->input->post('real_rsk'),
	

	'updatedby' =>  $this->session->userdata('nama'),
	'updateddate' =>  $waktu,
	
	);
	$this->load->model('kinerjars');
	$hasil = $this->kinerjars->UpdateKinerja($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'kinerjarusak');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'kinerjarusak');
	}
	}

	function hapuskrs($kode = 1){
	$this->load->model('kinerjars');	
	$result = $this->kinerjars->Hapus('kinerja_rs', array('id_krs' => $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'kinerjarusak');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'kinerjarusak');
	}
	}
}

