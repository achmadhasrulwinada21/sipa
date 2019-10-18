<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form_kegiatanm extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
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
	
	 	 public function Getkegiatan($where= "")
	{
		$data = $this->db->query('select *  from master_kegiatan '.$where);
		return $data;
	}

		 public function Ambilkeg($where= "")
	{
		$data = $this->db->query('select *  from form_kegiatan '.$where);
		return $data;
	}

 public function Ambilreal($where= "")
	{
		$data = $this->db->query('select *  from ang_real '.$where);
		return $data;
	}

 public function Ambildetaill($where= "")
	{
		$data = $this->db->query('select *  from tb_detailkegi '.$where);
		return $data;
	}

	 public function Getsumberdana($where= "")
	{
		$data = $this->db->query('select *  from v_sumberdana '.$where);
		return $data;
	}

	 public function Getsesi2($where= "")
	{
		$data = $this->db->query('select *  from master_sesi '.$where);
		return $data;
	}

	public function Getkegiatanview($where= "")
	{
		$data = $this->db->query('select *  from v_kegiatan '.$where);
		return $data;
	}

	public function Getkegiatanviewdetail($where= "")
	{
		$data = $this->db->query('select *  from v_kegtransaksi '.$where);
		return $data;
	}

	public function Getrs($where= "")
	{
		$data = $this->db->query('select *  from hrd_mst_rs '.$where);
		return $data;
	}

	public function Getdept($where= "")
	{
		$data = $this->db->query('select *  from master_departemen '.$where);
		return $data;
	}

	public function Getkegiatanviewreal($where= "")
	{
		$data = $this->db->query('select *  from v_angreal '.$where);
		return $data;
	}

	public function Getkegiatanviewreals($where= "")
	{
		$data = $this->db->query('select A.*,(SELECT COUNT(rincian_kegiatan) FROM v_angreal WHERE rincian_kegiatan=A.rincian_kegiatan and kode_angreal=A.kode_angreal and hapus_angreal=0) AS jumlah1 from v_angreal A '.$where);
		return $data;
	}

	public function Getkegiatanviewrenacana($where= "")
	{
		$data = $this->db->query('select A.*,(SELECT COUNT(rincian_kegiatan) FROM v_kegtransaksi WHERE rincian_kegiatan=A.rincian_kegiatan and kode_detail=A.kode_detail and hapus=0) AS jumlah1 from v_kegtransaksi A '.$where);
		return $data;
	}

	 
	public function Simpan($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function Simpanall($table, $data)
	{
		return $this->db->insert_batch($table, $data);
	}

	public function Simpandetail($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	
	
	function Updatekeg($data){
    	$this->db->where('idfkeg',$data['idfkeg']);
    	$this->db->update('form_kegiatan',$data);

    }

    function Updatedana($data){
    	$this->db->where('iddana',$data['iddana']);
    	$this->db->update('sumber_dana',$data);

    }

    function Updaterencana($data){
    	$this->db->where('iddetkeg',$data['iddetkeg']);
    	$this->db->update('tb_detailkegi',$data);

    }

    function Updatereal($data){
    	$this->db->where('idangreal',$data['idangreal']);
    	$this->db->update('ang_real',$data);

    }

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
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

          $kodemax=str_pad($kode,5,"0",STR_PAD_LEFT);
          $kodejadi="PR".$kodemax;
          return $kodejadi;

    }
	
	
}