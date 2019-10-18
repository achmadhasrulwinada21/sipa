<?php
			$pdf = new Tpdf('P', 'mm', 'A4', true, 'UTF-8', false);
			$pdf->setPrintHeader(false);
			$pdf->SetTitle('Detail Rekanan Listrik');
			$pdf->SetHeaderMargin(10);
			$pdf->SetTopMargin(18);
			$pdf->setFooterMargin(10);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage('L', 'A4');
			$pdf->SetFont('helvetica', '', 10);			
			$i=0;
			$html='
			<h1 align="center">DATABASE REKANAN LISTRIK DI HHG</h1>
					
					<table style="font-size:11px;" border="0.5" cellspacing="0"  cellpadding="2">
					<tr>	
						<th bgcolor="#72ff66" width="4%" align="center"><b>NO</b></th>
	                    <th bgcolor="#72ff66" width="17%" align="center"><b>NAMA RUMAH SAKIT</b></th>
	                    <th bgcolor="#72ff66" width="30%" align="center"><b>URAIAN KERJA</b></th>
	                    <th bgcolor="#72ff66" width="10%" align="center"><b>KM MANDIRI</b></th>
	                    <th bgcolor="#72ff66" width="10%" align="center"><b>TRISANDIRA</b></th>
	                    <th bgcolor="#72ff66" width="10%" align="center"><b>TRISAHABAT</b></th>
	                    <th bgcolor="#72ff66" width="10%" align="center"><b>TRIBAS REKA BUANA</b></th>
	                    <th bgcolor="#72ff66" width="10%" align="center"><b>SEKAWAN KONTRINDO</b></th>	                
	                </tr>';
					
			//if ($row != 1)
			//{
				//$row .= "ya";
			//}
					
          	$qty=0; 
			foreach ($cetak_rekanan as $row) 
			{
	
				$i++;				
				$html.='

					<tr>
						<td width="4%" align="center">'.$i.'</td>
						<td width="17%" align="left">'.$row['nm_rs'].'</td>
						<td width="30%" align="left">'.$row['uraian_kerja'].'</td>
						<td width="10%" align="center;">'.$row['km_mandiri'].'</td>
						<td width="10%" align="center">'.$row['trisandira'].'</td>
						<td width="10%" align="center">'.$row['trisahabat'].'</td>
						<td width="10%" align="center">'.$row['tribas_reka_buana'].'</td>
						<td width="10%" align="center">'.$row['sekawan_kontrindo'].'</td>
						
					</tr>	';	

				//$qty=$qty+$row['renc_pembayaran'];

			}
			

			//$html.='<tr>
			//			<td colspan ="9"></td>						
			//		</tr>';
					
			//$html.='<tr bgcolor="#DCDCDC">
						
			//			<td colspan="5" style="text-align:center;font-weight:bold;">Total</td>
						
			//			<td style="text-align:right;font-weight:bold;">'.number_format ($qty ,2,',','.').'</td>
			//			<td style="text-align:right;font-weight:bold;">'.number_format ($qty ,2,',','.').'</td>
			//			<td></td>
						
			//		</tr>';
			$html.='</table>';	

			$html.='<br><br><br><br><br>
					<table border="0">
					<tr>
					<td width="30"> </td>
					<td width="200" align="left">Jakarta, '.date('d-m-y').'</td>
					<td width="100"> </td>
					<td width="200" align="center">Menyetujui,</td>
					</tr>';
					
					$html.='
					<table border="0">
					<tr>
					<td width="30"> </td>
					<td width="200" align="left">Kepala Departemen</td>
					<td width="100"> </td>
					<td width="200" align="center">Direktur Departemen Pembangunan</td>
					</tr>';
					
					
//				$sign = $this->db->get('dtb_rekanan')->result();	
	//			foreach ($sign as $ro) 
		//		{
			//	$html.='</table>
				//<br><br><br><br><br><br>
				//<table border="0">
					//	<tr>
					//	<td width="30"> </td>
					//	<td width="200" align="left"><img src="assets/upload/'.$ro['mengetahui'].'" width="80px" height="50px"></td>
					//	<td width="100"> </td>
					//	<td width="200" align="center"><img src="assets/upload/'.$ro['menyetujui'].'" width="80px" height="50px"></td>
					//	</tr>
					//	</table>';
				//}

				
				
				
				
				
				
				
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
			$pdf->Output('Detail_Rekanan_Listrik.pdf');
?>