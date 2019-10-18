<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model {

	

	public function __construct()
	{
		parent::__construct();
		
	}

	//ambil data user
	function GetUser($data) {
        $query = $this->db->get_where('v_user', $data);
        return $query;
    }

    public function AmbilDataUser($where= "") {
      
        $data = $this->db->query('select * from usersipa '.$where);
		return $data;
    }


     public function ambildatatransaksieksdir($where= "") {
      
        $data = $this->db->query('select koders,periode from transaksi_uraian '.$where);
		return $data;
    }



    public function GetDataBpd($where= "") {
      

        $data = $this->db->query('select * from v_masterbpd '.$where);
		return $data;
    }

    public function GetDataStatus($where= "") {
      

        $data = $this->db->query('select * from masterstatustugas '.$where);
		return $data;
    }


    public function GetNavigasiMenu($where= "") {
      

        $data = $this->db->query('select * from v_hakaksesfullaplikasi  '.$where);
		return $data;
    }

    //ambil data role
	function GetRole2($data) {
        $query = $this->db->get_where('v_role', $data);
        return $query;
    }

    public function AmbilDataRole($where= "") {
      

        $data = $this->db->query('select * from master_role '.$where);
		return $data;
    }
    	public function GetRolee($where= "")

	{
		$data = $this->db->query('select * from master_role');
		return $data;
	}


	//ambil data tabel kategori
	public function GetKat($where= "")
	{
		$data = $this->db->query('select * from tb_kategori '.$where);
		return $data;
	}

	
	//ambil data tabel merk
	public function GetMerk($where= "")
	{
		$data = $this->db->query('select * from tb_merk '.$where);
		return $data;
	}

	
	public function AmbilDataMasterStpd($where= "") {
      

        $data = $this->db->query('select * from masterstpd '.$where);
		return $data;
    }


    public function AmbilDataMasterHoliday($where= "") {
      

        $data = $this->db->query('select * from master_holiday '.$where);
		return $data;
    }


       public function GetDataHoliday($where= "") {
      

        $data = $this->db->query('select * from master_holiday '.$where);
		return $data;
    }

       public function GetDataCountHoliday() {
      

        $data = $this->db->query('select * from v_countholiday ');
		return $data;
    }


    public function AmbilDataMasterBpd($where= "") {
      

        $data = $this->db->query('select * from masterbpd '.$where);
		return $data;
    }

    public function AmbilDataMasterTtd($where= "") {
      

        $data = $this->db->query('select * from master_ttd '.$where);
		return $data;
    }


	
//ambil data tabel transaksi
	public function GetTransaksiEksDirSatu($where= "")
	{
		$data = $this->db->query('select * from transaksi_uraian   '.$where);
		return $data;
	}


	public function GetTransaksiEksDirDua($where= "")
	{
		$data = $this->db->query('select * from transaksi_uraianeksdirdua   '.$where);
		return $data;
	}


		public function GetTransaksiRsAcuanHasmoro($where= "")
	{
		$data = $this->db->query('select * from transaksi_acuan_hasmoro   '.$where);
		return $data;
	}

	public function GetTotTransaksi()
	{
		$data = $this->db->query('select * from transaksi_uraian group by koders ');
		return $data;
	}

	public function GetDetailTransaksi($where = ""){
		return $this->db->query("select master_uraian.nama_uraian, transaksi_uraian.*  from transaksi_uraian inner join master_uraian on master_uraian.kd_uraian=transaksi.kd_uraian $where;");
	}
	
	public function count_all() {
		return $this->db->count_all('transaksi_uraian');
	}

	//ambil data dari 3 tabel
	public function GetTransaksiRs($where= "") {
    $data = $this->db->query('select * from v_transaksiuraian '.$where);
    return $data;
    } 




    public function GetTransaksiCabangRs($where= "") {
    $data = $this->db->query('select * from v_transaksiuraian '.$where);
    return $data;
    } 


    //ambil data dari 3 tabel
	public function GetTransaksiEksDirIICabangRs() {
    $data = $this->db->query('select * from v_transaksiuraianeksdirduajoin ');
    return $data;
    } 

    	public function GetTransaksiRsAcuan($where= "") {
    $data = $this->db->query('select * from v_transaksiuraianhasmoro '.$where);
    return $data;
    } 

    public function GetTransaksiRsAdministrator() {
    $data = $this->db->query('select * from v_transaksiuraianeksdirsatujoin ');
    return $data;
    } 



    public function GetTransaksiJoinEksDirSatu($where="") {

    $data = $this->db->query('select * from v_transaksiuraianeksdirsatujoin ' .$where);
    return $data;

    } 


     public function GetTransaksiJoinEksDirDua($where="") {

    $data = $this->db->query('select * from v_transaksiuraianeksdirduajoin ' .$where);
    return $data;

    } 

    public function GetTransaksiEksDirDuaRsAdministrator() {
    $data = $this->db->query('select * from v_transaksiuraianeksdirduajoin ');
    return $data;
    } 

     public function GetTransaksiEksDirAdministratorDetail($where="") {
    $data = $this->db->query('select * from v_transaksiuraian '.$where);
    return $data;
    } 



    public function GetTransaksiEksDirDuaRsAdministratorDetail($where="") {
    $data = $this->db->query('select * from v_transaksiuraianeksdirdua '.$where);
    return $data;
    } 


   

    public function GetTransaksiEksDirRsAdmin($where="") {
    $data = $this->db->query('select * from v_transaksiuraianeksdirsatujoin '.$where);
    return $data;
    } 



    public function GetTransaksiEksDirDuaRsAdmin($where="") {
    $data = $this->db->query('select * from v_transaksiuraianeksdirduajoin '.$where);
    return $data;
    } 


     
    public function GetTransaksiJoinEksDirAcuanSatu() {
    $data = $this->db->query('select * from v_transaksiuraianacuanhasmorojoin ');
    return $data;
    } 




       public function GetTransaksiRsAdministratorAcuan() {
    $data = $this->db->query('select * from v_transaksiuraianacuanhasmorojoin ');
    return $data;
    } 



       public function GetTransaksiEksDirAcuanAdministratorDetail($where="") {
    $data = $this->db->query('select * from v_transaksiuraianhasmoro '.$where);
    return $data;
    } 

 

     public function GetTransaksiRsAdmin($where= "") {
    $data = $this->db->query('select * from v_transaksiuraian '.$where);
    return $data;
    } 

      public function GetTransaksiRsAdminAcuan($where= "") {
    $data = $this->db->query('select * from v_transaksiuraianhasmoro '.$where);
    return $data;
    } 

   function UpdateTransaksi($data){
        $this->db->where('id_tr',$data['id_tr']);
        
        $this->db->update('transaksi_uraian',$data);
    }


      function updatedata($data,$where){
      	
        // $this->db->where('koders',$data['koders']);

        // $this->db->where('periode',$data['periode']);
        
        // $this->db->update('tb_dataall',$data);

        $data = $this->db->query('update from  tb_dataall set    '.$where);
		return $data;
    }


    function updatetransaksikeu($data){
        $this->db->where('id_trkeu',$data['id_trkeu']);
        
        $this->db->update('transaksi_keuangan',$data);
    }

	//ambil data tabel produk
	public function GetProduk($where= "")
	{
		$data = $this->db->query('select * from tb_produk '.$where);
		return $data;
	}

	public function GetTotProduk()
	{
		$data = $this->db->query('select * from tb_produk group by id_kat ');
		return $data;
	}

	public function GetDetailProduk($where = ""){
		return $this->db->query("select tb_merk.merk, tb_produk.*  from tb_produk inner join tb_merk on tb_merk.id_merk=tb_produk.id_merk $where;");
	}

	
	//ambil data dari 3 tabel
	public function GetProdukKatMerko($where= "") {
    $data = $this->db->query('SELECT p.*, q.kategori, c.merk
                                FROM tb_produk p
                                LEFT JOIN tb_kategori q
                                ON(p.id_kat = q.id_kat)
                                LEFT JOIN tb_merk c
                                ON(p.id_merk = c.id_merk)'.$where);
    return $data;
    }
	//ambil data tabel master uraian
	public function GetUraian($where= "")
	{
		$data = $this->db->query('select * from master_uraian');
		return $data;
	}

	//ambil data tabel master uraian keuangan
	public function GetUraianKeu($where= "")
	{
		$data = $this->db->query('select * from masteruraian_keu');
		return $data;
	}


	public function GetDataSTPD() {
    $data = $this->db->query('SELECT * FROM v_masterstpd');
    return $data;

    }




	public function GetCabang()
	{
		$query = $this->db->query('select koders,namars from hrd_mst_rs ');
		return $query;
	}


	public function GetDepartemenall()
	{
		$query = $this->db->query('select id_depar,nama_depar from master_departemen ');
		return $query;
	}


	public function AmbilDataStpd($where= "") {
      

        $data = $this->db->query('select * from masterstpd '.$where);
		return $data;
    }

    public function GetJBTN()
	{
		$query = $this->db->query('select jabatan,kodettd  from master_kode ');
		return $query;
	}

    public function GetRS()
	{
		$query = $this->db->query('select namars,koders  from hrd_mst_rs ');
		return $query;
	}


	public function GetRumahSakit($where= "")
	{
		$data = $this->db->query('select * from hrd_mst_rs '.$where);
		return $data;
	}

	public function Getmasteruraianeksdir()
	{
		$data = $this->db->query('SELECT nama_uraian FROM master_uraian order by kd_uraian desc ');
		return $data;
	}

	public function GetDepartemen($where= "")
	{
		$data = $this->db->query('select * from master_departemen '.$where);
		return $data;
	}

	// public function GetDepartemen($where= "")
	// {
	// 	$data = $this->db->query('select * from master_departemen '.$where);
	// 	return $data;
	// }


	public function GetStatusDoc()
	{
		$query = $this->db->query('select nama_statusdoc,kodestatusdoc  from master_statusdokumen ');
		return $query;
	}


	public function AmbilDataUraian($where= "") {
      

        $data = $this->db->query('select * from master_uraian '.$where);
		return $data;
    }

    public function AmbilDataUraianKeu($where= "") {
      

        $data = $this->db->query('select * from masteruraian_keu '.$where);
		return $data;
    }

    public function GetMasterRole()
	{
		$query = $this->db->query('select nama_role,koderole  from master_role ');
		return $query;
	}

	public function GetRole()
	{
		$query = $this->db->query('select nama_role,koderole  from master_role ');
		return $query;
	}


	// public function GetTotTransaksiKeuangan()
	// {
	// 	$data = $this->db->query('select * from transaksi_keuangan group by koders ');
	// 	return $data;
	// }

	// public function GetTotTransaksiKeu()
	// {
	// 	$data = $this->db->query('select * from transaksi_keuangan group by koders ');
	// 	return $data;
	// }

	// public function GetTotTransaksiKeuangan()
	// {
	// 	$data = $this->db->query('select * from transaksi_keuangan group by koders ');
	// 	return $data;
	// }

	// public function GetTotTransaksiKeu()
	// {
	// 	$data = $this->db->query('select * from transaksi_keuangan group by koders ');
	// 	return $data;
	// }

	// public function GetTotTransaksiKeu()
	// {
	// 	$data = $this->db->query('select * from transaksi_keuangan group by koders ');
	// 	return $data;
	// }

	// public function GetDetailTransaksiKeuangan($where = ""){
	// 	return $this->db->query("select masteruraian_keu.nama_uraian, transaksi_keuangan.*  from transaksi_keuangan inner join masteruraian_keu on masteruraian_keu.kd_uraian=transaksikeuangan.kd_uraian $where;");
	// }
	// public function GetDetailTransaksiKeuangan($where = ""){
	// 	return $this->db->query("select masteruraian_keu.nama_uraian, transaksi_keuangan.*  from transaksi_keuangan inner join masteruraian_keu on masteruraian_keu.kd_uraian=transaksikeuangan.kd_uraian $where;");
	// }

	// public function GetDetailTransaksiKeu($where = ""){
	// 	return $this->db->query("select masteruraian_keu.nama_uraian, transaksi_keuangan.*  from transaksi_keuangan inner join masteruraian_keu on masteruraian_keu.kd_uraian=transaksikeuangan.kd_uraian $where;");
	// }

	// public function GetDetailTransaksiKeuangan($where = ""){
	// 	return $this->db->query("select masteruraian_keu.nama_uraian, transaksi_keuangan.*  from transaksi_keuangan inner join masteruraian_keu on masteruraian_keu.kd_uraian=transaksikeuangan.kd_uraian $where;");
	// }

	// public function GetDetailTransaksiKeu($where = ""){
	// 	return $this->db->query("select masteruraian_keu.nama_uraian, transaksi_keuangan.*  from transaksi_keuangan inner join masteruraian_keu on masteruraian_keu.kd_uraian=transaksikeuangan.kd_uraian $where;");
	// }

	// public function GetDetailTransaksiKeuangan($where = ""){
	// 	return $this->db->query("select masteruraian_keu.nama_uraian, transaksi_keuangan.*  from transaksi_keuangan inner join masteruraian_keu on masteruraian_keu.kd_uraian=transaksikeuangan.kd_uraian $where;");
	// }
	// public function count_allKeu() {
	// 	return $this->db->count_allKeuangan('transaksi_keuangan');
	// }


	// public function count_allKeu() {
	// 	return $this->db->count_allKeuangan('transaksi_keuangan');
	// }


	// public function GetDetailTransaksiKeu($where = ""){
	// 	return $this->db->query("select masteruraian_keu.nama_uraian, transaksi_keuangan.*  from transaksi_keuangan inner join masteruraian_keu on masteruraian_keu.kd_uraian=transaksikeuangan.kd_uraian $where;");
	// }


	// public function count_allKeu() {
	// 	return $this->db->count_allKeuangan('transaksi_keuangan');
	// }

	//ambil data dari 3 tabel
	
	// public function GetTransaksiKeuanganRs($where= "") {
 //    $data = $this->db->query('SELECT p.*, q.namars, c.nama_uraian
 //                               FROM transaksi_keuangan p
 //                               LEFT JOIN hrd_mst_rs q
 //                               ON(p.koders = q.koders)
 //                               LEFT JOIN masteruraian_keu c
 //                               ON(p.kd_uraian = c.kd_uraian)'.$where);
 //    return $data;
 //    } 

	//batas crud da

    	//ambil data tabel transaksi


    public function GetTransaksiKeuRsAdministrator() {
    $data = $this->db->query('select * from v_transaksiuraiankeu ');
    return $data;
    } 


    public function GetTransaksiKeuRsAdmin() {
    $data = $this->db->query('select * from v_transaksiuraiankeu ');
    return $data;
    } 




	public function GetTransaksiKeuRs($where= "")
	{
		$data = $this->db->query('select * from v_transaksiuraiankeu '.$where);
		return $data;
	}


	public function GetTransaksiKeuAdmin()
	{
		$data = $this->db->query('select * from v_transaksiuraiankeu ');
		return $data;
	}



	public function GetTransaksiKeu($where="")
	{
		$data = $this->db->query('select * from transaksi_keuangan '.$where);
		return $data;
	}


	// public function GetTotTransaksiKeuangan()
	// {
	// 	$data = $this->db->query('select * from transaksi_keuangan group by koders ');
	// 	return $data;
	// }

	// public function GetTotTransaksiKeuangan()
	// {
	// 	$data = $this->db->query('select * from transaksi_keuangan group by koders ');
	// 	return $data;
	// }

	// public function GetTotTransaksiKeu()
	// {
	// 	$data = $this->db->query('select * from transaksi_keuangan group by koders ');
	// 	return $data;
	// }

	// public function GetDetailTransaksiKeuangan($where = ""){
	// 	return $this->db->query("select masteruraian_keu.nama_uraian, transaksi_keuangan.*  from transaksi_keuangan inner join masteruraian_keu on masteruraian_keu.kd_uraian=transaksikeuangan.kd_uraian $where;");
	// }

	// public function GetDetailTransaksiKeuangan($where = ""){
	// 	return $this->db->query("select masteruraian_keu.nama_uraian, transaksi_keuangan.*  from transaksi_keuangan inner join masteruraian_keu on masteruraian_keu.kd_uraian=transaksikeuangan.kd_uraian $where;");
	// }

	// public function GetDetailTransaksiKeu($where = ""){
	// 	return $this->db->query("select masteruraian_keu.nama_uraian, transaksi_keuangan.*  from transaksi_keuangan inner join masteruraian_keu on masteruraian_keu.kd_uraian=transaksikeuangan.kd_uraian $where;");
	// }

	// public function count_allKeu() {
	// 	return $this->db->count_allKeuangan('transaksi_keuangan');
	// }

	//ambil data dari 3 tabel
	//public function GetTransaksiKeuanganRs($where= "") {
    //$data = $this->db->query('SELECT p.*, q.namars, c.nama_uraian
      //                          FROM transaksi_keuangan p
        //                        LEFT JOIN hrd_mst_rs q
          //                      ON(p.koders = q.koders)
            //                    LEFT JOIN masteruraian_keu c
              //                  ON(p.kd_uraian = c.kd_uraian)'.$where);
    //return $data;
    //} 

// 	//batas crud da


// 	//batas crud data
	public function Simpan($table, $data){
		return $this->db->insert($table, $data);
	}

	public function SimpanBpd($table, $data){
		return $this->db->insert($table, $data);
	}

	public function Simpanmemo($table, $data){
		return $this->db->insert($table, $data);
	}

	public function Simpanreport($table, $data){
		return $this->db->insert($table, $data);
	}

	public function Update($table,$data,$where){
		return $this->db->update($table,$data,$where);
	}

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}


	public function Hapustransaksi($table,$where){
		return $this->db->delete($table,$where);
	}
	
	//untuk modal ambil no rek
	public function Getno_rek()
	{
		$datas = $this->db->query('select DISTINCT no_rek from inv_report order by no_rek asc');
		return $datas;
	}

	function UpdateProduk($data){
        $this->db->where('id_produk',$data['id_produk']);
        $this->db->update('tb_produk',$data);
    }

	function UpdateUraian($data){
        $this->db->where('id_uraian',$data['id_uraian']);
        $this->db->update('master_uraian',$data);
    }


    function UpdateRumahSakit($data){
        $this->db->where('koders',$data['koders']);
        $this->db->update('hrd_mst_rs',$data);
    }

    function UpdateUraianKeu($data){
        $this->db->where('id_uraian',$data['id_uraian']);
        $this->db->update('masteruraian_keu',$data);
    }

// 	//batas crud data

	public function UpdateUser($data){
		$this->db->where('u_id',$data['u_id']);
        $this->db->update('usersipa',$data);
	}

	public function UpdateRole($data){
		$this->db->where('idrole',$data['idrole']);
        $this->db->update('master_role',$data);
	}

	public function UpdateStpd($data){
		$this->db->where('id_stpd',$data['id_stpd']);
        $this->db->update('masterstpd',$data);
	}

	public function Updatestatustugas($data){
		$this->db->where('id_tugas',$data['id_tugas']);
        $this->db->update('masterstatustugas',$data);
	}

    public function GetDataUserAdministrator() {
    $data = $this->db->query('SELECT * FROM v_user');
    return $data;
    }

     public function GetDataUserAdmin($where="") {
    $data = $this->db->query('SELECT * FROM v_user '.$where);
    return $data;
    }

    public function GetDataUserManajer($where="") {
    $data = $this->db->query('select * from v_user '.$where);
    return $data;
    }

    //ambil data nama role
    public function GetDataRoleAdministrator2() {
    $data = $this->db->query('SELECT * FROM master_role');
    return $data;
    }

     public function GetDataRoleDepKeu($where="") {
    $data = $this->db->query('SELECT * FROM master_role' .$where);
    return $data;
    }

    public function GetDataRoleDepPem($where="") {
    $data = $this->db->query('SELECT * FROM master_role' .$where);
    return $data;
    }

    public function GetDataRoleDepIt($where="") {
    $data = $this->db->query('SELECT * FROM master_role'.$where);
    return $data;
    }

    public function GetDataRoleAdmin2($where="") {
    $data = $this->db->query('SELECT * FROM master_role'.$where);
    return $data;
    }

    public function GetDataRoleUser($where="") {
    $data = $this->db->query('SELECT * FROM master_role'.$where );
    return $data;
    }

    public function GetDataRoleDepBus($where="") {
    $data = $this->db->query('SELECT * FROM master_role'.$where);
    return $data;
    }

    public function GetDataRoleDepMark($where="") {
    $data = $this->db->query('SELECT * FROM master_role'.$where );
    return $data;
    }

    public function GetDataRoleDepLegal($where="") {
    $data = $this->db->query('SELECT * FROM master_role' );
    return $data;
    }

    //model untuk visitor/pengunjung
    function GetVisitor($where = ""){
		return $this->db->query("select * from tb_visitor $where");		
	}

	function GetProductView(){
		return $this->db->query("select sum(counter) as totalview from tb_produk where status = 'publish'");
	}
	//batas query pengunjung

	public function GetKate($where= "")
	{
		$data = $this->db->query('select count(*) as totalkategori from tb_kategori '.$where);
		return $data;
	}

	public function GetStat()
	{
		$query = $this->db->query('select id_status,nama_status  from master_status ');
		return $query;
	}

	
	public function UpdateBpdDinas($data){
		$this->db->where('id_bpd',$data['id_bpd']);
        $this->db->update('masterbpd',$data);
	}



	public function UpdateHoliday($data){
		
		$this->db->where('id_holiday',$data['id_holiday']);
        $this->db->update('master_holiday',$data);
	}



	function TotalKat(){
		return $this->db->query("select count(*) as totalkategori from tb_produk group by id_kat; ");
	}

	function TampilData($where =''){
     
    	$data = $this->db->query('select * from v_finaleksekutifreportgabungan  '.$where );
    
      return $data;
    }  

    // function TampilData1($where =''){
     
    // 	$data = $this->db->query('select * from laporanvar '.$where );
    
    //   return $data; 
    // }  

  
    function Sinkronisasi(){
     
    	$data = $this->db->query('select sp_getsemuadataall() ' );
    
      return $data;
    }  



       function Sinkronisasiacuan(){
     
    	$data = $this->db->query('select sp_getsemuadataall() ' );
    
      return $data;
    }  







    	public function SimpanDataTransaksi($data){
		// $this->db->where('id_bpd',$data['id_bpd']);
        $this->db->insert('transaksi_uraian',$data);
	}




    function Sinkronisasivar(){
     
    	$data = $this->db->query('select getsemuadata_var() ' );
    
      return $data;
    } 

    public function GetReport()
	{
		$data = $this->db->query('select * from eksekutifreport ');
		return $data;
	}

	public function GetDataReport($where = "")
	{
		$data = $this->db->query('select periode from eksekutifreport '.$where );
		return $data;
	}

	public function GetAllDataR()
	{
		$data = $this->db->query('select get_semuadataall()');
		return $data;
	}


	public function AmbilDataNota($where= "") {
      

        $data = $this->db->query('select * from notapembayaran '.$where);
		return $data;
    }

    public function GetNota($where= "")
	{
		$data = $this->db->query('select * from v_notapembayaran '.$where);
		return $data;
	}

    public function Simpannota($table, $data){
		return $this->db->insert($table, $data);
	}

	public function AmbilDataTTDMengetahui($where= "") {
        $data = $this->db->query('select * from master_ttd '.$where);
		return $data;
    }
    
	public function GetSupplier($where= "")
	{
		$data = $this->db->query('select * from master_supplier');
		return $data;
	}

	public function AmbilDataSupplier($where= "") {
      

        $data = $this->db->query('select * from master_supplier '.$where);
		return $data;
    }

    function UpdateSupplier($data){
        $this->db->where('id_supplier',$data['id_supplier']);
        $this->db->update('master_supplier',$data);
    }


	function UpdateDetail($data){
        $this->db->where('id_nota',$data['id_nota']);
        $this->db->update('detailnota',$data);
    }

    function UpdateNota($data){
        $this->db->where('id_trnota',$data['id_trnota']);
        $this->db->update('notapembayaran',$data);
    }

    public function AmbilDataDetail($where= "") {
      

        $data = $this->db->query('select * from detailnota '.$where);
		return $data;
    }

	public function GetMemo($where= "")

	{
		$data = $this->db->query('select * from inv_memo '.$where);
		return $data;
	}

    public function GetDetail($where= "")
	{
		$data = $this->db->query('select * from v_detailnota '.$where);
		return $data;
	}

	public function AmbilDataMemo($where= "") {

        $data = $this->db->query('select * from inv_memo '.$where);
		return $data;
    }
	
	function UpdateMemo($data){
        $this->db->where('id_memo',$data['id_memo']);
        $this->db->update('inv_memo',$data);
    }
	
	// untuk filter pdf memo
	//public function Getpemohon()
	//{
	//	$datas = $this->db->query('select DISTINCT untuk from inv_memo order by untuk asc');
	//	return $datas;
	//}
		
	
    public function GetInvoice($where= "")
	{
		$data = $this->db->query('select * from inv_data '.$where);
		return $data;
	}
	
	public function AmbilDataInvoice($where= "") {
      

        $data = $this->db->query('select * from inv_data '.$where);
		return $data;
    }
	
	function UpdateInvoice($data){
        $this->db->where('id_inv',$data['id_inv']);
        $this->db->update('inv_data',$data);

    }

    
       public function GetReportInv($where= ""){
		$data = $this->db->query('select * from inv_report '.$where);
		return $data;
	}
	
	public function AmbilDataReportInv($where= "") {
      

        $data = $this->db->query('select * from inv_report '.$where);
		return $data;
    }
	
	function UpdateReportInv($data){
        $this->db->where('id_invrep',$data['id_invrep']);
        $this->db->update('inv_report',$data);

    }
	
	public function AmbilDataFormulir($where= "") {
      

        $data = $this->db->query('select * from tbl_formulir '.$where);
		return $data;
    }
	
	public function AmbilDataDetailTransbarang($where= "") {
      

        $data = $this->db->query('select * from tbl_transbarang '.$where);
		return $data;
    }
	
	public function getsurat($where="")
	{
		
		$datas = $this->db->query('select * from v_transaksibpdpersonalia '.$where);
		return $datas;
	}
	
	public function getsurate($where="")
	{
		
		$datass = $this->db->query('select * from masterbpd '.$where);
		return $datass;
	}

	 public function GetStockOpname($where= "") {

    $data = $this->db->query('select * from tbl_sp');
    return $data;

    }

     public function AmbilDataStockOpname($where= "") {
      

        $data = $this->db->query('select * from tbl_sp '.$where);
		return $data;
    }

    function UpdateStockOpname($data){
        $this->db->where('id_sp',$data['id_sp']);
        $this->db->update('tbl_sp',$data);
    }

    public function GetIdStockOpname()
	{
		$datas = $this->db->query('select DISTINCT perihal from tbl_sp order by perihal asc');
		return $datas;
	}


	public function AmbilDataKode($where= "") {
      

        $data = $this->db->query('select * from master_kode '.$where);
		return $data;
    }

    public function GetKode($where= "")
	{
		$data = $this->db->query('select * from master_kode');
		return $data;
	}
    public function GetKode2($where= "")
	{
		$data = $this->db->query('select jabatan, kodee from master_kode');
		return $data;
	}

    public function Simpankode($table, $data){
		return $this->db->insert($table, $data);
	}

	function UpdateKode($data){
        $this->db->where('idkode',$data['idkode']);
        $this->db->update('master_kode',$data);
    }

    public function AmbilDataTtd($where= "") {
      

        $data = $this->db->query('select * from master_ttd '.$where);
		return $data;
    }

    public function GetTtd($where= "")
	{
		$data = $this->db->query('select * from v_ttd '.$where);
		return $data;
	}

    public function Simpanttd($table, $data){
		return $this->db->insert($table, $data);
	}

	function UpdateTtd($data){
        $this->db->where('idttd',$data['idttd']);
        $this->db->update('master_ttd',$data);
    }

function UpdateBank($data){
        $this->db->where('id_bank',$data['id_bank']);
        $this->db->update('master_bank',$data);
    }



    public function GetLampiranFixedAsset($where= "") {

    $data = $this->db->query('select * from tbl_lampiran');
    return $data;

    }

     public function AmbilLampiranFixedAsset($where= "") {
      

        $data = $this->db->query('select * from tbl_lampiran '.$where);
		return $data;
    }

    function UpdateLampiranFixedAsset($data){
        $this->db->where('id_sl',$data['id_sl']);
        $this->db->update('tbl_lampiran',$data);
    }


    public function GetIdLampiranFixedAsset()
	{
		$datas = $this->db->query('select DISTINCT no_sp from tbl_sp order by no_sp asc');
		return $datas;
	}
	
	public function GetBank($where= "")
	{
		$data = $this->db->query('select * from master_bank');
		return $data;
	}
	
	public function AmbilDataBank($where= "") {
      

        $data = $this->db->query('select * from master_bank '.$where);
		return $data;
    }
	
	
	
	public function GetPT()
	{
		$data = $this->db->query('select * from master_perusahaan');
		return $data;
	}
	
	public function GetNamaRS()
	{
		$data = $this->db->query('select * from hrd_mst_rs');
		return $data;
	}
	
	// buat print RKK
	public function GetRkk($where= "")
	{
		$data = $this->db->query('select * from v_rkk '.$where);
		return $data;
	}
	
	// buat print MEMO STPD
	public function GetMemoSTPD($where= "")
	{
		$data = $this->db->query('select * from v_rkk '.$where);
		return $data;
	}
	// buat profile
	public function Profile($where= "")
	{
		$data = $this->db->query('select * from v_usergroup '.$where);
		return $data;
	}

		public function tampilkaneksdirfilter($table, $data)
	{
		
    $res=$this->db->get_where($table, $data);
    return $res->result_array();
    }
}