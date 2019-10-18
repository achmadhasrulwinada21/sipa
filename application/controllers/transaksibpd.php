<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksibpd extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->_cek_login();
		$this->load->helper('currency_format_helper');
	}
	private function _cek_login()
	{
		if(!$this->session->userdata('useradmin')){            
			redirect(base_url().'backend');
		}
	}

	public function index()
	{
		$this->load->model('transaksib');
		$this->load->model('model');
		$data = array(
			
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),			
			'data_trbpd' => $this->transaksib->GetBpd("order by id_trbpd desc")->result_array(),
			'data_gabbpd' => $this->transaksib->AmbilDataGabBpd("order by id_bpd desc")->result_array(),
			//'data_status' => $this->transaksib->GetStatus("order by id_trbpd")->result_array(),
		);

		$this->load->view('transaksibpd/data_trbpd', $data);
	}

	function addbpd()
	{
		$this->load->model('transaksib');
		$this->load->model('model');
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),		
			'kode_komponenbiaya' => $this->transaksib->GetBpd()->result_array(),
			'kode_uraianbiaya' => $this->transaksib->GetBpd()->result_array(),
			'data_gabbpd' => $this->transaksib->GetId("order by id_bpd desc")->result_array(),
			//'data_status' => $this->transaksib->GetStatus("order by id_trbpd")->result_array(),

		);
		
		$this->load->view('transaksibpd/add_trbpd', $data);
	}

	function savedata(){
		$this->load->model('transaksib');
		
		$kode_komponenbiaya = $_POST['kode_komponenbiaya'];
		$kode_uraianbiaya = $_POST['kode_uraianbiaya'];		
		// $cdate = $_POST['cdate'];
		$nilaibiaya = $_POST['nilaibiaya'];
		$rincian = $_POST['rincian'];
		$keterangan = $_POST['keterangan'];
		$qty = $_POST['qty'];
		$status = $_POST['status'];


		$data = array(	
			// 'id_uraian'=> $id_uraian,

			'kode_komponenbiaya' => $kode_komponenbiaya,
			'kode_uraianbiaya' => $kode_uraianbiaya,
			'createddate' => date("Y-m-d H:i:s"),
			'nilaibiaya' => $nilaibiaya,
			'rincian' => $rincian,
			'keterangan' => $keterangan,
			'qty' => $qty,
			'status' => $status,
			
			);

		// $dataupdatebpd = array(	
		// 	// 'id_uraian'=> $id_uraian,
		// 	'id_bpd' => $kode_komponenbiaya,
		// 	'status' => $statuspengajuan,
		// 	'updateddate' => date("Y-m-d H:i:s"),
		
			
		// 	);
		
		
		$result = $this->transaksib->Simpan('transaksibpd', $data);
		//$updatehistorytabel = $this->transaksib->GetGabBpd('masterbpd', $dataupdatebpd);

		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data user BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'transaksibpd');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'transaksibpd');
		}		
	}

	function editbpd($kode=0){
	$this->load->model('transaksib');
	
	$data_trbpd = $this->transaksib->AmbilDataBpd("where id_trbpd ='$kode'")->result_array();

	// $kdbpd_post_array = array();
	// 	foreach($this->transaksib->AmbilDataBpd("where id_trbpd = '$kode'")->result_array() as $kdbpd){
	// 		$kdbpd_post_array[] = $kdbpd['id_bpd'];
	// 	} 

	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'id_trbpd' => $data_trbpd[0]['id_trbpd'],			
		'kode_komponenbiaya' => $data_trbpd[0]['kode_komponenbiaya'],
		// 'kdbpd' => $this->transaksib->GetId("where id_bpd != '$kode' order by id_bpd desc")->result_array(),
		// 'kdbpd_post' => $kdbpd_post_array,
		'kode_uraianbiaya' => $data_trbpd[0]['kode_uraianbiaya'],
		'nilaibiaya' =>  $data_trbpd[0]['nilaibiaya'],	
		'rincian' => $data_trbpd[0]['rincian'],
		'keterangan' => $data_trbpd[0]['keterangan'],
		'qty' => $data_trbpd[0]['qty'],
		'status' => $data_trbpd[0]['status'],
		'data_trbpd' => $this->transaksib->AmbilDataBpd("where id_trbpd = '$kode' order by id_trbpd asc")->result_array()
			
	);

	
	$this->load->view('transaksibpd/edit_trbpd', $data);

	// 	// echo $data_user[0]['nama_user'];

	}


	function updatebpd(){
	
	$data = array(
	'id_trbpd' =>$this->input->post('id_trbpd'),
	'kode_komponenbiaya' =>$this->input->post('kode_komponenbiaya'),
	'kode_uraianbiaya' => $this->input->post('kode_uraianbiaya'),
	'nilaibiaya' =>$this->input->post('nilaibiaya'),
	'rincian' =>$this->input->post('rincian'),
	'keterangan' =>$this->input->post('keterangan'),
	'qty' =>$this->input->post('qty'),
	'status' =>$this->input->post('status'),
	);
	$this->load->model('transaksib');
	$hasil = $this->transaksib->UpdateBpd($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'transaksibpd');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'transaksibpd');
	}
	}

	function hapusbpd($kode = 1){
	$this->load->model('transaksib');	
	$result = $this->transaksib->Hapus('transaksibpd', array('id_trbpd' => $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'transaksibpd');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'transaksibpd');
	}
	}
}

