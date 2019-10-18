    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produko extends CI_Controller {

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
	
	function get_pabrik()
		
	{
		$this->load->model('produkom');
		$pabrik_id=$this->input->post('pabrik_id');
		$data=$this->produkom->get_data_pabrik_bykode($pabrik_id);
		echo json_encode($data);
		
	}
	
	function get_prinsipal()
		
	{
		$this->load->model('produkom');
		$pabrik_id=$this->input->post('pabrik_id');
		$data=$this->produkom->get_data_prinsipal_bykode($pabrik_id);
		echo json_encode($data);
		
	}

	function get_prinsipalcompare()
		
	{
		$this->load->model('produkom');
		$idpr=$this->input->post('idpr');
		$data=$this->produkom->get_data_prinsipalcompare_bykode($idpr);
		echo json_encode($data);
		
	}

	function get_alum()
		
	{
		$this->load->model('produkom');
		$alumid=$this->input->post('alumid');
		$data=$this->produkom->get_data_alum_bykode($alumid);
		echo json_encode($data);
		
	}

	function get_alkes()
		
	{
		$this->load->model('produkom');
		$alkesid=$this->input->post('alkesid');
		$data=$this->produkom->get_data_alkes_bykode($alkesid);
		echo json_encode($data);
		
	}

	function get_obatss()
		
	{
		$this->load->model('produkom');
		$obatid=$this->input->post('obatid');
		$data=$this->produkom->get_data_obats_bykode($obatid);
		echo json_encode($data);
		
	}

	function get_alumcss()
		
	{
		$this->load->model('produkom');
		$barangid=$this->input->post('barangid');
		$data=$this->produkom->get_data_alumcs_bykode($barangid);
		echo json_encode($data);
		
	}
		
	public function index()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));

		$this->load->model('produkom'); 
		$data['data_prod'] = $this->produkom->Getprodukm("order by idpr asc")->result_array();
        $data['data_produko'] = $this->produkom->Getproduk("where pabrik_id !='-' order by idpr asc")->result_array();
        $data['data_alkes'] = $this->produkom->Getproduk("where alkesid !='-' order by idpr asc")->result_array();
        $data['data_alum'] = $this->produkom->Getproduk("where alumid !='-' order by idpr asc")->result_array();
        $data['kode_pabrik']= $this->produkom->GetKodePrinsp("where pabrik_id not in(select pabrik_id from produko where pabrik_id !='')  order by pabrik_id ASC")->result_array();
            $data['s_kode']= $this->produkom->Getskode("order by s_nama ASC")->result_array();
	    $data['tipe_produk']= $this->produkom->Gettipe()->result_array();
	    $data['prid'] = $this->produkom->code_otomatis();
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$data['dd_prinsipal'] = $this->produkom->dd_prinsipal();
        $data['prinsipal_selected'] = $this->input->post('prinsipal') ? $this->input->post('prinsipal') : '';			

		$this->template->display('produko/data_produko', $data);
	}

	function alum()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));

		$this->load->model('produkom'); 
		$data['data_prod'] = $this->produkom->Getprodukm("order by idpr asc")->result_array();
        $data['data_produko'] = $this->produkom->Getproduk("where pabrik_id !='-' order by idpr asc")->result_array();
        $data['data_alkes'] = $this->produkom->Getproduk("where alkesid !='-' order by idpr asc")->result_array();
        $data['data_alum'] = $this->produkom->Getproduk("where alumid !='-' order by idpr asc")->result_array();
        $data['kode_pabrik']= $this->produkom->GetKodePrinsp("where pabrik_id not in(select pabrik_id from produko) order by pabrik_id ASC")->result_array();
         $data['kode_alum']= $this->produkom->GetKodealum("where alumid not in (select alumid from produko where alumid !='') order by alumid ASC")->result_array();
          $data['kode_alkes']= $this->produkom->GetKodealkes("order by alkesid ASC")->result_array();
	    $data['s_kode']= $this->produkom->Getskode("order by s_nama ASC")->result_array();
	    $data['tipe_produk']= $this->produkom->Gettipe()->result_array();
	    $data['prid'] = $this->produkom->code_otomatis();
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$data['dd_prinsipal'] = $this->produkom->dd_prinsipal();
        $data['prinsipal_selected'] = $this->input->post('prinsipal') ? $this->input->post('prinsipal') : '';			

		$this->template->display('produko/data_produkalum', $data);
	}
	
	function alkes()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));

		$this->load->model('produkom'); 
		$data['data_prod'] = $this->produkom->Getprodukm("order by idpr asc")->result_array();
        $data['data_produko'] = $this->produkom->Getproduk("where pabrik_id !='-' order by idpr asc")->result_array();
        $data['data_alkes'] = $this->produkom->Getproduk("where alkesid !='-' order by idpr asc")->result_array();
        $data['data_alum'] = $this->produkom->Getproduk("where alumid !='-' order by idpr asc")->result_array();
        $data['kode_alkes']= $this->produkom->GetKodealkes("where alkesid not in (select alkesid from produko  where alkesid !='') and alkesid !='-' order by alkesid ASC")->result_array();
	    $data['s_kode']= $this->produkom->Getskode("order by s_nama ASC")->result_array();
	    $data['tipe_produk']= $this->produkom->Gettipe()->result_array();
	    $data['prid'] = $this->produkom->code_otomatis();
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$data['dd_prinsipal'] = $this->produkom->dd_prinsipal();
        $data['prinsipal_selected'] = $this->input->post('prinsipal') ? $this->input->post('prinsipal') : '';			

		$this->template->display('produko/data_produkalkes', $data);
	}

	public function compare()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
        
		$this->load->model('produkom');   
		$data['compare'] = $this->produkom->Ambilprodukm("order by idpr asc")->result_array();     
		$data['data_compare'] = $this->produkom->Ambilcompare(" order by idpr asc")->result_array();
        $data['pabrik_nama']= $this->produkom->GetVproduko()->result_array();
	    $data['s_kode']= $this->produkom->Getskode("order by s_nama ASC")->result_array();
	    $data['tipe_produk']= $this->produkom->Gettipe()->result_array();
	    $data['prid'] = $this->produkom->code_otomatis();
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		
		// $data['dd_provinsi'] = $this->provinsi_model->dd_prinsipal();
        // $data['provinsi_selected'] = $this->input->post('prinsipal') ? $this->input->post('prinsipal') : '';	

		$this->template->display('produko/compare_produko', $data);
	}

	function periode()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
        
		$this->load->model('produkom');   
		if (isset($_POST["tanggal_awal"])&&isset($_POST["tanggal_akhir"])) {
                        $tanggal_awal = $_POST["tanggal_awal"];
                       $tanggal_akhir = $_POST["tanggal_akhir"];
		 $data['compare'] = $this->produkom->Ambilprodukm("where tanggal BETWEEN '$tanggal_awal' and '$tanggal_akhir' order by idpr asc")->result_array();     
        $data['data_compare'] = $this->produkom->GetCompare("where tanggal BETWEEN '$tanggal_awal' and '$tanggal_akhir' order by idpr asc")->result_array();
        $data['pabrik_nama']= $this->produkom->GetVproduko()->result_array();
	    $data['s_kode']= $this->produkom->Getskode("order by s_nama ASC")->result_array();
	    $data['tipe_produk']= $this->produkom->Gettipe()->result_array();
	    $data['prid'] = $this->produkom->code_otomatis();
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$data['tanggal_awal'] = $tanggal_awal;
		}else{
       $data['compare'] = $this->produkom->Ambilprodukm("order by idpr asc")->result_array();     
        $data['data_compare'] = $this->produkom->GetCompare("order by idpr asc")->result_array();
        $data['pabrik_nama']= $this->produkom->GetVproduko()->result_array();
	    $data['s_kode']= $this->produkom->Getskode("order by s_nama ASC")->result_array();
	    $data['tipe_produk']= $this->produkom->Gettipe()->result_array();
	    $data['prid'] = $this->produkom->code_otomatis();
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$data['tanggal_awal'] = $tanggal_awal;
        
		}			
		// $data['dd_provinsi'] = $this->provinsi_model->dd_prinsipal();
        // $data['provinsi_selected'] = $this->input->post('prinsipal') ? $this->input->post('prinsipal') : '';	

		$this->template->display('produko/v_pertanggal', $data);
	}


