<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cmaterial extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}
	private function _cek_login()
	{

	}

	public function index()
	{
		
			$this->load->model('mmaterial');
			$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),
		    'data_material' => $this->mmaterial->GetMaterial()->result_array()
		);

		$this->template->Display('material/data_material', $data);
	}

	function addmaterial()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),			
	);
		
		$this->template->Display('material/add_material', $data);
	}

	function savedata(){

		
		$nm_material = $_POST['nm_material'];
		$satuan = $_POST['satuan'];		
		$harga = $_POST['harga'];
		//$nourut_layout = $_POST['nourut_layout'];
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");
		$userlog = ($this->session->userdata('nama')
		);

		$data = array(	
			// 'id_uraian'=> $id_uraian,
			'nm_material' => $nm_material,
			'satuan' => $satuan,
			'harga' => $harga,
			'createdby' => $userlog,
			'createddate' => $waktusaatini,
			
			);
		
		$result = $this->model->Simpan('master_material', $data);
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data user BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'cmaterial');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'cmaterial');
		}		
	}

	function editmaterial($id_material){

	//$data_kebutuhan = $this->mkebutuhan->AmbilDataKebutuhan("where id_kebutuhan ='$id_kebutuhan'")->result_array();


	// 	$status_post_array = array();
	// 	foreach($this->model->AmbilDataUser("where id_user = '$kode'")->result_array() as $status){
	// 		$status_post_array[] = $status['status'];
	// 	}
	$this->load->model('mmaterial');
	$grab = $this->mmaterial->GetWhere('master_material',array('id_material' =>$id_material));


	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),			
		'id_material' =>  $grab[0]['id_material'],
		'nm_material' => $grab[0]['nm_material'],
		'satuan' =>  $grab[0]['satuan'],	
		'harga' => $grab[0]['harga'],
		//'data_kebutuhan' => $this->mkebutuhan->AmbilDataKebutuhan("where id_kebutuhan = '$id_kebutuhan' order by id_kebutuhan asc")->result_array()
			
	);
	
	
	$this->template->Display('material/edit_material', $data);


	// 	// echo $data_user[0]['nama_user'];

	}


	
	function updatematerial()
	{
			$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
		);
			
			$this->load->model('mmaterial');
			$id_material = $_POST['id_material'];
			$nm_material = $_POST['nm_material'];
			$satuan = $_POST['satuan'];
			$harga = $_POST['harga'];
						
			$userlog = ($this->session->userdata('nama')
			);
			
		date_default_timezone_set("Asia/Jakarta");
        $waktusaatini =date("d-m-Y H:i:s");	
		$waktuini =date("m-Y");	

        $data = array(
		
			'id_material' =>$id_material,
			'nm_material' =>$nm_material,
			'satuan' =>$satuan,
			'harga' =>$harga,

			'updateby' => $userlog ,
			'updatedate' => $waktusaatini,
			
			);
			
		$where =array( 
		'id_material' => $id_material,
	     );
		
		$res = $this->mmaterial->updatematerial($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'cmaterial');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'cmaterial');
		}
		
  }
		
	

	function hapusmaterial($id_material = 1){
		
	$result = $this->model->Hapus('master_material', array('id_material' => $id_material));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'cmaterial');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'cmaterial');
	}
	}
}

