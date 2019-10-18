<?php
class Privilege



 extends CI_Controller{
    
    function __construct() {
        parent::__construct();
    }
    
    function index() {       
        $data['record']=  $this->db->get('v_hakaksesfullaplikasi')->result_array();
     
        $this->template->display('privilege/data_privilege',$data);
    }
    
    function add() {

        date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d-m-Y H:i:s");

            $userlog = (
            $this->session->userdata('nama'));


        if(isset($_POST['submit'])) {
            $data   =   array(  
                                'role'      =>  $_POST['role'],
                                'menu'  =>  $_POST['namamenu'],
                                'kat_menu'=>$_POST['kat_menu'],
                                'view'  =>  $_POST['view'],
                                'add'  =>  $_POST['add'],
                                'edit'  =>  $_POST['edit'],
                                'delete'  =>  $_POST['delete'],
                                'approval'  =>  $_POST['approval'],
                                'createdby' => $userlog ,
                                'createddate' =>  $waktu
                            );

            $result=$this->db->insert('tb_privilege',$data);


        if($result>=0){
            $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>  Saving data BERHASIL di lakukan</strong></div>");
            header('location:'.base_url().'user');
        }else{
            $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
            header('location:'.base_url().'user');
        }           redirect('privilege');
        }
        else {
             $data['viewrole']=$this->db->get_where('master_role')->result();   
             $data['record']=$this->db->get_where('tb_menu', array('kat_menu' =>0))->result();   
             $data['viewmenu']=$this->db->get_where('tb_menu')->result();           
            $this->template->display('privilege/add_privilege',$data);
        }
  

    }
    
    function edit()
    {

            date_default_timezone_set("Asia/Jakarta");
            $waktu =date("d-m-Y H:i:s");

            $userlog = (
            $this->session->userdata('nama'));


        if(isset($_POST['submit']))
        {
            $data   =   array(  

                                'role'      =>  $_POST['role'],
                                'menu'  =>  $_POST['namamenu'],
                                'kat_menu'  =>  $_POST['kepalamenu'],
                                'view'  =>  $_POST['view'],
                                'add'  =>  $_POST['add'],
                                'edit'  =>  $_POST['edit'],
                                'delete'  =>  $_POST['delete'],
                                'approval'  =>  $_POST['approval'],
                                'updatedby' => $userlog ,
                                'updateddate' =>  $waktu);

            $this->db->where('id_privilege',$_POST['id']);
            $result = $this->db->update('tb_privilege',$data);

            if($result>=0){
            $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
            header('location:'.base_url().'user');
        }else{
            $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
            header('location:'.base_url().'user');
        }

            redirect('privilege');
        }
        else {
            $id= $this->uri->segment(3);
            $data['record']=  $this->db->get_where('v_hakaksesfullaplikasi',array('id_privilege'=> $id))->row_array();
            $data['viewrole']=$this->db->get_where('master_role')->result();  
            $data['viewmenu']=$this->db->get_where('tb_menu')->result(); 
            $data['recordmenu']=$this->db->get_where('tb_menu', array('kat_menu' =>0))->result();   
    
          


            $this->template->display('privilege/edit_privilege',$data);
        }
    }
    
    
    function delete($id){
		$this->db->where('id_privilege',$id);
		$this->db->delete('tb_privilege');
       	redirect('privilege');

    }
}