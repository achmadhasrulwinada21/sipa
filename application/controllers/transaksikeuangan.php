<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TransaksiKeuangan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->_cek_login();
		$this->load->helper('currency_format_helper');
	}
	private function _cek_login()
	{
		if(!$this->session->userdata('useradmin')){            
			redirect(base_url().'backend');
		}
	}

	public function index()
	{
		$cbg = ($this->session->userdata('koders'));
		$kodeadmin=($this->session->userdata('role'));

		if($kodeadmin=='Departemen IT'){

		$data = array(
			'nama' => $this->session->userdata('nama'),
			'cabang' => $this->session->userdata('cabang'),
			'data_transaksikeuangan' => $this->model->GetTransaksiKeuanganRsAdmin("order desc by koders")->result_array(),
		);
	}else{

		$data = array(
			'nama' => $this->session->userdata('nama'),
			'cabang' => $this->session->userdata('cabang'),	

			'data_transaksikeuangan' => $this->model->GetTransaksiKeuanganRs("where kodersh ='$cbg'")->result_array(),
			
		 );

	}

		$this->load->view('transaksikeuangan/data_transaksikeuangan', $data);
	}

	function addtransaksikeuangan()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'optRumahSakit' => $this->model->GetRumahSakit()->result_array(),
			'optUraian' => $this->model->GetUraianKeu()->result_array()
		);
		
		$this->load->view('transaksikeuangan/add_transaksikeuangan', $data);
	}

	function savedata(){
		$koders = $_POST['koders'];
		$periode = $_POST['periode'];
		$kd_uraian = $_POST['kd_uraian'];		
		$nilai_uraian = $_POST['nilai_uraian'];
		$cdate = $_POST['cdate'];
		
		
		$data = array(	
			'koders'=> $koders,
			'periode' => $periode,
			'kd_uraian' => $kd_uraian,
			'nilai_uraian' => $nilai_uraian,
			'cdate' => date("Y-m-d H:i:s"),
			);
		
		$result = $this->model->Simpan('transaksi_keuangan', $data);
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'transaksikeuangan');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'transaksikeuangan');
		}		
	}


 function edittransaksikeuangan($kode = 0){
    $data_transaksikeuangan = $this->model->GetTransaksiKeuangan("where id_trkeu = '$kode'")->result_array();
    
 
    /*menjadikan kategori ke array*/

    $kdrs_post_array = array();
		foreach($this->model->GetTransaksiKeuangan("where id_trkeu = '$kode'")->result_array() as $kdrs){
			$kdrs_post_array[] = $kdrs['koders'];
		} 
	$uraianrs_post_array = array();
		foreach($this->model->GetTransaksiKeuangan("where id_trkeu = '$kode'")->result_array() as $uraianrs){
			$uraianrs_post_array[] = $uraianrs['kd_uraian'];
		}
      
		$data = array(
			'nama' => $this->session->userdata('nama'),
			'cabang' => $this->session->userdata('cabang'),

		    'id_trkeu' => $data_transaksikeuangan[0]['id_trkeu'],	
			'koders' => $this->model->GetRumahSakit("where koders != '$kode' order by koders asc")->result_array(),
			'periode' => $data_transaksikeuangan[0]['periode'],
			'kd_uraian' => $this->model->GetUraianKeu("where kd_uraian != '$kode' order by kd_uraian asc")->result_array(),
			'nilai_uraian' => $data_transaksikeuangan[0]['nilai_uraian'],
			'cdate' => $data_transaksikeuangan[0]['cdate'],
			'kdrs' => $this->model->GetRumahSakit()->result_array(),
			'kdrs_post' => $kdrs_post_array,
			'uraianrs' => $this->model->GetUraianKeu()->result_array(),
			'uraianrs_post' => $uraianrs_post_array,
			);
		$this->load->view('transaksikeuangan/edit_transaksikeuangan', $data);
	}


function updatetransaksikeuangan(){
		
        $id_trkeu=$_POST['id_trkeu'];
		$koders = $_POST['koders'];
		$periode = $_POST['periode'];		
		$kd_uraian = $_POST['kd_uraian'];
		$nilai_uraian = $_POST['nilai_uraian'];
		$cdate = $_POST['cdate'];
			
			$data = array(	
		    'id_trkeu'=> $id_trkeu,
			'koders' => $koders,
			'periode' => $periode,
			'kd_uraian' => $kd_uraian,
			'nilai_uraian' => $nilai_uraian,
			'cdate' => $cdate,
			);
		
		 $hasil = $this->model->UpdateTransaksiKeuangan($data);
		if($hasil>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'transaksikeuangan');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'transaksikeuangan');
		}
	}

	function hapustransaksikeuangan($id = 1){
		$result = $this->model->Hapus('transaksi_keuangan', array('id_trkeu' => $id));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'transaksikeuangan');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'transaksikeuangan');
		}
	}  
}