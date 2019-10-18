<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class master_jns_brg extends CI_Controller {
	
public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('u_name')){
		$this->session->set_flashdata("alerts", "<div class='alerts alert-danger'><strong>Sesi Anda Telah Habis, Silahkan login kembali..</strong></div>");
			redirect('dashboard');

		}
	}

	public function master_jenis_barang()
	{
		$this->load->model('jenis_brg');
	
		$data = array(
		    'koper' => $this->jenis_brg->code_otomatis(),
			'namars' => $this->session->userdata('namars'),	
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'dd_jenis_brg' => $this->jenis_brg->Get_dd_jenis_brg("order by id_tipe_produk")->result_array(),
			'data_jenis_barang' => $this->jenis_brg->GetJenis_Barangview("where tipe ='TP003' order by kd_jns_brg asc")->result_array(),
			'kodeunikalkes' => $this->jenis_brg->code_otomatis()
		);

	$this->template->Display('master_jenis_barang/data_jns_brg',$data);
	}
	
	
		
	function updatemasterbrg(){
	$this->load->model('jenis_brg');
	
			$id_jns_brg = $_POST['id_jns_brg'];
			$kd_jns_brg = $_POST['kd_jns_brg'];
			$jenis_barang = $_POST['jns_barang'];
			$tipe_produk = $_POST['tipe'];
		   $dt = new DateTime();	

		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("Y-m-d H:i:s");  

	$data = array(

	'id_jns_brg' =>$id_jns_brg,	
	'kd_jns_brg' =>$kd_jns_brg,
	'jns_barang' =>$jenis_barang,	
	'tipe' =>$tipe_produk,
	'updatedate' => $waktu,
	'updateby' =>  $this->session->userdata('nama'),
	);

	$hasil = $this->jenis_brg->update_jnsbarang($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data dengan NO : ".$data['kd_jns_brg']." BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'master_jns_brg/master_jenis_barang');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'master_jns_brg/master_jenis_barang');
	}
	}
	

	function savemaster(){
		
		$this->load->model('jenis_brg');
		
		   // $id_jenis_brg = $_POST['id_jns_brg'];
		    $kd_jns_brg = $_POST['kd_jns_brg'];
			$jenis_barang = $_POST['jns_barang'];
			$tipe_produk = $_POST['tipe_produk'];
			$userlog = ($this->session->userdata('nama'));

			date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	
			
			
			$data = array(
			//'id_jns_brg' =>$id_jenis_brg,	
			'kd_jns_brg' =>$kd_jns_brg,
			'jns_barang' =>$jenis_barang,	
			'tipe' =>$tipe_produk,
			'createdate' => $waktusaatini,	
			'createby' =>$userlog,
					);
					
				
			$result = $this->jenis_brg->Simpanjns_brg($data);

		if( $result > 0 ){

			
		$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong> Kode Jenis Pekerjaan dengan NO : ".$kd_jns_brg."  tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'master_jns_brg/master_jenis_barang');
				
		}else{
		    	
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data ".$kd_jns_brg." BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'master_jns_brg/master_jenis_barang');				
			
		}

	
	}
	
	
	function hapus_master_jenis_barang($kd_jns_brg){
			
		$this->load->model('jenis_brg');	
	    $hapus['kd_jns_brg'] = $this->uri->segment(3);
	
	    $hasil = $this->jenis_brg->deleteData("tb_jenis_brg",$hapus);

       	if($hasil>=0){
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>DELETE data dengan NO : ".$hapus['kd_jns_brg']." BERHASIL di lakukan</strong></div>");
		header('location:'.base_url().'master_jns_brg/master_jenis_barang');
		}else{
		$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
		header('location:'.base_url().'master_jns_brg/master_jenis_barang');
		}
		
    }
	
		
	
	}