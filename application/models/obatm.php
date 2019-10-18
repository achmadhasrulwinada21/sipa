<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class obatm extends CI_Model {



	public function __construct()
	{
		parent::__construct();

		$this->db2 = $this->load->database('uul', TRUE);
		
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
	
	 
	
	
	
	public function Getobats_db1($where= "")
	{
		$data = $this->db->query('select * from tb_obat ' .$where);
		return $data;
	}
	
	public function Getobat_db2($where= "")
	{
		$data = $this->db2->query('select * from mstobatrs ' .$where);
		return $data;
	}
	
	
	function get_data_pabrik_bykode_db2($obatid){
    $hsl=$this->db2->query("SELECT * FROM mstobatrs WHERE obatid='$obatid'");
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'obatid' => $data->obatid,
         'obatnama' => $data->obatnama,
             
        
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


	public function Simpan_db1($table, $data)
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

	public function Hapus_db1($table,$where){
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
