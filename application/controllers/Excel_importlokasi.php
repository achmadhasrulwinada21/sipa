<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excel_importlokasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('modellokasi');
		$this->load->library('excel');

		if(!$this->session->userdata('u_name')){
		$this->session->set_flashdata("alerts", "<div class='alerts alert-danger'><strong>Sesi Anda Telah Habis, Silahkan login kembali..</strong></div>");
			redirect('dashboard');

		}
	}

	function index()
	{
		$this->template->display('master_lokasi/excel_importlokasi');
	}
	

	function fetchlokasi()
	{
		$this->load->model('modellokasi');
		$data = $this->modellokasi->v_lokasiimport();
		$output = '
		<table class="table table-striped table-bordered">
			<tr>				
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Kode Rumah Sakit</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Rumah Sakit</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Kode Lokasi</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Lokasi</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">status</th>
					
			</tr>
		';
		$status=0;
		foreach($data as $row)
		{
			$status=$row->status;

			if($status==0){
			$status="AKTIF";
		}else{
			$status="NON AKTIF";
		}
			$output .= '
			<tr>
			    <td>'.$row->koders.'</td>
				<td>'.$row->namars.'</td>
				<td>'.$row->kode_lokasi.'</td>
				<td>'.$row->nm_lokasi.'</td>
				<td>'.$status.'</td>
			</tr>
			';
		}
		$output .= '</table>';
		echo $output;
	}

	function importlokasi2()
	{
		$this->load->model('modellokasi');
		$this->load->library('excel');
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");
       $userlog = ($this->session->userdata('nama'));
			if(isset($_FILES["file"]["name"]))
		{
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
					$kode_lokasi_a = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$nm_lokasi_a = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$koders_a = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$status_a = $worksheet->getCellByColumnAndRow(3, $row)->getValue();					
					$data[] = array(
						'kode_lokasi' => $kode_lokasi_a,
						'nm_lokasi'	=>	$nm_lokasi_a,
						'koders'=>	$koders_a,	
						'status'=>$status_a,
						'createby'=>$userlog,			
					);

					}
			}
					
				$this->modellokasi->insertlokasi($data);
			  echo 'Data Imported successfully';
		
		} }
		}

?>
