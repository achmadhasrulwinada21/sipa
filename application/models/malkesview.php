<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class malkesview extends CI_Model {

var $table = 'view_alkes_final'; 
    var $column_order = array('nm_perusahaan','nama_produk','merk','type','tanggal_tr','total');
    var $column_search = array('nm_perusahaan','nama_produk','merk','type','tanggal_tr','total'); 
    var $order = array('tanggal_tr' => 'desc');
	
	public function __construct()
	{
		parent::__construct();
		
		
	}

	
	private function _get_datatables_queryalkes()
	{
		

		$this->db->from($this->table);
		$this->db->where('id_tipe_produk','TP003');
		

		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST["search"]["value"])  
            {  
                 $this->db->or_like("nama_produk", $_POST["search"]["value"]);
                 $this->db->or_like("nm_perusahaan", $_POST["search"]["value"]);
                 $this->db->or_like("merk", $_POST["search"]["value"]);
                 $this->db->or_like("type", $_POST["search"]["value"]); 
                $this->db->or_like("total", $_POST["search"]["value"]);
                 $this->db->or_like("tanggal_tr", $_POST["search"]["value"]); 
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

    function get_datatablesalkes()
    {
        $this->_get_datatables_queryalkes();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

   
       function count_filteredalkes()
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
		
				
         public function getAllalkes() {
           $this->db->select('*');
           $this->db->from('view_alkes_final');
           $this->db->where('id_tipe_produk','TP003');
	   $this->db->order_by('tanggal_tr','DESC');
           $data = $this->db->get();
           return $data->result();
      }

  	}
