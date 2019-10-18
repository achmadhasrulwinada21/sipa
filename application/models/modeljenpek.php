<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modeljenpek extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	//ambil data description
	public function Geteva($where= "")
	{
		$data = $this->db->query('select * from master_jenispek '.$where);
		return $data;
	}

	public function Getdetaileva($where="")
	{
		$data = $this->db->query('select * from master_jenispek '.$where);
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
	
	

	function UpdateMasterJenis($data){
    	$this->db->where('id_jenpek',$data['id_jenpek']);
    	$this->db->update('master_jenispek',$data);

    }

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}
		
	//-------------------ambil data judul dept---------------------------------------
	public function GetJd()
	{
		$datas = $this->db->query('select * from master_jenispek ');
		return $datas;
	}
	
   public function GetEdit($tables, $datas)
		{
		$res=$this->db->get_where($tables, $datas);
		return $res->result_array();
		}


	

	public function AmbilDataEva($where= "") {

        $data = $this->db->query('select * from master_jenispek '.$where);
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
		$datas = $this->db->query('select DISTINCT id_perusahaan from master_jenispek order by id_jenpek asc');
		return $datas;
	}
	
}