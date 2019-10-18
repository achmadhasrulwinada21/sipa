 <?php
 
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=$title.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>
 
 <table border="1" width="100%">
 
      <thead>
 
           <tr>
                <th>Kode Jenis Pekerjaan</th>

                <th>Kode Sub Jenis Pekerjaan</th>

                <th>Kode Jenis Barang</th>

                <th>Kode Produk</th>
 
                <th>Nama Produk</th>

                <th>Tipe Produk</th>

                <th>Deskripsi</th>

                <th>Merk</th>

                
 
           </tr>
 
      </thead>
 
      <tbody>
 
           <?php $i=1; foreach($exp_depbang as $exp) { ?>
 
           <tr>
                <td><?php echo $exp->kode_jenis_pekj; ?></td>
                <td><?php echo $exp->kode_sub_jenis_pekj; ?></td>
                <td><?php echo $exp->kode_jenis_barang; ?></td>
                <td><?php echo $exp->kode_produk; ?></td>
                <td><?php echo $exp->nama_produk; ?></td>
                <td><?php echo $exp->tipe_produk; ?></td>
                <td><?php echo $exp->deskripsi; ?></td>
                <td><?php echo $exp->merk; ?></td>

                
 
           </tr>
 
           <?php $i++; } ?>
 
      </tbody>
 
 </table>