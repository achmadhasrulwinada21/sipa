 <section class="content-header">
        <br/>

        <h4 style="text-align: center;font-family:verdana;">
          <b>TAMBAH ONGKIR PRODUK ALKES</b><br><br>
        </h4>
        
        </section>
 
        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
           <div class="box">
             <ul class="nav nav-tabs"><br>
   <!--  <a style="margin-left:1%;" href="<?php echo base_url(); ?>Alkesrr" class="btn-sm btn-plat btn-success"><i class="fa fa-home"></i>&nbspHome</a> -->
    <br><br>
    </ul>
<ul class="nav nav-tabs">
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">                   
                 <div class="row-fluid">
                     <dl class="dl-horizontal">
                            <dt>Perusahaan :</dt>
                            <dd><?php echo $alkes->nm_perusahaan?></dd>
                             <br/>
                            <dt>Produk :</dt>
                            <dd><?php echo $alkes->nama_produk?></dd>
                           </dl></div>
                    </div>

<div class="well">
   
        <div class="row-fluid">

          <form role="form" form name="form2" action="<?php echo site_url('Alkesrr/update_ongkir') ?>" method="post" enctype="multipart/form-data">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover table-condensed" id='tb-datatablesdara'>
                <thead>
                <tr bgcolor="#4682B4" style="font-family: arial; color: white;">
                    <th style='text-align:center;'>No</th>
                    <th style='text-align:center;'>Kode Ongkir</th>
                    <th style='text-align:center;'>Biaya Kirim</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                       $no=0;
                          foreach ($regional as $tr){
                         $no++;

                           date_default_timezone_set("Asia/Jakarta");
                             $waktusaatini =date("Y-m-d H:i:s"); 
                    ?>
                  
                    <tr>
                    <td style='text-align:center;width:10%'><?php echo $no; ?>
                    <input type="hidden" value="<?php echo $alkes->kode_produk; ?>" name="kode_produk2">
                       <input type="hidden" value="<?php echo $alkes->kode_produk; ?>" name="kode_produk[]">
                       <input type="hidden" value="<?php echo $alkes->kode_transaksi; ?>" name="kode_transaksi[]">
                       <input type="hidden" value="<?php echo $this->session->userdata('nama'); ?>" name="createby[]">
                       <input type="hidden" value="<?php echo $waktusaatini; ?>" name="updatedate[]">
                       <input type="hidden" value="<?php echo $alkes->koper; ?>" name="koper[]">
                         <input type="hidden" value="<?php echo $alkes->koper; ?>" name="koper2">
                        <input type="hidden" value="<?php echo $alkes->biaya_pengiriman; ?>" name="biaya_pengiriman">
                         <input type="hidden" value="<?php echo $alkes->kode_produk; ?>" name="kode_produk2">
                    </td>
                    <td style='text-align:justify;width:30%'><?php echo $tr['kode_ongkir']; ?> : <?php echo $tr['nm_regional']; ?> <?php echo $tr['namars']; ?>
                    <input type="hidden" value="<?php echo $tr['kode_ongkir']; ?>" name="kode_ongkir[]"></td>
                    <td style='text-align:justify;'>
                     
                     <input type="text" class="form-control" value="<?php echo $tr['biaya_kirim']; ?>" name="biaya_kirim[]" placeholder="isi biaya ongkir" required>           
                      

                    </td>
                   </tr>
              <?php } ?>
                </tbody>
            </table>
             
            </div>
</div></div>
<div class='row'>
                  <div class='col-sm-12' style='padding-right: 0px;'>
                  </div>
                  <div class='col-sm-6'></div>
                  <div class='col-sm-2' style="margin-left:80%;">
                    <button onclick="return confirm('Apakah Data Detail Sudah Terisi ?... ');" type='submit' class='btn btn-success btn-plat btn-block btn-md' id='Simpann'>
                      <i class='fa fa-floppy-o'></i> Simpan
                    </button>
                   </div>
                </div>
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
 
    