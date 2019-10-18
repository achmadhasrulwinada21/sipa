<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DeptM extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	//ambil data dept
	public function GetDept($where= "")
	{
		$data = $this->db->query('select * from tbl_dept '.$where);
		return $data;
	}
	
	public function Hapus($table,$where)
	{
		return $this->db->delete($table,$where);
	}
		
	public function Simpan($table, $data)
	{
		return $this->db->insert($table, $data);
	}	
		
	function UpdateDept($data){
    	$this->db->where('kode_dept',$data['kode_dept']);
    	$this->db->update('tbl_dept',$data);
	}

	public function GetWhere($table, $data)
	{
		$res=$this->db->get_where($table, $data);
		return $res->result_array();
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

}