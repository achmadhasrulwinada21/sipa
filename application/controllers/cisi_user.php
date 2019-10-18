<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cisi_User extends CI_Controller {

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

	public function index()
	{
		$this->load->model('cisim');
			$data = array(
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
			'data_cisi' => $this->cisim->Getcisi("order by kode_kom ")->result_array()
		);

		$this->load->view('cisi_user/data_cisi', $data);
	}

	function addcisi()
	{
		$data = array(
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
			'status' => $this->model->GetStat()->result_array(),
			'optrole' => $this->model->GetRole()->result_array()
		);
		
		$this->load->view('cisi_user/add_cisi', $data);
	}

	

	function editcisi($kode_kom){	
	$data = array(
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
		);
	      $this->load->model('cisim');	
		$tampung = $this->cisim->GetWhere('tbl_cis',array('kode_kom' =>$kode_kom));
		$data = array(
			'nama_user' => $this->session->userdata('nama_user'),
			'foto' => $this->session->userdata('foto'),
			'kode_kom' => $tampung[0]['kode_kom'],
			'nama_kom' => $tampung[0]['nama_kom'],
			'sub_kom' => $tampung[0]['sub_kom'],
			'jumlah' => $tampung[0]['jumlah'],
			'waktu' => $tampung[0]['waktu'],
			'pencapaian' => $tampung[0]['pencapaian'],
			);
		$this->load->view('cisi_user/edit_cisi', $data);
	}

	function savedata(){
		//if($_POST){
		$this->load->model('cisim');
            $kode_kom = $_POST['kode_kom'];
			$nama_kom = $_POST['nama_kom'];
			$sub_kom = $_POST['sub_kom'];
			$jumlah = $_POST['jumlah'];
			$waktu = $_POST['waktu'];
			$pencapaian = $_POST['pencapaian'];
			
			$data = array(
			'kode_kom' =>$kode_kom,
			'nama_kom' =>$nama_kom,
			'sub_kom' =>$sub_kom,
			'jumlah' =>$jumlah,
			'waktu' =>$waktu,
			'pencapaian' =>$pencapaian,
					);
				$result = $this->cisim->Simpan('tbl_cis', $data);
				if($result == 1){
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'cisi_user');
				}else{
					$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
					header('location:'.base_ul().'cisi_user');
		}
	}


	function updatecisi(){
			$data = array(
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
		);
		$this->load->model('cisim');
		$kode_kom = $_POST['kode_kom'];
			$nama_kom = $_POST['nama_kom'];
			$sub_kom = $_POST['sub_kom'];
			$jumlah = $_POST['jumlah'];
			$waktu = $_POST['waktu'];
			$pencapaian = $_POST['pencapaian'];

        $data = array(
			'kode_kom' =>$kode_kom,
			'nama_kom' =>$nama_kom,
			'sub_kom' =>$sub_kom,
			'jumlah' =>$jumlah,
			'waktu' =>$waktu,
			'pencapaian' =>$pencapaian,
			);
		$where =array( 
			'kode_kom' => $kode_kom,
	       );
		
		$res = $this->cisim->UpdateCisi($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'cisi_user');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'cisi_user');
		}
}
		function hapuscisi($kode_kom = 1){
		$this->load->model('cisim');
		$result = $this->cisim->Hapus('tbl_cis', array('kode_kom' => $kode_kom));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'cisi_user');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'cisi_user');
		}
}
}




	
// Developed by Muhammad Ridho
// Email: kenduanything23@gmail.com
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */