<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cmasterrekan extends CI_Controller 

{

	public function __construct()
	{
		parent::__construct();
	   
	}
	
	function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->mmrekan->get_prov($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->s_nama;
                echo json_encode($arr_result);
            }
        }
    }
	
	
	// function get_autokomplit(){
        // if (isset($_GET['term'])) {
            // $result = $this->mmrekan->get_data_barang_bykodeR($id_memo)($_GET['term']);
            // if (count($result) > 0) {
            // foreach ($result as $row)
                // $arr_result[] = $row->untuk;
                // echo json_encode($arr_result);
            // }
        // }
    // }
	
	
	function get_detail_material2(){
		
		$this->load->model('mmrekan');
        $id_material['id_material']=$this->input->post('id_material');
        $data=array(
            'data_material'=> $this->mmrekan->GetAllData("where id_material = '$id_material'" )->result_array(),
        );
        $this->template->Display('pengajuan_cab/data_pengajuan' ,$data);
    }
	
	  function get_detail_barang(){
        $id['id_material']=$this->input->post('id_material');
        $data=array(
            'data_material'=>$this->mmrekan->getSelectedData('master_material' ,$id)->result(),
        );
        $this->template->Display('pengajuan_cab/ajax_detail_material',$data);
    }

	
	public function get_detail_material()
	{
		$this->load->model('mmrekan');
		//$data['data_material'] = $this->mmrekan->GetPaket("order by id_material asc")->result_array();
		
		if (isset($_POST["id_material"])) {
        $kode_rs = $_POST["id_material"];
                              
       $query['data_material'] = $this->mmrekan->GetAllData("where id_material = '$kode_rs'")->result_array();
       }else{
       $query['data_material'] = $this->mmrekan->GetAllData('order by id_material asc')->result_array();
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
		
		$this->load->model('mmrekan');
			//$data['kode_tipe_rekanan'] = $this->mmrekan->code_otomatis();
		//$data["people"]=$this->mmrekan->read();
		//$data['detail_material_harga'] = $this->db->get_where('master_material',['id_material'=>$id_material])->row();

		
		    $data['nama_rekanan'] = $this->mmrekan->GetViewRekanan()->result_array();
		    $data['tipe_rekanan'] = $this->mmrekan->Get_Tipe_rekanan()->result_array();
		    $data['data_rekanan'] = $this->mmrekan->GetObatCatalog()->result_array();
			$data['nama'] = $this->session->userdata('nama');	
			$data['cabang'] = $this->session->userdata('cabang');	
			//$data['data_material']= $this->mmrekan->getMaterial();
			// $data['data_pengajuan'] = $this->mmrekan->GetPengajuan("order by id_pengajuan DESC")->result_array();
			// $data['data_material'] = $this->mmrekan->GetPaket("order by id_material asc")->result_array();
			//$data['kode_distrib'] = $this->mmrekan->GetDistrib("order by s_kode DESC")->result_array();
			
	  
	$this->template->Display('master_rekanan/data_rekanan', $data);
	}
	
		// function get_detail_barang(){
        // $id['no_pengajuan']=$this->input->post('no_pengajuan');
        // $data=array(
            // 'data_item'=>$this->mmrekan->getSelectedData('tb_peng_detail',$id)->result(),
			
        // );
        // $this->template->Display('pengajuan_cab/add_pengajuan_detail',$data);
		// }
	
		
		
		// function get_barang()
		
		// {
		// $this->load->model('mmrekan');
		// $id_material=$this->input->post('id_material');
		// $data=$this->mmrekan->get_data_barang_bykode($id_material);
		// echo json_encode($data);
		// }
		
		
		// function get_vendor()
		
		// {
		// $this->load->model('mmrekan');
		// $nm_vendor=$this->input->post('nm_vendor');
		// $data=$this->mmrekan->get_data_barang_bykodevendor($nm_vendor);
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
	

		
	function add_legal_rekanan()
	{
		
	    
		$data['nama'] = $this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		
		// $data['data_tipe_rekanan'] = $this->mmrekan->GetTipeRek()->result_array();
		// $data['data_item_tampung'] = $this->mmrekan->GetItem_tampung()->result_array();
		
		// $data['kode_pengajuan'] = $this->mmrekan->code_otomatis();
		// $data ['data_material'] = $this->mmrekan->GetPaket("order by id_material asc")->result_array();
			
			// 'koders' => $this->session->userdata('koders'),	
			// 'namars' => $this->session->userdata('namars'),
	
		$this->template->Display('master_rekanan/add_legal_rekanan',$data);
	
	}
	
	
	// function add_pengajuan_detail($no_pengajuan = 1)
	// {
		
	   // $this->load->model('mmrekan');
	   // $data['no_pengajuan'] = $this->mmrekan->code_otomatis();
	   // $id['no_pengajuan'] = $this->input->post('no_pengajuan');
	   // $data['data_item'] = $this->mmrekan->GetItem("where no_pengajuan = '$no_pengajuan'")->result_array();
	   // $data ['data_material'] = $this->mmrekan->GetPaket("order by id_material asc")->result_array();
	   
			// $tampung = $this->modelperusahaan->GetWhere("where master_perusahaan = '$id_perusahaan'")->result_array();
		// $tampung = $this->mmrekan->GetWhere('tb_pengajuan', array('no_pengajuan' => $no_pengajuan ));
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
	
	// function edit_mastertiperek($no_tipe_rekanan=0){
        // $this->load->model('mmrekan');
		// $data_bank = $this->mmrekan->GetTipeRek("where no_tipe_rekanan ='$no_tipe_rekanan'")->result_array();


	    // $data = array(

		// 'nama' => $this->session->userdata('nama'),	
		// 'cabang' => $this->session->userdata('cabang'),
		// 'no_tipe_rekanan' =>  $data_bank[0]['no_tipe_rekanan'],		
		// 'nm_tipe_rekanan' =>  $data_bank[0]['nm_tipe_rekanan'],
		// '' => $data_bank[0]['id_tipe_produk'],
		// 'tipe_produk' =>  $data_bank[0]['tipe_produk'],	
		
			
	// );

	// $this->template->display('master_tipe_rekanan/edit_tipe_rekanan', $data);
	
	// }
	
	function savedata()
	{
	$this->load->model('mmrekan');	

           
            $nm_produk = $_POST['nm_produk'];
			$alkes = $_POST['alkes'];
			$alum = $_POST['alum'];
			$jumlah = $_POST['jumlah'];
			$harga_ecat = $_POST['harga_ecat'];
			
			$userlog = ($this->session->userdata('nama'));
			date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("d-m-Y H:i:s");
	
		$data = array(
			'nm_produk' =>$nm_produk,
			'alkes' =>$alkes,
			'alum' =>$alum,
			'jumlah' =>$jumlah,
			'harga_ecat' =>$harga_ecat,
			'createby' => $userlog ,
			'createdate' => $waktusaatini,
			//'tot_harga' =>$tot_harga,
	);

		  
				$result = $this->mmrekan->insertData("tb_prod_ecatalog",$data);
				if($result == 1){
					
					$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
					header('location:'.base_url().'cmasterrekan' );
					
				}else{
				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data dengan NO : ".$data['no_pengajuan']." BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'cmasterrekan' );
		}	  
		    
		  //$this->mmrekan->deleteData("tb_peng_header_tampung",$data);
		  
	}
	
	
	function update_distributor(){
	$this->load->model('mmrekan');
	$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d-m-Y H:i:s");  

	$data = array(
	'iddistributor' =>$this->input->post('iddistributor'),
	'kd_distributor' =>$this->input->post('kd_distributor'),
	's_kode' => $this->input->post('s_kode'),
	'updatedate' => $waktu,
	'updateby' =>  $this->session->userdata('nama'),
	);

	$hasil = $this->mmrekan->Update($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'cmasterdistrib');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'cmasterdistrib');
	}
	}
	
	
	
	
	
	// function savedata_item()
	// {
	// $this->load->model('mmrekan');	

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
         // $this->mmrekan->insertData("tb_peng_header_tampung",$data);
		  // $this->mmrekan->insertData("tb_peng_detail",$data);
		  
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
            $this->mmrekan->insertData("tb_pengajuan",$data_detail);

            //$update['stok'] = $this->model_app->getKurangStok($kd_barang,$qty);
            //$key['no_pengajuan'] = $no_pengajuan;
            //$this->mmrekan->updateData("tb_",$update,$key);
        }
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
        redirect('cpengajuancab');
	}*/
	
		function hapus_item($id_produk){
			
		$this->load->model('mmrekan');	
	    $hapus['id_produk'] = $this->uri->segment(3);
	
	    $this->mmrekan->deleteData("tb_prod_ecatalog",$hapus);

        redirect('cmasterrekan');

	
		}
	
	
	
	}
		
	


