<?php
	$pdf = new Tpdf('P', 'mm', 'A4', true, 'UTF-8', false);
	$pdf->SetTitle('Data Nota Pembayaran');
	$pdf->SetHeaderMargin(30);
	$pdf->SetTopMargin(20);
	$pdf->setFooterMargin(20);
	$pdf->SetAutoPageBreak(true);
	$pdf->SetAuthor('Author');
	$pdf->SetDisplayMode('real', 'default');
	$pdf->AddPage();
	$pdf->SetFont('helvetica', '', 11);
	$i=0;
	
	$dt = new DateTime();
	date_default_timezone_set("Asia/Jakarta");
    $waktu =date("H:i:s");
			
	function ubahbulan($namabln)
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
            
			$data=date('d m Y',strtotime($cetak_nota->tanggal));
            $tgl=substr($data,0,2);
            $bulan=ubahbulan(substr($data,3,2));
            $thn=substr($data,6,4);
			
			$data=date('d-m-Y h:i:s');
			$tgll=substr($data,0,2);
			$bulann=ubahbulan(substr($data,3,2));
			$thnn=substr($data,6,4);
			
			$html='
			<table cellspacing="2" bgcolor="white" cellpadding="2">
				<tr bgcolor="#ffffff">
					<th align="left">
						<p style="font-size:8px;">'.$cetak_nota->nama_pt.'</p>
					</th>
					<th align="left">
						<p style="font-size:8px;" align="right"> '.$tgll.' '.$bulann.' '.$thnn.' '.$waktu.'</p>
					</th>
				</tr>
			</table>';

                  	//$nota= $this->db->get('notapembayaran')->result();
				   	//	foreach ($nota as $tr) {
					$html.='	

			<h3 align="center">NOTA PEMBAYARAN</h3>
		
					<table cellspacing="2" bgcolor="white" cellpadding="2" style="line-height:10px;">
					
						<tr bgcolor="#ffffff">
							<th width="10%" align="left">
								<p>No Bukti</p>
								<p>Tanggal</p>
							</th>

					
							<th width="30%" align="left" style="line-height:10px;">
								<p><span> : </span>'.$cetak_nota->no_bukti.'</p>
								<p><span> : </span>'.$tgll.' '.$bulann.' '.$thnn.'</p>
							</th>';
						//}
										 
					$html.='	
		
							<th width="15%" align="left" style="line-height:10px;">
								<p>Supplier</p>
								<p>No. Perkiraan</p>
								<p>No. Giro / Cek</p>
								<p>No. Rekening</p>
								<p>Bank</p>
								<p>Keterangan</p>
							</th>

							
								
							<th width="55%" align="left" style="line-height:10px;">
								<p><span> : </span>'.$cetak_nota->supplier.'</p>
								<p><span> : </span>'.$cetak_nota->no_perkiraan.'</p>
								<p><span> : </span>'.$cetak_nota->no_girocek.'</p>
								<p><span> : </span>'.$cetak_nota->no_rek.'</p>
								<p><span> : </span>'.$cetak_nota->bank.'</p>
								<p><span> : </span>'.$cetak_nota->keterangan.'</p>
							</th>
						</tr>
						</table>';
					
					$html.='<br/><br/>

					<table cellspacing="2" bgcolor="black" cellpadding="2">
						<tr bgcolor="#ffffff">
							<th width="5%" align="center">No</th>
							<th width="20%" align="center">No. Invoice</th>
							<th width="20%" align="center">Tanggal</th>
							<th width="20%" align="center">Tagihan</th>
							<th width="20%" align="center">Pembayaran</th>
							<th width="15%" align="center">Sisa</th>	
						</tr>
					</table>';

			$html.='
				<table cellspacing="2" bgcolor="" cellpadding="2">';
					
					//foreach ($cetaknota as $rownotapembayaran)  
						//{
							
							 
							//$qty=$cetak_nota->tagihan-$cetak_nota->pembayaran;
							$i++;
							$html.='
								<tr bgcolor="#ffffff">
									<td width="5%" align="center">'.$i.'</td>
									<td width="20%" align="center">'.$cetak_nota->no_invoice.'</td>
									<td width="20%" align="center">'.$tgl.' '.$bulan.' '.$thn.'</td>
									<td width="20%" align="left">Rp. '.number_format ($cetak_nota->tagihan ,0,',','.').'</td>
									<td width="20%" align="left">Rp. '.number_format ($cetak_nota->pembayaran ,0,',','.').'</td>
									<td width="15%" align="left">Rp. '.number_format ($cetak_nota->sisa ,0,',','.').'</td>	
								</tr>';
							
							//}
			$html.='</table>';
			
			
			

			$html.='
				<table cellspacing="2" bgcolor="black" cellpadding="2">';
					//foreach ($cetaknota as $rownotapembayaran)  
					//	{
					//		$i++;
							$html.='
								<tr bgcolor="#ffffff">
									<th width="45%" align="center">TOTAL : </th>	
									<th width="20%" align="left">Rp. '.number_format ($cetak_nota->tagihan ,0,',','.').'</th>	
									<th width="20%" align="left">Rp. '.number_format ($cetak_nota->pembayaran ,0,',','.').'</th>	
									<th width="15%" align="left">Rp. '.number_format ($cetak_nota->sisa ,0,',','.').'</th>	
								</tr>';
							//}
			$html.='</table>';

			$html.='<br/>';
			$html.='<br/>';
			
			
			$html.='
				<table cellspacing="1" border="1" cellpadding="1">
					<tr bgcolor="#ffffff">
						<th align="center">Pemohon</th>
						<th align="center">Petugas Jurnal</th>
						<th align="center">Bag. Akuntansi</th>
						<th align="center">Persetujuan Bayar</th>	
					</tr>
				
				
		
				<tr bgcolor="#ffffff">
						<td height="50px" align="center"><img src="assets/upload/'.$cetak_nota->pemohon.' " width="80px" height="50px">
							<br><span>'.$cetak_nota->nama_pemohon.'</span>
						</td>
						
						<td height="50px" align="center"><img src="assets/upload/'.$cetak_nota->ptgs_jurnal.' " width="80px" height="50px">
							<br><span>'.$cetak_nota->nama_jurnal.'</span>
						</td>
						
						<td height="50px" align="center"><img src="assets/upload/'.$cetak_nota->bag_akuntansi.' " width="80px" height="50px">
							<br><span>'.$cetak_nota->nama_akuntansi.'</span>
						</td>
						
						<td height="50px" align="center"><img src="assets/upload/'.$cetak_nota->perse_bayar.' " width="80px" height="50px">
							<br><span>'.$cetak_nota->nama_persebayar.'</span>
						</td>
					</tr>
					
				</table>';
			
			$html.='
				<table cellspacing="1" border="1" cellpadding="1">
					<tr bgcolor="#ffffff">
						<th align="center">Pemeriksa</th>
						<th align="center">Penandatangan Cek 1</th>
						<th align="center">Penandatangan Cek 2</th>
						<th align="center">Penerima Pembayaran</th>	
					</tr>
					<tr bgcolor="#ffffff">
						<td height="50px" align="center"><img src="assets/upload/'.$cetak_nota->pemeriksa.' " width="80px" height="50px">
							<br><span>'.$cetak_nota->nama_pemeriksa.'</span>
						</td>
						
						<td height="50px" align="center"><img src="assets/upload/'.$cetak_nota->sign_cek1.' " width="80px" height="50px">
							<br><span>'.$cetak_nota->nama_signcek1.'</span>
						</td>
						
						<td height="50px" align="center"><img src="assets/upload/'.$cetak_nota->sign_cek2.' " width="80px" height="50px">
							<br><span>'.$cetak_nota->nama_signcek2.'</span>
						</td>
						
						<td height="50px" align="center">
							<br><span>'.$cetak_nota->nama_penerima.'</span>
						</td>
					</tr>					
				</table>';
			
			$html.='<br><br><br> ';
			
			$html.='
				<table>
					<tr>
						<td height="50px" align="center"><img src="assets/upload/'.$cetak_nota->lampiran.' " width="800px" height="550px"></td>						
					</tr>
				<table>';
			
			
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('Nota_Pembayaran.pdf', 'I');
?>