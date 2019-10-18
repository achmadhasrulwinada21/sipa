<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CisiMm extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	//ambil data description
	public function GetCisi($where= "")
	{
		$data = $this->db->query('select * from tbl_cisi '.$where);
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
 function UpdateCisi($data){
    	$this->db->where('id_cisi',$data['id_cisi']);
    	$this->db->update('tbl_cisi',$data);

    }

public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}
	
	//-------------------ambil data judul dept---------------------------------------
	public function GetJd()
	{
		$datas = $this->db->query('select * from tbl_jdl_cisi ');
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
    	$this->db->update('tbl_jdl_cisi',$datas);
		}
		
		//ambil data untuk print
	public function GetIdd()
	{
		$datas = $this->db->query('select DISTINCT kode_kom from tbl_cisi order by kode_kom asc');
		return $datas;
	}
	

}