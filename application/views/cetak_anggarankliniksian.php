<?php

			$pdf = new Tpdf('P', 'mm', 'LEGAL', true, 'UTF-8', false);
			//remove header
			$pdf->SetPrintHeader(false);
			$pdf->SetTitle('Anggaran Biaya Klinik Siang');
			$pdf->SetHeaderMargin(10);
			$pdf->SetTopMargin(10);
			$pdf->SetLeftMargin(4);
			$pdf->SetFooterMargin(8);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage('P','LEGAL');
			$pdf->SetFont('helvetica', '', 12);
			
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

			$html='<br>
			<style>
				table thead 
			{
				display: table-header-group;
			}
			
			</style> 
					<table border="0" cellspacing="1" cellpadding="2" style="text-align:center;font-weight:bold;font-size:14;">
					<thead>
						<tr><td width="100%" align="center">Anggaran</td></tr>
          	</thead>
					</table> <br>';

          date_default_timezone_set("Asia/Jakarta");

                $data=date('d m Y');
                $tgl=substr($data,0,2);
                $bulan=ubahbulan(substr($data,3,2));
                $thn=substr($data,6,4);

          $waktusaatini =date("H:i:s");
         $html.='
                 <p>Tanggal Cetak : '.$tgl.' '.$bulan.' '.$thn.'</p>
                 <p>JAM : '.$waktusaatini.'</p>

                  <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr>
                  
                     <td width="120">NAMA ACARA</td><td width="10">:</td><td width="300">'.$header->nama_acara.'</td></tr>
                      <tr>   <td width="120">RUANGAN</td><td width="10">:</td><td width="300">'.$header->ruangan.'</td>
                   </tr>
                    <tr>  <td width="120">DEPARTEMEN</td><td width="10">:</td><td width="300">'.$header->departemen.'</td></tr>
                    <tr>   <td width="120">RUMAH SAKIT</td><td width="10">:</td><td width="300">'.$header->rumah_sakit.'</td>
                   </tr>
                   </table>
                 <br><br><br>
            
        	 <table border="1">
                  <thead>
                    <tr>
                      <th style="width:6%;text-align: center;">NO</th>
                      <th style="text-align: center;width:36%;">KEBUTUHAN</th>
                      <th style="text-align: center;">JUMLAH</th>
                      <th style="text-align: center;">HARGA</th>
                      <th style="text-align: center;">SUBTOTAL</th>
                     </tr>
                  </thead>';
						
           
                    $no=0;
                    $total_awal=0;
                    $total_akhir=0;
                    $totala=0;
                    $totalb=0;
           
                     foreach($detail as $key => $row) { 
                               $no++ ;                            
                            
           $html.='<tbody>         
                    <tr>
                      <td  style="width:6%;font-size:10;line-height:15px;text-align: center;">'.$no.'</td>
                      <td  style="font-size:10;width:36%;line-height:15px;text-align: left;"> '.$row['nama_kebutuhan'].'</td>
                      <td style="font-size:10;line-height:15px;text-align: center;">'.$row['jumlah'].'</td>
                      <td  style="font-size:10;line-height:15px;text-align: center;">Rp.'.(number_format($row['harga'],0,',','.')).',-</td>
                      <td  style="font-size:10;line-height:15px;text-align: center;">Rp.'.(number_format($row['subtotal'], 0,',','.')).',-</td>
                      </tr>';
                        // SUB TOTAL per sesi
                               $total_awal += $row['subtotal'];
                               $total = $row['sesi'];
                                  if (@$detail[$key+1]['sesi'] != $row['sesi']) {

                                       $html.='<tr class="subtotal">
                                            <td  style="font-size:10;line-height:15px;text-align: center;"colspan="4" bgcolor="skyblue"><b>SUBTOTAL '. $total .' </b></td>
                                             <td  style="font-size:10;line-height:15px;text-align: center;" bgcolor="skyblue"   class="right">Rp.'.number_format($total_awal, 0,',','.').',-</td></tr>';
                                            $total_awal = 0;
                                              } 
                  
                            
                                    $totala += $row['subtotal'];
                                         }
                                                          
                                
                                     $html.='<tr>
                                             <td style="font-size:10;line-height:15px;text-align: center;color:blue;" colspan="4" bgcolor="skyblue" ><b>GRAND TOTAL</b></td>
                                             <td  style="font-size:10;line-height:15px;text-align: center;color:blue;"  bgcolor="skyblue" class="right">Rp.'.number_format($totala, 0,',','.').',-</td>
                                              </tr></tbody></table>';
                                  
            $pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('Anggaran_Biaya_Klinik_Siang.pdf', 'I');
?>