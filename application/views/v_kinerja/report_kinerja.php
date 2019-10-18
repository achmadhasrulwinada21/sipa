<?php
			$pdf = new Tpdf('L', 'mm', '', true, 'UTF-8', false);
			$pdf->setPrintHeader(false);
			$pdf->SetTitle('Kinerja Hermina');
			$pdf->SetHeaderMargin(5);
			$pdf->SetTopMargin(5);
			$pdf->SetLeftMargin(2);
			$pdf->setFooterMargin(10);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage('L','LEGAL');
			$pdf->SetFont('helvetica', '', 11);
			$pdf->Image('assets/upload/hhg-logo.png',10,5,40,40,'PNG');			
			$i=0;


			$html='
				<style>
				table thead 
			{
				display: table-header-group;
			}
			</style>
				  <table border="0"><thead>
					<tr>
					<td style="text-align:center;font-size:20;font-weight:bold;">PERKUMPULAN HERMINA GROUP</td>
					</tr>
					
					<tr><td></td></tr>
					<tr>
						<td style="text-align:center;font-size:10;">Jl. Selangit B-10 Kav 04 RT - RW - Gunung Sahari Selatan Kec. Kemayoran 
						<br>Kota Administrasi Jakarta Pusat 10610
						<br>Website : www.herminahospitalgroup.com
						<br><br><br><hr></td>
					</tr>
					<tr>
					<td align="center" style="font-size:14px;"><b>LAPORAN KINERJA RS HERMINA</b></td></tr></table></thead>
	       ';

			$html.='
			
			<p style="font-size:8px;">Tanggal : '.$tgl.' s/d '.$tgl2.' <p>';



			$html.='
			<table border="1" cellpadding="1" style="font-size:7px;">
				<tr bgcolor="#D3D3D3" style="font-weight: bold;">	 
									
					<th width="10%" rowspan="2" align="center">URAIAN</th>					
					<th width="9%" colspan="3" align="center">JTN</th>
					<th width="9%" colspan="3" align="center">KMY</th>
					<th width="9%" colspan="3" align="center">BKS</th>
					<th width="9%" colspan="3" align="center">DPK</th>
					<th width="9%" colspan="3" align="center">DMG</th>
					<th width="9%" colspan="3" align="center">BGR</th>										
					<th width="9%" colspan="3" align="center">PST</th>
					<th width="9%" colspan="3" align="center">PDN</th>
					<th width="9%" colspan="3" align="center">TKP</th>
					<th width="9%" colspan="3" align="center">SKB</th>
					
					
					
										
					
															
				</tr>
				
				<tr>					
					<th  width="3%" align="center">T</th> <!--JTN-->
					<th  width="3%" align="center">R</th>
					<th  width="3%" align="center">%</th>
					<th  width="3%" align="center">T</th> <!--KMYR-->
					<th  width="3%" align="center">R</th>
					<th  width="3%" align="center">%</th> 
					<th  width="3%" align="center">T</th> <!--BKS-->
					<th  width="3%" align="center">R</th>
					<th  width="3%" align="center">%</th>
					<th  width="3%" align="center">T</th> <!--DPK-->
					<th  width="3%" align="center">R</th>
					<th  width="3%" align="center">%</th>
					<th  width="3%" align="center">T</th> <!--DM-->
					<th  width="3%" align="center">R</th>
					<th  width="3%" align="center">%</th>					
					<th  width="3%" align="center">T</th> <!--BGR-->
					<th  width="3%" align="center">R</th>
					<th  width="3%" align="center">%</th>
					<th  width="3%" align="center">T</th> <!--PST-->
					<th  width="3%" align="center">R</th>
					<th  width="3%" align="center">%</th>
					<th  width="3%" align="center">T</th> <!--PDRN-->
					<th  width="3%" align="center">R</th>
					<th  width="3%" align="center">%</th>
					<th  width="3%" align="center">T</th> <!--TPRAHU-->
					<th  width="3%" align="center">R</th>
					<th  width="3%" align="center">%</th>
					<th  width="3%" align="center">T</th> <!--SKBM-->
					<th  width="3%" align="center">R</th>
					<th  width="3%" align="center">%</th>

					
					
					
				</tr>';
			
			
			foreach ($cetak_kinerja as $row) 

			{
				$jtnt = $row['jtn_t'];
				$kmyrt = $row['kmyr_t'];
				$bkst = $row['bks_t'];
				$dpkt = $row['dpk_t'];
				$dmt = $row['dm_t'];
				$bgrt = $row['bgr_t'];
				$pstt = $row['pst_t'];
				$tprahut = $row['tprahu_t'];
				$skbmt = $row['skbm_t'];
				


				

					$row['jtn_r'] = $row['jtn_r'];
                    $row['jtn_t'] = $row['jtn_t'];
                    if ($row['jtn_t'] == 0) {
                    $akmjtn = 0;
                    } else { //jika pembagi tidak 0
                    $akmjtn = ($row['jtn_r'] / $row['jtn_t']) * 100;
                    }
                    //$akmjtn       = ($row['jtnr'] / $row['jtnt']) * 100;

                    $row['kmyr_r'] = $row['kmyr_r'];
                    $row['kmyr_t'] = $row['kmyr_t'];
                    if ($row['kmyr_t'] == 0) {
                    $akmkmyr = 0;
                    } else { //jika pembagi tidak 0
                    $akmkmyr = ($row['kmyr_r'] / $row['kmyr_t']) * 100;
                    }
                    // $akmkmyr      = ($row['kmyrr'] / $row['kmyrt']) * 100;

                    $row['bks_r'] = $row['bks_r'];
                    $row['bks_t'] = $row['bks_t'];
                    if ($row['bks_t'] == 0) {
                    $akmbks = 0;
                    } else { //jika pembagi tidak 0
                    $akmbks = ($row['bks_r'] / $row['bks_t']) * 100;
                    }
                    // $akmbks       = ($row['bksr'] / $row['bkst']) * 100;

                    $row['dpk_r'] = $row['dpk_r'];
                    $row['dpk_t'] = $row['dpk_t'];
                    if ($row['dpk_t'] == 0) {
                    $akmdpk = 0;
                    } else { //jika pembagi tidak 0
                    $akmdpk = ($row['dpk_r'] / $row['dpk_t']) * 100;
                    }
                    // $akmdpk       = ($row['dpkr'] / $row['dpkt']) * 100;

                    $row['dm_r'] = $row['dm_r'];
                    $row['dm_t'] = $row['dm_t'];
                    if ($row['dm_t'] == 0) {
                    $akmdm = 0;
                    } else { //jika pembagi tidak 0
                    $akmdm = ($row['dm_r'] / $row['dm_t']) * 100;
                    }
                    // $akmdm        = ($row['dmr'] / $row['dmt']) * 100;

                    $row['bgr_r'] = $row['bgr_r'];
                    $row['bgr_t'] = $row['bgr_t'];
                    if ($row['bgr_t'] == 0) {
                    $akmbgr = 0;
                    } else { //jika pembagi tidak 0
                    $akmbgr = ($row['bgr_r'] / $row['bgr_t']) * 100;
                    }
                    // $akmbgr       = ($row['bgrr'] / $row['bgrt']) * 100;

                    $row['pst_r'] = $row['pst_r'];
                    $row['pst_t'] = $row['pst_t'];
                    if ($row['pst_t'] == 0) {
                    $akmpst = 0;
                    } else { //jika pembagi tidak 0
                    $akmpst = ($row['pst_r'] / $row['pst_t']) * 100;
                    }
                    // $akmpst       = ($row['pstr'] / $row['pstt']) * 100;

                    $row['pdrn_r'] = $row['pdrn_r'];
                    $row['pdrn_t'] = $row['pdrn_t'];
                    if ($row['pdrn_t'] == 0) {
                    $akmpdrn = 0;
                    } else { //jika pembagi tidak 0
                    $akmpdrn = ($row['pdrn_r'] / $row['pdrn_t']) * 100;
                    }
                    // $akmpdrn      = ($row['pdrnr'] / $row['pdrnt']) * 100;

                    $row['tprahu_r'] = $row['tprahu_r'];
                    $row['tprahu_t'] = $row['tprahu_t'];
                    if ($row['tprahu_t'] == 0) {
                    $akmtprahu = 0;
                    } else { //jika pembagi tidak 0
                    $akmtprahu = ($row['tprahu_r'] / $row['tprahu_t']) * 100;
                    }
                    // $akmtprahu    = ($row['tprahur'] / $row['tprahut']) * 100;

                    $row['skbm_r'] = $row['skbm_r'];
                    $row['skbm_t'] = $row['skbm_t'];
                    if ($row['skbm_t'] == 0) {
                    $akmskbm = 0;
                    } else { //jika pembagi tidak 0
                    $akmskbm = ($row['skbm_r'] / $row['skbm_t']) * 100;
                    }
                    // $akmskbm      = ($row['skbmr'] / $row['skbmt']) * 100;

                    

                    


				

			

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
				
				$html.='				
				<tr>
					
					<td bgcolor="" width="10%" align="left"><b>'.$row['nama_uraiankrs'].'</b></td>';

					$waktu=$row['jtn_r'];
					if($waktu < $row['jtn_t']){
						$warna = 'Salmon';
						}elseif($waktu > $row['jtn_t']){
						$warna = 'Skyblue';
					}else{
						$warna = 'white';
					}
					

					$waktu1=$row['kmyr_r'];
					if($waktu1 < $row['kmyr_t']){
						$warna1 = 'Salmon';
					}elseif($waktu1 > $row['kmyr_t']){
						$warna1 = 'Skyblue';
					}else{
						$warna1 = 'white';
					}

					$waktu2=$row['bks_r'];
					if($waktu2 < $row['bks_t']){
						$warna2 = 'Salmon';
					}elseif($waktu2 > $row['bks_t']){
						$warna2 = 'Skyblue';
					}else{
						$warna2 = 'white';
					}

					$waktu3=$row['dpk_r'];
					if($waktu3 < $row['dpk_t']){
						$warna3 = 'Salmon';
					}elseif($waktu3 > $row['dpk_t']){
						$warna3 = 'Skyblue';
					}else{
						$warna3 = 'white';
					}

					$waktu4=$row['dm_r'];
					if($waktu3 < $row['dm_t']){
						$warna3 = 'Salmon';
					}elseif($waktu3 > $row['dm_t']){
						$warna3 = 'Skyblue';
					}else{
						$warna3 = 'white';
					}

					$waktu5=$row['bgr_r'];
					if($waktu5 < $row['bgr_t']){
						$warna5 = 'Salmon';
					}elseif($waktu5 > $row['bgr_t']){
						$warna5 = 'Skyblue';
					}else{
						$warna5 = 'white';
					}

					$waktu6=$row['pst_r'];
					if($waktu6 < $row['pst_t']){
						$warna6 = 'Salmon';
					}elseif($waktu6 > $row['pst_t']){
						$warna6 = 'Skyblue';
					}else{
						$warna6 = 'white';
					}

					$waktu7=$row['pdrn_r'];
					if($waktu7 < $row['pdrn_t']){
						$warna7 = 'Salmon';
					}elseif($waktu7 > $row['pdrn_t']){
						$warna7 = 'Skyblue';
					}else{
						$warna7 = 'white';
					}

					$waktu8=$row['tprahu_r'];
					if($waktu8 < $row['tprahu_t']){
						$warna8 = 'Salmon';
					}elseif($waktu8 > $row['tprahu_t']){
						$warna8 = 'Skyblue';
					}else{
						$warna8 = 'white';
					}

					$waktu9=$row['skbm_r'];
					if($waktu9 < $row['skbm_t']){
						$warna9 = 'Salmon';
					}elseif($waktu9 > $row['skbm_t']){
						$warna9 = 'Skyblue';
					}else{
						$warna9 = 'white';
					}

					

					
				
					$html.='<td align="center">'.number_format($row['jtn_t'],1).'</td>
					<td bgcolor="'.$warna.'" align="center">'.$row['jtn_r'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmjtn,1).'</td>
					<td align="center">'.number_format($row['kmyr_t'],1).'</td>
					<td bgcolor="'.$warna1.'" align="center">'.$row['kmyr_r'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmkmyr,1).'</td>
					<td align="center">'.number_format($row['bks_t'],1).'</td>
					<td bgcolor="'.$warna2.'" align="center">'.$row['bks_r'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmbks,1).'</td>
					<td align="center">'.number_format($row['dpk_t'],1).'</td>
					<td bgcolor="'.$warna3.'" align="center">'.$row['dpk_r'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmdpk,1).'</td>
					<td align="center">'.number_format($row['dm_t'],1).'</td>
					<td bgcolor="'.$warna4.'" align="center">'.$row['dm_r'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmdm,1).'</td>
					<td align="center">'.number_format($row['bgr_t'],1).'</td>
					<td bgcolor="'.$warna5.'" align="center">'.$row['bgr_r'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmbgr,1).'</td>					
					<td align="center">'.number_format($row['pst_t'],1).'</td>
					<td bgcolor="'.$warna6.'" align="center">'.$row['pst_r'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmpst,1).'</td>
					<td align="center">'.number_format($row['pdrn_t'],1).'</td>
					<td bgcolor="'.$warna7.'" align="center">'.$row['pdrn_r'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmpdrn,1).'</td>
					<td align="center">'.number_format($row['tprahu_t'],1).'</td>
					<td bgcolor="'.$warna8.'" align="center">'.$row['tprahu_r'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmtprahu,1).'</td>
					<td align="center">'.number_format($row['skbm_t'],1).'</td>
					<td bgcolor="'.$warna9.'" align="center">'.$row['skbm_r'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmskbm,1).'</td>
					
					
					
					
					
					
					
				</tr>';
			}				
				
			$html.='</table>';			
			$pdf->writeHTML($html, true, false, true, false, '');
									
			// HALAMAN 2
			$pdf->AddPage('L','LEGAL');
			$pdf->SetFont('helvetica', '', 12);
			$pdf->Image('assets/upload/hhg-logo.png',10,5,40,40,'PNG');

			$html='
				<style>
				table thead 
			{
				display: table-header-group;
			}
			</style>
				  <table border="0"><thead>
					<tr>
					<td style="text-align:center;font-size:20;font-weight:bold;">PERKUMPULAN HERMINA GROUP</td>
					</tr>
					
					<tr><td></td></tr>
					<tr>
						<td style="text-align:center;font-size:10;">Jl. Selangit B-10 Kav 04 RT - RW - Gunung Sahari Selatan Kec. Kemayoran 
						<br>Kota Administrasi Jakarta Pusat 10610
						<br>Website : www.herminahospitalgroup.com
						<br><br><br><hr></td>
					</tr>
					<tr>
					<td align="center" style="font-size:14px;"><b>LAPORAN KINERJA RS HERMINA</b></td></tr></table></thead>

	       ';
			
			$html.='
			<p style="font-size:8px;">Tanggal : '.$tgl.' s/d '.$tgl2.' <p>
			';
									
			$html.='
			<table border="1" cellpadding="1" style="font-size:7px;">
				<tr bgcolor="#D3D3D3" style="font-weight: bold;">	 
					
					<th width="10%" rowspan="2" align="center"><b>URAIAN</b></th>
					<th width="9%" colspan="3" align="center">TGR</th>
					<th width="9%" colspan="3" align="center">GW</th>
					<th width="9%" colspan="3" align="center">ARC</th>
					<th width="9%" colspan="3" align="center">GLX</th>
					<th width="9%" colspan="3" align="center">PLB</th>
					<th width="9%" colspan="3" align="center">CPT</th>					
					<th width="9%" colspan="3" align="center">MRS</th>
					<th width="9%" colspan="3" align="center">SPG</th>
					<th width="9%" colspan="3" align="center">BM</th>
					<th width="9%" colspan="3" align="center">SL</th>

					
					
					   
					
															
				</tr>
				
				<tr>					
					<th  width="3%" align="center">T</th> <!--TGR-->
					<th  width="3%" align="center">R</th>
					<th  width="3%" align="center">%</th>
					<th  width="3%" align="center">T</th> <!--GW-->
					<th  width="3%" align="center">R</th>
					<th  width="3%" align="center">%</th>
					<th  width="3%" align="center">T</th> <!--ARCA-->
					<th  width="3%" align="center">R</th>
					<th  width="3%" align="center">%</th>
					<th  width="3%" align="center">T</th> <!--GLXY-->
					<th  width="3%" align="center">R</th>
					<th  width="3%" align="center">%</th>
					<th  width="3%" align="center">T</th> <!--PLB-->
					<th  width="3%" align="center">R</th>
					<th  width="3%" align="center">%</th>
					<th  width="3%" align="center">T</th> <!--CPT-->
					<th  width="3%" align="center">R</th>
					<th  width="3%" align="center">%</th>
					<th  width="3%" align="center">T</th> <!--MKS-->
					<th  width="3%" align="center">R</th>
					<th  width="3%" align="center">%</th>
					<th  width="3%" align="center">T</th> <!--SPG-->
					<th  width="3%" align="center">R</th>
					<th  width="3%" align="center">%</th>
					<th  width="3%" align="center">T</th> <!--BYMK-->
					<th  width="3%" align="center">R</th>
					<th  width="3%" align="center">%</th>
					<th  width="3%" align="center">T</th> <!--SOLO-->
					<th  width="3%" align="center">R</th>
					<th  width="3%" align="center">%</th>

					
					
				</tr>';
			
			
			foreach ($cetak_kinerja as $row) 
			{
				$tgrt = $row['tgr_t'];
				$gwt = $row['gw_t'];
				$arcat = $row['arca_t'];
				$glxyt = $row['glxy_t'];
				$plbt = $row['plb_t'];
				$cptt = $row['cpt_t'];

					$row['tgr_r'] = $row['tgr_r'];
                    $row['tgr_t'] = $row['tgr_t'];
                    if ($row['tgr_t'] == 0) {
                    $akmtgr = 0;
                    } else { //jika pembagi tidak 0
                    $akmtgr = ($row['tgr_r'] / $row['tgr_t']) * 100;
                    }
                    // $akmtgr       = ($row['tgrr'] / $row['tgrt']) * 100;

                    $row['gw_r'] = $row['gw_r'];
                    $row['gw_t'] = $row['gw_t'];
                    if ($row['gw_t'] == 0) {
                    $akmgw = 0;
                    } else { //jika pembagi tidak 0
                    $akmgw = ($row['gw_r'] / $row['gw_t']) * 100;
                    }
                    // $akmgw        = ($row['gwr'] / $row['gwt']) * 100;

                    $row['arca_r'] = $row['arca_r'];
                    $row['arca_t'] = $row['arca_t'];
                    if ($row['arca_t'] == 0) {
                    $akmarca = 0;
                    } else { //jika pembagi tidak 0
                    $akmarca = ($row['arca_r'] / $row['arca_t']) * 100;
                    }
                    // $akmarca      = ($row['arcar'] / $row['arcat']) * 100;

                    $row['glxy_r'] = $row['glxy_r'];
                    $row['glxy_t'] = $row['glxy_t'];
                    if ($row['glxy_t'] == 0) {
                    $akmglxy = 0;
                    } else { //jika pembagi tidak 0
                    $akmglxy = ($row['glxy_r'] / $row['glxy_t']) * 100;
                    }
                    // $akmglxy      = ($row['glxyr'] / $row['glxyt']) * 100;

					$row['plb_r'] = $row['plb_r'];
                    $row['plb_t'] = $row['plb_t'];
                    if ($row['plb_t'] == 0) {
                    $akmplb = 0;
                    } else { //jika pembagi tidak 0
                    $akmplb = ($row['plb_r'] / $row['plb_t']) * 100;
                    }
                    // $akmplb       = ($row['plbr'] / $row['plbt']) * 100;

                    $row['cpt_r'] = $row['cpt_r'];
                    $row['cpt_t'] = $row['cpt_t'];
                    if ($row['cpt_t'] == 0) {
                    $akmcpt = 0;
                    } else { //jika pembagi tidak 0
                    $akmcpt = ($row['cpt_r'] / $row['cpt_t']) * 100;
                    }

					 $row['mks_r'] = $row['mks_r'];
                    $row['mks_t'] = $row['mks_t'];
                    if ($row['mks_t'] == 0) {
                    $akmmks = 0;
                    } else { //jika pembagi tidak 0
                    $akmmks = ($row['mks_r'] / $row['mks_t']) * 100;
                    }
                    // $akmmks       = ($row['mksr'] / $row['mkst']) * 100;

                    $row['spg_r'] = $row['spg_r'];
                    $row['spg_t'] = $row['spg_t'];
                    if ($row['spg_t'] == 0) {
                    $akmspg = 0;
                    } else { //jika pembagi tidak 0
                    $akmspg = ($row['spg_r'] / $row['spg_t']) * 100;
                    }
                    // $akmspg       = ($row['spgr'] / $row['spgt']) * 100;

                    $row['bymk_r'] = $row['bymk_r'];
                    $row['bymk_t'] = $row['bymk_t'];
                    if ($row['bymk_t'] == 0) {
                    $akmbymk = 0;
                    } else { //jika pembagi tidak 0
                    $akmbymk = ($row['bymk_r'] / $row['bymk_t']) * 100;
                    }
                    // $akmbymk      = ($row['bymkr'] / $row['bymkt']) * 100;

                    $row['solo_r'] = $row['solo_r'];
                    $row['solo_t'] = $row['solo_t'];
                    if ($row['solo_t'] == 0) {
                    $akmsolo = 0;
                    } else { //jika pembagi tidak 0
                    $akmsolo = ($row['solo_r'] / $row['solo_t']) * 100;
                    }
                    // $akmsolo      = ($row['solor'] / $row['solot']) * 100;

                   

				$warna10 = 'white';
				$warna11 = 'white';
				$warna12 = 'white';
				$warna13 = 'white';
				$warna14 = 'white';
				$warna15 = 'white';
				$warna16 = 'white';
				$warna17 = 'white';
				$warna18 = 'white';
				$warna19 = 'white';
				
				$html.='
				
				<tr>
					
					
					<td bgcolor="" align="left"><b>'.$row['nama_uraiankrs'].'</b></td>';	

					$waktu10=$row['tgr_r'];
					if($waktu10 < $row['tgr_t']){
						$warna10 = 'Salmon';
					}elseif($waktu10 > $row['tgr_t']){
						$warna10 = 'Skyblue';
					}else{
						$warna10 = 'white';
					}

					$waktu11=$row['gw_r'];
					if($waktu11 < $row['gw_t']){
						$warna11 = 'Salmon';
					}elseif($waktu11 > $row['gw_t']){
						$warna11 = 'Skyblue';
					}else{
						$warna11 = 'white';
					}

					$waktu12=$row['arca_r'];
					if($waktu12 < $row['arca_t']){
						$warna12 = 'Salmon';
					}elseif($waktu12 > $row['arca_t']){
						$warna12 = 'Skyblue';
					}else{
						$warna12 = 'white';
					}

					$waktu13=$row['glxy_r'];
					if($waktu13 < $row['glxy_t']){
						$warna13 = 'Salmon';
					}elseif($waktu13 > $row['glxy_t']){
						$warna13 = 'Skyblue';
					}else{
						$warna13 = 'white';
					}				
					
					$waktu14=$row['plb_r'];
					if($waktu14 < $row['plb_t']){
						$warna14 = 'Salmon';
					}elseif($waktu14 > $row['plb_t']){
						$warna14 = 'Skyblue';
					}else{
						$warna14 = 'white';
					}

					$waktu15=$row['cpt_r'];
					if($waktu15 < $row['cpt_t']){
						$warna15 = 'Salmon';
					}elseif($waktu15 > $row['cpt_t']){
						$warna15 = 'Skyblue';
					}else{
						$warna15 = 'white';
					}

					$waktu16=$row['mks_r'];
					if($waktu16 < $row['mks_t']){
						$warna16 = 'Salmon';
					}elseif($waktu16 > $row['mks_t']){
						$warna16 = 'Skyblue';
					}else{
						$warna16 = 'white';
					}

					$waktu17=$row['spg_r'];
					if($waktu17 < $row['spg_t']){
						$warna17 = 'Salmon';
					}elseif($waktu17 > $row['spg_t']){
						$warna17 = 'Skyblue';
					}else{
						$warna17 = 'white';
					}

					$waktu18=$row['bymk_r'];
					if($waktu18 < $row['bymk_t']){
						$warna18 = 'Salmon';
					}elseif($waktu18 > $row['bymk_t']){
						$warna18 = 'Skyblue';
					}else{
						$warna18 = 'white';
					}

					$waktu19=$row['solo_r'];
					if($waktu19 < $row['solo_t']){
						$warna19 = 'Salmon';
					}elseif($waktu19 > $row['solo_t']){
						$warna19 = 'Skyblue';
					}else{
						$warna19 = 'white';
					}

					

					
					$html.='
					<td align="center">'.number_format($row['tgr_t'],1).'</td>
					<td bgcolor="'.$warna10.'" align="center">'.$row['tgr_r'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmtgr,1).'</td>
					<td align="center">'.number_format($row['gw_t'],1).'</td>
					<td bgcolor="'.$warna11.'" align="center">'.$row['gw_r'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmgw,1).'</td>
					<td align="center">'.number_format($row['arca_t'],1).'</td>
					<td bgcolor="'.$warna12.'" align="center">'.$row['arca_r'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmarca,1).'</td>
					<td align="center">'.number_format($row['glxy_t'],1).'</td>
					<td bgcolor="'.$warna13.'" align="center">'.$row['glxy_r'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmglxy,1).'</td>
					<td align="center">'.number_format($row['plb_t'],1).'</td>
					<td bgcolor="'.$warna14.'" align="center">'.$row['plb_r'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmplb,1).'</td>
					<td align="center">'.number_format($row['cpt_t'],1).'</td>
					<td bgcolor="'.$warna14.'" align="center">'.$row['cpt_r'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmcpt,1).'</td>
					<td align="center">'.number_format($row['mks_t'],1).'</td>
					<td bgcolor="'.$warna16.'" align="center">'.$row['mks_r'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmmks,1).'</td>
					<td align="center">'.number_format($row['spg_t'],1).'</td>
					<td bgcolor="'.$warna17.'" align="center">'.$row['spg_r'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmspg,1).'</td>
					<td align="center">'.number_format($row['bymk_t'],1).'</td>
					<td bgcolor="'.$warna18.'" align="center">'.$row['bymk_r'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmbymk,1).'</td>
					<td align="center">'.number_format($row['solo_t'],1).'</td>
					<td bgcolor="'.$warna19.'" align="center">'.$row['solo_r'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmsolo,1).'</td>
					
				</tr>';
			}	

			$html.='</table>';			
			$pdf->writeHTML($html, true, false, true, false, '');
									
			// HALAMAN 3
			$pdf->AddPage('L','LEGAL');
			$pdf->SetFont('helvetica', '', 12);
			$pdf->Image('assets/upload/hhg-logo.png',10,5,40,40,'PNG');

			$html='
				<style>
				table thead 
			{
				display: table-header-group;
			}
			</style>
				  <table border="0"><thead>
					<tr>
					<td style="text-align:center;font-size:20;font-weight:bold;">PERKUMPULAN HERMINA GROUP</td>
					</tr>
					
					<tr><td></td></tr>
					<tr>
						<td style="text-align:center;font-size:10;">Jl. Selangit B-10 Kav 04 RT - RW - Gunung Sahari Selatan Kec. Kemayoran 
						<br>Kota Administrasi Jakarta Pusat 10610
						<br>Website : www.herminahospitalgroup.com
						<br><br><br><hr></td>
					</tr>
					<tr>
					<td align="center" style="font-size:14px;"><b>LAPORAN KINERJA RS HERMINA</b></td></tr></table></thead>

	       ';
			
			$html.='
			<p style="font-size:8px;">Tanggal : '.$tgl.' s/d '.$tgl2.' <p>
			';
									
			$html.='
			<table border="1" cellpadding="1" style="font-size:7px;">
				<tr bgcolor="#D3D3D3" style="font-weight: bold;">	 
					
					<th width="10%" rowspan="2" align="center"><b>URAIAN</b></th>
					<th width="10%" colspan="3" align="center">CRS</th>
					<th width="10%" colspan="3" align="center">YGY</th>
					<th width="10%" colspan="3" align="center">BTG</th>
					<th width="10%" colspan="3" align="center">MKR</th>
					<th width="10%" colspan="3" align="center">BLP</th>
					<th width="10%" colspan="3" align="center">MDN</th>
					<th width="10%" colspan="3" align="center">PDM</th>
					<th width="10%" colspan="3" align="center">PWK</th>
					
					   
					
					<th width="10%" rowspan="2" align="center">AKM</th>										
				</tr>
				
				<tr>					
					

					<th  width="3.333333333333333%" align="center">T</th> <!--CIRUAS-->
					<th  width="3.333333333333333%" align="center">R</th>
					<th  width="3.333333333333333%" align="center">%</th>
					<th  width="3.333333333333333%" align="center">T</th> <!--YOGYA-->
					<th  width="3.333333333333333%" align="center">R</th>
					<th  width="3.333333333333333%" align="center">%</th>
					<th  width="3.333333333333333%" align="center">T</th> <!--BITUNG-->
					<th  width="3.333333333333333%" align="center">R</th>
					<th  width="3.333333333333333%" align="center">%</th>
					<th  width="3.333333333333333%" align="center">T</th> <!--MKSR-->
					<th  width="3.333333333333333%" align="center">R</th>
					<th  width="3.333333333333333%" align="center">%</th>
					<th  width="3.333333333333333%" align="center">T</th> <!--BLKPPN-->
					<th  width="3.333333333333333%" align="center">R</th>
					<th  width="3.333333333333333%" align="center">%</th>
					<th  width="3.333333333333333%" align="center">T</th> <!--MDN-->
					<th  width="3.333333333333333%" align="center">R</th>
					<th  width="3.333333333333333%" align="center">%</th>
					<th  width="3.333333333333333%" align="center">T</th> <!--PDM-->
					<th  width="3.333333333333333%" align="center">R</th>
					<th  width="3.333333333333333%" align="center">%</th>
					<th  width="3.333333333333333%" align="center">T</th> <!--PWT-->
					<th  width="3.333333333333333%" align="center">R</th>
					<th  width="3.333333333333333%" align="center">%</th>
					
				</tr>';
			
			
			foreach ($cetak_kinerja as $row) 
			{
				$tgrt = $row['tgr_t'];
				$gwt = $row['gw_t'];
				$arcat = $row['arca_t'];
				$glxyt = $row['glxy_t'];
				$plbt = $row['plb_t'];
				$cptt = $row['cpt_t'];
				
					

                    $row['ciruas_r'] = $row['ciruas_r'];
                    $row['ciruas_t'] = $row['ciruas_t'];
                    if ($row['ciruas_t'] == 0) {
                    $akmciruas = 0;
                    } else { //jika pembagi tidak 0
                    $akmciruas = ($row['ciruas_r'] / $row['ciruas_t']) * 100;
                    }
                    // $akmciruas    = ($row['ciruasr'] / $row['ciruast']) * 100;

                    $row['yogya_r'] = $row['yogya_r'];
                    $row['yogya_t'] = $row['yogya_t'];
                    if ($row['yogya_t'] == 0) {
                    $akmyogya = 0;
                    } else { //jika pembagi tidak 0
                    $akmyogya = ($row['yogya_r'] / $row['yogya_t']) * 100;
                    }
                    // $akmyogya     = ($row['yogyar'] / $row['yogyat']) * 100;

                    $row['bitung_r'] = $row['bitung_r'];
                    $row['bitung_t'] = $row['bitung_t'];
                    if ($row['bitung_t'] == 0) {
                    $akmbitung = 0;
                    } else { //jika pembagi tidak 0
                    $akmbitung = ($row['bitung_r'] / $row['bitung_t']) * 100;
                    }
                    // $akmbitung    = ($row['bitungr'] / $row['bitungt']) * 100;

                    $row['mksr_r'] = $row['mksr_r'];
                    $row['mksr_t'] = $row['mksr_t'];
                    if ($row['mksr_t'] == 0) {
                    $akmmksr = 0;
                    } else { //jika pembagi tidak 0
                    $akmmksr = ($row['mksr_r'] / $row['mksr_t']) * 100;
                    }
                    // $akmmksr      = ($row['mksrr'] / $row['mksrt']) * 100;

                    $row['blkppn_r'] = $row['blkppn_r'];
                    $row['blkppn_t'] = $row['blkppn_t'];
                    if ($row['blkppn_t'] == 0) {
                    $akmblkppn = 0;
                    } else { //jika pembagi tidak 0
                    $akmblkppn = ($row['blkppn_r'] / $row['blkppn_t']) * 100;
                    }
                    // $akmblkppn    = ($row['blkppnr'] / $row['blkppnt']) * 100;

                    $row['mdn_r'] = $row['mdn_r'];
                    $row['mdn_t'] = $row['mdn_t'];
                    if ($row['mdn_t'] == 0) {
                    $akmmdn = 0;
                    } else { //jika pembagi tidak 0
                    $akmmdn = ($row['mdn_r'] / $row['mdn_t']) * 100;
                    }
                    // $akmmdn       = ($row['mdnr'] / $row['mdnt']) * 100;

                    $row['pdm_r'] = $row['pdm_r'];
                    $row['pdm_t'] = $row['pdm_t'];
                    if ($row['pdm_t'] == 0) {
                    $akmpdm = 0;
                    } else { //jika pembagi tidak 0
                    $akmpdm = ($row['pdm_r'] / $row['pdm_t']) * 100;
                    }
                    // $akmpdm       = ($row['pdmr'] / $row['pdmt']) * 100;

                    $row['pwt_r'] = $row['pwt_r'];
                    $row['pwt_t'] = $row['pwt_t'];
                    if ($row['pwt_t'] == 0) {
                    $akmpwt = 0;
                    } else { //jika pembagi tidak 0
                    $akmpwt = ($row['pwt_r'] / $row['pwt_t']) * 100;
                    }


				$capai=$row['jtn_r'] + $row['kmyr_r'] + $row['bks_r'] + $row['dpk_r'] + $row['dm_r'] + $row['bgr_r'] + $row['pst_r']  + $row['tprahu_r'] + $row['skbm_r'] + $row['tgr_r'] + $row['gw_r'] + $row['arca_r'] + $row['glxy_r'] + $row['plb_r'] + $row['cpt_r'] + $row['mks_r'] + $row['spg_r'] + $row['bymk_r'] + $row['solo_r'] + $row['ciruas_r'] + $row['yogya_r'] + $row['bitung_r'] + $row['mksr_r'] + $row['mdn_r'] + $row['blkppn_r'] + $row['pdm_r'] + $row['pwt_r'] ;
				$target=$jtnt + $kmyrt + $bkst + $dpkt + $dmt + $bgrt + $pstt + $tprahut + $skbmt + $tgrt + $gwt + $arcat + $glxyt + $plbt + $row['cpt_t'] + $row['mks_t'] + $row['spg_t'] + $row['bymk_t'] + $row['solo_t'] + $row['ciruas_t'] + $row['yogya_t'] + $row['bitung_t'] + $row['mksr_t'] + $row['mdn_t'] + $row['blkppn_t'] + $row['pdm_t'] + $row['pwt_t'] ;
				
				$akm=$capai/$target*100;

				
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
					
					
					<td bgcolor="" width="10%" align="left"><b>'.$row['nama_uraiankrs'].'</b></td>';	

					

					$waktu20=$row['ciruas_r'];
					if($waktu20 < $row['ciruas_t']){
						$warna20 = 'Salmon';
					}elseif($waktu20 > $row['ciruas_t']){
						$warna20 = 'Skyblue';
					}else{
						$warna20 = 'white';
					}

					$waktu21=$row['yogya_r'];
					if($waktu21 < $row['yogya_t']){
						$warna21 = 'Salmon';
					}elseif($waktu21 > $row['yogya_t']){
						$warna21 = 'Skyblue';
					}else{
						$warna21 = 'white';
					}

					$waktu22=$row['bitung_r'];
					if($waktu22 < $row['bitung_t']){
						$warna22 = 'Salmon';
					}elseif($waktu22 > $row['bitung_t']){
						$warna22 = 'Skyblue';
					}else{
						$warna22 = 'white';
					}

					$waktu23=$row['mksr_r'];
					if($waktu23 < $row['mksr_t']){
						$warna23 = 'Salmon';
					}elseif($waktu23 > $row['mksr_t']){
						$warna23 = 'Skyblue';
					}else{
						$warna23 = 'white';
					}

					$waktu24=$row['blkppn_r'];
					if($waktu24 < $row['blkppn_t']){
						$warna24 = 'Salmon';
					}elseif($waktu24 > $row['blkppn_t']){
						$warna24 = 'Skyblue';
					}else{
						$warna24 = 'white';
					}

					$waktu25=$row['mdn_r'];
					if($waktu25 < $row['mdn_t']){
						$warna25 = 'Salmon';
					}elseif($waktu25 > $row['mdn_t']){
						$warna25 = 'Skyblue';
					}else{
						$warna25 = 'white';
					}

					$waktu26=$row['pdm_r'];
					if($waktu26 < $row['pdm_t']){
						$warna26 = 'Salmon';
					}elseif($waktu26 > $row['pdm_t']){
						$warna26 = 'Skyblue';
					}else{
						$warna26 = 'white';
					}

					$waktu27=$row['pwt_r'];
					if($waktu27 < $row['pwt_t']){
						$warna27 = 'Salmon';
					}elseif($waktu27 > $row['pwt_t']){
						$warna27 = 'Skyblue';
					}else{
						$warna27 = 'white';
					}

					
					$html.='
					
					<td align="center">'.number_format($row['ciruas_t'],1).'</td>
					<td bgcolor="'.$warna20.'" align="center">'.$row['ciruas_r'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmciruas,1).'</td>
					<td align="center">'.number_format($row['yogya_t'],1).'</td>
					<td bgcolor="'.$warna21.'" align="center">'.$row['yogya_r'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmyogya,1).'</td>
					<td align="center">'.number_format($row['bitung_t'],1).'</td>
					<td bgcolor="'.$warna22.'" align="center">'.$row['bitung_r'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmbitung,1).'</td>
					<td align="center">'.number_format($row['mksr_t'],1).'</td>
					<td bgcolor="'.$warna23.'" align="center">'.$row['mksr_r'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmmksr,1).'</td>
					<td align="center">'.number_format($row['blkppn_t'],1).'</td>
					<td bgcolor="'.$warna24.'" align="center">'.$row['blkppn_r'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmblkppn,1).'</td>
					<td align="center">'.number_format($row['mdn_t'],1).'</td>
					<td bgcolor="'.$warna25.'" align="center">'.$row['mdn_r'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmmdn,1).'</td>
					<td align="center">'.number_format($row['pdm_t'],1).'</td>
					<td bgcolor="'.$warna26.'" align="center">'.$row['pdm_r'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmpdm,1).'</td>
					<td align="center">'.number_format($row['pwt_t'],1).'</td>
					<td bgcolor="'.$warna27.'" align="center">'.$row['pwt_r'].'</td>
					<td bgcolor="#A9A9A9" align="center">'.$angka_format = number_format($akmpwt,1).'</td>
					
					<td bgcolor="#708090" align="center">'.$angka_format = number_format($akm,1).'%</td>
				</tr>';
			}							
				
			$html.='</table>';
			
			
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('Kinerja_Hermina.pdf');
?>