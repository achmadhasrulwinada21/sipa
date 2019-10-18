<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ckebutuhan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->_cek_login();
		
	}
	private function _cek_login()
	{
		if(!$this->session->userdata('u_name')){            
			redirect(base_url().'backend');
		}
	}

	
	public function index()
	{
		
			$this->load->model('mkebutuhan');

			$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),
		    'data_kebutuhan' => $this->mkebutuhan->GetKebutuhan()->result_array()
		);

		$this->template->Display('kebutuhan/data_kebutuhan', $data);

	
	}

	function addkebutuhan()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),			
	);
		
		$this->template->Display('kebutuhan/add_kebutuhan', $data);
	}

	function savedata(){

		
		$nama_kebutuhan = $_POST['nama_kebutuhan'];
		$kd_kebutuhan = $_POST['kd_kebutuhan'];		
		//$cdate = $_POST['cdate'];
		$nourut_layout = $_POST['nourut_layout'];
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");
		$userlog = ($this->session->userdata('nama')
		);

		$data = array(	
			// 'id_uraian'=> $id_uraian,
			'nama_kebutuhan' => $nama_kebutuhan,
			'kd_kebutuhan' => $kd_kebutuhan,
			'nourut_layout' => $nourut_layout,
			'createdby' => $userlog,
			'cdate' => $waktusaatini,
			
			);
		
		$result = $this->model->Simpan('master_kebutuhan', $data);
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data user BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'ckebutuhan');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'ckebutuhan');
		}		
	}

	function editkebutuhan($id_kebutuhan){

	//$data_kebutuhan = $this->mkebutuhan->AmbilDataKebutuhan("where id_kebutuhan ='$id_kebutuhan'")->result_array();


	// 	$status_post_array = array();
	// 	foreach($this->model->AmbilDataUser("where id_user = '$kode'")->result_array() as $status){
	// 		$status_post_array[] = $status['status'];
	// 	}
	$this->load->model('mkebutuhan');
	$grab = $this->mkebutuhan->GetWhere('master_kebutuhan',array('id_kebutuhan' =>$id_kebutuhan));


	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),			
		'id_kebutuhan' =>  $grab[0]['id_kebutuhan'],
		'nourut_layout' => $grab[0]['nourut_layout'],
		'nama_kebutuhan' =>  $grab[0]['nama_kebutuhan'],	
		'kd_kebutuhan' => $grab[0]['kd_kebutuhan'],
		//'data_kebutuhan' => $this->mkebutuhan->AmbilDataKebutuhan("where id_kebutuhan = '$id_kebutuhan' order by id_kebutuhan asc")->result_array()
			
	);
	
	
	$this->template->Display('kebutuhan/edit_kebutuhan', $data);




	}


	
	function updatekebutuhan()
	{
			$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
		);
			
			$this->load->model('mkebutuhan');
			$id_kebutuhan = $_POST['id_kebutuhan'];
			$nama_kebutuhan = $_POST['nama_kebutuhan'];
			$kd_kebutuhan = $_POST['kd_kebutuhan'];
			$nourut_layout = $_POST['nourut_layout'];
						
			$userlog = ($this->session->userdata('nama')
			);
			
		date_default_timezone_set("Asia/Jakarta");
        $waktusaatini =date("d-m-Y H:i:s");	
		$waktuini =date("m-Y");	

        $data = array(
		
			'id_kebutuhan' =>$id_kebutuhan,
			'nama_kebutuhan' =>$nama_kebutuhan,
			'kd_kebutuhan' =>$kd_kebutuhan,
			'nourut_layout' =>$nourut_layout,

			'updatedby' => $userlog ,
			'udate' => $waktusaatini,
			
			);
			
		$where =array( 
		'id_kebutuhan' => $id_kebutuhan,
	     );
		
		$res = $this->mkebutuhan->Updatekebutuhan($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'ckebutuhan');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'ckebutuhan');
		}
		
  }
		
	

	function hapuskebutuhan($id_kebutuhan = 1){
		
	$result = $this->model->Hapus('master_kebutuhan', array('id_kebutuhan' => $id_kebutuhan));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'ckebutuhan');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'ckebutuhan');
	}
	}
}

