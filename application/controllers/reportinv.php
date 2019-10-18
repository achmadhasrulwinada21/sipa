<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportinv extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			'data_report' => $this->model->GetReportInv("order by id_invrep asc")->result_array(),
			'no_rek' => $this->model->Getno_rek()->result_array(),
		);

		$this->template->display('reportinv/data_reportinv', $data);
	}

	

	function editreportinv($kode = 0){		
		$data_report = $this->model->GetReportInv("where id_invrep = '$kode'")->result_array();
		$data = array(
			'id_invrep' => $data_report[0]['id_invrep'],	
			'no_rek' => $data_report[0]['no_rek'],
			'tanggal' => $data_report[0]['tanggal'],
			'val_tanggal' => $data_report[0]['val_tanggal'],
			'atas_nama' => $data_report[0]['atas_nama'],
			'deskripsi' => $data_report[0]['deskripsi'],
			'reference_no' => $data_report[0]['reference_no'],
			'debit' => $data_report[0]['debit'],
			'credit' => $data_report[0]['credit'],
			'balance' => $data_report[0]['balance'],

			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			
			
			);
		$this->template->display('reportinv/edit_reportinv', $data);
	}


	function updatereportinv(){

		$id_invrep= $_POST['id_invrep'];

		$no_rek = $_POST['no_rek'];
		$tanggal = $_POST['tanggal'];		
		$val_tanggal = $_POST['val_tanggal'];
		$atas_nama = $_POST['atas_nama'];
		$deskripsi = $_POST['deskripsi'];
		$reference_no = $_POST['reference_no'];
		$debit = $_POST['debit'];
		$credit = $_POST['credit'];
		$balance = $_POST['balance'];
		$createby = $_POST['createby'];
		$updateby = $_POST['updateby'];
		$createdate = $_POST['createdate'];
		$updatedate = $_POST['updatedate'];
		

		$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d-m-Y H:i:s");

		$data = array(
			'id_invrep' => $id_invrep,
			'no_rek' => $no_rek,
			'tanggal' => $tanggal,
			'val_tanggal' => $val_tanggal,
			'atas_nama' => $atas_nama,
			'deskripsi' => $deskripsi,
			'reference_no' => $reference_no,
			'debit' =>$debit,
			'credit' => $credit,
			'balance' => $balance,
			'updatedate' => $waktu,
			'updateby' =>  $this->session->userdata('nama'),
			);
		
		$res = $this->model->UpdateReportInv($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'reportinv');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'reportinv');
		}
	}
	

	function hapusreportinv($id = 1){
		
		$result = $this->model->Hapus('inv_report', array('id_invrep' => $id));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'reportinv');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'reportinv');
		}
	}
	
}



	
// Developed by Muhammad Ridho
// Email: kenduanything23@gmail.com
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */