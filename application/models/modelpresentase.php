<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modelpresentase extends CI_Model {



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
	
	function update_presentase($data){
    	$this->db->where('id_presentase',$data['id_presentase']);
    	$this->db->update('master_presentase',$data);

    }
	
	
	public function Simpan_db1($data)
	{
		$this->db->insert('master_presentase', $data);
	}
	
	function deleteData($table,$data)
    {
        $this->db->delete($table,$data);
    }

	function code_otomatis()
	
	{
            $this->db->select('Right(master_presentase.kode_presentase, 4) as kode ',false);
            $this->db->order_by('id_presentase', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('master_presentase');
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
		$data = $this->db->query('select * from master_presentase '.$where);
		return $data;
	}

	public function Getdetaileva($where="")
	{
		$data = $this->db->query('select * from master_presentase '.$where);
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
	
	function Updatepresentase($data){
    	$this->db->where('id_presentase',$data['id_presentase']);
    	$this->db->update('master_presentase',$data);

    }

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}
		
	//-------------------ambil data judul dept---------------------------------------
	public function GetJd()
	{
		$datas = $this->db->query('select * from master_presentase ');
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

        $data = $this->db->query('select * from master_presentase '.$where);
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
		$datas = $this->db->query('select DISTINCT id_presentase from master_presentase order by id_presentase asc');
		return $datas;
	}
	

}
