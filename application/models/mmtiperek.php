<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mmtiperek extends CI_Model {



	public function __construct()
	{
		parent::__construct();
		
	}    
	
	function search_inv($untuk){
        $this->db->like('untuk', $untuk , 'both');
        $this->db->order_by('untuk', 'ASC');
        $this->db->limit(10);
        return $this->db->get('inv_memo')->result();
    }

	function get_data_barang_bykodeR($id_memo){
		$hsl=$this->db->query("SELECT * FROM inv_memo WHERE id_memo='$id_memo'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'id_memo' => $data->id_memo,
					'untuk' => $data->untuk,
					//'harga' => $data->harga,
					//'satuan' => $data->satuan,
					);
			}
		}
		return $hasil;
	}
	
	function get_data_barang_bykode($id_material){
		$hsl=$this->db->query("SELECT * FROM master_material WHERE id_material='$id_material'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'id_material' => $data->id_material,
					'nm_material' => $data->nm_material,
					'harga' => $data->harga,
					'satuan' => $data->satuan,
					);
			}
		}
		return $hasil;
	}
	
	function get_data_barang_bykodevendor($nm_vendor){
		$cek=$this->db->query("SELECT * FROM master_vendorlis WHERE nm_vendor='$nm_vendor'");
		if($cek->num_rows()>0){
			foreach ($cek->result() as $data) {
				$hasil=array(
					'nm_vendor' => $data->nm_vendor,
					'alamat' => $data->alamat,
					'no_telp' => $data->no_telp,
					'kategori' => $data->kategori,
					);
			}
		}
		return $hasil;
	}
	
	
	
	public function getMaterial()
	
	{
        return $this->db->query ( " SELECT * from master_material where id_material > 0 " )->result();
    }
	
	
	
	public function GetPaket($where= "") 
	{

        $data = $this->db->query('select id_material,nm_material,satuan, harga from master_material ' .$where);
		return $data;
    }
	
	

    public function getSelectedData($table, $data)
    {
        return $this->db->get_where($table, $data);
    }
    function updateData($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }
    function deleteData($table,$data)
    {
        $this->db->delete($table,$data);
    }
	   
	function manualQuery($q)
    {
        return $this->db->query($q);
    }
	   
	function insertData($table, $data)
    {
        $this->db->insert($table, $data);
    }   
	   
	   
	function create(){
		$this->db->insert("tb_pengajuan",array("nm_material"=>""));
		return $this->db->insert_id();
	}


	function read(){
		$this->db->order_by("id_pengajuan","desc");
		$query=$this->db->get("tb_pengajuan");
		return $query->result_array();
	}


	function update_dua($id,$value,$modul){
		$this->db->where(array("id_pengajuan"=>$id));
		$this->db->update("tb_pengajuan",array($modul=>$value));
	}

	function delete($id){
		$this->db->where("id_pengajuan",$id);
		$this->db->delete("tb_pengajuan");
	}  
	   
	
	public function GetAllData($where="")
	{
		$data = $this->db->query('select * from master_material ' .$where);
		return $data;
	}
	
	
	 public function get_kode_peng() 
	 {
	  $tahun = date("Y");
	  $kode = 'TR';
	  $query = $this->db->query("SELECT MAX(no_pengajuan) as max_id FROM tb_pengajuan"); 
	  $row = $query->row_array();
	  $max_id = $row['max_id']; 
	  $max_id1 =(int) substr($max_id,9,5);
	  $kode_mahasiswa = $max_id1 +1;
	  $maxkode_mahasiswa = $kode.'-'.$tahun.'-'.sprintf("%04s",$kode_mahasiswa);
	  return $maxkode_mahasiswa;
	 }
	   	   
	   
	   
	function tampil_data()
    {
        $query= " SELECT DISTINCT nm_material FROM master_material ";
        return $this->db->query($query);
    }
	
	function code_otomatis()
	
	{
            $this->db->select('Right(master_tipe_rekanan.no_tipe_rekanan,3) as kode ',false);
            $this->db->order_by('id_tipe_rekanan', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('master_tipe_rekanan');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
            $kodejadi  = "TR".$kodemax;
            return $kodejadi;

        }
	
	
	
	public function getKodePenjualan()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_penjualan,3)) as kd_max from tbl_penjualan_header");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "O-".$kd;
    }
	
	
	
	
	
	function get_no_invoice(){
		$q = $this->db->query("SELECT MAX(RIGHT(no_pengajuan,4)) AS kd_max FROM tb_pengajuan WHERE DATE(tanggal)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('dmy').$kd;
	}
	

	//ambil data description
	public function GetPengajuan($where= "")
	{
		$data = $this->db->query('select * from tb_pengajuan '.$where);
		return $data;
	}
	
	public function GetTipeRek($where= "")
	{
		$data = $this->db->query('select * from master_tipe_rekanan ' .$where);
		return $data;
	}
	
	public function GetItem_tampung($where= "")
	{
		$data = $this->db->query('select * from tb_peng_header_tampung ' .$where);
		return $data;
	}
	
	public function Del_GetItem_tampung($where= "")
	{
		$data = $this->db->query('delete * from tb_peng_header_tampung ' .$where);
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
	
	function Update($data){
    	$this->db->where('id_pengajuan',$data['id_pengajuan']);
    	$this->db->update('tb_pengajuan',$data);

    }

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}
		
	//-------------------ambil data judul dept---------------------------------------
	
   public function GetEdit($tables, $datas)
		{
		$res=$this->db->get_where($tables, $datas);
		return $res->result_array();
		}
	


	// function UpdateJd($datas)
	// 	{
 //    	$this->db->where('id_eva',$datas['id_eva']);
 //    	$this->db->update('dtb_evapekrek',$datas);
	// 	}
		
	//ambil data untuk print
	public function GetId()
	{
		$datas = $this->db->query('select DISTINCT id_perusahaan from master_perusahaan order by id_perusahaan asc');
		return $datas;
	}
	

}
