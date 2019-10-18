<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excelcobaimport_lop extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('obatreg');
		$this->load->library('excel');
	}

	function index()
	{
		$this->template->display('katobat/excel_importobat_lop');
	}
	
	function fetchobat()
	{
		$this->load->model('obatreg');
		$this->load->library('excel');
		$data = $this->obatreg->selectobat();
		$output = '
		<h3 align="center">Total Data - '.$data->num_rows().'</h3>
		<table class="table table-striped table-bordered">
			<tr>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">ID DETAIL</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">KODE DETAIL</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Harga</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Diskon</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Tipe Harga</th>
				
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Kode Distributor</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Kode Perusahaan</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Kode Obat</th>
				 <th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Kode transaksi</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">ID Obat</th>
			</tr>
			
		';
		foreach($data->result() as $row)
		{
			$output .= '
			<tr>
				<td>'.$row->iddetailprod2.'</td>
				<td>'.$row->koded_prod.'</td>
				<td>'.$row->harga.'</td>
				<td>'.$row->discount.'</td>
				<td>'.$row->tipe_harga.'</td>
				
				<td>'.$row->kodis.'</td>
				<td>'.$row->koper.'</td>
				<td>'.$row->kode_obat.'</td>
				<td>'.$row->kode_th.'</td>
				<td>'.$row->idobat.'</td>
			</tr>
			';
		}
		$output .= '</table>';
		echo $output;
	}

	function importobat()
	{
		$this->load->model('obatreg');
		$this->load->library('excel');
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");

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
					$iddetailprod2_a = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$koded_prod_a = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$harga_a = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$discount_a = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$tipe_harga_a = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					
					$kodis_a = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$koper_a = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$kode_obat_a = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                                        
					$kode_th_a = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
					$idobat_a = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
					
					$data[] = array(
						'iddetailprod2'		=>	$iddetailprod2_a,
						'koded_prod'		=>	$koded_prod_a,
						'harga'		=>	$harga_a,
						'discount' => $discount_a,
						'tipe_harga'		=>	$tipe_harga_a,
						'kodis'		=>	$kodis_a,
						'koper'		=>	$koper_a,
						'kode_obat'		=>	$kode_obat_a,
						'kode_th'		=>	$kode_th_a,
						'idobat'		=>	$idobat_a,
						
						'createdate' => $waktusaatini,
						'createby' =>  $this->session->userdata('nama'),
						
					);
				}
			}
			$this->obatreg->insertobatim($data);
			echo 'Data Imported successfully';
		}	
	
	}
	

















































































}

?>
