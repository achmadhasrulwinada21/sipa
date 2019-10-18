<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Kinerja extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	function get_data_rs_bykode($koders){
		$hsl=$this->db->query("SELECT * FROM hrd_mst_rs WHERE koders='$koders'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'koders' => $data->koders,
					'namars' => $data->namars,
					
				);
			}
		}
		return $hasil;
	}

	public function AmbilChartKRS($where= "")
	{
		$data = $this->db->query('select * from tb_realkrs '.$where);
		return $data;
	}

// tbl_uraian
    public function GetUraianKRS()
	{
		$data = $this->db->query('select * from tb_uraiankrs ');
		if ($data->num_rows() > 0) 
    {
        return $data->result();//returns result in object format
    }
	}


	 public function AmbilUraianKRS($where= "")
	{
		$data = $this->db->query('select * from tb_uraiankrs '.$where);
		return $data;
	}

	

    public function GetId()
	{
		$datas = $this->db->query('select DISTINCT id_uraiankrs from tb_uraiankrs order by id_uraiankrs desc');
		return $datas;
	}
	

    
	public function Simpan($data)
	{
		// return $this->db->insert($table, $data);
		$this->db->insert_batch('tb_uraiankrs', $data);
	}

	function create($data) {
    $this->db->insert_batch('tb_uraiankrs', $data);
}

	public function GetWhere($table, $data)
	{
    $res=$this->db->get_where($table, $data);
    return $res->result_array();
	}
	
	function UpdateUraianKRS($data){
    	$this->db->where('id_uraiankrs',$data['id_uraiankrs']);
    	$this->db->update('tb_uraiankrs',$data);

    }

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}

	public function Hapusreal($table,$where){
		return $this->db->delete($table,$where);
	}

	public function Hapustarget($table,$where){
		return $this->db->delete($table,$where);
	}

	

	//tb_target
	    public function GetTargetKRS($where= "")
	{
		$data = $this->db->query('select * from tb_targetkrs '.$where);
		if ($data->num_rows() >= 0) 
    {
        return $data->result();//returns result in object format
    }
	}


	 public function AmbilTargetKRS($where= "")
	{
		$data = $this->db->query('select * from tb_targetkrs '.$where);
		return $data;
	}

	public function AmbilTarget2KRS($where= "")
	{
		$data = $this->db->query('select DISTINCT kode_rs, nama_rs, periode from tb_targetkrs '.$where);
		return $data;
	}

	public function GetRS($where= "")
	{
		$data = $this->db->query('select * from hrd_mst_rs '.$where);
		return $data;
	}


	

    public function GetIdT()
	{
		$datas = $this->db->query('select DISTINCT id_targetkrs from tb_targetkrs order by id_targetkrs desc');
		return $datas;
	}
	

    
	public function Simpantarget($data)
	{
		// return $this->db->insert($table, $data);
		$this->db->insert_batch('tb_targetkrs', $data);
	}

	
	function UpdateTargetKRS($data){
    	$this->db->where('id_targetkrs',$data['id_targetkrs']);
    	$this->db->update('tb_targetkrs',$data);

    }


	//tb_real
	    public function GetRealKRS()
	{
		$data = $this->db->query('select * from tb_realkrs ');
		return $data;
	}


	 public function AmbilRealKRS($where= "")
	{
		$data = $this->db->query('select * from tb_realkrs '.$where);
		return $data;
	}

	public function AmbilReal2KRS($where= "")
	{
		$data = $this->db->query('select DISTINCT tanggal, kode_rs from tb_realkrs '.$where);
		return $data;
	}


    public function GetIdR()
	{
		$datas = $this->db->query('select DISTINCT id_realkrs from tb_realkrs order by id_realkrs desc');
		return $datas;
	}
	

    
	public function Simpanreal($data)
	{
		// return $this->db->insert($table, $data);
		$this->db->insert_batch('tb_realkrs', $data);
	}

	
	function UpdateRealKRS($data){
    	$this->db->where('id_realkrs',$data['id_realkrs']);
    	$this->db->update('tb_realkrs',$data);

    }


    function searchs($keyword)
    {
        $this->db->like('nama_uraiankrs',$keyword);
         $query  =   $this->db->get('krs_all');
        return $query->result_array();
    }

     public function GetSumRealKRS($where= "")
	{
		$data = $this->db->query('select nama_uraiankrs,
		sum(cast(jtnt as decimal)) as jtn_t,
		sum(cast(jtnr as decimal)) as jtn_r,
		sum(cast(kmyrt as decimal)) as kmyr_t,
		sum(cast(kmyrr as decimal)) as kmyr_r,
		sum(cast(bkst as decimal)) as bks_t,
		sum(cast(bksr as decimal)) as bks_r,
		sum(cast(dpkt as decimal)) as dpk_t,
		sum(cast(dpkr as decimal)) as dpk_r,
		sum(cast(dmt as decimal)) as dm_t,
		sum(cast(dmr as decimal)) as dm_r,
		sum(cast(bgrt as decimal)) as bgr_t,
		sum(cast(bgrr as decimal)) as bgr_r,
		sum(cast(pstt as decimal)) as pst_t,
		sum(cast(pstr as decimal)) as pst_r,
		sum(cast(pdrnt as decimal)) as pdrn_t,
		sum(cast(pdrnr as decimal)) as pdrn_r,
		sum(cast(tprahut as decimal)) as tprahu_t,
		sum(cast(tprahur as decimal)) as tprahu_r,
		sum(cast(skbmt as decimal)) as skbm_t,
		sum(cast(skbmr as decimal)) as skbm_r,
		sum(cast(tgrt as decimal)) as tgr_t,
		sum(cast(tgrr as decimal)) as tgr_r,
		sum(cast(gwt as decimal)) as gw_t,
		sum(cast(gwr as decimal)) as gw_r,
		sum(cast(arcat as decimal)) as arca_t,
		sum(cast(arcar as decimal)) as arca_r,
		sum(cast(glxyt as decimal)) as glxy_t,
		sum(cast(glxyr as decimal)) as glxy_r,
		sum(cast(plbt as decimal)) as plb_t,
		sum(cast(plbr as decimal)) as plb_r,
		sum(cast(cptt as decimal)) as cpt_t,
		sum(cast(cptr as decimal)) as cpt_r,
		sum(cast(mkst as decimal)) as mks_t,
		sum(cast(mksr as decimal)) as mks_r,
		sum(cast(spgt as decimal)) as spg_t,
		sum(cast(spgr as decimal)) as spg_r,
		sum(cast(bymkt as decimal)) as bymk_t,
		sum(cast(bymkr as decimal)) as bymk_r,
		sum(cast(solot as decimal)) as solo_t,
		sum(cast(solor as decimal)) as solo_r,
		sum(cast(ciruast as decimal)) as ciruas_t,
		sum(cast(ciruasr as decimal)) as ciruas_r,
		sum(cast(yogyat as decimal)) as yogya_t,
		sum(cast(yogyar as decimal)) as yogya_r,
		sum(cast(bitungt as decimal)) as bitung_t,
		sum(cast(bitungr as decimal)) as bitung_r,
		sum(cast(mksrt as decimal)) as mksr_t,
		sum(cast(mksrr as decimal)) as mksr_r,
		sum(cast(blkppnt as decimal)) as blkppn_t,
		sum(cast(blkppnr as decimal)) as blkppn_r,
		sum(cast(mdnt as decimal)) as mdn_t,
		sum(cast(mdnr as decimal)) as mdn_r,
		sum(cast(pdmt as decimal)) as pdm_t,
		sum(cast(pdmr as decimal)) as pdm_r,
		sum(cast(pwtt as decimal)) as pwt_t,
		sum(cast(pwtr as decimal)) as pwt_r 


		from krs_all '.$where);
		return $data;

		
	}

}