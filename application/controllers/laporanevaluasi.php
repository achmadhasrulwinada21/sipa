<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class laporanevaluasi extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
			$this->load->library('Tpdf');
			$this->load->model('EvaluasiPekerjaan');
		}
	

  public function cetak_evaluasi(){
  
                              
      $query['cetak_evaluasi'] = $this->EvaluasiPekerjaan->GetEva("order by id_eva asc")->result_array();
     
     $this->load->view('cetak_evaluasi', $query);                         
  } 


  public function cetak_evaluasii(){
     
  if (isset($_POST["koders"])) {
      $kode_rs = $_POST["koders"];
                              
       $query['cetak_evaluasi'] = $this->EvaluasiPekerjaan->GetEva("where koders = '$kode_rs'")->result_array();
       }else{
       $query['cetak_evaluasi'] = $this->EvaluasiPekerjaan->GetEva('order by koders asc')->result_array();
       }
       $this->load->view('cetak_evaluasi', $query);                         
  } 





//  public function cetak_rekanann(){
//	if (isset($_POST["id_rek_listrik"])) {
  //  	$id_rek_listrik = $_POST["id_rek_listrik"];
                        			
    //   	$query['cetak_rekanann'] = $this->ListrikM->GetListrik("where id_rek_listrik = '$id_rek_listrik'")->result_array();
    //   }else{
    //   $query['cetak_rekanann'] = $this->ListrikM->GetListrik('order by id_rek_listrik asc')->result_array();
      // }
      // $this->load->view('cetak_rekanann', $query);                     		
	//}	

	
   }