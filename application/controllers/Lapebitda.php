<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class lapebitda extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
        	$this->load->library('Tpdf');
        	$this->load->model('ebitdam');
		}
		
	                 
///////////////////////////////////////////////// cetak  ////////////////////////
	  public function cetak_ebitda()
		{
			if (isset($_POST["periode_awal"])&&isset($_POST["periode_akhir"])&&isset($_POST["namars"])) {
                        $periode_awal = $_POST["periode_awal"];
                        $periode_akhir = $_POST["periode_akhir"];
                        $namars = $_POST["namars"];
		     $query ['data_ebitda'] = $this->ebitdam->Getviewebitdabulan("where periode BETWEEN '$periode_awal' AND '$periode_akhir' and namars='$namars' order by periode asc")->result_array();
			 $query ['data_ebitdatri'] = $this->ebitdam->Getviewebitdatri("where periode BETWEEN '$periode_awal' AND '$periode_akhir' and rumah_sakit='$namars' order by periode asc")->result_array();
			 $query ['data_ebitdatahun'] = $this->ebitdam->Getviewebitdatahun("where periode BETWEEN '$periode_awal' AND '$periode_akhir' and rumah_sakit='$namars' order by periode asc")->result_array();
			 $query['periode_awal'] = $periode_awal;
             $query['periode_akhir'] = $periode_akhir;
             $query['namars'] = $namars;
             }
             $this->load->view('cetak_ebitda', $query);                     		
	  }	


	  public function data_perbandingan()
	{
		$this->load->model('ebitdam');
		$this->load->model('model');

		if (isset($_POST["periode_awal"])&&isset($_POST["periode_akhir"])&&isset($_POST["namars"])) {
                        $periode_awal = $_POST["periode_awal"];
                        $periode_akhir = $_POST["periode_akhir"];
                        $namars = $_POST["namars"];


		     $query ['data_ebitda'] = $this->ebitdam->Getviewebitdabulan("where (periode = '$periode_awal' OR periode = '$periode_akhir') and namars='$namars' order by periode asc")->result_array();

		     $query ['realbul'] = $this->ebitdam->GetChart("where periode = '$periode_awal' AND namars='$namars' order by periode asc")->result_array();
		      $query ['realbul1'] = $this->ebitdam->GetChart("where periode = '$periode_akhir' AND namars='$namars' order by periode asc")->result_array();
		      $query ['targetbul'] = $this->ebitdam->GetChart("where periode = '$periode_akhir' AND namars='$namars' order by periode asc")->result_array();

		     $query ['realtri'] = $this->ebitdam->GetChart1("where periode = '$periode_awal' AND rumah_sakit='$namars' order by periode asc")->result_array();
		      $query ['realtri1'] = $this->ebitdam->GetChart1("where periode = '$periode_akhir' AND rumah_sakit='$namars' order by periode asc")->result_array();
		      $query ['targettri'] = $this->ebitdam->GetChart1("where periode = '$periode_akhir' AND rumah_sakit='$namars' order by periode asc")->result_array();

		      $query ['targetth'] = $this->ebitdam->GetChart2("where periode BETWEEN '$periode_awal' AND '$periode_akhir' AND rumah_sakit='$namars' order by periode asc")->result_array();
		      $query ['realth'] = $this->ebitdam->GetChart2("where periode BETWEEN '$periode_awal' AND '$periode_akhir' AND rumah_sakit='$namars' order by periode asc")->result_array();
		      $query ['periode'] = $this->ebitdam->GetChart2("where periode BETWEEN '$periode_awal' AND '$periode_akhir' AND rumah_sakit='$namars' order by periode asc")->result_array();

		     


		     
			 $query ['data_ebitdatri'] = $this->ebitdam->Getviewebitdatri("where (periode = '$periode_awal' OR periode = '$periode_akhir') and rumah_sakit='$namars' order by periode asc")->result_array();
			 $query ['data_ebitdatahun'] = $this->ebitdam->Getviewebitdatahun("where (periode = '$periode_awal' OR periode = '$periode_akhir') and rumah_sakit='$namars' order by periode asc")->result_array();
			 $query['periode_awal'] = $periode_awal;
             $query['periode_akhir'] = $periode_akhir;
             $query['namars'] = $namars;
             }
			

		$this->template->display('ebitda/data_perbandingan', $query);
	}


	public function cetak_exel()
	{
		$this->load->model('ebitdam');
		$this->load->model('model');

		if (isset($_POST["periode_awal"])&&isset($_POST["periode_akhir"])&&isset($_POST["namars"])) {
                        $periode_awal = $_POST["periode_awal"];
                        $periode_akhir = $_POST["periode_akhir"];
                        $namars = $_POST["namars"];


		     $query ['data_ebitda'] = $this->ebitdam->Getviewebitdabulan("where (periode = '$periode_awal' OR periode = '$periode_akhir') and namars='$namars' order by periode asc")->result_array();

		     $query ['realbul'] = $this->ebitdam->GetChart("where periode = '$periode_awal' AND namars='$namars' order by periode asc")->result_array();
		      $query ['realbul1'] = $this->ebitdam->GetChart("where periode = '$periode_akhir' AND namars='$namars' order by periode asc")->result_array();
		      $query ['targetbul'] = $this->ebitdam->GetChart("where periode = '$periode_akhir' AND namars='$namars' order by periode asc")->result_array();

		     $query ['realtri'] = $this->ebitdam->GetChart1("where periode = '$periode_awal' AND rumah_sakit='$namars' order by periode asc")->result_array();
		      $query ['realtri1'] = $this->ebitdam->GetChart1("where periode = '$periode_akhir' AND rumah_sakit='$namars' order by periode asc")->result_array();
		      $query ['targettri'] = $this->ebitdam->GetChart1("where periode = '$periode_akhir' AND rumah_sakit='$namars' order by periode asc")->result_array();

		      $query ['targetth'] = $this->ebitdam->GetChart2("where periode BETWEEN '$periode_awal' AND '$periode_akhir' AND rumah_sakit='$namars' order by periode asc")->result_array();
		      $query ['realth'] = $this->ebitdam->GetChart2("where periode BETWEEN '$periode_awal' AND '$periode_akhir' AND rumah_sakit='$namars' order by periode asc")->result_array();
		      $query ['periode'] = $this->ebitdam->GetChart2("where periode BETWEEN '$periode_awal' AND '$periode_akhir' AND rumah_sakit='$namars' order by periode asc")->result_array();

		     


		     
			 $query ['data_ebitdatri'] = $this->ebitdam->Getviewebitdatri("where (periode = '$periode_awal' OR periode = '$periode_akhir') and rumah_sakit='$namars' order by periode asc")->result_array();
			 $query ['data_ebitdatahun'] = $this->ebitdam->Getviewebitdatahun("where (periode = '$periode_awal' OR periode = '$periode_akhir') and rumah_sakit='$namars' order by periode asc")->result_array();
			 $query['periode_awal'] = $periode_awal;
             $query['periode_akhir'] = $periode_akhir;
             $query['namars'] = $namars;
             }
			

		$this->template->display('ebitda/cetak_exel_ebitda', $query);
	}



	public function cetak_perbandingan()
	{
		$this->load->model('ebitdam');
		$this->load->model('model');

		if (isset($_POST["periode_awal"])&&isset($_POST["periode_akhir"])&&isset($_POST["namars"])) {
                        $periode_awal = $_POST["periode_awal"];
                        $periode_akhir = $_POST["periode_akhir"];
                        $namars = $_POST["namars"];


		     

		     $query ['realbulan'] = $this->ebitdam->GetChart("where periode = '$periode_awal' AND namars='$namars' order by periode asc")->result_array();
		      $query ['realbulan1'] = $this->ebitdam->GetChart("where periode = '$periode_akhir' AND namars='$namars' order by periode asc")->result_array();
		      $query ['targetbulan'] = $this->ebitdam->GetChart("where periode = '$periode_akhir' AND namars='$namars' order by periode asc")->result_array();

		     $query ['realtriw'] = $this->ebitdam->GetChart1("where periode = '$periode_awal' AND rumah_sakit='$namars' order by periode asc")->result_array();
		      $query ['realtriw1'] = $this->ebitdam->GetChart1("where periode = '$periode_akhir' AND rumah_sakit='$namars' order by periode asc")->result_array();
		      $query ['targettrwi'] = $this->ebitdam->GetChart1("where periode = '$periode_akhir' AND rumah_sakit='$namars' order by periode asc")->result_array();

		      $query ['targetthn'] = $this->ebitdam->GetChart2("where periode BETWEEN '$periode_awal' AND '$periode_akhir' AND rumah_sakit='$namars' order by periode asc")->result_array();
		      $query ['realthn'] = $this->ebitdam->GetChart2("where periode BETWEEN '$periode_awal' AND '$periode_akhir' AND rumah_sakit='$namars' order by periode asc")->result_array();
		      $query ['periodeth'] = $this->ebitdam->GetChart2("where periode BETWEEN '$periode_awal' AND '$periode_akhir' AND rumah_sakit='$namars' order by periode asc")->result_array();

		     


		     $query ['data_ebitda'] = $this->ebitdam->Getviewebitdabulan("where (periode = '$periode_awal' OR periode = '$periode_akhir') and namars='$namars' order by periode asc")->result_array();
			 $query ['data_ebitdatri'] = $this->ebitdam->Getviewebitdatri("where (periode = '$periode_awal' OR periode = '$periode_akhir') and rumah_sakit='$namars' order by periode asc")->result_array();
			 $query ['data_ebitdatahun'] = $this->ebitdam->Getviewebitdatahun("where (periode = '$periode_awal' OR periode = '$periode_akhir') and rumah_sakit='$namars' order by periode asc")->result_array();
			 $query['periode_awal'] = $periode_awal;
             $query['periode_akhir'] = $periode_akhir;
             $query['namars'] = $namars;
             }
			

		$this->template->display('ebitda/cetak_perbandingan', $query);
	}
                }





             

