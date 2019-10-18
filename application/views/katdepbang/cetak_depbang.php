<?php
			$pdf = new Tpdf('L', 'mm', 'LEGAL', true, 'UTF-8', false);
			$pdf->setPrintHeader(false);
			$pdf->SetTitle('Laporan E - Katalog Depbang');
			$pdf->SetHeaderMargin(10);
			$pdf->SetTopMargin(10);
			$pdf->SetLeftMargin(10);
			$pdf->setFooterMargin(10);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage('L', 'LEGAL');
			$pdf->SetFont('helvetica', '', 8);	
			$pdf->Image('assets/upload/hhg-logo.png',15,2,25,25,'PNG');

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
               
                $data=date('d m Y ');
                $tgl=substr($data,0,2);
                $bulan=ubahbulan(substr($data,3,2));
                $thn=substr($data,6,4);
               	
               	$datas= $data=date('d m Y',strtotime($prod->tanggal));
                $tgll=substr($data,0,2);
                $bulann=ubahbulan(substr($data,3,2));
                $thnn=substr($data,6,4);

		$html='
			<table border="0" cellspacing="1" cellpadding="2" style="text-align:center;font-weight:bold;font-size:14;">
					<tr>
						<td width="100%" align="center">Laporan E - Katalog Depbang<br></td></tr>
          	         </table><br> <hr height="2px"> <b style="margin-bottom:4px;"></b> 
					<br><br>
                     <b>Tanggal Transaksi <span> : </span>'.$tgll.' '.$bulann.' '.$thnn.'</b><br>
                      <b>Rumah Sakit <span> : </span>'.$prod->namars.'</b>
					<br><br>
					<table border="1" cellspacing="0"  cellpadding="2">
							
				  	  <tr bgcolor="skyblue" style="font-weight:bold;line-height:15px;">
					 <th style="vertical-align: middle;text-align: center;">NO</th>
                      <th style="vertical-align: middle;text-align: center;">Perusahaan</th>
                      <th style="vertical-align: middle;text-align: center;">Bidang Pekerjaan</th>
                       <th style="vertical-align: middle;text-align: center;">Sub Jenis Pekerjaan</th>
                        <th style="vertical-align: middle;text-align: center;">Lokasi</th>
                      <th style="vertical-align: middle;text-align: center;">Maincon</th>
                      <th style="vertical-align: middle;text-align: center;">Subcon</th>
                      <th style="vertical-align: middle;text-align: center;">Konsultan</th>
                       <th style="vertical-align: middle;text-align: center;">Keterangan</th>
					 </tr>

                     ';
		
			
			
			$i=0;
                             	
			foreach ($cetak_depbang as $row) 
			{
				$i++;
				 		
				$html.='

					<tr>
			<td style="vertical-align: middle;text-align: center;">'.$i.'</td>
            <td style="vertical-align: middle;text-align: center;">'.$row['nm_perusahaan'].'</td>
            <td style="vertical-align: middle;text-align: center;">'.$row['bidang_pekerjaan'].'</td>
            <td style="vertical-align: middle;text-align: center;">'.$row['nm_sub_jenis_pekerjaan'].'</td>
            <td style="vertical-align: middle;text-align: center;">'.$row['deskripsi'].'</td>
            <td style="vertical-align: middle;text-align: center;">'.$row['maincon'].'</td>
            <td style="vertical-align: middle;text-align: center;">'.$row['subcon'].'</td>
            <td style="vertical-align: middle;text-align: center;">'.$row['konsultan'].'</td>
            <td style="vertical-align: middle;text-align: center;">'.$row['keterangan'].'</td>	</tr>	';	
				
				
		}				
                                                                                           
       $html.='</table>';
                                     
                                     
 $pdf->writeHTML($html, true, false, true, false, '');
                         $pdf->AddPage('L', 'LEGAL');
                  		 
					
		
			$html='<br><br><br><br>
					';

					$html.='
					<table border="0">
					<tr>
					<td width="100" align="left"></td>
					<td width="200" align="left"></td>
					<td width="400"> </td>
					<td width="200" align="left">Jakarta, '.$tgl.' '.$bulan.' '.$thn.'</td>					
					</tr>
                    <tr>
					<td width="100" align="left"></td>
					<td width="200" align="left">Dibuat Oleh,</td>
					<td width="400"> </td>
					<td width="200" align="left">Diperiksa Oleh,</td>					
					</tr>
					</table>';
					
					$html.='
					<table border="0">
					<tr>
						<td width="100" align="left"></td>
						<td width="200"  align="left" style="line-height:80px;"><img src="assets/upload/'.$prod->ttd_satu.'" width="80px" height="50px"></td>';
					
					 $html.='   <td width="400"> </td>
					    <td width="200"  align="left" style="line-height:80px;"><img src="assets/upload/'.$prod->ttd_mengetahui.'" width="80px" height="50px"></td>
					</tr> </table>';
					
					$html.='
					<table border="0">
						<tr>
						<td width="100" align="left"></td>
						<td width="200" align="left">'.$prod->nama_satu.'</td>
						<td width="400"> </td>
						<td width="200" align="left">'.$prod->mengetahui.'</td>
						</tr>
						<tr>
						<td width="100" align="left"></td>
						<td width="200" align="left">'.$prod->jb_satu.'</td>
						<td width="400"> </td>
						<td width="200" align="left">'.$prod->jb_mengetahui.'</td>
						</tr>
						</table><br><br>
										';

					$html.='
					<table border="0">
					<tr>
					<td width="300"> </td>
					<td width="100" align="left"></td>
					<td width="200" align="left"></td>		
					</tr>
                    <tr>
                    <td width="300"> </td>
					<td width="100" align="left"></td>
					<td width="200" align="left">Mengetahui,</td>		
					</tr>
					</table>';
					
					$html.='
					<table border="0">
					<tr>
					<td width="300"> </td>
						<td width="100" align="left"></td>
						<td width="200"  align="left" style="line-height:80px;"><img src="assets/upload/'.$prod->ttd_menyetujui.'" width="80px" height="50px"></td></tr> </table>';
								
					$html.='
					<table border="0">
						<tr>
						<td width="300"> </td>
						<td width="100" align="left"></td>
						<td width="200" align="left">'.$prod->menyetujui.'</td>
						</tr>
						<tr>
						<td width="300"> </td>
						<td width="100" align="left"></td>
						<td width="200" align="left">'.$prod->jb_menyetujui.'</td>
						</tr>
						</table><br><br>
										';
					

			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('Laporan_E_Katalog_Depbang.pdf', 'I');
			
?>