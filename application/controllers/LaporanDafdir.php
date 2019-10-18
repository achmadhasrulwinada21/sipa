<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanDafdir extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
        	$this->load->library('TPdf');
        	$this->load->model('komdik');	
        
		}
		
		                           		
	  
                
		
///////////////////////////////////////////////// cetak departemen ////////////////////////
	  public function cetak_daftarhadir()
		{
			if (isset($_POST["kd_form_hdr"])) {
				$kd_form_hdr = $_POST["kd_form_hdr"];

				$query['cetak_daftarhadir'] = $this->komdik->GetDafdir("where kd_form_hdr = '$kd_form_hdr'")->result_array();
				 $query['formulir'] = $this->komdik->GetFormulirMhn("where id_form_mhn = '$kd_form_hdr'")->result_array();
	       
			}else{
				$query['cetak_daftarhadir'] = $this->komdik->GetDafdir()->result_array();
				$query['formulir'] = $this->komdik->GetDafdir()->result_array();
			}

             $this->load->view('cetak_daftarhadir', $query);  

			}
		                  		
       }