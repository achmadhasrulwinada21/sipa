<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class invoice extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			'data_invoice' => $this->model->GetInvoice("order by id_inv asc")->result_array(),
			
		);


		$this->template->display('invoice/data_invoice', $data);

	}

		function addinvoice()
	{
		$data = array(


			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			'id_inv' => $this->model->GetInvoice()->result_array(),
			'optbank' => $this->model->GetBank()->result_array(),
			'optperusahaan' => $this->model->GetPerusahaan()->result_array(),
		    // 'kepada' => $this->model->GetMemo()->result_array(),
		// 	'dari' =>$this->model->GetMemo()->result_array()
		// );
		);

		$this->template->display('invoice/add_invoice', $data);

	}



function editinvoice($kode = 0){		
		$tampung = $this->model->AmbilDataInvoice("where id_inv = '$kode'")->result_array();
		$dirut = array();
		foreach($this->model->AmbilDataInvoice("where id_inv = '$kode'")->result_array() as $role){
			$dirut[] = $role['ttd_direktur'];
		}

		$for_atasnama = array();
		foreach($this->model->AmbilDataInvoice("where id_inv = '$kode'")->result_array() as $role){
			$for_atasnama[] = $role['nama_perusahaan'];
		}

		$for_bank = array();
		foreach($this->model->AmbilDataInvoice("where id_inv = '$kode'")->result_array() as $role){
			$for_bank[] = $role['bank'];
		}

		$data = array(
			'id_inv' => $tampung[0]['id_inv'],	
			'kepada' => $tampung[0]['kepada'],
			'alamat' => $tampung[0]['alamat'],
			'invoice_no' => $tampung[0]['invoice_no'],
			'invoice_date' => $tampung[0]['invoice_date'],
			'term_pay' => $tampung[0]['term_pay'],
			'tanggal' => $tampung[0]['tanggal'],
			'keterangan' => $tampung[0]['keterangan'],
			'nominal' => $tampung[0]['nominal'],
			'ppn' => $tampung[0]['ppn'],
			'total' => $tampung[0]['total'],
			// 'bank' =>$tampung[0]['bank'],
			'no_rekening' =>$tampung[0]['no_rekening'],
			// 'nama_perusahaan' =>$tampung[0]['nama_perusahaan'],
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'createby' => $tampung[0]['createby'],
		    'updateby' => $tampung[0]['updateby'],
			'createdate' => $tampung[0]['createdate'],
			'updatedate' => $tampung[0]['updatedate'],
			'catatan' => $tampung[0]['catatan'],
			'status' => $tampung[0]['status'],
			'pic' => $tampung[0]['pic'],
			'id_mengetahui' => $this->model->AmbilDataTtd()->result_array(),
			'dirut' => $dirut,
			'id_atasnama' => $this->model->GetPerusahaan()->result_array(),
			'for_atasnama' => $for_atasnama,
			'id_bank' => $this->model->GetBank()->result_array(),
			'for_bank' => $for_bank,
			//'data_invoice' => $this->model->AmbilDataInvoice("where id_inv = '$kode' order by id_inv asc")->result_array()

			);
		$this->template->display('invoice/edit_invoice', $data);
	}

    function savedata(){

			$kepada = $_POST['kepada'];
			$alamat = $_POST['alamat'];
			$invoice_no = $_POST['invoice_no'];
			$invoice_date = $_POST['invoice_date'];
			$term_pay = $_POST['term_pay'];
			$tanggal = $_POST['tanggal'];
			$keterangan = $_POST['keterangan'];
			$nominal = $_POST['nominal'];
			$ppn = $_POST['ppn'];
			// $total = $nominal+$ppn;
			$bank = $_POST['bank'];
			$no_rekening = $_POST['no_rekening'];
			$nama_perusahaan = $_POST['nama_perusahaan'];
			$catatan = $_POST['catatan'];
			$status = $_POST['status'];
			$pic = $_POST['pic'];

		//report
		   	$description =$_POST['kepada'];
		   	$no_rek =$_POST['no_rekening'];
		   	$atas_nama =$_POST['nama_perusahaan'];
		   	$credit =$_POST['total'];

		   	$dt = new DateTime();


			date_default_timezone_set("Asia/Jakarta");
	        $waktu =date("d-m-Y H:i:s");


		   	//array memo
			$data = array(
			//'id_memo' =>$id_memo,	
			//'id_inv' =>$id_inv,
			'kepada' =>$kepada,
			'alamat' =>$alamat ,
			'invoice_no' =>$invoice_no,
			'invoice_date' =>date ("d-m-y H:i:s"),
			'term_pay' =>$term_pay,
			'tanggal' => date ("d-m-y H:i:s"),
			'keterangan' =>$keterangan,
			'nominal' =>$nominal,
			'ppn' =>$ppn,
			// 'total' =>$total,
			'bank' =>$bank,
			'no_rekening' =>$no_rekening,
			'nama_perusahaan' =>$nama_perusahaan,
			'createdate' => $waktu,
			'createby' =>  $this->session->userdata('nama'),	
			'catatan' => $catatan,
			'status' => $status,
			'pic' => $pic,
					);

			$datareport = array(	
			'deskripsi' =>$description,
		    'atas_nama' => $atas_nama,
		    'credit' => $credit,
		    'no_rek' =>$no_rek,
		    'createdate' => $waktu,
			'createby' =>  $this->session->userdata('nama'),
		    );

				$result = $this->model->Simpan('inv_data', $data);
				$result = $this->model->Simpanreport('inv_report', $datareport);
				if($result == 1){
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'invoice');
				}else{
					$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
					header('location:'.base_ul().'invoice');
		}
	}


	function updateinvoice(){
		
		$id_inv=$_POST['id_inv'];
		$kepada = $_POST['kepada'];
		$alamat = $_POST['alamat'];		
		$invoice_no = $_POST['invoice_no'];
		$invoice_date = $_POST['invoice_date'];
		$term_pay = $_POST['term_pay'];
		$tanggal = $_POST['tanggal'];
		$keterangan = $_POST['keterangan'];
		$nominal= $_POST['nominal'];
		$ppn= $_POST['ppn'];
		// $total = $nominal+$ppn;
		$bank = $_POST['bank'];
		$no_rekening = $_POST['no_rekening'];
		$nama_perusahaan = $_POST['nama_perusahaan'];
		$catatan = $_POST['catatan'];
		$status = $_POST['status'];
		$pic = $_POST['pic'];
		$ttd_direktur = $_POST['ttd_direktur'];
		//report
		// $description =$_POST['kepada'];
		// $no_rek =$_POST['no_rekening'];
		// $atas_nama =$_POST['nama_perusahaan'];
		// $credit =$_POST['total'];

	// 	   	$dt = new DateTime();
		// $untuk2 = $_POST['kepada'];
		// $untuk3 = $_POST['deskripsi'];

		$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d-m-Y H:i:s");

		$data = array(
			'id_inv' =>$id_inv,
			'kepada' => $kepada,
			'alamat' => $alamat,
			'invoice_no' => $invoice_no,
			'invoice_date' => $invoice_date,
			'term_pay' => $term_pay,
			'tanggal' => $tanggal,
			'keterangan' => $keterangan,
			'nominal' => $nominal,
			'ppn' => $ppn,
			// 'total' => $total,
			'bank' => $this->input->post('bank'),
			'no_rekening' => $no_rekening,
			'nama_perusahaan' => $this->input->post('nama_perusahaan'),
			'updatedate' => $waktu,
			'updateby' =>  $this->session->userdata('nama'),
			'catatan' =>$catatan,
			'status' =>  $this->input->post('status'),
			'pic' =>$pic,
			'ttd_direktur' => $this->input->post('ttd_direktur'),
			);

		// $datareport = array(
		// 	'deskripsi' =>$description,
		// 	'no_rek' =>$no_rek,
		// 	'atas_nama' => $atas_nama,
		// 	'credit' => $credit,
		// 	);

			
		$res = $this->model->UpdateInvoice($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'invoice');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'invoice');
		}
	}
	

	function hapusinvoice($id = 1){
		
		$result = $this->model->Hapus('inv_data', array('id_inv' => $id));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'invoice');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'invoice');
		}
	}
}


	
