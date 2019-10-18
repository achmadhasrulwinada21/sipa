<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Machine extends CI_Controller {

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
	
	//tambah jd_unit untuk judul
	public function index()
	{
		$this->load->model('machinem');
		$this->load->model('menum');
			$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
			'jd_unit' => $this->db->get('tbl_jdl_dept')->result(),
			'data_machine' => $this->machinem->GetMachine("order by kode_machine asc")->result_array(),
			'id_machine' => $this->machinem->GetIdo()->result_array(),
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		);

		$this->load->view('machine/data_machine', $data);
	}

	function addmachine()
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
		
		$this->load->view('machine/add_machine', $data);
	}

	

	function editmachine($id_machine){	

			$this->load->model('machinem');
			$this->load->model('menum');	
		
		$tampung = $this->machinem->GetWhere('tbl_machine',array('id_machine' =>$id_machine));
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),
			'foto' => $this->session->userdata('foto'),
			'id_machine' => $tampung[0]['id_machine'],
			'kode_machine' => $tampung[0]['kode_machine'],
			'no' => $tampung[0]['no'],
			'sat' => $tampung[0]['sat'],
			'jumlah' => $tampung[0]['jumlah'],
			'ket' => $tampung[0]['ket'],
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
			);
		$this->load->view('machine/edit_machine', $data);
	}

	function savedata(){
		//if($_POST){
		$this->load->model('machinem');
            $kode_machine = $_POST['kode_machine'];
			$no = $_POST['no'];
			$sat = $_POST['sat'];
			$jumlah = $_POST['jumlah'];
			$ket = $_POST['ket'];
			$userlog = ($this->session->userdata('nama')
			);
			
			date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("d-m-Y H:i:s");
			$waktuini =date("m-Y");	
			
			$data = array(
			'kode_machine' =>$kode_machine,
			'no' =>$no,
			'sat' =>$sat,
			'jumlah' =>$jumlah,
			'ket' =>$ket,
			'createdby' => $userlog ,
			'createddate' => $waktusaatini,
			'tanggal' => $waktuini,
			);
				$result = $this->machinem->Simpan('tbl_machine', $data);
				if($result == 1){
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'machine');
				}else{
					$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
					header('location:'.base_ul().'machine');
		}
	}


	function updatemachine(){
		$this->load->model('machinem');
		$id_machine = $_POST['id_machine'];
		$kode_machine = $_POST['kode_machine'];
        $no = $_POST['no'];
        $sat = $_POST['sat'];
		$jumlah = $_POST['jumlah'];
		$ket = $_POST['ket'];
		$userlog = ($this->session->userdata('nama')
		);
			
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");
		$waktuini =date("m-Y");	
		
        $data = array(
			'id_machine' =>$id_machine,
			'kode_machine' =>$kode_machine,
			'no' =>$no,
			'sat' =>$sat,
			'jumlah' =>$jumlah,
			'ket' =>$ket,
			'updatedby' => $userlog ,
			'updateddate' => $waktusaatini,
			'tanggal' => $waktuini,
			);
		$where =array( 
			'id_machine' => $id_machine,
	       );
		
		$res = $this->machinem->UpdateMachine($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'machine');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'machine');
		}
}
		function hapusmachine($id_machine = 1){
		$this->load->model('machinem');
		$result = $this->machinem->Hapus('tbl_machine', array('id_machine' => $id_machine));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'machine');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'machine');
		}
	}
	
		//untuk buat judul 
	
	function editjd($id_jd){	

	      $this->load->model('machinem');	
		  $this->load->model('menum');
		$tampung = $this->machinem->GetEdit('tbl_jdl_dept',array('id_jd' =>$id_jd));
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
		$this->load->model('machinem');
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
		
		$res = $this->machinem->UpdateJd($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'machine');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'machine');
		}
	}
	//end
	
}




	
// Developed by Muhammad Ridho
// Email: kenduanything23@gmail.com
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */