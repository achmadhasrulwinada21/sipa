<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporanprodukob extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
			$this->load->library('Tpdf');
			$this->load->model('produkom');
		}
	

  public function cetak_produkob($idpr,$pabrikid){

	   
	   $query['header'] = $this->db->get_where('v_produkos',['idpr'=>$idpr])->row();                      			
           $query['detail'] = $this->produkom->Getprodukmsp("where koded_prod='$idpr' and pabrikid='$pabrikid' order by s_kode asc")->result_array();
      
       $this->load->view('cetak_produkob', $query);                     		
	}	


	
   }
