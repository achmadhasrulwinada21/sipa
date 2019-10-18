<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class produkom2 extends CI_Model {

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
	
   public function Getaproveview($where= "")
	{
		$data = $this->db->query('select *  from v_tr_print_compare '.$where);
		return $data;
	}

 public function Ambilcountalum($where= "")
	{
		$data = $this->db->query('select * from v_countalum '.$where);
		return $data;
	}

 public function Ambilcountdep($where= "")
        {
                $data = $this->db->query('select * from v_countdepbang '.$where);
                return $data;
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

	function get_data_prinsipal_bykode($koper){
		$hsl=$this->db->query("SELECT * FROM concat_koper WHERE koper='$koper'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'koper' => $data->koper,
					'nm_perusahaan' => $data->nm_perusahaan,
					'kodis' => $data->kodis,
					'nm_distributor' => $data->nm_distributor,
					'id_tipe_produk' => $data->id_tipe_produk,
				);
			}
		}
		return $hasil;
	}

	function get_data_prinsipalcompare_bykode($idpr2){
		$hsl=$this->db->query("SELECT * FROM v_count2 WHERE idpr2='$idpr2'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'idpr2' => $data->idpr2,
					'koper' => $data->koper,
					'nm_perusahaan' => $data->nm_perusahaan,
					'kodis' => $data->kodis,
					'harga_kecil_e_cat' => $data->harga_kecil_e_cat,
					'harga_sama_e_cat' => $data->harga_sama_e_cat,
					'harga_dibawahten' => $data->harga_dibawahten,
					'harga_diataten' => $data->harga_diataten,
				);
			}
		}
		return $hasil;
	}

	function get_data_alum_bykode($koper){
		$hsl=$this->db->query("SELECT * FROM master_perusahaan WHERE koper='$koper'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'koper' => $data->koper,
					'id_tipe_produk' => $data->id_tipe_produk,
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

	function get_data_obats_bykode($kode_produk){
		
		$hsl=$this->db->query("SELECT * FROM master_produk WHERE kode_produk='$kode_produk'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'kode_produk' => $data->kode_produk,
					'nama_produk' => $data->nama_produk,
					'deskripsi' => $data->deskripsi,
                    'kodis' => $data->kodis,
                    'koper' => $data->koper,
                   );
			}
		}
		return $hasil;
	}

	function get_data_obats_bykode2($kode_produk){
		
		$hsl=$this->db->query("SELECT * FROM master_produk WHERE kode_produk='$kode_produk'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'kode_produk' => $data->kode_produk,
					'nama_produk' => $data->nama_produk,
					'deskripsi' => $data->deskripsi,
                    'kodis' => $data->kodis,
                        );
			}
		}
		return $hasil;
	}

	

public function Getpersent($where= "")
	{
		
		$data = $this->db->query('select *  from master_presentase '.$where);
		return $data;
}

public function Getregional($where= "")
	{
		
		$data = $this->db->query('select *  from master_regional '.$where);
		return $data;
}


public function GetprodukalumVhead($where= "")
	{
		$data = $this->db->query('select *  from v_produkos2alum '.$where);
		return $data;
	}           

public function GetprodukdepbangVhead($where= "")
	{
		$data = $this->db->query('select *  from v_produkos2depbang '.$where);
		return $data;
	}           


       public function Getobatcobauy($where= "")
	{
	
		$data = $this->db->query('select *  from master_produk '.$where);
		return $data;
}

   public function Getobatcobaalum($where= "")
	{
		
		$data = $this->db2->query('select *  from mstbarang_gu '.$where);
		return $data;
}

 public function Getdetaildf($where= "")
	{
		$data = $this->db->query('select obatid from tb_detail_prod2 '.$where);
		return $data;
	}
 
public function Gettipeharga($where= "")
	{
		$data = $this->db->query('select * from m_tipeharga '.$where);
		return $data;
	}

function Updatedara($data){
    	$this->db->where('idtrcom',$data['idtrcom']);
    	$this->db->update('tr_print_compare',$data);

    }

    function Updatedaraanisa($data){
    	$this->db->where('idpr2',$data['idpr2']);
    	$this->db->update('produko2',$data);

    }

    function Updatedaraanisadetil($data){
    	$this->db->where('kode_tr',$data['kode_tr']);
    	$this->db->update('tb_detilalum',$data);

    }

             
         public function Getprodukms2($where= "")
	{
		$data = $this->db->query('select *  from v_detailproduk2 '.$where);
		return $data;
	}

           public function Getproduko2($where= "")
	{
		$data = $this->db->query('select *  from produko2 '.$where);
		return $data;
	}

	   public function Getprodukms2alum($where= "")
	{
		$data = $this->db->query('select *  from v_detilalum '.$where);
		return $data;
	}
	
	   public function Getprodukms2alkes($where= "")
	{
		$data = $this->db->query('select *  from v_detail_alkes2 '.$where);
		return $data;
	}
	
	
	
