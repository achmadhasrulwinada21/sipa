<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class malkesrr extends CI_Model {
	var $table = 'v_listingrrhead'; 
	var $table2 = 'v_listingrrkadep'; 
	var $table3 = 'v_listingrrdirops';
	var $table5 = 'v_historialkesrr';
	var $table6 = 'v_listingrrmngralkes';
	var $table7 = 'v_listingrrkadepalkes';
    var $column_order = array('kode_transaksi','nm_perusahaan','jenis_pembayaran','jenis_listing','status_app','tgl_tr');
    var $column_search = array('kode_transaksi','nm_perusahaan','jenis_pembayaran','jenis_listing','status_app','tgl_tr'); 
    var $order = array('kode_transaksi' => 'desc');

    public $variable;

	public function __construct()
	{
		parent::__construct();
				
	}

	private function _get_datatables_queryalkes()
	{
		
        $dara=($this->session->userdata('koderole'));
     if($dara =='75' || $dara =='76' || $dara =='1'):
		$this->db->from($this->table);
		$this->db->where('id_tipe_produk','TP003');
		$this->db->where('status_app !=','Disetujui Direktur Ops & Umum');
		endif;
	 $dara=($this->session->userdata('koderole'));
     if($dara =='69'):
		$this->db->from($this->table6);
		$this->db->where('id_tipe_produk','TP003');
		endif;
	 $dara=($this->session->userdata('koderole'));
     if($dara =='57'):
		$this->db->from($this->table7);
		$this->db->where('id_tipe_produk','TP003');
		endif;
	 $dara=($this->session->userdata('koderole'));
     if($dara =='82'):
		$this->db->from($this->table2);
		$this->db->where('id_tipe_produk','TP003');
		endif;
      $dara=($this->session->userdata('koderole'));
     if($dara =='10'):
		$this->db->from($this->table3);
		$this->db->where('id_tipe_produk','TP003');
		endif;
      
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST["search"]["value"])  
            {  
                 $this->db->or_like("kode_transaksi", $_POST["search"]["value"]);
                 $this->db->or_like("nm_perusahaan", $_POST["search"]["value"]);
                 $this->db->or_like("jenis_pembayaran", $_POST["search"]["value"]);
                 $this->db->or_like("jenis_listing", $_POST["search"]["value"]); 
                $this->db->or_like("status_app", $_POST["search"]["value"]);
                  $this->db->or_like("tgl_tr", $_POST["search"]["value"]);
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
	
function v_user($dept){
        return $this->db->query("SELECT distinct email,departemen from v_user
                where departemen = '$dept' and email <>''")->result();
    }
public function getper($where= "")
	{
		$data = $this->db->query('select * from master_perusahaan '.$where);
		return $data;
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

public function Getemploy($where= "")
	{
		$data = $this->db->query('select * from Employ '.$where);
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


 public function ongkirregcui($where= "")
	{
		$data = $this->db->query('SELECT a.kode_produk,
		                                 a.koper,
		                                 a.kode_ongkir,
		                                 a.flag_ongkir,
		                                 c.nm_regional,
		                                 a.biaya_kirim,
		                                 a.idongkir,
		                                 e.namars,
		                                 z.nm_perusahaan
		                               FROM tb_ongkir a      
		                           LEFT JOIN master_regional c on a.kode_ongkir=c.kode_regional
                                    LEFT JOIN hrd_mst_rs e on a.kode_ongkir=e.koders
                                    LEFT JOIN master_perusahaan z on a.koper=z.koper 
		                            '.$where);
		return $data;
}

public function ongkirregcuicoba($where= "")
	{
		$data = $this->db->query('SELECT a.kode_produk,
		                                 a.koper,
		                                 a.kode_ongkir,
		                                 a.flag_ongkir,
		                                 a.biaya_kirim,
		                                 a.idongkir,
		                                 e.namars,
		                                 z.nm_perusahaan,
		                                 c.koders,
		                                 g.namars as nmrs
		                               FROM tb_ongkir a      
		                            LEFT JOIN setuprs_reg c on a.kode_ongkir=c.kode_regional
                                    LEFT JOIN hrd_mst_rs e on a.kode_ongkir=e.koders
                                    LEFT JOIN hrd_mst_rs g on c.koders=g.koders
                                    LEFT JOIN master_perusahaan z on a.koper=z.koper 
		                            '.$where);
		return $data;
}

public function ongkirreg($where= "")
	{
		$data = $this->db->query('SELECT a.koper,
		                                 a.kode_wilayah,
		                                 c.nm_regional,
		                                 e.namars
		                               FROM master_setwilayah a      
		                           LEFT JOIN master_regional c on a.kode_wilayah=c.kode_regional
                                    LEFT JOIN hrd_mst_rs e on a.kode_wilayah=e.koders
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
