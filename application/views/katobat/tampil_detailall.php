 <div class="modal-content"> 
     <div class="modal-body">
              <b>PRINSIPAL</b><span> : </span><b><?php echo $prod->nm_perusahaan ?></b><br>
              <b>DISTRIBUTOR</b><span> : </span><b><?php echo $prod->nm_distributor ?></b><br>
                    
                    <!-- <?php// } ?> -->
                 
                 <br>
                                     
                  <div class="table-responsive">
                <table id="" class="datatables58 table table-bordered table-striped table-hover">
                   <thead>
                  <tr class="danger">
                    <th style="vertical-align: middle;text-align: center;">No</th>
                    <th style="vertical-align: middle;text-align: center;">Nama Produk</th>
                    <th style="vertical-align: middle;text-align: center;">Golongan</th>
                    <th style="vertical-align: middle;text-align: center;">Komposisi</th>
                    <th style="vertical-align: middle;text-align: center;">Harga Satuan</th>
                    <th style="vertical-align: middle;text-align: center;">Diskon</th>
                    <th style="vertical-align: middle;text-align: center;">tipe harga</th>
                    <th style="vertical-align: middle;text-align: center;">Note</th>
                  </tr>
                   </thead><tbody>
<?php
$no=0;
          foreach ($tampil as $tr){
            $no++
?>
        <tr class="info">
          <td style="vertical-align: middle;text-align: center;" ><?php echo $no; ?></td>         
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['nama_obat']; ?></td>
         <td style="vertical-align: middle;text-align: center;"><?php echo $tr['klasifikasinama']; ?></td>
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['komposisi']; ?></td>
          <td style="vertical-align: middle;text-align: right;">Rp.<?php echo number_format($tr['harga']); ?></td>
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['discount']; ?> %</td>
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['tipe_harga']; ?></td>
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['catatan']; ?></td>         
        </tr>
            <?php  } ?>
               </tbody></table>
                    </div> 
                                       
 
              </div></div>
            
<!------- end modal -------->
