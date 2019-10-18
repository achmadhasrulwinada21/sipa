<?php

			$pdf = new TPdf('P', 'mm', 'A4', true, 'UTF-8', false);
			//remove header
			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);
			$pdf->SetTitle('Data Cetak Surat');
			$pdf->SetHeaderMargin(10);
			$pdf->SetTopMargin(10);
			$pdf->setFooterMargin(10);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage();
			$pdf->SetFont('helvetica', '', 10);
			
			
			
			foreach ($cetak_barang as $r) 
			{
			$html='
	<b style="text-align:center;font-size:20;">PT. MEDIKALOKA HERMINA</b>
	<p style="text-align:center;font-size:12;">Jl. Selangit B-10 Kav 04 RT - RW - Gunung Sahari Selatan Kec. Kemayoran <br>Kota Administrasi Jakarta Pusat 10610<br><hr></p>
	    <p style="text-align:right;font-size:10;">Jakarta,'.date('d F Y',strtotime($r['tanggal'])).'</p>
	       ';
	       
	        $html.='<table border="0">
					<tr>
					<td width="110">No. Formulir</td>
					<td width="10">:</td>
					<td width="140">'.$r['no_formulir'].'</td>
					</tr>
					<tr>
					<td width=40>perihal</td>
					<td width="10">:</td>
					<td width="140">'.$r['perihal'].'</td>
					</tr>
					<tr>
					<td width=40>lampiran</td>
					<td width="10">:</td>
					<td width="140">'.$r['lampiran'].'</td>										
					</tr><br><br><br>

					</table><br><br>
                 <p style="text-align:left;">Dengan Hormat,</p>
                 <p style="text-align:justify;">'.$r['pembuka'].'</p>
                 <p style="text-align:justify;">'.$r['isi'].'</p>
                 <p style="text-align:justify;">'.$r['penutup'].'</p>
					';
					
				//CETAK TTD
				
				$html.='
					<table border="0">
					<tr><br><br><br><br><br>
					<td width="30"> </td>
					<td width="200" align="left"></td>
					<td width="100"> </td>
					<td width="200" align="center">Jakarta, '.date('d-m-y').'</td>
					</tr>';

					$html.='
					<table border="0">
					<tr>
					<td width="30"> </td>
					<td width="200" align="left">Hormat Saya,</td>
					<td width="100"> </td>
					<td width="200" align="center">Mengetahui,</td>
					</tr>';
					
					$html.='
					<table border="0">
						<tr><br><br><br><br><br>
						<td width="30"> </td>
						<td width="200" align="left"><p>'.$r['mengajukan'].'</p></td>
						<td width="100"> </td>
						<td width="200" align="center"><p>'.$r['mengetahui'].'</p></td>
						</tr>
						</table>';
					
				
				//END CETAK TTD	

	   		       } 	                        				
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('cetak_formulir.pdf', 'I');
?>