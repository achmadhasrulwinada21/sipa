<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class masteruraianker extends CI_Controller {



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
		$this->load->model('modelurker');
		$data = array(
			//'jenis_pekerjaan' => $this->session->userdata('jenis_pekerjaan'),	
			//'koders' => '',
			'cdate' => '',
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	

			'data_uraian' => $this->modelurker->Geteva("order by id_urker asc")->result_array(),
		);

		$this->template->display('masteruraianker/data_uraian', $data);
	}

	function adduraian()
	{
		$data = array(


			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			
		
	//		'koders' => $this->session->userdata('koders'),	
	//		'namars' => $this->session->userdata('namars'),
		);
		
		$this->template->display('masteruraianker/add_uraian' , $data);
	}

	
	function editmasteruraian($id_urker=1){		
	$this->load->model('modelurker');
			//$tampung = $this->modelperusahaan->GetWhere("where master_perusahaan = '$id_perusahaan'")->result_array();
		$tampung = $this->modelurker->GetWhere('master_uraiankerja', array('id_urker' => $id_urker));
		$data = array(
			//'createdate' => $tampung[0]['createdate'],
			'id_urker' => $tampung[0]['id_urker'],
			'uraian_kerja' => $tampung[0]['uraian_kerja'],
			//'kodep' => $tampung[0]['kodep'],


			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			
			);
		$this->template->display('masteruraianker/edit_uraian', $data);
	}


	function savedata(){
		//$this->load->model('modelurker');

		//if($_POST){
			//$id_perusahaan = $_POST['id_perusahaan'];
			$uraian_kerja = $_POST['uraian_kerja'];
			//$kodep = $_POST['kodep'];
			//$createdate = $_POST ['createdate'];

			$userlog = ($this->session->userdata('nama')
		);

			$data = array(
			'uraian_kerja' =>$uraian_kerja,
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
				$result = $this->model->Simpan('master_uraiankerja', $data);
				if($result == 1){
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'masteruraianker');
				}else{
					$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
					header('location:'.base_ul().'masteruraianker');
		}
	}

	function updatemasteruraian(){

        
		$data = array(
			'uraian_kerja' => $this->session->userdata('uraian_kerja'),	
			//'koders' => '',
			'cdate' => '',
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
		
		);

		$this->load->model('modeluraianker');
		$id_urker = $_POST['id_urker'];
		$uraian_kerja = $_POST['uraian_kerja'];
		//$kodep = $_POST['kodep'];
			//$createdate = $_POST ['createdate'];

		$userlog = ($this->session->userdata('nama')
        );
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");
		$waktuini =date("m-Y");

		$data = array(
			'id_urker' => $id_jenpek,
			//'kodep' => $kodep,
			'uraian_kerja' => $uraian_kerja,
			'updateby'=> $userlog,
			'updatedate' => $waktusaatini,

			);
		$where = array(
        'id_urker' => $id_urker,
		);


		$res = $this->modelurker->updatemasteruraian($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'masteruraianker');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'masteruraianker');
		}
	}
	

	function hapusmasteruraian($id_urker = 1){
		
		$result = $this->model->Hapus('master_uraiankerja', array('id_urker' => $id_urker));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'masteruraianker');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'masteruraianker');
		}
	}
}
