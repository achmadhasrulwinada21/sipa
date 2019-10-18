<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanCisMethodeIT extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
			$this->load->library('Tpdf');
			$this->load->model('ITModel_Cis_Methode');
			$this->load->model('CisStatusM');
		}
	

  public function Cetak_CisMethodeIT(){
	if (isset($_POST["nama_cis"])) {
      //$id_it_methode = $_POST["id_it_methode"];
        $nama_cis = $_POST["nama_cis"];  
		  
       //$query['Cetak_CisMethodeIT'] = $this->ITModel_Cis_Methode->GetCisMethodeIT("where id_it_methode = '$id_it_methode'")->result_array();
	   $data['Cetak_CisMethodeIT'] = $this->ITModel_Cis_Methode->GetCisMethodeIT("where nama_cis = '$nama_cis'")->result_array();
	   $data['cetak_ttd'] = $this->CisStatusM->GetTtd("where nama_cis = '$nama_cis' AND status = 'Approve_dir' OR status = 'Approve_mk'")->result_array();
       }else{
       //$query['Cetak_CisMethodeIT'] = $this->ITModel_Cis_Methode->GetCisMethodeIT('order by id_it_methode asc')->result_array();
	   $data['Cetak_CisMethodeIT'] = $this->ITModel_Cis_Methode->GetCisMethodeIT('order by nama_cis asc')->result_array();
	   $data['cetak_ttd'] = $this->CisStatusM->GetTtd("where nama_cis = '$nama_cis' AND status = 'Approve_dir' OR status = 'Approve_mk'")->result_array();
       }
       $this->load->view('Cetak_CisMethodeIT', $data);                     		
	}

public function Cetak_CisMethodeIT_D(){
	if (isset($_POST["nama_cis"])) {
       $nama_cis = $_POST["nama_cis"];  
		  
	   $data['Cetak_CisMethodeIT_D'] = $this->ITModel_Cis_Methode->GetCisMethodeIT("where nama_cis = '$nama_cis'")->result_array();
	   $data['cetak_ttd'] = $this->CisStatusM->GetTtd("where nama_cis = '$nama_cis' AND status = 'Approve_dir' OR status = 'Approve_mk'")->result_array();
       }else{
       $data['Cetak_CisMethodeIT_D'] = $this->ITModel_Cis_Methode->GetCisMethodeIT('order by nama_cis asc')->result_array();
	   $data['cetak_ttd'] = $this->CisStatusM->GetTtd("where nama_cis = '$nama_cis' AND status = 'Approve_dir' OR status = 'Approve_mk'")->result_array();
       }
       $this->load->view('Cetak_CisMethodeIT_D', $data);                     		
	}	


	
   }
   
   ?>