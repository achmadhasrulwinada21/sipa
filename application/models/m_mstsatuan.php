<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_mstsatuan extends CI_Model {

var $table = 'satuanproduk'; 
    var $column_order = array('satuanid','satuannama','satuanracikan','satuanidconform'); //set column field database for datatable orderable 
    var $column_search = array('satuanid','satuannama','satuanracikan','satuanidconform'); //set column field database for datatable searchable 
    var $order = array('satuanid' => 'desc'); // default order 
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
                $this->db->like("satuanid", $_POST["search"]["value"]);  
                $this->db->or_like("satuannama", $_POST["search"]["value"]);  
           }  
        // $i = 0;
     
        // foreach ($this->column_search as $item) // loop column 
        // {
        //     if($_POST['search']['value']) // if datatable send POST for search
        //     {
                 
        //         if($i===0) // first loop
        //         {
        //             $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
        //             $this->db->like($item, $_POST['search']['value']);
        //         }
        //         else
        //         {
        //             $this->db->or_like($item, $_POST['search']['value']);
        //         }
 
        //         if(count($this->column_search) - 1 == $i) //last loop
        //             $this->db->group_end(); //close bracket
        //     }
        //     $i++;
        // }
         
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
	
		

	public function Getsatuan($where= "")
	{
		$data = $this->db->query('select * from satuanproduk '.$where);
		return $data;
	}
	
	public function Simpan($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}

	function UpdateSatuan($data){
    	$this->db->where('satuanid',$data['satuanid']);
    	$this->db->update('satuanproduk',$data);
    }

    public function AmbilSatuan($where= "")
	{
		$data = $this->db->query('select * from satuanproduk '.$where);
		return $data;
	}

	public function getAll() {
           $this->db->select('*');
           $this->db->from('satuanproduk');
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
		$this->db->insert_batch('satuanproduk', $data);
	}
	
	
	
	//untuk delete
	public function insert_simpan($table, $data){
		return $this->db->insert($table, $data);
	}

}
