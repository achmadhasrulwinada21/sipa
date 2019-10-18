<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanDetail extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
			$this->load->library('Tpdf');
			$this->load->model('detailm');
		}
	

  public function cetak_detail(){
	if (isset($_POST["kode_detail"])) {
      $kode_detail = $_POST["kode_detail"];
                        			
       $query['cetak_detail'] = $this->detailm->GetDetail("where kode_detail = '$kode_detail'")->result_array();
       }else{
       $query['cetak_detail'] = $this->detailm->GetDetail('order by kode_detail asc')->result_array();
       }
       $this->load->view('cetak_detail', $query);                     		
	}	


	
   }