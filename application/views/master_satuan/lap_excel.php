 <?php
 
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=$title.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>
 
 <table border="1" width="100%">
 
      <thead>
 
           <tr>
 
                <th>Satuan Id</th>
 
                <th>Nama Satuan</th>

                <th>Satuan Racikan</th>
 
                <th>Satuan Id Conform</th>

               
 
           </tr>
 
      </thead>
 
      <tbody>
 
           <?php $i=1; foreach($exp_satuan as $exp) { ?>
 
           <tr>
 
                <td><?php echo $exp->satuanid; ?></td>
                <td><?php echo $exp->satuannama; ?></td>
                <td><?php echo $exp->satuanracikan; ?></td>
                <td><?php echo $exp->satuanidconform; ?></td>
                
 
           </tr>
 
           <?php $i++; } ?>
 
      </tbody>
 
 </table>