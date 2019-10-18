<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_realkinerja extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('u_name')){
		$this->session->set_flashdata("alerts", "<div class='alerts alert-danger'><strong>Sesi Anda Telah Habis, Silahkan login kembali..</strong></div>");
			redirect('dashboard');

		}
	}

	public function index()
	{

		$kodeadmin=($this->session->userdata('nama_role'));
		$koders=($this->session->userdata('koders'));
		$nmrs = trim($koders);

		if($kodeadmin=='Marketing Rumah Sakit'){

		

		$this->load->model('m_kinerja');
		
		$data = array(
			
			'nama' => $this->session->userdata('nama'),
			'cabang' => $this->session->userdata('cabang'),	
            'namars' => $this->session->userdata('namars'),	
            'nama_user' => $this->session->userdata('nama_user'),		
			'data_realkrs' => $this->m_kinerja->AmbilRealKRS("where kode_rs ='$nmrs' order by id_realkrs desc")->result_array(),
			'data_real2krs' => $this->m_kinerja->AmbilReal2KRS("where kode_rs ='$nmrs' order by tanggal desc")->result_array(),
			'get_rs' => $this->m_kinerja->GetRS("order by koders desc")->result_array(),
			'get_uraian' => $this->m_kinerja->GetUraianKRS("order by id_uraiankrs desc"),
			'get_target' => $this->m_kinerja->GetTargetKRS("where kode_rs = '$koders' order by id_targetkrs asc"),

			'get_chart' => $this->m_kinerja->AmbilChartKRS("where kode_rs ='$nmrs' order by id_realkrs desc")->result_array(),
			
			
		);
		

		 $this->template->Display('v_kinerja/form_datarealkinerja', $data);
		}
	}


	function addrealkrs()
	{
		$koders=($this->session->userdata('koders'));

		$nmrs = trim($koders); 
		$this->load->model('m_kinerja');
		
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'namars' => $this->session->userdata('namars'),
			'nama_user' => $this->session->userdata('nama_user'),
			'foto' => $this->session->userdata('foto'),
			'get_rs' => $this->m_kinerja->GetRS("order by koders desc")->result_array(),
			'get_uraian' => $this->m_kinerja->GetUraianKRS("order by id_uraiankrs desc"),
			'get_target' => $this->m_kinerja->GetTargetKRS("where kode_rs = '$nmrs' order by id_targetkrs asc"),

		);

		
		$this->template->Display('v_kinerja/add_realkrs', $data);
	}

	

	function savedata(){
		$this->load->model('m_kinerja');

		// $this->load->library('form_validation');

		// $this->form_validation->set_rules('createddate','createddate', 'trim|required|is_unique[tb_realkrs.createddate]');

		// $this->form_validation->set_message('required', '%s sudah terisi data !');
		// $this->form_validation->set_message('exist_kode','%s sudah ada di database, pilih tanggal yang lain');

		// if ($this->form_validation->run()==TRUE) {
		
			
		$dt = new DateTime();

		date_default_timezone_set("Asia/Jakarta");

		// $id_krs = '';
		$waktu = date("Y m d H:i:s");
		$waktus = date("Y");
		$nama_rs = $_POST['nama_rs'];
		$kode_rs = $_POST['kode_rs'];
		$tanggal = $_POST['tanggal'];
		$nama_uraiankrs	= $_POST['nama_uraiankrs'];
		$nilai_real = $_POST['nilai_real'];
		$nilai_target = $_POST['nilai_target'];
		$nilai_targeth = $_POST['nilai_targeth'];
		$nilai_targetm = $_POST['nilai_targetm'];
		$nilai_targetb = $_POST['nilai_targetb'];
		
		// $nilai_targeth = $nilai_target/365;	
		// $nilai_targetm = $nilai_target/52;
		// $nilai_targetb = $nilai_target/12;

			

		$datatgl = $this->m_kinerja->AmbilRealKRS("where tanggal='$tanggal' and kode_rs='$kode_rs'")->result_array();


		$data = array();
		for ($i = 0; $i < count($this->input->post('nilai_real')); $i++)
        	 {
        	 	
		$data[$i] = array(           
               'tanggal' => $tanggal,
               'nama_rs' => $nama_rs,
               'kode_rs' => $kode_rs,
               'nama_uraiankrs' => $nama_uraiankrs[$i],
               'nilai_real' => $nilai_real[$i],
               'nilai_target' => $nilai_target[$i],
               'nilai_targeth' => $nilai_targeth[$i],
               'nilai_targetm' => $nilai_targetm[$i],
               'nilai_targetb' => $nilai_targetb[$i],
               
               
               
               'createddate' => $waktu,

               'createdby' => $this->session->userdata('nama'),
            );
       }

       // echo json_encode($data);
       
        
        	$tgl = isset($datatgl[0]['tanggal']);
			$nrs = isset($datatgl[0]['kode_rs']);

		if($tgl == $tanggal && $nrs == $kode_rs){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Data pada Tanggal tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'C_realkinerja');
		}else{
		 
		
		$result = $this->m_kinerja->Simpanreal($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data user BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'C_realkinerja');
		}

		
			
		// }else{
		// 	$this->session->set_flashdata("alert", "<div class='alert alert-success'><strong>Simpan data BERHASIL di lakukan</strong></div>");
		// 	header('location:'.base_url().'c_realkinerja');
		
		// }else{
		// 	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Tanggal ini Sudah Terisi data</strong></div>");
		// 	header('location:'.base_url().'c_realkinerja');
		// }		
	
	}


	

	function editrealkrs($kode=0){

		$kodeadmin=($this->session->userdata('nama_role'));


	$this->load->model('m_kinerja');
	
	$data_abk = $this->m_kinerja->AmbilRealKRS("where id_realkrs ='$kode'")->result_array();


	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'namars' => $this->session->userdata('namars'),
		'nama_user' => $this->session->userdata('nama_user'),
		'foto' => $this->session->userdata('foto'),
		'id_realkrs' => $data_abk[0]['id_realkrs'],
		'nama_rs' => $data_abk[0]['nama_rs'],
		'kode_rs' => $data_abk[0]['kode_rs'],	
		'tanggal' => $data_abk[0]['tanggal'],
			
		'nilai_real' => $data_abk[0]['nilai_real'],
		'nilai_target' => $data_abk[0]['nilai_target'],
		'nilai_targeth' => $data_abk[0]['nilai_targeth'],
		'nilai_targetm' => $data_abk[0]['nilai_targetm'],
		'nilai_targetb' => $data_abk[0]['nilai_targetb'],
		'nama_uraiankrs' =>  $data_abk[0]['nama_uraiankrs'],	
		
		
		'data_realkrs' => $this->m_kinerja->AmbilRealKRS("where id_realkrs = '$kode' order by id_realkrs asc")->result_array()
			
		);

	
		$this->template->Display('v_kinerja/edit_realkrs', $data);

	}

	function updaterealkrs(){


	$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("Y m d");
        $waktus =date("Y");
        $tanggal = $_POST['tanggal'];
        $kode_rs = $_POST['kode_rs'];
   
	$data = array(
	'id_realkrs' =>$this->input->post('id_realkrs'),
	'tanggal' => $tanggal,
	'nama_rs' =>$this->input->post('nama_rs'),
	'kode_rs' =>$kode_rs,
	'nama_uraiankrs' =>$this->input->post('nama_uraiankrs'),
	'nilai_real' =>$this->input->post('nilai_real'),
	'nilai_target' =>$this->input->post('nilai_target'),
	'nilai_targeth' =>$this->input->post('nilai_targeth'),
	'nilai_targetm' =>$this->input->post('nilai_targetm'),
	'nilai_targetb' =>$this->input->post('nilai_targetb'),
	
	

	'updatedby' =>  $this->session->userdata('nama'),
	'updateddate' =>  $waktu,
	
	);
	$this->load->model('m_kinerja');
	$hasil = $this->m_kinerja->UpdateRealKRS($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'C_realkinerja/tampil/'.$tanggal.'/'.$kode_rs.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'C_realkinerja/tampil/'.$tanggal.'/'.$kode_rs.'');
	}
	}

	function hapusrealkrs($kode = 1){
	$this->load->model('m_kinerja');	
	$result = $this->m_kinerja->Hapus('tb_realkrs', array('id_realkrs' => $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'C_realkinerja/tampil/'.$tanggal.'/'.$kode_rs.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'C_realkinerja/tampil/'.$tanggal.'/'.$kode_rs.'');
	}
	}

	function tampil($tanggal=0,$kode_rs=0)
	{
		$this->load->model('m_kinerja');

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			
			 'data_abks' => $this->m_kinerja->AmbilRealKRS("where tanggal= '$tanggal' and kode_rs='$kode_rs' order by tanggal asc")->result_array(),
			 'data_realkrs' => $this->m_kinerja->AmbilRealKRS("where tanggal= '$tanggal' and kode_rs='$kode_rs' order by tanggal asc")->result_array(),
			
);
		$this->template->display('v_kinerja/data_realkrs', $data);
	}


	function chart()
	{
		$this->load->model('m_kinerja');

		$data = array(
			'get_chart' => $this->m_kinerja->AmbilChartKRS("order by tanggal desc")->result_array(),
);
		$this->template->display('chart', $data);
	}



	function hapusdatareal($pwaktu=0,$cbgrs=0){

		// $cbgrs = $this->input->post('cabangrs');
		// $pwaktu =  $_POST['periode'];
		$this->load->model('m_kinerja');
		
		$result = $this->m_kinerja->Hapusreal('tb_realkrs', array('kode_rs' => $cbgrs,'tanggal' => $pwaktu));
	
			if($pwaktu=='' ){

			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan.Terima Kasih.</strong></div>");
			header('location:'.base_url().'C_realkinerja');

		}else{
				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'C_realkinerja');
		}
	}
}

