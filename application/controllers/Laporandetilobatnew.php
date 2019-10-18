<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporandetilobatnew extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('Tpdf');
        $this->load->model('Obatkat');
    }

     public function expordetilobatfarmasi(){
      $this->load->library('Tpdf');
        $this->load->model('Obatkat');
     
	  
			   	$tanggalawal = $_POST["tglawal"]; 
				$tanggalakhir = $_POST["tglakhir"];
				$perusahaan = $_POST["koper"];
				//$flagobat = $_POST["flagobat"]; 				
				 

				if ($perusahaan!=''):
				  $query['expor_detilobat2'] = $this->Obatkat->GetprodukVfinal("where koper='$perusahaan' order by tanggal_tr asc")->result_array();   
				endif;
				if ($tanggalawal!='' && $tanggalakhir!='' && $perusahaan!=''):
				   $query['expor_detilobat2'] = $this->Obatkat->GetprodukVfinal("where koper='$perusahaan' or (tanggal_tr between '$tanggalawal' and '$tanggalakhir' ) order by tanggal_tr asc")->result_array();
				endif;
				if ($perusahaan=='' && $tanggalawal=='' && $tanggalakhir=='' ):
				  $query['expor_detilobat2'] = $this->Obatkat->GetprodukVfinal("order by tanggal_tr asc")->result_array();
				endif;
				
				// 
				
		
			     $this->load->view('katobat/expor_detilobatfarmasi', $query);     
	 }  
	  

	
	  

}


?>
