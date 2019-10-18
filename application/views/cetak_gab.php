<?php

			$pdf = new TCPdf('P', 'mm', 'A4', true, 'UTF-8', false);
			//remove header
			$pdf->setPrintHeader(false);
			$pdf->SetTitle('Data Cis I');
			$pdf->SetHeaderMargin(10);
			$pdf->SetTopMargin(10);
			$pdf->setFooterMargin(10);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage();
			$pdf->SetFont('helvetica', '', 10);
			
			//judul stpd
			$stpd = $this->db->get('masterstpd')->result();
				foreach ($stpd as $tr){
					
			$html='<br>
					
			      <table style="text-align:right;font-weight:bold;font-size:12;">
						<tr><td width="100%" align="right">PERIODE BULAN : '.$tr->bulanini.'</td></tr>
					</table><br>';
					
				}
			
			//judul cisi
			$cisi = $this->db->get('tbl_jdl_cisi')->result();
				foreach ($cisi as $tr){
					
			$html.='<br>
			<style>
				table thead 
			{
				display: table-header-group;
			}
			</style>
					
			      <table border="0" cellspacing="1" cellpadding="2" style="text-align:center;font-weight:bold;font-size:12;">
						<tr><td width="100%" align="center">'.$tr->jdl_cisi.'</td></tr>
					</table><br>';
					
				}
				
			
                //selanjutnya cis 1
				
				$html.='<br>
					<table border="1" cellspacing="1"  cellpadding="2">
					<thead>
						<tr style="font-weight:bold;text-align:center;" bgcolor="#A9A9A9">	
							<th width="30">No</th>
							<th width="100">Komponen</th>
							<th width="200">Sub Komponen</th>
							<th width="50">Jumlah</th>
							<th width="50">Waktu</th>
							<th width="100">Pencapaian</th>
						</tr>
						
						</thead>';
						$i=0;
			foreach ($cetak_cisi as $row) 
				{
					$i++;
					$html.='<tr>
							<td width="30" style="text-align:center;line-height:15px;">'.$i.'</td>
							<td width="100" style="text-align:center;line-height:15px;">'.$row['kode_kom'].'</td>
							<td width="200" style="text-align:left;line-height:15px;">'.$row['sub_kom'].'</td>
							<td width="50" style="text-align:center;line-height:15px;">'.number_format($row['jumlah']).'</td>
							<td width="50" style="text-align:center;line-height:15px;">'.$row['waktu'].'</td>
							<td width="100">'.$row['pencapaian'].'</td>
						</tr>';
				}
				
					$html.='</table>';
			
				//judul cisi 2
				$cisi = $this->db->get('tbl_jdl_cisi')->result();
				foreach ($cisi as $tr){
					
			$html.='<br><br><br><br><br>
					<table border="0" cellspacing="1" cellpadding="2" style="text-align:center;font-weight:bold;font-size:12;">
						<tr><td width="100%" align="center">'.$tr->jdl_cisii.'</td></tr>
					</table><br><br>';
					}
				
			
				//selanjutnya cis 2
				
				$html.='
					<table border="1" cellspacing="1"  cellpadding="2">
					<thead>
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
						$i=0;
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
				}
				
					$html.='</table>';	
				
				//judul desc
				$desc = $this->db->get('tbl_jdl_dept')->result();
				foreach ($desc as $tr){
					
				$html.='<br><br><br><br><br>
					<table border="0" cellspacing="1" cellpadding="2" style="text-align:center;font-weight:bold;font-size:12;">
						<tr><td width="100%" align="center">'.$tr->jdl_desc.'</td></tr>
					</table><br><br>';
					}
				
			    //selanjutnya desc
				
				$html.='
					<table border="1" cellspacing="1"  cellpadding="2">
					<thead>
						<tr style="font-weight:bold;text-align:center;" bgcolor="#A9A9A9">	
							<th width="30">No</th>
							<th width="170">Kode</th>
							<th width="180">Description</th>
							<th width="150">Keterangan</th>
						</tr>
						
						</thead>';
						$i=0;
			foreach ($cetak_desc as $row) 
				{
					$i++;
					$html.='<tr>
							<td width="30" align="center">'.$i.'</td>
							<td width="170" align="left">'.$row['kode_desc'].'</td>
							<td width="180" align="left">'.$row['desc'].'</td>
							<td width="150" align="left">'.$row['ket'].'</td>
						</tr>';
				}
				
					$html.='</table>';
					
				
				//judul detail
				$desc = $this->db->get('tbl_jdl_dept')->result();
				foreach ($desc as $tr){
					
				$html.='<br><br><br><br><br>
					<table border="0" cellspacing="1" cellpadding="2" style="text-align:center;font-weight:bold;font-size:12;">
					<tr><td width="100%" align="center">'.$tr->jdl_detail.'</td></tr>
					</table><br><br>';
					}
					
				//selanjutnya detail
				
				$html.='
					<table border="1" cellspacing="1"  cellpadding="2">
					<thead>
						<tr style="font-weight:bold;text-align:center;" bgcolor="#A9A9A9">	
							<th width="30">No</th>
							<th width="120">Kode Detail</th>
							<th width="200">Detail</th>
							<th width="60">Qty</th>
							<th width="50">Satuan</th>
							<th width="70">Keterangan</th>
						</tr>
						
						</thead>';
						$i=0;
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
				}
				
					$html.='</table>';		
			
			
			//judul machine
				$desc = $this->db->get('tbl_jdl_dept')->result();
				foreach ($desc as $tr){
					
				$html.='<br><br><br><br><br>
					<table border="0" cellspacing="1" cellpadding="2" style="text-align:center;font-weight:bold;font-size:12;">
					<tr><td width="100%" align="center">'.$tr->jdl_unit.'</td></tr>
					</table><br><br>';
					}
			
			//selanjutnya machine
				
				$html.='
					<table border="1" cellspacing="1"  cellpadding="2">
					<thead>
						<tr style="font-weight:bold;text-align:center;" bgcolor="#A9A9A9">	
							<th width="30">No</th>
							<th width="85">Kode Unit</th>
							<th width="200">No</th>
							<th width="70">Satuan</th>
							<th width="60">Jumlah</th>
							<th width="82">Keterangan</th>
						</tr>
						
						</thead>';
						$i=0;
			foreach ($cetak_machine as $row) 
				{
					$i++;
					$html.='<tr>
							<td width="30" align="center">'.$i.'</td>
							<td width="85" align="center">'.$row['kode_machine'].'</td>
							<td width="200" align="left">'.$row['no'].'</td>
							<td width="70" align="center">'.$row['sat'].'</td>
							<td width="60" align="center">'.number_format($row['jumlah']).'</td>
							<td width="82" align="left">'.$row['ket'].'</td>
						</tr>';
				}
				
					$html.='</table>';	
			
			//judul machine
				$desc = $this->db->get('tbl_jdl_dept')->result();
				foreach ($desc as $tr){
					
				$html.='<br><br><br><br><br>
					<table border="0" cellspacing="1" cellpadding="2" style="text-align:center;font-weight:bold;font-size:12;">
					<tr><td width="100%" align="center">'.$tr->jdl_keuangan.'</td></tr>
					</table><br><br>';
					}
			
			//selanjutnya money
				
				$html.='
					<table border="1" cellspacing="1"  cellpadding="2">
					<thead>
						<tr style="font-weight:bold;text-align:center;" bgcolor="#A9A9A9">	
							<th width="30">No</th>
							<th width="100">Kode</th>
							<th width="210">Nama Kegiatan</th>
							<th width="120">Money</th>
							<th width="75">Ket</th>
						</tr>
						
						</thead>';
						$i=0;
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
				}
				
					$html.='</table>';
	
					//CETAK TTD style="vertical-align: middle;text-align:center" (belum bisa)
					
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
			
				
                  $pdf->writeHTML($html, true, true, true,true, '');                
								
			 $pdf->Output('cetak_gab.pdf', 'I');
			
?>