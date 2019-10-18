<?php
			$pdf = new Tpdf('P', 'mm', 'A4', true, 'UTF-8', false);
			//remove header
			$pdf->setPrintHeader(false);
			$pdf->SetTitle('Data Detail');
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
						<tr><td width="100%" align="center">'.$tr->jdl_detail.'</td></tr>
					</table><br><br><br>
					
					<table border="1" cellspacing="1"  cellpadding="2">
						<tr style="font-weight:bold;text-align:center;" bgcolor="#A9A9A9">
							<th width="30">No</th>
							<th width="120">Kode Detail</th>
							<th width="200">Detail</th>
							<th width="60">Qty</th>
							<th width="50">Satuan</th>
							<th width="70">Keterangan</th>
						</tr></thead>';
						
			}
            
			$qty=0;			
			foreach ($cetak_detail as $row) 
				{
					$i++;
					$html.='<tr>
							<td width="30" align="center">'.$i.'</td>
							<td width="120" align="left">'.$row['kode_detail'].'</td>
							<td width="200" align="left">'.$row['detail'].'</td>
							<td width="60" align="center">'.number_format($row['qty']).'</td>
							<td width="50" align="center">'.$row['sat'].'</td>
							<td width="70" align="center">'.$row['ket'].'</td>
						</tr>';
					$qty=$qty+$row['qty'];	
				}
				
					//CETAK TTD
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
			$pdf->Output('detail.pdf', 'I');
?>