<?php

			$pdf = new TPdf('P', 'mm', 'LEGAL', true, 'UTF-8', false);
			//remove header
			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);
			$pdf->SetTitle('memo biaya konsumsi');
			$pdf->SetHeaderMargin(15);
			$pdf->SetTopMargin(15);
			$pdf->setFooterMargin(5);
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
foreach ($memo_dafdir as $md) 
			{
				
			$day=date('D',strtotime($md['tgl_acara']));
				$daylist= array(
					'Sun' => 'Minggu',
					'Mon' => 'Senin',
					'Tue' => 'Selasa',
					'Wed' => 'Rabu',
					'Thu' => 'Kamis',
					'Fri' => 'Jumat',
					'Sat' => 'Sabtu',
					);
					
                $data=date('d m Y',strtotime($md['tgl_acara']));
                $tgl=substr($data,0,2);
                $bulan=ubahbulan(substr($data,3,2));
                $thn=substr($data,6,4);

				foreach ($peserta as $pe) 
			{
				$datas=date('d m Y',strtotime($pe['tgl_memo']));
                $tgll=substr($datas,0,2);
                $bulann=ubahbulan(substr($datas,3,2));
                $thnn=substr($datas,6,4);
			
			}
			
		   
		   //$html='
		    //       <p style="text-align:center;font-size:14px;"><b>MEMORANDUM</b></p> 
		     //       ';
	      // foreach ($memo_dafdir as $md) 
			//{
				
	        $html='<table border="0">
					<tr>
					<td style="text-align:center;font-size:14px;" height="40"><b>MEMORANDUM</b></td>
					</tr>
					<tr>
					<td width="40">Kepada</td>
					<td width="10">:</td>
					<td width="240">Yth. '.$md['kepada'].'</td>
					</tr>
					<tr>
					<td width=40>Dari</td>
					<td width="10">:</td>
					<td width="240">'.$md['dari'].'</td>
					</tr>
					';
			
			
			foreach ($peserta as $pe) 
			{
			
				$html.='
				<tr>
					<td width=40>Tanggal</td>
					<td width="10">:</td>
					<td width="240">'.$tgll.' '.$bulann.' '.$thnn.'</td>										
					</tr>
                    <tr>
					  <td width=40>Perihal</td>
					  <td width="10">:</td>
					  <td width="240" height="20">'.$pe['perihal_acara'].'</td>						
					</tr></table><hr size="50"><br><br><br>';
			}


					
			//$html.='
			//<p align="left">dengan hormat</p>';
			
			//foreach ($memo_dafdir as $me) 
			//{
			//   $html.='
			//	<table align="left">
			//	 <tr> 
			//	   <td>
			//		Sehubungan dengan pelaksanaan '.$me['nm_acara'].' 
			//		yang akan dilaksanakan pada hari Minggu, tanggal '.$me['tgl_acara'].', dengan ini diajukan biaya konsumsi dengan data sebagai berikut :
			//     </td>
			//   </tr>			
			//</table>'<table border="0">
					//<tr>
					//<td>Dengan Hormat</td>
					//</tr>
					//</table>';
			//}
	       
	        $html.='<p align="left">Dengan Hormat,</p>';
		;	
			

	       
	        $html.='<table>
					<tr>
					<td height="40">Sehubungan dengan pelaksanaan '.$md['nm_acara'].' yang akan dilaksanakan pada hari '.$daylist[$day].' , tanggal '.$tgl.' '.$bulan.' '.$thn.' dengan ini diajukan biaya konsumsi dengan data sebagai berikut :</td>
					</tr>
					</table>';
			
					
			
			foreach ($peserta as $p) 
			{
			  $html.='
                       <table border="0">
					<tr>
					<td height="20"><b>I. Konfirmasi Peserta</b></td>
					</tr>
					<tr>
					<td width="40"></td>
					<td width="10">*</td>
					<td width="80">Jumlah Peserta</td>
					<td width="10">:</td>
					<td width="40" align="right">'.$p['jumlah_peserta'].'</td>
					</tr>
					<tr>
					<td width="40"></td>
					<td width=10>*</td>
					<td width="80">Panitia</td>
					<td width="10">:</td>
					<td width="40" align="right"><u>'.$p['panitia'].'</u></td>
					</tr>
					<tr>
					<td width="40"></td>
					<td width=10></td>
					<td width="80" bgcolor="skyblue">Total</td>
					<td width="10" bgcolor="skyblue">:</td>	
					<td width="40" align="right" bgcolor="skyblue">'.$p['total'].'</td>									
					</tr>
                    </table>';
			}
			$html.='<p align="justify"><b>II. Konsumsi</b></p>';
			$total=0;
			$no=0;
			foreach ($konsumsi as $k) 
			{
				$no++;
					$html.='
                      <table border="0">
					<tr>
					<td width="15" height="15"></td>
					<td width="25" height="15"><b>'.$no.'</b></td>
					<td width="128" height="15">'.$k['deskripsi'].'</td>
					<td width="125" height="15" align="right">Rp '.number_format($k['harga']).',- x '.$k['qty'].'</td>
					<td width="197" align="right" height="15"><b>Rp '.number_format($k['total']).',-</b></td>
					</tr>';
					$total=$total+$k['total'];
			}
					$html.='
					<tr>
					<td width="15"></td>
					<td width="25"></td>
					<td width="128" bgcolor="skyblue"><b>Total</b></td>
					<td width="125" bgcolor="skyblue"></td>
					<td width="197" align="right" bgcolor="skyblue"><b>Rp'.number_format($total).',-</b></td>
					</tr>
					<br><br>
					<tr>
					<td width="500" align="justify">Mohon Persetujuan, dan atas perhatiannya diucapkan terima kasih</td>
					</tr>
					</table>';
				//CETAK TTD
		

					$html.='<br><br><br><br>
					<table border="0">
					<tr>
					<td width="200" align="left"></td>
					<td width="200" align="left"></td>
					<td width="200" align="left">Menyetujui,</td>
					<td width="100"> </td>					
					</tr></table>';

					foreach ($formulir as $fm) 
			{

					$html.='
					<table border="0">
					<tr>
					<td width="200" align="left">Kepala '.$fm['bagian'].'</td>
					<td width="200" align="left"></td>
					<td width="200" align="left">Direktur Operasional & Umum</td>
					<td width="100"> </td>					
					</tr></table>';
					

					$html.='
					<table border="0">
					<tr>
						<td width="200"  align="left" style="line-height:80px;"><img src="assets/upload/'.$fm['ttd_mengetahui'].'" width="80px" height="50px"></td>
						<td width="200" align="left"></td>
						<td width="200"  align="left" style="line-height:80px;"><img src="assets/upload/'.$fm['ttd_menyetujui'].'" width="80px" height="50px"></td>
					    <td width="100"> </td>
					</tr> </table>';
					
					$html.='
					<table border="0">
						<tr>
						<td width="200" align="left">'.$fm['mengetahui'].'</td>
						<td width="200" align="left"></td>
						<td width="200" align="left">'.$fm['menyetujui'].'</td>
						<td width="100"> </td>
						</tr>
						</table>';
					}
					
			}
					                              				
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('cetak_permohonan.pdf', 'I');
?>