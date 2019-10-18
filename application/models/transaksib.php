<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksib extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}


	public function AmbilDataBpd($where= "") {
      

        $data = $this->db->query('select * from transaksibpd '.$where);
		return $data;
    }


    public function GetBpd($where= "")
	{
		$data = $this->db->query('select * from transaksibpd '.$where);
		return $data;
	}

	public function AmbilDataGabBpd($where= "") {
      

        $data = $this->db->query('select * from masterbpd '.$where);
		return $data;
    }

    public function GetId()
	{
		$datas = $this->db->query('select DISTINCT id_bpd from masterbpd order by id_bpd desc');
		return $datas;
	}
	public function GetStatus()
	{
		$datas = $this->db->query('select status from transaksibpd' );
		return $datas;
	}

    
    public function GetGabBpd($where= "")
	{
		$data = $this->db->query('select * from masterbpd '.$where);
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
	
	function UpdateBpd($data){
    	$this->db->where('id_trbpd',$data['id_trbpd']);
    	$this->db->update('transaksibpd',$data);

    }

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}

	function UpdateBpd1($data){
    	$this->db->where('id_bpd',$data['id_bpd']);
    	$this->db->update('masterbpd',$data);

    }
		
	//ambil data untuk print
	// public function GetId()
	// {
	// 	$datas = $this->db->query('select DISTINCT id_trbpd from transaksibpd order by id_trbpd asc');
	// 	return $datas;
	// }
}