// function search_keyword()
//     {
//     	$this->load->model('anggaranbiayaklinik');
//         $keyword    =   $this->input->post('keyword');
//         $data['data_abk']    =   $this->anggaranbiayaklinik->search($keyword);
//         $this->template->display('anggaranbk/data_abk',$data);
//     }

    function search_keywords()
    {
    	$this->load->model('anggaranbiayaklinik');
        $keyword    =   $this->input->post('keyword');
        $data['data_abk']    =   $this->anggaranbiayaklinik->searchs($keyword);
        $this->template->display('anggaranbk/data_abk',$data);
    }
	
    function tampil($id)
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
		$this->load->model('produkom');
		
        $data['prod'] = $this->db->get_where('v_produko',['idpr'=>$id])->row(); 
        $data['data_prod'] = $this->produkom->Getprodukm("where idpr=$id order by idpr asc")->result_array();
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');			
		

		$this->template->display('produko/tampil_prod', $data);
	}
	
	    function tampil_compare($id)
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
		$this->load->model('produkom');
		
        $data['prod'] = $this->db->get_where('v_produko',['idpr'=>$id])->row(); 
		$data['tampil_kurang_ecat'] = $this->produkom->Getprodukm("where idpr=$id AND tipe_harga='Jumlah < E-Cat' order  by idpr asc")->result_array();
	    $data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');			
		

		$this->template->display('produko/tampil_kurang_ecat', $data);
	}
	
	   function tampil_compare2($id)
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
		$this->load->model('produkom');
		
        $data['prod'] = $this->db->get_where('v_produko',['idpr'=>$id])->row(); 
		$data['tampil_kurang_ecat'] = $this->produkom->Getprodukm("where idpr=$id AND tipe_harga='Jumlah = E-Cat' order  by idpr asc")->result_array();
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');			
		

		$this->template->display('produko/tampil_kurang_ecat', $data);
	}
	
		function tampil_compare3($id)
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
		$this->load->model('produkom');
		
        $data['prod'] = $this->db->get_where('v_produko',['idpr'=>$id])->row(); 
		$data['tampil_kurang_ecat'] = $this->produkom->Getprodukm("where idpr=$id AND tipe_harga='Jumlah < 10 % E-Cat' order  by idpr asc")->result_array();
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');			
		

		$this->template->display('produko/tampil_kurang_ecat', $data);
	}
	
			function tampil_compare4($id)
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
		$this->load->model('produkom');
		
        $data['prod'] = $this->db->get_where('v_produko',['idpr'=>$id])->row(); 
		$data['tampil_kurang_ecat'] = $this->produkom->Getprodukm("where idpr=$id AND tipe_harga='Jumlah > 10 % E-Cat' order  by idpr asc")->result_array();
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');			
		

		$this->template->display('produko/tampil_kurang_ecat', $data);
	}
	
	
	
	function addabk()
	{
		$this->load->model('anggaranbiayaklinik');
		$this->load->model('model');
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'optkebutuhan' => $this->anggaranbiayaklinik->GetKebutuhan()->result_array(),		
			'kd_kebutuhan' => $this->anggaranbiayaklinik->GetAnggaranBiayaKlinik()->result_array(),
			

		);
		
		$this->template->display('produko/add_produko', $data);
	}

	function adddetail($id,$pabrikid)
	{
		$this->load->model('produkom');
		// $nama=$this->produkom->Getdetaildf('where hapus=0')->result_array();
		// $p=json_encode($nama);
		// echo $p;

		
                          
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'prod' => $this->db->get_where('v_produko',['idpr'=>$id])->row(),
			 'data_prod' => $this->produkom->Getprodukm("order by idpr asc")->result_array(),
			 'data_prods' => $this->produkom->Getprodukms("where koded_prod='$id'  order by produko asc")->result_array(),
                          'data_prods2' => $this->produkom->Getprodukms2("where koded_prod='$id' order by produko asc")->result_array(),
			 'obat' => $this->produkom->Getobatcobauy("WHERE pabrikid='$pabrikid' order by cdate desc")->result_array(),
			  'alum' => $this->produkom->Getobatcobaalum("order by cdate desc")->result_array(),
                           'tipe_harga' => $this->produkom->Gettipeharga("order by idtipeharga asc")->result_array(),
                          'distributor' => $this->produkom->Getkode_s("where pabrik_id='$pabrikid'")->result_array(),

);
		  //       $cisi = $this->produkom->Getdetaildf()->result_array();
				// foreach ($cisi as $tr){
    //                       $h=$tr['obatid'];
    //                      $p=json_encode($h);
    //                        echo $p;  

			 // $data['obat'] = $this->produkom->Getobatcobauy("WHERE obatid not in ($p) and pabrikid='$pabrikid' order by cdate desc")->result_array(); 
			 // }
			 
