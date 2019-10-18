    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_rekananobat extends CI_Controller {
private $filename = "rekanan_farmasi";
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

		$this->load->model('m_rekananobat'); 
        $data['data_rekananobat'] = $this->m_rekananobat->GetRekananObat("order by koper desc")->result_array();
	   

	    
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
					

		$this->template->display('rekanan_farmasi/data_rekananobat', $data);
	}

	public function ajax_list()
    {
    	$this->load->model('m_rekananobat');
        $list = $this->m_rekananobat->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $rekanan) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $rekanan->koper;
            $row[] = $rekanan->nm_perusahaan;
            $row[] = $rekanan->kodis;
            $row[] = $rekanan->foi;
            $row[] = $rekanan->mou;
            $row[] = $rekanan->pks;

       //      $row[] = '<a href="C_mstsatuan/edit/'.$rekanan->satuanid.'" class="edit_record btn btn-xs btn btn-success" title="Edit" onclick=""><i class="glyphicon glyphicon-pencil"></i> Edit</a>
					  // <a class="hapus_record btn btn-xs btn-danger" href="C_mstsatuan/hapus/'.$rekanan->satuanid.'" title="Hapus" onClick="return konfirmasi()"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
           
           
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_rekananobat->count_all(),
                        "recordsFiltered" => $this->m_rekananobat->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function v_export_excel(){
		$this->load->model('m_rekananobat'); 
           $data = array( 'title' => 'Laporan Excel | DATA REKANAN FARMASI',
                'exp_rekanan' => $this->m_rekananobat->getAll());
 
           $this->load->view('rekanan_farmasi/vw_lap_excel',$data);
      }

	public function export_excel(){
		$this->load->model('m_rekananobat'); 
           $data = array( 'title' => 'Laporan Excel | DATA REKANAN FARMASI',
                'exp_rekanan' => $this->m_rekananobat->getAll());
 
           $this->load->view('rekanan_farmasi/lap_excel',$data);
      }

	
	public function form(){
		$this->load->model('m_rekananobat');
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di ITModel_Cis_Money.php
			$upload = $this->m_rekananobat->upload_file($this->filename);
			
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
		
		$this->template->Display('rekanan_farmasi/exp_exelrekanan', $data);
	}
	
	public function import(){
		$this->load->model('m_rekananobat');
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
					
					'koper'=>$row['A'], // Insert data nis dari kolom A di excel
					'nm_perusahaan'=>$row['B'],
					'kodis'=>$row['C'], // Insert data nis dari kolom B di excel
					'foi'=>$row['D'],
					'mou'=>$row['E'],
					'pks'=>$row['F'],
					
					
				]);
			}
		
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->m_rekananobat->insert_multiple($data);
		
		redirect("C_rekananobat"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}
}

