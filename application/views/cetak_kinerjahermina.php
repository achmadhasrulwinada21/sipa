<?php
			$pdf = new Tpdf('L', 'mm', '', true, 'UTF-8', false);
			$pdf->setPrintHeader(false);
			$pdf->SetTitle('Kinerja Hermina');
			$pdf->SetHeaderMargin(5);
			$pdf->SetTopMargin(15);
			$pdf->SetLeftMargin(2);
			$pdf->setFooterMargin(10);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage('L','LEGAL');
			$pdf->SetFont('helvetica', '', 11);			
			$i=0;
			$html='
			<p align="center" style="font-size:14px;"><b>LAPORAN KINERJA RS HERMINA</b></p>';
									
			$html.='
			<table border="1" cellpadding="1" style="font-size:7px;">
				<tr bgcolor="#D3D3D3" style="font-weight: bold;">	 
					<th width="2%" rowspan="2" align="center">NO</th>
					<th width="4%" rowspan="2" align="center">PERIODE</th>
					<th width="6%" rowspan="2" align="center">URAIAN</th>					
					<th width="5.5%" colspan="3" align="center">JTN</th>
					<th width="5.5%" colspan="3" align="center">KMYR</th>
					<th width="5.5%" colspan="3" align="center">BKS</th>
					<th width="5.5%" colspan="3" align="center">DPK</th>
					<th width="5.5%" colspan="3" align="center">DM</th>
					<th width="5.5%" colspan="3" align="center">BGR</th>										
					<th width="5.5%" colspan="3" align="center">PST</th>
					<th width="5.5%" colspan="3" align="center">PDRN</th>
					<th width="5.5%" colspan="3" align="center">TPRAHU</th>
					<th width="5.5%" colspan="3" align="center">SKBM</th>
					<th width="5.5%" colspan="3" align="center">TGR</th>
					<th width="5.5%" colspan="3" align="center">GW</th>
					<th width="5.5%" colspan="3" align="center">ARCA</th>
					<th width="5.5%" colspan="3" align="center">GLXY</th>
					<th width="5.5%" colspan="3" align="center">PLB</th>
					<th width="5.5%" colspan="3" align="center">CPT</th>
										
					
															
				</tr>
				
				<tr>					
					<th  width="1.833%" align="center">T</th> <!--JTN-->
					<th  width="1.833%" align="center">R</th>
					<th  width="1.833%" align="center">%</th>
					<th  width="1.833%" align="center">T</th> <!--KMYR-->
					<th  width="1.833%" align="center">R</th>
					<th  width="1.833%" align="center">%</th> 
					<th  width="1.833%" align="center">T</th> <!--BKS-->
					<th  width="1.833%" align="center">R</th>
					<th  width="1.833%" align="center">%</th>
					<th  width="1.833%" align="center">T</th> <!--DPK-->
					<th  width="1.833%" align="center">R</th>
					<th  width="1.833%" align="center">%</th>
					<th  width="1.833%" align="center">T</th> <!--DM-->
					<th  width="1.833%" align="center">R</th>
					<th  width="1.833%" align="center">%</th>					
					<th  width="1.833%" align="center">T</th> <!--BGR-->
					<th  width="1.833%" align="center">R</th>
					<th  width="1.833%" align="center">%</th>
					<th  width="1.833%" align="center">T</th> <!--PST-->
					<th  width="1.833%" align="center">R</th>
					<th  width="1.833%" align="center">%</th>
					<th  width="1.833%" align="center">T</th> <!--PDRN-->
					<th  width="1.833%" align="center">R</th>
					<th  width="1.833%" align="center">%</th>
					<th  width="1.833%" align="center">T</th> <!--TPRAHU-->
					<th  width="1.833%" align="center">R</th>
					<th  width="1.833%" align="center">%</th>
					<th  width="1.833%" align="center">T</th> <!--SKBM-->
					<th  width="1.833%" align="center">R</th>
					<th  width="1.833%" align="center">%</th>
					<th  width="1.833%" align="center">T</th> <!--TGR-->
					<th  width="1.833%" align="center">R</th>
					<th  width="1.833%" align="center">%</th>
					<th  width="1.833%" align="center">T</th> <!--GW-->
					<th  width="1.833%" align="center">R</th>
					<th  width="1.833%" align="center">%</th>
					<th  width="1.833%" align="center">T</th> <!--ARCA-->
					<th  width="1.833%" align="center">R</th>
					<th  width="1.833%" align="center">%</th>
					<th  width="1.833%" align="center">T</th> <!--GLXY-->
					<th  width="1.833%" align="center">R</th>
					<th  width="1.833%" align="center">%</th>
					<th  width="1.833%" align="center">T</th> <!--PLB-->
					<th  width="1.833%" align="center">R</th>
					<th  width="1.833%" align="center">%</th>
					<th  width="1.833%" align="center">T</th> <!--CPT-->
					<th  width="1.833%" align="center">R</th>
					<th  width="1.833%" align="center">%</th>
					
				</tr>';
			
			$i=0;
			foreach ($cetak_kinerja as $row) 

			{
				$jtnt = $row['jtnt'];
				$kmyrt = $row['kmyrt'];
				$bkst = $row['bkst'];
				$dpkt = $row['dpkt'];
				$dmt = $row['dmt'];
				$bgrt = $row['bgrt'];
				$pstt = $row['pstt'];
				$tprahut = $row['tprahut'];
				$skbmt = $row['skbmt'];
				$tgrt = $row['tgrt'];
				$gwt = $row['gwt'];
				$arcat = $row['arcat'];
				$glxyt = $row['glxyt'];
				$plbt = $row['plbt'];


				

					$akmjtn       = ($row['jtnr'] / $row['jtnt']) * 100;
                    $akmkmyr      = ($row['kmyrr'] / $row['kmyrt']) * 100;
                    $akmbks       = ($row['bksr'] / $row['bkst']) * 100;
                    $akmdpk       = ($row['dpkr'] / $row['dpkt']) * 100;
                    $akmdm        = ($row['dmr'] / $row['dmt']) * 100;
                    $akmbgr       = ($row['bgrr'] / $row['bgrt']) * 100;
                    $akmpst       = ($row['pstr'] / $row['pstt']) * 100;
                    $akmpdrn      = ($row['pdrnr'] / $row['pdrnt']) * 100;
                    $akmtprahu    = ($row['tprahur'] / $row['tprahut']) * 100;
                    $akmskbm      = ($row['skbmr'] / $row['skbmt']) * 100; 
                    $akmtgr       = ($row['tgrr'] / $row['tgrt']) * 100;
                    $akmgw        = ($row['gwr'] / $row['gwt']) * 100;
                    $akmarca      = ($row['arcar'] / $row['arcat']) * 100;
                    $akmglxy      = ($row['glxyr'] / $row['glxyt']) * 100;
                    $akmplb       = ($row['plbr'] / $row['plbt']) * 100;
                    $akmcpt       = ($row['cptr'] / $row['cptt']) * 100;


				

				$i++;

				$warna = 'white';
				$warna1 = 'white';
				$warna2 = 'white';
				$warna3 = 'white';
				$warna4 = 'white';
				$warna5 = 'white';
				$warna6 = 'white';
				$warna7 = 'white';
				$warna8 = 'white';
				$warna9 = 'white';
				$warna10 = 'white';
				$warna11 = 'white';
				$warna12 = 'white';
				$warna13 = 'white';
				$warna14 = 'white';
				$warna15 = 'white';
				$html.='				
				<tr>
					<td bgcolor="#E6E6FA" width="2%" align="center">'.$i.'</td>
					<td bgcolor="#E6E6FA" width="4%" align="center">'.$row['periode'].'</td>
					<td bgcolor="#E6E6FA" width="6%" align="left"><b>'.$row['uraian_rsk'].'</b></td>';

					$waktu=$row['jtnr'];
					if($waktu < $row['jtnt']){
						$warna = 'Firebrick';
						}elseif($waktu > $row['jtnt']){
						$warna = 'Skyblue';
					}else{
						$warna = 'white';
					}
					

					$waktu1=$row['kmyrr'];
					if($waktu1 < $row['kmyrt']){
						$warna1 = 'Firebrick';
					}elseif($waktu1 > $row['kmyrt']){
						$warna1 = 'Skyblue';
					}else{
						$warna1 = 'white';
					}

					$waktu2=$row['bksr'];
					if($waktu2 < $row['bkst']){
						$warna2 = 'Firebrick';
					}elseif($waktu2 > $row['bkst']){
						$warna2 = 'Skyblue';
					}else{
						$warna2 = 'white';
					}

					$waktu3=$row['dpkr'];
					if($waktu3 < $row['dpkt']){
						$warna3 = 'Firebrick';
					}elseif($waktu3 > $row['dpkt']){
						$warna3 = 'Skyblue';
					}else{
						$warna3 = 'white';
					}

					$waktu4=$row['dmr'];
					if($waktu3 < $row['dmt']){
						$warna3 = 'Firebrick';
					}elseif($waktu3 > $row['dmt']){
						$warna3 = 'Skyblue';
					}else{
						$warna3 = 'white';
					}

					$waktu5=$row['bgrr'];
					if($waktu5 < $row['bgrt']){
						$warna5 = 'Firebrick';
					}elseif($waktu5 > $row['bgrt']){
						$warna5 = 'Skyblue';
					}else{
						$warna5 = 'white';
					}

					$waktu6=$row['pstr'];
					if($waktu6 < $row['pstt']){
						$warna6 = 'Firebrick';
					}elseif($waktu6 > $row['pstt']){
						$warna6 = 'Skyblue';
					}else{
						$warna6 = 'white';
					}

					$waktu7=$row['pdrnr'];
					if($waktu7 < $row['pdrnt']){
						$warna7 = 'Firebrick';
					}elseif($waktu7 > $row['pdrnt']){
						$warna7 = 'Skyblue';
					}else{
						$warna7 = 'white';
					}

					$waktu8=$row['tprahur'];
					if($waktu8 < $row['tprahut']){
						$warna8 = 'Firebrick';
					}elseif($waktu8 > $row['tprahut']){
						$warna8 = 'Skyblue';
					}else{
						$warna8 = 'white';
					}

					$waktu9=$row['skbmr'];
					if($waktu9 < $row['skbmt']){
						$warna9 = 'Firebrick';
					}elseif($waktu9 > $row['skbmt']){
						$warna9 = 'Skyblue';
					}else{
						$warna9 = 'white';
					}

					$waktu10=$row['tgrr'];
					if($waktu10 < $row['tgrt']){
						$warna10 = 'Firebrick';
					}elseif($waktu10 > $row['tgrt']){
						$warna10 = 'Skyblue';
					}else{
						$warna10 = 'white';
					}

					$waktu11=$row['gwr'];
					if($waktu11 < $row['gwt']){
						$warna11 = 'Firebrick';
					}elseif($waktu11 > $row['gwt']){
						$warna11 = 'Skyblue';
					}else{
						$warna11 = 'white';
					}

					$waktu12=$row['arcar'];
					if($waktu12 < $row['arcat']){
						$warna12 = 'Firebrick';
					}elseif($waktu12 > $row['arcat']){
						$warna12 = 'Skyblue';
					}else{
						$warna12 = 'white';
					}

					$waktu13=$row['glxyr'];
					if($waktu13 < $row['glxyt']){
						$warna13 = 'Firebrick';
					}elseif($waktu13 > $row['glxyt']){
						$warna13 = 'Skyblue';
					}else{
						$warna13 = 'white';
					}

					$waktu14=$row['plbr'];
					if($waktu14 < $row['plbt']){
						$warna14 = 'Firebrick';
					}elseif($waktu14 > $row['plbt']){
						$warna14 = 'Skyblue';
					}else{
						$warna14 = 'white';
					}

					$waktu15=$row['cptr'];
					if($waktu15 < $row['cptt']){
						$warna15 = 'Firebrick';
					}elseif($waktu15 > $row['cptt']){
						$warna15 = 'Skyblue';
					}else{
						$warna15 = 'white';
					}
				
					$html.='<td align="center">'.$row['jtnt'].'</td>
					<td bgcolor="'.$warna.'" align="center">'.$row['jtnr'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmjtn,2).'</td>
					<td align="center">'.$row['kmyrt'].'</td>
					<td bgcolor="'.$warna1.'" align="center">'.$row['kmyrr'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmkmyr,2).'</td>
					<td align="center">'.$row['bkst'].'</td>
					<td bgcolor="'.$warna2.'" align="center">'.$row['bksr'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmbks,2).'</td>
					<td align="center">'.$row['dpkt'].'</td>
					<td bgcolor="'.$warna3.'" align="center">'.$row['dpkr'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmdpk,2).'</td>
					<td align="center">'.$row['dmt'].'</td>
					<td bgcolor="'.$warna4.'" align="center">'.$row['dmr'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmdm,2).'</td>
					<td align="center">'.$row['bgrt'].'</td>
					<td bgcolor="'.$warna5.'" align="center">'.$row['bgrr'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmbgr,2).'</td>					
					<td align="center">'.$row['pstt'].'</td>
					<td bgcolor="'.$warna6.'" align="center">'.$row['pstr'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmpst,2).'</td>
					<td align="center">'.$row['pdrnt'].'</td>
					<td bgcolor="'.$warna7.'" align="center">'.$row['pdrnr'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmpdrn,2).'</td>
					<td align="center">'.$row['tprahut'].'</td>
					<td bgcolor="'.$warna8.'" align="center">'.$row['tprahur'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmtprahu,2).'</td>
					<td align="center">'.$row['skbmt'].'</td>
					<td bgcolor="'.$warna9.'" align="center">'.$row['skbmr'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmskbm,2).'</td>
					<td align="center">'.$row['tgrt'].'</td>
					<td bgcolor="'.$warna10.'" align="center">'.$row['tgrr'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmtgr,2).'</td>
					<td align="center">'.$row['gwt'].'</td>
					<td bgcolor="'.$warna11.'" align="center">'.$row['gwr'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmgw,2).'</td>
					<td align="center">'.$row['arcat'].'</td>
					<td bgcolor="'.$warna12.'" align="center">'.$row['arcar'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmarca,2).'</td>
					<td align="center">'.$row['glxyt'].'</td>
					<td bgcolor="'.$warna13.'" align="center">'.$row['glxyr'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmglxy,2).'</td>
					<td align="center">'.$row['plbt'].'</td>
					<td bgcolor="'.$warna14.'" align="center">'.$row['plbr'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmplb,2).'</td>
					<td align="center">'.$row['cptt'].'</td>
					<td bgcolor="'.$warna14.'" align="center">'.$row['cptr'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmcpt,2).'</td>
					
					
					
					
				</tr>';
			}				
				
			$html.='</table>';			
			$pdf->writeHTML($html, true, false, true, false, '');
									
			// HALAMAN 2
			$pdf->AddPage('L','LEGAL');
			$pdf->SetFont('helvetica', '', 12);
			
			$html='
			<p align="center" style="font-size:14px;"><b>LAPORAN KINERJA RS HERMINA</b></p>';
									
			$html.='
			<table border="1" cellpadding="1" style="font-size:7px;">
				<tr bgcolor="#D3D3D3" style="font-weight: bold;">	 
					<th width="2%" rowspan="2" align="center"><b>NO</b></th>
					<th width="4%" rowspan="2" align="center"><b>PERIODE</b></th>
					<th width="6%" rowspan="2" align="center"><b>URAIAN</b></th>					
					<th width="5.5%" colspan="3" align="center">MKS</th>
					<th width="5.5%" colspan="3" align="center">SPG</th>
					<th width="5.5%" colspan="3" align="center">BYMK</th>
					<th width="5.5%" colspan="3" align="center">SOLO</th>
					<th width="5.5%" colspan="3" align="center">CIRUAS</th>
					<th width="5.5%" colspan="3" align="center">YOGYA</th>
					<th width="5.5%" colspan="3" align="center">BITUNG</th>
					<th width="5.5%" colspan="3" align="center">MKSR</th>
					<th width="5.5%" colspan="3" align="center">BLKPPN</th>
					<th width="5.5%" colspan="3" align="center">MDN</th>
					<th width="5.5%" colspan="3" align="center">PDM</th>
					<th width="5.5%" colspan="3" align="center">PWT</th>
					
					   
					
					<th width="5.5%" rowspan="2" align="center">AKM</th>										
				</tr>
				
				<tr>					
					
					
					<th  width="1.833%" align="center">T</th> <!--MKS-->
					<th  width="1.833%" align="center">R</th>
					<th  width="1.833%" align="center">%</th>
					<th  width="1.833%" align="center">T</th> <!--SPG-->
					<th  width="1.833%" align="center">R</th>
					<th  width="1.833%" align="center">%</th>
					<th  width="1.833%" align="center">T</th> <!--BYMK-->
					<th  width="1.833%" align="center">R</th>
					<th  width="1.833%" align="center">%</th>
					<th  width="1.833%" align="center">T</th> <!--SOLO-->
					<th  width="1.833%" align="center">R</th>
					<th  width="1.833%" align="center">%</th>
					<th  width="1.833%" align="center">T</th> <!--CIRUAS-->
					<th  width="1.833%" align="center">R</th>
					<th  width="1.833%" align="center">%</th>
					<th  width="1.833%" align="center">T</th> <!--YOGYA-->
					<th  width="1.833%" align="center">R</th>
					<th  width="1.833%" align="center">%</th>
					<th  width="1.833%" align="center">T</th> <!--BITUNG-->
					<th  width="1.833%" align="center">R</th>
					<th  width="1.833%" align="center">%</th>
					<th  width="1.833%" align="center">T</th> <!--MKSR-->
					<th  width="1.833%" align="center">R</th>
					<th  width="1.833%" align="center">%</th>
					<th  width="1.833%" align="center">T</th> <!--BLKPPN-->
					<th  width="1.833%" align="center">R</th>
					<th  width="1.833%" align="center">%</th>
					<th  width="1.833%" align="center">T</th> <!--MDN-->
					<th  width="1.833%" align="center">R</th>
					<th  width="1.833%" align="center">%</th>
					<th  width="1.833%" align="center">T</th> <!--PDM-->
					<th  width="1.833%" align="center">R</th>
					<th  width="1.833%" align="center">%</th>
					<th  width="1.833%" align="center">T</th> <!--PWT-->
					<th  width="1.833%" align="center">R</th>
					<th  width="1.833%" align="center">%</th>
					
				</tr>';
			
			$i=0;
			foreach ($cetak_kinerja as $row) 
			{
					$akmmks        	 = ($row['mksr'] / $row['mkst']) * 100;
                    $akmspg        	 = ($row['spgr'] / $row['spgt']) * 100;
                    $akmbymk       	 = ($row['bymkr'] / $row['bymkt']) * 100;
                    $akmsolo       	 = ($row['solor'] / $row['solot']) * 100;
                    $akmciruas       = ($row['ciruasr'] / $row['ciruast']) * 100;
                    $akmyogya        = ($row['yogyar'] / $row['yogyat']) * 100;
                    $akmbitung       = ($row['bitungr'] / $row['bitungt']) * 100;
                    $akmmksr         = ($row['mksrr'] / $row['mksrt']) * 100;
                    $akmblkppn       = ($row['blkppnr'] / $row['blkppnt']) * 100;
                    $akmmdn	         = ($row['mdnr'] / $row['mdnt']) * 100;
                    $akmpdm	         = ($row['pdmr'] / $row['pdmt']) * 100;
                    $akmpwt		     = ($row['pwtr'] / $row['pwtt']) * 100;


				$capai=$row['jtnr'] + $row['kmyrr'] + $row['bksr'] + $row['dpkr'] + $row['dmr'] + $row['bgrr'] + $row['pstr']  + $row['tprahur'] + $row['skbmr'] + $row['tgrr'] + $row['gwr'] + $row['arcar'] + $row['glxyr'] + $row['plbr'] + $row['cptr'] + $row['mksr'] + $row['spgr'] + $row['bymkr'] + $row['solor'] + $row['ciruasr'] + $row['yogyar'] + $row['bitungr'] + $row['mksrr'] + $row['mdnr'] + $row['blkppnr'] + $row['pdmr'] + $row['pwtr'] ;
				$target=$jtnt + $kmyrt + $bkst + $dpkt + $dmt + $bgrt + $pstt + $tprahut + $skbmt + $tgrt + $gwt + $arcat + $glxyt + $plbt + $row['cptt'] + $row['mkst'] + $row['spgt'] + $row['bymkt'] + $row['solot'] + $row['ciruast'] + $row['yogyat'] + $row['bitungt'] + $row['mksrt'] + $row['mdnt'] + $row['blkppnt'] + $row['pdmt'] + $row['pwtt'] ;
				
				$akm=$capai/$target*100;

				$i++;
				$warna16 = 'white';
				$warna17 = 'white';
				$warna18 = 'white';
				$warna19 = 'white';
				$warna20 = 'white';
				$warna21 = 'white';
				$warna22 = 'white';
				$warna23 = 'white';
				$warna24 = 'white';
				$warna25 = 'white';
				$warna26 = 'white';
				$warna27 = 'white';
				$html.='
				
				<tr>
					<td bgcolor="#E6E6FA" align="center">'.$i.'</td>
					<td bgcolor="#E6E6FA" align="center">'.$row['periode'].'</td>
					<td bgcolor="#E6E6FA" align="left"><b>'.$row['uraian_rsk'].'</b></td>';					
					
					$waktu16=$row['mksr'];
					if($waktu16 < $row['mkst']){
						$warna16 = 'Firebrick';
					}elseif($waktu16 > $row['mkst']){
						$warna16 = 'Skyblue';
					}else{
						$warna16 = 'white';
					}

					$waktu17=$row['spgr'];
					if($waktu17 < $row['spgt']){
						$warna17 = 'Firebrick';
					}elseif($waktu17 > $row['spgt']){
						$warna17 = 'Skyblue';
					}else{
						$warna17 = 'white';
					}

					$waktu18=$row['bymkr'];
					if($waktu18 < $row['bymkt']){
						$warna18 = 'Firebrick';
					}elseif($waktu18 > $row['bymkt']){
						$warna18 = 'Skyblue';
					}else{
						$warna18 = 'white';
					}

					$waktu19=$row['solor'];
					if($waktu19 < $row['solot']){
						$warna19 = 'Firebrick';
					}elseif($waktu19 > $row['solot']){
						$warna19 = 'Skyblue';
					}else{
						$warna19 = 'white';
					}

					$waktu20=$row['ciruasr'];
					if($waktu20 < $row['ciruast']){
						$warna20 = 'Firebrick';
					}elseif($waktu20 > $row['ciruast']){
						$warna20 = 'Skyblue';
					}else{
						$warna20 = 'white';
					}

					$waktu21=$row['yogyar'];
					if($waktu21 < $row['yogyat']){
						$warna21 = 'Firebrick';
					}elseif($waktu21 > $row['yogyat']){
						$warna21 = 'Skyblue';
					}else{
						$warna21 = 'white';
					}

					$waktu22=$row['bitungr'];
					if($waktu22 < $row['bitungt']){
						$warna22 = 'Firebrick';
					}elseif($waktu22 > $row['bitungt']){
						$warna22 = 'Skyblue';
					}else{
						$warna22 = 'white';
					}

					$waktu23=$row['mksrr'];
					if($waktu23 < $row['mksrt']){
						$warna23 = 'Firebrick';
					}elseif($waktu23 > $row['mksrt']){
						$warna23 = 'Skyblue';
					}else{
						$warna23 = 'white';
					}

					$waktu24=$row['blkppnr'];
					if($waktu24 < $row['blkppnt']){
						$warna24 = 'Firebrick';
					}elseif($waktu24 > $row['blkppnt']){
						$warna24 = 'Skyblue';
					}else{
						$warna24 = 'white';
					}

					$waktu25=$row['mdnr'];
					if($waktu25 < $row['mdnt']){
						$warna25 = 'Firebrick';
					}elseif($waktu25 > $row['mdnt']){
						$warna25 = 'Skyblue';
					}else{
						$warna25 = 'white';
					}

					$waktu26=$row['pdmr'];
					if($waktu26 < $row['pdmt']){
						$warna26 = 'Firebrick';
					}elseif($waktu26 > $row['pdmt']){
						$warna26 = 'Skyblue';
					}else{
						$warna26 = 'white';
					}

					$waktu27=$row['pwtr'];
					if($waktu27 < $row['pwtt']){
						$warna27 = 'Firebrick';
					}elseif($waktu27 > $row['pwtt']){
						$warna27 = 'Skyblue';
					}else{
						$warna27 = 'white';
					}

					
					$html.='
					<td align="center">'.$row['mkst'].'</td>
					<td bgcolor="'.$warna16.'" align="center">'.$row['mksr'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmmks,2).'</td>
					<td align="center">'.$row['spgt'].'</td>
					<td bgcolor="'.$warna17.'" align="center">'.$row['spgr'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmspg,2).'</td>
					<td align="center">'.$row['bymkt'].'</td>
					<td bgcolor="'.$warna18.'" align="center">'.$row['bymkr'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmbymk,2).'</td>
					<td align="center">'.$row['solot'].'</td>
					<td bgcolor="'.$warna19.'" align="center">'.$row['solor'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmsolo,2).'</td>
					<td align="center">'.$row['ciruast'].'</td>
					<td bgcolor="'.$warna20.'" align="center">'.$row['ciruasr'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmciruas,2).'</td>
					<td align="center">'.$row['yogyat'].'</td>
					<td bgcolor="'.$warna21.'" align="center">'.$row['yogyar'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmyogya,2).'</td>
					<td align="center">'.$row['bitungt'].'</td>
					<td bgcolor="'.$warna22.'" align="center">'.$row['bitungr'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmbitung,2).'</td>
					<td align="center">'.$row['mksrt'].'</td>
					<td bgcolor="'.$warna23.'" align="center">'.$row['mksrr'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmmksr,2).'</td>
					<td align="center">'.$row['blkppnt'].'</td>
					<td bgcolor="'.$warna24.'" align="center">'.$row['blkppnr'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmblkppn,2).'</td>
					<td align="center">'.$row['mdnt'].'</td>
					<td bgcolor="'.$warna25.'" align="center">'.$row['mdnr'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmmdn,2).'</td>
					<td align="center">'.$row['pdmt'].'</td>
					<td bgcolor="'.$warna26.'" align="center">'.$row['pdmr'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmpdm,2).'</td>
					<td align="center">'.$row['pwtt'].'</td>
					<td bgcolor="'.$warna27.'" align="center">'.$row['pwtr'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmpwt,2).'</td>
					
					<td bgcolor="#708090" align="center">'.$angka_format = number_format($akm,2).'%</td>
				</tr>';
			}				
				
			$html.='</table>';
			
			
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('Kinerja_Hermina.pdf');
?>