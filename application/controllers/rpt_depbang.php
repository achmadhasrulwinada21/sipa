<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class rpt_depbang extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('Tpdf');
        $this->load->model('modelperusahaan');
    }

       function expor_detilalum(){
  if (isset($_POST["tanggal_tr"])) {
            $tanggal = $_POST["tanggal_tr"];
                                                    
      $query['expor_detilalum'] = $this->produkom2->Getproduk("where tanggal_tr ='$tanggal' order by nm_perusahaan asc")->result_array();
        $query['tglawal'] =$tanggal;
         }else{
           $query['expor_detilalum'] = $this->produkom2->Getproduk("order by nm_perusahaan asc")->result_array();
        $query['tglawal'] =$tanggal_awal;
        $query['tglakhir'] =$tanggal_akhir;
        }
        $this->load->view('expor_detilalum', $query);                         
      }
	  
	  
	  public function report_depbang(){
  
                              
      $query['report_depbang'] = $this->modelperusahaan->GetEva("where tipe_produk='DEPBANG' order by koper asc")->result_array();
     
      $this->load->view('report_depbang', $query);                         
      } 
	  
	  public function report_all(){
  
                              
      $query['report_all'] = $this->modelperusahaan->GetEva("order by koper asc")->result_array();
     
      $this->load->view('report_all', $query);                         
      } 
	  
  } 




?>