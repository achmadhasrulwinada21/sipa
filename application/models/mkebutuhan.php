<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mkebutuhan extends CI_Model {



	public function __construct()
	{
		parent::__construct();
		
	}


	public function GetKebutuhan($where= "") 
	{
        $data = $this->db->query('select * from master_kebutuhan order by id_kebutuhan'.$where);
		return $data;	
    }
	
	
	public function Simpanmemo($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function Update($table,$data,$where){
		return $this->db->update($table,$data,$where);
	}

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}	
	
	//ambil data untuk Edit
	
	public function GetWhere($table, $data)
	{
    $res=$this->db->get_where($table, $data);
    return $res->result_array();
	}
	
	public function GetEdit($tables, $datas)
	{
	$res=$this->db->get_where($tables, $datas);
	return $res->result_array();
	}
	
	function UpdateKebutuhan($data){
    $this->db->where('id_kebutuhan',$data['id_kebutuhan']);
    $this->db->update('master_kebutuhan',$data);

    }
	
	
	public function AmbilDataKebutuhan($where= "") {

        $data = $this->db->query('select * from  master_kebutuhan order by id_kebutuhan '.$where);
		return $data;
    }
	
	
	public function GetPrintId($tables, $datas)
		{
		$res=$this->db->get_where($tables, $datas);
		return $res->result_array();
		}
	
		
		public function GetDetailKebutuhan()
	{
		$data = $this->db->query('select * from tb_paket_pekerjaan '.$where);
		return $data;

	}
	

	//ambil data untuk print
	public function Getnm()
	{
		$datas = $this->db->query ('select DISTINCT idpktkrj from tb_paket_pekerjaan order by idpktkrj asc');
		return $datas;
	}

		public function GetId()
	{
		$datas = $this->db->query("SELECT * FROM tb_paket_pekerjaan where idpktkrj = '$idpktkrj' LIMIT 1 ");
		return $datas;
	}
}