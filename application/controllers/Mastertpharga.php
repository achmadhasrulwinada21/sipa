<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mastertpharga extends CI_Controller 

{

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('u_name')){
		$this->session->set_flashdata("alerts", "<div class='alerts alert-danger'><strong>Sesi Anda Telah Habis, Silahkan login kembali..</strong></div>");
			redirect('dashboard');

		}	   
	}
	
	 	
	
	public function index()
	{
		
		$this->load->model('mtipeharga');
		 $data['data_tpharga'] = $this->mtipeharga->Gettipeharga("order by idtipeharga desc")->result_array();
         $data['nama'] = $this->session->userdata('nama');
         $data['cabang'] = $this->session->userdata('cabang');	
	
	$this->template->Display('mastertipeharga/data_tpharga', $data);
	}
	
	
	function savedata()
	{
	$this->load->model('mtipeharga');	
          
            $tipe_harga = $_POST['tipe_harga'];
			$userlog = ($this->session->userdata('nama'));
			$datatgl = $this->mtipeharga->Gettipeharga("where tipe_harga='$tipe_harga'")->result_array();
				
		$data = array(
			
			'tipe_harga'=> $tipe_harga,
			'createby' => $userlog ,
			);

		 $pbid = isset($datatgl[0]['tipe_harga']);
		
		if($pbid == $tipe_harga){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Data tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'Mastertpharga');
		}else{
		 
		
		$result = $this->mtipeharga->Simpan_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'Mastertpharga');
		}

		  
	}

function updateharga(){
	 $this->load->model('mtipeharga');
    
    	$data = array(
	'idtipeharga' =>$this->input->post('idtipeharga'),
	'tipe_harga' => $this->input->post('tipe_harga'),
	'updateby' =>  $this->session->userdata('nama'),
	);

	$hasil = $this->mtipeharga->Updateharga($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'Mastertpharga');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'Mastertpharga');
	}
	}

	
		function hapus_item($idtipeharga){
			$this->load->model('mtipeharga');
		  $hapus['idtipeharga'] = $this->uri->segment(3);
	
	    $this->mtipeharga->deleteData_db1("m_tipeharga",$hapus);

        redirect('Mastertpharga');

	
		}	
	
	}
		
	


