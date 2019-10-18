<?php
			$pdf = new Tpdf('P', 'mm', 'A4', true, 'UTF-8', false);
			$pdf->setPrintHeader(false);
			$pdf->SetTitle('Invoice');
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
				foreach ($cetak_invo as $row) 
			{
					
				$data=date('d m Y',strtotime($row['invoice_date']));
                $tgl=substr($data,0,2);
                $bulan=ubahbulan(substr($data,3,2));
                $thn=substr($data,6,4);
				
				$data=date('d m Y',strtotime($row['term_pay']));
                $tgll=substr($data,0,2);
                $bulann=ubahbulan(substr($data,3,2));
                $thnn=substr($data,6,4);
				
				$data=date('d m Y',strtotime($row['tanggal']));
                $tglll=substr($data,0,2);
                $bulannn=ubahbulan(substr($data,3,2));
                $thnnn=substr($data,6,4);
			}
			
			$html='
			
			<p align="center"><font face="Arial" color="black" size="14"> <b>PT. MEDIKALOKA HERMINA Tbk</b></font>
				<br> <font face="Arial" color="black" size="8"> Kantor Pusat : Jl. Raya Jatinegara Barat No. 126, Jatinegara, Jakarta Timur 13320
				<br>Kantor Cabang : Hermina Tower I Lt. 10 Jl. Selangit Blok B-10 Kav. 04, Kemayoran, Jakarta Pusat 10610 
				<br>Telp. 021-8191223, 8513838 Fax. 021.8560601 Website : www.herminahospitalgroup.com
				</font> <br><hr height="2px"/>
			</p>';

			
			foreach ($cetak_invo as $row) 
			{
				$html.='
					<table cellspacing="2" bgcolor="white" cellpadding="2" style="line-height:10px;">
						<tr bgcolor="#ffffff">
							<th width="35%" align="left">
								<p style="font-size:10px;" >Kepada Yth</p>
								<p style="font-size:10px;"> </p>
							</th>
		
							<th width="5%" align="left" style="line-height:10px;">
								<p><span> </span> </p>
								<p><span> </span> </p>
							</th>
			
							<th width="25%" align="left" style="line-height:10px;">
								<p style="font-size:10px;">Invoice No</p>
								<p style="font-size:10px;">Invoice Date</p>
							</th>
			
							<th width="35%" align="left" style="line-height:10px;">
								<p style="font-size:10px;"><span>: </span> '.$row['invoice_no'].' </p>
								<p style="font-size:10px;"><span>: </span> '.$tgl.' '.$bulan.' '.$thn.'</p>
							</th>															
						</tr>';
			}
				$html.='</table>';

			
			foreach ($cetak_invo as $row) 
			{					
				$html.='
					<table cellspacing="2" bgcolor="white" cellpadding="2" style="line-height:14px;">
						<tr bgcolor="#ffffff">
							<th width="35%" align="left">
								<p style="font-size:10px;">'.$row['kepada'].' </p>						
							</th>
							
							<th width="5%" align="left" style="line-height:10px;">
								<p style="font-size:10px;"> </p>						
							</th>
							
							<th width="25%" align="left" style="line-height:10px;">
								<p style="font-size:10px;">Term Of Payment</p>						
							</th>
							
							<th width="35%" align="left" style="line-height:10px;">
								<p style="font-size:10px;"><span>: </span>  '.$tgll.' '.$bulann.' '.$thnn.'</p>						
							</th>												
						</tr>
					</table>';
			}
			
			
			foreach ($cetak_invo as $row) 
			{		
				$html.='
				<table cellspacing="2" bgcolor="white" cellpadding="2" style="line-height:14px;">
							<tr bgcolor="#ffffff">
								<th width="40%" align="left">
									<p style="font-size:10px;">'.$row['alamat'].' </p>						
								</th>																	
							</tr>
				</table>';
			}
			
			$html.='<br><br><br>';

			$html.='<p align="center"><font face="helvetica" color="black" size="14">INVOICE</font>';
            
			/* DATA REPORT INVO */
			
			$html.='<br/><br/>
					<table cellspacing="2" bgcolor="black" cellpadding="2">
						<tr bgcolor="#ffffff">
							<th width="30%" align="center">Tanggal</th>							
							<th width="40%" align="center">Keterangan</th>
							<th width="30%" align="center">Nominal</th>							
						</tr>
					</table>';

			$html.='
				<table cellspacing="2" bgcolor="black" cellpadding="2">';
			
			$qty=0; 		
			foreach ($cetak_invo as $row)  
			{							
				$html.='
					<tr bgcolor="#ffffff">								
						<td rowspan="2" width="30%" align="center">'.$tglll.' '.$bulannn.' '.$thnnn.'</td>
						<td width="40%" align="left">'.$row['keterangan'].'</td>					
						<td width="30%" align="left">Rp. '.number_format($row['nominal'],0,',','.').'</td>									
					</tr>';
				
					$qty=$row['nominal']+$row['ppn'];
					
					$html.='
					<tr bgcolor="white">				
						<td align="left">PPN</td>
						<td align="left">Rp. '.number_format($row['ppn'],0,',','.').'  </td>
					</tr>';	
					
					$html.='
					<tr bgcolor="white">				
						<td colspan="2">Grand Total </td>
						<td align="left">Rp. '.number_format ($qty ,0,',','.').' </td>
					</tr>';	
									
				$html.='</table>';								
			}
			
			$html.='<br><br><br>';
			
			
			foreach ($cetak_invo as $row) {
			$html.='
			<table cellspacing="2" bgcolor="white" cellpadding="2" style="line-height:8px;">
						<tr bgcolor="#ffffff">
							<th width="35%" align="left">
								<p style="font-size:10px">Payment can be transfered:</p>
								<p style="font-size:10px" >'.$row['nama_perusahaan'].'</p>
								<p style="font-size:10px" >'.$row['bank'].'</p>
								<p style="font-size:10px" ><span>No. Rekening: </span>'.$row['no_rekening'].'</p>
							</th>																					
						</tr>				
			</table>';
			}	
			
			$html.='<br><br><br>';
			
			foreach ($cetak_invo as $row) 
			{
			$html.='
			<table cellspacing="2" bgcolor="white" cellpadding="2" style="line-height:8px;">
						<tr bgcolor="#ffffff">
							<th width="26%" align="left">					
								<p style="font-size:10px" align="center">Jakarta, '.$tgl.' '.$bulan.' '.$thn.'  </p>								
							</th>																					
						</tr>				
			</table>';
			}
			
			$html.='<br>';
			
			$html.='
			<table cellspacing="2" bgcolor="white" cellpadding="2" style="line-height:8px;">
						<tr bgcolor="#ffffff">
							<th width="26%" align="left">					
								<p style="font-size:10px" align="center">Direktur Umum</p>
								<p style="font-size:10px" align="center">PT. Medikaloka Hermina</p>																
							</th>													
						</tr>				
			</table>';
			
			$html.='<br><br><br><br>';
			
			$html.='
			<table cellspacing="2" bgcolor="white" cellpadding="2" style="line-height:8px;">
						<tr bgcolor="#ffffff">
							<th width="26%" align="left">					
								<p style="font-size:10px" align="center">Yulisar</p>																						
							</th>													
						</tr>				
			</table>';
			
			$html.='<br><br><br>';
			
			$html.='
			<table border="1" cellspacing="1" bgcolor="white" cellpadding="1" style="line-height:12px;">
						<tr bgcolor="#ffffff">
							<th width="30%<" align="left">					
								<p style="font-size:12px" align="center">Kwitansi ini dianggap sah, <br>apabila pembayaran telah <br>diterima di Rekening kami</p>																						
							</th>													
						</tr>				
			</table>';
		
			/* DATA REPORT INVOICE */
			$html.='<br><br><br><br><br><br>br>';
			
			foreach ($cetak_invo as $row)
		{						
			$html.='<table cellspacing="2" bgcolor="white" cellpadding="2" style="line-height:8px;">
						<tr bgcolor="#ffffff">										
							<td width="15%" align="left" style="font-size:10px" >'.$row['bank'].'</td>
							<td width="17%" align="left" style="font-size:10px" >'.$row['no_rekening'].'</td>
							<td width="35%" align="left" style="font-size:10px" >'.$row['nama_perusahaan'].'</td>																										
						</tr>				
			</table>';
		}
				$html.='<table border="1" cellspacing="1"  cellpadding="2" style="font-size:8px">
				
						<tr bgcolor="#00FFFF">	
							<th width="12%" align="center">Account No</th>
							<th width="10%" align="center">Date</th>
							<th width="10%" align="center">Value Date</th>
							<th width="16%" align="center">Account No Allias</th>
							<th width="20%" align="center">Description</th>
							<th width="8%" align="center">Reference No</th>
							<th width="5%" align="center">Debit</th>
							<th width="8%" align="center">Credit</th>	
							<th width="10%" align="center">Balance</th>	                
						</tr>						
					';
			$i=0;
			foreach ($cetak_repinvo as $row) 
			{
				$i++;
				$html.='				
				<tr>
					<td width="12%" align="center">'.$row['no_rek'].'</td>
					<td width="10%" align="center">'.date('d-m-Y',strtotime($row['tanggal'])).'</td>
					<td width="10%"  align="center">'.date('d-m-Y',strtotime($row['val_tanggal'])).'</td>
					<td width="16%" align="center">'.$row['atas_nama'].'</td>
					<td width="20%" align="left">'.$row['deskripsi'].'</td>
					<td width="8%" align="center">'.$row['reference_no'].'</td>
					<td width="5%" align="center">'.$row['debit'].'</td>
					<td width="8%" align="right">'.number_format($row['credit'],2,',','.').'</td>	
					<td width="10%" align="right">'.number_format($row['balance'],0,',','.').'</td>
				</tr>	';				
			}				
					$html.='</table>';	

							
							
								
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('Data_Invoice.pdf');
?>
