<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
        	$this->load->library('TPdf');
			$this->load->model('cisim');
			$this->load->model('cisimm');
			$this->load->model('descm');
			$this->load->model('detailm');
			$this->load->model('machinem');
			$this->load->model('moneym');
		}

		 public function cetak_gab()
		{
			if (isset($_POST["bulanini"])){
                        $tanggal = $_POST["bulanini"];
			
          $query=array(
                          'cetak_cisi' => $this->cisim->Getcisi("where tanggal = '$tanggal'")->result_array(),
                          'cetak_cisii' => $this->cisimm->Getcisi("where tanggal = '$tanggal'")->result_array(),
                          'cetak_desc' => $this->descm->GetDesc("where tanggal = '$tanggal'")->result_array(),
                          'cetak_detail' => $this->detailm->GetDetail("where tanggal = '$tanggal'")->result_array(),
                          'cetak_machine' => $this->machinem->GetMachine("where tanggal = '$tanggal'")->result_array(),
                          'cetak_keuangan' => $this->moneym->GetMoney("where tanggal = '$tanggal'")->result_array(),
                    );
                   }else{
                    	$query=array(
                    	'cetak_cisi' => $this->cisim->Getcisi()->result_array(),
                    	'cetak_cisii' => $this->cisimm->Getcisi()->result_array(),
                    	'cetak_desc' => $this->descm->GetDesc()->result_array(),
                    	'cetak_detail' => $this->detailm->GetDetail()->result_array(),
                    	'cetak_machine' => $this->machinem->GetMachine()->result_array(),
                    	'cetak_keuangan' => $this->moneym->GetMoney()->result_array(),
                    );
                    }
                    $this->load->view('cetak_gab', $query);                     		
	    }	
    }