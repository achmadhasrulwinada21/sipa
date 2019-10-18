<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class laporanprinsipal extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('Tpdf');
        $this->load->model('Obatkat');
    }

   public function cetak_compare_obat2($id){
  $this->load->model('Obatkat');
                              
      $query['cetak_compare_obat'] = $this->Obatkat->GetprodukVcountfinal("where kode_th= '$id' order by nm_perusahaan asc")->result_array();
       $query['prod'] = $this->db->get_where('tr_print_compare',['idtrcom'=>$id])->row();
      $this->load->view('cetak_obat_final', $query);                         
  } 

   function expor_detilfarmasi(){
     if (isset($_POST["tanggal_tr"])) {
            $tanggal = $_POST["tanggal_tr"];
                                                    
      $query['expor_detilfarmasi'] = $this->Obatkat->GetprodukV("where tanggal_tr ='$tanggal' order by nm_perusahaan asc")->result_array();
        $query['tglawal'] =$tanggal;
         }else{
           $query['expor_detilfarmasi'] = $this->Obatkat->GetprodukV("order by nm_perusahaan asc")->result_array();
        $query['tglawal'] =$tanggal;
          }
        $this->load->view('expor_detilobat', $query);                         
      }	

    function expor_detilobat2(){
          if (isset($_POST["tglawal"])&&isset($_POST["tglakhir"])&&isset($_POST["koper"])) {
            $tanggalawal = $_POST["tglawal"]; 
            $tanggalakhir = $_POST["tglakhir"];
            $perusahaan = $_POST["koper"];                   
      $query['expor_detilobat2'] = $this->Obatkat->GetprodukVfinal("where koper='$perusahaan' or (tanggal_tr between '$tanggalawal' and '$tanggalakhir' ) order by tanggal_tr asc")->result_array();
      }else{
            $tanggalawal = $_POST["tglawal"]; 
            $tanggalakhir = $_POST["tglakhir"];
            $perusahaan = $_POST["koper"];
         $query['expor_detilobat2'] = $this->Obatkat->GetprodukVfinal("order by tanggal_tr asc")->result_array();
       }
          $this->load->view('expor_detilobat2', $query);                         
      }      

}


?>
