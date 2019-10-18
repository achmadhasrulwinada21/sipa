<?php
	$pdf = new Tpdf('P', 'mm', 'A4', true, 'UTF-8', false);
	$pdf->setPrintHeader(false);
	$pdf->SetTitle('Surat Tugas');
	$pdf->SetHeaderMargin(10);
	$pdf->SetTopMargin(10);
	$pdf->setFooterMargin(10);
	$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
	$pdf->SetAuthor('Author');
	$pdf->SetDisplayMode('real', 'default');
	$pdf->AddPage();
	$pdf->SetFont('helvetica', '', 12);	
	$pdf->Image('assets/upload/hhg-logo.png',10,5,28,28,'PNG');
	$i=0;
	$html='
		
			<p align="center"><font face="Arial" color="black" size="14"> <b>PT. MEDIKALOKA HERMINA </b></font>
				<br> <font face="Arial" color="black" size="8"> Jl. Raya Jatinegara Barat No. 126, Jatinegara, Jakarta Timur 13320
				<br>Telp. 021-8191223, 8513838 (Hunting) Fax. 021.8560601
				<br>Website : www.herminahospitalgroup.com
			</font> <br><hr /></p>';
			
			
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
						<td width="30%" align="center">Jakarta, '.date('d M Y').'</td>	
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
	$pdf->Output('Surat_Tugas.pdf');
?>