<?php
			$pdf = new Tpdf('P', 'mm', 'A4', true, 'UTF-8', false);
			//remove header
			$pdf->setPrintHeader(false);
			$pdf->SetTitle('Data Keuangan');
			$pdf->SetHeaderMargin(10);
			$pdf->SetTopMargin(10);
			$pdf->setFooterMargin(10);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage();
			$pdf->SetFont('helvetica', '', 11);
			
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
						<tr><td width="100%" align="center">'.$tr->jdl_keuangan.'</td></tr>
					</table><br><br><br>

					<table border="1" cellspacing="1"  cellpadding="2">
						<tr style="font-weight:bold;text-align:center;" bgcolor="#A9A9A9">
							<th width="30">No</th>
							<th width="100">Kode</th>
							<th width="210">Nama Kegiatan</th>
							<th width="120">Money</th>
							<th width="75">Ket</th>
						</tr> </thead>';
						}
            $qty=0;
			foreach ($cetak_keuangan as $row) 
				{
					$i++;
					$html.='<tr>
							<td width="30" align="center">'.$i.'</td>
							<td width="100" align="center">'.$row['kode'].'</td>
							<td width="210" align="left">'.$row['nk'].'</td>
							<td width="120" align="right">'.number_format($row['money']).'</td>
							<td width="75" align="left">'.$row['ket'].'</td>
						</tr>';
						$qty=$qty+$row['money'];
				}
				
					//CETAK TTD style="vertical-align: middle;text-align:center" (belum bisa)
				$html.='<tr bgcolor="#DCDCDC">
						<td colspan="3" style="text-align:center;font-weight:bold;">Total</td>
						<td style="text-align:right;font-weight:bold;">'.number_format($qty).'</td>
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
			$pdf->Output('keuangan.pdf', 'I');
?>