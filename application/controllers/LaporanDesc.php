<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanDesc extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
			$this->load->library('Tpdf');
			$this->load->model('descm');
		}
	

  public function cetak_desc(){
	if (isset($_POST["kode_desc"])) {
      $kode_desc = $_POST["kode_desc"];
                        			
       $query['cetak_desc'] = $this->descm->GetDesc("where kode_desc = '$kode_desc'")->result_array();
       }else{
       $query['cetak_desc'] = $this->descm->GetDesc('order by kode_desc asc')->result_array();
       }
       $this->load->view('cetak_desc', $query);                     		
	}
	
   }