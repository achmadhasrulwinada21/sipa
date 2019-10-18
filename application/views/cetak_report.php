<?php
			$pdf = new Tpdf('P', 'mm', 'A4', true, 'UTF-8', false);
			$pdf->setPrintHeader(false);
			$pdf->SetTitle('Report Invoice');
			$pdf->SetHeaderMargin(10);
			$pdf->SetTopMargin(10);
			$pdf->setFooterMargin(10);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage('L', 'A4');
			$pdf->SetFont('helvetica', '', 10);			
			$i=0;
			$html='
			<p align="left"><b>MANDIRI 1190010151619 - MEDIKALOKA HERMINA</b></p>
					
					<table border="1" cellspacing="1"  cellpadding="2">
					<tr>	
						<th width="12%" align="center">Account No</th>
	                    <th width="9%" align="center">Date</th>
	                    <th width="9%" align="center">Value Date</th>
	                    <th width="16%" align="center">Account No Allias</th>
	                    <th width="22%" align="center">Description</th>
	                    <th width="8%" align="center">Reference No</th>
	                    <th width="5%" align="center">Debit</th>
	                    <th width="8%" align="center">Credit</th>	
	                    <th width="10%" align="center">Balance</th>	                
	                </tr>';
						
          	$qty=0; 
			foreach ($cetak_report as $row) 
			{
				$i++;				
				$html.='

					<tr>
						<td width="12%" align="center">'.$row['no_rek'].'</td>
						<td width="9%" align="center">'.$row['tanggal'].'</td>
						<td width="9%"  align="center">'.$row['val_tanggal'].'</td>
						<td width="16%" align="center">'.$row['atas_nama'].'</td>
						<td width="22%" align="center">'.$row['deskripsi'].'</td>
						<td width="8%" align="center">'.$row['reference_no'].'</td>
						<td width="5%" align="center">'.$row['debit'].'</td>
						<td width="8%" align="center">'.$row['credit'].'</td>	
						<td width="10%" align="center">'.$row['balance'].'</td>
					</tr>	';	

			}
			

	
			$html.='</table>';	

			//$html.='<table cellspacing="2" bgcolor="white" cellpadding="2">
				//<tr bgcolor="#ffffff">
					//<td width="5%" align="center"></td>
					//<td width="18%" align="center"></td>
					//<td width="15%" align="center"></td>
					//<td width="5%" align="center"></td>
					//<td width="10%" align="center"></td>
					//<td width="12%" align="center"></td>
					//<td width="12%" align="right">'.number_format ($qty=$row['renc_pembayaran']-$row['renc_pembayaran'] ,2,',','.').'</td>
					//<td width="13%" align="center"></td>
					///<td width="10%" align="center"></td>	
				//</tr>
			//</table>';

			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('cetak_report.pdf');
?>