// 			 'obat' => $this->produkom->Getobatlist("WHERE obatid NOT IN (SELECT obatid
// FROM tb_detail_prod where hapus=0) and pabrikid='$pabrikid'")->result_array(),
			 // // 'obat' => $this->produkom->Getprodukod("where obatid != '-'")->result_array(),
			 
			 // 'alkes' => $this->produkom->Getprodukod("where alkes != '-' ")->result_array(),

		
		
		$this->template->display('produko/add_produks', $data);
	}


function adddetail_alumc($id,$pabrikid)
	{
		$this->load->model('produkom');
		                          
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'prod' => $this->db->get_where('v_produko',['idpr'=>$id])->row(),
			 'data_prod' => $this->produkom->Getprodukm("order by idpr asc")->result_array(),
			 'data_prods' => $this->produkom->Getprodukm("where idpr=$id  order by idpr asc")->result_array(),
			 'obat' => $this->produkom->Getobatcobauy("WHERE pabrikid='$pabrikid' order by cdate desc")->result_array(),
			  'alum' => $this->produkom->Getobatcobaalum("order by cdate desc")->result_array(),
);
		  
		
		$this->template->display('produko/add_produkalum', $data);
	}

function adddetail_alkesc($id,$pabrikid)
	{
		$this->load->model('produkom');
			
                          
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'prod' => $this->db->get_where('v_produko',['idpr'=>$id])->row(),
			 'data_prod' => $this->produkom->Getprodukm("order by idpr asc")->result_array(),
			 'data_prods' => $this->produkom->Getprodukm("where idpr=$id order by idpr asc")->result_array(),
			 'obat' => $this->produkom->Getobatcobauy("WHERE pabrikid='$pabrikid' order by cdate desc")->result_array(),
			  'alum' => $this->produkom->Getobatcobaalum("order by cdate desc")->result_array(),
);
		  
				
		
		$this->template->display('produko/add_produko', $data);
	}

	function aprove_detail($id)
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
		$this->load->model('produkom');
		 $data['prod'] = $this->db->get_where('tr_print_compare',['idtrcom'=>$id])->row();
	  $data['data_aprove'] = $this->produkom->Ambilcompare("where kode_tr='$id' order by createdate desc")->result_array();
	  $data['kode_pabrik']= $this->produkom->GetKodePrinscount("where pabrik_id not in(select pabrikid from tb_compare where kode_tr='$id') and pabrik_id is not null  order by idpr ASC")->result_array();
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');			
		$data['compare'] = $this->produkom->Ambilprodukm("order by idpr asc")->result_array();     
		$data['data_compare'] = $this->produkom->Ambilcount(" where pabrik_id is not null order by idpr asc")->result_array();			

		$this->template->display('produko/v_tr_print_obat', $data);
	}

	function hapusdetailaprove($kode = 1,$kd_pd=0){
		$kode_tr=$kd_pd;
		$this->load->model('produkom');	
	$result = $this->produkom->Hapus('tb_compare', array('idcompare' => $kode));
	
			if($kode=='' ){

			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan.Terima Kasih.</strong></div>");
			header('location:'.base_url().'produko/aprove_detail/'.$kode_tr.'');

		}else{
				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'produko/aprove_detail/'.$kode_tr.'');
		}
	
}



	function aprove()
	{
		$namars=($this->session->userdata('namars'));
		$nama=($this->session->userdata('nama'));
		$roles=($this->session->userdata('nama_role'));
		$dept=($this->session->userdata('departemen'));
		$this->load->model('produkom');

		if($roles=='Direktur Operasional dan Umum'){
	  $data['data_aprove'] = $this->produkom->Getaprove("where status=1 order by createdate desc")->result_array();
	  $data['data_ttd'] = $this->model->AmbilDataMasterTtd("where role='$roles' and nama_user='$nama' ")->result_array();
      	$data['nama']=$this->session->userdata('nama');	
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$data['compare'] = $this->produkom->Ambilprodukm("where order by idpr asc")->result_array();     
		$data['data_compare'] = $this->produkom->Ambilcount(" where pabrik_id is not null order by idpr asc")->result_array();			
		}elseif ($roles=='Kepala Departemen'){
        $data['data_aprove'] = $this->produkom->Getaprove("where status is null order by createdate desc")->result_array();
	    $data['data_ttd'] = $this->model->AmbilDataMasterTtd("where role='$roles' and nama_user='$nama' ")->result_array();
      	$data['nama']=$this->session->userdata('nama');	
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$data['compare'] = $this->produkom->Ambilprodukm("order by idpr asc")->result_array();     
		$data['data_compare'] = $this->produkom->Ambilcount(" where pabrik_id is not null order by idpr asc")->result_array();		

		}else{
			 $data['data_aprove'] = $this->produkom->Getaprove("where status is null order by createdate desc")->result_array();
	    $data['data_ttd'] = $this->model->AmbilDataMasterTtd("where role='$roles' and nama_user='$nama' ")->result_array();
      	$data['nama']=$this->session->userdata('nama');	
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$data['compare'] = $this->produkom->Ambilprodukm("order by idpr asc")->result_array();     
		$data['data_compare'] = $this->produkom->Ambilcount(" where pabrik_id is not null order by idpr asc")->result_array();		

		}

		$this->template->display('produko/aprove_frmsi', $data);
	}

