<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kegiatanm extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	
		
   public function Getkegiatan($where= "")
	{
		$data = $this->db->query('select * from master_kegiatan '.$where);
		return $data;
	}


	   
	function insertData($table, $data)
    {
        $this->db->insert($table, $data);
    }   

	
	
	 function deleteData($table,$data)
    {
        $this->db->delete($table,$data);
    }
	

	function code_otomatis(){
    	$this->db->select('Right(master_kegiatan.kode_kegiatan,5)as kode ',false);
    	$this->db->order_by('idkeg','desc');
    	$this->db->limit(1);
    	$query=$this->db->get('master_kegiatan');
    	if($query->num_rows()<>0){
    		$data=$query->row();
    		$kode=intval($data->kode)+1;
    	}else{
    		$kode=1;
    	}
    	$dt = new DateTime();
          date_default_timezone_set("Asia/Jakarta");
           $waktu =date('Ymd');
          $kodemax=str_pad($kode,5,"0",STR_PAD_LEFT);
          return $waktu.$kodemax;

    }
	
	
}