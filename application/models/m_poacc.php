<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_poacc extends CI_Model {

var $table = 'accpoheadview'; 
    var $column_order = array('tglpenerimaan','nopo','jumlah','nm_app','namars','nm_perusahaan','catatan');
    var $column_search = array('tglpenerimaan','nopo','nm_app','namars','nm_perusahaan');
    var $order = array('nopo' => 'desc');

	public function __construct()
	{
		parent::__construct();
		
	}
 

	private function _get_datatables_queryalkes()
	{

     
		$koders = ($this->session->userdata('koders'));
    $ynwa = ($this->session->userdata('koderole'));
          if($ynwa!='77' and $ynwa!='81'):
    $this->db->from($this->table); 
    $this->db->where('koders',$koders);
    endif;

    $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='81'):
    $this->db->from($this->table); 
    $this->db->where('koders',$koders);
    $this->db->where('nm_app','menunggu approve');
   endif;

    $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='77'):
    $this->db->from($this->table); 
    $this->db->where('koders',$koders);
    $this->db->where('nm_app','Disetujui Manager RS');
   endif;

		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST["search"]["value"])  
            {  
                   $post=($_POST["search"]["value"]);
                   
                 $this->db->or_like("tglpenerimaan", $post);
                $this->db->or_like("nopo", $post);
                 $this->db->or_like("nm_acc", $post);
                $this->db->or_like("namars", $post);
                $this->db->or_like("nm_perusahaan", $post);                

            }  
			
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

    function get_datatablesalkes()
    {
        $this->_get_datatables_queryalkes();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

   
       function count_filteredalkes()
    {
        $this->_get_datatables_queryalkes();
        $query = $this->db->get();
        return $query->num_rows();
    }

  public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
	
	public function getAllalkes() {
           $this->db->select('*');
           $this->db->from('accpoheadview');
           $this->db->order_by('nopo','DESC');
           $data = $this->db->get();
           return $data->result();
      }
	
	function get_data_perush_PO($koper){
		$hsl=$this->db->query("SELECT * FROM master_perusahaan WHERE koper='$koper'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'koper' => $data->koper,
					'nm_perusahaan' => $data->nm_perusahaan,
					's_alamat' => $data->s_alamat,
					's_telp' => $data->s_telp,
					's_fax' => $data->s_fax,
					's_kontak' => $data->s_kontak,
					's_email' => $data->s_email,
					
				
			
					);
			}
		}
		return $hasil;
	}

  function get_data_barang_PO($dara22){
    $hsl=$this->db->query("SELECT * FROM view_alkes_final WHERE kode_produk='$dara22'");
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'kode_produk' => $data->kode_produk,
          'total' => $data->total,      
        );
      }
    }
    return $hasil;
  }
	
	    
	function getBarangALKESPO($koper){
        return $this->db->query ("SELECT DISTINCT kode_produk, nama_produk,koper FROM view_alkes_final where tipe_produk='ALKES' and koper='$koper' order by kode_produk asc")->result();
    }
	
	public function getSelectedData($table,$data)
    {
        return $this->db->get_where($table, $data);
    }
	
