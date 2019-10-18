<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporandetailnotapdf extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('Tpdf');
        //$this->load->helper('url');
        $this->load->model('model');
    }

	public function cetak_detailnota($id_nota){
		$data['cetak_detailnota'] = $this->db->get_where('v_detailnota',['id_nota'=>$id_nota])->row();
		 $this->load->view('cetak_detailnota', $data);   
	}
	
    //public function cetak_detailnota(){
    //if (isset($_POST["id_nota"])) {
    //  $id_nota = $_POST["id_nota"];
    //                                
    //   $query['cetaknota'] = $this->model->GetDetail("where kode_kom = '$id_nota'")->result_array();
    //   }else{
    //   $query['cetaknota'] = $this->model->GetDetail('order by id_nota asc')->result_array();
    //   }
    //   $this->load->view('cetak_detailnota', $query);                             
    //}    

}
