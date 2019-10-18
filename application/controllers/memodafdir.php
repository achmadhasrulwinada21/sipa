 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class memodafdir extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}
	

	public function index()
	{
		//$kodeadmin=($this->session->userdata('koderole'));

		$koderole=($this->session->userdata('koderole'));
		$dept = ($this->session->userdata('nama_role'));


		if($koderole=='1' OR $koderole=='5' OR $koderole=='10' OR $koderole=='15' 
			OR $koderole=='36' OR $koderole=='37' OR $koderole=='38' OR $koderole=='39')
		{


		$this->load->model('komdik');

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			'data_memodafdir' => $this->komdik->GetMemoDafdir("order by id_memo_dafdir desc")->result_array(),
			'data_formulirmhn' => $this->komdik->GetMemoDafdir()->result_array(),
			'data_konfirm' => $this->komdik->GetMemoDafdir()->result_array(),
			
		);

		$this->template->Display('memodafdir/data_memodafdir', $data);

	}else{

		$dept = ($this->session->userdata('nama_role'));

		$this->load->model('komdik');

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			'data_memodafdir' => $this->komdik->GetMemoDafdir("where dari ='$dept' order by id_memo_dafdir desc")->result_array(),
			'data_formulirmhn' => $this->komdik->GetMemoDafdir()->result_array(),
			'data_konfirm' => $this->komdik->GetMemoDafdir()->result_array(),
		);

		$this->template->Display('memodafdir/data_memodafdir', $data);
		}
		
	}

	function addmemodafdir()
	{
		$this->load->model('komdik');

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			'id_memo_dafdir' => $this->komdik->GetMemoDafdir()->result_array(),
			'ttd' => $this->model->AmbilDataTTDMengetahui()->result_array(),
			'optrole' => $this->model->GetRole()->result_array(),
		   
		);

		$this->template->Display('memodafdir/add_memodafdir', $data);
	}


	function editmemodafdir($kode = 0)
	{

		$this->load->model('komdik');
		
		$tampung = $this->komdik->AmbilDataMemoDafdir("where id_memo_dafdir = '$kode'")->result_array();
		
		$for_pemohon = array();
		foreach($this->komdik->AmbilDataMemoDafdir("where id_memo_dafdir = '$kode'")->result_array() as $role){
			$for_pemohon[] = $role['ttd_pembuat'];
		}
		
		$for_ttdmenger = array();
		foreach($this->komdik->AmbilDataMemoDafdir("where id_memo_dafdir = '$kode'")->result_array() as $role){
			$for_ttdmenger[] = $role['ttd_mengetahui'];
		}
		
		$roles = ($this->session->userdata('nama_role'));
		$namaroles = ($this->session->userdata('nama'));


		$data = array(

			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),

			'id_memo_dafdir' => $tampung[0]['id_memo_dafdir'],	
			'kepada' => $tampung[0]['kepada'],
			'dari' => $tampung[0]['dari'],
			'tgl_memo_dafdir' => $tampung[0]['tgl_memo_dafdir'],
			'perihal' => $tampung[0]['perihal'],
			'nm_acara' => $tampung[0]['nm_acara'],
			'tgl_acara' => $tampung[0]['tgl_acara'],
			'waktu_acara' => $tampung[0]['waktu_acara'],
			'tempat_acara' => $tampung[0]['tempat_acara'],
			'permohonan' => $tampung[0]['permohonan'],
			'jml_pengeluaran' => $tampung[0]['jml_pengeluaran'],
			'idpemohon' => $this->komdik->AmbilDataTTDMengetahui("where role='$roles'")->result_array(),
			'for_pemohon' => $for_pemohon,		
			'idmengetahui' => $this->komdik->AmbilDataTTDMengetahui("where role='$roles' AND nama_user='$namaroles'")->result_array(),
			'ttdmenger' => $for_ttdmenger,
			'pembuat' => $tampung[0]['pembuat'],
			'ttd_pembuat' => $tampung[0]['ttd_pembuat'],
			'mengetahui' => $tampung[0]['mengetahui'],
			'menyetujui' => $tampung[0]['menyetujui'],
				
			);

		$this->template->Display('memodafdir/edit_memodafdir', $data);
	}

 //    function savedata(){	  

 //    $this->load->model('komdik');

	// 	//Memo Daftar Hadir
		   
	// 		$kepada = $_POST['kepada'];
	// 		$dari = $_POST['dari'];
	// 		$tgl_memo_dafdir = $_POST['tgl_memo_dafdir'];
	// 		$perihal = $_POST['perihal'];
	// 		$nm_acara = $_POST['nm_acara'];
	// 		$tgl_acara = $_POST['tgl_acara'];
	// 		$waktu_acara = $_POST['waktu_acara'];
	// 		$tempat_acara = $_POST['tempat_acara'];
	// 		$permohonan = $_POST['permohonan'];
	// 		$jml_pengeluaran = $_POST['jml_pengeluaran'];
	// 		$ttd_pemohon = $_POST['ttd_pemohon'];
	// 		$mengetahui = $_POST['mengetahui'];
	// 		$menyetujui  = $_POST['menyetujui'];
			


	// 	//Data Formulir Permohonan

	// 	   	$untuk_byr  = $_POST['perihal'];
	// 	   	$jumlah  = $_POST['jml_pengeluaran'];
	// 	   	$tgl_byr  = $_POST['tgl_acara'];
	// 	   //	$mengetahui  = $_POST['mengetahui'];
	// 	   //	$menyetujui  = $_POST['menyetujui'];
	// 	   	$bagian = $_POST['dari'];
		   	

	// 	//Data Konfirmasi Peserta
		   	
	// 	   	$pemohon  = $_POST['kepada'];
	// 	   	$departemen = $_POST['dari'];
		   			   	

	// 	//Data History
			
	// 	   	$perihal  = $_POST['perihal'];
	// 	   	$nm_acara  = $_POST['nm_acara'];
	// 	   	$departemen2 = $_POST['dari'];


	// 	   	$dt= new DateTime();

	// 		date_default_timezone_set("Asia/Jakarta");
	//         $waktu =date("d-m-Y H:i:s");

			
	// 		$userlog = (
	// 		$this->session->userdata('nama')
			
	// 	);
					
	// 	//Array Memo Dafdir
			
	// 		$data = array(
				
	// 		'kepada' =>$kepada,
	// 		'dari' =>$dari,
	// 		'tgl_memo_dafdir' =>$tgl_memo_dafdir,
	// 		'perihal' =>$perihal,
	// 		'nm_acara' =>$nm_acara,
 //            'tgl_acara' =>$tgl_acara,
 //            'waktu_acara' =>$waktu_acara,
 //            'tempat_acara' =>$tempat_acara,
 //            'permohonan' =>$permohonan,
 //            'jml_pengeluaran' =>$jml_pengeluaran,
 //            'ttd_pemohon' =>$ttd_pemohon,
 //            'pemohon'=>$userlog,
 //            'mengetahui'=>$mengetahui,
 //            'menyetujui' =>$menyetujui,
 //            'createddate' => $waktu,
	// 		'createdby' =>$userlog,
			
	// 		);

			
	// 	//Array Formulir Permohonan
			
	// 		$dataform = array(
			
	// 		'untuk_byr' =>$untuk_byr,
	// 		'jumlah' =>$jumlah,
	// 		'tgl_byr' =>$tgl_byr,
	// 		//'pemohon' =>$userlog,
	// 		'bagian'=>$dari,
	// 		//'mengetahui' =>$mengetahui,
	// 		//'menyetujui' =>$menyetujui,
					
	// 		);

			
	// 	//Array Konfirmasi Peserta
			
	// 		$datapeserta = array(
			
	// 		'pemohon' =>$kepada,
	// 		'departemen'=>$bagian,
			
	// 		);

		
	// 	//Array History
			
	// 		$datahistory = array(

			
	// 		'perihal' =>$perihal,
	// 		'nm_acara' =>$nm_acara,
	// 		'departemen2'=>$dari,
			
	// 		);

			
	// 	$result = $this->komdik->Simpan('tbl_memo_dafdir', $data);
	// 	$result = $this->komdik->SimpanForm('tbl_form_mhn', $dataform);
	// 	$result = $this->komdik->SimpanPeserta('konfirm_peserta', $datapeserta);
	// 	$result = $this->komdik->SimpanHistory('tbl_history', $datahistory);
				
	// 	if($result == 1){
	// 		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
	// 		header('location:'.base_url().'memodafdir');
	// 	}else{
	// 		$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
	// 		header('location:'.base_ul().'memodafdir');
	// 	}
	// }


	function updatememodafdir(){

		$this->load->model('komdik');
		
			$id_memo_dafdir=$_POST['id_memo_dafdir'];
			$kepada = $_POST['kepada'];
			$dari = $_POST['dari'];
			$tgl_memo_dafdir = $_POST['tgl_memo_dafdir'];
			$perihal = $_POST['perihal'];
			$nm_acara = $_POST['nm_acara'];
			$tgl_acara = $_POST['tgl_acara'];
			$waktu_acara = $_POST['waktu_acara'];
			$tempat_acara = $_POST['tempat_acara'];
			$permohonan = $_POST['permohonan'];
			$jml_pengeluaran = $_POST['jml_pengeluaran'];
			$menyetujui = $_POST['menyetujui'];
			$ttd_pemohon = $_POST['ttd_pemohon'];
			$ttd_mengetahui = $_POST['ttd_mengetahui'];
		    $pembuat=$_POST['pembuat'];
			$mengetahui=$_POST['mengetahui'];
			$menyetujui=$_POST['menyetujui'];
			

		//Data Formulir Permohonan
			// $id_form_mhn=$_POST['id_form_mhn'];
		   	$untuk_byr  = $_POST['perihal'];
		   	$jumlah  = $_POST['jml_pengeluaran'];
		   	$tgl_byr  = $_POST['tgl_acara'];
		   	$ttd_pemohon = $_POST['ttd_pemohon'];
		   	$mengetahui  = $_POST['mengetahui'];
		   	$menyetujui  = $_POST['menyetujui'];
		   	$ttd_mengetahui = $_POST['ttd_mengetahui'];
		   	$ttd_menyetujui = $_POST['ttd_menyetujui'];
		   

		
		$userlog = ($this->session->userdata('nama'));
		
		date_default_timezone_set("Asia/Jakarta");
        $waktusaatini =date("d-m-Y H:i:s");
		
		

		$data = array(
			
			'id_memo_dafdir' =>$id_memo_dafdir,
			'kepada' => $kepada,
			'dari' => $dari,
			'tgl_memo_dafdir' => $tgl_memo_dafdir,
			'perihal' => $perihal,
			'nm_acara' => $nm_acara,
			'tgl_acara' => $tgl_acara,
			'waktu_acara' => $waktu_acara,
			'tempat_acara'=> $tempat_acara,
			'permohonan'=> $permohonan,
			'jml_pengeluaran'=>$jml_pengeluaran,
			'ttd_mengetahui' => $this->input->post('ttd_mengetahui'),
			'ttd_menyetujui' => $this->input->post('ttd_menyetujui'),
			'ttd_pembuat' => $this->input->post('ttd_pembuat'),
			'pembuat'=>  $this->input->post('pembuat'),
			'mengetahui'=> $mengetahui,
			'menyetujui'=> $menyetujui,
			'updatedby' =>$userlog,
			'updateddate' => $waktusaatini,
			

			);
				

		//Array Formulir Permohonan
			$dataform = array(
			
			'id_form_mhn'=>$id_memo_dafdir,
			'untuk_byr' =>$untuk_byr,
			'jumlah' =>$jumlah,
			'tgl_byr' =>$tgl_byr,
			'mengetahui' =>$mengetahui,
			'menyetujui' =>$menyetujui,
			
			);

			
		$res = $this->komdik->UpdateMemoDafdir($data);
		$res1 = $this->komdik->UpdateFormulirMohon($dataform);
		
		
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'memodafdir');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'memodafdir');
		}

		if($res1>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'memodafdir');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'memodafdir');
		}

	}
	

	function hapusmemodafdir($id = 1){

		$this->load->model('komdik');
		
		$result = $this->komdik->Hapus('tbl_memo_dafdir', array('id_memo_dafdir'=> $id));
		$result = $this->komdik->Hapus('tbl_form_mhn', array('id_form_mhn'=> $id));
		$result = $this->komdik->Hapus('konfirm_peserta', array('idkonfirmpeserta'=> $id));
		$result = $this->komdik->Hapus('tbl_history', array('id_history'=> $id));
		$result = $this->komdik->Hapus('tbl_konsumsi', array('kode_kons'=> $id));
		$result = $this->komdik->Hapus('tbl_dafdir', array('kd_form_hdr'=> $id));

				
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'memodafdir');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'memodafdir');
		}
	}
}



	
