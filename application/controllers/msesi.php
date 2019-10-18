<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Msesi extends CI_Controller 

{

	public function __construct()
	{
		parent::__construct();
	   
	}
	

	public function index()
	{
		
		$this->load->model('sesim');
			$data['sesi'] = $this->sesim->code_otomatis();
		

		
		
		    $data['data_sesi'] = $this->sesim->Getsesi()->result_array();
			$data['nama'] = $this->session->userdata('nama');	
			$data['cabang'] = $this->session->userdata('cabang');	
				
			
	  
	$this->template->Display('msesi/data_sesi', $data);
	}
	
	
	function savedata()
	{
	$this->load->model('sesim');	

           
           
		    $nama_sesi = $_POST['nama_sesi'];
			$userlog = ($this->session->userdata('nama'));
			date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");
	
		$data = array(
			
			'nama_sesi'=> $nama_sesi,
			'createby' => $userlog ,
			'createdate' => $waktusaatini,
			
	);

		  
				$result = $this->sesim->insertData("master_sesi",$data);
				if($result == 1){
					
					$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
					header('location:'.base_url().'msesi' );
					
				}else{
				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data dengan NO : ".$data['no_pengajuan']." BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'msesi' );
		}	  
		    
		  
		  
	}
	
	
	
		function hapus_item($idsesi){
			
		$this->load->model('sesim');	
	    $hapus['idsesi'] = $this->uri->segment(3);
	
	    $this->sesim->deleteData("master_sesi",$hapus);

        redirect('msesi');

	
		}
	
	
	
	}
		
	


