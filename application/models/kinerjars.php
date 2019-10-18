<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KinerjaRS extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}


    public function GetKinerjaRS()
	{
		$data = $this->db->query('select * from kinerja_rs ');
		return $data;
	}


	 public function AmbilKinerjaRS($where= "")
	{
		$data = $this->db->query('select * from kinerja_rs '.$where);
		return $data;
	}

	

    public function GetId()
	{
		$datas = $this->db->query('select DISTINCT id_krs from kinerja_rs order by id_krs desc');
		return $datas;
	}
	

    
	public function Simpan($data)
	{
		// return $this->db->insert($table, $data);
		$this->db->insert_batch('kinerja_rs', $data);
	}

	function create($data) {
    $this->db->insert_batch('kinerja_rs', $data);
}

	public function GetWhere($table, $data)
	{
    $res=$this->db->get_where($table, $data);
    return $res->result_array();
	}
	
	function UpdateKinerja($data){
    	$this->db->where('id_krs',$data['id_krs']);
    	$this->db->update('kinerja_rs',$data);

    }

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}

	public function getKrs($where="")
	{
		$data = $this->db->query('select * from kinerjareport '.$where);
		return $data;
	}

	
	


	
	
}