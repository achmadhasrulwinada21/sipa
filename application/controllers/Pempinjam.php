<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pempinjam extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $this->load->model('Pempinjamm');

        $data = array(
            'nama' => $this->session->userdata('nama'), 
            'cabang' => $this->session->userdata('cabang'), 
            'data_pinjam' => $this->Pempinjamm->GetPinjam("order by idpinjam asc")->result_array(),
        );

        $this->template->Display('peminjam/data_pinjam', $data);
    }


    function addkon()
    {
        $data = array(
            'nama' => $this->session->userdata('nama'), 
            'optuser' => $this->model->AmbilDataUser()->result_array(),
            'optrs' => $this->model->GetRumahSakit()->result_array(),
            'optkode' => $this->model->GetKode()->result_array(),
            'optrole' => $this->model->GetRole()->result_array(),
            'cabang' => $this->session->userdata('cabang'), 
        );
        
        $this->template->Display('peminjam/add_pinjam', $data);
    }

    function savedata(){

       $this->load->model('Pempinjamm');
        $kodepinjam = $_POST['kode_pinjam'];
        $pemberipinjaman = $_POST['pemberi_pinjaman'];
        $dt = new DateTime();
        date_default_timezone_set("Asia/Jakarta");
        $waktu =date("Y-m-d H:i:s");

        $data = array(  
            'kode_pinjam' => $kodepinjam,
            'pemberi_pinjaman' => $pemberipinjaman,
            'createdate' => $waktu,
            'createby' =>  $this->session->userdata('nama'),
            );
        
        $result = $this->Pempinjamm->Simpan('pemberi_pinjaman', $data);

        if($result == 1){
            $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
            header('location:'.base_url().'Pempinjam');
        }else{
            $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
            header('location:'.base_url().'Pempinjam');
        }       
    }

    function editpinjam($kode=0){

          $this->load->model('Pempinjamm');

        $data_pinjam = $this->Pempinjamm->GetPinjam("where idpinjam ='$kode'")->result_array();

             $data = array(
       
            'cabang' => $this->session->userdata('cabang'), 
            'nama' => $this->session->userdata('nama'), 
            'idpinjam' =>  $data_pinjam[0]['idpinjam'],
            'kode_pinjam' =>  $data_pinjam[0]['kode_pinjam'],
            'pemberi_pinjaman' => $data_pinjam[0]['pemberi_pinjaman'],
            'createby' => $data_pinjam[0]['createby'],
            'updateby' =>  $this->session->userdata('nama'),
            'createdate' =>  $data_pinjam[0]['createdate'],
            'updatedate' => date("Y-m-d H:i:s"),
            );

    
        $this->template->Display('peminjam/edit_pinjam', $data);



    }

function updatepinjam(){
     $this->load->model('Pempinjamm');
        $userlog = (
            $this->session->userdata('nama')
            
        );

        $data = array(
            'idpinjam' => $this->input->post('idpinjam'),
            'kode_pinjam' => $this->input->post('kode_pinjam'),
            'pemberi_pinjaman' => $this->input->post('pemberi_pinjaman'),
            'updateby' => $userlog ,
            'updatedate' => date("Y-m-d H:i:s"),        
            );
        

        
         $hasil = $this->Pempinjamm->UpdatePinjam($data);
        if($hasil>=0){
            $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
            header('location:'.base_url().'Pempinjam');
        }else{
            $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
            header('location:'.base_url().'Pempinjam');
        }
    }


    function hapuspinjam($kode = 1){
        $this->load->model('Pempinjamm');
        $result = $this->Pempinjamm->Hapus('pemberi_pinjaman', array('idpinjam' => $kode));
        if($result == 1){
            $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
            header('location:'.base_url().'Pempinjam');
        }else{
            $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
            header('location:'.base_url().'Pempinjam');
        }
    }
}

    
