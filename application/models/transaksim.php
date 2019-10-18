<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TransaksiM extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	//ambil data tabel transaksi
	public function GetTransaksi($where= "")
	{
		$data = $this->db->query('select * from transaksi_uraian2 '.$where);
		return $data;
	}

public function GetUraian($where= "")
	{
		$data = $this->db->query('select * from master_uraian2');
		return $data;
	}
	//ambil data dari 3 tabel
	public function GetTransaksiRs($where= "") {
    $data = $this->db->query('select * from v_transaksiuraian2 '.$where);
    return $data;
    } 

    public function GetTransaksiRsAdministrator() {
    $data = $this->db->query('select * from v_transaksiuraian2 ');
    return $data;
    } 

     public function GetTransaksiRsAdmin() {
    $data = $this->db->query('select * from v_transaksiuraian2 ');
    return $data;
    } 
	
	public function Hapus($table,$where)
	{
		return $this->db->delete($table,$where);
	}
		
	public function Simpan($table, $data)
	{
		return $this->db->insert($table, $data);
	}	
		
	function UpdateTransaksi($data){
        $this->db->where('id_tr',$data['id_tr']);
        
        $this->db->update('transaksi_uraian2',$data);
    }

	public function GetWhere($table, $data)
	{
		$res=$this->db->get_where($table, $data);
		return $res->result_array();
	}
	
	// membuat cetak pdf transaksi var 2
	
	public function Getmastereksekutif($where= "")
	{
		$data = $this->db->query('select * from v_mastereksekutifreport2 '.$where);
		return $data;
	}
	
		
	//----------------------------------------------------------
	
}