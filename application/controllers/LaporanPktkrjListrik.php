<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanPktkrjListrik extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('Tpdf');
        $this->load->model('pktKerja');
    }

  public function cetak_pkjlistrik(){
  
                              
      $query['cetak_pkjlistrik'] = $this->pktKerja->GetDetailPktKerja("order by idpktkrj asc")->result_array();
     
     $this->load->view('cetak_pkjlistrik', $query);                         
  } 


  public function cetak_pkjlistriku(){
     
  if (isset($_POST["koders"])) {
      $kode_rs = $_POST["koders"];
                              
       $query['cetak_pkjlistrik'] = $this->pktKerja->GetAllData("where koders = '$kode_rs'")->result_array();
       }else{
       $query['cetak_pkjlistrik'] = $this->pktKerja->GetAllData('order by koders asc')->result_array();
       }
       $this->load->view('cetak_pkjlistrik', $query);                         
  } 
	
}


?>