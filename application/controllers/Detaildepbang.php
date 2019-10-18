<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Detaildepbang extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('Tpdf');
        $this->load->model('produkom2');
    }

   
    public function cetak_depbangproduk($id){
  $this->load->model('produkom2');
                              
        $query['alum'] = $this->db->get_where('v_produkalum_finaldepbang',['iddetilalum'=>$id])->row();
      $this->template->display('depbang/cetak_depbangproduk', $query);                       
  }  

   }


?>