public function Save_db1($data)
	{
		$this->db->insert('tb_detail_prod2', $data);
	}

        public function Savealum_db1($data)
	{
		$this->db->insert('tb_detilalum', $data);
	}

	public function Getobatlist($where= "")
	{
		$data = $this->db->query('select *  from tb_obat '.$where);
		return $data;
	}

    public function Getprodukm($where= "")
	{
		$data = $this->db->query('select *  from v_produko2 '.$where);
		return $data;
	}

public function Getprodukalum($where= "")
	{
		$data = $this->db->query('select *  from v_produkoalum '.$where);
		return $data;
	}

	public function Getprodukalumdetail($where= "")
	{
		$data = $this->db->query('select *  from v_detilalum '.$where);
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
public function Simpanaproduko2($data)
	{
		$this->db->insert('produko2', $data);
	}

	 public function Getproduk($where= "")
	{
		$data = $this->db->query('select *  from v_produkos2 '.$where);
		return $data;
	}

	 public function Getprodukout($where= "")
	{
		$data = $this->db->query('select *  from v_produkoalum '.$where);
		return $data;
	}
	
		 public function Getprodukouts($where= "")
	{
		$data = $this->db->query('select *  from v_detail_alkes2 '.$where);
		return $data;
	}

	public function Getprodukoutdep($where= "")
	{
		$data = $this->db->query('select *  from v_produkodepbang '.$where);
		return $data;
	}

	
	 public function Getdetail($where= "")
	{
		$data = $this->db->query('select * from tb_detail_prod2 '.$where);
		return $data;
	}

public function Getdetailalum($where= "")
	{
		$data = $this->db->query('select * from tb_detilalum '.$where);
		return $data;
	}

public function Getskode($where= "")
	{
		$data = $this->db->query('select * from supplier ' .$where);
		return $data;
	}

	 public function Ambilprodukm($where= "")
	{
		$data = $this->db->query('select * from v_produko2 '.$where);
		return $data;
	}

	 public function Ambilprodukoutstand($where= "")
	{
		$data = $this->db->query('select * from v_produkoalum '.$where);
		return $data;
	}
	
	 public function Ambilprodukoutstand_alkes($where= "")
	{
		$data = $this->db->query('select * from v_detail_alkes2 '.$where);
		return $data;
	}

 public function Ambilprodukoutstanddep($where= "")
	{
		$data = $this->db->query('select * from v_produkodepbang '.$where);
		return $data;
	}

	public function Ambilcount($where= "")
	{
		$data = $this->db->query('select * from v_count2 '.$where);
		return $data;
	}

	 public function Ambilcompare($where= "")
	{
		$data = $this->db->query('select * from tb_compare2 '.$where);
		return $data;
	}


               public function Getprodukms($where= "")
	{
		$data = $this->db->query('select *  from tb_detail_prod2 '.$where);
		return $data;
	}

	public function Getprodukmsp($where= "")
	{
		$data = $this->db->query('select A.*,(SELECT COUNT(s_kode) FROM v_detailproduk2 WHERE s_kode=A.s_kode and koded_prod=A.koded_prod) AS jumlah1 from v_detailproduk2 A '.$where);
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

        public function GetprodukalumV($where= "")
	{
		$data = $this->db->query('select *  from v_produkalum_final '.$where);
		return $data;
	}

	  public function GetprodukdepbangV($where= "")
	{
		$data = $this->db->query('select *  from v_produkalum_finaldepbang '.$where);
		return $data;
	}
       

	
	function Updateprodukm($data){
    	$this->db->where('idpr2',$data['idpr2']);
    	$this->db->update('produko2',$data);

    }
	
	function Updateprodukm_alkes($data){
    	$this->db->where('idpr2',$data['idpr2']);
    	$this->db->update('produko2',$data);

    }

    function Updatedetail($data){
    	$this->db->where('iddetailprod2',$data['iddetailprod2']);
    	$this->db->update('tb_detail_prod2',$data);

    }
     
	function Updatedetailalum($data){
    	$this->db->where('iddetilalum',$data['iddetilalum']);
    	$this->db->update('tb_detilalum',$data);

    }
	
	   function Updatedetail_alkes($data){
    	$this->db->where('iddetailalkes',$data['iddetailalkes']);
    	$this->db->update('tb_detil_alkes',$data);

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
		$data = $this->db->query('select DISTINCT koper,nm_perusahaan from v_master_setup_dist ' .$where);
		return $data;
	}

       public function GetKodePrinspalum($where= "")
	{
		$data = $this->db->query('select DISTINCT koper,nm_perusahaan,id_tipe_produk from master_perusahaan ' .$where);
		return $data;
	}

	public function GetKodePrinscount($where= "")
	{
		$data = $this->db->query('select * from v_count2 ' .$where);
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
		$data = $this->db->query('select * from v_count2 ' .$where);
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
