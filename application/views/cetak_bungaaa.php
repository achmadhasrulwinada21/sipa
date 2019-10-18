<?php

			$pdf = new TPdf('P', 'mm', 'A4', true, 'UTF-8', false);
			//remove header
			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);
			$pdf->SetTitle(''.$cetak_bungaaa->mengetahuidirekturcheck.'_'.$cetak_bungaaa->no_surat.'');
			$pdf->SetHeaderMargin(10);
			$pdf->SetTopMargin(10);
			$pdf->setFooterMargin(10);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage();
			$pdf->SetFont('helvetica', '', 10);
			$pdf->Image('assets/upload/hhg-logo.png',10,10,28,28,'PNG');
			
			
			
			
				$day=date('D',strtotime($cetak_bungaaa->tanggal));
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
                $data=date('d m Y',strtotime($cetak_bungaaa->tanggal));
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
					<td width="420">'.$cetak_bungaaa->no_surat.'</td>
					</tr>
					<tr>
					<td width=40>Perihal</td>
					<td width="10">:</td>
					<td width="420">'.$cetak_bungaaa->perihal.'</td>
					</tr>
					<tr>
					<td width=40>Lampiran</td>
					<td width="10">:</td>
					<td width="420">'.$cetak_bungaaa->lampiran.'</td>										
					</tr>
					</table>
					<table>
					<tr><br><br><br>
					<td width=150>Kepada Yth.</td>
					</tr>
					<tr>
					<td width=420>'.$cetak_bungaaa->tujuan.'</td>
					</tr>
					<tr>
					<td width=420>'.$cetak_bungaaa->bank.'</td>
					</tr>
					<tr>
					<td width=150>Di Tempat</td>
					</tr>
					</table><br><br>
                 <p style="text-align:left;">Dengan Hormat,</p>
                 <p style="text-align:justify;">Bersama Surat ini kami bermaksud untuk memohon pinjaman uang kepada '.$cetak_bungaaa->bank.'. sebesar Rp.'.number_format ($cetak_bungaaa->pinjaman, 0, ".", ".").'. sesuai dengan mekanisme yang ada, dalam hal ini bersedia untuk mengikuti semua persyaratan yang sudah ditentukan.</p>
                 <p style="text-align:justify;">Demikian kami sampaikan atas pertimbangan, bantuan dan kerjasamanya, kami mengucapkan Terima Kasih.<br><br></p>
					';

	   		        	                        

				$html.='<br><br><br><br><br>
					<table border="0">
					<tr>
					<td width="200" align="left">Hormat Kami,</td>
					<td width="100"> </td>
					<td width="200" align="center"></td>
					</tr></table>';						
				
				
					$html.='
					<table border="0">
					<tr>
						
						<td width="100"  align="left" style="line-height:50px;"><img src="assets/upload/'.$cetak_bungaaa->ttd_mengetahui.'" width="80px" height="50px"></td>
					</tr> 

					</table>';
                   			
				
				$html.='
				<table border="0">
						<tr>
						<td width="110" align="left"><u>'.$cetak_bungaaa->mengetahui.' </u></td><td width="100" align="left">
						  <img src="assets/upload/'.$cetak_bungaaa->paraf.'" width="20px" height="20px"></td>
						<td width="200"></td>
						</tr>
						<tr>
						<td width="200" align="left"><b>'.$cetak_bungaaa->role.'</b></td>
						<td width="100"> </td>
						<td width="200"></td>
						</tr>
						<tr>
						<td width="270" align="left">Tembusan :</td>
						<td width="100"> </td>
						<td width="200"></td>
						</tr>
						<tr>
						<td width="270" align="left">Yth. '.$cetak_bungaaa->tembusan1.'</td>
						<td width="100"> </td>
						<td width="200"></td>
						</tr>
						<tr>
						<td width="270" align="left">Yth. '.$cetak_bungaaa->tembusan2.'</td>
						<td width="100"> </td>
						<td width="200"></td>
						</tr>
						</table><br>';
				
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output(''.$cetak_bungaaa->mengetahuidirekturcheck.'_'.$cetak_bungaaa->no_surat.'.pdf', 'I');
?>