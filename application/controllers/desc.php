<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Desc extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->_cek_login();
	}
	private function _cek_login()
	{
		if (!$this->session->userdata('level','1')){ 
			redirect(base_url().'backend');
		}
	}
	
	//tambah jd_desc untuk judul
	public function index()
	{
		$this->load->model('descm');
		$this->load->model('menum');
			$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
			'jd_desc' => $this->db->get('tbl_jdl_dept')->result(),
			'data_desc' => $this->descm->GetDesc("order by kode_desc asc")->result_array(),
			'id_desc' => $this->descm->GetIdw()->result_array(),
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		);

		$this->load->view('desc/data_desc', $data);
	}

	function adddesc()
	{ $this->load->model('menum');
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
			'status' => $this->model->GetStat()->result_array(),
			'optrole' => $this->model->GetRole()->result_array(),
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		);
		
		$this->load->view('desc/add_desc', $data);
	}

	

	function editdesc($id_desc){	
	      $this->load->model('descm');	
		  $this->load->model('menum');
		$tampung = $this->descm->GetWhere('tbl_desc',array('id_desc' =>$id_desc));
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),
			'foto' => $this->session->userdata('foto'),
			'id_desc' => $tampung[0]['id_desc'],
			'kode_desc' => $tampung[0]['kode_desc'],
			'desc' => $tampung[0]['desc'],
			'ket' => $tampung[0]['ket'],
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
			);
		$this->load->view('desc/edit_desc', $data);
	}

	function savedata(){
		//if($_POST){
		$this->load->model('descm');
            $kode_desc = $_POST['kode_desc'];
			$desc = $_POST['desc'];
			$ket = $_POST ['ket'];
			$userlog = ($this->session->userdata('nama')
			);
			
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");
		$waktuini =date("m-Y");	
		
			$data = array(
			'kode_desc' =>$kode_desc,
			'desc' =>$desc,
			'ket' => $ket,
			'createdby' => $userlog ,
			'createddate' => $waktusaatini,
			'tanggal' => $waktuini,
			);
			
				$result = $this->descm->Simpan('tbl_desc', $data);
				if($result == 1){
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'desc');
				}else{
					$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
					header('location:'.base_ul().'desc');
		}
	}


	function updatedesc(){
		$this->load->model('descm');
		$id_desc = $_POST['id_desc'];
		$kode_desc = $_POST['kode_desc'];
        $desc = $_POST['desc'];
        $ket = $_POST['ket'];
		$userlog = ($this->session->userdata('nama')
		);
		
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");	
		$waktuini =date("m-Y");	
		
		$data = array(
			'id_desc' => $this->input->post('id_desc'),
			'kode_desc' => $this->input->post('kode_desc'),
			'desc' => $this->input->post('desc'),
			'ket' => $this->input->post('ket'),
			'updatedby' => $userlog ,
			'updateddate' => $waktusaatini,
			'tanggal' => $waktuini,
			);
		$where =array( 
			'id_desc' => $id_desc,
	       );
		
		$res = $this->descm->UpdateDesc($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'desc');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'desc');
		}
}
		function hapusdesc($id_desc = 1){
		$this->load->model('descm');
		$result = $this->descm->Hapus('tbl_desc', array('id_desc' => $id_desc));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'desc');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'desc');
		}
	}
	
		//untuk buat judul 
	
	function editjd($id_jd){	

	      $this->load->model('descm');	
		  $this->load->model('menum');
		$tampung = $this->descm->GetEdit('tbl_jdl_dept',array('id_jd' =>$id_jd));
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
			'jdl_desc' => $tampung[0]['jdl_desc'],
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
			'updatedby' => $userlog ,
			'updateddate' => $waktusaatini,
			);
		$this->load->view('desc/edit_jd', $data);
	}
	
		//untuk buat judul 
	function updatejd(){
		$this->load->model('descm');
		$id_jd = $_POST['id_jd'];
        $jdl_desc = $_POST['jdl_desc'];
		$userlog = ($this->session->userdata('nama')
			);
			
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");
		
        $data = array(
			'id_jd' => $this->input->post('id_jd'),
			'jdl_desc' => $this->input->post('jdl_desc'),
			'updatedby' => $userlog ,
			'updateddate' => $waktusaatini,
			);
		$where =array( 
			'id_jd' => $id_jd,
	       );
		
		$res = $this->descm->UpdateJd($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'desc');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'desc');
		}
	}
	//end
	
}




	
// Developed by Muhammad Ridho
// Email: kenduanything23@gmail.com
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */