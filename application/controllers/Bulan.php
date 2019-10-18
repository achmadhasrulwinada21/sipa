<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bulan extends CI_Controller 

{

	public function __construct()
	{
		parent::__construct();
	   
	}
	

	public function index()
	{
		
		$this->load->model('bulanm');
			$data['kodebulan'] = $this->bulanm->code_otomatis();		
		    $data['data_sesi'] = $this->bulanm->Getbulan()->result_array();
			$data['nama'] = $this->session->userdata('nama');	
			$data['cabang'] = $this->session->userdata('cabang');	
				
			
	  
	$this->template->Display('masterbulan/data_bulan', $data);
	}
	
	
	function savedata()
	{
	$this->load->model('bulanm');	

           
           
		    $kodebulan = $_POST['kodebulan'];
			$namabulan = $_POST['namabulan'];
			$userlog = ($this->session->userdata('nama'));
			date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");
	
		$data = array(
			
			'kodebulan'=> $kodebulan,
			'namabulan'=> $namabulan,
			'createby' => $userlog ,
			'createdate' => $waktusaatini,
			
	);

		  
				$result = $this->bulanm->insertData("masterbulan",$data);
				if($result == 1){
					
					$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
					header('location:'.base_url().'Bulan' );
					
				}else{
				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data dengan NO : ".$data['no_pengajuan']." BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'Bulan' );
		}	  
		    
		  
		  
	}
	
	
	
		function hapus_item($idbul){
			
		$this->load->model('bulanm');	
	    $hapus['idbul'] = $this->uri->segment(3);
	
	    $this->bulanm->deleteData("masterbulan",$hapus);

        redirect('bulan');

	
		}
	
	
	
	}
		
	


