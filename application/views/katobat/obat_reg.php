    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class obat_reg extends CI_Controller {
   private $filename = "impor_kode_obat";
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
		$this->load->model('obatreg');
		$koper=$this->input->post('koper');
		$data=$this->obatreg->get_data_prinsipal_bykode($koper);
		echo json_encode($data);
		
	}

	function get_produkobat()
		
	{
		$this->load->model('obatreg');
		$idobat=$this->input->post('idobat');
		$data=$this->obatreg->get_data_farmasi_bykode($idobat);
		echo json_encode($data);
		
	}

			
	public function index()
	{
		$this->load->model('obatreg');
		$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
		$rolesdara=($this->session->userdata('nama_role'));
		

      if($rolesdara=='Direktur Operasional dan Umum'){
		$this->load->model('obatreg'); 
		$data = array(
		'nama'=> $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'data_aprove' => $this->obatreg->Getaprove("where status ='2' and id_tipe_produk='TP001' and idtrcom <> 33  order by createdate desc")->result_array(),
		'data_reject' => $this->obatreg->Getaproveview("where  id_tipe_produk='TP001' order by idtrcom desc")->result_array(),
	);
		$this->template->display('katobat/tr_farmasi_reg', $data);
	}elseif ($rolesdara=='Kepala Departemen Jangmed'){
       $this->load->model('obatreg'); 
		$data = array(
		'nama'=> $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'data_aprove' => $this->obatreg->Getaprove("where status ='1' and id_tipe_produk='TP001' and idtrcom <> 33 order by createdate desc")->result_array(),
		'data_reject' => $this->obatreg->Getaproveview("where  id_tipe_produk='TP001' order by idtrcom desc")->result_array(),
	);
		$this->template->display('katobat/tr_farmasi_reg', $data);
	}elseif($rolesdara=='Manager Perencanaan Farmasi'){
		$this->load->model('obatreg'); 
		$data = array(
		'nama'=> $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'data_aprove' => $this->obatreg->Getaprove("where status ='0' and id_tipe_produk='TP001' and idtrcom <> 33 order by createdate desc")->result_array(),
		'data_reject' => $this->obatreg->Getaproveview("where status ='4' and  id_tipe_produk='TP001' order by idtrcom desc")->result_array(),
	);
		$this->template->display('katobat/tr_farmasi_reg', $data);
	}elseif($rolesdara=='Staff Perencanaan Farmasi'){
			$this->load->model('obatreg'); 
		
		$data = array(
		'nama'=> $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		//'kodereg' => $this->obatreg->code_otomatis_reg(), 
		'data_aprove' => $this->obatreg->Getaprove("where (status is null or status='01') and id_tipe_produk='TP001' and idtrcom <> 33 order by createdate desc")->result_array(),
		'data_reject' => $this->obatreg->Getaproveview("where status ='4' and  id_tipe_produk='TP001' order by idtrcom desc")->result_array(),
	);
		$this->template->display('katobat/tr_farmasi_reg', $data);
	}elseif($rolesdara=='User Data Master'){
			$this->load->model('obatreg'); 
		$data = array(
		'nama'=> $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'data_aprove' => $this->obatreg->Getaprove("where status ='3' and id_tipe_produk='TP001' and idtrcom <> 33 order by createdate desc")->result_array(),
		'data_reject' => $this->obatreg->Getaproveview("where status ='4' and  id_tipe_produk='TP001' order by idtrcom desc")->result_array(),
	);
		$this->template->display('katobat/tr_farmasi_reg', $data);
	}else{
		$this->load->model('obatreg');
		$data = array(
		'nama'=> $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'data_aprove' => $this->obatreg->Getaprove("where status ='21' and id_tipe_produk='TP001' and idtrcom <> 33 order by createdate desc")->result_array(),
		'data_reject' => $this->obatreg->Getaproveview("where status ='21' and id_tipe_produk='TP001' order by idtrcom desc")->result_array(),
	);
	
		$this->template->display('katobat/tr_farmasi_reg', $data);
}
}


