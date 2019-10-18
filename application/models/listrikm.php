<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class listrikm extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	//ambil data description
	public function GetListrik($where= "")
	{
		$data = $this->db->query('select * from dtb_rekanan '.$where);
		return $data;
	}

	public function Simpan($table, $data)
	{
		return $this->db->insert('dtb_rekanan', $data);
	}

	public function GetWhere($table, $data)
	{
    $res=$this->db->get_where($table, $data);
    return $res->result_array();
	}
	
	function Updatelistrik($data){
    	$this->db->where('id_rek_listrik',$data['id_rek_listrik']);
    	$this->db->update('dtb_rekanan',$data);

    }



    public function GetEdit($tables, $datas)
		{
		$res=$this->db->get_where($tables, $datas);
		return $res->result_array();
		}

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}
		
	public function GetDetailRekanan($where="")
	{
		$data = $this->db->query('select * from v_detail_rekanan '.$where);
		return $data;

	}	

	public function Geturaianlistrik($where= "")
	{
		$data = $this->db->query('select * from master_uraiankerja '.$where);
		return $data;
	}

	 public function Getrekananlistrik($where= "")
	{
		$data = $this->db->query('select * from dtb_rekanan '.$where);
		return $data;
	}
		
		public function Getcetakid($where="")
	{
		$data = $this->db->query('select DISTINCT koders, nm_rs from v_nrekananlistrik');
		return $data;
	}	
	

		public function Getvlistrik($where= "")
	{
		$data = $this->db->query('select * from v_nrekananlistrik '.$where);
		return $data;
	}
	
		public function GetStatus2($where= "")

	{
		$data = $this->db->query('select * from master_statusdokumen '.$where);
		return $data;
	}
		
		public function AmbilDataTTDMengetahui($where= "") {
        $data = $this->db->query('select * from master_ttd '.$where);
		return $data;
    }	
		
		
		
		
		
		
}