<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modelpekerjaan extends CI_Model {



	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function hapusaja($kode_jenis)
    {
        $this->db->where('kode_jenis',$kode_jenis);
        return $this->db->delete('tb_jenis_pekerjaan');
        
    }
	
	function get_data_tipe_bykode($id_tipe_produk){
		$hsl=$this->db->query("SELECT * FROM master_tipe_produk WHERE id_tipe_produk='$id_tipe_produk'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'id_tipe_produk' => $data->id_tipe_produk,
					'tipe_produk' => $data->tipe_produk,
			
					);
			}
		}
		return $hasil;
	}
	
	
	function get_jenis_pekerjaan_bykode($kode_jenis){
		$hsl=$this->db->query("SELECT * FROM tb_jenis_pekerjaan WHERE kode_jenis='$kode_jenis'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'kode_jenis' => $data->kode_jenis,
					'nm_pekerjaan' => $data->nm_pekerjaan,
			
					);
			}
		}
		return $hasil;
	}
	
	
	
	
	
	function update_pekerjaan($data){
    	$this->db->where('id_jenis_pekerjaan',$data['id_jenis_pekerjaan']);
    	$this->db->update('tb_jenis_pekerjaan',$data);

    }
	
	function updateperusdepbang($data){
    	$this->db->where('id_jenis_pekerjaan',$data['id_jenis_pekerjaan']);
    	$this->db->update('tb_jenis_pekerjaan',$data);

    }
	
	function updatealum($data){
    	$this->db->where('id_jenis_pekerjaan',$data['id_jenis_pekerjaan']);
    	$this->db->update('tb_jenis_pekerjaan',$data);

    }
	
	
	
	public function Simpan_db1($data)
	{
		$this->db->insert('tb_jenis_pekerjaan', $data);
	}
	
	public function Simpanjenis($data)
	{
		$this->db->insert('tb_jenis_pekerjaan', $data);
	}
	
	public function Simpan_sub_jenis($data)
	{
		$this->db->insert('tb_sub_jenis_pekerjaan', $data);
	}
	
	
	
	function deleteData($table,$data)
    {
        $this->db->delete($table,$data);
    }

	function code_otomatis()
	
	{
            $this->db->select('Right(tb_jenis_pekerjaan.kode_jenis, 4) as kode ',false);
            $this->db->order_by('id_jenis_pekerjaan', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('tb_jenis_pekerjaan');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
            $kodejadi  = "P".$kodemax;
            return $kodejadi;

        }
	
	//ambil data description
	public function GetEva($where= "")
	{
		$data = $this->db->query('select * from tb_jenis_pekerjaan '.$where);
		return $data;
	}
	
		public function GetJenis_Pekerjaan($where= "")
	{
		$data = $this->db->query('select * from tb_jenis_pekerjaan '.$where);
		return $data;
	}
	
		public function GetSub_Pekerjaan($where= "")
	{
		$data = $this->db->query('select * from tb_sub_jenis_pekerjaan '.$where);
		return $data;
	}


	public function Getdetaileva($where="")
	{
		$data = $this->db->query('select * from tb_jenis_pekerjaan '.$where);
		return $data;
	}

	public function Simpan($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function GetWhere($table, $data)
	{
    $res=$this->db->get_where($table, $data);
    return $res->result_array();
	}
	

	
	function update_distributor($data){
    	$this->db->where('id_distributor',$data['id_distributor']);
    	$this->db->update('master_distributor',$data);

    }

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}
		
	//-------------------ambil data judul dept---------------------------------------
	public function GetJd()
	{
		$datas = $this->db->query('select * from tb_jenis_pekerjaan ');
		return $datas;
	}
	
	public function Get_dd_tipe()
	{
		$datas = $this->db->query('select * from master_tipe_produk ');
		return $datas;
	}
	
	public function Get_dd_jenis_pekerjaan()
	{
		$datas = $this->db->query('select * from tb_jenis_pekerjaan ');
		return $datas;
	}
	
	public function Get_dd_sub_jenis_pekerjaan()
	{
		$datas = $this->db->query('select * from tb_sub_jenis_pekerjaan ');
		return $datas;
	}
	
   public function GetEdit($tables, $datas)
		{
		$res=$this->db->get_where($tables, $datas);
		return $res->result_array();
		}
	

	public function AmbilDataEva($where= "") {

        $data = $this->db->query('select * from tb_jenis_pekerjaan '.$where);
		return $data;
    }

	// function UpdateJd($datas)
	// 	{
 //    	$this->db->where('id_eva',$datas['id_eva']);
 //    	$this->db->update('dtb_evapekrek',$datas);
	// 	}
		
	//ambil data untuk print
	public function GetId()
	{
		$datas = $this->db->query('select DISTINCT id_jenis_pekerjaan from tb_jenis_pekerjaan order by id_jenis_pekerjaan asc');
		return $datas;
	}
	

}
