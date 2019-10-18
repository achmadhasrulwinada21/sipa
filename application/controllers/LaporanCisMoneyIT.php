<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanCisMoneyIT extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
			$this->load->library('Tpdf');
			$this->load->model('ITModel_Cis_Money');
			$this->load->model('CisStatusM');
		}
	

  public function Cetak_CisMoneyIT(){
	if (isset($_POST["nama_cis"])) {
        $nama_cis = $_POST["nama_cis"];  
		  
	   $data['Cetak_CisMoneyIT'] = $this->ITModel_Cis_Money->GetCisMoneyIT("where nama_cis = '$nama_cis'")->result_array();
	   $data['cetak_ttd'] = $this->CisStatusM->GetTtd("where nama_cis = '$nama_cis' AND status = 'Approve_dir' OR status = 'Approve_mk'")->result_array();
       }else{
	   $data['Cetak_CisMoneyIT'] = $this->ITModel_Cis_Money->GetCisMoneyIT('order by nama_cis asc')->result_array();
	   $data['cetak_ttd'] = $this->CisStatusM->GetTtd("where nama_cis = '$nama_cis' AND status = 'Approve_dir' OR status = 'Approve_mk'")->result_array();
       }
       $this->load->view('Cetak_CisMoneyIT', $data);                     		
	}	

 public function Cetak_CisMoneyIT_D(){
	if (isset($_POST["nama_cis"])) {
        $nama_cis = $_POST["nama_cis"];  
		  
	   $data['Cetak_CisMoneyIT_D'] = $this->ITModel_Cis_Money->GetCisMoneyIT("where nama_cis = '$nama_cis'")->result_array();
	   $data['cetak_ttd'] = $this->CisStatusM->GetTtd("where nama_cis = '$nama_cis' AND status = 'Approve_dir' OR status = 'Approve_mk'")->result_array();
       }else{
	   $data['Cetak_CisMoneyIT_D'] = $this->ITModel_Cis_Money->GetCisMoneyIT('order by nama_cis asc')->result_array();
	   $data['cetak_ttd'] = $this->CisStatusM->GetTtd("where nama_cis = '$nama_cis' AND status = 'Approve_dir' OR status = 'Approve_mk'")->result_array();
       }
       $this->load->view('Cetak_CisMoneyIT_D', $data);                     		
	}	

	
   }
   
   ?>