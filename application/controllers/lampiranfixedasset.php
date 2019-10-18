<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lampiranfixedasset extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}
	

	public function index()
	{
		$data = array(
			
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),			
			'data_lampiran' => $this->model->GetLampiranFixedAsset("order by id_sl desc")->result_array()
		);
		$this->template->Display('lampiranfixedasset/data_lampiran',$data);
		//$this->load->view('lampiranfixedasset/data_lampiran', $data);
	}

	function editlampiran($kode=0){


	$data_lampiran = $this->model->AmbilLampiranFixedAsset("where id_sl ='$kode'")->result_array();



	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),			
		'id_sl' =>  $data_lampiran[0]['id_sl'],
		'no_sp' =>  $data_lampiran[0]['no_sp'],
		'thn_semester' => $data_lampiran[0]['thn_semester'],
		'lap_eks' => $data_lampiran[0]['lap_eks'],
		'ba_hapus_fa' => $data_lampiran[0]['ba_hapus_fa'],
		'ba_hapus_brg' => $data_lampiran[0]['ba_hapus_brg'],
		'bk_bsr_gl' => $data_lampiran[0]['bk_bsr_gl'],
		'analisa_aktiva' => $data_lampiran[0]['analisa_aktiva'],
		'analisa_atnilai' => $data_lampiran[0]['analisa_atnilai'],
		'analisa_atnilai_gl' => $data_lampiran[0]['analisa_atnilai_gl'],
		'laporan_at' =>  $data_lampiran[0]['laporan_at'],
		'lap_perbaikan_brg' => $data_lampiran[0]['lap_perbaikan_brg'],
		'lap_pemeliharaan_brg' => $data_lampiran[0]['lap_pemeliharaan_brg'],
		'lap_hapus_fa' => $data_lampiran[0]['lap_hapus_fa'],
		'jurnal_hapus' => $data_lampiran[0]['jurnal_hapus'],
		'kertas_kerja' => $data_lampiran[0]['kertas_kerja'],
		'data_lampiran' => $this->model->AmbilLampiranFixedAsset("where id_sl = '$kode' order by id_sl asc")->result_array()

			
	);

	$this->template->Display('lampiranfixedasset/edit_lampiran',$data);
	//$this->load->view('lampiranfixedasset/edit_lampiran', $data);

	// 	// echo $data_user[0]['nama_user'];

	}


	function updatelampiran(){

	
	 	$id_sl=$_POST['id_sl'];
	 	$no_sp=$_POST['no_sp'];
	 	$thn_semester = $_POST['thn_semester'];
		$lap_eks = $_POST['lap_eks'];		
		$ba_hapus_fa = $_POST['ba_hapus_fa'];		
		$ba_hapus_brg = $_POST['ba_hapus_brg'];
		$bk_bsr_gl = $_POST['bk_bsr_gl'];
		$analisa_aktiva = $_POST['analisa_aktiva'];
		$analisa_atnilai = $_POST['analisa_atnilai'];
		$analisa_atnilai_gl = $_POST['analisa_atnilai_gl'];
		$laporan_at = $_POST['laporan_at'];
		$lap_perbaikan_brg = $_POST['lap_perbaikan_brg'];
		$lap_pemeliharaan_brg = $_POST['lap_pemeliharaan_brg'];
		$lap_hapus_fa = $_POST['lap_hapus_fa'];
		$jurnal_hapus = $_POST['jurnal_hapus'];
		$kertas_kerja = $_POST['kertas_kerja'];
		
		$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d-m-Y H:i:s");


		$data = array(	

			'id_sl'=> $id_sl,
			'no_sp'=> $no_sp,
			'thn_semester' => $thn_semester,
			'lap_eks' => $lap_eks,
			'ba_hapus_fa' => $ba_hapus_fa,
			'ba_hapus_brg' => $ba_hapus_brg,
			'bk_bsr_gl' => $bk_bsr_gl,
			'analisa_aktiva' => $analisa_aktiva,
			'analisa_atnilai' => $analisa_atnilai,
			'analisa_atnilai_gl' => $analisa_atnilai_gl,
			'laporan_at' => $laporan_at,
			'lap_perbaikan_brg' => $lap_perbaikan_brg,	
			'lap_pemeliharaan_brg' => $lap_pemeliharaan_brg,
			'lap_hapus_fa' => $lap_hapus_fa,
			'jurnal_hapus' => $jurnal_hapus,
			'kertas_kerja' => $kertas_kerja,
			'updateddate' => $waktu,
			'updatedby' =>  $this->session->userdata('nama'),
			);

         

	$hasil = $this->model->UpdateLampiranFixedAsset($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'lampiranfixedasset');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'lampiranfixedasset');
	}
	}

	function hapuslampiran($kode = 1){
		
	$result = $this->model->Hapus('tbl_lampiran', array('id_sl' => $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'lampiranfixedasset');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'lampiranfixedasset');
	}
	}
}

