<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ttddir extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $role=($this->session->userdata('nama_role'));
        $nama=($this->session->userdata('nama'));
        $data = array(
            'nama' => $this->session->userdata('nama'), 
            'cabang' => $this->session->userdata('cabang'), 
            'data_ttd' => $this->model->GetTtd("where nama_user='$nama' and role='$role' order by idttd desc")->result_array(),
        );

        $this->template->Display('ttddir/data_ttd', $data);
    }


    function addttd()
    {
        $data = array(
            'nama' => $this->session->userdata('nama'), 
            'optuser' => $this->model->AmbilDataUser()->result_array(),
            'optrs' => $this->model->GetRumahSakit()->result_array(),
            'optkode' => $this->model->GetKode()->result_array(),
            'optrole' => $this->model->GetRole()->result_array(),
            'cabang' => $this->session->userdata('cabang'), 
        );
        
        $this->template->Display('ttddir/add_ttd', $data);
    }

    function savedata(){


        $configttd = array(
            'upload_path' => './assets/upload',
            'allowed_types' => 'gif|jpg|JPG|png|jpeg',
            'max_size' => '2048',

        );
        $this->load->library('upload', $configttd); 
        $this->upload->do_upload('file_uploadttd');
        $upload_foto = $this->upload->data();

        $namauser = $_POST['nama_user'];
        $kode_ttd = $_POST['kode_ttd'];
        $tanggal = $_POST['tanggal'];
        $cbgrs = $_POST['cbgrs'];
        $role = $_POST['role'];

        $file_name = $upload_foto['file_name'];

        $bulansaatini =date("m-Y");     
        $dt = new DateTime();


        date_default_timezone_set("Asia/Jakarta");
        //$waktu =date("d-m-Y H:i:s");




        $data = array(  
            // 'id_produk'=> $id_produk,
            'nama_user' => $namauser,
            'kode_ttd' => $kode_ttd,
            'tanggal' => $tanggal,
            'cbgrs' => $cbgrs,
            'role' =>$role,
            'foto' => $file_name ,
           // 'createdate' => $waktu,
            'createby' =>  $this->session->userdata('nama'),
            );
        
        $result = $this->model->Simpan('master_ttd', $data);

        if($result == 1){
            $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data ttd BERHASIL dilakukan.Terima Kasih</strong></div>");
            header('location:'.base_url().'ttddir');
        }else{
            $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
            header('location:'.base_url().'ttddir');
        }       
    }

    function editttd($kode=0){

        $data_ttd = $this->model->AmbilDataMasterTtd("where idttd ='$kode'")->result_array();

        $kodettd_post_array = array();
        foreach($this->model->AmbilDataMasterTtd("where idttd = '$kode'")->result_array() as $kodettd){
            $kodettd_post_array[] = $kodettd['kode_ttd'];
        }

        $cbgrs_post_array = array();
        foreach($this->model->AmbilDataMasterTtd("where idttd = '$kode'")->result_array() as $cbgrs){
         $cbgrs_post_array[] = $cbgrs['cbgrs'];
        }

        $role_post_array = array();
        foreach($this->model->AmbilDataMasterTtd("where idttd = '$kode'")->result_array() as $role){
         $role_post_array[] = $role['role'];
        }


        $data = array(

            'idttd' =>  $data_ttd[0]['idttd'],
            'cabang' => $this->session->userdata('cabang'), 
            'nama' => $this->session->userdata('nama'), 
            'nama_user' =>  $data_ttd[0]['nama_user'],
            //'kode_ttd' => $data_ttd[0]['kode_ttd'],
            'tanggal' => $data_ttd[0]['tanggal'],
            'foto'=> $data_ttd[0]['foto'],

            'kodettd' => $this->model->GetKode()->result_array(),
            'cbgrs' => $this->model->GetRS()->result_array(),
            'role' => $this->model->GetRole()->result_array(),

            'createby' => $data_ttd[0]['createby'],
            'updateby' =>  $this->session->userdata('nama'),
            'createdate' =>  $data_ttd[0]['createdate'],
            'updatedate' => date("Y-m-d H:i:s"),

            'kodettd_post' => $kodettd_post_array,
            'cbgrs_post' => $cbgrs_post_array,
            'role_post' => $role_post_array,
            );

    
        $this->template->Display('ttddir/edit_ttd', $data);



    }

function updatettd(){

        if($_FILES['file_uploadttd']['error'] == 0):
            $configttd = array(
                'upload_path' => './assets/upload',
                'allowed_types' => 'gif|jpg|JPG|png|jpeg',
                'max_size' => '2048',
                
                );
        $this->load->library('upload', $configttd);      
        $this->upload->do_upload('file_uploadttd');
        $upload_foto = $this->upload->data();
        $file_name = $upload_foto['file_name'];
        else:
            $file_name = $this->input->post('foto');
        endif;

        $userlog = (
            $this->session->userdata('nama')
            
        );

        $data = array(
            'idttd' => $this->input->post('idttd'),
            'kode_ttd' => $this->input->post('kode_ttd'),
            'nama_user' => $this->input->post('nama_user'),
            'tanggal' => $this->input->post('tanggal'),
            'cbgrs' => $this->input->post('cbgrs'),
            'role' => $this->input->post('role'),
            'updateby' => $userlog ,
            'updatedate' => date("Y-m-d H:i:s"),
            
            'foto' => $file_name,
            
            );
        

        
         $hasil = $this->model->UpdateTtd($data);
        if($hasil>=0){
            $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
            header('location:'.base_url().'ttddir');
        }else{
            $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
            header('location:'.base_url().'ttddir');
        }
    }


    function hapusttd($kode = 1){
        
        $result = $this->model->Hapus('master_ttd', array('idttd' => $kode));
        if($result == 1){
            $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
            header('location:'.base_url().'ttddir');
        }else{
            $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
            header('location:'.base_url().'ttddir');
        }
    }
}

    
