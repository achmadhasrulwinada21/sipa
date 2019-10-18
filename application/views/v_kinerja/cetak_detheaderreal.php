<?php
      $pdf = new Tpdf('P', 'mm', 'A4', true, 'UTF-8', false);
      $pdf->setPrintHeader(false);
      $pdf->SetTitle('Data Target Percabang');
      $pdf->SetHeaderMargin(10);
      $pdf->SetTopMargin(10);
      $pdf->SetLeftMargin(15);
      $pdf->setFooterMargin(10);
      $pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
      $pdf->SetAuthor('Author');
      $pdf->SetDisplayMode('real', 'default');
      $pdf->AddPage('P', 'A4');
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
            <td width="100%" align="center">DETAIL<br></td></tr>
                      </thead>
          </table><br> <hr height="2px"> <b style="margin-bottom:4px;"></b> 
          <br> 
          <b>Tanggal Cetak : '.$tgl.' '.$bulan.' '.$thn.'</b><br>
                 <b>JAM : '.$waktusaatini.'</b><br><br>
         <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   
                    
                    
                 </table>';
                 foreach($data_abks as $row) { 
                                           
                             }
                 $html.='
                 <br><br>
                 <b style="margin-left:20px">Nama : '.$row['nama_rs'].'</b><br>
                  <b style="margin-left:20px">Tanggal  : '.$tanggal.'</b><br>
                  <br>
                    <table border="1" cellspacing="0"  cellpadding="2">
                  <thead>
                    <tr align="center" bgcolor="gray" style="color:white;font-weight:bold;">
                      <th style="vertical-align: middle;text-align: center;width:20px;">No</th>
                      <th style="vertical-align: middle;text-align: center;width:110px;">Nama Uraian</th>
                      <th style="vertical-align: middle;text-align: center;">Nilai Real</th>
                      <th style="vertical-align: middle;text-align: center;">Nilat Target Harian</th>
                       
                      
                                                       
                    </tr>
                  </thead>
                  <tbody>';
                    $no=0;
                        
                     foreach($data_abks as $row) { 
                               $no++;                           
                             
                    
                 $html.=' <tr class="info">
                      <td style="vertical-align: middle;text-align: center;width:20px;">'.$no.'</td>
                      <td style="vertical-align: middle;text-align: center;width:110px;">'.$row['nama_uraiankrs'].'</td>
                       <td style="vertical-align: middle;text-align: center;">'.$row['nilai_real'].'</td>
                      <td style="vertical-align: middle;text-align: center;">'.(number_format($row['nilai_targeth'], 0,',','.')).'</td>
                                     
                    </tr>';
                       }                          
                    $html.='         
                  </tbody>
                
                </table><br><br>';
              

         
          

      $pdf->writeHTML($html, true, false, true, false, '');
      $pdf->Output('detail.pdf', 'I');
      
?>