    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form_kegiatan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	function get_barang()
		
	{
		$this->load->model('produkom');
		$id_produk=$this->input->post('id_produk');
		$data=$this->produkom->get_data_barang_bykode($id_produk);
		echo json_encode($data);
		
	}
	
		
	public function index()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
        $kodeadmin=($this->session->userdata('nama_role'));

        if($kodeadmin=='Direktur Operasional dan Umum'){
$this->load->model('produkom'); 
		$this->load->model('form_kegiatanm'); 
		$data['data_prod'] = $this->produkom->Getprodukm("order by idpr asc")->result_array();
        $data['form_kegiatan'] = $this->form_kegiatanm->Getkegiatanview(" where status is null or status='Menunggu Disetujui' order by idfkeg asc")->result_array();
         $data['form_kegiatanreal'] = $this->form_kegiatanm->Getkegiatanview(" where status='Approve_rencana' order by idfkeg asc")->result_array();
        $data['kode_pabrik']= $this->produkom->GetKodePrinsp("order by pabrik_id ASC")->result_array();
	    $data['s_kode']= $this->produkom->Getskode("order by s_nama ASC")->result_array();
	    $data['kegiatan']= $this->form_kegiatanm->Getkegiatan("order by kode_kegiatan desc")->result_array();
	    $data['prid'] = $this->produkom->code_otomatis();
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');

}else{
		$this->load->model('produkom'); 
		$this->load->model('form_kegiatanm'); 
		$data['data_prod'] = $this->produkom->Getprodukm("order by idpr asc")->result_array();
        $data['form_kegiatan'] = $this->form_kegiatanm->Getkegiatanview(" where (nama_rs='$namars' or departemen='$dept') and (status is null or status='Revisi_rencana' or status='Not_Approved_rencana' or status='Menunggu Disetujui' )   order by idfkeg asc")->result_array();
        $data['form_kegiatanreal'] = $this->form_kegiatanm->Getkegiatanview(" where status='Approve_rencana' order by idfkeg asc")->result_array();
        $data['kode_pabrik']= $this->produkom->GetKodePrinsp("order by pabrik_id ASC")->result_array();
	    $data['s_kode']= $this->produkom->Getskode("order by s_nama ASC")->result_array();
	    $data['kegiatan']= $this->form_kegiatanm->Getkegiatan("order by kode_kegiatan desc")->result_array();
	     $data['rs']= $this->form_kegiatanm->Getrs("order by koders ASC")->result_array();
	     $data['dept']= $this->form_kegiatanm->Getdept("order by kode_depar ASC")->result_array();
	    $data['prid'] = $this->produkom->code_otomatis();
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		
		}	
		$this->template->display('form_kegiatan/form_kegiatand', $data);
	}
	
	function disetujui_rencana()
	{
		$this->load->model('produkom'); 
		$this->load->model('form_kegiatanm'); 
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
        $kodeadmin=($this->session->userdata('nama_role'));
		$data['data_prod'] = $this->produkom->Getprodukm("order by idpr asc")->result_array();
        $data['form_kegiatan'] = $this->form_kegiatanm->Getkegiatanview(" where (nama_rs='$namars' or departemen='$dept') and (status='Approve_rencana' or status='Revisi_realisasi' or status='Not_Approved_realisasi') order by idfkeg asc")->result_array();
        $data['kode_pabrik']= $this->produkom->GetKodePrinsp("order by pabrik_id ASC")->result_array();
	    $data['s_kode']= $this->produkom->Getskode("order by s_nama ASC")->result_array();
	    $data['kegiatan']= $this->form_kegiatanm->Getkegiatan("order by kode_kegiatan desc")->result_array();
	     $data['rs']= $this->form_kegiatanm->Getrs("order by koders ASC")->result_array();
	     $data['dept']= $this->form_kegiatanm->Getdept("order by kode_depar ASC")->result_array();
	    $data['prid'] = $this->produkom->code_otomatis();
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		
		$this->template->display('form_kegiatan/disetujui_rencana', $data);
	}

