<?php
 
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=Listobat.xls");

 
 ?>
   <table border="1" cellspacing="1" cellpadding="2">
    <thead>
   <tr style="font-weight:bold;" bgcolor="#A9A9A9">
             <th style="vertical-align: middle;text-align: center;">ID DETAIL</th>
             <th style="vertical-align: middle;text-align: center;">KODE DETAIL</th>
             <th style="vertical-align: middle;text-align: center;">Harga</th>
             <th style="vertical-align: middle;text-align: center;">Diskon</th>
             <th style="vertical-align: middle;text-align: center;">Tipe Harga</th>
             <th style="vertical-align: middle;text-align: center;">Kode Distributor</th>
             <th style="vertical-align: middle;text-align: center;">Kode Perusahaan</th>
             <th style="vertical-align: middle;text-align: center;">Perusahaan</th>
              <th style="vertical-align: middle;text-align: center;background-color:yellow;">Kode Obat</th>
             <th style="vertical-align: middle;text-align: center;">Nama Obat</th>
             <th style="vertical-align: middle;text-align: center;">Kode transaksi</th>
            <th style="vertical-align: middle;text-align: center;">ID Obat</th>
             
      </tr></thead><tbody>

           <?php        
            $i=0;   
      foreach ($cetak_farmasi as $row) 
        {
          $i++;
          ?>

    <tr>
      <td style="text-align:justify;vertical-align:middle;"><?php echo $row['iddetailprod2']; ?></td>
      <td style="text-align:right;vertical-align:middle;"><?php echo $row['koded_prod']; ?></td>
      <td style="text-align:right;vertical-align:middle;"><?php echo $row['harga_lama']; ?></td>
    <td style="text-align:center;vertical-align:middle;"><?php echo $row['discount_lama']; ?></td> 
      <td style="text-align:center;vertical-align:middle;"><?php echo $row['golonganid']; ?></td>
    <td style="text-align:left;vertical-align:middle;"><?php echo $row['kodis']; ?></td> 
    <td style="text-align:left;vertical-align:middle;"><?php echo $row['koper']; ?></td>
    <td style="text-align:left;vertical-align:middle;"><?php echo $row['nm_perusahaan']; ?></td>
     <td style="text-align:justify;background-color:yellow;vertical-align:middle;"><?php echo $row['kode_obat']; ?></td> 
   <td style="text-align:justify;vertical-align:middle;"><?php echo $row['nama_obat']; ?></td>
    <td style="text-align:left;vertical-align:middle;"><?php echo $row['kode_trans']; ?></td>  
   <td style="text-align:center;vertical-align:middle;"><?php echo $row['idobat']; ?></td>  
  </tr>
      <?php
          }
        ?>
</tbody></table>

