<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporanfarmasi_lop extends CI_Controller {

	function __construct() {
        parent::__construct();
        //$this->load->library('Tpdf');
        $this->load->model('obatreg');
    }

   public function cetak_farmasi($id){
  $this->load->model('obatreg');
                              
      $query['cetak_farmasi'] = $this->obatreg->Get_obat_outs_lop("where idpr2= '$id' order by nm_perusahaan asc")->result_array();
       $this->load->view('cetak_farmasi_lop', $query);                         
  } 

   function expor_detilfarmasi(){
     if (isset($_POST["tanggal_tr"])) {
            $tanggal = $_POST["tanggal_tr"];
                                                    
      $query['expor_detilfarmasi'] = $this->obatreg->GetprodukV_lop("where tanggal_tr ='$tanggal' order by nm_perusahaan asc")->result_array();
        $query['tglawal'] =$tanggal;
         }else{
           $query['expor_detilfarmasi'] = $this->obatreg->GetprodukV_lop("order by nm_perusahaan asc")->result_array();
        $query['tglawal'] =$tanggal;
          }
        $this->load->view('detilfarmasiex_lop', $query);                         
      }

 function baswin(){
                    $this->load->model('obatreg');
      $query['expor_detilfarmasi2'] = $this->obatreg->GetprodukV_lopfinal("order by tanggal_tr asc")->result_array();
          $this->load->view('expor_detilobat2', $query);
      }
	
}


?>
