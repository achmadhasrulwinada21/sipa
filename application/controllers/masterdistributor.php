<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class masterdistributor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('u_name')){
		$this->session->set_flashdata("alerts", "<div class='alerts alert-danger'><strong>Sesi Anda Telah Habis, Silahkan login kembali..</strong></div>");
			redirect('dashboard');

		}
	}
	
	public function hapusdistributor($kodis)
    {
         // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
         $kodis = $this->input->post('kodis');
         $this->modeldistributor->hapusaja($kodis);
         redirect('masterdistributor');
    }

	public function hapusdistributor_new($kodis)
	{
		if($this->modeldistributor->hapusaja($kodis) == false)
		{
			$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
		}
		redirect('masterdistributor');	
			
			
	}
		
		
		
	
	
	//crud Master distributor obat --------------------------------------------
	
	function get_tipe_produk()
		
		{
		$this->load->model('modeldistributor');
		$id_tipe_produk=$this->input->post('id_tipe_produk');
		$data=$this->modeldistributor->get_data_tipe_bykode($id_tipe_produk);
		echo json_encode($data);
		}
		
	function get_jenis_pekerjaan()
		
		{
		$this->load->model('modeldistributor');
		$kode_jenis=$this->input->post('kode_jenis');
		$data=$this->modeldistributor->get_jenis_pekerjaan_bykode($kode_jenis);
		echo json_encode($data);
		}
	


	public function index()
	{
		$this->load->model('modeldistributor');
	
		$data = array(
		    'kodis' => $this->modeldistributor->code_otomatis(),
			'namars' => $this->session->userdata('namars'),	
			'koders' => '',
			'cdate' => '',
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'dd_tipe' => $this->modeldistributor->Get_dd_tipe("order by id_tipe_produk")->result_array(),

			'data_distributor' => $this->modeldistributor->GetEva(" where tipe_produk='OBAT' order by id_distributor asc")->result_array(),
		);

	$this->template->Display('masterdistributor/data_distributor',$data);
	}
	
	
	function viewdistributor_obat()
	{
		$this->load->model('modeldistributor');
		// $data['kodis'] = $this->modeldistributor->code_otomatis();
		$data = array(
       

			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'data_distributor' => $this->modeldistributor->GetEva("where tipe_produk='OBAT' order by id_distributor asc")->result_array(),			
		    // 'kodis' => $this->modeldistributor->code_otomatis(),
	//		'koders' => $this->session->userdata('koders'),	
	//		'namars' => $this->session->userdata('namars'),
		);
		$this->template->Display('masterdistributor/view_distributor',$data);
	
	}
	
	
	
	function editmasterdistributor($id_distributor=1){		
	$this->load->model('modeldistributor');
	
	 $id_tp_post_array = array();
		foreach($this->modeldistributor->GetEva("where id_distributor = '$id_distributor'")->result_array() as $dd_tipe){
			$id_tp_post_array[] = $dd_tipe['id_tipe_produk'];
		} 
			//$tampung = $this->modeldistributor->GetWhere("where master_distributor = '$id_distributor'")->result_array();
		$tampung = $this->modeldistributor->GetWhere('master_distributor', array('id_distributor' => $id_distributor));
		$data = array(
			//'createdate' => $tampung[0]['createdate'],
			'id_distributor' => $tampung[0]['id_distributor'],
			'nm_distributor' => $tampung[0]['nm_distributor'],
			'kodis' => $tampung[0]['kodis'],
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
			
            // 'id_tipe_produk' => $this->modeldistributor->Get_dd_tipe(" order by id_tipe_produk asc")->result_array(),
			'dd_tipe' => $this->modeldistributor->Get_dd_tipe("order by id_tipe_produk asc")->result_array(),
			'dd_tipe_post' => $id_tp_post_array,
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			
		
			
			);
		$this->template->Display('masterdistributor/edit_distributor_2',$data);
	}

	function savedata(){
		
		$this->load->model('modeldistributor');
		//if($_POST){
			//$id_distributor = $_POST['id_distributor'];
			$nm_distributor = $_POST['nm_distributor'];
			$kodis = $_POST['kodis'];
			$id_tipe_produk= $_POST['id_tipe_produk'];
			$tipe_produk = $_POST['tipe_produk'];
			
			$userlog = ($this->session->userdata('nama')
		);
        $data_dist = $this->modeldistributor->GetEva("where kodis='$kodis'")->result_array();
		
		
			$data = array(
			
			//'id_distributor' =>$id_distributor,
			'kodis' =>$kodis,
			'nm_distributor' =>$nm_distributor,
			'id_tipe_produk' =>$id_tipe_produk,
			'tipe_produk' =>$tipe_produk,
						
			'createby'=>$userlog 

					);
			$pbid = isset($data_dist[0]['kodis']);		
					
					
					
		if($pbid == $kodis ){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong> Distributor dengan NO : ".$kodis."  tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'masterdistributor');
		}else{
		 
		
		$result = $this->modeldistributor->Simpan_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'masterdistributor');
		}
	
	}

	function update_distributor(){
	$this->load->model('modeldistributor');
	$dt = new DateTime();
			$id_distributor = $_POST['id_distributor'];
    	    $nm_distributor = $_POST['nm_distributor'];
			$kodis = $_POST['kodis'];
			$id_tipe_produk= $_POST['id_tipe_produk'];
			$tipe_produk = $_POST['tipe_produk'];
			

		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("Y-m-d H:i:s");  

	$data = array(
	'id_distributor' =>$id_distributor,
	'kodis' => $kodis,
	'nm_distributor' => $nm_distributor,
	'id_tipe_produk' => $id_tipe_produk,
	'tipe_produk' => $tipe_produk,
	'updatedate' => $waktu,
	'updateby' =>  $this->session->userdata('nama'),
	);

	$hasil = $this->modeldistributor->update_distributor($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data dengan NO : ".$data['kodis']." BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'masterdistributor');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'masterdistributor');
	}
	}
	

	function hapus_distributor($kodis){
			
		$this->load->model('modeldistributor');	
	    $hapus['kodis'] = $this->uri->segment(3);
	
	    $hasil = $this->modeldistributor->deleteData("master_distributor",$hapus);

       	if($hasil>=0){
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>DELETE data dengan NO : ".$hapus['kodis']." BERHASIL di lakukan</strong></div>");
		header('location:'.base_url().'masterdistributor');
		}else{
		$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
		header('location:'.base_url().'masterdistributor');
		}
		
    }
	
	
	//crud Master distributor Depbang --------------------------------------------
	
	
	public function datadistributor_depbang()
	{
		$this->load->model('modeldistributor');
	
		$data = array(
		    'kodis' => $this->modeldistributor->code_otomatis(),
			'namars' => $this->session->userdata('namars'),	
			'koders' => '',
			'cdate' => '',
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'dd_jenis_pekerjaan' => $this->modeldistributor->Get_dd_jenis_pekerjaan("order by id_jenis_pekerjaan")->result_array(),
            'dd_tipe' => $this->modeldistributor->Get_dd_tipe("order by id_tipe_produk")->result_array(),
			'data_distributor' => $this->modeldistributor->GetEva(" where tipe_produk='DEPBANG' order by id_distributor asc")->result_array(),
		);

	$this->template->Display('masterdistributor/data_distributor_depbang',$data);
	}
	
	function viewdistributor_depbang()
	{
		$this->load->model('modeldistributor');
		// $data['kodis'] = $this->modeldistributor->code_otomatis();
		$data = array(
       

			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'data_distributor' => $this->modeldistributor->GetEva("where tipe_produk='DEPBANG' order by id_distributor asc")->result_array(),			
		    // 'kodis' => $this->modeldistributor->code_otomatis(),
	//		'koders' => $this->session->userdata('koders'),	
	//		'namars' => $this->session->userdata('namars'),
		);
		$this->template->Display('masterdistributor/view_distributor_depbang',$data);
	
	}
	
	function editmasterdistributor_depbang($id_distributor=1){		
	$this->load->model('modeldistributor');
	
	 $id_tp_post_array = array();
		foreach($this->modeldistributor->GetEva("where id_distributor = '$id_distributor'")->result_array() as $dd_tipe){
			$id_tp_post_array[] = $dd_tipe['id_tipe_produk'];
		} 
		
	$id_kerja_post_array = array();
		foreach($this->modeldistributor->GetEva("where id_distributor = '$id_distributor'")->result_array() as $dd_jenis_pekerjaan){
			$id_kerja_post_array[] = $dd_jenis_pekerjaan['kode_jenis'];
		} 
		
			//$tampung = $this->modeldistributor->GetWhere("where master_distributor = '$id_distributor'")->result_array();
		$tampung = $this->modeldistributor->GetWhere('master_distributor', array('id_distributor' => $id_distributor));
		$data = array(
			//'createdate' => $tampung[0]['createdate'],
			'id_distributor' => $tampung[0]['id_distributor'],
			'nm_distributor' => $tampung[0]['nm_distributor'],
			'kodis' => $tampung[0]['kodis'],
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
			
            // 'id_tipe_produk' => $this->modeldistributor->Get_dd_tipe(" order by id_tipe_produk asc")->result_array(),
			'dd_jenis_pekerjaan' => $this->modeldistributor->Get_dd_jenis_pekerjaan("order by id_jenis_pekerjaan")->result_array(),
			'dd_tipe' => $this->modeldistributor->Get_dd_tipe("order by id_tipe_produk asc")->result_array(),
			'dd_tipe_post' => $id_tp_post_array,
			'dd_kerja_post' => $id_kerja_post_array,
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			
		
			
			);
		$this->template->Display('masterdistributor/edit_distributor_depbang',$data);
	}
	
	function savedata_depbang(){
		
		$this->load->model('modeldistributor');
		//if($_POST){
			//$id_distributor = $_POST['id_distributor'];
			$nm_distributor = $_POST['nm_distributor'];
			$kodis = $_POST['kodis'];
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
        $data_dist = $this->modeldistributor->GetEva("where kodis='$kodis'")->result_array();
		
		
			$data = array(
			
			//'id_distributor' =>$id_distributor,
			'kodis' =>$kodis,
			'nm_distributor' =>$nm_distributor,
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
			
			
 			// 'kodis' =>$kodis,
			// 'createdate' => date("Y-m-d H:i:s"),
		
			'createby'=>$userlog 

			//if($status == "baru"){
				//$data = array(
					//'koders' => $koders,
					//'namars' => $namars,
					//'cdate' => date("Y-m-d H:i:s"),
					);
			$pbid = isset($data_dist[0]['kodis']);		
					
					
					
		if($pbid == $kodis ){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong> Distributor dengan NO : ".$kodis."  tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'masterdistributor/datadistributor_depbang');
		}else{
		 
		
		$result = $this->modeldistributor->Simpan_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'masterdistributor/datadistributor_depbang');
		}
			
	}
		
	function updatedepbang(){
	$this->load->model('modeldistributor');
	$dt = new DateTime();
			$id_distributor = $_POST['id_distributor'];
    	    $nm_distributor = $_POST['nm_distributor'];
			$kodis = $_POST['kodis'];
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
			'id_distributor' =>$id_distributor,
			'kodis' => $kodis,
			'nm_distributor' => $nm_distributor,
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

	$hasil = $this->modeldistributor->updateperusdepbang($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data dengan NO : ".$data['kodis']." BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'masterdistributor/datadistributor_depbang');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'masterdistributor/datadistributor_depbang');
	}
	}
	
    function hapus_distributor_depbang($kodis){
			
		$this->load->model('modeldistributor');	
	    $hapus['kodis'] = $this->uri->segment(3);
	
	    $hasil = $this->modeldistributor->deleteData("master_distributor",$hapus);

       	if($hasil>=0){
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>DELETE data dengan NO : ".$hapus['kodis']." BERHASIL di lakukan</strong></div>");
		header('location:'.base_url().'masterdistributor/datadistributor_depbang');
		}else{
		$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
		header('location:'.base_url().'masterdistributor/datadistributor_depbang');
		}
		
    }
	
	
	//crud Master distributor Alum --------------------------------------------
	
	function viewdistributor()
	{
		$this->load->model('modeldistributor');
		// $data['kodis'] = $this->modeldistributor->code_otomatis();
		$data = array(
       

			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'data_distributor' => $this->modeldistributor->GetEva("where tipe_produk='ALUM' order by id_distributor asc")->result_array(),			
		    // 'kodis' => $this->modeldistributor->code_otomatis(),
	//		'koders' => $this->session->userdata('koders'),	
	//		'namars' => $this->session->userdata('namars'),
		);
		$this->template->Display('masterdistributor/view_distributor',$data);
	
	}
	
	function datadistributor_alum()
	{
		$this->load->model('modeldistributor');
	
		$data = array(
		    'kodis' => $this->modeldistributor->code_otomatis(),
			'namars' => $this->session->userdata('namars'),	
			'koders' => '',
			'cdate' => '',
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'dd_tipe' => $this->modeldistributor->Get_dd_tipe("order by id_tipe_produk")->result_array(),

			'data_distributor' => $this->modeldistributor->GetEva(" where tipe_produk='ALUM' order by id_distributor asc")->result_array(),
		);

	$this->template->Display('masterdistributor/data_distributor_alum',$data);
	
	}
	
	function savedata_alum(){
		
		$this->load->model('modeldistributor');
		//if($_POST){
			//$id_distributor = $_POST['id_distributor'];
			$nm_distributor = $_POST['nm_distributor'];
			$kodis = $_POST['kodis'];
			$id_tipe_produk= $_POST['id_tipe_produk'];
			$tipe_produk = $_POST['tipe_produk'];
						
			
			//$createdate = $_POST ['createdate'];

			$userlog = ($this->session->userdata('nama')
		);
        $data_dist = $this->modeldistributor->GetEva("where kodis='$kodis'")->result_array();
		
		
			$data = array(
			
			//'id_distributor' =>$id_distributor,
			'kodis' =>$kodis,
			'nm_distributor' =>$nm_distributor,
			'id_tipe_produk' =>$id_tipe_produk,
			'tipe_produk' =>$tipe_produk,
			
			
 			// 'kodis' =>$kodis,
			// 'createdate' => date("Y-m-d H:i:s"),
		
			'createby'=>$userlog 

			//if($status == "baru"){
				//$data = array(
					//'koders' => $koders,
					//'namars' => $namars,
					//'cdate' => date("Y-m-d H:i:s"),
					);
			$pbid = isset($data_dist[0]['kodis']);		
					
					
					
		if($pbid == $kodis ){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong> Distributor dengan NO : ".$kodis."  tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'masterdistributor/datadistributor_alum');
		}else{
		 
		
		$result = $this->modeldistributor->Simpan_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'masterdistributor/datadistributor_alum');
		}
			
	}
	
	
	function editmasterdistributor_alum($id_distributor=1){		
	$this->load->model('modeldistributor');
	
	 $id_tp_post_array = array();
		foreach($this->modeldistributor->GetEva("where id_distributor = '$id_distributor'")->result_array() as $dd_tipe){
			$id_tp_post_array[] = $dd_tipe['id_tipe_produk'];
		} 
			//$tampung = $this->modeldistributor->GetWhere("where master_distributor = '$id_distributor'")->result_array();
		$tampung = $this->modeldistributor->GetWhere('master_distributor', array('id_distributor' => $id_distributor));
		$data = array(
			//'createdate' => $tampung[0]['createdate'],
			'id_distributor' => $tampung[0]['id_distributor'],
			'nm_distributor' => $tampung[0]['nm_distributor'],
			'kodis' => $tampung[0]['kodis'],
			'tipe_produk' => $tampung[0]['tipe_produk'],
			
			// 'id_tipe_produk' => $this->model->GetRumahSakit("where koders != '$kode' order by koders asc")->result_array(),
			
            // 'id_tipe_produk' => $this->modeldistributor->Get_dd_tipe(" order by id_tipe_produk asc")->result_array(),
			'dd_tipe' => $this->modeldistributor->Get_dd_tipe("order by id_tipe_produk asc")->result_array(),
			'dd_tipe_post' => $id_tp_post_array,
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			
		
			
			);
		$this->template->Display('masterdistributor/edit_distributor_alum', $data);
	}
	
	
    function updatealum(){
	$this->load->model('modeldistributor');
	$dt = new DateTime();
			$id_distributor = $_POST['id_distributor'];
    	    $nm_distributor = $_POST['nm_distributor'];
			$kodis = $_POST['kodis'];
			$id_tipe_produk= $_POST['id_tipe_produk'];
			$tipe_produk = $_POST['tipe_produk'];
			
	

		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("Y-m-d H:i:s");  
		

			$data = array(
			'id_distributor' =>$id_distributor,
			'kodis' => $kodis,
			'nm_distributor' => $nm_distributor,
			'id_tipe_produk' => $id_tipe_produk,
			'tipe_produk' => $tipe_produk,
			'updatedate' => $waktu,
			'updateby' =>  $this->session->userdata('nama'),
			);

	$hasil = $this->modeldistributor->updatealum($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data dengan NO : ".$data['kodis']." BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'masterdistributor/datadistributor_alum');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'masterdistributor/datadistributor_alum');
	}
	}
	
	function hapus_distributor_alum($kodis){
			
		$this->load->model('modeldistributor');	
	    $hapus['kodis'] = $this->uri->segment(3);
	
	    $hasil = $this->modeldistributor->deleteData("master_distributor",$hapus);

       	if($hasil>=0){
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>DELETE data dengan NO : ".$hapus['kodis']." BERHASIL di lakukan</strong></div>");
		header('location:'.base_url().'masterdistributor/datadistributor_alum');
		}else{
		$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
		header('location:'.base_url().'masterdistributor/datadistributor_alum');
		}
		
    }
	
	
	
	
	//crud Master distributor Alkes --------------------------------------------
	
	
	function viewdistributor_alkes()
	{
		$this->load->model('modeldistributor');
		// $data['kodis'] = $this->modeldistributor->code_otomatis();
		$data = array(
       

			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'data_distributor' => $this->modeldistributor->GetEva("where tipe_produk='ALKES' order by id_distributor asc")->result_array(),			
		    // 'kodis' => $this->modeldistributor->code_otomatis(),
	//		'koders' => $this->session->userdata('koders'),	
	//		'namars' => $this->session->userdata('namars'),
		);
		$this->template->Display('masterdistributor/view_distributor',$data);
	
	}
	
		
	
	function datadistributor_alkes()
	{
		$this->load->model('modeldistributor');
	
		$data = array(
		    'kodis' => $this->modeldistributor->code_otomatis(),
			'namars' => $this->session->userdata('namars'),	
			'koders' => '',
			'cdate' => '',
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'dd_tipe' => $this->modeldistributor->Get_dd_tipe("order by id_tipe_produk")->result_array(),

			'data_distributor' => $this->modeldistributor->GetEva(" where tipe_produk='ALKES' order by id_distributor asc")->result_array(),
		);

	$this->template->Display('masterdistributor/data_distributor_alkes',$data);
	}
	
	
	
	function savedata_alkes(){
		
		$this->load->model('modeldistributor');
		//if($_POST){
			//$id_distributor = $_POST['id_distributor'];
			$nm_distributor = $_POST['nm_distributor'];
			$kodis = $_POST['kodis'];
			$id_tipe_produk= $_POST['id_tipe_produk'];
			$tipe_produk = $_POST['tipe_produk'];
			
			
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
        $data_dist = $this->modeldistributor->GetEva("where kodis='$kodis'")->result_array();
		
		
			$data = array(
			
			//'id_distributor' =>$id_distributor,
			'kodis' =>$kodis,
			'nm_distributor' =>$nm_distributor,
			'id_tipe_produk' =>$id_tipe_produk,
			'tipe_produk' =>$tipe_produk,
			
			'principal' =>$principal,
			'solo_agent' =>$solo_agent,
			'distributor' =>$distributor,
			'subdistributor'=>$subdistributor,
			
			
 			// 'kodis' =>$kodis,
			// 'createdate' => date("Y-m-d H:i:s"),
		
			'createby'=>$userlog 

			//if($status == "baru"){
				//$data = array(
					//'koders' => $koders,
					//'namars' => $namars,
					//'cdate' => date("Y-m-d H:i:s"),
					);
			$pbid = isset($data_dist[0]['kodis']);		
					
					
					
		if($pbid == $kodis ){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong> Distributor dengan NO : ".$kodis."  tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'masterdistributor/datadistributor_alkes');
		}else{
		 
		
		$result = $this->modeldistributor->Simpan_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'masterdistributor/datadistributor_alkes');
		}
			
	}
	
	
	
	function editmasterdistributor_alkes($id_distributor=1){		
	$this->load->model('modeldistributor');
	
	 $id_tp_post_array = array();
		foreach($this->modeldistributor->GetEva("where id_distributor = '$id_distributor'")->result_array() as $dd_tipe){
			$id_tp_post_array[] = $dd_tipe['id_tipe_produk'];
		} 
			//$tampung = $this->modeldistributor->GetWhere("where master_distributor = '$id_distributor'")->result_array();
		$tampung = $this->modeldistributor->GetWhere('master_distributor', array('id_distributor' => $id_distributor));
		$data = array(
			//'createdate' => $tampung[0]['createdate'],
			'id_distributor' => $tampung[0]['id_distributor'],
			'nm_distributor' => $tampung[0]['nm_distributor'],
			'kodis' => $tampung[0]['kodis'],
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
			
            // 'id_tipe_produk' => $this->modeldistributor->Get_dd_tipe(" order by id_tipe_produk asc")->result_array(),
			'dd_tipe' => $this->modeldistributor->Get_dd_tipe("order by id_tipe_produk asc")->result_array(),
			'dd_tipe_post' => $id_tp_post_array,
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			
		
			
			);
		$this->template->Display('masterdistributor/edit_distributor_alkes', $data);
	}
	
	function updatealkes(){
	$this->load->model('modeldistributor');
	$dt = new DateTime();
			$id_distributor = $_POST['id_distributor'];
    	    $nm_distributor = $_POST['nm_distributor'];
			$kodis = $_POST['kodis'];
			$id_tipe_produk= $_POST['id_tipe_produk'];
			$tipe_produk = $_POST['tipe_produk'];
			
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
        $waktu =date("d-m-Y H:i:s");  
		
	  

			$data = array(
			'id_distributor' =>$id_distributor,
			'kodis' => $kodis,
			'nm_distributor' => $nm_distributor,
			'id_tipe_produk' => $id_tipe_produk,
			'tipe_produk' => $tipe_produk,
			'principal' => $principal,
			'solo_agent' => $solo_agent,
			'distributor' => $distributor,
		    'subdistributor' => $subdistributor,
			'updatedate' => $waktu,
			'updateby' =>  $this->session->userdata('nama'),
			);

	$hasil = $this->modeldistributor->updateperusdepbang($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data dengan NO : ".$data['kodis']." BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'masterdistributor/datadistributor_alkes');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'masterdistributor/datadistributor_alkes');
	}
	}
	
	    function hapus_distributor_alkes($kodis){
			
		$this->load->model('modeldistributor');	
	    $hapus['kodis'] = $this->uri->segment(3);
	
	    $hasil = $this->modeldistributor->deleteData("master_distributor",$hapus);

       	if($hasil>=0){
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>DELETE data dengan NO : ".$hapus['kodis']." BERHASIL di lakukan</strong></div>");
		header('location:'.base_url().'masterdistributor/datadistributor_depbang');
		}else{
		$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
		header('location:'.base_url().'masterdistributor/datadistributor_depbang');
		}
		
    }
	
	
	
}
	
// Developed by Muhammad Ridho
// Email: kenduanything23@gmail.com
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
