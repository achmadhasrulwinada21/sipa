 <section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>DETAIL PRODUK ALKES</b>
                 </h4>
        
        </section>
 
        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
           <div class="box">
                <div class="box-header">
                  <a href="<?php echo base_url('Alkesrr')?>" class="btn-sm btn-plat btn-success"><i class="fa fa-home"></i>&nbspHome</a>
                 
                     
                <div class="row-fluid">
                   <div class="col-sm-12">
                   <div class="col-sm-2"></div>
                    <div class="col-sm-4">
                         <dl class="dl-horizontal">
                            <dt>Kode Transaksi :</dt>
                            <dd><?php echo $prod->kode_transaksi?></dd>
                            <br/>
                            <dt>Tanggal Transaksi :</dt>
                            <dd><?php echo date("d M Y",strtotime($prod->tgl_tr));?></dd>
                            <br/>
                            <dt>Perusahaan :</dt>
                            <dd><?php echo $prod->nm_perusahaan?></dd>
                          </dl>
                    </div>  
                    <div class="col-sm-4">
                         <dl class="dl-horizontal">
                            <dt>Fee Management :</dt>
                            <dd><?php echo $prod->fee?> %</dd>
                            <br/>
                            <dt>Jenis Pembayaran :</dt>
                            <?php
          $ynwa=$prod->jenis_pembayaran;
          if($ynwa=='1'){
            $ynwa='CASH';
          }else{
            $ynwa='SPONSORSHIP';
          } ?>
                           <dd><?php echo $ynwa ?></dd>
                           <br/>
                            <dt>Catatan :</dt>
                            <dd><?php echo $prod->catatan_statusapp?></dd>
                        </dl></div></div>  <div class="col-sm-2"></div></div>
                    </div>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                 
                            
</section>
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>

                <div class="box-title"><br> 
                 <br>
                </div>
                 <div class="table-responsive">
                <div class="box-body">
               <table id="tb-datatables" class="table table-bordered table-striped table-hover" style="vertical-align: middle;width:100%;">
                   <thead>
                  <tr class="danger" style="font-weight:bold;font-size:10px;">
                    <th rowspan="4" style="vertical-align: middle;text-align: center;">No</th>
                    <th rowspan="4" style="vertical-align: middle;text-align: center;">Nama Produk</th>
                  <th rowspan="4" style="vertical-align: middle;text-align: center;">Harga</th>
                   <th rowspan="4" style="vertical-align: middle;text-align: center;">disc(%)</th>
                   <th rowspan="4" style="vertical-align: middle;text-align: center;">Harga Akhir</th>
                     <th colspan="13" style="vertical-align: middle;text-align: center;">Garansi</th>
                     <th rowspan="4" style="vertical-align: middle;text-align: center;">Nominal Fee</th>
                     <th rowspan="4" style="vertical-align: middle;text-align: center;">Status</th>
                      <th rowspan="4" style="vertical-align: middle;text-align: center;">Catatan Status</th>
                     <th rowspan="4" style="vertical-align: middle;text-align: center;">Aksi</th>
                  </tr>
                  <tr class="danger" style="font-weight:bold;font-size:10px;">
                     <th colspan="13" style="vertical-align: middle;text-align: center;">Kontrak Servis</th>
                  </tr>
                   <tr class="danger" style="font-weight:bold;font-size:10px;">
                      <th rowspan="2" style="vertical-align: middle;text-align: center;">Free</th>
                      <th rowspan="2" style="vertical-align: middle;text-align: center;">Full</th>
                      <th colspan="5" style="vertical-align: middle;text-align: center;">Persentase (%)</th>
                      <th  style="vertical-align: middle;text-align: center;"></th>
                      <th colspan="5" style="vertical-align: middle;text-align: center;">Nominal </th>
                  </tr>
                  <tr class="danger" style="font-weight:bold;font-size:10px;">
                  <th style="vertical-align: middle;text-align: left;">1</th>
                  <th style="vertical-align: middle;text-align: left;">2</th>
                  <th style="vertical-align: middle;text-align: left;">3</th>
                  <th style="vertical-align: middle;text-align: left;">4</th>
                  <th style="vertical-align: middle;text-align: left;">5</th>
                  <th style="vertical-align: middle;text-align: left;"></th>
                  <th style="vertical-align: middle;text-align: left;">1</th>
                  <th style="vertical-align: middle;text-align: left;">2</th>
                  <th style="vertical-align: middle;text-align: left;">3</th>
                  <th style="vertical-align: middle;text-align: left;">4</th>
                  <th style="vertical-align: middle;text-align: left;">5</th>
                  </tr>
                    
                  </thead><tbody>
 <?php