function aprove_selesai()
	{
		$namars=($this->session->userdata('namars'));
		$nama=($this->session->userdata('nama'));
		$roles=($this->session->userdata('nama_role'));
		$dept=($this->session->userdata('departemen'));
		$this->load->model('produkom');

		
	   $data['data_aprove'] = $this->produkom->Getaprove("where status=2 order by createdate desc")->result_array();
	    $data['data_ttd'] = $this->model->AmbilDataMasterTtd("where role='$roles' and nama_user='$nama' ")->result_array();
      	$data['nama']=$this->session->userdata('nama');	
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$data['compare'] = $this->produkom->Ambilprodukm("order by idpr asc")->result_array();     
		$data['data_compare'] = $this->produkom->Ambilcount(" where pabrik_id is not null order by idpr asc")->result_array();		

		

		$this->template->display('produko/selesai', $data);
	}

	function aprove_kadep()
	{
		$namars=($this->session->userdata('namars'));
		$nama=($this->session->userdata('nama'));
		$roles=($this->session->userdata('nama_role'));
		$dept=($this->session->userdata('departemen'));
		$this->load->model('produkom');

		
	   $data['data_aprove'] = $this->produkom->Getaprove("where status=1 order by createdate desc")->result_array();
	    $data['data_ttd'] = $this->model->AmbilDataMasterTtd("where role='$roles' and nama_user='$nama' ")->result_array();
      	$data['nama']=$this->session->userdata('nama');	
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$data['compare'] = $this->produkom->Ambilprodukm("order by idpr asc")->result_array();     
		$data['data_compare'] = $this->produkom->Ambilcount(" where pabrik_id is not null order by idpr asc")->result_array();		

		

		$this->template->display('produko/selesai', $data);
	}

	function savedata_aprove(){
		$this->load->model('produkom');
		
		$tanggal = $_POST['tanggal'];
		$tanggal_obat = $_POST['tanggal_obat'];
		
		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	
                  $datatgl = $this->produkom->Getaprove("where tanggal='$tanggal'")->result_array();
		$data = array(	
			'tanggal'=>$tanggal,
			'tanggal_obat'=>$tanggal_obat,
			'createdate' => $waktusaatini,
			'createby' =>  $this->session->userdata('nama'),			
			);

		
		
		
		 $pbid = isset($datatgl[0]['tanggal']);
		
		if($pbid == $tanggal){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Tanggal tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'produko/aprove');
		}else{
		 
		
		$result = $this->produkom->Simpanaprove($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'produko/aprove');
		}
	}

	function savedatas(){
		$this->load->model('produkom');
		
		$prid = $_POST['prid'];
		$tipe_produk = $_POST['tipe_produk'];
		$pabrik_id = $_POST['pabrik_id'];
		$s_kode = $_POST['s_kode'];
		$nama_pt = $_POST['nama_pt'];
		$pabriknama = $_POST['pabriknama'];
		$alumid = $_POST['alumid'];
		$distalumid = $_POST['distalumid'];
		$pt_alum = $_POST['pt_alum'];
		$alumnama = $_POST['alumnama'];
		$alkesid = $_POST['alkesid'];
		$distalkesid = $_POST['distalkesid'];
		$pt_alkes = $_POST['pt_alkes'];
		$alkesnama = $_POST['alkesnama'];
		// $foi = $_POST['foi'];
		// $mou_jkn = $_POST['mou_jkn'];
		// $pks_renewal = $_POST['pks_renewal'];
			
		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	

		$data = array(	
			'prid' => $prid,
			'tipe_produk' => $tipe_produk,
			'pabrik_id' => $pabrik_id,
			'nama_pt' => $nama_pt,
			's_kode' => $s_kode,
			'pabriknama' => $pabriknama,
			'alumid' => $alumid,
			'pt_alum' => $pt_alum,
			'distalumid' => $distalumid,
			'alumnama' => $alumnama,
			'alkesid' => $alkesid,
			'pt_alkes' => $pt_alkes,
			'distalkesid' => $distalkesid,
			'alkesnama' => $alkesnama,
			
			'createdate' => $waktusaatini,
			'createby' =>  $this->session->userdata('nama'),			
			);

		
		
		
		$result = $this->produkom->Simpan('produko', $data);
		
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data  BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'produko');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'produko');
		}		
	}

	function savedatas_alum(){
		$this->load->model('produkom');
		
		$prid = $_POST['prid'];
		$tipe_produk = $_POST['tipe_produk'];
		$pabrik_id = $_POST['pabrik_id'];
		$s_kode = $_POST['s_kode'];
		$nama_pt = $_POST['nama_pt'];
		$pabriknama = $_POST['pabriknama'];
		$alumid = $_POST['alumid'];
		$distalumid = $_POST['distalumid'];
		$pt_alum = $_POST['pt_alum'];
		$alumnama = $_POST['alumnama'];
		$alkesid = $_POST['alkesid'];
		$distalkesid = $_POST['distalkesid'];
		$pt_alkes = $_POST['pt_alkes'];
		$alkesnama = $_POST['alkesnama'];
				
		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	

		$data = array(	
			'prid' => $prid,
			'tipe_produk' => $tipe_produk,
			'pabrik_id' => $pabrik_id,
			'nama_pt' => $nama_pt,
			's_kode' => $s_kode,
			'pabriknama' => $pabriknama,
			'alumid' => $alumid,
			'pt_alum' => $pt_alum,
			'distalumid' => $distalumid,
			'alumnama' => $alumnama,
			'alkesid' => $alkesid,
			'pt_alkes' => $pt_alkes,
			'distalkesid' => $distalkesid,
			'alkesnama' => $alkesnama,
					
			'createdate' => $waktusaatini,
			'createby' =>  $this->session->userdata('nama'),			
			);

		
		
		
		$result = $this->produkom->Simpan('produko', $data);
		
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data  BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'produko/alum');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'produko/alum');
		}		
	}

	function savedatas_alkes(){
		$this->load->model('produkom');
		
		$prid = $_POST['prid'];
		$tipe_produk = $_POST['tipe_produk'];
		$pabrik_id = $_POST['pabrik_id'];
		$s_kode = $_POST['s_kode'];
		$nama_pt = $_POST['nama_pt'];
		$pabriknama = $_POST['pabriknama'];
		$alumid = $_POST['alumid'];
		$distalumid = $_POST['distalumid'];
		$pt_alum = $_POST['pt_alum'];
		$alumnama = $_POST['alumnama'];
		$alkesid = $_POST['alkesid'];
		$distalkesid = $_POST['distalkesid'];
		$pt_alkes = $_POST['pt_alkes'];
		$alkesnama = $_POST['alkesnama'];
			
		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	

		$data = array(	
			'prid' => $prid,
			'tipe_produk' => $tipe_produk,
			'pabrik_id' => $pabrik_id,
			'nama_pt' => $nama_pt,
			's_kode' => $s_kode,
			'pabriknama' => $pabriknama,
			'alumid' => $alumid,
			'pt_alum' => $pt_alum,
			'distalumid' => $distalumid,
			'alumnama' => $alumnama,
			'alkesid' => $alkesid,
			'pt_alkes' => $pt_alkes,
			'distalkesid' => $distalkesid,
			'alkesnama' => $alkesnama,
					
			'createdate' => $waktusaatini,
			'createby' =>  $this->session->userdata('nama'),			
			);

		
		
		
		$result = $this->produkom->Simpan('produko', $data);
		
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'produko/alkes');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'produko/alkes');
		}		
	}

	function savedata(){
		$this->load->model('produkom');
		
		$koded_prod = $_POST['koded_prod'];
		$jenis_produk = $_POST['jenis_produk'];
		$produko = $_POST['produko'];
		$produkom = $_POST['produkom'];
		$obatid = $_POST['obatid'];
		$alkes = $_POST['alkes'];
		$tipe_harga = $_POST['tipe_harga'];
		$harga = $_POST['harga'];
                $s_kode = $_POST['s_kode'];
		$pabrikid = $_POST['pabrikid'];
               $komposisi = $_POST['komposisi'];
		$discount = $_POST['discount'];
		$hapus = 0;	
		
		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	
             $waktu =date("Y-m-d");
        $datatgl = $this->produkom->Getdetail("where obatid='$obatid'")->result_array();
            
		$data= array(	
			'koded_prod' => $koded_prod,
			'jenis_produk' => $jenis_produk,
			'produko' => $produko,
			'obatid' => $obatid,
			'produkom' => $produkom,
			'alkes' => $alkes,
			'tipe_harga' => $tipe_harga,
			'pabrikid' => $pabrikid,
			 'harga' => $harga,
                          's_kode' => $s_kode,
			  'hapus' => $hapus,
                          'komposisi' => $komposisi,
			  'discount' => $discount,
			'createdate' => $waktusaatini,
			'tanggal' => $waktu,
			'createby' =>  $this->session->userdata('nama'),			
			);

			
		
		$obid = isset($datatgl[0]['obatid']);

				if($obid == $obatid){

			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Obat tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'produko/adddetail/'.$koded_prod.'/'.$pabrikid.'');
		}else{
			$result = $this->produkom->Save_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data  BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'produko/adddetail/'.$koded_prod.'/'.$pabrikid.'');
		}
		
	}


