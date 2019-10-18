<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanPengadaan extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
			$this->load->library('Tpdf');
			$this->load->model('pengadaanm');
		}
	

  public function cetak_pengadaan(){
	if (isset($_POST["no_pks"])) {
      $no_pks = $_POST["no_pks"];
                        			
       $query['cetak_pengadaan'] = $this->pengadaanm->GetPengadaan("where no_pks = '$no_pks'")->result_array();
       }else{
       $query['cetak_pengadaan'] = $this->pengadaanm->GetPengadaan('order by no_pks asc')->result_array();
       }
       $this->load->view('cetak_pengadaan', $query);                     		
	}	


	
   }