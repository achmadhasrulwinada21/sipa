 <section class="content-header">
        <br/>

        <h4 style="text-align: center;font-family:verdana;">
          <b>TAMBAH DETAIL PRODUK ALKES</b><br>
            <b><?php echo $prod->nm_perusahaan ?></b>
          <br>
        </h4>
        
        </section>
 
        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
           <div class="box">
             <ul class="nav nav-tabs"><br>
    <a style="margin-left:1%;" href="<?php echo base_url(); ?>Alkesrr" class="btn-sm btn-plat btn-success"><i class="fa fa-home"></i>&nbspHome</a>
    <br><br>
    </ul>
<ul class="nav nav-tabs">
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">                   
                 <div class="row-fluid">
                  <dl class="dl-horizontal">
                            <dt>Kode Transaksi :</dt>
                            <dd><?php echo $prod->kode_transaksi?></dd>
                             <br/>
                             <dt>Tanggal Transaksi :</dt>
                            <dd><?php echo date('d M Y',strtotime($prod->tgl_tr))?></dd>
                             <br/>
                            <dt>Perusahaan :</dt>
                            <dd><?php echo $prod->nm_perusahaan?></dd>
                            <br/>
                            <dt>Kontak :</dt>
                            <dd><?php echo $prod->contact?></dd>
                             <br/>
                             <?php
                              $ynwa=$prod->jenis_pembayaran;
          if($ynwa=='1'){
            $ynwa='CASH';
          }else{
            $ynwa='SPONSORSHIP';
          } 
          ?>
                            <dt>Fee Management :</dt>
                            <dd><?php echo $ynwa?></dd>
                           </dl>
              <div class="well">
                     <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">TAMBAH DATA</h3>
              </div>
        <div class="row-fluid">

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>

                <div class="box-title"><br> 
                 <br>
                </div>
                 <form role="form" form name="form2" action="<?php echo site_url('Alkesrr/update_hargalama') ?>" method="post" enctype="multipart/form-data">
                 

                 <input type="hidden" class="form-control" value="<?php echo $prod->kode_transaksi ?>" id="" name="kode_transaksi2">                              
                    <input type="hidden" class="form-control" value="<?php echo $prod->koper ?>" id="" name="koper2"> 
                <input type="hidden" class="form-control" value="<?php echo $prod->jenis_listing ?>" id="" name="jenis_listing2"> 
               
                 <div class="table-responsive">
                <div class="box-body">
               <table id="tb-datatables" class="table table-bordered table-striped table-hover" style="vertical-align: middle;width:100%;">
                   <thead>
                  <tr class="danger" style="font-weight:bold;font-size:10px;">
                    <th  style="vertical-align: middle;text-align: center;">No</th>
                    <th style="vertical-align: middle;text-align: center;">Nama Produk</th>
                  <th style="vertical-align: middle;text-align: center;">Harga lama</th>
                   <th  style="vertical-align: middle;text-align: center;">disc lama(%)</th>
                   <th  style="vertical-align: middle;text-align: center;">ppn lama</th>
                    <th  style="vertical-align: middle;text-align: center;">Harga Baru</th>
                   <th  style="vertical-align: middle;text-align: center;">disc Baru(%)</th>
                   <th  style="vertical-align: middle;text-align: center;">ppn Baru</th>
                    <th  style="vertical-align: middle;text-align: center;">Catatan harga</th>
                     <th  style="vertical-align: middle;text-align: center;">Catatan diskon</th>
                    <th  style="vertical-align: middle;text-align: center;">Aksi</th>
                  </tr>
                                   
                  </thead><tbody>
 <?php
