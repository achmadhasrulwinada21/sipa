<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cmasterprinsp extends CI_Controller 

{

	public function __construct()
	{
		parent::__construct();
	   
	}
	
	 // function get_autocomplete(){
        // if (isset($_GET['term'])) {
            // $result = $this->mmprinsp->get_data_barang_bykode($id_material)($_GET['term']);
            // if (count($result) > 0) {
            // foreach ($result as $row)
                // $arr_result[] = $row->nm_material;
                // echo json_encode($arr_result);
            // }
        // }
    // }
	
	
	// function get_autokomplit(){
        // if (isset($_GET['term'])) {
            // $result = $this->mmprinsp->get_data_barang_bykodeR($id_memo)($_GET['term']);
            // if (count($result) > 0) {
            // foreach ($result as $row)
                // $arr_result[] = $row->untuk;
                // echo json_encode($arr_result);
            // }
        // }
    // }
	
	
	function get_detail_material2(){
		
		$this->load->model('mmprinsp');
        $id_material['id_material']=$this->input->post('id_material');
        $data=array(
            'data_material'=> $this->mmprinsp->GetAllData("where id_material = '$id_material'" )->result_array(),
        );
        $this->template->Display('pengajuan_cab/data_pengajuan' ,$data);
    }
	
	  function get_detail_barang(){
        $id['id_material']=$this->input->post('id_material');
        $data=array(
            'data_material'=>$this->mmprinsp->getSelectedData('master_material' ,$id)->result(),
        );
        $this->template->Display('pengajuan_cab/ajax_detail_material',$data);
    }

	
	public function get_detail_material()
	{
		$this->load->model('mmprinsp');
		//$data['data_material'] = $this->mmprinsp->GetPaket("order by id_material asc")->result_array();
		
		if (isset($_POST["id_material"])) {
        $kode_rs = $_POST["id_material"];
                              
       $query['data_material'] = $this->mmprinsp->GetAllData("where id_material = '$kode_rs'")->result_array();
       }else{
       $query['data_material'] = $this->mmprinsp->GetAllData('order by id_material asc')->result_array();
       }
	   
       $this->template->Display('pengajuan_cab/ajax_detail_material', $query);
	   
	}
		
	 // function tambah_penjualan_to_cart()
	// {
        // $data = array(
            // 'id'    => $this->input->post('id_material'),
            // 'qty'   => $this->input->post('volume'),
            // 'price' => $this->input->post('harga'),
            // 'name'  => $this->input->post('nm_material'),
        // );
        // $this->cart->insert($data);
        // $this->template->Display('pengajuan_cab/data_pengajuan' ,$data);
    // }
	
	

	public function index()
	{
		
		$this->load->model('mmprinsp');
			$data['kode_prinsipal'] = $this->mmprinsp->code_otomatis();
		//$data["people"]=$this->mmprinsp->read();
		//$data['detail_material_harga'] = $this->db->get_where('master_material',['id_material'=>$id_material])->row();

		
		
		    $data['data_prinsipal'] = $this->mmprinsp->GetPrinsp_db1("where pabrik_id !='-' or (alkesid='-' and alumid='-') order by nama_pt asc")->result_array();

		     $data['data_alum'] = $this->mmprinsp->GetPrinsp_db1("where alumid !='-' or (alkesid='-' and pabrik_id='-') order by pt_alum,idprinsipal desc")->result_array();

		      $data['data_alkes'] = $this->mmprinsp->GetPrinsp_db1("where alkesid !='-' or (pabrik_id='-' and alumid='-') order by pt_alkes,idprinsipal desc")->result_array();
			$data['nama'] = $this->session->userdata('nama');	
			$data['cabang'] = $this->session->userdata('cabang');	
			$data['kode_pabrik']= $this->mmprinsp->GetKodePrinsp_db1("where pabrikid !='-' or (alkesid='-' and alumid='-')order by nama_pt asc")->result_array();
			$data['kode_alum']= $this->mmprinsp->GetKodePrinsp_db1("where alumid !='-' or (alkesid='-' and pabrikid='-')order by pabriknama DESC")->result_array();
			$data['kode_alkes']= $this->mmprinsp->GetKodePrinsp_db1("where alkesid !='-' or (pabrikid='-' and alumid='-')order by pabriknama DESC")->result_array();
			$data['s_kode']= $this->mmprinsp->Getskode_db2("order by s_nama asc")->result_array();;
			// $data['data_pengajuan'] = $this->mmprinsp->GetPengajuan("order by id_pengajuan DESC")->result_array();
			// $data['data_material'] = $this->mmprinsp->GetPaket("order by id_material asc")->result_array();
			//$data['data_material2'] = $this->mmprinsp->getMaterial();
			
	  
	$this->template->Display('master_prinsipal/data_prinsipal', $data);
	}

	function alum()
	{
		
		$this->load->model('mmprinsp');
			$data['kode_prinsipal'] = $this->mmprinsp->code_otomatis();
		//$data["people"]=$this->mmprinsp->read();
		//$data['detail_material_harga'] = $this->db->get_where('master_material',['id_material'=>$id_material])->row();

		
		
		    $data['data_prinsipal'] = $this->mmprinsp->GetPrinsp_db1("where pabrik_id !='-' or (alkesid='-' and alumid='-') order by nama_pt,idprinsipal desc")->result_array();

		     $data['data_alum'] = $this->mmprinsp->Getalum_db1("order by pt_alum,idalums desc")->result_array();

		      $data['data_alkes'] = $this->mmprinsp->GetPrinsp_db1("where alkesid !='-' or (pabrik_id='-' and alumid='-') order by pt_alkes,idprinsipal desc")->result_array();
			$data['nama'] = $this->session->userdata('nama');	
			$data['cabang'] = $this->session->userdata('cabang');	
			$data['kode_pabrik']= $this->mmprinsp->GetKodePrinsp_db1("where pabrikid !='-' or (alkesid='-' and alumid='-')order by pabriknama DESC")->result_array();
			$data['kode_alum']= $this->mmprinsp->GetKodealum_db1("order by alumnama DESC")->result_array();
			$data['s_kode']= $this->mmprinsp->Getskode_db2()->result_array();;
			// $data['data_pengajuan'] = $this->mmprinsp->GetPengajuan("order by id_pengajuan DESC")->result_array();
			// $data['data_material'] = $this->mmprinsp->GetPaket("order by id_material asc")->result_array();
			//$data['data_material2'] = $this->mmprinsp->getMaterial();
			
	  
	$this->template->Display('master_prinsipal/data_alumgab', $data);
	}

	 function alkes()
	{
		
		$this->load->model('mmprinsp');
			$data['kode_prinsipal'] = $this->mmprinsp->code_otomatis();
		//$data["people"]=$this->mmprinsp->read();
		//$data['detail_material_harga'] = $this->db->get_where('master_material',['id_material'=>$id_material])->row();

		
		
		    
		      $data['data_alkes'] = $this->mmprinsp->Getalkes_db1("order by pt_alkes,idalkess desc")->result_array();
			$data['nama'] = $this->session->userdata('nama');	
			$data['cabang'] = $this->session->userdata('cabang');	
			$data['kode_pabrik']= $this->mmprinsp->GetKodePrinsp_db1("where pabrikid !='-' or (alkesid='-' and alumid='-')order by pabriknama DESC")->result_array();
			$data['kode_alkes']= $this->mmprinsp->GetKodealkes_db1("order by alkesnama DESC")->result_array();
			$data['s_kode']= $this->mmprinsp->Getskode_db2()->result_array();;
			// $data['data_pengajuan'] = $this->mmprinsp->GetPengajuan("order by id_pengajuan DESC")->result_array();
			// $data['data_material'] = $this->mmprinsp->GetPaket("order by id_material asc")->result_array();
			//$data['data_material2'] = $this->mmprinsp->getMaterial();
			
	  
	$this->template->Display('master_prinsipal/data_alkesgab', $data);
	}

	function getprinsipal_db1()
    
  {
    $this->load->model('mmprinsp');
    $pabrikid=$this->input->post('pabrikid');
    $data=$this->mmprinsp->get_data_pabrik_bykode_db1($pabrikid);
    echo json_encode($data);
    
  }

  function getalum_db1()
    
  {
    $this->load->model('mmprinsp');
    $alumid=$this->input->post('alumid');
    $data=$this->mmprinsp->get_data_alum_bykode_db1($alumid);
    echo json_encode($data);
    
  }

  function getalkes_db1()
    
  {
    $this->load->model('mmprinsp');
    $alkesid=$this->input->post('alkesid');
    $data=$this->mmprinsp->get_data_alkes_bykode_db1($alkesid);
    echo json_encode($data);
    
  }

  function getsuplier_db2()
    
  {
    $this->load->model('mmprinsp');
    $s_kode=$this->input->post('s_kode');
    $data=$this->mmprinsp->get_data_suplier_bykode_db2($s_kode);
    echo json_encode($data);
    
  }
	
		// function get_detail_barang(){
        // $id['no_pengajuan']=$this->input->post('no_pengajuan');
        // $data=array(
            // 'data_item'=>$this->mmprinsp->getSelectedData('tb_peng_detail',$id)->result(),
			
        // );
        // $this->template->Display('pengajuan_cab/add_pengajuan_detail',$data);
		// }
	
		
		
		// function get_barang()
		
		// {
		// $this->load->model('mmprinsp');
		// $id_material=$this->input->post('id_material');
		// $data=$this->mmprinsp->get_data_barang_bykode($id_material);
		// echo json_encode($data);
		// }
		
		
		// function get_vendor()
		
		// {
		// $this->load->model('mmprinsp');
		// $nm_vendor=$this->input->post('nm_vendor');
		// $data=$this->mmprinsp->get_data_barang_bykodevendor($nm_vendor);
		// echo json_encode($data);
		// }
	
	
	
	// function add_legal_rekanan()
	// {
		// $this->load->model('mvendorlis');
		// $this->load->model('listrikm');
		// $data = array(
		    // 'kodeunik'=> $this->mvendorlis->code_otomatis('kodeunik'),
			// 'nama' => $this->session->userdata('nama'),	
			// 'optRumahSakit' => $this->model->GetRumahSakit()->result_array(),
			// 'cabang' => $this->session->userdata('cabang'),	
			// 'optUraian' => $this->listrikm->Geturaianlistrik()->result_array(),
			// 'periode' => $this->listrikm->Geturaianlistrik()->result_array(),
			// 'cabang' => $this->session->userdata('cabang'),	
		// );

		// $this->template->Display('pengajuan_cab/add_legal_rekanan',$data);
	// }
	

		
	// function add_pengajuan()
	// {
		
	    // $id['no_pengajuan'] = $this->input->post('no_pengajuan');
		// $this->load->model('mmprinsp');
		// $data['nama'] = $this->session->userdata('nama');	
		// $data['cabang'] = $this->session->userdata('cabang');
		
		// $data['data_tipe_rekanan'] = $this->mmprinsp->GetTipeRek()->result_array();
		// $data['data_item_tampung'] = $this->mmprinsp->GetItem_tampung()->result_array();
		
		// $data['kode_pengajuan'] = $this->mmprinsp->code_otomatis();
		// $data ['data_material'] = $this->mmprinsp->GetPaket("order by id_material asc")->result_array();
			
			// 'koders' => $this->session->userdata('koders'),	
			// 'namars' => $this->session->userdata('namars'),
	
		// $this->template->Display('pengajuan_cab/add_pengajuan',$data);
	
	//}
	
	
	// function add_pengajuan_detail($no_pengajuan = 1)
	// {
		
	   // $this->load->model('mmprinsp');
	   // $data['no_pengajuan'] = $this->mmprinsp->code_otomatis();
	   // $id['no_pengajuan'] = $this->input->post('no_pengajuan');
	   // $data['data_item'] = $this->mmprinsp->GetItem("where no_pengajuan = '$no_pengajuan'")->result_array();
	   // $data ['data_material'] = $this->mmprinsp->GetPaket("order by id_material asc")->result_array();
	   
			// $tampung = $this->modelperusahaan->GetWhere("where master_perusahaan = '$id_perusahaan'")->result_array();
		// $tampung = $this->mmprinsp->GetWhere('tb_pengajuan', array('no_pengajuan' => $no_pengajuan ));
		// $data = array(
			// 'createdate' => $tampung[0]['createdate'],
			// 'id_pengajuan' => $tampung[0]['id_pengajuan'],
			// 'no_pengajuan' => $tampung[0]['no_pengajuan'],
			// 'tanggal' => $tampung[0]['tanggal'],
			// 'kategori' => $tampung[0]['kategori'],
		    // 'namars' => $tampung[0]['namars'],
			// 'nm_proyek' => $tampung[0]['nm_proyek'],
			// 'nm_vendor' => $tampung[0]['nm_vendor'],
			
				


			// 'nama' => $this->session->userdata('nama'),	
			// 'cabang' => $this->session->userdata('cabang'),	

			// );
		// $this->template->Display('pengajuan_cab/add_pengajuan_detail', $data);
	// }
	
	function edit_mastertiperek($no_tipe_rekanan=0){
        $this->load->model('mmprinsp');
		$data_bank = $this->mmprinsp->GetTipeRek("where no_tipe_rekanan ='$no_tipe_rekanan'")->result_array();


	    $data = array(

		// 'nama' => $this->session->userdata('nama'),	
		// 'cabang' => $this->session->userdata('cabang'),
		'no_tipe_rekanan' =>  $data_bank[0]['no_tipe_rekanan'],		
		'nm_tipe_rekanan' =>  $data_bank[0]['nm_tipe_rekanan'],
		// '' => $data_bank[0]['id_tipe_produk'],
		// 'tipe_produk' =>  $data_bank[0]['tipe_produk'],	
		
			
	);

	$this->template->display('master_tipe_rekanan/edit_tipe_rekanan', $data);
	
	}
	
	function savedata()
	{
	$this->load->model('mmprinsp');	

           
            //$idprinsipal = $_POST['no_tipe_rekanan'];
		    $pabrik_id = $_POST['pabrik_id'];
		    $pabriknama = $_POST['pabriknama'];
			$nama_pt = $_POST['nama_pt'];
			$s_kode = $_POST['s_kode'];
			$s_nama = $_POST['s_nama'];
			
			$userlog = ($this->session->userdata('nama'));
			date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");

	  $datatgl = $this->mmprinsp->GetPrinsp_db1("where s_kode='$s_kode' and pabrik_id='$pabrik_id'")->result_array();

		$data = array(
			
			'pabrik_id'=> $pabrik_id,
			'pabriknama'=> $pabriknama,
			'nama_pt'=> $nama_pt,
			'createby' => $userlog ,
			'createdate' => $waktusaatini,
			's_kode' => $s_kode,
			's_nama' => $s_nama,
			
	);

		  
				   $pbid = isset($datatgl[0]['pabrik_id']);
                   $skd = isset($datatgl[0]['s_kode']);

				if($pbid == $pabrik_id and $skd == $s_kode){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Perusahaan tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'cmasterprinsp');
		}else{
		 
		
		$result = $this->mmprinsp->Save_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'cmasterprinsp');
		}
				
			

		  //$this->mmprinsp->deleteData("tb_peng_header_tampung",$data);
		  
	}

	function savedata_alum()
	{
	$this->load->model('mmprinsp');	

           
            //$idprinsipal = $_POST['no_tipe_rekanan'];
		    $alumid = $_POST['alumid'];
		    $alumnama = $_POST['alumnama'];
			$pt_alum = $_POST['pt_alum'];
			$distalumid = $_POST['distalumid'];
			$distalumnama = $_POST['distalumnama'];
			
			$userlog = ($this->session->userdata('nama'));
			date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");

	  $datatgl = $this->mmprinsp->Getalum_db1("where distalumid='$distalumid' and alumid='$alumid'")->result_array();

		$data = array(
			
			'alumid'=> $alumid,
			'alumnama'=> $alumnama,
			'pt_alum'=> $pt_alum,
			'distalumid' => $distalumid,
			'distalumnama' => $distalumnama,
			'createby' => $userlog ,
			'createdate' => $waktusaatini,
			
	);

		  
				   $alid = isset($datatgl[0]['alumid']);
                   $da = isset($datatgl[0]['distalumid']);

				if($alid == $alumid and $da == $distalumid){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Data tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'cmasterprinsp/alum');
		}else{
		 
		
		$result = $this->mmprinsp->Savealum_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'cmasterprinsp/alum');
		}
				
			

		  //$this->mmprinsp->deleteData("tb_peng_header_tampung",$data);
		  
	}
	

	function savedata_alkes()
	{
	$this->load->model('mmprinsp');	

           
            //$idprinsipal = $_POST['no_tipe_rekanan'];
		    $alkesid = $_POST['alkesid'];
		    $alkesnama = $_POST['alkesnama'];
			$pt_alkes = $_POST['pt_alkes'];
			$distalkesid = $_POST['distalkesid'];
			$distalkesnama = $_POST['distalkesnama'];
			
			$userlog = ($this->session->userdata('nama'));
			date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");

	  $datatgl = $this->mmprinsp->Getalkes_db1("where distalkesid='$distalkesid' and alkesid='$alkesid'")->result_array();

		$data = array(
			
			'alkesid'=> $alkesid,
			'alkesnama'=> $alkesnama,
			'pt_alkes'=> $pt_alkes,
			'distalkesid' => $distalkesid,
			'distalkesnama' => $distalkesnama,
			'createby' => $userlog ,
			'createdate' => $waktusaatini,
			
			
	);

		  
				   $alid = isset($datatgl[0]['alkesid']);
                   $da = isset($datatgl[0]['distalkesid']);

				if($alid == $alkesid and $da == $distalkesid){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Data tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'cmasterprinsp/alkes');
		}else{
		 
		
		$result = $this->mmprinsp->Savealkes_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'cmasterprinsp/alkes');
		}
				
			

		  //$this->mmprinsp->deleteData("tb_peng_header_tampung",$data);
		  
	}
	
	
	function updateproduk(){
	$this->load->model('tipeprodukm');
	$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d-m-Y H:i:s");  

	$data = array(
	'idpro' =>$this->input->post('idpro'),
	'id_tipe_produk' =>$this->input->post('id_tipe_produk'),
	'tipe_produk' => $this->input->post('tipe_produk'),
	'updatedate' => $waktu,
	'updateby' =>  $this->session->userdata('nama'),
	);

	$hasil = $this->tipeprodukm->Updateproduk($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'tipeproduk');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'tipeproduk');
	}
	}
	
	
	
	
	
	// function savedata_item()
	// {
	// $this->load->model('mmprinsp');	

          // $id_material = $_POST['id_material'];
            // $no_pengajuan = $_POST['no_pengajuan'];
		    // $nm_material = $_POST['nm_material'];
			// $satuan = $_POST['satuan'];
			// $harga = $_POST['harga'];
			// $volume = $_POST['volume'];
			// $subtotal = $volume*$harga;
           // 'tanggal'=>date("d-m-y",strtotime($this->input->post('tanggal'))),
           // 'kd_pegawai'=>$this->session->userdata('ID'),
        
	
		// $data = array(
		  //  'id_material' =>$id_material,
			// 'no_pengajuan' =>$no_pengajuan,
			// 'nm_material' =>$nm_material,
			// 'satuan' =>$satuan,
			// 'harga' =>$harga,
			// 'volume' =>$volume,
			// 'subtotal' =>$subtotal,
			//'tot_harga' =>$tot_harga,
	// );
         // $this->mmprinsp->insertData("tb_peng_header_tampung",$data);
		  // $this->mmprinsp->insertData("tb_peng_detail",$data);
		  
		  // redirect('cpengajuancab/add_pengajuan'.$kode_pengajuan.'');
				// /*if($result == 1){
					
					// $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
					// header('location:'.base_url().'cpengajuancab');
					
				// }else{
				// $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data dengan NO : ".$data['no_pengajuan']." BERHASIL dilakukan</strong></div>");
					// header('location:'.base_url().'cpengajuancab');
		// }	  */
		    
		  
		  
	// }
	
	
       /* $data = array(
		    'no_pengajuan'=>$this->input->post('no_pengajuan'),
            'namars'=>$this->input->post('namars'),
			'nm_proyek'=>$this->input->post('nm_proyek'),
            'nm_vendor'=>$this->input->post('nm_vendor'),
            'tanggal'=>date("Y-m-d",strtotime($this->input->post('tanggal'))),
		);
			foreach($this->cart->contents() as $items){
            $nm_material = $items['nm_material'];
            $satuan = $items['satuan'];
			$volume = $items['volume'];
			$harga = $items['harga'];
            $data_detail = array(
                'no_pengajuan' => $this->input->post('no_pengajuan'),
                'nm_material'=> $nm_material,
                'satuan'=>$satuan,
				'volume'=>$volume,
				'harga'=>$harga,
            );
            $this->mmprinsp->insertData("tb_pengajuan",$data_detail);

            //$update['stok'] = $this->model_app->getKurangStok($kd_barang,$qty);
            //$key['no_pengajuan'] = $no_pengajuan;
            //$this->mmprinsp->updateData("tb_",$update,$key);
        }
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
        redirect('cpengajuancab');
	}*/
	
		function hapus_item($idprinsipal){
			
		$this->load->model('mmprinsp');	
	    $hapus['idprinsipal'] = $this->uri->segment(3);
	
	    $this->mmprinsp->deleteData_db1("tb_prinsipal",$hapus);

        redirect('cmasterprinsp');

	
		}

		function hapus_alum($idalums){
			
		$this->load->model('mmprinsp');	
	    $hapus['idalums'] = $this->uri->segment(3);
	
	    $this->mmprinsp->deleteData_db1("tb_alumdist",$hapus);

        redirect('cmasterprinsp/alum');

	
		}
	

	function hapus_alkes($idalkess){
			
		$this->load->model('mmprinsp');	
	    $hapus['idalkess'] = $this->uri->segment(3);
	
	    $this->mmprinsp->deleteData_db1("tb_alkesdist",$hapus);

        redirect('cmasterprinsp/alkes');

	
		}
	
	
	
	
	}
		
	


