<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanBarang extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
        	$this->load->library('TPdf');
        	$this->load->model('detbarangm');
		}
			
	
	public function cetak_rincian()
		{
			if (isset($_POST["id_formulir"])) {
                        $id_formulir = $_POST["id_formulir"];
		            $query['cetak_rincian'] = $this->detbarangm->GetDetailbarang("where id_formulir = '$id_formulir'")->result_array();
		            $query['cetak_ttd'] = $this->detbarangm->GetTtd("where id_formulir = '$id_formulir' AND mengetahuidirekturcheck = 'Approve'")->result_array();
          }else{
               	$query['cetak_rincian'] = $this->detbarangm->GetDetailbarang('order by id_formulir asc')->result_array();
               	$query['cetak_ttd'] = $this->detbarangm->GetTtd('order by id_formulir asc')->result_array();
             }
             $this->load->view('cetak_rincian', $query);                     		
	  }	

  }
				
?>