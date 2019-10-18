<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class master_lokasi extends CI_Controller {




//-------------cRUD Jenis lokasi dan Sub Jenis lokasi-------------------
	
	
	
	public function index()
	{
		$this->load->model('modellokasi');
	
		$data = array(
			'namars' => $this->session->userdata('namars'),	
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'data_jenis_lokasi' => $this->modellokasi->v_lokasi(),
			'tp_produk'=> $this->modellokasi->gettipeproduk()->result_array(),
			'kode_rs'=>  $this->modellokasi->getrs()->result_array(),
		     'kodeunik' => $this->modellokasi->buat_kode(),
		);

	$this->template->Display('master_lokasi/data_lokasi',$data);
	}
	

	function savemaster_lokasi(){
		
		$this->load->model('modellokasi');
		
		    $kode_lokasi = $_POST['kode_lokasi'];
			$nm_lokasim = $_POST['nm_lokasi'];
			$koders=$_POST['koders'];
			$status=$_POST['status'];
			$userlog = ($this->session->userdata('nama'));
			
			$data_dist = $this->modellokasi->GetJenis_lokasi("where kode_lokasi='$kode_lokasi' and koders='$koders'")->result_array();
			
			$data = array(
			'kode_lokasi' =>$kode_lokasi,
			'nm_lokasi' =>$nm_lokasim,	
			'koders'=>$koders,	
			'status'=>$status,
			'createby' =>$userlog,
					);
					
		$nmlks = isset($data_dist[0]['kode_lokasi']);
		$kdrs = isset($data_dist[0]['koders']);
						
		if($nmlks==$kode_lokasi and $kdrs == $koders){
			
		
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong> data tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'master_lokasi');
		
		}else{
		    $result = $this->modellokasi->Simpanjenis($data);	
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data  BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'master_lokasi');	
		
			
		}

	
	}
	
	
	function updatemaster_lokasi(){
	$this->load->model('modellokasi');
	
			$id_j= $_POST['id_lokasi'];
			$kode_lokasi=$_POST['kode_lokasi'];
    	    $nm_lokasi = $_POST['nm_lokasi'];
			$koders = $_POST['koders'];
			$status=$_POST['status'];
		   $dt = new DateTime();	

		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("Y-m-d H:i:s");  

	$data = array(
	'id_lokasi' =>$id_j,
	'kode_lokasi'=>$kode_lokasi,
	'koders' =>$koders,
	'nm_lokasi' => $nm_lokasi,
	'status'=>$status,
	'updatedate' => $waktu,
	'updateby' =>  $this->session->userdata('nama'),
	);

	$hasil = $this->modellokasi->update_lokasi($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data dengan NO  BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'master_lokasi');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'master_lokasi');
	}
	}
	

	function hapus_master_lokasi($kode_lokasi){
			
		$this->load->model('modellokasi');	
	    $hapus['id_lokasi'] = $this->uri->segment(3);
	
	    $hasil = $this->modellokasi->deleteData("master_lokasi",$hapus);

       	if($hasil>=0){
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>DELETE data BERHASIL di lakukan</strong></div>");
		header('location:'.base_url().'master_lokasi');
		}else{
		$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
		header('location:'.base_url().'master_lokasi');
		}
		
    }
	
	
	}
