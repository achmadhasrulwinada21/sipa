<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cis_it_methode extends CI_Controller {
	private $filename = "import_data_methode_cis_it"; // Kita tentukan nama filenya
	
	public function __construct(){
		parent::__construct();
		
		$this->load->model('ITModel_Cis_Methode');
	}
	
	public function index(){
		$data['CIS_METHODE_IT'] = $this->ITModel_Cis_Methode->view();
		
		//$data['namadept'] = $this->ITModel_Cis_Methode->GetNamaDept()->result_array();
	
		$data['namadept'] = $this->ITModel_Cis_Methode->GetNamaDept()->result_array();
		
		$this->template->Display('cismethodeit/view', $data);
	}
	
	public function form(){
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di ITModel_Cis_Methode.php
			$upload = $this->ITModel_Cis_Methode->upload_file($this->filename);
			
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
		
		$this->template->Display('cismethodeit/form', $data);
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
		$methode = 'methode';
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
					'no_it_methode'=>$row['A'], // Insert data nis dari kolom A di excel
					'judul'=>$row['B'], // Insert data nis dari kolom B di excel
					'keterangan'=>$row['C'], // Insert data nama dari kolom C di excel
					'kode_role'=>$row['D'], // Insert data alamat dari kolom D di excel
					'createdby' => $userlog,
					'createddate' => $waktusaatini,
					'nama_cis' => $methode,
				]);
			}
		
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->ITModel_Cis_Methode->insert_multiple($data);
		
		redirect("cis_it_methode"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}
	
		function delete(){ //delete data berdasarkan nim
		
		//tampung data nama yang delete
		$this->load->model('ITModel_Cis_Methode');
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

		$result = $this->ITModel_Cis_Methode->insert_simpan('cis_it_methode_delete', $data);

		//KOSONG datanya
		$this->db->empty_table('cis_it_methode');
			
					$data['CIS_METHODE_IT'] = $this->ITModel_Cis_Methode->view();
					$data['namadept'] = $this->ITModel_Cis_Methode->view();
					$this->template->Display('cismethodeit/view', $data);
		}
}
