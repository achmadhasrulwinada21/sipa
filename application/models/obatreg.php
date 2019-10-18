<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class obatreg extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
				
	}


	   	
		
	function get_data_prinsipal_bykode($koper){
		$hsl=$this->db->query("SELECT * FROM rekanan_farmasi WHERE koper='$koper'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'koper' => $data->koper,
					'kodis' => $data->kodis,
                                        'nm_distributor' => $data->nm_distributor,
				);
			}
		}
		return $hasil;
	}



	function get_data_farmasi_bykode($idobat){
		$hsl=$this->db->query("SELECT * FROM master_obat WHERE idobat='$idobat'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'idobat' => $data->idobat,
					'kode_obat' => $data->kode_obat,
					'kodis' => $data->kodis,
					'harga' => $data->harga,
					'golonganid' => $data->golonganid,
					'komposisi' => $data->komposisi,
					'discount' => $data->discount,
					);
			}
		}
		return $hasil;
	}

	 public function Getobatcobauy($where= "")
	{
		$this->db1 = $this->load->database('default', TRUE);
		$data = $this->db1->query('select * from master_obat '.$where);
		return $data;
}

	 public function Getobatcobauy_lop($where= "")
	{
		$this->db1 = $this->load->database('default', TRUE);
		$data = $this->db1->query('select * from v_obat_tr_lop '.$where);
		return $data;
}


  public function Getdistri($where= "")
        {
                $data = $this->db1->query('select * from v_master_setup_dist '.$where);
                return $data;
}



   public function Getobatcobaalum($where= "")
	{
		$this->db1 = $this->load->database('default', TRUE);
		$data = $this->db2->query('select *  from mstbarang_gu '.$where);
		return $data;
}

 public function Gettipeharga($where= "")
	{
		$data = $this->db->query('select * from m_tipeharga '.$where);
		return $data;
	}
	
	 public function Get_v_jum_pengajuan()
	{
		$data = $this->db->query('select * from v_jum_pengajuan ');
		return $data;
	}

 public function Getdetaildf($where= "")
	{
		$data = $this->db->query('select obatid from tb_detail_prod2 '.$where);
		return $data;
	}

public function GetprodukVfinal($where= "")
	{
		$data = $this->db->query('select *  from v_obat_head_final '.$where);
		return $data;
	}

public function Save_db1($data)
	{
		$this->db->insert('tb_detilfarmasi', $data);
	}
	
	public function SaveFarmasi_db1($data)
	{
		$this->db->insert('tr_farmasi', $data);
	}
	
	public function SaveFarmasi_db_lop($data)
	{
		$this->db->insert('tr_farmasi_lop', $data);
	}
	
	public function SaveFarmasi_detail_lop($data)
	{
		$this->db->insert('tb_detilfarmasi_lop', $data);
	}
	
	public function SaveFarmasi_detail_lop_histori($data)
	{
		$this->db->insert('tb_detilfarmasi_lop_histori', $data);
	}

    public function Getprodukm($where= "")
	{
		$data = $this->db->query('select *  from v_obat_tr '.$where);
		return $data;
	}

	public function Getprodukmfinal($where= "")
	{
		$data = $this->db->query('select *  from v_obat_tr_final '.$where);
		return $data;
	}
	
	public function Getprodukmfinal_lop($where= "")
	{
		$data = $this->db->query('select *  from v_obat_tr_final_fix '.$where);
		return $data;
	}

	public function Getprodukms($where= "")
	{
		$data = $this->db->query('select *  from tb_detail_prod2 '.$where);
		return $data;
	}

	public function Getprodukms2($where= "")
	{
		$data = $this->db->query('select *  from v_detailproduk2 '.$where);
		return $data;
	}

	public function Getprodukmsp($where= "")
	{
		$data = $this->db->query('select A.*,(SELECT COUNT(s_kode) FROM v_detailproduk WHERE s_kode=A.s_kode and koded_prod=A.koded_prod) AS jumlah1 from v_detailproduk A '.$where);
		return $data;
	}

	public function Getaprove($where= "")
	{
		$data = $this->db->query('select *  from tr_farmasi_lop '.$where);
		return $data;
	}
	

	 public function Getproduk($where= "")
	{
		$data = $this->db->query('select *  from tr_farmasi '.$where);
		return $data;
	}
	
	 // public function Getproduk_lop($where= "")
	// {
		// $data = $this->db->query('select *  from tr_farmasi_lop '.$where);
		// return $data;
	// }


	public function GetprodukV($where= "")
	{
		$data = $this->db->query('select *  from v_obat_head '.$where);
		return $data;
	}
	
	public function GetprodukV_lop($where= "")
	{
		$data = $this->db->query('select *  from v_obat_head_lop '.$where);
		return $data;
	}
	
	public function GetprodukV_lop_email($where= "")
	{
		$data = $this->db->query('select *  from v_obat_head_lop_email '.$where);
		return $data;
	}

	public function GetprodukVdetail($where= "")
	{
		$data = $this->db->query('select *  from v_detil_obat '.$where);
		return $data;
	}

	public function GetprodukVdetail_2($where= "")
	{
		$data = $this->db->query('select *  from tb_detilfarmasi_lop '.$where);
		return $data;
	}
	
	public function GetprodukVdetail_3($where= "")
	{
		$data = $this->db->query('select *  from  v_obat_tr_lop '.$where);
		return $data;
	}
	
	public function GetprodukVdetailfinal($where= "")
	{
		$data = $this->db->query('select *  from v_detil_obat_final '.$where);
		return $data;
	}

