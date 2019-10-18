<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lapdepbang extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('Tpdf');
        $this->load->model('produkom2');
    }

 public function cetak_depbang($id){
  
                              
      $query['cetak_alum'] = $this->produkom2->Ambilcountdep("where kode_th= '$id' order by kode_th asc")->result_array();
        $query['cetak_ttd'] = $this->db->get_where('tr_print_compare',['idtrcom'=>$id])->row();
     $this->load->view('cetak_depbang21', $query);                         
  } 

function expor_detildepbang21(){
  if (isset($_POST["tanggal_tr"])) {
            $tanggal = $_POST["tanggal_tr"];
                                                    
      $query['expor_detilalum'] = $this->produkom2->GetprodukdepbangVhead("where tanggal_tr ='$tanggal' and id_tipe_produk='TP004'  order by nm_perusahaan asc")->result_array();
        $query['tglawal'] =$tanggal;
         }else{
           $query['expor_detilalum'] = $this->produkom2->GetprodukdepbangVhead("order by nm_perusahaan asc")->result_array();
        $query['tglawal'] =$tanggal;
        }
        $this->load->view('expor_detildepbang21', $query);                         
      } 

   function expor_detilalum(){
  if (isset($_POST["tanggal_tr"])) {
            $tanggal = $_POST["tanggal_tr"];
                                                    
      $query['expor_detilalum'] = $this->produkom2->Getproduk("where tanggal_tr ='$tanggal' and id_tipe_produk='TP002'  order by nm_perusahaan asc")->result_array();
        $query['tglawal'] =$tanggal;
         }else{
           $query['expor_detilalum'] = $this->produkom2->Getproduk("order by nm_perusahaan asc")->result_array();
        $query['tglawal'] =$tanggal_awal;
        $query['tglakhir'] =$tanggal_akhir;
        }
        $this->load->view('expor_detilalum', $query);                         
      }
	
   public function cetak_alumdetail(){
  if (isset($_POST["tanggal_tr"])) {
            $tanggal = $_POST["tanggal_tr"];
                                                    
      $query['cetak_alumdetail'] = $this->produkom2->Getproduk("where tanggal_tr ='$tanggal' order by nm_perusahaan asc")->result_array();
        $query['tglawal'] =$tanggal;
         }else{
           $query['cetak_alumdetail'] = $this->produkom2->Getproduk("order by nm_perusahaan asc")->result_array();
        $query['tglawal'] =$tanggal_awal;
        $query['tglakhir'] =$tanggal_akhir;
        }
        $this->load->view('cetak_alumdetail', $query);                         
      }


function expor_detildepbang(){
                                                        
      $query['expor_detilalum3'] = $this->produkom2->GetprodukdepbangVhead("where id_tipe_produk='TP004' and status='3' order by tanggal_tr asc")->result_array();
          
        $this->load->view('expor_detildepbangnew', $query);                         
      }	  
  } 



?>
