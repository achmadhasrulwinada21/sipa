<?php
 
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=laporan_detail_katalog_obat.xls");

 ?>
 <h4 style="text-align: center;">
          <b><span>Laporan Detail Listing RR Obat<br>
           </span></b>
        </h4>
  <table border="1" cellspacing="1" cellpadding="2">
   <tr style="font-weight:bold;" bgcolor="#A9A9A9">  
             <th style="vertical-align: middle;text-align: center;">Tanggal</th>
             <th style="vertical-align: middle;text-align: center;">Distributor</th>
             <th style="vertical-align: middle;text-align: center;">Kode Produk</th>
             <th style="vertical-align: middle;text-align: center;">Nama Produk</th>
            <th style="vertical-align: middle;text-align: center;">Golongan</th>
             <th style="vertical-align: middle;text-align: center;">Komposisi</th>
             <th style="vertical-align: middle;text-align: center;">Harga</th>
             <th style="vertical-align: middle;text-align: center;">Tipe Harga</th>
             <th style="vertical-align: middle;text-align: center;">Catatan</th>
      </tr></table>
 <?php 
      foreach ($expor_detilfarmasi2 as $h) {
        ?>
            <span style="font-weight:bold;">PERUSAHAAN</span><span style="font-weight:bold;"> : </span><span style="font-weight:bold;"><?php echo $h['nm_perusahaan']; ?></span>
                        
<?php
              $koper=$h['koper'];
             
          $cetak_farmasi = $this->Obatkat->Getprodukmfinal2("where koper='$koper'")->result_array();
?>
           <table>     
           <?php        
                foreach ($cetak_farmasi as $row) 
        {
          
          ?>

    <tr style="vertical-align:middle;">  
      <td style="text-align:left;"><?php echo $row['tanggal_tr']; ?></td>
     <td style="text-align:left;"><?php echo $row['nm_distributor']; ?></td>  
     <td style="text-align:justify;"><?php echo $row['kode_obat']; ?></td>
   <td style="text-align:justify;"><?php echo $row['nama_obat']; ?></td>
 <td style="text-align:justify;"><?php echo $row['klasifikasinama']; ?></td>
    <td style="text-align:justify;"><?php echo $row['komposisi']; ?></td>  
   <td style="text-align:right;"><?php echo $row['harga']; ?></td> 
   <td style="text-align:center;"><?php echo $row['tipe_harga']; ?></td>
   <td style="text-align:center;"><?php echo $row['catatan']; ?></td> 
  </tr>
      <?php
          }
        ?>
</table>
<?php
}
        ?>

          
