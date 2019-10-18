<?php

			$pdf = new TPdf('P', 'mm', 'A4', true, 'UTF-8', false);
			//remove header
			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);
			$pdf->SetTitle('Dafdir');
			$pdf->SetHeaderMargin(10);
			$pdf->SetTopMargin(10);
			$pdf->setFooterMargin(10);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage();
			$pdf->SetFont('helvetica', '', 10);
			$qty=0; 
			$i=0;




					
				
				

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
		foreach ($cetak_daftarhadir as $r)
		{
			$day=date('D',strtotime($r['tanggal_acara']));
				$daylist=array(
					'Sun' => 'Minggu',
					'Mon' => 'Senin',
					'Tue' => 'Selasa',
					'Wed' => 'Rabu',
					'Thu' => 'Kamis',
					'Fri' => 'Jumat',
					'Sat' => 'Sabtu',
					);

                $data=date('d m Y',strtotime($r['tanggal_acara']));
                $tgl=substr($data,0,2);
                $bulan=ubahbulan(substr($data,3,2));
                $thn=substr($data,6,4);

           $data=date('d m Y');
                $tgl1=substr($data,0,2);
                $bulan1=ubahbulan(substr($data,3,2));
                $thn1=substr($data,6,4);
          


	
			
			$html='
	<b style="text-align:center;font-size:20;">DAFTAR RENCANA KEHADIRAN</b>';

			
			$html.='
	<p style="text-align:center;font-size:12;">'.$r['nama_acara'].'<br></p>
	    <p style="text-align:right;font-size:10;">'.$daylist[$day].', '.$tgl.' '.$bulan.' '.$thn.'</p>';

	         
	   
	      $html.='
	<b style="text-align:left;font-size:12;">Transport</b>
			
					<table border="0" cellspacing="1" cellpadding="2">
						<tr><td width="100%" align="center"></td></tr>
										
					</table><br><br><br>
				
					<table border="1" cellspacing="1"  cellpadding="2">
				
						<tr style="font-weight:bold;text-align:center;" bgcolor="#A9A9A9">
							<th width="30">No</th>
							<th width="250">Nama</th>
							<th width="130">Jumlah</th>
							<th width="115">Keterangan</th>
						</tr></table>';
          $qty=0;
          $i=0;
					foreach ($cetak_daftarhadir as $r) {
					$i++;
					
					$html.='<table border="1" cellspacing="1"  cellpadding="2">
					<tr>
							<td width="30" align="center">'.$i.'</td>
							<td width="250" align="left">'.$r['nm_peserta'].'</td>
						<td width="130" align="left"> Rp. '.number_format($r['jumlah_biaya']).'</td>
							<td width="115" align="center">'.$r['keterangan'].'</td>
						</tr></table>';
					$qty=$qty+$r['jumlah_biaya'];	
				}

					$html.='<table border="1" cellspacing="1"  cellpadding="2">
					<tr bgcolor="#DCDCDC">
					<td width="280" colspan="2" style="text-align:center;font-weight:bold;">Total</td>
						<td width="245" colspan="2" style="text-align:left;font-weight:bold;">'.number_format($qty).'</td>
					</tr></table>';
						
					
				//CETAK TTD 
					
					$html.='<br><br><br>
					<table border="0">
					<tr>
					<td width="30"> </td>
					<td width="100" align="left">Jakarta, '.$tgl1.' '.$bulan1.' '.$thn1.'</td>
					<td width="100"> </td>
					<td width="30"> </td>
					</tr></table>';
					 


						$html.='
					<br>
					<br>
					<br>
					<table border="0">
					<tr>
					<td width="30"> </td>
					<td width="200" align="left">Mengetahui,</td>
					<td width="100"> </td>
					<td width="115" align="center">Menyetujui,</td>
					</tr></table>';
					
					foreach ($formulir as $r) 
			{
					

					$html.='
					<br>
					<table border="0">
					<tr>
					<td width="30"> </td>
					<td width="200" align="left">Kepala '.$r['bagian'].'</td>
					<td width="100"> </td>
					<td width="200" align="center">Direktur Umum dan Keuangan</td>
					</tr></table>';
					
					$html.='
					<table border="0">
					<tr><td width="50"> </td>
						
						<td width="200"  align="left" style="line-height:80px;"><img src="assets/upload/'.$r['ttd_mengetahui'].'" width="80px" height="50px"></td>
					
					<td width="150"> </td>
						
						<td width="200"  align="left" style="line-height:80px;"><img src="assets/upload/'.$r['ttd_menyetujui'].'" width="80px" height="50px"></td>
					</tr> </table>';
					}
				
				$html.='
				
				<table border="0">
						<tr>
						<td width="30"> </td>
						<td width="200" align="left"></td>
						<td width="100"> </td>
						<td width="200" align="center"></td>
						</tr>
						</table>';

				
			
				$html.='
				<table border="0">
				
						<tr>
						<td width="30"> </td>
						<td width="200" align="left">'.$r['mengetahui'].'</td>
						<td width="100"> </td>
						<td width="200" align="center">'.$r['menyetujui'].'</td>
						</tr>
						</table>';
					
}
		
				
				//END CETAK TTD

			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('dafdir.pdf', 'I');
?>