$no=0;
          foreach ($data_alkes as $tr){
            $no++
?> 
        <tr class="success" style="font-weight:bold;font-family:verdana;font-size:10px;">
          <td style="vertical-align: middle;text-align: center;" ><?php echo $no; ?></td>         
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['nama_produk']; ?></td>
          <td style="vertical-align: middle;text-align: right;"><?php echo number_format($tr['harga_baru']); ?></td>
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['diskon_baru']; ?></td>
           <td style="vertical-align: middle;text-align: right;"><?php echo number_format($tr['harga_akhir_baru']); ?></td>
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['garansifree']; ?></td>
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['garansi']; ?></td> 
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['persentase1']; ?></td> 
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['persentase2']; ?></td> 
            <td style="vertical-align: middle;text-align: center;"><?php echo $tr['persentase3']; ?></td>
            <td style="vertical-align: middle;text-align: center;"><?php echo $tr['persentase4']; ?></td> 
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['persentase5']; ?></td> 
           <td style="vertical-align: middle;text-align: center;"></td>
            <td style="vertical-align: middle;text-align: center;"><?php echo number_format($tr['nominal_baru1']); ?></td> 
           <td style="vertical-align: middle;text-align: center;"><?php echo number_format($tr['nominal_baru2']); ?></td> 
            <td style="vertical-align: middle;text-align: center;"><?php echo number_format($tr['nominal_baru3']); ?></td>
            <td style="vertical-align: middle;text-align: center;"><?php echo number_format($tr['nominal_baru4']); ?></td> 
           <td style="vertical-align: middle;text-align: center;"><?php echo number_format($tr['nominal_baru5']); ?></td> 
          <td style="vertical-align: middle;text-align: center;"><?php echo number_format($tr['nominal_fee_baru']); ?></td>

           <td style="vertical-align: middle;text-align: center;">
          <?php 
          $status= $tr['stsapp_detil'];
           if($status=='Disetujui Direktur Ops & Umum'){
          ?>
          <p style="color:white;font-weight:bold;background-color:green;line-height:20px;"><?php echo $status; ?></p>
           <?php }elseif($status=='Disetujui Manager Jangmed KSO'){ ?>
           <p style="color:black;font-weight:bold;background-color:pink;line-height:20px;"><?php echo $status; ?></p>
           <?php }elseif($status=='Disetujui Kadep Jangmed'){ ?>
           <p style="color:white;font-weight:bold;background-color:blue;line-height:20px;"><?php echo $status; ?></p>
           <?php }elseif($status=='Disetujui Kadep Pengadaan'){ ?>
           <p style="color:black;font-weight:bold;background-color:lightgreen;line-height:20px;"><?php echo $status; ?></p>
          <?php }elseif($status=='ditolak'){ ?>
          <p style="color:black;font-weight:bold;background-color:red;line-height:20px;"><?php echo $status; ?></p>
        <?php }elseif($status=='outstanding'){ ?>
          <p style="color:black;font-weight:bold;background-color:skyblue;line-height:20px;"><?php echo $status; ?></p>
            <?php }else{?>  
   <p style="color:black;font-weight:bold;background-color:yellow;line-height:20px;"><?php echo $status; ?></p>
            <?php } ?>            
          </td>
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['ctt_stsapp']; ?></td>
         <td style="vertical-align: middle;text-align: center;">
           <a style="margin-bottom:3px;" target="blank" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>Alkesrr/cetak_alkesproduk/<?php echo $tr['iddetilalkesrr']; ?>" title="lihat Detail"><i class="fa fa-eye"></i></a> 
           <a title="Lihat Ongkir" style="margin-bottom:3px;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $tr['iddetilalkesrr'];?>"><i class="fa fa-eye"></i></a>  
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
            </div>
            </div>
          </div>
        </div>



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
