<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Komponenbiaya extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	

	public function index()
	{		
		$this->load->model('m_komponenbiaya');
		$data = array
		(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),
			'data_komponen' => $this->m_komponenbiaya->GetKomponenBiaya()->result_array()
		);
		$this->template->Display('komponenbiaya/data_komponen',$data);
		
	}

	function addkomponenbiaya()
	{
		$data = array
		(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),			
		);
		$this->template->Display('komponenbiaya/add_komponenbiaya',$data);
		//$this->load->view('komponenbiaya/add_komponenbiaya', $data);
	}

	function savedata()
	{				   
		$this->load->model('m_komponenbiaya');				
		$kodebiaya  = $_POST['kodebiaya'];
		$komponenbiaya = $_POST['komponenbiaya'];
		//$userlog = ($this->session->userdata('nama')
		//);
		date_default_timezone_set("Asia/Jakarta");
		//$waktusaatini =date("d-m-Y H:i:s");				
	
		$data = array
		(	 		
	 		'kodebiaya' =>$kodebiaya,
	 		'komponenbiaya' =>$komponenbiaya,	 		
	 		//'createdby' =>$userlog,	 		
			//'createddate' => $waktusaatini,
	 		//'createddate' => $waktu,
			'createdby' =>  $this->session->userdata('nama'),
			
		);
				 								
		$result = $this->m_komponenbiaya->Simpan('masterkomponenbiaya', $data);
		if($result == 1)
		{
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'komponenbiaya');
		}else
		{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_ul().'komponenbiaya');
		}					
	 }

	function editkomponenbiaya($kode=0)
	{
		$this->load->model('m_komponenbiaya');
		$data_komponen = $this->m_komponenbiaya->AmbilDatakomponen("where id_komponenbiaya ='$kode'")->result_array();
	
		$data = array
		(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),			
			'id_komponenbiaya' =>  $data_komponen[0]['id_komponenbiaya'],			
			'kodebiaya' => $data_komponen[0]['kodebiaya'],
			'komponenbiaya' =>  $data_komponen[0]['komponenbiaya'],			
			'data_komponen' => $this->m_komponenbiaya->AmbilDatakomponen("where id_komponenbiaya = '$kode' order by id_komponenbiaya asc")->result_array()			
		);
		$this->template->Display('komponenbiaya/edit_komponenbiaya',$data);
		//$this->load->view('komponenbiaya/edit_komponenbiaya', $data);
	}
	
	function updatekomponenbiaya()
	{
		$data = array
		(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
		);
			
		$this->load->model('m_komponenbiaya');
		$id_komponenbiaya = $_POST['id_komponenbiaya'];
		$komponenbiaya = $_POST['komponenbiaya'];
		$kodebiaya = $_POST['kodebiaya'];									
		$userlog = ($this->session->userdata('nama'));
			
		date_default_timezone_set("Asia/Jakarta");
                $waktusaatini =date("Y-m-d H:i:s");	
		$waktuini =date("Y-m");	

        $data = array
		(		
			'id_komponenbiaya' =>$id_komponenbiaya,
			'komponenbiaya' =>$komponenbiaya,
			'kodebiaya' =>$kodebiaya,			
			'updatedby' => $userlog ,
                        'updateddate' =>$waktusaatini		
		);
			
		$where =array
		( 
			'id_komponenbiaya' => $id_komponenbiaya,
	    );
		
		$res = $this->m_komponenbiaya->Updatekomponenbiaya($data);
		if($res>=0)
		{
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'komponenbiaya');
		}else
		{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'komponenbiaya');
		}		
	}

	function hapuskomponenbiaya($id_komponenbiaya = 1)
	{	
		//$this->load->model('m_komponenbiaya');
		$result = $this->model->Hapus('masterkomponenbiaya', array('id_komponenbiaya' => $id_komponenbiaya));
		if($result == 1)
		{
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'komponenbiaya');
		}else
		{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'komponenbiaya');
		}
	}
}

