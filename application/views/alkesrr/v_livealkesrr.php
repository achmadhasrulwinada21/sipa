
 <section class="content-header">
        <br/>

        <h4 style="text-align: center;font-family:verdana;">
          <b>LISTING RR  PRODUK ALAT KESEHATAN</b><br><br>
        </h4>
        
        </section>
 
        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
           <div class="box">
             <ul class="nav nav-tabs"><br>
                <!-- button data-toggle="modal" data-target="#myModal" class="btn btn-success" style="margin-left:2%"><span class="glyphicon glyphicon-print"></span>&nbspPRINT</button><br> <br> -->
               <div class="col-lg-12">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <form role="form"  action="<?php echo base_url(); ?>Alkesrr/excelalkesrr" method="POST" enctype="multipart/form-data">
                                 <div class="form-group"> 
                                         PERUSAHAAN:<br>
                                     <select name="koper" id="dara" class="form-control" data-placeholder="pilih perusahaan">
                                   <option></option>
                                   <?php foreach($kpr as $dt) { ?>
                                        <option value=<?php echo $dt['koper'] ; ?>>
                                         <?php echo $dt['nm_perusahaan']?></option>
                                        <?php  } ?>
                                      </select>
                                    </div>

                                <!-- <div class="form-group">
                                         PERIODE AWAL:<br>
                                        <input type="text" id="datepicker11" name="tglawal" class="form-control" autocomplete="off" >
                                    </div>
                                      <b>s/d</b><br><br>
                                    <div class="form-group">
                                        PERIODE AKHIR:<br>
                                        <input type="text" id="datepicker51" name="tglakhir" class="form-control" autocomplete="off" >
                                    </div> -->
                          
                        </div>
                        <div class="col-lg-4"></div>
                        </div>
                         <div style="text-align:center;" class="form-actions">
            <button  type="submit" class="btn btn-info"><i class="fa fa-print"></i> Expor to Excel </button>
            <a href="<?php echo base_url(); ?>Alkesrr/livealkes" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div><br>
     </form>
    </ul>
<ul class="nav nav-tabs">
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">                   
                 <div class="row-fluid">

                     <dl class="dl-horizontal">
                             

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        
                
                </div><!-- /.box-title -->
      <div class="well">
   
        <div class="row-fluid">
                <div class="table-responsive">
                <div class="box-body">      
        <br>
        <table id="tablelive" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr bgcolor="#4682B4" style="font-family: verdana; color: white;">
                     <th style="vertical-align: middle; text-align: center;">No</th>
                    <th style="vertical-align: middle; text-align: center;">Perusahaan</th>
                    <th style="vertical-align: middle; text-align: center;">Kode Produk</th>
                    <th style="vertical-align: middle; text-align: center;">Nama Produk</th>
                     <th style="vertical-align: middle; text-align: center;">Type</th>
                      <th style="vertical-align: middle; text-align: center;">Merk</th>
                    <th style="vertical-align: middle; text-align: center;">Jenis Barang</th>
                     <th style="vertical-align: middle; text-align: center;">Harga</th>
                      <th style="vertical-align: middle; text-align: center;">Ppn</th>
                    <th style="vertical-align: middle; text-align: center;">Franco Rs</th>
                     <th style="vertical-align: middle; text-align: center;">Garansi</th>
                    <th style="vertical-align: middle; text-align: center;">lihat</th>
                  </tr>
            </thead>
            <tbody>
            </tbody>
 
            <tfoot>
                   <tr bgcolor="grey" style="font-family: verdana; color: white;">
                    <th style="vertical-align: middle; text-align: center;">No</th>
                    <th style="vertical-align: middle; text-align: center;">Perusahaan</th>
                   <th style="vertical-align: middle; text-align: center;">Kode Produk</th>
                    <th style="vertical-align: middle; text-align: center;">Nama Produk</th>
                     <th style="vertical-align: middle; text-align: center;">Type</th>
                      <th style="vertical-align: middle; text-align: center;">Merk</th>
                    <th style="vertical-align: middle; text-align: center;">Jenis Barang</th>
                     <th style="vertical-align: middle; text-align: center;">Harga</th>
                      <th style="vertical-align: middle; text-align: center;">Ppn</th>
                    <th style="vertical-align: middle; text-align: center;">Franco Rs</th>
                     <th style="vertical-align: middle; text-align: center;">Garansi</th>
                    <th style="vertical-align: middle; text-align: center;">lihat</th>
                   </tr>
            </tfoot>
        </table>
    </div>
  </div>
               </div>
            </div><!-- /.box -->
         
        <!-- Main row -->
       
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
         
        
     
<!------- modal -------->


 <!--  <div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="panel panel-primary">
         <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">CETAK</h4></td>
      </div>
          <div class="modal-body">

<form action="<?php echo base_url(); ?>Alkesrr/excelalkesrr" method="POST">
        <div class="form-group"> 
             PERUSAHAAN:<br>
         <select name="koper" id="dara" class="form-control" data-placeholer="pilih Perusahaan">
       <option></option>
       <?php foreach($kpr as $dt) { ?>
            <option value=<?php echo $dt['koper'] ; ?>>
             <?php echo $dt['nm_perusahaan']?></option>
            <?php  } ?>
          </select>
        </div>

    <div class="form-group">
        PERIODE AWAL:<br>
        <input type="text" id="datepicker11" name="tglawal" class="form-control" autocomplete="off">
    </div>
      <b>s/d</b><br><br>
    <div class="form-group">
        PERIODE AKHIR:<br>
        <input type="text" id="datepicker51" name="tglakhir" class="form-control" autocomplete="off">
    </div>
          
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          <input type="submit" class="btn btn-primary" value="CETAK">
        </div>
                </fieldset>
                </form>   
                </div></div></div></div></div>                          
  <!-- end modal -->
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
        $regional = $this->malkesrr->ongkirregcuicoba("where a.koper='$koper' and kode_produk='$kode_produk' and (kode_ongkir='$koders' or c.koders='$koders') and flag_ongkir='1' order by koper asc")->result_array(); 
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
