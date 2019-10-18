<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Konfirmpeserta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{

		//$kodeadmin=($this->session->userdata('koderole'));

		$koderole=($this->session->userdata('koderole'));
		$dept = ($this->session->userdata('nama_role'));
		
		if($koderole=='1' OR $koderole=='5' OR $koderole=='10' OR $koderole=='15' 
			OR $koderole=='36' OR $koderole=='37' OR $koderole=='38' OR $koderole=='39')
		{

		$this->load->model('konfirmpesertam');		
		$this->load->model('komdik');

			if (isset($_POST["kd_form_hdr"])) {
                $id_memo_dafdir = $_POST["kd_form_hdr"];
               $data ['mpit'] = $this->komdik->AmbilDataDafdir("where kd_form_hdr = '$id_memo_dafdir'")->result_array();

		}else{

			$data   ['mpit'] = $this->komdik->AmbilDataDafdir("limit 10")->result_array();	
		}
			
			$data ['nama'] = $this->session->userdata('nama');	
			$data ['cabang'] = $this->session->userdata('cabang');
			$data ['nama_user'] = $this->session->userdata('nama_user');	
			$data ['foto'] = $this->session->userdata('foto');
			$data ['data_konfirm'] = $this->konfirmpesertam->GetKonfirmpesertav("order by idkonfirmpeserta desc")->result_array();
			$data ['data_dafdir'] = $this->komdik->GetDafdir("order by id_dafdir asc")->result_array();
		    $data ['kd_form_hdr'] = $this->komdik->Getid_dafdir("order by kd_form_hdr asc")->result_array();			
			$data ['id_memo'] = $this->komdik->GetIdMemo("order by id_memo_dafdir asc")->result_array();
			//$data ['totalseluruh']= $this->konfirmpesertam->GetTotSeluruh()->result_array();
			
	

	}else{
		
		$dept = ($this->session->userdata('nama_role'));
		
		$this->load->model('konfirmpesertam');
		$this->load->model('komdik');

			if (isset($_POST["kd_form_hdr"])) {
                
                $id_memo_dafdir = $_POST["kd_form_hdr"];	

				$data   ['mpit'] = $this->komdik->AmbilDataDafdir("where departemen3 ='$dept' AND kd_form_hdr = '$id_memo_dafdir'")->result_array();
		}else{

			$data   ['mpit'] = $this->komdik->AmbilDataDafdir("where departemen3 ='$dept' limit 10")->result_array();	
		}		
			$data ['nama'] = $this->session->userdata('nama');	
			$data ['cabang'] = $this->session->userdata('cabang');
			$data ['nama_user'] = $this->session->userdata('nama_user');	
			$data ['foto'] = $this->session->userdata('foto');
			$data ['data_konfirm'] = $this->konfirmpesertam->GetKonfirmpesertav("where departemen ='$dept' order by idkonfirmpeserta desc")->result_array();
		    $data ['kd_form_hdr'] = $this->komdik->Getid_dafdir("where departemen3 = '$dept' order by kd_form_hdr asc")->result_array();	
			$data ['id_memo'] = $this->komdik->GetIdMemo("where dari='$dept' order by id_memo_dafdir")->result_array();
			//$data ['totalseluruh']= $this->konfirmpesertam->GetTotSeluruh()->result_array();
			
}
		$this->template->Display('Konfirmpeserta/data_konfirm', $data);
	}


	// public function Tampil()
	// {
	// 	$this->load->model('konfirmpesertam');
	// 	$this->load->model('konsumsim');
		
	// 	if (isset($_POST["id_memo_dafdir"])) {
 //                $id_memo_dafdir = $_POST["id_memo_dafdir"];
				
	// 		$data   ['konsumsi'] = $this->konsumsim->GetKonsumsiv("where kode_kons = '$id_memo_dafdir'")->result_array();
	// 	}else{
	// 		$data   ['konsumsi'] = $this->konsumsim->GetKonsumsiv()->result_array();	
	// 	}

	// 	$data   ['nama'] = $this->session->userdata('nama');	
	// 	$data	['cabang'] = $this->session->userdata('cabang');
	// 	$data	['nama_user'] = $this->session->userdata('nama_user');	
	// 	$data	['foto'] = $this->session->userdata('foto');
	// 	$data	['data_konfirm'] = $this->konfirmpesertam->GetKonfirmpesertav()->result_array();
	// 	$data	['data_konsumsi'] = $this->konsumsim->GetKonsumsiv()->result_array();
	// 	$data	['id_memo'] = $this->model->GetIdMemo()->result_array();
	// 	$data	['totalseluruh']= $this->konfirmpesertam->GetTotSeluruh()->result_array();
			
	// 	$this->load->view('konfirmpeserta/data_konfirm', $data);
	// }


	function addkonfirm()
	{	

		$this->load->model('konfirmpesertam');
		$this->load->model('komdik');

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
			'idkonfirmpeserta' => $this->komdik->GetPeserta()->result_array(),
			'status' => $this->komdik->GetStat()->result_array(),
			'optrole' => $this->komdik->GetRole()->result_array(),
			
			//'data_menu' => $this->db->get('tbl_menu')->result(),
			//'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		);
		
		$this->template->Display('Konfirmpeserta/add_konfirm', $data);
	}


	function editkonfirmpeserta($kode=0){
		
	$this->load->model('konfirmpesertam');
	
		$tampung = $this->konfirmpesertam->GetKonfirmpeserta("where idkonfirmpeserta ='$kode'")->result_array();
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),
			'foto' => $this->session->userdata('foto'),
			'idkonfirmpeserta' => $tampung[0]['idkonfirmpeserta'],
			'pemohon' => $tampung[0]['pemohon'],
			'tgl_memo' => $tampung[0]['tgl_memo'],
			'perihal_acara' => $tampung[0]['perihal_acara'],
			'jumlah_peserta' => $tampung[0]['jumlah_peserta'],
			'panitia' => $tampung[0]['panitia'],
		);
			
		$this->template->Display('Konfirmpeserta/edit_konfirm', $data);
	}

	function savedata(){	  

    $this->load->model('komdik');


    //Data Konfirmasi Peserta
		   	
		   	$pemohon  = $_POST['pemohon'];
		   	$tgl_memo  = $_POST['tgl_memo'];
		   	$perihal_acara  = $_POST['perihal_acara'];
		   	$jumlah_peserta  = $_POST['jumlah_peserta'];
		   	$panitia = $_POST['panitia'];
		   	$departemen = $_POST['departemen'];


	//Data History
			
		   	$perihal  = $_POST['perihal_acara'];	   	
		   	$departemen2 = $_POST['departemen'];


	//Data Formulir Permohonan

		   	$bagian = $_POST['departemen'];
		   	//$jumlah  = $_POST['jml_pengeluaran'];
		   	


	//Memo Daftar Hadir
		   
			
			$dari = $_POST['departemen'];
			$nm_acara = $_POST['perihal_acara'];
			//$jml_pengeluaran = $_POST['jml_pengeluaran'];
			
			

		   	$dt= new DateTime();

			date_default_timezone_set("Asia/Jakarta");
	        $waktu =date("d-m-Y H:i:s");

			
			$userlog = (
			$this->session->userdata('nama')
			
		);


		//Array Konfirmasi Peserta
			
			$datapeserta = array(
			
			'pemohon' =>$pemohon,
			'tgl_memo' =>$tgl_memo,
			'perihal_acara' =>$perihal,
			'jumlah_peserta' =>$jumlah_peserta,
			'panitia' =>$panitia,
			'departemen'=>$departemen,
			'createddate' => $waktu,
	 		'createdby' =>$userlog,
			
			);

		
		//Array History
			
			$datahistory = array(

			
			'perihal' =>$perihal,
			'departemen2'=>$departemen,
			
			);


		//Array Formulir Permohonan
			
			$dataform = array(
			
			'bagian'=>$departemen,
			//'jumlah' =>$jumlah,
					
			);
					
		//Array Memo Dafdir
			
			$data = array(
				
			'dari' =>$departemen,
			'nm_acara' =>$perihal,
            //'jml_pengeluaran' =>$jml_pengeluaran,
			
			);
		

		$result = $this->komdik->SimpanPeserta('konfirm_peserta', $datapeserta);
		$result = $this->komdik->SimpanHistory('tbl_history', $datahistory);	
		$result = $this->komdik->Simpan('tbl_memo_dafdir', $data);
		$result = $this->komdik->SimpanForm('tbl_form_mhn', $dataform);
		
				
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Konfirmpeserta');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_ul().'Konfirmpeserta');
		}
	}





	function Updatekonfirmpeserta(){

		$this->load->model('konfirmpesertam');
		
		$idkonfirmpeserta = $_POST['idkonfirmpeserta'];
        $pemohon = $_POST['pemohon'];
        $tgl_memo = $_POST['tgl_memo'];
        $perihal_acara = $_POST['perihal_acara'];
        $jumlah_peserta = $_POST['jumlah_peserta'];
        $panitia = $_POST['panitia'];
       	$userlog = ($this->session->userdata('nama')
		
		);
			
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");	
			
        $data = array(
			'idkonfirmpeserta' => $this->input->post('idkonfirmpeserta'),
			'pemohon' => $this->input->post('pemohon'),
			'tgl_memo' => $this->input->post('tgl_memo'),
			'perihal_acara' => $this->input->post('perihal_acara'),
			'jumlah_peserta' => $this->input->post('jumlah_peserta'),
			'panitia' => $this->input->post('panitia'),
			'updatedby' => $userlog ,
			'updateddate' => $waktusaatini,
			
			);
			
		$where =array( 
		'idkonfirmpeserta' => $idkonfirmpeserta,

			);
		
		$res = $this->konfirmpesertam->UpdateKonfirmpeserta($data);

		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update Data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'Konfirmpeserta');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update Data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Konfirmpeserta');
		}
	}

		function hapusKonfirmpeserta($idkonfirmpeserta = 1){

		$this->load->model('konfirmpesertam');
		$this->load->model('konsumsim');
		$this->load->model('komdik');

		$result = $this->konfirmpesertam->Hapus('konfirm_peserta', array('idkonfirmpeserta' => $idkonfirmpeserta));
		$result = $this->komdik->Hapus('tbl_memo_dafdir', array('id_memo_dafdir'=> $idkonfirmpeserta));
		$result = $this->komdik->Hapus('tbl_form_mhn', array('id_form_mhn'=> $idkonfirmpeserta));
		$result = $this->komdik->Hapus('tbl_history', array('id_history'=> $idkonfirmpeserta));
		$result = $this->konsumsim->Hapus('tbl_konsumsi', array('kode_kons'=> $idkonfirmpeserta));
		$result = $this->komdik->Hapus('tbl_dafdir', array('kd_form_hdr'=> $idkonfirmpeserta));

		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus Data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Konfirmpeserta');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus Data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Konfirmpeserta');
		}
	}


	
}
