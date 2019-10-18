<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jenis_brg extends CI_Model {



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
	
	
		
	function update_jnsbarang($data){
    	$this->db->where('id_jns_brg',$data['id_jns_brg']);
    	$this->db->update('tb_jenis_brg',$data);

    }
	
	
		
	public function Simpanjenis($data)
	{
		$this->db->insert('tb_jenis_pekerjaan', $data);
	}

	public function Simpanjns_brg($data)
	{
		$this->db->insert('tb_jenis_brg', $data);
	}
	
		
	function deleteData($table,$data)
    {
        $this->db->delete($table,$data);
    }

	function code_otomatis()
	
	{
            $this->db->select('Right(tb_jenis_brg.kd_jns_brg, 3) as kode ',false);
            $this->db->order_by('id_jns_brg', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('tb_jenis_brg');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
            $kodejadi  = "KJBR-".$kodemax;
            return $kodejadi;

        }
	
	//ambil data description
	
	
	public function GetJenis_Barang($where= "")
	{
		$data = $this->db->query('select * from tb_jenis_brg '.$where);
		return $data;
	}	

	public function GetJenis_Barangview($where= "")
	{
		$data = $this->db->query('SELECT
                                    a.id_jns_brg,
                                    a.kd_jns_brg,
                                    a.jns_barang,
                                    a.tipe,
                                    b.tipe_produk
		                          from tb_jenis_brg a
                                  left join master_tipe_produk b on a.tipe=b.id_tipe_produk
		                           '.$where);
		return $data;
	}			
	
	public function Simpan($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}
		
		
	public function Get_dd_tipe()
	{
		$datas = $this->db->query('select * from master_tipe_produk ');
		return $datas;
	}
	
	public function Get_dd_jenis_brg()
	{
		$datas = $this->db->query('select * from master_tipe_produk ');
		return $datas;
	}
	
			
   public function GetEdit($tables, $datas)
		{
		$res=$this->db->get_where($tables, $datas);
		return $res->result_array();
		}
	
	
	
	

}
