<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class memo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			'data_memo' => $this->model->GetMemo("order by id_memo asc")->result_array(),
		);

		$this->template->Display('memo/data_memo', $data);
	}

	function addmemo()
	{
		$this->load->model('model');
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'optPemohon' => $this->model->GetDepartemen()->result_array(),
			// 'optUraian' => $this->model->GetMemo()->result_array(),
			'cabang' => $this->session->userdata('cabang'),	
		);
		
		$this->template->Display('memo/add_memo', $data);
	}

	function savememo(){
		$config = array(
			'upload_path' => './assets/upload',
			'allowed_types' => 'gif|jpg|JPG|png',
			'max_size' => '2048',

		);
		$this->load->library('upload', $config);	
		$this->upload->do_upload('file_upload');
		$upload_data = $this->upload->data();
 
        // $id_tr = $_POST['id_tr'];
        //$id_memo = $_POST['id_memo'];
		$tujuan = $_POST['tujuan'];
		$dari = $_POST['dari'];
		$tanggal = $_POST['tanggal'];		
		$perihal = $_POST['perihal'];
		$untuk = $_POST['untuk'];
		$deskripsi = $_POST['deskripsi'];		
		$approval = $_POST['approval'];
		$pic = $_POST['pic'];
		//$ttd_pemohon = $_POST['ttd_pemohon'];

		$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
	    $waktu =date("d-m-Y H:i:s");

		$data = array(	  	
			
			// 'id_tr' => $id_tr,
			'tujuan'=> $tujuan,
			'dari' => $dari,
			'tanggal' => $tanggal,
			'perihal' => $perihal,
			'untuk' => $untuk,
			'deskripsi' => $deskripsi,
			'approval' => $approval,
			'pic' => $pic,
			'ttd_pemohon' => $ttd_pemohon,
			'createdate' => $waktu,
			'createby' =>  $this->session->userdata('nama'),

			);


		$result = $this->model->Simpan('inv_memo', $data);
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'memo');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'memo');
		}		
	}

	function editmemo($kode = 0){		
		$data_memo = $this->model->AmbilDataMemo("where id_memo = '$kode'")->result_array();
		$for_ttdpemohon = array();
		foreach($this->model->AmbilDataMemo("where id_memo = '$kode'")->result_array() as $role){
			$for_ttdpemohon[] = $role['ttd_pemohon'];
		}

		$for_tujuan = array();
		foreach($this->model->AmbilDataMemo("where id_memo = '$kode'")->result_array() as $role){
			$for_tujuan[] = $role['tujuan'];
		}

		$for_dari = array();
		foreach($this->model->AmbilDataMemo("where id_memo = '$kode'")->result_array() as $role){
			$for_dari[] = $role['dari'];
		}


		$data = array(
			'id_memo' => $data_memo[0]['id_memo'],	
			// 'tujuan' => $data_memo[0]['tujuan'],
			// 'dari' => $data_memo[0]['dari'],
			'tanggal' => $data_memo[0]['tanggal'],
			'perihal' => $data_memo[0]['perihal'],
			'untuk' => $data_memo[0]['untuk'],
			'deskripsi' => $data_memo[0]['deskripsi'],
			'approval' => $data_memo[0]['approval'],
			'pic' => $data_memo[0]['pic'],
			'id_mengetahui' => $this->model->AmbilDataTtd()->result_array(),
			'for_ttdpemohon' => $for_ttdpemohon,
			'id_tujuan' => $this->model->GetDepartemen()->result_array(),
			'for_tujuan' => $for_tujuan,
			'id_dari' => $this->model->GetDepartemen()->result_array(),
			'for_dari' => $for_dari,

			'data_memo' => $this->model->AmbilDataMemo("where id_memo = '$kode' order by id_memo asc")->result_array()
			
			
			);
		$this->template->Display('memo/edit_memo', $data);
	}


	function updatememo(){

		$id_memo= $_POST['id_memo'];

		$tujuan = $_POST['tujuan'];
		$dari = $_POST['dari'];		
		$tanggal = $_POST['tanggal'];
		$perihal = $_POST['perihal'];
		$untuk = $_POST['untuk'];
		$deskripsi = $_POST['deskripsi'];
		$pic = $_POST['pic'];
		$ttd_pemohon = $_POST['ttd_pemohon'];
		$tujuan = $_POST['tujuan'];
		$dari = $_POST['dari'];

		$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d-m-Y H:i:s");

		
		$data = array(
			'id_memo' => $id_memo,
			'tujuan' => $tujuan,
			'dari' => $dari,
			'tanggal' =>$tanggal,
			'perihal' => $perihal,
			'untuk' => $untuk,
			'deskripsi' => $deskripsi,
			'approval' => $approval,
			'pic' => $pic,
			'ttd_pemohon' => $this->input->post('ttd_pemohon'),
			'tujuan' => $this->input->post('tujuan'),
			'dari' => $this->input->post('dari'),
			'updatedate' => $waktu,
			'updateby' =>  $this->session->userdata('nama'),
			
			);

		
		$res = $this->model->updatememo($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'memo');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'memo');
		}
	}
	

	function hapusmemo($id = 1){
		
		$result = $this->model->Hapus('inv_memo', array('id_memo' => $id));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'memo');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'memo');
		}
	}
}



	
// Developed by Muhammad Ridho
// Email: kenduanything23@gmail.com
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */