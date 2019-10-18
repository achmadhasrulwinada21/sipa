 <?php
 
 header("Content-type: application/vnd-ms-excel");   
 
 header("Content-Disposition: attachment; filename=$title.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>
 
 <table border="1" width="100%">
 
      <thead>
 
           <tr>
 
                <th>Kode Perusahaan</th>
 
                <th>Nama Perusahaan</th>

                <th>ID Tipe</th>
				
				<th>Tipe Produk</th>

 
           </tr>
 
      </thead>
 
      <tbody>
 
           <?php $i=1; foreach($data_perush as $exp) { ?>
 
           <tr>
 
                <td><?php echo $exp->koper; ?></td>
                <td><?php echo $exp->nm_perusahaan; ?></td>
                <td><?php echo $exp->id_tipe_produk; ?></td>
				<td><?php echo $exp->tipe_produk; ?></td>
           
 
           </tr>
 
           <?php $i++; } ?>
 
      </tbody>
 
 </table>
