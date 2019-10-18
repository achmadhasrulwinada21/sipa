    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ebitda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('u_name')){
		$this->session->set_flashdata("alerts", "<div class='alerts alert-danger'><strong>Sesi Anda Telah Habis, Silahkan login kembali..</strong></div>");
			redirect('dashboard');

		}
	}

	function get_koders()
		
	{
		$this->load->model('ebitdam');
		$koders=$this->input->post('koders');
		$data=$this->ebitdam->get_namars_bykode($koders);
		echo json_encode($data);
		
	}

	function get_kodebulan()
		
	{
		$this->load->model('ebitdam');
		$kodebulan=$this->input->post('kodebulan');
		$data=$this->ebitdam->get_bulan_bykode($kodebulan);
		echo json_encode($data);
		
	}

	function get_target()
		
	{
		$this->load->model('ebitdam');
		$idtarebit=$this->input->post('idtarebit');
		$data=$this->ebitdam->get_target_bykode($idtarebit);
		echo json_encode($data);
		
	}
	
		
	public function index()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
        $kodeadmin=($this->session->userdata('nama_role'));

        
		
		$this->load->model('ebitdam'); 
				 
		$data['kode_ebitda'] = $this->ebitdam->code_otomatis();
		$data['data_ebitda'] = $this->ebitdam->Getebitda("where namars='$namars' order by periode,idebitda asc")->result_array();
		$data['rs']= $this->ebitdam->Getrs("order by koders ASC")->result_array();
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		
		
		$this->template->display('ebitda/data_ebitda', $data);
	}
	

	function tampil_rencana($id)
	{
		$this->load->model('form_kegiatanm');
		$this->load->model('ebitdam');
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			  'ebit' => $this->db->get_where('tb_head_ebitda',['idebitda'=>$id])->row(),

			  'data_ebitda' => $this->ebitdam->Getviewebitdabulan("where idebitda=$id order by idebitda asc")->result_array(),
			  'target' => $this->ebitdam->Getviewebitdabulan("where idebitda=$id order by idebitda asc")->result_array(),
			 'real' => $this->ebitdam->Getviewebitdabulan("where idebitda=$id order by idebitda asc")->result_array(),

			  'data_ebitdatri' => $this->ebitdam->Getviewebitdatri("where idebitda=$id order by idebitda asc")->result_array(),
			  'targettri' => $this->ebitdam->Getviewebitdatri("where idebitda=$id order by idebitda asc")->result_array(),
			  'realtri' => $this->ebitdam->Getviewebitdatri("where idebitda=$id order by idebitda asc")->result_array(),

			  'data_ebitdatahun' => $this->ebitdam->Getviewebitdatahun("where idebitda=$id order by idebitda asc")->result_array(),
			  'targetth' => $this->ebitdam->Getviewebitdatahun("where idebitda=$id order by idebitda asc")->result_array(),
			  'realth' => $this->ebitdam->Getviewebitdatahun("where idebitda=$id order by idebitda asc")->result_array(),

);
		$this->template->display('ebitda/view_detail', $data);
	}
	

	function adddetail($id)
	{
		
		$this->load->model('ebitdam');
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			'bulan'=> $this->ebitdam->Getbulan("order by idbul asc")->result_array(),
			 'abk' => $this->db->get_where('v_kegtransaksi',['idfkeg'=>$id])->row(),
			  'ebit' => $this->db->get_where('tb_head_ebitda',['idebitda'=>$id])->row(),
			 'data_target' => $this->ebitdam->Ambiltarget("where kode_target='$id' and hapus='0' order by idtarebit asc")->result_array(),
			 
		);
		
		$this->template->display('ebitda/tambah_target', $data);
	}

	function adddetail2($id)
	{
		$this->load->model('ebitdam');
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'ebit' => $this->db->get_where('tb_head_ebitda',['idebitda'=>$id])->row(),
			  'data_target' => $this->ebitdam->Ambiltarget("where kode_target='$id' and hapus='0' order by idtarebit asc")->result_array(),
			   'data_nilai' => $this->ebitdam->Ambilnilai("where kode_nilai='$id' and hapus='0' order by idnilebit asc")->result_array(),
			 'bulans'=> $this->ebitdam->Ambiltarget("where kode_target='$id' and hapus='0' order by idtarebit asc")->result_array(),
		);
		
		$this->template->display('ebitda/tambah_nilai', $data);
	}

	
	function savedatas(){
		$this->load->model('ebitdam');
		
		$kode_ebitda = $_POST['kode_ebitda'];
		$namars = $_POST['namars'];
		$koders = $_POST['koders'];
		$periode = $_POST['periode'];
				
		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	

			 $datatgl = $this->ebitdam->Getebitda("where periode='$periode' and koders = '$koders'")->result_array();    

		$data = array(	
			'kode_ebitda' => $kode_ebitda,
			'namars' => $namars,
			'koders' => $koders,
			'periode' => $periode,
			'createdate' => $waktusaatini,
			'createby' =>  $this->session->userdata('nama'),			
			);
		
		
	    $kdbl = isset($datatgl[0]['periode']);
		$kdrs = isset($datatgl[0]['koders']);

		if($kdbl == $periode && $kdrs == $koders){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Data pada Tahun tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'Ebitda');
		}else{
		 
		
		$result = $this->ebitdam->Simpanhead($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'Ebitda');
		}
	}

	function savedata_rencana(){

		$this->load->model('ebitdam');

		
		$kode_target = $_POST['kode_target'];
		$nilai_target = $_POST['nilai_target'];
		$kodebulan = $_POST['kodebulan'];
		$namabulan = $_POST['namabulan'];
		$hapus = 0;	
		
		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	

 $datatgl = $this->ebitdam->Ambiltarget("where kodebulan='$kodebulan' and kode_target='$kode_target'")->result_array();             

            
		$data= array(	
			'kode_target' => $kode_target,
			'nilai_target' => $nilai_target,
			'kodebulan' => $kodebulan,
			'namabulan' => $namabulan,
			'hapus' => $hapus,
			'createdate' => $waktusaatini,
			'createby' =>  $this->session->userdata('nama'),			
			);

				
		
               $kdbl = isset($datatgl[0]['kodebulan']);
		        $kdtg = isset($datatgl[0]['kode_target']);
		
		if($kdbl == $kodebulan && $kdtg == $kode_target){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Data pada Bulan tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'Ebitda/adddetail/'.$kode_target.'');
		}else{
		 
		
		$result = $this->ebitdam->Simpantarget($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'Ebitda/adddetail/'.$kode_target.'');
		}

				
	}

	function savedata_real(){
		$this->load->model('ebitdam');



		$nilai_target = $_POST['nilai_target'];
		$kodebulan = $_POST['kodebulan'];
		$namabulan = $_POST['namabulan'];
		$kode_nilai = $_POST['kode_nilai'];
		$nilai_real = $_POST['nilai_real'];
		$hapus = 0;	
		
		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	
            $datatgl = $this->ebitdam->Ambilnilai("where kodebulan='$kodebulan' and kode_nilai='$kode_nilai'")->result_array(); 
      	            
		$data= array(	
			'kode_nilai' => $kode_nilai,
			'nilai_target' => $nilai_target,
			'nilai_real' => $nilai_real,
			'kodebulan' => $kodebulan,
			'namabulan' => $namabulan,
			'hapus' => $hapus,
			'createdate' => $waktusaatini,
			'createby' =>  $this->session->userdata('nama'),		
			);

		
		
		$kdbl = isset($datatgl[0]['kodebulan']);
		$kdnl = isset($datatgl[0]['kode_nilai']);
		
		if($kdbl == $kodebulan && $kdnl == $kode_nilai ){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Data pada Bulan tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'Ebitda/adddetail2/'.$kode_nilai.'');
		}else{
		 
		
		$result = $this->ebitdam->Simpannilai($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data user BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'Ebitda/adddetail2/'.$kode_nilai.'');
		}
		
	}
	
	
	function editrealisasi($kode=0){
	$this->load->model('ebitdam');
	
	
	$data_abk = $this->ebitdam->Ambilnilai("where idnilebit ='$kode'")->result_array();
    
    		
	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'idnilebit' => $data_abk[0]['idnilebit'],	
		'kode_nilai' => $data_abk[0]['kode_nilai'],
		'kodebulan' =>  $data_abk[0]['kodebulan'],
		'namabulan' => $data_abk[0]['namabulan'],	
		'nilai_target' => $data_abk[0]['nilai_target'],
		'nilai_real' => $data_abk[0]['nilai_real'],
						
	);
	
	$this->template->display('ebitda/edit_nilai', $data);

	}


	function updaterealisasi(){
     
      $this->load->model('ebitdam');

		$idnilebit=$_POST['idnilebit'];
		$kode_nilai = $_POST['kode_nilai'];
		$kodebulan = $_POST['kodebulan'];
		$namabulan = $_POST['namabulan'];
		$nilai_target=$_POST['nilai_target'];
		$nilai_real=$_POST['nilai_real'];
		$hapus = 0;
			$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("Y-m-d H:i:s");				
		
	$data = array(
	'idnilebit' =>$this->input->post('idnilebit'),
	'kode_nilai' =>$this->input->post('kode_nilai'),
	'kodebulan' => $this->input->post('kodebulan'),
	'namabulan' =>$this->input->post('namabulan'),
	'nilai_target' =>$this->input->post('nilai_target'),
	'nilai_real' =>$this->input->post('nilai_real'),
	'hapus' => $hapus,
	'updatedate' => $waktu,
	'updateby' =>  $this->session->userdata('nama'),
		
	);

	$this->load->model('ebitdam');
	$hasil = $this->ebitdam->Updatekeg($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'Ebitda/adddetail2/'.$kode_nilai.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'Ebitda/adddetail2/'.$kode_nilai.'');
	}
	}

	function editabk($kode=0){
	$this->load->model('ebitdam');
	
	
	$data_abk = $this->ebitdam->Getebitda("where idebitda ='$kode'")->result_array();
   
		
	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'idebitda' => $data_abk[0]['idebitda'],	
		'kode_ebitda' => $data_abk[0]['kode_ebitda'],
		'koders' => $data_abk[0]['koders'],
		'namars' =>  $data_abk[0]['namars'],
		'periode' =>  $data_abk[0]['periode'],		
	);

	
	$this->template->display('ebitda/edit_ebida', $data);

	}


	function updateabk(){
     
     $this->load->model('ebitdam');

		$idebitda=$_POST['idebitda'];
		$kode_ebitda = $_POST['kode_ebitda'];
		$koders = $_POST['koders'];
		$namars = $_POST['namars'];
		$koders = $_POST['koders'];	
		$periode = $_POST['periode'];
				
		
	$data = array(
	'idebitda' =>$this->input->post('idebitda'),
	'kode_ebitda' =>$this->input->post('kode_ebitda'),
	'koders' =>$this->input->post('koders'),
	'namars' => $this->input->post('namars'),
	'periode' =>$this->input->post('periode'),
	'updateby' =>  $this->session->userdata('nama'),
	'updatedate' => date("Y-m-d H:i:s"),
	);

	$this->load->model('ebitdam');
	$hasil = $this->ebitdam->Updateebitda($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'Ebitda');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'Ebitda');
	}
	}

	

	function editdetail($kode=0){
	$this->load->model('ebitdam');
	
	
	$data_abk = $this->ebitdam->Ambiltarget("where idtarebit ='$kode'")->result_array();
    
    		
	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'idtarebit' => $data_abk[0]['idtarebit'],	
		'kode_target' => $data_abk[0]['kode_target'],
		'kodebulan' =>  $data_abk[0]['kodebulan'],
		'namabulan' => $data_abk[0]['namabulan'],	
		'nilai_target' => $data_abk[0]['nilai_target'],
						
	);

	
	$this->template->display('ebitda/edit_target', $data);

	}


	function updatedetail(){
     
     $this->load->model('ebitdam');

		$idtarebit=$_POST['idtarebit'];
		$kode_target = $_POST['kode_target'];
		$kodebulan = $_POST['kodebulan'];
		$namabulan = $_POST['namabulan'];
		$nilai_target=$_POST['nilai_target'];
		$hapus = 0;
			$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("Y-m-d H:i:s");				
		
	$data = array(
	'idtarebit' =>$this->input->post('idtarebit'),
	'kode_target' =>$this->input->post('kode_target'),
	'kodebulan' => $this->input->post('kodebulan'),
	'namabulan' =>$this->input->post('namabulan'),
	'nilai_target' =>$this->input->post('nilai_target'),
	'hapus' => $hapus,
	'updatedate' => $waktu,
	'updateby' =>  $this->session->userdata('nama'),
		
	);

	$this->load->model('ebitdam');
	$hasil = $this->ebitdam->Updaterencana($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'Ebitda/adddetail/'.$kode_target.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'Ebitda/adddetail/'.$kode_target.'');
	}
	}

	
	function hapusprod($kode = 1){
	$this->load->model('ebitdam');	
	$result = $this->ebitdam->Hapus('tb_head_ebitda', array('idebitda' => $kode));
	$result = $this->ebitdam->Hapus('tb_det_ebittar', array('kode_target'=> $kode));
	$result = $this->ebitdam->Hapus('tb_det_nilebit', array('kode_nilai'=> $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'Ebitda');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'Ebitda');
	}
	}

	function hapusrealisasi($kode = 1,$kd_pd=0){
		$kode_nilai=$kd_pd;
		$this->load->model('produkom');	
	$result = $this->produkom->Hapus('tb_det_nilebit', array('idnilebit' => $kode));
	
			if($kode=='' ){

			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan.Terima Kasih.</strong></div>");
			header('location:'.base_url().'Ebitda/adddetail2/'.$kode_nilai.'');

		}else{
				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Ebitda/adddetail2/'.$kode_nilai.'');
		}
	
}

	
	function hapusreal(){
     
     $this->load->model('ebitdam');
     

	    $idnilebit=$_POST['idnilebit'];
		$kode_nilai = $_POST['kode_nilai'];
		$kodebulan = $_POST['kodebulan'];
		$namabulan = $_POST['namabulan'];
		$nilai_target=$_POST['nilai_target'];
		$nilai_real=$_POST['nilai_real'];
		$hapus = 1;		
		

	$data = array(
	'idnilebit' => $idnilebit,
	'kode_nilai' => $kode_nilai,
	'kodebulan' => $kodebulan,
	'namabulan' => $namabulan,
	'nilai_target' => $nilai_target,
	 'nilai_real' => $nilai_real,
	 'hapus' => $hapus,
		);

	$this->load->model('ebitdam');
	$hasil = $this->ebitdam->Updaterealss($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'Ebitda/adddetail2/'.$kode_nilai.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'Ebitda/adddetail2/'.$kode_nilai.'');
	}
	}
}

