<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dept extends CI_Controller {

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
		//tambah jd_dept untuk judul
	public function index()
	{
		$this->load->model('deptm');
		$this->load->model('menum');
			$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
			'jd_dept' => $this->db->get('tbl_jdl_dept')->result(),
			'data_dept' => $this->deptm->GetDept("order by kode_dept asc")->result_array(),
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		);

		$this->load->view('dept/data_dept', $data);
	}

	function adddept()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
			'status' => $this->model->GetStat()->result_array(),
			'optrole' => $this->model->GetRole()->result_array()
		);
		
		$this->load->view('dept/add_dept', $data);
	}

	

	function editdept($kode_dept){	

			$this->load->model('deptm');
			$this->load->model('menum');		  
		$tampung = $this->deptm->GetWhere('tbl_dept',array('kode_dept' =>$kode_dept));
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),
			'foto' => $this->session->userdata('foto'),
			'kode_dept' => $tampung[0]['kode_dept'],
			'nama_dept' => $tampung[0]['nama_dept'],
			'alamat' => $tampung[0]['alamat'],
			'kepala_dept' => $tampung[0]['kepala_dept'],
			'direktur' => $tampung[0]['direktur'],
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
			);
			
		$this->load->view('dept/edit_dept', $data);
	}

	function savedata(){
		//if($_POST){
		$this->load->model('deptm');
            $kode_dept = $_POST['kode_dept'];
			$nama_dept = $_POST['nama_dept'];
			$userlog = ($this->session->userdata('nama')
			);
			
			date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("d-m-Y H:i:s");
			
			$data = array(
			'kode_dept' =>$kode_dept,
			'nama_dept' =>$nama_dept,
			'createdby' => $userlog ,
			'createddate' => $waktusaatini,
					);
				$result = $this->deptm->Simpan('tbl_dept', $data);
				if($result == 1){
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'dept');
				}else{
					$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
					header('location:'.base_ul().'dept');
		}
	}


	function updatedept(){
		$this->load->model('deptm');
		$kode_dept = $_POST['kode_dept'];
        $nama_dept = $_POST['nama_dept'];
        $alamat = $_POST['alamat'];
        $kepala_dept = $_POST['kepala_dept'];
        $direktur = $_POST['direktur'];
		$userlog = ($this->session->userdata('nama')
		);
			
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");
			
        $data = array(
			'kode_dept' => $this->input->post('kode_dept'),
			'nama_dept' => $this->input->post('nama_dept'),
			'alamat' => $this->input->post('alamat'),
			'kepala_dept' => $this->input->post('kepala_dept'),
			'direktur' => $this->input->post('direktur'),
			'updatedby' => $userlog ,
			'updateddate' => $waktusaatini,
			);
		$where =array( 
			'kode_dept' => $kode_dept,
	       );
		
		$res = $this->deptm->UpdateDept($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'dept');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'dept');
		}
	}
	
	//untuk buat judul departemen
	
	function editjd($id_jd){	

	      $this->load->model('deptm');	
		  $this->load->model('menum');
		$tampung = $this->deptm->GetEdit('tbl_jdl_dept',array('id_jd' =>$id_jd));
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
			'jdl_dept' => $tampung[0]['jdl_dept'],
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
			'updatedby' => $userlog ,
			'updateddate' => $waktusaatini,
			);
		$this->load->view('dept/edit_jd', $data);
	}

	//untuk buat judul departemen
	function updatejd(){
		$this->load->model('deptm');
		$id_jd = $_POST['id_jd'];
        $jdl_dept = $_POST['jdl_dept'];
		$userlog = ($this->session->userdata('nama')
			);
			
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");
		
        $data = array(
			'id_jd' => $this->input->post('id_jd'),
			'jdl_dept' => $this->input->post('jdl_dept'),
			'updatedby' => $userlog ,
			'updateddate' => $waktusaatini,
			);
		$where =array( 
			'id_jd' => $id_jd,
	       );
		
		$res = $this->deptm->UpdateJd($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'dept');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'dept');
		}
	}
	
	//end
	
		function hapusdept($kode_dept = 1){
		$this->load->model('deptm');
		$result = $this->deptm->Hapus('tbl_dept', array('kode_dept' => $kode_dept));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'dept');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'dept');
		}
	}
	
}




	
// Developed by Muhammad Ridho
// Email: kenduanything23@gmail.com
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */