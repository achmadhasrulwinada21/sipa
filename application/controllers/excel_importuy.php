<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excel_import extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('excel_import_model');
		$this->load->library('excel');

		if(!$this->session->userdata('u_name')){
		$this->session->set_flashdata("alerts", "<div class='alerts alert-danger'><strong>Sesi Anda Telah Habis, Silahkan login kembali..</strong></div>");
			redirect('dashboard');

		}
	}

	function index()
	{
		$this->template->display('master_satuan/excel_import');
	}
	
	function fetch()
	{
		$data = $this->excel_import_model->select();
		$output = '
		<h3 align="center">Total Data - '.$data->num_rows().'</h3>
		<table class="table table-striped table-bordered">
			<tr>
				<th>Satuan ID</th>
				<th>Satuan Nama</th>
				<th>Satuan Racikan</th>
				<th>Satuan ID Conform</th>
				
			</tr>
		';
		foreach($data->result() as $row)
		{
			$output .= '
			<tr>
				<td>'.$row->satuanid.'</td>
				<td>'.$row->satuannama.'</td>
				<td>'.$row->satuanracikan.'</td>
				<td>'.$row->satuanidconform.'</td>
				
			</tr>
			';
		}
		$output .= '</table>';
		echo $output;
	}

	function import()
	{
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
					$satuan_id = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$satuan_nama = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$satuan_racikan = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$satuan_idconform = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					
					$data[] = array(
						'satuanid'		=>	$satuan_id,
						'satuannama'		=>	$satuan_nama,
						'satuanracikan'			=>	$satuan_racikan,
						'satuanidconform'			=>	$satuan_idconform,
						
					);
				}
			}
			$this->excel_import_model->insert($data);
			echo 'Data Imported successfully';
		}	
	}

	//setdis
	function setdis()
	{
		$this->template->display('master_set_dist/excel_import');
	}
	
	function fetchsetdis()
	{
		$data = $this->excel_import_model->selectsetdis();
		$output = '
		<h3 align="center">Total Data - '.$data->num_rows().'</h3>
		<table class="table table-striped table-bordered">
			<tr>
				<th>Kode Perusahaan</th>
				<th>Kode Distributor</th>
				
			</tr>
		';
		foreach($data->result() as $row)
		{
			$output .= '
			<tr>
				<td>'.$row->koper.'</td>
				<td>'.$row->kodis.'</td>
				
				
			</tr>
			';
		}
		$output .= '</table>';
		echo $output;
	}

	function importsetdis()
	{
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
					$koper_a = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$kodis_a = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					
					
					$data[] = array(
						'koper'		=>	$koper_a,
						'kodis'		=>	$kodis_a,
						
						
					);
				}
			}
			$this->excel_import_model->insertsetdis($data);
			echo 'Data Imported successfully';
		}	
	}

	//alum
	function alum()
	{
		$this->template->display('master_produk/excel_importalum');
	}
	
	function fetchalum()
	{
		$data = $this->excel_import_model->selectalum();
		$output = '
		<h3 align="center">Total Data - '.$data->num_rows().'</h3>
		<table class="table table-striped table-bordered">
			<tr>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Kode Produk</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Nama Produk</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Spesifikasi Teknis</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Tipe Produk</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Kode Perusahaan</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Volume</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Satuan ID</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Merk</th>
				
			</tr>
		';
		foreach($data->result() as $row)
		{
			$output .= '
			<tr>
				<td>'.$row->kode_produk.'</td>
				<td>'.$row->nama_produk.'</td>
				<td>'.$row->deskripsi.'</td>
				<td>'.$row->tipe_produk.'</td>
				<td>'.$row->koper.'</td>
				<td>'.$row->volume.'</td>
				<td>'.$row->satuanid.'</td>
				<td>'.$row->merk.'</td>
			</tr>
			';
		}
		$output .= '</table>';
		echo $output;
	}

	function importalum()
	{
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
					$kode_produk1 = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$nama_produk1 = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$deskripsi1 = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$tipe_produk1 = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$koper1 = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$volume1 = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$satuanid1 = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$merk1 = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					
					
					$data[] = array(
						'kode_produk'		=>	$kode_produk1,
						'nama_produk'		=>	$nama_produk1,
						'deskripsi'		=>	$deskripsi1,
						'tipe_produk' => $tipe_produk1,
						'koper'		=>	$koper1,
						'volume'		=>	$volume1,
						'satuanid'		=>	$satuanid1,
						'merk'		=>	$merk1,
						
						'createddate' => $waktusaatini,
						'createdby' =>  $this->session->userdata('nama'),
						
					);
				}
			}
			$this->excel_import_model->insertalum($data);
			echo 'Data Imported successfully';
		}	
	}


	//obat
	function obat()
	{
		$this->template->display('master_produk/excel_importobat');
	}
	
	function fetchobat()
	{
		$data = $this->excel_import_model->selectobat();
		$output = '
		<h3 align="center">Total Data - '.$data->num_rows().'</h3>
		<table class="table table-striped table-bordered">
			<tr>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Kode Obat</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Nama Obat</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Komposisi</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Golongan ID</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Tipe Produk</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Kode Perusahaan</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Kode Distributor</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Harga</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Diskon</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Satuan ID</th>
				
				
			</tr>
		';
		foreach($data->result() as $row)
		{
			$output .= '
			<tr>
				<td>'.$row->kode_obat.'</td>
				<td>'.$row->nama_obat.'</td>
				<td>'.$row->komposisi.'</td>
				<td>'.$row->golonganid.'</td>
				<td>'.$row->tipe_produk.'</td>
				<td>'.$row->koper.'</td>
				<td>'.$row->kodis.'</td>
				<td>'.$row->harga.'</td>
				<td>'.$row->discount.'</td>
				<td>'.$row->satuanid.'</td>
				
			</tr>
			';
		}
		$output .= '</table>';
		echo $output;
	}

	function importobat()
	{
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
					$kode_obat1 = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$nama_obat1 = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$komposisi1 = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$golonganid1 = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$tipe_produk1 = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$koper1 = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$kodis1 = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$harga1 = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$discount1 = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$satuanid1 = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					
					
					
					$data[] = array(
						'kode_obat'		=>	$kode_obat1,
						'nama_obat'		=>	$nama_obat1,
						'komposisi'		=>	$komposisi1,
						'golonganid'		=>	$golonganid1,
						'tipe_produk' => $tipe_produk1,
						'koper'		=>	$koper1,
						'kodis'		=>	$kodis1,
						'harga'		=>	$harga1,
						'discount' => $discount1,
						'satuanid'		=>	$satuanid1,
						
						
						'createddate' => $waktusaatini,
						'createdby' =>  $this->session->userdata('nama'),
						
					);
				}
			}
			$this->excel_import_model->insertobat($data);
			echo 'Data Imported successfully';
		}	
	}


	//alkes
	function alkes()
	{
		$this->template->display('master_produk/excel_importalkes');
	}
	
	function fetchalkes()
	{
		$data = $this->excel_import_model->selectalkes();
		$output = '
		<h3 align="center">Total Data - '.$data->num_rows().'</h3>
		<table class="table table-striped table-bordered">
			<tr>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Kode Produk</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Nama Produk</th>
				
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Merk</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Tipe Produk</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Type</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Kode Perusahaan</th>
				
				
				
			</tr>
		';
		foreach($data->result() as $row)
		{
			$output .= '
			<tr>
				<td>'.$row->kode_produk.'</td>
				<td>'.$row->nama_produk.'</td>
				
				<td>'.$row->merk.'</td>
				<td>'.$row->tipe_produk.'</td>
				<td>'.$row->type.'</td>
				<td>'.$row->koper.'</td>
				
			</tr>
			';
		}
		$output .= '</table>';
		echo $output;
	}

	function importalkes()
	{
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
					$kode_produk2 = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$nama_produk2 = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					
					$merk2 = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$tipe_produk2 = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$type2 = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$koper2 = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					
					
					$data[] = array(
						'kode_produk'		=>	$kode_produk2,
						'nama_produk'		=>	$nama_produk2,
						
						'merk'				=>	$merk2,
						'tipe_produk' 		=> $tipe_produk2,
						'type'				=>	$type2,
						'koper'				=>	$koper2,
						
						'createddate' => $waktusaatini,
						'createdby' =>  $this->session->userdata('nama'),
						
					);
				}
			}
			$this->excel_import_model->insertalkes($data);
			echo 'Data Imported successfully';
		}	
	}


	//depbang
	function depbang()
	{
		$this->template->display('master_produk/excel_importdepbang');
	}
	
	function fetchdepbang()
	{
		$data = $this->excel_import_model->selectdepbang();
		$output = '
		<h3 align="center">Total Data - '.$data->num_rows().'</h3>
		<table class="table table-striped table-bordered">
			<tr>

				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Kode Jenis Pekerjaan</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Kode Sub Jenis Pekerjaan</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Kode Jenis Barang</th>

				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Kode Produk</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Nama Produk</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Tipe Produk</th>
				
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Spesifikasi</th>
				
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Merk</th>
				
				
				
			</tr>
		';
		foreach($data->result() as $row)
		{
			$output .= '
			<tr>
				<td>'.$row->kode_jenis_pekj.'</td>
				<td>'.$row->kode_sub_jenis_pekj.'</td>
				<td>'.$row->kode_jenis_barang.'</td>
				
				<td>'.$row->kode_produk.'</td>
				<td>'.$row->nama_produk.'</td>
				<td>'.$row->tipe_produk.'</td>
				<td>'.$row->deskripsi.'</td>
				<td>'.$row->merk.'</td>
				
			</tr>
			';
		}
		$output .= '</table>';
		echo $output;
	}

	function importdepbang()
	{
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
					$kode_jenis_pekj3 = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$kode_sub_jenis_pekj3 = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					
					$kode_jenis_barang3 = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$kode_produk3 = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$nama_produk3 = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$tipe_produk3 = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$deskripsi3 = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$merk3 = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					
					
					$data[] = array(
						'kode_jenis_pekj'		=>	$kode_jenis_pekj3,
						'kode_sub_jenis_pekj'		=>	$kode_sub_jenis_pekj3,
						'kode_jenis_barang'		=> $kode_jenis_barang3,
						
						'kode_produk'		=>	$kode_produk3,
						'nama_produk' 		=> $nama_produk3,
						'tipe_produk' 		=> $tipe_produk3,
						'deskripsi'				=>	$deskripsi3,
						'merk'				=>	$merk3,
						
						'createddate' => $waktusaatini,
						'createdby' =>  $this->session->userdata('nama'),
						
					);
				}
			}
			$this->excel_import_model->insertdepbang($data);
			echo 'Data Imported successfully';
		}	
	}


	//perusahaan alum
	function peralum()
	{
		$this->template->display('masterperusahaan/excel_importperalum');
	}
	
	function fetchperalum()
	{
		$data = $this->excel_import_model->selectperalum();
		$output = '
		<h3 align="center">Total Data - '.$data->num_rows().'</h3>
		<table class="table table-striped table-bordered">
			<tr>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Kode Perusahaan</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Nama Perusahaan</th>
				
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Kode Tipe</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Tipe</th>
				
				
				
				
			</tr>
		';
		foreach($data->result() as $row)
		{
			$output .= '
			<tr>
				<td>'.$row->koper.'</td>
				<td>'.$row->nm_perusahaan.'</td>
				
				<td>'.$row->id_tipe_produk.'</td>
				<td>'.$row->tipe_produk.'</td>
				
				
			</tr>
			';
		}
		$output .= '</table>';
		echo $output;
	}

	function importperalum()
	{
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
					$koper_p = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$nm_perusahaan_p = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					
					$id_tipe_produk_p = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$tipe_produk_p = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					
					
					
					$data[] = array(
						'koper'		=>	$koper_p,
						'nm_perusahaan'		=>	$nm_perusahaan_p,
						
						'id_tipe_produk'				=>	$id_tipe_produk_p,
						'tipe_produk' 		=> $tipe_produk_p,
						
						
						'createdate' => $waktusaatini,
						'createby' =>  $this->session->userdata('nama'),
						
					);
				}
			}
			$this->excel_import_model->insertperalum($data);
			echo 'Data Imported successfully';
		}	
	}


