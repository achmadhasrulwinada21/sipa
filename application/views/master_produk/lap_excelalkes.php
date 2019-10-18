 <?php
 
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=$title.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>
 
 <table border="1" width="100%">
 
      <thead>
 
           <tr>
 
                <th>Kode Produk</th>
 
                <th>Nama Produk</th>

                <th>Merk</th>
 
                <th>Tipe Produk</th>

                <th>Type</th>

                <th>Kode Perusahaan</th>

                
 
           </tr>
 
      </thead>
 
      <tbody>
 
           <?php $i=1; foreach($exp_alkes as $exp) { ?>
 
           <tr>
 
                <td><?php echo $exp->kode_produk; ?></td>
                <td><?php echo $exp->nama_produk; ?></td>
                <td><?php echo $exp->merk; ?></td>
                <td><?php echo $exp->tipe_produk; ?></td>
                <td><?php echo $exp->type; ?></td>
                <td><?php echo $exp->koper; ?></td>

                
 
           </tr>
 
           <?php $i++; } ?>
 
      </tbody>
 
 </table>