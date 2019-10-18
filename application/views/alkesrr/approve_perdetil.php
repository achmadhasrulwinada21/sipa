 <section class="content-header">
        <br/>

        <h4 style="text-align: center;font-family:verdana;">
          <b>APPROVE DETAIL PRODUK ALKES</b><br>
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
   
        <div class="row-fluid">

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>

                <div class="box-title"><br> 
                 <br>

                 </div>
      <form method="post" action="<?php echo base_url(); ?>Alkesrr/update_appdetil" id="form-delete">
         <input type="hidden" class="form-control" value="<?php echo $prod->kode_transaksi ?>" id="" name="cui">                              
                   
                <input type="hidden" class="form-control" value="<?php echo $prod->jenis_listing ?>" id="" name="cui2"> 
                 <div class="table-responsive">
                <div class="box-body">
               <table id="tb-datatables" class="table table-bordered table-striped table-hover" style="vertical-align: middle;width:100%;">
                   <thead>
                  <tr class="danger" style="font-weight:bold;font-size:10px;">
                    <th rowspan="2"  style="vertical-align: middle;text-align: center;">No</th>
                    <th  rowspan="2" style="vertical-align: middle;text-align: center;">Nama Produk</th>
                  <th rowspan="2" style="vertical-align: middle;text-align: center;">Harga</th>
                   <th rowspan="2" style="vertical-align: middle;text-align: center;">Disc(%)</th>
                   <th rowspan="2" style="vertical-align: middle;text-align: center;">Ppn</th>
                    <th rowspan="2" style="vertical-align: middle;text-align: center;">Harga Akhir</th>
                   <th rowspan="2" style="vertical-align: middle;text-align: center;">Status</th>
                   <th rowspan="2" style="vertical-align: middle;text-align: center;">Catatan</th>
                  <th colspan="3"  style="vertical-align: middle;text-align: center;">Aksi</th>
                 </tr>
                 <tr class="danger"><th style="text-align:center;">Approval
                 </th>
                  <th style="text-align:center;">Lihat Detail</th>
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
          </td>         
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['nama_produk']; ?>
             <input type="hidden" name="kode_produk[]" value="<?php echo $tr['kode_produk']; ?>">
              <!-- <input type="hidden" name="statuslist_detil[]" value="live">
               <input type="hidden" name="statuslist_detil2[]" value="histori">
                <input type="hidden" name="statuslist_detil3[]" value="diajukan">
                <input type="hidden" name="uul78[]" value="ditolak"> -->
          </td>
          <td style="vertical-align: middle;text-align:justify;"><?php echo number_format($tr['harga_baru']); ?>
         </td>
          <td style="vertical-align: middle;text-align: center;"><?php echo number_format($tr['diskon_baru']); ?>
            </td>
           <td style="vertical-align: middle;text-align: center;"> <?php echo number_format($tr['ppn_baru']); ?>
            </td>
             <td style="vertical-align: middle;text-align: center;"> <?php echo number_format($tr['harga_akhir_baru']); ?>
            </td>
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
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['ctt_stsapp'];; ?></td>
                    <td style="vertical-align: middle;text-align: center;">
                <?php
              $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='82'):  ?>  
           <select  id="messagetype" name="stsapp_detil[]" class="daracui form-control" data-placeholder="-- Pilih Approval --" required>
                <option required></option>
                 <option <?php if ($tr['stsapp_detil'] == "Disetujui Kadep Pengadaan" || $tr['stsapp_detil'] == "Disetujui Kadep Jangmed") echo 'selected' ; ?> value="Disetujui Kadep Pengadaan">Disetujui</option>
                 <option <?php if ($tr['stsapp_detil'] == "ditolak") echo 'selected' ; ?> value="ditolak">ditolak</option>
           </select><br><br>
            <textarea style="display: none" id="showapp" name='ctt_stsapp[]' id="" class='uul41 form-control' rows='2' placeholder="Isikan Catatan Ditolak" style='resize: vertical; width:83%;'><?php echo $tr['ctt_stsapp']; ?></textarea>
         <?php endif; ?>
           <?php
              $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='10'):  ?>  
           <select  id="messagetype" name="stsapp_detil[]" class="daracui form-control" data-placeholder="-- Pilih Approval --" required>
                <option required></option>
                 <option <?php if ($tr['stsapp_detil'] == "Disetujui Direktur Ops & Umum" || $tr['stsapp_detil'] == "Disetujui Kadep Pengadaan") echo 'selected' ; ?> value="Disetujui Direktur Ops & Umum">Disetujui</option>
                 <option <?php if ($tr['stsapp_detil'] == "ditolak") echo 'selected' ; ?> value="ditolak">ditolak</option>
           </select><br><br>
            <textarea style="display: none" id="showapp" name='ctt_stsapp[]' id="" class='uul41 form-control' rows='2' placeholder="Isikan Catatan Ditolak" style='resize: vertical; width:83%;'><?php echo $tr['ctt_stsapp']; ?></textarea>
         <?php endif; ?>
             
            </td>
             <td style="vertical-align: middle;text-align: center;">
          <a style="margin-bottom:3px;" target="blank" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>Alkesrr/cetak_alkesproduk/<?php echo $tr['iddetilalkesrr']; ?>" title="lihat Detail"><i class="fa fa-eye"></i></a> 
           <a style="margin-bottom:3px;" target="blank"  class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>Alkesrr/lihatongkir/<?php echo $tr['kode_produk']; ?>/<?php echo $tr['koper']; ?>" title="Lihat Ongkir"><i class="fa fa-eye"></i></a>
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
                    <button onclick="return confirm('Yakin Approve Sebagian ?... ');" type='submit' class='btn btn-success btn-plat btn-block btn-md' id='Simpann'>
                      <i class='fa fa-floppy-o'></i> Approve Sebagian
                    </button>
                   </div>
                </div>

  </form>                           
              



