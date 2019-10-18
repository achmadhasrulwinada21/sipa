<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanFormulir extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
        	$this->load->library('TPdf');
        	$this->load->model('perbarangm');
        	$this->load->model('detbarangm');
		}
		
	public function cetak_formulir_surat($id_formulir){
	if (isset($_POST["id_formulir"])){
		$id_formulir = $_POST["id_formulir"];
		
		$data['cetak_formulir_surat'] = $this->perbarangm->GetBarang("where id_formulir = '$id_formulir'")->result_array();
		$data['cetak_ttd'] = $this->detbarangm->GetTtd("where id_formulir = '$id_formulir' AND mengetahuidirekturcheck = 'Approve_dir' OR mengetahuidirekturcheck = 'Approve_mk'")->result_array();
		$data['cetak_detail_barang'] = $this->detbarangm->GetDetailbarang("where id_formulir = '$id_formulir'")->result_array();
		$data['cetak_rincian'] = $this->detbarangm->GetDetailbarang("where id_formulir = '$id_formulir'")->result_array();
	}
	
	else{
		$data['cetak_formulir_surat'] = $this->perbarangm->GetBarang("where id_formulir = '$id_formulir'")->result_array();
		$data['cetak_ttd'] = $this->detbarangm->GetTtd("where id_formulir = '$id_formulir' AND mengetahuidirekturcheck = 'Approve_dir' OR mengetahuidirekturcheck = 'Approve_mk'")->result_array();
		$data['cetak_detail_barang'] = $this->detbarangm->GetDetailbarang("where id_formulir = '$id_formulir'")->result_array();
		$data['cetak_rincian'] = $this->detbarangm->GetDetailbarang("where id_formulir = '$id_formulir'")->result_array();
		
		 }
		//$data['cetak_formulir_surat'] = $this->perbarangm->GetBarang()->result_array();
		//$data['cetak_ttd'] = $this->detbarangm->GetTtd('order by id_formulir asc')->result_array();
		//$data['cetak_detail_barang'] = $this->detbarangm->GetDetailbarang()->result_array();
		//$data['cetak_rincian'] = $this->detbarangm->GetDetailbarang('order by id_formulir asc')->result_array();
		$this->load->view('cetak_formulir_surat', $data);   
	}
		 
		//if (isset($_POST["id_formulir"])){
         //               $id_formulir = $_POST["id_formulir"];
			
        // $data=array(
                         // 'cetak_detail_barang' => $this->detbarangm->GetDetailbarang("where id_formulir = '$id_formulir'")->result_array(),
                          //'cetak_rincian' => $this->detbarangm->GetDetailbarang("where id_formulir = '$id_formulir'")->result_array(),
                          //'cetak_formulir_surat' => $this->perbarangm->GetBarang("where id_formulir = '$id_formulir'")->result_array(),
                         // 'cetak_ttd' => $this->detbarangm->GetTtd("where id_formulir = '$id_formulir' AND mengetahuidirekturcheck = 'Approve'")->result_array(),
        //            );
        //           }else{
        //            	$data=array(
         //           	//'cetak_detail_barang' => $this->detbarangm->GetBarang()->result_array(),
                    	//'cetak_rincian' => $this->detbarangm->GetBarang()->result_array(),
                    	//'cetak_formulir_surat' => $this->perbarangm->GetBarang()->result_array(),
                    	//'cetak_ttd' => $this->detbarangm->GetTtd()->result_array(),
        //            );
      
		
	
	
		
	
		
	//	public function cetak_formulir_surat($id_formulir)     
	//	{
	//		$query['cetak_formulir_surat'] = $this->db->get_where('tbl_formulir',['id_formulir'=>$id_formulir])->result_array();
	//		$query['cetak_ttd'] = $this->detbarangm->GetTtd("where id_formulir = '$id_formulir' AND mengetahuidirekturcheck = 'Approve'")->result_array();
	//		$query['cetak_ttd'] = $this->db->get_where('tbl_formulir',['id_formulir'=>$id_formulir])->row();
	//		$this->load->view('cetak_formulir_surat', $query);  
	//	}
	  
                
		
///////////////////////////////////////////////// cetak departemen ////////////////////////
	//  public function cetak_formulir_surat()
	//	{
	//		if (isset($_POST["no_formulir"])) {
    //                   $no_formulir = $_POST["no_formulir"];
	//	            $query['cetak_formulir_surat'] = $this->perbarangm->GetBarang("where no_formulir = '$no_formulir'")->result_array();
	//	            $query['cetak_ttd'] = $this->detbarangm->GetTtd("where no_formulir = '$no_formulir' AND mengetahuidirekturcheck = 'Approve'")->result_array();
    //      }else{
    //           	$query['cetak_formulir_surat'] = $this->perbarangm->GetBarang('order by no_formulir asc')->result_array();
    //           	$query['cetak_ttd'] = $this->detbarangm->GetTtd('order by no_formulir asc')->result_array();
    //         }
    //         $this->load->view('cetak_formulir_surat', $query);                     		
	//  }	
                
		
	//	public function cetak_formulir($id_formulir){
	//	$data['cetak_formulir'] = $this->perbarangm->GetBarang('tbl_formulir',['id_formulir'=>$id_formulir])->result_array();
	//	$data['cetak_ttd'] = $this->detbarangm->GetTtd("where no_formulir = '$no_formulir' AND mengetahuidirekturcheck = 'Approve'")->result_array();
	//	 $this->load->view('cetak_formulir', $data);   
	//		}
			
	//	public function cetak_formulir()
	//	{
	//		if (isset($_POST["id_formulir"])) {
    //                    $id_formulir = $_POST["id_formulir"];
	//	            $data['cetak_formulir'] = $this->perbarangm->GetBarang("where id_formulir = '$id_formulir'")->result_array();
	//	            $data['cetak_ttd'] = $this->detbarangm->GetTtd("where id_formulir = '$id_formulir' AND mengetahuidirekturcheck = 'Approve'")->result_array();
     //     }else{
     //          	$data['cetak_formulir'] = $this->perbarangm->GetBarang('order by id_formulir asc')->result_array();
     //          	$data['cetak_ttd'] = $this->detbarangm->GetTtd('order by id_formulir asc')->result_array();
      //       }
     //        $this->load->view('cetak_formulir', $data);                     		
	 // }

	  
	
	}
	?>