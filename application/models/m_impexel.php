<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_impexel extends CI_Model {
	public function view(){
		return $this->db->get('tb_detail_prod2')->result(); // Tampilkan semua data yang ada di tabel siswa
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
		$this->db->insert_batch('tb_detail_prod2', $data);
	}
	
	function GetProdukos($where= "")
	{
		$data = $this->db->query('select * from v_produkos2 '.$where);
		return $data;
	}

	function GetProddet($where= "")
	{
		$data = $this->db->query('select * from tb_detail_prod2 '.$where);
		return $data;
	}
	

	function get_data_pabrik_bykode_db1($koper){
    $hsl=$this->db->query("SELECT * FROM produko2 WHERE koper='$koper'");
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'koper' => $data->koper,
         'idpr2' => $data->idpr2,
             
        
          );
      }
    }
    return $hasil;
  }


	//ambil data untuk print
	// public function GetNamaDept()
	// {
	// 	$datas = $this->db->query('select DISTINCT nama_cis from v_cismoneyit');
	// 	return $datas;
	// }
	
	//untuk delete
	public function insert_simpan($table, $data){
		return $this->db->insert($table, $data);
	}

}
