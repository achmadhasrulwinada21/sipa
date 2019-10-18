<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_po extends CI_Model {

var $table = 'v_pohead'; 
var $table2 = 'v_poheaddirrs'; 
    var $column_order = array('tglpo','nopo','jumlah','grand_total_var','nm_acc','namars','nm_perusahaan','catatan');
    var $column_search = array('tglpo','nopo','grand_total_var','nm_acc','namars','nm_perusahaan');
    var $order = array('nopo' => 'desc');

  public function __construct()
  {
    parent::__construct();
    
  }
 

  private function _get_datatables_queryalkes()
  {
    $koders = ($this->session->userdata('koders'));
    $ynwa = ($this->session->userdata('koderole'));
          if($ynwa!='10'  and $ynwa!='17' and $ynwa!='77' and $ynwa!='83' and $ynwa!='84' and $ynwa!='85' and $ynwa!='86' and $ynwa!='87' and $ynwa!='57' and $ynwa!='82'):
    $this->db->from($this->table); 
     $this->db->where('koders',$koders);
   endif;

    $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='57'):
    $this->db->from($this->table); 
    // $this->db->where('koders',$koders);
    $this->db->where('grand_total >','5000000');
    $this->db->where('nm_acc','Disetujui Manager RS');
   endif;

    $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='82'):
    $this->db->from($this->table); 
    // $this->db->where('koders',$koders);
    $this->db->where('grand_total >','5000000');
    $this->db->where('nm_acc','Disetujui Kadep Jangmed');
   endif;

    $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='77'):
    $this->db->from($this->table2); 
    $this->db->where('koders',$koders);
    // $this->db->where('nm_acc','Disetujui Kadep Jangmed');
   endif;

    $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='83' || $ynwa=='84' || $ynwa=='85' || $ynwa=='86' || $ynwa=='87'):
    $this->db->from($this->table); 
      $this->db->where('grand_total >=','10000000');
     $this->db->where('nm_acc','Disetujui Direktur RS');
   endif;

 $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='10'):
    $this->db->from($this->table);    
    $this->db->where('nm_acc','Disetujui Direktur Regional');
    $this->db->where('grand_total >=','50000000');   
endif;
$ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='17'):
    $this->db->from($this->table);    
     $this->db->where('grand_total >=','500000000');
    $this->db->where('nm_acc','Disetujui Direktur Ops & Umum');
endif;
    foreach ($this->column_search as $item) // loop column 
    {
      if($_POST["search"]["value"])  
            {  
                   $post=($_POST["search"]["value"]);
                   
                 $this->db->or_like("tglpo", $post);
                  $this->db->or_like("nopo", $post);
                $this->db->or_like("grand_total_var", $post);
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
           $this->db->from('v_pohead');
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

  function get_data_barang_PO21($wisnu){
    $rs=$this->session->userdata('koders');
    $hsl=$this->db->query("SELECT * FROM ongkir_po WHERE kode_produk='$wisnu' and(kode_ongkir='$rs' or koders='$rs')");
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'kode_produk' => $data->kode_produk,
          'nama_produk' => $data->nama_produk,
          'harga_akhir_baru'=>$data->harga_akhir_baru,
          'biaya_kirim'=>$data->biaya_kirim,
          'includeongkir'=>$data->includeongkir,
          'biaya_ongkir'=>$data->biaya_ongkir,      
        );
      }
    }
    return $hasil;
  }

 
  
  function get_data_lokasi_PO($dara91){
    $hsl=$this->db->query("SELECT * FROM master_lokasi WHERE kode_lokasi='$dara91'");
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'kode_lokasi' => $data->kode_lokasi,
          'nm_lokasi' => $data->nm_lokasi,      
        );
      }
    }
    return $hasil;
  }
      
  function getBarangALKESPO($koper){
     $rs=$this->session->userdata('koders');
        return $this->db->query("SELECT DISTINCT kode_produk, nama_produk,koper FROM ongkir_po where statuslist_detil='live' and stsproduk_detil='aktif' and koper='$koper' and(kode_ongkir='$rs' or koders='$rs') and flag_ongkir='1' order by kode_produk asc")->result();
    }
  
  public function getSelectedData($table,$data)
    {
        return $this->db->get_where($table, $data);
    }
  
public function viewpo($where= "")
  {
    $data = $this->db->query('SELECT * from v_pohead ' .$where);
    return $data;
  }

  public function masterttd($where= "")
  {
    $data = $this->db->query('SELECT * from master_ttd ' .$where);
    return $data;
  }

   public function lokasi($where= "")
  {
    $data = $this->db->query('SELECT * from master_lokasi ' .$where);
    return $data;
  }

   function getDataPenjualan($id){
        return $this->db->query("SELECT * from v_pohead
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
                select a.kode_produk,b.nama_produk,a.jumlah,a.hargaakhir,a.harga,b.merk,a.k_nopo,a.idpodtl,c.nm_lokasi,a.peruntukan,a.status_pengajuan,a.tgtjml_guna_perbulan,a.trf_perguna,e.koper, a.ongkir, a.includeongkir
                from podetail a
                left join master_produk b on a.kode_produk=b.kode_produk
                left join master_lokasi c on a.peruntukan=c.kode_lokasi
                left join poheader e on a.k_nopo=e.k_nopo
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

    function Updatehead($data){
        $this->db->where('k_nopo',$data['k_nopo']);
        $this->db->update('poheader',$data);

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
  
  function v_podetil($id){
        return $this->db->query("
                select a.kode_produk,b.nama_produk,a.jumlah,a.hargaakhir,a.harga,b.merk,a.k_nopo,a.idpodtl
                from podetail a
                left join master_produk b on a.kode_produk=b.kode_produk")->result();
    }

    function view_alkes_final($id){
        return $this->db->query("select * from v_rralkes_detail where koper='$id'")->result();
    }

    function Updatedetilpo($data){
        $this->db->where('idpodtl',$data['idpodtl']);
        $this->db->update('podetail',$data);

    }

}
