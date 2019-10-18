<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_rekananobat extends CI_Model {

var $table = 'rekanan_farmasi'; 
    var $column_order = array('koper','nm_perusahaan','kodis','foi','mou','pks'); //set column field database for datatable orderable 
    var $column_search = array('koper','nm_perusahaan','kodis','foi','mou','pks'); //set column field database for datatable searchable 
    var $order = array('koper' => 'asc'); // default order 
	public $variable;

	public function __construct()
	{
		parent::__construct();
		
		
	}

	private function _get_datatables_query()
    {
         
        $this->db->from($this->table);
 		if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("koper", $_POST["search"]["value"]);  
                $this->db->or_like("nm_perusahaan", $_POST["search"]["value"]);  
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
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
	
		

	public function GetRekananObat($where= "")
	{
		$data = $this->db->query('select * from rekanan_farmasi '.$where);
		return $data;
	}
	
	

	public function getAll() {
           $this->db->select('*');
           $this->db->from('rekanan_farmasi');
           $data = $this->db->get();
           return $data->result();
      }


	
	// Fungsi untuk melakukan proses upload file
	public function upload_file($filename){
		$this->load->library('upload'); // Load librari upload
		
		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx|xls';
		$config['max_size']	= '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;
	
		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
	
	// Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
	public function insert_multiple($data){
		$this->db->insert_batch('rekanan_farmasi', $data);
	}
	
	
	
	//untuk delete
	public function insert_simpan($table, $data){
		return $this->db->insert($table, $data);
	}

}
