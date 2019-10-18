<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mobattrview extends CI_Model {

var $table = 'v_obat_tr_final_fix'; 
    var $column_order = array('nama_obat','harga','tanggal_tr','nm_perusahaan','foi','mou','pks','nm_distributor','komposisi','catatan');
    var $column_search = array('nama_obat','tanggal_tr','nm_perusahaan','foi','mou','pks','nm_distributor','komposisi','catatan'); 
    var $order = array('tanggal_tr' => 'desc');
	
	public function __construct()
	{
		parent::__construct();
		
		
	}

	
	private function _get_datatables_querydara()
	{
		

		$this->db->from($this->table);
		$this->db->where('id_tipe_produk','TP001');
		

		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST["search"]["value"])  
            {  
                 $this->db->or_like("nama_obat", $_POST["search"]["value"]);
                 $this->db->or_like("tanggal_tr", $_POST["search"]["value"]);
                 $this->db->or_like("nm_perusahaan", $_POST["search"]["value"]);
                 // $this->db->or_like("foi", $_POST["search"]["value"]);
                 // $this->db->or_like("mou", $_POST["search"]["value"]); 
                 // $this->db->or_like("pks", $_POST["search"]["value"]); 
                 $this->db->or_like("nm_distributor", $_POST["search"]["value"]); 
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

    function get_datatablesdara()
    {
        $this->_get_datatables_querydara();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

   
       function count_filtereddara()
    {
        $this->_get_datatables_querydara();
        $query = $this->db->get();
        return $query->num_rows();
    }

  public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
		
				
         public function getAlldara() {
           $this->db->select('*');
           $this->db->from('v_obat_tr_final_fix');
           $this->db->where('id_tipe_produk','TP001');
	        $this->db->order_by('tanggal_tr','DESC');
           $data = $this->db->get();
           return $data->result();
      }

  	}
