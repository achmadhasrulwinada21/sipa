<?php
			$pdf = new Tpdf('L', 'mm', 'LEGAL', true, 'UTF-8', false);
			$pdf->setPrintHeader(false);
			$pdf->SetTitle('Laporan E - Katalog Obat');
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

	// foreach ($aprovekadtgl as $row) 
	// 		{
 //                $data=date('d m Y ',strtotime($row['tanggal']));
 //                $tgll=substr($data,0,2);
 //                $bulann=ubahbulan(substr($data,3,2));
 //                $thnn=substr($data,6,4);
 //                $waktusaatini2=date('H:i:s',strtotime($row['tanggal']));
	// 		}

			$html='
			<table border="0" cellspacing="1" cellpadding="2" style="text-align:center;font-weight:bold;font-size:14;">
					<tr>
						<td width="100%" align="center">Laporan E - Katalog Obat<br></td></tr>
          	         </table><br> <hr height="2px"> <b style="margin-bottom:4px;"></b> 
					<br><br>
                     <b>tanggal transaksi <span> : </span>'.$tgll.' '.$bulann.' '.$thnn.'</b>
					<br><br>
					<table border="1" cellspacing="0"  cellpadding="2">
							
				  	  <tr bgcolor="skyblue" style="font-weight:bold;line-height:15px;">
					  <th rowspan="2" width="4%" style="text-align:center; bolt;line-height:15px;" > No </th>              
                      <th rowspan="2" width="15%" style="text-align:center;line-height:15px;"> Prinsipal Farmasi </th>
					  <th rowspan="2" width="20%" style="text-align:center;line-height:15px;"> Distributor </th>       
                      <th colspan="3"  width="28%" style="text-align:center;line-height:15px;"> Harga </th>
					  <th rowspan="2" width="8%" style="text-align:center;line-height:15px;"> F O I </th>
					  <th rowspan="2" width="10%" style="text-align:center;line-height:15px;"> MOU JKN </th>
					  <th rowspan="2" width="10%" style="text-align:center;line-height:15px;"> PKS RENEWAL MMF</th>
					  </tr>
                       <tr bgcolor="skyblue">
                      <th width="7%" style="text-align:center;line-height:15px;"> < = E - Kat </th>
					  <th width="7%" style="text-align:center;line-height:15px;"> = E - Kat (Tayang LKPP) </th>
                      <th width="7%" style="text-align:center;line-height:15px;"> < 10 % E Kat </th>
					  <th width="7%" style="text-align:center;line-height:15px;"> > 10 % E Kat </th>
                       </tr>

                     ';
		
			
			
			$i=0;
                   $total=0;
                   $total1=0;
                   $total2=0;
                   $total3=0;			

          	
			foreach ($cetak_compare_obat as $row) 
			{
				$i++;
				 
				   $total  += $row['harga_kecil_e_cat'];
                   $total1 += $row['harga_sama_e_cat'];
                   $total2 += $row['harga_dibawahten'];
                   $total3 += $row['harga_diataten'];				
				$html.='

					<tr>
						<td width="4%" align="center" style="line-height:15px;">'.$i.'</td>
						<td width="15%" style="line-height:15px;">'.$row['nm_perusahaan'].'</td>
						<td width="20%" align="left" style="line-height:15px;">'.$row['kodis'].'</td>
						<td width="7%" align="center" style="line-height:15px;">'.$row['harga_kecil_e_cat'].'</td>
						<td width="7%" align="center" style="line-height:15px;">'.$row['harga_sama_e_cat'].'</td>
						<td width="7%" align="center" style="line-height:15px;">'.$row['harga_dibawahten'].'</td>
						<td width="7%" align="center" style="line-height:15px;">'.$row['harga_diataten'].'</td>
						<td width="8%" align="center" style="line-height:15px;">'.$row['foi'].'</td>
						<td width="10%" align="center" style="line-height:15px;">'.$row['mou'].'</td>
						<td width="10%" align="center" style="line-height:15px;">'.$row['pks'].'</td>
						
									
						
					</tr>	';	
				
				
		}					
		
					                 $html.='<tr bgcolor="grey">
                                            <td  style="font-size:6,8;line-height:15px;text-align: center;"colspan="3" ><b>JUMLAH</b></td>
                                            <td width="7%" align="center" style="line-height:15px;">'.$total.'</td>
						                    <td width="7%" align="center" style="line-height:15px;">'.$total1.'</td>
											<td width="7%" align="center" style="line-height:15px;">'.$total2.'</td>
											<td width="7%" align="center" style="line-height:15px;">'.$total3.'</td>';
                                                                                           
                                         $html.='<td  colspan="4"></td>
                                            </tr></table>';
                                     
                                      if($total3==0){

                                            $persena=0;
                                                     }else{
                                             $persena=($total/$total3)*100;
                                              }

                                         if($total3==0){

                                            $persenb=0;
                                                     }else{
                                             $persenb=($total1/$total3)*100;
                                              }
                                       if($total3==0){
                                              $persenc=0;
                                                     }else{
                                             $persenc=($total2/$total3)*100;
                                              }
                                        if($total1==0){
                                              $persend=0;
                                                     }else{
                                             $persend=($total3/$total1)*100;
                                              }
 $pdf->writeHTML($html, true, false, true, false, '');
                         $pdf->AddPage('L', 'LEGAL');
                  $html='
		<br><br>
		<b>PERSENTASE(%) :  </b><br><br>
					<table cellspacing="0" bgcolor="white" cellpadding="0" style="line-height:10px;">
					<tr bgcolor="#ffffff" style="font-weight:bold;">
							<th width="200%" align="left">
								<p>(< = E - Kat / > 10 % E Kat)*100%</p>
								<p>(= E - Kat (Tayang LKPP) / lebih besar 10 % E Kat)*100%</p>
								<p>(lebih kecil 10 % E - Kat / lebih besar 10 % E Kat)*100%</p>
								<p>(lebih besar 10 % E Kat / = E - Kat (Tayang LKPP))*100%</p>
						    </th>

					
							<th width="30%" align="left" style="line-height:10px;">
								<p><span> = </span> '.number_format($persena,1).' %</p>
								<p><span> = </span> umber_format($persenb,1).' %</p>
								<p><span> = </span> '.number_format($persenc,1).' %</p>
								<p><span> = </span> '.number_format($persend,1).' %</p>
							</th></tr>
						</table>';
						
										 
					
		
						                                                                                           
                                        
				 
			$html.='<br><br><br><br>
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
			$pdf->Output('Laporan_E_Katalog_Obat.pdf', 'I');
			
?>
