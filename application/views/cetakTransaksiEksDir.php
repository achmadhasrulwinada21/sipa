<?php
			$pdf = new Tpdf('L', 'mm', '', true, 'UTF-8', false);
			$pdf->setPrintHeader(false);
			$pdf->SetTitle('Transaksi DIR II');
			$pdf->SetHeaderMargin(2);
			$pdf->SetTopMargin(3);
			$pdf->setFooterMargin(10);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage('LEGAL');
			$pdf->SetFont('helvetica', '', 11);	


 function ubahbulaneksdir($namabln)
{
  switch($namabln){
  case 1:
  return 'JANUARI';
  break;
  case 2:
  return 'FEBRUARI';
  break;
  case 3:
  return 'MARET';
  break;
  case 4:
  return 'APRIL';
  break;
  case 5:
  return 'MEI';
  break;
  case 6:
  return 'JUNI';
  break;
  case 7:
  return 'JULI';
  break;
  case 8:
  return 'AGUSTUS';
  break;
  case 9:
  return 'SEPTEMBER';
  break;
  case 10:
  return 'OKTOBER';
  break;
  case 11:
  return 'NOVEMBER';
  break;
  case 12:
  return 'DESEMBER';
  break;
  default:
  echo $namabln;
  break;
  }
}
      foreach ($cetak_eks as $row) 
        {
                //$data=date('Ym',strtotime($row['periode']));
                 $data=$row['periode'];
                //$tgl=substr($data,0,2);
                $bulan=ubahbulaneksdir(substr($data,5,2));
                $tahun=substr($data,0,4);
}


			$i=0;
			$html='


			<p align="center"><b>TRANSAKSI EKSEKUTIF DIR II<br> HERMINA HOSPITAL GROUP</b></p>
			<h6 align="center">PENCAPAIAN '.$bulan.' '.$tahun.'</h6>
					
			<table border="1" cellspacing="1"  cellpadding="2" style="font-size:8px;">
				<tr bgcolor="gray">	
					
                    <th width="8.3%"align="center">Nama Uraian</th>
                    <th width="2.9%"align="center">hhg</th>
                    <th width="2.9%" align="center">jtn</th>
                    <th width="2.9%" align="center">kmyr</th>
                    <th width="2.9%" align="center">bks</th>
                    <th width="2.9%" align="center">dpk</th>
                    <th width="2.5%"align="center">dm</th>
                    <th width="2.9%" align="center">bgr</th>
					<th width="2.9%" align="center">pst</th>
					<th width="2.9%" align="center">pdrn</th>
					<th width="3.2%" align="center">trahu</th>
					<th width="3.2%" align="center">skbm</th>
					<th width="2.9%" align="center">tgr</th>
					<th width="2.5%" align="center">gw</th>
					<th width="2.9%" align="center">arca</th>
					<th width="2.9%" align="center">glxy</th>
					<th width="2.9%" align="center">plb</th>
					<th width="2.9%" align="center">cpt</th>
					<th width="2.9%" align="center">mks</th>
					<th width="2.9%" align="center">spg</th>
					<th width="3.2%" align="center">bymk</th>
					<th width="3%" align="center">solo</th>
					<th width="3.2%" align="center">cruas</th>
					<th width="3%" align="center">ygya</th>
					<th width="3%" align="center">btng</th>
					<th width="3%" align="center">mksr</th>
					<th width="3.4%" align="center">bppn</th>
					<th width="2.9%" align="center">mdn</th>
					<th width="2.9%" align="center">pdm</th>
					<th width="2.9%" align="center">pwt</th>
					<th width="3.8%" align="center">Capai</th>					
	            </tr>';						
          	
			foreach ($cetak_eks as $row) 
			{								
				$html.='
				<tr>
					
					<th width="8.3%" align="center">'.$row['nama_uraian'].'</th>
                    <th width="2.9%" align="center">'.$row['hhg'].'</th>
                    <th width="2.9%" align="center">'.$row['jtn'].'</th>
                    <th width="2.9%" align="center">'.$row['kmyr'].'</th>
                    <th width="2.9%" align="center">'.$row['bks'].'</th>
                    <th width="2.9%" align="center">'.$row['depok'].'</th>
                    <th width="2.5%" align="center">'.$row['dm'].'</th>
                    <th width="2.9%" align="center">'.$row['bogor'].'</th>
					<th width="2.9%" align="center">'.$row['pst'].'</th>
					<th width="2.9%" align="center">'.$row['pdrn'].'</th>
					<th width="3.2%" align="center">'.$row['tprahu'].'</th>
					<th width="3.2%" align="center">'.$row['skbm'].'</th>
					<th width="2.9%" align="center">'.$row['tgr'].'</th>
					<th width="2.5%" align="center">'.$row['gw'].'</th>
					<th width="2.9%" align="center">'.$row['arca'].'</th>
					<th width="2.9%" align="center">'.$row['glxy'].'</th>
					<th width="2.9%" align="center">'.$row['plb'].'</th>
					<th width="2.9%" align="center">'.$row['cpt'].'</th>
					<th width="2.9%" align="center">'.$row['mks'].'</th>
					<th width="2.9%" align="center">'.$row['spg'].'</th>
					<th width="3.2%" align="center">'.$row['bymk'].'</th>
					<th width="3%" align="center">'.$row['solo'].'</th>
					<th width="3.2%" align="center">'.$row['ciruas'].'</th>
					<th width="3%" align="center">'.$row['yogya'].'</th>
					<th width="3%" align="center">'.$row['bitung'].'</th>
					<th width="3%" align="center">'.$row['mksr'].'</th>
					<th width="3.4%" align="center">'.$row['blkppn'].'</th>
					<th width="2.9%" align="center">'.$row['mdn'].'</th>
					<th width="2.9%" align="center">'.$row['pdm'].'</th>
					<th width="2.9%" align="center">'.$row['pwt'].'</th>
					<td width="3.8%" align="center">'.$row['capai'].'</td>						
				</tr>';				
			}			
			$html.='</table>';				

			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('TransaksiDIR2.pdf');
?>