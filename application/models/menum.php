<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MenuM extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	//ambil data menu
	public function GetMenu($where= "")
	{
		$data = $this->db->query('select * from tbl_menu '.$where);
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
		
	function UpdateMenu($data){
    	$this->db->where('id',$data['id']);
    	$this->db->update('tbl_menu',$data);
	}

	public function GetWhere($table, $data)
	{
		$res=$this->db->get_where($table, $data);
		return $res->result_array();
	}

}