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
                <a href="<?php echo base_url('Alkesrr/cetakalkes')?>" class="btn-sm btn-plat btn-success"><i class="fa fa-home"></i>&nbspHome</a>
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
                    <th rowspan="4" style="vertical-align: middle;text-align: center;">Harga lama</th>
                   <th rowspan="4" style="vertical-align: middle;text-align: center;width:3%;">Disc lama(%)</th>
                   <th rowspan="4" style="vertical-align: middle;text-align: center;">Harga Akhir lama</th>
                  <th rowspan="4" style="vertical-align: middle;text-align: center;">Harga Baru</th>
                   <th rowspan="4" style="vertical-align: middle;text-align: center;width:3%;">Disc Baru(%)</th>
                   <th rowspan="4" style="vertical-align: middle;text-align: center;">Harga Akhir Baru</th>
                     <th colspan="19" style="vertical-align: middle;text-align: center;">Garansi</th>
                     <th rowspan="4" style="vertical-align: middle;text-align: center;">Nominal Fee</th>
                      <th rowspan="4" style="vertical-align: middle;text-align: center;">Status</th>
                     <th rowspan="4" style="vertical-align: middle;text-align: center;">Aksi</th>
                  </tr>
                  <tr class="danger" style="font-weight:bold;font-size:10px;">
                     <th colspan="19" style="vertical-align: middle;text-align: center;">Kontrak Servis</th>
                  </tr>
                   <tr class="danger" style="font-weight:bold;font-size:10px;">
                      <th rowspan="2" style="vertical-align: middle;text-align: center;">Free</th>
                      <th rowspan="2" style="vertical-align: middle;text-align: center;">Full</th>
                      <th colspan="5" style="vertical-align: middle;text-align: center;">Persentase (%)</th>
                      <th  style="vertical-align: middle;text-align: center;"></th>
                      <th colspan="5" style="vertical-align: middle;text-align: center;">Nominal Lama</th>
                      <th  style="vertical-align: middle;text-align: center;"></th>
                      <th colspan="5" style="vertical-align: middle;text-align: center;">Nominal Baru</th>
                  </tr>
                  <tr class="danger" style="font-weight:bold;font-size:10px;">
                  <th style="vertical-align: middle;text-align: left;">1</th>
                  <th style="vertical-align: middle;text-align: left;">2</th>
                  <th style="vertical-align: middle;text-align: left;">3</th>
                  <th style="vertical-align: middle;text-align: left;">4</th>
                  <th style="vertical-align: middle;text-align: left;">5</th>
                  <th style="vertical-align: middle;text-align: left;width:1%;"></th>
                  <th style="vertical-align: middle;text-align: left;">1</th>
                  <th style="vertical-align: middle;text-align: left;">2</th>
                  <th style="vertical-align: middle;text-align: left;">3</th>
                  <th style="vertical-align: middle;text-align: left;">4</th>
                  <th style="vertical-align: middle;text-align: left;">5</th>
                  <th style="vertical-align: middle;text-align: left;width:1%;"></th>
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
          <td style="vertical-align: middle;text-align: right;"><?php echo number_format($tr['harga_lama']); ?></td>
          <td style="vertical-align: middle;text-align: center;width:3%;"><?php echo $tr['diskon_lama']; ?></td>
           <td style="vertical-align: middle;text-align: right;"><?php echo number_format($tr['harga_akhir_lama']); ?></td>
          <td style="vertical-align: middle;text-align: right;"><?php echo number_format($tr['harga_baru']); ?></td>
          <td style="vertical-align: middle;text-align: center;width:3%;"><?php echo $tr['diskon_baru']; ?></td>
           <td style="vertical-align: middle;text-align: right;"><?php echo number_format($tr['harga_akhir_baru']); ?></td>
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['garansifree']; ?></td>
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['garansi']; ?></td> 
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['persentase1']; ?></td> 
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['persentase2']; ?></td> 
            <td style="vertical-align: middle;text-align: center;"><?php echo $tr['persentase3']; ?></td>
            <td style="vertical-align: middle;text-align: center;"><?php echo $tr['persentase4']; ?></td> 
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['persentase5']; ?></td> 
           <td style="vertical-align: middle;text-align: center;width:1%;"></td>
            <td style="vertical-align: middle;text-align: center;"><?php echo number_format($tr['nominal_lama1']); ?></td> 
           <td style="vertical-align: middle;text-align: center;"><?php echo number_format($tr['nominal_lama2']); ?></td> 
            <td style="vertical-align: middle;text-align: center;"><?php echo number_format($tr['nominal_lama3']); ?></td>
            <td style="vertical-align: middle;text-align: center;"><?php echo number_format($tr['nominal_lama4']); ?></td> 
           <td style="vertical-align: middle;text-align: center;"><?php echo number_format($tr['nominal_lama5']); ?></td> 
            <td style="vertical-align: middle;text-align: center;width:1%;"></td>
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
         <td style="vertical-align: middle;text-align: center;">
           <a style="margin-bottom:3px;" target="blank" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>Alkesrr/cetak_alkesproduk2/<?php echo $tr['iddetilalkesrr']; ?>" title="lihat Detail"><i class="fa fa-eye"></i></a> 
           <a style="margin-bottom:3px;" target="blank" class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>Alkesrr/lihatongkir/<?php echo $tr['kode_produk']; ?>/<?php echo $tr['koper']; ?>" title="Lihat Ongkir"><i class="fa fa-eye"></i></a>  
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




