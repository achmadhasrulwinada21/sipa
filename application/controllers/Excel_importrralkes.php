<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excel_importrralkes extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('malkesrr');
		$this->load->library('excel');

		if(!$this->session->userdata('u_name')){
		$this->session->set_flashdata("alerts", "<div class='alerts alert-danger'><strong>Sesi Anda Telah Habis, Silahkan login kembali..</strong></div>");
			redirect('dashboard');

		}
	}

	function alkes()
	{
		$id=$this->uri->segment(3);
       
       $data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'prod' => $this->db->get_where('v_listingrrhead',['kode_transaksi'=>$id])->row(),
			 'data_alkes' => $this->malkesrr->Getalkesdetilview("where kode_transaksi='$id'")->result_array(),
			 'alkes' => $this->malkesrr->Getmstproduk("where tipe_produk='TP003' order by nama_produk desc")->result_array(),
			 );


		$this->template->display('alkesrr/alkesrrexcel', $data);
	}
	

	function fetchrrsalkes()
	{
		$this->load->model('malkesrr');
		$data = $this->malkesrr->v_rralkesimport();
		$output = '
		<table class="datatables49 table table-striped table-bordered">
			<tr>				
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Nama Produk</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Harga</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Diskon</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Ppn</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">status katalog</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Garansi</th>	
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Garansi Free</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Persentase ke 1</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Persentase ke 2</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Persentase ke 3</th>	
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Persentase ke 4</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Persentase ke 5</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Status Register</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Biaya Ongkir</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">DP</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Cicilan</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Keterangan</th>
				<th bgcolor="#4682B4" style="text-align:center; font-family: arial; color: white;">Catatan</th>
			</tr>
		';
		$status=0;
		foreach($data as $row)
		{
			
         $ynwa1=$row->stse_kat;
          if($ynwa1=='1'){
            $ynwa1='E KATALOG';
          }else{
            $ynwa1='NON E KATALOG';
          }

           $ynwa2=$row->stsregister;
          if($ynwa2=='1'){
            $ynwa2='Register';
          }else{
            $ynwa2='NON Register';
          }

           $ynwa3=$row->includeongkir;
          if($ynwa3=='1'){
            $ynwa3='Harga termasuk Ongkir';
          }else{
            $ynwa3='Harga tidak termasuk Ongkir';
          }
         
			$output .= '
			<tr>
			    <td>'.$row->nama_produk.'</td>
				<td>'.$row->harga_baru.'</td>
				<td>'.$row->diskon_baru.'</td>
				<td>'.$row->ppn_baru.'</td>
				<td>'.$ynwa1.'</td>
				<td>'.$row->garansi.'</td>
				 <td>'.$row->garansifree.'</td>
				<td>'.$row->persentase1.'</td>
				<td>'.$row->persentase2.'</td>
				<td>'.$row->persentase3.'</td>
				 <td>'.$row->persentase4.'</td>
				<td>'.$row->persentase5.'</td>
				<td>'.$ynwa2.'</td>
				<td>'.$ynwa3.'</td>
				<td>'.$row->dp.'</td>
				<td>'.$row->cicilan.'</td>
				<td>'.$row->ket.'</td>
				<td>'.$row->note.'</td>
			 </tr>
			';
		}
		$output .= '</table>';
		echo $output;
	}

	function importrrsalkes()
	{
		$this->load->model('malkesrr');
		$this->load->library('excel');
		date_default_timezone_set("Asia/Jakarta");
	   $waktusaatini =date("Y-m-d H:i:s");
       $userlog = ($this->session->userdata('nama'));

       $kode_transaksi2=$_POST['kode_transaksi'];
       // $koper=$_POST['koper'];
       // $fee=$_POST['fee'];
       $isi='1';
       //$pembayaran=$_POST['jenis_pembayaran'];
    //    $tahunke1 = $_POST['tahunke1'];
	   // $tahunke2 = $_POST['tahunke2'];
	   // $tahunke3 = $_POST['tahunke3'];
	   // $tahunke4 = $_POST['tahunke4'];
	   // $tahunke5 = $_POST['tahunke5'];

	   $head="UPDATE listingrrhead set  
		                        isi='$isi' 
								WHERE kode_transaksi = '$kode_transaksi2'";
	            $this->db->query($head); 

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
					$kode_produk_a = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$harga_baru_a = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$diskon_baru_a = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$ppn_baru_a = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$stse_kat_a = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$garansi_a = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$garansifree_a = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$persentase1_a = $worksheet->getCellByColumnAndRow(8, $row)->getValue();				
					$persentase2_a = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$persentase3_a = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
					$persentase4_a = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
					$persentase5_a = $worksheet->getCellByColumnAndRow(12, $row)->getValue();	
					$stsregister_a = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
					$includeongkir_a = $worksheet->getCellByColumnAndRow(14, $row)->getValue();				
					$ket_a = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
					$note_a = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
					$dp_a = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
					$cicilan_a = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
				   $tahunke1 = $_POST['tahunke1'];
				   $tahunke2 = $_POST['tahunke2'];
				   $tahunke3 = $_POST['tahunke3'];
				   $tahunke4 = $_POST['tahunke4'];
				   $tahunke5 = $_POST['tahunke5'];
				   $kode_transaksi=$_POST['kode_transaksi'];
			       $koper=$_POST['koper'];
			       $fee=$_POST['fee'];
			       $userlog = ($this->session->userdata('nama'));
					$data[] = array(
						'kode_produk' => $kode_produk_a,
						'harga_baru'	=>	$harga_baru_a,
						'diskon_baru'=>	$diskon_baru_a,	
						'ppn_baru'=>$ppn_baru_a,
						'stse_kat' => $stse_kat_a,
						'garansi'	=>	$garansi_a,
						'garansifree'=>	$garansifree_a,	
						'persentase1'=>$persentase1_a,
						'persentase2'=>$persentase2_a,
						'persentase3'=>$persentase3_a,
						'persentase4'=>$persentase4_a,
						'persentase5'=>$persentase5_a,
						'stsregister'=>$stsregister_a,
						'includeongkir'=>$includeongkir_a,
						'ket'=>$ket_a,
						'note'=>$note_a,
						'kode_transaksi'=>$kode_transaksi,
						'koper'=>$koper,
						'fee'=>$fee,
						'dp'=>$dp_a,
						'cicilan'=>$cicilan_a,
						//'jenis_pembayaran'=>$pembayaran,
						'tahunke1' => $tahunke1,
						'tahunke2' => $tahunke2,
						'tahunke3' => $tahunke3,
						'tahunke4' => $tahunke4,
						'tahunke5' => $tahunke5,
						'createby'=>$userlog,			
					);
			      
	

					}
			}
					
              $this->malkesrr->insertalkesrr($data);
			  echo 'Data Imported successfully';
		
		}

	}
		}

?>
