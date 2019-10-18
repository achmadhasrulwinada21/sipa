<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mkegiatan extends CI_Controller 

{

	public function __construct()
	{
		parent::__construct();
	   
	}
	

	public function index()
	{
		
		$this->load->model('kegiatanm');
			$data['kode_kegiatan'] = $this->kegiatanm->code_otomatis();
		

		
		
		    $data['data_kegiatan'] = $this->kegiatanm->Getkegiatan()->result_array();
			$data['nama'] = $this->session->userdata('nama');	
			$data['cabang'] = $this->session->userdata('cabang');	
				
			
	  
	$this->template->Display('mkegiatan/data_kegiatan', $data);
	}
	
	
	function savedata()
	{
	$this->load->model('kegiatanm');	

           
           
		    $kode_kegiatan = $_POST['kode_kegiatan'];
			$nama_kegiatan = $_POST['nama_kegiatan'];
			$userlog = ($this->session->userdata('nama'));
			date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");
	
		$data = array(
			
			'kode_kegiatan'=> $kode_kegiatan,
			'nama_kegiatan'=> $nama_kegiatan,
			'createby' => $userlog ,
			'createdate' => $waktusaatini,
			
	);

		  
				$result = $this->kegiatanm->insertData("master_kegiatan",$data);
				if($result == 1){
					
					$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
					header('location:'.base_url().'mkegiatan' );
					
				}else{
				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data dengan NO : ".$data['no_pengajuan']." BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'mkegiatan' );
		}	  
		    
		  
		  
	}
	
	
	
		function hapus_item($idkeg){
			
		$this->load->model('kegiatanm');	
	    $hapus['idkeg'] = $this->uri->segment(3);
	
	    $this->kegiatanm->deleteData("master_kegiatan",$hapus);

        redirect('mkegiatan');

	
		}
	
	
	
	}
		
	


