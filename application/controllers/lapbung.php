<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lapbung extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
        	$this->load->library('Tpdf');
        	 	}
		
		                           		
	  
                
		
///////////////////////////////////////////////// cetak departemen ////////////////////////
	  public function cetak_bungaa($id_sbunga)
		{
			$query['cetak_bungaa'] = $this->db->get_where('sukubunga',['id_sbunga'=>$id_sbunga])->row();
			  $this->load->view('cetak_bungaa', $query);                     		
	  }	

	   public function cetak_bungaaa($id_sbunga)
		{
			$query['cetak_bungaaa'] = $this->db->get_where('sukubunga',['id_sbunga'=>$id_sbunga])->row();
			  $this->load->view('cetak_bungaaa', $query);                     		
	  }	

                }
				
	