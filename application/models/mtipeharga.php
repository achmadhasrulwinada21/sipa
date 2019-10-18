<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mtipeharga extends CI_Model {



	public function __construct()
	{
		parent::__construct();

		$this->db2 = $this->load->database('uul', TRUE);
		
	}    

	public function Gettipeharga($where= "")
	{
		$data = $this->db->query('select * from m_tipeharga ' .$where);
		return $data;
	}
	
    function deleteData_db1($table,$data)
    {
        $this->db->delete($table,$data);
    }
	   
	   
	   public function Simpan_db1($data)
	{
		$this->db->insert('m_tipeharga', $data);
	}

		
	function Updateharga($data){
    	$this->db->where('idtipeharga',$data['idtipeharga']);
    	$this->db->update('m_tipeharga',$data);

    }

			
	//-------------------ambil data judul dept---------------------------------------
	
   	

}
