<?php
			$pdf = new Tpdf('P', 'mm', 'LEGAL', true, 'UTF-8', false);
			$pdf->setPrintHeader(false);
			$pdf->SetTitle('Laporan E - Katalog Alkes');
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
						<td width="100%" align="center">RESUME PERTEMUAN DENGAN REKANAN<br></td></tr>
          	         </table><br> <hr height="2px"> <b style="margin-bottom:4px;"></b> 
					<br><br>
                    <b>Dihadiri Oleh <span> : </span></b><br>
					  <b>1. PIHAK PERTAMA <span> : </span>PT. Medikaloka Hermina</b>
					  <span>     </span><span>     </span><span>     </span><span>     </span>
                      <b>2. PIHAK KEDUA <span> : </span>'.$alkes->nm_perusahaan.'</b>
					  <br><br>
					  <span>     </span><span>     </span><span>     </span><span>     </span>
					  <span>     </span><span>     </span><span>     </span><span>     </span>
					  <span>     </span><span>     </span><span>     </span><span>     </span>
					  <span>     </span><span>     </span><span>     </span><span>     </span>
					  <span>     </span><span>     </span><span>     </span><span>     </span>
					  <span>     </span><span>     </span><span>     </span><span>     </span>
					  <span>     </span><span>     </span><span>     </span><span>     </span>
					  <span>     </span><span>     </span>';
					  
					  $principal=$alkes->principal;
                      $solo_agent=$alkes->solo_agent;
                      $distributor=$alkes->distributor;
                      $subdistributor=$alkes->subdistributor;
                      $status='-';

                      if ($principal=='v'){
                      	$status='Principal';
                      }elseif($solo_agent=='v'){
                      	$status='Solo Agent';
                      }elseif($distributor=='v'){
                      	$status='Distributor';
                      	}elseif($subdistributor=='v'){
                      	$status='Subdistributor';
                      }else{
                         $status='-';
                      	}

                      	$e_kat=$alkes->e_kat;
                        $non_e_kat=$alkes->non_e_kat;
                        $harga='-';

                        if ($e_kat=='v'){
                      	$harga='E KATALOG';
                      }elseif($non_e_kat=='v'){
                      	$harga='NON E KATALOG';
                      	}else{
                         $harga='-';
                      	}

                        $biayafree=$alkes->biayafree;
                        $biayanonfree=$alkes->biayanonfree;
                        $biaya='-';

                  if ($biayafree=='v'){
                        $biaya='FREE';
                      }elseif($biayanonfree=='v'){
                        $biaya='NON FREE';
                        }else{
                         $biaya='-';
                        }

					  
					$html.='
					 <b>STATUS<span> : </span>'.$status.'</b>
                   	<br><br>
					<table border="1" cellspacing="0"  cellpadding="2">
							
				  	  <tr bgcolor="skyblue" style="font-weight:bold;line-height:15px;">
					  <th style="text-align:center;line-height:15px;width:25%">RINCIAN</th>
                      <th style="vertical-align: middle;text-align: center;width:75%">KESEPAKATAN</th>
                     </tr>
                      </table>
                     ';

                     $html.=' <br><br>
                       <b><span>1. </span><span>ALAT</span></b><br><br>
                          <span>   </span><span>Nama alat</span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span>
                           <span>   </span><span>'.$alkes->nama_produk.'</span>
                          <br><br>
                          <span>   </span><span>Merek dan tipe</span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span>
                           <span>   </span><span>Merek : <b>'.$alkes->merk.'</b> dan Tipe : <b>'.$alkes->type.'</b> </span><br><br>
                          <b><span>2. </span><span>HARGA</span></b>
                            <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span>
                           <span>   </span><span><b>'.$harga.'</b></span>
                           <br><br>
                           <span>   </span><span>  harga(sudah termasuk ppn '.$alkes->ppn.' %)</span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>  </span><span>  </span>
                           <span>Rp. '.number_format($alkes->total).',-</span>
                           <br><br>
                           <b><span>3. </span><span>GARANSI</span></b>
                            <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span>
                           <span>   </span><span></span>
                          <br><br>
                          <span>   </span><span>  Full Waranty</span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>    </span>
                           <span>  </span><span>'.$alkes->garansi.' tahun</span>
                           <br><br>
                           <span>   </span><span>  Free Waranty</span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span> </span>
                           <span>  </span><span>'.$alkes->garansifree.' tahun</span>
                           <br><br>
                           <span>   </span><span><b>  Kontak servis</b></span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span> </span><span>     </span><span>     </span>   <span> </span>
                           <span> </span><span>     </span><span>     </span>   <span> </span>
                           <span>  </span><span><b>Nominal</b></span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span> </span><span>     </span><span>     </span>   <span> </span>
                           <span> </span><span>     </span><span>     </span>   <span> </span>
                           <span>  </span><span><b>Persentase dari harga beli</b></span>
                           <br><br>
                           <span>   </span><span> - Tahun ke 1</span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span> </span> <span> </span><span>     </span><span>     </span>   <span> </span>
                           <span>  </span><span>Rp. '.number_format($alkes->nominal1).',-</span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span> </span> <span> </span><span>     </span><span>     </span>   <span> </span>
                           <span> </span> <span> </span><span>     </span><span>     </span>   <span> </span></span><span>     </span><span>     </span>   <span> </span></span><span>     </span><span>     </span>   <span> </span>
                           <span>  </span><span>'.$alkes->persentase1.' %</span>
                           <br><br>
                           <span>   </span><span> - Tahun ke 2</span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span> </span> <span> </span><span>     </span><span>     </span>   <span> </span>
                           <span>  </span><span>Rp. '.number_format($alkes->nominal2).',-</span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span> </span> <span> </span><span>     </span><span>     </span>   <span> </span>
                           <span> </span> <span> </span><span>     </span><span>     </span>   <span> </span></span><span>     </span><span>     </span>   <span> </span></span><span>     </span><span>     </span>   <span> </span>
                           <span>  </span><span>'.$alkes->persentase2.' %</span>
                           <br><br>
                           <span>   </span><span> - Tahun ke 3</span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span> </span> <span> </span><span>     </span><span>     </span>   <span> </span>
                           <span>  </span><span>Rp. '.number_format($alkes->nominal3).',-</span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span> </span> <span> </span><span>     </span><span>     </span>   <span> </span>
                           <span> </span> <span> </span><span>     </span><span>     </span>   <span> </span></span><span>     </span><span>     </span>   <span> </span></span><span>     </span><span>     </span>   <span> </span>
                           <span>  </span><span>'.$alkes->persentase3.' %</span>
                           <br><br>
                           <span>   </span><span> - Tahun ke 4</span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span> </span> <span> </span><span>     </span><span>     </span>   <span> </span>
                           <span>  </span><span>Rp. '.number_format($alkes->nominal4).',-</span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span> </span> <span> </span><span>     </span><span>     </span>   <span> </span>
                           <span> </span> <span> </span><span>     </span><span>     </span>   <span> </span></span><span>     </span><span>     </span>   <span> </span></span><span>     </span><span>     </span>   <span> </span>
                           <span>  </span><span>'.$alkes->persentase4.' %</span>
                           <br><br>
                           <span>   </span><span> - Tahun ke 5</span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span> </span> <span> </span><span>     </span><span>     </span>   <span> </span>
                           <span>  </span><span>Rp. '.number_format($alkes->nominal5).',-</span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span> </span> <span> </span><span>     </span><span>     </span>   <span> </span>
                           <span> </span> <span> </span><span>     </span><span>     </span>   <span> </span></span><span>     </span><span>     </span>   <span> </span></span><span>     </span><span>     </span>   <span> </span>
                           <span>  </span><span>'.$alkes->persentase5.' %</span>
                           <br><br>
                           <b><span>4. </span><span>PENGIRIMAN / FRANCO</span></b>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span>
                            <span>Langsung RS, termasuk untuk akomodasi petugas sampai uji fungsi dan pelatihan penggunaan alat</span>
                            <br><br>
                            <b><span>     </span><span>BIAYA</span></b>
                           <span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>  </span><span>     </span><span>  </span>
                           <span>   </span><span>     </span><b>'.$biaya.'</b><span>     </span><span>     </span> <span> DAN </span> <span>   </span>
                           <span><b>NOMINAL BIAYA</b></span><span> : </span><span>Rp. '.number_format($alkes->nominalbiaya).',-</span>

                           <br><br>
                           <b><span>5. </span><span>KETERANGAN</span></b>
                           <span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>     </span><span>     </span>
                           <span>     </span><span>     </span><span>  </span>
                            <span>   </span><span>'.$alkes->ket.'</span>
                          <br><br>
                            ';
                      	                                     
                                     
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('Laporan_E_Katalog_Alkes.pdf', 'I');
			
?>
