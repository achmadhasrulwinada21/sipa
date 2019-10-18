<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mstsetwil extends CI_Model {
	
var $table ='v_mst_setwil';

    var $column_order = array('nm_perusahaan','kode_wilayah','namars','nm_regional');
    var $column_search = array('nm_perusahaan','kode_wilayah','namars','nm_regional'); 
    var $order = array('nm_perusahaan' => 'desc');
	public $variable;

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
                 $this->db->or_like("nm_perusahaan", $_POST["search"]["value"]);
                 $this->db->or_like("kode_wilayah", $_POST["search"]["value"]);
                 $this->db->or_like("namars", $_POST["search"]["value"]);
                 $this->db->or_like("nm_regional", $_POST["search"]["value"]); 
               
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
	
		
	function Getsetwil($where= ""){
      $data = $this->db->query('
                SELECT 
                         a.idsetwilayah,
					     a.koper,
						 b.nm_perusahaan,
						 a.kode_wilayah,
						 c.namars,
						 d.nm_regional
				FROM	master_setwilayah a
				LEFT JOIN master_perusahaan b ON a.koper=b.koper
				LEFT JOIN master_regional d ON a.kode_wilayah=d.kode_regional
				LEFT JOIN hrd_mst_rs c ON a.kode_wilayah=c.koders '.$where);

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

	public function getper($where= "")
	{
		$data = $this->db->query('select * from master_perusahaan '.$where);
		return $data;
	}


	public function getrs($where= "")
	{
		$data = $this->db->query('select * from hrd_mst_rs '.$where);
		return $data;
	}

	public function getrs2($where= "")
	{
		$data = $this->db->query('select * from hrd_mst_rs a '.$where);
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

	// function code_otomatis211(){
 //    	$this->db->select('Right(master_setwilayah.kode_trans,4)as kode ',false);
 //    	$this->db->order_by('kode_trans','desc');
 //    	$this->db->limit(1);
 //    	$query=$this->db->get('master_setwilayah');
 //    	if($query->num_rows()<>0){
 //    		$data=$query->row();
 //    		$kode=intval($data->kode)+1;
 //    	}else{
 //    		$kode=1;
 //    	}
 //      date_default_timezone_set("Asia/Jakarta");
 //          $kodemax=str_pad($kode,4,"0",STR_PAD_LEFT);
 //          // $kodejadi="PR".$kodemax;
 //          return date("Ym").$kodemax;

 //    }

}
