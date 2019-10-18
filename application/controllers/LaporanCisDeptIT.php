<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanCisDeptIT extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
			$this->load->library('Tpdf');
			$this->load->model('ITModel');
			//$this->load->model('ITModel_Cis_Man');
			//$this->load->model('ITModel_Cis_Methode');
			//$this->load->model('ITModel_Cis_Material');
			//$this->load->model('ITModel_Cis_Machine');
			//$this->load->model('ITModel_Cis_Money');
			$this->load->model('CisStatusM');
		}
	

  public function Cetak_CisDeptIT($kode_role){
	if (isset($_POST["kode_role"])) {
      $kode_role = $_POST["kode_role"];
                        			
       $data['Cetak_CisIndukIT'] = $this->ITModel->GetCisIndukIT()->result_array();
	  // $data['Cetak_CisManIT'] = $this->ITModel_Cis_Man->GetCisIndukIT("where nama_cis = '$nama_cis'")->result_array();
	  // $data['Cetak_CisMethodeIT'] = $this->ITModel_Cis_Methode->GetCisMethodeIT("where nama_cis = '$nama_cis'")->result_array();
	  // $data['Cetak_CisMaterialIT'] = $this->ITModel_Cis_Material->GetCisMaterialIT("where nama_cis = '$nama_cis'")->result_array();
	  // $data['Cetak_CisMachineIT'] = $this->ITModel_Cis_Machine->GetCisMachineIT("where nama_cis = '$nama_cis'")->result_array();
	  // $data['Cetak_CisMoneyIT'] = $this->ITModel_Cis_Money->GetCisMoneyIT("where nama_cis = '$nama_cis'")->result_array();
	   $data['cetak_ttd'] = $this->CisStatusM->GetTtd("where status = 'Approve_dir' OR status = 'Approve_mk'")->result_array();
       }else{
       $data['Cetak_CisIndukIT'] = $this->ITModel->GetCisIndukIT()->result_array();
	   //$data['Cetak_CisManIT'] = $this->ITModel_Cis_Man->GetCisIndukIT("where nama_cis = '$nama_cis'")->result_array();
	   //$data['Cetak_CisMethodeIT'] = $this->ITModel_Cis_Methode->GetCisMethodeIT("where nama_cis = '$nama_cis'")->result_array();
	   //$data['Cetak_CisMaterialIT'] = $this->ITModel_Cis_Material->GetCisMaterialIT("where nama_cis = '$nama_cis'")->result_array();
	   //$data['Cetak_CisMachineIT'] = $this->ITModel_Cis_Machine->GetCisMachineIT("where nama_cis = '$nama_cis'")->result_array();
	  // $data['Cetak_CisMoneyIT'] = $this->ITModel_Cis_Money->GetCisMoneyIT("where nama_cis = '$nama_cis'")->result_array();
	   $data['cetak_ttd'] = $this->CisStatusM->GetTtd("where status = 'Approve_dir' OR status = 'Approve_mk'")->result_array();
	   }
       $this->load->view('Cetak_CisDeptIT', $data);                     		
	}	


	
   }
   
   ?>
   
 
 