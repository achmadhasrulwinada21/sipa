<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KonsumsiM extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	//ambil data description
	public function GetKonsumsi($where= "")
	{
		$data = $this->db->query('select * from tbl_konsumsi '.$where);
		return $data;
	}

	public function GetKonsumsiv($where= "")
	{
		$data = $this->db->query('select * from v_tblkonsumsi '.$where);
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
 function UpdateKonsumsi($data){
    	$this->db->where('idkonsumsi',$data['idkonsumsi']);
    	$this->db->update('tbl_konsumsi',$data);

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
	
	