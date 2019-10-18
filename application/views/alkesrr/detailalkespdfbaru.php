<?php
			$pdf = new Tpdf('P', 'mm', 'LEGAL', true, 'UTF-8', false);
			$pdf->setPrintHeader(false);
			$pdf->SetTitle('detail E_Katalog Alkes');
			$pdf->SetHeaderMargin(10);
			$pdf->SetTopMargin(10);
			$pdf->SetLeftMargin(10);
			$pdf->setFooterMargin(10);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage('P', 'LEGAL');
			$pdf->SetFont('helvetica', '', 8);	
			$pdf->Image('assets/upload/hhg-logo.png',15,2,25,25,'PNG');

		
		$html='
			<table border="0" cellspacing="1" cellpadding="2" style="text-align:center;font-weight:bold;font-size:14;">
					<tr>
						<td width="100%" align="center">DETAIL PER PRODUK ALKES<br></td></tr>
          	         </table><br> <hr height="2px"> <b style="margin-bottom:4px;"></b> 
					<br><br>
            <b> Perusahaan <span> : </span>'.$alkes->nm_perusahaan.'</b>
					  
					  <br><br>
					  <span>     </span><span>     </span><span>     </span><span>     </span>
					  <span>     </span><span>     </span><span>     </span><span>     </span>
					  <span>     </span><span>     </span><span>     </span><span>     </span>
					  <span>     </span><span>     </span><span>     </span><span>     </span>
					  <span>     </span><span>     </span><span>     </span><span>     </span>
					  <span>     </span><span>     </span><span>     </span><span>     </span>
					  <span>     </span><span>     </span><span>     </span><span>     </span>
					  <span>     </span><span>     </span>';
					  
					            $stse_kat=$alkes->stse_kat;
                      $harga='-';

                        if ($stse_kat=='1'){
                      	$harga='E KATALOG';
                      }else{
                      	$harga='NON E KATALOG';
                      }
                       
                         $stsregister=$alkes->stsregister;
                         $reg='-';
                       if ($stsregister=='1'){
                        $reg='Register';
                      }else{
                        $reg='NON Register';
                      }

                       $includeongkir=$alkes->includeongkir;
                         $ong='-';
                       if ($includeongkir=='1'){
                        $ong='Harga Termasuk Ongkir';
                      }else{
                        $ong='Harga Belum Termasuk Ongkir';
                      }


          $ynwa=$alkes->jenis_pembayaran;
          if($ynwa=='1'){
            $ynwa='CASH';
          }else{
            $ynwa='SPONSORSHIP';
          } 
                        

					$html.='
					 <br>
					<table border="1" cellspacing="0"  cellpadding="2">
							
				  	  <tr bgcolor="skyblue" style="font-weight:bold;line-height:15px;">
					  <th style="text-align:center;line-height:15px;width:25%">RINCIAN</th>
                      <th style="vertical-align: middle;text-align: center;width:75%">DESKRIPSI</th>
                     </tr>
                      </table>
                     ';

                     $html.=' <br><br>
                         <table border="0">
                            <tr>
                              <td width="135px">Produk</td>
                              <td width="20px">:</td>
                              <td>'.$alkes->nama_produk.'<br></td>
                            </tr>
                            <tr>
                              <td width="135px">Merk</td>
                              <td width="20px">:</td>
                              <td>'.$alkes->merk.'<br></td>
                            </tr>
                            <tr>
                              <td width="135px">Type</td>
                              <td width="20px">:</td>
                              <td>'.$alkes->type.'<br></td>
                            </tr>
                            <tr>
                              <td width="135px">Jenis Barang</td>
                              <td width="20px">:</td>
                              <td>'.$alkes->jns_barang.'<br></td>
                            </tr>
                            <tr>
                              <td width="135px">Jenis Register</td>
                              <td width="20px">:</td>
                              <td>'.$reg.'<br></td>
                            </tr>
                            <tr>
                              <td width="135px">Jenis Katalog</td>
                              <td width="20px">:</td>
                              <td>'.$harga.'<br></td>
                            </tr>
                             <tr>
                              <td width="135px">Harga</td>
                              <td width="20px">:</td>
                              <td>Rp. '.number_format($alkes->harga_baru).'<br></td>
                            </tr>
                             <tr>
                              <td width="135px">Diskon (%)</td>
                              <td width="20px">:</td>
                              <td>'.$alkes->diskon_baru.'<br></td>
                            </tr>
                             <tr>
                              <td width="135px">Harga Akhir</td>
                              <td width="20px">:</td>
                              <td>Rp. '.number_format($alkes->harga_akhir_baru).'<br></td>
                            </tr>
                             <tr>
                              <td width="135px">Nominal Fee</td>
                              <td width="20px">:</td>
                              <td>Rp. '.number_format($alkes->nominal_fee_baru).',-<br></td>
                            </tr>
                            <tr>
                              <td width="135px">Biaya Ongkir</td>
                              <td width="20px">:</td>
                              <td>'.$ong.'<br></td>
                            </tr>
                              <tr>
                              <td width="135px">Keterangan</td>
                              <td width="20px">:</td>
                              <td>'.$alkes->ket.'<br></td>
                            </tr>
                              <tr>
                              <td width="135px">Catatan</td>
                              <td width="20px">:</td>
                              <td>'.$alkes->note.'<br></td>
                            </tr>
                            <tr>
                              <td width="135px">Kontak</td>
                              <td width="20px">:</td>
                              <td>'.$alkes->contact.'<br></td>
                            </tr>
                             <tr>
                              <td width="135px">Jenis Pembayaran</td>
                              <td width="20px">:</td>
                              <td>'.$ynwa.'<br></td>
                            </tr>
                            
                          </table><br><br>
                      ';
                     $html.=' 
                            <table border="1">
                              <tr  align="center" style="line-height:15px;font-weight:bold;" bgcolor="skyblue">
                                 <th colspan="2">Garansi</th>
                              </tr>
                               <tr  align="center" style="line-height:15px;font-weight:bold;" bgcolor="skyblue">
                                 <th colspan="2">Kontrak Servis</th>
                              </tr>
                              <tr align="center" style="line-height:15px;font-weight:bold;" bgcolor="skyblue">
                                <th width="50px">TAHUN KE</th>
                                <th>PERSENTASE (%)</th>
                                <th>NOMINAL</th>
                              </tr>
                              <tr>
                                <td width="50px" align="center" style="line-height:15px;">
                                <b>'.$alkes->tahunke1.'</b><br>
                                <b>'.$alkes->tahunke2.'</b><br>
                                <b>'.$alkes->tahunke3.'</b><br>
                                <b>'.$alkes->tahunke4.'</b><br>
                                <b>'.$alkes->tahunke5.'</b>
                                </td>
                                <td align="center" style="line-height:15px;">
                                <b>'.$alkes->persentase1.' %</b><br>
                                <b>'.$alkes->persentase2.' %</b><br>
                                <b>'.$alkes->persentase3.' %</b><br>
                                <b>'.$alkes->persentase4.' %</b><br>
                                <b>'.$alkes->persentase5.' %</b>
                                </td>
                                <td align="center" style="line-height:15px;">
                                <b>Rp. '.number_format($alkes->nominal_baru1).',-</b><br>
                                <b>Rp. '.number_format($alkes->nominal_baru2).',-</b><br>
                                <b>Rp. '.number_format($alkes->nominal_baru3).',-</b><br>
                                <b>Rp. '.number_format($alkes->nominal_baru4).',-</b><br>
                                <b>Rp. '.number_format($alkes->nominal_baru5).',-</b>
                                </td>
                              </tr>
                            </table>
                            ';  	                                     
                                     
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('detail_E_Katalog_Alkes.pdf', 'I');
			
?>