//perusahaan obat
	function perobat()
	{
		$this->template->display('masterperusahaan/excel_importperobat');
	}
	
	function fetchperobat()
	{
		$data = $this->excel_import_model->selectperobat();
		$output = '
		<h3 align="center">Total Data - '.$data->num_rows().'</h3>
		<table class="table table-striped table-bordered">
			<tr>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Kode Perusahaan</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Nama Perusahaan</th>
				
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Kode Tipe</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Tipe</th>
				
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">FOI</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">MOU</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">PKS Renewal</th>
		
				
			</tr>
		';
		
		foreach($data->result() as $row)
		{



	if ($row->foi==1) { $t='v'  ; 
			}
			else if($row->foi==0){  $t='-'  ; 
			
			}
				
			if ($row->mou==1) { $r='v'  ; 
			}
			else if($row->mou==0){ $r='-'  ; 
			
			}	
				
			
						
			$output .= '
			<tr>
				<td>'.$row->koper.'</td>
				<td>'.$row->nm_perusahaan.'</td>
				
				<td>'.$row->id_tipe_produk.'</td>
				<td>'.$row->tipe_produk.'</td>
				
				<td>'.$t.'</td>
		
				<td>'.$r.'</td>
				<td style="text-align:center; "   >'.$row->pks.'</td>
				
				
			</tr>
			';
		}
		$output .= '</table>';
		echo $output;
	}

	function importperobat()
	{
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
					$koper_p = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$nm_perusahaan_p = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					
					$id_tipe_produk_p = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$tipe_produk_p = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$foi_p = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$mou_p = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					
					$pks_p = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					
					
					
					$data[] = array(
						'koper'		=>	$koper_p,
						'nm_perusahaan'		=>	$nm_perusahaan_p,
						
						'id_tipe_produk'				=>	$id_tipe_produk_p,
						'tipe_produk' 		=> $tipe_produk_p,
						
						'foi'				=>	$foi_p,
						'mou' 		=> $mou_p,
						'pks' 		=> $pks_p,
						
						
						'createdate' => $waktusaatini,
						'createby' =>  $this->session->userdata('nama'),
						
					);
				}
			}
			$this->excel_import_model->insertperobat($data);
			echo 'Data Imported successfully';
		}	
	}




