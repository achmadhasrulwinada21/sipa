<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporannotapdf extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('Tpdf');
        //$this->load->helper('url');
        $this->load->model('model');
    }

	public function cetak_nota($id_trnota){
		$data['cetak_nota'] = $this->db->get_where('v_notapembayaran',['id_trnota'=>$id_trnota])->row();
		 $this->load->view('cetaknotapdf', $data);   
	}
    //public function cetak_nota(){
    //if (isset($_POST["id_trnota"])) {
    //  $id_trnota = $_POST["id_trnota"];
    //                                
    //   $query['cetaknota'] = $this->model->GetNota("where kode_kom = '$id_trnota'")->result_array();
    //   }else{
    //   $query['cetaknota'] = $this->model->GetNota('order by id_trnota asc')->result_array();
    //   }
    //   $this->load->view('cetaknotapdf', $query);                             
    //}    

}
