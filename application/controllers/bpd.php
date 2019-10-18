<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bpd extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}
		
	

	public function index()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			'data_bpd' => $this->model->GetDataBpd("order by id_bpd desc")->result_array(),

		);


		
		$this->template->Display('bpd/data_bpd',$data);
	}



	function editbpd($kode=0){

		$data_bpd = $this->model->AmbilDataMasterBpd("where id_bpd ='$kode'")->result_array();

		$statusdocument_post_array = array();
		foreach($this->model->AmbilDataMasterBpd("where id_bpd = '$kode'")->result_array() as $statusdokumen){
			$statusdokumen_post_array[] = $statusdokumen['status'];
		}


		$data = array(

            'id_bpd' =>  $data_bpd[0]['id_bpd'],
			'cabang' => $this->session->userdata('cabang'),	
	        'nama' => $this->session->userdata('nama'),	
			'namasekretaris' =>  $data_bpd[0]['namasekretaris'],
			'jabatansekretaris' => $data_bpd[0]['jabatansekretaris'],
			'namakadep' => $data_bpd[0]['namakadep'],
			'jabatankadep' =>  $data_bpd[0]['jabatankadep'],	
			'namayangditugaskan' => $data_bpd[0]['namayangditugaskan'],
			'waktutugas' => $data_bpd[0]['waktutugas'],
			'tujuantempat' => $data_bpd[0]['tujuantempat'],
			'dasarpenugasan' => $data_bpd[0]['dasarpenugasan'],
			'kegiatanpenugasan' => $data_bpd[0]['kegiatanpenugasan'],
			'mengetahuisekretaris' => $data_bpd[0]['mengetahuisekretaris'],
			'sekretarischeck' => $data_bpd[0]['sekretarischeck'],
			'nosurat'=>$data_bpd[0]['nosurat'],
			
			
			'statusdokumen' => $this->model->GetStatusDoc()->result_array(),
			'statusdokumen_post' => $statusdokumen_post_array,
		
			

			'createdby' => $data_bpd[0]['createdby'],
			'updatedby' =>  $this->session->userdata('nama'),
			'createddate' =>  $data_bpd[0]['createddate'],
			'updateddate' => date("Y-m-d H:i:s"),
		  

			);

	
		$this->template->Display('bpd/edit_bpd',$data);



	}

	function hapususer($kode = 1){
		
		$result = $this->model->Hapus('masterbpd', array('id_bpd' => $kode));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'bpd');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'bpd');
		}
	}

	function updatebpd(){

		  
        $idbpd=$_POST['id_bpd'];
		$namasekretaris = $_POST['namasekretaris'];		
		$jabatansekretaris = $_POST['jabatansekretaris'];
		$namakadep = $_POST['namakadep'];
		$jabatankadep = $_POST['jabatankadep'];
		$namayangditugaskan = $_POST['namayangditugaskan'];
		$waktutugas =$_POST['waktutugas'];
		$tujuantempat=$_POST['tujuantempat'];
		$dasarpenugasan = $_POST['dasarpenugasan'];
		$kegiatanpenugasan = $_POST['kegiatanpenugasan'];
		$mengetahuisekretaris = $_POST['mengetahuisekretaris'];
		$sekretarischeck = $_POST['sekretarischeck'];
		$nomorsurat=$_POST['nomorsurat'];
		$statusdokumen=$_POST['statusdokumen'];


	
        // $uploadcis = $file_name;

		$userlog = (
			$this->session->userdata('nama')
			
		);

		$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d-m-Y H:i:s");
			
	
		$data = array(	
            'id_bpd'=> $idbpd,
			'namasekretaris' => $namasekretaris,
			'jabatansekretaris' => $jabatansekretaris,
			'namakadep' => $namakadep,
			'jabatankadep' => $jabatankadep,
			'namayangditugaskan' => $namayangditugaskan,
			'waktutugas' =>$waktutugas,
			'tujuantempat'=>$tujuantempat,
			'dasarpenugasan' => $dasarpenugasan,
			'kegiatanpenugasan' => $kegiatanpenugasan,
			'mengetahuisekretaris' => $mengetahuisekretaris,
			'sekretarischeck' => $sekretarischeck,
			'nosurat'=>$nomorsurat,
			'status'=>$statusdokumen,

		
			'createdby' => $userlog ,
		    'updateddate' =>$waktu,
		    'updatedby'=>$userlog,
		
			 // 'datacis' => $uploadcis ,
			
			
			);

	
		
		 $hasil = $this->model->UpdateBpdDinas($data);

	
		if($hasil>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'bpd');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'bpd');
		}
	}


}

