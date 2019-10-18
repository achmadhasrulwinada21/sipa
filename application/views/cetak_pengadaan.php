<?php
			$pdf = new Tpdf('P', 'mm', 'LEGAL', true, 'UTF-8', false);
			$pdf->setPrintHeader(false);
			$pdf->SetTitle('Pengadaan Obat');
			$pdf->SetHeaderMargin(10);
			$pdf->SetTopMargin(10);
			$pdf->setFooterMargin(10);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage('L','LEGAL');
			$pdf->SetFont('helvetica', '', 12);	
			
			

			//cetak judul

			$html='
	<p align="center"style="font-weight:bold;font-size:24px;">PENGADAAN OBAT</p>';

			
					
			$html.='<br>
			
					
					
					<table border="1" cellspacing="1"  cellpadding="2" style = "text-align : center;line-height:20px;">
					<thead>
						<tr style="font-weight:bold;text-align:center;" bgcolor="#A9A9A9">
							<th rowspan="2" width="85" style = "text-align : center;line-height:37px;">Nomor PKS</th>
							<th rowspan="2" width="90" style = "text-align : center;line-height:37px;">RS / PT </th>
							<th rowspan="2" width="80" style = "text-align : center;line-height:37px;">Rekanan</th>
							<th rowspan="2" width="90" style = "text-align : center;line-height:37px;">Tentang</th>
							<th rowspan="2" width="80" style = "text-align : center;line-height:20px;">Tanggal Perjanjian</th>
							<th rowspan="2" width="80" style = "text-align : center;line-height:16px;">Jangka Waktu Perjanjian</th>
							<th rowspan="2" width="80" style = "text-align : center;line-height:23px;">Harga / Diskon</th>
							<th colspan="2" width="240" style = "text-align : center;line-height:32px;">Hak Dan Kewajiban Para Pihak</th>
							<th rowspan="2" width="75" style = "text-align : center;line-height:34px;">PIC</th>
							<th rowspan="2" width="60" style = "text-align : center;line-height:34px;">Status</th>
						</tr>

						<tr style="font-weight:bold;text-align:center;" bgcolor="#A9A9A9">
						<th width="120" align="center",valign ="middle" style = "text-align : center;line-height:20px;">RS / PT</th>
						<th width="120" align="center",valign ="middle" style = "text-align : center;line-height:20px;">Rekanan</th>
					</tr>

					</thead>
						';
						
            
			foreach ($cetak_pengadaan as $row) 
				{
					
					$html .= '<tr style="text-align:center;line-height:11px;font-size:10px; text-align : center;line-height:20px;" >
							 
							<td width="85" style = "text-align : center;line-height:15px;" align="left">'.$row['no_pks'].'</td>
							<td width="90" style = "text-align : center;line-height:15px;" align="left">'.$row['rs'].'</td>
							<td width="80" style = "text-align : center;line-height:15px;" align="left">'.$row['rekanan'].'</td>
							<td width="90" style = "text-align : center;line-height:15px;" align="left">'.($row['tentang']).'</td>
							<td width="80" style = "text-align : center;line-height:15px;" align="center">'.$row['tanggal_perjanjian'].'</td>
							<td width="80" style = "text-align : center;line-height:15px;" align="left">'.($row['jangka_waktu']).'</td>
							<td width="80" style = "text-align : center;line-height:15px;" align="left">'.($row['harga']).'</td>
							<td width="120" style = "text-align : center;line-height:15px;" align="left">'.($row['hak_rs']).'</td>
							<td width="120" style = "text-align : center;line-height:15px;" align="left">'.($row['hak_rekanan']).'</td>
							<td width="75" style = "text-align : center;line-height:15px;" align="left">'.($row['pic']).'</td>
							<td width="60" style = "text-align : center;line-height:15px;" align="center">'.($row['status']).'</td>
						</tr></table>';
						
				}
				
				
				
				//END CETAK TTD
					
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('pengadaan.pdf', 'I');
?>