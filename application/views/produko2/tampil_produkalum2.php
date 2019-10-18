     <div class="modal-content"> 
           <div class="modal-body">
            <h4 style="text-align: center;">
          <b>DETAIL PRODUK</b><br>
          <b><?php echo $prod->nm_perusahaan ?></b>
        </h4>
                <div class="box-body">
               <div class="table-responsive">
                    <table id="" class="datatables49 table table-bordered table-striped table-hover">
                  <thead>
                  <tr bgcolor="grey" style="font-family:verdana;color: white;font-size:11px;">
                      <th  style="vertical-align: middle;text-align: center;">No</th>
                      <th style="vertical-align: middle;text-align: center;">Nama Produk</th>
                      <th style="vertical-align: middle;text-align: center;">Garansi(per tahun)</th>
                       <th style="vertical-align: middle;text-align: center;">Regional</th>
                     <th  style="vertical-align: middle;text-align: center;">Satuan</th>
                      <th  style="vertical-align: middle;text-align: center;">Volume</th>
                      <th  style="vertical-align: middle;text-align: center;">Harga</th>
                      <th  style="vertical-align: middle;text-align: center;">Contact Person</th>
                       <th  style="vertical-align: middle;text-align: center;">Keterangan</th>
                       <th  style="vertical-align: middle;text-align: center;">Catatan</th>


                   </tr>
                    </thead>
             <tbody>
                 <?php $no=0;
                    
                     foreach($tampil as $row) { 
                               $no++                              
                             
                      ?>
  <tr class="danger" style="font-weight: bold;font-size:10px;">
    <td style="text-align: center;"><?php echo $no; ?></td>		   
   <td style="text-align: justify;"><?php echo $row['nama_produk']; ?></td>
 <td style="text-align: center;"><?php echo $row['garansi']; ?></td>
	 <td style="text-align: justify;"><?php echo $row['nm_regional']; ?></td>
    <td style="text-align: justify;"><?php echo $row['satuannama']; ?></td>
   <td style="text-align: center;"><?php echo $row['volume']; ?></td>
   <td style="text-align: center;">Rp.<?php echo number_format($row['harga_incppnfee'], 0,',','.'); ?></td>
<td style="text-align: justify;"><?php echo $row['contact']; ?></td>
<td style="text-align: justify;"><?php echo $row['ket']; ?></td>
<td style="text-align: justify;"><?php echo $row['note']; ?></td>

</tr>
                              <?php
                           }?>
                           </tbody>
            </table>
                </div>                
                   
                          
               
 
              </div></div>
