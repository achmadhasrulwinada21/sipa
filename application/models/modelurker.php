<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modelurker extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	//ambil data description
	public function Geteva($where= "")
	{
		$data = $this->db->query('select * from master_uraiankerja '.$where);
		return $data;
	}

	public function Getdetaileva($where="")
	{
		$data = $this->db->query('select * from master_uraiankerja '.$where);
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
	
	

	function Updatemasteruraian($data){
    	$this->db->where('id_urker',$data['id_urker']);
    	$this->db->update('master_uraiankerja',$data);

    }

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}
		
	//-------------------ambil data judul dept---------------------------------------
	public function GetJd()
	{
		$datas = $this->db->query('select * from master_uraiankerja ');
		return $datas;
	}
	
   public function GetEdit($tables, $datas)
		{
		$res=$this->db->get_where($tables, $datas);
		return $res->result_array();
		}


	

	public function AmbilDataEva($where= "") {

        $data = $this->db->query('select * from master_uraiankerja '.$where);
		return $data;
    }

	// function UpdateJd($datas)
	// 	{
 //    	$this->db->where('id_eva',$datas['id_eva']);
 //    	$this->db->update('dtb_evapekrek',$datas);
	// 	}
		
	//ambil data untuk print
	public function GetId()
	{
		$datas = $this->db->query('select DISTINCT id_urker from master_uraiankerja order by id_urker asc');
		return $datas;
	}
	
}