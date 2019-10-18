 <section class="content-header">
        <br/>

        <h4 style="text-align: center;font-family:verdana;">
          <b>PUBLISH PRODUK ALKES</b><br>
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
                            
<div class="well">
   
        <div class="row-fluid">

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>

                <div class="box-title"><br> 
                 <br>

                 </div>
                 <form action="<?php echo site_url('Alkesrr/update_publish') ?>" method="post" enctype="multipart/form-data">
               <div class="table-responsive">
                <div class="box-body">
               <table id="tb-datatables" class="table table-bordered table-striped table-hover" style="vertical-align: middle;width:100%;">
                   <thead>
                  <tr class="danger" style="font-weight:bold;font-size:10px;">
                    <th  style="vertical-align: middle;text-align: center;">No</th>
                    <th  style="vertical-align: middle;text-align: center;">Nama Produk</th>
                   <th  style="vertical-align: middle;text-align: center;">Status</th>
                  <th  style="vertical-align: middle;text-align: center;">Aksi</th>
                                      
                  </thead><tbody>
 <?php
$no=0;
          foreach ($data_alkes as $tr){
            $no++
?> 
        <tr class="success" style="font-weight:bold;font-family:verdana;font-size:10px;">
          <td style="vertical-align: middle;text-align: center;" ><?php echo $no; ?>
                                     
          </td>         
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['nama_produk']; ?>
             <input type="hidden" name="kode_produk[]" value="<?php echo $tr['kode_produk']; ?>">
             <input type="hidden" name="kode_transaksi[]" value="<?php echo $tr['kode_transaksi']; ?>">
             <input type="hidden" name="statuslist_detil[]" value="live">
               <input type="hidden" name="statuslist_detil2[]" value="histori">
                <input type="hidden" name="statuslist_detil3[]" value="diajukan">
                 <input type="hidden" name="kode_transaksi2" value="<?php echo $tr['kode_transaksi']; ?>">
                  <input type="hidden" name="koper" value="<?php echo $tr['koper']; ?>">
                   <input type="hidden" name="jenis_listing" value="<?php echo $tr['jenis_listing']; ?>">
          </td>
         
        <td style="vertical-align: middle;text-align: center;">
          <?php 
          $status= $tr['stsapp_detil'];
           if($status=='Disetujui Direktur Ops & Umum'){
          ?>
          <p style="color:white;font-weight:bold;background-color:green;line-height:20px;"><?php echo $status; ?></p>
          <?php }elseif($status=='ditolak'){ ?>
          <p style="color:black;font-weight:bold;background-color:red;line-height:20px;"><?php echo $status; ?></p>
        <?php }elseif($status=='outstanding'){ ?>
          <p style="color:black;font-weight:bold;background-color:skyblue;line-height:20px;"><?php echo $status; ?></p>
            <?php }else{?>  
   <p style="color:black;font-weight:bold;background-color:yellow;line-height:20px;"><?php echo $status; ?></p>
            <?php } ?>        
          </td>
                    <td style="vertical-align: middle;text-align: center;">
           <a style="margin-bottom:3px;" target="blank" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>Alkesrr/cetak_alkesproduk/<?php echo $tr['iddetilalkesrr']; ?>" title="lihat Detail"><i class="fa fa-eye"></i>&nbsp Lihat Detail</a> 
          <a title="Lihat Ongkir" style="margin-bottom:3px;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $tr['iddetilalkesrr']; ?>"><i class="fa fa-eye"></i>&nbsp Lihat Ongkir</a>
           </td>
        </tr>
            <?php  } ?> 
               </tbody></table>

                 <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr  bgcolor="skyblue">  <td width="140"><b>JUMLAH PRODUK</b></td><td width="10">:</td><td width="10"><b>  <?php echo count($data_alkes); ?></b></td></tr>
                   </tr>
                    </table>
                </div>
               </div>
          </div></div>
<div class='row'>
                  <div class='col-sm-12' style='padding-right: 0px;'>
                  </div>
                  <div class='col-sm-6'></div>
                  <div class='col-sm-2' style="margin-left:80%;">
                    <button onclick="return confirm('Yakin Publish All ?... ');" type='submit' class='btn btn-success btn-plat btn-block btn-md' id='Simpann'>
                      <i class='fa fa-floppy-o'></i> Publish All
                    </button>
                   </div>
                </div>

  </form>                           
              


<?php
        foreach($data_alkes as $i){
       $iddetilalkesrr=$i['iddetilalkesrr'];
       $kode_produk=$i['kode_produk'];
       $koper=$i['koper'];
       $nm_perusahaan=$i['nm_perusahaan'];
       $nama_produk=$i['nama_produk'];
       $biaya_pengiriman=$i['biaya_pengiriman'];
       $kode_transaksi=$i['kode_transaksi'];
       $jenis_listing=$i['jenis_listing'];
?>
<div id="modal_edit<?php echo $iddetilalkesrr;?>" class="modal fade">
  <div class="modal-dialog modal-lg">
    <!-- <div class="modal-content"> -->
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Lihat Ongkir</h4></td>
      </div>
        <div class="modal-body">
          <?php

          $this->load->model('malkesrr');                   
          $koders=($this->session->userdata('koders'));
        $regional = $this->malkesrr->ongkirregcuicoba("where a.koper='$koper' and kode_produk='$kode_produk' and (kode_ongkir='$koders' or c.koders='$koders') order by koper asc")->result_array(); 
        ?>
                     <dl class="dl-horizontal">
                            <dt>Perusahaan :</dt>
                            <dd><?php echo $nm_perusahaan?></dd>
                             <br/>
                            <dt>Produk :</dt>
                            <dd><?php echo $nama_produk?></dd>
                           </dl>
    <div class="well"> 
   
        <div class="row-fluid">
     <form role="form" action="<?php echo base_url(); ?>Alkesrr/update_ongkir" method="POST">
             <div class="table-responsive">
            <table class="datatables49 table table-bordered table-striped table-hover table-condensed" id=''>
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
                    </td>
                    <td style='text-align:justify;width:30%'><?php echo $tr['kode_ongkir']; ?> : <?php echo $tr['koders']; ?> : <?php echo $tr['namars']; ?> <?php echo $tr['nmrs']; ?>
                   </td>
                    <td style='text-align:justify;'>                   
                     <?php echo number_format($tr['biaya_kirim']); ?>                    

                    </td>
                   </tr>
              <?php } ?>
                </tbody>
            </table>
             
            </div>
              </div></div>
              
                   </div><!-- /.col -->                     
                   
                           </div><!-- /.item -->
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>
              <!-- END MODAL edit -->
