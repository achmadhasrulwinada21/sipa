<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stockopname extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();

	}
	
	public function index()
	{
		$data = array(
			
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),			
			'data_so' => $this->model->GetStockOpname("order by id_sp desc")->result_array(),
			'no_sp' => $this->model->GetIdLampiranFixedAsset()->result_array(),
		);

		$this->template->Display('stockopname/data_so', $data);
	}
	

	function addstockopname()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),			
			'id_sp' => $this->model->GetStockOpname()->result_array(),
			// 'nama_kegiatan' => $this->model->GetDetail()->result_array()
		);
		
		$this->template->Display('stockopname/add_so', $data);
	}

	function savedata(){
	   
		$id_sp = '';
		$tanggal = $_POST['tanggal'];
		$no_sp = $_POST['no_sp'];		
		$lampiran = $_POST['lampiran'];		
		$perihal = $_POST['perihal'];
		$tgl_dataaset = $_POST['tgl_dataaset'];
		$tgl_stockopname = $_POST['tgl_stockopname'];
		$tgl_analisanilai = $_POST['tgl_analisanilai'];
		$tgl_hasil = $_POST['tgl_hasil'];
		$tgl_koreksi = $_POST['tgl_koreksi'];
		$approval = $_POST['approval'];

		$id_sp = '';
		$no_sp2 = $_POST['no_sp'];
		
		$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d-m-Y H:i:s");

		
		$data = array(	
			
			'tanggal' => $tanggal,
			'no_sp' => $no_sp,
			'lampiran' => $lampiran,
			'perihal' => $perihal,
			'tgl_dataaset' => $tgl_dataaset,
			'tgl_stockopname' => $tgl_stockopname,
			'tgl_analisanilai' => $tgl_analisanilai,
			'tgl_hasil' => $tgl_hasil,
			'tgl_koreksi' => $tgl_koreksi,
			'approval' => $approval,
			'createddate' => $waktu,
			'createdby' =>  $this->session->userdata('nama'),	
			);

		$datalampiran = array(	
			// 'id_uraian'=> $id_uraian,
			'no_sp' => $no_sp2,
			'createddate' => $waktu,
			'createdby' =>  $this->session->userdata('nama'),
			);

		
		$result = $this->model->Simpan('tbl_sp', $data);
		$result = $this->model->Simpan('tbl_lampiran', $datalampiran);
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'stockopname');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'stockopname');
		}		
	}


	function editstockopname($kode=0){

	$data_so = $this->model->AmbilDataStockOpname("where id_sp ='$kode'")->result_array();
	
	$untuk_ttdapprov = array();
		foreach($this->model->AmbilDataStockOpname("where id_sp = '$kode'")->result_array() as $role){
			$untuk_ttdapprov[] = $role['ttd_approv'];
		}


	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),			
		'id_sp' =>  $data_so[0]['id_sp'],
		'tanggal' => $data_so[0]['tanggal'],
		'no_sp' => $data_so[0]['no_sp'],
		'lampiran' => $data_so[0]['lampiran'],
		'perihal' => $data_so[0]['perihal'],
		'tgl_dataaset' => $data_so[0]['tgl_dataaset'],
		'tgl_stockopname' => $data_so[0]['tgl_stockopname'],
		'tgl_analisanilai' => $data_so[0]['tgl_analisanilai'],
		'tgl_hasil' => $data_so[0]['tgl_hasil'],
		'tgl_koreksi' =>  $data_so[0]['tgl_koreksi'],
		'idmengetahui' => $this->model->AmbilDataTTDMengetahui()->result_array(),
		'untuk' => $untuk_ttdapprov,
		'approval' => $data_so[0]['approval'],
		'catatan' => $data_so[0]['catatan'],
		'data_so' => $this->model->AmbilDataStockOpname("where id_sp = '$kode' order by id_sp asc")->result_array()
			
	);

	
	$this->template->Display('stockopname/edit_so', $data);

	// 	// echo $data_user[0]['nama_user'];

	}


	function updatestockopname(){

	
	 	$id_sp=$_POST['id_sp'];
	 	$tanggal = $_POST['tanggal'];
		$no_sp = $_POST['no_sp'];		
		$lampiran = $_POST['lampiran'];		
		$perihal = $_POST['perihal'];
		$tgl_dataaset = $_POST['tgl_dataaset'];
		$tgl_stockopname = $_POST['tgl_stockopname'];
		$tgl_analisanilai = $_POST['tgl_analisanilai'];
		$tgl_hasil = $_POST['tgl_hasil'];
		$tgl_koreksi = $_POST['tgl_koreksi'];
		$ttd_approv = $_POST['ttd_approv'];
		$approval = $_POST['approval'];
		$catatan = $_POST['catatan'];	
		$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d-m-Y H:i:s");



		$data = array(	

			'id_sp'=> $id_sp,
			'tanggal' => $tanggal,
			'no_sp' => $no_sp,
			'lampiran' => $lampiran,
			'perihal' => $perihal,
			'tgl_dataaset' => $tgl_dataaset,
			'tgl_stockopname' => $tgl_stockopname,
			'tgl_analisanilai' => $tgl_analisanilai,
			'tgl_hasil' => $tgl_hasil,
			'tgl_koreksi' => $tgl_koreksi,
			'ttd_approv' => $ttd_approv,
			'approval' => $approval,
			'catatan' => $catatan,	
			'updateddate' => $waktu,
			'updatedby' =>  $this->session->userdata('nama'),
			);

         

	$hasil = $this->model->UpdateStockOpname($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'stockopname');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'stockopname');
	}
	}

	function hapusstockopname($kode = 1){
		
	$result = $this->model->Hapus('tbl_sp', array('id_sp' => $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'stockopname');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'stockopname');
	}
	}
}

