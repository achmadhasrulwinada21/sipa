<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tipeprodukM extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	//ambil data description
	public function Getproduk($where= "")
	{
		$data = $this->db->query('select * from master_tipe_produk '.$where);
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
 function Updateproduk($data){
    	$this->db->where('idpro',$data['idpro']);
    	$this->db->update('master_tipe_produk',$data);

    }

    function code_otomatis(){
    	$this->db->select('Right(master_tipe_produk.id_tipe_produk,3)as kode ',false);
    	$this->db->order_by('idpro','desc');
    	$this->db->limit(1);
    	$query=$this->db->get('master_tipe_produk');
    	if($query->num_rows()<>0){
    		$data=$query->row();
    		$kode=intval($data->kode)+1;
    	}else{
    		$kode=1;
    	}

          $kodemax=str_pad($kode,3,"0",STR_PAD_LEFT);
          $kodejadi="TP".$kodemax;
          return $kodejadi;

    }

    public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}
}
