<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanRkk extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('Tpdf');
        //$this->load->helper('url');
        $this->load->model('model');
    }

    public function cetak_renckeg(){
    if (isset($_POST["id_stpd"])) {
      $id_stpd = $_POST["id_stpd"];
        
		$query=array(
       'cetak_renckeg' => $this->model->GetRkk("where id_stpd = '$id_stpd'")->result_array(),
       'cetak_memostpd' => $this->model->GetMemoSTPD("where id_stpd = '$id_stpd'")->result_array(),
	   'cetaksurgas' => $this->model->getsurat("where kode_komponenbiaya = '$id_stpd'")->result_array(),
       'cetaksurgase' => $this->model->getsurate("where id_bpd = '$id_stpd'")->result_array(),
	   );
	   }
       $this->load->view('cetak_MemoRkkSurTug', $query);                             
    }    

}
