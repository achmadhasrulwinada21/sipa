    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AnggaranBK extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));

		$this->load->model('anggaranbiayaklinik');
		$this->load->model('model');
        
        $data['data_abk'] = $this->anggaranbiayaklinik->GetAnggaran("where rumah_sakit='$namars' or departemen='$dept'order by idacara asc")->result_array();
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');			
		

			//'data_gabbpd' => $this->transaksib->AmbilDataGabBpd("order by id_bpd desc")->result_array(),
			//'data_status' => $this->transaksib->GetStatus("order by id_trbpd")->result_array(),
		

		$this->template->display('anggaranbk/data_abk', $data);
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
		$this->load->model('anggaranbiayaklinik');
		$this->load->model('model');
        $data['abk'] = $this->db->get_where('tb_header_acara',['idacara'=>$id])->row(); 
        $data['data_abk'] = $this->anggaranbiayaklinik->GetAnggaranBiayaKlinik("where idacara=$id and ( rumah_sakit='$namars' or departemen='$dept') order by sesi,idacara asc")->result_array();
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');			
		

			//'data_gabbpd' => $this->transaksib->AmbilDataGabBpd("order by id_bpd desc")->result_array(),
			//'data_status' => $this->transaksib->GetStatus("order by id_trbpd")->result_array(),
		

		$this->template->display('anggaranbk/tampil_abk', $data);
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
		
		$this->template->display('anggaranbk/add_abks', $data);
	}

	function adddetail($id)
	{
		$this->load->model('anggaranbiayaklinik');
		$this->load->model('model');
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'optkebutuhan' => $this->anggaranbiayaklinik->GetKebutuhan()->result_array(),
			'optsesi' => $this->anggaranbiayaklinik->Getsesi()->result_array(),		
			'kd_kebutuhan' => $this->anggaranbiayaklinik->GetAnggaranBiayaKlinik()->result_array(),
			 'abk' => $this->db->get_where('tb_header_acara',['idacara'=>$id])->row(),
			 'data_abk' => $this->anggaranbiayaklinik->GetAnggaran("order by idacara asc")->result_array(),
			   'data_abks' => $this->anggaranbiayaklinik->GetAnggaranBiayaKlinik("where idacara=$id order by sesi,idacara asc")->result_array(),

		);
		
		$this->template->display('anggaranbk/add_abk', $data);
	}

	function savedata(){
		$this->load->model('anggaranbiayaklinik');
		
		$kode_acara = $_POST['kode_acara'];
		$sesi = $_POST['sesi'];
		$kebutuhan = $_POST['kebutuhan'];
		$jumlah = $_POST['jumlah'];
		$harga = $_POST['harga'];
		
		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("d-m-Y H:i:s");	

		$data = array(	
			'kode_acara' => $kode_acara,
			'sesi' => $sesi,
			'kebutuhan' => $kebutuhan,
			'jumlah' => $jumlah,
			 'harga' => $harga,
			'createdate' => $waktusaatini,
			'createby' =>  $this->session->userdata('nama'),			
			);

		
		
		
		$result = $this->anggaranbiayaklinik->Simpan('tbl_detail_acara', $data);
		
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data user BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'anggaranbk/adddetail/'.$kode_acara.'');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'anggaranbk/adddetail/'.$kode_acara.'');
		}		
	}

	function savedatas(){
		$this->load->model('anggaranbiayaklinik');
		
		$nama_acara = $_POST['nama_acara'];
		$departemen = $_POST['departemen'];
		$rumah_sakit = $_POST['rumah_sakit'];
		$ruangan = $_POST['ruangan'];
		
		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("d-m-Y H:i:s");	

		$data = array(	
			'nama_acara' => $nama_acara,
			'departemen' => $departemen,
			'rumah_sakit' => $rumah_sakit,
			'ruangan' => $ruangan,
			'createdate' => $waktusaatini,
			'createby' =>  $this->session->userdata('nama'),			
			);

		
		
		
		$result = $this->anggaranbiayaklinik->Simpan('tb_header_acara', $data);
		
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data user BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'anggaranbk');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'anggaranbk');
		}		
	}


	function editabk($kode=0){
	$this->load->model('anggaranbiayaklinik');
	
	
	$data_abk = $this->anggaranbiayaklinik->GetAnggaran("where idacara ='$kode'")->result_array();
    
	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'idacara' => $data_abk[0]['idacara'],	
		'nama_acara' => $data_abk[0]['nama_acara'],
		'ruangan' => $data_abk[0]['ruangan'],		
		'departemen' => $data_abk[0]['departemen'],
		'rumah_sakit' =>  $data_abk[0]['rumah_sakit'],
		'createby' => $data_abk[0]['createby'],
		'createdate' => $data_abk[0]['createdate'],	
	);

	
	$this->template->display('anggaranbk/edit_abk', $data);

	}


	function updateabk(){
     
     $this->load->model('anggaranbiayaklinik');

		$idacara=$_POST['idacara'];
		$nama_acara = $_POST['nama_acara'];
		$ruangan = $_POST['ruangan'];
		$departemen = $_POST['departemen'];
		$rumah_sakit = $_POST['rumah_sakit'];		
		$createby = $_POST['createby'];
		$createdate = $_POST['createdate'];

	$data = array(
	'idacara' =>$this->input->post('idacara'),
	'nama_acara' =>$this->input->post('nama_acara'),
	'ruangan' =>$this->input->post('ruangan'),
	'departemen' => $this->input->post('departemen'),
	'rumah_sakit' =>$this->input->post('rumah_sakit'),
	'createby' => $this->input->post('createby'),
	'createdate' => $this->input->post('createdate'),
	'updateby' =>  $this->session->userdata('nama'),
	'updatedate' => date("Y-m-d H:i:s"),
	);

	$this->load->model('anggaranbiayaklinik');
	$hasil = $this->anggaranbiayaklinik->UpdateAnggaran($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'anggaranbk');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'anggaranbk');
	}
	}


