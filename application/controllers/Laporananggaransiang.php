<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporananggaransiang extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
			$this->load->library('Tpdf');
			$this->load->model('anggaranbiayaklinik');
		}
	

  public function cetak_anggarankliniksian($idacara){

	   
	   $query['header'] = $this->db->get_where('tb_header_acara',['idacara'=>$idacara])->row();                      			
       $query['detail'] = $this->anggaranbiayaklinik->GetAnggaranBiayaKlinik("where idacara='$idacara' order by sesi,kode_acara asc")->result_array();
      
       $this->load->view('cetak_anggarankliniksian', $query);                     		
	}	


	
   }