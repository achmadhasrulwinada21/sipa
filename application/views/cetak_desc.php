<?php
			$pdf = new Tpdf('P', 'mm', 'A4', true, 'UTF-8', false);
			//remove header
			$pdf->setPrintHeader(false);
			$pdf->SetTitle('Data Description');
			$pdf->SetHeaderMargin(10);
			$pdf->SetTopMargin(10);
			$pdf->setFooterMargin(10);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage();
			$pdf->SetFont('helvetica', '', 10);
			
			
			$i=0;
			//cetak judul
			$desc = $this->db->get('tbl_jdl_dept')->result();
			foreach ($desc as $tr){
				
			$html='<br>
			<style>
				table thead 
			{
				display: table-header-group;
			}
			</style> <thead>
					<table border="0" cellspacing="1" cellpadding="2" style="text-align:center;font-weight:bold;font-size:15;">
						<tr><td width="100%" align="center">'.$tr->jdl_desc.'</td></tr>
					</table><br><br><br>
					
					<table border="1" cellspacing="1"  cellpadding="2">
						<tr style="font-weight:bold;text-align:center;" bgcolor="#A9A9A9">
							<th width="30">No</th>
							<th width="170">Kode</th>
							<th width="180">Description</th>
							<th width="145">Keterangan</th>
						</tr> </thead>';
            }     
			foreach ($cetak_desc as $row) 
				{
					$i++;
					$html.='<tr>
							<td width="30" align="center">'.$i.'</td>
							<td width="170" align="left">'.$row['kode_desc'].'</td>
							<td width="180" align="left">'.$row['desc'].'</td>
							<td width="145" align="left">'.$row['ket'].'</td>
						</tr>';
				}
				
					$html.='</table>';
					
				//CETAK TTD 
					
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
			$pdf->Output('desc.pdf', 'I');
?>