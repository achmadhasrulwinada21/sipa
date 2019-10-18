<?php
			$pdf = new TPdf('P', 'mm', 'A4', true, 'UTF-8', false);
			//remove header
			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);
			$pdf->SetTitle('MEMORANDUM');
			$pdf->SetHeaderMargin(10);
			$pdf->SetTopMargin(10);
			$pdf->setFooterMargin(10);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage();
			$pdf->SetFont('helvetica', '', 10);
			
			
				

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
                $data=date('d m Y',strtotime($cetak_memo->tanggal));
                $tgl=substr($data,0,2);
                $bulan=ubahbulan(substr($data,3,2));
                $thn=substr($data,6,4);
			
			
			$html='

			<table cellspacing="2" bgcolor="white" cellpadding="2">
				<tr bgcolor="#ffffff">
					<th align="left">
					</th>
				</tr>
			</table>';
                 
			$html.='
			<h3 align="center">MEMORANDUM</h3>		
				<table cellspacing="2" bgcolor="white" cellpadding="2" style="line-height:8px;">					
					<tr bgcolor="#ffffff">
						<th width="10%" align="left">
							<p style="font-size:10px;">Kepada</p>
							<p style="font-size:10px;">Dari</p>
							<p style="font-size:10px;">Tanggal</p>
							<p style="font-size:10px;">Perihal</p>
						</th>';
				
			
				$html.='
				
						<th width="80%" align="left" style="line-height:8px;">
							<p style="font-size:10px;"><span> : </span>'.$cetak_memo->tujuan.'</p>
							<p style="font-size:10px;"><span> : </span>'.$cetak_memo->dari.'</p>
							<p style="font-size:10px;"><span> : </span>'.$tgl.' '.$bulan.' '.$thn.'</p>
							<p style="font-size:10px;"><span> : </span>'.$cetak_memo->perihal.'</p>
							<p style="font-size:10px;"><span>   </span>'.$cetak_memo->untuk.'</p><br>
						</th>
					<hr height="2px"/><br>
					</tr>
				</table><br><br>';
				
				$html.='				
				<p style="text-align:left;">Dengan Hormat</p>
                <p style="text-align:left;">'.$cetak_memo->deskripsi.'</p><br>
                <p style="text-align:justify;">Demikian kami sampaikan, atas bantuan dan kerjasamanya kami ucapkan terimakasih<br><br></p>
				';
				              
			
                $html.='<br><br><br><br><br>
					<table border="0">
					<tr>
					<td width="200" align="left">Hormat Kami,</td>
					<td width="100"> </td>
					<td width="200" align="center"></td>
					</tr>
					<tr>
					<td width="200" align="left"><b>Kepala Dep. Penunjang Medis</b></td>
					<td width="100"> </td>
					<td width="200"></td>
					</tr>';						
				
				$html.='</table>
				<br><br><br><br><br><br>
				<table border="0">
						<tr>
						<td width="200" align="left"><b>dr. Endah Malahayati, MARS</b></td>
						<td width="100"> </td>
						<td width="200"></td>
						</tr>
						</table><br>';

			

			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('Memorandum.pdf');
?>