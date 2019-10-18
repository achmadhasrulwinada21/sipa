<?php

			$pdf = new Tpdf('P', 'mm', 'A4', true, 'UTF-8', false);
			//remove header
			$pdf->SetPrintHeader(false);
			$pdf->SetTitle('Data Cis I');
			$pdf->SetHeaderMargin(10);
			$pdf->SetTopMargin(10);
			$pdf->SetFooterMargin(8);
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
					<table border="0" cellspacing="1" cellpadding="2" style="text-align:center;font-weight:bold;font-size:14;">
						<tr><td width="100%" align="center">'.$tr->jdl_cisi.'</td></tr>
					</table><br><br><br>
					
						<table border="1" cellspacing="1" cellpadding="2">
						<tr style="font-weight:bold;text-align:center;" bgcolor="#A9A9A9">	
							<th width="30">No</th>
							<th width="100">Komponen</th>
							<th width="200">Sub Komponen</th>
							<th width="50">Jumlah</th>
							<th width="50">Waktu</th>
							<th width="100">Pencapaian</th>
						</tr> </thead>';
						}
            $qty=0;   
			foreach ($cetak_cisi as $row) 
				{
					$i++;
					$html.='<tr style="vertical-align:middle;align:center";>
							<td width="30" style="text-align:center;line-height:15px;">'.$i.'</td>
							<td width="100" style="text-align:center;line-height:15px;">'.$row['kode_kom'].'</td>
							<td width="200" style="text-align:left;line-height:15px;">'.$row['sub_kom'].'</td>
							<td width="50" style="text-align:center;line-height:15px;">'.number_format($row['jumlah']).'</td>
							<td width="50" style="text-align:center;line-height:15px;">'.$row['waktu'].'</td>
							<td width="100">'.$row['pencapaian'].'</td>
						</tr>';
					$qty=$qty+$row['jumlah'];
				}
				
				//CETAK TTD style="vertical-align: middle;text-align:center" (belum bisa)
				$html.='<tr bgcolor="#DCDCDC">
						<td colspan="3" style="text-align:center;font-weight:bold;">Total</td>
						<td style="text-align:center;font-weight:bold;">'.number_format($qty).'</td>
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
			$pdf->Output('cisi.pdf', 'I');
?>