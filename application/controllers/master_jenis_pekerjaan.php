<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class master_jenis_pekerjaan extends CI_Controller {




//-------------cRUD Jenis Pekerjaan dan Sub Jenis Pekerjaan-------------------
	
	
	
	public function master_jenis_dan_sub_pekerjaan()
	{
		$this->load->model('modelpekerjaan');
	
		$data = array(
		    'koper' => $this->modelpekerjaan->code_otomatis(),
			'namars' => $this->session->userdata('namars'),	
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'dd_jenis_pekerjaan' => $this->modelpekerjaan->Get_dd_jenis_pekerjaan("order by id_jenis_pekerjaan")->result_array(),
			'data_jenis_pekerjaan' => $this->modelpekerjaan->GetJenis_Pekerjaan(" order by id_jenis_pekerjaan asc")->result_array(),
		);

	$this->template->Display('master_jenis_pekerjaan/data_jenis_dan_sub_pekerjaan',$data);
	}
	
	
	public function master_sub_jenis_pekerjaan()
	{
		$this->load->model('modelpekerjaan');
	
		$data = array(
		    'koper' => $this->modelpekerjaan->code_otomatis(),
			'namars' => $this->session->userdata('namars'),	
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'dd_jenis_pekerjaan' => $this->modelpekerjaan->Get_dd_jenis_pekerjaan("order by id_jenis_pekerjaan")->result_array(),
			'data_sub_jenis_pekerjaan' => $this->modelpekerjaan->Get_dd_sub_jenis_pekerjaan(" order by id_sub_jenis_pekerjaan asc")->result_array(),
		);

	$this->template->Display('master_jenis_pekerjaan/data_jenis_sub_pekerjaan',$data);
	}
	
	function viewperuIIsahaan_obat()
	{
		$this->load->model('modelpekerjaan');
		// $data['koper'] = $this->modelpekerjaan->code_otomatis();
		$data = array(
       

			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'data_pekerjaan' => $this->modelpekerjaan->GetEva("where tipe_produk='OBAT' order by id_pekerjaan asc")->result_array(),			
		    // 'koper' => $this->modelpekerjaan->code_otomatis(),
	//		'koders' => $this->session->userdata('koders'),	
	//		'namars' => $this->session->userdata('namars'),
		);
		$this->template->Display('master_jenis_pekerjaan/view_pekerjaan',$data);
	
	}
	
	function updatemasteranisa(){
	$this->load->model('modelpekerjaan');
	
			$id_j= $_POST['dara1'];
    	    $nm_pekerjaan = $_POST['dara_anisa'];
			$kode_jenis = $_POST['dara'];
		   $dt = new DateTime();	

		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("Y-m-d H:i:s");  

	$data = array(
	'id_jenis_pekerjaan' =>$id_j,
	'kode_jenis' =>$kode_jenis,
	'nm_pekerjaan' => $nm_pekerjaan,
	'updatedate' => $waktu,
	'updateby' =>  $this->session->userdata('nama'),
	);

	$hasil = $this->modelpekerjaan->update_pekerjaan($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data dengan NO : ".$data['kode_jenis']." BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'master_jenis_pekerjaan/master_jenis_dan_sub_pekerjaan');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'master_jenis_pekerjaan/master_jenis_dan_sub_pekerjaan');
	}
	}
	


	function savemasterdara(){
		
		$this->load->model('modelpekerjaan');
		
		    $kode_jenism = $_POST['kode_jenism'];
			$nm_pekerjaanm = $_POST['nm_pekerjaanm'];
			$userlog = ($this->session->userdata('nama'));
			
			$data_dist = $this->modelpekerjaan->GetJenis_Pekerjaan("where kode_jenis='$kode_jenism'")->result_array();
			
			$data = array(
			'kode_jenis' =>$kode_jenism,
			'nm_pekerjaan' =>$nm_pekerjaanm,		
			'createby' =>$userlog,
					);
					
		$pbid = isset($data_dist[0]['kode_jenis']);	
		
				
		if( $pbid == $kode_jenism  ){
			
		
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong> Kode Jenis Pekerjaan dengan NO : ".$kode_jenism."  tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'master_jenis_pekerjaan/master_jenis_dan_sub_pekerjaan');
		
		}else{
		    $result = $this->modelpekerjaan->Simpanjenis($data);	
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data ".$kode_jenism." BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'master_jenis_pekerjaan/master_jenis_dan_sub_pekerjaan');	
		
			
		}

	
	}
	
	
	function savemaster_sub_jenis(){
		
		$this->load->model('modelpekerjaan');
		
		    $kode_sub_jenis_pekerjaan = $_POST['kode_sub_jenis_pekerjaan'];
			$nm_sub_jenis_pekerjaan = $_POST['nm_sub_jenis_pekerjaan'];
			$kode_jenis = $_POST['kode_jenis'];
			
			$userlog = ($this->session->userdata('nama'));
			
			$data_dist = $this->modelpekerjaan->GetSub_Pekerjaan("where kode_sub_jenis_pekerjaan='$kode_sub_jenis_pekerjaan'")->result_array();
			
			$data = array(
			'kode_sub_jenis_pekerjaan' =>$kode_sub_jenis_pekerjaan,
			'nm_sub_jenis_pekerjaan' =>$nm_sub_jenis_pekerjaan,
			'kode_jenis' =>$kode_jenis,	
			'createby' =>$userlog,
					);
					
		$pbid = isset($data_dist[0]['kode_jenis']);	
		
				
		if( $pbid == $kode_sub_jenis_pekerjaan ){
			
		
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong> Kode Jenis Pekerjaan dengan NO : ".$kode_sub_jenis_pekerjaan."  tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'master_jenis_pekerjaan/master_jenis_dan_sub_pekerjaan');
		
		}else{
		    $result = $this->modelpekerjaan->Simpan_sub_jenis($data);	
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data ".$kode_sub_jenis_pekerjaan." BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'master_jenis_pekerjaan/master_jenis_dan_sub_pekerjaan');	
		
			
		}

	
	}
	
    function updatemaster_sub_jenis(){
	$this->load->model('modelpekerjaan');
	
			$id_sub_jenis_pekerjaan= $_POST['id_sub_jenis_pekerjaan'];
    	    $kode_sub_jenis_pekerjaan = $_POST['kode_sub_jenis_pekerjaan'];
			$nm_sub_jenis_pekerjaan = $_POST['nm_sub_jenis_pekerjaan'];
			$kojen= $_POST['kojen'];
		   $dt = new DateTime();	

		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("Y-m-d H:i:s");  

	$data = array(
	'id_jenis_pekerjaan' =>$id_j,
	'kode_jenis' =>$kode_jenis,
	'nm_pekerjaan' => $nm_pekerjaan,
	'updatedate' => $waktu,
	'updateby' =>  $this->session->userdata('nama'),
	);

	$hasil = $this->modelpekerjaan->update_pekerjaan($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data dengan NO : ".$data['kode_jenis']." BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'master_jenis_pekerjaan/master_jenis_dan_sub_pekerjaan');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'master_jenis_pekerjaan/master_jenis_dan_sub_pekerjaan');
	}
	}
	
	

	function hapus_master_jenis_pekerjaan($kode_jenis){
			
		$this->load->model('modelpekerjaan');	
	    $hapus['kode_jenis'] = $this->uri->segment(3);
	
	    $hasil = $this->modelpekerjaan->deleteData("tb_jenis_pekerjaan",$hapus);

       	if($hasil>=0){
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>DELETE data dengan NO : ".$hapus['kode_jenis']." BERHASIL di lakukan</strong></div>");
		header('location:'.base_url().'master_jenis_pekerjaan/master_jenis_dan_sub_pekerjaan');
		}else{
		$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
		header('location:'.base_url().'master_jenis_pekerjaan/master_jenis_dan_sub_pekerjaan');
		}
		
    }
	
	function hapus_master_sub_jenis_pekerjaan($kode_sub_jenis_pekerjaan){
			
		$this->load->model('modelpekerjaan');	
	    $hapus['kode_sub_jenis_pekerjaan'] = $this->uri->segment(3);
	
	    $hasil = $this->modelpekerjaan->deleteData("tb_sub_jenis_pekerjaan",$hapus);

       	if($hasil>=0){
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>DELETE data dengan NO : ".$hapus['kode_sub_jenis_pekerjaan']." BERHASIL di lakukan</strong></div>");
		header('location:'.base_url().'master_jenis_pekerjaan/master_jenis_dan_sub_pekerjaan');
		}else{
		$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
		header('location:'.base_url().'master_jenis_pekerjaan/master_jenis_dan_sub_pekerjaan');
		}
		
    }
	
	
	}