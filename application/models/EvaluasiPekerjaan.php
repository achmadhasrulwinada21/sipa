<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EvaluasiPekerjaan extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	
	}

	//ambil data description
	public function GetEva($where= "")
	{
		$data = $this->db->query('select * from evaluasi '.$where);
		return $data;
	}

	public function Getdetaileva($where="")
	{
		$data = $this->db->query('select * from dtb_evapekrek '.$where);
		return $data;
	}

	public function Getcetakid($where="")
	{
		$data = $this->db->query('select DISTINCT koders, namars from evaluasi ');
		return $data;
	}
	
	public function Getjenis($where= "") {

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
	
	function Updateevaluasi($data){
    	$this->db->where('id_eva',$data['id_eva']);
    	$this->db->update('dtb_evapekrek',$data);

    }

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}
		
	//-------------------ambil data judul dept---------------------------------------
	public function GetJd()
	{
		$datas = $this->db->query('select * from dtb_evapekrek ');
		return $datas;
	}
	
   public function GetEdit($tables, $datas)
		{
		$res=$this->db->get_where($tables, $datas);
		return $res->result_array();
		}
	

	public function AmbilDataEva($where= "") {

        $data = $this->db->query('select * from dtb_evapekrek '.$where);
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
		$datas = $this->db->query('select DISTINCT id_eva from dtb_evapekrek order by id_eva asc');
		return $datas;
	}
	

}
