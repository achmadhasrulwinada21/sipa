<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_mstobat extends CI_Model {

var $table = 'v_mstobat'; 
    var $column_order = array('kode_obat','nama_obat','komposisi','klasifikasinama','tipe_produk','nm_perusahaan','nm_distributor','harga','discount','satuannama','persentase','merk'); //set column field database for datatable orderable 
    var $column_search = array('kode_obat','nama_obat','komposisi','klasifikasinama','tipe_produk','nm_perusahaan','nm_distributor','harga','discount','satuannama','persentase','merk'); //set column field database for datatable searchable 
    var $order = array('idobat' => 'desc');
	public $variable;

	public function __construct()
	{
		parent::__construct();
		
		
	}

	private function _get_datatables_query()
	{
		
		
        $this->db->from($this->table);
		$this->db->where('tipe_produk','TP001');
		
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST["search"]["value"])  
            {  
                 $this->db->like("kode_obat", $_POST["search"]["value"]);  
                 $this->db->or_like("nama_obat", $_POST["search"]["value"]);
                 $this->db->or_like("satuannama", $_POST["search"]["value"]);
                 $this->db->or_like("nm_perusahaan", $_POST["search"]["value"]);
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
		
	 public function Getobat($where= "")
	{
		$data = $this->db->query('select *  from master_obat '.$where);
		return $data;
	}

	public function Gettipe($where= "")
	{
		$data = $this->db->query('select * from master_tipe_produk '.$where);
		return $data;
	}

	public function Getkoper($where= "")
	{
		$data = $this->db->query('select * from master_perusahaan '.$where);
		return $data;
	}

	public function Getkodis($where= "")
	{
		$data = $this->db->query('select * from master_distributor '.$where);
		return $data;
	}

	public function Getgolongan($where= "")
	{
		$data = $this->db->query('select * from klasifikasiobat '.$where);
		return $data;
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

	function UpdateProduk($data){
    	$this->db->where('idobat',$data['idobat']);
    	$this->db->update('master_obat',$data);
    }

    public function AmbilObat($where= "")
	{
		$data = $this->db->query('select * from master_obat '.$where);
		return $data;
	}

	

	public function getAll() {
           $this->db->select('*');
           $this->db->from('master_obat');
           $this->db->where('tipe_produk','TP001');
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
		$this->db->insert_batch('master_obat', $data);
	}
	
	
	
	//untuk delete
	public function insert_simpan($table, $data){
		return $this->db->insert($table, $data);
	}

}
