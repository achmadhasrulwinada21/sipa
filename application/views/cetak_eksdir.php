<?php
$pdf = new Tpdf('P', 'mm', true, 'UTF-8', false);
      //remove header
      $pdf->setPrintHeader(false);
      $pdf->SetTitle('Data Report Gabungan');
      $pdf->SetHeaderMargin(2);
      $pdf->SetTopMargin(8);
      $pdf->SetLeftMargin(10);
      $pdf->setFooterMargin(5);
      $pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
      $pdf->SetAuthor('Author');
      $pdf->SetDisplayMode('real', 'default');
      $pdf->AddPage('LEGAL','mm',array(216,356));
      $pdf->SetFont('helvetica','B',6.5);

      // $periode = $this->db->get('eksekutifreport')->result();
      //   foreach ($periode as $tr){
          
      //   $html='
          
      //       <table style="text-align:left;font-size:7;">
      //       <tr><td width="100%" align="left">PERIODE BULAN : '.$tr->periode.'</td></tr>
      //     </table><br>';
        
      //   }

          
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

// $pdf->Cell(290,4,'EKSEKUTIF REPORT',0,1,'C');
//           $pdf->SetFont('helvetica','B',8);
//           $pdf->Cell(290,4,'PENCAPAIAN' .$bulan. .$thn. ,0,1);
//           $pdf->SetFont('helvetica','B',8);
//           $pdf->Cell(290,4,'HERMINA HOSPITAL GROUP',0,1,'C');

//         
//         $pdf->SetFillColor(36,96,84);

 $html='
