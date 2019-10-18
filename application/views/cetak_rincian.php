<?php


			$pdf = new TPdf('P', 'mm', 'A4', true, 'UTF-8', false);
			//remove header
			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);
			$pdf->SetTitle('Data Cetak Rincian Barang');
			$pdf->SetHeaderMargin(5);
			$pdf->SetTopMargin(5);
			$pdf->setFooterMargin(5);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage();
			$pdf->SetFont('helvetica', '', 9);
			$pdf->Image('assets/upload/hhg-logo.png',10,5,28,28,'PNG', '', 'T', false, 300, '', false, false, 1, false, false, false);
			
			
			foreach ($cetak_rincian as $r) 
			{
		   
		   $html='<br>
				  <table border="0">
					<tr>
					<td style="text-align:center;font-size:18;font-weight:bold;">HERMINA HOSPITAL GROUP</td>
					</tr>
					
					<tr><td></td></tr>
					<tr>
						<td style="text-align:center;font-size:10;">Jl. Selangit Blok B-10 Kav.4 RW.10 Gunung Sahari Selatan Kec. Kemayoran 
						<br>Kota Administrasi Jakarta Pusat - Daerah Khusus Ibukota Jakarta 10610
						<br>Telp: 021 - 2260 2525 | Website: www.herminahospitalgroup.com
						<br></td>
					</tr>
					<tr>
						<td><hr height="2px"/></td>
						<td></td>
					</tr>
					<tr>
						<td style="text-align:left;font-size:10;font-weight:bold;">Formulir L.02</td>
					</tr>
					<tr>
						<td style="text-align:left;font-size:10;font-weight:bold;">PT. MEDIKA LOKA HERMINA</td>
					</tr>
					<tr>
						<td style="text-align:left;font-size:10;">Tanggal Pengajuan : '.date('d-m-y',strtotime($r['tanggal'])).'</td>
					</tr>

				  </table>';
					
		   
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
					
						<table border="1" cellspacing="1" cellpadding="2" style="text-align:center;line-height:32px;">
						<tr style="font-weight:bold;text-align:center;" bgcolor="#A9A9A9">	
							<th width="20" style="text-align:center;line-height:35px;">NO</th>
							<th width="100" style="text-align:center;line-height:35px;">NAMA BARANG</th>
							<th width="50" style="text-align:center;line-height:15px;">JUMLAH UNIT / SATUAN</th>
							<th width="80" style="text-align:center;line-height:11px;">PENGAJUAN BARANG BARU / PENGGANTIAN BARANG LAMA</th>
							<th width="80" style="text-align:center;line-height:13px;">UNTUK RUANGAN / INSTALASI</th>
							<th width="100" style="text-align:center;line-height:35px;">HARGA UNIT</th>
							<th width="100"style="text-align:center;line-height:35px;">TOTAL</th>
						</tr> </thead>';
						}
            $i=0;   
			$qty=0;
			foreach ($cetak_rincian as $row) 
				{
					$i++;
					$html.='
					<tr style="vertical-align:middle;align:center";>
							<td width="20" style="text-align:center;line-height:15px;">'.$i.'</td>
							<td width="100" style="text-align:left;line-height:15px;">'.$row['nama_barang'].'</td>
							<td width="50" style="text-align:center;line-height:15px;">'.$row['jumlah'].' Unit</td>
							<td width="80" style="text-align:left;line-height:15px;">'.$row['kondisi_barang'].'</td>
							<td width="80" style="text-align:left;line-height:15px;">'.$row['instalasi'].'</td>
							<td width="100" style="text-align:left;line-height:15px;">Rp. '.number_format($row['harga'], 0, ".", ".").'</td>
							<td width="100" style="text-align:left;line-height:15px;">Rp. '.number_format($row['grand_total'], 0, ".", ".").'</td>
						</tr>';
						
						$qty=$qty+$row['grand_total'];
				}
				
					$html.='<tr bgcolor="#DCDCDC">
						<td colspan="6" style="text-align:center;font-weight:bold;line-height:25px;">SUB TOTAL</td>
						<td style="text-align:left;font-weight:bold;line-height:25px;">Rp. '.number_format($qty, 0, ".", ".").'</td>
					</tr>';
					$html.='</table>';
					
					
					$html.='<br><br>
					<table border="1">
					<tr>
						<td width="180" style="text-align:center;font-weight:bold;line-height:18px;" height="20">ATAS PERMINTAAN : </td>
						<td width="180" style="text-align:center;font-weight:bold;line-height:18px;">MENGETAHUI : </td>
						<td width="180" style="text-align:center;font-weight:bold;line-height:18px;">MENYETUJUI :</td>
					</tr></table>';

				
					
					foreach ($cetak_ttd as $qw) 
					{
					$html.='
					<table border="1">
					<tr>
						<td width="180" height="60" align="center" style="line-height:80px;"><img src="assets/upload/'.$qw['ttd_mengajukan'].'" width="80px" height="50px"></td>
						<td width="180"> </td>
						<td width="180"  align="center" style="line-height:80px;"><img src="assets/upload/'.$qw['ttd_mengetahui'].'" width="80px" height="50px"></td>
					</tr></table>';
					}
					
					foreach ($cetak_ttd as $qw) 
					{
					$html.='
					<table border="1">
					<tr>
						<td width="180" style="text-align:center;font-weight:bold;">'.$qw['mengajukan'].'</td>
						<td width="180" style="text-align:center;font-weight:bold;"> </td>
						<td width="180" style="text-align:center;font-weight:bold;">'.$qw['mengetahui'].'<br>Direktur Umum & Keuangan HHG</td>
					</tr>
					</table>';
					}
					
					$html.='
					<table border="0">
					<tr><br>
						<td width="530" style="text-align:left;font-weight:bold;">CATATAN : </td>
					</tr>
					<tr>
						<td width="530">UNTUK PENGAJUAN PENGGANTIAN BARANG LAMA</td>
					</tr>
					<tr>
						<td width="530">MAKA TAHUN PENGADAAN BARANG LAMA HARUS DI ISI</td>
					</tr>
					</table>';
				
				
				
				
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('cetak_rincian_barang.pdf', 'I');
?>