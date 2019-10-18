<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KonfirmpesertaM extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	//ambil data description
	public function GetKonfirmpeserta($where= "")
	{
		$data = $this->db->query('select * from konfirm_peserta '.$where);
		return $data;
	}

	public function GetKonfirmpesertav($where= "")
	{
		$data = $this->db->query('select * from v_konfirmpeserta '.$where);
		return $data;
	}

	public function GetTotSeluruh($where= "")
	{
		$data = $this->db->query('select sum(cast(total as int)) as total from  v_tblkonsumsi');
		return $data;
	}

	public function Simpan($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function GetWhere($table, $data)
	{
    $res=$this->db->get_where($table, $data);
    return $res->result_array();
}
 function UpdateKonfirmpeserta($data){
    	$this->db->where('idkonfirmpeserta',$data['idkonfirmpeserta']);
    	$this->db->update('konfirm_peserta',$data);

    }

    //ambil data untuk print
	// public function GetId()
	// {
	// 	$datas = $this->db->query('select DISTINCT no_surat from sukubunga order by no_surat asc');
	// 	return $datas;
	// }

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}
}
	