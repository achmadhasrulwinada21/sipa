<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mptprinsip extends CI_Model {



	public function __construct()
	{
		parent::__construct();

		$this->db2 = $this->load->database('uul', TRUE);
		
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
	   
	   public function Simpan_db1($data)
	{
		$this->db->insert('master_pt', $data);
	}

	public function Simpanalum_db1($data)
	{
		$this->db->insert('master_ptalum', $data);
	}

	public function Simpanalkes_db1($data)
	{
		$this->db->insert('master_ptalkes', $data);
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
	
	
	public function GetPrinsp_db1($where= "")
	{
		$data = $this->db->query('select * from master_pt ' .$where);
		return $data;
	}

	public function Getalum_db1($where= "")
	{
		$data = $this->db->query('select * from master_ptalum ' .$where);
		return $data;
	}

	public function Getalkes_db1($where= "")
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
	
	function get_data_pabrik_bykode_db2($pabrikid){
    $hsl=$this->db2->query("SELECT * FROM pabrikobat WHERE pabrikid='$pabrikid'");
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'pabrikid' => $data->pabrikid,
         'pabriknama' => $data->pabriknama,
             
        
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
	
	
	
	public function Del_GetItem_tampung($where= "")
	{
		$data = $this->db->query('delete * from tb_peng_header_tampung ' .$where);
		return $data;
	}


	public function Simpann_db1($table, $data)
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
	


	
	public function GetId()
	{
		$datas = $this->db->query('select DISTINCT id_perusahaan from master_perusahaan order by id_perusahaan asc');
		return $datas;
	}
	

}
