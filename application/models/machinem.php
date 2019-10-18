<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MachineM extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	//ambil data description
	public function GetMachine($where= "")
	{
		$data = $this->db->query('select * from tbl_machine '.$where);
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
 function UpdateMachine($data){
    	$this->db->where('id_machine',$data['id_machine']);
    	$this->db->update('tbl_machine',$data);

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
	public function GetIdo()
	{
		$datas = $this->db->query('select DISTINCT kode_machine from tbl_machine order by kode_machine asc');
		return $datas;
	}
	

}