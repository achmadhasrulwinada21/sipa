<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporandepbang extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('Tpdf');
        $this->load->model('depbangkat');
    }

   public function cetak_depbang($kode_trans){
  $this->load->model('depbangkat');
                              
      $query['cetak_depbang'] = $this->depbangkat->GetprodukV("where kode_trans= '$kode_trans' order by nm_perusahaan asc")->result_array();
       $query['prod'] = $this->db->get_where('v_tr_print_compare',['kode_trans'=>$kode_trans])->row();
      $this->load->view('katdepbang/cetak_depbang', $query);                         
  } 

   function expor_detildepbang(){
     if (isset($_POST["tanggal_tr"])) {
            $tanggal = $_POST["tanggal_tr"];
            $koders = $_POST["koders"];                                       
      $query['expor_detildepbang'] = $this->depbangkat->GetprodukV("where tanggal_tr ='$tanggal' and koders='$koders' order by nm_perusahaan asc")->result_array();
        $query['tglawal'] =$tanggal;
         }else{
           $query['expor_detildepbang'] = $this->depbangkat->GetprodukV("order by nm_perusahaan asc")->result_array();
        $query['tglawal'] =$tanggal;
          }
        $this->load->view('expor_detildepbang', $query);                         
      }	
}


?>