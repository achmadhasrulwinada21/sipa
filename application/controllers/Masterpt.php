<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Masterpt extends CI_Controller 

{

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
		
		$this->load->model('mmprinsp');
		$this->load->model('mptprinsip');
			$data['kode_prinsipal'] = $this->mmprinsp->code_otomatis();

		    $data['data_prinsipal'] = $this->mptprinsip->GetPrinsp_db1("where pabrikid !='-' or (alumid='-' and alkesid='-') order by pabriknama asc")->result_array();

		     $data['data_alum'] = $this->mptprinsip->GetPrinsp_db1("where alumid !='-' or (pabrikid='-' and alkesid='-') order by idperus desc")->result_array();

		      $data['data_alkes'] = $this->mptprinsip->GetPrinsp_db1("where alkesid !='-' or (alumid='-' and pabrikid='-') order by idperus desc")->result_array();
			$data['nama'] = $this->session->userdata('nama');

			$data['cabang'] = $this->session->userdata('cabang');	
			$data['kode_pabrik']= $this->mmprinsp->GetKodePrinsp_db2("order by pabriknama asc")->result_array();
			$data['s_kode']= $this->mmprinsp->Getskode_db2("order by s_nama DESC")->result_array();;
						
	  
	$this->template->Display('masterpt/data_pt', $data);
	}

function alum()
	{
		
		$this->load->model('mmprinsp');
		$this->load->model('mptprinsip');
			$data['kode_prinsipal'] = $this->mmprinsp->code_otomatis();

		    $data['data_alum'] = $this->mptprinsip->Getalum_db1("order by idptalum desc")->result_array();

		     $data['nama'] = $this->session->userdata('nama');

			$data['cabang'] = $this->session->userdata('cabang');	
			$data['kode_pabrik']= $this->mmprinsp->GetKodePrinsp_db2("order by pabriknama DESC")->result_array();
			$data['s_kode']= $this->mmprinsp->Getskode_db2("order by s_nama DESC")->result_array();;
						
	  
	$this->template->Display('masterpt/data_alum', $data);
	}

	function alkes()
	{
		
		$this->load->model('mmprinsp');
		$this->load->model('mptprinsip');
			$data['kode_prinsipal'] = $this->mmprinsp->code_otomatis();

		    $data['data_alkes'] = $this->mptprinsip->Getalkes_db1("order by idptalkes desc")->result_array();

		     $data['nama'] = $this->session->userdata('nama');

			$data['cabang'] = $this->session->userdata('cabang');	
			$data['kode_pabrik']= $this->mmprinsp->GetKodePrinsp_db2("order by pabriknama DESC")->result_array();
			$data['s_kode']= $this->mmprinsp->Getskode_db2("order by s_nama DESC")->result_array();;
						
	  
	$this->template->Display('masterpt/data_alkes', $data);
	}

	function getprinsipal_db2()
    
  {
    $this->load->model('mptprinsip');
    $pabrikid=$this->input->post('pabrikid');
    $data=$this->mptprinsip->get_data_pabrik_bykode_db2($pabrikid);
    echo json_encode($data);
    
  }

  function getsuplier_db2()
    
  {
    $this->load->model('mmprinsp');
    $s_kode=$this->input->post('s_kode');
    $data=$this->mmprinsp->get_data_suplier_bykode_db($s_kode);
    echo json_encode($data);
    
  }
	
		
	
	
	function savedata()
	{
	$this->load->model('mmprinsp');	
$this->load->model('mptprinsip');
           
            //$idprinsipal = $_POST['no_tipe_rekanan'];
		    $pabrikid = $_POST['pabrikid'];
		    $pabriknama = $_POST['pabriknama'];
			$nama_pt = $_POST['nama_pt'];
			$userlog = ($this->session->userdata('nama'));
			date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");
     $datatgl = $this->mptprinsip->GetPrinsp_db1("where pabrikid='$pabrikid'")->result_array();
				
		$data = array(
			
			'pabrikid'=> $pabrikid,
			'pabriknama'=> $pabriknama,
			'nama_pt'=> $nama_pt,
			'createby' => $userlog ,
			'createdate' => $waktusaatini,
				);

		 $pbid = isset($datatgl[0]['pabrikid']);
		
		if($pbid == $pabrikid){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Perusahaan tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'Masterpt');
		}else{
		 
		
		$result = $this->mptprinsip->Simpan_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'Masterpt');
		}

		  
	}

	function savedata_alum()
	{
	$this->load->model('mmprinsp');	
$this->load->model('mptprinsip');
           
            //$idprinsipal = $_POST['no_tipe_rekanan'];
		    $alumid = $_POST['alumid'];
		    $alumnama = $_POST['alumnama'];
			$pt_alum = $_POST['pt_alum'];
			$userlog = ($this->session->userdata('nama'));
			date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");
     $datatgl = $this->mptprinsip->Getalum_db1("where alumid='$alumid'")->result_array();
				
		$data = array(
			
			'alumid'=> $alumid,
			'alumnama'=> $alumnama,
			'pt_alum'=> $pt_alum,
			'createby' => $userlog ,
			'createdate' => $waktusaatini,
				);

		 $pbid = isset($datatgl[0]['alumid']);
		
		if($pbid == $alumid){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Perusahaan tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'Masterpt/alum');
		}else{
		 
		
		$result = $this->mptprinsip->Simpanalum_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'Masterpt/alum');
		}

		  
	}

	function savedata_alkes()
	{
	$this->load->model('mmprinsp');	
$this->load->model('mptprinsip');
           
            //$idprinsipal = $_POST['no_tipe_rekanan'];
		    $alkesid = $_POST['alkesid'];
		    $alkesnama = $_POST['alkesnama'];
			$pt_alkes = $_POST['pt_alkes'];
			$userlog = ($this->session->userdata('nama'));
			date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");
     $datatgl = $this->mptprinsip->Getalkes_db1("where alkesid='$alkesid'")->result_array();
				
		$data = array(
			
			'alkesid'=> $alkesid,
			'alkesnama'=> $alkesnama,
			'pt_alkes'=> $pt_alkes,
			'createby' => $userlog ,
			'createdate' => $waktusaatini,
				);

		 $pbid = isset($datatgl[0]['alkesid']);
		
		if($pbid == $alkesid){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Perusahaan tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'Masterpt/alkes');
		}else{
		 
		
		$result = $this->mptprinsip->Simpanalkes_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'Masterpt/alkes');
		}

		  
	}
	
	
		function hapus_item($idperus){
			$this->load->model('mptprinsip');
		$this->load->model('mmprinsp');	
	    $hapus['idperus'] = $this->uri->segment(3);
	
	    $this->mmprinsp->deleteData_db1("master_pt",$hapus);

        redirect('Masterpt');

	
		}

		function hapus_alkes($idptalkes){
			$this->load->model('mptprinsip');
		$this->load->model('mmprinsp');	
	    $hapus['idptalkes'] = $this->uri->segment(3);
	
	    $this->mmprinsp->deleteData_db1("master_ptalkes",$hapus);

        redirect('Masterpt/alkes');

	
		}

		function hapus_alum($idptalum){
			$this->load->model('mptprinsip');
		$this->load->model('mmprinsp');	
	    $hapus['idptalum'] = $this->uri->segment(3);
	
	    $this->mmprinsp->deleteData_db1("master_ptalum",$hapus);

        redirect('Masterpt/alum');

	
		}
	
	
	
	}
		
	


