<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_mstproduk extends CI_Model {

var $table = 'v_mstproduk'; 
    var $column_order = array('kode_produk','nama_produk','deskripsi','satuannama','tipe_produk','nm_perusahaan','nm_distributor','harga','discount','persentase','merk','nm_pekerjaan','type','nm_sub_jenis_pekerjaan','jns_barang','volume'); //set column field database for datatable orderable 
    var $column_search = array('kode_produk','nama_produk','deskripsi','satuannama','tipe_produk','nm_perusahaan','nm_distributor','harga','discount','persentase','merk','nm_pekerjaan','type','nm_sub_jenis_pekerjaan','jns_barang','volume'); //set column field database for datatable searchable 
    var $order = array('idproduk' => 'desc');
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
                 $this->db->like("kode_produk", $_POST["search"]["value"]);  
                 $this->db->or_like("nama_produk", $_POST["search"]["value"]);
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

	private function _get_datatables_queryalkes()
	{
		

		$this->db->from($this->table);
		$this->db->where('tipe_produk','TP003');
		

		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST["search"]["value"])  
            {  
                 $this->db->like("kode_produk", $_POST["search"]["value"]);  
                 $this->db->or_like("nama_produk", $_POST["search"]["value"]);
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

	private function _get_datatables_queryalum()
	{
		

		$this->db->from($this->table);
		$this->db->where('tipe_produk','TP002');
		

		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST["search"]["value"])  
            {  
                 $this->db->like("kode_produk", $_POST["search"]["value"]);  
                 $this->db->or_like("nama_produk", $_POST["search"]["value"]);
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

	private function _get_datatables_querydepbang()
	{
		

		$this->db->from($this->table);
		$this->db->where('tipe_produk','TP004');


		

		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST["search"]["value"])  
            {  
                 $this->db->like("kode_produk", $_POST["search"]["value"]);  
                 $this->db->or_like("nama_produk", $_POST["search"]["value"]);
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



	// private function _get_datatables_query()
 //    {
         
 //        $this->db->from($this->table);
 //        $this->db->where('tipe_produk','TP001');
 // 		if(isset($_POST["search"]["value"]))  
 //           {  
 //                $this->db->like("kode_produk", $_POST["search"]["value"]);  
 //                $this->db->or_like("nama_produk", $_POST["search"]["value"]);
 //                $this->db->or_like("satuanid", $_POST["search"]["value"]);
 //                $this->db->or_like("tipe_produk", $_POST["search"]["value"]);
 //                $this->db->or_like("koper", $_POST["search"]["value"]);
 //                $this->db->or_like("kodis", $_POST["search"]["value"]);  
 //           }  
 //        // $i = 0;
     
 //        // foreach ($this->column_search as $item) // loop column 
 //        // {
 //        //     if($_POST['search']['value']) // if datatable send POST for search
 //        //     {
                 
 //        //         if($i===0) // first loop
 //        //         {
 //        //             $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
 //        //             $this->db->like($item, $_POST['search']['value']);
 //        //         }
 //        //         else
 //        //         {
 //        //             $this->db->or_like($item, $_POST['search']['value']);
 //        //         }
 
 //        //         if(count($this->column_search) - 1 == $i) //last loop
 //        //             $this->db->group_end(); //close bracket
 //        //     }
 //        //     $i++;
 //        // }
         
 //        if(isset($_POST['order'])) // here order processing
 //        {
 //            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
 //        } 
 //        else if(isset($this->order))
 //        {
 //            $order = $this->order;
 //            $this->db->order_by(key($order), $order[key($order)]);
 //        }
 //    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function get_datatablesalkes()
    {
        $this->_get_datatables_queryalkes();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function get_datatablesalum()
    {
        $this->_get_datatables_queryalum();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function get_datatablesdepbang()
    {
        $this->_get_datatables_querydepbang();
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

     function count_filteredalkes()
    {
        $this->_get_datatables_queryalkes();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_filteredalum()
    {
        $this->_get_datatables_queryalum();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_filtereddepbang()
    {
        $this->_get_datatables_querydepbang();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
		
	 public function Getproduk($where= "")
	{
		$data = $this->db->query('select *  from master_produk '.$where);
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

	public function Getjnsbrg($where= "")
	{
		$data = $this->db->query('select * from tb_jenis_brg '.$where);
		return $data;
	}

	public function Getkodis($where= "")
	{
		$data = $this->db->query('select * from master_distributor '.$where);
		return $data;
	}

	public function Getsatuan($where= "")
	{
		$data = $this->db->query('select * from satuanproduk '.$where);
		return $data;
	}

	public function Getkjp($where= "")
	{
		$data = $this->db->query('select * from tb_jenis_pekerjaan '.$where);
		return $data;
	}

	public function Getksjp($where= "")
	{
		$data = $this->db->query('select * from tb_sub_jenis_pekerjaan '.$where);
		return $data;
	}

	public function Getkjb($where= "")
	{
		$data = $this->db->query('select * from master_jenis_barang '.$where);
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
    	$this->db->where('idproduk',$data['idproduk']);
    	$this->db->update('master_produk',$data);
    }

    public function AmbilProduk($where= "")
	{
		$data = $this->db->query('select * from master_produk '.$where);
		return $data;
	}

	public function AmbilProdukAlkes($where= "")
	{
		$data = $this->db->query('select * from master_produk '.$where);
		return $data;
	}

public function AmbilProdukAlkesview($where= "")
	{
		$data = $this->db->query('select * from v_mstproduk '.$where);
		return $data;
	}

	public function getAll() {
           $this->db->select('*');
           $this->db->from('master_produk');
           $this->db->where('tipe_produk','TP001');
           $data = $this->db->get();
           return $data->result();
      }

      public function getAllalkes() {
           $this->db->select('*');
           $this->db->from('master_produk');
           $this->db->where('tipe_produk','TP003');
	   $this->db->order_by('kode_produk','DESC');
           $data = $this->db->get();
           return $data->result();
      }

      public function getAllalum() {
           $this->db->select('*');
           $this->db->from('master_produk');
           $this->db->where('tipe_produk','TP002');
	   $this->db->order_by('kode_produk','DESC');
           $data = $this->db->get();
           return $data->result();
      }

      public function getAlldepbang() {
           $this->db->select('*');
           $this->db->from('master_produk');
           $this->db->where('tipe_produk','TP004');
	   $this->db->order_by('kode_produk','DESC');
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
		$this->db->insert_batch('master_produk', $data);
	}
	
	
	
	//untuk delete
	public function insert_simpan($table, $data){
		return $this->db->insert($table, $data);
	}


	public function buat_kodealkes()   {
		  $this->db->select('substr(master_produk.kode_produk,7) as kode', FALSE);
		  $this->db->where('tipe_produk','TP003');
		  $this->db->order_by('kode_produk','DESC');    
		  // $this->db->limit('kode_produk');    
		  $query = $this->db->get('master_produk');          
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
		  $kodejadi = "ALKES-".$kodemax; 
		  return $kodejadi;  
	}


	public function buat_kodealum()   {
		  $this->db->select('substr(master_produk.kode_produk,5) as kode', FALSE);
		  $this->db->where('tipe_produk','TP002');
		  $this->db->order_by('kode_produk','DESC');    
		  // $this->db->limit('kode_produk');    
		  $query = $this->db->get('master_produk');          
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.
		   $this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Data Sudah Ada</strong></div>");      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;

		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); 
		  $kodejadi = "ALU-".$kodemax; 
		  return $kodejadi;  
	}


	public function buat_kodedepbang()   {
		  $this->db->select('substr(master_produk.kode_produk,5) as kode', FALSE);
		  $this->db->where('tipe_produk','TP004');
		  $this->db->order_by('kode_produk','DESC');    
		  // $this->db->limit('kode_produk');    
		  $query = $this->db->get('master_produk');          
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.
		   $this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Data Sudah Ada</strong></div>");      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;

		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
		  $kodejadi = "ALB-".$kodemax; 
		  return $kodejadi;  
	}

}