function addtrfarmasinew()
	{
		$id=$this->uri->segment(3);
		$tgl=$this->uri->segment(4);
		$flag=$this->uri->segment(5);

		$this->load->model('obatreg');
		$data = array(
		'kodereg' => $this->obatreg->code_otomatis_reg(), 
        // 'tr' => $this->db->get_where('tr_print_compare',['kode_trans'=>$id])->row(),
        'data_prod' => $this->obatreg->Getprodukm("order by idpr2 asc")->result_array(),
		'nama' => $this->session->userdata('nama'),
		'cabang' => $this->session->userdata('cabang'),  
				
	    'data_produko' => $this->obatreg->GetprodukV_lop("order by kode_trans desc")->result_array(),
        'kode_pabrik' => $this->obatreg->GetKodePrinsp("order by nm_perusahaan ASC")->result_array(),
        'tipe_produk' => $this->obatreg->Gettipe()->result_array(),
		 );
		$this->template->display('katobat/data_obatregnew', $data);
	}


// function addtrfarmasi($id,$tgl)
// 	{
// 		$id=$this->uri->segment(3);
// 		$tgl=$this->uri->segment(4);
		
// 		$this->load->model('obatreg');
// 		$data = array(
//         'tr' => $this->db->get_where('tr_print_compare',['idtrcom'=>$id])->row(),
//         'data_prod' => $this->obatreg->Getprodukm("order by idpr2 asc")->result_array(),
// 		'nama' => $this->session->userdata('nama'),
// 		'cabang' => $this->session->userdata('cabang'),                          
// 	    'data_produko' => $this->obatreg->GetprodukV("where kode_th='$id' order by nm_perusahaan asc")->result_array(),
//         'kode_pabrik' => $this->obatreg->GetKodePrinsp("order by nm_perusahaan ASC")->result_array(),
//         'tipe_produk' => $this->obatreg->Gettipe()->result_array(),
// 		 );
// 		$this->template->display('katobat/data_obatreg', $data);
// 	}

function publisfarmasi()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));

		$this->load->model('obatreg'); 
		$this->load->model('produkom'); 
		$data['data_aprove'] = $this->obatreg->Getaprove("where status ='10' and id_tipe_produk='TP001' and idtrcom <> 33 order by createdate desc")->result_array();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('katobat/p_farmasi', $data);
	}


	function cetakfarmasi()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));

		$this->load->model('obatreg'); 
		$data['data_aprove'] = $this->obatreg->Getaprove("where status ='9' and id_tipe_produk='TP001' and idtrcom <> 33 order by createdate desc")->result_array();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('katobat/vc_farmasi', $data);
	}

