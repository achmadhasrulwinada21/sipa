<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanCisi extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
			$this->load->library('Tpdf');
			$this->load->model('cisim');
		}
	

  public function cetak_cisi(){
	if (isset($_POST["kode_kom"])) {
      $kode_kom = $_POST["kode_kom"];
                        			
       $query['cetak_cisi'] = $this->cisim->GetCisi("where kode_kom = '$kode_kom'")->result_array();
       }else{
       $query['cetak_cisi'] = $this->cisim->GetCisi('order by kode_kom asc')->result_array();
       }
       $this->load->view('cetak_cisi', $query);                     		
	}	


	
   }