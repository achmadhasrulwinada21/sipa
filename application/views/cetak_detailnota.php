<?php
			$pdf = new Tpdf('P', 'mm', 'A4', true, 'UTF-8', false);
			$pdf->setPrintHeader(false);
			$pdf->SetTitle('Detail Nota Pembayaran');
			$pdf->SetHeaderMargin(10);
			$pdf->SetTopMargin(10);
			$pdf->setFooterMargin(10);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage('L', 'A4');
			$pdf->SetFont('helvetica', '', 12);			
			$i=0;
			$html='
			<p align="center">RENCANA KENDALI ANGGARAN<br>PROYEK PEMBANGUNAN '.$cetak_detailnota->nama_rs.'</p>
					
					<table border="1" cellspacing="1"  cellpadding="2">
					<tr>	
						<th width="5%" align="center">No</th>
	                    <th width="18%" align="center">Nama Kegiatan</th>
	                    <th width="15%" align="center">Kontraktor</th>
	                    <th width="5%" align="center">PO</th>
	                    <th width="14%" align="center">No GiroCek</th>
	                    <th width="17%" align="center">Rencana Pembayaran</th>
	                    <th width="13%" align="center">Bulan Bayar</th>
	                    <th width="13%" align="center">Keterangan</th>	                
	                </tr>';
						
          	$qty=0; 
			//foreach ($cetaknota as $row) 
			//{
				$i++;				
				$html.='

					<tr>
						<td width="5%" align="center">'.$i.'</td>
						<td width="18%">'.$cetak_detailnota->nama_kegiatan.'</td>
						<td width="15%"  align="left">'.$cetak_detailnota->kontraktor.'</td>
						<td width="5%" align="center">'.$cetak_detailnota->po.'</td>
						<td width="14%" align="center">'.$cetak_detailnota->no_girocek.'</td>
						<td width="17%" align="right">'.number_format ($cetak_detailnota->renc_pembayaran ,2,',','.') .'</td>
						<td width="13%" align="center"> '.date('d-m-Y',strtotime($cetak_detailnota->bulan_dibayar)).'</td>
						<td width="13%" align="left">'.$cetak_detailnota->keterangan.'</td>	
						
					</tr>	';	

				$qty=$qty+$cetak_detailnota->renc_pembayaran;

			//}
			

			$html.='<tr>
						<td colspan ="9"></td>						
					</tr>';
					
			$html.='<tr bgcolor="#DCDCDC">
						
						<td colspan="5" style="text-align:center;font-weight:bold;">Total</td>
						
						<td style="text-align:right;font-weight:bold;">'.number_format ($qty ,2,',','.').'</td>
						<td style="text-align:right;font-weight:bold;">'.number_format ($qty ,2,',','.').'</td>
						<td></td>
						
					</tr>';	
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
			$pdf->Output('Detail_Nota.pdf');
?>