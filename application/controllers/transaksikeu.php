<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TransaksiKeu extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

	}
	public function index()
	{  

		$cbg = ($this->session->userdata('koders'));
		$kodeadmin=($this->session->userdata('role'));


		if($kodeadmin=='Administrator'){

			$data = array(
			'nama' => $this->session->userdata('nama'),
			'cabang' => $this->session->userdata('cabang'),	
			'data_transaksikeu' => $this->model->GetTransaksiKeuRsAdministrator("order desc by koders")-result_array(),
			// 'data_transaksi' => $this->model->GetTransaksiKeuRs("where kodersh ='$cbg'")->result_array(),
		);
		
	}else if($kodeadmin=='Admin'){

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
		    'data_transaksikeu' => $this->model->GetTransaksiKeuRs("where kodersh ='$cbg'")->result_array(),
			'data_transaksi' => $this->model->GetTransaksiKeuRsAdmin("order desc by koders")->result_array(),
		);

	    }else{

		$data = array(
			'nama' => $this->session->userdata('nama'),
			'cabang' => $this->session->userdata('cabang'),	
            'data_transaksikeu' => $this->model->GetTransaksiKeuRs("where kodersh ='$cbg'")->result_array(),
		);
	}

		$this->template->Display('transaksikeu/data_transaksikeu', $data);
	}

	function addtransaksikeu()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'optRumahSakit' => $this->model->GetRumahSakit()->result_array(),
			'optUraian' => $this->model->GetUraianKeu()->result_array(),
			'cabang' => $this->session->userdata('cabang'),	
		);
		
		$this->template->Display('transaksikeu/add_transaksikeu', $data);
	}

	function savedata(){
		$config = array(
			'upload_path' => './assets/upload',
			'allowed_types' => 'gif|jpg|JPG|png',
			'max_size' => '2048',

		);
		$this->load->library('upload', $config);	
		$this->upload->do_upload('file_upload');
		$upload_data = $this->upload->data();
 

		$koders = $_POST['koders'];
		$periode = $_POST['periode'];
		$kd_uraian = $_POST['kd_uraian'];		
		$nilai_uraian = $_POST['nilai_uraian'];
		$cdate = $_POST['cdate'];
		
		
		$dt = new DateTime();

		date_default_timezone_set("Asia/Jakarta");
	    $waktu =date("d-m-Y H:i:s");

		$data = array(	
			// 'id_tr' => $id_tr,
			'koders'=> $koders,
			'periode' => $periode,
			'kd_uraian' => $kd_uraian,
			'nilai_uraian' => $nilai_uraian,
			'cdate' => $waktu,
			'createby' =>  $this->session->userdata('nama'),
			);
		
		$result = $this->model->Simpan('transaksi_keuangan', $data);
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'transaksikeu');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'transaksikeu');
		}		
	}


    function edittransaksikeu($kode = 0){
    $data_transaksikeu = $this->model->GetTransaksiKeu("where id_trkeu = '$kode'")->result_array();
    
 
    /*menjadikan kategori ke array*/
    

    $kdrs_post_array = array();
		foreach($this->model->GetTransaksiKeu("where id_trkeu = '$kode'")->result_array() as $kdrs){
			$kdrs_post_array[] = $kdrs['koders'];
		} 
	$uraianrs_post_array = array();
		foreach($this->model->GetTransaksiKeu("where id_trkeu = '$kode'")->result_array() as $uraianrs){
			$uraianrs_post_array[] = $uraianrs['kd_uraian'];
		}
      
		$data = array(
			'cabang' => $this->session->userdata('cabang'),	
			'nama' => $this->session->userdata('nama'),
			'id_trkeu' => $data_transaksikeu[0]['id_trkeu'],	
			'koders' => $this->model->GetRumahSakit("where koders != '$kode' order by koders asc")->result_array(),
			'periode' => $data_transaksikeu[0]['periode'],
			'kd_uraian' => $this->model->GetUraianKeu("where kd_uraian != '$kode' order by kd_uraian asc")->result_array(),
			'nilai_uraian' => $data_transaksikeu[0]['nilai_uraian'],
			'cdate' => $data_transaksikeu[0]['cdate'],
			'kdrs' => $this->model->GetRumahSakit()->result_array(),
			'kdrs_post' => $kdrs_post_array,
			'uraianrs' => $this->model->GetUraianKeu()->result_array(),
			'uraianrs_post' => $uraianrs_post_array,
			'colorcell'=>$data_transaksikeu[0]['colorcell'],
			);
		$this->template->Display('transaksikeu/edit_transaksikeu', $data);
	}

function updatetransaksikeu(){
		
        $id_trkeu=$_POST['id_trkeu'];
		$koders = $_POST['koders'];
		$periode = $_POST['periode'];		
		$kd_uraian = $_POST['kd_uraian'];
		$nilai_uraian = $_POST['nilai_uraian'];
		//$cdate = $_POST['cdate'];
		$warnasel=$_POST['warnatabel'];
		
    
			date_default_timezone_set("Asia/Jakarta");
            $waktusaatini =date("h:i:sa");

			$data = array(	

		    'id_trkeu'=> $id_trkeu,
			'koders' => $koders,
			'periode' => $periode,
			'kd_uraian' => $kd_uraian,
			'nilai_uraian' => $nilai_uraian,
			'colorcell'=>$warnasel,
			'mdate' => $waktu,
			'updateby' =>  $this->session->userdata('nama'),
			
			);
		
		
		 $hasil = $this->model->updatetransaksikeu($data);

		if($hasil>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'transaksikeu');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'transaksikeu');
		}
	}

	
	function hapustransaksikeu($id = 1){
		
		$result = $this->model->Hapus('transaksi_keuangan', array('id_trkeu' => $id));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'transaksikeu');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'transaksikeu');
		}
	}
	
	
   
}