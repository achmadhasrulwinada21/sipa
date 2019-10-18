<?php
 
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=laporan_po_farmasi_nonrr.xls");

 ?>
  <?php 
      foreach ($data_produko as $dp) {
        
           $cui=$dp['namars'];
?>
      <?php } ?>
 <h4 style="text-align: center;">
          <b><span> LAPORAN PO FARMASI NON RR<br>
                   <?php echo $cui ?>
           </span></b>
        </h4>
  <table border="1" cellspacing="1" cellpadding="2">
   <tr style="font-weight:bold;" bgcolor="#A9A9A9">  
             <th style="vertical-align: middle;text-align: center;">Kode Obat</th>
             <th style="vertical-align: middle;text-align: center;">Nama Obat</th>
             <th style="vertical-align: middle;text-align: center;">Jumlah</th>
             <th style="vertical-align: middle;text-align: center;">Harga</th>
            <th style="vertical-align: middle;text-align: center;">Diskon</th>
             <th style="vertical-align: middle;text-align: center;">Diskon Khusus</th>
             <th style="vertical-align: middle;text-align: center;">Ppn</th>
             <th style="vertical-align: middle;text-align: center;">Subtotal</th>
    </tr></table>
 <?php 
      foreach ($data_produko as $h) {
        ?>
            
			<span style="font-weight:bold;">NOMER PO</span><span style="font-weight:bold;"> : </span><span style="font-weight:bold;"><?php echo $h['nopo']; ?></span><br>
      <span style="font-weight:bold;">Tanggal PO</span><span style="font-weight:bold;"> : </span><span style="font-weight:bold;"><?php echo date('Y-m-d',strtotime($h['tglpo'])); ?></span><br>
			<span style="font-weight:bold;">SUPPLIER</span><span style="font-weight:bold;"> : </span><span style="font-weight:bold;"><?php echo $h['s_nama']; ?></span><br>
      <span style="font-weight:bold;">CATATAN</span><span style="font-weight:bold;"> : </span><span style="font-weight:bold;"><?php echo $h['catatan']; ?></span><br>                
<?php
              $koper=$h['supplier'];
			  $nopo=$h['nopo'];
             
          $data_produkos = $this->obatreg->Get_view_detail_po_non_rr("where supplier='$koper' AND nopo='$nopo'")->result_array();
     ?>

           <table>     
           <?php        
           $total=0;
           $uul=0;
           $total_awal=0;
                 foreach ($data_produkos as $key => $row) 
        {
          
          ?>

				<tr style="vertical-align:middle;">  
                       <td style="vertical-align: middle;text-align: center;"><?php echo $row['obatid']; ?></td>
                       <td style="text-align: justify;"><?php echo $row['obatnama']; ?></td>
                       <td style="vertical-align: middle;text-align: center;"><?php echo $row['jumlah']; ?></td>
                       <td style="text-align: right;"><?php echo number_format($row['hargasatuan']); ?></td>
                       <td style="text-align: center;"><?php echo $row['disc']; ?> %</td>
                       <td style="text-align: center;"><?php echo $row['disckhusus']; ?> %</td>
                       <td style="text-align: center;"><?php echo $row['ppn'];  ?></td>
                       <td style="text-align: right;"><?php echo $row['subtotal']; ?></td>		  
					</tr>
          <?php
           $total_awal += $row['subtotal'];
           $total = $row['nopo'];
                                  if (@$data_produkos[$key+1]['nopo'] != $row['nopo']) {

                                    ?>
          <tr>
            <td  style="font-size:10;line-height:15px;text-align: center;"colspan="7" bgcolor="skyblue"><b>SUBTOTAL <?php echo $total; ?> </b></td>
            <td  style="font-size:10;line-height:15px;text-align: right;" bgcolor="skyblue"   class="right">Rp.<?php echo number_format($total_awal); ?>,-</td> 
          </tr>
      <?php
      
          }
         }
        ?>
        
</table>
<?php } ?>
   