function lihattrfarmasi($id,$tgl)
	{
	$this->load->model('obatreg');
		$data = array(
		'nama' =>$this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
        'tr' => $this->db->get_where('tr_print_compare',['idtrcom'=>$id])->row(),
        'data_prod' => $this->obatreg->Getprodukmfinal("order by idpr2 asc")->result_array(),
		'data_produko' => $this->obatreg->GetprodukVcountfinal("where tanggal_tr='$tgl' order by nm_perusahaan asc")->result_array(),
        'kode_pabrik' => $this->obatreg->GetKodePrinsp("order by nm_perusahaan ASC")->result_array(),
        'tipe_produk' => $this->obatreg->Gettipe()->result_array(),
		  );
		$this->template->display('katobat/lihat_trfarmasi', $data);
	}

	function lihatlap_trfarmasi($id,$tgl)
	{
	$this->load->model('obatreg');
		$data = array(
		'nama' =>$this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
        'tr' => $this->db->get_where('tr_print_compare',['idtrcom'=>$id])->row(),
        'data_prod' => $this->obatreg->Getprodukmfinal("order by idpr2 asc")->result_array(),
		'data_produko' => $this->obatreg->GetprodukVcountfinal("where tanggal_tr='$tgl' order by nm_perusahaan asc")->result_array(),
        'kode_pabrik' => $this->obatreg->GetKodePrinsp("order by nm_perusahaan ASC")->result_array(),
        'tipe_produk' => $this->obatreg->Gettipe()->result_array(),
		  );
		$this->template->display('katobat/lihatlap_trfarmasi', $data);
	}

	function rejecttrfarmasi($id,$tgl)
	{
		$this->load->model('obatreg');
       $data = array(
       	'nama' => $this->session->userdata('nama'),
		'cabang' => $this->session->userdata('cabang'),  
        'tr' => $this->db->get_where('tr_print_compare',['idtrcom'=>$id])->row(),
        'data_prod' => $this->obatreg->Getprodukm("order by idpr2 asc")->result_array(),
		'data_produko' => $this->obatreg->GetprodukVcount("where tanggal_tr='$tgl' order by nm_perusahaan asc")->result_array(),
        'kode_pabrik' => $this->obatreg->GetKodePrinsp("order by nm_perusahaan ASC")->result_array(),
        'tipe_produk' => $this->obatreg->Gettipe()->result_array(),
		 );
		$this->template->display('katobat/rejecttrfarmasi', $data);
	}

	function viewtrfarmasi($tgl)
	{
		$this->load->model('obatreg');
		$data = array(
		'nama' =>$this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
       //'tr' => $this->db->get_where('tr_print_compare',['idtrcom'=>$id])->row(),
        'data_prod' => $this->obatreg->Getprodukm("order by idpr2 asc")->result_array(),
		'data_produko' => $this->obatreg->GetprodukVcount("where tanggal_tr='$tgl' order by nm_perusahaan asc")->result_array(),
        'kode_pabrik' => $this->obatreg->GetKodePrinsp("order by nm_perusahaan ASC")->result_array(),
        'tipe_produk' => $this->obatreg->Gettipe()->result_array(),
		  );
		$this->template->display('katobat/view_trfarmasi_reg', $data);
	}

	function adddetailnew($id,$koper,$flag)
	{
		 if($flag=='1'){
		$this->load->model('obatreg');
		                          
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'prod' => $this->db->get_where('v_obat_head_lop',['idpr2'=>$id])->row(),
			 'data_prods2' => $this->obatreg->GetprodukVdetail("where koded_prod='$id'")->result_array(),
			 'obat' => $this->obatreg->Getobatcobauy("where koper='$koper' order by nama_obat desc")->result_array(),
             'distri' => $this->obatreg->Getdistri("where koper='$koper' order by nm_distributor desc")->result_array(),
			 'tipe_harga' => $this->obatreg->Gettipeharga("order by idtipeharga asc")->result_array(),
	);
		 
		$this->template->display('katobat/add_detilfarmasinew', $data);
	}else{
	$this->load->model('obatreg');
		                          
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'prod' => $this->db->get_where('v_obat_head_lop',['idpr2'=>$id])->row(),
			 'data_prods2' => $this->obatreg->GetprodukVdetail_2("where koded_prod='$id'")->result_array(),
			 'obat' => $this->obatreg->Getobatcobauy("where koper='$koper' order by nama_obat desc")->result_array(),
             'distri' => $this->obatreg->Getdistri("where koper='$koper' order by nm_distributor desc")->result_array(),
			 'tipe_harga' => $this->obatreg->Gettipeharga("order by idtipeharga asc")->result_array(),
	);
		 
		$this->template->display('katobat/add_detilfarmasi2', $data);		
		
	}
	
	}

