<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporanfarmasi extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('Tpdf');
        $this->load->model('obatkat');
    }

   public function cetak_farmasi($id){
  $this->load->model('obatkat');
                              
      $query['cetak_farmasi'] = $this->obatkat->GetprodukVdetail("where kode_th= '$id' order by nm_perusahaan asc")->result_array();
       $this->load->view('cetak_farmasi', $query);                         
  } 

   function expor_detilfarmasi(){
     if (isset($_POST["tanggal_tr"])) {
            $tanggal = $_POST["tanggal_tr"];
                                                    
      $query['expor_detilfarmasi'] = $this->obatkat->GetprodukV("where tanggal_tr ='$tanggal' order by nm_perusahaan asc")->result_array();
        $query['tglawal'] =$tanggal;
         }else{
           $query['expor_detilfarmasi'] = $this->obatkat->GetprodukV("order by nm_perusahaan asc")->result_array();
        $query['tglawal'] =$tanggal;
          }
        $this->load->view('detilfarmasiex', $query);                         
      }

 function baswin(){
                    $this->load->model('Obatkat');
      $query['expor_detilfarmasi2'] = $this->Obatkat->GetprodukVfinal("order by tanggal_tr asc")->result_array();
          $this->load->view('expor_detilobat2', $query);
      }
	
}


?>
