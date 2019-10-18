    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Depbangtransaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('u_name')){
		$this->session->set_flashdata("alerts", "<div class='alerts alert-danger'><strong>Sesi Anda Telah Habis, Silahkan login kembali..</strong></div>");
			redirect('dashboard');

		}
	}

		
	function get_prinsipal()
		
	{
		$this->load->model('alkeskat');
		$koper=$this->input->post('koper');
		$data=$this->alkeskat->get_data_prinsipal_bykode($koper);
		echo json_encode($data);
		
	}

		
	function get_obatss()
		
	{
		$this->load->model('alkeskat');
		$obatid=$this->input->post('obatid');
		$data=$this->alkeskat->get_data_obats_bykode($obatid);
		echo json_encode($data);
		
	}

			
	public function index()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
		$rolesdara=($this->session->userdata('nama_role'));
        $data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
      if($rolesdara=='Direktur Operasional dan Umum'){
		$this->load->model('depbangkat'); 
		$this->load->model('produkom'); 
		$data['data_aprove'] = $this->depbangkat->Getaproveview("where status ='1' and id_tipe_produk='TP004' order by idtrcom desc")->result_array();
		 $data['data_reject'] = $this->depbangkat->Getaproveview("where  id_tipe_produk='TP003' order by idtrcom desc")->result_array();
		 $data['rs']= $this->depbangkat->Getrs()->result_array();
		 $data['prid'] = $this->depbangkat->code_otomatis();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('katdepbang/tr_depbang', $data);
	}elseif ($rolesdara=='Kepala Departemen Depbang'){
         $this->load->model('depbangkat'); 
		$this->load->model('produkom'); 
		$data['data_aprove'] = $this->depbangkat->Getaproveview("where status ='0' and id_tipe_produk='TP004' order by idtrcom desc")->result_array();
		 $data['data_reject'] = $this->depbangkat->Getaproveview("where  id_tipe_produk='TP004' order by idtrcom desc")->result_array();
		  $data['rs']= $this->depbangkat->Getrs()->result_array();
		  $data['prid'] = $this->depbangkat->code_otomatis();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('katdepbang/tr_depbang', $data);
	}elseif($rolesdara=='Manager Depbang'){
		 $this->load->model('depbangkat'); 
		$this->load->model('produkom'); 
		$data['data_aprove'] = $this->depbangkat->Getaproveview("where status is null and id_tipe_produk='TP004' order by idtrcom desc")->result_array();
		 $data['data_reject'] = $this->depbangkat->Getaproveview("where status ='4' and  id_tipe_produk='TP004' order by idtrcom desc")->result_array();
		  $data['rs']= $this->depbangkat->Getrs()->result_array();
		  $data['prid'] = $this->depbangkat->code_otomatis();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('katdepbang/tr_depbang', $data);
	}elseif($rolesdara=='Staff Depbang' || $rolesdara=='Administrator'){
		 $this->load->model('depbangkat'); 
		$this->load->model('produkom'); 
		$data['data_aprove'] = $this->depbangkat->Getaproveview("where status is null and id_tipe_produk='TP004' order by idtrcom desc")->result_array();
		 $data['data_reject'] = $this->depbangkat->Getaproveview("where status ='4' and  id_tipe_produk='TP004' order by idtrcom desc")->result_array();
		  $data['prid'] = $this->depbangkat->code_otomatis();
		   $data['rs']= $this->depbangkat->Getrs()->result_array();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('katdepbang/tr_depbang', $data);
	}else{
		 $this->load->model('depbangkat'); 
		$this->load->model('produkom'); 
		$data['data_aprove'] = $this->depbangkat->Getaprove("where status ='7' and id_tipe_produk='TP004' order by idtrcom desc")->result_array();
		$data['data_reject'] = $this->depbangkat->Getaproveview("where status ='7' and id_tipe_produk='TP004' order by tanggal desc")->result_array();
		 $data['prid'] = $this->depbangkat->code_otomatis();
		  $data['rs']= $this->depbangkat->Getrs()->result_array();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('katdepbang/tr_depbang', $data);
	}
}