//perusahaan distributor obat
	function perdisobat()
	{
		$this->template->display('masterdistributor/excel_importperdisobat');
	}
	
	function fetchperdisobat()
	{
		$data = $this->excel_import_model->selectperdisobat();
		$output = '
		<h3 align="center">Total Data - '.$data->num_rows().'</h3>
		<table class="table table-striped table-bordered">
			<tr>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Kode Distributor</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Nama Distributor</th>
				
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Kode Tipe</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Tipe</th>
				
		
				
			</tr>
		';
		
		foreach($data->result() as $row)
		{
			$output .= '
			<tr>
				<td>'.$row->kodis.'</td>
				<td>'.$row->nm_distributor.'</td>
				
				<td>'.$row->id_tipe_produk.'</td>
				<td>'.$row->tipe_produk.'</td>
				
				
			</tr>
			';
		}
		$output .= '</table>';
		echo $output;
	}

	function importperdisobat()
	{
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
					$kodis_p = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$nm_distributor_p = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					
					$id_tipe_produk_p = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$tipe_produk_p = $worksheet->getCellByColumnAndRow(3, $row)->getValue();

					
					
					
					$data[] = array(
						'kodis'				=>	$kodis_p,
						'nm_distributor' 	=>	$nm_distributor_p,
						
						'id_tipe_produk'	=>	$id_tipe_produk_p,
						'tipe_produk' 		=> $tipe_produk_p,
						
					
						
						'createdate' => $waktusaatini,
						'createby' =>  $this->session->userdata('nama'),
						
					);
				}
			}
			$this->excel_import_model->insertperdisobat($data);
			echo 'Data Imported successfully';
		}	
	}
	



