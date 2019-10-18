<?php

			$pdf = new Tpdf('P', 'mm', 'LEGAL', true, 'UTF-8', false);
			//remove header
			$pdf->SetPrintHeader(false);
			$pdf->SetTitle('PRODUK');
			$pdf->SetHeaderMargin(10);
			$pdf->SetTopMargin(10);
			$pdf->SetLeftMargin(10);
			$pdf->SetFooterMargin(8);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage('P','LEGAL');
			$pdf->SetFont('helvetica', '', 12);
      $pdf->Image('assets/upload/hhg-logo.png',10,10,28,28,'PNG');
			
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

         <table border="0">
         <thead>
          <tr>
          <td style="text-align:center;font-size:18;font-weight:bold;">HERMINA HOSPITAL GROUP</td>
          </tr>
          
          <tr><td></td></tr>
          <tr>
            <td style="text-align:center;font-size:10;">Jl. Selangit B-10 Kav 04 RT - RW - Gunung Sahari Selatan Kec. Kemayoran 
            <br>Kota Administrasi Jakarta Pusat 10610
            <br>Website : www.herminahospitalgroup.com
            <br></td>
          </tr>
          <tr>
            <td><hr height="2px"/></td>
            <td></td>
          </tr></thead>
          </table>
					<table border="0" cellspacing="1" cellpadding="2" style="text-align:center;font-weight:bold;font-size:14;">
					<thead>
						<tr><td width="100%" align="center">DATA PRODUK OBAT<br></td></tr>
          	</thead>
					</table> <br><br>';

          date_default_timezone_set("Asia/Jakarta");

                $data=date('d m Y');
                $tgl=substr($data,0,2);
                $bulan=ubahbulan(substr($data,3,2));
                $thn=substr($data,6,4);

          $waktusaatini =date("H:i:s");
         $html.='
                 <b style="font-size:10;">Tanggal Cetak : '.$tgl.' '.$bulan.' '.$thn.'</b><br>
                 <b style="font-size:10;">JAM : '.$waktusaatini.'</b><br><br>

                  <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                  <tr>   <td width="150" style="font-size:10;">NAMA PRINSIPAL</td><td width="10">:</td><td width="300" style="font-size:10;">'.$header->nama_pt.'</td>
                   </tr>
                    <tr>  <td width="150" style="font-size:10;">TIPE PRODUK</td><td width="10">:</td><td width="300" style="font-size:10;">'.$header->tipe_produk.'</td></tr>
                   </table>
                 <br><br>
            
                 <table border="1" cellspacing="0"  cellpadding="3">
                  <thead>
                    <tr bgcolor="skyblue" style="font-weight:bold;">
                      <th style="text-align: center;line-height:15px;">Distributor</th>
                      <th style="text-align: center;line-height:15px;width:26%;">Nama Produk</th>
                      <th style="text-align: center;line-height:15px;">Komposisi</th>
                      <th style="text-align: center;line-height:15px;">Tipe Harga</th>
                      <th style="text-align: center;line-height:15px;">Harga</th>
                      <th style="text-align: center;line-height:15px;width:10%;">Diskon</th>
                    </tr>
                  </thead>';
						
           
                    $no=0;
                     $jum = 1;             
                     foreach($detail as $key => $row) { 
                               $no++ ;                            
                            
           $html.='<tbody>         
                    <tr>';
                    if($jum <= 1) {
                     $html.='<td  rowspan="'.$row['jumlah1'].'"  style="font-size:7;line-height:15px;text-align: center;">'.$row['s_kode'].'</td>'; 

                     $jum = $row['jumlah1'];      
                                          
                      } else {
                    $jum = $jum - 1;
                          }
                         
                         $a=$header->tipe_produk;
                   if($a=='OBAT'):  
                     $html.='  
                      <td  style="font-size:7;line-height:15px;text-align: center;width:26%;"> '.$row['produko'].'</td>
                      <td  style="font-size:7;line-height:15px;text-align: center;"> '.$row['komposisi'].'</td>';
                      endif;
                        $a=$header->tipe_produk;
                   if($a=='ALUM'):  
                     $html.='  
                      <td  style="font-size:7;line-height:15px;text-align: center;"> '.$row['produkom'].'</td>';
                      endif;
                        $a=$header->tipe_produk;
                   if($a=='ALKES'):  
                     $html.='  
                      <td  style="font-size:7;line-height:15px;text-align: center;"> '.$row['alkes'].'</td>';
                      endif;
                    $html.='   <td style="font-size:7;line-height:15px;text-align: center;">'.$row['tipe_harga'].'</td>
                      <td  style="font-size:7;line-height:15px;text-align: center;">Rp.'.(number_format($row['harga'],0,',','.')).',-</td>
                       <td  style="font-size:7;line-height:15px;text-align: center;width:10%;"> '.$row['discount'].' %</td>
                       </tr></tbody>';
}
                      $html.=' </table>';
                                  
            $pdf->writeHTML($html, true, false, true, false, '');
			     $pdf->Output('PRODUK.pdf', 'I');
?>
