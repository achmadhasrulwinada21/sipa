 <section class="content-header">
        <br/>

        <h4 style="text-align: center;font-family:verdana;">
          <b>DETAIL PRODUK PO</b><br><br>
        </h4>
        
        </section>
 
        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
           <div class="box">
             <ul class="nav nav-tabs">
    <li class=""><a href="<?php echo base_url(); ?>c_po/viewallpo"> <i class="fa fa-home"></i> Home</a></li>

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
                    <div class="col-sm-4">
                         <dl class="dl-horizontal">
                            <dt>No Po :</dt>
                            <dd><?php echo $row->nopo?></dd>
                            <br/>
                            <dt>Tanggal Kebutuhan :</dt>
                            <dd><?php echo $row->tgl_kebutuhan?></dd>
                            <br/>
                            <dt>Jenis Permintaan :</dt>
                            <?php 
                             if($row->jenis_permintaan == "Reguler") { ?>             
                        <dd><b style="background-color:blue;color:white;text-align:center;">&nbsp <?php echo $row->jenis_permintaan?> &nbsp</b></dd>
                        <?php }else{?>
                        <dd><b style="background-color:red;color:white;text-align:center;">&nbsp <?php echo $row->jenis_permintaan?> &nbsp</b></dd>
                               <?php } ?>
                            <br/>
                             <dt>Jumlah Produk :</dt>
                            <dd><?php echo $row->jumlah?> item</dd>
                            <br/>
                            <dt>Total :</dt>
                            <dd><strong>Rp. <?php echo number_format($row->totalharga); ?></strong></dd>
                            <br/>
                            <dt>Diskon :</dt>
                            <dd><strong><?php echo $row->disc ?> %</strong></dd>
                            <br/>
                            <dt>Ppn :</dt>
                            <dd><strong><?php echo $row->ppn ?> %</strong></dd>
                            <br/>
                            <dt>Grand Total :</dt>
                            <dd><strong>Rp. <?php echo number_format($row->grand_total); ?></strong></dd>
                        </dl>
                    </div>
                       <div class="col-sm-4">
                         <dl class="dl-horizontal">
                           <dt>Rumah Sakit :</dt>
                            <dd><?php echo $row->namars?></dd>
                            <br/>
                            <dt>Alamat :</dt>
                            <dd><?php echo $row->alamat?></dd>
                            <br/>
                            <dt>Email :</dt>
                            <dd><?php echo $row->email?></dd>
                            <br/>
                            <dt>Fax :</dt>
                            <dd><?php echo $row->fax?></dd>
                            <br/>
                            <dt>Telp :</dt>
                            <dd><?php echo $row->telp?></dd>
                            <br/>
                            <dt>Manager RS :</dt>
                            <dd><?php echo $row->manager_rs?></dd>
                            <br/>
                            <dt>Direktur RS :</dt>
                            <dd><?php echo $row->direktur_rs?></dd>
                        </dl>
                    </div>
                    </div>
                    <div class="col-sm-4">
                            <dl class="dl-horizontal">
                            <dt>Perusahaan :</dt>
                            <dd><?php echo $row->nm_perusahaan?></dd>
                            <br/>
                            <dt>Alamat :</dt>
                            <dd><?php echo $row->s_alamat?></dd>
                            <br/>
                            <dt>Email :</dt>
                            <dd><?php echo $row->s_email?></dd>
                            <br/>
                            <dt>Telpon :</dt>
                            <dd><?php echo $row->s_telp?></dd>
                            <br/>
                            <dt>Fax :</dt>
                            <dd><?php echo $row->s_fax?></dd>
                            <br/>
                            <dt>Kontak :</dt>
                            <dd><?php echo $row->s_kontak?></dd>
                            <br/>
                            <dt>Keterangan :</dt>
                            <dd><?php echo $row->keterangan?></dd>
                             <br/>
                            <dt>Catatan :</dt>
                            <dd><?php echo $row->catatan?></dd>
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
                    <th style='text-align:center;'>Harga</th>
                    <th style='text-align:center;'>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                 <?php
                $no=1;
                if(isset($barang_jual)){
                    foreach($barang_jual as $row ){
                        ?>
                        <tr>
                            <td style='text-align:center;'><?php echo $no++; ?></td>
                            <td style='text-align:center;'><?php echo $row->status_pengajuan?></td>
                            <td style='text-align:justify;'><?php echo $row->nm_lokasi?></td>
                            <td style='text-align:center;'><?php echo $row->kode_produk?></td>
                            <td style='text-align:justify;'><?php echo $row->nama_produk?></td>
                            <td style='text-align:center;'><?php echo $row->jumlah?></td>
                             <td style='text-align:right;'>Rp. <?php echo number_format($row->harga)?></td>
                            <td style='text-align:right;'>Rp. <?php echo number_format($row->hargaakhir)?></td>
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




