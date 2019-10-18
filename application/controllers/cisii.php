<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cisii extends CI_Controller {

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
	
	//tambah jd_cisi untuk judul
	
	public function index()
	{
		$this->load->model('cisimm');
		$this->load->model('menum');
			$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
			'jd_cisi' => $this->db->get('tbl_jdl_cisi')->result(),
			'data_cisi' => $this->cisimm->Getcisi("order by kode_kom ")->result_array(),
			'id_cisii' => $this->cisimm->GetIdd()->result_array(),
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		);

		$this->load->view('cisii/data_cisi', $data);
	}

	function addcisi()
	{	$this->load->model('menum');
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
		
		$this->load->view('cisii/add_cisi', $data);
	}

	

	function editcisi($id_cisi){	

			$this->load->model('cisimm');
			$this->load->model('menum');		  
		$tampung = $this->cisimm->GetWhere('tbl_cisi',array('id_cisi' =>$id_cisi));
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),
			'foto' => $this->session->userdata('foto'),
			'id_cisi' => $tampung[0]['id_cisi'],
			'kode_kom' => $tampung[0]['kode_kom'],
			'sub_kom' => $tampung[0]['sub_kom'],
			'jumlah' => $tampung[0]['jumlah'],
			'pencapaian' => $tampung[0]['pencapaian'],
			'pendidikan' => $tampung[0]['pendidikan'],
			'sertifikasi' => $tampung[0]['sertifikasi'],
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
			);
		$this->load->view('cisii/edit_cisi', $data);
	}

	function savedata(){
		//if($_POST){
		$this->load->model('cisimm');
            $kode_kom = $_POST['kode_kom'];
			$sub_kom = $_POST['sub_kom'];
			$jumlah = $_POST['jumlah'];
			$pencapaian = $_POST['pencapaian'];
			$pendidikan = $_POST['pendidikan'];
			$sertifikasi = $_POST['sertifikasi'];
			$userlog = ($this->session->userdata('nama')
			);
			
			date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("d-m-Y H:i:s");
			$waktuini =date("m-Y");	
			
			$data = array(
			'kode_kom' =>$kode_kom,
			'sub_kom' =>$sub_kom,
			'jumlah' =>$jumlah,
			'pencapaian' =>$pencapaian,
			'pendidikan' =>$pendidikan,
			'sertifikasi' =>$sertifikasi,
			'createdby' => $userlog ,
			'createddate' => $waktusaatini,
			'tanggal' => $waktuini,
			);
			
				$result = $this->cisimm->Simpan('tbl_cisi', $data);
				if($result == 1){
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'cisii');
				}else{
					$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
					header('location:'.base_ul().'cisii');
		}
	}


	function updatecisi(){
		$this->load->model('cisimm');
			$id_cisi = $_POST['id_cisi'];
			$kode_kom = $_POST['kode_kom'];
			$sub_kom = $_POST['sub_kom'];
			$jumlah = $_POST['jumlah'];
			$pencapaian = $_POST['pencapaian'];
			$pendidikan = $_POST['pendidikan'];
			$sertifikasi = $_POST['sertifikasi'];
			$userlog = ($this->session->userdata('nama')
			);
			
			date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("d-m-Y H:i:s");	
			$waktuini =date("m-Y");	
			
        $data = array(
			'id_cisi' =>$id_cisi,
			'kode_kom' =>$kode_kom,
			'sub_kom' =>$sub_kom,
			'jumlah' =>$jumlah,
			'pencapaian' =>$pencapaian,
			'pendidikan' =>$pendidikan,
			'sertifikasi' =>$sertifikasi,
			'updatedby' => $userlog ,
			'updateddate' => $waktusaatini,
			'tanggal' => $waktuini,
			);
		$where =array( 
			'id_cisi' => $id_cisi,
	       );
		
		$res = $this->cisimm->UpdateCisi($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'cisii');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'cisii');
		}
}
		function hapuscisi($id_cisi = 1){
		$this->load->model('cisimm');
		$result = $this->cisimm->Hapus('tbl_cisi', array('id_cisi' => $id_cisi));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'cisii');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'cisii');
		}
	}
	
	//untuk buat judul 
	
	function editjd($id_jd){	

	      $this->load->model('cisimm');	
		  $this->load->model('menum');
		$tampung = $this->cisimm->GetEdit('tbl_jdl_cisi',array('id_jd' =>$id_jd));
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
			'jdl_cisii' => $tampung[0]['jdl_cisii'],
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
			'updatedby' => $userlog ,
			'updateddate' => $waktusaatini,
			);
		$this->load->view('cisii/edit_jd', $data);
	}
	
		//untuk buat judul 
	function updatejd(){
		$this->load->model('cisimm');
		$id_jd = $_POST['id_jd'];
        $jdl_cisii = $_POST['jdl_cisii'];
		$userlog = ($this->session->userdata('nama')
			);
			
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");
		
        $data = array(
			'id_jd' => $this->input->post('id_jd'),
			'jdl_cisii' => $this->input->post('jdl_cisii'),
			'updatedby' => $userlog ,
			'updateddate' => $waktusaatini,
			);
		$where =array( 
			'id_jd' => $id_jd,
	       );
		
		$res = $this->cisimm->UpdateJd($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'cisii');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'cisii');
		}
	}
	//end
	
}




	
// Developed by Muhammad Ridho
// Email: kenduanything23@gmail.com
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */