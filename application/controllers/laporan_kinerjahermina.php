<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_kinerjahermina extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
			$this->load->library('TPdf');
			$this->load->model('kinerjars');
			}
	

  public function cetak_kinerja(){
	if (isset($_POST["inputtanggal"])){
        $vtanggal = $_POST["inputtanggal"];
		//$d['fields'] = $this->db->list_fields('kinerja_rs');
        $query= array(
                        'cetak_kinerja' => $this->kinerjars->getKrs("where periode = '$vtanggal'")->result_array(),
                          //'cetak_eksvar' => $this->model->TampilData1("where periode = '$vtanggal'")->result_array(),                         
                       );
                   }else
		
		{
			$query=array(
				'cetak_kinerja' => $this->kinerjars->getKrs()->result_array(),
			);
		}
      

	  $this->load->view('cetak_kinerjahermina', $query);                     		
	}		
}