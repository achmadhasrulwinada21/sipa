<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rumahsakit extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

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
			'namars' => $this->session->userdata('namars'),	
			'koders' => '',
			//'cdate' => '',
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	

			'data_rumahsakit' => $this->model->GetRumahSakit("order by koders asc")->result_array(),
		);


		$this->template->display('rumahsakit/data_rumahsakit', $data);

	}

	function addrumahsakit()
	{
		$data = array(


			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			'koders' => $this->session->userdata('koders'),	
			'namars' => $this->session->userdata('namars'),
		);
		

		$this->template->display('rumahsakit/add_rumahsakit', $data);

	
	}

	

	function editrumahsakit($koders = 0){		
		$tampung = $this->model->GetRumahSakit("where koders = '$koders'")->result_array();
		$data = array(
			//'cdate' => $tampung[0]['cdate'],
			'namars' => $tampung[0]['namars'],
			'koders' => $tampung[0]['koders'],
			'email' => $tampung[0]['email'],
			'createby' => $tampung[0]['createby'],
			'updateby' => $tampung[0]['updateby'],
			'cdate' => $tampung[0]['cdate'],


			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			
			'data_rumahsakit' => $this->model->GetRumahSakit("where koders != '$koders' order by koders asc")->result_array()
			);

		$this->template->display('rumahsakit/edit_rumahsakit', $data);

	

	}

	function savedata(){
		//if($_POST){
			$koders = $_POST['koders'];
			$namars = $_POST['namars'];
			$email = $_POST['email'];
			$dt = new DateTime();

			date_default_timezone_set("Asia/Jakarta");
	                //$waktu =date("d-m-Y H:i:s");


			$data = array(
			'namars' =>$namars,
			'koders' =>$koders,
			'email' =>$email,
			//'cdate' =>$waktu,
		    'createby' =>  $this->session->userdata('nama'),

					);


			$result = $this->model->Simpan('hrd_mst_rs', $data);
			if($result == 1){
				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'rumahsakit');
			}else{
				$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
					header('location:'.base_ul().'rumahsakit');
		}
	}

	function updaterumahsakit(){
		
		$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
                $waktu =date("Y-m-d H:i:s");

		$data = array(
			'koders' => $this->input->post('koders'),
			'namars' => $this->input->post('namars'),
			'email' => $this->input->post('email'),
			'mdate' => $waktu,
			'updateby' =>  $this->session->userdata('nama'),
			);
		
		$res = $this->model->UpdateRumahSakit($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'rumahsakit');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'rumahsakit');
		}
	}
	

	function hapusrumahsakit($koders = 1){
		
		$result = $this->model->Hapus('hrd_mst_rs', array('koders' => $koders));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'rumahsakit');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'rumahsakit');
		}
	}
}


