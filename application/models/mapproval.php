<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mapproval extends CI_Model {

var $table = 'master_approval'; 
    var $column_order = array('k_aprove','n_aprove');
    var $column_search = array('k_aprove','n_aprove'); 
    var $order = array('k_aprove' => 'asc');
	
	public function __construct()
	{
		parent::__construct();
		
		
	}

	
	private function _get_datatables_queryalkes()
	{
		

		$this->db->from($this->table);
		

		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST["search"]["value"])  
            {  
                 $this->db->or_like("k_aprove", $_POST["search"]["value"]);
                 $this->db->or_like("n_aprove", $_POST["search"]["value"]);
                 
            }  
			
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

    function get_datatablesalum()
    {
        $this->_get_datatables_queryalkes();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

   
       function count_filteredalum()
    {
        $this->_get_datatables_queryalkes();
        $query = $this->db->get();
        return $query->num_rows();
    }

  public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
		
				
         public function getAllalum() {
           $this->db->select('*');
           $this->db->from('master_approval');
	   $this->db->order_by('k_aprove','DESC');
           $data = $this->db->get();
           return $data->result();
      }

      public function Gettabel($where= "")
  {
    $data = $this->db->query('select *  from master_approval '.$where);
    return $data;
  }

  public function Save($data)
  {
    $this->db->insert('master_approval', $data);
  }

  public function Hapus($table,$where){
    return $this->db->delete($table,$where);
  }

  function Update($data){
      $this->db->where('idaproval',$data['idaproval']);
      $this->db->update('master_approval',$data);
    }

        function buat_kode(){
      $this->db->select('Right(master_approval.k_aprove,3)as kode ',false);
      $this->db->order_by('idaproval','desc');
      $this->db->limit(1);
      $query=$this->db->get('master_approval');
      if($query->num_rows()<>0){
        $data=$query->row();
        $kode=intval($data->kode)+1;
      }else{
        $kode=1;
      }

          $kodemax=str_pad($kode,3,"0",STR_PAD_LEFT);
          $kodejadi="STS".$kodemax;
          return $kodejadi;

    }

  	}
