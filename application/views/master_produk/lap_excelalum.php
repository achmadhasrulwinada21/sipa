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

                <th>Spesifikasi Teknis Tipe</th>
		
		            <th>Tipe Produk</th>
 
                <th>Kode Perusahaan</th>

                <th>Volume</th>

                <th>Satuan</th>

                <th>Merk</th>

                
 
           </tr>
 
      </thead>
 
      <tbody>
 
           <?php $i=1; foreach($exp_alum as $exp) { ?>
 
           <tr>
 
                <td><?php echo $exp->kode_produk; ?></td>
                <td><?php echo $exp->nama_produk; ?></td>
                
                <td><?php echo $exp->deskripsi; ?></td>
		            <td><?php echo $exp->tipe_produk; ?></td>
                <td><?php echo $exp->koper; ?></td>
                <td><?php echo $exp->volume; ?></td>
                <td><?php echo $exp->satuanid; ?></td>
                <td><?php echo $exp->merk; ?></td>

                
 
           </tr>
 
           <?php $i++; } ?>
 
      </tbody>
 
 </table>
