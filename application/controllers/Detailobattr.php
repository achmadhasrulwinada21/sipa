<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Detailobattr extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('Tpdf');
        $this->load->model('mobattrview');
		 $this->load->model('obatreg');
    }

   
    public function cetak_obattrproduk($id){
  $this->load->model('mobattrview');
                              
        $query['daraanisa'] = $this->db->get_where('v_obat_tr_final_fix',['iddetailprod2'=>$id])->row();
      $this->template->display('katobat/cetak_obattrproduk', $query);                       
  }  
  
    public function cetak_obattrproduk_lop($id){
  $this->load->model('obatreg');
                              
        $query['obatview_lop'] = $this->db->get_where('v_obat_outs_lop',['iddetailprod2'=>$id])->row();
      $this->template->display('katobat/cetak_obattrproduk_lop', $query);                       
  }  
  
  
  

   }


?>
