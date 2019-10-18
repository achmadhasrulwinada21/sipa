<?php
			$pdf = new Tpdf('P', 'mm', 'A4', true, 'UTF-8', false);
			$pdf->setPrintHeader(false);
			$pdf->SetTitle('Detail Paket Pekerjaan Listrik');
			$pdf->SetHeaderMargin(10);
			$pdf->SetTopMargin(10);
			$pdf->setFooterMargin(10);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage('L', 'A4');
			$pdf->SetFont('helvetica', '', 8);	
			

			foreach ($cetak_pkjlistrik as $row) 
			{
			
			$html='
			<p align="center">Compare Analisa Harga Satuan Pekerjaan<br><b>'.$row['namars'].'(PAKET PEKERJAAN ELEKTRIKAL)</b></p>
					<p></p>
					<table border="1" cellspacing="0"  cellpadding="2">
							
					  <tr>
                      <th width="20" rowspan="2" style="text-align:center;">NO</th>
					  <th bgcolor="yellow" width="53%" colspan="5" style="text-align:center;"> <b>INDEX HHG</b> </th>
					  <th bgcolor="sandybrown" width="15%" colspan="2" style="text-align:center;"> <b>TRI SAHABAT JAYA PRIMA</b> </th>
					  <th bgcolor="red" width="15%" colspan="2" style="text-align:center;"> <b>KM MANDIRI</b> </th>
					  <th bgcolor="yellowgreen" width="15%" colspan="2" style="text-align:center;"> <b>TRISANDIRA</b> </th>
					  </tr>
					  <tr>
					                       
                      <th width="30%"style="text-align:center;">Material</th>
                      <th width="5%" style="text-align:center;">Satuan</th>
					  <th width="3%" style="text-align:center;">Vol</th>
                      <th width="7.5%"style="text-align:center;">Harga</th>
					  <th width="7.5%"style="text-align:center;">Total Harga</th>
					  <th width="7.5%"style="text-align:center;">Harga + Upah (Rp.)</th>
					  <th width="7.5%"style="text-align:center;">Total Harga  (Rp.)</th>
					  <th width="7.5%"style="text-align:center;">Harga + Upah (Rp.)</th>
					  <th width="7.5%"style="text-align:center;">Total Harga  (Rp.)</th>
					  <th width="7.5%"style="text-align:center;">Harga + Upah (Rp.)</th>
					  <th width="7.5%"style="text-align:center;">Total Harga  (Rp.)</th>
                      </tr>';
			}
			
			
			$i=0;
			$qty=$qty2=$qty3=$qty4=0; 	

					
			//if (@$_GET['idpktkrj'] != ''){
				//$GetDetailPktKerja = $row->GetDetailPktKerja(@$_GET['idpktkrj'])->result_array();
				//$query['cetak_pkjlistrik'] = $this->pktKerja->GetDetailPktKerja("select * from tb_paket_pekerjaan where idpktkrj = 'idpktkrj'")->result_array();
			//}else{

          	
			foreach ($cetak_pkjlistrik as $row) 
			{
				$i++;				
				$html.='

					<tr>
						<td width="20" align="center">'.$i.'</td>
						<td width="30%">'.$row['nm_material'].'</td>
						<td width="5%" align="center">'.$row['satuan'].'</td>
						<td width="3%" align="center">'.$row['volume'].'</td>
						<td width="7.5%" align="right">'.number_format ($row['harga'] ,0,',','.').'</td>
						<td width="7.5%" align="right">'.number_format ($row['tot_harga'] ,0,',','.') .'</td>
						<td width="7.5%" align="right">'.number_format ($row['hrg_trisahabat'] ,0,',','.') .'</td>
						<td width="7.5%" align="right">'.number_format ($row['tot_hrg_trisahabat'],0,',','.')  .'</td>
						<td width="7.5%" align="right">'.number_format ($row['hrg_mandiri'],0,',','.')  .'</td>
						<td width="7.5%" align="right">'.number_format ($row['tot_hrg_mandiri'] ,0,',','.') .'</td>
						<td width="7.5%" align="right">'.number_format ($row['hrg_trisandira'] ,0,',','.') .'</td>
						<td width="7.5%" align="right">'.number_format ($row['tot_hrg_trisandira'],0,',','.')  .'</td>							
						
					</tr>	';	

				$qty += $row['tot_harga'];
				$ppn=$qty*0.01;
				$Gttl=$qty+$ppn;
				
				$qty2 += $row['tot_hrg_trisahabat'];
				$ppn2=$qty2*0.01;
				$Gttl2=$qty2+$ppn2;
				
				$qty3 += $row['tot_hrg_mandiri'];
				$ppn3=$qty3*0.01;
				$Gttl3=$qty3+$ppn3;
				
				$qty4 += $row['tot_hrg_trisandira'];
				$ppn4=$qty4*0.01;
				$Gttl4=$qty4+$ppn4;

				
				
				
				
				
		}
			

			$html.='<tr>
						<td colspan ="12" height="10"></td>						
					</tr>';
					
			$html.='<tr bgcolor="">
						
						<td colspan="5" style="text-align:right;font-weight:bold;">Total</td>
						
						<td style="text-align:right;font-weight:bold;">'.number_format ($qty ,0,',','.').'</td>
						<td style="text-align:right;font-weight:bold;">Total </td>
						<td style="text-align:right;font-weight:bold;">'.number_format ($qty2 ,0,',','.').'</td>
						<td style="text-align:right;font-weight:bold;">Total </td>
						<td style="text-align:right;font-weight:bold;">'.number_format ($qty3 ,0,',','.').'</td>
						<td style="text-align:right;font-weight:bold;">Total </td>
						<td style="text-align:right;font-weight:bold;">'.number_format ($qty4 ,0,',','.').'</td>
						
												
					</tr>';	
					
					
			$html.='<tr bgcolor="">
						
						<td colspan="5" style="text-align:right;font-weight:bold;">PPN 10%</td>
						
						<td style="text-align:right;font-weight:bold;">'.number_format ($ppn ,0,',','.').'</td>
						<td style="text-align:right;font-weight:bold;">PPN 10%</td>
						<td style="text-align:right;font-weight:bold;">'.number_format ($ppn2 ,0,',','.').'</td>
						<td style="text-align:right;font-weight:bold;">PPN 10%</td>
						<td style="text-align:right;font-weight:bold;">'.number_format ($ppn3 ,0,',','.').'</td>
						<td style="text-align:right;font-weight:bold;">PPN 10%</td>
						<td style="text-align:right;font-weight:bold;">'.number_format ($ppn4 ,0,',','.').'</td>
						
												
					</tr>';	
					
	
			$html.='<tr bgcolor="">
						
						<td colspan="5" style="text-align:right;font-weight:bold;">Grand Total</td>
						
						<td style="text-align:right;font-weight:bold;" bgcolor="yellow">'.number_format ($Gttl ,0,',','.').'</td>
						<td style="text-align:right;font-weight:bold;">Grand Total </td>
						<td style="text-align:right;font-weight:bold;" bgcolor="sandybrown">'.number_format ($Gttl2 ,0,',','.').'</td>
						<td style="text-align:right;font-weight:bold;">Grand Total </td>
						<td style="text-align:right;font-weight:bold;" bgcolor="red">'.number_format ($Gttl3 ,0,',','.').'</td>
						<td style="text-align:right;font-weight:bold;">Grand Total </td>
						<td style="text-align:right;font-weight:bold;" bgcolor="yellowgreen">'.number_format ($Gttl4 ,0,',','.').'</td>
						
												
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
			//$pdf->Output('namafile.pdf', 'I');
			//$filename = 'Site '.$number.' '.$date.'.pdf';
			$pdf->Output(''.$row['namars'].'.pdf','I');
			//return array($string, $filename);
?>