function adddetail($id,$koper)
	{
		$this->load->model('obatreg');
		                          
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'prod' => $this->db->get_where('v_obat_head',['idpr2'=>$id])->row(),
			 'data_prods2' => $this->obatreg->GetprodukVdetail("where koded_prod='$id'")->result_array(),
			 'obat' => $this->obatreg->Getobatcobauy("where koper='$koper' order by nama_obat desc")->result_array(),
             'distri' => $this->obatreg->Getdistri("where koper='$koper' order by nm_distributor desc")->result_array(),
			 'tipe_harga' => $this->obatreg->Gettipeharga("order by idtipeharga asc")->result_array(),
);
		 
		$this->template->display('katobat/add_detilfarmasi2', $data);
	}

   function savedata_aprovefarmasi(){
		$this->load->model('obatreg');
		$this->load->model('obatreg');
		
		$kode_trans = $_POST['kode_trans'];
		$tanggal = $_POST['tanggal'];
		$id_tipe_produk = $_POST['id_tipe_produk'];		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	
                  $datatgl = $this->obatreg->Getaprove("where tanggal='$tanggal' and id_tipe_produk='$id_tipe_produk'")->result_array();
		$data = array(	
			'tanggal'=>$tanggal,
			'kode_trans' => $kode_trans,
			'id_tipe_produk'=>$id_tipe_produk,
			'createdate' => $waktusaatini,
			'createby' =>  $this->session->userdata('nama'),			
			);

		
		
		
		 $pbid = isset($datatgl[0]['tanggal']);
		 $tp = isset($datatgl[0]['id_tipe_produk']);
		
		if($pbid == $tanggal && $tp == $id_tipe_produk){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Tanggal tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'obat_reg');
		}else{
		 
		
		$result = $this->obatreg->Simpanaprove($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'obat_reg');
		}
	}

	function updateaprovecek(){
     
     $this->load->model('obatreg');
   
	    $idtrcom=$_POST['idtrcom'];
	    $tanggal=$_POST['tanggal'];
		$id_tipe_produk=$_POST['id_tipe_produk'];
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");	
        $status=$_POST['status'];
	$data = array(
	'idtrcom' =>$this->input->post('idtrcom'),
	'tanggal' =>$this->input->post('tanggal'),
	'id_tipe_produk' =>$this->input->post('id_tipe_produk'),
	'updateby' =>  $this->session->userdata('nama'),
	'updatedate' =>$waktusaatini,
	'status'=>$status,
		);

	$this->load->model('obatreg');
	$hasil = $this->obatreg->Updatedara($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Approve data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Approve data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg');
	}
	}

