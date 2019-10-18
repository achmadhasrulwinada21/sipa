 <section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>DETAIL PRODUK ALKES</b><br><br>
          <b><?php echo $prod->nm_perusahaan ?></b>
        </h4>
        
        </section>
 
        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
           <div class="box">
            <div class='box-header with-border'> 
        <a style="margin-bottom:3px" href="<?php echo base_url(); ?>Excel_importrralkes/alkes/<?php echo $prod->kode_transaksi ?>" class="btn btn-warning no-radius dropdown-toggle">
        <i class="glyphicon glyphicon-download-alt"></i> IMPORT DATA FROM EXCEL </a>

      <!--   <a style="margin-bottom:3px" href="<?php echo base_url('C_mstsatuan/v_export_excel') ?>" class="btn btn-danger no-radius dropdown-toggle">
        <i class="glyphicon glyphicon-upload"></i> EXPORT DATA TO EXCEL </a> -->
      </div>

              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">TAMBAH DATA</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" form name="form2"  action="<?php echo base_url(); ?>Alkesrr/savedetil" method="POST" enctype="multipart/form-data" id="multiple_select_form">
                    <table class="table-common">
                         
                      
                 <div class="panel panel-primary"></div>
              <div class="col-lg-6">
                    
                     <input type="hidden" class="form-control" value="<?php echo $prod->kode_transaksi ?>" id="" name="kode_transaksi">                              
                    <input type="hidden" class="form-control" value="<?php echo $prod->koper ?>" id="" name="koper"> 
                <input type="hidden" class="form-control" value="<?php echo $prod->jenis_listing ?>" id="" name="jenis_listing">                  
              <div class="form-group">
                      <label for="">NAMA PRODUK (ALKES)</label><b style="color:red;">&nbsp*harus diisi</b><br>
                        <select id="kode_produk_v2" name="kode_produk" class="form-control" required>
                          <option value="" required>pilih Alkes</option>
                          <?php foreach($alkes as $row) { ?>
                              <option value="<?php echo $row['kode_produk'] ?>" required><?php echo $row['kode_produk'] ?> : <?php echo $row['nama_produk'] ?></option>
                          <?php } ?>
                        </select> <br>   
                   </div>
                  <div class="form-group">
                      <label for="">Merk</label>
                       <input type="text" class="form-control" value="" name="merk" id=""  autocomplete="off" readonly/>
                    </div>
               <div class="form-group">
                      <label for="">Type</label>
                       <input type="text" class="form-control" value="" name="type" id=""  autocomplete="off" readonly />
                    </div>
                <div class="form-group">
                      <label for="">Jenis barang</label>
                       <input type="text" class="form-control" value="" name="jns_barang" id=""  autocomplete="off" readonly/>
                    </div>

                  <div class="form-group">
                      <label for="">HARGA</label><b style="color:red;">&nbsp*harus diisi</b>
                       <input type="text" class="form-control" value="" name="harga" id="" placeholder="harga" required autocomplete="off" onkeyup="startCalc2();" onBlur="stopCalc2();"  />                 
                    </div>
                     <div class="form-group">
                      <label for="">DISKON(%)</label>
                       <input type="text" class="form-control" value="0" name="discount" id="" placeholder="discount" autocomplete="off" onkeyup="startCalc2();" onBlur="stopCalc2();" />                 
                    </div>

                    <input type="checkbox" name="ppncheck" value="1" id="ppncheck" onclick="myfungsi23();"><b>&nbspPPN</b><br><br>                    
                      <div class="form-group" style="display:none;" id="divuul"> 
                      <label for="">PPN(%)</label>
                       <input type="text" class="form-control" value="10" name="ppn" id="" placeholder="PPN(%)" autocomplete="off" readonly onkeyup="startCalc2();" onBlur="stopCalc2();"/></div>
                   
                   <div class="form-group">
                      <label for="">HARGA AKHIR</label>
                       <input type="text" class="form-control" value="0" name="harga_akhir" id="" placeholder="harga" required autocomplete="off" onkeyup="startCalc2();" onBlur="stopCalc2();" readonly/>                 
                    </div>
                  
              <div class="form-group">
                <label for="">JENIS E Katalog</label><br>
                <input type="radio" id="stse_kat" name="stse_kat" value="1" checked="checked">E Katalog<br>
                <input type="radio" id="stse_kat" name="stse_kat" value="0">Non E Katalog<br>
                   </div>
               <div class="form-group">
                <label for="">JENIS Register</label><br>
                <input type="radio" id="stsregister" name="stsregister" value="1" checked="checked">Register<br>
                <input type="radio" id="stsregister" name="stsregister" value="0">Non Register<br>
                   </div>
               <div class="form-group">
                <label for="">Biaya Ongkir</label><br>
                <input type="radio" id="stsregister" name="includeongkir" value="1" checked="checked">Include Ongkir<br>
                <input type="radio" id="stsregister" name="includeongkir" value="0">Exclude Ongkir<br>
                   </div>
                   <div class="form-group">
                      <label for="">Fee(%)</label>
                       <input type="text" class="form-control" value="5" name="fee" id="" placeholder="fee" readonly/></div>
                        <?php
          $ynwa=$prod->jenis_pembayaran;
          if($ynwa=='1'){
            $ynwa='CASH';
          }else{
            $ynwa='SPONSORSHIP';
          } ?>
                   <div class="form-group">
                      <label for="">Fee Management</label>
                       <input type="text" class="form-control" value="<?php echo $ynwa ?>" name="" id="" placeholder="fee" readonly/>
                       <input type="hidden" class="form-control" value="<?php echo $prod->jenis_pembayaran ?>" name="jenis_pembayaran" id="" placeholder="fee" readonly/></div>
                  
                  <div class="panel panel-default">
                           <div class="panel-heading">
                                <b>CARA BAYAR</b>
                           </div>                    
                      <div class="panel-body">
                 <div class="form-group">
                       <label for="">DP</label>
                       <input type="text" class="form-control" value="0" name="dp" id="" required/>   
                        <label for="">Cicilan</label>
                       <input type="text" class="form-control" value="0" name="cicilan" id="" required/>                  
                    </div> 
                  </div>
                           </div>                     
                   </div> 
                    
               <div class="col-lg-6">
                   <div class="form-group">
                      <label for="">Upload Berkas</label>
                        <input type="file" class="form-control" value="" id=""  name="file_uploadttd" placeholder="">                        
                      </div>              
                   <div class="form-group">
                      <label for="">GARANSI</label><br>
                             <label>Full Garansi(per tahun)</label><input type="text" class="form-control" value="5" name="garansi" placeholder="FULL WARANTY" readonly /><br>
                  <input type="checkbox" name="" value="1" id="garansicheck" onclick="myfungsigaransi();"><b>&nbspFree Garansi</b><br><br> 
                   <div id="divgaransi" style="display:none">
                      <label>Free Garansi(per tahun)</label><input type="text" class="form-control" value="5" name="garansifree" placeholder="Free WARANTY" id="garansifree" onkeyup="garansifreeuul();" />
                        <br>
                        <div class="col-lg-3">
                       <label>Tahun ke 1</label><input type="text" class="form-control" value="1" name="tahunke1" placeholder="Tahun ke 1" readonly />  
                        <label>Tahun ke 2</label><input type="text" class="form-control" value="2" name="tahunke2" placeholder="Tahun ke 2" readonly />
                         <label>Tahun ke 3</label><input type="text" class="form-control" value="3" name="tahunke3" placeholder="Tahun ke 3" readonly />  
                        <label>Tahun ke 4</label><input type="text" class="form-control" value="4" name="tahunke4" placeholder="Tahun ke 4" readonly />
                         <label>Tahun ke 5</label><input type="text" class="form-control" value="5" name="tahunke5" placeholder="Tahun ke 5" readonly />               
                    </div> 
                     <div class="col-lg-3">
                       <label>Persentase ke 1</label><input type="text" class="form-control" value="0" name="persentase1" placeholder="Persentase1" id="mobileno1" readonly onkeyup="return Numbertitik()"/>  
                        <label>Persentase ke 2</label><input type="text" class="form-control" value="0" name="persentase2" placeholder="Persentase2" id="mobileno2" readonly onkeyup="return Numbertitik()"/>  
                          <label>Persentase ke 3</label><input type="text" class="form-control" value="0" name="persentase3" placeholder="Persentase3" id="mobileno3" readonly onkeyup="return Numbertitik()"/>  
                        <label>Persentase ke 4</label><input type="text" class="form-control" value="0" name="persentase4" placeholder="Persentase4" id="mobileno4" readonly onkeyup="return Numbertitik()"/> 
                        <label>Persentase ke 5</label><input type="text" class="form-control" value="0" name="persentase5" placeholder="Persentase5" id="mobileno5" readonly onkeyup="return Numbertitik()"/> </div>           
                    </div> </div></div><br>
                     <label for="">Keterangan</label><br>
                       <textarea rows="4" cols="50" name="ket"></textarea><br>
                       <label for="">Catatan</label><br>
                       <textarea rows="4" cols="50" name="note"></textarea><br>           
         </div>        

                  </table>
                </div>
                <div style="text-align:center;" class="form-actions">
            <button  type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo base_url(); ?>Alkesrr" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
               
               </form>
                            
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
                      <th colspan="2" style="vertical-align: middle;text-align: center;">Cara Bayar</th>
                     <th rowspan="4" style="vertical-align: middle;text-align: center;">Aksi</th>
                  </tr>
                  <tr class="danger" style="font-weight:bold;font-size:10px;">
                     <th colspan="13" style="vertical-align: middle;text-align: center;">Kontrak Servis</th>
                     <th rowspan="3" style="vertical-align: middle;text-align: center;">DP</th>
                      <th rowspan="3" style="vertical-align: middle;text-align: center;">Cicilan</th>
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
           <td style="vertical-align: middle;text-align: center;"><?php echo number_format($tr['dp']); ?></td>
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['cicilan']; ?></td>
                    <td style="vertical-align: middle;text-align: center;">
            <a style="margin-bottom:3px;" class="btn btn-info btn-sm" title="download berkas" href="<?php echo base_url(); ?>assets/upload/<?php echo $tr['foto']; ?>" download="<?php echo $tr['foto']; ?>"><i class="glyphicon glyphicon-download"></i></a>
           <a style="margin-bottom:3px;" target="blank" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>Alkesrr/cetak_alkesproduk/<?php echo $tr['iddetilalkesrr']; ?>" title="lihat Detail"><i class="fa fa-eye"></i></a> 
          <!--  <a style="margin-bottom:3px;" target="blank"  class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>Alkesrr/simpan_hargaongkir/<?php echo $tr['kode_produk']; ?>/<?php echo $tr['koper']; ?>" title="Tambah Ongkir"><i class="fa fa-plus"></i></a> -->
           <a style="margin-bottom:3px;"  class="btn btn-info btn-sm" href="<?php echo base_url(); ?>Alkesrr/editdetilalkesrr/<?php echo $tr['iddetilalkesrr']; ?>/<?php echo $tr['koper']; ?>" title="Update Detail"><i class="fa fa-edit"></i></a>  
           <a  style="margin-bottom:3px;" onclick="return confirm('Hapus data beserta detail??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>Alkesrr/hapusdetil/<?php echo $tr['iddetilalkesrr']; ?>/<?php echo $tr['kode_produk']; ?>/<?php echo $tr['kode_transaksi']; ?>/<?php echo $tr['koper']; ?>/<?php echo $tr['jenis_listing']; ?>" title="Hapus"><i class="glyphicon glyphicon-trash"></i></a> 
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

