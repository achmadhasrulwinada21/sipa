<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanPermohonan extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
        	$this->load->library('TPdf');
        	 	}
		
		                           		
	  
                
		
///////////////////////////////////////////////// cetak departemen ////////////////////////
	  public function cetak_permohonantunai($id_form_mhn)
		{
			$query['cetak_permohonantunai'] = $this->db->get_where('tbl_form_mhn',['id_form_mhn'=>$id_form_mhn])->row();
			  $this->load->view('cetak_permohonantunai', $query);                     		
	  }	
                }
				
	