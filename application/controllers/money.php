<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Money extends CI_Controller {

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
	//tambah jd_money untuk judul
	public function index()
	{
		$this->load->model('moneym');
		$this->load->model('menum');
			$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
			'jd_money' => $this->db->get('tbl_jdl_dept')->result(),
			'data_money' => $this->moneym->GetMoney("order by kode asc")->result_array(),
			'id_money' => $this->moneym->GetIdm()->result_array(),
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		);

		$this->load->view('money/data_money', $data);
	}

	function addmoney()
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
		
		$this->load->view('money/add_money', $data);
	}

	

	function editmoney($id_kode){	

	      $this->load->model('moneym');	
		  $this->load->model('menum');
		$tampung = $this->moneym->GetWhere('tbl_money',array('id_kode' =>$id_kode));
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),
			'foto' => $this->session->userdata('foto'),
			'id_kode' => $tampung[0]['id_kode'],
			'kode' => $tampung[0]['kode'],
			'nk' => $tampung[0]['nk'],
			'money' => $tampung[0]['money'],
			'ket' => $tampung[0]['ket'],
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
			);
		$this->load->view('money/edit_money', $data);
	}

	function savedata(){
		//if($_POST){
		$this->load->model('moneym');
            $kode = $_POST['kode'];
			$nk = $_POST['nk'];
			$money = $_POST['money'];
			$ket = $_POST['ket'];
			$userlog = ($this->session->userdata('nama')
			);
			
			date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("d-m-Y H:i:s");
			$waktuini =date("m-Y");	
			
			$data = array(
			'kode' =>$kode,
			'nk' =>$nk,
			'money' =>$money,
			'ket' =>$ket,
			'createdby' => $userlog ,
			'createddate' => $waktusaatini,
			'tanggal' => $waktuini,
			);
				$result = $this->moneym->Simpan('tbl_money', $data);
				if($result == 1){
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'money');
				}else{
					$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
					header('location:'.base_ul().'money');
		}
	}


	function updatemoney(){
		$this->load->model('moneym');
		$id_kode = $_POST['id_kode'];
		$kode = $_POST['kode'];
        $nk = $_POST['nk'];
        $money = $_POST['money'];
		$ket = $_POST['ket'];
		$userlog = ($this->session->userdata('nama')
		);
			
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");
		$waktuini =date("m-Y");	
		
        $data = array(
			'id_kode' =>$id_kode,
			'kode' =>$kode,
			'nk' =>$nk,
			'money' =>$money,
			'ket' =>$ket,
			'updatedby' => $userlog ,
			'updateddate' => $waktusaatini,
			'tanggal' => $waktuini,
			);
		$where =array( 
			'id_kode' => $id_kode,
	       );
		
		$res = $this->moneym->UpdateMoney($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'money');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'money');
		}
}
		function hapusmoney($id_kode= 1){
		$this->load->model('moneym');
		$result = $this->moneym->Hapus('tbl_money', array('id_kode' => $id_kode));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'money');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'money');
		}
	}
	
		//untuk buat judul 
	
	function editjd($id_jd){	

	      $this->load->model('moneym');	
		  $this->load->model('menum');
		$tampung = $this->moneym->GetEdit('tbl_jdl_dept',array('id_jd' =>$id_jd));
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
			'jdl_keuangan' => $tampung[0]['jdl_keuangan'],
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
			'updatedby' => $userlog ,
			'updateddate' => $waktusaatini,
			);
		$this->load->view('money/edit_jd', $data);
	}
	
		//untuk buat judul 
	function updatejd(){
		$this->load->model('moneym');
		$id_jd = $_POST['id_jd'];
        $jdl_keuangan = $_POST['jdl_keuangan'];
		$userlog = ($this->session->userdata('nama')
			);
			
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");
		
        $data = array(
			'id_jd' => $this->input->post('id_jd'),
			'jdl_keuangan' => $this->input->post('jdl_keuangan'),
			'updatedby' => $userlog ,
			'updateddate' => $waktusaatini,
			);
		$where =array( 
			'id_jd' => $id_jd,
	       );
		
		$res = $this->moneym->UpdateJd($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'money');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'money');
		}
	}
	//end
	
}




	
// Developed by Muhammad Ridho
// Email: kenduanything23@gmail.com
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */