<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detailbarang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->_cek_login();
		if(!$this->session->userdata('u_name')){
		$this->session->set_flashdata("alerts", "<div class='alerts alert-danger'><strong>Sesi Anda Telah Habis, Silahkan login kembali..</strong></div>");
			redirect('dashboard');

		}
	}
	//private function _cek_login()
	//{
	//	if (!$this->session->userdata('level','1')){            
	//		redirect(base_url().'backend');
	//	}
	//}
		//tambah jd_dept untuk judul
	public function index($kode=0)
	{
		
		$koderole=($this->session->userdata('koderole'));
		$dept = ($this->session->userdata('nama_role'));
		
		$idfor_post_array = array();
		foreach($this->model->AmbilDataDetailTransbarang("where id_transbarang = '$kode'")->result_array() as $role){
			$idfor_post_array[] = $role['id_formulir'];
		}
		
		$this->load->model('detbarangm');
		
		if($koderole=='1' OR $koderole=='5' OR $koderole=='10' OR $koderole=='14' OR $koderole=='15'){
			
		if (isset($_POST["id_departemen"])){
                $id_departemen = $_POST["id_departemen"];
               // $id_formulir = $_POST["id_formulir"];
			
				$data   ['detbrgnew'] = $this->detbarangm->GetDetBarang("where id_departemen = '$id_departemen'")->result_array();
				//$data   ['detbrgnew'] = $this->detbarangm->GetDetBarang("where id_formulir = '$id_formulir'")->result_array();
				}else{
					  $data   ['detbrgnew'] = $this->detbarangm->GetDetBarang( "limit 10")->result_array();	
					 }
				$data   ['nama'] = $this->session->userdata('nama');	
				$data	['cabang'] = $this->session->userdata('cabang');
				$data	['nama_user'] = $this->session->userdata('nama_user');	
				$data	['foto'] = $this->session->userdata('foto');
				$data	['id_formulir'] = $this->detbarangm->GetId()->result_array();
				$data	['id_transbarang'] = $this->detbarangm->GetId()->result_array();
				$data	['data_detbarang'] = $this->detbarangm->GetDetBarang("order by id_transbarang")->result_array();
				$data	['no_detbarang'] = $this->detbarangm->GetId()->result_array();
				$data	['formulir'] = $this->detbarangm->GetId()->result_array();
				$data	['optformulir'] = $this->detbarangm->GetId()->result_array();
				$data	['idfor_post'] = $idfor_post_array;
				$data	['namadept'] = $this->detbarangm->GetNamaDept()->result_array();
				//$data	['idsuratdept'] = $this->detbarangm->Getpanggilidsurat("where id_formulir ='$dept'")->result_array();
				//$data	['idsuratdept'] = $this->detbarangm->Getpanggilidsurat()->result_array();
	
		}else{
			
			$dept = ($this->session->userdata('nama_role'));
			
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
			'id_formulir' => $this->detbarangm->GetId()->result_array(),
			'id_transbarang' => $this->detbarangm->GetId()->result_array(),
			'data_detbarang' => $this->detbarangm->GetDetBarang("where namadepartemen ='$dept'")->result_array(),
			'no_detbarang' => $this->detbarangm->GetId()->result_array(),
			//'formulir' => $this->detbarangm->GetId("where namadepartemen ='$dept'")->result_array(),
			//'newformulir' => $this->detbarangm->fun1("where namadepartemen ='$dept'")->result_array(),
			'idfor_post' => $idfor_post_array,
			'optformulir' => $this->detbarangm->AmbilDataFormulir("where namadepartemen ='$dept'")->result_array(),
		);
		}
		
		$this->template->Display('detailbarang/data_detbarang',$data);
		//$this->load->view('detailbarang/data_detbarang', $data);
	}

	function adddetbarang(){
		
		$this->load->model('detbarangm');
		
		$koderole=($this->session->userdata('koderole'));
		$dept = ($this->session->userdata('nama_role'));
		$nama_role = ($this->session->userdata('nama_role'));
		
		if($koderole=='1' OR $koderole=='5' OR $koderole=='10' ){
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
			'status' => $this->model->GetStat()->result_array(),
			'optrole' => $this->model->GetRole()->result_array(),
			//'optformulir' => $this->detbarangm->AmbilDataFormulir("where namadepartemen ='$dept'")->result_array(),
			'optformulir' => $this->detbarangm->AmbilDataFormulir()->result_array(),
		);	
			
		}else{
		
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
			'status' => $this->model->GetStat()->result_array(),
			'optrole' => $this->model->GetRole()->result_array(),
			'optformulir' => $this->detbarangm->AmbilDataFormulir("where namadepartemen ='$dept'")->result_array(),
			//'optformulir' => $this->detbarangm->AmbilDataFormulir()->result_array(),
		);
		}
		$this->template->Display('detailbarang/add_detbarang',$data);
		//$this->load->view('detailbarang/add_detbarang', $data);
	}


	function editdetbarang($kode=0){
		
	$this->load->model('detbarangm');
	
	$tampung = $this->model->AmbilDataDetailTransbarang("where id_transbarang ='$kode'")->result_array();
	
	$role_post_array = array();
		foreach($this->model->AmbilDataDetailTransbarang("where id_transbarang = '$kode'")->result_array() as $role){
			$role_post_array[] = $role['namadepartemen'];
		}
		
	$idfor_post_array = array();
		foreach($this->model->AmbilDataDetailTransbarang("where id_transbarang = '$kode'")->result_array() as $role){
			$idfor_post_array[] = $role['id_formulir'];
		}
		
		$koderole=($this->session->userdata('koderole'));
		$dept = ($this->session->userdata('nama_role'));
		
		if($koderole=='1' OR $koderole=='5' OR $koderole=='10' ){
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),
			'foto' => $this->session->userdata('foto'),
			'id_transbarang' => $tampung[0]['id_transbarang'],
			'id_formulir' => $tampung[0]['id_formulir'],
			'nama_barang' => $tampung[0]['nama_barang'],
			'jumlah' => $tampung[0]['jumlah'],
			'kondisi_barang' => $tampung[0]['kondisi_barang'],
			'instalasi' => $tampung[0]['instalasi'],
			'harga' => $tampung[0]['harga'],
			'discper' => $tampung[0]['discper'],
			'discnil' => $tampung[0]['discnil'],
			'ppn' => $tampung[0]['ppn'],
			'tanggal' => $tampung[0]['tanggal'],
			'e_discper' => $tampung[0]['e_discper'],
			'e_discnil' => $tampung[0]['e_discnil'],
			'total' => $tampung[0]['total'],
			'grand_total' => $tampung[0]['grand_total'],
			'role' => $this->model->GetRole()->result_array(),
			'role_post' => $role_post_array,
			'formulir' => $this->model->AmbilDataFormulir()->result_array(),
			'idfor_post' => $idfor_post_array,
			);	
			
		}else{
		
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),
			'foto' => $this->session->userdata('foto'),
			'id_transbarang' => $tampung[0]['id_transbarang'],
			'id_formulir' => $tampung[0]['id_formulir'],
			'nama_barang' => $tampung[0]['nama_barang'],
			'jumlah' => $tampung[0]['jumlah'],
			'kondisi_barang' => $tampung[0]['kondisi_barang'],
			'instalasi' => $tampung[0]['instalasi'],
			'harga' => $tampung[0]['harga'],
			'discper' => $tampung[0]['discper'],
			'discnil' => $tampung[0]['discnil'],
			'ppn' => $tampung[0]['ppn'],
			'tanggal' => $tampung[0]['tanggal'],
			'e_discper' => $tampung[0]['e_discper'],
			'e_discnil' => $tampung[0]['e_discnil'],
			'total' => $tampung[0]['total'],
			'grand_total' => $tampung[0]['grand_total'],
			'role' => $this->model->GetRole()->result_array(),
			'role_post' => $role_post_array,
			'formulir' => $this->model->AmbilDataFormulir("where namadepartemen ='$dept'")->result_array(),
			'idfor_post' => $idfor_post_array,
			);
		}
		$this->template->Display('detailbarang/edit_detbarang',$data);	
		//$this->load->view('detailbarang/edit_detbarang', $data);
	}

	function savedata(){
		//if($_POST){
			
		$this->load->model('detbarangm');
		
			$id_formulir = $_POST['id_formulir'];
			$nama_barang = $_POST['nama_barang'];
			$jumlah = $_POST['jumlah'];
			$kondisi_barang = $_POST['kondisi_barang'];
			$instalasi = $_POST['instalasi'];
			$harga = $_POST['harga'];
			$discper = $_POST['discper'];
			$e_discper = $_POST['e_discper'];
			$ppn = $_POST['ppn'];
			$tanggal = $_POST['tanggal'];
			$discnil = ($jumlah*$harga)-($jumlah*$harga*$discper/100);
			$e_discnil = ($jumlah*$harga)-($jumlah*$harga*$e_discper/100);
			$total = ($jumlah*$harga)-($discnil+$e_discnil);
			$grand_total = ($jumlah*$harga)-($jumlah*$harga*$ppn/100);
			$namadepartemen = $_POST['namadepartemen'];
			
			$userlog = ($this->session->userdata('nama')
			);
			
			date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("d-m-Y H:i:s");	
			
			$data = array(
			'id_formulir' =>$id_formulir,
			'nama_barang' =>$nama_barang,
			'jumlah' =>$jumlah,
			'kondisi_barang' =>$kondisi_barang,
			'instalasi' =>$instalasi,
			'harga' =>$harga,
			'discper' =>$discper,
			'e_discper' =>$e_discper,
			'ppn' =>$ppn,
			'tanggal' =>$tanggal,
			'discnil' =>$discnil,
			'e_discnil' =>$e_discnil,
			'total' =>$total,
			'grand_total' =>$grand_total,
			'namadepartemen' =>$namadepartemen,
			
			'createdby' => $userlog ,
			'createddate' => $waktusaatini,
			);
					
				$result = $this->detbarangm->Simpan('tbl_transbarang', $data);
				if($result == 1){
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan Data BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'detailbarang');
				}else{
					$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan Data GAGAL di lakukan</strong></div>");
					header('location:'.base_ul().'detailbarang');
		}
	}


	function UpdateDetBarang(){
		$this->load->model('detbarangm');
		$id_transbarang = $_POST['id_transbarang'];
		$id_formulir = $_POST['id_formulir'];
        $nama_barang = $_POST['nama_barang'];
        $jumlah = $_POST['jumlah'];
        $kondisi_barang = $_POST['kondisi_barang'];
        $instalasi = $_POST['instalasi'];
        $harga = $_POST['harga'];
        $discper = $_POST['discper'];
        $e_discper = $_POST['e_discper'];
        $ppn = $_POST['ppn'];
        $tanggal = $_POST['tanggal'];
		$discnil = $jumlah*$harga*$discper/100;
		$e_discnil = $jumlah*$harga*$e_discper/100;
		$total = ($jumlah*$harga)-($discnil+$e_discnil);
		$grand_total = ($jumlah*$harga)-($discnil+$e_discnil)+($jumlah*$harga*$ppn/100);
		$namadepartemen = $_POST['namadepartemen'];
		
		$userlog = ($this->session->userdata('nama')
			);
			
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");	
			
        $data = array(
			'id_transbarang' => $this->input->post('id_transbarang'),
			'id_formulir' => $this->input->post('id_formulir'),
			'nama_barang' => $this->input->post('nama_barang'),
			'jumlah' => $this->input->post('jumlah'),
			'kondisi_barang' => $this->input->post('kondisi_barang'),
			'instalasi' => $this->input->post('instalasi'),
			'harga' => $this->input->post('harga'),
			'discper' => $this->input->post('discper'),
			'e_discper' => $this->input->post('e_discper'),
			'ppn' => $this->input->post('ppn'),
			'tanggal' => $this->input->post('tanggal'),
			'discnil' => $discnil ,
			'e_discnil' => $e_discnil ,
			'total' => $total ,
			'grand_total' => $grand_total ,
			'namadepartemen' => $namadepartemen ,
			
			'updatedby' => $userlog ,
			'updateddate' => $waktusaatini,
			);
			
		$where =array( 
			'id_transbarang' => $id_transbarang,

			);
		
		$res = $this->detbarangm->UpdateDetBarang($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update Data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'detailbarang');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update Data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'detailbarang');
		}
	}

		function hapusdetbarang($id_transbarang = 1){
		$this->load->model('detbarangm');
		$result = $this->detbarangm->Hapus('tbl_transbarang', array('id_transbarang' => $id_transbarang));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus Data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'detailbarang');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus Data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'detailbarang');
		}
	}
	
}
