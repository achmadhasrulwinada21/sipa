<?php
$pdf = new TPdf('P', 'mm', true, 'UTF-8', false);
      //remove header
      $pdf->setPrintHeader(false);
      $pdf->SetTitle('Data Report Gabungan');
      $pdf->SetHeaderMargin(2);
      $pdf->SetTopMargin(5);
      $pdf->SetLeftMargin(2);
      $pdf->setFooterMargin(5);
      $pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
      $pdf->SetAuthor('Author');
      $pdf->SetDisplayMode('real', 'default');
      $pdf->AddPage('LEGAL','mm',array(216,356));

      // $periode = $this->db->get('laporanvar')->result();
      //   foreach ($periode as $tr){
          
      //   $html='
          
      //       <table style="text-align:left;font-size:7;">
      //       <tr><td width="100%" align="left">PERIODE BULAN : '.$tr->periode.'</td></tr>
      //     </table><br>';
        
      //   }


      // $pdf->Cell(350,4,'EKSEKUTIF REPORT',0,1,'C');
      //     $pdf->SetFont('helvetica','B',8);
      //     $sql=date('M Y');
      //     $pdf->Cell(350,4,'PENCAPAIAN '.$sql, 0,1,'C');
      //     $pdf->SetFont('helvetica','B',8);
      //     $pdf->Cell(350,4,'HERMINA HOSPITAL GROUP',0,1,'C');

        $pdf->SetFont('helvetica','B',6.5);
        $pdf->SetFillColor(36,96,84);
      function ubahbulan($namabln)
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
      foreach ($cetak_eksvar as $row) 
        {
                $data=date('mY',strtotime($row['periode']));
                $tgl=substr($data,0,2);
                $bulan=ubahbulan(substr($data,3,2));
                $tahun=substr($data,2,4);
}
       

      $html='
      <h3 align="center"> EKSEKUTIF REPORT</h3>
      <h3 align="center">PENCAPAIAN '.$bulan.' '.$tahun.'</h3>
      <h3 align="center">HERMINA HOSPITAL GROUP</h3>
      <br>
      <br>
      <br>      
        <table border="1" cellspacing="0"  cellpadding="1">
            <tr bgcolor="grey" >
            
                      <th width="7%" align="center">URAIAN</th>
                      <th width="3%" align="center">SAS HHG</th>
                      <th width="4.5%" align="center">JTN</th>
                      <th width="3%" align="center">KMYR</th>
                      <th width="3%" align="center">BKS</th>
                      <th width="3%" align="center">DPK</th>
                      <th width="3%" align="center">DM</th>
                      <th width="3%" align="center">BGR</th>
                      <th width="3%" align="center">PST</th>
                      <th width="3%" align="center">PDRN</th>
                      <th width="4%" align="center">TPRAHU</th>
                      <th width="3%" align="center">SKBM</th>
                      <th width="2.5%" align="center">TGR</th>
                      <th width="2.5%" align="center">GW</th>
                      <th width="3%" align="center">ARCA</th>
                      <th width="2.5%" align="center">GLXY</th>
                      <th width="2.5%" align="center">PLB</th>
                      <th width="2.5%" align="center">CPT</th>
                      <th width="2.5%" align="center">MKS</th>
                      <th width="2.5%"align="center">SPG</th>
                      <th width="3%" align="center">BYMK</th>
                      <th width="3%" align="center">SOLO</th>
                      <th width="3.5%" align="center">CIRUAS</th>
                      <th width="3.5%" align="center">YOGYA</th>
                      <th width="3.5%" align="center">BITUNG</th>
                      <th width="3%" align="center">MKSR</th>
                      <th width="2.5%" align="center">BLP</th>
                      <th width="2.5%" align="center">MDN</th>
                      <th width="2.5%" align="center">PDM</th>
                      <th width="2.5%" align="center">PWT</th>
                      <th width="5.5%" align="center">CAPAI</th>
            </tr>';
               
      foreach ($cetak_eksvar as $row) 
        {
          
          $html.='<tr>
              
              
                      <td>'.$row['nama_uraian'].'</td>

                      <td align="center">'.$row['hhg'].'</td>
                      <td align="center">'.$row['jtn'].'</td>
                      <td align="center">'.$row['kmyr'].'</td>
                      <td align="center">'.$row['bks'].'</td>
                      <td align="center">'.$row['depok'].'</td>
                      <td align="center">'. $row['dm'].'</td>
                      <td align="center">'.$row['bogor'].'</td>
                      <td align="center">'.$row['pst'].'</td>
                      <td align="center">'.$row['pdrn'].'</td>
                      <td align="center">'.$row['tprahu'].'</td>
                      <td align="center">'.$row['skbm'].'</td>
                      <td align="center">'.$row['tgr'].'</td>
                      <td align="center">'.$row['gw'].'</td>
                      <td align="center">'.$row['arca'].'</td>
                      <td align="center">'.$row['glxy'].'</td>
                      <td align="center">'.$row['plb'].'</td>
                      <td align="center">'.$row['cpt'].'</td>
                      <td align="center">'.$row['mks'].'</td>
                      <td align="center">'.$row['spg'].'</td>
                      <td align="center">'.$row['bymk'].'</td>
                      <td align="center">'.$row['solo'].'</td>
                      <td align="center">'.$row['ciruas'].'</td>
                      <td align="center">'.$row['yogya'].'</td>
                      <td align="center">'.$row['bitung'].'</td>
                      <td align="center">'.$row['mksr'].'</td>
                      <td align="center">'.$row['blkppn'].'</td>
                      <td align="center">'.$row['mdn'].'</td>
                      <td align="center">'.$row['pdm'].'</td>
                      <td align="center">'.$row['pwt'].'</td>

                      <td align="center" id="id30">'.number_format($row['capai'],2).'</td>
            </tr>';
        }
        
          $html.='</table>';  


          
      
      //$pdf->Output('Report Gabungan.pdf', 'I');


    
      

     
          
        $html.='
          <br><br><br><br>
            <br>';
        
        
 $html.='<br>
            
        <table border="1" cellspacing="0"  cellpadding="1">
            <tr bgcolor="grey" >
            
                      <th width="7%" align="center">URAIAN</th>
                      <th width="3%" align="center">SAS HHG</th>
                      <th width="4.5%" align="center">JTN</th>
                      <th width="3%" align="center">KMYR</th>
                      <th width="3%" align="center">BKS</th>
                      <th width="3%" align="center">DPK</th>
                      <th width="3%" align="center">DM</th>
                      <th width="3%" align="center">BGR</th>
                      <th width="3%" align="center">PST</th>
                      <th width="3%" align="center">PDRN</th>
                      <th width="4%" align="center">TPRAHU</th>
                      <th width="3%" align="center">SKBM</th>
                      <th width="2.5%" align="center">TGR</th>
                      <th width="2.5%" align="center">GW</th>
                      <th width="3%" align="center">ARCA</th>
                      <th width="2.5%" align="center">GLXY</th>
                      <th width="2.5%" align="center">PLB</th>
                      <th width="2.5%" align="center">CPT</th>
                      <th width="2.5%" align="center">MKS</th>
                      <th width="2.5%"align="center">SPG</th>
                      <th width="3%" align="center">BYMK</th>
                      <th width="3%" align="center">SOLO</th>
                      <th width="3.5%" align="center">CIRUAS</th>
                      <th width="3.5%" align="center">YOGYA</th>
                      <th width="3.5%" align="center">BITUNG</th>
                      <th width="3%" align="center">MKSR</th>
                      <th width="2.5%" align="center">BLP</th>
                      <th width="2.5%" align="center">MDN</th>
                      <th width="2.5%" align="center">PDM</th>
                      <th width="2.5%" align="center">PWT</th>
                      <th width="5.5%" align="center">CAPAI</th>
            </tr>';
               
      foreach ($cetak_eks as $row) 
        {
          
          $html.='<tr>
              
                  <td>'.$row['nama_uraian'].'</td>
                  <td align="center" style="background-color: '.$target=$row['hhg_hasmoro'];$real=$row['hhg']; $before=$row['hhg_bulanlalu'];if($real>=$target) echo'#42e2f4';if($real<$before) echo'#ff0000';if($real> $before) echo'#ffffff';.'">'.$row['hhg'].'</td>

                  <td align="center" style="background-color: '.$target=$row['jtn_hasmoro'];$real=$row['jtn']; $before=$row['jtn_bulanlalu'];if($real= $target) echo'#42e2f4';if($real< $before) echo'#ff0000';if($real> $before) echo'#ffffff'.'">'.$row['jtn'].'</td>

                  <td align="center" style="background-color: '. $target=$row['kmyr_hasmoro'];$real=$row['kmyr']; $before=$row['kmyr_bulanlalu'];if($real= $target) echo'#42e2f4';if($real< $before) echo'#ff0000';if($real> $before) echo'#ffffff'.'">'.$row['kmyr'].'</td>

                  <td align="center" style="background-color: '. $target=$row['bks_hasmoro'];$real=$row['bks']; $before=$row['bks_bulanlalu'];if($real= $target) echo'#42e2f4';if($real< $before) echo'#ff0000';if($real> $before) echo'#ffffff'.'">'.$row['bks'].'</td>

                  <td align="center" style="background-color: '.$target=$row['depok_hasmoro'];$real=$row['depok']; $before=$row['depok_bulanlalu'];if($real= $target) echo'#42e2f4';if($real< $before) echo'#ff0000';if($real> $before) echo'#ffffff'.'">'.$row['depok'].'</td>

                  <td align="center" style="background-color: '.$target=$row['dm_hasmoro'];$real=$row['dm']; $before=$row['dm_bulanlalu'];if($real= $target) echo'#42e2f4';if($real< $before) echo'#ff0000';if($real> $before) echo'#ffffff'.'">'. $row['dm'].'</td>

                  <td align="center" style="background-color: '.$target=$row['bogor_hasmoro'];$real=$row['bogor']; $before=$row['bogor_bulanlalu'];if($real= $target) echo'#42e2f4';if($real< $before) echo'#ff0000';if($real> $before) echo'#ffffff'.'">'.$row['bogor'].'</td>

                  <td align="center" style="background-color: '. $target=$row['pst_hasmoro'];$real=$row['pst']; $before=$row['pst_bulanlalu'];if($real= $target) echo'#42e2f4';if($real< $before) echo'#ff0000';if($real> $before) echo'#ffffff'.'">'.$row['pst'].'</td>

                  <td align="center" style="background-color: '. $target=$row['pdrn_hasmoro'];$real=$row['pdrn']; $before=$row['pdrn_bulanlalu'];if($real= $target) echo'#42e2f4';if($real< $before) echo'#ff0000';if($real> $before) echo'#ffffff'.'">'.$row['pdrn'].'</td>

                  <td align="center" style="background-color: '.$target=$row['tprahu_hasmoro'];$real=$row['tprahu']; $before=$row['tprahu_bulanlalu'];if($real= $target) echo'#42e2f4';if($real< $before) echo'#ff0000';if($real> $before) echo'#ffffff'.'">'.$row['tprahu'].'</td>

                  <td align="center" style="background-color: '.$target=$row['skbm_hasmoro'];$real=$row['skbm']; $before=$row['skbm_bulanlalu'];if($real= $target) echo'#42e2f4';if($real< $before) echo'#ff0000';if($real> $before) echo'#ffffff'.'">'.$row['skbm'].'</td>

                  <td align="center" style="background-color: '.$target=$row['tgr_hasmoro'];$real=$row['tgr']; $before=$row['tgr_bulanlalu'];if($real= $target) echo'#42e2f4';if($real< $before) echo'#ff0000';if($real> $before) echo'#ffffff'.'">'.$row['tgr'].'</td>

                  <td align="center" style="background-color: '.$target=$row['gw_hasmoro'];$real=$row['gw']; $before=$row['gw_bulanlalu'];if($real= $target) echo'#42e2f4';if($real< $before) echo'#ff0000';if($real> $before) echo'#ffffff'.'">'.$row['gw'].'</td>

                  <td align="center" style="background-color: '. $target=$row['arca_hasmoro'];$real=$row['arca']; $before=$row['arca_bulanlalu'];if($real= $target) echo'#42e2f4';if($real< $before) echo'#ff0000';if($real> $before) echo'#ffffff'.'">'.$row['arca'].'</td>

                  <td align="center" style="background-color: '.$target=$row['glxy_hasmoro'];$real=$row['glxy']; $before=$row['glxy_bulanlalu'];if($real= $target) echo'#42e2f4';if($real< $before) echo'#ff0000';if($real> $before) echo'#ffffff'.'">'.$row['glxy'].'</td>

                  <td align="center" style="background-color: '.$target=$row['plb_hasmoro'];$real=$row['plb']; $before=$row['plb_bulanlalu'];if($real= $target) echo'#42e2f4';if($real< $before) echo'#ff0000';if($real> $before) echo'#ffffff'.'">'.$row['plb'].'</td>

                  <td align="center" style="background-color: '.$target=$row['cpt_hasmoro'];$real=$row['cpt']; $before=$row['cpt_bulanlalu'];if($real= $target) echo'#42e2f4';if($real< $before) echo'#ff0000';if($real> $before) echo'#ffffff'.'">'.$row['cpt'].'</td>

                  <td align="center" style="background-color: '.$target=$row['mks_hasmoro'];$real=$row['mks']; $before=$row['mks_bulanlalu'];if($real= $target) echo'#42e2f4';if($real< $before) echo'#ff0000';if($real> $before) echo'#ffffff'.'">'.$row['mks'].'</td>

                  <td align="center" style="background-color: '. $target=$row['spg_hasmoro'];$real=$row['spg']; $before=$row['spg_bulanlalu'];if($real= $target) echo'#42e2f4';if($real< $before) echo'#ff0000';if($real> $before) echo'#ffffff'.'">'.$row['spg'].'</td>

                  <td align="center" style="background-color: '.$target=$row['bymk_hasmoro'];$real=$row['bymk']; $before=$row['bymk_bulanlalu'];if($real= $target) echo'#42e2f4';if($real< $before) echo'#ff0000';if($real> $before) echo'#ffffff'.'">'.$row['bymk'].'</td>

                  <td align="center" style="background-color: '. $target=$row['solo_hasmoro'];$real=$row['solo']; $before=$row['solo_bulanlalu'];if($real= $target) echo'#42e2f4';if($real< $before) echo'#ff0000';if($real> $before) echo'#ffffff'.'">'.$row['solo'].'</td>

                  <td align="center" style="background-color: '. $target=$row['ciruas_hasmoro'];$real=$row['ciruas']; $before=$row['ciruas_bulanlalu'];if($real= $target) echo'#42e2f4';if($real< $before) echo'#ff0000';if($real> $before) echo'#ffffff'.'">'.$row['ciruas'].'</td>

                  <td align="center" style="background-color: '. $target=$row['yogya_hasmoro'];$real=$row['yogya']; $before=$row['yogya_bulanlalu'];if($real= $target) echo'#42e2f4';if($real< $before) echo'#ff0000';if($real> $before) echo'#ffffff'.'">'.$row['yogya'].'</td>

                  <td align="center" style="background-color: '.$target=$row['bitung_hasmoro'];$real=$row['bitung']; $before=$row['bitung_bulanlalu'];if($real= $target) echo'#42e2f4';if($real< $before) echo'#ff0000';if($real> $before) echo'#ffffff'.'">'.$row['bitung'].'</td>

                  <td align="center" style="background-color: '.$target=$row['mksr_hasmoro'];$real=$row['mksr']; $before=$row['mksr_bulanlalu'];if($real= $target) echo'#42e2f4';if($real< $before) echo'#ff0000';if($real> $before) echo'#ffffff'.'">'.$row['mksr'].'</td>

                  <td align="center" style="background-color: '.$target=$row['blkppn_hasmoro'];$real=$row['blkppn']; $before=$row['blkppn_bulanlalu'];if($real= $target) echo'#42e2f4';if($real< $before) echo'#ff0000';if($real> $before) echo'#ffffff'.'">'.$row['blkppn'].'</td>

                  <td align="center" style="background-color: '.$target=$row['mdn_hasmoro'];$real=$row['mdn']; $before=$row['mdn_bulanlalu'];if($real= $target) echo'#42e2f4';if($real< $before) echo'#ff0000';if($real> $before) echo'#ffffff'.'">'.$row['mdn'].'</td>

                  <td align="center" style="background-color: '. $target=$row['pdm_hasmoro'];$real=$row['pdm']; $before=$row['pdm_bulanlalu'];if($real= $target) echo'#42e2f4';if($real< $before) echo'#ff0000';if($real> $before) echo'#ffffff'.'">'.$row['pdm'].'</td>

                  <td align="center" style="background-color: '.$target=$row['pwt_hasmoro'];$real=$row['pwt']; $before=$row['pwt_bulanlalu'];if($real= $target) echo'#42e2f4';if($real< $before) echo'#ff0000';if($real> $before) echo'#ffffff'.'">'.$row['pwt'].'</td>




                  <td align="center" id="id30">'.number_format($row['capai'],2).'</td>
            </tr>';
        }
        
          $html.='</table>';
      
       

      
          
      $pdf->writeHTML($html, true, false, true, false, '');
      $pdf->Output('Report Gabungan.pdf', 'I');
      ?>
