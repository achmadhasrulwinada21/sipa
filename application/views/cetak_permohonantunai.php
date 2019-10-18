<?php

			$pdf = new TPdf('P', 'mm', 'A4', true, 'UTF-8', false);
			//remove header
			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);
			$pdf->SetTitle('Formulir Permohonan');
			$pdf->SetHeaderMargin(5);
			$pdf->SetTopMargin(5);
			$pdf->setFooterMargin(5);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage();
			$pdf->SetFont('helvetica', '', 10);
			
			
			
				$day=date('D',strtotime($cetak_permohonantunai->tgl_byr));
				$daylist= array(
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

                // $data=date('d m Y',strtotime($cp['tgl_formulir']));
                 $data=date('d m Y',strtotime($cetak_permohonantunai->tgl_byr));
                 $tgl=substr($data,0,2);
                 $bulan=ubahbulan(substr($data,3,2));
                 $thn=substr($data,6,4);

                $data=date('d m Y');
                $tgll=substr($data,0,2);
                $bulann=ubahbulan(substr($data,3,2));
                $thnn=substr($data,6,4);
		   

//---panggil penyebut---
function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10)." Belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." Puluh".penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " Seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100)." Ratus".penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " Seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000)." Ribu".penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000)." Juta".penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000)." Milyar".penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000)." Trilyun".penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}

	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}

$angka = $cetak_permohonantunai->jumlah;
//---end---



		   $html='<br><br><br><br><br>
		           <p style="text-align:left;">'.$cetak_permohonantunai->perihal_formulir.'<br><br></p>

		           <p style="text-align:center;">FORMULIR PERMOHONAN</p> 
		           <p style="text-align:center;">RENCANA PERMINTAAN PEMBAYARAN TUNAI<br><br></p>
				  ';
	       
	        $html.='<table border="0">
					<tr>
					<td width="180" height="20">Bagian</td>
					<td width="10" height="20">:</td>
					<td width="220" height="20">'.$cetak_permohonantunai->bagian.'</td>
					</tr>
					<tr>
					<td width="180" height="20">Untuk Pembayaran</td>
					<td width="10" height="20">:</td>
					<td width="220" height="20">'.$cetak_permohonantunai->untuk_byr.'</td>
					</tr>
					<tr>
					<td width="180" height="20">Jumlah</td>
					<td width="10" height="20">:</td>
					<td width="220" height="20">Rp.'.number_format($cetak_permohonantunai->jumlah).',- <br><br>('.terbilang($angka).' Rupiah) </td>										
					</tr>
					<br>
                    <tr>
					  <td width="180" height="20">Pembayaran Tunai Dibutuhkan tgl</td>
					  <td width="10" height="20">:</td>
					  <td width="220" height="20">'.$daylist[$day].', '.$tgl.' '.$bulan.' '.$thn.'</td>									
					</tr>
					</table><br><br>
                 	';
                 
					
				//CETAK TTD
				
				$html.=' <br><br><br>
					<table border="0">
					<tr><br><br>
					<td width="150" align="left">Jakarta, '.$tgll.' '.$bulann.' '.$thnn.'</td>
					<td width="200" align="left"></td>
					<td width="200" align="left"></td>
					<td width="100"></td>
					</tr>';

					$html.='
					<table border="0">
					<tr>
					<td width="186" align="left">Pemohon,</td>
					<td width="186" align="left">Mengetahui, </td>
					<td width="186" align="left">Menyetujui,</td>
								
					</tr>';
					$html.='
					<table border="1">
					<tr>
					<td width="186" align="left">Manager '.$cetak_permohonantunai->bagian.'</td>
					<td width="186" align="left">Kadep '.$cetak_permohonantunai->bagian.'</td>
					<td width="186" align="left">Direktur Operasional & Umum</td>
					</tr>';
				
					$html.='
					<table border="0">
					<tr>
						
						<td width="186"  align="left" style="line-height:80px;"><img src="assets/upload/'.$cetak_permohonantunai->ttd_pemohon.'" width="80px" height="50px"></td>
						<td width="186"  align="left" style="line-height:80px;"><img src="assets/upload/'.$cetak_permohonantunai->ttd_mengetahui.'" width="80px" height="50px"></td>
						<td width="186"  align="left" style="line-height:80px;"><img src="assets/upload/'.$cetak_permohonantunai->ttd_menyetujui.'" width="80px" height="50px"></td>
					</tr> </table>';
					
					$html.='
					<table border="0">
						<tr>
						<td width="186" align="left">'.$cetak_permohonantunai->pemohon.'</td>
						<td width="186" align="left">'.$cetak_permohonantunai->mengetahui.'</td>
						<td width="186" align="left">'.$cetak_permohonantunai->menyetujui.'</td>
						</tr>
						</table>';
					
				
				//END CETAK TTD	

	   		      	                        				
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('Formulir_Permohonan.pdf', 'I');
?>