<?php
      $pdf = new Tpdf('P', 'mm', 'LEGAL', true, 'UTF-8', false);
      $pdf->setPrintHeader(false);
      $pdf->SetTitle('ANGGARAN');
      $pdf->SetHeaderMargin(10);
      $pdf->SetTopMargin(10);
      $pdf->SetLeftMargin(15);
      $pdf->setFooterMargin(10);
      $pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
      $pdf->SetAuthor('Author');
      $pdf->SetDisplayMode('real', 'default');
      $pdf->AddPage('P', 'LEGAL');
      $pdf->SetFont('helvetica', '', 8);  
      $pdf->Image('assets/upload/hhg-logo.png',15,2,25,25,'PNG');

      function ubahbulan($namabln)
{
  switch($namabln){
  case 1:
  return 'Januari';
  break;
  case 2:
  return 'Februari';
  break;
  case 3:
  return 'Maret';
  break;
  case 4:
  return 'April';
  break;
  case 5:
  return 'Mei';
  break;
  case 6:
  return 'Juni';
  break;
  case 7:
  return 'Juli';
  break;
  case 8:
  return 'Agustus';
  break;
  case 9:
  return 'September';
  break;
  case 10:
  return 'Oktober';
  break;
  case 11:
  return 'November';
  break;
  case 12:
  return 'Desember';
  break;
  default:
  echo $namabln;
  break;
  }
}
                date_default_timezone_set("Asia/Jakarta");
                $data=date('d m Y');
                $tgl=substr($data,0,2);
                $bulan=ubahbulan(substr($data,3,2));
                $thn=substr($data,6,4); 
                $waktusaatini =date("H:i:s"); 

                $data=date('d m Y',strtotime($abk->tanggal_acara));
                $tgl1=substr($data,0,2);
                $bulan1=ubahbulan(substr($data,3,2));
                $thn1=substr($data,6,4);
      
      $html='
      <style>
        table thead 
      {
        display: table-header-group;
      }
      
      </style> 

          <table border="0" cellspacing="1" cellpadding="2" style="text-align:center;font-weight:bold;font-size:14;">
          <thead>
            <tr>
            <td width="100%" align="center">ANGGARAN REALISASI<br></td></tr>
                      </thead>
          </table><br> <hr height="2px"> <b style="margin-bottom:4px;"></b> 
          <br> 
          <b>Tanggal Cetak : '.$tgl.' '.$bulan.' '.$thn.'</b><br>
                 <b>JAM : '.$waktusaatini.'</b><br><br>
         <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr>
                  
                    <td width="120"><b>NAMA ACARA</b></td><td width="10">:</td><td width="300"><b>'. $abk->nama_kegiatan.'</b> </td></tr>';
                      if($abk->departemen !='-' and  $abk->nama_rs =='-' ): 
                  $html.='<tr><td width="120"><b>DEPARTEMEN</b></td><td width="10">:</td><td width="300"><b>'.$abk->departemen.'</b> </td></tr>';
                     endif;
                      if( $abk->nama_rs !='-' and $abk->departemen =='-' ):
                  $html.='<tr>   <td width="120"><b>RUMAH SAKIT</b></td><td width="10">:</td><td width="300"><b>'.$abk->nama_rs.'</b> </td>
                   </tr>';
                   endif;
                 $html.='<tr>   <td width="120"><b>TANGGAL ACARA</b></td><td width="10">:</td><td width="300"><b>'.$tgl1.' '.$bulan1.' '.$thn1.'</b> </td>
                   </tr>
                    
                 </table>
                 <br><br>
                  <b style="margin-left:20px">A. SUMBER DANA</b><br><br>
                    <table border="1" cellspacing="0"  cellpadding="2">
                  <thead>
                    <tr align="center" bgcolor="gray" style="color:white;font-weight:bold;">
                      <th style="vertical-align: middle;text-align: center;width:20px;">No</th>
                      <th style="vertical-align: middle;text-align: center;width:193px;">Sumber Dana</th>
                      <th style="vertical-align: middle;text-align: center;">Jumlah</th>
                      <th style="vertical-align: middle;text-align: center;">Harga</th>
                      <th style="vertical-align: middle;text-align: center;">Total</th>
                      
                                                       
                    </tr>
                  </thead>
                  <tbody>';
                    $no=0;
                        $total=0;
                     foreach($dana as $row) { 
                               $no++;                           
                             
                    
                 $html.=' <tr class="info">
                      <td style="vertical-align: middle;text-align: center;width:20px;">'.$no.'</td>
                      <td style="vertical-align: middle;text-align: center;width:width:193px;">'.$row['sumber_dana'].'</td>
                       <td style="vertical-align: middle;text-align: center;">'.$row['qty'].'</td>
                      <td style="vertical-align: middle;text-align: center;">Rp.'.(number_format($row['harga'], 0,',','.')).',-</td>
                      <td style="vertical-align: middle;text-align: center;">Rp.'.(number_format($row['total'], 0,',','.')).',- </td>                   
                    </tr>';
                                                 
                              $total+=$row['total'];
                             }

                          $html.='<tr style="background-color:#AFEEEE">
                               <td colspan="4" style="vertical-align:middle;text-align:center;"><b>JUMLAH</b></td>
                                <td style="vertical-align: middle;text-align: center;">Rp.'.(number_format($total, 0,',','.')).',-</td>
                             </tr>
                  </tbody>
                
                </table><br><br>';

         $html.='<b style="margin-left:20px">B. REALISASI BIAYA</b><br><br>
                <table border="1" cellspacing="0"  cellpadding="2">
                  <thead>
                    <tr align="center" bgcolor="gray" style="color:white;font-weight:bold;">
                     <th colspan="2" style="vertical-align: middle;text-align: center;">Rencana Anggaran</th>
                      <th style="vertical-align: middle;text-align: center;">Jumlah Rencana</th>
                      <th style="vertical-align: middle;text-align: center;">Harga Rencana</th>
                       <th style="vertical-align: middle;text-align: center;">Jumlah Real</th>
                      <th style="vertical-align: middle;text-align: center;">Harga Real</th>
                      <th style="vertical-align: middle;text-align: center;">Perencanaan</th>
                      <th style="vertical-align: middle;text-align: center;">Realisasi</th>
                                                                            
                    </tr>
                  </thead>
                  <tbody>';
                         $no=0;
                         $rencana=0;
                         $real=0;
                         $jum = 1;
                         // $selisih=0;
                        foreach($data_abks as $row) { 
                               $no++;                             
                               
                      
                    $html.='<tr>';
                    if($jum <= 1) {
                     $html.='
                      <td rowspan="'.$row['jumlah1'].'" style="line-height:20px;text-align: center;">'.$row['nama_sesi'].'</td>';
                      $jum = $row['jumlah1'];      
                                          
                      } else {
                    $jum = $jum - 1;
                          }
$html.='
                     <td style="text-align: justify;" >'.$row['kegiatan'].'</td>
                      <td style="text-align: center;">'.(number_format($row['jumlah'], 0,',','.')).'</td>
                      <td style="text-align: justify;">Rp.'.(number_format($row['harga'], 0,',','.')).',-</td>
                       <td style="text-align: center;">'.(number_format($row['jumlah_real'], 0,',','.')).'</td>
                      <td style="text-align: justify;">Rp.'.(number_format($row['harga_real'], 0,',','.')).',-</td>
                      <td style="text-align: justify;">Rp.'.(number_format($row['perencanaan'], 0,',','.')).',- </td>
                      <td style="text-align: justify;">Rp.'.(number_format($row['realisasi'], 0,',','.')).',-</td>
                                                               
                    </tr>';
                              
                              
                              $rencana+=$row['perencanaan'];
                              $real+=$row['realisasi'];
                                }

                             $html.='<tr style="background-color:#AFEEEE">
                               <td colspan="6" style="vertical-align:middle;text-align:center;"><b>JUMLAH</b></td>
                                <td style="vertical-align: middle;text-align: justify;">Rp.'.(number_format($rencana, 0,',','.')).',-</td>
                                <td style="text-align: justify;">Rp.'.(number_format($real, 0,',','.')).',-</td>
                                </tr>
                  </tbody>
                
                </table>';
               $html.='<br><br>
              <b style="margin-left:20px">C. SELISIH PENDAPATAN DAN PENGELUARAN BIAYA</b><br><br>
                 <table border="1" cellspacing="0"  cellpadding="2">
                  <thead>
                    <tr align="center" bgcolor="gray" style="color:white;font-weight:bold;">
                      <th style="vertical-align: middle;text-align: center;width:width:193px;">Total Pendapatan</th>
                      <th style="vertical-align: middle;text-align: center;width:172px;">Total Pengeluaran</th>
                      <th style="vertical-align: middle;text-align: center;width:171px;">Total Selisih</th>
                                           
                                                       
                    </tr>
                  </thead>
                  <tbody>';
                 $hasil=$real-$total; 
                    $html.='<tr style="background-color:#AFEEEE">
                      <td style="vertical-align: middle;text-align: center;width:193px;">Rp.'.(number_format($total, 0,',','.')).',-</td>
                       <td style="vertical-align: middle;text-align: center;width:172px;">Rp.'.(number_format($real, 0,',','.')).',-</td>
                      <td style="vertical-align: middle;text-align: center;width:171px;">Rp.'.(number_format($hasil, 0,',','.')).',-</td>              
                    </tr>
                             
                   
                              
                  </tbody>
                
                </table>';
          

      $pdf->writeHTML($html, true, false, true, false, '');
      $pdf->Output('Anggaran.pdf', 'I');
      
?>