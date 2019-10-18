<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Masterjenis extends CI_Controller {

	public function __construct()
	{
		
		parent::__construct();
		if(!$this->session->userdata('u_name')){
		$this->session->set_flashdata("alerts", "<div class='alerts alert-danger'><strong>Sesi Anda Telah Habis, Silahkan login kembali..</strong></div>");
			redirect('dashboard');

		}

		parent::__construct();
		$this->_cek_login();

		parent::__construct();		

	}

	public function index()
	{
		$this->load->model('modeljenpek');
		$data = array(
			//'jenis_pekerjaan' => $this->session->userdata('jenis_pekerjaan'),	
			//'koders' => '',
			'cdate' => '',
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	

			'data_jenis' => $this->modeljenpek->Geteva("order by id_jenpek asc")->result_array(),
		);


		$this->template->display('Masterjenis/data_jenis', $data);

		$this->load->view('masterjenis/data_jenis', $data);

		$this->template->Display('masterjenis/data_jenis',$data);
		//$this->load->view('masterjenis/data_jenis', $data);

	}

	function addjenis()
	{
		$data = array(


			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			
		
	//		'koders' => $this->session->userdata('koders'),	
	//		'namars' => $this->session->userdata('namars'),
		);

		
		$this->template->display('Masterjenis/add_jenis' , $data);

		
		$this->load->view('masterjenis/add_jenis' , $data);

		$this->template->Display('masterjenis/add_jenis',$data);
		//$this->load->view('masterjenis/add_jenis' , $data);

	}

	
	function editmasterjenis($id_jenpek=1){		
	$this->load->model('modeljenpek');
			//$tampung = $this->modelperusahaan->GetWhere("where master_perusahaan = '$id_perusahaan'")->result_array();
		$tampung = $this->modeljenpek->GetWhere('master_jenispek', array('id_jenpek' => $id_jenpek));
		$data = array(
			//'createdate' => $tampung[0]['createdate'],
			'id_jenpek' => $tampung[0]['id_jenpek'],
			'jenis_pekerjaan' => $tampung[0]['jenis_pekerjaan'],
			//'kodep' => $tampung[0]['kodep'],


			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			
			);

		$this->template->display('Masterjenis/edit_jenis', $data);

		$this->load->view('masterjenis/edit_jenis', $data);

		$this->template->Display('masterjenis/edit_jenis',$data);
		//$this->load->view('masterjenis/edit_jenis', $data);

	}

	function savedata(){
		//if($_POST){
			//$id_perusahaan = $_POST['id_perusahaan'];
			$jenis_pekerjaan = $_POST['jenis_pekerjaan'];
			//$kodep = $_POST['kodep'];
			//$createdate = $_POST ['createdate'];

			$userlog = ($this->session->userdata('nama')
		);

			$data = array(
			'jenis_pekerjaan' =>$jenis_pekerjaan,
			//'id_perusahaan' =>$id_perusahaan,
			//'kodep' =>$kodep,
			'createdate' => date("Y-m-d H:i:s"),
		
			'createby'=>$userlog ,

			//if($status == "baru"){
				//$data = array(
					//'koders' => $koders,
					//'namars' => $namars,
					//'cdate' => date("Y-m-d H:i:s"),
					);
				$result = $this->model->Simpan('master_jenispek', $data);
				if($result == 1){
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'Masterjenis');
				}else{
					$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
					header('location:'.base_ul().'Masterjenis');
		}
	}

	function updatemasterjenis(){
       
		$data = array(
			'jenis_pekerjaan' => $this->session->userdata('jenis_pekerjaan'),	
			//'koders' => '',
			'cdate' => '',
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),			
		);

		$this->load->model('modeljenpek');
		$id_jenpek = $_POST['id_jenpek'];
		$jenis_pekerjaan = $_POST['jenis_pekerjaan'];
		//$kodep = $_POST['kodep'];
		//$createdate = $_POST ['createdate'];

		$userlog = ($this->session->userdata('nama'));
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");
		$waktuini =date("m-Y");

		$data = array(
			'id_jenpek' => $id_jenpek,
			//'kodep' => $kodep,
			'jenis_pekerjaan' => $jenis_pekerjaan,
			'updateby'=> $userlog,
			'updatedate' => $waktusaatini,
		);
		
		$where = array(
			'id_jenpek' => $id_jenpek,
		);


		$res = $this->modeljenpek->UpdateMasterJenis($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'Masterjenis');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Masterjenis');
		}
	}
	


	function hapusmasterjenis($id_jenpek = 1){
		
		$result = $this->model->Hapus('master_jenispek', array('id_jenpek' => $id_jenpek));

	function hapusmasterperusahaan($id_jenpek = 1){
		
		$result = $this->model->Hapus('Masterjenis', array('id_jenpek' => $id_jenpek));

	function hapusmasterjenis($id_jenpek = 1){
		$this->load->model('modeljenpek');
		$result = $this->modeljenpek->Hapus('master_jenispek', array('id_jenpek' => $id_jenpek));

		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Masterjenis');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Masterjenis');
		}
	}
	
	
	
}
