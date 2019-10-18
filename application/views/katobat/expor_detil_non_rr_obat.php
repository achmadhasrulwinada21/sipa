<?php
 
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=laporan_detail_listing_semua_obat.xls");

 ?>
 <h4 style="text-align: center;">
          <b><span>Laporan Detail Listing RR Obat<br>
           </span></b>
        </h4>
  <table border="1" cellspacing="1" cellpadding="2">
   <tr style="font-weight:bold;" bgcolor="#A9A9A9">  
             <th style="vertical-align: middle;text-align: center;">Kode Obat</th>
             <th style="vertical-align: middle;text-align: center;">Nama Obat</th>
             <th style="vertical-align: middle;text-align: center;">Jumlah</th>
             <th style="vertical-align: middle;text-align: center;">Harga</th>
             <th style="vertical-align: middle;text-align: center;">Prinsipal</th>
             <th style="vertical-align: middle;text-align: center;">Distributor</th>
             <th style="vertical-align: middle;text-align: center;">Catatan</th>
      </tr></table>
 <?php 
      foreach ($data_produko as $h) {
        ?>
            
			<span style="font-weight:bold;">NOMER PO</span><span style="font-weight:bold;"> : </span><span style="font-weight:bold;"><?php echo $h['nopo']; ?></span><br>
			<span style="font-weight:bold;">PERUSAHAAN</span><span style="font-weight:bold;"> : </span><span style="font-weight:bold;"><?php echo $h['s_nama']; ?></span><br>
			<span style="font-weight:bold;">NAMA RS</span><span style="font-weight:bold;"> : </span><span style="font-weight:bold;"><?php echo $h['namars']; ?></span>
                        
<?php
             
			  $koper=$h['supplier'];
			  $nopo=$h['nopo'];
             
          $data_produkos = $this->obatreg->Get_view_detail_po_non_rr("where supplier='$koper' AND nopo='$nopo'")->result_array();
?>
           <table>     
           <?php   
				$qty3=0;
                foreach ($data_produkos as $row) 
        {
          $qty3 += $row['subtotal'];
          ?>

				<tr style="vertical-align:middle;">  
                       <td style="vertical-align: middle;text-align: center;"><?php echo $row['obatid']; ?></td>
                       <td style="text-align: center;"><?php echo $row['obatnama']; ?></td>
                       <td style="vertical-align: middle;text-align: center;"><?php echo $row['jumlah']; ?></td>
                       <td style="text-align: center;"><?php echo $row['hargasatuan']; ?></td>
                       <td style="text-align: center;"><?php echo $row['keterangan']; ?></td>
                       <td style="text-align: center;"><?php echo $row['s_nama']; ?></td>
					   <td style="text-align: center;"><?php echo $row['catatan']; ?></td>						   
					</tr>
				
      <?php
          }
        ?>
</table>
 <table style="margin-bottom:3px;margin-left: 20px;margin-top: 5px;">
<tr  bgcolor="skyblue">  <td colspan="5" width="500px" style="text-align: right;"><b>GRAND TOTAL</b></td><td width="10%" style="text-align: center;">:</td><td colspan="3" width="30%"><b>Rp. <?php echo number_format ($qty3, 2,',','.'); ?></b></td></tr>

</table>
<?php
}
        ?>

          