function addtrdepbang($tgl,$kode_trans)
	{
		$this->load->model('depbangkat');
        $this->load->model('produkom'); 
        $data['trdep'] = $this->db->get_where('v_tr_print_compare',['kode_trans'=>$kode_trans])->row();
        $data['data_prod'] = $this->depbangkat->Getprodukm("order by idpr2 asc")->result_array();
		$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');                          
		$data['data_produko'] = $this->depbangkat->GetprodukV("where kode_trans='$kode_trans' and id_tipe_produk='TP004' order by idpr2 desc")->result_array();
		 $data['kode_pabrik']= $this->depbangkat->GetKodePrinsp("where id_tipe_produk='TP004' order by nm_perusahaan ASC")->result_array();
         $data['lok']= $this->depbangkat->Getlok()->result_array();
         $data['kode_pekerjaan']= $this->depbangkat->GetKodesubkerja("order by nm_sub_jenis_pekerjaan ASC")->result_array();
        $data['tipe_produk']= $this->depbangkat->Gettipe()->result_array();
		 
		$this->template->display('katdepbang/data_depbang', $data);
	}



	function cetakdepbang()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));

		$this->load->model('depbangkat'); 
		$this->load->model('produkom'); 
		$data['data_aprove'] = $this->depbangkat->Getaproveview("where status ='2' and id_tipe_produk='TP004' order by idtrcom desc")->result_array();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('katdepbang/v_depbang', $data);
	}