function updateaprovecekcui(){
     
     $this->load->model('obatreg');
   
	    $idtrcom=$_POST['idtrcom'];
	    $tanggal=$_POST['tanggal'];
		$id_tipe_produk=$_POST['id_tipe_produk'];
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");	
        $status=$_POST['status'];
	$data = array(
	'idtrcom' =>$this->input->post('idtrcom'),
	'tanggal' =>$this->input->post('tanggal'),
	'id_tipe_produk' =>$this->input->post('id_tipe_produk'),
	'updateby' =>  $this->session->userdata('nama'),
	'updatedate' =>$waktusaatini,
	'status'=>$status,
		);

	$this->load->model('obatreg');
	$hasil = $this->obatkat->Updatedara($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>reset data tanggal : $tanggal BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>reset data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg');
	}
	}

	function updateaprovepublis(){
     
     $this->load->model('obatreg');
   
	    $idtrcom=$_POST['idtrcom'];
	    $tanggal=$_POST['tanggal'];
		$id_tipe_produk=$_POST['id_tipe_produk'];
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");	
        $status=$_POST['status'];
	$data = array(
	'idtrcom' =>$this->input->post('idtrcom'),
	'tanggal' =>$this->input->post('tanggal'),
	'id_tipe_produk' =>$this->input->post('id_tipe_produk'),
	'updateby' =>  $this->session->userdata('nama'),
	'updatedate' =>$waktusaatini,
	'status'=>$status,
		);

	$this->load->model('obatreg');
	$hasil = $this->obatkat->Updatedara($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>publish data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg/publisfarmasi');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>publish data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg/publisfarmasi');
	}
	}

	function savedatas(){
		$this->load->model('obatreg');
		
		
		
		// $id_tipe_produk = $_POST['id_tipe_produk'];		
		// date_default_timezone_set("Asia/Jakarta");
			// $waktusaatini =date("Y-m-d H:i:s");	
                  // $datatgl = $this->obatreg->Getaprove("where tanggal='$tanggal' and id_tipe_produk='$id_tipe_produk'")->result_array();
		// $data = array(	
			
			// 'createby' =>  $this->session->userdata('nama'),			
			// );

		
		
		
		 
		
		// if($pbid == $tanggal && $tp == $id_tipe_produk){
			// $this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Tanggal tersebut sudah ada!!!</strong></div>");
			// header('location:'.base_url().'obat_reg');
		// }else{
		 
		
		// $result = $this->obatreg->Simpanaprove($data);
		
		
		
		
		$kode_trans = $_POST['kode_trans'];
		$tanggal = $_POST['tanggal'];
		 $koper = $_POST['koper'];
		 $kodis = $_POST['kodis'];
		 $id_tipe_produk = $_POST['id_tipe_produk'];
		 //$tanggal = $_POST['tanggal'];
		 date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	
		 $kode_trans = $_POST['kode_trans'];
		 $flagobat = $_POST['flagobat'];
		 
          $datatgl = $this->obatreg->Getproduk_lop("where koper='$koper' and tanggal_tr='$tanggal' and id_tipe_produk='$id_tipe_produk'")->result_array();

		$data = array(	
		
			'tanggal'=>$tanggal,
			'kode_trans' => $kode_trans,
			'id_tipe_produk'=>$id_tipe_produk,
			'createdate' => $waktusaatini,
			// 'id_tipe_produk' => $tipe_produk,
			
			// 'tanggal_tr' => $tanggal,
			//'kodis' =>$kodis,
			// 'kode_trans' => $kode_trans,
			
			
			'createby' =>  $this->session->userdata('nama'),			
			);
			
		$data2 = array(	
		
			'tanggal_tr' => $tanggal,
			'kode_trans' => $kode_trans,
			'id_tipe_produk'=>$id_tipe_produk,
			'createdate' => $waktusaatini,
			// 'id_tipe_produk' => $tipe_produk,
			'koper' => $koper,
			'kodis' =>$kodis,
			'flagobat' => $flagobat,
			'createby' =>  $this->session->userdata('nama'),			
			);
	
			

		
		 
		
		
		$pbid = isset($datatgl[0]['koper']);
        $tgl = isset($datatgl[0]['tanggal_tr']);
		$tp = isset($datatgl[0]['id_tipe_produk']);
				if($pbid == $koper && $tgl == $tanggal && $tp == $id_tipe_produk){

			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>DATA tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'obat_reg/addtrfarmasinew');
		}else{
			$result = $this->obatreg->SaveFarmasi_db_lop($data2);
			$result = $this->obatreg->Simpanaprove($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data  BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'obat_reg/addtrfarmasinew');
		}
		
	}

	

	function savedata(){
		$this->load->model('obatreg');
		
		$koded_prod = $_POST['koded_prod'];
		$kode_th = $_POST['kode_th'];
		$kodis = $_POST['kodis'];
		$kode_obat = $_POST['kode_obat'];
		$koper = $_POST['koper'];
		$tipe_harga = $_POST['tipe_harga'];
		$harga = $_POST['harga'];
		$discount = $_POST['discount'];
		$idobat = $_POST['idobat'];
		$catatan = $_POST['catatan'];	
				
        $datatgl = $this->obatreg->Getdetail("where idobat='$idobat' and koded_prod='$koded_prod'")->result_array();
            
		$data= array(	
			'koded_prod' => $koded_prod,
			'kode_th' => $kode_th,
			'kode_obat' => $kode_obat,
			'koper' => $koper,
			'kodis' => $kodis,
			'harga' => $harga,
			'discount' => $discount,
			'tipe_harga' => $tipe_harga, 
			'idobat' => $idobat,
			'catatan' => $catatan,   
			'createby' =>  $this->session->userdata('nama'),			
			);

			
		
		$obid = isset($datatgl[0]['idobat']);
		$tgltr = isset($datatgl[0]['koded_prod']);

				if($obid == $idobat && $tgltr == $koded_prod){

			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Obat tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'obat_reg/adddetail/'.$koded_prod.'/'.$koper.'');
		}else{
			$result = $this->obatreg->Save_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data  BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'obat_reg/adddetail/'.$koded_prod.'/'.$koper.'');
		}
		
	}


	function editheadfarmasi($kode=0){
	$this->load->model('obatreg');
	
	
	$tampung = $this->obatreg->GetprodukV("where idpr2 ='$kode'")->result_array();
    
    $for_prins = array();
		foreach($this->obatreg->GetprodukV("where idpr2 = '$kode' ")->result_array() as $prins){
			$for_prins[] = $prins['koper'];
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
		'prins' => $this->obatreg->GetKodePrinsp("order by nm_perusahaan")->result_array(),
		'for_prins' => $for_prins,
		'kodis'=> $tampung[0]['kodis'],
		'id_tipe_produk' => $tampung[0]['id_tipe_produk'],
		'kode_th' => $tampung[0]['kode_th'],
		'tanggal_tr' => $tampung[0]['tanggal_tr'],	
		'koper' => $tampung[0]['koper'],
		);

	
	$this->template->display('katobat/edit_farmasireg', $data);

	}


	function updatefarmasihead(){
     
     $this->load->model('obatreg');

		$idpr2=$_POST['idpr2'];
		$kode_th=$_POST['kode_th'];
		$id_tipe_produk = $_POST['id_tipe_produk'];
		$koper = $_POST['koper'];
		$kodis = $_POST['kodis'];		
		$tanggal_tr = $_POST['tanggal_tr'];		
		
				
	$data = array(
	'idpr2' =>$this->input->post('idpr2'),
	'kode_th' =>$this->input->post('kode_th'),
	'id_tipe_produk' =>$this->input->post('id_tipe_produk'),
	'koper' => $this->input->post('koper'),
	'kodis' =>$this->input->post('kodis'),
	'tanggal_tr' => $this->input->post('tanggal_tr'),
	'updateby' =>  $this->session->userdata('nama'),
	);

	$this->load->model('obatreg');
	$hasil = $this->obatreg->Updateheadfarmasi($data);
	if($hasil>=0){
 	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg/addtrfarmasinew/'.$kode_th.'/'.$tanggal_tr.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg/addtrfarmasinew/'.$kode_th.'/'.$tanggal_tr.'');
	}
	}




	function hapusheadfarmasi($kode = 1,$kodetr=0,$tgl=0){
	$this->load->model('obatreg');	
	$kode_th=$kodetr;
    $tanggal=$tgl;
	$result = $this->obatreg->Hapus('tr_farmasi', array('idpr2' => $kode));
    $result = $this->obatreg->Hapus('tb_detilfarmasi', array('koded_prod'=> $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'obat_reg/addtrfarmasinew/'.$kode_th.'/'.$tanggal.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg/addtrfarmasinew/'.$kode_th.'/'.$tanggal.'');
	}
	}

	function hapustrfarmasi($kode = 1){
	$this->load->model('obatreg');	
	$result = $this->obatreg->Hapus('tr_print_compare', array('idtrcom' => $kode));
	$result = $this->obatreg->Hapus('tr_farmasi', array('kode_th' => $kode));
	$result = $this->obatreg->Hapus('tb_detilfarmasi', array('kode_th' => $kode));
   	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'obat_reg');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg');
	}
	}

	function hapusdetail($kode = 1,$kd_pd=0,$pbkid=0){
		$koded_prod=$kd_pd;
		$koper=$pbkid;
		
	$this->load->model('obatreg');	
	$result = $this->obatreg->Hapus('tb_detilfarmasi', array('iddetailprod2' => $kode,'koded_prod' => $kd_pd,'koper' => $pbkid));
	
			if($kd_pd=='' ){

			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan.Terima Kasih.</strong></div>");
			header('location:'.base_url().'obat_reg/adddetailnew/'.$koded_prod.'/'.$koper.'');

		}else{
				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'obat_reg/adddetailnew/'.$koded_prod.'/'.$koper.'');
		}
	
}


