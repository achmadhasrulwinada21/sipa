<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class CetakEksDir extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
			$this->load->library('Tpdf');
			$this->load->model('model');
			}
	

  public function cetak_eks(){

      $this->load->model('FilterReportDir');

    $indikatorinput=$_POST["inputtanggal"];
    $vtanggal = $_POST["inputtanggal"];

    $inputbulan=substr(  $indikatorinput,5,2);
    $inputtahun=substr(  $indikatorinput,0,4);




    $GetDataReport = $this->FilterReportDir->GetFilterDir('v_finaleksekutifreportgabungan',array('periode' => $vtanggal));

     

    
             $data=  $GetDataReport[0]['periode'];


             $tabelbulan=substr($data,5,2);
             $tabeltahun=substr($data,0,4);

      

     

	if (isset($_POST["inputtanggal"])){

      


       
         $query= array(
                          'cetak_eks' => $this->model->TampilData("where periode = '$vtanggal'")->result_array(),
                       
                          
                          );
                   }

                   else{
                    	$query=array(
                    	'cetak_eks' => $this->model->TampilData("where periode = '$vtanggal'")->result_array(),
                    
                    	
                        			);
     
                      
       }
       

      if($indikatorinput==''){
           $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Laporan data  GAGAL diproses karena tahun atau bulan tidak cocok atau tidak diisi.Silakan Periksa Kembali Pilihan Tahun Bulan Anda Klik 'Print PDF'!</strong></div>");
            header('location:'.base_url().'Laporanpdfdir');
        }
     

        if($inputbulan==$tabelbulan){

           $this->load->view('cetak_eksdir', $query); 

        
        } 


       



        if($inputbulan>$tabelbulan){
           $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Laporan data  GAGAL diproses karena tahun atau bulan tidak ada dalam database atau melebihi batas bulan tahun ditetapkan.Silakan Periksa Kembali Pilihan Tahun Bulan Anda Klik 'Print PDF'!</strong></div>");
            header('location:'.base_url().'Laporanpdfdir');
        }

      

        

       
                   		
	}	

 

	
   }
