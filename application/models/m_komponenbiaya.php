<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_KomponenBiaya extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	//ambil data description
	public function GetKomponenBiaya($where= "")
	{
		$data = $this->db->query('select * from masterkomponenbiaya');
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
 function UpdateKomponenBiaya($data){
    	$this->db->where('id_komponenbiaya',$data['id_komponenbiaya']);
    	$this->db->update('masterkomponenbiaya',$data);
    }
	
	public function GetEdit($tables, $datas)
	{
		$res=$this->db->get_where($tables, $datas);
		return $res->result_array();
	}
	
	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}
	
	public function AmbilDatakomponen($where= "") {
      

        $data = $this->db->query('select * from masterkomponenbiaya '.$where);
		return $data;
    }

    //ambil data untuk print
	public function GetId()
	{
		$datas = $this->db->query('select DISTINCT id_komponenbiaya from masterkomponenbiaya order by id_komponenbiaya asc');
		return $datas;
	}

	
	
	
}
	
