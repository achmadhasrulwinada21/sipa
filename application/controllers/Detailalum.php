<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Detailalum extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('Tpdf');
        $this->load->model('produkom2');
    }

   
    public function cetak_alumproduk($id){
  $this->load->model('produkom2');
                              
        $query['alum'] = $this->db->get_where('v_produkalum_final',['iddetilalum'=>$id])->row();
      $this->template->display('produko2/cetak_alumproduk', $query);                       
  }  

   }


?>
