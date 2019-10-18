<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RincianBarang extends CI_Controller {

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
	public function index($kode=0)
	{
		
		$idfor_post_array = array();
		foreach($this->model->AmbilDataDetailTransbarang("where id_transbarang = '$kode'")->result_array() as $role){
			$idfor_post_array[] = $role['id_formulir'];
		}
		
		$this->load->model('detbarangm');
			$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
			'id_formulir' => $this->detbarangm->GetId()->result_array(),
			'data_detbarang' => $this->detbarangm->GetDetBarang("order by id_transbarang")->result_array(),
			'no_detbarang' => $this->detbarangm->GetId()->result_array(),
			'formulir' => $this->model->AmbilDataFormulir()->result_array(),
			'idfor_post' => $idfor_post_array,
		);

		$this->load->view('rincianbarang/data_rinbarang', $data);
	}

	
}