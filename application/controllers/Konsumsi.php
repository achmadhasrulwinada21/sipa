<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Konsumsi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	
	}
	

	public function index()
	{
		$koderole=($this->session->userdata('koderole'));
		$dept = ($this->session->userdata('nama_role'));
		
		if($koderole=='1' OR $koderole=='5' OR $koderole=='10')
		{

		$this->load->model('konsumsim');
		$this->load->model('konfirmpesertam');
	    $this->load->model('komdik');
	   
		
		if (isset($_POST["id_memo_dafdir"])) {
			
            $id_memo_dafdir = $_POST["id_memo_dafdir"];
				
			$data   ['konsumsi'] = $this->konsumsim->GetKonsumsiv("where kode_kons = '$id_memo_dafdir'")->result_array();

		}else{

			$data   ['konsumsi'] = $this->konsumsim->GetKonsumsiv("limit 15")->result_array();	
		}
			
			$data ['nama'] = $this->session->userdata('nama');	
			$data ['cabang'] = $this->session->userdata('cabang');
			$data ['nama_user'] = $this->session->userdata('nama_user');	
			$data ['foto'] = $this->session->userdata('foto');
			$data ['data_konfirm'] = $this->konfirmpesertam->GetKonfirmpesertav()->result_array();
			$data ['data_konsumsi'] = $this->konsumsim->GetKonsumsiv()->result_array();
			$data ['data_history'] = $this->komdik->AmbilDataHistory("order by id_history desc")->result_array();
			$data ['id_memo'] = $this->komdik->GetIdMemo("order by id_memo_dafdir asc")->result_array();
			$data ['totalseluruh']= $this->konfirmpesertam->GetTotSeluruh()->result_array();
			
	}else{
		
		$dept = ($this->session->userdata('nama_role'));
		
		$this->load->model('konfirmpesertam');
		$this->load->model('konsumsim');
		$this->load->model('komdik');

			if (isset($_POST["id_memo_dafdir"])) {
			
            $id_memo_dafdir = $_POST["id_memo_dafdir"];
				
			$data   ['konsumsi'] = $this->konsumsim->GetKonsumsiv("where departemen4 ='$dept' AND kode_kons = '$id_memo_dafdir'")->result_array();

		}else{

			$data   ['konsumsi'] = $this->konsumsim->GetKonsumsiv("where departemen4 ='$dept' limit 15")->result_array();	
		}
			
			$data ['nama'] = $this->session->userdata('nama');	
			$data ['cabang'] = $this->session->userdata('cabang');
			$data ['nama_user'] = $this->session->userdata('nama_user');	
			$data ['foto'] = $this->session->userdata('foto');
			$data ['data_konfirm'] = $this->konfirmpesertam->GetKonfirmpesertav("where departemen ='$dept'")->result_array();
			$data ['konsumsi'] = $this->konsumsim->GetKonsumsiv("where departemen4 ='$dept' order by idkonsumsi desc")->result_array();
			$data ['data_history'] = $this->komdik->AmbilDataHistory("where departemen2 ='$dept' order by id_history desc")->result_array();
			$data ['id_memo'] = $this->komdik->GetIdMemo("where dari='$dept' order by id_memo_dafdir")->result_array();
			$data ['totalseluruh']= $this->konfirmpesertam->GetTotSeluruh()->result_array();
		} 

		$this->template->display('dafdir/data_dafdir', $data);
	}

	function addkon()
	{	
		$this->load->model('konfirmpesertam');
		$this->load->model('komdik');


		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
			'status' => $this->komdik->GetStat()->result_array(),
			'optrole' => $this->komdik->GetRole()->result_array(),
			'data_konsumsi' => $this->konfirmpesertam->GetKonfirmpeserta()->result_array(),
			 'id_memo' => $this->komdik->GetIdMemo()->result_array(),

		);
		
		$this->template->display('Konfirmpeserta/add_konsumsi', $data);
	}

	

	function editkonsumsi($kode=0){
		
	$this->load->model('konsumsim');
	
	$tampung = $this->konsumsim->GetKonsumsi("where idkonsumsi ='$kode'")->result_array();
	
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),
			'foto' => $this->session->userdata('foto'),
			'idkonsumsi' => $tampung[0]['idkonsumsi'],
			'kode_kons' => $tampung[0]['kode_kons'],
			'deskripsi' => $tampung[0]['deskripsi'],
			'harga' => $tampung[0]['harga'],
			'qty' => $tampung[0]['qty'],
		);
			
		$this->template->display('konfirmpeserta/edit_konsumsi', $data);
	}

	function savedata(){
		
		$this->load->model('konsumsim');
			$kode_kons = $_POST['kode_kons'];
			$deskripsi = $_POST['deskripsi'];
			$harga = $_POST['harga'];
			$qty = $_POST['qty'];
			$departemen4 = $_POST['departemen4'];
			$userlog = ($this->session->userdata('nama')
			);
			
			date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("d-m-Y H:i:s");	
			
			$data = array(
			'kode_kons' =>$kode_kons,	
			'deskripsi' =>$deskripsi,
			'harga' =>$harga,
			'qty' =>$qty,
			'departemen4' =>$departemen4,
			'createby' => $userlog ,
			'createdate' => $waktusaatini,
			);
					
		$result = $this->konsumsim->Simpan('tbl_konsumsi', $data);

		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan Data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Konsumsi');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan Data GAGAL di lakukan</strong></div>");
			header('location:'.base_ul().'Konsumsi');
		}
	}


	function UpdateKonsumsi(){
		$this->load->model('konsumsim');
		
		$idkonsumsi = $_POST['idkonsumsi'];
		$kode_kons = $_POST['kode_kons'];
        $deskripsi = $_POST['deskripsi'];
        $harga = $_POST['harga'];
        $qty = $_POST['qty'];
       	$userlog = ($this->session->userdata('nama')
		);
			
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");	
			
        $data = array(
			'idkonsumsi' => $this->input->post('idkonsumsi'),
			'kode_kons' => $this->input->post('kode_kons'),
			'deskripsi' => $this->input->post('deskripsi'),
			'harga' => $this->input->post('harga'),
			'qty' => $this->input->post('qty'),
			'updateby' => $userlog ,
			'updatedate' => $waktusaatini,
			);
			
		$where =array( 
			'idkonsumsi' => $idkonsumsi,

			);
		
		$res = $this->konsumsim->UpdateKonsumsi($data);
		
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update Data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'Konsumsi');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update Data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Konsumsi');
		}
	}

	function hapusKonsumsi($idkonsumsi = 1){
		
		$this->load->model('konsumsim');
		
		$result = $this->konsumsim->Hapus('tbl_konsumsi', array('idkonsumsi' => $idkonsumsi));
		
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus Data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Konsumsi');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus Data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Konsumsi');
		}
	}
	
}