public function GetprodukVcount($where= "")
	{
		$data = $this->db->query('select *  from v_farmasicounting '.$where);
		return $data;
	}

public function GetprodukVcountfinal($where= "")
	{
		$data = $this->db->query('select *  from v_farmasicounting_final '.$where);
		return $data;
	}
	

	 public function Getdetail($where= "")
	{
		$data = $this->db->query('select * from tb_detilfarmasi '.$where);
		return $data;
	}
	
	 public function Getdetail_lop($where= "")
	{
		$data = $this->db->query('select * from tb_detilfarmasi_lop '.$where);
		return $data;
	}

	 public function Ambilprodukm($where= "")
	{
		$data = $this->db->query('select * from v_produko2 '.$where);
		return $data;
	}

	public function Ambilcount($where= "")
	{
		$data = $this->db->query('select * from v_count '.$where);
		return $data;
	}

	 public function Ambilcompare($where= "")
	{
		$data = $this->db->query('select * from tb_compare '.$where);
		return $data;
	}

	public function GetKode_s($where= "")
	{
		$data = $this->db->query('select * from tb_prinsipal ' .$where);
		return $data;
	}

	public function Simpan($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function Simpandetail($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	function Updateheadfarmasi($data){
    	$this->db->where('idpr2',$data['idpr2']);
    	$this->db->update('tr_farmasi',$data);

    }
	
	function Updatehead_trfarmasi_lop($data){
    	$this->db->where('idpr2',$data['idpr2']);
    	$this->db->update('tr_farmasi_lop',$data);

    }

    function Updatedetail($data){
    	$this->db->where('iddetailprod2',$data['iddetailprod2']);
    	$this->db->update('tb_detilfarmasi_lop',$data);

    }

    public function Simpanaprove($data)
	{
		$this->db->insert('tr_print_compare', $data);
	}
   
   function Updateapp1($data){
    	$this->db->where('idtrcom',$data['idtrcom']);
    	$this->db->update('tr_print_compare',$data);

    }
	
	 function Updateapp1_lop($data){
    	$this->db->where('idpr2',$data['idpr2']);
    	$this->db->update('tr_farmasi_lop',$data);

    }

    function Updatedara($data){
    	$this->db->where('idpr2',$data['idpr2']);
    	$this->db->update('tr_farmasi_lop',$data);

    }
	
	  function Updatedarak($data){
    	$this->db->where('idpr2',$data['idpr2']);
    	$this->db->update('tr_farmasi_lop',$data);

    }


function selectobat()
	{
		$this->db->order_by('iddetailprod2', 'DESC');
		$query = $this->db->get('tb_detilfarmasi_lop');
		return $query;
	}

	function insertobatim($data)
	{
		$this->db->insert_batch('tb_detilfarmasi_final', $data);
	}

    public function Getaproveview($where= "")
	{
		$data = $this->db->query('select *  from v_tr_print_compare '.$where);
		return $data;
	}
	
	 public function Get_obat_outs_lop($where= "")
	{
		$data = $this->db->query('select * from v_obat_outs_lop '.$where);
		return $data;
	}
	
	public function Get_obat_outs_lop_pengajuan($where= "")
	{
		$data = $this->db->query('select DISTINCT tanggal_tr, kode_trans, nm_perusahaan, nm_distributor, flagobat, status, catatan, statusdetil_obat, outstanding, idpr2, koper, id_tipe_produk, ttd_mengetahui,
    mengetahui,
	menyetujui,
    ttd_menyetujui,
    tanggal_obat,
    koders,
    ttd_satu,
    nama_satu,
    ttd_dua,
    nama_dua,
    jb_mengetahui,
    jb_menyetujui,
    jb_satu,
    jb_dua from v_obat_outs_lop '.$where);
		return $data;
	}
	
	 public function Get_obat_outs_lop_koper($where= "")
	{
		$data = $this->db->query('select DISTINCT koper, nm_perusahaan  from v_obat_outs_lop '.$where);
		return $data;
	}
	
	public function Get_rs_lap_po_non_rr($where= "")
	{
		$data = $this->db->query('select DISTINCT koders, namars  from v_pofarmasirs '.$where);
		return $data;
	}
	
	public function Get_supp_lap_po_non_rr($where= "")
	{
		$data = $this->db->query('select DISTINCT supplier, s_nama from v_pofarmasirs '.$where);
		return $data;
	}
	
	public function Get_princp_lap_po_non_rr($where= "")
	{
		$data = $this->db->query('select DISTINCT prinsipal from v_pofarmasirs '.$where);
		return $data;
	}
	
	
	public function Get_view_po_non_rr($where= "")
	{
		$data = $this->db->query('select * from v_pofarmasirs '.$where);
		return $data;
	}
	
	public function Get_view_detail_po_non_rr($where= "")
	{
		$data = $this->db->query('select * from v_pofarmasirs_detail '.$where);
		return $data;
	}
	
	public function Get_view_detail_khusus_rko($where= "")
	{
		$data = $this->db->query('select * from v_receivegood '.$where);
		return $data;
	}
	
	public function Get_supp_lap_khusus_rko($where= "")
	{
		$data = $this->db->query('select DISTINCT s_nama from v_receivegood '.$where);
		return $data;
	}
	
	public function Get_prinsip_lap_khusus_rko($where= "")
	{
		$data = $this->db->query('select DISTINCT pabrikid, pabriknama from v_receivegood '.$where);
		return $data;
	}
	
	
	public function Get_view_kode_obat($where= "")
	{
		$data = $this->db->query('select obatid, obatnama from v_pofarmasirs_detail '.$where);
		return $data;
	}
	
	public function Get_view_no_bukti($where= "")
	{
		$data = $this->db->query('select nobuktiterima from receiveheader_rs'.$where);
		return $data;
	}


	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}
	public function GetKodePrinsp($where= "")
	{
		$data = $this->db->query('select DISTINCT koper,nm_perusahaan from rekanan_farmasi ' .$where);
		return $data;
	}

	public function GetKodePrinscount($where= "")
	{
		$data = $this->db->query('select * from v_count ' .$where);
		return $data;
	}

	
	public function GetVproduko($where= "")
	{
		$data = $this->db->query('select * from v_count ' .$where);
		return $data;
	}

	public function Getskode($where= "")
	{
		$data = $this->db->query('select * from supplier ' .$where);
		return $data;
	}

	
	
	public function GetCompare($where= "")
	{
		$data = $this->db->query('select * from v_count ' .$where);
		return $data;
	}

	
	public function Gettipe($where= "")
	{
		$data = $this->db->query('select * from master_tipe_produk ' .$where);
		return $data;
	}

	public function upload_file($filename){
		$this->load->library('upload'); 
		
		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']	= '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;
	
		$this->upload->initialize($config); 
		if($this->upload->do_upload('file')){ 
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
	
	
	public function insert_multiple($data){
		$this->db->insert_batch('tb_detilfarmasi_final', $data);
	}

	function code_otomatis(){
    	$this->db->select('Right(produko.prid,5)as kode ',false);
    	$this->db->order_by('idpr','desc');
    	$this->db->limit(1);
    	$query=$this->db->get('produko');
    	if($query->num_rows()<>0){
    		$data=$query->row();
    		$kode=intval($data->kode)+1;
    	}else{
    		$kode=1;
    	}
date_default_timezone_set("Asia/Jakarta");
          $kodemax=str_pad($kode,5,"0",STR_PAD_LEFT);
          // $kodejadi="PR".$kodemax;
          return date("Ymd-").$kodemax;

    }
	
	
	function code_otomatis_reg(){
    	$this->db->select('Right(tr_farmasi_lop.kode_trans,5)as kode ',false);
    	$this->db->order_by('idpr2','desc');
    	$this->db->limit(1);
    	$query=$this->db->get('tr_farmasi_lop');
    	if($query->num_rows()<>0){
    		$data=$query->row();
    		$kode=intval($data->kode)+1;
    	}else{
    		$kode=1;
    	}
		date_default_timezone_set("Asia/Jakarta");
          $kodemax=str_pad($kode,5,"0",STR_PAD_LEFT);
          // $kodejadi="PR".$kodemax;
          return date("Ymd").$kodemax;

    }
	
	
}
