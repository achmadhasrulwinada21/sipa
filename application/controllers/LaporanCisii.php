<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanCisii extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
			$this->load->library('Tpdf');
			$this->load->model('cisimm');
		}
	

  public function cetak_cisii(){
	if (isset($_POST["kode_kom"])) {
      $kode_kom = $_POST["kode_kom"];
                        			
       $query['cetak_cisii'] = $this->cisimm->GetCisi("where kode_kom = '$kode_kom'")->result_array();
       }else{
       $query['cetak_cisii'] = $this->cisimm->GetCisi('order by kode_kom asc')->result_array();
       }
       $this->load->view('cetak_cisii', $query);                     		
	}	


	
   }