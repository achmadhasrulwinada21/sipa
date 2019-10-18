<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanKeuangan extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
			$this->load->library('Tcpdf');
			$this->load->model('moneym');
		}
	

  public function cetak_keuangan(){
	if (isset($_POST["kode"])) {
      $kode = $_POST["kode"];
                        			
       $query['cetak_keuangan'] = $this->moneym->GetMoney("where kode = '$kode'")->result_array();
       }else{
       $query['cetak_keuangan'] = $this->moneym->GetMoney('order by kode asc')->result_array();
       }
       $this->load->view('cetak_keuangan', $query);                     		
	}	


	
   }