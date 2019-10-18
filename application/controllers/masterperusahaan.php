<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Masterperusahaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('u_name')){
		$this->session->set_flashdata("alerts", "<div class='alerts alert-danger'><strong>Sesi Anda Telah Habis, Silahkan login kembali..</strong></div>");
			redirect('dashboard');

		}
	}
	
	public function hapusperusahaan($koper)
    {
         // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
         $koper = $this->input->post('koper');
         $this->modelperusahaan->hapusaja($koper);
         redirect('masterperusahaan');
    }

	public function hapusperusahaan_new($koper)
	{
		if($this->modelperusahaan->hapusaja($koper) == false)
		{
			$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
		}
		redirect('masterperusahaan');	
			
			
	}
		
		
		
	
	
	//crud Master Perusahaan obat --------------------------------------------
	
	function get_tipe_produk()
		
		{
		$this->load->model('modelperusahaan');
		$id_tipe_produk=$this->input->post('id_tipe_produk');
		$data=$this->modelperusahaan->get_data_tipe_bykode($id_tipe_produk);
		echo json_encode($data);
		}
		
	function get_jenis_pekerjaan()
		
		{
		$this->load->model('modelperusahaan');
		$kode_jenis=$this->input->post('kode_jenis');
		$data=$this->modelperusahaan->get_jenis_pekerjaan_bykode($kode_jenis);
		echo json_encode($data);
		}
	


	public function index()
	{
		$this->load->model('modelperusahaan');
	
		$data = array(
		    'koper' => $this->modelperusahaan->code_otomatis(),
			'namars' => $this->session->userdata('namars'),	
			'koders' => '',
			'cdate' => '',
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'dd_tipe' => $this->modelperusahaan->Get_dd_tipe("order by id_tipe_produk")->result_array(),

			'data_perusahaan' => $this->modelperusahaan->GetEva(" where tipe_produk='OBAT' order by id_perusahaan asc")->result_array(),
		);

	$this->template->Display('masterperusahaan/data_perusahaan',$data);
	}
	
	
	function viewperusahaan_obat()
	{
		$this->load->model('modelperusahaan');
		// $data['koper'] = $this->modelperusahaan->code_otomatis();
		$data = array(
       

			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'data_perusahaan' => $this->modelperusahaan->GetEva("where tipe_produk='OBAT' order by id_perusahaan asc")->result_array(),			
		    // 'koper' => $this->modelperusahaan->code_otomatis(),
	//		'koders' => $this->session->userdata('koders'),	
	//		'namars' => $this->session->userdata('namars'),
		);
		$this->template->Display('masterperusahaan/view_perusahaan',$data);
	
	}
	
	
	
	function editmasterperusahaan($id_perusahaan=1){		
	$this->load->model('modelperusahaan');
	
	 $id_tp_post_array = array();
		foreach($this->modelperusahaan->GetEva("where id_perusahaan = '$id_perusahaan'")->result_array() as $dd_tipe){
			$id_tp_post_array[] = $dd_tipe['id_tipe_produk'];
		} 
			//$tampung = $this->modelperusahaan->GetWhere("where master_perusahaan = '$id_perusahaan'")->result_array();
		$tampung = $this->modelperusahaan->GetWhere('master_perusahaan', array('id_perusahaan' => $id_perusahaan));
		$data = array(
			//'createdate' => $tampung[0]['createdate'],
			'id_perusahaan' => $tampung[0]['id_perusahaan'],
			'nm_perusahaan' => $tampung[0]['nm_perusahaan'],
			'koper' => $tampung[0]['koper'],
			'tipe_produk' => $tampung[0]['tipe_produk'],
			'foi' => $tampung[0]['foi'],
			'mou' => $tampung[0]['mou'],
			'pks' => $tampung[0]['pks'],
			'bidang_pekerjaan' => $tampung[0]['bidang_pekerjaan'],
			'maincon' => $tampung[0]['maincon'],
			'subcon' => $tampung[0]['subcon'],
			'keterangan' => $tampung[0]['keterangan'],
			'bidang_pekerjaan' => $tampung[0]['principal'],
			'maincon' => $tampung[0]['maincon'],
			'subcon' => $tampung[0]['subcon'],
			'keterangan' => $tampung[0]['keterangan'],
			// 'id_tipe_produk' => $this->model->GetRumahSakit("where koders != '$kode' order by koders asc")->result_array(),
			
            // 'id_tipe_produk' => $this->modelperusahaan->Get_dd_tipe(" order by id_tipe_produk asc")->result_array(),
			'dd_tipe' => $this->modelperusahaan->Get_dd_tipe("order by id_tipe_produk asc")->result_array(),
			'dd_tipe_post' => $id_tp_post_array,
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			
		
			
			);
		$this->template->Display('masterperusahaan/edit_perusahaan_2',$data);
	}

	function savedata(){
		
		$this->load->model('modelperusahaan');
		//if($_POST){
			//$id_perusahaan = $_POST['id_perusahaan'];
			$nm_perusahaan = $_POST['nm_perusahaan'];
			$koper = $_POST['koper'];
			$id_tipe_produk= $_POST['id_tipe_produk'];
			$tipe_produk = $_POST['tipe_produk'];
			$foi = $_POST['foi'];
			if ($foi==''){
				$foi='0';				
			}else{
			$foi=$foi;	
			}
			$mou = $_POST['mou'];
			if ($mou==''){
				$mou='0';				
			}else{
			$mou=$mou;	
			}
			$pks = $_POST['pks'];
			
			
			
			//$createdate = $_POST ['createdate'];

			$userlog = ($this->session->userdata('nama')
		);
        $data_dist = $this->modelperusahaan->GetEva("where koper='$koper'")->result_array();
		
		
			$data = array(
			
			//'id_perusahaan' =>$id_perusahaan,
			'koper' =>$koper,
			'nm_perusahaan' =>$nm_perusahaan,
			'id_tipe_produk' =>$id_tipe_produk,
			'tipe_produk' =>$tipe_produk,
			'foi' =>$foi,
			'mou' =>$mou,
			'pks' =>$pks,
			
			
			
 			// 'koper' =>$koper,
			// 'createdate' => date("Y-m-d H:i:s"),
		
			'createby'=>$userlog 

			//if($status == "baru"){
				//$data = array(
					//'koders' => $koders,
					//'namars' => $namars,
					//'cdate' => date("Y-m-d H:i:s"),
					);
			$pbid = isset($data_dist[0]['koper']);		
					
					
					
		if($pbid == $koper ){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong> Perusahaan dengan NO : ".$koper."  tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'masterperusahaan');
		}else{
		 
		
		$result = $this->modelperusahaan->Simpan_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'masterperusahaan');
		}
	
	}

	function update_perusahaan(){
	$this->load->model('modelperusahaan');
	$dt = new DateTime();
			$id_perusahaan = $_POST['id_perusahaan'];
    	    $nm_perusahaan = $_POST['nm_perusahaan'];
			$koper = $_POST['koper'];
			// $id_tipe_produk= $_POST['id_tipe_produk'];
			// $tipe_produk = $_POST['tipe_produk'];
			$foi = $_POST['foi'];
			if ($foi==''){
				$foi='0';				
			}else{
			$foi=$foi;	
			}
			$mou = $_POST['mou'];
			if ($mou==''){
				$mou='0';				
			}else{
			$mou=$mou;	
			}
			$pks = $_POST['pks'];
	

		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("Y-m-d H:i:s");  

	$data = array(
	'id_perusahaan' =>$id_perusahaan,
	'koper' => $koper,
	'nm_perusahaan' => $nm_perusahaan,
	// 'id_tipe_produk' => $id_tipe_produk,
	// 'tipe_produk' => $tipe_produk,
	'foi' => $foi,
	'mou' => $mou,
	'pks' => $pks,
	'updatedate' => $waktu,
	'updateby' =>  $this->session->userdata('nama'),
	);

	$hasil = $this->modelperusahaan->update_perusahaan($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data dengan NO : ".$data['koper']." BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'masterperusahaan');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'masterperusahaan');
	}
	}
	

	function hapus_perusahaan($id_perusahaan){
			
		$this->load->model('modelperusahaan');	
	    $hapus['id_perusahaan'] = $this->uri->segment(3);
	
	    $hasil = $this->modelperusahaan->deleteData("master_perusahaan",$hapus);

       	if($hasil>=0){
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>DELETE data dengan NO : ".$hapus['koper']." BERHASIL di lakukan</strong></div>");
		header('location:'.base_url().'masterperusahaan');
		}else{
		$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
		header('location:'.base_url().'masterperusahaan');
		}
		
    }
	
	
	//crud Master perusahaan Depbang --------------------------------------------
	
	
	public function dataperusahaan_depbang()
	{
		$this->load->model('modelperusahaan');
	
		$data = array(
		    'koper' => $this->modelperusahaan->code_otomatis(),
			'namars' => $this->session->userdata('namars'),	
			'koders' => '',
			'cdate' => '',
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'dd_jenis_pekerjaan' => $this->modelperusahaan->Get_dd_jenis_pekerjaan("order by id_jenis_pekerjaan")->result_array(),
            'dd_tipe' => $this->modelperusahaan->Get_dd_tipe("order by id_tipe_produk")->result_array(),
			'data_perusahaan' => $this->modelperusahaan->GetEva(" where tipe_produk='DEPBANG' order by id_perusahaan asc")->result_array(),
		);

	$this->template->Display('masterperusahaan/data_perusahaan_depbang',$data);
	}
	
	function viewperusahaan_depbang()
	{
		$this->load->model('modelperusahaan');
		// $data['koper'] = $this->modelperusahaan->code_otomatis();
		$data = array(
       

			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'data_perusahaan' => $this->modelperusahaan->GetEva("where tipe_produk='DEPBANG' order by id_perusahaan asc")->result_array(),			
		    // 'koper' => $this->modelperusahaan->code_otomatis(),
	//		'koders' => $this->session->userdata('koders'),	
	//		'namars' => $this->session->userdata('namars'),
		);
		$this->template->Display('masterperusahaan/view_perusahaan_depbang',$data);
	
	}
	
	function editmasterperusahaan_depbang($id_perusahaan=1){		
	$this->load->model('modelperusahaan');
	
	 $id_tp_post_array = array();
		foreach($this->modelperusahaan->GetEva("where id_perusahaan = '$id_perusahaan'")->result_array() as $dd_tipe){
			$id_tp_post_array[] = $dd_tipe['id_tipe_produk'];
		} 
		
	$id_kerja_post_array = array();
		foreach($this->modelperusahaan->GetEva("where id_perusahaan = '$id_perusahaan'")->result_array() as $dd_jenis_pekerjaan){
			$id_kerja_post_array[] = $dd_jenis_pekerjaan['kode_jenis'];
		} 
		
			//$tampung = $this->modelperusahaan->GetWhere("where master_perusahaan = '$id_perusahaan'")->result_array();
		$tampung = $this->modelperusahaan->GetWhere('master_perusahaan', array('id_perusahaan' => $id_perusahaan));
		$data = array(
			//'createdate' => $tampung[0]['createdate'],
			'id_perusahaan' => $tampung[0]['id_perusahaan'],
			'nm_perusahaan' => $tampung[0]['nm_perusahaan'],
			'koper' => $tampung[0]['koper'],
			'tipe_produk' => $tampung[0]['tipe_produk'],
			'foi' => $tampung[0]['foi'],
			'mou' => $tampung[0]['mou'],
			'pks' => $tampung[0]['pks'],
			'bidang_pekerjaan' => $tampung[0]['bidang_pekerjaan'],
			'maincon' => $tampung[0]['maincon'],
			'subcon' => $tampung[0]['subcon'],
			'konsultan' => $tampung[0]['konsultan'],
			'keterangan' => $tampung[0]['keterangan'],
			'principal' => $tampung[0]['principal'],
			'solo_agent' => $tampung[0]['solo_agent'],
			'distributor' => $tampung[0]['distributor'],
			'subdistributor' => $tampung[0]['subdistributor'],
			// 'id_tipe_produk' => $this->model->GetRumahSakit("where koders != '$kode' order by koders asc")->result_array(),
			
            // 'id_tipe_produk' => $this->modelperusahaan->Get_dd_tipe(" order by id_tipe_produk asc")->result_array(),
			'dd_jenis_pekerjaan' => $this->modelperusahaan->Get_dd_jenis_pekerjaan("order by id_jenis_pekerjaan")->result_array(),
			'dd_tipe' => $this->modelperusahaan->Get_dd_tipe("order by id_tipe_produk asc")->result_array(),
			'dd_tipe_post' => $id_tp_post_array,
			'dd_kerja_post' => $id_kerja_post_array,
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			
		
			
			);
		$this->template->Display('masterperusahaan/edit_perusahaan_depbang',$data);
	}
	
	function savedata_depbang(){
		
		$this->load->model('modelperusahaan');
		//if($_POST){
			//$id_perusahaan = $_POST['id_perusahaan'];
			$nm_perusahaan = $_POST['nm_perusahaan'];
			$koper = $_POST['koper'];
			$id_tipe_produk= $_POST['id_tipe_produk'];
			$tipe_produk = $_POST['tipe_produk'];
			$foi = $_POST['foi'];
			if ($foi==''){
				$foi='0';				
			}else{
			$foi=$foi;	
			}
			$mou = $_POST['mou'];
			if ($mou==''){
				$mou='0';				
			}else{
			$mou=$mou;	
			}
			$pks = $_POST['pks'];
			$bidang_pekerjaan = $_POST['bidang_pekerjaan'];
			$maincon = $_POST['maincon'];
			if ($maincon==''){
				$maincon='0';				
			}else{
			$maincon=$maincon;	
			}
			$subcon = $_POST['subcon'];
			if ($subcon==''){
				$subcon='0';				
			}else{
			$subcon=$subcon;	
			}
			
			$konsultan = $_POST['konsultan'];
			if ($konsultan==''){
				$konsultan='0';				
			}else{
			$konsultan=$konsultan;	
			}
			
			$kode_jenis = $_POST['kode_jenis'];
			$keterangan = $_POST['keterangan'];
			
			$principal = $_POST['principal'];
			if ($principal==''){
				$principal='0';				
			}else{
			$principal=$principal;	
			}
			
			$solo_agent = $_POST['solo_agent'];
			if ($solo_agent==''){
				$solo_agent='0';				
			}else{
			$solo_agent=$solo_agent;
			}
			
			$distributor = $_POST['distributor'];
			if ($distributor==''){
				$distributor='0';				
			}else{
			$distributor=$distributor;
			}
			
			$subdistributor = $_POST['subdistributor'];
			if ($subdistributor==''){
				$subdistributor='0';				
			}else{
			$subdistributor=$subdistributor;
			}
			
			
			//$createdate = $_POST ['createdate'];

			$userlog = ($this->session->userdata('nama')
		);
        $data_dist = $this->modelperusahaan->GetEva("where koper='$koper'")->result_array();
		
		
			$data = array(
			
			//'id_perusahaan' =>$id_perusahaan,
			'koper' =>$koper,
			'nm_perusahaan' =>$nm_perusahaan,
			'id_tipe_produk' =>$id_tipe_produk,
			'tipe_produk' =>$tipe_produk,
			'foi' =>$foi,
			'mou' =>$mou,
			'pks' =>$pks,
			'kode_jenis' =>$kode_jenis,
			'bidang_pekerjaan' =>$bidang_pekerjaan,
			'maincon' =>$maincon,
			'subcon' =>$subcon,
			'konsultan' =>$konsultan,
			'keterangan' =>$keterangan,
			'principal' =>$principal,
			'solo_agent' =>$solo_agent,
			'distributor' =>$distributor,
			'subdistributor'=>$subdistributor,
			
			
 			// 'koper' =>$koper,
			// 'createdate' => date("Y-m-d H:i:s"),
		
			'createby'=>$userlog 

			//if($status == "baru"){
				//$data = array(
					//'koders' => $koders,
					//'namars' => $namars,
					//'cdate' => date("Y-m-d H:i:s"),
					);
			$pbid = isset($data_dist[0]['koper']);		
					
					
					
		if($pbid == $koper ){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong> Distributor dengan NO : ".$koper."  tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'masterperusahaan/dataperusahaan_depbang');
		}else{
		 
		
		$result = $this->modelperusahaan->Simpan_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'masterperusahaan/dataperusahaan_depbang');
		}
			
	}
		
	function updatedepbang(){
	$this->load->model('modelperusahaan');
	$dt = new DateTime();
			$id_perusahaan = $_POST['id_perusahaan'];
    	    $nm_perusahaan = $_POST['nm_perusahaan'];
			$koper = $_POST['koper'];
			$id_tipe_produk= $_POST['id_tipe_produk'];
			$tipe_produk = $_POST['tipe_produk'];
			$bidang_pekerjaan = $_POST['bidang_pekerjaan'];
			$maincon = $_POST['maincon'];
			if ($maincon==''){
				$maincon='0';				
			}else{
			$maincon=$maincon;	
			}
			$subcon = $_POST['subcon'];
			if ($subcon==''){
				$subcon='0';				
			}else{
			$subcon=$subcon;	
			}
			
			$konsultan = $_POST['konsultan'];
			if ($konsultan==''){
				$konsultan='0';				
			}else{
			$konsultan=$konsultan;	
			}
			
			$kode_jenis = $_POST['kode_jenis'];
			$keterangan = $_POST['keterangan'];
	

		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("Y-m-d H:i:s");  
		
	  

			$data = array(
			'id_perusahaan' =>$id_perusahaan,
			'koper' => $koper,
			'nm_perusahaan' => $nm_perusahaan,
			'id_tipe_produk' => $id_tipe_produk,
			'tipe_produk' => $tipe_produk,
			'maincon' => $maincon,
			'subcon' => $subcon,
			'konsultan' => $konsultan,
			'bidang_pekerjaan'=> $bidang_pekerjaan,
			'kode_jenis' => $kode_jenis,
			'keterangan' => $keterangan,
			'updatedate' => $waktu,
			'updateby' =>  $this->session->userdata('nama'),
			);

	$hasil = $this->modelperusahaan->updateperusdepbang($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data dengan NO : ".$data['koper']." BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'masterperusahaan/dataperusahaan_depbang');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'masterperusahaan/dataperusahaan_depbang');
	}
	}
	
    function hapus_perusahaan_depbang($koper){
			
		$this->load->model('modelperusahaan');	
	    $hapus['koper'] = $this->uri->segment(3);
	
	    $hasil = $this->modelperusahaan->deleteData("master_perusahaan",$hapus);

       	if($hasil>=0){
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>DELETE data dengan NO : ".$hapus['koper']." BERHASIL di lakukan</strong></div>");
		header('location:'.base_url().'masterperusahaan/dataperusahaan_depbang');
		}else{
		$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
		header('location:'.base_url().'masterperusahaan/dataperusahaan_depbang');
		}
		
    }
	
	
	//crud Master perusahaan Alum --------------------------------------------
	
	function viewperusahaan_alum()
	{
		$this->load->model('modelperusahaan');
		// $data['koper'] = $this->modelperusahaan->code_otomatis();
		$data = array(
       

			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'data_perusahaan' => $this->modelperusahaan->GetEva("where tipe_produk='ALUM' order by id_perusahaan asc")->result_array(),			
		    // 'koper' => $this->modelperusahaan->code_otomatis(),
	//		'koders' => $this->session->userdata('koders'),	
	//		'namars' => $this->session->userdata('namars'),
		);
		$this->template->Display('masterperusahaan/view_perusahaan_alum',$data);
	
	}
	
	function dataperusahaan_alum()
	{
		$this->load->model('modelperusahaan');
	
		$data = array(
		    'koper' => $this->modelperusahaan->code_otomatis(),
			'namars' => $this->session->userdata('namars'),	
			'koders' => '',
			'cdate' => '',
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'dd_tipe' => $this->modelperusahaan->Get_dd_tipe("order by id_tipe_produk")->result_array(),

			'data_perusahaan' => $this->modelperusahaan->GetEva(" where tipe_produk='ALUM' order by id_perusahaan asc")->result_array(),
		);

	$this->template->Display('masterperusahaan/data_perusahaan_alum',$data);
	
	}
	
	function savedata_alum(){
		
		$this->load->model('modelperusahaan');
		//if($_POST){
			//$id_perusahaan = $_POST['id_perusahaan'];
			$nm_perusahaan = $_POST['nm_perusahaan'];
			$koper = $_POST['koper'];
			$id_tipe_produk= $_POST['id_tipe_produk'];
			$tipe_produk = $_POST['tipe_produk'];
						
			
			//$createdate = $_POST ['createdate'];

			$userlog = ($this->session->userdata('nama')
		);
        $data_dist = $this->modelperusahaan->GetEva("where koper='$koper'")->result_array();
		
		
			$data = array(
			
			//'id_perusahaan' =>$id_perusahaan,
			'koper' =>$koper,
			'nm_perusahaan' =>$nm_perusahaan,
			'id_tipe_produk' =>$id_tipe_produk,
			'tipe_produk' =>$tipe_produk,
			
			
 			// 'koper' =>$koper,
			// 'createdate' => date("Y-m-d H:i:s"),
		
			'createby'=>$userlog 

			//if($status == "baru"){
				//$data = array(
					//'koders' => $koders,
					//'namars' => $namars,
					//'cdate' => date("Y-m-d H:i:s"),
					);
			$pbid = isset($data_dist[0]['koper']);		
					
					
					
		if($pbid == $koper ){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong> Distributor dengan NO : ".$koper."  tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'masterperusahaan/dataperusahaan_alum');
		}else{
		 
		
		$result = $this->modelperusahaan->Simpan_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'masterperusahaan/dataperusahaan_alum');
		}
			
	}
	
	
	function editmasterperusahaan_alum($id_perusahaan=1){		
	$this->load->model('modelperusahaan');
	
	 $id_tp_post_array = array();
		foreach($this->modelperusahaan->GetEva("where id_perusahaan = '$id_perusahaan'")->result_array() as $dd_tipe){
			$id_tp_post_array[] = $dd_tipe['id_tipe_produk'];
		} 
			//$tampung = $this->modelperusahaan->GetWhere("where master_perusahaan = '$id_perusahaan'")->result_array();
		$tampung = $this->modelperusahaan->GetWhere('master_perusahaan', array('id_perusahaan' => $id_perusahaan));
		$data = array(
			//'createdate' => $tampung[0]['createdate'],
			'id_perusahaan' => $tampung[0]['id_perusahaan'],
			'nm_perusahaan' => $tampung[0]['nm_perusahaan'],
			'koper' => $tampung[0]['koper'],
			'tipe_produk' => $tampung[0]['tipe_produk'],
			
			// 'id_tipe_produk' => $this->model->GetRumahSakit("where koders != '$kode' order by koders asc")->result_array(),
			
            // 'id_tipe_produk' => $this->modelperusahaan->Get_dd_tipe(" order by id_tipe_produk asc")->result_array(),
			'dd_tipe' => $this->modelperusahaan->Get_dd_tipe("order by id_tipe_produk asc")->result_array(),
			'dd_tipe_post' => $id_tp_post_array,
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			
		
			
			);
		$this->template->Display('masterperusahaan/edit_perusahaan_alum', $data);
	}
	
	
    function updatealum(){
	$this->load->model('modelperusahaan');
	$dt = new DateTime();
			$id_perusahaan = $_POST['id_perusahaan'];
    	    $nm_perusahaan = $_POST['nm_perusahaan'];
			$koper = $_POST['koper'];
			$id_tipe_produk= $_POST['id_tipe_produk'];
			$tipe_produk = $_POST['tipe_produk'];
			
	

		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("Y-m-d H:i:s");  
		

			$data = array(
			'id_perusahaan' =>$id_perusahaan,
			'koper' => $koper,
			'nm_perusahaan' => $nm_perusahaan,
			'id_tipe_produk' => $id_tipe_produk,
			'tipe_produk' => $tipe_produk,
			'updatedate' => $waktu,
			'updateby' =>  $this->session->userdata('nama'),
			);

	$hasil = $this->modelperusahaan->updatealum($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data dengan NO : ".$data['koper']." BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'masterperusahaan/dataperusahaan_alum');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'masterperusahaan/dataperusahaan_alum');
	}
	}
	
	function hapus_perusahaan_alum($koper){
			
		$this->load->model('modelperusahaan');	
	    $hapus['koper'] = $this->uri->segment(3);
	
	    $hasil = $this->modelperusahaan->deleteData("master_perusahaan",$hapus);

       	if($hasil>=0){
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>DELETE data dengan NO : ".$hapus['koper']." BERHASIL di lakukan</strong></div>");
		header('location:'.base_url().'masterperusahaan/dataperusahaan_alum');
		}else{
		$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
		header('location:'.base_url().'masterperusahaan/dataperusahaan_alum');
		}
		
    }
	
	
	
	
	//crud Master perusahaan Alkes --------------------------------------------
	
	
	function viewperusahaan_alkes()
	{
		$this->load->model('modelperusahaan');
		// $data['koper'] = $this->modelperusahaan->code_otomatis();
		$data = array(
       

			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'data_perusahaan' => $this->modelperusahaan->GetEva("where tipe_produk='ALKES' order by id_perusahaan asc")->result_array(),			
		    // 'koper' => $this->modelperusahaan->code_otomatis(),
	//		'koders' => $this->session->userdata('koders'),	
	//		'namars' => $this->session->userdata('namars'),
		);
		$this->template->Display('masterperusahaan/view_perusahaan_alkes',$data);
	
	}
	
		
	
	function dataperusahaan_alkes()
	{
		$this->load->model('modelperusahaan');
	
		$data = array(
		    'koper' => $this->modelperusahaan->code_otomatis(),
			'namars' => $this->session->userdata('namars'),	
			'koders' => '',
			'cdate' => '',
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'dd_tipe' => $this->modelperusahaan->Get_dd_tipe("order by id_tipe_produk")->result_array(),

			'data_perusahaan' => $this->modelperusahaan->GetEva(" where tipe_produk='ALKES' order by id_perusahaan asc")->result_array(),
		);

	$this->template->Display('masterperusahaan/data_perusahaan_alkes',$data);
	}
	
	
	
	function savedata_alkes(){
		
		$this->load->model('modelperusahaan');
		//if($_POST){
			//$id_perusahaan = $_POST['id_perusahaan'];
			$nm_perusahaan = $_POST['nm_perusahaan'];
			$koper = $_POST['koper'];
			$id_tipe_produk= $_POST['id_tipe_produk'];
			$tipe_produk = $_POST['tipe_produk'];
			$s_alamat = $_POST['s_alamat'];
			$s_telp = $_POST['s_telp'];
			$s_fax= $_POST['s_fax'];
			$s_email = $_POST['s_email'];
			$s_kontak= $_POST['s_kontak'];
			$status_per = $_POST['status_per'];
			
			$principal = $_POST['principal'];
			if ($principal==''){
				$principal='0';				
			}else{
			$principal=$principal;	
			}
			
			$solo_agent = $_POST['solo_agent'];
			if ($solo_agent==''){
				$solo_agent='0';				
			}else{
			$solo_agent=$solo_agent;
			}
			
			$distributor = $_POST['distributor'];
			if ($distributor==''){
				$distributor='0';				
			}else{
			$distributor=$distributor;
			}
			
			$subdistributor = $_POST['subdistributor'];
			if ($subdistributor==''){
				$subdistributor='0';				
			}else{
			$subdistributor=$subdistributor;
			}
			
			
			//$createdate = $_POST ['createdate'];

			$userlog = ($this->session->userdata('nama')
		);
        $data_dist = $this->modelperusahaan->GetEva("where koper='$koper'")->result_array();
		
		
			$data = array(
			
			//'id_perusahaan' =>$id_perusahaan,
			'koper' =>$koper,
			'nm_perusahaan' =>$nm_perusahaan,
			'id_tipe_produk' =>$id_tipe_produk,
			'tipe_produk' =>$tipe_produk,
			's_alamat' =>$s_alamat,
			's_telp' =>$s_telp,
			's_fax' =>$s_fax,
			's_email' =>$s_email,
			's_kontak' =>$s_kontak,
			'status_per' =>$status_per,
			'principal' =>$principal,
			'solo_agent' =>$solo_agent,
			'distributor' =>$distributor,
			'subdistributor'=>$subdistributor,
			
			
 			// 'koper' =>$koper,
			// 'createdate' => date("Y-m-d H:i:s"),
		
			'createby'=>$userlog 

			//if($status == "baru"){
				//$data = array(
					//'koders' => $koders,
					//'namars' => $namars,
					//'cdate' => date("Y-m-d H:i:s"),
					);
			$pbid = isset($data_dist[0]['koper']);		
					
					
					
		if($pbid == $koper ){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong> Distributor dengan NO : ".$koper."  tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'masterperusahaan/dataperusahaan_alkes');
		}else{
		 
		
		$result = $this->modelperusahaan->Simpan_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'masterperusahaan/dataperusahaan_alkes');
		}
			
	}
	
	
	
	function editmasterperusahaan_alkes($id_perusahaan=1){		
	$this->load->model('modelperusahaan');
	
	 $id_tp_post_array = array();
		foreach($this->modelperusahaan->GetEva("where id_perusahaan = '$id_perusahaan'")->result_array() as $dd_tipe){
			$id_tp_post_array[] = $dd_tipe['id_tipe_produk'];
		} 
			//$tampung = $this->modelperusahaan->GetWhere("where master_perusahaan = '$id_perusahaan'")->result_array();
		$tampung = $this->modelperusahaan->GetWhere('master_perusahaan', array('id_perusahaan' => $id_perusahaan));
		$data = array(
			//'createdate' => $tampung[0]['createdate'],
			'id_perusahaan' => $tampung[0]['id_perusahaan'],
			'nm_perusahaan' => $tampung[0]['nm_perusahaan'],
			'koper' => $tampung[0]['koper'],
			's_alamat' => $tampung[0]['s_alamat'],
			's_telp' => $tampung[0]['s_telp'],
			's_fax' => $tampung[0]['s_fax'],
			's_kontak' => $tampung[0]['s_kontak'],
			's_email' => $tampung[0]['s_email'],
			'status_per' => $tampung[0]['status_per'],
			'tipe_produk' => $tampung[0]['tipe_produk'],
			'foi' => $tampung[0]['foi'],
			'mou' => $tampung[0]['mou'],
			'pks' => $tampung[0]['pks'],
			'bidang_pekerjaan' => $tampung[0]['bidang_pekerjaan'],
			'maincon' => $tampung[0]['maincon'],
			'subcon' => $tampung[0]['subcon'],
			'keterangan' => $tampung[0]['keterangan'],
			'principal' => $tampung[0]['principal'],
			'solo_agent' => $tampung[0]['solo_agent'],
			'distributor' => $tampung[0]['distributor'],
			'subdistributor' => $tampung[0]['subdistributor'],
			// 'id_tipe_produk' => $this->model->GetRumahSakit("where koders != '$kode' order by koders asc")->result_array(),
			
            // 'id_tipe_produk' => $this->modelperusahaan->Get_dd_tipe(" order by id_tipe_produk asc")->result_array(),
			'dd_tipe' => $this->modelperusahaan->Get_dd_tipe("order by id_tipe_produk asc")->result_array(),
			'dd_tipe_post' => $id_tp_post_array,
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			
		
			
			);
		$this->template->Display('masterperusahaan/edit_perusahaan_alkes', $data);
	}
	
	function updatealkes(){
	$this->load->model('modelperusahaan');
	$dt = new DateTime();
			$id_perusahaan = $_POST['id_perusahaan'];
    	    $nm_perusahaan = $_POST['nm_perusahaan'];
			$koper = $_POST['koper'];
			$id_tipe_produk= $_POST['id_tipe_produk'];
			$tipe_produk = $_POST['tipe_produk'];
			$s_alamat=$_POST['s_alamat'];
			$s_telp=$_POST['s_telp'];
			$s_fax=$_POST['s_fax'];
			$s_kontak=$_POST['s_kontak'];
			$s_email=$_POST['s_email'];
			$status_per=$_POST['status_per'];

			$principal = $_POST['principal'];
			if ($principal==''){
				$principal='0';				
			}else{
			$principal=$principal;	
			}
			
			$solo_agent = $_POST['solo_agent'];
			if ($solo_agent==''){
				$solo_agent='0';				
			}else{
			$solo_agent=$solo_agent;
			}
			
			$distributor = $_POST['distributor'];
			if ($distributor==''){
				$distributor='0';				
			}else{
			$distributor=$distributor;
			}
			
			$subdistributor = $_POST['subdistributor'];
			if ($subdistributor==''){
				$subdistributor='0';				
			}else{
			$subdistributor=$subdistributor;
			}
	

		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("Y-m-d H:i:s");  
		
	  

			$data = array(
			'id_perusahaan' =>$id_perusahaan,
			'koper' => $koper,
			'nm_perusahaan' => $nm_perusahaan,
			'id_tipe_produk' => $id_tipe_produk,
			'tipe_produk' => $tipe_produk,
			's_alamat'=>$s_alamat,
			's_telp'=>$s_telp,
			's_fax'=>$s_fax,
			's_kontak'=>$s_kontak,
			's_email'=>$s_email,
			'status_per'=>$status_per,
			'principal' => $principal,
			'solo_agent' => $solo_agent,
			'distributor' => $distributor,
		    'subdistributor' => $subdistributor,
			'updatedate' => $waktu,
			'updateby' =>  $this->session->userdata('nama'),
			);

	$hasil = $this->modelperusahaan->updateperusdepbang($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data dengan NO : ".$data['koper']." BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'masterperusahaan/dataperusahaan_alkes');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'masterperusahaan/dataperusahaan_alkes');
	}
	}
	
	    function hapus_perusahaan_alkes($id_perusahaan){
			
		$this->load->model('modelperusahaan');	
	    $hapus['id_perusahaan'] = $this->uri->segment(3);
	
	    $hasil = $this->modelperusahaan->deleteData("master_perusahaan",$hapus);

       	if($hasil>=0){
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>DELETE data BERHASIL di lakukan</strong></div>");
		header('location:'.base_url().'masterperusahaan/dataperusahaan_alkes');
		}else{
		$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
		header('location:'.base_url().'masterperusahaan/dataperusahaan_alkes');
		}
		
    }
	
	
	
}
	
// Developed by Muhammad Ridho
// Email: kenduanything23@gmail.com
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
