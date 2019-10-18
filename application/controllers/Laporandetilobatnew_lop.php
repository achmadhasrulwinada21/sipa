<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporandetilobatnew_lop extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('Tpdf');
        $this->load->model('obatreg');
    }

     public function expordetilobatfarmasi(){
      $this->load->library('Tpdf');
        $this->load->model('obatreg');
          
            $tanggalawal = $_POST["tglawal"]; 
            $tanggalakhir = $_POST["tglakhir"];
            $perusahaan = $_POST["koper"];                   
     
				if ($perusahaan!=''):
				  $query['expor_detilobat2'] = $this->obatreg->GetprodukV_lop("where koper='$perusahaan' order by tanggal_tr asc")->result_array();   
				endif;
				if ($tanggalawal!='' && $tanggalakhir!='' && $perusahaan!=''):
				   $query['expor_detilobat2'] = $this->obatreg->GetprodukV_lop("where koper='$perusahaan' or (tanggal_tr between '$tanggalawal' and '$tanggalakhir' ) order by tanggal_tr asc")->result_array();
				endif;
				if ($perusahaan=='' && $tanggalawal=='' && $tanggalakhir=='' ):
				  $query['expor_detilobat2'] = $this->obatreg->GetprodukVdetail_3("order by tanggal_tr asc")->result_array();
				endif;
	   
	   
	   
	   
          $this->load->view('katobat/expor_detilobatfarmasi_lop', $query);                         
      }   

}


?>
