<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanCisMaterialIT extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
			$this->load->library('Tpdf');
			$this->load->model('ITModel_Cis_Material');
			$this->load->model('CisStatusM');
		}
	

  public function Cetak_CisMaterialIT(){
	if (isset($_POST["nama_cis"])) {
        $nama_cis = $_POST["nama_cis"];  
		  
	   $data['Cetak_CisMaterialIT'] = $this->ITModel_Cis_Material->GetCisMaterialIT("where nama_cis = '$nama_cis'")->result_array();
	   $data['cetak_ttd'] = $this->CisStatusM->GetTtd("where nama_cis = '$nama_cis' AND status = 'Approve_dir' OR status = 'Approve_mk'")->result_array();
       }else{
	   $data['Cetak_CisMaterialIT'] = $this->ITModel_Cis_Material->GetCisMaterialIT('order by nama_cis asc')->result_array();
	   $data['cetak_ttd'] = $this->CisStatusM->GetTtd("where nama_cis = '$nama_cis' AND status = 'Approve_dir' OR status = 'Approve_mk'")->result_array();
       }
       $this->load->view('Cetak_CisMaterialIT', $data);                     		
	}	

  public function Cetak_CisMaterialIT_D(){
	if (isset($_POST["nama_cis"])) {
        $nama_cis = $_POST["nama_cis"];  
		  
	   $data['Cetak_CisMaterialIT_D'] = $this->ITModel_Cis_Material->GetCisMaterialIT("where nama_cis = '$nama_cis'")->result_array();
	   $data['cetak_ttd'] = $this->CisStatusM->GetTtd("where nama_cis = '$nama_cis' AND status = 'Approve_dir' OR status = 'Approve_mk'")->result_array();
       }else{
	   $data['Cetak_CisMaterialIT_D'] = $this->ITModel_Cis_Material->GetCisMaterialIT('order by nama_cis asc')->result_array();
	   $data['cetak_ttd'] = $this->CisStatusM->GetTtd("where nama_cis = '$nama_cis' AND status = 'Approve_dir' OR status = 'Approve_mk'")->result_array();
       }
       $this->load->view('Cetak_CisMaterialIT_D', $data);                     		
	}	
	
   }
   
   ?>