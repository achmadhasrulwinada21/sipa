<?php
 
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=laporan_detail_listing_alkes.xls");


                 
 ?>
<h4 style="text-align: center;">
          <b><span>Laporan Detail Listing Alkes
          </span></b>
        </h4>
  <table border="1" cellspacing="1" cellpadding="2">
   <tr style="font-weight:bold;" bgcolor="#A9A9A9">
        <th rowspan="4" style="vertical-align: middle;text-align: center;">Tanggal</th>  
         <th rowspan="4" style="vertical-align: middle;text-align: center;">Nama Produk</th>
         <th rowspan="4" style="vertical-align: middle;text-align: center;">Merk</th>
         <th rowspan="4" style="vertical-align: middle;text-align: center;">Tipe</th>
         <th rowspan="4" style="vertical-align: middle;text-align: center;">Harga</th>
         <th rowspan="4" style="vertical-align: middle;text-align: center;">Status Katalog</th>
         <th colspan="12" style="vertical-align: middle;text-align: center;">Garansi</th>
         <th rowspan="4" style="vertical-align: middle;text-align: center;">Status Register</th>
         <th rowspan="4" style="vertical-align: middle;text-align: center;">Nominal Biaya</th>
         <th rowspan="4" style="vertical-align: middle;text-align: center;">Keterangan</th>
        <th rowspan="4" style="vertical-align: middle;text-align: center;">Catatan</th>
   </tr>
        <tr style="font-weight:bold;" bgcolor="#A9A9A9">
           <th rowspan="3" style="vertical-align: middle;text-align: center;">Free</th>
           <th rowspan="3" style="vertical-align: middle;text-align: center;">Full</th>
           <th colspan="12" style="vertical-align: middle;text-align: center;">Kontrak Servis</th>
             </tr>
         <tr style="font-weight:bold;" bgcolor="#A9A9A9">
          <th colspan="5" style="vertical-align: middle;text-align: center;">Persentase (%)</th>
          <th  style="vertical-align: middle;text-align: center;"></th>
          <th colspan="5" style="vertical-align: middle;text-align: center;">Nominal</th>
         </tr>
         <tr style="font-weight:bold;" bgcolor="#A9A9A9">
            <th style="vertical-align: middle;text-align: center;">1</th>
            <th style="vertical-align: middle;text-align: center;">2</th>
            <th style="vertical-align: middle;text-align: center;">3</th>
            <th style="vertical-align: middle;text-align: center;">4</th>
            <th style="vertical-align: middle;text-align: center;">5</th>
            <th style="vertical-align: middle;text-align: center;">1</th>
            <th style="vertical-align: middle;text-align: center;">2</th>
            <th style="vertical-align: middle;text-align: center;">3</th>
            <th style="vertical-align: middle;text-align: center;">4</th>
            <th style="vertical-align: middle;text-align: center;">5</th>
          </tr>
    </table>
 <?php 
      foreach ($expor_detilalkes as $h) {
        ?>
            <span style="font-weight:bold;">PERUSAHAAN</span><span style="font-weight:bold;"> : </span><span style="font-weight:bold;"><?php echo $h['nm_perusahaan']; ?></span>
                        
<?php
              $koper=$h['koper'];
              $kode_transaksi=$h['kode_transaksi'];
             
          $cetak_alkes = $this->malkesrr->Getalkesdetilview("where kode_transaksi='$kode_transaksi' and stsproduk_detil='$stsproduk_detil'")->result_array();
?>
           <table>     
           <?php        
                foreach ($cetak_alkes as $row) 
                 
        {

           $stse_kat=$row['stse_kat'];
                      $kat='-';

                        if ($stse_kat=='1'){
                        $kat='E KATALOG';
                      }else{
                        $kat='NON E KATALOG';
                      }
                       
                         $stsregister=$row['stsregister'];
                         $reg='-';
                       if ($stsregister=='1'){
                        $reg='Register';
                      }else{
                        $reg='NON Register';
                      }

                       $data=date('d m Y',strtotime($row['tgl_tr']));
                $tgl=substr($data,0,2);
                $bulan=(substr($data,3,2));
                $thn=substr($data,6,4);

                $bulanlist=array(
                    '01' => 'Januari',
                    '02' => 'Februari',
                    '03' => 'Maret',
                    '04' => 'April',
                    '05' => 'Mei',
                    '06' => 'Juni',
                    '07' => 'Juli',
                    '08' => 'Agustus',
                    '09' => 'September',
                    '10' => 'Oktober',
                    '11' => 'November',
                    '12' => 'Desember',
                    );
          
          ?>

    <tr style="vertical-align:middle;">  
      <td style="text-align:justify;"><?php echo $tgl; ?> <?php echo $bulanlist[$bulan]; ?> <?php echo $thn?></td>
     <td style="text-align:justify;"><?php echo $row['nama_produk']; ?></td>  
   <td style="text-align:justify;"><?php echo $row['merk']; ?></td>
    <td style="text-align:justify;"><?php echo $row['type']; ?></td>
    <td style="vertical-align: middle;text-align: right;">Rp.<?php echo (number_format($row['harga_akhir_baru'])); ?></td> 
    <td style="text-align:center;"><?php echo $kat; ?></td>  
    <td style="vertical-align: middle;text-align: center;"><?php echo $row['garansifree']; ?> tahun</td>
    <td style="vertical-align: middle;text-align: center;"><?php echo $row['garansi']; ?> tahun</td>
    <td style="text-align: center;"><?php echo $row['persentase1']; ?> % </td> 
   <td style="text-align: center;"><?php echo $row['persentase2']; ?> % </td>  
   <td style="text-align: center;"><?php echo $row['persentase3']; ?> % </td>
    <td style="text-align: center;"><?php echo $row['persentase4']; ?> % </td> 
   <td style="text-align: center;"><?php echo $row['persentase5']; ?> % </td>
   <td style="vertical-align: middle;text-align: center;">Rp.<?php echo (number_format($row['nominal_baru1'])); ?></td> 
<td style="vertical-align: middle;text-align: center;">Rp.<?php echo (number_format($row['nominal_baru2'])); ?></td> 
<td style="vertical-align: middle;text-align: center;">Rp.<?php echo (number_format( $row['nominal_baru3'])); ?></td>
<td style="vertical-align: middle;text-align: center;">Rp.<?php echo (number_format($row['nominal_baru4'])); ?></td> 
<td style="vertical-align: middle;text-align: center;">Rp.<?php echo (number_format($row['nominal_baru5'])); ?></td>
    <td style="text-align:center;"><?php echo $reg; ?></td>  
   <td style="vertical-align: middle;text-align: center;">Rp.<?php echo (number_format($row['nominal_fee_baru'], 0,',','.')); ?></td> 
   <td style="text-align:justify;"><?php echo $row['ket']; ?></td>
   <td style="text-align:justify;"><?php echo $row['note']; ?></td>
  </tr>
      <?php
          }
        ?>
</table>
<?php
}
        ?>

          
