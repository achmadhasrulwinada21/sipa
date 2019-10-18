<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cisi extends CI_Controller {

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
		elseif (!$this->session->userdata('level','2')) {
		// 	//login sebagai admin
		redirect(base_url().'backend');
		}
		
	}
	
	//tambah jd_cisi untuk judul

	public function index()
	{
		$this->load->model('cisim');
		$this->load->model('menum');
			$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
			'jd_cisi' => $this->db->get('tbl_jdl_cisi')->result(),
			'data_cisi' => $this->cisim->Getcisi("order by kode_kom ")->result_array(),
			'id_cisi' => $this->cisim->GetId()->result_array(),
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
			
		);

		$this->load->view('cisi/data_cisi', $data);
	}

	function addcisi()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
			'status' => $this->model->GetStat()->result_array(),
			'optrole' => $this->model->GetRole()->result_array()
		);
		
		$this->load->model('menum');
			$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		);
		
		$this->load->view('cisi/add_cisi', $data);
	}

	

	function editcisi($id_cisi){	
	$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
		);
			$this->load->model('cisim');
			$this->load->model('menum');
		$tampung = $this->cisim->GetWhere('tbl_cis',array('id_cisi' =>$id_cisi));
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),
			'foto' => $this->session->userdata('foto'),
			'id_cisi' => $tampung[0]['id_cisi'],
			'kode_kom' => $tampung[0]['kode_kom'],
			'sub_kom' => $tampung[0]['sub_kom'],
			'jumlah' => $tampung[0]['jumlah'],
			'waktu' => $tampung[0]['waktu'],
			'pencapaian' => $tampung[0]['pencapaian'],
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
			);
		$this->load->view('cisi/edit_cisi', $data);
	}
	
		function updatecisi(){
			$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
		);
		$this->load->model('cisim');
			$id_cisi = $_POST['id_cisi'];
			$kode_kom = $_POST['kode_kom'];
			$sub_kom = $_POST['sub_kom'];
			$jumlah = $_POST['jumlah'];
			$waktu = $_POST['waktu'];
			$pencapaian = $_POST['pencapaian'];
			
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
			'waktu' =>$waktu,
			'pencapaian' =>$pencapaian,
			'updatedby' => $userlog ,
			'updateddate' => $waktusaatini,
			'tanggal' => $waktuini,
			);
		$where =array( 
			'id_cisi' => $id_cisi,
	       );
		
		$res = $this->cisim->UpdateCisi($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'cisi');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'cisi');
		}
	}

	function savedata(){
		//if($_POST){
		$this->load->model('cisim');
            $kode_kom = $_POST['kode_kom'];
			$sub_kom = $_POST['sub_kom'];
			$jumlah = $_POST['jumlah'];
			$waktu = $_POST['waktu'];
			$pencapaian = $_POST['pencapaian'];
			
			$userlog = ($this->session->userdata('nama')
			);
			
			date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("d-m-Y H:i:s");
			$waktuini =date("m-Y");
			
			$data = array(
			'kode_kom' =>$kode_kom,
			'sub_kom' =>$sub_kom,
			'jumlah' =>$jumlah,
			'waktu' =>$waktu,
			'pencapaian' =>$pencapaian,
			'createdby' => $userlog ,
			'createddate' => $waktusaatini,
			'tanggal' => $waktuini,
			);

				$result = $this->cisim->Simpan('tbl_cis', $data);
				if($result == 1){
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'cisi');
				}else{
					$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
					header('location:'.base_ul().'cisi');
		}
	}


		function hapuscisi($id_cisi = 1){
		$this->load->model('cisim');
		$result = $this->cisim->Hapus('tbl_cis', array('id_cisi' => $id_cisi));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'cisi');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'cisi');
		}
	}
	
	//untuk buat judul 
	
	function editjd($id_jd){
		
	      $this->load->model('cisim');	
		  $this->load->model('menum');
			$tampung = $this->cisim->GetEdit('tbl_jdl_cisi',array('id_jd' =>$id_jd));
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
			'jdl_cisi' => $tampung[0]['jdl_cisi'],
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
			'updatedby' => $userlog ,
			'updateddate' => $waktusaatini,
			);
		$this->load->view('cisi/edit_jd', $data);
	}
	
		//untuk buat judul 
	function updatejd(){
		$this->load->model('cisim');
		$id_jd = $_POST['id_jd'];
        $jdl_cisi = $_POST['jdl_cisi'];
		$userlog = ($this->session->userdata('nama')
			);
			
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");
		
        $data = array(
			'id_jd' => $this->input->post('id_jd'),
			'jdl_cisi' => $this->input->post('jdl_cisi'),
			'updatedby' => $userlog ,
			'updateddate' => $waktusaatini,
			);
		$where =array( 
			'id_jd' => $id_jd,
	       );
		
		$res = $this->cisim->UpdateJd($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'cisi');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'cisi');
		}
	}
	//end
	
}




	
// Developed by Muhammad Ridho
// Email: kenduanything23@gmail.com
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */