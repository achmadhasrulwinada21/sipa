<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stpd extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	
	
	}
	
	public function index()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			'data_stpd' => $this->model->GetDataSTPD("order by id_stpd desc")->result_array(),

	
		);


		 $this->template->Display('stpd/data_stpd',$data);
	}



	function addstpd()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'foto' => $this->session->userdata('foto'),
			'status' => $this->model->GetStat()->result_array(),
			'optrole' => $this->model->GetRole()->result_array(),
			'optcabang' => $this->model->GetCabang()->result_array(),
			'cabang' => $this->session->userdata('cabang'),	
			'optstatusdoc' => $this->model->GetStatusDoc()->result_array(),
		);
		
		$this->template->Display('stpd/add_stpd',$data);
	}

	function savedata(){

  //       //datacis
	 //    if($_FILES['file_uploadcis']['error'] == 0):
		// $configcis = array(
		// 'upload_path' => './assets/cis/upload',
		// 'allowed_types' => 'gif|jpg|JPG|png|xls|xlsx|rar|doc|docx|txt|csv|pdf',
		// 'max_size' => '2048',
				
		// );

		// $this->load->library('upload', $configcis);      
		// $this->upload->do_upload('file_uploadcis');
		// $upload_datacis = $this->upload->data();
		// $file_name1 = $upload_datacis['file_name'];
		
		// else:
		// 	$file_name1 = $this->input->post('datacis');
		
		// endif;

		// //datasurattugas

		//    if($_FILES['file_uploadsurattugas']['error'] == 0):
		// $configst = array(
		// 'upload_path' => './assets/surattugas/upload',
		// 'allowed_types' => 'gif|jpg|JPG|png|xls|xlsx|rar|doc|docx|txt|csv|pdf',
		// 'max_size' => '2048',
				
		// );

		// $this->load->library('upload', $configst);      
		// $this->upload->do_upload('file_uploadsurattugas');
		// $upload_datast = $this->upload->data();
		// $file_name2 = $upload_datast['file_name'];
		
		// else:
		// 	$file_name2 = $this->input->post('datast');
		
		// endif;


		// //dataitenary
		//    if($_FILES['file_uploaditenary']['error'] == 0):
		// $configitenary = array(
		// 'upload_path' => './assets/itenary/upload',
		// 'allowed_types' => 'gif|jpg|JPG|png|xls|xlsx|rar|doc|docx|txt|csv|pdf',
		// 'max_size' => '2048',
				
		// );

		// $this->load->library('upload', $configitenary);      
		// $this->upload->do_upload('file_uploaditenary');
		// $upload_dataitenary = $this->upload->data();
		// $file_name3 = $upload_dataitenary['file_name'];
		
		// else:
		// 	$file_name3 = $this->input->post('dataitenary');
		
		// endif;

		$kepadayth1 = $_POST['kepadayth1'];
		$kepadayth2 = $_POST['kepadayth2'];		
		$daripemohon = $_POST['kepaladepartemen'];
		$haritanggal = $_POST['haritanggal'];
		$perihal = $_POST['perihal'];
		$lampiran = $_POST['lampiran'];
		$namakaryawanditugaskan =$_POST['namakaryawanditugaskan1'];
		$tanggalpelaksanaan=$_POST['tanggalpelaksanaan'];
		$kegiatan = $_POST['kegiatan'];
		$mengetahuikadep = $_POST['kadep'];
		$mengetahuikadepcheck = $_POST['kadepcheck'];
		$mengetahuidirektur = $_POST['direktur'];
		// $mengetahuidirekturcheck = $_POST['direkturcheck'];
		$catatandirektur = $_POST['catatandirektur'];
		// $statusdokumen = $_POST['statusdokumen'];

        //batas isian rkk
		$namaproject = $_POST['namaproject'];
		$namars = $_POST['namacabangrs'];
		$departemen = $_POST['namadepartemen'];
		$waktupelaksanaan = $_POST['waktupelaksanaan'];
		$namapic = $_POST['namapic'];
		$namakaryawan = $_POST['namakaryawan'];
		$namakegiatan = $_POST['namakegiatan'];
		$saranadanprasarana = $_POST['saranaprasarana'];
		$targetkegiatan = $_POST['targetkegiatan'];
		$targeturaian = $_POST['targeturaian'];
		$kendala = $_POST['kendala'];
		$solusi = $_POST['solusi'];
        $hasilkegiatan = $_POST['outputkegiatan'];
		// $namakadep = $_POST['namakadep'];
	    // $mengetahuikadeprkk = $_POST['mengetahuikadeprkk'];
        // $uploadcis = $file_name1;
        // $uploadsurattugas=$file_name2;
        // $uploaditenary=$file_name3;
		
		$bulansaatini =date("m-Y");		

		$userlog = (
			$this->session->userdata('nama')
			
		);



$databpd=array(

	'namasekretaris'=> $kepadayth2,
	'namakadep'=>$daripemohon,
	'waktutugas'=>$waktupelaksanaan,
	'dasarpenugasan'=>$namaproject,
	'kegiatanpenugasan'=>$namakegiatan,
	'createdby'=>$userlog

);

	
		$data = array(	

			'kepadayth1' => $kepadayth1,
			'kepadayth2' => $kepadayth2,
			'daripemohon' => $daripemohon,
			'haritanggal' => $haritanggal,
			'perihal' => $perihal,
			'lampiran' => $lampiran,
			'namakaryawanditugaskan' =>$namakaryawanditugaskan,
			'tanggalpelaksanaan'=>$tanggalpelaksanaan,
			'kegiatan' => $kegiatan,
			'mengetahuikadep' => $mengetahuikadep,
			'mengetahuikadepcheck' => $mengetahuikadepcheck,
			'mengetahuidirektur' => $mengetahuidirektur,
			// 'mengetahuidirekturcheck' => $mengetahuidirekturcheck,
			'catatandirektur' => $catatandirektur,
			// 'statusdokumen' =>$statusdokumen,

			//batas isian rkk
			'namaproject'=>$namaproject,
			'namars' => $namars,
			'departemen' => $departemen,
			'waktupelaksanaan' => $waktupelaksanaan,
			'namakaryawanditugaskan' => $namakaryawanditugaskan,
			'namakegiatan' => $namakegiatan,
			'saranadanprasarana' => $saranadanprasarana,
			'targetkegiatan' =>$targetkegiatan,
			'targeturaian' =>$targeturaian,
			'kendala'=>$kendala,
			'solusi' => $solusi,
			'hasilkegiatan' => $hasilkegiatan,
			// 'namakadep' => $namakadep,
			// 'mengetahuikadeprkk' => $mengetahuikadeprkk,
			
	
			'createdby' => $userlog ,
			'bulanini' => $bulansaatini
		
		
			 // 'datacis' => $uploadcis ,
			 // 'datast'=>$uploadsurattugas,
			 // 'dataitenary'=>$uploaditenary
			
			
			);
		
		$result = $this->model->Simpan('masterstpd', $data);
		$resultbpd=$this->model->SimpanBpd('masterbpd',$databpd);


		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data user BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'stpd');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'stpd');
		}		
	}

	function editstpd($kode=0){

		$data_stpd = $this->model->AmbilDataMasterStpd("where id_stpd ='$kode'")->result_array();

		/*menjadikan kategori ke array*/
		$role_post_array = array();
		foreach($this->model->AmbilDataMasterStpd("where id_stpd = '$kode'")->result_array() as $role){
			$role_post_array[] = $role['departemen'];
		}

		$statusdocument_post_array = array();
		foreach($this->model->AmbilDataMasterStpd("where id_stpd = '$kode'")->result_array() as $statusdokumen){
			$statusdokumen_post_array[] = $statusdokumen['statusdokumen'];
		}

		$namars_post_array = array();
		foreach($this->model->AmbilDataMasterStpd("where id_stpd = '$kode'")->result_array() as $namars){
			$namars_post_array[] = $namars['namars'];


		}

		$data = array(

            'id_stpd' =>  $data_stpd[0]['id_stpd'],
			'cabang' => $this->session->userdata('cabang'),	
	        'nama' => $this->session->userdata('nama'),	
			'kepadayth1' =>  $data_stpd[0]['kepadayth1'],
			'kepadayth2' => $data_stpd[0]['kepadayth2'],
			'daripemohon' => $data_stpd[0]['daripemohon'],
			'haritanggal' =>  $data_stpd[0]['haritanggal'],	
			'perihal' => $data_stpd[0]['perihal'],
			'lampiran' => $data_stpd[0]['lampiran'],
			'namakaryawanditugaskan1' => $data_stpd[0]['namakaryawanditugaskan1'],
			'tanggalpelaksanaan' => $data_stpd[0]['tanggalpelaksanaan'],
			'kegiatan' => $data_stpd[0]['kegiatan'],
			'mengetahuikadep' => $data_stpd[0]['mengetahuikadep'],
			'mengetahuikadepcheck' => $data_stpd[0]['mengetahuikadepcheck'],
			'mengetahuidirektur' =>$data_stpd[0]['mengetahuidirektur'],
			'mengetahuidirekturcheck' => $data_stpd[0]['mengetahuidirekturcheck'],
			'catatandirektur' => $data_stpd[0]['catatandirektur'],


			//daerah rkk

			'namaproject' => $data_stpd[0]['namaproject'],
			'departemen' => $data_stpd[0]['departemen'],
			'waktupelaksanaan' => $data_stpd[0]['waktupelaksanaan'],
			'namapic' => $data_stpd[0]['namapic'],
			'namakaryawanditugaskan' => $data_stpd[0]['namakaryawanditugaskan'],
			'namakegiatan' =>  $data_stpd[0]['namakegiatan'],	
			'saranadanprasarana' => $data_stpd[0]['saranadanprasarana'],
			'targetkegiatan' => $data_stpd[0]['targetkegiatan'],
			'targeturaian' => $data_stpd[0]['targeturaian'],
			'kendala' =>  $data_stpd[0]['kendala'],	
			'solusi' => $data_stpd[0]['solusi'],
			'hasilkegiatan' => $data_stpd[0]['hasilkegiatan'],
			'namakadep' => $data_stpd[0]['namakadep'],
			'mengetahuikadeprkk' => $data_stpd[0]['mengetahuikadeprkk'],
		
			'datacis'=> $data_stpd[0]['datacis'],
			'datast'=> $data_stpd[0]['datast'],
			'dataitenary'=> $data_stpd[0]['dataitenary'],

			'statusdokumen' => $this->model->GetStatusDoc()->result_array(),
			'role' => $this->model->GetRole()->result_array(),
			'namars' => $this->model->GetRS()->result_array(),

			'createdby' => $data_stpd[0]['createdby'],
			'updatedby' =>  $this->session->userdata('nama'),
			'createddate' =>  $data_stpd[0]['createddate'],
			'bulanini' =>  $data_stpd[0]['bulanini'],
			'updateddate' => date("Y-m-d H:i:s"),
		    'role_post' => $role_post_array,
			'statusdokumen_post' => $statusdokumen_post_array,
			'namars_post'=> $namars_post_array

			);

	


		$this->template->Display('stpd/edit_stpd',$data);



	}

	function hapususer($kode = 1){
		
		$result = $this->model->Hapus('masterstpd', array('id_stpd' => $kode));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'stpd');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'stpd');
		}
	}

	function updatestpd(){

	
        $idstpd=$_POST['id_stpd'];
		$kepadayth1 = $_POST['kepadayth1'];
		$kepadayth2 = $_POST['kepadayth2'];		
		$daripemohon = $_POST['kepaladepartemen'];
		$haritanggal = $_POST['haritanggal'];
		$perihal = $_POST['perihal'];
		$lampiran = $_POST['lampiran'];
		$namakaryawanditugaskan =$_POST['namakaryawanditugaskan1'];
		$tanggalpelaksanaan=$_POST['tanggalpelaksanaan'];
		$kegiatan = $_POST['kegiatan'];
		$mengetahuikadep = $_POST['kadep'];
		$mengetahuikadepcheck = $_POST['kadepcheck'];
		$mengetahuidirektur = $_POST['direktur'];
		$mengetahuidirekturcheck = $_POST['direkturcheck'];
		$catatandirektur = $_POST['catatandirektur'];
		$statusdokumen = $_POST['statusdokumen'];
        //batas isian rkk


		$namaproject = $_POST['namaproject'];
		$namars = $_POST['namacabangrs'];
		$departemen = $_POST['namadepartemen'];
		$waktupelaksanaan = $_POST['waktupelaksanaan'];
		$namapic = $_POST['namapic'];
		$namakaryawan = $_POST['namakaryawan'];
		$namakegiatan = $_POST['namakegiatan'];
		$saranadanprasarana = $_POST['saranaprasarana'];
		$targetkegiatan = $_POST['targetkegiatan'];
		$targeturaian = $_POST['targeturaian'];
		$kendala = $_POST['kendala'];
		$solusi = $_POST['solusi'];
        $hasilkegiatan = $_POST['outputkegiatan'];
		$namakadep = $_POST['namakadep'];
	    $mengetahuikadeprkk = $_POST['mengetahuikadeprkk'];
        // $uploadcis = $file_name;
		$bulansaatini =date("m-Y");	
		
		$userlog = (
			$this->session->userdata('nama')
			
		);

		$rolelog = (
			$this->session->userdata('koderole')
			
		);

		$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d-m-Y H:i:s");
			
	

		if($rolelog=='10'){

			$data = array(	

            'id_stpd'=> $idstpd,
			'kepadayth1' => $kepadayth1,
			'kepadayth2' => $kepadayth2,
			'daripemohon' => $daripemohon,
			'haritanggal' => $haritanggal,
			'perihal' => $perihal,
			'lampiran' => $lampiran,
			'namakaryawanditugaskan1' =>$namakaryawanditugaskan,
			'tanggalpelaksanaan'=>$tanggalpelaksanaan,
			'kegiatan' => $kegiatan,
			'mengetahuikadep' => $mengetahuikadep,
			// 'mengetahuikadepcheck' => $mengetahuikadepcheck,
			'mengetahuidirektur' => $mengetahuidirektur,
			'mengetahuidirekturcheck' => $mengetahuidirekturcheck,
			'catatandirektur' => $catatandirektur,
			
			'statusdokumen' => $this->input->post('statusdokumen'),
	 
			//batas isian rkk
			'namaproject'=>$namaproject,
			'namars' => $namars,
			'departemen' => $departemen,
			'waktupelaksanaan' => $waktupelaksanaan,
			'namapic'=> $namapic,
			'namakaryawanditugaskan' => $namakaryawan,
			'namakegiatan' => $namakegiatan,
			'saranadanprasarana' => $saranadanprasarana,
			'targetkegiatan' =>$targetkegiatan,
			'targeturaian' =>$targeturaian,
			'kendala'=>$kendala,
			'solusi' => $solusi,
			'hasilkegiatan' => $hasilkegiatan,
			// 'namakadep' => $namakadep,
			// 'mengetahuikadeprkk' => $mengetahuikadeprkk,
			'createdby' => $userlog ,
		    'updateddate' =>$waktu,
			'bulanini' => $bulansaatini,
		    'updatedby'=>$userlog,
		
			 // 'datacis' => $uploadcis ,
			
			
			);


		}else{

			$data = array(	

            'id_stpd'=> $idstpd,
			'kepadayth1' => $kepadayth1,
			'kepadayth2' => $kepadayth2,
			'daripemohon' => $daripemohon,
			'haritanggal' => $haritanggal,
			'perihal' => $perihal,
			'lampiran' => $lampiran,
			'namakaryawanditugaskan1' =>$namakaryawanditugaskan,
			'tanggalpelaksanaan'=>$tanggalpelaksanaan,
			'kegiatan' => $kegiatan,
			'mengetahuikadep' => $mengetahuikadep,
			'mengetahuikadepcheck' => $mengetahuikadepcheck,
			'mengetahuidirektur' => $mengetahuidirektur,
			// 'mengetahuidirekturcheck' => $mengetahuidirekturcheck,
			'catatandirektur' => $catatandirektur,
			// 'statusdokumen' =>$statusdokumen,
			// 'statusdokumen' => $this->input->post('statusdokumen'),
	 
			//batas isian rkk
			'namaproject'=>$namaproject,
			'namars' => $namars,
			'departemen' => $departemen,
			'waktupelaksanaan' => $waktupelaksanaan,
			'namapic'=> $namapic,
			'namakaryawanditugaskan' => $namakaryawan,
			'namakegiatan' => $namakegiatan,
			'saranadanprasarana' => $saranadanprasarana,
			'targetkegiatan' =>$targetkegiatan,
			'targeturaian' =>$targeturaian,
			'kendala'=>$kendala,
			'solusi' => $solusi,
			'hasilkegiatan' => $hasilkegiatan,
			'namakadep' => $namakadep,
			'mengetahuikadeprkk' => $mengetahuikadeprkk,
			'createdby' => $userlog ,
		    'updateddate' =>$waktu,
			'bulanini' => $bulansaatini,
		    'updatedby'=>$userlog,
		
			 // 'datacis' => $uploadcis ,
			
			
			);


		}

	
		
		 $hasil = $this->model->UpdateStpd($data);
		
		if($download=1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'stpd');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'stpd');
		}
		
		

		// if($hasil>=0){
		// 	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
		// 	header('location:'.base_url().'stpd');
		// }else{
		// 	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
		// 	header('location:'.base_url().'stpd');
		// }
	}


}

