<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Impexel extends CI_Controller {
	private $filename = "detail_prod"; // Kita tentukan nama filenya
	
	public function __construct(){
		parent::__construct();
		   include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		$this->load->model('m_impexel');
	}
	
	public function index(){
		$this->load->model('m_impexel');
		$data['dataprod'] = $this->m_impexel->view();
		
		// $data['namadept'] = $this->M_impexel->GetNamaDept()->result_array();
		
		$this->template->Display('produko2/data_imp', $data);
	}
	

	function get_kode()
    
  {
    $this->load->model('m_impexel');
    $koper=$this->input->post('koper');
    $data=$this->m_impexel->get_data_pabrik_bykode_db1($koper);
    echo json_encode($data);
    
  }

	public function form(){
		$this->load->model('m_impexel');
		
		$data = array( 

			'dataq' => $this->m_impexel->GetProdukos()->result_array(),

		); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di ITModel_Cis_Money.php
			$upload = $this->m_impexel->upload_file($this->filename);
			
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
		
		$this->template->Display('produko2/exp_exel', $data);
	}
	
	public function import(){
		$this->load->model('m_impexel');
		
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = [];
		
		$userlog = ($this->session->userdata('nama'));	
		// $katmoney = 'money';
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");	
		$koded_prod = $_POST['koded_prod'];
	    $koper = $_POST['koper'];
           
      

		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			$nama_produk = $row['A'];
			$harga = $row['B'];
			$discount = $row['C'];
			$kode_produk = $row['D'];
			$deskripsi = $row['E'];
			$kodis = $row['F'];
			$tipe_harga = $row['G'];
			if($numrow > 1){
				// Kita push (add) array data ke variabel data
				array_push($data, [
					
					'nama_produk'=>$nama_produk, // Insert data nis dari kolom A di excel
					'harga'=>$harga, // Insert data nis dari kolom B di excel
					'discount'=>$discount,
					'kode_produk'=>$kode_produk,
					'deskripsi' =>$deskripsi, // Insert data nis dari kolom C di excel
					'kodis'=>$kodis, // Insert data jenis kelamin dari kolom D di excel
					'tipe_harga'=>$tipe_harga,
					'createby' => $userlog,
					'createdate' => $waktusaatini,
					 'koded_prod' => $koded_prod,
					 'koper' => $koper,
				]);
			}
		
			$numrow++; // Tambah 1 setiap kali looping
            $datatgl = $this->m_impexel->GetProddet("where kode_produk='$kode_produk'")->result_array();
            $pbid = isset($datatgl[0]['kode_produk']);
		}

       if($pbid == $kode_produk){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>DATA tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'C_Impexel');
		}else{
		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->m_impexel->insert_multiple($data);
		
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'C_Impexel');
		}
	}
	
		function delete(){ //delete data berdasarkan nim
		//tampung data nama yang delete
		$this->load->model('m_impexel');
			// $userlog = ($this->session->userdata('nama')
			// );
			
			date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");
			$waktuini =date("Y-m-d");
			
			$data = array(
			'deleteby' => $userlog ,
			'deletedate' => $waktusaatini,
			'tanggal' => $waktuini,
			);

		$result = $this->m_impexel->insert_simpan('tb_detail_prod2', $data);

		//KOSONG datanya
		$this->db->empty_table('tb_detail_prod2');
			
					$data['dataprod'] = $this->m_impexel->view();
					// $data['namadept'] = $this->ITModel_Cis_Money->view();
					
					$this->template->Display('produko2/data_imp', $data);
		}
}
