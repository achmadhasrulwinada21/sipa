<?php

			$pdf = new TPdf('P', 'mm', 'A4', true, 'UTF-8', false);
			//remove header
			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);
			$pdf->SetTitle('SUKU BUNGA');
			$pdf->SetHeaderMargin(10);
			$pdf->SetTopMargin(10);
			$pdf->setFooterMargin(10);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage();
			$pdf->SetFont('helvetica', '', 10);
			$pdf->Image('assets/upload/hhg-logo.png',10,10,28,28,'PNG');
			
			
			
			foreach ($cetak_bunga as $r) 
			{
				$day=date('D',strtotime($r['tanggal']));
				$daylist=array(
					'Sun' => 'Minggu',
					'Mon' => 'Senin',
					'Tue' => 'Selasa',
					'Wed' => 'Rabu',
					'Thu' => 'Kamis',
					'Fri' => 'Jumat',
					'Sat' => 'Sabtu',
					);
				

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
                $data=date('d m Y',strtotime($r['tanggal']));
                $tgl=substr($data,0,2);
                $bulan=ubahbulan(substr($data,3,2));
                $thn=substr($data,6,4);

			$html='
	<br>
				  <table border="0">
					<tr>
					<td style="text-align:center;font-size:18;font-weight:bold;">HERMINA HOSPITAL GROUP</td>
					</tr>
					
					<tr><td></td></tr>
					<tr>
						<td style="text-align:center;font-size:10;">Jl. Selangit B-10 Kav 04 RT - RW - Gunung Sahari Selatan Kec. Kemayoran 
						<br>Kota Administrasi Jakarta Pusat 10610
						<br>Website : www.herminahospitalgroup.com
						<br></td>
					</tr>
					<tr>
						<td><hr height="2px"/></td>
						<td></td>
					</tr>
					</table>
	    <p style="text-align:right;font-size:10;">Jakarta,'.$tgl.' '.$bulan.' '.$thn.'<br></p>
	       ';
	       
	        $html.='
					<table border="0">
					<tr>
					<td width="110">Nomor</td>
					<td width="10">:</td>
					<td width="140">'.$r['no_surat'].'</td>
					</tr>
					<tr>
					<td width=40>Perihal</td>
					<td width="10">:</td>
					<td width="140">'.$r['perihal'].'</td>
					</tr>
					<tr>
					<td width=40>Lampiran</td>
					<td width="10">:</td>
					<td width="140">'.$r['lampiran'].'</td>										
					</tr>
					<tr><br><br><br>
					<td width=60>Kepada Yth.</td>
					</tr>
					<tr>
					<td width=110>'.$r['tujuan'].'</td>
					</tr>
					<tr>
					<td width=60>'.$r['bank'].'</td>
					</tr>
					<tr>
					<td width=60>Di Tempat</td>
					</tr>
					</table><br><br>
                 <p style="text-align:left;">Dengan Hormat,</p>
                 <p style="text-align:justify;">'.$r['deskripsi'].'</p>
                 <p style="text-align:justify;">Demikian kami sampaikan atas pertimbangan, bantuan dan kerjasamanya, kami mengucapkan Terima Kasih.<br><br></p>
					';

	   		       } 	                        

				$html.='<br><br><br><br><br>
					<table border="0">
					<tr>
					<td width="200" align="left">Hormat Kami,</td>
					<td width="100"> </td>
					<td width="200" align="center"></td>
					</tr></table>';						
				
				foreach ($cetak_ttd as $qw) 
					{
					$html.='
					<table border="0">
					<tr>
						
						<td width="200"  align="left" style="line-height:80px;"><img src="assets/upload/'.$qw['ttd_mengetahui'].'" width="80px" height="50px"></td>
					</tr> </table>';
					}
				
				$html.='
				<table border="0">
						<tr>
						<td width="200" align="left"><u>Yulisar</u></td>
						<td width="100"> </td>
						<td width="200"></td>
						</tr>
						<tr>
						<td width="200" align="left"><b>Direktur Umum dan Operasional</b></td>
						<td width="100"> </td>
						<td width="200"></td>
						</tr>
						<tr>
						<td width="200" align="left">Tembusan :</td>
						<td width="100"> </td>
						<td width="200"></td>
						</tr>
						<tr>
						<td width="200" align="left">Yth. Direktur Utama</td>
						<td width="100"> </td>
						<td width="200"></td>
						</tr>
						<tr>
						<td width="200" align="left">Yth. Kadep Keuangan</td>
						<td width="100"> </td>
						<td width="200"></td>
						</tr>
						</table><br>';
				
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('suku_bunga.pdf', 'I');
?>