function lihattrdepbang($tgl,$kode_trans)
	{
		$this->load->model('depbangkat');
        $this->load->model('produkom'); 
        $data['tr'] = $this->db->get_where('v_tr_print_compare',['kode_trans'=>$kode_trans])->row();
        $data['data_prod'] = $this->depbangkat->Getprodukm("order by idpr2 asc")->result_array();
		$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');                          
		$data['data_produko'] = $this->depbangkat->GetprodukV("where tanggal_tr='$tgl' and kode_trans='$kode_trans' order by nm_perusahaan asc")->result_array();
        $data['kode_pabrik']= $this->depbangkat->GetKodePrinsp("where id_tipe_produk='TP004' order by nm_perusahaan ASC")->result_array();
        $data['kode_pekerjaan']= $this->depbangkat->GetKodesubkerja("order by nm_sub_jenis_pekerjaan ASC")->result_array();
        $data['tipe_produk']= $this->depbangkat->Gettipe()->result_array();
		 
		$this->template->display('katdepbang/lihatlap_depbang', $data);
	}

	function viewtrdepbang($tgl,$kode_trans)
	{
		$this->load->model('depbangkat');
        $this->load->model('produkom'); 
        $data['tr'] = $this->db->get_where('tr_print_compare',['kode_trans'=>$kode_trans])->row();
        $data['data_prod'] = $this->depbangkat->Getprodukm("order by idpr2 asc")->result_array();
		$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');                          
		$data['data_produko'] = $this->depbangkat->GetprodukV("where tanggal_tr='$tgl' and kode_trans='$kode_trans' order by nm_perusahaan asc")->result_array();
        $data['kode_pabrik']= $this->depbangkat->GetKodePrinsp("where id_tipe_produk='TP004' order by nm_perusahaan ASC")->result_array();
        	 
		$this->template->display('katdepbang/view_trdepbang', $data);
	}

	function adddetail($id)
	{
		$this->load->model('depbangkat');
		                          
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'prod' => $this->db->get_where('v_produkos2',['idpr2'=>$id])->row(),
			 'data_prods2' => $this->depbangkat->Getprodukmdet("where idpr2='$id'")->result_array(),
			 'depbang' => $this->depbangkat->Getobatcobauy("where tipe_produk='TP004' order by nama_produk desc")->result_array(),
			 );
		 
		$this->template->display('katdepbang/add_detildepbang', $data);
	}

   function savedata_aprovedepbang(){
		$this->load->model('depbangkat');
		
		$tanggal = $_POST['tanggal'];
		$kode_trans = $_POST['kode_trans'];
		$id_tipe_produk = $_POST['id_tipe_produk'];
		$koders = $_POST['koders'];		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	
                  $datatgl = $this->depbangkat->Getaprove("where tanggal='$tanggal' and id_tipe_produk='$id_tipe_produk' and koders='$koders'")->result_array();
		$data = array(	
			'tanggal'=>$tanggal,
			'kode_trans'=>$kode_trans,
			'id_tipe_produk'=>$id_tipe_produk,
			'koders'=>$koders,
			'createdate' => $waktusaatini,
			'createby' =>  $this->session->userdata('nama'),			
			);

		
		
		
		 $tgl = isset($datatgl[0]['tanggal']);
		 $tp = isset($datatgl[0]['id_tipe_produk']);
		 $rsk = isset($datatgl[0]['koders']);

		if($tgl==$tanggal && $tp==$id_tipe_produk && $rsk==$koders){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Tanggal tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'Depbangtransaksi');
		}else{
		 
		
		$result = $this->depbangkat->Simpanaprove($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'Depbangtransaksi');
		}
	}

	function savedatas(){
		$this->load->model('depbangkat');

		 $koper = $_POST['koper'];
		 $kode_sub_jenis_pekerjaan = $_POST['kode_sub_jenis_pekerjaan'];
		 $kode_trans = $_POST['kode_trans'];
		 $kodelokasi = $_POST['kodelokasi'];
		 $tipe_produk = $_POST['tipe_produk'];
		 $tanggal = $_POST['tanggal_tr'];
		 $koders = $_POST['koders'];
		 
          $datatgl = $this->depbangkat->Getproduk("where koper='$koper' and tanggal_tr='$tanggal' and kode_sub_jenis_pekerjaan='$kode_sub_jenis_pekerjaan'")->result_array();

		$data = array(	
			'id_tipe_produk' => $tipe_produk,
			'koper' => $koper,
			'kode_sub_jenis_pekerjaan' => $kode_sub_jenis_pekerjaan,
			'tanggal_tr' => $tanggal,
			'kodelokasi' => $kodelokasi,
			'koders' => $koders,
			'kode_trans' => $kode_trans,
			'createby' =>  $this->session->userdata('nama'),			
			);
		
		$pbid = isset($datatgl[0]['koper']);
        $tgl = isset($datatgl[0]['tanggal_tr']);
        $kdjp = isset($datatgl[0]['kode_sub_jenis_pekerjaan']);
				if($pbid == $koper && $tgl == $tanggal && $kdjp == $kode_sub_jenis_pekerjaan ){

			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>DATA tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'Depbangtransaksi/addtrdepbang/'.$tanggal.'/'.$kode_trans.'');
		}else{
			$result = $this->depbangkat->Savedepbang_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data  BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'Depbangtransaksi/addtrdepbang/'.$tanggal.'/'.$kode_trans.'');
		}
		
	}

	

	function savedata(){
		$this->load->model('depbangkat');
		
		$idpr2 = $_POST['idpr2'];
		$kode_trans = $_POST['kode_trans'];
		$koper = $_POST['koper'];
		$kode_produk = $_POST['kode_produk'];
		$harga_saat_ini = $_POST['harga_saat_ini'];
		$harga_jual = $_POST['harga_jual'];
		$harga_penawaran = $_POST['harga_penawaran'];
		$jumlah_fee = $_POST['jumlah_fee'];
					
        $datatgl = $this->depbangkat->Getdetail("where kode_produk='$kode_produk' and idpr2='$idpr2'")->result_array();
            
		$data= array(	
			'idpr2' => $idpr2,
			'kode_trans' => $kode_trans,
			'kode_produk' => $kode_produk,
			'koper' => $koper,
			'harga_saat_ini' => $harga_saat_ini,
			'harga_jual' => $harga_jual,
			'harga_penawaran' => $harga_penawaran,
			'jumlah_fee' => $jumlah_fee,
			'createby' =>  $this->session->userdata('nama'),			
			);

			
		
		$obid = isset($datatgl[0]['kode_produk']);
		$tgltr = isset($datatgl[0]['idpr2']);

				if($obid == $kode_produk && $tgltr == $idpr2){

			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Obat tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'Depbangtransaksi/adddetail/'.$idpr2.'');
		}else{
			$result = $this->depbangkat->Save_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data  BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'Depbangtransaksi/adddetail/'.$idpr2.'');
		}
		
	}


	function editheaddepbang($kode=0){
	$this->load->model('depbangkat');
	
	
	$tampung = $this->depbangkat->GetprodukV("where idpr2 ='$kode'")->result_array();
    
    $for_prins = array();
		foreach($this->depbangkat->GetprodukV("where idpr2 = '$kode' ")->result_array() as $prins){
			$for_prins[] = $prins['koper'];
		}

		$for_prins2 = array();
		foreach($this->depbangkat->GetprodukV("where idpr2 = '$kode' ")->result_array() as $prins2){
			$for_prins2[] = $prins2['kode_sub_jenis_pekerjaan'];
		}

		$for_prins3 = array();
		foreach($this->depbangkat->GetprodukV("where idpr2 = '$kode' ")->result_array() as $prins3){
			$for_prins3[] = $prins3['kodelokasi'];
		}

    $roles = (
			$this->session->userdata('nama_role')
			
		);

    $nama = (
			$this->session->userdata('nama')
			
		);
    
		
	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'idpr2' => $tampung[0]['idpr2'],	
		'prins' => $this->depbangkat->GetKodePrinsp("where id_tipe_produk='TP004'")->result_array(),
		'for_prins' => $for_prins,
		'prins2' => $this->depbangkat->GetKodesubkerja()->result_array(),
		'for_prins2' => $for_prins2,
		'prins3' => $this->depbangkat->GetKodelokasi()->result_array(),
		'for_prins3' => $for_prins3,
		'id_tipe_produk' => $tampung[0]['id_tipe_produk'],
		'kode_trans' => $tampung[0]['kode_trans'],
		'koders' => $tampung[0]['koders'],
		'tanggal_tr' => $tampung[0]['tanggal_tr'],	
		);

	
	$this->template->display('katdepbang/edit_depbang', $data);

	}


	function updatedepbanghead(){
     
     $this->load->model('depbangkat');

		$idpr2=$_POST['idpr2'];
		$kode_trans=$_POST['kode_trans'];
		$koders=$_POST['koders'];
		$kodelokasi=$_POST['kodelokasi'];
		$kode_sub_jenis_pekerjaan=$_POST['kode_sub_jenis_pekerjaan'];
		$id_tipe_produk = $_POST['id_tipe_produk'];
		$koper = $_POST['koper'];
		$tanggal_tr = $_POST['tanggal_tr'];		
		
				
	$data = array(
	'idpr2' =>$this->input->post('idpr2'),
	'kode_trans' =>$this->input->post('kode_trans'),
	'id_tipe_produk' =>$this->input->post('id_tipe_produk'),
	'koper' => $this->input->post('koper'),
	'tanggal_tr' => $this->input->post('tanggal_tr'),
	'koders' =>$this->input->post('koders'),
	'kodelokasi' =>$this->input->post('kodelokasi'),
	'kode_sub_jenis_pekerjaan' => $this->input->post('kode_sub_jenis_pekerjaan'),
	'updateby' =>  $this->session->userdata('nama'),
	);

	$this->load->model('depbangkat');
	$hasil = $this->depbangkat->Updateheadalkes($data);
	if($hasil>=0){
 	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'Depbangtransaksi/addtrdepbang/'.$tanggal_tr.'/'.$kode_trans.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'Depbangtransaksi/addtrdepbang/'.$tanggal_tr.'/'.$kode_trans.'');
	}
	}




	function hapusheaddepbang($kode = 1,$kodetr=0,$tgl=0){
	$this->load->model('depbangkat');	
	$kode_trans=$kodetr;
    $tanggal=$tgl;
	$result = $this->depbangkat->Hapus('produko2', array('idpr2' => $kode));
    $result = $this->depbangkat->Hapus('tb_detail_depbang', array('idpr2'=> $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'Depbangtransaksi/addtrdepbang/'.$tanggal.'/'.$kode_trans.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'Depbangtransaksi/addtrdepbang/'.$tanggal.'/'.$kode_trans.'');
	}
	}

	function hapustralkes($kode_trans = 1){
	$this->load->model('depbangkat');	
	$result = $this->depbangkat->Hapus('tr_print_compare', array('kode_trans' => $kode_trans));
	$result = $this->depbangkat->Hapus('produko2', array('kode_trans' => $kode_trans));
	$result = $this->depbangkat->Hapus('tb_detail_depbang', array('kode_trans' => $kode_trans));
   	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'Depbangtransaksi');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'Depbangtransaksi');
	}
	}

	function hapusdetail($kode = 1,$kd_pd=0,$pbkid=0){
		$idpr2=$kd_pd;
		$koper=$pbkid;
		
	$this->load->model('alkeskat');	
	$result = $this->alkeskat->Hapus('tb_detail_depbang', array('id_detail_depbang' => $kode));
	
			if($kode=='' ){

			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan.Terima Kasih.</strong></div>");
			header('location:'.base_url().'Depbangtransaksi/adddetail/'.$idpr2.'');

		}else{
				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Depbangtransaksi/adddetail/'.$idpr2.'');
		}
	
}


