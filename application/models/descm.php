<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DescM extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	//ambil data description
	public function GetDesc($where= "")
	{
		$data = $this->db->query('select * from tbl_desc '.$where);
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
 function UpdateDesc($data){
    	$this->db->where('id_desc',$data['id_desc']);
    	$this->db->update('tbl_desc',$data);

    }

public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}
	
	//-------------------ambil data judul dept---------------------------------------
	public function GetJd()
	{
		$datas = $this->db->query('select * from tbl_jdl_dept ');
		return $datas;
	}
	
   public function GetEdit($tables, $datas)
		{
		$res=$this->db->get_where($tables, $datas);
		return $res->result_array();
		}
	
	function UpdateJd($datas)
		{
    	$this->db->where('id_jd',$datas['id_jd']);
    	$this->db->update('tbl_jdl_dept',$datas);
		}
		
	//ambil data untuk print
	public function GetIdw()
	{
		$datas = $this->db->query('select DISTINCT kode_desc from tbl_desc order by kode_desc asc');
		return $datas;
	}
	

}