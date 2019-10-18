<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Departemen extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	//ambil data description
	public function GetDepartemen($where= "")
	{
		$data = $this->db->query('select * from master_departemen');
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
 function UpdateDepartemen($data){
    	$this->db->where('id_depar',$data['id_depar']);
    	$this->db->update('master_departemen',$data);
    }
	
	public function GetEdit($tables, $datas)
	{
		$res=$this->db->get_where($tables, $datas);
		return $res->result_array();
	}
	
	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}
	
	public function AmbilDatadepartemen($where= "") {
      

        $data = $this->db->query('select * from master_departemen '.$where);
		return $data;
    }

    //ambil data untuk print
	public function GetId()
	{
		$datas = $this->db->query('select DISTINCT id_depar from master_departemen order by id_depar asc');
		return $datas;
	}

	
	
	
}
	
