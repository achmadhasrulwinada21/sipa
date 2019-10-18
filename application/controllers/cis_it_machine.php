<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cis_it_machine extends CI_Controller {
	private $filename = "import_data_machine_cis_it"; // Kita tentukan nama filenya
	
	public function __construct(){
		parent::__construct();
		
		$this->load->model('ITModel_Cis_Machine');
	}
	
	public function index(){
		$data['CIS_MACHINE_IT'] = $this->ITModel_Cis_Machine->view();

		$data['namadept'] = $this->ITModel_Cis_Machine->GetNamaDept()->result_array();
		
		$this->template->Display('cismachineit/view', $data);
	}
	
	public function form(){
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di ITModel_Cis_Machine.php
			$upload = $this->ITModel_Cis_Machine->upload_file($this->filename);
			
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
		
		$this->template->Display('cismachineit/form', $data);
	}
	
	public function import(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = [];
		
		$userlog = ($this->session->userdata('nama'));	
		$katmachine = 'machine';
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
					'no_it_mac'=>$row['A'], // Insert data nis dari kolom A di excel
					'machine'=>$row['B'], // Insert data nis dari kolom B di excel
					'bagian'=>$row['C'], // Insert data nis dari kolom C di excel
					'spek'=>$row['D'], // Insert data nama dari kolom D di excel
					'jumlah'=>$row['E'], // Insert data jenis kelamin dari kolom E di excel
					'harga'=>$row['F'], // Insert data alamat dari kolom F di excel
					'total'=>$row['G'], // Insert data alamat dari kolom G di excel
					'keterangan'=>$row['H'], // Insert data alamat dari kolom H di excel
					'kode_role'=>$row['I'], // Insert data alamat dari kolom I di excel
					'createdby' => $userlog,
					'createddate' => $waktusaatini,
					'nama_cis' => $katmachine,
				]);
			}
		
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->ITModel_Cis_Machine->insert_multiple($data);
		
		redirect("cis_it_machine"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}
	
		function delete(){ //delete data berdasarkan nim
		
		//tampung data nama yang delete
		$this->load->model('ITModel_Cis_Machine');
			$userlog = ($this->session->userdata('nama')
			);
			
			date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("d-m-Y H:i:s");
			$waktuini =date("d-m-Y");
			
			$data = array(
			'deleteby' => $userlog ,
			'deletedate' => $waktusaatini,
			'tanggal' => $waktuini,
			);

		$result = $this->ITModel_Cis_Machine->insert_simpan('cis_it_machine_delete', $data);

		//KOSONG datanya
		$this->db->empty_table('cis_it_machine');
			
					$data['CIS_MACHINE_IT'] = $this->ITModel_Cis_Machine->view();
					$data['namadept'] = $this->ITModel_Cis_Machine->view();
					$this->template->Display('cismachineit/view', $data);
		}
}
