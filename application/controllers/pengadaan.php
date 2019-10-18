<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengadaan extends CI_Controller {

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


	
	
	
	
	//tambah jd_unit untuk judul
	public function index()
	{
		$this->load->model('pengadaanm');
		$this->load->model('menum');
			$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'foto' => $this->session->userdata('foto'),
			'jd_unit' => $this->db->get('tbl_jdl_dept')->result(),
			'data_pengadaan' => $this->pengadaanm->GetPengadaan("order by no_pks asc")->result_array(),
			'id_pengadaan' => $this->pengadaanm->GetIdo()->result_array(),
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		);

		
		$this->template->Display('pengadaan/data_pengadaan',$data);
	}

	function addpengadaan()
	{	$this->load->model('menum');
	$this->load->model('pengadaanm');
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),
			'rs' => $this->pengadaanm->GetRumahSakit()->result_array(),	
			'foto' => $this->session->userdata('foto'),
			'status' => $this->model->GetStat()->result_array(),
			'optrole' => $this->model->GetRole()->result_array(),
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		);
		
		// $this->load->view('pengadaan/add_pengadaan', $data); 
		$this->template->Display('pengadaan/add_pengadaan',$data);
	}

	

	function editpengadaan($id_pengadaan){	

			$this->load->model('pengadaanm');
			$this->load->model('menum');
			$rs_post_array = array();
		foreach($this->pengadaanm->GetPengadaan("where id_pengadaan = '$id_pengadaan'")->result_array() as $rs){
			$rs_post_array[] = $rs['rs'];
		
		}	
		
		$tampung = $this->pengadaanm->GetWhere('tbl_pengadaan',array('id_pengadaan' =>$id_pengadaan));
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),
			'foto' => $this->session->userdata('foto'),
			'id_pengadaan' => $tampung[0]['id_pengadaan'],
			'no_pks' => $tampung[0]['no_pks'],
			'rs' => $this->model->GetRumahSakit()->result_array(),
			'rs_post' => $rs_post_array,
			'rekanan' => $tampung[0]['rekanan'],
			'tentang' => $tampung[0]['tentang'],
			'tanggal_perjanjian' => $tampung[0]['tanggal_perjanjian'],
			'jangka_waktu' => $tampung[0]['jangka_waktu'],
			'harga' => $tampung[0]['harga'],
			'hak_rs' => $tampung[0]['hak_rs'],
			'hak_rekanan' => $tampung[0]['hak_rekanan'],
			'pic' => $tampung[0]['pic'],
			'status' => $tampung[0]['status'],
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
			);
		// $this->load->view('pengadaan/edit_pengadaan', $data);
		$this->template->Display('pengadaan/edit_pengadaan',$data);
	}

	function savedata(){
		//if($_POST){
		$this->load->model('pengadaanm');
            $no_pks = $_POST['no_pks'];
			$rs = $_POST['rs'];
			$rekanan = $_POST['rekanan'];
			$tentang = $_POST['tentang'];
			$tanggal_perjanjian = $_POST['tanggal_perjanjian'];
			$jangka_waktu = $_POST['jangka_waktu'];
			$harga = $_POST['harga'];
			$hak_rs = $_POST['hak_rs'];
			$hak_rekanan = $_POST['hak_rekanan'];
			$pic = $_POST['pic'];
			$status =  $_POST['status'];
			$userlog = ($this->session->userdata('nama')
			);
			
			date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("d-m-Y H:i:s");
			$waktuini =date("m-Y");	
			
			$data = array(
			'no_pks' =>$no_pks,
			'rs' =>$rs,
			'rekanan' =>$rekanan,
			'tentang' =>$tentang,
			'tanggal_perjanjian' =>$tanggal_perjanjian,
			'jangka_waktu' =>$jangka_waktu,
			'harga' =>$harga,
			'hak_rs' =>$hak_rs,
			'hak_rekanan' =>$hak_rekanan,
			'pic' =>$pic,
			'status' =>$status,
			'createdby' => $userlog ,
			'createddate' => $waktusaatini,
			'tanggal' => $waktuini,
			);
				$result = $this->pengadaanm->Simpan('tbl_pengadaan', $data);
				if($result == 1){
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'pengadaan');
				}else{
					$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
					header('location:'.base_ul().'pengadaan');
		}
	}


	function updatepengadaan(){
		$this->load->model('pengadaanm');
		$id_pengadaan = $_POST['id_pengadaan'];
		$no_pks = $_POST['no_pks'];
        $rs = $_POST['rs'];
        $rekanan = $_POST['rekanan'];
		$tentang = $_POST['tentang'];
		$tanggal_perjanjian = $_POST['tanggal_perjanjian'];
		$jangka_waktu = $_POST['jangka_waktu'];
		$harga = $_POST['harga'];
		$hak_rs = $_POST['hak_rs'];
		$hak_rekanan = $_POST['hak_rekanan'];
		$pic = $_POST['pic'];
		$status = $_POST['status'];

		$userlog = ($this->session->userdata('nama')
		);
			
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");
		$waktuini =date("m-Y");	
		
        $data = array(
			'id_pengadaan' =>$id_pengadaan,
			'no_pks' =>$no_pks,
			'rs' =>$rs,
			'rekanan' =>$rekanan,
			'tentang' =>$tentang,
			'tanggal_perjanjian' =>$tanggal_perjanjian,
			'jangka_waktu' =>$jangka_waktu,
			'harga' =>$harga,
			'hak_rs' =>$hak_rs,
			'hak_rekanan' =>$hak_rekanan,
			'pic' =>$pic,
			'status' =>$status,
			'updatedby' => $userlog ,
			'updateddate' => $waktusaatini,
			'tanggal' => $waktuini,
			);
		$where =array( 
			'id_pengadaan' => $id_pengadaan,
	       );
		
		$res = $this->pengadaanm->UpdatePengadaan($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'pengadaan');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'pengadaan');
		}
}
		function hapuspengadaan($id_pengadaan = 1){
		$this->load->model('pengadaanm');
		$result = $this->pengadaanm->Hapus('tbl_pengadaan', array('id_pengadaan' => $id_pengadaan));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'pengadaan');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'pengadaan');
		}
	}
	
		//untuk buat judul 
	
	function editjd($id_jd){	

	    $this->load->model('pengadaanm');	
		  $this->load->model('menum');
		$tampung = $this->pengadaanm->GetEdit('tbl_jdl_dept',array('id_jd' =>$id_jd));
		$userlog = ($this->session->userdata('nama')
			);
			
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");
		
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
		'nama_user' => $this->session->userdata('nama_user'),
		'foto' => $this->session->userdata('foto'),
		'id_jd' => $tampung[0]['id_jd'],
		'jdl_unit' => $tampung[0]['jdl_unit'],
		'data_menu' => $this->db->get('tbl_menu')->result(),
		'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		'updatedby' => $userlog ,
		'updateddate' => $waktusaatini,
		);
		$this->load->view('machine/edit_jd', $data);
	}
	
		//untuk buat judul 
	function updatejd(){
		$this->load->model('pengadaanm');
		$id_jd = $_POST['id_jd'];
        $jdl_unit = $_POST['jdl_unit'];
		$userlog = ($this->session->userdata('nama')
			);
			
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");
		
        $data = array(
			'id_jd' => $this->input->post('id_jd'),
			'jdl_unit' => $this->input->post('jdl_unit'),
			'updatedby' => $userlog ,
			'updateddate' => $waktusaatini,
			);
		$where =array( 
			'id_jd' => $id_jd,
	     );
		
		$res = $this->pengadaanm->UpdateJd($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'pengadaan');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'pengadaan');
		}
	}
}
	
	//end
	





	
// Developed by Muhammad Ridho
// Email: kenduanything23@gmail.com
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */