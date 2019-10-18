<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mstsetrsreg extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
		
	}
	
		
	function Getsetrsreg($where= ""){
      $data = $this->db->query('
                SELECT 
                         a.idsetregional,
					     a.kode_regional,
						 b.nm_regional,
						 a.koders,
						 c.namars
				FROM	setuprs_reg a
				LEFT JOIN master_regional b ON a.kode_regional=b.kode_regional
				LEFT JOIN hrd_mst_rs c ON a.koders=c.koders '.$where);

        return $data;
    }

	 public function Ambilsetdis($where= "")
	{
		$data = $this->db->query('select * from setuprs_reg '.$where);
		return $data;
	}

	public function getreg($where= "")
	{
		$data = $this->db->query('select * from master_regional '.$where);
		return $data;
	}

	public function getrs($where= "")
	{
		$data = $this->db->query('select * from hrd_mst_rs '.$where);
		return $data;
	}
	
	public function Simpan($data)
	{
		return $this->db->insert_batch('setuprs_reg', $data);
	}

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}

	function Updatesetdis($data){
    	$this->db->where('idsetregional',$data['idsetregional']);
    	$this->db->update('setuprs_reg',$data);
    }

function Updatearray($data){
	    $this->db->where('kode_regional',$data['kode_regional']);
    	$this->db->where('koders',$data['koders']);
    	$this->db->delete('setuprs_reg',$data);
    }
	

	public function getAll() {
           $this->db->select('*');
           $this->db->from('master_setup_dist');
           $data = $this->db->get();
           return $data->result();
      }

	
	// Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
	public function insert_multiple($data){
		$this->db->insert_batch('master_setup_dist', $data);
	}
	
	
	
	//untuk delete
	public function insert_simpan($table, $data){
		return $this->db->insert($table, $data);
	}

}
