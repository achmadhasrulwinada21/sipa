<?php

			$pdf = new TPdf('P', 'mm', 'A4', true, 'UTF-8', false);
			//remove header
			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);
			$pdf->SetTitle('Data Cetak Formulir Surat');
			$pdf->SetHeaderMargin(5);
			$pdf->SetTopMargin(5);
			$pdf->setFooterMargin(5);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage();
			$pdf->SetFont('helvetica', '', 10);
			$pdf->Image('assets/upload/hhg-logo.png',10,5,28,28,'PNG');
			
			
			foreach ($cetak_formulir_surat as $r)
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
                $data=date('d-m-Y',strtotime($r['tanggal']));
                $tgl=substr($data,0,2);
                $bulan=ubahbulan(substr($data,3,2));
                $thn=substr($data,6,4);
				
				$data=date('d m Y');
                $tgl1=substr($data,0,2);
                $bulan1=ubahbulan(substr($data,3,2));
                $thn1=substr($data,6,4);

			
			foreach ($cetak_formulir_surat as $r) 
			{
		   
		   $html='<br>
				  <table border="0">
					<tr>
					<td style="text-align:center;font-size:18;font-weight:bold;">HERMINA HOSPITAL GROUP</td>
					</tr>
					
					<tr><td></td></tr>
					<tr>
						<td style="text-align:center;font-size:10;">Jl. Selangit Blok B-10 Kav. No.4 RW.10 Kel. Gunung Sahari Selatan  
						<br>Kec. Kemayoran  Jakarta Pusat - Daerah Khusus Ibukota Jakarta 10610
						<br>Telp. (021) 22602525 Fax. (021) 22602888 | Website: www.herminahospitalgroup.com
						<br></td>
					</tr>
					<tr>
						<td><hr height="2px"/></td>
						<td></td>
					</tr>
					<tr>
						<td style="text-align:right;font-size:10;">Tanggal Pengajuan : '.date('d-m-Y',strtotime($r['tanggal'])).'</td>
					</tr>
				  </table>';
	       
	        $html.='<table border="0">
					<tr>
					<td width="110">No. Formulir</td>
					<td width="10">:</td>
					<td width="200">'.$r['no_formulir'].'</td>
					</tr>
					<tr>
					<td width=40>perihal</td>
					<td width="10">:</td>
					<td width="200">'.$r['perihal'].'</td>
					</tr>
					<tr>
					<td width=40>lampiran</td>
					<td width="10">:</td>
					<td width="200">'.$r['lampiran'].'</td>										
					</tr><br><br><br>

					</table><br><br>
                 <p style="text-align:left;">Dengan Hormat,</p>
                 <p style="text-align:justify;">'.$r['pembuka'].'</p>
                 <p style="text-align:justify;">'.$r['isi'].'</p>
                 <p style="text-align:justify;">'.$r['penutup'].'</p>
					
					<br>
                 <p style="text-align:left;">Catatan : </p>
                 <p style="text-align:left;">'.$r['catatan'].'</p>
					';
					
				//CETAK TTD
				
				$html.='
					<table border="0">
					<tr><br>
					<td width="30"> </td>
					<td width="200" align="left"></td>
					<td width="100"> </td>
					<td width="200" align="center">Jakarta, '.$tgl1.' '.$bulan1.' '.$thn1.'</td>
					</tr></table>';
					
				}
					
					$html.='
					<table border="0">
					<tr>
						<td width="30"> </td>
						<td width="200" align="left">Hormat Saya,</td>
						<td width="100"> </td>
						<td width="200" align="center">Mengetahui,</td>
					</tr></table>';
					
					foreach ($cetak_ttd as $qw) 
					{
					$html.='
					<table border="0">
					<tr>
						<td width="20"> </td>
						<td width="210"  align="left" style="line-height:80px;"><img src="assets/upload/'.$qw['ttd_mengajukan'].'" width="80px" height="50px"></td>
						<td width="100"> </td>
						<td width="200"  align="center" style="line-height:80px;"><img src="assets/upload/'.$qw['ttd_mengetahui'].'" width="80px" height="50px"></td>
					</tr> </table>';
					}

					foreach ($cetak_formulir_surat as $r) 
					{
					$html.='
					<table border="0">
					<tr>	
						<td width="30"> </td>
						<td width="200" align="left"><p>'.$r['mengajukan'].'</p></td>
						<td width="100"> </td>
						<td width="200" align="center"><p>'.$r['mengetahui'].'</p></td>
						</tr>
						</table>';
		
					}
				
				//END CETAK TTD	
				
				

			// CETAK HALAMAN 2
			$pdf->writeHTML($html, true, false, true, false, '');	
			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);
			$pdf->AddPage('P');
			$pdf->SetHeaderMargin(3);
			$pdf->SetTopMargin(3);
			$pdf->setFooterMargin(3);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetFont('helvetica', '', 9);
			$pdf->Image('assets/upload/hhg-logo.png',10,5,28,28,'PNG');
			
			foreach ($cetak_detail_barang as $r) 
			{	
		   $html='<br>
				  <table border="0">
					<tr>
					<td style="text-align:center;font-size:18;font-weight:bold;">HERMINA HOSPITAL GROUP</td>
					</tr>
					
					<tr><td></td></tr>
					<tr>
						<td style="text-align:center;font-size:10;">Jl. Selangit Blok B-10 Kav. No.4 RW.10 Kel. Gunung Sahari Selatan  
						<br>Kec. Kemayoran  Jakarta Pusat - Daerah Khusus Ibukota Jakarta 10610
						<br>Telp. (021) 22602525 Fax. (021) 22602888 | Website: www.herminahospitalgroup.com
						<br></td>
					</tr>
					<tr>
						<td><hr height="2px"/></td>
						<td></td>
					</tr>
					<tr>
						<td style="text-align:left;font-size:10;font-weight:bold;">Formulir Persetujuan</td>
					</tr>
					<tr>
						<td style="text-align:left;font-size:10;">Tanggal Pengajuan : '.$daylist[$day].', '.$tgl.' '.$bulan.' '.$thn.'</td>
					</tr>
				  </table>';
					
		   }
				$html.='<br><br>
						<style>
							table thead 
						{
						display: table-header-group;
						}
						</style> <thead>

						<table border="0">
						<tr>
							<td style="text-align:center;font-size:10;font-weight:bold;">FORMULIR PERSETUJUAN DIREKSI GROUP
							<br> ATAS PERMINTAAN ALAT KESEHATAN / ALAT UMUM INVESTASI<br>
							</td>
						</tr>
						</table>
					
						<table border="1" cellspacing="1" cellpadding="2" style="text-align:center;line-height:25px;">
						<tr style="font-weight:bold;text-align:center;" bgcolor="#A9A9A9">	
							<th width="20" style="text-align:center;line-height:28px;">No</th>
							<th width="90" style="text-align:center;line-height:28px;">Nama Barang</th>
							<th width="30" style="text-align:center;line-height:28px;">Qty</th>
							<th width="70" style="text-align:center;line-height:28px;">Harga Satuan</th>
							<th width="35" style="text-align:center;line-height:28px;">Disc %</th>
							<th width="70" style="text-align:center;line-height:28px;">Disc (Nilai)</th>
							<th width="35" style="text-align:center;line-height:15px;">Extra Disc %</th>
							<th width="70" style="text-align:center;line-height:15px;">Extra Disc (Nilai) %</th>
							<th width="35">PPN %</th>
							<th width="80" style="text-align:center;line-height:28px;">TOTAL</th>
						</tr> </thead>';
						
            $i=0;   
			$qty=0;
			foreach ($cetak_detail_barang as $row) 
				{
					$i++;
					$html.='
					<tr style="vertical-align:middle;align:center";>
							<td width="20" style="text-align:center;line-height:15px;">'.$i.'</td>
							<td width="90" style="text-align:left;line-height:15px;">'.$row['nama_barang'].'</td>
							<td width="30" style="text-align:center;line-height:15px;">'.$row['jumlah'].'</td>
							<td width="70" style="text-align:left;line-height:15px;">Rp. '.number_format($row['harga'], 0, ".", ".").'</td>
							<td width="35" style="text-align:center;line-height:15px;">'.number_format($row['discper'], 0, ".", ".").' %</td>
							<td width="70" style="text-align:left;line-height:15px;">Rp. '.number_format($row['discnil'], 0, ".", ".").'</td>
							<td width="35" style="text-align:center;line-height:15px;">'.number_format($row['e_discper'], 0, ".", ".").'  %</td>
							<td width="70" style="text-align:left;line-height:15px;">Rp. '.number_format($row['e_discnil'], 0, ".", ".").'</td>
							<td width="35" style="text-align:center;line-height:15px;">'.number_format($row['ppn'], 0, ".", ".").'  %</td>
							<td width="80" style="text-align:left;line-height:15px;">Rp. '.number_format($row['grand_total'], 0, ".", ".").'</td>
						</tr>';
						
						$qty=$qty+$row['grand_total'];
				}
				
				$html.='<tr bgcolor="#DCDCDC">
						<td colspan="9" style="text-align:center;font-weight:bold;line-height:25px;">SUB TOTAL</td>
						<td style="text-align:left;font-weight:bold;line-height:25px;">Rp. '.number_format($qty, 0, ".", ".").'</td>
					</tr>';
					$html.='</table>';
				
				
				
				foreach ($cetak_formulir_surat as $w) 
				{
					$html.='<br><br>
					<table border="0">
					<tr>
						<td width="100">No. Formulir</td>
						<td width="10"> : </td>
						<td width="200"> '.$w['no_formulir'].'</td>
					</tr>
					<tr>
						<td width="100">Supplier</td>
						<td width="10"> : </td>
						<td width="200"> '.$w['supplier'].'</td>
					</tr>
					<tr>
						<td width="100">Alamat</td>
						<td width="10"> : </td>
						<td width="200"> '.$w['alamat'].'</td>
					</tr>
					<tr>
						<td width="100">Telp</td>
						<td width="10"> : </td>
						<td width="200"> '.$w['no_telp'].'</td>
					</tr>
					<tr>
						<td width="100">Fax</td>
						<td width="10"> : </td>
						<td width="200"> '.$w['fax'].'</td>
					</tr>
					<tr>
						<td width="100">Email</td>
						<td width="10"> : </td>
						<td width="200"> '.$w['email'].'</td>
					</tr>
					<tr>
						<td width="100">Nama Contact Person</td>
						<td width="10"> : </td>
						<td width="200"> '.$w['cp'].'</td>
					</tr>
					<tr>
						<td width="100">No. Hp Contact Person</td>
						<td width="10"> : </td>
						<td width="200"> '.$w['no_hp'].'</td>
					</tr>
					<tr>
						<td width="100">RSIA / RS Hermina Yang Meminta</td>
						<td width="10"> : </td>
						<td width="200"> '.$w['koders'].'</td>
					</tr>
					</table>';
				}

				
					$html.='<br><br>
					<table border="0">
					<tr>
						<td width="350"> </td>
						<td width="200" align="center">Jakarta, '.$tgl1.' '.$bulan1.' '.$thn1.'</td>
					</tr>
					<tr>
						<td width="350"> </td>
						<td width="200" align="center">Mengetahui,</td>
					</tr></table>';
					
					
					foreach ($cetak_ttd as $qw) 
					{
					$html.='<table border="0">	
					<tr>
						<td width="350" style="line-height:10px;"> </td>
						<td width="200" style="line-height:5px;" align="center"><img src="assets/upload/'.$qw['ttd_mengetahui'].'" width="60px" heigth="30px"></td>
					</tr>
					</table>';
					}

					$html.='
					<table border="0">	
					<tr>
						<td width="350" style="line-height:5px;"> </td>
						<td width="200" style="line-height:15px;" align="center"><p>'.$qw['mengetahui'].'</p></td>
					</tr>
					<tr>
						<td width="350" style="line-height:5px;"> </td>
						<td width="200" style="line-height:10px;" align="center">(Manager)</td>
					</tr>
					<tr>
						<td width="530">Catatan : </td>
					</tr>
					<tr>
						<td width="530">1. Termasuk Program Pengembangan :</td>
					</tr>
					<tr>
						<td width="530">2. Termasuk Cash Program : SEKERTARIAT HHG</td>
					</tr>
					<tr>
						<td width="530">3. Nilai Transaksi 20 Juta - 100 Juta sudah dibahas dalam rapat Tim Pembelian</td>
					</tr>
					<tr>
						<td width="530">4. Nilai Transaksi > 100 Juta, sudah dibahas dalam rapat Tim Pembelian + Dewan Komisaris</td>
					</tr><br>
					</table>';
			
			
			// CETAK HALAMAN 3
			$pdf->writeHTML($html, true, false, true, false, '');	
			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);
			$pdf->AddPage('P');
			$pdf->SetHeaderMargin(3);
			$pdf->SetTopMargin(3);
			$pdf->setFooterMargin(3);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetFont('helvetica', '', 9);
			$pdf->Image('assets/upload/hhg-logo.png',10,5,28,28,'PNG');
			
			foreach ($cetak_rincian as $r) 
			{
		   
		   $html='<br>
				  <table border="0">
					<tr>
					<td style="text-align:center;font-size:18;font-weight:bold;">HERMINA HOSPITAL GROUP</td>
					</tr>
					
					<tr><td></td></tr>
					<tr>
						<td style="text-align:center;font-size:10;">Jl. Selangit Blok B-10 Kav.4 RW.10 Gunung Sahari Selatan Kec. Kemayoran 
						<br>Kota Administrasi Jakarta Pusat - Daerah Khusus Ibukota Jakarta 10610
						<br>Telp: 021 - 2260 2525 | Website: www.herminahospitalgroup.com
						<br></td>
					</tr>
					<tr>
						<td><hr height="2px"/></td>
						<td></td>
					</tr>
					<tr>
						<td style="text-align:left;font-size:10;font-weight:bold;">Formulir L.02</td>
					</tr>
					<tr>
						<td style="text-align:left;font-size:10;font-weight:bold;">PT. MEDIKA LOKA HERMINA</td>
					</tr>
					<tr>
						<td style="text-align:left;font-size:10;">Tanggal Pengajuan : '.date('d-m-y',strtotime($r['tanggal'])).'</td>
					</tr>

				  </table>';
					
		   
				$html.='<br><br>
						<style>
							table thead 
						{
						display: table-header-group;
						}
						</style> <thead>

						<table border="0">
						<tr>
							<td style="text-align:center;font-size:10;font-weight:bold;">FORMULIR PERSETUJUAN DIREKSI GROUP
							<br> ATAS PERMINTAAN ALAT KESEHATAN / ALAT UMUM INVESTASI<br>
							</td>
						</tr>
						</table>
					
						<table border="1" cellspacing="1" cellpadding="2" style="text-align:center;line-height:32px;">
						<tr style="font-weight:bold;text-align:center;" bgcolor="#A9A9A9">	
							<th width="20" style="text-align:center;line-height:35px;">NO</th>
							<th width="100" style="text-align:center;line-height:35px;">NAMA BARANG</th>
							<th width="50" style="text-align:center;line-height:15px;">JUMLAH UNIT / SATUAN</th>
							<th width="80" style="text-align:center;line-height:11px;">PENGAJUAN BARANG BARU / PENGGANTIAN BARANG LAMA</th>
							<th width="80" style="text-align:center;line-height:13px;">UNTUK RUANGAN / INSTALASI</th>
							<th width="100" style="text-align:center;line-height:35px;">HARGA UNIT</th>
							<th width="100"style="text-align:center;line-height:35px;">TOTAL</th>
						</tr> </thead>';
						}
            $i=0;   
			$qty=0;
			foreach ($cetak_rincian as $row) 
				{
					$i++;
					$html.='
					<tr style="vertical-align:middle;align:center";>
							<td width="20" style="text-align:center;line-height:15px;">'.$i.'</td>
							<td width="100" style="text-align:left;line-height:15px;">'.$row['nama_barang'].'</td>
							<td width="50" style="text-align:center;line-height:15px;">'.$row['jumlah'].' Unit</td>
							<td width="80" style="text-align:left;line-height:15px;">'.$row['kondisi_barang'].'</td>
							<td width="80" style="text-align:left;line-height:15px;">'.$row['instalasi'].'</td>
							<td width="100" style="text-align:left;line-height:15px;">Rp. '.number_format($row['harga'], 0, ".", ".").'</td>
							<td width="100" style="text-align:left;line-height:15px;">Rp. '.number_format($row['grand_total'], 0, ".", ".").'</td>
						</tr>';
						
						$qty=$qty+$row['grand_total'];
				}
				
					$html.='<tr bgcolor="#DCDCDC">
						<td colspan="6" style="text-align:center;font-weight:bold;line-height:25px;">SUB TOTAL</td>
						<td style="text-align:left;font-weight:bold;line-height:25px;">Rp. '.number_format($qty, 0, ".", ".").'</td>
					</tr>';
					$html.='</table>';
					
					
					$html.='<br><br>
					<table border="1">
					<tr>
						<td width="180" style="text-align:center;font-weight:bold;line-height:18px;" height="20">ATAS PERMINTAAN : </td>
						<td width="180" style="text-align:center;font-weight:bold;line-height:18px;">MENGETAHUI : </td>
						<td width="180" style="text-align:center;font-weight:bold;line-height:18px;">MENYETUJUI :</td>
					</tr></table>';

				
					
					foreach ($cetak_ttd as $qw) 
					{
					$html.='
					<table border="1">
					<tr>
						<td width="180" height="60" align="center" style="line-height:80px;"><img src="assets/upload/'.$qw['ttd_mengajukan'].'" width="80px" height="50px"></td>
						<td width="180"  align="center" style="line-height:80px;"><img src="assets/upload/'.$qw['ttd_mengetahui'].'" width="80px" height="50px"></td>
						<td width="180"  align="center" style="line-height:80px;"><img src="assets/upload/'.$qw['ttd_menyetujui'].'" width="80px" height="50px"></td>
					</tr></table>';
					}
					
					foreach ($cetak_ttd as $qw) 
					{
					$html.='
					<table border="1">
					<tr>
						<td width="180" style="text-align:center;font-weight:bold;">'.$qw['mengajukan'].'<br>(Pemohon)</td>
						<td width="180" style="text-align:center;font-weight:bold;">'.$qw['mengetahui'].'<br>(Manager)</td>
						<td width="180" style="text-align:center;font-weight:bold;">'.$qw['menyetujui'].'<br>(Direktur)</td>
					</tr>
					</table>';
					}
					
					$html.='
					<table border="0">
					<tr><br>
						<td width="530" style="text-align:left;font-weight:bold;">CATATAN : </td>
					</tr>
					<tr>
						<td width="530">UNTUK PENGAJUAN PENGGANTIAN BARANG LAMA</td>
					</tr>
					<tr>
						<td width="530">MAKA TAHUN PENGADAAN BARANG LAMA HARUS DI ISI</td>
					</tr>
					</table>';
                        				
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('cetak_formulir.pdf', 'I');
?>