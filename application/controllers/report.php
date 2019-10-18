<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_Memo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->_cek_login();
	}
	private function _cek_login()
	{
		if(!$this->session->userdata('useradmin')){            
			redirect(base_url().'backend');
		}
	}

	public function index()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			'data_report' => $this->model->GetReport("order by id_invrep asc")->result_array(),
		);

		$this->load->view('reportinv/data_reportinv', $data);
	}

	function addreportinv()
	{
		$data = array(


			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			'id_invrep' => $this->model->GetReport()->result_array(),
			'kepada' => $this->model->GetMemo()->result_array(),
			'dari' =>$this->model->GetMemo()->result_array()
		);
		
		$this->load->view('memo/add_memo', $data);
	}

	

	function editmemo($kode = 0){		
		$data_memo = $this->model->AmbilDataMemo("where id_memo = '$kode'")->result_array();
		$data = array(
			'id_memo' => $data_memo[0]['id_memo'],	
			'kepada' => $data_memo[0]['kepada'],
			'dari' => $data_memo[0]['dari'],
			'tanggal' => $data_memo[0]['tanggal'],
			'perihal' => $data_memo[0]['perihal'],
			'untuk' => $data_memo[0]['untuk'],
			'deskripsi' => $data_memo[0]['deskripsi'],
			'approval' => $data_memo[0]['approval'],
			// 'cdateby' => $tampung[0]['cdateby'],
			// 'updateby' => $tampung[0]['updateby'],
			// 'cdate' => $tampung[0]['cdate'],
			// 'updatedate' => $tampung[0]['updatedate'],

			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			
			
			);
		$this->load->view('memo/edit_memo', $data);
	}

	function savedata(){
		//if($_POST){
		   

		//memorandum
		    //$id_memo = $_POST['id_memo'];
			$kepada  = $_POST['kepada'];
			$dari = $_POST['dari'];
			$tanggal = $_POST['tanggal'];
			$perihal = $_POST['perihal'];
			$untuk = $_POST['untuk'];
			$deskripsi = $_POST['deskripsi'];
			$approval = $_POST['approval'];
			
		//invoice
		   	$kepada2  = $_POST['untuk'];

		   	//array memo
			$data = array(
			//'id_memo' =>$id_memo,	
			'kepada' =>$kepada,
			'dari' =>$dari,
			'tanggal' => date ("d-m-y H:i:s"),
			'perihal' =>$perihal,
			'untuk' =>$untuk,
			'deskripsi' =>$deskripsi,
			'approval' =>$approval,
			// 'cdateby' =>$cdateby,
			// 'updateby' =>$updateby,
			// 'cdate' => date("d-m-y H:i:s"),
			// 'updatedate' => date("d-m-y H:i:s"),

					);

			//array invoice
			$datainv = array(
			//'id_memo' =>$id_memo,	
			'kepada' =>$kepada2,
					);


				$result = $this->model->Simpan('inv_memo', $data);
				$result = $this->model->Simpan('inv_data', $datainv);
				if($result == 1){
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'memo');
				}else{
					$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
					header('location:'.base_ul().'memo');
		}
	}

	function updatememo(){

		$id_memo= $_POST['id_memo'];

		$kepada = $_POST['kepada'];
		$dari = $_POST['dari'];		
		$tanggal = $_POST['tanggal'];
		$perihal = $_POST['perihal'];
		$untuk = $_POST['untuk'];
		$deskripsi = $_POST['deskripsi'];
		$approval = $_POST['approval'];
		
		$data = array(
			'id_memo' => $id_memo,
			'kepada' => $kepada,
			'dari' => $dari,
			'tanggal' => $tanggal,
			'perihal' => $perihal,
			'untuk' => $untuk,
			'deskripsi' => $deskripsi,
			'approval' => $approval,
			// 'cdateby' => $this->input->post('cdateby'),
			// 'updateby' => $this->input->post('updateby'),
			// 'cdate' => $this->input->post('cdate'),
			// 'updatedate' => $this->input->post('updatedate'),
			
			);
		
		$res = $this->model->updatememo($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'memo');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'memo');
		}
	}
	

	function hapusmemo($id = 1){
		
		$result = $this->model->Hapus('inv_memo', array('id_memo' => $id));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'memo');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'memo');
		}
	}
}



	
// Developed by Muhammad Ridho
// Email: kenduanything23@gmail.com
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */