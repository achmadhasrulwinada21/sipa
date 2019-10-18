<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detail extends CI_Controller {

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

	public function index()
	{
		$this->load->model('detailm');
		$this->load->model('menum');
			$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
			'jd_detail' => $this->db->get('tbl_jdl_dept')->result(),
			'data_detail' => $this->detailm->GetDetail("order by kode_detail asc")->result_array(),
			'id_detail' => $this->detailm->GetIdq()->result_array(),
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		);

		$this->load->view('detail/data_detail', $data);
	}

	function adddetail()
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
		
		$this->load->view('detail/add_detail', $data);
	}

	

	function editdetail($id_detail){	
			$this->load->model('detailm');
			$this->load->model('menum');		  
		$tampung = $this->detailm->GetWhere('tbl_detail',array('id_detail' =>$id_detail));
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),
			'foto' => $this->session->userdata('foto'),
			'id_detail' => $tampung[0]['id_detail'],
			'kode_detail' => $tampung[0]['kode_detail'],
			'detail' => $tampung[0]['detail'],
			'qty' => $tampung[0]['qty'],
			'sat' => $tampung[0]['sat'],
			'ket' => $tampung[0]['ket'],
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
			);
		$this->load->view('detail/edit_detail', $data);
	}

	function savedata(){
		//if($_POST){
		$this->load->model('detailm');
            $kode_detail = $_POST['kode_detail'];
			$detail = $_POST['detail'];
			$qty = $_POST['qty'];
			$sat = $_POST['sat'];
			$ket = $_POST['ket'];
			$userlog = ($this->session->userdata('nama')
			);
			
			date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("d-m-Y H:i:s");
			$waktuini =date("m-Y");	
			
			$data = array(
			'kode_detail' =>$kode_detail,
			'detail' =>$detail,
			'qty' =>$qty,
			'sat' =>$sat,
			'ket' => $ket,
			'createdby' => $userlog ,
			'createddate' => $waktusaatini,
			'tanggal' => $waktuini,
			);
				$result = $this->detailm->Simpan('tbl_detail', $data);
				if($result == 1){
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'detail');
				}else{
					$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
					header('location:'.base_ul().'detail');
		}
	}


	function updatedetail(){
		$this->load->model('detailm');
		$id_detail = $_POST['id_detail'];
		$kode_detail = $_POST['kode_detail'];
        $detail = $_POST['detail'];
        $qty = $_POST['qty'];
        $sat = $_POST['sat'];
        $ket = $_POST['ket'];
		$userlog = ($this->session->userdata('nama')
		);
			
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");
		$waktuini =date("m-Y");	
		
		$data = array(
			'id_detail' => $this->input->post('id_detail'),
			'kode_detail' => $this->input->post('kode_detail'),
			'detail' => $this->input->post('detail'),
			'qty' => $this->input->post('qty'),
			'sat' => $this->input->post('sat'),
			'ket' => $this->input->post('ket'),
			'updatedby' => $userlog ,
			'updateddate' => $waktusaatini,
			'tanggal' => $waktuini,
			);
		$where =array( 
			'id_detail' => $id_detail,
	       );
		
		$res = $this->detailm->UpdateDetail($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'detail');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'detail');
		}
}
		function hapusdetail($id_detail = 1){
		$this->load->model('detailm');
		$result = $this->detailm->Hapus('tbl_detail', array('id_detail' => $id_detail));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'detail');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'detail');
		}
	}
	
			//untuk buat judul 
	
	function editjd($id_jd){	

			$this->load->model('detailm');
			$this->load->model('menum');
		$tampung = $this->detailm->GetEdit('tbl_jdl_dept',array('id_jd' =>$id_jd));
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
			'jdl_detail' => $tampung[0]['jdl_detail'],
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
			'updatedby' => $userlog ,
			'updateddate' => $waktusaatini,
			);
		$this->load->view('detail/edit_jd', $data);
	}
	
		//untuk buat judul 
	function updatejd(){
		$this->load->model('detailm');
		$id_jd = $_POST['id_jd'];
        $jdl_detail = $_POST['jdl_detail'];
		$userlog = ($this->session->userdata('nama')
			);
			
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");
		
        $data = array(
			'id_jd' => $this->input->post('id_jd'),
			'jdl_detail' => $this->input->post('jdl_detail'),
			'updatedby' => $userlog ,
			'updateddate' => $waktusaatini,
			);
		$where =array( 
			'id_jd' => $id_jd,
	       );
		
		$res = $this->detailm->UpdateJd($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'detail');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'detail');
		}
	}
	//end
	
}




	
// Developed by Muhammad Ridho
// Email: kenduanything23@gmail.com
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */