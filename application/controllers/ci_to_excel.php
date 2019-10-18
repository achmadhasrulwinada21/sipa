<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ci_to_excel extends CI_Controller {
	private $filename = "import_data"; // Kita tentukan nama filenya
	
	public function __construct(){
		parent::__construct();
		
		$this->load->model('ci_to_excel_model');
	}
	
	public function index(){
		$data['master_pt'] = $this->ci_to_excel_model->view();
		//$this->load->view('contohexcel/view', $data);
		$this->template->Display('ex_imp_excel/view', $data);
	}
	
		
	public function index_prinsp(){
		$data['produko3'] = $this->ci_to_excel_model->view_prinsp();
		//$this->load->view('contohexcel/view', $data);
		$this->template->Display('ex_imp_excel/view _trans_prinsp', $data);
	}
	
	
	public function form(){
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di ci_to_excel_model.php
			$upload = $this->ci_to_excel_model->upload_file($this->filename);
			
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
		
		//$this->load->view('contohexcel/form', $data);
		$this->template->Display('ex_imp_excel/form', $data);
	}
	
		public function form_import_perush(){
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di ci_to_excel_model.php
			$upload = $this->ci_to_excel_model->upload_file($this->filename);
			
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
		
		//$this->load->view('contohexcel/form', $data);
		$this->template->Display('ex_imp_excel/form_import_perush', $data);
	}
	
	
	public function form_prinsp(){
		
		$this->load->model('produkom');
		
		$data = array(); // Buat variabel $data sebagai array
		// $data['prid'] = $this->produkom->code_otomatis();
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di ci_to_excel_model.php
			$upload = $this->ci_to_excel_model->upload_file($this->filename);
			
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
		
		//$this->load->view('contohexcel/form', $data);
		$this->template->Display('ex_imp_excel/form_trans_prinsp', $data);
	}
	
		public function form_distributor(){
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di ci_to_excel_model.php
			$upload = $this->ci_to_excel_model->upload_file($this->filename);
			
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
		
		//$this->load->view('contohexcel/form', $data);
		$this->template->Display('ex_imp_excel/form_trans_distrib', $data);
	}
	
	public function import(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = [];
		
		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Kita push (add) array data ke variabel data
				array_push($data, [
					'koper'=>$row['A'], // Insert data nis dari kolom A di excel
					'nm_perusahaan'=>$row['B'], // Insert data nama dari kolom B di excel
					'id_tipe_produk'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
					'tipe_produk'=>$row['D'],
					// 's_fax'=>$row['E'],
					// 's_kontak'=>$row['F'],					// Insert data alamat dari kolom D di excel
				]);
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$result = $this->ci_to_excel_model->insert_multiple($data);
				if($result == 1){
					

                                          echo "<script>alert('Gagal di tambahkan, Coba Kembali...!');history.go(-3);</script>";
				//	$this->session->set_flashdata('alert', "<div class='alert alert-danger'><strong>Upload Data GAGAL di lakukan</strong></div>");
				//	header('location:'.base_url().'masterperusahaan/dataperusahaan_depbang' );
					
				}else{

                                           echo "<script>alert('Data BERHASIL di tambahkan ...!');history.go(-3);</script>";
			//	$this->session->set_flashdata('sukses', "<div class='alert alert-success'><strong>Upload Data BERHASIL di lakukan</strong></div>");
			//		header('location:'.base_url().'masterperusahaan/dataperusahaan_depbang' );
		}	  
		// redirect("ci_to_excel"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}
	
	
	
	public function export(){
		// Load plugin PHPExcel nya
		
		$this->load->model('ci_to_excel_model');
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('DepTI')
							   ->setLastModifiedBy('HerminaIT')
							   ->setTitle("Data Perusahaan")
							   ->setSubject("Perusahaan")
							   ->setDescription("Laporan Semua Data Perusahaan")
							   ->setKeywords("Data Perusahaan");

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PERUSAHAAN"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "KODE"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA PERUSAHAAN"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "TIPE PRODUK"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "ID TIPE"); // Set kolom E3 dengan tulisan "ALAMAT"

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);

		// Panggil function view yang ada di Siswamodel untuk menampilkan semua data siswanya
		$data_perush = $this->ci_to_excel_model->view();

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($data_perush as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->koper);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nm_perusahaan);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->tipe_produk);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->id_tipe_produk);
			
			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			
			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(10); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(50); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15); // Set width kolom E
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Laporan Data Perusahaan");
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Master_pt.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}
	
	
	public function export_distrib(){
		// Load plugin PHPExcel nya
		
		$this->load->model('ci_to_excel_model');
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('DepTI')
							   ->setLastModifiedBy('HerminaIT')
							   ->setTitle("Data Distributor")
							   ->setSubject("Distributor")
							   ->setDescription("Laporan Semua Data Distributor")
							   ->setKeywords("Data Distributor");

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA DISTRIBUTOR"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "KODE"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA DISTRIBUTOR"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "TIPE PRODUK"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "ID TIPE"); // Set kolom E3 dengan tulisan "ALAMAT"

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);

		// Panggil function view yang ada di Siswamodel untuk menampilkan semua data siswanya
		$data_dist = $this->ci_to_excel_model->view_distrib();

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($data_dist as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->kodis);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nm_distributor);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->tipe_produk);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->id_tipe_produk);
			
			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			
			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(10); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(50); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(10); // Set width kolom E
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Laporan Data Perusahaan");
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Master_Distributor.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}
	
	
	public function import_prinsp(){
		
		
		$this->load->model('produkom');
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = [];
		
	    // $dt = $this->produkom->code_otomatis();
		
		// $kodex =$dt;
		
		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				
				
				// Kita push (add) array data ke variabel data
				array_push($data, [
					'pabrik_id'=>$row['A'], // Insert data nis dari kolom A di excel
					'tipe_produk'=>$row['B'], // Insert data nama dari kolom B di excel
					's_kode'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
					'nama_pt'=>$row['D'],
					// 's_fax'=>$row['E'],
					// 's_kontak'=>$row['F'],
					 // 'prid'=> $kodex,
					// Insert data alamat dari kolom D di excel
				]);
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$result = $this->ci_to_excel_model->insert_multiple_prinsp($data);
				if($result == 1){
					
					$this->session->set_flashdata('alert1', "<div class='alert alert-danger'><strong>Upload Data GAGAL di lakukan</strong></div>");
					header('location:'.base_url().'ci_to_excel/form_prinsp' );
					
				}else{
				$this->session->set_flashdata('sukses1', "<div class='alert alert-success'><strong>Upload Data BERHASIL di lakukan</strong></div>");
					header('location:'.base_url().'ci_to_excel/form_prinsp' );
		}	  
		// redirect("ci_to_excel"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}
	
	public function import_distributor(){
		
		
		$this->load->model('modeldistributor');
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = [];
		
	    // $dt = $this->produkom->code_otomatis();
		
		// $kodex =$dt;
		// $data_dist = $this->modeldistributor->GetEva("where kodis='$kodis'")->result_array();
		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			// $kodis=$row['A'];
			
			if($numrow > 1){
				
				// Kita push (add) array data ke variabel data
				array_push($data, [
					'kodis'=>$row['A'], // Insert data nis dari kolom A di excel
					'nm_distributor'=>$row['B'], // Insert data nama dari kolom B di excel
					'tipe_produk'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
					'id_tipe_produk'=>$row['D'],
					// 's_fax'=>$row['E'],
					// 's_kontak'=>$row['F'],
					 // 'prid'=> $kodex,
					// Insert data alamat dari kolom D di excel
				]);
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}
		
		
		
		$result = $this->ci_to_excel_model->insert_multiple_distributor($data);
				if($result == 1){
					
					$this->session->set_flashdata('alert', "<div class='alert alert-danger'><strong>Upload Data GAGAL di lakukan</strong></div>");
					header('location:'.base_url().'masterdistributor' );
					
				}else{
				$this->session->set_flashdata('sukses', "<div class='alert alert-success'><strong>Upload Data BERHASIL di lakukan</strong></div>");
					header('location:'.base_url().'masterdistributor' );
		}	  
		
		
		
		
     // $pbid = isset($data_dist[0]['kodis']);
	// if($pbid == $kodis ){
			// $this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong> Distributor dengan NO : ".$kodis."  tersebut sudah ada!!!</strong></div>");
			// header('location:'.base_url().'masterdistributor');
		// }else{
		 
		
		// $result = $this->ci_to_excel_model->insert_multiple_distributor($data);

		// $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			// header('location:'.base_url().'masterdistributor');
		// } 
		// redirect("ci_to_excel"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}
	
	public function export_perush_obat(){
		$this->load->model('ci_to_excel_model'); 
           $data = array( 'title' => 'Export DATA PERUSAHAAN OBAT',
                'data_perush' => $this->ci_to_excel_model->getAll_obat());
 
           $this->load->view('ex_imp_excel/form_exp_perush', $data);
      }
	  
	  
	public function export_perush_depbang(){
		$this->load->model('ci_to_excel_model'); 
           $data = array( 'title' => 'Export DATA PERUSAHAAN DEPARTEMEN PEMBANGUNAN',
                'data_perush' => $this->ci_to_excel_model->getAll_depbang());
 
           $this->load->view('ex_imp_excel/form_exp_perush', $data);
      }

    
    public function export_perush_alum(){
		$this->load->model('ci_to_excel_model'); 
           $data = array( 'title' => 'Export DATA PERUSAHAAN ALAT UMUM',
                'data_perush' => $this->ci_to_excel_model->getAll_alum());
 
           $this->load->view('ex_imp_excel/form_exp_perush', $data);
      }
    	  
	  
	public function export_perush_alkes(){
		$this->load->model('ci_to_excel_model'); 
           $data = array( 'title' => 'Export DATA PERUSAHAAN ALAT KESEHATAN',
                'data_perush' => $this->ci_to_excel_model->getAll_alkes());
 
           $this->load->view('ex_imp_excel/form_exp_perush', $data);
      }
	  
	  
	  
	  
	public function export_distrib2(){
		$this->load->model('ci_to_excel_model'); 
           $data = array( 'title' => 'Laporan Excel | DATA DISTRIBUTOR',
                'data_distrib' => $this->ci_to_excel_model->getAll_distrib());
 
           $this->load->view('ex_imp_excel/form_exp_distrib', $data);
      }  
	
	
}