function editabks($kode=0,$pabrikid=0,$tanggal_tr=0){
	$this->load->model('obatreg');
	
	
	$tampung = $this->obatreg->GetprodukVdetail("where iddetailprod2 ='$kode'")->result_array();

    $for_prins = array();
		foreach($this->obatreg->GetprodukVdetail("where iddetailprod2 = '$kode' ")->result_array() as $prins){
			$for_prins[] = $prins['idobat'];
		}

 $for_dist = array();
                foreach($this->obatreg->GetprodukVdetail("where iddetailprod2 = '$kode' ")->result_array() as $dist){
                        $for_dist[] = $dist['kodis'];
                }


		 $for_harga = array();
		foreach($this->obatreg->GetprodukVdetail("where iddetailprod2 = '$kode' ")->result_array() as $hargas){
			$for_harga[] = $hargas['tipe_harga'];
		}
    
	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'iddetailprod2' => $tampung[0]['iddetailprod2'],	
		'koded_prod' => $tampung[0]['koded_prod'],		
		'kodis'=> $tampung[0]['kodis'],
		'prins' => $this->obatreg->Getobatcobauy("where koper='$pabrikid'")->result_array(),
		'for_prins' => $for_prins,
        'dist' => $this->obatreg->Getdistri("where koper='$pabrikid'")->result_array(),
        'for_dists' => $for_dist,
		'hargas' => $this->obatreg->Gettipeharga()->result_array(),
		'for_harga' => $for_harga,
		'koper' => $tampung[0]['koper'],
		'kode_obat' => $tampung[0]['kode_obat'],
		'harga' => $tampung[0]['harga'],
		'discount' => $tampung[0]['discount'],
		'kode_th' => $tampung[0]['kode_th'],
		'catatan' => $tampung[0]['catatan'],
		);
	
	$this->template->display('katobat/edit_detilfarmasi_regnew', $data);	
}

	function editks($kode=0,$pabrikid=0,$tanggal_tr=0){
	$this->load->model('obatreg');
	
	
	$tampung = $this->obatreg->GetprodukVdetail("where iddetailprod2 ='$kode'")->result_array();

    $for_prins = array();
		foreach($this->obatreg->GetprodukVdetail("where iddetailprod2 = '$kode' ")->result_array() as $prins){
			$for_prins[] = $prins['idobat'];
		}

 	$for_dist = array();
        foreach($this->obatreg->GetprodukVdetail("where iddetailprod2 = '$kode' ")->result_array() as $dist){
                        $for_dist[] = $dist['kodis'];
                }

	$for_harga = array();
		foreach($this->obatreg->GetprodukVdetail("where iddetailprod2 = '$kode' ")->result_array() as $hargas){
			$for_harga[] = $hargas['tipe_harga'];
		}
    
	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'iddetailprod2' => $tampung[0]['iddetailprod2'],	
		'koded_prod' => $tampung[0]['koded_prod'],		
		'kodis'=> $tampung[0]['kodis'],
		'prins' => $this->obatreg->Getobatcobauy("where koper='$pabrikid'")->result_array(),
		'for_prins' => $for_prins,
        'dist' => $this->obatreg->Getdistri("where koper='$pabrikid'")->result_array(),
        'for_dists' => $for_dist,
		'hargas' => $this->obatreg->Gettipeharga()->result_array(),
		'for_harga' => $for_harga,
		'koper' => $tampung[0]['koper'],
		'kode_obat' => $tampung[0]['kode_obat'],
		'harga' => $tampung[0]['harga'],
		'discount' => $tampung[0]['discount'],
		'kode_th' => $tampung[0]['kode_th'],
		'catatan' => $tampung[0]['catatan'],
		);

	
	$this->template->display('katobat/edit_detilfarmasi_reg', $data);	
}

	function updateabksd(){
     
     $this->load->model('obatreg');

     
	    $iddetailprod2=$_POST['iddetailprod2'];
		$koded_prod = $_POST['koded_prod'];
		$kode_obat = $_POST['kode_obat'];	
		$koper = $_POST['koper'];
		$kodis = $_POST['kodis'];
		$tipe_harga = $_POST['tipe_harga'];	
		$harga = $_POST['harga'];
		$discount = $_POST['discount'];
		$kode_th=$_POST['kode_th'];
		$idobat=$_POST['idobat'];
		$catatan=$_POST['catatan'];		

	$data = array(
	'iddetailprod2' =>$this->input->post('iddetailprod2'),
	'koded_prod' =>$this->input->post('koded_prod'),
	'kode_obat' =>$this->input->post('kode_obat'),
	'koper' =>$this->input->post('koper'),
	'kodis' =>$kodis,
	'tipe_harga' =>$this->input->post('tipe_harga'),
	'harga' =>$this->input->post('harga'),
	'discount' =>$this->input->post('discount'),
	'kode_th' =>$this->input->post('kode_th'),
	'idobat' =>$this->input->post('idobat'),
	'catatan' =>$this->input->post('catatan'),
	'updateby' =>  $this->session->userdata('nama'),
	);

	$this->load->model('obatreg');
	$hasil = $this->obatreg->Updatedetail($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg/adddetailnew/'.$koded_prod.'/'.$koper.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg/adddetailnew/'.$koded_prod.'/'.$koper.'');
	}
	}

	 function editaprovefarmasi($kode=0){
	$this->load->model('obatreg');
	
	
	$tampung = $this->obatreg->Getaprove("where idtrcom ='$kode'")->result_array();

	$for_ttdmenger = array();
		foreach($this->obatreg->Getaprove("where idtrcom = '$kode' ")->result_array() as $role){
			$for_ttdmenger[] = $role['ttd_mengetahui'];
		}

		$for_ttdmenge = array();
		foreach($this->obatreg->Getaprove("where idtrcom = '$kode' ")->result_array() as $role){
			$for_ttdmenge[] = $role['ttd_menyetujui'];
		}

		$for_ttdsatu = array();
		foreach($this->obatreg->Getaprove("where idtrcom = '$kode' ")->result_array() as $role){
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
		'idmengetahui' => $this->model->AmbilDataTTDMengetahui(" where role='$roles' and nama_user='$nama'")->result_array(),
		 'for_ttdmeng' => $for_ttdmenger,
		'idpengajuan' => $this->model->AmbilDataTTDMengetahui(" where role='$roles' and nama_user='$nama'")->result_array(),
        'for_ttdsatus' => $for_ttdsatu,
        'idmenyetujui' => $this->model->AmbilDataTTDMengetahui(" where role='$roles' and nama_user='$nama'")->result_array(),
		'for_ttdmen' => $for_ttdmenge,
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

	
	$this->template->display('katobat/editaprovefarmasi', $data);

	}

	function updateaprove(){
     
     $this->load->model('obatreg');
   
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

	$this->load->model('obatreg');
	$hasil = $this->obatreg->Updateapp1($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Approve data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Approve data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg');
	}
	}

function editrejectfarmasi($kode=0){
	$this->load->model('obatreg');
	
	
	$tampung = $this->obatreg->Getaprove("where idtrcom ='$kode'")->result_array();

	

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
		'tanggal' => $tampung[0]['tanggal'],
		'id_tipe_produk' => $tampung[0]['id_tipe_produk'],
		'status' => $tampung[0]['status'],
		'catatan' => $tampung[0]['catatan'],
		
			);

	
	$this->template->display('katobat/rejectfarmasi', $data);

	}

	function updatereject(){
     
     $this->load->model('obatreg');
   
	    $idtrcom=$_POST['idtrcom'];
	   	$tanggal=$_POST['tanggal'];
	   	$catatan=$_POST['catatan'];
		$id_tipe_produk=$_POST['id_tipe_produk'];
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");	
        $status=$_POST['status'];
	$data = array(
	'idtrcom' =>$this->input->post('idtrcom'),
	'tanggal' =>$this->input->post('tanggal'),
	'catatan' =>$this->input->post('catatan'),
	'id_tipe_produk' =>$this->input->post('id_tipe_produk'),
	'updateby' =>  $this->session->userdata('nama'),
	'updatedate' =>$waktusaatini,
	'status'=>$status,
		);

	$this->load->model('obatreg');
	$hasil = $this->obatreg->Updateapp1($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>reject data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>reject data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg');
	}
	}

	public function form(){
		$this->load->model('obatreg');
		$data = array(); 
		
		if(isset($_POST['preview'])){ 
			$upload = $this->obatreg->upload_file($this->filename);
			
			if($upload['result'] == "success"){ 
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); 
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				
				$data['sheet'] = $sheet; 
			}else{ 
				$data['upload_error'] = $upload['error']; 
			}
		}
		
		$this->template->Display('katobat/importexcel', $data);
	}
	
	public function import(){
		$this->load->model('obatreg');
		
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); 
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		
		$data = [];
		
		
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");	
			
		$numrow = 1;
		foreach($sheet as $row){
			
			if($numrow > 1){
				
				array_push($data, [
					
					'iddetailprod2' =>$row['A'],
					'koded_prod' =>$row['B'], 
					'harga' =>$row['C'],
					'discount' =>$row['D'],
					'tipe_harga' =>$row['E'],
					'kodis' =>$row['F'],
					'koper' =>$row['G'],
					'kode_obat' =>$row['I'],
					'kode_th' =>$row['K'],
					'idobat' =>$row['L'],
					'createby' =>  $this->session->userdata('nama'),
					
				]);
			}
		
			$numrow++; 
		}

		
		$this->obatkat->insert_multiple($data);
		
		//redirect("obat_reg");
$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'obat_reg');
                 
	}
	
}

