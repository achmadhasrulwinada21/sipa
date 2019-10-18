<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EksVar extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	//ambil data description
	public function GetEksVar($where= "")
	{
		$data = $this->db->query('select * from eksekutifreport '.$where);
		return $data;
	}


	public function GetWhere($table, $data)
	{
    $res=$this->db->get_where($table, $data);
    return $res->result_array();
}
 


	
	//-------------------ambil data judul dept---------------------------------------
// 	public function GetJd()
// 	{
// 		$datas = $this->db->query('select * from tbl_jdl_dept ');
// 		return $datas;
// 	}
	
//    public function GetEdit($tables, $datas)
// 		{
// 		$res=$this->db->get_where($tables, $datas);
// 		return $res->result_array();
// 		}
	
// 	function UpdateJd($datas)
// 		{
//     	$this->db->where('id_jd',$datas['id_jd']);
//     	$this->db->update('tbl_jdl_dept',$datas);
// 		}
		
	//ambil data untuk print
	public function GetIdm()
	{
		$datas = $this->db->query('select DISTINCT periode from eksekutifreport order by periode asc');
		return $datas;
	}
	

}