<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ITModel_Cis_Man extends CI_Model {
	public function view(){
		return $this->db->get('cis_it_man')->result(); // Tampilkan semua data yang ada di tabel siswa
	}
	
	// Fungsi untuk melakukan proses upload file
	public function upload_file($filename){
		$this->load->library('upload'); // Load librari upload
		
		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx';
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
		$this->db->insert_batch('cis_it_man', $data);
	}
	
	public function GetCisIndukIT($where= "")
	{
		$data = $this->db->query('select * from v_cismanit '.$where);
		return $data;
	}
	
	//ambil data untuk print
	public function GetNamaDept()
	{
		$datas = $this->db->query('select DISTINCT nama_cis from v_cismanit');
		return $datas;
	}
	
	//untuk delete
	public function insert_simpan($table, $data){
		return $this->db->insert($table, $data);
	}

}