function savedata_alkesc(){
		$this->load->model('produkom');
		
		$koded_prod = $_POST['koded_prod'];
		$jenis_produk = $_POST['jenis_produk'];
		$produko = $_POST['produko'];
		$produkom = $_POST['produkom'];
		$obatid = $_POST['obatid'];
		$alkes = $_POST['alkes'];
		$tipe_harga = $_POST['tipe_harga'];
		$harga = $_POST['harga'];
		$pabrikid = $_POST['pabrikid'];
		$alumid = $_POST['alumid'];
		$alumpbkid = $_POST['alumpbkid'];
		$alkesid = $_POST['alkesid'];
		$alkespbkid = $_POST['alkespbkid'];
		$hapus = 0;	
		
		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	
             $waktu =date("Y-m-d");
        $datatgl = $this->produkom->Getdetail("where alkespbkid='$alkespbkid'")->result_array();
            
            $data= array(	
			'koded_prod' => $koded_prod,
			'jenis_produk' => $jenis_produk,
			'produko' => $produko,
			'obatid' => $obatid,
			'alumid' => $alumid,
			'alumpbkid' => $alumpbkid,
			'alkesid' => $alkesid,
			'alkespbkid' => $alkespbkid,
			'produkom' => $produkom,
			'alkes' => $alkes,
			'tipe_harga' => $tipe_harga,
			'pabrikid' => $pabrikid,
			 'harga' => $harga,
			  'hapus' => $hapus,
			'createdate' => $waktusaatini,
			'tanggal' => $waktu,
			'createby' =>  $this->session->userdata('nama'),			
			);

		
		
		
		$obid = isset($datatgl[0]['alkespbkid']);

				if($obid == $alkespbkid){

			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Data tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'produko/adddetail_alkesc/'.$koded_prod.'/'.$alkesid.'');
		}else{
			$result = $this->produkom->Save_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data  BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'produko/adddetail_alkesc/'.$koded_prod.'/'.$alkesid.'');
		}
		
	}

	function savedata_alumc(){
		$this->load->model('produkom');
		
		$koded_prod = $_POST['koded_prod'];
		$jenis_produk = $_POST['jenis_produk'];
		$produko = $_POST['produko'];
		$produkom = $_POST['produkom'];
		$obatid = $_POST['obatid'];
		$alkes = $_POST['alkes'];
		$tipe_harga = $_POST['tipe_harga'];
		$harga = $_POST['harga'];
		$pabrikid = $_POST['pabrikid'];
		$alumid = $_POST['alumid'];
		$alumpbkid = $_POST['alumpbkid'];
		$hapus = 0;	
		
		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	
             $waktu =date("Y-m-d");
        $datatgl = $this->produkom->Getdetail("where alumpbkid='$alumpbkid'")->result_array();
            
		$data= array(	
			'koded_prod' => $koded_prod,
			'jenis_produk' => $jenis_produk,
			'produko' => $produko,
			'obatid' => $obatid,
			'alumid' => $alumid,
			'alumpbkid' => $alumpbkid,
			'produkom' => $produkom,
			'alkes' => $alkes,
			'tipe_harga' => $tipe_harga,
			'pabrikid' => $pabrikid,
			 'harga' => $harga,
			  'hapus' => $hapus,
			'createdate' => $waktusaatini,
			'tanggal' => $waktu,
			'createby' =>  $this->session->userdata('nama'),			
			);

				
		
		$obid = isset($datatgl[0]['alumpbkid']);

				if($obid == $alumpbkid){

			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Data tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'produko/adddetail_alumc/'.$koded_prod.'/'.$alumid.'');
		}else{
			$result = $this->produkom->Save_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data  BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'produko/adddetail_alumc/'.$koded_prod.'/'.$alumid.'');
		}
		
	}
	
	function savedata_compare(){
		$this->load->model('produkom');
		
		$idpr = $_POST['idpr'];
		$nama_pt = $_POST['nama_pt'];
		$kode_tr = $_POST['kode_tr'];
		$s_kode = $_POST['s_kode'];
		$harga_kecil_e_cat = $_POST['harga_kecil_e_cat'];
		$harga_sama_e_cat = $_POST['harga_sama_e_cat'];
		$harga_dibawahten = $_POST['harga_dibawahten'];
		$harga_diataten = $_POST['harga_diataten'];
		$foi= $_POST['foi'];
		$mou_jkn = $_POST['mou_jkn'];
		$pks_renewal = $_POST['pks_renewal'];
		$pabrikid = $_POST['pabrikid'];
		$tgl_obat = $_POST['tgl_obat'];

		
		
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");	
             

             
		$data= array(	
			'idpr' => $idpr,
			'nama_pt' => $nama_pt,
			'kode_tr' => $kode_tr,
			'tgl_obat' => $tgl_obat,
			's_kode' => $s_kode,
			'pabrikid' => $pabrikid,
			'harga_kecil_e_cat' => $harga_kecil_e_cat,
			'harga_sama_e_cat' => $harga_sama_e_cat,
			'harga_dibawahten' => $harga_dibawahten,
			'harga_diataten' => $harga_diataten,
			'foi' => $foi,
			'mou_jkn' => $mou_jkn,
			'pks_renewal' => $pks_renewal,
			'createdate' => $waktusaatini,
			'createby' =>  $this->session->userdata('nama'),			
			);

				
		
		$result = $this->produkom->Simpan('tb_compare', $data);
		
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'produko/aprove_detail/'.$kode_tr.'');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'produko/aprove_detail/'.$kode_tr.'');
		}		
		
	}



	function editproduko($kode=0){
	$this->load->model('produkom');
	
	
	$tampung = $this->produkom->Ambilprodukm("where idpr ='$kode'")->result_array();
    
    $for_prins = array();
		foreach($this->produkom->Ambilprodukm("where idpr = '$kode' ")->result_array() as $prins){
			$for_prins[] = $prins['pabrik_id'];
		}

		// $for_produktip = array();
		// foreach($this->produkom->Ambilprodukm("where idpr = '$kode' ")->result_array() as $produktip){
		// 	$for_produktip[] = $produktip['tipe_produk'];
		// }

	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'idpr' => $tampung[0]['idpr'],	
		// 'produktip' => $this->produkom->Gettipe()->result_array(),
		// 'for_produktip' => $for_produktip,
		'prid' => $tampung[0]['prid'],		
		'prins' => $this->produkom->GetKodePrinsp()->result_array(),
		'for_prins' => $for_prins,
		's_kode'=> $tampung[0]['s_kode'],
		'nama_pt' => $tampung[0]['nama_pt'],
		'pabriknama' => $tampung[0]['pabriknama'],
		'createby' => $tampung[0]['createby'],
		'createdate' => $tampung[0]['createdate'],
		'foi' => $tampung[0]['foi'],
		'mou_jkn' => $tampung[0]['mou_jkn'],
		'pks_renewal' => $tampung[0]['pks_renewal'],
		'tipe_produk' => $tampung[0]['tipe_produk'],	
	);

	
	$this->template->display('produko/edit_produko', $data);

	}


	function updateprod(){
     
     $this->load->model('produkom');

		$idpr=$_POST['idpr'];
		$tipe_produk = $_POST['tipe_produk'];
		$prid = $_POST['prid'];
		$pabrik_id = $_POST['pabrik_id'];
		$pabriknama = $_POST['pabriknama'];
		$nama_pt = $_POST['nama_pt'];
		$s_kode = $_POST['s_kode'];		
		$createby = $_POST['createby'];
		$createdate = $_POST['createdate'];
		$foi = $_POST['foi'];		
		$mou_jkn = $_POST['mou_jkn'];
		$pks_renewal = $_POST['pks_renewal'];

	$data = array(
	'idpr' =>$this->input->post('idpr'),
	'tipe_produk' =>$this->input->post('tipe_produk'),
	'prid' =>$this->input->post('prid'),
	'pabrik_id' => $this->input->post('pabrik_id'),
	'nama_pt' => $this->input->post('nama_pt'),
	's_kode' =>$this->input->post('s_kode'),
	'pabriknama' =>$this->input->post('pabriknama'),
	'createby' => $this->input->post('createby'),
	'createdate' => $this->input->post('createdate'),
	'foi' =>$this->input->post('foi'),
	'mou_jkn' => $this->input->post('mou_jkn'),
	'pks_renewal' => $this->input->post('pks_renewal'),
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
	$this->load->model('produkom');	
	$result = $this->produkom->Hapus('produko', array('idpr' => $kode));
	$result = $this->produkom->Hapus('tb_detail_prod', array('koded_prod'=> $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'produko');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'produko');
	}
	}

	function hapusprodalum($kode = 1){
	$this->load->model('produkom');	
	$result = $this->produkom->Hapus('produko', array('idpr' => $kode));
	$result = $this->produkom->Hapus('tb_detail_prod', array('koded_prod'=> $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'produko/alum');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'produko/alum');
	}
	}

	function hapusprodalkes($kode = 1){
	$this->load->model('produkom');	
	$result = $this->produkom->Hapus('produko', array('idpr' => $kode));
	$result = $this->produkom->Hapus('tb_detail_prod', array('koded_prod'=> $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'produko/alkes');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'produko/alkes');
	}
	}

	function hapusdetail($kode = 1,$kd_pd=0,$pbkid=0){
		$koded_prod=$kd_pd;
		$pabrikid=$pbkid;
	$this->load->model('produkom');	
	$result = $this->produkom->Hapus('tb_detail_prod', array('iddetailprod' => $kode,'koded_prod' => $kd_pd,'pabrikid' => $pbkid));
	
			if($kd_pd=='' ){

			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan.Terima Kasih.</strong></div>");
			header('location:'.base_url().'produko/adddetail/'.$koded_prod.'/'.$pabrikid.'');

		}else{
				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'produko/adddetail/'.$koded_prod.'/'.$pabrikid.'');
		}
	
}

