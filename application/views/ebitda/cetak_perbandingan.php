<?php
      $pdf = new Tpdf('P', 'mm', 'LEGAL', true, 'UTF-8', false);
      $pdf->setPrintHeader(false);
      $pdf->SetTitle('ebitda');
      $pdf->SetHeaderMargin(10);
      $pdf->SetTopMargin(12);
      $pdf->SetLeftMargin(10);
      $pdf->setFooterMargin(10);
      $pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
      $pdf->SetAuthor('Author');
      $pdf->SetDisplayMode('real', 'default');
      $pdf->AddPage('L', 'LEGAL');
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

                // $data=date('d m Y',strtotime($abk->tanggal_acara));
                // $tgl1=substr($data,0,2);
                // $bulan1=ubahbulan(substr($data,3,2));
                // $thn1=substr($data,6,4);
      
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
            <th width="100%" align="center">LAPORAN EBITDA<br></th></tr>
                      </thead>
          </table><br> <hr height="2px"> <b style="margin-bottom:4px;"></b> 
          <br> 
          <b>Tanggal Cetak : '.$tgl.' '.$bulan.' '.$thn.'</b><br>
                 <b>JAM : '.$waktusaatini.'</b><br><br>
         <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;"><thead>
          <tr> <th width="120"><b>RUMAH SAKIT</b></th><th width="10">:</th><th width="300"><b>'.$namars.'</b> </th></tr>';
                  
                 $html.='<tr>   <th width="120"><b>PERIODE</b></th><th width="10">:</th><th width="300"><b>'.$periode_awal.' s/d '.$periode_akhir.'</b> </th>
                   </tr>
                    </thead>
                 </table>
                 <br><br>';
                 
         $html.='<p style="margin-left:30%"><b>EBITDA PER BULAN</b></p><br><br>
                <table border="1" cellspacing="0"  cellpadding="2">
                  <thead>
                     <tr align="center" bgcolor="skyblue" style="vertical-align: middle;text-align: center;line-height:15px;">
                      <th style="vertical-align: middle;text-align: center;" rowspan="2">NO</th>
                      <th style="vertical-align: middle;text-align: center;font-size:7;" rowspan="2">PERIODE</th>
                       <th style="vertical-align: middle;text-align: center;" colspan="2">JANUARI</th>
                      <th style="vertical-align: middle;text-align: center;" colspan="2">FEBRUARI</th>
                       <th style="vertical-align: middle;text-align: center;" colspan="2">MARET</th>
                      <th style="vertical-align: middle;text-align: center;" colspan="2">APRIL</th>
                      <th style="vertical-align: middle;text-align: center;" colspan="2">MEI</th>
                      <th style="vertical-align: middle;text-align: center;" colspan="2">JUNI</th>
                       <th style="vertical-align: middle;text-align: center;" colspan="2">JULI</th>
                      <th style="vertical-align: middle;text-align: center;" colspan="2">AGUSTUS</th>
                       <th style="vertical-align: middle;text-align: center;" colspan="2">SEPTEMBER</th>
                      <th style="vertical-align: middle;text-align: center;" colspan="2">OKTOBER</th>
                       <th style="vertical-align: middle;text-align: center;" colspan="2">NOVEMBER</th>
                      <th style="vertical-align: middle;text-align: center;" colspan="2">DESEMBER</th>
                    </tr>
                     <tr align="center" bgcolor="skyblue" style="vertical-align: middle;text-align: center;line-height:15px;">
                      <th style="vertical-align: middle;text-align: center;">Target</th>
                      <th style="vertical-align: middle;text-align: center;" >Real</th>
                       <th style="vertical-align: middle;text-align: center;">Target</th>
                      <th style="vertical-align: middle;text-align: center;" >Real</th>
                      <th style="vertical-align: middle;text-align: center;">Target</th>
                      <th style="vertical-align: middle;text-align: center;" >Real</th>
                      <th style="vertical-align: middle;text-align: center;">Target</th>
                      <th style="vertical-align: middle;text-align: center;" >Real</th>
                      <th style="vertical-align: middle;text-align: center;">Target</th>
                      <th style="vertical-align: middle;text-align: center;" >Real</th>
                      <th style="vertical-align: middle;text-align: center;">Target</th>
                      <th style="vertical-align: middle;text-align: center;" >Real</th>
                      <th style="vertical-align: middle;text-align: center;">Target</th>
                      <th style="vertical-align: middle;text-align: center;" >Real</th>
                      <th style="vertical-align: middle;text-align: center;">Target</th>
                      <th style="vertical-align: middle;text-align: center;" >Real</th>
                      <th style="vertical-align: middle;text-align: center;">Target</th>
                      <th style="vertical-align: middle;text-align: center;" >Real</th>
                      <th style="vertical-align: middle;text-align: center;">Target</th>
                      <th style="vertical-align: middle;text-align: center;" >Real</th>
                      <th style="vertical-align: middle;text-align: center;">Target</th>
                      <th style="vertical-align: middle;text-align: center;" >Real</th>
                      <th style="vertical-align: middle;text-align: center;">Target</th>
                      <th style="vertical-align: middle;text-align: center;" >Real</th>
                    </tr>
                  </thead>
                  <tbody>';
                       
                            $no=0;
                         
                     foreach($data_ebitda as $row) { 
                       $no++;                              
                             
                                          
                                     
                     $html.='<tbody>
                   
                    <tr class="info"  style="vertical-align: middle;text-align: center;line-height:15px;">
                       <td>'.$no.'</td>
                      <td>'.$row['periode'].'</td>
                      <td>'.$row['nilai_targetjan'].'</td>
                      <td>'.$row['nilai_realjan'].'</td>
                        <td>'.$row['nilai_targetfeb'].'</td>
                      <td>'.$row['nilai_realfeb'].'</td>
                       <td>'.$row['nilai_targetmar'].'</td>
                      <td>'.$row['nilai_realmar'].'</td>
                       <td>'.$row['nilai_targetapr'].'</td>
                      <td>'.$row['nilai_realapr'].'</td>
                       <td>'.$row['nilai_targetmei'].'</td>
                      <td>'.$row['nilai_realmei'].'</td>
                       <td>'.$row['nilai_targetjuni'].'</td>
                      <td>'.$row['nilai_realjuni'].'</td>
                       <td>'.$row['nilai_targetjuli'].'</td>
                      <td>'.$row['nilai_realjuli'].'</td>
                       <td>'.$row['nilai_targetagust'].'</td>
                      <td>'.$row['nilai_realagust'].'</td>
                       <td>'.$row['nilai_targetsept'].'</td>
                      <td>'.$row['nilai_realsept'].'</td>
                       <td>'.$row['nilai_targetokt'].'</td>
                      <td>'.$row['nilai_realokt'].'</td>
                       <td>'.$row['nilai_targetnov'].'</td>
                      <td>'.$row['nilai_realnov'].'</td>
                       <td>'.$row['nilai_targetdes'].'</td>
                      <td>'.$row['nilai_realdes'].'</td>
                      </tr>';
                   } 
                              

                             
                 $html.='  </tbody>
                
                </table><br><br><br>';

                $html.=' <script src="<?php echo base_url(assets/js/Chart.js); ?>"></script>
                 <div class="table-responsive">
                <div class="box-body">

                 <table id="" class="table table-bordered table-striped">
                  <thead>
                   <div class="container" style="min-width: 2px;
 height: 2px; margin: 0 auto"></div>
            <canvas id="demobar6" style="margin-left: 10px" width="150" height="75"></canvas>
    </div>

        <script  type="text/javascript">

        var ctx = document.getElementById("demobar6").getContext("2d");
        var data = {
                  labels: ["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"],
                  datasets: [
                  {
                    label: '.$periode_awal.',
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(201, 29, 29, 1)",
                    borderColor: "rgba(201, 29, 29, 1)",
                    pointHoverBackgroundColor: "rgba(201, 29, 29, 1)",
                    
                    pointHoverBorderColor: "rgba(59, 100, 222, 1)",
                    data: ['.foreach($realbul as $p.' ) 
                      { 
                        echo ' . $p['nilai_realjan'] . ',' . $p['nilai_realfeb'] . ',' . $p['nilai_realmar'] . ',' . $p['nilai_realapr'] . ',' . $p['nilai_realmei'] . ',' . $p['nilai_realjuni'] . ',' . $p['nilai_realjuli'] . ',' . $p['nilai_realagust'] . ',' . $p['nilai_realsept'] . ',' . $p['nilai_realokt'] . ',' . $p['nilai_realnov'] . ',' . $p['nilai_realdes'] . ';
                      '.}.'
                      ]
                  },
                {
                    label: '.$periode_akhir.',
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(59, 100, 222, 1)",
                    borderColor: "rgba(59, 100, 222, 1)",
                    pointHoverBackgroundColor: "rgba(59, 100, 222, 1)",
                    data: [<?php '.foreach($realbul1 as $p ) 
                      { 
                        echo ' . $p['nilai_realjan'] . ',' . $p['nilai_realfeb'] . ',' . $p['nilai_realmar'] . ',' . $p['nilai_realapr'] . ',' . $p['nilai_realmei'] . ',' . $p['nilai_realjuni'] . ',' . $p['nilai_realjuli'] . ',' . $p['nilai_realagust'] . ',' . $p['nilai_realsept'] . ',' . $p['nilai_realokt'] . ',' . $p['nilai_realnov'] . ',' . $p['nilai_realdes'] . ';
                      }.'
                      ?>]
                  },

                  {
                    label: "Target" '.$periode_akhir.',
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "orange",
                    borderColor: "orange",
                    pointHoverBackgroundColor: "rgba(255,150,0,0.5)",
                    data: [<?php '.foreach($targetbul as $p ) 
                      { 
                        echo ' . $p['nilai_targetjan'] . ',' . $p['nilai_targetfeb'] . ',' . $p['nilai_targetmar'] . ',' . $p['nilai_targetapr'] . ',' . $p['nilai_targetmei'] . ',' . $p['nilai_targetjuni'] . ',' . $p['nilai_targetjuli'] . ',' . $p['nilai_targetagust'] . ',' . $p['nilai_targetsept'] . ',' . $p['nilai_targetokt'] . ',' . $p['nilai_targetnov'] . ',' . $p['nilai_targetdes'] . ';
                      }.'
                      ?>]
                  }
                  
                  ]
                  };

        var myBarChart = new Chart(ctx, {
                  type: "line",
                  data: data,
                  options: {
                  barValueSpacing: 20,
                  scales: {
                    yAxes: [{
                        ticks: {
                            min: 0,
                        }
                    }],
                    xAxes: [{
                                gridLines: {
                                    color: "rgba(0, 0, 0, 0)",
                                }
                            }]
                    }
                }
              });
      </script>


                ';

               $html.=' <p style="margin-left:30%"><b>EBITDA PER TRIWULAN</b></p><br><br>
               <table border="1">
                  <thead>
                    <tr bgcolor="skyblue">
                      <th style="text-align: center;line-height:15px;" rowspan="2">NO</th>
                      <th style="text-align: center;line-height:15px;" rowspan="2">PERIODE</th>
                       <th style="text-align: center;line-height:15px;" colspan="2">TRIWULAN I</th>
                      <th style="text-align: center;line-height:15px;" colspan="2">TRIWULAN II</th>
                       <th style="text-align: center;line-height:15px;" colspan="2">TRIWULAN III</th>
                      <th style="text-align: center;line-height:15px;" colspan="2">TRIWULAN IV</th>
                  </tr></thead><thead>
                     <tr bgcolor="skyblue">
                      <th style="text-align: center;line-height:15px;">Target</th>
                      <th style="text-align: center;line-height:15px;" >Real</th>
                       <th style="text-align: center;line-height:15px;">Target</th>
                      <th style="text-align: center;line-height:15px;" >Real</th>
                      <th style="text-align: center;line-height:15px;">Target</th>
                      <th style="text-align: center;line-height:15px;" >Real</th>
                      <th style="text-align: center;line-height:15px;">Target</th>
                      <th style="text-align: center;line-height:15px;" >Real</th>
                    </tr>
                  </thead>
                  ';
                   $no=0;
                         
                     foreach($data_ebitdatri as $row) { 
                       $no++;                              
                             
                  
                    $html.='<tbody> <tr>
                       <td style="text-align: center;line-height:15px;">'.$no.'</td>
                      <td style="text-align: center;line-height:15px;">'.$row['periode'].'</td>
                      <td style="text-align: center;line-height:15px;">'.$row['target_triwulan_1'].'</td>
                      <td style="text-align: center;line-height:15px;">'.$row['real_triwulan_1'].'</td>
                        <td style="text-align: center;line-height:15px;">'.$row['target_triwulan_2'].'</td>
                      <td style="text-align: center;line-height:15px;">'.$row['real_triwulan_2'].'</td>
                       <td style="text-align: center;line-height:15px;">'.$row['target_triwulan_3'].'</td>
                      <td style="text-align: center;line-height:15px;">'.$row['real_triwulan_3'].'</td>
                       <td style="text-align: center;line-height:15px;">'.$row['target_triwulan_4'].'</td>
                      <td style="text-align: center;line-height:15px;">'.$row['real_triwulan_4'].'</td>
                      </tr>';
                   } 
                           $html.='    </tbody>
                
                </table><br><br>';

                $html.=' <p style="margin-left:30%"><b>EBITDA PER TAHUN</b></p><br><br>
                <table border="1" cellspacing="0"  cellpadding="2">
                  <thead>
                    <tr bgcolor="skyblue">
                      <th style="text-align: center;line-height:15px;">NO</th>
                      <th style="text-align: center;line-height:15px;">PERIODE</th>
                       <th style="text-align: center;line-height:15px;">TARGET</th>
                      <th style="text-align: center;line-height:15px;">REAL</th>
                    </tr>
                  </thead>
                  <tbody>';
                    $no=0;
                         
                     foreach($data_ebitdatahun as $row) { 
                       $no++;                              
                             
                     
                  $html.='  <tr>
                       <td style="text-align: center;line-height:15px;">'.$no.'</td>
                      <td style="text-align: center;line-height:15px;">'.$row['periode'].'</td>
                      <td style="text-align: center;line-height:15px;">'.$row['target_tahun'].'</td>
                      <td style="text-align: center;line-height:15px;">'.$row['real_tahun'].'</td>
                      </tr>';
                   } 
                         $html.='       </tbody>
                
                </table><br><br><br>';
               
             
          

      $pdf->writeHTML($html, true, false, true, false, '');
      $pdf->Output('ebitda.pdf', 'I');
      
?>