<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sesim extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	
		
   public function Getsesi($where= "")
	{
		$data = $this->db->query('select * from master_sesi '.$where);
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
    	$this->db->select('Right(master_sesi.sesi,1)as kode ',false);
    	$this->db->order_by('idsesi','desc');
    	$this->db->limit(1);
    	$query=$this->db->get('master_sesi');
    	if($query->num_rows()<>0){
    		$data=$query->row();
    		$kode=intval($data->kode)+1;
    	}else{
    		$kode=1;
    	}

          $kodemax=str_pad($kode,1,"0",STR_PAD_LEFT);
          // $kodejadi="K".$kodemax;
          return $kodemax;

    }
	
	
}