//perusahaan alkes
	function peralkes()
	{
		$this->template->display('masterperusahaan/excel_importperalkes');
	}
	
	function fetchperalkes()
	{
		$data = $this->excel_import_model->selectperalkes();
		$output = '
		<h3 align="center">Total Data - '.$data->num_rows().'</h3>
		<table class="table table-striped table-bordered">
			<tr>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Kode Perusahaan</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Nama Perusahaan</th>
				
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Kode Tipe</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Tipe</th>
				
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Principal</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Solo Agent</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Distributor</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Subdistributor</th>
		
				
			</tr>
		';
		
		foreach($data->result() as $row)
		{

if ($row->principal==1) { $u='v'  ; 
			}
			else if($row->principal==0){  $u='-'  ; 
			
			}
				
			if ($row->solo_agent==1) { $v='v'  ; 
			}
			else if($row->solo_agent==0){ $v='-'  ; 
			
			}

			if ($row->distributor==1) { $w='v'  ; 
			}
			else if($row->distributor==0){  $w='-'  ; 
			
			}
				
			if ($row->subdistributor==1) { $x='v'  ; 
			}
			else if($row->subdistributor==0){ $x='-'  ; 
			
			}		


			
			
			$output .= '
			<tr>
				<td>'.$row->koper.'</td>
				<td>'.$row->nm_perusahaan.'</td>
				
				<td>'.$row->id_tipe_produk.'</td>
				<td>'.$row->tipe_produk.'</td>
				
				<td style="text-align:center;"   >'.$u.'</td>
				<td style="text-align:center;"  >'.$v.'</td>
				<td style="text-align:center;"   >'.$w.'</td>
				<td style="text-align:center;"   >'.$x.'</td>
				
			</tr>
			';
		}
		$output .= '</table>';
		echo $output;
	}

	function importperalkes()
	{
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
					$koper_p = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$nm_perusahaan_p = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					
					$id_tipe_produk_p = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$tipe_produk_p = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$principal_p = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$solo_agent_p = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					
					$distributor_p = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$subdistributor_p = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					
					
					
					$data[] = array(
						'koper'		=>	$koper_p,
						'nm_perusahaan'		=>	$nm_perusahaan_p,
						
						'id_tipe_produk'	=>	$id_tipe_produk_p,
						'tipe_produk' 		=> $tipe_produk_p,
						
						'principal'		=>	$principal_p,
						'solo_agent' 		=> $solo_agent_p,
						'distributor' 		=> $distributor_p,
						'subdistributor'        => $subdistributor_p,
						
						
						'createdate' => $waktusaatini,
						'createby' =>  $this->session->userdata('nama'),
						
					);
				}
			}
			$this->excel_import_model->insertperalkes($data);
			echo 'Data Imported successfully';
		}	
	}













































































}

?>
