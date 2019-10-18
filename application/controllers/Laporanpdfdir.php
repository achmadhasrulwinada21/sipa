<?php
Class Laporanpdfdir extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('Tpdf');
        $this->_cek_login();
      
        
        //$this->load->view('laporanpdf/report', $data);
    }


    private function _cek_login()
    {
        if(!$this->session->userdata('u_name')){            
            redirect(base_url().'backend');
        }
    }

public function index()
    {
          
  


        $data = array(
            'nama' => $this->session->userdata('nama'), 
            'cabang' => $this->session->userdata('cabang'),
            'report' => $this->model->TampilData('order by periode asc')->result_array(),
        
            'reportbulan' => $this->model->GetDataReport('order by periode asc')->result_array(),
        
);
          


       

       
        $this->template->display('laporanpdf/reportdir', $data);
    }



    function Refresh()
    {    


     $indikatorinput=$_POST["inputtanggalrefresh"];
          
     $inputperiode=$this->input->post('inputtanggalrefresh');  
       
     $fungsi="select sp_getsemuadataall('$inputperiode')";
          
    
          
        
         if($indikatorinput!=''){

            $data = array(  
            'sinkronisasi' =>  $this->db->query($fungsi)->result_array(),
            'nama' => $this->session->userdata('nama'), 
            'cabang' => $this->session->userdata('cabang'),  
          
            'report' => $this->model->TampilData('order by periode asc')->result_array());

            $this->template->display('laporanpdf/reportdir', $data);
         
        }

            else if($indikatorinput==''){

            $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Laporan data  GAGAL diproses karena tahun atau bulan tidak cocok atau tidak diisi.Silakan Periksa Kembali Pilihan Tahun Bulan Anda Klik 'Print PDF'!</strong></div>");
            header('location:'.base_url().'Laporanpdfdir');;
         
        }





        else{

              $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Laporan data  GAGAL diproses karena tahun atau bulan tidak cocok atau tidak diisi.Silakan Periksa Kembali Pilihan Tahun Bulan Anda Klik 'Print PDF'!</strong></div>");
            header('location:'.base_url().'Laporanpdfdir');

        }


       

           

              
       
    }






    function tampil_report(){


   

      $vtanggal=$this->input->post('inputtanggal');  

  



     $data['tampil_report']=$this->model->TampilData('where periode = $vtanggal ')->result_array();



        
         



     
  

 
    }


    


    



    }
