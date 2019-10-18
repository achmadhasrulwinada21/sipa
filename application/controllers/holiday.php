<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Holiday extends CI_Controller {


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
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			'data_holiday' => $this->model->GetDataHoliday("order by id_holiday desc")->result_array(),
			'data_countholiday' => $this->model->GetDataCountHoliday()->result_array(),

		);


		
		$this->template->Display('holiday/data_holiday',$data);
	}


	function addholiday()
	{
		$data = array
		(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),			
		);
		
		$this->template->Display('holiday/add_holiday',$data);
		
	}

	function savedata(){
		
			$namahari = $_POST['namaharilibur'];
			$tanggalresmi = $_POST['tanggalresmi'];
			$jumlahhari = $_POST['jumlahhari'];
			$iplaptopordekstop=$_POST['ipacces'];


			$dt = new DateTime();

			date_default_timezone_set("Asia/Jakarta");
	        $waktu =date("d-m-Y H:i:s");


			$data = array(
			'namaharilibur' =>$namahari,
			'tanggalterdaftar' =>$tanggalresmi,
			'jumlahhari' =>$jumlahhari,
			'ip_acces'=>$iplaptopordekstop,
			'createdate' =>$waktu,
		    'createby' =>  $this->session->userdata('nama'),

					);


			$result = $this->model->Simpan('master_holiday', $data);
			if($result == 1){
				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'holiday');
			}else{
				$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
					header('location:'.base_ul().'holiday');
		}
	}



	function editholiday($kode=0){

		$data_holiday = $this->model->AmbilDataMasterHoliday("where id_holiday ='$kode'")->result_array();



		$data = array(

			'cabang' => $this->session->userdata('cabang'),	
	        'nama' => $this->session->userdata('nama'),	

            'id_holiday' =>  $data_holiday[0]['id_holiday'],
			'namaharilibur' =>  $data_holiday[0]['namaharilibur'],	
	        'tanggalterdaftar' => $data_holiday[0]['tanggalterdaftar'],	
			'jumlahhari' =>  $data_holiday[0]['jumlahhari'],
			'ip_acces' =>  $data_holiday[0]['ip_acces'],
			

			'createby' => $data_holiday[0]['createby'],
			'updateby' =>  $this->session->userdata('nama'),
			'createdate' =>  $data_holiday[0]['createdate'],
			'updatedate' => date("Y-m-d H:i:s"),
		  

			);

	
		$this->template->Display('holiday/edit_holiday',$data);



	}

	function hapusholiday($kode = 1){
		
		$result = $this->model->Hapus('master_holiday', array('id_holiday' => $kode));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'holiday');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'holiday');
		}
	}

	function updateholiday(){

		  
      	    $namaharilibur = $_POST['namaharilibur'];
			$tanggalresmi = $_POST['tanggalresmi'];
			$jumlahhari = $_POST['jumlahhari'];
			$holidayid = $_POST['idholiday'];
			$iplaptopordekstop=$_POST['ipacces'];
			


		$userlog = (
			$this->session->userdata('nama')
			
		);

		$dt = new DateTime();


	    $ip = $_SERVER['REMOTE_ADDR'];

		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d-m-Y H:i:s");
			
	
			$data = array(

		    'id_holiday'=> $holidayid,
			'namaharilibur' =>$namaharilibur,
			'tanggalterdaftar' =>$tanggalresmi,
			'jumlahhari' =>$jumlahhari,
		    'updatedate' =>$waktu,
		    'updateby'=>$userlog,
		    'ip_acces'=>$iplaptopordekstop,

					);




		 $hasil = $this->model->UpdateHoliday($data);

	
		if($hasil>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'holiday');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'holiday');
		}
	}


}

