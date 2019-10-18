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
			
				{
				$day=date('D');
				$daylist=array(
					'Sun' => 'Minggu',
					'Mon' => 'Senin',
					'Tue' => 'Selasa',
					'Wed' => 'Rabu',
					'Thu' => 'Kamis',
					'Fri' => 'Jumat',
					'Sat' => 'Sabtu',
					);
				}

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
                $data=date('d m Y',strtotime($cetak_memorandum->tgl_acara));
                $tgl=substr($data,0,2);
                $bulan=ubahbulan(substr($data,3,2));
                $thn=substr($data,6,4);

                  $datas=date('d m Y',strtotime($cetak_memorandum->tgl_memo_dafdir));
                $tgl1=substr($datas,0,2);
                $bulan1=ubahbulan(substr($datas,3,2));
                $thn1=substr($datas,6,4);

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

//---panggil penyebut---
// function penyebut($nilai) {
// 		$nilai = abs($nilai);
// 		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
// 		$temp = "";
// 		if ($nilai < 12) {
// 			$temp = " ". $huruf[$nilai];
// 		} else if ($nilai <20) {
// 			$temp = penyebut($nilai - 10). " belas";
// 		} else if ($nilai < 100) {
// 			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
// 		} else if ($nilai < 200) {
// 			$temp = " seratus" . penyebut($nilai - 100);
// 		} else if ($nilai < 1000) {
// 			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
// 		} else if ($nilai < 2000) {
// 			$temp = " seribu" . penyebut($nilai - 1000);
// 		} else if ($nilai < 1000000) {
// 			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
// 		} else if ($nilai < 1000000000) {
// 			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
// 		} else if ($nilai < 1000000000000) {
// 			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
// 		} else if ($nilai < 1000000000000000) {
// 			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
// 		}     
// 		return $temp;
// 	}


// $angka = $cetak_memorandum->jml_pengeluaran;
//---end---

	// function terbilang($nilai) {
	// 	if($nilai<0) {
	// 		$hasil = "minus ". trim(penyebut($nilai));
	// 	} else {
	// 		$hasil = trim(penyebut($nilai));
	// 	}     		
	// 	return $hasil;
	// }

$angka = $cetak_memorandum->jml_pengeluaran;
//---end---
				

			$html='
	<b style="text-align:center;font-size:20;">MEMORANDUM</b>

	    <p style="text-align:right;font-size:12;"><br></p>
	       ';
	       
	        $html.='
					<table border="1">
					<tr>
					<td width="110">Kepada Yth </td>
					<td width="150">: '.$cetak_memorandum->kepada.'</td>
					<td width="140"></td>
					</tr>
					<tr>
					<td width=40>Dari </td>
					<td width="250">: '.$cetak_memorandum->dari.'</td>          
					<td width="140"></td>
					</tr>
					<tr>
					<td width=40>Tanggal </td>
					<td width="100">: '.$tgl1.' '.$bulan1.' '.$thn1.'</td>
					<td width="140"></td>										
					</tr>
					<tr>
					<td width=40>Perihal</td>
					<td width="250">: '.$cetak_memorandum->perihal.'</td>
					<td width="140"></td>										
					<hr height="2px"/>
					</tr>
					<br>
					<br>
				 <p style="text-align:left;">Dengan Hormat,</p>
                 <p style="text-align:justify;">Sehubungan dengan akan diadakannya '.$cetak_memorandum->nm_acara.' yang akan di  selenggarakan pada : <br></p>
                 <tr>
					<td width=40>Hari / Tanggal </td>
					<td width="150">: '.$daylist[$day].' , '.$tgl.' '.$bulan.' '.$thn.'</td>          
					<td width="140"></td>
					</tr>
					<tr>
					<td width=40>Pukul </td>
					<td width="200">: '.$cetak_memorandum->waktu_acara.'</td>          
					<td width="140"></td>
					</tr>
					<tr>
					<td width=40>Tempat </td>
					<td width="300">: '.$cetak_memorandum->tempat_acara.'</td>          
					<td width="140"></td>
					</tr>
						<br>

					     <p style="text-align:justify;">Mohon pengeluaran insentif untuk undangan '.$cetak_memorandum->nm_acara.' sebesar <b>Rp.'.number_format($cetak_memorandum->jml_pengeluaran, 0, ".", ".").',-</b>
						 ('.terbilang($angka).' Rupiah). (daftar nama terlampir).<br></p>


				





                 <p style="text-align:justify;">Demikian disampaikan, atas Perhatiannya kami mengucapkan Terima Kasih.<br><br></p>
					
				<br>
				<br>
					<table border="0">
					<tr>
					<td width="200" align="left">Hormat Kami,</td>
					<td width="100"> </td>
					<td width="200" align="center"></td>
					</tr></table>';		
				
				$html.='
				
				<table border="0">
					<tr>
						<td width="200" align="left"><b>Sekertaris Departemen</b></td>
						<td width="100"> </td>
						<td width="200"><b>'.$cetak_memorandum->dari.'</b></td>
						</tr>
						
						<tr>
						<td width="200"  align="left" style="line-height:80px;"><img src="assets/upload/'.$cetak_memorandum->ttd_pembuat.'" width="80px" height="50px"></td>
						<td width="100"> </td>
						<td width="200" style="line-height:80px;"><img src="assets/upload/'.$cetak_memorandum->ttd_mengetahui.'" width="80px" height="50px"></td>
						</tr>
						<tr>
						<td width="200" align="left"><u><b>'.$cetak_memorandum->pembuat.'</u></b></td>
						<td width="100"> </td>
						<td width="200" align="left"><u><b>'.$cetak_memorandum->mengetahui.'</u></b></td>
						</tr>
					
						</table><br>';
				
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('memorandum.pdf', 'I');
?>