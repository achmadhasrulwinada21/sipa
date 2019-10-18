<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detailnota extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data = array(
			
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),			
			'data_detail' => $this->model->GetDetail("order by id_nota desc")->result_array()
		);

		$this->template->Display('detailnota/data_detail', $data);
	}

	function adddetail()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			'optperusahaan' => $this->model->GetPT()->result_array(),
			'optrs' => $this->model->GetNamaRS()->result_array(),
			'optsupp' => $this->model->GetSupplier()->result_array(),		
			'id_nota' => $this->model->GetDetail()->result_array(),
			// 'nama_kegiatan' => $this->model->GetDetail()->result_array()
		);
		
		$this->template->Display('detailnota/add_detail', $data);
	}

	function savedata(){
	    //detail pembayaran
		$id_nota = '';
		$nama_kegiatan = $_POST['nama_kegiatan'];
		$kontraktor = $_POST['kontraktor'];		
		$po = $_POST['po'];		
		$no_girocek = $_POST['no_girocek'];
		$renc_pembayaran = $_POST['renc_pembayaran'];
		$bulan_dibayar = $_POST['bulan_dibayar'];
		$keterangan = $_POST['keterangan'];
		$nama_rs = $_POST['nama_rs'];
		$nama_pt = $_POST['nama_pt'];

		//nota pembayaran
		$id_trnota = '';
		$keterangan2 = $_POST['nama_kegiatan'];
		$supplier = $_POST['kontraktor'];
		$tanggal = $_POST['bulan_dibayar'];
		$tagihan = $_POST['renc_pembayaran'];
		$nama_pt2 = $_POST['nama_pt'];
		// $pembayaran = $_POST['renc_pembayaran'];

		$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d-m-Y H:i:s");

        //punya table detail nota
		$data = array(	
			// 'id_uraian'=> $id_uraian,
			'nama_kegiatan' => $nama_kegiatan,
			'kontraktor' => $kontraktor,
			'po' => $po,
			'no_girocek' => $no_girocek,
			'renc_pembayaran' => $renc_pembayaran,
			'bulan_dibayar' => $bulan_dibayar,
			'keterangan' => $keterangan,
			'nama_rs' => $nama_rs,
			'nama_pt' => $nama_pt,
			'createdate' => $waktu,
			'createby' =>  $this->session->userdata('nama'),	
			);


        //punya table  nota pembayaran
		$datanota = array(	
			// 'id_uraian'=> $id_uraian,
			'keterangan' => $keterangan2,
			'supplier' => $supplier,
			'no_girocek' => $no_girocek,
			'tanggal' => $tanggal,
			'tagihan' => $tagihan,
			'nama_pt' => $nama_pt2,
			// 'pembayaran' => $pembayaran,
			'createdate' => $waktu,
			'createby' =>  $this->session->userdata('nama'),
			);

		
		$result = $this->model->Simpan('detailnota', $data);
		$resultnota = $this->model->Simpannota('notapembayaran', $datanota);
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'detailnota');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'detailnota');
		}		
	}

	function editdetail($kode=0){

	$data_detail = $this->model->AmbilDataDetail("where id_nota ='$kode'")->result_array();


	$supp_post_array = array();
		foreach($this->model->AmbilDataDetail("where id_nota = '$kode'")->result_array() as $supplier){
			$supp_post_array[] = $supplier['kontraktor'];
		}

	$pt_post_array = array();
		foreach($this->model->AmbilDataDetail("where id_nota = '$kode'")->result_array() as $perusahaan){
			$pt_post_array[] = $perusahaan['nama_pt'];
		}

	$rs_post_array = array();
		foreach($this->model->AmbilDataDetail("where id_nota = '$kode'")->result_array() as $rs){
			$rs_post_array[] = $rs['nama_rs'];
		}

	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),			
		'id_nota' =>  $data_detail[0]['id_nota'],
		'nama_kegiatan' => $data_detail[0]['nama_kegiatan'],
		'kontraktor'=> $this->model->GetSupplier("where kode_supplier != '$kode' order by kode_supplier asc")->result_array(),	
		'po' => $data_detail[0]['po'],
		'no_girocek' => $data_detail[0]['no_girocek'],
		'renc_pembayaran' => $data_detail[0]['renc_pembayaran'],
		'bulan_dibayar' => $data_detail[0]['bulan_dibayar'],
		'keterangan' => $data_detail[0]['keterangan'],
		'supplier' => $this->model->GetSupplier()->result_array(),
		'supp_post' => $supp_post_array,
		'rs' => $this->model->GetRumahSakit()->result_array(),
		'rs_post_array' => $rs_post_array,
		'perusahaan' => $this->model->GetPT()->result_array(),
		'pt_post' => $pt_post_array,
		'data_detail' => $this->model->AmbilDataDetail("where id_nota = '$kode' order by id_nota asc")->result_array()
			
	);

	
	$this->template->Display('detailnota/edit_detail', $data);

	// 	// echo $data_user[0]['nama_user'];

	}


	function updatedetail(){

		$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d-m-Y H:i:s");
	
	$data = array(
	'id_nota' =>$this->input->post('id_nota'),
	'nama_kegiatan' =>$this->input->post('nama_kegiatan'),
	'kontraktor' =>$this->input->post('kontraktor'),
	'po' =>$this->input->post('po'),
	'no_girocek' =>$this->input->post('no_girocek'),
	'renc_pembayaran' =>$this->input->post('renc_pembayaran'),
	'bulan_dibayar' =>$this->input->post('bulan_dibayar'),
	'keterangan' =>$this->input->post('keterangan'),
	'nama_rs' =>$this->input->post('nama_rs'),
	'nama_pt' =>$this->input->post('nama_pt'),
	'updatedate' => $waktu,
	'updateby' =>  $this->session->userdata('nama'),
	);

	$hasil = $this->model->UpdateDetail($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'detailnota');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'detailnota');
	}
	}

	function hapusdetail($kode = 1){
		
	$result = $this->model->Hapus('detailnota', array('id_nota' => $kode));
	$result = $this->model->Hapus('notapembayaran', array('id_trnota' => $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'detailnota');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'detailnota');
	}
	}
}

