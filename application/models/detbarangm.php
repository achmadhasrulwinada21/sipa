<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DetbarangM extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	//ambil data dept
	public function GetDetBarang($where= "")
	{
		$data = $this->db->query('select * from v_transbarang '.$where);
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
		
	function UpdateDetBarang($data){
    	$this->db->where('id_transbarang',$data['id_transbarang']);
    	$this->db->update('tbl_transbarang',$data);
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
	
	
	//ambil data untuk print
	public function GetId()
	{
		$datas = $this->db->query('select DISTINCT id_formulir,no_formulir,namadepartemen from v_transbarang order by id_formulir asc');
		return $datas;
	}
	//coba
		public function GetIdsss($where="")
	{
		//$this->db->distinct();
		//$this->db->get('select * from v_transbarang'); // Produces: SELECT DISTINCT * FROM table
		
		$this->db->distinct();
		$this->db->get('v_transbarang');
	}
	
	function fun1()  
{  
  // $this->db->select('DISTINCT');  
   $this->db->select(DISTINCT(id_formulir));
   $this->db->from('v_transbarang');  
  // $this->db->where('id_formulir');  
   $query=$this->db->get();  
   return $query->num_rows();  
}
	
	public function GetDetailbarang($where="")
	{
		$data = $this->db->query('select * from v_transbarang '.$where);
		return $data;
	}
	
	public function GetRelasi($where="")
	{
		$data = $this->db->query('select * from tbl_formulir '.$where);
		return $data;
	}

	public function GetTtd($where="")
	{
		$data = $this->db->query('select * from tbl_formulir '.$where);
		return $data;
	}
	
	//ambil data untuk print
	public function GetNamaDept()
	{
		$datas = $this->db->query('select DISTINCT id_departemen,namadepartemen from v_transbarang order by id_departemen asc');
		return $datas;
	}
	
	//ambil data untuk print
	//public function Getpanggilidsurat()
	//{
	//	$datas = $this->db->query('select DISTINCT id_formulir,namadepartemen from v_transbarang order by id_formulir asc');
	//	return $datas;
	//}
	
	
  

}