<?php
			$pdf = new Tpdf('P', 'mm', 'LEGAL', true, 'UTF-8', false);
			$pdf->setPrintHeader(false);
			$pdf->SetTitle('Laporan RR-Listing  Alat Umum');
			$pdf->SetHeaderMargin(15);
			$pdf->SetTopMargin(15);
			$pdf->SetLeftMargin(5);
			$pdf->setFooterMargin(10);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage('P', 'LEGAL');
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
                  
                 $datas= $data=date('d m Y',strtotime($cetak_ttd->tanggal));
                $tgll=substr($data,0,2);
                $bulann=ubahbulan(substr($data,3,2));
                $thnn=substr($data,6,4);
               	

			$html='
                          <table border="0" cellspacing="0" cellpadding="1" style="text-align:center;font-weight:bold;font-size:14;">
					<thead>
						<tr>
						<td width="100%" align="center">Laporan RR-Listing  Alat Umum<br></td></tr>
          	          </thead>
                             </table><br> <hr height="2px"> <b style="margin-bottom:4px;"></b> 
					<br><br> 
                             <b>tanggal transaksi <span> : </span>'.$tgll.' '.$bulann.' '.$thnn.'</b><br><br>
			<table border="1" cellspacing="0"  cellpadding="2">
				     <tr bgcolor="skyblue" style="font-weight:bold;line-height:15px;">
					  <th width="6%" style="text-align:center; bolt;line-height:15px;" > No </th>              
                      <th width="60%" style="text-align:center;line-height:15px;"> Perusahaan </th> 
                      <th style="text-align:center;line-height:15px;">JUMLAH PRODUK</th>
					  </tr>
                    ';
		
			
			
			$i=0;
                             	
			foreach ($cetak_alum as $row) 
			{
				$i++;
		
				$html.='

					<tr>
						<td width="6%" align="center" style="line-height:15px;">'.$i.'</td>
						<td width="60%" align="justify" style="line-height:15px;">'.$row['nm_perusahaan'].'</td>
						<td  align="center" style="line-height:15px;">'.$row['jumlah'].'</td>						
					</tr>	';	
				
				
		}			
		$html.='</table>';
                                     
                                      
 $pdf->writeHTML($html, true, false, true, false, '');
                         $pdf->AddPage('P', 'LEGAL');
      $html='<br><br><br><br>
					';

					$html.='
					<table border="0">
					<tr>
					<td width="100" align="left"></td>
					<td width="200" align="left"></td>
					<td width="120"> </td>
					<td width="200" align="left">Jakarta, '.$tgl.' '.$bulan.' '.$thn.'</td>					
					</tr>
                    <tr>
					<td width="100" align="left"></td>
					<td width="200" align="left">Dibuat Oleh,</td>
					<td width="120"> </td>
					<td width="200" align="left">Disetujui Oleh,</td>					
					</tr>
					</table>';
					
					$html.='
					<table border="0">
					<tr>
						<td width="100" align="left"></td>
						<td width="200"  align="left" style="line-height:80px;"><img src="assets/upload/'.$cetak_ttd->ttd_satu.'" width="80px" height="50px"></td>';
					
					 $html.='   <td width="120"> </td>
					    <td width="200"  align="left" style="line-height:80px;"><img src="assets/upload/'.$cetak_ttd->ttd_mengetahui.'" width="80px" height="50px"></td>
					</tr> </table>';
					
					$html.='
					<table border="0">
						<tr>
						<td width="100" align="left"></td>
						<td width="200" align="left">'.$cetak_ttd->nama_satu.'</td>
						<td width="120"> </td>
						<td width="200" align="left">'.$cetak_ttd->mengetahui.'</td>
						</tr>
						<tr>
						<td width="100" align="left"></td>
						<td width="200" align="left">'.$cetak_ttd->jb_satu.'</td>
						<td width="120"> </td>
						<td width="200" align="left">'.$cetak_ttd->jb_mengetahui.'</td>
						</tr>
						</table><br><br><br>
										';

										$html.='
					<table border="0">
					<tr>
					<td width="100" align="left"></td>
					<td width="200" align="left"></td>
					<td width="120"> </td>
					<td width="200" align="left"></td>					
					</tr>
                    <tr>
					<td width="100" align="left"></td>
					<td width="200" align="left">Diperiksa Oleh,</td>
					<td width="120"> </td>
					<td width="200" align="left">Mengetahui</td>					
					</tr>
					</table><br><br><br>';
					
					$html.='
					<table border="0">
					<tr>
						<td width="120" align="left"></td>
						<td width="200"  align="left" style="line-height:80px;"><img src="assets/upload/'.$cetak_ttd->ttd_dua.'" width="80px" height="50px"></td>';
					
					 $html.='   <td width="120"> </td>
					    <td width="200"  align="left" style="line-height:80px;"><img src="assets/upload/'.$cetak_ttd->ttd_menyetujui.'" width="80px" height="50px"></td>
					</tr> </table>';
					
					$html.='
					<table border="0">
						<tr>
						<td width="100" align="left"></td>
						<td width="200" align="left">'.$cetak_ttd->nama_dua.'</td>
						<td width="120"> </td>
						<td width="200" align="left">'.$cetak_ttd->menyetujui.'</td>
						</tr>
						<tr>
						<td width="100" align="left"></td>
						<td width="200" align="left">'.$cetak_ttd->jb_dua.'</td>
						<td width="120"> </td>
						<td width="200" align="left">'.$cetak_ttd->jb_menyetujui.'</td>
						</tr>
						</table><br><br><br>
										';
					

			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('Laporan_RR-Listing__Alat_Umum.pdf', 'I');
			
?>
