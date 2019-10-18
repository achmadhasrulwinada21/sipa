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
         <th colspan="4" style="vertical-align: middle;text-align: center;">Status Rekanan</th>
         <th rowspan="4" style="vertical-align: middle;text-align: center;">Harga(termasuk ppn)</th>
         <th rowspan="4" style="vertical-align: middle;text-align: center;">E-KAT</th>
         <th rowspan="4" style="vertical-align: middle;text-align: center;">NON E-KAT</th>
         <th colspan="19" style="vertical-align: middle;text-align: center;">Garansi</th>
         <th rowspan="4" style="vertical-align: middle;text-align: center;">Register</th>
         <th rowspan="4" style="vertical-align: middle;text-align: center;">NON Register</th>
         <th rowspan="4" style="vertical-align: middle;text-align: center;">Biaya free</th>
        <th rowspan="4" style="vertical-align: middle;text-align: center;">Biaya non free</th>
       <th rowspan="4" style="vertical-align: middle;text-align: center;">Nominal Biaya</th>
         <th rowspan="4" style="vertical-align: middle;text-align: center;">Keterangan</th>
        <th rowspan="4" style="vertical-align: middle;text-align: center;">Catatan</th>
   </tr>
        <tr style="font-weight:bold;" bgcolor="#A9A9A9">
           <th rowspan="3" style="vertical-align: middle;text-align: center;">Principal</th>
          <th rowspan="3" style="vertical-align: middle;text-align: center;">Solo Agent</th>
          <th rowspan="3" style="vertical-align: middle;text-align: center;">Distributor</th>
          <th rowspan="3" style="vertical-align: middle;text-align: center;">Subdistributor</th>
           <th rowspan="3" style="vertical-align: middle;text-align: center;">Free</th>
           <th rowspan="3" style="vertical-align: middle;text-align: center;">Full</th>
           <th colspan="19" style="vertical-align: middle;text-align: center;">Kontrak Servis</th>
             </tr>
         <tr style="font-weight:bold;" bgcolor="#A9A9A9">
          <th colspan="5" style="vertical-align: middle;text-align: center;">Tahun ke</th>
          <th style="vertical-align: middle;text-align: center;"></th>
          <th colspan="5" style="vertical-align: middle;text-align: center;">Persentase (%) (B)</th>
          <th  style="vertical-align: middle;text-align: center;"></th>
          <th colspan="5" style="vertical-align: middle;text-align: center;">Nominal (Rp) L = (A x B)</th>
         </tr>
         <tr style="font-weight:bold;" bgcolor="#A9A9A9">
             <th style="vertical-align: middle;text-align: center;">1</th>
            <th style="vertical-align: middle;text-align: center;">2</th>
            <th style="vertical-align: middle;text-align: center;">3</th>
            <th style="vertical-align: middle;text-align: center;">4</th>
            <th style="vertical-align: middle;text-align: center;">5</th>
            <th style="vertical-align: middle;text-align: center;"></th>
             <th style="vertical-align: middle;text-align: center;">1</th>
            <th style="vertical-align: middle;text-align: center;">2</th>
            <th style="vertical-align: middle;text-align: center;">3</th>
            <th style="vertical-align: middle;text-align: center;">4</th>
            <th style="vertical-align: middle;text-align: center;">5</th>
            <th style="vertical-align: middle;text-align: center;"></th>
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
              $idpr2=$h['idpr2'];
             
          $cetak_alkes = $this->alkeskat->Getprodukmfinal("where idpr2='$idpr2' and status='2'")->result_array();
?>
           <table>     
           <?php        
                foreach ($cetak_alkes as $row) 
        {
          
          ?>

    <tr style="vertical-align:middle;">  
      <td style="text-align:justify;"><?php echo $row['tanggal_tr']; ?></td>
     <td style="text-align:justify;"><?php echo $row['nama_produk']; ?></td>  
   <td style="text-align:justify;"><?php echo $row['merk']; ?></td>
    <td style="text-align:justify;"><?php echo $row['type']; ?></td>
     <td style="text-align: center;"><?php echo $row['principal']; ?></td>
  <td style="text-align: center;"><?php echo $row['solo_agent']; ?></td>
  <td style="text-align: center;"><?php echo $row['distributor']; ?></td>
  <td style="text-align: center;"><?php echo $row['subdistributor']; ?></td>
   <td style="vertical-align: middle;text-align: right;">Rp.<?php echo (number_format($row['total'], 0,',','.')); ?></td> 
    <td style="text-align:center;"><?php echo $row['e_kat']; ?></td>  
   <td style="text-align:center;"><?php echo $row['non_e_kat']; ?></td>
    <td style="vertical-align: middle;text-align: center;"><?php echo $row['garansifree']; ?> tahun</td>
    <td style="vertical-align: middle;text-align: center;"><?php echo $row['garansi']; ?> tahun</td>
    <td style="text-align: center;"><?php echo $row['tahunke1']; ?></td> 
   <td style="text-align: center;"><?php echo $row['tahunke2']; ?></td>  
   <td style="text-align: center;"><?php echo $row['tahunke3']; ?></td>
    <td style="text-align: center;"><?php echo $row['tahunke4']; ?></td> 
   <td style="text-align: center;"><?php echo $row['tahunke5']; ?></td> 
    <td style="text-align: center;"></td> 
   <td style="text-align: center;"><?php echo $row['persentase1']; ?></td> 
   <td style="text-align: center;"><?php echo $row['persentase2']; ?></td>  
   <td style="text-align: center;"><?php echo $row['persentase3']; ?></td>
    <td style="text-align: center;"><?php echo $row['persentase4']; ?></td> 
   <td style="text-align: center;"><?php echo $row['persentase5']; ?></td>
    <td style="text-align: center;"></td>
    <td style="vertical-align: middle;text-align: center;">Rp.<?php echo (number_format($row['nominal1'], 0,',','.')); ?></td> 
           <td style="vertical-align: middle;text-align: center;">Rp.<?php echo (number_format($row['nominal2'], 0,',','.')); ?></td> 
 <td style="vertical-align: middle;text-align: center;">Rp.<?php echo (number_format( $row['nominal3'], 0,',','.')); ?></td>
            <td style="vertical-align: middle;text-align: center;">Rp.<?php echo (number_format($row['nominal4'], 0,',','.')); ?></td> 
           <td style="vertical-align: middle;text-align: center;">Rp.<?php echo (number_format($row['nominal5'], 0,',','.')); ?></td>
    <td style="text-align:center;"><?php echo $row['register']; ?></td>  
   <td style="text-align:center;"><?php echo $row['non_register']; ?></td>
   <td style="vertical-align: middle;text-align: center;"><?php echo $row['biayafree']; ?></td>
   <td style="vertical-align: middle;text-align: center;"><?php echo $row['biayanonfree']; ?></td>
   <td style="vertical-align: middle;text-align: center;">Rp.<?php echo (number_format($row['nominalbiaya'], 0,',','.')); ?></td> 
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

          
