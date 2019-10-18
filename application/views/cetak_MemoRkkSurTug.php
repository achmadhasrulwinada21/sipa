<?php
			$pdf = new Tpdf('P', 'mm', 'A4', true, 'UTF-8', false);
			$pdf->setPrintHeader(false);
			$pdf->SetTitle('Rencana Kunjungan Kerja');
			$pdf->SetHeaderMargin(10);
			$pdf->SetTopMargin(10);
			$pdf->setFooterMargin(10);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage();
			$pdf->SetFont('helvetica', '', 12);							
			$i=0;
	
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
			
			function bulan($namabln)
		{
		switch($namabln)
		{
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
            foreach ($cetak_renckeg as $row) 
			{
			

			
			$data=date('d m Y',strtotime($row['waktupelaksanaan']));
            $tgl=substr($data,0,2);
            $bulan=bulan(substr($data,3,2));
            $thn=substr($data,6,4);
			
			$data=date('d m Y');
            $tgll=substr($data,0,2);
            $bulann=bulan(substr($data,3,2));
            $thnn=substr($data,6,4);
			}		
			
			
		foreach ($cetak_renckeg as $row) 
			{	
			$i++;
			
			// PRINT MEMO STPD
			$html='
			
			
			
					<p align="center"><font face="Arial" color="black" size="14"> <b> MEMORANDUM </b></font><br></p>
			
			<table border="0" style="line-height:10px;" >
				<tr>				
					<th width="20%" align="left" >
						<p style="font-size:10px;">Kepada Yth.</p>
						<p style="font-size:10px;">     </p>
						<p style="font-size:10px;">Dari</p>
						<p style="font-size:10px;">Hari/Tanggal</p>
						<p style="font-size:10px;">Perihal</p>
						<p style="font-size:10px;">Lampilan</p>
					</th>
					
					<th width="80%" align="left" font-size="10">
						<p style="font-size:10px;"><span> : </span>1. '.$row['kepadayth1'].'</p>
						<p style="font-size:10px;"><span> : </span>2. '.$row['kepadayth2'].' </p>
						<p style="font-size:10px;"><span> : </span>'.$row['daripemohon'].'</p>
						<p style="font-size:10px;"><span> : </span>'.$daylist[$day].', '.$tgll.' '.$bulann.' '.$thnn.'</p>
						<p style="font-size:10px;"><span> : </span>'.$row['perihal'].'</p>
						<p style="font-size:10px;"><span> : </span>'.$row['lampiran'].'</p>
					</th>
				</tr>
			</table>
			<br><hr height="2px" />
			

			<p><font face="Arial" color="black" size="11"> Dengan Hormat,<br><br>&nbsp;Sehubungan dengan adanya rencana kegiatan dalam rangka Operasianalnya '.$row['nmsakit'].', dengan ini mohon dibuatkan SPD untuk nama berikut:</font></p>
			
			<table border="1" cellspacing="1"  cellpadding="2" style="font-size:11;">
				<tr>	
					<th  width="5%" align="center">No</th>		
                    <th  width="30%" align="center">Nama</th>
                    <th width="30%" align="center">Tanggal Pelaksanaan</th>                               	
                   	<th  width="35%" align="center">Kegiatan</th>
                    
	            </tr>

	            <tr>	
					<th  width="5%" align="center">'.$i.'</th>		
                    <th  width="30%" align="center">'.$row['namakaryawanditugaskan'].'</th>
                    <th width="30%" align="center">'.$tgl.' '.$bulan.' '.$thn.'</th>                               	
                   	<th  width="35%" align="">'.$row['namakegiatan'].'</th>
                    
	            </tr>';	 
         	
			$html.='</table>';	

			$html.='
			<p><font face="Arial" color="black" size="11"> Demikian disampaikan, atas perhatian dan kerjasamanya diucapkan terimakasih.</font></p>';

			
			

			$html.='			
					<table border="0" style="font-size:11;">
					<tr>
						<td width="5%"> </td>
						<td width="45%" align="center">Hormat kami,</td>
						<td width="45%" align="center">Mengetahui</td>
						<td width="5%"> </td>
					
					</tr>
					</table>';

			$html.='
					<table border="0" style="font-size:9;">
						<tr>
							<td width="5%"> </td>
							<td width="45%" align="center">Kepala Departemen TI</td>					
							<td width="45%" align="center">Direktur Umum dan Operasional PT MH Tbk</td>
							<td width="5%"> </td>
						</tr>
					</table>';

			$html.='<br><br><br><br>
					<table border="0" style="font-size:11;">
						<tr>
							<td width="5%"> </td>
							<td width="45%" align="center">Hastiyudo Wibowo</td>					
							<td width="45%" align="center"> Yulisar</td>
							<td width="5%"> </td>
						</tr>
					</table>';
			$pdf->writeHTML($html, true, false, true, false, '');
			
			
			// CETAK RKK
			$pdf->AddPage('L','A4');
			$pdf->SetFont('helvetica', '', 12);
			
			
			$html='
			
			<table border="1" cellspacing="1" cellpadding="2" style="font-size:11;">

				<tr>
					<td align="center"> RENCANA KEGIATAN IMPLEMENTASI '.$row['nmsakit'].'</td>
				</tr>';
				
							
				$html.='				
				<tr>	
					<th width="35%" align="">NAMA PROJECT / PROGRAM</th>		
                    <th width="65%" align="">'.$row['namaproject'].'</th>
	            </tr>

	            <tr>
					<th width="35%" align="">Nama Rumah Sakit</th>		
                    <th width="65%" align="">'.$row['nmsakit'].'</th>                                     
	            </tr>

	            <tr>
					<th width="35%" align="">Departemen</th>		
                    <th width="65%" align="">'.$row['nama_role'].'</th>                                     
	            </tr>

	            <tr>
					<th width="35%" align="">Waktu Pelaksanaan</th>		
                    <th width="65%" align=""> '.$tgl.' '.$bulan.' '.$thn.'</th>                                     
	            </tr>

	            <tr>
					<th width="35%" align="">Nama PIC</th>		
                    <th width="65%" align="">'.$row['namapic'].'</th>                                     
	            </tr>

	            <tr>
					<th width="35%" align="">Nama Karyawan yang bertugas</th>		
                    <th width="65%" align="">'.$row['namakaryawanditugaskan'].'</th>                                     
	            </tr>
	            
	            <tr>
					<th width="35%" align="">Nama Kegiatan</th>		
                    <th width="65%" align="">'.$row['namakegiatan'].'</th>                                     
	            </tr>

	            <tr>
					<th width="35%" align="">Sarana dan Prasarana yang diperlukan</th>		
                    <th width="65%" align="">'.$row['saranadanprasarana'].' </th>                                     
	            </tr>
	            
	            <tr>
					<th width="35%" align="">Target Kegiatan</th>		
                    <th width="65%" align="">'.$row['targetkegiatan'].'</th>                                     
	            </tr>

	            <tr>
					<th width="100%" align=""></th>		
	            </tr>
	        	           
	            <tr>
					 <th width="60%" align="center">TAHAPAN KEGIATAN</th>			  
					 <th width="40%" align="center">KEADAAN DILAPANGAN</th>           
	            </tr>

	            <tr>
					<th width="15.4%" align="center">WAKTU</th>			  
					<th width="20.5%" align="center">JENIS KEGIATAN</th>           					
					<th width="23.7%" align="center">URAIAN KEGIATAN</th>
					<th width="13.2%" align="center">KENDALA</th>
					<th width="13.2%" align="center">SOLUSI</th>
					<th width="13.3%" align="center">OUTPUT AKHIR</th>
	            </tr>

	            <tr>
					<th width="15.4%" align="center"> '.$tgl.' '.$bulan.' '.$thn.'</th>		
                    <th width="20.5%" align="">'.$row['namakegiatan'].'</th>                    
                    <th width="23.7%" align="">'.$row['targeturaian'].'</th>
                    <th width="13.2%" align="center">'.$row['kendala'].'</th>
                    <th width="13.2%" align="center">'.$row['solusi'].'</th>
                    <th width="13.3%" align="center">'.$row['hasilkegiatan'].'</th>
	            </tr>

	            ';	 
						
          	
				$html.='</table>';				
			}
				

				$html.='<br><br><br><br><br><br>					
					<table border="0" style="font-size:11;">
					<tr>
						<td width="2%"> </td>
						<td width="48%" align="center">Jakarta, '.$tgl.' '.$bulan.' '.$thn.'</td>
						<td width="48%" align="center">Mengetahui</td>
						<td width="2%"> </td>
					</tr>
					</table>';

			$html.='
					<table border="0" style="font-size:11;">
						<tr>
							<td width="2%"> </td>
							<td width="48%" align="center">Kepala Departemen TI</td>
							<td width="48%" align="center">Direktur Umum dan Operasional PT MH Tbk</td>
							<td width="2%"> </td>
						</tr>
					</table>';

			$html.='<br><br><br><br>
					<table border="0" style="font-size:11;">
						<tr>
							<td width="2%"> </td>
							<td width="48%" align="center">Hastiyudo Wibowo</td>			
							<td width="48%" align="center"> Yulisar</td>
							<td width="2%"> </td>
						</tr>
					</table>';
			$pdf->writeHTML($html, true, false, true, false, '');		
			

					
			
			// CETAK SURAT TUGAS
			$pdf->AddPage('P');
			$pdf->SetFont('helvetica', '', 12);
			
			$html='
			<table border="0">
				<tr>
					<th width="20%" align="left">
						<img src="assets/upload/hhg-logo.png" width="100" height="100"/>	
					</th>
						<td width="70%" style="text-align:center;font-size:20;font-weight:bold;line-height:40px;">PT. MEDIKALOKA HERMINA
							<br style="text-align:center;font-size:10;font-weight:normal;">Jl. Raya Jatinegara Barat No. 126, Jatinegara, Jakarta Timur 13320
							<br style="text-align:center;font-size:10;font-weight:normal;line-height:10px;">Telp. 021-8191223, 8513838 (Hunting) Fax. 021.8560601
							<br style="text-align:center;font-size:10;font-weight:normal;line-height:8px;">Website : www.herminahospitalgroup.com 
						</td>
				</tr>
			</table>
			<hr height="2px"/>';
			
			
			
			foreach ($cetaksurgase as $tr) 
			{			
				$html.='<p align="center"><font face="Arial" color="black" size="10"><b> SURAT TUGAS <br>Nomor : '.$tr['nosurat'].' </b></font></p>';
			}

			$html.='<p><font face="Arial" color="black" size="10"> Yang bertanda tangan dibawah ini: </font></p>';
					
			$html.='<table border="0" style="line-height:10px;" >
				<tr>				
					<th width="20%" align="left" >
						<p style="font-size:10px;">Nama</p>
						<p style="font-size:10px;">Jabatan</p>
					</th>
					
					';
					
			foreach ($cetaksurgase as $tr) {
					
			$html.='
			
			<th width="80%" align="left" font-size="10">
						<p style="font-size:10px;"><span> : </span> '.$tr['namasekretaris'].'</p>
						<p style="font-size:10px;"><span> : </span> '.$tr['jabatansekretaris'].'</p>
					</th>
				</tr>
			</table>';
			}
						
			$html.='<p><font face="Arial" color="black" size="10"> Menugaskan kepada: </font></p>';
			
			$html.='<table border="0" style="line-height:10px;">
				<tr>				
					<th width="20%" align="left">
						<p style="font-size:10px;">Nama / NRP</p>
						<p style="font-size:10px;">Jabatan</p>
						<p style="font-size:10px;">Waktu Tugas</p>
						<p style="font-size:10px;">Tujuan / Tempat</p>
						<p style="font-size:10px;">Dasar Penugasan</p>
						<p style="font-size:10px;">Kegiatan Penugasan</p>
					</th>';
					
					foreach ($cetaksurgase as $tr) {
			
			$html.='<th width="80%" align="left">
						<p style="font-size:10px;"><span> : </span> '.$tr['namakadep'].' </p>
						<p style="font-size:10px;"><span> : </span> '.$tr['jabatankadep'].'</p>
						<p style="font-size:10px;"><span> : </span> '.date('d-m-Y',strtotime($tr['waktutugas'])).'</p>
						<p style="font-size:10px;"><span> : </span> '.$tr['tujuantempat'].' </p>
						<p style="font-size:10px;"><span> : </span> '.$tr['dasarpenugasan'].' </p>
						<p style="font-size:10px;"><span> : </span> '.$tr['kegiatanpenugasan'].'</p>
					</th>
				</tr>
				
			</table>';
			}
				
			$html.='<p align="center"><font face="Arial" color="black" size="10"><b> PERHITUNGAN BIAYA PERJALANAN DINAS (BPD)</b></font></p>

			
			<table border="1" cellspacing="1"  cellpadding="2" style="font-size:10px;">
				<tr>	
					<th  width="5%" align="center">No</th>		
                    <th  width="30%" align="center">Komponen Biaya</th>                
					<th width="20%" align="center">Rincian</th>                               	             	
					<th  width="20%" align="center">Jumlah</th>
                    <th  width="25%" align="center">Keterangan</th>						
	            </tr>';	 							
						
          	$qty=0; 
				foreach ($cetaksurgas as $row) 
			{
				$i++;				
				$html.='

					<tr>
						<td width="5%" align="center">'.$i.'</td>						
						<td width="30%">'.$row['komponenbiaya'].'</td>
						<td width="20%"  align="center">'.$row['rincian'].'</td>
						<td width="20%"  align="right"> '.number_format($row['totalnilaibiaya'],0,',','.').'</td>						
						<td width="25%" align="center">'.$row['keterangan'].'</td>							
					</tr>	';	

				$qty=$qty+$row['totalnilaibiaya'];
				
			}

			$html.='<tr>
						<td style="text-align:center;font-weight:bold;" colspan="3">Total</td>
						<td style="text-align:right;font-weight:bold;">'.number_format ($qty ,0,',','.').'</td>
						<td>Diterima Karyawan</td>
					</tr>';	

			$html.='<tr>
						<td style="text-align:center;font-weight:bold;" colspan="3">Grand Total</td>
						<td style="text-align:right;font-weight:bold;"> '.number_format ($qty ,0,',','.').'</td>
						
					</tr>';
			
			$html.='</table>';	

			
				   		foreach ($cetaksurgase as $tr) {
			
			$html.='<br><br><br><br><br>
			
				<table style="font-size:10px;">
					<tr>
						<td width="30%" align="center">Jakarta, '.$tgll.' '.$bulann.' '.$thnn.'</td>	
						<td width="20%"></td>
						<td width="20%"></td>
						<td width="20%"></td>
					</tr>
					<tr>
						<td width="30%" align="center">'.$tr['jabatansekretaris'].'</td>	
						<td width="20%"></td>
						<td width="20%"></td>
						<td width="20%"></td>
					</tr>
					<br><br><br><br>					
					<tr>
						<td width="30%" align="center">'.$tr['namasekretaris'].'</td>	
						<td width="20%"></td>
						<td width="20%"></td>
						<td width="20%"></td>
					</tr>
				</table>';									
}


			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('RKK.pdf');
?>