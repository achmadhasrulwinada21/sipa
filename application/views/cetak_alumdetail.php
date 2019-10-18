<?php

			$pdf = new Tpdf('L', 'mm', 'A4', true, 'UTF-8', false);
			//remove header
			$pdf->SetPrintHeader(false);
			$pdf->SetTitle('Data');
			$pdf->SetHeaderMargin(10);
			$pdf->SetTopMargin(10);
			$pdf->SetFooterMargin(8);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage('L', 'LEGAL');
			$pdf->SetFont('helvetica', '', 12);
			$pdf->Image('assets/upload/hhg-logo.png',15,2,25,25,'PNG');
			
			
			$html='<br>
			<table border="0" cellspacing="0" cellpadding="1" style="text-align:center;font-weight:bold;font-size:14;">
					<thead>
						<tr>
						<td width="100%" align="center">Laporan E - Katalog Alat Umum<br></td></tr>
          	          </thead>
					</table><br> <hr height="2px"> <b style="margin-bottom:4px;"></b> 
					<br><br>
                     <p><b>TANGGAL TRANSAKSI : '.$tglawal.'</b></p>
					 ';

					
					
					$html.='	<table border="1" cellspacing="1" cellpadding="2">
						<tr style="font-weight:bold;text-align:left;" bgcolor="#A9A9A9">	
						<th width="25px">No</th>
					   <th style="vertical-align: middle;text-align: center;">Nama Produk</th>
                       <th style="vertical-align: middle;text-align: center;">Regional</th>
                      <th  style="vertical-align: middle;text-align: center;">Harga Lama</th>
                      <th  style="vertical-align: middle;text-align: center;">Harga Baru</th>
                      <th  style="vertical-align: middle;text-align: center;">Persentase</th>
                      <th  style="vertical-align: middle;text-align: center;">Harga exc Ppn</th>
                      <th  style="vertical-align: middle;text-align: center;">Harga inc Ppn</th>
                      <th  style="vertical-align: middle;text-align: center;">Harga inc Ppn fee</th>
                       <th  style="vertical-align: middle;text-align: center;">Persentase Ppn</th>
						</tr></table>';
                            

                            foreach ($cetak_alumdetail as $h) {
						$html.= '<br><br>
                      <span style="font-weight:bold;">PERUSAHAAN</span><span style="font-weight:bold;"> : </span><span style="font-weight:bold;">'.$h['nm_perusahaan'].'</span><br>
                      	';

							$koper=$h['koper'];
							$tanggal_tr=$h['tanggal_tr'];

					$cetak_alum = $this->produkom2->Getprodukalum("where koper='$koper' and tanggal_tr='$tanggal_tr' and kode_produk <> ''")->result_array();

												
            $i=0;   
			foreach ($cetak_alum as $row) 
				{
					$i++;
					$html.='<table><tr style="vertical-align:middle;align:center";>
							<td style="text-align:left;" width="25px">'.$i.'</td>		   
   <td style="text-align:left;">'.$row['nama_produk'].'</td>
	 <td style="text-align: left;">'.$row['nm_regional'].'</td>
   <td style="text-align: right;">'.number_format($row['harga_lama'], 0,',','.').'</td>
   <td style="text-align: right;">'.number_format($row['harga_baru'], 0,',','.').'</td>
   <td style="text-align: right;">'.number_format($row['persentase'], 0,',','.').'%</td>
   <td style="text-align: right;">'.number_format($row['harga_excppn'], 0,',','.').'</td>
   <td style="text-align: right;">'.number_format($row['harga_incppn'], 0,',','.').'</td>
   <td style="text-align: right;">'.number_format($row['harga_incppnfee'], 0,',','.').'</td>
    <td style="text-align: right;">'.number_format($row['persentase_ppn'], 0,',','.').'%</td>
							</tr>';
					}
				}
				$html.='</table><br><br>';
					
					
				
				
				//END CETAK TTD
				
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('ALUM.pdf', 'I');
?>