$no=0;
          foreach ($data_alkes as $tr){
            $no++
?> 
                                   
        <tr class="success" style="font-weight:bold;font-family:verdana;font-size:10px;">
          <td style="vertical-align: middle;text-align: center;" ><?php echo $no; ?>
             <input type="hidden" class="form-control" value="<?php echo $prod->kode_transaksi ?>" id="" name="kode_transaksi[]">                              
                    <input type="hidden" class="form-control" value="<?php echo $prod->koper ?>" id="" name="koper[]"> 
                <input type="hidden" class="form-control" value="<?php echo $prod->jenis_listing ?>" id="" name="jenis_listing[]">
                <input type="hidden" class="form-control" value="diajukan" id="" name="statuslist_detil[]">

          </td>         
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['nama_produk']; ?>
            <input type="hidden" name="kode_produk[]" value="<?php echo $tr['kode_produk']; ?>">
             <input type="hidden" class="form-control" value="<?php echo $tr['stse_kat']; ?>" id="" name="stse_kat[]">
               <input type="hidden" class="form-control" value="<?php echo $tr['stsregister']; ?>" id="" name="stsregister[]"> 
          </td>
          <td style="vertical-align: middle;text-align: right;"><?php echo number_format($tr['harga_lama']); ?>

          <input id="hargalama" type="hidden" name="harga_lama[]" value="<?php echo $tr['harga_lama']; ?>">

          </td>
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['diskon_lama']; ?>

              <input id="diskonlama" type="hidden" name="diskon_lama[]" value="<?php echo $tr['diskon_lama']; ?>">

          </td>
           <td style="vertical-align: middle;text-align: right;"><?php echo number_format($tr['ppn_lama']); ?>

               <input  type="hidden" name="ppn_lama[]" value="<?php echo $tr['ppn_lama']; ?>">

           </td>
             <td style="vertical-align: middle;text-align: right;">
          <input id="hargabaru" size="10%" type="text" class="form-control" name="harga_baru[]" value="<?php echo $tr['harga_baru']; ?>">

      <input type="hidden" class="form-control" value="<?php echo $tr['note']; ?>" id="" name="note[]"> 
        <input type="hidden" class="form-control" value="<?php echo $tr['garansi']; ?>" id="" name="garansi[]"> 
        <input type="hidden" class="form-control" value="<?php echo $tr['garansifree']; ?>" id="" name="garansifree[]"> 
          </td>
          <td style="vertical-align: middle;text-align: center;">
              <input id="diskonbaru" size="1%" class="form-control" type="text" name="diskon_baru[]" value="<?php echo $tr['diskon_baru']; ?>">

               <input type="hidden" class="form-control" value="<?php echo $tr['persentase1']; ?>" id="" name="persentase1[]"> 
                <input type="hidden" class="form-control" value="<?php echo $tr['persentase2']; ?>" id="" name="persentase2[]"> 
                <input type="hidden" class="form-control" value="<?php echo $tr['persentase3']; ?>" id="" name="persentase3[]"> 
                <input type="hidden" class="form-control" value="<?php echo $tr['persentase4']; ?>" id="" name="persentase4[]"> 
                <input type="hidden" class="form-control" value="<?php echo $tr['persentase5']; ?>" id="" name="persentase5[]"> 
                <input type="hidden" class="form-control" value="<?php echo $tr['ket']; ?>" id="" name="ket[]"> 
          </td>
           <td style="vertical-align: middle;text-align: right;">
               <input size="1%" class="form-control" type="text" name="ppn_baru[]" value="<?php echo $tr['ppn_baru']; ?>">

                <input type="hidden" class="form-control" value="<?php echo $tr['tahunke1']; ?>" id="" name="tahunke1[]"> 
                <input type="hidden" class="form-control" value="<?php echo $tr['tahunke2']; ?>" id="" name="tahunke2[]"> 
                <input type="hidden" class="form-control" value="<?php echo $tr['tahunke3']; ?>" id="" name="tahunke3[]"> 
                <input type="hidden" class="form-control" value="<?php echo $tr['tahunke4']; ?>" id="" name="tahunke4[]"> 
                <input type="hidden" class="form-control" value="<?php echo $tr['tahunke5']; ?>" id="" name="tahunke5[]"> 
                 <input type="hidden" class="form-control" value="<?php echo $tr['fee']; ?>" id="" name="fee[]">                                
                    <input type="hidden" class="form-control" value="<?php echo $tr['biaya_pengiriman']; ?>" id="" name="biaya_pengiriman[]"> 
          
           </td>
            <td style="vertical-align: middle;text-align: right;">
            <textarea style="display:none" id="show" name='alasanharga[]' id="" class='uul41 form-control' rows='2' placeholder="alasan harga naik" style='resize: vertical; width:83%;'><?php echo $tr['alasanharga']; ?></textarea>
            <?php echo $tr['alasanharga']; ?>
            </td>         
           <td style="vertical-align: middle;text-align: right;">
            <textarea style="display:none" id="showdiskon" name='alasandiskon[]' id="" class='uul41 form-control' rows='2' placeholder="alasan diskon turun " style='resize: vertical; width:83%;'><?php echo $tr['alasandiskon']; ?></textarea>
            <?php echo $tr['alasandiskon']; ?>
            </td>         
             
           <td style="vertical-align: middle;text-align: center;">
           <a style="margin-bottom:3px;" target="blank" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>Alkesrr/cetak_alkesproduk2/<?php echo $tr['iddetilalkesrr']; ?>" title="lihat Detail"><i class="fa fa-eye"></i></a> 
            <a title="Tambah Ongkir" style="margin-bottom:3px;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $tr['iddetilalkesrr'];?>"><i class="glyphicon glyphicon-plus"></i></a>
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
            <div class='row'>
                  <div class='col-sm-12' style='padding-right: 0px;'>
                  </div>
                  <div class='col-sm-6'></div>
                  <div class='col-sm-2' style="margin-left:80%;">
                    <button  type='submit' class='btn btn-success btn-plat btn-block btn-md' id='Simpann'>
                      <i class='fa fa-floppy-o'></i> Simpan
                    </button>
                   </div>
                </div>
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
        <h4 class="modal-title">Tambah Ongkir</h4></td>
      </div>
        <div class="modal-body">
          <?php

          $this->load->model('malkesrr');                   
        $regional = $this->malkesrr->ongkirreg("where koper='$koper' order by koper asc")->result_array(); 
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
                     <th style='text-align:center;'>Ceklist Ongkir</th>
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
                    <input type="hidden" value="<?php echo $kode_produk; ?>" name="kode_produk2">
                    <input type="hidden" value="<?php echo $kode_transaksi; ?>" name="kode_transaksi2">
                    <input type="hidden" value="<?php echo $jenis_listing; ?>" name="jenis_listing2">
                       <input type="hidden" value="<?php echo $kode_produk; ?>" name="kode_produk[]">
                       <input type="hidden" value="<?php echo $kode_transaksi; ?>" name="kode_transaksi[]">
                       <input type="hidden" value="<?php echo $this->session->userdata('nama'); ?>" name="createby[]">
                       <input type="hidden" value="<?php echo $waktusaatini; ?>" name="updatedate[]">
                       <input type="hidden" value="<?php echo $koper; ?>" name="koper[]">
                         <input type="hidden" value="<?php echo $koper; ?>" name="koper2">
                        <input type="hidden" value="<?php echo $biaya_pengiriman; ?>" name="biaya_pengiriman">
                         <input type="hidden" value="<?php echo $kode_produk; ?>" name="kode_produk2">
                    </td>
                    <td style='text-align:justify;width:30%'><?php echo $tr['kode_wilayah']; ?> : <?php echo $tr['nm_regional']; ?> <?php echo $tr['namars']; ?>
                    <input type="hidden" value="<?php echo $tr['kode_wilayah']; ?>" name="kode_ongkir[]"></td>
                    <td style='text-align:justify;'>
                     
                    <?php
                       $this->load->model('malkesrr'); 
                       $ok=$tr['kode_wilayah'];
                      
    $ongkir = $this->malkesrr->ongkirregcui("where kode_produk='$kode_produk' and kode_ongkir='$ok' order by kode_ongkir asc")->result_array();
    $alkescui = $this->db->get_where('tb_ongkir',['kode_produk'=>$kode_produk])->row();
                if(isset($alkescui->kode_produk)){
                foreach ($ongkir as $pr){ 
                ?>
                      <input type="text" class="form-control" value="<?php echo $pr['biaya_kirim']; ?>" name="biaya_kirim[]" placeholder="isi biaya ongkir" required>
                    <?php } ?>

                <?php }else{ ?>
                      <input type="text" class="form-control" value="0" name="biaya_kirim[]" placeholder="isi biaya ongkir" required>
   <?php } ?>  
                      

                    </td>
                    <td> 
                       <?php
                     
    $ongkir = $this->malkesrr->ongkirregcui("where kode_produk='$kode_produk' and kode_ongkir='$ok' order by kode_ongkir asc")->result_array();
    $alkescui = $this->db->get_where('tb_ongkir',['kode_produk'=>$kode_produk])->row();
                if(isset($alkescui->kode_produk)){
                foreach ($ongkir as $tr){ 
                ?>
                     
                        <?php } ?>
                            <select  id="" name="flag_ongkir[]" class="daracui form-control" data-placeholder="-- Pilih Status --">
                <option></option>
                 <option <?php if ($tr['flag_ongkir'] == "1") echo 'selected' ; ?> value="1">aktif</option>
                 <option <?php if ($tr['flag_ongkir'] == "0") echo 'selected' ; ?> value="0">non aktif</option>
           </select>
                         <?php }else{ ?>
                          <select  id="" name="flag_ongkir[]" class="daracui form-control" data-placeholder="-- Pilih Status --" >
                  <option value="0">non aktif</option>
                  <option value="1">aktif</option>
                </select>
                         <?php } ?> 
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
                    <button type='submit' class='btn btn-success btn-plat btn-block btn-md' id='Simpann'>
                      <i class='fa fa-floppy-o'></i> Simpan Ongkir
                    </button>
                   </div>
                </div>
                   </div><!-- /.col -->                     
                   
                           </div><!-- /.item -->
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>
              <!-- END MODAL edit -->


