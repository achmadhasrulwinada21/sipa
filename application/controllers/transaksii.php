<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksii extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->_cek_login();
		$this->load->helper('currency_format_helper');
	}
	private function _cek_login()
	{
		if(!$this->session->userdata('useradmin')){            
			redirect(base_url().'backend');
		}
	}

	public function index()
	{  

		$cbg = ($this->session->userdata('koders'));
		$kodeadmin=($this->session->userdata('role'));
		$this->load->model('transaksim');


		if($kodeadmin=='Administrator'){

			$data = array(
			'nama' => $this->session->userdata('nama'),
			'cabang' => $this->session->userdata('cabang'),	
			'data_transaksi' => $this->transaksim->GetTransaksiRsAdministrator("order desc by koders")->result_array(),

		       

		);
		

	}else if($kodeadmin=='Admin'){

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
		
			'data_transaksi' => $this->transaksim->GetTransaksiRsAdmin("order desc by koders")->result_array(),
		);

	    }else{

		$data = array(
			'nama' => $this->session->userdata('nama'),
			'cabang' => $this->session->userdata('cabang'),	

		
            'data_transaksi' => $this->transaksim->GetTransaksiRs("where kodersh ='$cbg'")->result_array(),


		    

		);
	}


      
		$this->load->view('transaksiv2/data_transaksii', $data);
	}

	function addtransaksi()
	{
		$this->load->model('transaksim');
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'optRumahSakit' => $this->model->GetRumahSakit()->result_array(),
			'cabang' => $this->session->userdata('cabang'),	
			'optUraian' => $this->transaksim->GetUraian()->result_array(),
			'cabang' => $this->session->userdata('cabang'),	
		);
		
		$this->load->view('transaksiv2/add_transaksii', $data);
	}

	function savedata(){
		$config = array(
			'upload_path' => './assets/upload',
			'allowed_types' => 'gif|jpg|JPG|png',
			'max_size' => '2048',

		);
		$this->load->model('transaksim');
		$this->load->library('upload', $config);	
		$this->upload->do_upload('file_upload');
		$upload_data = $this->upload->data();
 
        // $id_tr = $_POST['id_tr'];
		$koders = $_POST['koders'];
		$periode = $_POST['periode'];
		$kd_uraian = $_POST['kd_uraian'];		
		$nilai_uraian = $_POST['nilai_uraian'];
		$cdate = $_POST['cdate'];
		$createby = $_POST['createby'];
        date_default_timezone_set("Asia/Jakarta");
        $waktusaatini =date("d-m-Y H:i:s");
		
		
		$data = array(	
			// 'id_tr' => $id_tr,
			'koders'=> $koders,
			'periode' => $periode,
			'kd_uraian' => $kd_uraian,
			'nilai_uraian' => $nilai_uraian,
			'createby' => $createby,
			'createdate' => $waktusaatini,
			// 'cdate' => date("Y-m-d H:i:s"),
			);
		
		$result = $this->transaksim->Simpan('transaksi_uraian2', $data);
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'transaksii');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'transaksii');
		}		
	}


    function edittransaksi($kode = 0){
    $this->load->model('transaksim');
    $data_transaksi = $this->transaksim->GetTransaksi("where id_tr = '$kode'")->result_array();
    
 
    /*menjadikan kategori ke array*/
    
    $kdrs_post_array = array();
		foreach($this->transaksim->GetTransaksi("where id_tr = '$kode'")->result_array() as $kdrs){
			$kdrs_post_array[] = $kdrs['koders'];
		} 
	$uraianrs_post_array = array();
		foreach($this->transaksim->GetTransaksi("where id_tr = '$kode'")->result_array() as $uraianrs){
			$uraianrs_post_array[] = $uraianrs['kd_uraian'];
		}
      
		$data = array(
			'cabang' => $this->session->userdata('cabang'),	
			'nama' => $this->session->userdata('nama'),
			//database transaksi

			'id_tr' => $data_transaksi[0]['id_tr'],	
			'koders' => $this->model->GetRumahSakit("where koders != '$kode' order by koders asc")->result_array(),
			'periode' => $data_transaksi[0]['periode'],
			'kd_uraian' => $this->model->GetUraian("where kd_uraian != '$kode' order by kd_uraian asc")->result_array(),
			'nilai_uraian' => $data_transaksi[0]['nilai_uraian'],
			'cdate' => $data_transaksi[0]['cdate'],
			'kdrs' => $this->model->GetRumahSakit()->result_array(),
			'kdrs_post' => $kdrs_post_array,
			'uraianrs' => $this->transaksim->GetUraian()->result_array(),
			'uraianrs_post' => $uraianrs_post_array,
			'updateby' => $this->input->post('updateby'),
			'createdate' => $this->input->post('createdate'),
		);

		$this->load->view('transaksiv2/edit_transaksii', $data);

	}

function updatetransaksi(){
		$this->load->model('transaksim');
        $id_tr=$_POST['id_tr'];
		$koders = $_POST['koders'];
		$periode = $_POST['periode'];		
		$kd_uraian = $_POST['kd_uraian'];
		$nilai_uraian = $_POST['nilai_uraian'];
		
        $nilaidec =$nilai_uraian ;
        $hasilnilaiuraian = floatval($nilaidec);
        $updateby = $_POST['updateby'];
        		
		

        date_default_timezone_set("Asia/Jakarta");
        $waktusaatini =date("d-m-Y H:i:s");
			
			$data = array(	

		    'id_tr'=> $id_tr,
			'koders' => $koders,
			'periode' => $periode,
			'kd_uraian' => $kd_uraian,
			'nilai_uraian' => $hasilnilaiuraian,
			'mdate' => $waktusaatini,
			'updateby' => $this->input->post('updateby'),
			'updatedate' =>$waktusaatini,
						
			);
		
		 $hasil = $this->transaksim->UpdateTransaksi($data);

		if($hasil>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'transaksii');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'transaksii');
		}
	}

	
	function hapustransaksi($id = 1){
		$this->load->model('transaksim');
		$result = $this->transaksim->Hapus('transaksi_uraian2', array('id_tr' => $id));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'transaksii');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'transaksii');
		}
	}
	
	
   
}