<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eksdir extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}


	public function AmbilDataUraian2($where= "") {
      

        $data = $this->db->query('select * from master_uraian2 '.$where);
		return $data;
    }


    public function GetUraian2($where= "")
	{
		$data = $this->db->query('select * from master_uraian2 ');
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
	
	function UpdateUraian2($data){
    	$this->db->where('id_uraian',$data['id_uraian']);
    	$this->db->update('master_uraian2',$data);

    }

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}
		
		
	//ambil data untuk print
	public function GetId()
	{
		$datas = $this->db->query('select DISTINCT id_uraian from master_uraian2 order by id_uraian asc');
		return $datas;
	}
}