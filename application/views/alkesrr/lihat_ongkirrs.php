 <section class="content-header">
        <br/>

        <h4 style="text-align: center;font-family:verdana;">
          <b>ONGKIR PRODUK ALKES</b><br><br>
        </h4>
        
        </section>
 
        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
           <div class="box">
             <ul class="nav nav-tabs"><br>
   
    </ul>
<ul class="nav nav-tabs">
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">                   
                 <div class="row-fluid">
                     <dl class="dl-horizontal">
                         <dd><?php echo $alkes->nm_perusahaan?></dd>
                             <br/>
                            <dt>Produk :</dt>
                            <dd><?php echo $alkes->nama_produk?></dd>
                           </dl></div>
                    </div>

<div class="well">
   
        <div class="row-fluid">

          <form role="form" form name="form2" action="<?php echo site_url('Alkesrr/simpan_ongkir') ?>" method="post" enctype="multipart/form-data">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover table-condensed" id='tb-datatablesdara'>
                <thead>
                <tr bgcolor="#4682B4" style="font-family: arial; color: white;">
                     <th style='text-align:center;width:5%'>No</th>
                    <th style='text-align:center;width:10%'>Kode Ongkir</th>
                     <th style='text-align:center;width:30%'>Regional / Rumah Sakit</th>
                    <th style='text-align:center;'>Biaya Kirim</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                       $no=0;
                          foreach ($ongkir as $tr){
                         $no++;
                  ?>
                    <tr>
                    <td style='text-align:center;width:5%'><?php echo $no; ?></td>
                     <td style='text-align:center;width:10%'><?php echo $tr['kode_ongkir']; ?></td>
                    <td style='text-align:justify;width:30%'><?php echo $tr['namars']; ?></td>
                    <td style='text-align:justify;'>Rp. <?php echo number_format($tr['biaya_kirim']); ?>,-</td>
                   </tr>
              <?php } ?>
                </tbody>
            </table>
             
            </div>
</div></div>
                             
                </div>                         
</section>
                             
                </div>
               </div>
            </div>
            </div>
          </div>
        </div>
</form>
 
    