<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mmprinsp extends CI_Model {



	public function __construct()
	{
		parent::__construct();

		$this->db2 = $this->load->database('uul', TRUE);
		
	}    
	
	
	// function get_data_barang_bykode($id_material)
	// {
		// $hsl=$this->db->query("SELECT * FROM master_material WHERE id_material='$id_material'");
		// if($hsl->num_rows()>0){
			// foreach ($hsl->result() as $data) {
				// $hasil=array(
					// 'id_material' => $data->id_material,
					// 'nm_material' => $data->nm_material,
					// 'harga' => $data->harga,
					// 'satuan' => $data->satuan,
					// );
			// }
		// }
		// return $hasil;
	// }
	
	// function get_data_barang_bykodevendor($nm_vendor){
		// $cek=$this->db->query("SELECT * FROM master_vendorlis WHERE nm_vendor='$nm_vendor'");
		// if($cek->num_rows()>0){
			// foreach ($cek->result() as $data) {
				// $hasil=array(
					// 'nm_vendor' => $data->nm_vendor,
					// 'alamat' => $data->alamat,
					// 'no_telp' => $data->no_telp,
					// 'kategori' => $data->kategori,
					// );
			// }
		// }
		// return $hasil;
	// }
	
	
	
	// public function getMaterial()
	
	// {
        // return $this->db->query ( " SELECT * from master_material where id_material > 0 " )->result();
    // }
	
	
	
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
    function deleteData_db1($table,$data)
    {
        $this->db->delete($table,$data);
    }
	   
	function manualQuery($q)
    {
        return $this->db->query($q);
    }
	   
	function insertData_db1($table, $data)
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
	
	
	 // public function get_kode_peng() 
	 // {
	  // $tahun = date("Y");
	  // $kode = 'TR';
	  // $query = $this->db->query("SELECT MAX(no_pengajuan) as max_id FROM tb_pengajuan"); 
	  // $row = $query->row_array();
	  // $max_id = $row['max_id']; 
	  // $max_id1 =(int) substr($max_id,9,5);
	  // $kode_mahasiswa = $max_id1 +1;
	  // $maxkode_mahasiswa = $kode.'-'.$tahun.'-'.sprintf("%04s",$kode_mahasiswa);
	  // return $maxkode_mahasiswa;
	 // }
	   	   
	   
	   
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
            $kodejadi  = "PR".$kodemax;
            return $kodejadi;

        }
	
	
	
	// public function getKodePenjualan()
    // {
        // $q = $this->db->query("select MAX(RIGHT(kd_penjualan,3)) as kd_max from tbl_penjualan_header");
        // $kd = "";
        // if($q->num_rows()>0)
        // {
            // foreach($q->result() as $k)
            // {
                // $tmp = ((int)$k->kd_max)+1;
                // $kd = sprintf("%03s", $tmp);
            // }
        // }
        // else
        // {
            // $kd = "001";
        // }
        // return "O-".$kd;
    // }
	
	
	
	
	
	// function get_no_invoice(){
		// $q = $this->db->query("SELECT MAX(RIGHT(no_pengajuan,4)) AS kd_max FROM tb_pengajuan WHERE DATE(tanggal)=CURDATE()");
        // $kd = "";
        // if($q->num_rows()>0){
            // foreach($q->result() as $k){
                // $tmp = ((int)$k->kd_max)+1;
                // $kd = sprintf("%04s", $tmp);
            // }
        // }else{
            // $kd = "0001";
        // }
        // date_default_timezone_set('Asia/Jakarta');
        // return date('dmy').$kd;
	// }
	

	//ambil data description
	// public function GetPengajuan($where= "")
	// {
		// $data = $this->db->query('select * from tb_pengajuan '.$where);
		// return $data;
	// }
	
	public function GetPrinsp_db1($where= "")
	{
		$data = $this->db->query('select * from tb_prinsipal ' .$where);
		return $data;
	}

	public function Getalum_db1($where= "")
	{
		$data = $this->db->query('select * from tb_alumdist ' .$where);
		return $data;
	}

	public function Getalkes_db1($where= "")
	{
		$data = $this->db->query('select * from tb_alkesdist ' .$where);
		return $data;
	}

	public function Save_db1($data)
	{
		$this->db->insert('tb_prinsipal', $data);
	}

	public function Savealum_db1($data)
	{
		$this->db->insert('tb_alumdist', $data);
	}

	public function Savealkes_db1($data)
	{
		$this->db->insert('tb_alkesdist', $data);
	}

	public function GetKodePrinsp_db1($where= "")
	{
		$data = $this->db->query('select * from master_pt ' .$where);
		return $data;
	}
	
	public function GetKodealum_db1($where= "")
	{
		$data = $this->db->query('select * from master_ptalum ' .$where);
		return $data;
	}

	public function GetKodealkes_db1($where= "")
	{
		$data = $this->db->query('select * from master_ptalkes ' .$where);
		return $data;
	}

	public function GetKodePrinsp_db2($where= "")
	{
		$data = $this->db2->query('select * from pabrikobat ' .$where);
		return $data;
	}

	public function Getskode_db2($where= "")
	{
		$data = $this->db->query('select * from supplier ' .$where);
		return $data;
	}
	
	function get_data_pabrik_bykode_db1($pabrikid){
    $hsl=$this->db->query("SELECT * FROM master_pt WHERE pabrikid='$pabrikid'");
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'pabrikid' => $data->pabrikid,
         'pabriknama' => $data->pabriknama,
         'nama_pt' => $data->nama_pt,
             
        
          );
      }
    }
    return $hasil;
  }

  function get_data_alum_bykode_db1($alumid){
    $hsl=$this->db->query("SELECT * FROM master_ptalum WHERE alumid='$alumid'");
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'alumid' => $data->alumid,
         'alumnama' => $data->alumnama,
         'pt_alum' => $data->pt_alum,
             
        
          );
      }
    }
    return $hasil;
  }

 function get_data_alkes_bykode_db1($alkesid){
    $hsl=$this->db->query("SELECT * FROM master_ptalkes WHERE alkesid='$alkesid'");
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'alkesid' => $data->alkesid,
         'alkesnama' => $data->alkesnama,
         'pt_alkes' => $data->pt_alkes,
             
        
          );
      }
    }
    return $hasil;
  }

  function get_data_suplier_bykode_db2($s_kode){
    $hsl=$this->db2->query("SELECT * FROM supplier WHERE s_kode='$s_kode'");
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          's_kode' => $data->s_kode,
         's_nama' => $data->s_nama,
             
        
          );
      }
    }
    return $hasil;
  }
	
	
	// public function GetItem_tampung($where= "")
	// {
		// $data = $this->db->query('select * from tb_peng_header_tampung ' .$where);
		// return $data;
	// }
	
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
    	$this->db->where('idprinsipal',$data['idprinsipal']);
    	$this->db->update('tb_prinsipal',$data);

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
