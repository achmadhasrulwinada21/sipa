<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporanfixedasset extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('Tpdf');
        //$this->load->helper('url');
        $this->load->model('model');
    }

     public function cetak_stockopname_fixedasset()
		{
			if (isset($_POST["no_sp"])){
                        $no_sp = $_POST["no_sp"];
			
          $query=array(
                          'cetak_fa' => $this->model->AmbilDataStockOpname("where no_sp = '$no_sp'")->result_array(),
                           'cetak_lampiran' => $this->model->AmbilLampiranFixedAsset("where no_sp = '$no_sp'")->result_array(),
                           'cetak_ttd' => $this->model->AmbilDataStockOpname("where no_sp = '$no_sp' AND approval = 'Approve'")->result_array(),
                          
                    );
                   }else{
                    	$query=array(
                    	'cetak_fa' => $this->model->AmbilDataStockOpname()->result_array(),
                    	'cetak_lampiran' => $this->model->AmbilLampiranFixedAsset()->result_array(),
                      'cetak_ttd' => $this->model->AmbilDataStockOpname()->result_array(),
              
                    );
                    }
                    $this->load->view('cetak_stockopname_fixedasset', $query);                     		
	    }	

}
