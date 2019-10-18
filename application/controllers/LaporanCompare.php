<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanCompare extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('Tpdf');
        $this->load->model('produkom');
    }

  public function cetak_compare_obat(){
  
                              
      $query['cetak_compare_obat'] = $this->produkom->GetCompare("order by idpr asc")->result_array();
      $query['aprovedir'] = $this->produkom->Getaprove("where idttd=1")->result_array();
      $query['aprovedirtgl'] = $this->produkom->Getaprove("where idttd=1")->result_array();
      $query['aprovekad'] = $this->produkom->Getaprove("where idttd=2")->result_array();
      $query['aprovekadtgl'] = $this->produkom->Getaprove("where idttd=2")->result_array();
     $this->load->view('cetak_compare_obat', $query);                         
  } 

   public function cetak_compare_obat2($id){
  
                              
      $query['cetak_compare_obat'] = $this->produkom->Ambilcompare("where kode_tr= '$id' order by idpr asc")->result_array();
       $query['prod'] = $this->db->get_where('tr_print_compare',['idtrcom'=>$id])->row();
      $this->load->view('cetak_compare_obat', $query);                         
  } 


  // public function cetak_pkjlistriku(){
     
  // if (isset($_POST["koders"])) {
      // $kode_rs = $_POST["koders"];
                              
       // $query['cetak_pkjlistrik'] = $this->pktKerja->GetAllData("where koders = '$kode_rs'")->result_array();
       // }else{
       // $query['cetak_pkjlistrik'] = $this->pktKerja->GetAllData('order by koders asc')->result_array();
       // }
       // $this->load->view('cetak_pkjlistrik', $query);                         
  // } 
	
}


?>