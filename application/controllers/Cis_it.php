<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cis_it extends CI_Controller {
	private $filename = "import_data_cis_it"; // Kita tentukan nama filenya
	
	public function __construct(){
		parent::__construct();
		
		$this->load->model('ITModel');
	}
	
	public function index(){
		$data['CIS_INDUK_IT'] = $this->ITModel->view();
		
		$data['namadept'] = $this->ITModel->GetNamaDept()->result_array();
		
		$this->template->Display('cisindukit/view', $data);
	}
	
	public function form(){
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di ITModel.php
			$upload = $this->ITModel->upload_file($this->filename);
			
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
		
		$this->template->Display('cisindukit/form', $data);
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
		$induk = 'induk';	
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
					'no_it'=>$row['A'], // Insert data nis dari kolom A di excel
					'komponen'=>$row['B'], // Insert data nis dari kolom B di excel
					'sub_komponen'=>$row['C'], // Insert data nama dari kolom C di excel
					'jumlah'=>$row['D'], // Insert data jenis kelamin dari kolom D di excel
					'pencapaian'=>$row['E'], // Insert data alamat dari kolom E di excel
					'kode_role'=>$row['F'], // Insert data alamat dari kolom E di excel
					'createdby' => $userlog,
					'createddate' => $waktusaatini,
					'nama_cis' => $induk,
				]);
			}
		
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->ITModel->insert_multiple($data);
		
		redirect("Cis_it"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}
	
		function delete(){ //delete data berdasarkan nim
		
		//tampung data nama yang delete
		$this->load->model('ITModel');
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

		$result = $this->ITModel->insert_simpan('cis_dept_it_delete', $data);
		
		//KOSONG datanya
		$this->db->empty_table('cis_dept_it');
					$data['CIS_INDUK_IT'] = $this->ITModel->view();
					$data['namadept'] = $this->ITModel->view();
		$this->template->Display('cisindukit/view', $data);
		
		}
}
