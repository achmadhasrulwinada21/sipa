<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanTransaksiEksDir2 extends CI_Controller {
	

	  function __construct() {
        parent::__construct();
        $this->load->library('TPdf');
        $this->_cek_login();
        $this->load->model('transaksim');
      
        
        //$this->load->view('laporanpdf/report', $data);
    }




	
	public function cetakdir2()
	{
		if (isset($_POST["inputtanggal"]))
		{
			$vtanggal = $_POST["inputtanggal"];
												
		   $query['cetak_eks'] = $this->transaksim->Getmastereksekutif("where periode = '$vtanggal'")->result_array();
		}
		else
		{
		   $query['cetak_eks'] = $this->transaksim->Getmastereksekutif()->result_array();
		}
		   $this->load->view('cetakTransaksiEksDir', $query);                             
	}

}