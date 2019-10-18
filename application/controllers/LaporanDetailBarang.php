<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanDetailBarang extends CI_Controller {

	public function __construct()
		{	
		
			parent::__construct();
        	$this->load->library('TPdf');
        	$this->load->model('detbarangm');
			$this->load->model('perbarangm');
		}

	  public function cetak_gabung()
		{
			if (isset($_POST["id_formulir"])){
                        $id_formulir = $_POST["id_formulir"];
			
          $query=array(
                          'cetak_detail_barang' => $this->detbarangm->GetDetailbarang("where id_formulir = '$id_formulir'")->result_array(),
                          'cetak_rincian' => $this->detbarangm->GetDetailbarang("where id_formulir = '$id_formulir'")->result_array(),
                          'cetak_formulir_surat' => $this->perbarangm->GetBarang("where id_formulir = '$id_formulir'")->result_array(),
                          'cetak_ttd' => $this->detbarangm->GetTtd("where id_formulir = '$id_formulir' AND mengetahuidirekturcheck = 'Approve'")->result_array(),
                    );
                   }else{
                    	$query=array(
                    	'cetak_detail_barang' => $this->detbarangm->GetBarang()->result_array(),
                    	'cetak_rincian' => $this->detbarangm->GetBarang()->result_array(),
                    	'cetak_formulir_surat' => $this->perbarangm->GetBarang()->result_array(),
                    	'cetak_ttd' => $this->detbarangm->GetTtd()->result_array(),
                    );
                    }
                    $this->load->view('cetak_gabung', $query);                     		
	    }
	  
	  
  }
				
?>