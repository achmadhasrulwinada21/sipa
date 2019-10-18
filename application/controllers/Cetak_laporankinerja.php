<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cetak_laporankinerja extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
			$this->load->library('Tpdf');
			$this->load->model('m_kinerja');
			}

	public function index()
	{
		$this->load->model('m_kinerja');
		$this->load->model('model');

		if (isset($_POST["tanggal1"]) && isset($_POST["tanggal2"])) {

			$awal=$_POST["tanggal1"];
			$akhir=$_POST["tanggal2"];
        
        $data['data_kinerja'] = $this->m_kinerja->GetSumRealKRS("where tanggal BETWEEN '$awal' AND '$akhir' group by nama_uraiankrs order by nama_uraiankrs desc")->result_array();
      }else{
      	$data['data_kinerja'] = $this->m_kinerja->GetSumRealKRS("group by nama_uraiankrs order by nama_uraiankrs desc")->result_array();
      }
		$data['nama'] = $this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');			
		

			

		$this->template->display('v_kinerja/data_kinerja', $data);
	}



    function search_keywords()
    {
    	$this->load->model('m_kinerja');
        $keyword    =   $this->input->post('keyword');
        $data['data_kinerja']    =   $this->m_kinerja->searchs($keyword);
        $this->template->display('v_kinerja/data_kinerja',$data);
    }

	

  public function cetak_kinerja(){
	$this->load->library('Tpdf');

		if (isset($_POST["tanggal1"]) && isset($_POST["tanggal2"])) {

			$awal=$_POST["tanggal1"];
			$akhir=$_POST["tanggal2"];
        
        $data['cetak_kinerja'] = $this->m_kinerja->GetSumRealKRS("where tanggal BETWEEN '$awal' AND '$akhir' group by nama_uraiankrs order by nama_uraiankrs desc")->result_array();

        $data['tgl'] = $awal;
        $data['tgl2'] = $akhir;

      }else{
      	$data['cetak_kinerja'] = $this->m_kinerja->GetSumRealKRS("group by nama_uraiankrs order by nama_uraiankrs desc")->result_array();

      	$data['tgl'] = $awal;
        $data['tgl2'] = $akhir;
      }
      

	  $this->load->view('v_kinerja/report_kinerja', $data);                     		
	}		


	public function cetak_detheader($periode=0,$kode_rs=0){
		$this->load->library('Tpdf');
  
         $query['data_abks'] = $this->m_kinerja->AmbilTargetKRS("where periode='$periode' and kode_rs='$kode_rs' order by nama_uraiankrs desc")->result_array();
         $query['periode'] = $periode;
         $query['kode_rs'] = $kode_rs;
      
       $this->load->view('v_kinerja/cetak_detheader', $query);                     		
	}	

	public function cetak_detheaderreal($tanggal=0,$kode_rs=0){
		$this->load->library('Tpdf');

         $query['data_abks'] = $this->m_kinerja->AmbilRealKRS("where tanggal='$tanggal' and kode_rs='$kode_rs' order by nama_uraiankrs desc")->result_array();
         $query['tanggal'] = $tanggal;
         $query['kode_rs'] = $kode_rs;
      
       $this->load->view('v_kinerja/cetak_detheaderreal', $query);                     		
	}	
}