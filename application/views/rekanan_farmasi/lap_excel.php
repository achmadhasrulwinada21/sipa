 <?php
 
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=$title.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>

 <h2 style="text-align: center;">
   <b><span>DATABASE REKANAN FARMASI</span>
 </b>
</h2>
 
 <table border="1" width="100%">
 
      <thead>
 
           <tr>
 
                <th>Kode Perusahaan</th>
 
                <th>Nama Perusahaan</th>

                <th>Distributor</th>
 
                <th>FOI</th>

                <th>MOU JKN</th>

                <th>PKS Renewal MMF</th>

               
 
           </tr>
 
      </thead>
 
      <tbody>
 
           <?php $i=1; foreach($exp_rekanan as $exp) { ?>
 
           <tr>
 
                <td><?php echo $exp->koper; ?></td>
                <td><?php echo $exp->nm_perusahaan; ?></td>
                <td><?php echo $exp->kodis; ?></td>
                <td align="center"><?php echo $exp->foi; ?></td>
                <td align="center"><?php echo $exp->mou; ?></td>
                <td align="center"><?php echo $exp->pks; ?></td>
                
 
           </tr>
 
           <?php $i++; } ?>
 
      </tbody>
 
 </table>
 

 <h4 style="text-align: right;">
   <b><span>Jakarta <span> , </span> <?php echo date('d M Y'); ?>
   </span>
 </b>
</h4>
<br>
<table border="0">
  <tr>
    <b><td width="200" align="left"> Diperiksa Oleh. </td>
    <td width="100"></td>
    <td width="200" align="left"> Mengetahui</td></b>
  </tr>
  
  <tr></tr>
  <tr>
    <td width="200" align="left" style="line-height: 80px;"> 
      <img class="gambar1" src="<?php echo base_url('assets/upload/ttd_excelendah.jpg'); ?>"></td>
    <td width="100"></td>
     <td width="250" align="left"> 
      <img class="gambar1" src="<?php echo base_url('assets/upload/ttd_excel.png'); ?>"></td>
  </tr>
  <tr></tr>
  
  <tr></tr>
  <tr></tr>
  <tr>
    <td width="200" align="left"> dr. Endah Malayati, MARS </td>
    <td width="100"></td>
    <td width="200" align="left">Yulisar </td>
  </tr>
  <tr>
    <td width="200" align="left"> Ka. Dept. Penunjang Medis </td>
    <td width="100"></td>
    <td width="200" align="left">Direktur Operasional & Umum</td>
  </tr>


</table>

<!-- <style type="text/css">
   .gambar1 { width: 100px; height: 100px;}
   
</style> -->


<!-- <table>
 <h4 style="text-align: left;">
   <b><span>Diperiksa Oleh. </span>  </b>  <br> <br> <br> <img src="<?php echo base_url('assets/upload/endah.jpg'); ?>" height="1.64 cm" width="2.67 cm"> <span> dr. Endah Malayati, MARS </span> <br> <span>Ka. Dept. Penunjang Medis</span>

</h4>
<h4 style="text-align: center;">
   <b><span>Mengetahui </span> </b>  <br> <br> <br> <img src="<?php echo base_url('assets/upload/ttd_mengetahui1.png'); ?>" height="1.64 cm" width="2.67 cm"> <span> Yulisar </span> <br> <span>Direktur Operasional & Umum</span>
 
</h4>
</table> -->
