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

                <th>Kode Distributor</th>
 
           </tr>
 
      </thead>
 
      <tbody>
 
           <?php $i=1; foreach($exp_setdis as $exp) { ?>
 
           <tr>
 
                

                <td><?php echo $exp->koper; ?></td>
                <td><?php echo $exp->kodis; ?></td>
 
           </tr>
 
           <?php $i++; } ?>
 
      </tbody>
 
 </table>