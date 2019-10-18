    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_mstsatuan extends CI_Controller {
private $filename = "detail_satuan";
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

		$this->load->model('m_mstsatuan'); 
        $data['data_satuan'] = $this->m_mstsatuan->Getsatuan("order by satuanid desc")->result_array();
	   

	    
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
					

		$this->template->display('master_satuan/data_mastersatuan', $data);
	}

	public function ajax_list()
    {
    	$this->load->model('m_mstsatuan');
        $list = $this->m_mstsatuan->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $satuanproduk) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $satuanproduk->satuanid;
            $row[] = $satuanproduk->satuannama;

            $row[] = '<a href="C_mstsatuan/edit/'.$satuanproduk->satuanid.'" class="edit_record btn btn-xs btn btn-success" title="Edit" onclick=""><i class="glyphicon glyphicon-pencil"></i> Edit</a>
	<a class="hapus_record btn btn-xs btn-danger" href="C_mstsatuan/hapus/'.$satuanproduk->satuanid.'" title="Hapus" onClick="return doconfirm()"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
           
           
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_mstsatuan->count_all(),
                        "recordsFiltered" => $this->m_mstsatuan->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function v_export_excel(){
		$this->load->model('m_mstsatuan'); 
           $data = array( 'title' => 'Laporan Excel | DATA SATUAN',
                'exp_satuan' => $this->m_mstsatuan->getAll());
 
           $this->load->view('master_satuan/vw_lap_excel',$data);
      }

	public function export_excel(){
		$this->load->model('m_mstsatuan'); 
           $data = array( 'title' => 'Laporan Excel | DATA SATUAN',
                'exp_satuan' => $this->m_mstsatuan->getAll());
 
           $this->load->view('master_satuan/lap_excel',$data);
      }

	
	function savedata(){
		$this->load->model('m_mstsatuan');
		
		// $idproduk = $_POST['idproduk'];
		$satuanid = $_POST['satuanid'];
		$satuannama = $_POST['satuannama'];
		//$satuanracikan = $_POST['satuanracikan'];
		//$satuanidconform = $_POST['satuanidconform'];
		
		
			
		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	

		$data = array(	
			// 'idproduk' => $idproduk,
			'satuanid' => $satuanid,
			'satuannama' => $satuannama,
			//'satuanracikan' => $satuanracikan,
			//'satuanidconform' => $satuanidconform,
			
			
					
			'createddate' => $waktusaatini,
			'createdby' =>  $this->session->userdata('nama'),			
			);

		
		
		
		$result = $this->m_mstsatuan->Simpan('satuanproduk', $data);
		
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'C_mstsatuan');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'C_mstsatuan');
		}		
	}

	function edit($kode=0){

	$this->load->model('m_mstsatuan');
	
	$data_abk = $this->m_mstsatuan->AmbilSatuan("where satuanid ='$kode'")->result_array();
	
	 

	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'nama_user' => $this->session->userdata('nama_user'),
		'foto' => $this->session->userdata('foto'),

		'satuanid' => $data_abk[0]['satuanid'],
		'satuannama' => $data_abk[0]['satuannama'],		
		'satuanracikan' => $data_abk[0]['satuanracikan'],
		'satuanidconform' => $data_abk[0]['satuanidconform'],
		
			
		
	
		'data_satuan' => $this->m_mstsatuan->AmbilSatuan("where satuanid = '$kode' order by satuanid asc")->result_array()
			
		);

	
		$this->template->Display('master_satuan/edit_satuan', $data);

	}

	function update(){


	$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d M Y H:i:s");
        $waktus =date("Ym");

   
	$data = array(
	'satuanid' =>$this->input->post('satuanid'),
	'satuannama' =>$this->input->post('satuannama'),
	'satuanracikan' =>$this->input->post('satuanracikan'),
	'satuanidconform' =>$this->input->post('satuanidconform'),
	
	

	'updatedby' =>  $this->session->userdata('nama'),
	'updateddate' =>  $waktu,
	
	);
	$this->load->model('m_mstsatuan');
	$hasil = $this->m_mstsatuan->UpdateSatuan($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'C_mstsatuan');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'C_mstsatuan');
	}
	}

	
	function hapus($kode = 1){
	$this->load->model('m_mstsatuan');	
	$result = $this->m_mstsatuan->Hapus('satuanproduk', array('satuanid' => $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'C_mstsatuan');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'C_mstsatuan');
	}
	}
	
	public function form(){
		$this->load->model('m_mstsatuan');
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di ITModel_Cis_Money.php
			$upload = $this->m_mstsatuan->upload_file($this->filename);
			
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
		
		$this->template->Display('master_satuan/exp_exelsatuan', $data);
	}
	
	public function import(){
		$this->load->model('m_mstsatuan');
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
					
					'satuanid'=>$row['A'], // Insert data nis dari kolom A di excel
					'satuannama'=>$row['B'],
					'satuanracikan'=>$row['C'], // Insert data nis dari kolom B di excel
					'satuanidconform'=>$row['D'],
					
					
				]);
			}
		
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->m_mstsatuan->insert_multiple($data);
		
		redirect("C_mstsatuan"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}
}

