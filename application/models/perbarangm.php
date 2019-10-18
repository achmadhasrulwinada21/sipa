<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PerbarangM extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	//ambil data dept
	public function GetBarang($where= "")
	{
		$data = $this->db->query('select * from v_tblformulir '.$where);
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
		
	function UpdateBarang($data){
    	$this->db->where('id_formulir',$data['id_formulir']);
    	$this->db->update('tbl_formulir',$data);
	}

	public function GetWhere($table, $data)
	{
		$res=$this->db->get_where($table, $data);
		return $res->result_array();
	}	
	//ambil data untuk print
	public function GetId()
	{
		$datas = $this->db->query('select DISTINCT no_formulir,namadepartemen from v_tblformulir order by no_formulir asc');
		return $datas;
	}
	
	public function GetPerbarang($where="")
	{
		$data = $this->db->query('select * from v_tblformulir '.$where);
		return $data;
	}
	
	public function GetBarangg($where="")
	{
		$data = $this->db->query('select * from v_tblformulir '.$where);
		return $data;
	}
	
	public function AmbilDataTTDMengetahui($where= "") {
        $data = $this->db->query('select * from master_ttd '.$where);
		return $data;
    }
	
		public function AmbilDataFormulir($where= "") {
        $data = $this->db->query('select * from v_tblformulir '.$where);
		return $data;
    }
	
		//ambil data untuk print
	public function GetNamaDept()
	{
		$datas = $this->db->query('select DISTINCT id_departemen,namadepartemen from v_tblformulir order by id_departemen asc');
		return $datas;
	}
	
		//ambil data untuk print
	//public function panggildept()
	//{
	//	$datas = $this->db->query('select DISTINCT id_formulir,namadepartemen from tbl_transbarang order by id_formulir asc');
	//	return $datas;
	//}

		public function GetDetBarang($where= "")
	{
		$data = $this->db->query('select * from v_transbarang '.$where);
		return $data;
	}
	
	public function GetDetBarangNew()
	{
		$datas = $this->db->query('select DISTINCT id_departemen,namadepartemen,id_formulir,no_formulir,nama_barang,jumlah,kondisi_barang,instalasi,harga,grand_total from v_transbarang order by id_departemen asc');
		return $datas;
	}
	

}