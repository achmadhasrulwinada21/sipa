 <?php
 
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=$title.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>
 
 <table border="1" width="100%">
 
      <thead>
 
           <tr>
 
                <th>Kode Obat</th>
 
                <th>Nama Obat</th>

                <th>Komposisi</th>

                <th>Golongan</th>
 
                <th>Tipe Produk</th>

                <th>Kode Pabrik</th>

                <th>Kode Distributor</th>

                <th>Harga</th>

                <th>Diskon</th>

                <th>Satuan</th>

                <th>Persentase</th>

                <th>Merk</th>

                
 
           </tr>
 
      </thead>
 
      <tbody>
 
           <?php $i=1; foreach($exp_produk as $exp) { ?>
 
           <tr>
 
                <td><?php echo $exp->kode_obat; ?></td>
                <td><?php echo $exp->nama_obat; ?></td>
                <td><?php echo $exp->komposisi; ?></td>
                <td><?php echo $exp->golonganid; ?></td>
                <td><?php echo $exp->tipe_produk; ?></td>
                <td><?php echo $exp->koper; ?></td>
                <td><?php echo $exp->kodis; ?></td>

                <td><?php echo $exp->harga; ?></td>
                <td><?php echo $exp->discount; ?></td>
                <td><?php echo $exp->satuanid; ?></td>
                <td><?php echo $exp->persentase; ?></td>
                <td><?php echo $exp->merk; ?></td>

                
 
           </tr>
 
           <?php $i++; } ?>
 
      </tbody>
 
 </table>