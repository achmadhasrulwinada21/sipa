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
                      <th style="text-align:center;">No</th>
                      <th style="text-align:left;">Nama Produk</th>
                      <th style="text-align:center;">harga</th>
                   </tr>
                    </thead>
             <tbody>
                 <?php $no=0;
                    
                     foreach ($tampil_kurang_ecat as $tr){
            $no++                   
                             
                      ?>
  <tr class="danger" style="font-weight: bold;font-size:10px;">
                     <td style="text-align: center;"><?php echo $no; ?></td>      
                     <td><?php echo $tr['nama_produk']; ?></td>
                     <td style="text-align: center;">Rp. <?php echo number_format($tr['harga']); ?></td>
</tr>
                              <?php
                           }?>
                           </tbody>
            </table>
                </div>                
                   
                          
               
 
              </div></div>
