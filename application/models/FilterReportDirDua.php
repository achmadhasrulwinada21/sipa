<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FilterReportDirDua extends CI_Model {



	public function __construct()
	{
		parent::__construct();

	}

	private function _cek_login()
	{

	}

	
	public function Simpan($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function Update($table,$data,$where){
		return $this->db->update($table,$data,$where);
	}

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}	
	
	//ambil data untuk Edit
	
	public function GetFilterDirDua($table, $data)
	{
    $res=$this->db->get_where($table, $data);
    return $res->result_array();
	}
	
	public function GetEdit($tables, $datas)
	{
	$res=$this->db->get_where($tables, $datas);
	return $res->result_array();
	}
	
	function UpdatePktKerja($data){
    $this->db->where('idpktkrj',$data['idpktkrj']);
    $this->db->update('tb_paket_pekerjaan',$data);

    }


   


	
		public function GetRumahSakit($where= "")
	{
		$data = $this->db->query('select * from hrd_mst_rs '.$where);
		return $data;
	}


		public function GetNamaBarang($where= "")
	{
		$data = $this->db->query('select namabarang from v_assets '.$where);
		return $data;
	}



		public function GetTanggal($where= "")
	{
		$data = $this->db->query('select dt_buy  from v_assets '.$where);
		return $data;
	}
	


		public function GetTahun($where= "")
	{
		$data = $this->db->query('select year(dt_buy) as tahun  from v_assets '.$where);
		return $data;
	}
	


		public function GetBulan($where= "")
	{
		$data = $this->db->query('select month(dt_buy) as bulan from v_assets '.$where);
		return $data;
	}



		public function GetHarga($where= "")
	{
		$data = $this->db->query('select price from v_assets '.$where);
		return $data;
	}
	
	
		public function GetUsiaBarang($where= "")
	{
		$data = $this->db->query('select UsiaBarang from v_assets '.$where);
		return $data;
	}

	
		public function GetProsenPenyusutan($where= "")
	{
		$data = $this->db->query('select prosespenyusutan from v_assets '.$where);
		return $data;
	}


	
		public function GetDetailPktKerja($where= "")
	{
		$data = $this->db->query('select * from tb_paket_pekerjaan '.$where);
		return $data;

	}
	
	

	//ambil data untuk print
	public function Getnm()
	{
		$datas = $this->db->query ('select DISTINCT idpktkrj from tb_paket_pekerjaan order by idpktkrj asc');
		return $datas;
	}

		public function GetId()
	{
		$datas = $this->db->query("SELECT * FROM tb_paket_pekerjaan where idpktkrj = '$idpktkrj' LIMIT 1 ");
		return $datas;
	}
	
	
		public function Getcetakid($where="")
	{
		$data = $this->db->query('select DISTINCT koders, namars from paket_pekerjaan ');
		return $data;
	}
	
		public function GetAllDataAset()
	{
		$data = $this->db->query('select noref,namabarang,hargabarang,tanggalperolehan,bulan,tahun,usiabarang,cast(bebanpenyusutanperbulan as decimal) as bebanpenyusutanperbulan,akumulasibulanberjalan,nilaibukubulanberjalan,akumulasisatubulansebelumberjalan,nilaibukusatubulansebelumberjalan,statusbarang from kumpulanlaporanpenyusutanfixedassetsfinalreport ');
		return $data;
	}
	

		public function GetPaket($where= "") 
	{

        $data = $this->db->query('select DISTINCT nm_material from master_material ' .$where);
		return $data;
    }
	
		public function GetPaketS($where= "") 
	{

        $data = $this->db->query('select DISTINCT satuan from master_material ' .$where);
		return $data;
    }
	
	
	
	
	
	
	
}