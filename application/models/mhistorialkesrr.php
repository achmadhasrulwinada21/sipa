<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mhistorialkesrr extends CI_Model {
	var $table = 'v_rralkes_detail'; 
    var $table2 = 'v_rralkes_detail'; 
     var $column_order = array('kode_transaksi','nm_perusahaan','jenis_pembayaran','nama_produk','tgl_tr','type','merk','jns_barang','harga_akhir_baru_var');
    var $column_search = array('kode_transaksi','nm_perusahaan','jenis_pembayaran','nama_produk','tgl_tr','type','merk','jns_barang','harga_akhir_baru_var'); 
    var $order = array('kode_transaksi' => 'desc');


	public $variable;

	public function __construct()
	{
		parent::__construct();
				
	}

		
private function _get_datatables_queryalkeshistori()
	{
		
        $this->db->from($this->table);
        $this->db->where('statuslist_detil','histori');
			      
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST["search"]["value"])  
            {  
                 $this->db->or_like("kode_transaksi", $_POST["search"]["value"]);
                 $this->db->or_like("nm_perusahaan", $_POST["search"]["value"]);
                  $this->db->or_like("tgl_tr", $_POST["search"]["value"]);
                 $this->db->or_like("jenis_pembayaran", $_POST["search"]["value"]);
                 $this->db->or_like("nama_produk", $_POST["search"]["value"]); 
                $this->db->or_like("merk", $_POST["search"]["value"]);
                 $this->db->or_like("type", $_POST["search"]["value"]);
                  $this->db->or_like("jns_barang", $_POST["search"]["value"]);
                   $this->db->or_like("harga_akhir_baru_var", $_POST["search"]["value"]);
                
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

    function get_datatablesalkeshistori()
    {
        $this->_get_datatables_queryalkeshistori();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

   
       function count_filteredalkeshistori()
    {
        $this->_get_datatables_queryalkeshistori();
        $query = $this->db->get();
        return $query->num_rows();
    }

  public function count_allhistori()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    private function _get_datatables_queryalkeslive()
	{
		
        $this->db->from($this->table2);
		 $this->db->where('statuslist_detil','live');	
		  $this->db->where('stsproduk_detil','aktif');    
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST["search"]["value"])  
            {  
                 $this->db->or_like("kode_transaksi", $_POST["search"]["value"]);
                 $this->db->or_like("nm_perusahaan", $_POST["search"]["value"]);
                  $this->db->or_like("tgl_tr", $_POST["search"]["value"]);
                 $this->db->or_like("jenis_pembayaran", $_POST["search"]["value"]);
                 $this->db->or_like("nama_produk", $_POST["search"]["value"]); 
                $this->db->or_like("merk", $_POST["search"]["value"]);
                 $this->db->or_like("type", $_POST["search"]["value"]);
                  $this->db->or_like("jns_barang", $_POST["search"]["value"]);
                   $this->db->or_like("harga_akhir_baru_var", $_POST["search"]["value"]);
                
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

    function get_datatablesalkeslive()
    {
        $this->_get_datatables_queryalkeslive();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

   
       function count_filteredalkeslive()
    {
        $this->_get_datatables_queryalkeslive();
        $query = $this->db->get();
        return $query->num_rows();
    }

  public function count_alllive()
    {
        $this->db->from($this->table2);
        return $this->db->count_all_results();
    }


 public function masterttd($where= "")
  {
    $data = $this->db->query('SELECT * from master_ttd ' .$where);
    return $data;
  }

 public function Getalkeshead($where= "")
	{
		$data = $this->db->query('select * from listingrrhead '.$where);
		return $data;
	}
public function Getalkesheadview($where= "")
	{
		$data = $this->db->query('select * from v_listingrrhead '.$where);
		return $data;
	}
 public function Getalkesdetil($where= "")
	{
		$data = $this->db->query('select * from rralkes_detail '.$where);
		return $data;
	}

	public function Getalkesdetilview($where= "")
	{
		$data = $this->db->query('select * from v_rralkes_detail '.$where);
		return $data;
	}

	 function v_rralkesimport()
	{
	   return $this->db->query("SELECT * from v_rralkes_detail
	   	                        ORDER BY iddetilalkesrr desc 
                                 limit 500")->result();
    }


public function GetKodePrinsp($where= "")
	{
		$data = $this->db->query('select DISTINCT koper,nm_perusahaan from master_perusahaan ' .$where);
		return $data;
	}

 public function Gettipe($where= "")
	{
		$data = $this->db->query('select * from master_tipe_produk ' .$where);
		return $data;
	}
	 public function Getmstproduk($where= "")
	{
		$data = $this->db->query('select *  from master_produk '.$where);
		return $data;
}

 public function Getmstregional($where= "")
	{
		$data = $this->db->query('select *  from master_regional '.$where);
		return $data;
}

public function Getmstwil($where= "")
	{
		$data = $this->db->query('select *  from v_mst_setwil '.$where);
		return $data;
}


 public function ongkirreg($where= "")
	{
		$data = $this->db->query('SELECT a.kode_produk,
		                                 a.koper,
		                                 a.kode_ongkir,
		                                 c.nm_regional,
		                                 a.biaya_kirim,
		                                 a.idongkir,
		                                 e.namars
		                               FROM tb_ongkir a      
		                           LEFT JOIN master_regional c on a.kode_ongkir=c.kode_regional
                                    LEFT JOIN hrd_mst_rs e on a.kode_ongkir=e.koders
		                            '.$where);
		return $data;
}

public function ongkirrs($where= "")
	{
		$data = $this->db->query('SELECT a.kode_produk,
		                                 a.koper,
		                                 a.kode_ongkir,
		                                 c.namars,
		                                 a.biaya_kirim,
		                                 a.idongkir
		                           FROM tb_ongkir a      
		                           LEFT JOIN hrd_mst_rs c on a.kode_ongkir=c.koders '.$where);
		return $data;
}

 public function Getmstrs($where= "")
	{
		$data = $this->db->query('select *  from hrd_mst_rs '.$where);
		return $data;
}

public function Save_alkesrr($data)
	{
		$this->db->insert('listingrrhead', $data);
	}
public function Save_alkesrrdetil($data)
	{
		$this->db->insert('rralkes_detail', $data);
	}
function insertalkesrr($data)
	{
		$this->db->insert_batch('rralkes_detail', $data);
	}

function Updatedetail($data){
    	$this->db->where('iddetilalkesrr',$data['iddetilalkesrr']);
    	$this->db->update('rralkes_detail',$data);

    }
function Updateapp($data){
        $this->db->where('kode_transaksi',$data['kode_transaksi']);
        $this->db->update('listingrrhead',$data);

    }

 function Updateappdetil($data){
        $this->db->where('kode_transaksi',$data['kode_transaksi']);
        $this->db->update('rralkes_detail',$data);

    }
    

public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}

	function code_otomatis(){
    	$this->db->select('Right(listingrrhead.kode_transaksi,4)as kode ',false);
    	$this->db->order_by('kode_transaksi','desc');
    	$this->db->limit(1);
    	$query=$this->db->get('listingrrhead');
    	if($query->num_rows()<>0){
    		$data=$query->row();
    		$kode=intval($data->kode)+1;
    	}else{
    		$kode=1;
    	}
      date_default_timezone_set("Asia/Jakarta");
          $kodemax=str_pad($kode,4,"0",STR_PAD_LEFT);
          // $kodejadi="PR".$kodemax;
          return date("Ym").$kodemax;

    }

    function get_data_alkess_bykode($kode_produk){
                 $hsl=$this->db->query("SELECT * FROM v_mstproduk WHERE kode_produk='$kode_produk'");
                if($hsl->num_rows()>0){
                        foreach ($hsl->result() as $data) {
                                $hasil=array(
                                        'kode_produk' => $data->kode_produk,
                                        'type' => $data->type,
                                         'merk' => $data->merk,
                                        'nm_perusahaan' => $data->nm_perusahaan,
                                         'jns_barang' => $data->jns_barang,
                                        );

                        }
                }
                return $hasil;
        }

	
}
