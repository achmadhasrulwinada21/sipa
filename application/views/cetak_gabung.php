<?php

			$pdf = new TPdf('P', 'mm', 'A4', true, 'UTF-8', false);
			//remove header
			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);
			$pdf->SetTitle('Data Cetak Formulir Persetujuan');
			$pdf->SetHeaderMargin(5);
			$pdf->SetTopMargin(5);
			$pdf->setFooterMargin(5);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage();
			$pdf->SetFont('helvetica', '', 9);
			$pdf->Image('assets/upload/hhg-logo.png',10,5,28,28,'PNG');
	
foreach ($cetak_detail_barang as $r) 
			{	
				$day=date('D',strtotime($r['tanggal']));
				$daylist=array(
					'Sun' => 'Minggu',
					'Mon' => 'Senin',
					'Tue' => 'Selasa',
					'Wed' => 'Rabu',
					'Thu' => 'Kamis',
					'Fri' => 'Jumat',
					'Sat' => 'Sabtu',
					);
			}
			function ubahbulan($namabln)
			{
				switch($namabln){
				case 1:
				return 'Januari';
				break;
				case 2:
				return 'Februari';
				break;
				case 3:
				return 'Maret';
				break;
				case 4:
				return 'April';
				break;
				case 5:
				return 'Mei';
				break;
				case 6:
				return 'Juni';
				break;
				case 7:
				return 'Juli';
				break;
				case 8:
				return 'Agustus';
				break;
				case 9:
				return 'September';
				break;
				case 10:
				return 'Oktober';
				break;
				case 11:
				return 'November';
				break;
				case 12:
				return 'Desember';
				break;
				default:
				echo $namabln;
				break;
				}
			}
                $data=date('d-m-Y',strtotime($r['tanggal']));
                $tgl=substr($data,0,2);
                $bulan=ubahbulan(substr($data,3,2));
                $thn=substr($data,6,4);
				
				$data=date('d m Y');
                $tgl1=substr($data,0,2);
                $bulan1=ubahbulan(substr($data,3,2));
                $thn1=substr($data,6,4);
			
			foreach ($cetak_detail_barang as $r) 
			{	
		   $html='<br>
				  <table border="0">
					<tr>
					<td style="text-align:center;font-size:18;font-weight:bold;">HERMINA HOSPITAL GROUP</td>
					</tr>
					
					<tr><td></td></tr>
					<tr>
						<td style="text-align:center;font-size:10;">Jl. Selangit Blok B-10 Kav. No.4 RW.10 Kel. Gunung Sahari Selatan  
						<br>Kec. Kemayoran  Jakarta Pusat - Daerah Khusus Ibukota Jakarta 10610
						<br>Telp. (021) 22602525 Fax. (021) 22602888 | Website: www.herminahospitalgroup.com
						<br></td>
					</tr>
					<tr>
						<td><hr height="2px"/></td>
						<td></td>
					</tr>
					<tr>
						<td style="text-align:left;font-size:10;font-weight:bold;">Formulir Persetujuan</td>
					</tr>
					<tr>
						<td style="text-align:left;font-size:10;">Tanggal Pengajuan : '.$daylist[$day].', '.$tgl.' '.$bulan.' '.$thn.'</td>
					</tr>
				  </table>';
					
		   }
				$html.='<br><br>
						<style>
							table thead 
						{
						display: table-header-group;
						}
						</style> <thead>

						<table border="0">
						<tr>
							<td style="text-align:center;font-size:10;font-weight:bold;">FORMULIR PERSETUJUAN DIREKSI GROUP
							<br> ATAS PERMINTAAN ALAT KESEHATAN / ALAT UMUM INVESTASI<br>
							</td>
						</tr>
						</table>
					
						<table border="1" cellspacing="1" cellpadding="2" style="text-align:center;line-height:25px;">
						<tr style="font-weight:bold;text-align:center;" bgcolor="#A9A9A9">	
							<th width="20" style="text-align:center;line-height:28px;">No</th>
							<th width="90" style="text-align:center;line-height:28px;">Nama Barang</th>
							<th width="30" style="text-align:center;line-height:28px;">Qty</th>
							<th width="70" style="text-align:center;line-height:28px;">Harga Satuan</th>
							<th width="35" style="text-align:center;line-height:28px;">Disc %</th>
							<th width="70" style="text-align:center;line-height:28px;">Disc (Nilai)</th>
							<th width="35" style="text-align:center;line-height:15px;">Extra Disc %</th>
							<th width="70" style="text-align:center;line-height:15px;">Extra Disc (Nilai) %</th>
							<th width="35">PPN %</th>
							<th width="80" style="text-align:center;line-height:28px;">TOTAL</th>
						</tr> </thead>';
						
            $i=0;   
			$qty=0;
			foreach ($cetak_detail_barang as $row) 
				{
					$i++;
					$html.='
					<tr style="vertical-align:middle;align:center";>
							<td width="20" style="text-align:center;line-height:15px;">'.$i.'</td>
							<td width="90" style="text-align:left;line-height:15px;">'.$row['nama_barang'].'</td>
							<td width="30" style="text-align:center;line-height:15px;">'.$row['jumlah'].'</td>
							<td width="70" style="text-align:left;line-height:15px;">Rp. '.number_format($row['harga'], 0, ".", ".").'</td>
							<td width="35" style="text-align:center;line-height:15px;">'.number_format($row['discper'], 0, ".", ".").' %</td>
							<td width="70" style="text-align:left;line-height:15px;">Rp. '.number_format($row['discnil'], 0, ".", ".").'</td>
							<td width="35" style="text-align:center;line-height:15px;">'.number_format($row['e_discper'], 0, ".", ".").'  %</td>
							<td width="70" style="text-align:left;line-height:15px;">Rp. '.number_format($row['e_discnil'], 0, ".", ".").'</td>
							<td width="35" style="text-align:center;line-height:15px;">'.number_format($row['ppn'], 0, ".", ".").'  %</td>
							<td width="80" style="text-align:left;line-height:15px;">Rp. '.number_format($row['grand_total'], 0, ".", ".").'</td>
						</tr>';
						
						$qty=$qty+$row['grand_total'];
				}
				
				$html.='<tr bgcolor="#DCDCDC">
						<td colspan="9" style="text-align:center;font-weight:bold;line-height:25px;">SUB TOTAL</td>
						<td style="text-align:left;font-weight:bold;line-height:25px;">Rp. '.number_format($qty, 0, ".", ".").'</td>
					</tr>';
					$html.='</table>';
				
				
				
				foreach ($cetak_formulir_surat as $w) 
				{
					$html.='<br><br>
					<table border="0">
					<tr>
						<td width="100">No. Formulir</td>
						<td width="10"> : </td>
						<td width="200"> '.$w['no_formulir'].'</td>
					</tr>
					<tr>
						<td width="100">Supplier</td>
						<td width="10"> : </td>
						<td width="200"> '.$w['supplier'].'</td>
					</tr>
					<tr>
						<td width="100">Alamat</td>
						<td width="10"> : </td>
						<td width="200"> '.$w['alamat'].'</td>
					</tr>
					<tr>
						<td width="100">Telp</td>
						<td width="10"> : </td>
						<td width="200"> '.$w['no_telp'].'</td>
					</tr>
					<tr>
						<td width="100">Fax</td>
						<td width="10"> : </td>
						<td width="200"> '.$w['fax'].'</td>
					</tr>
					<tr>
						<td width="100">Email</td>
						<td width="10"> : </td>
						<td width="200"> '.$w['email'].'</td>
					</tr>
					<tr>
						<td width="100">Nama Contact Person</td>
						<td width="10"> : </td>
						<td width="200"> '.$w['cp'].'</td>
					</tr>
					<tr>
						<td width="100">No. Hp Contact Person</td>
						<td width="10"> : </td>
						<td width="200"> '.$w['no_hp'].'</td>
					</tr>
					<tr>
						<td width="100">RSIA / RS Hermina Yang Meminta</td>
						<td width="10"> : </td>
						<td width="200"> '.$w['koders'].'</td>
					</tr>
					</table>';
				}

				
					$html.='<br><br>
					<table border="0">
					<tr>
						<td width="350"> </td>
						<td width="200" align="center">Jakarta, '.$tgl1.' '.$bulan1.' '.$thn1.'</td>
					</tr>
					<tr>
						<td width="350"> </td>
						<td width="200" align="center">Mengetahui,</td>
					</tr></table><br><br>';
					
					
					foreach ($cetak_ttd as $qw) 
					{
					$html.='<table border="0">	
					<tr>
						<td width="350"> </td>
						<td width="200" align="center"><img src="assets/upload/'.$qw['ttd_mengetahui'].'" width="100px" heigth="100px"></td>
					</tr>
					</table>';
					}

					$html.='<br>
					<table border="0">	
					<tr>
						<td width="350"> </td>
						<td width="200" align="center">Yulisar Khiat</td>
					</tr>
					<tr>
						<td width="350"> </td>
						<td width="200" align="center">Direktur Umum & Keuangan HHG</td>
					</tr>
					<tr>
						<td width="530">Catatan : </td>
					</tr>
					<tr>
						<td width="530">1. Termasuk Program Pengembangan :</td>
					</tr>
					<tr>
						<td width="530">2. Termasuk Cash Program : SEKERTARIAT HHG</td>
					</tr>
					<tr>
						<td width="530">3. Nilai Transaksi 20 Juta - 100 Juta sudah dibahas dalam rapat Tim Pembelian</td>
					</tr>
					<tr>
						<td width="530">4. Nilai Transaksi > 100 Juta, sudah dibahas dalam rapat Tim Pembelian + Dewan Komisaris</td>
					</tr><br>
					</table>';
				
				
				
				
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('cetak_formulir_persetujuan.pdf', 'I');
?>