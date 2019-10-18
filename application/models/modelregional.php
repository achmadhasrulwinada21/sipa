<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modelregional extends CI_Model {



	public function __construct()
	{
		parent::__construct();
		
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
	
	function update_regional($data){
    	$this->db->where('id_regional',$data['id_regional']);
    	$this->db->update('master_regional',$data);

    }
	
	
	public function Simpan_db1($data)
	{
		$this->db->insert('master_regional', $data);
	}
	
	function deleteData($table,$data)
    {
        $this->db->delete($table,$data);
    }

	function code_otomatis()
	
	{
            $this->db->select('Right(master_regional.kode_regional, 4) as kode ',false);
            $this->db->order_by('id_regional', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('master_regional');
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
		$data = $this->db->query('select * from master_regional '.$where);
		return $data;
	}

	public function Getdetaileva($where="")
	{
		$data = $this->db->query('select * from master_regional '.$where);
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
	
	function Updateregional($data){
    	$this->db->where('id_regional',$data['id_regional']);
    	$this->db->update('master_regional',$data);

    }

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}
		
	//-------------------ambil data judul dept---------------------------------------
	public function GetJd()
	{
		$datas = $this->db->query('select * from master_regional ');
		return $datas;
	}
	
	public function Get_dd_tipe()
	{
		$datas = $this->db->query('select * from master_tipe_produk ');
		return $datas;
	}
	
   public function GetEdit($tables, $datas)
		{
		$res=$this->db->get_where($tables, $datas);
		return $res->result_array();
		}
	

	public function AmbilDataEva($where= "") {

        $data = $this->db->query('select * from master_regional '.$where);
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
		$datas = $this->db->query('select DISTINCT id_regional from master_regional order by id_regional asc');
		return $datas;
	}
	

}
