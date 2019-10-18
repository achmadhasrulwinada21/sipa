<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class depbangkat extends CI_Model {

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
				);
			}
		}
		return $hasil;
	}



	function get_data_obats_bykode($kode_produk){
		$hsl=$this->db->query("SELECT * FROM master_produk WHERE kode_produk='$kode_produk'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'kode_produk' => $data->kode_produk,
					'nama_produk' => $data->nama_produk,
					'koper' => $data->koper,
					'kodis' => $data->kodis,
					);
			}
		}
		return $hasil;
	}

	 public function Getobatcobauy($where= "")
	{
		$data = $this->db->query('select *  from master_produk '.$where);
		return $data;
}

   public function Getobatcobaalum($where= "")
	{
		$data = $this->db->query('select *  from mstbarang_gu '.$where);
		return $data;
}

 public function Gettipeharga($where= "")
	{
		$data = $this->db->query('select * from m_tipeharga '.$where);
		return $data;
	}

 public function Getdetaildf($where= "")
	{
		$data = $this->db->query('select obatid from tb_detail_prod2 '.$where);
		return $data;
	}

public function Save_db1($data)
	{
		$this->db->insert('tb_detail_depbang', $data);
	}
	
	public function Savedepbang_db1($data)
	{
		$this->db->insert('produko2', $data);
	}

    public function Getprodukm($where= "")
	{
		$data = $this->db->query('select *  from view_transaksidepbang '.$where);
		return $data;
	}

	public function Getprodukmdet($where= "")
	{
		$data = $this->db->query('select *  from v_detildepbang '.$where);
		return $data;
	}

	public function Getprodukms($where= "")
	{
		$data = $this->db->query('select *  from tb_detail_prod2 '.$where);
		return $data;
	}

	public function Getprodukms2($where= "")
	{
		$data = $this->db->query('select *  from v_detildepbang '.$where);
		return $data;
	}

	public function Getprodukmsp($where= "")
	{
		$data = $this->db->query('select A.*,(SELECT COUNT(s_kode) FROM v_detailproduk WHERE s_kode=A.s_kode and koded_prod=A.koded_prod) AS jumlah1 from v_detailproduk A '.$where);
		return $data;
	}

public function Getaprove($where= "")
	{
		$data = $this->db->query('select *  from tr_print_compare '.$where);
		return $data;
	}
	

	 public function Getproduk($where= "")
	{
		$data = $this->db->query('select *  from produko2 '.$where);
		return $data;
	}

public function Getrs($where= "")
	{
		$data = $this->db->query('select *  from hrd_mst_rs '.$where);
		return $data;
	}

public function Getlok($where= "")
	{
		$data = $this->db->query('select *  from master_lokasi '.$where);
		return $data;
	}

	public function GetprodukV($where= "")
	{
		$data = $this->db->query('select *  from v_produkos2 '.$where);
		return $data;
	}

public function GetprodukVcount($where= "")
	{
		$data = $this->db->query('select *  from v_countalkes '.$where);
		return $data;
	}

	

	 public function Getdetail($where= "")
	{
		$data = $this->db->query('select * from tb_detail_depbang '.$where);
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

	function Updateheadalkes($data){
    	$this->db->where('idpr2',$data['idpr2']);
    	$this->db->update('produko2',$data);

    }

    function Updatedetail($data){
    	$this->db->where('id_detail_depbang',$data['id_detail_depbang']);
    	$this->db->update('tb_detail_depbang',$data);

    }

    public function Simpanaprove($data)
	{
		$this->db->insert('tr_print_compare', $data);
	}
   
   function Updateapp1($data){
    	$this->db->where('idtrcom',$data['idtrcom']);
    	$this->db->update('tr_print_compare',$data);

    }

    public function Getaproveview($where= "")
	{
		$data = $this->db->query('select *  from v_tr_print_compare '.$where);
		return $data;
	}


	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}
	public function GetKodePrinsp($where= "")
	{
		$data = $this->db->query('select DISTINCT koper,nm_perusahaan from master_perusahaan ' .$where);
		return $data;
	}

	public function GetKodesubkerja($where= "")
	{
		$data = $this->db->query('select DISTINCT kode_sub_jenis_pekerjaan,nm_sub_jenis_pekerjaan from tb_sub_jenis_pekerjaan ' .$where);
		return $data;
	}

	public function GetKodelokasi($where= "")
	{
		$data = $this->db->query('select DISTINCT kodelokasi,deskripsi from master_lokasi ' .$where);
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

     public function getttd($where= "") {
        $data = $this->db->query('select * from master_ttd '.$where);
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

	function code_otomatis(){
    	$this->db->select('Right(tr_print_compare.kode_trans,5)as kode ',false);
    	$this->db->order_by('idtrcom','desc');
    	$this->db->limit(1);
    	$query=$this->db->get('tr_print_compare');
    	if($query->num_rows()<>0){
    		$data=$query->row();
    		$kode=intval($data->kode)+1;
    	}else{
    		$kode=1;
    	}
    $dt = new DateTime();
          date_default_timezone_set("Asia/Jakarta");
           $waktu =date('Ymd');
          $kodemax=str_pad($kode,5,"0",STR_PAD_LEFT);
          $kodejadi="04".$kodemax;
          return $waktu.$kodejadi;

    }

    function code_otomatiss(){
    	$this->db->select('Right(produko2.kode_alkes,5)as kode ',false);
    	$this->db->order_by('idpr2','desc');
    	$this->db->limit(1);
    	$query=$this->db->get('produko2');
    	if($query->num_rows()<>0){
    		$data=$query->row();
    		$kode=intval($data->kode)+1;
    	}else{
    		$kode=1;
    	}
       $dt = new DateTime();
          date_default_timezone_set("Asia/Jakarta");
           $waktu =date('Ymd');
          $kodemax=str_pad($kode,5,"0",STR_PAD_LEFT);
          $kodejadi="/AL/".$kodemax;
          return $waktu.$kodejadi;

    }
	
	
}