function editabks($kode=0,$pabrikid=0,$tanggal_tr=0){
	$this->load->model('depbangkat');
	
	
	$tampung = $this->depbangkat->Getdetail("where id_detail_depbang ='$kode'")->result_array();

    $for_prins = array();
		foreach($this->depbangkat->Getdetail("where id_detail_depbang = '$kode' ")->result_array() as $prins){
			$for_prins[] = $prins['kode_produk'];
		}

		    
	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'id_detail_depbang' => $tampung[0]['id_detail_depbang'],	
		'idpr2' => $tampung[0]['idpr2'],		
		'prins' => $this->depbangkat->Getobatcobauy("where tipe_produk='TP004'")->result_array(),
		'for_prins' => $for_prins,
		'koper' => $tampung[0]['koper'],
		'harga_saat_ini' => $tampung[0]['harga_saat_ini'],
		'harga_jual' => $tampung[0]['harga_jual'],
		'harga_penawaran' => $tampung[0]['harga_penawaran'],
		'jumlah_fee' => $tampung[0]['jumlah_fee'],
		'kode_trans' => $tampung[0]['kode_trans'],
		);
	
	$this->template->display('katdepbang/edit_detildepbang', $data);	
}
	function updateabksd(){
     
     $this->load->model('depbangkat');

     
	    $id_detail_depbang=$_POST['id_detail_depbang'];
		$idpr2 = $_POST['idpr2'];
		$kode_produk = $_POST['kode_produk'];	
		$koper = $_POST['koper'];
		$kode_trans = $_POST['kode_trans'];
		$harga_saat_ini = $_POST['harga_saat_ini'];
		$harga_jual = $_POST['harga_jual'];
		$harga_penawaran=$_POST['harga_penawaran'];
		$jumlah_fee = $_POST['jumlah_fee'];

		$data = array(
	        'id_detail_depbang' =>$this->input->post('id_detail_depbang'),
	        'idpr2' => $idpr2,
			'kode_trans' => $kode_trans,
			'kode_produk' => $kode_produk,
			'koper' => $koper,
			'harga_saat_ini' => $harga_saat_ini,
			'harga_jual' => $harga_jual,
			'harga_penawaran' => $harga_penawaran,
			'jumlah_fee' => $jumlah_fee,
			
	'updateby' =>  $this->session->userdata('nama'),
	);

	$this->load->model('depbangkat');
	$hasil = $this->depbangkat->Updatedetail($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'Depbangtransaksi/adddetail/'.$idpr2.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'Depbangtransaksi/adddetail/'.$idpr2.'');
	}
	}

	 function editaprovedepbang($kode=0){
	$this->load->model('depbangkat');
	
	
	$tampung = $this->depbangkat->Getaprove("where idtrcom ='$kode'")->result_array();

	$for_ttdmenger = array();
		foreach($this->depbangkat->Getaprove("where idtrcom = '$kode' ")->result_array() as $role){
			$for_ttdmenger[] = $role['ttd_mengetahui'];
		}

		$for_ttdmenge = array();
		foreach($this->depbangkat->Getaprove("where idtrcom = '$kode' ")->result_array() as $role){
			$for_ttdmenge[] = $role['ttd_menyetujui'];
		}

		$for_ttdsatu = array();
		foreach($this->depbangkat->Getaprove("where idtrcom = '$kode' ")->result_array() as $role){
			$for_ttdsatu[] = $role['ttd_satu'];
		}

		
    $roles = (
			$this->session->userdata('nama_role')
			
		);

    $nama = (
			$this->session->userdata('nama')
			
		);
    
   		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");	

	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'idtrcom' => $tampung[0]['idtrcom'],	
		'idpengajuan' => $this->model->AmbilDataTTDMengetahui(" where role='$roles' and nama_user='$nama'")->result_array(),
        'for_ttdsatus' => $for_ttdsatu,
        'idmenyetujui' => $this->model->AmbilDataTTDMengetahui(" where role='$roles' and nama_user='$nama'")->result_array(),
		'for_ttdmen' => $for_ttdmenge,
		'idmengetahui' => $this->depbangkat->getttd(" where role='$roles' and nama_user='$nama'")->result_array(),
		 'for_ttdmeng' => $for_ttdmenger,
		'tanggal' => $tampung[0]['tanggal'],
		'id_tipe_produk' => $tampung[0]['id_tipe_produk'],
		'menyetujui' => $tampung[0]['menyetujui'],
		'ttd_menyetujui' => $tampung[0]['ttd_menyetujui'],
		'jb_menyetujui' => $tampung[0]['jb_menyetujui'],
		'mengetahui' => $tampung[0]['mengetahui'],
		'ttd_mengetahui' => $tampung[0]['ttd_mengetahui'],
		'jb_mengetahui' => $tampung[0]['jb_mengetahui'],
		'nama_satu' => $tampung[0]['nama_satu'],
		'ttd_satu' => $tampung[0]['ttd_satu'],
		'jb_satu' => $tampung[0]['jb_satu'],
		'status' => $tampung[0]['status'],
		
			);

	
	$this->template->display('katdepbang/edit_aprovedepbang', $data);

	}

	function updateaprove(){
     
     $this->load->model('depbangkat');
   
	    $idtrcom=$_POST['idtrcom'];
	    $nama_satu = $_POST['nama_satu'];
		$ttd_satu = $_POST['ttd_satu'];
		$jb_satu = $_POST['jb_satu'];
		$mengetahui = $_POST['mengetahui'];
		$ttd_mengetahui = $_POST['ttd_mengetahui'];
		$jb_mengetahui = $_POST['jb_mengetahui'];
		$menyetujui = $_POST['menyetujui'];
		$ttd_menyetujui = $_POST['ttd_menyetujui'];
		$jb_menyetujui = $_POST['jb_menyetujui'];
		$tanggal=$_POST['tanggal'];
		$id_tipe_produk=$_POST['id_tipe_produk'];
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");	
        $status=$_POST['status'];
	$data = array(
	'idtrcom' =>$this->input->post('idtrcom'),
	'mengetahui' =>$this->input->post('mengetahui'),
	'tanggal' =>$this->input->post('tanggal'),
	'id_tipe_produk' =>$this->input->post('id_tipe_produk'),
	'ttd_mengetahui' =>$this->input->post('ttd_mengetahui'),
	'jb_mengetahui' =>$this->input->post('jb_mengetahui'),
	'nama_satu' =>$this->input->post('nama_satu'),
	'ttd_satu' =>$this->input->post('ttd_satu'),
	'jb_satu' =>$this->input->post('jb_satu'),
	'menyetujui' =>$this->input->post('menyetujui'),
	'ttd_menyetujui' =>$this->input->post('ttd_menyetujui'),
	'jb_menyetujui' =>$this->input->post('jb_menyetujui'),
	'updateby' =>  $this->session->userdata('nama'),
	'updatedate' =>$waktusaatini,
	'status'=>$status,
		);

	$this->load->model('depbangkat');
	$hasil = $this->depbangkat->Updateapp1($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Approve data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'Depbangtransaksi');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Approve data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'Depbangtransaksi');
	}
	}

