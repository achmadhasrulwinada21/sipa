<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BungaM extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	//ambil data description
	public function GetBunga($where= "")
	{
		$data = $this->db->query('select * from sukubunga '.$where);
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
 function UpdateBunga($data){
    	$this->db->where('id_sbunga',$data['id_sbunga']);
    	$this->db->update('sukubunga',$data);

    }

    //ambil data untuk print
	public function GetId()
	{
		$datas = $this->db->query('select DISTINCT no_surat from sukubunga order by no_surat asc');
		return $datas;
	}

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}
}
	
	//-------------------ambil data judul dept---------------------------------------
//	public function GetJd()
//	{
//		$datas = $this->db->query('select * from tbl_jdl_dept ');
//		return $datas;
//	}
	
  // public function GetEdit($tables, $datas)
	//	{
	//	$res=$this->db->get_where($tables, $datas);
	//	return $res->result_array();
	//	}
	
//	function UpdateJd($datas)
		{
  //  	$this->db->where('id_jd',$datas['id_jd']);
    //	$this->db->update('tbl_jdl_dept',$datas);
	//	}
		
	//ambil data untuk print
//	public function GetIdq()
//	{
//		$datas = $this->db->query('select DISTINCT kode_detail from tbl_detail order by kode_detail asc');
//		return $datas;

}