function hapusdetailalum($kode = 1,$kd_pd=0,$alid=0){
		$koded_prod=$kd_pd;
		$alumid=$alid;
	$this->load->model('produkom');	
	$result = $this->produkom->Hapus('tb_detail_prod', array('iddetailprod' => $kode));
	
			if($kode=='' ){

			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan.Terima Kasih.</strong></div>");
			header('location:'.base_url().'produko/adddetail_alumc/'.$koded_prod.'/'.$alumid.'');

		}else{
				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'produko/adddetail_alumc/'.$koded_prod.'/'.$alumid.'');
		}
	
}

function hapusdetailalkes($kode = 1,$kd_pd=0,$asid=0){
		$koded_prod=$kd_pd;
		$alkesid=$asid;
	$this->load->model('produkom');	
	$result = $this->produkom->Hapus('tb_detail_prod', array('iddetailprod' => $kode));
	
			if($kode=='' ){

			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan.Terima Kasih.</strong></div>");
			header('location:'.base_url().'produko/adddetail_alkesc/'.$koded_prod.'/'.$alkesid.'');

		}else{
				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'produko/adddetail_alkesc/'.$koded_prod.'/'.$alkesid.'');
		}
	
}

	

	function editabks($kode=0,$pabrikid=0){
	$this->load->model('produkom');
	
	
	$tampung = $this->produkom->Getdetail("where iddetailprod ='$kode'")->result_array();

    $for_prins = array();
		foreach($this->produkom->Getdetail("where iddetailprod = '$kode' ")->result_array() as $prins){
			$for_prins[] = $prins['obatid'];
		}
                  $for_harga = array();
		foreach($this->produkom->Getprodukms2("where iddetailprod = '$kode' ")->result_array() as $hargas){
			$for_harga[] = $hargas['tipe_harga'];
		}
    
	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'iddetailprod' => $tampung[0]['iddetailprod'],	
		'koded_prod' => $tampung[0]['koded_prod'],		
		's_kode'=> $tampung[0]['s_kode'],
		'prins' => $this->produkom->Getobatcobauy("WHERE pabrikid='$pabrikid'")->result_array(),
		'for_prins' => $for_prins,
		'tanggal'=> $tampung[0]['tanggal'],
		'pabrikid' => $tampung[0]['pabrikid'],
		'produko' => $tampung[0]['produko'],
		'hargas' => $this->produkom->Gettipeharga()->result_array(),
		'for_harga' => $for_harga,
		'harga' => $tampung[0]['harga'],
               'komposisi' => $tampung[0]['komposisi'],
		'discount' => $tampung[0]['discount'],
		);

	
	$this->template->display('produko/edit_detail', $data);	
}
	function updateabksd(){
     
     $this->load->model('produkom');
     // $data_abk = $this->anggaranbiayaklinik->Getdetail("where iddetacara ='$kode'")->result_array();

	    $iddetailprod=$_POST['iddetailprod'];
		$koded_prod = $_POST['koded_prod'];
		$pabrikid = $_POST['pabrikid'];
		$jenis_produk = $_POST['jenis_produk'];
		$produko = $_POST['produko'];
		$produkom = $_POST['produkom'];	
		$obatid = $_POST['obatid'];	
		$s_kode = $_POST['s_kode'];
		$tanggal = $_POST['tanggal'];
		$tipe_harga = $_POST['tipe_harga'];	
		$harga = $_POST['harga'];
                $komposisi = $_POST['komposisi'];	
		$discount = $_POST['discount'];
			
		
		

	$data = array(
	'iddetailprod' =>$this->input->post('iddetailprod'),
	'koded_prod' =>$this->input->post('koded_prod'),
	'pabrikid' =>$this->input->post('pabrikid'),
	'jenis_produk' =>$this->input->post('jenis_produk'),
	'produko' => $this->input->post('produko'),
	'produkom' =>$this->input->post('produkom'),
	's_kode' =>$this->input->post('s_kode'),
	'obatid' =>$this->input->post('obatid'),
	'tanggal' =>$this->input->post('tanggal'),
	'tipe_harga' =>$this->input->post('tipe_harga'),
	'harga' =>$this->input->post('harga'),
        'komposisi' =>$this->input->post('komposisi'),
	'discount' =>$this->input->post('discount'),
	'updateby' =>  $this->session->userdata('nama'),
	'updatedate' => date("Y-m-d H:i:s"),
	);

	$this->load->model('produkom');
	$hasil = $this->produkom->Updatedetail($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'produko/adddetail/'.$koded_prod.'/'.$pabrikid.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'produko/adddetail/'.$koded_prod.'/'.$pabrikid.'');
	}
	}

	function editaprove($kode=0){
	$this->load->model('produkom');
	
	
	$tampung = $this->produkom->Getaprove("where idtrcom ='$kode'")->result_array();

	$for_ttdmenger = array();
		foreach($this->produkom->Getaprove("where idtrcom = '$kode' ")->result_array() as $role){
			$for_ttdmenger[] = $role['ttd_mengetahui'];
		}

		$for_ttdmenge = array();
		foreach($this->produkom->Getaprove("where idtrcom = '$kode' ")->result_array() as $role){
			$for_ttdmenge[] = $role['ttd_menyetujui'];
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
		'mengetahui' => $tampung[0]['mengetahui'],
		'idmengetahui' => $this->model->AmbilDataTTDMengetahui(" where role='$roles' and nama_user='$nama'")->result_array(),
		'for_ttdmeng' => $for_ttdmenger,

		'idmenyetujui' => $this->model->AmbilDataTTDMengetahui(" where role='$roles' and nama_user='$nama'")->result_array(),
		'for_ttdmen' => $for_ttdmenge,
		'tanggal' => $tampung[0]['tanggal'],
		'menyetujui' => $tampung[0]['menyetujui'],
		'ttd_menyetujui' => $tampung[0]['ttd_menyetujui'],
		'mengetahui' => $tampung[0]['mengetahui'],
		'ttd_mengetahui' => $tampung[0]['ttd_mengetahui'],
		'status' => $tampung[0]['status'],
		
			);

	
	$this->template->display('produko/editaprove', $data);

	}

	function updateaprove(){
     
     $this->load->model('produkom');
     // $data_abk = $this->anggaranbiayaklinik->Getdetail("where iddetacara ='$kode'")->result_array();

	    $idtrcom=$_POST['idtrcom'];
		$mengetahui = $_POST['mengetahui'];
		$ttd_mengetahui = $_POST['ttd_mengetahui'];
		$menyetujui = $_POST['menyetujui'];
		$ttd_menyetujui = $_POST['ttd_menyetujui'];
		$tanggal=$_POST['tanggal'];
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");	
        $status=$_POST['status'];
	$data = array(
	'idtrcom' =>$this->input->post('idtrcom'),
	'mengetahui' =>$this->input->post('mengetahui'),
	'tanggal' =>$this->input->post('tanggal'),
	'ttd_mengetahui' =>$this->input->post('ttd_mengetahui'),
	'menyetujui' =>$this->input->post('menyetujui'),
	'ttd_menyetujui' =>$this->input->post('ttd_menyetujui'),
	'updateby' =>  $this->session->userdata('nama'),
	'updatedate' =>$waktusaatini,
	'status'=>$status,
		);

	$this->load->model('produkom');
	$hasil = $this->produkom->Updateapp1($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Approve data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'produko/aprove');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Approve data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'produko/aprove');
	}
	}
}

