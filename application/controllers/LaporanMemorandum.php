<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanMemorandum extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
        	$this->load->library('TPdf');
        $this->load->library('model');
		}
		
		                           		
	public function cetak_memorandum($id_memo_dafdir){
		$data['cetak_memorandum'] = $this->db->get_where('tbl_memo_dafdir',['id_memo_dafdir'=>$id_memo_dafdir])->row();
		 $this->load->view('cetak_memorandum', $data);   
	}
	  
 }

      ?>