<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dafdir extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}
	
	public function index()
	{

		$koderole=($this->session->userdata('koderole'));
		$dept = ($this->session->userdata('nama_role'));
		
		if($koderole=='1' OR $koderole=='5' OR $koderole=='10' OR $koderole=='15' 
			OR $koderole=='36' OR $koderole=='37' OR $koderole=='38' OR $koderole=='39')
		{

		$this->load->model('konsumsim');
		$this->load->model('komdik');

		if (isset($_POST["id_memo_dafdir"])) {
                
                $id_memo_dafdir = $_POST["id_memo_dafdir"];
				
				$data   ['konsumsi'] = $this->konsumsim->GetKonsumsiv("where kode_kons = '$id_memo_dafdir'")->result_array();

			}else{

				$data   ['konsumsi'] = $this->konsumsim->GetKonsumsiv( "limit 10")->result_array();	
			}

		
			$data ['nama'] = $this->session->userdata('nama');	
			$data ['cabang'] = $this->session->userdata('cabang');	
			$data ['data_history'] = $this->komdik->AmbilDataHistory("order by id_history desc")->result_array();
			$data ['data_konsumsi'] = $this->konsumsim->GetKonsumsiv()->result_array();
		    $data ['id_memo'] = $this->komdik->GetIdMemo("order by id_memo_dafdir asc")->result_array();
			$data ['kd_form_hdr'] = $this->komdik->Getid_dafdir("where departemen3 = '$dept' order by kd_form_hdr asc")->result_array();

			//$data ['totalseluruh']= $this->konfirmpesertam->GetTotSeluruh()->result_array();
			//$data ['totalbiaya']= $this->komdik ->GetTotBiaya()->result_array();
			
			
		

	}else{
		
		$dept = ($this->session->userdata('nama_role'));

		$this->load->model('konsumsim');
		$this->load->model('komdik');


		if (isset($_POST["id_memo_dafdir"])) {
                
                $id_memo_dafdir = $_POST["id_memo_dafdir"];	

				$data   ['konsumsi'] = $this->konsumsim->GetKonsumsiv("where departemen4 ='$dept' AND kode_kons = '$id_memo_dafdir'")->result_array();

			}else{

				$data   ['konsumsi'] = $this->konsumsim->GetKonsumsiv( "where departemen4 ='$dept' limit 10")->result_array();	
			}
		
			$data ['nama'] = $this->session->userdata('nama');	
			$data ['cabang'] = $this->session->userdata('cabang');				
			$data ['data_history'] = $this->komdik->AmbilDataHistory("where departemen2 ='$dept' order by id_history desc")->result_array();
			$data ['data_konsumsi'] = $this->konsumsim->GetKonsumsiv()->result_array();
			$data ['id_memo'] = $this->komdik->GetIdMemo("where dari='$dept' order by id_memo_dafdir")->result_array();
			$data ['kd_form_hdr'] = $this->komdik->Getid_dafdir("where departemen3 = '$dept' order by kd_form_hdr asc")->result_array();

			//$data ['totalseluruh']= $this->konfirmpesertam->GetTotSeluruh()->result_array();			
			// $data ['totalbiaya']= $this->komdik ->GetTotBiaya()->result_array();
			
			
		
	}
	
		$this->template->Display('dafdir/data_dafdir', $data);
	}

	function adddafdir()
	{
		$this->load->model('komdik');

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
			'id_dafdir' => $this->komdik->GetDafdir()->result_array(),
			'bangvaigantengih' => $this->komdik->GetPeserta()->result_array(),
			'data_dafdir' => $this->komdik->GetPesert()->result_array(),
			'optrole' => $this->komdik->GetRole()->result_array(),
			'statusdokumen'=>$this->komdik->GetStatus2()->result_array(),
		   
		);

		$this->template->Display('dafdir/add_dafdir', $data);
	}


	function editdafdir($kode = 0){	

		$this->load->model('komdik');

		$tampung = $this->komdik->AmbilDataDafdir("where id_dafdir = '$kode'")->result_array();
		$statusdocument_post_array = array();

		foreach($this->komdik->AmbilDataDafdir("where id_dafdir = '$kode'")->result_array() as $statusdoc){
			$statusdokumen_post_array[] = $statusdoc['status_dafdir'];
		}

		// $for_ttdmenger = array();
		// foreach($this->komdik->AmbilDataDafdir("where id_dafdir = '$kode'")->result_array() as $role){
		// 	$for_ttdmenger[] = $role['ttd_mengetahui'];
		// }

		// 	$for_ttdmenger2 = array();
		// foreach($this->komdik->AmbilDataDafdir("where id_dafdir = '$kode'")->result_array() as $role){
		// 	$for_ttdmenger2[] = $role['ttd_menyetujui'];
		// }

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
					
			'id_dafdir' => $tampung[0]['id_dafdir'],
			'kd_form_hdr' => $tampung[0]['kd_form_hdr'],	
			'nama_acara' => $tampung[0]['nama_acara'],
			'tanggal_acara' => $tampung[0]['tanggal_acara'],
			'nm_peserta' => $tampung[0]['nm_peserta'],
			'jumlah_biaya' => $tampung[0]['jumlah_biaya'],
			'keterangan' => $tampung[0]['keterangan'],
			'tgl_suratdafdir' => $tampung[0]['tgl_suratdafdir'],

			// 'statusdoc' => $this->komdik->GetStatusDoc()->result_array(),
			// 'statusdokumen_post' => $statusdokumen_post_array,
			// 'ttd_mengetahui' => $tampung[0]['ttd_mengetahui'],
			// 'ttd_menyetujui' => $tampung[0]['ttd_menyetujui'],
			//'statusdokumen'=>$this->model->GetStatus2()->result_array(),
			// 'idmengetahui' => $this->komdik->AmbilDataTTDMengetahui()->result_array(),
			// 'for_ttdmeng' => $for_ttdmenger,
			// 'idmenyetujui' => $this->komdik->AmbilDataTTDMengetahui()->result_array(),
			// 'for_ttdmeng2' => $for_ttdmenger2,
			
			);

		$this->template->Display('dafdir/edit_dafdir', $data);
	}

    function savedata(){

    	$this->load->model('komdik');
		
    		$kd_form_hdr = $_POST['kd_form_hdr'];
			$nama_acara = $_POST['nama_acara'];
			$tanggal_acara = $_POST['tanggal_acara'];
			$nm_peserta = $_POST['nm_peserta'];
			$jumlah_biaya = $_POST['jumlah_biaya'];
			$keterangan = $_POST['keterangan'];
			$tgl_suratdafdir = $_POST['tgl_suratdafdir'];
			$departemen = $_POST['departemen3'];
			$status_dafdir = $_POST['statusdokumen'];
			// $mengetahui = $_POST['mengetahui'];
			// $menyetujui = $_POST['menyetujui'];
			
			
			$dt= new DateTime();

			date_default_timezone_set("Asia/Jakarta");
	        $waktu =date("d-m-Y H:i:s");


				$userlog = (
			$this->session->userdata('nama')
			
		);

					
		   	//Array Dafdir
			$data = array(
			
			'kd_form_hdr' =>$kd_form_hdr,
			'nama_acara' =>$nama_acara,
			'tanggal_acara' =>$tanggal_acara,
			'nm_peserta' =>$nm_peserta,
			'jumlah_biaya' =>$jumlah_biaya,
            'keterangan' =>$keterangan,
            'tgl_suratdafdir' =>$tgl_suratdafdir, 
            'departemen3' =>$departemen,       
            'status_dafdir' =>$status_dafdir,
            'createddate' => $waktu,            
			'createdby' =>$userlog,

			
			);

			//Array Data History
			$datadafdir = array(
			
			'kode_form'=>$kd_form_hdr,
			'status' =>$status_dafdir,
			
			);

			
		$result = $this->komdik->SimpanDafdir('tbl_dafdir', $data);
								
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Konfirmpeserta');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Konfirmpeserta');
		}
	}


	function updatedafdir(){

		$this->load->model('komdik');
		
		$id_dafdir=$_POST['id_dafdir'];	
		$kd_form_hdr=$_POST['kd_form_hdr'];	
		$nm_peserta = $_POST['nm_peserta'];
		$jumlah_biaya = $_POST['jumlah_biaya'];
		$keterangan = $_POST['keterangan'];
		$tgl_suratdafdir = $_POST['tgl_suratdafdir'];
		$mengetahui= $_POST['mengetahui'];
		$menyetujui = $_POST['menyetujui'];
		$status_dafdir = $_POST['statusdokdafdir'];
		
		
		$userlog = ($this->session->userdata('nama'));
			

		date_default_timezone_set("Asia/Jakarta");
        $waktusaatini =date("d-m-Y H:i:s");
		

			$data = array(

			'id_dafdir' =>$id_dafdir,
			'kd_form_hdr' => $kd_form_hdr,
			'nm_peserta' => $nm_peserta,
			'jumlah_biaya' => $jumlah_biaya,
			'keterangan' => $keterangan,
			'tgl_suratdafdir' => $tgl_suratdafdir,
			'mengetahui' => $mengetahui,
			'menyetujui' => $menyetujui,
			'status_dafdir' => $status_dafdir,
			'ttd_mengetahui' => $this->input->post('ttd_mengetahui'),
			'ttd_menyetujui' => $this->input->post('ttd_menyetujui'),						
			'updatedby' =>$userlog,
			'updateddate' => $waktusaatini,
			
			);


		//Array Data History
			$datadafdir = array(	

			'kode_form'=>$kd_form_hdr,
			'status' =>$status_dafdir,
			'updatedby' =>$userlog,
			'updateddate' => $waktusaatini,
			
			);

			
		$resultupdate = $this->komdik->UpdatDafdir($data);
		$res = $this->komdik->updatedaftardir($datadafdir);
		
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'Konfirmpeserta');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Konfirmpeserta');
		}


		if($resultupdate>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'Konfirmpeserta');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Konfirmpeserta');
		}

	}
	

	function hapusdafdir($id = 1){

		$this->load->model('komdik');
		
		$result = $this->komdik->Hapus('tbl_dafdir', array('id_dafdir' => $id));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Konfirmpeserta');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Konfirmpeserta');
		}
	}
}

