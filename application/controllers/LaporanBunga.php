<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanBunga extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
        	$this->load->library('TPdf');
        	$this->load->model('bungam');
		}
		
	                    		
	  
                
		
///////////////////////////////////////////////// cetak departemen ////////////////////////
	  public function cetak_bunga()
		{
			if (isset($_POST["no_surat"])) {
                        $no_surat = $_POST["no_surat"];
		            $query['cetak_bunga'] = $this->bungam->GetBunga("where no_surat = '$no_surat'")->result_array();
					$query['cetak_ttd'] = $this->bungam->GetBunga("where no_surat = '$no_surat' AND mengetahuidirekturcheck = 'Approve'")->result_array();
          }else{
               	$query['cetak_bunga'] = $this->bungam->GetBunga('order by no_surat asc')->result_array();
					$query['cetak_ttd'] = $this->bungam->GetBunga('order by no_surat asc')->result_array();
             }
             $this->load->view('cetak_bunga', $query);                     		
	  }	
                }