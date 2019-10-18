    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_mstproduk extends CI_Controller {
private $filename = "detail_produk";
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('u_name')){
		$this->session->set_flashdata("alerts", "<div class='alerts alert-danger'><strong>Sesi Anda Telah Habis, Silahkan login kembali..</strong></div>");
			redirect('dashboard');

		}
	}


		
	public function index()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));

		$this->load->model('m_mstobat'); 
        $data['data_obat'] = $this->m_mstobat->Getobat("order by idobat desc")->result_array();
	    $data['tipe_produk']= $this->m_mstobat->Gettipe()->result_array();
	    $data['koper']= $this->m_mstobat->Getkoper("where id_tipe_produk='TP001' order by nm_perusahaan asc")->result_array();
	    $data['kodis']= $this->m_mstobat->Getkodis("where id_tipe_produk='TP001' order by nm_distributor asc")->result_array();
	    $data['satuan']= $this->m_mstobat->Getsatuan("order by satuannama asc")->result_array();
	    $data['golongan']= $this->m_mstobat->Getgolongan("order by klasifikasinama asc")->result_array();


	    
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
					

		$this->template->display('master_produk/data_masterproduk', $data);
	}

	function alkes()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));

		$this->load->model('m_mstproduk'); 
        $data['data_produk'] = $this->m_mstproduk->Getproduk("order by idproduk desc")->result_array();
	    $data['tipe_produk']= $this->m_mstproduk->Gettipe()->result_array();
	    $data['koper']= $this->m_mstproduk->Getkoper("where id_tipe_produk='TP003' order by nm_perusahaan asc")->result_array();
	    $data['kodis']= $this->m_mstproduk->Getkodis("where id_tipe_produk='TP003' order by nm_distributor asc")->result_array();
         $data['kdbrg']= $this->m_mstproduk->Getjnsbrg("where tipe='TP003' order by jns_barang asc")->result_array();
	    $data['satuan']= $this->m_mstproduk->Getsatuan("order by satuannama asc")->result_array();

	    $data['kodeunikalkes'] = $this->m_mstproduk->buat_kodealkes();

	    
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
					

		$this->template->display('master_produk/data_masterprodukalkes', $data);
	}

	function alum()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));

		$this->load->model('m_mstproduk'); 
        $data['data_produk'] = $this->m_mstproduk->Getproduk("order by idproduk desc")->result_array();
	    $data['tipe_produk']= $this->m_mstproduk->Gettipe()->result_array();
	    $data['koper']= $this->m_mstproduk->Getkoper("where id_tipe_produk='TP002' order by nm_perusahaan asc")->result_array();
	    $data['kodis']= $this->m_mstproduk->Getkodis("where id_tipe_produk='TP002' order by nm_distributor asc")->result_array();
	    $data['satuan']= $this->m_mstproduk->Getsatuan("order by satuannama asc")->result_array();
         $data['kdbrg']= $this->m_mstproduk->Getjnsbrg("where tipe='TP002' order by jns_barang asc")->result_array();
	     $data['kodeunikalum'] = $this->m_mstproduk->buat_kodealum();

	    
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
					

		$this->template->display('master_produk/data_masterprodukalum', $data);
	}
	
	
	function depbang()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));

		$this->load->model('m_mstproduk'); 
        $data['data_produk'] = $this->m_mstproduk->Getproduk("order by idproduk desc")->result_array();
	    $data['tipe_produk']= $this->m_mstproduk->Gettipe()->result_array();
	    $data['koper']= $this->m_mstproduk->Getkoper("where id_tipe_produk='TP004' order by nm_perusahaan asc")->result_array();
	    $data['kodis']= $this->m_mstproduk->Getkodis("where id_tipe_produk='TP004' order by nm_distributor asc")->result_array();
	    $data['satuan']= $this->m_mstproduk->Getsatuan("order by satuannama asc")->result_array();
         $data['kdbrg']= $this->m_mstproduk->Getjnsbrg("where tipe='TP004' order by jns_barang asc")->result_array();
	     $data['kodeunikdepbang'] = $this->m_mstproduk->buat_kodedepbang();

	    
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
					

		$this->template->display('master_produk/data_masterprodukdepbang', $data);
	}

	function depbang2()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));

		$this->load->model('m_mstproduk'); 
        $data['data_produk'] = $this->m_mstproduk->Getproduk("order by idproduk desc")->result_array();
	    $data['tipe_produk']= $this->m_mstproduk->Gettipe()->result_array();
	    $data['koper']= $this->m_mstproduk->Getkoper("where id_tipe_produk='TP004' order by nm_perusahaan asc")->result_array();
	    $data['kodis']= $this->m_mstproduk->Getkodis("where id_tipe_produk='TP004' order by nm_distributor asc")->result_array();
	    $data['satuan']= $this->m_mstproduk->Getsatuan("order by satuannama asc")->result_array();

	    $data['kjp']= $this->m_mstproduk->Getkjp("order by kode_jenis asc")->result_array();
	    $data['ksjp']= $this->m_mstproduk->Getksjp("order by nm_sub_jenis_pekerjaan asc")->result_array();
	    $data['kjb']= $this->m_mstproduk->Getkjb("order by jenis_barang asc")->result_array();

		$data['kodeunikdepbang'] = $this->m_mstproduk->buat_kodedepbang();

	    
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
					

		$this->template->display('master_produk/data_masterprodukdepbang', $data);
	}

	public function ajax_list()
    {
    	$this->load->model('m_mstobat');
        $list = $this->m_mstobat->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $produk) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $produk->kode_obat;
            $row[] = $produk->nama_obat;
            $row[] = $produk->komposisi;
            $row[] = $produk->klasifikasinama;
            // $row[] = $produk->tipe_produk;
            $row[] = $produk->nm_perusahaan;
            $row[] = $produk->nm_distributor;

            $row[] = 'Rp. '. number_format($produk->harga, 0,',', '.');
            $row[] = $produk->discount;
            $row[] = $produk->satuannama;
           // $row[] = $produk->persentase;
           // $row[] = $produk->merk;
            

            $row[] = '<a href="C_mstproduk/edit/'.$produk->idobat.'" class="edit_record btn btn-xs btn btn-success" title="Edit" onclick=""><i class="glyphicon glyphicon-pencil"></i></a>
		<a class="hapus_record btn btn-xs btn-danger" href="C_mstproduk/hapus/'.$produk->idobat.'" title="Hapus" onClick="return doconfirm()"><i class="glyphicon glyphicon-trash"></i> </a>';
           
           
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_mstobat->count_all(),
                        "recordsFiltered" => $this->m_mstobat->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_listalkes()
    {
    	$this->load->model('m_mstproduk');
        $list = $this->m_mstproduk->get_datatablesalkes();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $produkalkes) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $produkalkes->kode_produk;
            $row[] = $produkalkes->nama_produk;
            $row[] = $produkalkes->merk;
            // $row[] = $produkalkes->tipe_produk;
            $row[] = $produkalkes->type;
            $row[] = $produkalkes->nm_perusahaan;
         	 $row[] = $produkalkes->jns_barang;
            

            $row[] = '<a href="editalkes/'.$produkalkes->idproduk.'" class="edit_record btn btn-xs btn btn-success" title="Edit" onclick=""><i class="glyphicon glyphicon-pencil"></i></a>
	<a class="hapus_record btn btn-xs btn-danger" href="hapusalkes/'.$produkalkes->idproduk.'" title="Hapus" onClick="return doconfirm()"><i class="glyphicon glyphicon-trash"></i> </a>';
           
           
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_mstproduk->count_all(),
                        "recordsFiltered" => $this->m_mstproduk->count_filteredalkes(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

     public function ajax_listalum()
    {
    	$this->load->model('m_mstproduk');
        $list = $this->m_mstproduk->get_datatablesalum();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $produk) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $produk->kode_produk;
            $row[] = $produk->nama_produk;
            $row[] = $produk->deskripsi;
            // $row[] = $produk->tipe_produk;
            $row[] = $produk->nm_perusahaan;
            // $row[] = $produk->harga;
            $row[] = $produk->volume;
            $row[] = $produk->satuannama;
            $row[] = $produk->merk;
         	 $row[] = $produk->jns_barang;
            

            $row[] = '<a href="editalum/'.$produk->idproduk.'" class="edit_record btn btn-xs btn btn-success" title="Edit" onclick=""><i class="glyphicon glyphicon-pencil"></i></a>
		<a class="hapus_record btn btn-xs btn-danger" href="hapusalum/'.$produk->idproduk.'" title="Hapus" onClick="return doconfirm()"><i class="glyphicon glyphicon-trash"></i> </a>';
           
           
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_mstproduk->count_all(),
                        "recordsFiltered" => $this->m_mstproduk->count_filteredalum(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
	
	     public function ajax_listdepbang()
    {
    	$this->load->model('m_mstproduk');
        $list = $this->m_mstproduk->get_datatablesdepbang();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $produk) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $produk->kode_produk;
            $row[] = $produk->nama_produk;
            $row[] = $produk->deskripsi;
            // $row[] = $produk->tipe_produk;
            $row[] = $produk->nm_perusahaan;
            // $row[] = $produk->harga;
            $row[] = $produk->volume;
            $row[] = $produk->satuannama;
            $row[] = $produk->merk;
         	 $row[] = $produk->jns_barang;
            

            $row[] = '<a href="editdepbang/'.$produk->idproduk.'" class="edit_record btn btn-xs btn btn-success" title="Edit" onclick=""><i class="glyphicon glyphicon-pencil"></i></a>
	<a class="hapus_record btn btn-xs btn-danger" href="hapusdepbang/'.$produk->idproduk.'" title="Hapus" onClick="return doconfirm()"><i class="glyphicon glyphicon-trash"></i> </a>';
           
           
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_mstproduk->count_all(),
                        "recordsFiltered" => $this->m_mstproduk->count_filteredalum(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

     public function ajax_listdepbang2()
    {
    	$this->load->model('m_mstproduk');
        $list = $this->m_mstproduk->get_datatablesdepbang();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $produk) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $produk->nm_pekerjaan;
            $row[] = $produk->nm_sub_jenis_pekerjaan;
            $row[] = $produk->jenis_barang;
            $row[] = $produk->kode_produk;
            $row[] = $produk->nama_produk;
            $row[] = $produk->deskripsi;
            // $row[] = $produk->tipe_produk;
            $row[] = $produk->merk;
         	
            

            $row[] = '<a href="editdepbang/'.$produk->idproduk.'" class="edit_record btn btn-xs btn btn-success" title="Edit" onclick=""><i class="glyphicon glyphicon-pencil"></i></a>
	<a class="hapus_record btn btn-xs btn-danger" href="hapusdepbang/'.$produk->idproduk.'" title="Hapus" onClick="return doconfirm()"><i class="glyphicon glyphicon-trash"></i> </a>';
           
           
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_mstproduk->count_all(),
                        "recordsFiltered" => $this->m_mstproduk->count_filtereddepbang(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function v_export_excel(){
		$this->load->model('m_mstobat'); 
           $data = array( 'title' => 'Laporan Excel | DATA PRODUK OBAT',
                'exp_produk' => $this->m_mstobat->getAll());
 
           $this->load->view('master_produk/vw_lap_excel',$data);
      }

	public function export_excel(){
		$this->load->model('m_mstobat'); 
           $data = array( 'title' => 'Laporan Excel | DATA PRODUK OBAT',
                'exp_produk' => $this->m_mstobat->getAll());
 
           $this->load->view('master_produk/lap_excel',$data);
      }

      public function v_export_excelalkes(){
		$this->load->model('m_mstproduk'); 
           $data = array( 'title' => 'Laporan Excel | DATA PRODUK ALKES',
                'exp_alkes' => $this->m_mstproduk->getAllalkes());
 
           $this->load->view('master_produk/vw_lap_excelalkes',$data);
      }

	public function export_excelalkes(){
		$this->load->model('m_mstproduk'); 
           $data = array( 'title' => 'Laporan Excel | DATA PRODUK ALKES',
                'exp_alkes' => $this->m_mstproduk->getAllalkes());
 
           $this->load->view('master_produk/lap_excelalkes',$data);
      }

      public function v_export_excelalum(){
		$this->load->model('m_mstproduk'); 
           $data = array( 'title' => 'Laporan Excel | DATA PRODUK ALUM',
                'exp_alum' => $this->m_mstproduk->getAllalum());
 
           $this->load->view('master_produk/vw_lap_excelalum',$data);
      }

	public function export_excelalum(){
		$this->load->model('m_mstproduk'); 
           $data = array( 'title' => 'Laporan Excel | DATA PRODUK ALUM',
                'exp_alum' => $this->m_mstproduk->getAllalum());
 
           $this->load->view('master_produk/lap_excelalum',$data);
      }

       public function v_export_exceldepbang(){
		$this->load->model('m_mstproduk'); 
           $data = array( 'title' => 'Laporan Excel | DATA PRODUK DEPBANG',
                'exp_depbang' => $this->m_mstproduk->getAlldepbang());
 
           $this->load->view('master_produk/vw_lap_exceldepbang',$data);
      }

	public function export_exceldepbang(){
		$this->load->model('m_mstproduk'); 
           $data = array( 'title' => 'Laporan Excel | DATA PRODUK DEPBANG',
                'exp_depbang' => $this->m_mstproduk->getAlldepbang());
 
           $this->load->view('master_produk/lap_exceldepbang',$data);
      }

	
	function savedata(){
		$this->load->model('m_mstobat');
		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('kode_obat','kode_obat', 'trim|required|is_unique[master_obat.kode_obat]');

		 $this->form_validation->set_message('required', '%s sudah terisi data !');
		 $this->form_validation->set_message('exist_kode','%s sudah ada di database, pilih kode obat yang lain');

		if ($this->form_validation->run()==TRUE) {
		// $idproduk = $_POST['idproduk'];
		$kode_obat = $_POST['kode_obat'];
		$nama_obat = $_POST['nama_obat'];
		$komposisi = $_POST['komposisi'];
		$golonganid = $_POST['golonganid'];
		$tipe_produk = $_POST['tipe_produk'];
		$koper = $_POST['koper'];
		$kodis = $_POST['kodis'];

		$harga = $_POST['harga'];
		$discount = $_POST['discount'];
		$satuanid = $_POST['satuanid'];
		// $persentase = $_POST['persentase'];
		// $merk = $_POST['merk'];
		
		
			
		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	

		$data = array(	
			// 'idproduk' => $idproduk,
			'kode_obat' => $kode_obat,
			'nama_obat' => $nama_obat,
			'komposisi' => $komposisi,
			'golonganid' => $golonganid,
			'tipe_produk' => $tipe_produk,
			'koper' => $koper,
			'kodis' => $kodis,
      
			'harga' => $harga,
			'discount' => $discount,
			'satuanid' => $satuanid,
			//'persentase' => $persentase,
			//'merk' => $merk,

			
			
					
			'createddate' => $waktusaatini,
			'createdby' =>  $this->session->userdata('nama'),			
			);
		
		
		$result = $this->m_mstobat->Simpan('master_obat', $data);
		}

		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'C_mstproduk');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'C_mstproduk');
		}		
	}

	function savedata1(){
		$this->load->model('m_mstproduk');
		
		// $idproduk = $_POST['idproduk'];
		$kode_produk = $_POST['kode_produk'];
		$nama_produk = $_POST['nama_produk'];
		$kd_jns_brg = $_POST['kd_jns_brg'];
		$tipe_produk = $_POST['tipe_produk'];
		$koper = $_POST['koper'];
		$type = $_POST['type'];
		// $status_pdk='aktif';
		
		$merk = $_POST['merk'];
		
			
		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	

		$data = array(	
			// 'idproduk' => $idproduk,
			'kode_produk' => $kode_produk,
			'nama_produk' => $nama_produk,
			'tipe_produk' => $tipe_produk,
			'koper' => $koper,
			'type' => $type,
			'merk' => $merk,
      // 'status_pdk'=>$status_pdk,
			 'kd_jns_brg' =>$kd_jns_brg,	
			'createddate' => $waktusaatini,
			'createdby' =>  $this->session->userdata('nama'),			
			);

		
		
		
		$result = $this->m_mstproduk->Simpan('master_produk', $data);
		
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'C_mstproduk/alkes');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'C_mstproduk/alkes');
		}		
	}

	function savedata2(){
		$this->load->model('m_mstproduk');
		
		// $idproduk = $_POST['idproduk'];
		$kode_produk = $_POST['kode_produk'];
		$nama_produk = $_POST['nama_produk'];
		$deskripsi = $_POST['deskripsi'];
		$tipe_produk = $_POST['tipe_produk'];
		$koper = $_POST['koper'];
		$harga = $_POST['harga'];
		$volume = $_POST['volume'];
		$satuanid = $_POST['satuanid'];
		$merk = $_POST['merk'];
		$kd_jns_brg = $_POST['kd_jns_brg'];
			
		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	

		$data = array(	
			// 'idproduk' => $idproduk,
			'kode_produk' => $kode_produk,
			'nama_produk' => $nama_produk,
			'deskripsi' => $deskripsi,
			'tipe_produk' => $tipe_produk,
			'koper' => $koper,
			'harga' => $harga,
			'volume' => $volume,
			'satuanid' => $satuanid,
			'merk' => $merk,
			 'kd_jns_brg' =>$kd_jns_brg, 	
			'createddate' => $waktusaatini,
			'createdby' =>  $this->session->userdata('nama'),			
			);

		
		
		
		$result = $this->m_mstproduk->Simpan('master_produk', $data);
		
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'C_mstproduk/alum');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'C_mstproduk/alum');
		}		
	}
	
	function savedata3(){
		$this->load->model('m_mstproduk');
		
		// $idproduk = $_POST['idproduk'];
		$kode_produk = $_POST['kode_produk'];
		$nama_produk = $_POST['nama_produk'];
		$deskripsi = $_POST['deskripsi'];
		$tipe_produk = $_POST['tipe_produk'];
		$koper = $_POST['koper'];
		// $harga = $_POST['harga'];
		$volume = $_POST['volume'];
		$satuanid = $_POST['satuanid'];
		$merk = $_POST['merk'];
		$kd_jns_brg = $_POST['kd_jns_brg'];
			
		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	

		$data = array(	
			// 'idproduk' => $idproduk,
			'kode_produk' => $kode_produk,
			'nama_produk' => $nama_produk,
			'deskripsi' => $deskripsi,
			'tipe_produk' => $tipe_produk,
			'koper' => $koper,
			// 'harga' => $harga,
			'volume' => $volume,
			'satuanid' => $satuanid,
			'merk' => $merk,
			'kd_jns_brg' =>$kd_jns_brg,	
			'createddate' => $waktusaatini,
			'createdby' =>  $this->session->userdata('nama'),			
			);

		
		
		
		$result = $this->m_mstproduk->Simpan('master_produk', $data);
		
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'C_mstproduk/depbang');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'C_mstproduk/depbang');
		}		
	}
	
	
	
	

	function savedata4(){
		$this->load->model('m_mstproduk');
		
		// $idproduk = $_POST['idproduk'];
		$kode_sub_jenis_pekj = $_POST['kode_sub_jenis_pekj'];
		$kode_produk = $_POST['kode_produk'];
		$nama_produk = $_POST['nama_produk'];
		$deskripsi = $_POST['deskripsi'];
		$tipe_produk = $_POST['tipe_produk'];
		$merk = $_POST['merk'];
		
			
		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	

		$data = array(	
			// 'idproduk' => $idproduk,
			'kode_sub_jenis_pekj' => $kode_sub_jenis_pekj,
			'kode_produk' => $kode_produk,
			'nama_produk' => $nama_produk,
			'deskripsi' => $deskripsi,
			'tipe_produk' => $tipe_produk,
			'merk' => $merk,
				
			'createddate' => $waktusaatini,
			'createdby' =>  $this->session->userdata('nama'),			
			);

		
		
		
		$result = $this->m_mstproduk->Simpan('master_produk', $data);
		
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'C_mstproduk/depbang');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'C_mstproduk/depbang');
		}		
	}



	function edit($kode=0){

	$this->load->model('m_mstobat');
	
	$data_abk = $this->m_mstobat->AmbilObat("where idobat ='$kode'")->result_array();
	
	 $for_prins = array();
		foreach($this->m_mstobat->AmbilObat("where idobat = '$kode' ")->result_array() as $prins){
			$for_prins[] = $prins['koper'];
		}

	  $for_prinss = array();
		foreach($this->m_mstobat->AmbilObat("where idobat = '$kode' ")->result_array() as $prinss){
			$for_prinss[] = $prinss['kodis'];
		}

		$for_prinsss = array();
		foreach($this->m_mstobat->AmbilObat("where idobat = '$kode' ")->result_array() as $prinsss){
			$for_prinsss[] = $prinsss['golonganid'];
		}

		$for_prinssss = array();
		foreach($this->m_mstobat->AmbilObat("where idobat = '$kode' ")->result_array() as $prinssss){
			$for_prinssss[] = $prinssss['satuanid'];
		}

		

	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'nama_user' => $this->session->userdata('nama_user'),
		'foto' => $this->session->userdata('foto'),

		'idobat' => $data_abk[0]['idobat'],
		'tipe_produk' => $data_abk[0]['tipe_produk'],
		'kode_obat' => $data_abk[0]['kode_obat'],		
		'nama_obat' => $data_abk[0]['nama_obat'],
		'komposisi' => $data_abk[0]['komposisi'],

		'golonganid' => $data_abk[0]['golonganid'],
		'prinsss' => $this->m_mstobat->Getgolongan()->result_array(),
		'for_prinsss' => $for_prinsss,

		'koper' => $data_abk[0]['koper'],
		'prins' => $this->m_mstobat->Getkoper()->result_array(),
		'for_prins' => $for_prins,

		'kodis' => $data_abk[0]['kodis'],
		'prinss' => $this->m_mstobat->Getkodis()->result_array(),
		'for_prinss' => $for_prinss,

		'harga' => $data_abk[0]['harga'],
		'discount' => $data_abk[0]['discount'],

		'satuanid' => $data_abk[0]['satuanid'],
		'prinssss' => $this->m_mstobat->Getsatuan()->result_array(),
		'for_prinssss' => $for_prinssss,

		//'persentase' => $data_abk[0]['persentase'],
		//'merk' => $data_abk[0]['merk'],

		
			
		
	
		// 'data_uraiankrs' => $this->m_mstproduk->AmbilProduk("where idproduk = '$kode' order by idproduk asc")->result_array()
			
		);

	
		$this->template->Display('master_produk/edit_produk', $data);

	}

	function update(){


	$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d M Y H:i:s");
        $waktus =date("Ym");

   
	$data = array(
	'idobat' =>$this->input->post('idobat'),
	'kode_obat' =>$this->input->post('kode_obat'),
	'nama_obat' =>$this->input->post('nama_obat'),
	'komposisi' =>$this->input->post('komposisi'),
	'golonganid' =>$this->input->post('golonganid'),
	'tipe_produk' => $this->input->post('tipe_produk'),
	'koper' =>$this->input->post('koper'),
	'kodis' =>$this->input->post('kodis'),
	'harga' =>$this->input->post('harga'),
	'discount' =>$this->input->post('discount'),
	'satuanid' =>$this->input->post('satuanid'),
	//'persentase' =>$this->input->post('persentase'),
	//'merk' =>$this->input->post('merk'),

	'updatedby' =>  $this->session->userdata('nama'),
	'updateddate' =>  $waktu,
	
	);
	$this->load->model('m_mstobat');
	$hasil = $this->m_mstobat->UpdateProduk($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'C_mstproduk');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'C_mstproduk');
	}
	}

	function editalkes($kode=0){

	$this->load->model('m_mstproduk');
	
	$data_abk = $this->m_mstproduk->AmbilProdukAlkes("where idproduk ='$kode'")->result_array();
	
	 $for_prins = array();
		foreach($this->m_mstproduk->AmbilProdukAlkes("where idproduk = '$kode' ")->result_array() as $prins){
			$for_prins[] = $prins['koper'];
		}

	  $for_prinss = array();
		foreach($this->m_mstproduk->AmbilProdukAlkes("where idproduk = '$kode' ")->result_array() as $prinss){
			$for_prinss[] = $prinss['kodis'];
		}

  $for_prinsss = array();
        foreach($this->m_mstproduk->AmbilProdukAlkesview("where idproduk = '$kode' ")->result_array() as $prinsss){
            $for_prinsss[] = $prinsss['kd_jns_brg'];
        }
		

	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'nama_user' => $this->session->userdata('nama_user'),
		'foto' => $this->session->userdata('foto'),

		'idproduk' => $data_abk[0]['idproduk'],
		'tipe_produk' => $data_abk[0]['tipe_produk'],
		'kode_produk' => $data_abk[0]['kode_produk'],		
		'nama_produk' => $data_abk[0]['nama_produk'],
		'merk' => $data_abk[0]['merk'],
		'type' => $data_abk[0]['type'],
		'koper' => $data_abk[0]['koper'],
		'prins' => $this->m_mstproduk->Getkoper()->result_array(),
		'for_prins' => $for_prins,
		'prinsss' => $this->m_mstproduk->Getjnsbrg("where tipe='TP003'")->result_array(),
        'for_prinsss' => $for_prinsss,	
			
		
	
		'data_uraiankrs' => $this->m_mstproduk->AmbilProdukAlkes("where idproduk = '$kode' order by idproduk asc")->result_array()
			
		);

	
		$this->template->Display('master_produk/edit_alkes', $data);

	}

	function updatealkes(){


	$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d M Y H:i:s");
        $waktus =date("Ym");

   
	$data = array(
	'idproduk' =>$this->input->post('idproduk'),
	'kode_produk' =>$this->input->post('kode_produk'),
	'nama_produk' =>$this->input->post('nama_produk'),
	'merk' =>$this->input->post('merk'),
	'type' =>$this->input->post('type'),
	'tipe_produk' => $this->input->post('tipe_produk'),
	'koper' =>$this->input->post('koper'),
	'kd_jns_brg' =>$this->input->post('kd_jns_brg'),

	'updatedby' =>  $this->session->userdata('nama'),
	'updateddate' =>  $waktu,
	
	);
	$this->load->model('m_mstproduk');
	$hasil = $this->m_mstproduk->UpdateProduk($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'C_mstproduk/alkes');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'C_mstproduk/alkes');
	}
	}


	function editalum($kode=0){

	$this->load->model('m_mstproduk');
	
	$data_abk = $this->m_mstproduk->AmbilProduk("where idproduk ='$kode'")->result_array();
	
	 $for_prins = array();
		foreach($this->m_mstproduk->AmbilProduk("where idproduk = '$kode' ")->result_array() as $prins){
			$for_prins[] = $prins['koper'];
		}

	  $for_prinss = array();
		foreach($this->m_mstproduk->AmbilProduk("where idproduk = '$kode' ")->result_array() as $prinss){
			$for_prinss[] = $prinss['kodis'];
		}

		$for_prinsss = array();
		foreach($this->m_mstproduk->AmbilProduk("where idproduk = '$kode' ")->result_array() as $prinsss){
			$for_prinsss[] = $prinsss['satuanid'];
		}

 $for_prinssss = array();
        foreach($this->m_mstproduk->AmbilProdukAlkesview("where idproduk = '$kode' ")->result_array() as $prinssss){
            $for_prinssss[] = $prinssss['kd_jns_brg'];
        }
		

	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'nama_user' => $this->session->userdata('nama_user'),
		'foto' => $this->session->userdata('foto'),

		'idproduk' => $data_abk[0]['idproduk'],
		'tipe_produk' => $data_abk[0]['tipe_produk'],
		'kode_produk' => $data_abk[0]['kode_produk'],		
		'nama_produk' => $data_abk[0]['nama_produk'],
		'deskripsi' => $data_abk[0]['deskripsi'],
		
		'koper' => $data_abk[0]['koper'],
		'prins' => $this->m_mstproduk->Getkoper()->result_array(),
		'for_prins' => $for_prins,

		'harga' => $data_abk[0]['harga'],
		'volume' => $data_abk[0]['volume'],

		'satuanid' => $data_abk[0]['satuanid'],
		'prinsss' => $this->m_mstproduk->Getsatuan()->result_array(),
		'for_prinsss' => $for_prinsss,

		'merk' => $data_abk[0]['merk'],
		'prinssss' => $this->m_mstproduk->Getjnsbrg("where tipe='TP002'")->result_array(),
        'for_prinssss' => $for_prinssss,		
			
		
	
		'data_uraiankrs' => $this->m_mstproduk->AmbilProduk("where idproduk = '$kode' order by idproduk asc")->result_array()
			
		);

	
		$this->template->Display('master_produk/edit_alum', $data);

	}

	function updatealum(){


	$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d M Y H:i:s");
        $waktus =date("Ym");

   
	$data = array(
	'idproduk' =>$this->input->post('idproduk'),
	'kode_produk' =>$this->input->post('kode_produk'),
	'nama_produk' =>$this->input->post('nama_produk'),
	'deskripsi' =>$this->input->post('deskripsi'),
	'tipe_produk' => $this->input->post('tipe_produk'),
	'koper' =>$this->input->post('koper'),
	'harga' =>$this->input->post('harga'),
	'volume' =>$this->input->post('volume'),
	'satuanid' =>$this->input->post('satuanid'),
	'merk' =>$this->input->post('merk'),
     'kd_jns_brg' =>$this->input->post('kd_jns_brg'),
	'updatedby' =>  $this->session->userdata('nama'),
	'updateddate' =>  $waktu,
	
	);
	$this->load->model('m_mstproduk');
	$hasil = $this->m_mstproduk->UpdateProduk($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'C_mstproduk/alum');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'C_mstproduk/alum');
	}
	}
	
	
	
	function editdepbang($kode=0){

	$this->load->model('m_mstproduk');
	
	$data_abk = $this->m_mstproduk->AmbilProduk("where idproduk ='$kode'")->result_array();
	
	 $for_prins = array();
		foreach($this->m_mstproduk->AmbilProduk("where idproduk = '$kode' ")->result_array() as $prins){
			$for_prins[] = $prins['koper'];
		}

	  $for_prinss = array();
		foreach($this->m_mstproduk->AmbilProduk("where idproduk = '$kode' ")->result_array() as $prinss){
			$for_prinss[] = $prinss['kodis'];
		}

		$for_prinsss = array();
		foreach($this->m_mstproduk->AmbilProduk("where idproduk = '$kode' ")->result_array() as $prinsss){
			$for_prinsss[] = $prinsss['satuanid'];
		}

 $for_prindepbang = array();
        foreach($this->m_mstproduk->AmbilProdukAlkesview("where idproduk = '$kode' ")->result_array() as $prindepbang){
            $for_prindepbang[] = $prindepbang['kd_jns_brg'];
        }
		

	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'nama_user' => $this->session->userdata('nama_user'),
		'foto' => $this->session->userdata('foto'),

		'idproduk' => $data_abk[0]['idproduk'],
		'tipe_produk' => $data_abk[0]['tipe_produk'],
		'kode_produk' => $data_abk[0]['kode_produk'],		
		'nama_produk' => $data_abk[0]['nama_produk'],
		'deskripsi' => $data_abk[0]['deskripsi'],
		
		'koper' => $data_abk[0]['koper'],
		'prins' => $this->m_mstproduk->Getkoper()->result_array(),
		'for_prins' => $for_prins,

		'harga' => $data_abk[0]['harga'],
		'volume' => $data_abk[0]['volume'],

		'satuanid' => $data_abk[0]['satuanid'],
		'prinsss' => $this->m_mstproduk->Getsatuan()->result_array(),
		'for_prinsss' => $for_prinsss,

		'merk' => $data_abk[0]['merk'],
		'prindepbang' => $this->m_mstproduk->Getjnsbrg("where tipe='TP004'")->result_array(),
        'for_prindepbang' => $for_prindepbang,
			
		
	
		'data_uraiankrs' => $this->m_mstproduk->AmbilProduk("where idproduk = '$kode' order by idproduk asc")->result_array()
			
		);

	
		$this->template->Display('master_produk/edit_depbang', $data);

	}

	function updatedepbang(){


	$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d M Y H:i:s");
        $waktus =date("Ym");

   
	$data = array(
	'idproduk' =>$this->input->post('idproduk'),
	'kode_produk' =>$this->input->post('kode_produk'),
	'nama_produk' =>$this->input->post('nama_produk'),
	'deskripsi' =>$this->input->post('deskripsi'),
	'tipe_produk' => $this->input->post('tipe_produk'),
	'koper' =>$this->input->post('koper'),
	'harga' =>$this->input->post('harga'),
	'volume' =>$this->input->post('volume'),
	'satuanid' =>$this->input->post('satuanid'),
	'merk' =>$this->input->post('merk'),
'kd_jns_brg' =>$this->input->post('kd_jns_brg'),
	'updatedby' =>  $this->session->userdata('nama'),
	'updateddate' =>  $waktu,
	
	);
	$this->load->model('m_mstproduk');
	$hasil = $this->m_mstproduk->UpdateProduk($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'C_mstproduk/depbang');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'C_mstproduk/depbang');
	}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	function editdepbang2($kode=0){

	$this->load->model('m_mstproduk');
	
	$data_abk = $this->m_mstproduk->AmbilProduk("where idproduk ='$kode'")->result_array();
	
	 $for_prins = array();
		foreach($this->m_mstproduk->AmbilProduk("where idproduk = '$kode' ")->result_array() as $prins){
			$for_prins[] = $prins['kode_jenis_pekj'];
		}

	  $for_prinss = array();
		foreach($this->m_mstproduk->AmbilProduk("where idproduk = '$kode' ")->result_array() as $prinss){
			$for_prinss[] = $prinss['kode_sub_jenis_pekj'];
		}

		$for_prinsss = array();
		foreach($this->m_mstproduk->AmbilProduk("where idproduk = '$kode' ")->result_array() as $prinsss){
			$for_prinsss[] = $prinsss['kode_jenis_barang'];
		}

		

	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'nama_user' => $this->session->userdata('nama_user'),
		'foto' => $this->session->userdata('foto'),

		'idproduk' => $data_abk[0]['idproduk'],
		'tipe_produk' => $data_abk[0]['tipe_produk'],
		
		'kode_produk' => $data_abk[0]['kode_produk'],		
		'nama_produk' => $data_abk[0]['nama_produk'],
		'deskripsi' => $data_abk[0]['deskripsi'],
		'merk' => $data_abk[0]['merk'],

		'kode_jenis_pekj' => $data_abk[0]['kode_jenis_pekj'],
		'prins' => $this->m_mstproduk->Getkjp()->result_array(),
		'for_prins' => $for_prins,

		'kode_sub_jenis_pekj' => $data_abk[0]['kode_sub_jenis_pekj'],
		'prinss' => $this->m_mstproduk->Getksjp()->result_array(),
		'for_prinss' => $for_prinss,


		'kode_jenis_barang' => $data_abk[0]['kode_jenis_barang'],
		'prinsss' => $this->m_mstproduk->Getkjb()->result_array(),
		'for_prinsss' => $for_prinsss,

		
			
		
	
		'data_uraiankrs' => $this->m_mstproduk->AmbilProduk("where idproduk = '$kode' order by idproduk asc")->result_array()
			
		);

	
		$this->template->Display('master_produk/edit_depbang', $data);

	}

	function updatedepbang2(){


	$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d M Y H:i:s");
        $waktus =date("Ym");

   
	$data = array(
	'idproduk' =>$this->input->post('idproduk'),
	'kode_jenis_pekj' =>$this->input->post('kode_jenis_pekj'),
	'kode_jenis_barang' =>$this->input->post('kode_jenis_barang'),
	'kode_sub_jenis_pekj' =>$this->input->post('kode_sub_jenis_pekj'),
	'kode_produk' =>$this->input->post('kode_produk'),
	'nama_produk' =>$this->input->post('nama_produk'),
	'deskripsi' =>$this->input->post('deskripsi'),
	'merk' =>$this->input->post('merk'),

	'updatedby' =>  $this->session->userdata('nama'),
	'updateddate' =>  $waktu,
	
	);
	$this->load->model('m_mstproduk');
	$hasil = $this->m_mstproduk->UpdateProduk($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'C_mstproduk/depbang');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'C_mstproduk/depbang');
	}
	}

	
	function hapus($kode = 1){
	$this->load->model('m_mstobat');	
	$result = $this->m_mstobat->Hapus('master_obat', array('idobat' => $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'C_mstproduk');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'C_mstproduk');
	}
	}

	function hapusalkes($kode = 1){
	$this->load->model('m_mstproduk');	
	$result = $this->m_mstproduk->Hapus('master_produk', array('idproduk' => $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'C_mstproduk/alkes');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'C_mstproduk/alkes');
	}
	}

	function hapusalum($kode = 1){
	$this->load->model('m_mstproduk');	
	$result = $this->m_mstproduk->Hapus('master_produk', array('idproduk' => $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'C_mstproduk/alum');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'C_mstproduk/alum');
	}
	}

	function hapusdepbang($kode = 1){
	$this->load->model('m_mstproduk');	
	$result = $this->m_mstproduk->Hapus('master_produk', array('idproduk' => $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'C_mstproduk/depbang');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'C_mstproduk/depbang');
	}
	}
	
	public function form(){
		$this->load->model('m_mstobat');
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di ITModel_Cis_Money.php
			$upload = $this->m_mstobat->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		
		$this->template->Display('master_produk/exp_exelprod', $data);
	}
	
	public function import(){
		$this->load->model('m_mstobat');
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = [];
		
		// $userlog = ($this->session->userdata('nama'));	
		// $katmoney = 'money';
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");	
			
		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Kita push (add) array data ke variabel data
				array_push($data, [
					
					'kode_obat'=>$row['A'], // Insert data nis dari kolom A di excel
					'nama_obat'=>$row['B'],
					'komposisi'=>$row['C'], // Insert data nis dari kolom B di excel
					'golonganid'=>$row['D'],
					'tipe_produk'=>$row['E'],
					'koper'=>$row['F'],
					'kodis' =>$row['G'], // Insert data nis dari kolom C di excel

					'harga'=>$row['H'],
					'discount'=>$row['I'],
					'satuanid'=>$row['J'],
					'persentase'=>$row['K'],
					'merk'=>$row['L'],

					
				]);
			}
		
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->m_mstobat->insert_multiple($data);
		
		redirect("C_mstproduk"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}


	public function formalkes(){
		$this->load->model('m_mstproduk');
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di ITModel_Cis_Money.php
			$upload = $this->m_mstproduk->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		
		$this->template->Display('master_produk/exp_exelprodalkes', $data);
	}
	
	public function importalkes(){
		$this->load->model('m_mstproduk');
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = [];
		
		// $userlog = ($this->session->userdata('nama'));	
		// $katmoney = 'money';
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");	
			
		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Kita push (add) array data ke variabel data
				array_push($data, [
					
					'kode_produk'=>$row['A'], // Insert data nis dari kolom A di excel
					'nama_produk'=>$row['B'],
					'merk'=>$row['C'], // Insert data nis dari kolom B di excel
					'tipe_produk'=>$row['D'],
					'type'=>$row['E'],
					'koper' =>$row['F'], // Insert data nis dari kolom C di excel

					
				]);
			}
		
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->m_mstproduk->insert_multiple($data);
		
		redirect("C_mstproduk/alkes"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}

	public function formalum(){
		$this->load->model('m_mstproduk');
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di ITModel_Cis_Money.php
			$upload = $this->m_mstproduk->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		
		$this->template->Display('master_produk/exp_exelprodalum', $data);
	}
	
	public function importalum(){
		$this->load->model('m_mstproduk');
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = [];
		
		// $userlog = ($this->session->userdata('nama'));	
		// $katmoney = 'money';
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");	
			
		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Kita push (add) array data ke variabel data
				array_push($data, [
					
					'kode_produk'=>$row['A'], // Insert data nis dari kolom A di excel
					'nama_produk'=>$row['B'],
					'deskripsi'=>$row['C'], // Insert data nis dari kolom B di excel
					'tipe_produk'=>$row['D'],
					'koper'=>$row['E'],
					'harga' =>$row['F'],
					'satuanid' =>$row['G'],
					'merk' =>$row['H'], // Insert data nis dari kolom C di excel

					
				]);
			}
		
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->m_mstproduk->insert_multiple($data);
		
		redirect("C_mstproduk/alum"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}

	public function formdepbang(){
		$this->load->model('m_mstproduk');
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di ITModel_Cis_Money.php
			$upload = $this->m_mstproduk->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		
		$this->template->Display('master_produk/exp_exelproddepbang', $data);
	}
	
	public function importdepbang(){
		$this->load->model('m_mstproduk');
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = [];
		
		// $userlog = ($this->session->userdata('nama'));	
		// $katmoney = 'money';
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");	
			
		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Kita push (add) array data ke variabel data
				array_push($data, [
					
					'kode_sub_jenis_pekj' => $row['A'],
					'kode_produk'=>$row['B'], // Insert data nis dari kolom A di excel
					'nama_produk'=>$row['C'],
					'deskripsi'=>$row['D'], // Insert data nis dari kolom B di excel
					'tipe_produk'=>$row['E'],
					'merk' =>$row['F'], // Insert data nis dari kolom C di excel

					
				]);
			}
		
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->m_mstproduk->insert_multiple($data);
		
		redirect("C_mstproduk/depbang"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}
}

