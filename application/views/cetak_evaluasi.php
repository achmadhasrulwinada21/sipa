<?php
			$pdf = new Tpdf('P', 'mm', 'A4', true, 'UTF-8', false);
			$pdf->setPrintHeader(false);
			$pdf->SetTitle('Detail Evaluasi Pekerjaan Rekanan Listrik');
			$pdf->SetHeaderMargin(20);
			$pdf->SetTopMargin(30);
			$pdf->setFooterMargin(20);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage('L', 'A4');
			$pdf->SetFont('helvetica', '', 10);			
			
			foreach ($cetak_evaluasi as $row) 
			{
			$html='
			<p align="center"><b>LAPORAN CETAK EVALUASI PEKERJAAN REKANAN LISTRIK</b></p>
			<p align="center"><b></b></p>					
					<table style="font-size:11px;" border="1" cellspacing="0"  cellpadding="2">
					<tr>	
						<th bgcolor="#72ff66" width="3%" align="center">No</th>
						<th bgcolor="#72ff66" width="18%" align="center">Nama Rumah Sakit</th>
	                    <th bgcolor="#72ff66" width="18%" align="center">Jenias Pekerjaan</th>
	                    <th bgcolor="#72ff66" width="46%" align="center">Keterangan</th>
	                     <th bgcolor="#72ff66" width="14%" align="center">Penanggung Jawab</th>
	                    </tr>';
					}	
          $i=0; 
			foreach ($cetak_evaluasi as $row) 
			{

				$i++;				
				$html.='

					<tr>
						<td width="3%" align="center">'.$i.'</td>
						<td width="18%">'.$row['namars'].'</td>
						<td width="18%" align="center">'.$row['jenis_pek'].'</td>
						<td width="46%"  align="center">'.$row['keterangan'].'</td>
						<td width="14%"  align="center">'.$row['pen_jwb'].'</td>
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

			//$html.='<br><br><br><br><br>
				//	<table border="0">
				//	<tr>
				//	<td width="30"> </td>
				//	<td width="200" align="left">Jakarta, '.date('d-m-y').'</td>
				//	<td width="100"> </td>
				//	<td width="200" align="center">Menyetujui,</td>
				//	</tr>';
					
				//	$html.='
				//	<table border="0">
				//	<tr>
				//	<td width="30"> </td>
				//	<td width="200" align="left">Kepala Departemen</td>
				//	<td width="100"> </td>
				//	<td width="200" align="center">Direktur Departemen Pembangunan</td>
				//	</tr>';
					
			//	$dept = $this->db->get('tbl_dept')->result();
			//	foreach ($dept as $r){
			//	$html.='</table>
			//	<br><br><br><br><br><br>
			//	<table border="0">
				//		<tr>
				//		<td width="30"> </td>
				//		<td width="200" align="left">'.$r->kepala_dept.'</td>
				//		<td width="100"> </td>
				//		<td width="200" align="center">'.$r->direktur.'</td>
				//		</tr>
				//		</table>';
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
			$pdf->Output(''.$row['namars'].'.pdf','I');
?>