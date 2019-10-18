<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produkom extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
				
	}
	
		
	function dd_prinsipal()
    {
        // ambil data dari db
        $this->db->order_by('pabriknama', 'asc');
        $result = $this->db->get('pabrikobat');
        
        // bikin array
        // please select berikut ini merupakan tambahan saja agar saat pertama
        // diload akan ditampilkan text please select.
        $dd[''] = 'Please Select';
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $dd[$row->pabrikid] = $row->pabriknama;
            }
        }
        return $dd;
    }
	

	function get_data_barang_bykode($id_produk){
		$hsl=$this->db->query("SELECT * FROM tb_prod_ecatalog WHERE id_produk='$id_produk'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'id_produk' => $data->id_produk,
					'nm_produk' => $data->nm_produk,
					'harga_ecat' => $data->harga_ecat,
					'alkes' => $data->alkes,
					'alum' => $data->alum,
				
					);
			}
		}
		return $hasil;
	}
	
	function get_data_pabrik_bykode($pabrik_id){
		$hsl=$this->db->query("SELECT * FROM v_count WHERE pabrik_id='$pabrik_id'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'pabrik_id' => $data->pabrik_id,
					'idpr' => $data->idpr,
					'nama_pt' => $data->nama_pt,
					's_kode' => $data->s_kode,
					'harga_kecil_e_cat' => $data->harga_kecil_e_cat,
					'harga_sama_e_cat' => $data->harga_sama_e_cat,
					'harga_dibawahten' => $data->harga_dibawahten,
					'harga_diataten' => $data->harga_diataten,
				
				
					);
			}
		}
		return $hasil;
	}

	function get_data_prinsipal_bykode($pabrik_id){
		$hsl=$this->db->query("SELECT * FROM concatprin WHERE pabrik_id='$pabrik_id'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'pabrik_id' => $data->pabrik_id,
					'nama_pt' => $data->nama_pt,
					'pabriknama' => $data->pabriknama,
					's_kode' => $data->s_kode,
				);
			}
		}
		return $hasil;
	}

	function get_data_prinsipalcompare_bykode($idpr){
		$hsl=$this->db->query("SELECT * FROM v_count WHERE idpr='$idpr'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'idpr' => $data->idpr,
					'pabrik_id' => $data->pabrik_id,
					'nama_pt' => $data->nama_pt,
					's_kode' => $data->s_kode,
					'harga_kecil_e_cat' => $data->harga_kecil_e_cat,
					'harga_sama_e_cat' => $data->harga_sama_e_cat,
					'harga_dibawahten' => $data->harga_dibawahten,
					'harga_diataten' => $data->harga_diataten,
				);
			}
		}
		return $hasil;
	}

	function get_data_alum_bykode($alumid){
		$hsl=$this->db->query("SELECT * FROM concatalum WHERE alumid='$alumid'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'alumid' => $data->alumid,
					'pt_alum' => $data->pt_alum,
					'alumnama' => $data->alumnama,
					'distalumid' => $data->distalumid,
				);
			}
		}
		return $hasil;
	}

	function get_data_alkes_bykode($alkesid){
		$hsl=$this->db->query("SELECT * FROM concatalkes WHERE alkesid='$alkesid'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'alkesid' => $data->alkesid,
					'pt_alkes' => $data->pt_alkes,
					'alkesnama' => $data->alkesnama,
					'distalkesid' => $data->distalkesid,
				);
			}
		}
		return $hasil;
	}

	

	

      

   

 public function Getdetaildf($where= "")
	{
		$data = $this->db->query('select obatid from tb_detail_prod '.$where);
		return $data;
	}
 
public function Gettipeharga($where= "")
	{
		$data = $this->db->query('select * from m_tipeharga '.$where);
		return $data;
	}
             
         public function Getprodukms2($where= "")
	{
		$data = $this->db->query('select *  from v_detailproduk '.$where);
		return $data;
	}
