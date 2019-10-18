<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_targetkinerja extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('u_name')){
		$this->session->set_flashdata("alerts", "<div class='alerts alert-danger'><strong>Sesi Anda Telah Habis, Silahkan login kembali..</strong></div>");
			redirect('dashboard');

		}
	}

	function get_koders()
		
	{
		$this->load->model('m_kinerja');
		$koders=$this->input->post('koders');
		$data=$this->m_kinerja->get_data_rs_bykode($koders);
		echo json_encode($data);
		
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
			'data_target2krs' => $this->m_kinerja->AmbilTarget2KRS("order by kode_rs asc")->result_array(),
			'data_targetkrs' => $this->m_kinerja->AmbilTargetKRS("order by id_targetkrs asc")->result_array(),
			'get_rs' => $this->m_kinerja->GetRS("order by namars desc")->result_array(),
			'get_uraian' => $this->m_kinerja->GetUraianKRS("order by id_uraiankrs desc"),
			
			
		);
		

		 $this->template->Display('v_kinerja/form_datakinerja', $data);

	}


	function addtargetkrs()
	{
		$this->load->model('m_kinerja');
		
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'namars' => $this->session->userdata('namars'),
			'nama_user' => $this->session->userdata('nama_user'),
			'foto' => $this->session->userdata('foto'),
			'get_rs' => $this->m_kinerja->GetRS("order by namars desc")->result_array(),
			'get_uraian' => $this->m_kinerja->GetUraianKRS("order by id_uraiankrs desc"),

			

		);

		
		$this->template->Display('v_kinerja/add_targetkrs', $data);
	}

	function savedata(){
		$this->load->model('m_kinerja');

		// $this->load->library('form_validation');

		// $this->form_validation->set_rules('nama_rs','nama_rs', 'trim|required|is_unique[tb_targetkrs.nama_rs]');

		// $this->form_validation->set_message('required', '%s sudah terisi data !');
		// $this->form_validation->set_message('exist_kode','%s sudah ada di database, pilih RS yang lain');

		// if ($this->form_validation->run()==TRUE) {

		$dt = new DateTime();

		date_default_timezone_set("Asia/Jakarta");

		// $id_krs = '';
		$waktu = date("Y m d H:i:s");
		$waktus = date("Y");
		
		$nama_rs = $_POST['nama_rs'];
		$kode_rs = $_POST['kode_rs'];
		$nilai_target = $_POST['nilai_target'];
		$nama_uraiankrs	= $_POST['nama_uraiankrs'];
		// $nilai_targeth = $nilai_target/365;	
		// $nilai_targetm = $nilai_target/52;
		// $nilai_targetb = $nilai_target/12;	

		$datatgl = $this->m_kinerja->AmbilTargetKRS("where periode='$waktus' and kode_rs='$kode_rs'")->result_array();



		$data = array();
		for ($i = 0; $i < count($this->input->post('nilai_target')); $i++)
        	 {
		$data[$i] = array(           
               'periode' => $waktus,
               'nama_rs' => $nama_rs,
               'kode_rs' => $kode_rs,
               'nilai_target' => $nilai_target[$i],
               'nilai_targeth' => $nilai_target[$i]/356,
               'nilai_targetm' => $nilai_target[$i]/52,
               'nilai_targetb' => $nilai_target[$i]/12,
               'nama_uraiankrs' => $nama_uraiankrs[$i],
               
               
               'createddate' => $waktu,

               'createdby' => $this->session->userdata('nama'),
            );
       }

       // echo json_encode($data);
       
        

		 
		
			$tgl = isset($datatgl[0]['periode']);
			$nrs = isset($datatgl[0]['kode_rs']);

		if($tgl == $waktus && $nrs == $kode_rs){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Data pada Periode tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'C_targetkinerja');
		}else{
		 
		
		$result = $this->m_kinerja->Simpantarget($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data user BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'C_targetkinerja');
		}
	}


	

	function edittargetkrs($kode=0){

		$kodeadmin=($this->session->userdata('nama_role'));


	$this->load->model('m_kinerja');
	
	$data_abk = $this->m_kinerja->AmbilTargetKRS("where id_targetkrs ='$kode'")->result_array();


	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'namars' => $this->session->userdata('namars'),
		'nama_user' => $this->session->userdata('nama_user'),
		'foto' => $this->session->userdata('foto'),
		'id_targetkrs' => $data_abk[0]['id_targetkrs'],
		'nama_rs' => $data_abk[0]['nama_rs'],
		'kode_rs' => $data_abk[0]['kode_rs'],	
		'periode' => $data_abk[0]['periode'],		
		'nilai_target' => $data_abk[0]['nilai_target'],
		'nama_uraiankrs' =>  $data_abk[0]['nama_uraiankrs'],
		// 'nilai_targeth' => $data_abk[0]['nilai_targeth'],
		// 'nilai_targetm' =>  $data_abk[0]['nilai_targetm'],
		// 'nilai_targetb' =>  $data_abk[0]['nilai_targetb'],
			
		
		
		'data_targetkrs' => $this->m_kinerja->AmbilTargetKRS("where id_targetkrs = '$kode' order by id_targetkrs asc")->result_array()
			
		);

	
		$this->template->Display('v_kinerja/edit_targetkrs', $data);

	}

	function updatetargetkrs(){


	$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("Y m d");
        $waktus =date("Y");

        $nilai_target = $_POST['nilai_target'];
        $kode_rs = $_POST['kode_rs'];
   
	$data = array(
	'id_targetkrs' =>$this->input->post('id_targetkrs'),
	'periode' =>$waktus,
	'nama_rs' =>$this->input->post('nama_rs'),
	'kode_rs' =>$kode_rs,
	'nilai_target' =>$nilai_target,
	'nilai_targeth' => $nilai_target/356,
	'nilai_targetm' => $nilai_target/52,
	'nilai_targetb' => $nilai_target/12,
	'nama_uraiankrs' =>$this->input->post('nama_uraiankrs'),
	

	'updatedby' =>  $this->session->userdata('nama'),
	'updateddate' =>  $waktu,
	
	);
	$this->load->model('m_kinerja');
	$hasil = $this->m_kinerja->UpdateTargetKRS($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'C_targetkinerja/tampil/'.$waktus.'/'.$kode_rs.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'C_targetkinerja/tampil/'.$waktus.'/'.$kode_rs.'');
	}
	}

	function hapustargetkrs($kode = 1){
	$this->load->model('m_kinerja');	
	$result = $this->m_kinerja->Hapus('tb_targetkrs', array('id_targetkrs' => $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'C_targetkinerja/tampil/'.$waktus.'/'.$kode_rs.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'C_targetkinerja/tampil/'.$waktus.'/'.$kode_rs.'');
	}
	}


	function tampil($periode=0, $kode_rs=0)
	{
		$this->load->model('m_kinerja');

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			
			 'data_abks' => $this->m_kinerja->AmbilTargetKRS("where periode= '$periode' and kode_rs = '$kode_rs' order by id_targetkrs asc")->result_array(),
			 'data_targetkrs' => $this->m_kinerja->AmbilTargetKRS("order by id_targetkrs asc")->result_array(),
			
);
		$this->template->display('v_kinerja/data_targetkrs', $data);
	}



	function hapusdatatarget($pwaktu=0,$cbgrs=0){

		// $cbgrs = $this->input->post('cabangrs');
		// $pwaktu =  $_POST['periode'];
		$this->load->model('m_kinerja');
		
		$result = $this->m_kinerja->Hapustarget('tb_targetkrs', array('kode_rs' => $cbgrs,'periode' => $pwaktu));
	
			if($pwaktu=='' ){

			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan.Terima Kasih.</strong></div>");
			header('location:'.base_url().'C_targetkinerja');

		}else{
				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'C_targetkinerja');
		}
	}
}

