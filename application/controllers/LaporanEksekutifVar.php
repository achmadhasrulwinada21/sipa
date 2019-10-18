<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanEksekutifVar extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
			$this->load->library('Tcpdf');
			$this->load->model('eksvar');
		}
	

  public function cetak_eksekutifvar(){
	if (isset($_POST["periode"])) {
      $periode = $_POST["periode"];
                        			
       $query['cetak_eksekutifvar'] = $this->eksvar->GetEksVar("where periode = '$periode'")->result_array();
       }else{
       $query['cetak_eksekutifvar'] = $this->eksvar->GetEksVar('order by periode asc')->result_array();
       }
       $this->load->view('cetak_eksekutifvar', $query);                     		
	}	


	
   }