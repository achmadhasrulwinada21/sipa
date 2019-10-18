<?php
			$pdf = new Tpdf('P', 'mm', 'A4', true, 'UTF-8', false);
			//remove header
			$pdf->setPrintHeader(false);
			$pdf->SetTitle('Eksekutif Report Var');
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
			
			$html='<br>
			<style>
				table thead 
			{
				display: table-header-group;
			}
			</style> <thead>
					<table border="0" cellspacing="1" cellpadding="2" style="text-align:center;font-weight:bold;font-size:15;">
                        <tr><td width="100%" align="center">EKSEKUTIF REPORT</td></tr>
                        <tr><td width="100%" align="center">PENCAPAIAN .'$row->periode'.</td></tr>
                        <tr><td width="100%" align="center">HERMINA HOSPITAL GROUP</td></tr>
					</table><br><br><br>
						<table border="1" cellspacing="1"  cellpadding="2" vertical-align:middle;>
						<tr style="font-weight:bold;text-align:center;" bgcolor="#A9A9A9">	
							<th width="30" rowspan="2">No</th>
							<th width="70" rowspan="2">Uraian</th>
							<th width="150"rowspan="2">SAS HHG</th>
                            <th width="50" rowspan="2">Jtn</th>
                            <th width="50" rowspan="2">Kmyr</th>
                            <th width="50" rowspan="2">Bekasi</th>
                            <th width="50" rowspan="2">Depok</th>
                            <th width="50" rowspan="2">DM</th>
                            <th width="50" rowspan="2">Bogor</th>
                            <th width="50" rowspan="2">Pst</th>
                            <th width="50" rowspan="2">Pdrn</th>
                            <th width="50" rowspan="2">Tprahu</th>
                            <th width="50" rowspan="2">Skbm</th>
                            <th width="50" rowspan="2">Tgr</th>
                            <th width="50" rowspan="2">GW</th>
                            <th width="50" rowspan="2">Arca</th>
                            <th width="50" rowspan="2">Glxy</th>
                            <th width="50" rowspan="2">Plb</th>
                            <th width="50" rowspan="2">Cpt</th>
                            <th width="50" rowspan="2">Mks</th>
                            <th width="50" rowspan="2">Spg</th>
                            <th width="50" rowspan="2">Bymk</th>
                            <th width="50" rowspan="2">Solo</th>
                            <th width="50" rowspan="2">Ciruas</th>
                            <th width="50" rowspan="2">Yogya</th>
                            <th width="50" rowspan="2">Bitung</th>
                            <th width="50" rowspan="2">Mksr</th>
                            <th width="50" rowspan="2">Blkppn</th>
                            <th width="50" rowspan="2">Medan</th>
                            <th width="50" rowspan="2">Podomoro</th>
                            <th width="50" rowspan="2">Purwokerto</th>
							<th width="75" rowspan="2">Pencapaian</th>
						</tr>
						<tr style="font-weight:bold;text-align:center;" bgcolor="#A9A9A9">	
							<th>Laporan Keuangan untuk dr Hasmoro</th>
                        </tr>
                        <tr style="font-weight:bold;text-align:center;" bgcolor="#A9A9A9">	
							<th>Laporan Keuangan Singkat untuk Manajemen Review bersama Investor</th>
                        </tr>
                        <tr style="font-weight:bold;text-align:center;" bgcolor="#A9A9A9">	
							<th>Laporan Keuangan - Pencapaian dari Awal Tahun</th>
                        </tr>
                        <tr style="font-weight:bold;text-align:center;" bgcolor="#A9A9A9">	
							<th>Data Lainnya</th>
                        </tr>
						</thead>';
						
             
			foreach ($cetak_eksekutifvar as $row) 
				{
					$i++;
					$html.='<tr>
							<td width="30" align="center">'.$i.'</td>
							<td width="70" align="center">'.$row['nama_uraian'].'</td>
                            <td width="150" align="left">'.$row['hhg'].'</td>
                            <td width="150" align="left">'.$row['jtn'].'</td>
                            <td width="150" align="left">'.$row['kmyr'].'</td>
                            <td width="150" align="left">'.$row['bks'].'</td>
                            <td width="150" align="left">'.$row['depok'].'</td>
                            <td width="150" align="left">'.$row['dm'].'</td>
                            <td width="150" align="left">'.$row['bogor'].'</td>
                            <td width="150" align="left">'.$row['pst'].'</td>
                            <td width="150" align="left">'.$row['pdrn'].'</td>
                            <td width="150" align="left">'.$row['tprahu'].'</td>
                            <td width="150" align="left">'.$row['skbm'].'</td>
                            <td width="150" align="left">'.$row['tgr'].'</td>
                            <td width="150" align="left">'.$row['gw'].'</td>
                            <td width="150" align="left">'.$row['arca'].'</td>
                            <td width="150" align="left">'.$row['glxy'].'</td>
                            <td width="150" align="left">'.$row['plb'].'</td>
                            <td width="150" align="left">'.$row['cpt'].'</td>
                            <td width="150" align="left">'.$row['mks'].'</td>
                            <td width="150" align="left">'.$row['spg'].'</td>
                            <td width="150" align="left">'.$row['bymk'].'</td>
                            <td width="150" align="left">'.$row['solo'].'</td>
                            <td width="150" align="left">'.$row['ciruas'].'</td>
                            <td width="150" align="left">'.$row['yogya'].'</td>
                            <td width="150" align="left">'.$row['bitung'].'</td>
                            <td width="150" align="left">'.$row['mksr'].'</td>
                            <td width="150" align="left">'.$row['blkppn'].'</td>
                            <td width="150" align="left">'.$row['mdn'].'</td>
                            <td width="150" align="left">'.$row['pdm'].'</td>
                            <td width="150" align="left">'.$row['pwt'].'</td>
							<td width="50" align="center">'.number_format($row['capai']).'</td>							
						</tr>';
						
				}
				
				

			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('Eksekutif Report Var.pdf', 'I');
?>