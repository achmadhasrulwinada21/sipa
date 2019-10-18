<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporanalkes extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('Tpdf');
        $this->load->model('alkeskat');
    }

   public function cetak_alkes($kode_trans){
  $this->load->model('alkeskat');
                              
      $query['cetak_alkes'] = $this->alkeskat->GetprodukVcount("where kode_trans= '$kode_trans' order by nm_perusahaan asc")->result_array();
       $query['prod'] = $this->db->get_where('tr_print_compare',['kode_trans'=>$kode_trans])->row();
      $this->load->view('katalkes/cetak_alkes', $query);                         
  }

    public function cetak_alkesproduk($id){
  $this->load->model('alkeskat');
                              
        $query['alkes'] = $this->db->get_where('view_alkes1',['iddetailalkes'=>$id])->row();
      $this->load->view('katalkes/cetak_alkesproduk', $query);                         
  }  

  public function cetak_alkesproduk2($id){
  $this->load->model('alkeskat');

        $query['alkes'] = $this->db->get_where('view_alkes_final',['iddetailalkes'=>$id])->row();
      $this->load->view('katalkes/cetak_alkesproduk2', $query);
  }


   function expor_detilalkes(){
     if (isset($_POST["tanggal_tr"])) {
            $tanggal = $_POST["tanggal_tr"];
                                                    
      $query['expor_detilalkes'] = $this->alkeskat->GetprodukV("where tanggal_tr ='$tanggal' and id_tipe_produk='TP003' order by nm_perusahaan asc")->result_array();
        $query['tglawal'] =$tanggal;
         }else{
           $query['expor_detilalkes'] = $this->alkeskat->GetprodukV("order by nm_perusahaan asc")->result_array();
        $query['tglawal'] =$tanggal;
          }
        $this->load->view('expor_detilalkes', $query);                         
      }

function expor_detilalkes2(){
          if (isset($_POST["tglawal"])&&isset($_POST["tglakhir"])&&isset($_POST["koper"])) {
            $tanggalawal = $_POST["tglawal"]; 
            $tanggalakhir = $_POST["tglakhir"];
            $perusahaan = $_POST["koper"];                   
      $query['expor_detilalkes'] = $this->alkeskat->Getprodukmfinalhead("where koper='$perusahaan' or (tanggal_tr between '$tanggalawal' and '$tanggalakhir' ) order by tanggal_tr asc")->result_array();
      }else{
            $tanggalawal = $_POST["tglawal"]; 
            $tanggalakhir = $_POST["tglakhir"];
            $perusahaan = $_POST["koper"];
         $query['expor_detilalkes'] = $this->alkeskat->Getprodukmfinalhead("order by tanggal_tr asc")->result_array();
       }
          $this->load->view('expor_detilalkes2', $query);                         
      } 	

}


?>
