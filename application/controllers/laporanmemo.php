<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporanmemo extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('Tpdf');
        //$this->load->helper('url');
       
    }

	public function cetak_memo($id_memo){
		$data['cetak_memo'] = $this->db->get_where('inv_memo',['id_memo'=>$id_memo])->row();
		 $this->load->view('cetak_memo', $data);   
	}
    //public function cetak_memo(){
    //if (isset($_POST["untuk"])) {
    //  $untuk = $_POST["untuk"];
    //                                
    //   $query['cetak_memo'] = $this->model->AmbilDataMemo("where untuk = '$untuk'")->result_array();
    //   }else{
    //   $query['cetak_memo'] = $this->model->AmbilDataMemo()->result_array();
    //   }
    //   $this->load->view('cetak_memo', $query);                             
    //}    

}
