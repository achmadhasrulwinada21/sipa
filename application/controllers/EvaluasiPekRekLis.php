<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EvaluasiPekRekLis extends CI_Controller {

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
		$this->load->model('EvaluasiPekerjaan');
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			'data_Evaluasi' => $this->EvaluasiPekerjaan->GetEva("order by id_eva asc")->result_array(),
			'optRumahSakit' => $this->EvaluasiPekerjaan->Getcetakid("order by namars asc")->result_array(),
		);

		$this->template->Display('EvaluasiPekRekLis/data_Evaluasi',$data);	
	}	

	 function addEvaluasi()
	 {
	 	$this->load->model('EvaluasiPekerjaan');
	$data = array(


	 		'nama' => $this->session->userdata('nama'),	
	 		'cabang' => $this->session->userdata('cabang'),	
	 		'add_Evaluasi' => $this->EvaluasiPekerjaan->GetEva()->result_array(),
	 		'optRumahSakit' => $this->model->GetRumahSakit()->result_array(),
	 		'optjenispekerjaan' => $this->EvaluasiPekerjaan->Getjenis()->result_array(),
	 		//'kepada' => $this->EvaluasiPekerjaan->GetEva()->result_array(),
	 		//'dari' =>$this->EvaluasiPekerjaan->GetEva()->result_array()
	 	);
		
		$this->template->Display('EvaluasiPekRekLis/add_Evaluasi',$data);	
		}

	

	function editEvaluasi($id_eva){
	$this->load->model('EvaluasiPekerjaan');		
		
		$data_eva = $this->EvaluasiPekerjaan->GetWhere('dtb_evapekrek', array ('id_eva' => $id_eva));
		$data = array(
			'id_eva' => $data_eva[0]['id_eva'],	
			'koders' => $data_eva[0]['koders'],
			'jenis_pek' => $data_eva[0]['jenis_pek'],
			'keterangan' => $data_eva[0]['keterangan'],
			'pen_jwb' => $data_eva[0]['pen_jwb'],
			// 'cdateby' => $tampung[0]['cdateby'],
			// 'updateby' => $tampung[0]['updateby'],
			// 'cdate' => $tampung[0]['cdate'],
			// 'updatedate' => $tampung[0]['updatedate'],

			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			
			
			);
		$this->template->Display('EvaluasiPekRekLis/edit_Evaluasi',$data);	
	}

	function savedata(){
	// 	//if($_POST){
		   

	// 	//memorandum
	$this->load->model('EvaluasiPekerjaan');
	// 	    //$id_memo = $_POST['id_memo'];
	// 		$kepada  = $_POST['kepada'];
	// 		$dari = $_POST['dari'];
	// 		$tanggal = $_POST['tanggal'];
			$koders = $_POST['koders'];
	 		$jenis_pek = $_POST['jenis_pek'];
	// 		$untuk = $_POST['untuk'];
	 		$keterangan = $_POST['keterangan'];
	 		$pen_jwb = $_POST['pen_jwb'];
	// 		$approval = $_POST['approval'];
		//	$createby = $_POST ['createby'];
	// 	//invoice
	// 	   	$kepada2  = $_POST['untuk'];

	// 	//report
	// 	   	$description =$_POST['untuk'];
	 		$userlog = ($this->session->userdata('nama')
	 	);
	 		date_default_timezone_set("Asia/Jakarta");
	 		$waktusaatini =date("d-m-Y H:i:s");

	// 	   	//array memo
	$data = array(
	// 		//'id_memo' =>$id_memo,	
	// 		'kepada' =>$kepada,
			'koders'=> $koders,
	// 		'dari' =>$dari,
	// 		'tanggal' => date ("d-m-y H:i:s"),
			'jenis_pek' =>$jenis_pek,
	// 		'untuk' =>$untuk,
	 		'keterangan' =>$keterangan,
	 		'pen_jwb' => $pen_jwb,
	// 		'approval' =>$approval,
			 'createby' =>$userlog,
	// 		// 'updateby' =>$updateby,
			'createddate' => $waktusaatini,
	// 		// 'updatedate' => date("d-m-y H:i:s"),

					);

	// 		//array invoice
	// 		$datainv = array(
	// 		//'id_memo' =>$id_memo,	
	// 		'kepada' =>$kepada2,
	// 				);

	// 		$datareport = array(
	// 		//'id_memo' =>$id_memo,	
	// 		'deskripsi' =>$description,
	// 				);

		$result = $this->model->Simpan('dtb_evapekrek', $data);
	//			$result = $this->model->Simpaninvoice('inv_data', $datainv);
	 	//		$result = $this->model->Simpanreport('inv_report', $datareport);
	 			if($result == 1){
	 				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
	 				header('location:'.base_url().'EvaluasiPekRekLis');
	 			}else{
	 				$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
	 				header('location:'.base_ul().'EvaluasiPekRekLis');
	 	}
	 }

	function updateevaluasi(){
	$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
		);
	$this->load->model('EvaluasiPekerjaan'); 
		
        $id_eva=$_POST['id_eva'];
        $koders = $_POST['koders'];
		$jenis_pek = $_POST['jenis_pek'];
		$keterangan = $_POST['keterangan'];


        // $nilaidec =$nilai_uraian ;
        // $hasilnilaiuraian = floatval($nilaidec);
        // $warnasel=$_POST['warnaseltabel'];


        date_default_timezone_set("Asia/Jakarta");
        $waktusaatini =date("d-m-Y H:i:s");
			
			$data = array(	

		    'id_eva'=> $id_eva,
		    'koders' => $koders,
			'jenis_pek' => $jenis_pek,
			'keterangan' => $keterangan,

			);
		
		 $hasil = $this->EvaluasiPekerjaan->Updateevaluasi($data);
		if($hasil>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'EvaluasiPekRekLis');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'EvaluasiPekRekLis');
		}
	}
	

	function hapusevaluasi($id= 1){
		
		$result = $this->model->Hapus('dtb_evapekrek', array('id_eva' => $id));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'EvaluasiPekRekLis');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'EvaluasiPekRekLis');
		}
	}
}
