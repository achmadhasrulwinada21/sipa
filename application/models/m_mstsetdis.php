<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_mstsetdis extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
		
	}
	
		
	 public function Getsetdis($where= "")
	{
		$data = $this->db->query('select *  from v_mstsetdis '.$where);
		return $data;
	}

	 public function Ambilsetdis($where= "")
	{
		$data = $this->db->query('select * from master_setup_dist '.$where);
		return $data;
	}

	public function Getpt($where= "")
	{
		$data = $this->db->query('select * from master_perusahaan '.$where);
		return $data;
	}

	public function Getdistributor($where= "")
	{
		$data = $this->db->query('select * from master_distributor '.$where);
		return $data;
	}
	
	public function Simpan($data)
	{
		return $this->db->insert_batch('master_setup_dist', $data);
	}

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}

	function Updatesetdis($data){
    	$this->db->where('idsetdis',$data['idsetdis']);
    	$this->db->update('master_setup_dist',$data);
    }

	

	public function getAll() {
           $this->db->select('*');
           $this->db->from('master_setup_dist');
           $data = $this->db->get();
           return $data->result();
      }


	
	// Fungsi untuk melakukan proses upload file
	public function upload_file($filename){
		$this->load->library('upload'); // Load librari upload
		
		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx|xls';
		$config['max_size']	= '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;
	
		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
	
	// Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
	public function insert_multiple($data){
		$this->db->insert_batch('master_setup_dist', $data);
	}
	
	
	
	//untuk delete
	public function insert_simpan($table, $data){
		return $this->db->insert($table, $data);
	}

}