function selesai()
	{
		$this->load->model('produkom'); 
		$this->load->model('form_kegiatanm'); 
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
        $kodeadmin=($this->session->userdata('nama_role'));
		$data['data_prod'] = $this->produkom->Getprodukm("order by idpr asc")->result_array();
        $data['form_kegiatan'] = $this->form_kegiatanm->Getkegiatanview(" where (nama_rs='$namars' or departemen='$dept') and status='Approve_rencana' order by idfkeg asc")->result_array();
        $data['kode_pabrik']= $this->produkom->GetKodePrinsp("order by pabrik_id ASC")->result_array();
	    $data['s_kode']= $this->produkom->Getskode("order by s_nama ASC")->result_array();
	    $data['kegiatan']= $this->form_kegiatanm->Getkegiatan("order by kode_kegiatan desc")->result_array();
	     $data['rs']= $this->form_kegiatanm->Getrs("order by koders ASC")->result_array();
	     $data['dept']= $this->form_kegiatanm->Getdept("order by kode_depar ASC")->result_array();
	    $data['prid'] = $this->produkom->code_otomatis();
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		
		$this->template->display('form_kegiatan/selesai', $data);
	}

    function tampil($id)
	{
		$this->load->model('form_kegiatanm');
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			'sesi'=> $this->form_kegiatanm->Getsesi2("order by idsesi asc")->result_array(),
			 'abk' => $this->db->get_where('v_angreal',['idfkeg'=>$id])->row(),
			 'data_abks' => $this->form_kegiatanm->Getkegiatanviewreals("where idfkeg=$id and hapus_angreal=0 order by rincian_kegiatan,idangreal asc")->result_array(),
			 'data_abkss' => $this->form_kegiatanm->Getkegiatanviewdetail("where idfkeg=$id and hapus=0 order by rincian_kegiatan,idfkeg asc")->result_array(),
			 'dana' => $this->form_kegiatanm->Getsumberdana("where idfkeg=$id and hapus=0 order by idfkeg asc")->result_array(),
);
		$this->template->display('form_kegiatan/report_tampil', $data);
	}

	function tampil_rencana($id)
	{
		$this->load->model('form_kegiatanm');
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			'sesi'=> $this->form_kegiatanm->Getsesi2("order by idsesi asc")->result_array(),
			 'abk' => $this->db->get_where('v_angreal',['idfkeg'=>$id])->row(),
			 'data_abks' => $this->form_kegiatanm->Getkegiatanviewreal("where idfkeg=$id and hapus_angreal=0 order by rincian_kegiatan,idangreal asc")->result_array(),
			 'data_abkss' => $this->form_kegiatanm->Getkegiatanviewrenacana("where idfkeg=$id and hapus=0 order by rincian_kegiatan,idfkeg asc")->result_array(),
			 'dana' => $this->form_kegiatanm->Getsumberdana("where idfkeg=$id and hapus=0 order by idfkeg asc")->result_array(),
);
		$this->template->display('form_kegiatan/report_anggaran', $data);
	}
	
	
	
	// function addabk()
	// {
	// 	$this->load->model('anggaranbiayaklinik');
	// 	$this->load->model('model');
	// 	$data = array(
	// 		'nama' => $this->session->userdata('nama'),	
	// 		'cabang' => $this->session->userdata('cabang'),
	// 		'optkebutuhan' => $this->anggaranbiayaklinik->GetKebutuhan()->result_array(),		
	// 		'kd_kebutuhan' => $this->anggaranbiayaklinik->GetAnggaranBiayaKlinik()->result_array(),
			

	// 	);
		
	// 	$this->template->display('produko/add_produko', $data);
	// }

	function adddetail($id)
	{
		$this->load->model('form_kegiatanm');
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			'sesi'=> $this->form_kegiatanm->Getsesi2("order by idsesi asc")->result_array(),
			 'abk' => $this->db->get_where('v_kegtransaksi',['idfkeg'=>$id])->row(),
			 'data_abks' => $this->form_kegiatanm->Getkegiatanviewdetail("where idfkeg=$id and hapus=0 order by rincian_kegiatan,iddetkeg asc")->result_array(),
			 
		);
		
		$this->template->display('form_kegiatan/add_detailform', $data);
	}

	function adddetail2($id)
	{
		$this->load->model('form_kegiatanm');
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			'sesi'=> $this->form_kegiatanm->Getsesi2("order by idsesi asc")->result_array(),
			 'abk' => $this->db->get_where('v_angreal',['idfkeg'=>$id])->row(),
			 'data_abks' => $this->form_kegiatanm->Getkegiatanviewreal("where idfkeg=$id and hapus_angreal=0 order by rincian_kegiatan,idangreal asc")->result_array(),
			 'data_abkss' => $this->form_kegiatanm->Getkegiatanviewdetail("where idfkeg=$id and hapus=0 order by rincian_kegiatan,iddetkeg asc")->result_array(),
			 
		);
		
		$this->template->display('form_kegiatan/add_realisasi', $data);
	}

	function addsumber($id)
	{
		$this->load->model('form_kegiatanm');
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'abk' => $this->db->get_where('v_sumberdana',['idfkeg'=>$id])->row(),
			 'data_abks' => $this->form_kegiatanm->Getsumberdana("where idfkeg=$id and hapus=0 order by idfkeg asc")->result_array(),
			 
		);
		
		$this->template->display('form_kegiatan/add_sumberdana', $data);
	}


	function savedatas(){
		$this->load->model('form_kegiatanm');
		
		$kode_kegiatan = $_POST['kode_kegiatan'];
		$judul_kegiatan = $_POST['judul_kegiatan'];
		$nama_rs = $_POST['nama_rs'];
		$departemen = $_POST['departemen'];
		$tanggal_acara = $_POST['tanggal_acara'];
			
		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	

		$data = array(	
			'kode_kegiatan' => $kode_kegiatan,
			'judul_kegiatan' => $judul_kegiatan,
			'nama_rs' => $nama_rs,
			'departemen' => $departemen,
			'tanggal_acara' => $tanggal_acara,
			'createdate' => $waktusaatini,
			'createby' =>  $this->session->userdata('nama'),			
			);

		
		
		
		$result = $this->form_kegiatanm->Simpan('form_kegiatan', $data);
		
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data user BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'form_kegiatan');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'form_kegiatan');
		}		
	}

	function savedata_rencana(){

		$this->load->model('form_kegiatanm');

	// 	$this->load->library('form_validation');
		   
		  
 //   $this->form_validation->set_rules('jumlah','jumlah','trim|required|numeric');
 //   $this->form_validation->set_rules('harga','harga','trim|required|numeric');

 // if($this->form_validation->run() == TRUE)
	// 			{
		
		$kode_detail = $_POST['kode_detail'];
		$rincian_kegiatan = $_POST['rincian_kegiatan'];
		$kegiatan = $_POST['kegiatan'];
		$jumlah = $_POST['jumlah'];
		$harga = $_POST['harga'];
		$hapus = 0;	
		
		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	
             

            
		$data= array(	
			'kode_detail' => $kode_detail,
			'rincian_kegiatan' => $rincian_kegiatan,
			'kegiatan' => $kegiatan,
			'jumlah' => $jumlah,
			 'harga' => $harga,
			  'hapus' => $hapus,
			'createdate' => $waktusaatini,
			'createby' =>  $this->session->userdata('nama'),			
			);

		// }
		
		
		$result = $this->form_kegiatanm->Simpan('tb_detailkegi', $data);
		
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data user BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'form_kegiatan/adddetail/'.$kode_detail.'');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'form_kegiatan/adddetail/'.$kode_detail.'');
		}		

		// }else{
		//  	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>nilai harus angka</strong></div>");
		//  	header('location:'.base_url().'form_kegiatan');
		//  }	
		
	}

	function savedata_real(){
		$this->load->model('form_kegiatanm');



		$rincian_kegiatan = $_POST['rincian_kegiatan'];
		$kegiatan = $_POST['kegiatan'];
		$jumlah = $_POST['jumlah'];
		$harga = $_POST['harga'];
		$kode_angreal = $_POST['kode_angreal'];
		$harga_real = $_POST['harga_real'];
		$jumlah_real = $_POST['jumlah_real'];
		$hapus = 0;	
		
		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	
             
      $data = array();
		for ($i = 0; $i < count($this->input->post('harga_real')); $i++)
        	 {
            
		$data[$i]= array(	
			'kode_angreal' => $kode_angreal,
			'harga_real' => $harga_real[$i],
			'rincian_kegiatan' => $rincian_kegiatan[$i],
			'kegiatan' => $kegiatan[$i],
			'jumlah' => $jumlah[$i],
			 'harga' => $harga[$i],
			 'jumlah_real' => $jumlah_real[$i],
			'hapus' => $hapus,
			'createdate' => $waktusaatini,
			'createby' =>  $this->session->userdata('nama'),			
			);

		}
		
		
		$result = $this->form_kegiatanm->Simpanall('ang_real', $data);
		
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data user BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'form_kegiatan/adddetail2/'.$kode_angreal.'');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'form_kegiatan/adddetail2/'.$kode_angreal.'');
		}	


		
	}
	
	function savedata_dana(){
		$this->load->model('form_kegiatanm');
		
	// 	$this->load->library('form_validation');
		   
		  
 //   $this->form_validation->set_rules('qty','qty','trim|required|numeric');
 //   $this->form_validation->set_rules('harga','harga','trim|required|numeric');

 // if($this->form_validation->run() == TRUE)
	// 			{

		$kode_dana = $_POST['kode_dana'];
		$sumber_dana= $_POST['sumber_dana'];
		$qty = $_POST['qty'];
		$harga = $_POST['harga'];
        $hapus = 0;
		
		
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");	
            
		$data= array(	
			'kode_dana' => $kode_dana,
			'sumber_dana' => $sumber_dana,
			'qty' => $qty,
			'harga' => $harga,
			'hapus' => $hapus,
			'createdate' => $waktusaatini,
			'createby' =>  $this->session->userdata('nama'),			
			);

		
		
		
		$result = $this->form_kegiatanm->Simpan('sumber_dana', $data);
		
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data user BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'form_kegiatan/addsumber/'.$kode_dana.'');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'form_kegiatan/addsumber/'.$kode_dana.'');
		}

		 // }else{
		 // 	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>nilai harus angka</strong></div>");
		 // 	header('location:'.base_url().'form_kegiatan');
		 // }	
		
	}



	function editrealisasi($kode=0){
	$this->load->model('form_kegiatanm');
	
	
	$data_abk = $this->form_kegiatanm->Ambilkeg("where idfkeg ='$kode'")->result_array();
    
    $for_bankum = array();
		foreach($this->form_kegiatanm->Ambilkeg("where idfkeg = '$kode' ")->result_array() as $banku){
			$for_bankum[] = $banku['kode_kegiatan'];
		}

		
	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'idfkeg' => $data_abk[0]['idfkeg'],	
		'banku' => $this->form_kegiatanm->Getkegiatan()->result_array(),
		'for_bankum' => $for_bankum,
		'judul_kegiatan' => $data_abk[0]['judul_kegiatan'],
		'departemen' => $data_abk[0]['departemen'],
		'nama_rs' =>  $data_abk[0]['nama_rs'],
		'tanggal_acara' =>  $data_abk[0]['tanggal_acara'],
		'status' =>  $data_abk[0]['status'],
		'catatan' =>  $data_abk[0]['catatan'],
		
	);

	
	$this->template->display('form_kegiatan/edit_realisasi', $data);

	}


	function updaterealisasi(){
     
     $this->load->model('form_kegiatanm');

		$idfkeg=$_POST['idfkeg'];
		$kode_kegiatan = $_POST['kode_kegiatan'];
		$judul_kegiatan = $_POST['judul_kegiatan'];
		$departemen = $_POST['departemen'];
		$nama_rs = $_POST['nama_rs'];	
		$tanggal_acara = $_POST['tanggal_acara'];
		$status = $_POST['status'];	
		$catatan = $_POST['catatan'];		
		
	$data = array(
	'idfkeg' =>$this->input->post('idfkeg'),
	'kode_kegiatan' =>$this->input->post('kode_kegiatan'),
	'judul_kegiatan' =>$this->input->post('judul_kegiatan'),
	'departemen' => $this->input->post('departemen'),
	'nama_rs' =>$this->input->post('nama_rs'),
	'tanggal_acara' =>$this->input->post('tanggal_acara'),
	'status' =>$this->input->post('status'),
	'catatan' =>$this->input->post('catatan'),
	'updateby' =>  $this->session->userdata('nama'),
	'updatedate' => date("Y-m-d H:i:s"),
	);

	$this->load->model('form_kegiatanm');
	$hasil = $this->form_kegiatanm->Updatekeg($data);
	if($hasil>=0){
	$this->session->set_flashdata("suksess", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'form_kegiatan');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'form_kegiatan');
	}
	}

	function editabk($kode=0){
	$this->load->model('form_kegiatanm');
	
	
	$data_abk = $this->form_kegiatanm->Ambilkeg("where idfkeg ='$kode'")->result_array();
    
    $for_bankum = array();
		foreach($this->form_kegiatanm->Ambilkeg("where idfkeg = '$kode' ")->result_array() as $banku){
			$for_bankum[] = $banku['kode_kegiatan'];
		}

		
	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'idfkeg' => $data_abk[0]['idfkeg'],	
		'banku' => $this->form_kegiatanm->Getkegiatan()->result_array(),
		'for_bankum' => $for_bankum,
		'departemen' => $data_abk[0]['departemen'],
		'judul_kegiatan' => $data_abk[0]['judul_kegiatan'],
		'nama_rs' =>  $data_abk[0]['nama_rs'],
		'tanggal_acara' =>  $data_abk[0]['tanggal_acara'],
		'status' =>  $data_abk[0]['status'],
		'catatan' =>  $data_abk[0]['catatan'],
		
	);

	
	$this->template->display('form_kegiatan/edit_ang', $data);

	}


	function updateabk(){
     
     $this->load->model('form_kegiatanm');

		$idfkeg=$_POST['idfkeg'];
		$kode_kegiatan = $_POST['kode_kegiatan'];
		$judul_kegiatan = $_POST['judul_kegiatan'];
		$departemen = $_POST['departemen'];
		$nama_rs = $_POST['nama_rs'];	
		$tanggal_acara = $_POST['tanggal_acara'];
		$status = $_POST['status'];	
		$catatan = $_POST['catatan'];		
		
	$data = array(
	'idfkeg' =>$this->input->post('idfkeg'),
	'kode_kegiatan' =>$this->input->post('kode_kegiatan'),
	'judul_kegiatan' =>$this->input->post('judul_kegiatan'),
	'departemen' => $this->input->post('departemen'),
	'nama_rs' =>$this->input->post('nama_rs'),
	'tanggal_acara' =>$this->input->post('tanggal_acara'),
	'status' =>$this->input->post('status'),
	'catatan' =>$this->input->post('catatan'),
	'updateby' =>  $this->session->userdata('nama'),
	'updatedate' => date("Y-m-d H:i:s"),
	);

	$this->load->model('form_kegiatanm');
	$hasil = $this->form_kegiatanm->Updatekeg($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'form_kegiatan');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'form_kegiatan');
	}
	}

	function editreal($kode=0){
	$this->load->model('form_kegiatanm');
	
	
	$data_abk = $this->form_kegiatanm->Ambilreal("where idangreal ='$kode'")->result_array();
    
    		
	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'idangreal' => $data_abk[0]['idangreal'],	
		'kode_angreal' => $data_abk[0]['kode_angreal'],
		'rincian_kegiatan' =>  $data_abk[0]['rincian_kegiatan'],
		'kegiatan' => $data_abk[0]['kegiatan'],	
		'jumlah' => $data_abk[0]['jumlah'],
		'harga' =>  $data_abk[0]['harga'],
		'harga_real' =>  $data_abk[0]['harga_real'],
		'jumlah_real' =>  $data_abk[0]['jumlah_real'],
		
	);

	
	$this->template->display('form_kegiatan/edit_real', $data);

	}


	function updatereal(){
     
     $this->load->model('form_kegiatanm');

		$idangreal=$_POST['idangreal'];
		$kode_angreal = $_POST['kode_angreal'];
		$rincian_kegiatan = $_POST['rincian_kegiatan'];
		$kegiatan = $_POST['kegiatan'];
		$jumlah=$_POST['jumlah'];
		$harga = $_POST['harga'];
		$harga_real = $_POST['harga_real'];
		$jumlah_real = $_POST['jumlah_real'];
					
		
	$data = array(
	'idangreal' =>$this->input->post('idangreal'),
	'kode_angreal' =>$this->input->post('kode_angreal'),
	'rincian_kegiatan' => $this->input->post('rincian_kegiatan'),
	'kegiatan' =>$this->input->post('kegiatan'),
	'jumlah' =>$this->input->post('jumlah'),
	'harga' => $this->input->post('harga'),
	'harga_real' =>$this->input->post('harga_real'),
     'jumlah_real' =>$this->input->post('jumlah_real'),	
	);

	$this->load->model('form_kegiatanm');
	$hasil = $this->form_kegiatanm->Updatereal($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'form_kegiatan/adddetail2/'.$kode_angreal.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'form_kegiatan/adddetail2/'.$kode_angreal.'');
	}
	}

	function editdetail($kode=0){
	$this->load->model('form_kegiatanm');
	
	
	$data_abk = $this->form_kegiatanm->Getkegiatanviewdetail("where iddetkeg ='$kode'")->result_array();
    
    		
	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'iddetkeg' => $data_abk[0]['iddetkeg'],	
		'kode_detail' => $data_abk[0]['kode_detail'],
		'rincian_kegiatan' =>  $data_abk[0]['rincian_kegiatan'],
		'kegiatan' => $data_abk[0]['kegiatan'],	
		'jumlah' => $data_abk[0]['jumlah'],
		'harga' =>  $data_abk[0]['harga'],
		'nama_sesi' =>  $data_abk[0]['nama_sesi'],
				
	);

	
	$this->template->display('form_kegiatan/edit_detail', $data);

	}


	function updatedetail(){
     
     $this->load->model('form_kegiatanm');

		$iddetkeg=$_POST['iddetkeg'];
		$kode_detail = $_POST['kode_detail'];
		$rincian_kegiatan = $_POST['rincian_kegiatan'];
		$kegiatan = $_POST['kegiatan'];
		$jumlah=$_POST['jumlah'];
		$harga = $_POST['harga'];
							
		
	$data = array(
	'iddetkeg' =>$this->input->post('iddetkeg'),
	'kode_detail' =>$this->input->post('kode_detail'),
	'rincian_kegiatan' => $this->input->post('rincian_kegiatan'),
	'kegiatan' =>$this->input->post('kegiatan'),
	'jumlah' =>$this->input->post('jumlah'),
	'harga' => $this->input->post('harga'),
		
	);

	$this->load->model('form_kegiatanm');
	$hasil = $this->form_kegiatanm->Updaterencana($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'form_kegiatan/adddetail/'.$kode_detail.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'form_kegiatan/adddetail/'.$kode_detail.'');
	}
	}

	function updateprod(){
     
     $this->load->model('produkom');

		$idpr=$_POST['idpr'];
		$tipe_produk = $_POST['tipe_produk'];
		$prid = $_POST['prid'];
		$pabrik_id = $_POST['pabrik_id'];
		$nama_pt = $_POST['nama_pt'];
		$s_kode = $_POST['s_kode'];		
		$createby = $_POST['createby'];
		$createdate = $_POST['createdate'];

	$data = array(
	'idpr' =>$this->input->post('idpr'),
	'tipe_produk' =>$this->input->post('tipe_produk'),
	'prid' =>$this->input->post('prid'),
	'pabrik_id' => $this->input->post('pabrik_id'),
	'nama_pt' => $this->input->post('nama_pt'),
	's_kode' =>$this->input->post('s_kode'),
	'createby' => $this->input->post('createby'),
	'createdate' => $this->input->post('createdate'),
	'updateby' =>  $this->session->userdata('nama'),
	'updatedate' => date("Y-m-d H:i:s"),
	);

	$this->load->model('produkom');
	$hasil = $this->produkom->Updateprodukm($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'produko');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'produko');
	}
	}




	function hapusprod($kode = 1){
	$this->load->model('form_kegiatanm');	
	$result = $this->form_kegiatanm->Hapus('form_kegiatan', array('idfkeg' => $kode));
	$result = $this->form_kegiatanm->Hapus('tb_detailkegi', array('kode_detail'=> $kode));
	$result = $this->form_kegiatanm->Hapus('sumber_dana', array('kode_dana'=> $kode));
	$result = $this->form_kegiatanm->Hapus('ang_real', array('kode_angreal'=> $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'form_kegiatan');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'form_kegiatan');
	}
	}

	

	function hapusdana(){
     
    

	    $iddana=$_POST['iddana'];
		$kode_dana = $_POST['kode_dana'];
		$sumber_dana = $_POST['sumber_dana'];
		$qty = $_POST['qty'];
		$harga = $_POST['harga'];
		$hapus = 1;		
		
		

	$data = array(
	'iddana' =>$this->input->post('iddana'),
	'kode_dana' =>$this->input->post('kode_dana'),
	'sumber_dana' =>$this->input->post('sumber_dana'),
	'qty' => $this->input->post('qty'),
	'harga' =>$this->input->post('harga'),
	'hapus' => $hapus,
	);

	$this->load->model('form_kegiatanm');
	$hasil = $this->form_kegiatanm->Updatedana($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'form_kegiatan/addsumber/'.$kode_dana.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'form_kegiatan/addsumber/'.$kode_dana.'');
	}
	}

	function hapusrencana(){
     
     $this->load->model('form_kegiatanm');
     

	    $iddetkeg=$_POST['iddetkeg'];
		$kode_detail = $_POST['kode_detail'];
		$rincian_kegiatan = $_POST['rincian_kegiatan'];
		$kegiatan = $_POST['kegiatan'];
		$jumlah = $_POST['jumlah'];
		$harga = $_POST['harga'];
		$hapus = 1;		
		

	$data = array(
	'iddetkeg' => $iddetkeg,
	'kode_detail' => $kode_detail,
	'rincian_kegiatan' => $rincian_kegiatan,
	'kegiatan' => $kegiatan,
	'jumlah' => $jumlah,
	 'harga' => $harga,
	  'hapus' => $hapus,
		);

	$this->load->model('form_kegiatanm');
	$hasil = $this->form_kegiatanm->Updaterencana($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'form_kegiatan/adddetail/'.$kode_detail.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'form_kegiatan/adddetail/'.$kode_detail.'');
	}
	}

	function hapusreal(){
     
     $this->load->model('form_kegiatanm');
     

	    $idangreal=$_POST['idangreal'];
		$kode_angreal = $_POST['kode_angreal'];
		$rincian_kegiatan = $_POST['rincian_kegiatan'];
		$kegiatan = $_POST['kegiatan'];
		$jumlah = $_POST['jumlah'];
		$harga = $_POST['harga'];
		$harga_real = $_POST['harga_real'];
		$hapus = 1;		
		

	$data = array(
	'idangreal' => $idangreal,
	'kode_angreal' => $kode_angreal,
	'rincian_kegiatan' => $rincian_kegiatan,
	'kegiatan' => $kegiatan,
	'jumlah' => $jumlah,
	 'harga' => $harga,
	 'harga_real' => $harga_real,
	  'hapus' => $hapus,
		);

	$this->load->model('form_kegiatanm');
	$hasil = $this->form_kegiatanm->Updatereal($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'form_kegiatan/adddetail2/'.$kode_angreal.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'form_kegiatan/adddetail2/'.$kode_angreal.'');
	}
	}
}

