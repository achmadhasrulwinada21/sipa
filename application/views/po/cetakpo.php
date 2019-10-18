<?php
			$pdf = new Tpdf('P', 'mm', 'LEGAL', true, 'UTF-8', false);
			$pdf->setPrintHeader(false);
			$pdf->SetTitle('PO');
			$pdf->SetHeaderMargin(5);
			$pdf->SetTopMargin(5);
			$pdf->SetLeftMargin(10);
			$pdf->setFooterMargin(10);
			$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage('P', 'LEGAL');
			$pdf->SetFont('helvetica', '', 8);	
			$pdf->Image('assets/upload/hhg-logo.png',8,8,25,25,'PNG');

				function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}

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
               
                $data=date('d m Y ');
                $tgl=substr($data,0,2);
                $bulan=ubahbulan(substr($data,3,2));
                $thn=substr($data,6,4);
               	
               
          if(isset($dt_penjualan)){
                foreach($dt_penjualan as $row){

                $datas= $data=date('d m Y',strtotime($row->tglpo));
                $tgll=substr($data,0,2);
                $bulann=ubahbulan(substr($data,3,2));
                $thnn=substr($data,6,4);

		$html='<h3 align="center">PO RS KE REKANAN</h3><br>
			     <table border="0">

					<tr>
	<td style="text-align:center;font-size:18;font-weight:bold;">'.$row->namars.'</td>
					</tr>
			
					<tr>
					<td width="120" ></td>
						<td width="300" style="text-align:center;font-size:10;">'.$row->alamat.'
						<br>Website : www.herminahospitalgroup.com
						</td></tr>
					</table><hr height="2px"/>
	    	 <b style="margin-bottom:4px;"></b> 
					
 <b>tanggal transaksi <span> : </span>'.$tgll.' '.$bulann.' '.$thnn.'</b>

			                 <p align="center"><b>SURAT PESANAN</b><br>
			                 <b>'.$row->nopo.'</b></p>
<table border="0">
<tr>
<td width="110">Yang memberi pesanan</td><td width="5">:</td>
</tr>
<tr>
<td width="110">Nama</td><td width="5">:</td>
<td width="220">'.$row->nm_mengetahui.'</td>
</tr>
<tr>
<td width="110">Jabatan</td><td width="5">:</td>
<td width="220">'.$row->jb_mengetahui.'</td>
</tr>
<tr>
<td width="110">Alamat</td><td width="5">:</td>
<td width="220">'.$row->alamat.'</td>
</tr>
</table><br>
<table border="0">
<tr>
<td width="110">Yang menerima pesanan</td><td width="5">:</td>
</tr>
<tr>
<td width="110">Nama Suplier</td><td width="5">:</td>
<td width="400">'.$row->nm_perusahaan.'</td>
</tr>
<tr>
<td width="110">Alamat</td><td width="5">:</td>
<td width="400">'.$row->s_alamat.'</td>
</tr>
<tr>
<td width="110">Telepon</td><td width="5">:</td>
<td width="400">'.$row->s_telp.'</td>
</tr>
</table>
<br>
<br>
 <span>Untuk Melakukan pengadaan alat medis '.$row->namars.', dengan jumlah dan spesifikasi sebagai berikut :</span><br>';
}
            }

					$html.='
					<table border="1" cellspacing="0"  cellpadding="2">
							
				  	  <tr bgcolor="grey" style="font-weight:bold;line-height:15px;">
					  <th width="25" style="text-align:center; bolt;line-height:15px;" > No </th>              
                      <th style="text-align:center;line-height:15px;"> Kode Produk </th>
					  <th width="200" style="text-align:center;line-height:15px;"> Nama Produk </th>       
                      <th width="40" style="text-align:center;line-height:15px;"> Qty </th>
                      <th style="text-align:center;line-height:15px;"> Harga </th>
                       <th style="text-align:center;line-height:15px;"> Subtotal </th>
					  </tr>

                     ';
                $no=0;
                $qty=0;
                if(isset($barang_jual)){
                    foreach($barang_jual as $row ){
                       
				$no++;
				$html.='

					<tr>
					<td width="25" align="center" style="line-height:15px;">'.$no.'</td>
						<td  align="center" style="line-height:15px;">'.$row->kode_produk.'</td>
						<td width="200" align="justify" style="line-height:15px;">'.$row->nama_produk.'</td>
						<td width="40" align="center" style="line-height:15px;">'.$row->jumlah.'</td>
						<td align="right" style="line-height:15px;">Rp. '.number_format($row->harga).'</td>
						<td align="right" style="line-height:15px;">Rp. '.number_format($row->hargaakhir).'</td>
					</tr>	
                  
					';
					$qty=$qty+$row->hargaakhir;	
				}
                }
				$html.=' <tr>
                    <td colspan="5" align="center" bgcolor="skyblue"><b>TOTAL</b></td>
                    <td align="right"><b>Rp. '.number_format($qty).'</b></td>
                   </tr></table>
                    <p><b>Terbilang : <i>'.terbilang($qty).' rupiah</i></b></p>	
                   ';
                    if(isset($dt_penjualan)){
                foreach($dt_penjualan as $row){
                //   $html.=' <tr>
                //  //    <td colspan="5" align="center" bgcolor="skyblue"><b>Diskon</b></td>
                //  //    <td align="right"><b>'.($row->disc).' %</b></td>
                //  //   </tr>
                //  //    <tr>
                //  //    <td colspan="5" align="center" bgcolor="skyblue"><b>Ppn</b></td>
                //  //    <td align="right"><b>'.($row->ppn).' %</b></td>
                //  //   </tr>
                //  //    <tr>
                //  //    <td colspan="5" align="center" bgcolor="skyblue"><b>Grand Total</b></td>
                //  //    <td align="right"><b>Rp. '.number_format($row->grand_total).'</b></td>
                //  //   </tr>
                   
                   
                //    ';
                  
      $html.='<span>Adapun persyaratan - persyaratan yang harus dipenuhi adalah sebagai berikut :</span><br>
                  <table border="0">
                   <tr>
                    <td width="10">1. </td>
                    <td>Pengiriman barang dilakukan segera setelah Surat Pesanan (SP) ini diterima </td>
                   </tr>
                    <tr>
                    <td width="10">2. </td>
                    <td>Cara Pembayaran :</td>
                   </tr>
                   <tr>
                    <td width="30"></td>
                    <td width="10">a. </td>
                    <td>Fraktur dan kuitansi atas nama '.$row->nm_perus.'</td>
                   </tr>
                   <tr>
                    <td width="30"></td>
                    <td width="10">b. </td>
                    <td>dibayarkan dengan tempo 2 (dua) minggu setelah barang diterima dalam kondisi baik</td>
                   </tr>
                  </table>
                   ';
              

                $html.='<br><br>
					';

					$html.='
					<table border="0">
					<tr>
					<td width="100" align="left"></td>
					<td width="200" align="left"></td>
					<td width="120"> </td>
					<td width="200" align="left">Jakarta, '.$tgl.' '.$bulan.' '.$thn.'</td>					
					</tr>
                    <tr>
					<td width="100" align="left"></td>
					<td width="200" align="left">Yang menerima pesanan,</td>
					<td width="120"> </td>
					<td width="200" align="left">Yang memberi pesanan,</td>					
					</tr>
					<tr>
					<td width="100" align="left"></td>
					<td width="200" align="left"></td>
					<td width="120"> </td>
					<td width="200" align="left">'.$row->namars.'</td>					
					</tr>
					</table>';
					
					$html.='
					<table border="0">
					<tr>
						<td width="100" align="left"></td>
						<td width="200"  align="left" style="line-height:80px;"><img src="assets/upload/" width="80px" height="50px"></td>';
					
					 $html.='   <td width="120"> </td>
					    <td width="200"  align="left" style="line-height:80px;"><img src="assets/upload/'.$row->mengetahui.'" width="80px" height="50px"></td>
					</tr> </table>';
					
					$html.='
					<table border="0">
						<tr>
						<td width="100" align="left"></td>
						<td width="200" align="left">'.$row->nm_perusahaan.'</td>
						<td width="120"> </td>
						<td width="200" align="left"><u>'.$row->nm_mengetahui.'</u></td>
						</tr>
						<tr>
						<td width="100" align="left"></td>
						<td width="200" align="left"></td>
						<td width="120"> </td>
						<td width="200" align="left">'.$row->jb_mengetahui.'</td>
						</tr>
						</table>
										';
                                      }}
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('PO.pdf', 'I');
			
?>
