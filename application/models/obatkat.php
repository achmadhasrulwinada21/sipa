<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class obatkat extends CI_Model {

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
		$data = $this->db->query('select * from master_obat '.$where);
		return $data;
}

  public function Getdistri($where= "")
        {
                $data = $this->db->query('select * from v_master_setup_dist '.$where);
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

public function Getprodukmfinal2($where= "")
	{
		$data = $this->db->query('select *  from v_obat_tr_final_fix '.$where);
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
		$data = $this->db->query('select *  from tr_farmasi '.$where);
		return $data;
	}


	public function GetprodukV($where= "")
	{
		$data = $this->db->query('select *  from v_obat_head '.$where);
		return $data;
	}

	public function GetprodukVdetail($where= "")
	{
		$data = $this->db->query('select *  from v_detil_obat '.$where);
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

    function Updatedetail($data){
    	$this->db->where('iddetailprod2',$data['iddetailprod2']);
    	$this->db->update('tb_detilfarmasi',$data);

    }

    public function Simpanaprove($data)
	{
		$this->db->insert('tr_print_compare', $data);
	}
   
   function Updateapp1($data){
    	$this->db->where('idtrcom',$data['idtrcom']);
    	$this->db->update('tr_print_compare',$data);

    }

    function Updatedara($data){
    	$this->db->where('idtrcom',$data['idtrcom']);
    	$this->db->update('tr_print_compare',$data);

    }


function selectobat()
	{
		$this->db->order_by('iddetailprod2', 'DESC');
		$query = $this->db->get('tb_detilfarmasi_final');
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
	
	
}