public function Save_db1($data)
	{
		$this->db->insert('tb_detail_prod', $data);
	}
	public function Getobatlist($where= "")
	{
		$data = $this->db->query('select *  from tb_obat '.$where);
		return $data;
	}

    public function Getprodukm($where= "")
	{
		$data = $this->db->query('select *  from v_produko '.$where);
		return $data;
	}

	public function Getaprove($where= "")
	{
		$data = $this->db->query('select *  from tr_print_compare '.$where);
		return $data;
	}

	 public function Simpanaprove($data)
	{
		$this->db->insert('tr_print_compare', $data);
	}

	 public function Getproduk($where= "")
	{
		$data = $this->db->query('select *  from v_produkos '.$where);
		return $data;
	}

	 public function GetAnggaran($where= "")
	{
		$data = $this->db->query('select * from tb_header_acara '.$where);
		return $data;
	}

	 public function Getdetail($where= "")
	{
		$data = $this->db->query('select * from tb_detail_prod '.$where);
		return $data;
	}


	 public function Ambilprodukm($where= "")
	{
		$data = $this->db->query('select * from v_produko '.$where);
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

	

	public function GetKebutuhan()
	{
		$data = $this->db->query('select * from master_kebutuhan ');
		return $data;
	}

	public function Getsesi()
	{
		$data = $this->db->query('select * from master_sesi ');
		return $data;
	}

               public function Getprodukms($where= "")
	{
		$data = $this->db->query('select *  from tb_detail_prod '.$where);
		return $data;
	}

	public function Getprodukmsp($where= "")
	{
		$data = $this->db->query('select A.*,(SELECT COUNT(s_kode) FROM v_detailproduk WHERE s_kode=A.s_kode and koded_prod=A.koded_prod) AS jumlah1 from v_detailproduk A '.$where);
		return $data;
	}

          public function GetKode_s($where= "")
	{
		$data = $this->db->query('select * from tb_prinsipal ' .$where);
		return $data;
	}

    public function GetId()
	{
		$datas = $this->db->query('select DISTINCT idkeb from vi_acarax order by idacara desc');
		return $datas;
	}
	
	 // function search($keyword)
  //   {
  //       $this->db->like('periode_awal',$keyword);
  //       $this->db->or_like('periode_akhir',$keyword);
  //        $query  =   $this->db->get('v_anggarankliniksiang');
  //       return $query->result_array();
  //   }

 function searchs($keyword)
    {
        $this->db->like('sesi',$keyword);
         $query  =   $this->db->get('vi_acarax');
        return $query->result_array();
    }
    
	public function Simpan($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function Simpandetail($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	// public function GetWhere($table, $data)
	// {
 //    $res=$this->db->get_where($table, $data);
 //    return $res->result_array();
	// }
	
	function Updateprodukm($data){
    	$this->db->where('idpr',$data['idpr']);
    	$this->db->update('produko',$data);

    }

    function Updatedetail($data){
    	$this->db->where('iddetailprod',$data['iddetailprod']);
    	$this->db->update('tb_detail_prod',$data);

    }

    function Updateapp1($data){
    	$this->db->where('idtrcom',$data['idtrcom']);
    	$this->db->update('tr_print_compare',$data);

    }

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}
	public function GetKodePrinsp($where= "")
	{
		$data = $this->db->query('select DISTINCT pabrik_id,nama_pt from tb_prinsipal ' .$where);
		return $data;
	}

	public function GetKodePrinscount($where= "")
	{
		$data = $this->db->query('select * from v_count ' .$where);
		return $data;
	}

	public function GetKodealum($where= "")
	{
		$data = $this->db->query('select DISTINCT alumid,pt_alum from tb_alumdist ' .$where);
		return $data;
	}
public function GetKodealkes($where= "")
	{
		$data = $this->db->query('select DISTINCT alkesid,pt_alkes from tb_alkesdist ' .$where);
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

	public function Getprodukob($where= "")
	{
		$data = $this->db->query('select * from tb_prod_ecatalog ' .$where);
		return $data;
	}

	public function Getprodukod($where= "")
	{
		$data = $this->db->query('select * from tb_obat ' .$where);
		return $data;
	}
	
	public function GetCompare($where= "")
	{
		$data = $this->db->query('select * from v_count ' .$where);
		return $data;
	}

	public function GetCompares($where= "")
	{
		$data = $this->db->query('select * from v_countall' .$where);
		return $data;
	}

	public function Gettipe($where= "")
	{
		$data = $this->db->query('select * from master_tipe_produk ' .$where);
		return $data;
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
	
	
}
