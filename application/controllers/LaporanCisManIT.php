<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanCisManIT extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
			$this->load->library('Tpdf');
			$this->load->model('ITModel_Cis_Man');
			$this->load->model('CisStatusM');
		}
	

  public function Cetak_CisManIT(){
	if (isset($_POST["nama_cis"])) {
      //$id_it_man = $_POST["id_it_man"];
      $nama_cis = $_POST["nama_cis"];     
	  
       //$query['Cetak_CisManIT'] = $this->ITModel_Cis_Man->GetCisIndukIT("where id_it_man = '$id_it_man'")->result_array();
	   $data['Cetak_CisManIT'] = $this->ITModel_Cis_Man->GetCisIndukIT("where nama_cis = '$nama_cis'")->result_array();
	   $data['cetak_ttd'] = $this->CisStatusM->GetTtd("where nama_cis = '$nama_cis' AND status = 'Approve_dir' OR status = 'Approve_mk'")->result_array();
       }else{
       //$query['Cetak_CisManIT'] = $this->ITModel_Cis_Man->GetCisIndukIT('order by id_it_man asc')->result_array();
	   $data['Cetak_CisManIT'] = $this->ITModel_Cis_Man->GetCisIndukIT('order by nama_cis asc')->result_array();
	   $data['cetak_ttd'] = $this->CisStatusM->GetTtd("where nama_cis = '$nama_cis' AND status = 'Approve_dir' OR status = 'Approve_mk'")->result_array();
       }
       $this->load->view('Cetak_CisManIT', $data);                     		
	}	
	
	public function Cetak_CisManIT_D(){
	if (isset($_POST["nama_cis"])) {
      $nama_cis = $_POST["nama_cis"];     
	  
       $data['Cetak_CisManIT_D'] = $this->ITModel_Cis_Man->GetCisIndukIT("where nama_cis = '$nama_cis'")->result_array();
	   $data['cetak_ttd'] = $this->CisStatusM->GetTtd("where nama_cis = '$nama_cis' AND status = 'Approve_dir' OR status = 'Approve_mk'")->result_array();
       }else{
       $data['Cetak_CisManIT_D'] = $this->ITModel_Cis_Man->GetCisIndukIT('order by nama_cis asc')->result_array();
	   $data['cetak_ttd'] = $this->CisStatusM->GetTtd("where nama_cis = '$nama_cis' AND status = 'Approve_dir' OR status = 'Approve_mk'")->result_array();
       }
       $this->load->view('Cetak_CisManIT_D', $data);                     		
	}	


	
   }
   
   ?>