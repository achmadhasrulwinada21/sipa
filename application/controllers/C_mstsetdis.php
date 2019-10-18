    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_mstsetdis extends CI_Controller {
private $filename = "detail_setup_dist";
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

		$this->load->model('m_mstsetdis'); 
        $data['data_setdis'] = $this->m_mstsetdis->Getsetdis("order by idsetdis desc")->result_array();
	    $data['kode_perusahaan']= $this->m_mstsetdis->Getpt()->result_array();
	    $data['kode_distributor']= $this->m_mstsetdis->Getdistributor()->result_array();

	    
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
					

		$this->template->display('master_set_dist/data_mstsetdis', $data);
	}

	public function v_export_excel(){
		$this->load->model('m_mstsetdis'); 
           $data = array( 'title' => 'Laporan Excel | DATA SETUP DISTRIBUTOR',
                'exp_setdis' => $this->m_mstsetdis->getAll());
 
           $this->load->view('master_set_dist/vw_lap_excel',$data);
      }

	public function export_excel(){
		$this->load->model('m_mstsetdis'); 
           $data = array( 'title' => 'Laporan Excel | DATA SETUP DISTRIBUTOR',
                'exp_setdis' => $this->m_mstsetdis->getAll());
 
           $this->load->view('master_set_dist/lap_excel',$data);
      }

	
	function savedata(){
		$this->load->model('m_mstsetdis');
		
		// $idproduk = $_POST['idproduk'];
		$koper = $_POST['koper'];
		$kodis = $_POST['kodis'];
		
		
			
		$data = array();
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	

			for ($i = 0; $i < count($this->input->post('kodis')); $i++)
        	 {
		$data[$i] = array(	
			// 'idproduk' => $idproduk,
			
			'koper' => $koper,
			'kodis' => $kodis[$i],
			
			
					
			'createddate' => $waktusaatini,
			'createdby' =>  $this->session->userdata('nama'),			
			);
	}

	echo json_encode($data);

		
		
		
		$result = $this->m_mstsetdis->Simpan($data);
		
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'C_mstsetdis');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'C_mstsetdis');
		}		
	}

	function edit($kode=0){

	$this->load->model('m_mstsetdis');
	
	$data_abk = $this->m_mstsetdis->Ambilsetdis("where idsetdis ='$kode'")->result_array();
	
	 $for_prins = array();
		foreach($this->m_mstsetdis->Ambilsetdis("where idsetdis = '$kode' ")->result_array() as $prins){
			$for_prins[] = $prins['koper'];
		}

	  $for_this = array();
		foreach($this->m_mstsetdis->Ambilsetdis("where idsetdis = '$kode' ")->result_array() as $ini){
			$for_this[] = $ini['kodis'];
		}

		

	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'nama_user' => $this->session->userdata('nama_user'),
		'foto' => $this->session->userdata('foto'),

		'idsetdis' => $data_abk[0]['idsetdis'],
		
		
		'prins' => $this->m_mstsetdis->Getpt()->result_array(),
		'for_prinsw' => $for_prins,
		
		'ini' => $this->m_mstsetdis->Getdistributor()->result_array(),
		'for_thisw' => $for_this,
			
		
	
	
	'data_uraiankrs' => $this->m_mstsetdis->Ambilsetdis("where idsetdis = '$kode' order by idsetdis asc")->result_array()
			
		);

	
		$this->template->Display('master_set_dist/edit_setdis', $data);

	}

	function update(){


	$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d M Y H:i:s");
        $waktus =date("Ym");

   
	$data = array(
	'idsetdis' =>$this->input->post('idsetdis'),
	
	'koper' =>$this->input->post('koper'),
	'kodis' =>$this->input->post('kodis'),
	

	'updatedby' =>  $this->session->userdata('nama'),
	'updateddate' =>  $waktu,
	
	);
	$this->load->model('m_mstsetdis');
	$hasil = $this->m_mstsetdis->Updatesetdis($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'C_mstsetdis');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'C_mstsetdis');
	}
	}
	
	function hapus($kode = 1){
	$this->load->model('m_mstsetdis');	
	$result = $this->m_mstsetdis->Hapus('master_setup_dist', array('idsetdis' => $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'C_mstsetdis');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'C_mstsetdis');
	}
	}
	
	public function form(){
		$this->load->model('m_mstsetdis');
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di ITModel_Cis_Money.php
			$upload = $this->m_mstsetdis->upload_file($this->filename);
			
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
		
		$this->template->Display('master_set_dist/exp_exelsetdis', $data);
	}
	
	public function import(){
		$this->load->model('m_mstsetdis');
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
					
					'koper' =>$row['A'],
					'kodis' =>$row['B'], // Insert data nis dari kolom C di excel
					
					
				]);
			}
		
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->m_mstsetdis->insert_multiple($data);
		
		redirect("C_mstsetdis"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}
}

