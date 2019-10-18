<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanCisMachineIT extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
			$this->load->library('Tpdf');
			$this->load->model('ITModel_Cis_Machine');
			$this->load->model('CisStatusM');
		}
	

  public function Cetak_CisMachineIT(){
	if (isset($_POST["nama_cis"])) {
        $nama_cis = $_POST["nama_cis"];  
		  
	   $data['Cetak_CisMachineIT'] = $this->ITModel_Cis_Machine->GetCisMachineIT("where nama_cis = '$nama_cis'")->result_array();
	   $data['cetak_ttd'] = $this->CisStatusM->GetTtd("where nama_cis = '$nama_cis' AND status = 'Approve_dir' OR status = 'Approve_mk'")->result_array();
       }else{
	   $data['Cetak_CisMachineIT'] = $this->ITModel_Cis_Machine->GetCisMachineIT('order by nama_cis asc')->result_array();
	   $data['cetak_ttd'] = $this->CisStatusM->GetTtd("where nama_cis = '$nama_cis' AND status = 'Approve_dir' OR status = 'Approve_mk'")->result_array();
       }
       $this->load->view('Cetak_CisMachineIT', $data);                     		
	}	

  public function Cetak_CisMachineIT_D(){
	if (isset($_POST["nama_cis"])) {
        $nama_cis = $_POST["nama_cis"];  
		  
	   $data['Cetak_CisMachineIT_D'] = $this->ITModel_Cis_Machine->GetCisMachineIT("where nama_cis = '$nama_cis'")->result_array();
	   $data['cetak_ttd'] = $this->CisStatusM->GetTtd("where nama_cis = '$nama_cis' AND status = 'Approve_dir' OR status = 'Approve_mk'")->result_array();
       }else{
	   $data['Cetak_CisMachineIT_D'] = $this->ITModel_Cis_Machine->GetCisMachineIT('order by nama_cis asc')->result_array();
	   $data['cetak_ttd'] = $this->CisStatusM->GetTtd("where nama_cis = '$nama_cis' AND status = 'Approve_dir' OR status = 'Approve_mk'")->result_array();
       }
       $this->load->view('Cetak_CisMachineIT_D', $data);                     		
	}	
	
   }
   
   ?>