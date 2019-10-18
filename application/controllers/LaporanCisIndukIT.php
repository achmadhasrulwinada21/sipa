<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanCisIndukIT extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
			$this->load->library('Tpdf');
			$this->load->model('ITModel');
			$this->load->model('CisStatusM');
		}
	

  public function Cetak_CisIndukIT(){
	if (isset($_POST["nama_cis"])) {
      $nama_cis = $_POST["nama_cis"];
                        			
       $data['Cetak_CisIndukIT'] = $this->ITModel->GetCisIndukIT("where nama_cis = '$nama_cis'")->result_array();
	   $data['cetak_ttd'] = $this->CisStatusM->GetTtd("where nama_cis = '$nama_cis' AND status = 'Approve_dir' OR status = 'Approve_mk'")->result_array();
       }else{
       $data['Cetak_CisIndukIT'] = $this->ITModel->GetCisIndukIT('order by nama_cis asc')->result_array();
	   $data['cetak_ttd'] = $this->CisStatusM->GetTtd("where nama_cis = '$nama_cis' AND status = 'Approve_dir' OR status = 'Approve_mk'")->result_array();
	   }
       $this->load->view('Cetak_CisIndukIT', $data);                     		
	}	

	
	 public function Cetak_CisIndukIT_D(){
	if (isset($_POST["nama_cis"])) {
      $nama_cis = $_POST["nama_cis"];
                        			
       $data['Cetak_CisIndukIT_D'] = $this->ITModel->GetCisIndukIT("where nama_cis = '$nama_cis'")->result_array();
	   $data['cetak_ttd'] = $this->CisStatusM->GetTtd("where nama_cis = '$nama_cis' AND status = 'Approve_dir' OR status = 'Approve_mk'")->result_array();
       }else{
       $data['Cetak_CisIndukIT_D'] = $this->ITModel->GetCisIndukIT('order by nama_cis asc')->result_array();
	   $data['cetak_ttd'] = $this->CisStatusM->GetTtd("where nama_cis = '$nama_cis' AND status = 'Approve_dir' OR status = 'Approve_mk'")->result_array();
	   }
       $this->load->view('Cetak_CisIndukIT_D', $data);                     		
	}

	
   }
   
   ?>
   
 
 