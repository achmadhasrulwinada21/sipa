 <?php
 
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=laporan_detail_katalog_depbang.xls");

 
 
 ?>
 
 <h4 style="text-align: center;">
          <b><span>Laporan Detail RR Listing DEPBANG<br>
          </span></b>
        </h4>

  <table border="1" cellspacing="1" cellpadding="2">
            <tr style="font-weight:bold;text-align:left;" bgcolor="#A9A9A9">  
			 <th style="vertical-align: middle;text-align: center;">Tanggal</th>
             <th style="vertical-align: middle;text-align: center;">Nama Produk</th>
             <th style="vertical-align: middle;text-align: center;">Spesifikasi Teknis</th>
             <th style="vertical-align: middle;text-align: center;">Merk</th>
             <th style="vertical-align: middle;text-align: center;">Garansi</th>
             <th  style="vertical-align: middle;text-align: center;">Satuan</th>
            <th  style="vertical-align: middle;text-align: center;">Volume</th>
            <th  style="vertical-align: middle;text-align: center;">Harga</th>
           <th  style="vertical-align: middle;text-align: center;">Contact Person</th>
            <th  style="vertical-align: middle;text-align: center;">Keterangan</th>
             <th  style="vertical-align: middle;text-align: center;">Catatan</th>

            </tr></table>
 <?php 
      foreach ($expor_detilalum3 as $h) {
        ?>
            <br>
                      <span style="font-weight:bold;">PERUSAHAAN</span><span style="font-weight:bold;"> : </span><span style="font-weight:bold;"><?php echo $h['nm_perusahaan']; ?></span>
                        
<?php
              $koper=$h['koper'];
              $tanggal_tr=$h['tanggal_tr'];

          $cetak_alum = $this->produkom2->GetprodukdepbangV("where koper='$koper' and statusdetil !='1' and statusdetil !='01' order by tanggal_tr")->result_array();
?>
           <table>     
           <?php        
            $i=0;   
      foreach ($cetak_alum as $row) 
        {
          $i++;
          ?>

    <tr style="vertical-align:middle;align:center";>    
	<td style="text-align:left;"><?php echo $row['tanggal_tr']; ?></td>
   <td style="text-align:left;"><?php echo $row['nama_produk']; ?></td>
    <td style="text-align:left;"><?php echo $row['deskripsi']; ?></td>
   <td style="text-align: left;"><?php echo $row['merk']; ?></td>
   <td style="text-align: left;"><?php echo $row['garansi']; ?></td>
    <td style="text-align: left;"><?php echo $row['satuannama']; ?></td>
   <td style="text-align: right;"><?php echo $row['volume'];?></td>
   <td style="text-align: right;"><?php echo number_format($row['harga_incppnfee']);?></td>
     <td style="text-align: left;"><?php echo $row['contact']; ?></td>
     <td style="text-align: left;"><?php echo $row['ket']; ?></td>
     <td style="text-align: left;"><?php echo $row['note']; ?></td>
              </tr>
      <?php
          }
        ?>
</table>
<?php
}
        ?>
<br><br>
          
