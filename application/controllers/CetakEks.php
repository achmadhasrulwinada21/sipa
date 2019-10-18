<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class CetakEks extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
			$this->load->library('TPdf');
			$this->load->model('model');
			}
	

  public function cetak_eks(){
	if (isset($_POST["inputtanggal"])){
         $vtanggal = $_POST["inputtanggal"];

         $query= array(
                          'cetak_eks' => $this->model->TampilData("where periode = '$vtanggal'")->result_array(),
                          'cetak_eksvar' => $this->model->TampilData1("where periode = '$vtanggal'")->result_array(),
                          
                          );
                   }else{
                    	$query=array(
                    	'cetak_eks' => $this->model->TampilData()->result_array(),
                    	'cetak_eksvar' => $this->model->TampilData1()->result_array(),
                    	
                        			);
     // $data=['cetak_eks']=$this->model->TampilData("where periode = '$vtanggal' ")->result_array();
     //  }else{
     //   $data['cetak_eks'] = $this->model->TampilData()->result_array();
       }
       $this->load->view('cetak_eks', $query);                     		
	}	

 

	
   }