 <div class="modal-content"> 
     <div class="modal-body">
           <h4 style="text-align: center;">
          <b>DETAIL PRODUK</b><br>
          <b><?php echo $prod->nm_perusahaan ?></b><br>
          <b><?php echo $prod->namars ?></b>
        </h4>
                                 
                    <!-- <?php// } ?> -->
                 
                 <br>
                                     
                  <div class="table-responsive">
                <table id="" class="datatables49 table table-bordered table-striped table-hover" style="vertical-align: middle;width:100%;">
                 <thead style="vertical-align: middle;width:100%;">
                  <tr class="danger" style="font-weight:bold;font-size:10px;">
                    <th rowspan="2" style="vertical-align: middle;text-align: center;">No</th>
                    <th rowspan="2" style="vertical-align: middle;text-align: center;">Nama Produk</th>
                    <th rowspan="2" style="vertical-align: middle;text-align: center;">Speksifikasi Teknis</th>
                     <th rowspan="2" style="vertical-align: middle;text-align: center;">Merk</th>
                   <th rowspan="2" style="vertical-align: middle;text-align: center;">Satuan</th>
                    <th rowspan="2" style="vertical-align: middle;text-align: center;">Qty</th>
                    <th rowspan="2" style="vertical-align: middle;text-align: center;">Harga Saat Ini</th>
                     <th rowspan="2" style="vertical-align: middle;text-align: center;">Harga Jual PT P3MPI</th>
                      <th colspan="4" style="vertical-align: middle;text-align: center;">Penawaran Rekanan</th>
                  </tr>
                   <tr class="danger" style="font-weight:bold;font-size:10px;">
                      <th style="vertical-align: middle;text-align: center;">Harga Penawaran
Rekanan dgn FEE 5 %</th>
                      <th style="vertical-align: middle;text-align: center;">Jumlah FEE
Manajemen 5%</th>
                      <th style="vertical-align: middle;text-align: center;">Harga Penawaran
Rekanan dgn FEE 3%</th>
                      <th  style="vertical-align: middle;text-align: center;">Jumlah FEE
Manajemen 3%</th>
                   </tr>                 
                  </thead><tbody>
<?php
$no=0;
          foreach ($tampil as $tr){
            $no++
?>
       <tr class="success" style="font-weight:bold;font-family:verdana;font-size:10px;">
          <td style="vertical-align: middle;text-align: center;" ><?php echo $no; ?></td>         
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['nama_produk']; ?></td>
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['deskripsi']; ?></td>
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['merk']; ?></td>
            <td style="vertical-align: middle;text-align: center;"><?php echo $tr['satuannama']; ?></td>
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['qty']; ?></td>
      <td style="vertical-align: middle;text-align: right;"><?php echo number_format($tr['harga_saat_ini']); ?></td>  
           <td style="vertical-align: middle;text-align: right;"><?php echo number_format( $tr['harga_jual']); ?></td>
            <td style="vertical-align: middle;text-align: right;"><?php echo number_format($tr['harga_p_5']); ?></td> 
           <td style="vertical-align: middle;text-align: right;"><?php echo number_format($tr['jmlh_f_5']); ?></td>  <td style="vertical-align: middle;text-align: right;"><?php echo number_format( $tr['harga_p_3']); ?></td>
            <td style="vertical-align: middle;text-align: right;"><?php echo number_format($tr['jmlh_f_3']); ?></td> 
            </tr>
            <?php  } ?>
               </tbody></table>

                 <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr  bgcolor="skyblue">  <td width="140"><b>JUMLAH PRODUK</b></td><td width="10">:</td><td width="10"><b> <?php echo count($tampil); ?></b></td></tr>
                   </tr>
                    </table>
                    </div> 
                                       
 
              </div></div>
            
<!------- end modal -------->
