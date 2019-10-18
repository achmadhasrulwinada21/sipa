<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class statustugas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}
		
	

	public function index()
	{

		$koderole=($this->session->userdata('koderole'));
		$namars=($this->session->userdata('namars'));
		//$koderoles=($this->session->userdata('u_name'));

		if($koderole=='1' OR $koderole=='5' OR $koderole=='10' ){
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			'data_statustugas' => $this->model->GetDataStatus("where cbgrs ='$namars' order by id_tugas asc")->result_array(),
			
		);

		}

		// else{
		// $data = array(
		// 'nama' => $this->session->userdata('nama'),	
		// 'cabang' => $this->session->userdata('cabang'),	
		// 'data_statustugas' => $this->model->GetDataStatus("where cbgrs ='RS JATINEGARA' order by id_tugas asc")->result_array(),
		// );
		// }

		$this->template->display('statustugas/data_statustugas', $data);

	}

function addstatustugas()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'foto' => $this->session->userdata('foto'),
			'cabang' => $this->session->userdata('cabang'),	
			 'optstatusdoc' => $this->model->GetStatusDoc()->result_array(),
		);
		
		$this->template->Display('statustugas/add_statustugas',$data);
	}

	function savedata(){

        $configstatus = array(
            'upload_path' => './assets/upload',
            'allowed_types' => 'gif|jpg|JPG|png|jpeg|pdf|zip|xls|xlsx|docx',
            'max_size' => '2048',

        );
        $this->load->library('upload', $configstatus); 
        $this->upload->do_upload('file_uploadstatus');
        $upload_status = $this->upload->data();

		$nosurat = $_POST['nosurat'];
		$namakadep = $_POST['namakadep'];		
		$jabatankadep = $_POST['jabatankadep'];
		$namayangditugaskan = $_POST['namayangditugaskan'];
		$jabatanyangtugas = $_POST['jabatanyangtugas'];
		$waktutugas = $_POST['waktutugas'];
		$tujuantempat =$_POST['tujuantempat'];
		$dasarpenugasan=$_POST['dasarpenugasan'];
		$kegiatanpenugasan = $_POST['kegiatanpenugasan'];
		$mengetahuisekretarisdirekturregional = $_POST['mengetahuisekretarisdirekturregional'];
		$status = $_POST['status'];
		$file_name = $upload_status['file_name'];
		$cbgrs =$_POST['cbgrs'];
		
		$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
	    $waktu =date("d-m-Y H:i:s");

	
		$data = array(	

			'nosurat' => $nosurat,
			'namakadep' => $namakadep,
			'jabatankadep' => $jabatankadep,
			'namayangditugaskan' => $namayangditugaskan,
			'jabatanyangtugas' => $jabatanyangtugas,
			'waktutugas' => $waktutugas,
			'tujuantempat' =>$tujuantempat,
			'dasarpenugasan'=>$dasarpenugasan,
			'kegiatanpenugasan' => $kegiatanpenugasan,
			'mengetahuisekretarisdirekturregional' => $mengetahuisekretarisdirekturregional,
			'status' => $status,
			'foto' => $file_name ,
			'cbgrs' =>$cbgrs,
			'createddate' => $waktu,
			'createdby' =>  $this->session->userdata('nama'),

			
			);
		
		$result = $this->model->Simpan('masterstatustugas', $data);


		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data user BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'statustugas');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'statustugas');
		}		
	}


	function editstatustugas($kode=0){

		$data_status = $this->model->GetDataStatus("where id_tugas ='$kode'")->result_array();

		$statusdocument_post_array = array();
		foreach($this->model->GetDataStatus("where id_tugas = '$kode'")->result_array() as $statusdokumen){
			$statusdokumen_post_array[] = $statusdokumen['status'];
		}


		$data = array(

            'id_tugas' =>  $data_status[0]['id_tugas'],
			'cabang' => $this->session->userdata('cabang'),	
	        'nama' => $this->session->userdata('nama'),	
			'nosurat' =>  $data_status[0]['nosurat'],
			'namakadep' => $data_status[0]['namakadep'],
			'jabatankadep' =>  $data_status[0]['jabatankadep'],	
			'namayangditugaskan' => $data_status[0]['namayangditugaskan'],
			'jabatanyangtugas' => $data_status[0]['jabatanyangtugas'],
			'waktutugas' => $data_status[0]['waktutugas'],
			'tujuantempat' => $data_status[0]['tujuantempat'],
			'dasarpenugasan' => $data_status[0]['dasarpenugasan'],
			'kegiatanpenugasan' => $data_status[0]['kegiatanpenugasan'],
			'mengetahuisekretarisdirekturregional' => $data_status[0]['mengetahuisekretarisdirekturregional'],
			'status'=>$data_status[0]['status'],
			'cbgrs'=>$data_status[0]['cbgrs'],
			'foto'=>$data_status[0]['foto'],
			

			);

	
		$this->template->Display('statustugas/edit_statustugas',$data);



	}

	function hapusstatustugas($kode = 1){
		
		$result = $this->model->Hapus('masterstatustugas', array('id_tugas' => $kode));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'statustugas');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'statustugas');
		}
	}

	function updatestatustugas(){
        if($_FILES['file_uploadstatus']['error'] == 0):
            $configstatus = array(
                'upload_path' => './assets/upload',
                'allowed_types' => 'gif|jpg|JPG|png|jpeg|pdf|zip|xls|xlsx|docx',
                'max_size' => '2048',
                
                );
        $this->load->library('upload', $configstatus);      
        $this->upload->do_upload('file_uploadstatus');
        $upload_foto = $this->upload->data();
        $file_name = $upload_foto['file_name'];
        else:
            $file_name = $this->input->post('foto');
        endif;
		  
        $idtugas=$_POST['id_tugas'];
		$nosurat = $_POST['nosurat'];		
		$namakadep = $_POST['namakadep'];
		$jabatankadep = $_POST['jabatankadep'];
		$namayangditugaskan = $_POST['namayangditugaskan'];
		$jabatanyangtugas =$_POST['jabatanyangtugas'];
		$waktutugas=$_POST['waktutugas'];
		$tujuantempat = $_POST['tujuantempat'];
		$dasarpenugasan = $_POST['dasarpenugasan'];
		$kegiatanpenugasan = $_POST['kegiatanpenugasan'];
		$mengetahuisekretarisdirekturregional = $_POST['mengetahuisekretarisdirekturregional'];
		$status=$_POST['status'];
		$cbgrs=$_POST['cbgrs'];
		// $file_name=$_POST['foto'];


	
        // $uploadcis = $file_name;

		$userlog = (
			$this->session->userdata('nama')
			
		);

		$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d-m-Y H:i:s");
			
	
		$data = array(	
            'id_tugas'=> $idtugas,
			'nosurat' => $nosurat,
			'namakadep' => $namakadep,
			'jabatankadep' => $jabatankadep,
			'namayangditugaskan' => $namayangditugaskan,
			'jabatanyangtugas' =>$jabatanyangtugas,
			'waktutugas'=>$waktutugas,
			'tujuantempat'=>$tujuantempat,
			'dasarpenugasan' => $dasarpenugasan,
			'kegiatanpenugasan' => $kegiatanpenugasan,
			'mengetahuisekretarisdirekturregional' => $mengetahuisekretarisdirekturregional,
			'status' => $status,
			'foto' => $file_name,
			'cbgrs' => $cbgrs,

		
			'updateddate' => $waktu,
			'updatedby' =>  $this->session->userdata('nama'),
			
			);

	
		
		 $hasil = $this->model->Updatestatustugas($data);

	
		if($hasil>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'statustugas');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'statustugas');
		}
	}


}