function editabks($kode=0){
	$this->load->model('anggaranbiayaklinik');
	
	
	$data_abk = $this->anggaranbiayaklinik->Getdetail("where iddetacara ='$kode'")->result_array();
    
	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'iddetacara' => $data_abk[0]['iddetacara'],	
		'kode_acara' => $data_abk[0]['kode_acara'],	
		'sesi' => $data_abk[0]['sesi'],
		'kebutuhan' => $data_abk[0]['kebutuhan'],		
		'jumlah' => $data_abk[0]['jumlah'],
		'harga' =>  $data_abk[0]['harga'],
		'createby' => $data_abk[0]['createby'],
		'createdate' => $data_abk[0]['createdate'],	
	);

	
	$this->template->display('anggaranbk/edit_detail', $data);

	}

	function updateabks(){
     
     $this->load->model('anggaranbiayaklinik');

		$iddetacara=$_POST['iddetacara'];
		$kode_acara = $_POST['kode_acara'];
		$sesi = $_POST['sesi'];
		$kebutuhan = $_POST['kebutuhan'];
		$jumlah = $_POST['jumlah'];	
		$harga = $_POST['harga'];		
		$createby = $_POST['createby'];
		$createdate = $_POST['createdate'];

	$data = array(
	'iddetacara' =>$this->input->post('iddetacara'),
	'kode_acara' =>$this->input->post('kode_acara'),
	'sesi' =>$this->input->post('sesi'),
	'kebutuhan' => $this->input->post('kebutuhan'),
	'jumlah' =>$this->input->post('jumlah'),
	'harga' =>$this->input->post('harga'),
	'createby' => $this->input->post('createby'),
	'createdate' => $this->input->post('createdate'),
	'updateby' =>  $this->session->userdata('nama'),
	'updatedate' => date("Y-m-d H:i:s"),
	);

	$this->load->model('anggaranbiayaklinik');
	$hasil = $this->anggaranbiayaklinik->Updatedetail($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'anggaranbk/adddetail/'.$kode_acara.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'anggaranbk/adddetail/'.$kode_acara.'');
	}
	}

	function hapusabk($kode = 1){
	$this->load->model('anggaranbiayaklinik');	
	$result = $this->anggaranbiayaklinik->Hapus('tb_header_acara', array('idacara' => $kode));
	$result = $this->anggaranbiayaklinik->Hapus('tbl_detail_acara', array('kode_acara'=> $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'anggaranbk');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'anggaranbk');
	}
	}

	function hapusabks($kode = 1){
	$this->load->model('anggaranbiayaklinik');	
	$result = $this->anggaranbiayaklinik->Hapus('tbl_detail_acara', array('iddetacara'=> $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'anggaranbk');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'anggaranbk');
	}
	}
}

