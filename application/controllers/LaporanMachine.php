<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanMachine extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
			$this->load->library('Tpdf');
			$this->load->model('machinem');
		}
	

  public function cetak_machine(){
	if (isset($_POST["kode_machine"])) {
      $kode_machine = $_POST["kode_machine"];
                        			
       $query['cetak_machine'] = $this->machinem->GetMachine("where kode_machine = '$kode_machine'")->result_array();
       }else{
       $query['cetak_machine'] = $this->machinem->GetMachine('order by kode_machine asc')->result_array();
       }
       $this->load->view('cetak_machine', $query);                     		
	}	


	
   }