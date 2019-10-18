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
			'data_jenis_lokasi' => $this->modellokasi->GetJenis_lokasi(" order by id_lokasi asc")->result_array(),
		);

	$this->template->Display('master_lokasi/data_lokasi',$data);
	}
	

	function savemaster_lokasi(){
		
		$this->load->model('modellokasi');
		
		    $kode_lokasim = $_POST['kode_lokasi'];
			$nm_lokasim = $_POST['nm_lokasi'];
			$userlog = ($this->session->userdata('nama'));
			
			$data_dist = $this->modellokasi->GetJenis_lokasi("where kode_lokasi='$kode_lokasim'")->result_array();
			
			$data = array(
			'kode_lokasi' =>$kode_lokasim,
			'nm_lokasi' =>$nm_lokasim,		
			'createby' =>$userlog,
					);
					
		$pbid = isset($data_dist[0]['kode_lokasi']);	
		
				
		if( $pbid == $kode_lokasim  ){
			
		
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong> Kode Jenis lokasi dengan NO : ".$kode_lokasim."  tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'master_lokasi');
		
		}else{
		    $result = $this->modellokasi->Simpanjenis($data);	
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data ".$kode_lokasim." BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'master_lokasi');	
		
			
		}

	
	}
	
	
	function updatemaster_lokasi(){
	$this->load->model('modellokasi');
	
			$id_j= $_POST['id_lokasi'];
    	    $nm_lokasi = $_POST['nm_lokasi'];
			$kode_lokasi = $_POST['kode_lokasi'];
		   $dt = new DateTime();	

		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("Y-m-d H:i:s");  

	$data = array(
	'id_lokasi' =>$id_j,
	'kode_lokasi' =>$kode_lokasi,
	'nm_lokasi' => $nm_lokasi,
	'updatedate' => $waktu,
	'updateby' =>  $this->session->userdata('nama'),
	);

	$hasil = $this->modellokasi->update_lokasi($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data dengan NO : ".$data['kode_lokasi']." BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'master_lokasi');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'master_lokasi');
	}
	}
	

	function hapus_master_lokasi($kode_lokasi){
			
		$this->load->model('modellokasi');	
	    $hapus['kode_lokasi'] = $this->uri->segment(3);
	
	    $hasil = $this->modellokasi->deleteData("master_lokasi",$hapus);

       	if($hasil>=0){
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>DELETE data  ".$hapus['kode_lokasi']." BERHASIL di lakukan</strong></div>");
		header('location:'.base_url().'master_lokasi');
		}else{
		$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
		header('location:'.base_url().'master_lokasi');
		}
		
    }
	
	
	}
