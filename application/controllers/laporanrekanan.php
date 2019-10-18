<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporanrekanan extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('Tpdf');
        $this->load->model('listrikm');
    }
	
	
	public function cetak_rekanan(){
  
                              
      $query['cetak_rekanan'] = $this->listrikm->Getvlistrik("order by id_rek_listrik asc")->result_array();
     
      $this->load->view('cetak_rekanan', $query);                         
  } 
	

   public function cetak_rekanans(){
   
	
   if (isset($_POST["koders"])) {
     $kode_rs = $_POST["koders"];
                                    
     $query['cetak_rekanan'] = $this->listrikm->Getvlistrik("where koders	 = '$kode_rs'")->result_array();
 	 }else{
     $query['cetak_rekanan'] = $this->listrikm->Getvlistrik('order by koders asc')->result_array();
	 }
       $this->load->view('cetak_rekanan', $query);                             
     }    
	   
   }    	
	
	
	


?>