function editrejectalkes($kode=0){
	$this->load->model('alkeskat');
	
	
	$tampung = $this->alkeskat->Getaprove("where idtrcom ='$kode'")->result_array();

	

    $roles = (
			$this->session->userdata('nama_role')
			
		);

    $nama = (
			$this->session->userdata('nama')
			
		);
    
   		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");	

	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'idtrcom' => $tampung[0]['idtrcom'],
		'kode_trans' => $tampung[0]['kode_trans'],	
		'tanggal' => $tampung[0]['tanggal'],
		'koders' => $tampung[0]['koders'],
		'id_tipe_produk' => $tampung[0]['id_tipe_produk'],
		'status' => $tampung[0]['status'],
		'catatan' => $tampung[0]['catatan'],
		
			);

	
	$this->template->display('katdepbang/edit_rejectdepbang', $data);

	}

	function updatereject(){
     
     $this->load->model('alkeskat');
   
	    $idtrcom=$_POST['idtrcom'];
	    $kode_trans=$_POST['kode_trans'];
	   	$tanggal=$_POST['tanggal'];
	   	$catatan=$_POST['catatan'];
	   	$koders=$_POST['koders'];
		$id_tipe_produk=$_POST['id_tipe_produk'];
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");	
        $status=$_POST['status'];
	$data = array(
	'idtrcom' =>$this->input->post('idtrcom'),
	'tanggal' =>$this->input->post('tanggal'),
	'catatan' =>$this->input->post('catatan'),
	'koders' =>$this->input->post('koders'),
	'id_tipe_produk' =>$this->input->post('id_tipe_produk'),
	'updateby' =>  $this->session->userdata('nama'),
	'updatedate' =>$waktusaatini,
	'status'=>$status,
		);

	$this->load->model('alkeskat');
	$hasil = $this->alkeskat->Updateapp1($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>reject data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'Depbangtransaksi');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>reject data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'Depbangtransaksi');
	}
	}

	
}

