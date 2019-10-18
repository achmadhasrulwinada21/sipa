<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ebitdam extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	
		
	function get_namars_bykode($koders){
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

	function get_bulan_bykode($kodebulan){
		$hsl=$this->db->query("SELECT * FROM masterbulan WHERE kodebulan='$kodebulan'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'kodebulan' => $data->kodebulan,
					'namabulan' => $data->namabulan,
								
					);
			}
		}
		return $hasil;
	}

	function get_target_bykode($idtarebit){
		$hsl=$this->db->query("SELECT * FROM tb_det_ebittar WHERE idtarebit='$idtarebit'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'idtarebit' => $data->idtarebit,
					'kodebulan' => $data->kodebulan,
					'namabulan' => $data->namabulan,
					'nilai_target' => $data->nilai_target,			
					);
			}
		}
		return $hasil;
	}
	

public function Getrs($where= "")
	{
		$data = $this->db->query('select *  from hrd_mst_rs '.$where);
		return $data;
	}
	
 public function Getebitda($where= "")
	{
		$data = $this->db->query('select *  from tb_head_ebitda '.$where);
		return $data;
	}

	public function Simpanhead($data)
	{
		// return $this->db->insert($table, $data);
		$this->db->insert('tb_head_ebitda', $data);
	}

	public function Simpantarget($data)
	{
		// return $this->db->insert($table, $data);
		$this->db->insert('tb_det_ebittar', $data);
	}

	public function Simpannilai($data)
	{
		// return $this->db->insert($table, $data);
		$this->db->insert('tb_det_nilebit', $data);
	}

	public function Getbulan($where= "")
	{
		$data = $this->db->query('select *  from masterbulan '.$where);
		return $data;
	}

		 public function Ambiltarget($where= "")
	{
		$data = $this->db->query('select *  from tb_det_ebittar '.$where);
		return $data;
	}

	public function Ambilnilai($where= "")
	{
		$data = $this->db->query('select *  from tb_det_nilebit '.$where);
		return $data;
	}



public function Getviewebitdatri($where= "")
	{
		$data = $this->db->query('select *  from v_ebitda_triwulan '.$where);
		return $data;
	}

	public function Getviewebitdatahun($where= "")
	{
		$data = $this->db->query('select *  from v_ebitda_tahun '.$where);
		return $data;
	}

public function Getviewebitdabulan($where= "")
	{
		$data = $this->db->query('select *  from v_ebitda_bulan '.$where);
		return $data;
	}

	public function GetChart($where= "")
	{
		$data = $this->db->query('select *  from v_ebitda_bulan '.$where);
		return $data;
	}

	public function GetChart1($where= "")
	{
		$data = $this->db->query('select *  from v_ebitda_triwulan '.$where);
		return $data;
	}

	public function GetChart2($where= "")
	{
		$data = $this->db->query('select *  from v_ebitda_tahun '.$where);
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
    	$this->db->where('idnilebit',$data['idnilebit']);
    	$this->db->update('tb_det_nilebit',$data);

    }

    function Updateebitda($data){
    	$this->db->where('idebitda',$data['idebitda']);
    	$this->db->update('tb_head_ebitda',$data);

    }

  
    function Updaterencana($data){
    	$this->db->where('idtarebit',$data['idtarebit']);
    	$this->db->update('tb_det_ebittar',$data);

    }

    
    function Updaterealss($data){
    	$this->db->where('idnilebit',$data['idnilebit']);
    	$this->db->update('tb_det_nilebit',$data);

    }

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}
	

	function code_otomatis(){
    	$this->db->select('Right(tb_head_ebitda.kode_ebitda,5)as kode ',false);
    	$this->db->order_by('idebitda','desc');
    	$this->db->limit(1);
    	$query=$this->db->get('tb_head_ebitda');
    	if($query->num_rows()<>0){
    		$data=$query->row();
    		$kode=intval($data->kode)+1;
    	}else{
    		$kode=1;
    	}
           $dt = new DateTime();
          date_default_timezone_set("Asia/Jakarta");
           $waktu =date('Ymd');
          $kodemax=str_pad($kode,5,"0",STR_PAD_LEFT);
          $kodejadi="/EB/".$kodemax;
          return $waktu.$kodejadi;

    }
	
	
}