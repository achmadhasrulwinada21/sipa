<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class komdik extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

    // Daftar Hadir

    public function GetDafdir($where= "")
	{
		$data = $this->db->query('select * from tbl_dafdir '.$where);
		return $data;
	}

	public function Getid_dafdir($where= "")
	{
		$datas = $this->db->query('select DISTINCT kd_form_hdr,nama_acara,departemen3 from tbl_dafdir '.$where);
		return $datas;
	}

	public function GetStatusDoc()
	{
		$query = $this->db->query('select nama_statusdoc,kodestatusdoc  from master_statusdokumen ');
		return $query;
	}

	public function AmbilDataTTDMengetahui($where= "") {
        $data = $this->db->query('select * from master_ttd '.$where);
		return $data;
    }

    public function GetTotBiaya($where= "")
	{
		$data = $this->db->query('select sum(cast(jumlah_biaya as int)) as total from  tbl_dafdir');
		return $data;
	}

	
	public function AmbilDataDafdir($where= "") {
      

        $data = $this->db->query('select * from tbl_dafdir '.$where);
		return $data;
    }
	
	function UpdateDafdir($data){
        $this->db->where('id_dafdir',$data['id_dafdir']);
        $this->db->update('tbl_dafdir',$data);

    }

	// Memo Daftar Hadir
    
    public function GetMemoDafdir($where= "")
	{
		$data = $this->db->query('select * from tbl_memo_dafdir '.$where);
		return $data;
	}

 	
	public function AmbilDataMemoDafdir($where= "") {
      

        $data = $this->db->query('select * from tbl_memo_dafdir '.$where);
		return $data;
    }
	
	function UpdateMemoDafdir($data){
        $this->db->where('id_memo_dafdir',$data['id_memo_dafdir']);
        $this->db->update('tbl_memo_dafdir',$data);

    }

    // Formulir Permohonan

     public function GetFormulirMhn($where= "")
	{
		$data = $this->db->query('select * from tbl_form_mhn '.$where);
		return $data;
	}

   
	public function AmbilDataFormulirMhn($where= "") {
      

        $data = $this->db->query('select * from tbl_form_mhn '.$where);
		return $data;
    }
	
	function UpdateFormulirMohon($data){
        $this->db->where('id_form_mhn',$data['id_form_mhn']);
        $this->db->update('tbl_form_mhn',$data);

    }

    
    // Konfirmasi Peserta

     public function GetPeserta($where= "")
	{
		$data = $this->db->query('select * from konfirm_peserta' .$where);
		return $data;
	}

   
	public function GetIdMemo($where= "")
	{
		$data = $this->db->query('select DISTINCT id_memo_dafdir,nm_acara,dari from tbl_memo_dafdir '.$where);
		return $data;
	}

	public function AmbilDataPeserta($where= "") {
      

        $data = $this->db->query('select * from tbl_konf_peserta '.$where);
		return $data;
    }
	
    function UpdatePeserta($data){
        $this->db->where('idkonfirmpeserta',$data['idkonfirmpeserta']);
        $this->db->update('konfirm_peserta',$data);

    }

    function UpdatDafdir($data){
        $this->db->where('id_dafdir',$data['id_dafdir']);
        $this->db->update('tbl_dafdir',$data);

    }


      function updatedaftardir($data){
        $this->db->where('kode_form',$data['kode_form']);
        $this->db->update('tbl_history',$data);

    }


    public function GetPesert($where= "")
	{
		$data = $this->db->query('select * from tbl_history '.$where);
		return $data;
	}


	public function GetStat()
	{
		$query = $this->db->query('select nama_status,id_status  from master_status ');
		return $query;
	}

	public function GetRole()
	{
		$query = $this->db->query('select nama_role,koderole  from master_role ');
		return $query;
	}

 	public function GetStatus2()
	{
		$data = $this->db->query('select nama_statusdoc,kodestatusdoc  from master_statusdokumen ');
		return $data;
	}


    // Data History

	public function AmbilDataHistory($where= "")
	{
		$data = $this->db->query('SELECT * FROM v_tabelhistori ' .$where);
		return $data;
	}
    
    public function Simpan($table, $data){
		return $this->db->insert($table, $data);
	}

    public function SimpanForm($table, $data){
		return $this->db->insert($table, $data);
	}

	public function SimpanPeserta($table, $data){
		return $this->db->insert($table, $data);
	}
	
	public function SimpanHistory($table, $data){
		return $this->db->insert($table, $data);
	}

	public function SimpanDafdir($table, $data){
		return $this->db->insert($table, $data);
	}

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}
	
}
	
	