public function viewpo($where= "")
  {
    $data = $this->db->query('SELECT * FROM v_poditerima ' .$where);
    return $data;
  }
  
  public function viewpoacc($where= "")
  {
    $data = $this->db->query('SELECT * FROM accpoheadview ' .$where);
    return $data;
  }

  function v_podetil($id){
        return $this->db->query("
                select a.kode_produk,b.nama_produk,a.jumlah,a.hargaakhir,a.harga,b.merk,a.k_nopo,a.idpodtl
                from podetail a
                left join master_produk b on a.kode_produk=b.kode_produk")->result();
    }

    function view_alkes_final($id){
        return $this->db->query("select * from view_alkes_final")->result();
    }

    public function lokasi($where= "")
  {
    $data = $this->db->query('SELECT * from master_lokasi ' .$where);
    return $data;
  }

  public function masterttd($where= "")
  {
    $data = $this->db->query('SELECT * from master_ttd ' .$where);
    return $data;
  }

	 function getDataPenjualan($id){
        return $this->db->query("SELECT * from v_pohead
                where k_nopo = '$id'")->result();
    }

    function getDataPenjualan21($id){
        return $this->db->query("SELECT * from accpoheadview
                where k_nopo = '$id'")->result();
    }

    function getDataPenjualan1($k_nopo){
        return $this->db->query("SELECT * from v_pohead
                where k_nopo = '$k_nopo'")->result();
    }


    function v_user($koders){
        return $this->db->query("SELECT distinct email,koders from v_user
                where koders = '$koders' and email <>''")->result();
    }

    function getBarangPenjualan($id){
        return $this->db->query("
                select a.kode_produk,b.nama_produk,a.jumlah,a.hargaakhir,a.harga,b.merk,a.k_nopo,a.idpodtl,
                c.nm_lokasi,a.peruntukan,a.status_pengajuan,a.nopo
                from podetail a
                left join master_produk b on a.kode_produk=b.kode_produk
                left join master_lokasi c on a.peruntukan=c.kode_lokasi
                where a.k_nopo = '$id'")->result();
    }


    function getBarangPenjualan21($id){
        return $this->db->query("
               select a.kode_produk,b.nama_produk,a.jumlah,a.harga,b.merk,a.k_nopo,a.idpodtlacc,
                c.nm_lokasi,a.peruntukan,a.status_pengajuan,a.nopo,a.jumlahacc,(a.harga*a.jumlahacc) as subtotal2
                from accpodetail a
                left join master_produk b on a.kode_produk=b.kode_produk
                left join master_lokasi c on a.peruntukan=c.kode_lokasi
                where a.k_nopo = '$id'")->result();
    }

     function getBarangPenjualan2($k_nopo){
        return $this->db->query("
                select a.kode_produk,b.nama_produk,a.jumlah,a.hargaakhir,a.harga,b.merk
                from podetail a
                left join master_produk b on a.kode_produk=b.kode_produk
                where a.k_nopo = '$k_nopo'")->result();
    }
	
	
	public function GetKode_Perush_POalkes($where= "")
	{
		$data = $this->db->query('select DISTINCT koper,nm_perusahaan,id_tipe_produk, s_alamat from master_perusahaan ' .$where);
		return $data;
	}
	
  public function Hapus($table,$where){
    return $this->db->delete($table,$where);
  }
	
	function deleteData($table,$data)
    {
        $this->db->delete($table,$data);
    }

    function Updateuppo($data){
      $this->db->where('k_nopo',$data['k_nopo']);
      $this->db->update('poheader',$data);

    }

function Updateapp($data){
        $this->db->where('k_nopo',$data['k_nopo']);
        $this->db->update('poheader',$data);

    }

function Updatedetilpo($data){
        $this->db->where('idpodtlacc',$data['idpodtlacc']);
        $this->db->update('accpodetail',$data);

    }

    function Updatehead($data){
        $this->db->where('k_nopo',$data['k_nopo']);
        $this->db->update('poheader',$data);

    }

    function uul($dataannisa){
        $this->db->where('k_nopo',$dataannisa['k_nopo']);
        $this->db->update('accpoheader',$dataannisa);

    }

    public function Simpanall($table, $data)
  {
    return $this->db->insert_batch($table, $data);
  }

		
	function buat_kode(){
	$array_bln = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
	$bln = $array_bln[date('n')];
	$thn =date('Y');
	$nisa= ($this->session->userdata('nm_rs'));

      $this->db->select('Left(poheader.nopo,4)as kode ',false);
      $this->db->order_by('nopo','desc');
      $this->db->limit(1);
      $query=$this->db->get('poheader');
      if($query->num_rows()<>0){
        $data=$query->row();
        $kode=intval($data->kode)+1;
      }else{
        $kode=1;
      }

          $kodemax=str_pad($kode,4,"0",STR_PAD_LEFT);
          $kodejadi=$kodemax."/JANGMED/".$nisa."/".$bln."/".$thn;
          return $kodejadi;

    }
	

	function buat_koderelasi(){
	$array_bln = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
	$bln = $array_bln[date('n')];
	$thn =date('Y');
	$nisa= ($this->session->userdata('nm_rs'));

      $this->db->select('Left(poheader.k_nopo,4)as kode ',false);
      $this->db->order_by('k_nopo','desc');
      $this->db->limit(1);
      $query=$this->db->get('poheader');
      if($query->num_rows()<>0){
        $data=$query->row();
        $kode=intval($data->kode)+1;
      }else{
        $kode=1;
      }

          $kodemax=str_pad($kode,4,"0",STR_PAD_LEFT);
          $kodejadi=$kodemax."JANGMED".$nisa.$bln.$thn;
          return $kodejadi;

    }
	
	function insertData($table,$data)
    {
        $this->db->insert($table,$data);
    }
	
	function updateData($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }
	

}
