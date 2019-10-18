<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporansurgaspdf extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('Tpdf');
        //$this->load->helper('url');
        $this->load->model('model');
    }

	public function cetak_surgas()
		{
			if (isset($_POST["id_stpd"])){
                        $id_stpd = $_POST["id_stpd"];
			
          $query=array(
                          'cetaksurgas' => $this->model->getsurat("where id_stpd = '$id_stpd'")->result_array(),
                          'cetaksurgase' => $this->model->getsurate("where id_bpd = '$id_stpd'")->result_array(),                         
                    );
                   }else{
                    	$query=array(
                    	'cetaksurgas' => $this->model->getsurat()->result_array(),
                    	'cetaksurgase' => $this->model->getsurat1()->result_array(),                	
                    );
                   }
                    $this->load->view('cetak_surgas', $query);                     		
	    }
		
    //public function cetak_surgas(){
    //if (isset($_POST["no"])) {
    //  $no = $_POST["no"];
                                    
    //   $query['cetaksurgas'] = $this->model->getsurat("where kode_kom = '$no'")->result_array();
     //  }else{
    //   $query['cetaksurgas'] = $this->model->getsurat('order by no asc')->result_array();
     //  }
       //$this->load->view('cetak_surgas', $query);                             
   // }    

}
