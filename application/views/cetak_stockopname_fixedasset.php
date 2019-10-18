<?php

			$pdf = new TPdf('P', 'mm', 'A4', true, 'UTF-8', false);
			//remove header
			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);
			$pdf->SetTitle('Surat Permohonan Stock Opname Fixed Asset');
			$pdf->SetHeaderMargin(5);
			$pdf->SetTopMargin(5);
			$pdf->setFooterMargin(5);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage();
			$pdf->SetFont('helvetica', '', 10);
			$pdf->Image('assets/upload/hhg-logo.png',10,5,28,28,'PNG');

			
			
			
			foreach ($cetak_fa as $r) 
			{

				

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
                
                $data2=date('d m Y',strtotime($r['tgl_dataaset']));
                $tgl2=substr($data2,0,2);
                $bulan2=ubahbulan(substr($data2,3,2));
                $thn2=substr($data2,6,4);

                $data3=date('d m Y',strtotime($r['tgl_stockopname']));
                $tgl3=substr($data3,0,2);
                $bulan3=ubahbulan(substr($data3,3,2));
                $thn3=substr($data3,6,4);

                $data4=date('d m Y',strtotime($r['tgl_analisanilai']));
                $tgl4=substr($data4,0,2);
                $bulan4=ubahbulan(substr($data4,3,2));
                $thn4=substr($data4,6,4);

                $data5=date('d m Y',strtotime($r['tgl_hasil']));
                $tgl5=substr($data5,0,2);
                $bulan5=ubahbulan(substr($data5,3,2));
                $thn5=substr($data5,6,4);

                $data6=date('d m Y',strtotime($r['tgl_koreksi']));
                $tgl6=substr($data6,0,2);
                $bulan6=ubahbulan(substr($data6,3,2));
                $thn6=substr($data6,6,4);

			$html='
			<br>
				<style>
				table thead 
			{
				display: table-header-group;
			}
			</style>
				  <table border="0"><thead>
					<tr>
					<td style="text-align:center;font-size:20;font-weight:bold;">HERMINA HOSPITAL GROUP</td>
					</tr>
					
					<tr><td></td></tr>
					<tr>
						<td style="text-align:center;font-size:10;">Jl. Selangit B-10 Kav 04 RT - RW - Gunung Sahari Selatan Kec. Kemayoran 
						<br>Kota Administrasi Jakarta Pusat 10610
						<br>Website : www.herminahospitalgroup.com
						<br><hr></td>
					</tr></thead></table>
	       ';
	        $html.='
					<table border="0">
					<tr>
					<td width="120">Jakarta, '.$tgl.' '.$bulan.' '.$thn.'</td>
					</tr>
					<br>
					<tr>
					<td width="110">Nomor</td>
					<td width="10">:</td>
					<td width="140">'.$r['no_sp'].'</td>
					</tr>
					<tr>
					<td width=40>Lampiran</td>
					<td width="10">:</td>
					<td width="140">'.$r['lampiran'].'</td>
					</tr>
					<tr>
					<td width=40>Perihal</td>
					<td width="10">:</td>
					<td width="400">Pelaporan Hasil Stock Opname Fixed Asset '.$r['perihal'].'</td>			
					</tr>
					<tr><br>
					<td width=60>Kepada Yth.</td>
					</tr>
					<tr>
					<td width="140">Direktur RS. Hermina</td>
					</tr>
					</table><br>
                 <p style="text-align:left;">Dengan Hormat,</p>
                 <p style="text-align:justify;">Menunjuk kepada SPO No. 011/RUMGA/2015, perihal Pelaksanaan Stock Opname Fixed Asset. Bersama ini kami mengingatkan kepada Tim Stock Opname Fixed Asset RS Anggota HHG untuk melaporkan hasil stock opname fixed asset sebagai berikut :</p>
                 <p style="text-align:justify;">1. Data asset yang digunakan sampai dengan '.$tgl2.' '.$bulan2.' '.$thn2.'.</p>
                 <p style="text-align:justify;">2. Laporan fixed asset harus berasal dari pencatatan modul microlibs dan semua barang 100% hasil barcoding.</p>
                 <p style="text-align:justify;">3. Penanggung jawab ruangan dan petugas fixed asset bertanggung jawab terhadap hasil stock opname fixed asset (sesuai fisik barag).</p>
                 <p style="text-align:justify;">4. Hasil stock opname fixed asset harus ditandatangani oleh penanggung jawab ruangan serta petugas fixed asset paling lambat tanggal '.$tgl3.' '.$bulan3.' '.$thn3.' dan diteruskan untuk disetujui oleh Manajer s/d Direktur RS.</p>
                 <p style="text-align:justify;">5. Hasil stock opname fixed asset beserta analisa nilai fisik fixed asset, nilai buku dan nilai GL yang sudah ditandatangani Direktur agar dilaporkan kepada Departemen Penunjang Umum (peralatan umum) dan Departemen Penunjang Medis (peralatan medis) paling lambat tanggal '.$tgl4.' '.$bulan4.' '.$thn4.'.</p>
                 <p style="text-align:justify;">6. Hasil stock opname fixed asset beserta analisa nilai fisik fixed asset, nilai buku dan nilai GL yang sudah diperiksa dan ditandatangani oleh Departemen Penunjang Umum dan Departemen Penunjang Medis kemudian diserahkan ke Departemen Keuangan paling lambat tanggal '.$tgl5.' '.$bulan5.' '.$thn5.'.</p>
                  <p style="text-align:justify;">7. Departemen Keuangan akan melakukan koreksi atas laporan hasil stock opname paling lambat tanggal '.$tgl6.' '.$bulan6.' '.$thn6.' untuk kemudian akan dilakukan proses persetujuan ke Direksi PT. Medikaloka Hermina (pembuatan SK)</p>
                  <p style="text-align:justify;">Demikian kami disampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</p>
					';

	   		      } 	                                                

				$html.='<br><br><br><br><br>
					<table border="0">
					<tr>
					<td width="200" align="left">Hormat Kami,</td>
					<td width="100"> </td>
					<td width="200" align="center"></td>
					</tr>
					<tr>
					<td width="200" align="left">Direktur Umum dan Operasional</td>
					<td width="100"> </td>
					<td width="200"></td>
					</tr>
					</table>';	

				foreach ($cetak_ttd as $qw) 
					{
					$html.='
					<table border="0">
					<tr>
						
						<td width="200"  align="left" style="line-height:80px;"><img src="assets/upload/'.$qw['ttd_approv'].'" width="80px" height="50px"></td>
					</tr> </table>';
					}	                                                


				$html.='
				<br>
				<table border="0">
						<tr>
						<td width="200" align="left">Yulisar Khiat</td>
						<td width="100"> </td>
						<td width="200"></td>
						</tr>
						<br>
						<tr>
						<td width="200" align="left">Tembusan :</td>
						<td width="100"> </td>
						<td width="200"></td>
						</tr>
						<tr>
						<td width="200" align="left">1. Sekertaris HHG</td>
						<td width="200" align="left">3. Kepada Departemen Penunjang Umum</td>
						<td width="300" align="left">5. Arsip</td>
						<td width="200"></td>
						</tr>
						<tr>
						<td width="200" align="left">2. Direktur Regional I s/d IV</td>
						<td width="200" align="left">4. Kepada Departemen Penunjang Medis</td>
						<td width="200"></td>
						</tr>
						</table><br>';
			

					foreach ($cetak_lampiran as $r) 

			{

			$html.='
			<table border="0">
				  <tr>
				  <th width="20%" align="left">
								<img src="assets/upload/hhg-logo.png" width="100" height="100"/>
	
							</th>
							<td width="70%" style="text-align:center;font-size:20;font-weight:bold;line-height:40px;">HERMINA HOSPITAL GROUP
							<br style="text-align:center;font-size:10;font-weight:normal;">Jl. Selangit B-10 Kav 04 RT - RW - Gunung Sahari Selatan Kec. Kemayoran
						<br style="text-align:center;font-size:10;font-weight:normal;line-height:10px;">Kota Administrasi Jakarta Pusat 10610
						<br style="text-align:center;font-size:10;font-weight:normal;line-height:8px;">Website : www.herminahospitalgroup.com 
						</td>
							</tr>
					 </table>

	       ';

	       
	        $html.='
	        		<hr>
					<table border="0">
					<br>
					<tr>
					<br><br><td width="550" text-align="justify">'.$r['thn_semester'].'<br></td>
					</tr>
					<tr>
					<td width="550" text-align="justify">'.$r['lap_eks'].'<br></td>
					</tr>
					<tr>
					<td width="550" text-align="justify">'.$r['ba_hapus_fa'].'<br></td>										
					</tr>
					<tr>
					<td width="550" text-align="justify">'.$r['ba_hapus_brg'].'<br></td>										
					</tr>
					<tr>
					<td width="550" text-align="justify">'.$r['bk_bsr_gl'].'<br></td>										
					</tr>
					<tr>
					<td width="550" text-align="justify">'.$r['analisa_aktiva'].'<br></td>										
					</tr>
					<tr>
					<td width="550" text-align="justify">'.$r['analisa_atnilai'].'<br></td>										
					</tr>
					<tr>
					<td width="550" text-align="justify">'.$r['analisa_atnilai_gl'].'<br></td>									
					</tr>
					<tr>
					<td width="550" text-align:"justify">'.$r['laporan_at'].'<br></td>									
					</tr>
					<tr>
					<td width="550" text-align="justify">'.$r['lap_perbaikan_brg'].'<br></td>									
					</tr>
					<tr>
					<td width="550" text-align="justify">'.$r['lap_pemeliharaan_brg'].'<br></td>									
					</tr>
					<tr>
					<td width="550" text-align="justify">'.$r['lap_hapus_fa'].'<br></td>									
					</tr>
					<tr>
					<td width="550" text-align="justify">'.$r['jurnal_hapus'].'<br></td>									
					</tr>
					<tr>
					<td width="550" text-align="justify">'.$r['kertas_kerja'].'<br></td>									
					</tr>
					</table><br><br>
   
					';

	   		       } 	

			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('stockopnamefixedasset.pdf', 'I');
?>