<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AnggaranBiayaKlinik extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}


    public function GetAnggaranBiayaKlinik($where= "")
	{
		$data = $this->db->query('select *  from vi_acarax '.$where);
		return $data;
	}

	 public function GetAnggaran($where= "")
	{
		$data = $this->db->query('select * from tb_header_acara '.$where);
		return $data;
	}

	 public function Getdetail($where= "")
	{
		$data = $this->db->query('select * from tbl_detail_acara '.$where);
		return $data;
	}


	 public function AmbilAnggaranBiayaKlinik($where= "")
	{
		$data = $this->db->query('select * from vi_acarax '.$where);
		return $data;
	}

	

	public function GetKebutuhan()
	{
		$data = $this->db->query('select * from master_kebutuhan ');
		return $data;
	}

	public function Getsesi()
	{
		$data = $this->db->query('select * from master_sesi ');
		return $data;
	}

    public function GetId()
	{
		$datas = $this->db->query('select DISTINCT idkeb from vi_acarax order by idacara desc');
		return $datas;
	}
	
	 // function search($keyword)
  //   {
  //       $this->db->like('periode_awal',$keyword);
  //       $this->db->or_like('periode_akhir',$keyword);
  //        $query  =   $this->db->get('v_anggarankliniksiang');
  //       return $query->result_array();
  //   }

 function searchs($keyword)
    {
        $this->db->like('sesi',$keyword);
         $query  =   $this->db->get('vi_acarax');
        return $query->result_array();
    }
    
	public function Simpan($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function Simpandetail($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	// public function GetWhere($table, $data)
	// {
 //    $res=$this->db->get_where($table, $data);
 //    return $res->result_array();
	// }
	
	function UpdateAnggaran($data){
    	$this->db->where('idacara',$data['idacara']);
    	$this->db->update('tb_header_acara',$data);

    }

    function Updatedetail($data){
    	$this->db->where('iddetacara',$data['iddetacara']);
    	$this->db->update('tbl_detail_acara',$data);

    }

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}

	
	
}