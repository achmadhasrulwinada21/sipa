<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ci_to_excel_model extends CI_Model {
	public function view(){
		return $this->db->get('master_perusahaan')->result(); // Tampilkan semua data yang ada di tabel siswa
	}
	
	public function view_prinsp(){
		return $this->db->get('produko3')->result(); // Tampilkan semua data yang ada di tabel siswa
	}
	
		public function view_distrib(){
		return $this->db->get('master_distributor')->result(); // Tampilkan semua data yang ada di tabel siswa
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
		$this->db->insert_batch('master_perusahaan', $data);
	}
	
	public function insert_multiple_prinsp($data){
		$this->db->insert_batch('produko3', $data);
	}
	
	public function insert_multiple_distributor($data){
		$this->db->insert_batch('master_distributor', $data);
	}
		// public function insert_multiple_prinsp($data){
		// $this->db->insert_batch('master_perusahaan', $data);
	// }
	public function getAll() {
           $this->db->select('*');
           $this->db->from('master_perusahaan');
           $data = $this->db->get();
           return $data->result();
      }
	  
	  public function getAll_obat() {
           $this->db->select('*');
           $this->db->from('master_perusahaan');
           $this->db->where('tipe_produk','OBAT');
           $data = $this->db->get();
           return $data->result();
      }
	  
	    public function getAll_depbang() {
           $this->db->select('*');
           $this->db->from('master_perusahaan');
           $this->db->where('tipe_produk','DEPBANG');
           $data = $this->db->get();
           return $data->result();
      }
	  
	    public function getAll_alum() {
           $this->db->select('*');
           $this->db->from('master_perusahaan');
           $this->db->where('tipe_produk','ALUM');
           $data = $this->db->get();
           return $data->result();
      }
	  
	    public function getAll_alkes() {
           $this->db->select('*');
           $this->db->from('master_perusahaan');
           $this->db->where('tipe_produk','ALKES');
           $data = $this->db->get();
           return $data->result();
      }
	  
	  
	public function getAll_distrSSib() {
           $this->db->select('*');
           $this->db->from('master_distributor');
           $data = $this->db->get();
           return $data->result();
      }  


      public function getAll_distrib() {
           $this->db->select('*');
           $this->db->from('master_distributor');
		   $this->db->where('tipe_produk','OBAT');
           $data = $this->db->get();
           return $data->result();
      }  




	  

	
}
