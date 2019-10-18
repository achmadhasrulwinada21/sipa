<?php
			$pdf = new Tpdf('P', 'mm', 'A4', true, 'UTF-8', false);
			//remove header
			$pdf->setPrintHeader(false);
			$pdf->SetTitle('Data Cis II');
			$pdf->SetHeaderMargin(10);
			$pdf->SetTopMargin(10);
			$pdf->setFooterMargin(10);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage();
			$pdf->SetFont('helvetica', '', 12);
			
			
			$i=0;
			//cetak judul
			$cisi = $this->db->get('tbl_jdl_cisi')->result();
				foreach ($cisi as $tr){
					
			$html='<br>
			<style>
				table thead 
			{
				display: table-header-group;
			}
			</style> <thead>
					<table border="0" cellspacing="1" cellpadding="2" style="text-align:center;font-weight:bold;font-size:15;">
						<tr><td width="100%" align="center">'.$tr->jdl_cisii.'</td></tr>
					</table><br><br><br>
						<table border="1" cellspacing="1"  cellpadding="2" vertical-align:middle;>
						<tr style="font-weight:bold;text-align:center;" bgcolor="#A9A9A9">	
							<th width="30" rowspan="2">No</th>
							<th width="70" rowspan="2">Komponen</th>
							<th width="150"rowspan="2">Sub Komponen</th>
							<th width="50" rowspan="2">Jumlah</th>
							<th colspan="2">Kualifikasi</th>
							<th width="75" rowspan="2">Pencapaian</th>
						</tr>
						<tr style="font-weight:bold;text-align:center;" bgcolor="#A9A9A9">	
							<th>Pendidikan</th>
							<th>Sertifikasi</th>
						</tr>
						</thead>';
						}
            $qty=0;    
			foreach ($cetak_cisii as $row) 
				{
					$i++;
					$html.='<tr>
							<td width="30" align="center">'.$i.'</td>
							<td width="70" align="center">'.$row['kode_kom'].'</td>
							<td width="150" align="left">'.$row['sub_kom'].'</td>
							<td width="50" align="center">'.number_format($row['jumlah']).'</td>
							<td align="center">'.$row['pendidikan'].'</td>
							<td align="center">'.$row['sertifikasi'].'</td>
							<td width="75" align="center">'.$row['pencapaian'].'</td>
							
						</tr>';
						$qty=$qty+$row['jumlah'];
				}
				
				//CETAK TTD
				$html.='<tr bgcolor="#DCDCDC">
						<td colspan="3" style="text-align:center;font-weight:bold;">Total</td>
						<td style="text-align:center;font-weight:bold;">'.number_format($qty).'</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>';
					$html.='</table>';
					
					$html.='<br><br><br><br><br>
					<table border="0">
					<tr>
					<td width="30"> </td>
					<td width="200" align="left">Jakarta, '.date('d-m-y').'</td>
					<td width="100"> </td>
					<td width="200" align="center">Menyetujui,</td>
					</tr>';
					
					$html.='
					<table border="0">
					<tr>
					<td width="30"> </td>
					<td width="200" align="left">Kepala Departemen</td>
					<td width="100"> </td>
					<td width="200" align="center">Direktur Umum dan Keuangan</td>
					</tr>';
					
				$dept = $this->db->get('tbl_dept')->result();
				foreach ($dept as $r){
				$html.='</table>
				<br><br><br><br><br><br>
				<table border="0">
						<tr>
						<td width="30"> </td>
						<td width="200" align="left">'.$r->kepala_dept.'</td>
						<td width="100"> </td>
						<td width="200" align="center">'.$r->direktur.'</td>
						</tr>
						</table>';
				}
				
				//END CETAK TTD




			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('cisii.pdf', 'I');
?>