<h3 align="center"> EKSEKUTIF REPORT</h3>
<h3 align="center">PENCAPAIAN '.$bulan.' '.$tahun.'</h3>
<h3 align="center">HERMINA HOSPITAL GROUP</h3>
 <br>
 <br>
 <br>
            
        <table  border="1" cellspacing="0"  cellpadding="1">
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
                      <th width="2.8%" align="center">GLXY</th>
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
                      <th width="6%" align="center">CAPAI</th>
            </tr>';
               
      foreach ($cetak_eks as $row) 
        {

          $real1=$row['hhg'];
          $before1=$row['hhg_bulanlalu']; 
          $target1=$row['hhg_hasmoro'];

          $target2=$row['jtn_hasmoro'];
          $real2=$row['jtn'];
          $before2=$row['jtn_bulanlalu'];


          $target3=$row['kmyr_hasmoro'];
          $real3=$row['kmyr']; 
          $before3=$row['kmyr_bulanlalu'];

          $target4=$row['bks_hasmoro'];
          $real4=$row['bks']; 
          $before4=$row['bks_bulanlalu'];

          $target5=$row['depok_hasmoro'];
          $real5=$row['depok']; 
          $before5=$row['depok_bulanlalu'];


          $target6=$row['dm_hasmoro'];
          $real6=$row['dm'];
          $before6=$row['dm_bulanlalu'];


          $target7=$row['bogor_hasmoro'];
          $real7=$row['bogor']; 
          $before7=$row['bogor_bulanlalu'];


         $target8=$row['pst_hasmoro'];
         $real8=$row['pst']; 
         $before8=$row['pst_bulanlalu'];


         $target9=$row['pdrn_hasmoro'];
         $real9=$row['pdrn']; 
         $before9=$row['pdrn_bulanlalu'];

         $target10=$row['tprahu_hasmoro'];
         $real10=$row['tprahu']; 
         $before10=$row['tprahu_bulanlalu'];

         $target11=$row['skbm_hasmoro'];
         $real11=$row['skbm']; 
         $before11=$row['skbm_bulanlalu'];


         $target12=$row['tgr_hasmoro'];
         $real12=$row['tgr']; 
         $before12=$row['tgr_bulanlalu'];

         $target13=$row['gw_hasmoro'];
         $real13=$row['gw']; 
         $before13=$row['gw_bulanlalu'];

         $target14=$row['arca_hasmoro'];
         $real14=$row['arca']; 
         $before14=$row['arca_bulanlalu'];

         $target15=$row['glxy_hasmoro'];
         $real15=$row['glxy'];
         $before15=$row['glxy_bulanlalu'];

         $target16=$row['plb_hasmoro'];
         $real16=$row['plb']; 
         $before16=$row['plb_bulanlalu'];

         $target17=$row['cpt_hasmoro'];
         $real17=$row['cpt']; 
         $before17=$row['cpt_bulanlalu'];

         $target18=$row['mks_hasmoro'];
         $real18=$row['mks']; 
         $before18=$row['mks_bulanlalu'];

         $target19=$row['spg_hasmoro'];
         $real19=$row['spg']; 
         $before19=$row['spg_bulanlalu'];


         $target20=$row['bymk_hasmoro'];
         $real20=$row['bymk']; 
         $before20=$row['bymk_bulanlalu'];


         $target21=$row['solo_hasmoro'];
         $real21=$row['solo']; 
         $before21=$row['solo_bulanlalu'];


         $target22=$row['ciruas_hasmoro'];
         $real22=$row['ciruas']; 
         $before22=$row['ciruas_bulanlalu'];

         $target23=$row['yogya_hasmoro'];
         $real23=$row['yogya']; 
         $before23=$row['yogya_bulanlalu'];

         $target24=$row['bitung_hasmoro'];
         $real24=$row['bitung']; 
         $before24=$row['bitung_bulanlalu'];


         $target25=$row['mksr_hasmoro'];
         $real25=$row['mksr']; 
         $before25=$row['mksr_bulanlalu'];


         $target26=$row['blkppn_hasmoro'];
         $real26=$row['blkppn']; 
         $before26=$row['blkppn_bulanlalu'];

         $target27=$row['mdn_hasmoro'];
         $real27=$row['mdn']; 
         $before27=$row['mdn_bulanlalu'];


         $target28=$row['pdm_hasmoro'];
         $real28=$row['pdm']; 
         $before28=$row['pdm_bulanlalu'];


         $target29=$row['pwt_hasmoro'];
         $real29=$row['pwt']; 
         $before29=$row['pwt_bulanlalu'];


         
//1.hhg
         if($real1>$target1){

              $warnahhg='#42e2f4';

              #ff7f7f

         }

          

         elseif($real1<$before1){

            $warnahhg='#ff7f7f';

         }

           elseif($real1>=$before1){

            $warnahhg='white';

         }

            if($target1==''){

            $warnahhg='yellow';

         }
//2.jtn
         if($real2>$target2){

              $warnajtn='#42e2f4';

         }



         elseif($real2<$before2){

            $warnajtn='#ff7f7f';

         }

        elseif($real2>=$before2){

            $warnajtn='white';

         }

        if($target2==''){

            $warnajtn='yellow';

         }
 //3.kmyr
         if($real3>$target3){

              $warnakmyr='#42e2f4';

         }




         elseif($real3<$before3){

            $warnakmyr='#ff7f7f';

         }

           elseif($real3>=$before3){

            $warnakmyr='white';

         }
            if($target3==''){

            $warnakmyr='yellow';

         }
//4.bekasi
         if($real4>$target4){

              $warnabks='#42e2f4';

         }


         elseif($real4<$before4){

            $warnabks='#ff7f7f';

         }

           elseif($real4>=$before4){

            $warnabks='white';

         }
            elseif($target4==''){

            $warnabks='yellow';

         }

//5.depok
         if($real5>$target5){

              $warnadepok='#42e2f4';

         }

         elseif($real5<$before5){

            $warnadepok='#ff7f7f';

         }

           elseif($real5>=$before5){

            $warnadepok='white';

         }
            elseif($target5==''){

            $warnadepok='yellow';

         }

//6.DM
         if($real6>$target6){

              $warnadm='#42e2f4';

         }

         elseif($real6<$before6){

            $warnadm='#ff7f7f';

         }

        elseif($real6>=$before6){

            $warnadm='white';

         }

          if($target6==''){

            $warnadm='yellow';

         }


//7.BOGOR
         if($real7>$target7){

              $warnabogor='#42e2f4';

         }

         elseif($real7<$before7){

            $warnabogor='#ff7f7f';

         }

         elseif($real7>=$before7){

            $warnabogor='white';

         }

            if($target7==''){

            $warnabogor='yellow';

         }


//8.PST
         if($real8>$target8){

              $warnapst='#42e2f4';

         }

         elseif($real8<$before8){

            $warnapst='#ff7f7f';

         }

         elseif($real8>=$before8){

            $warnapst='white';

         }

            if($target8==''){

            $warnapst='yellow';

         }


//9.PDRN
         if($real9>$target9){

              $warnapdrn='#42e2f4';

         }

         elseif($real9<$before9){

            $warnapdrn='#ff7f7f';

         }

           elseif($real9>=$before9){

            $warnapdrn='white';

         }

            if($target9==''){

            $warnapdrn='yellow';

         }

//10.TPRAHU
         if($real10>$target10){

              $warnatprahu='#42e2f4';

         }

         elseif($real10<$before10){

            $warnatprahu='#ff7f7f';

         }

           elseif($real10>=$before10){

            $warnatprahu='white';

         }
            if($target10==''){

            $warnatprahu='yellow';

         }

//11.SKBM
         if($real11>$target11){

              $warnaskbm='#42e2f4';

         }

         elseif($real11<$before11){

            $warnaskbm='#ff7f7f';

         }

           elseif($real11>=$before11){

            $warnaskbm='white';

         }
            if($target11==''){

            $warnakbm='yellow';

         }

//12.TGR
         if($real12>$target12){

              $warnatgr='#42e2f4';

         }

         elseif($real12<$before12){

            $warnatgr='#ff7f7f';

         }

           elseif($real12>=$before12){

            $warnatgr='white';

         }
            if($target12==''){

            $warnagr='yellow';

         }


//13.GW
         if($real13>$target13){

              $warnagw='#42e2f4';

         }

         elseif($real13<$before13){

            $warnagw='#ff7f7f';

         }

           elseif($real13>=$before13){

            $warnagw='white';

         }
            if($target13==''){

            $warnagw='yellow';

         }


//14.ARCA
         if($real14>$target14){

              $warnaarca='#42e2f4';

         }

         elseif($real14<$before14){

            $warnaarca='#ff7f7f';

         }

          elseif($real14>=$before14){

            $warnaarca='white';

         }

            if($target14==''){

            $warnaarca='yellow';

         }

//15.GLXY
         if($real15>$target15){

              $warnaglxy='#42e2f4';

         }

         elseif($real15<$before15){

            $warnaglxy='#ff7f7f';

         }

        elseif($real15>=$before15){

            $warnaglxy='white';

         }
            if($target15==''){

            $warnaglxy='yellow';

         }

//16.PLB
         if($real16>$target16){

              $warnaplb='#42e2f4';

         }

         elseif($real16<$before16){

            $warnaplb='#ff7f7f';

         }

         elseif($real16>=$before16){

            $warnaplb='white';

         }

          if($target16==''){

            $warnaplb='yellow';

         }

//17.CPT
         if($real17>$target17){

              $warnacpt='#42e2f4';

         }

         elseif($real17<$before17){

            $warnacpt='#ff7f7f';

         }

          elseif($real17>=$before17){

            $warnacpt='white';

         }

            if($target17==''){

            $warnacpt='yellow';

         }

//18.MKS
         if($real18>$target18){

              $warnamks='#42e2f4';

         }

         elseif($real18<$before18){

            $warnamks='#ff7f7f';

         }

          elseif($real18>=$before18){

            $warnamks='white';

         }

            if($target18==''){

            $warnamks='yellow';

         }


//19.SPG
         if($real19>$target19){

              $warnaspg='#42e2f4';

         }

         elseif($real19<$before19){

            $warnaspg='#ff7f7f';

         }

          elseif($real19>=$before19){

            $warnaspg='white';

         }

            if($target19==''){

            $warnaspg='yellow';

         }

//20.BYMK
         if($real20>$target20){

              $warnabymk='#42e2f4';

         }

         elseif($real20<$before20){

            $warnabymk='#ff7f7f';

         }

         elseif($real20>=$before20){

            $warnabymk='white';

         }
            if($target20==''){

            $warnabymk='yellow';

         }


//21.SOLO
         if($real21>$target21){

              $warnasolo='#42e2f4';

         }

         elseif($real21<$before21){

            $warnasolo='#ff7f7f';

         }

          elseif($real21>=$before21){

            $warnasolo='white';

         }

            if($target21==''){

            $warnasolo='yellow';

         }


//22.CIRUAS
         if($real22>$target22){

              $warnaciruas='#42e2f4';

         }

         elseif($real22<$before22){

            $warnaciruas='#ff7f7f';

         }

          elseif($real22>=$before22){

            $warnaciruas='white';

         }

            if($target22==''){

            $warnaciruas='yellow';

         }

//23.YOGYA
         if($real23>$target23){

              $warnayogya='#42e2f4';

         }

         elseif($real23<$before23){

            $warnayogya='#ff7f7f';

         }

         elseif($real23>=$before23){

            $warnayogya='white';

         }

            if($target23==''){

            $warnayogya='yellow';

         }

//24.BITUNG
         if($real24>$target24){

              $warnabitung='#42e2f4';

         }

         elseif($real24<$before24){

            $warnabitung='#ff7f7f';

         }

          elseif($real24>=$before24){

            $warnabitung='white';

         }

            if($target24==''){

            $warnabitung='yellow';

         }


//25.MKSR
         if($real25>$target25){

              $warnamksr='#42e2f4';

         }

         elseif($real25<$before25){

            $warnamksr='#ff7f7f';

         }

          elseif($real25>=$before25){

            $warnamksr='white';

         }

            if($target25==''){

            $warnamksr='yellow';

         }



//26.BLP
         if($real26>$target26){

              $warnablp='#42e2f4';

         }

         elseif($real26<$before26){

            $warnablp='#ff7f7f';

         }

          elseif($real26>=$before26){

            $warnablp='white';

         }

            if($target26==''){

            $warnablp='yellow';

         }


//27.MDN
         if($real27>$target27){

              $warnamdn='#42e2f4';

         }

         elseif($real27<$before27){

            $warnamdn='#ff7f7f';

         }

          elseif($real27>=$before27){

            $warnamdn='white';

         }

            if($target27==''){

            $warnamdn='yellow';

         }



//28.PDM
         if($real28>$target28){

              $warnapdm='#42e2f4';

         }

         elseif($real28<$before28){

            $warnapdm='#ff7f7f';

         }

          elseif($real28>=$before28){

            $warnapdm='white';

         }

            if($target28==''){

            $warnapdm='yellow';

         }

//29.PWT
         if($real29>$target29){

              $warnapwt='#42e2f4';

         }

         elseif($real29<$before29){

            $warnapwt='#ff7f7f';

         }

          elseif($real29>=$before29){

            $warnapwt='white';

         }

            if($target29==''){

            $warnapwt='yellow';

         }







          $html.='<tr>
              
                  <td>'.$row['nama_uraian'].'</td>
                  <td align="center"  >'.$row['hhg'].'</td>
                  <td align="center" style="background-color:'.$warnajtn.'" >'.$row['jtn'].'</td>
                  <td align="center" style="background-color:'.$warnakmyr.'" >'.$row['kmyr'].'</td>
                  <td align="center" style="background-color:'.$warnabks.'">'.$row['bks'].'</td>
                  <td align="center" style="background-color:'.$warnadepok.'">'.$row['depok'].'</td>
                  <td align="center" style="background-color:'.$warnadm.'">'. $row['dm'].'</td>
                  <td align="center" style="background-color:'.$warnabogor.'">'.$row['bogor'].'</td>
                  <td align="center" style="background-color:'.$warnapst.'">'.$row['pst'].'</td>
                  <td align="center" style="background-color:'.$warnapdrn.'">'.$row['pdrn'].'</td>
                  <td align="center" style="background-color:'.$warnatprahu.'">'.$row['tprahu'].'</td>
                  <td align="center" style="background-color:'.$warnaskbm.'">'.$row['skbm'].'</td>
                  <td align="center" style="background-color:'.$warnatgr.'">'.$row['tgr'].'</td>
                  <td align="center" style="background-color:'.$warnagw.'">'.$row['gw'].'</td>
                  <td align="center" style="background-color:'.$warnaarca.'">'.$row['arca'].'</td>
                  <td align="center" style="background-color:'.$warnaglxy.'">'.$row['glxy'].'</td>
                  <td align="center" style="background-color:'.$warnaplb.'">'.$row['plb'].'</td>
                  <td align="center" style="background-color:'.$warnacpt.'">'.$row['cpt'].'</td>
                  <td align="center" style="background-color:'.$warnamks.'">'.$row['mks'].'</td>
                  <td align="center" style="background-color:'.$warnaspg.'">'.$row['spg'].'</td>
                  <td align="center" style="background-color:'.$warnabymk.'">'.$row['bymk'].'</td>
                  <td align="center" style="background-color:'.$warnasolo.'">'.$row['solo'].'</td>
                  <td align="center" style="background-color:'.$warnaciruas.'">'.$row['ciruas'].'</td>
                  <td align="center" style="background-color:'.$warnayogya.'">'.$row['yogya'].'</td>
                  <td align="center" style="background-color:'.$warnabitung.'">'.$row['bitung'].'</td>
                  <td align="center" style="background-color:'.$warnamksr.'">'.$row['mksr'].'</td>
                  <td align="center" style="background-color:'.$warnablp.'">'.$row['blkppn'].'</td>
                  <td align="center" style="background-color:'.$warnamdn.'">'.$row['mdn'].'</td>
                  <td align="center" style="background-color:'.$warnapdm.'">'.$row['pdm'].'</td>
                  <td align="center" style="background-color:'.$warnapwt.'">'.$row['pwt'].'</td>
                 
                  <td align="center" id="id30">'.number_format($row['capai'],2).'</td>
            </tr>';

         
       


        


          




      
        }
        
          $html.='</table>';
    
      $pdf->writeHTML($html, true, false, true, false, '');
      $pdf->Output('Report Gabungan.pdf', 'I');
      ?>
