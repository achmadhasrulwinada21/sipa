<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanBkon extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
        	$this->load->library('TPdf');
        	$this->load->model('komdik');
			$this->load->model('konfirmpesertam');
		    $this->load->model('konsumsim');
        	 	}
		                    		
	  
                
		
///////////////////////////////////////////////// cetak departemen ////////////////////////
	  public function cetak_bkon()
		{
			if (isset($_POST["id_memo_dafdir"])) {
                $id_memo_dafdir = $_POST["id_memo_dafdir"];
        
		$query['memo_dafdir'] = $this->komdik->GetMemoDafdir("where id_memo_dafdir = '$id_memo_dafdir'")->result_array();
       $query['peserta'] = $this->konfirmpesertam->GetKonfirmpesertav("where kode_peserta = '$id_memo_dafdir'")->result_array();
	   $query['konsumsi'] = $this->konsumsim->GetKonsumsiv("where kode_kons = '$id_memo_dafdir'")->result_array();
        
        $query['formulir'] = $this->komdik->GetFormulirMhn("where id_form_mhn = '$id_memo_dafdir'")->result_array();
	       
	   }
       $this->load->view('cetak_bkon', $query);                             
    }    
                }
				
