<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CisStatusM extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	//ambil data dept
	public function GetStatusCis($where= "")
	{
		$data = $this->db->query('select * from v_cisstatusit '.$where);
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
		
	function Update($data){
    	$this->db->where('id_status',$data['id_status']);
    	$this->db->update('cisstatusit',$data);
	}

	public function GetWhere($table, $data)
	{
		$res=$this->db->get_where($table, $data);
		return $res->result_array();
	}

	public function AmbilDataFormulir($where= "") 
	{
        $data = $this->db->query('select * from tbl_formulir '.$where);
		return $data;
    }
	
	public function AmbilDataCisStatus($where= "") 
	{
        $data = $this->db->query('select * from cisstatusit '.$where);
		return $data;
    }
	
	
	//ambil data untuk print
	public function GetNamaDept()
	{
		$datas = $this->db->query('select DISTINCT id_departemen,namadepartemen from v_transbarang order by id_departemen asc');
		return $datas;
	}
	
	public function AmbilDataTTDMengetahui($where= "") {
        $data = $this->db->query('select * from master_ttd '.$where);
		return $data;
    }
	
	public function GetTtd($where="")
	{
		$data = $this->db->query('select * from v_cisstatusit '.$where);
		return $data;
	}
	
		//ambil data untuk print
	public function GetKodeDept()
	{
		$datas = $this->db->query('select DISTINCT kode_role from v_cisalldeptit');
		return $datas;
	}
	

}