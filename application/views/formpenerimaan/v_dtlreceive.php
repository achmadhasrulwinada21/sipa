 <section class="content-header">
        <br/>

        <h4 style="text-align: center;font-family:verdana;">
          <b>DETAIL PRODUK PENERIMAAN ALKES</b><br><br>
        </h4>
        
        </section>
 
        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
           <div class="box">
             <ul class="nav nav-tabs">
    <li class=""><a href="<?php echo base_url(); ?>C_poacc/tampilpoacc"> <i class="fa fa-home"></i> Home</a></li>

    </ul>
<ul class="nav nav-tabs">
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">            

                <div class="container">

        <h4 class="alert alert-info alert-sm" style="text-align:center;font-weight:bold;font-family:verdana;">Keterangan</h4>
        <div class="row-fluid">
            <?php if(isset($dt_penjualan)){
                foreach($dt_penjualan as $row){
                    ?>
                    <div class="col-sm-6">
                         <dl class="dl-horizontal">
                            <dt>No Po :</dt>
                            <dd><?php echo $row->nopo?></dd>
                            <br/>
                            <dt>Tanggal Po :</dt>
                            <dd><?php echo date("d M Y",strtotime($row->tglpo));?></dd>
                            <br/>
                            <dt>Rumah Sakit :</dt>
                            <dd><?php echo $row->namars?></dd>
                         </dl>
                    </div></div>
                    <div class="col-sm-6">
                            <dl class="dl-horizontal">
                            <dt>Perusahaan :</dt>
                            <dd><?php echo $row->nm_perusahaan?></dd>
                            <br/>
                            <dt>Keterangan :</dt>
                            <dd><?php echo $row->keterangan?></dd>
                        </dl>
                    </div>
                <?php }
            }
            ?>
        </div>
    </div>

<div class="well">
    <h4 class="alert alert-info alert-sm" style="text-align: center;font-weight:bold;font-family:verdana;"> Daftar Barang</h4>
        <div class="row-fluid">

           <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover table-condensed" id='tb-datatables'>
                <thead>
                <tr bgcolor="#4682B4" style="font-family: arial; color: white;">
                    <th style='text-align:center;'>No</th>
                    <th style='text-align:center;'>Status Pengajuan</th>
                    <th style='text-align:center;'>Peruntukan</th>
                    <th style='text-align:center;'>Kode Barang</th>
                    <th style='text-align:center;'>Nama Barang</th>
                    <th style='text-align:center;'>Qty</th>
                    <th style='text-align:center;'>Qty Acc</th>
                    <th style='text-align:center;'>Harga</th>
                    <th style='text-align:center;'>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                 <?php
                $no=1;
                if(isset($barang_jual2)){
                    foreach($barang_jual2 as $row ){
                        ?>
                        <tr>
                    <td style='text-align:center;'><?php echo $no++; ?></td>
                    <td style='text-align:center;'><?php echo $row->status_pengajuan?></td>
                    <td style='text-align:justify;'><?php echo $row->nm_lokasi?></td>
                      <td style='text-align:center;'><?php echo $row->kode_produk?></td>
                        <td style='text-align:justify;'><?php echo $row->nama_produk?></td>
                         <td style='text-align:center;'><?php echo $row->jumlah?></td>
                       <td style='text-align:center;'><?php echo $row->jumlahacc?></td>
                        <td style='text-align:right;'><?php echo number_format($row->harga) ?> </td>
                       <td style='text-align:right;'><?php echo number_format($row->subtotal2) ?> </td>
                      </tr>
                  <?php }
                }
                ?>
                </tbody>
            </table>
             
            </div>
</div></div>

</div>
                              
                </div>                         
</section>
                             
                </div>
               </div>
            </div>
            </div>
          </div>
        </div>
</form>
 
    