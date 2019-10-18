<?php

			$pdf = new Tpdf('P', 'mm', 'A4', true, 'UTF-8', false);
			//remove header
			$pdf->SetPrintHeader(false);
			$pdf->SetTitle('DATA CIS MAN IT');
			$pdf->SetHeaderMargin(10);
			$pdf->SetTopMargin(10);
			$pdf->SetLeftMargin(10);
			$pdf->SetFooterMargin(10);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage();
			$pdf->SetFont('helvetica', '', 9);
			
			
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
				
			foreach ($cetak_ttd as $r)
			{	
				$day=date('D',strtotime($r['tanggal']));
				$daylist=array(
					'Sun' => 'Minggu',
					'Mon' => 'Senin',
					'Tue' => 'Selasa',
					'Wed' => 'Rabu',
					'Thu' => 'Kamis',
					'Fri' => 'Jumat',
					'Sat' => 'Sabtu',
					);
			
			
				$data=date('d-m-Y',strtotime($r['tanggal']));
                $tgl=substr($data,0,2);
                $bulan=ubahbulan(substr($data,3,2));
                $thn=substr($data,6,4);
				
				$data=date('d m Y');
                $tgl1=substr($data,0,2);
                $bulan1=ubahbulan(substr($data,3,2));
                $thn1=substr($data,6,4);
			}
				
					
			$html='	
			<style>
				table thead 
			{
				display: table-header-group;
			}
			</style>
			<thead>
			
			<table border="0" cellspacing="1" cellpadding="2" style="text-align:center;font-weight:bold;font-size:13;">
						<tr><td width="100%" align="center">STANDAR MAN CIS DEP TI RSH BARU TIPE C</td></tr>
					</table><br><br>
			
			
			<table border="1" cellspacing="0" cellpadding="3">
						<tr style="font-weight:bold;text-align:center;line-height:13px;" bgcolor="#D3D3D3">	
							<th width="30" style="text-align:center;line-height:15px;">NO.</th>
							<th width="100" style="text-align:center;line-height:15px;">JABATAN</th>
							<th width="100" style="text-align:center;line-height:15px;">JUMLAH STANDAR</th>
							<th width="100" style="text-align:center;line-height:15px;">KUALIFIKASI</th>
							<th width="50" style="text-align:center;line-height:15px;">LEVEL</th>
							<th width="150" style="text-align:center;line-height:15px;">DIKLAT</th>
						</tr>
					</thead>';

			foreach ($Cetak_CisManIT as $row) 
				{
					$html.='
					<tr style="vertical-align:middle;align:center";>
							<td width="30" style="text-align:center;line-height:15px;">'.$row['no_it_man'].'</td>
							<td width="100" style="text-align:left;line-height:15px;">'.$row['jabatan'].'</td>
							<td width="100" style="text-align:center;line-height:15px;">'.$row['jmlh_standar'].'</td>
							<td width="100" style="text-align:center;line-height:15px;">'.$row['kualifikasi'].'</td>
							<td width="50" style="text-align:center;line-height:15px;">'.$row['level'].'</td>
							<td width="150" style="text-align:left;line-height:15px;">'.$row['diklat'].'</td>
						</tr>';
				}
				$html.='</table>';
				
				$html.='<table border="0" cellspacing="1" cellpadding="2" style="text-align:center;font-weight:bold;font-size:9;">
						<tr><td width="100%" align="left">Tanggal Cetak : '.$daylist[$day].', '.$tgl1.' '.$bulan1.' '.$thn1.' </td></tr>
					</table><br><br>';
				
				$html.='<table border="0">
					<tr>
					<td width="30"> </td>
					<td width="200" align="left">Jakarta, '.date('d-m-Y',strtotime($r['tanggal'])).'</td>
					<td width="100"> </td>
					<td width="200" align="center">Menyetujui,</td>
					</tr>';
					
					$html.='
					<table border="0">
					<tr>
					<td width="30"> </td>
					<td width="200" align="left">Kepala Departemen TI</td>
					<td width="100"> </td>
					<td width="200" align="center">Direktur Umum dan Keuangan</td>
					</tr>';
				
				foreach ($cetak_ttd as $qw) 
				{
					$html.='
					<table border="0">
					<tr>
						<td width="30"> </td>
						<td width="200"  align="left" style="line-height:10px;"><img src="assets/upload/'.$qw['ttd_mengetahui'].'" width="80px" height="50px"></td>
						<td width="100"> </td>
						<td width="200"  align="center" style="line-height:10px;"><img src="assets/upload/'.$qw['ttd_menyetujui'].'" width="80px" height="50px"></td>
					</tr> 
					<tr>
						<td width="30"> </td>
						<td width="200" align="left"><p>'.$qw['mengetahui'].'</p></td>
						<td width="100"> </td>
						<td width="200" align="center"><p>'.$qw['menyetujui'].'</p></td>
					</tr>
					</table>';
				}
				

				
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('DATA CIS MAN IT.pdf', 'I');
?>