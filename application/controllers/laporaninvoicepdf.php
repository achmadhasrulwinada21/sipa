<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporaninvoicepdf extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
        	$this->load->library('TPdf');
			$this->load->model('model');			
		}

		 public function cetak_invo()
		{
			if (isset($_POST["no_rek"])){
                        $no_rek = $_POST["no_rek"];
			
          $query=array(
                          'cetak_invo' => $this->model->GetInvoice("where no_rekening = '$no_rek'")->result_array(),
                          'cetak_repinvo' => $this->model->GetReportInv("where no_rek = '$no_rek'")->result_array(),
                          
                    );
                   }else{
                    	$query=array(
                    	'cetak_invo' => $this->model->GetInvoice()->result_array(),
                    	'cetak_repinvo' => $this->model->GetReportInv()->result_array(),
                    	
						);
                    }
                    $this->load->view('cetakinvoice', $query);                     		
	    }	
    }
