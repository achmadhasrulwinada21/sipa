<section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>LISTING PRODUK ALAT KESEHATAN</b>
        </h4>
        
        </section>

        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box">
              <div class="box-header">
                <i class="fa fa-pencil"></i>
                <h3 class="box-title">EDIT DETAIL</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                  <div class="panel panel-primary"></div>
                <div class="item">
                  <form role="form" form name="form2"  action="<?php echo base_url(); ?>Alkesrr/updatedetilalkes" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                  <input type="hidden" class="form-control" value="<?php echo $iddetilalkesrr;?>" name="iddetilalkesrr">
                  <input type="hidden" class="form-control" value="<?php echo $kode_transaksi;?>" name="kode_transaksi">
                  <input type="hidden" class="form-control" value="<?php echo $koper;?>" name="koper">
                   <input type="hidden" class="form-control" value="<?php echo $jenis_listing;?>" name="jenis_listing">
               <div class="form-group">
                      <label for="">NAMA PRODUK (ALKES)</label><br>
                       <select id="kode_produk" name="kode_produk" class="form-control">
                          <option value="-">pilih alkes</option>
                            <?php foreach($prins as $data) {
                          if(!in_array($data['kode_produk'],$for_prins)){ ?>
                              <option  value="<?php echo $data['kode_produk'] ?>"><?php echo $data['kode_produk'] ?> :<?php echo $data['nama_produk'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['kode_produk'] ?>"><?php echo $data['kode_produk'] ?> : <?php echo  $data['nama_produk'] ?></option>
                          <?php }} ?>
                        </select> </div>
                <!--  <div class="form-group">
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
                    </div> -->

 <div class="form-group">
                      <label for="">HARGA</label>
                       <input type="text" class="form-control" value="<?php echo $harga_baru;?>" name="harga" id="" placeholder="harga" onFocus="startCalc2();" onBlur="stopCalc2();"  required/>                 
                    </div> 
              <div class="form-group">
                      <label for="">DISCOUNT</label>
                       <input type="text" class="form-control" value="<?php echo $diskon_baru;?>" name="discount" id="" placeholder="discount" onFocus="startCalc2();" onBlur="stopCalc2();"  required/>                 
                    </div> 
                     <input type="checkbox" value="1" id="ppncheck" name="ppncheck"<?php echo $c1=$ppn_baru; if($c1=='10') echo " checked "?> onclick="myfungsi23();">PPN<br>
                 <div class="form-group" style="display:none;" id="divuul">
                       <label for="">PPN(%)</label>
                       <input type="text" class="form-control" value="10" name="ppn" id="" placeholder="PPN(%)" onFocus="startCalc2();" onBlur="stopCalc2();"  required readonly/>                 
                    </div> <br>
                        <div class="panel panel-default">
                           <div class="panel-heading">
                                <b>CARA BAYAR</b>
                           </div>
              <div class="panel-body">
                 <div class="form-group">
                       <label for="">DP</label>
                       <input type="text" class="form-control" value="<?php echo $dp ?>" name="dp" id="" required/>   
                        <label for="">Cicilan</label>
                       <input type="text" class="form-control" value="<?php echo $cicilan ?>" name="cicilan" id="" required/>                  
                    </div> 
                  </div></div>
                  <!--  <div class="form-group">
                      <label for="">HARGA AKHIR</label>
                       <input type="text" class="form-control" value="0" name="harga_akhir" id="" placeholder="harga" required autocomplete="off" onFocus="startCalc2();" onBlur="stopCalc2();" readonly/>                 
                    </div> -->
                    <div class="form-group">
                     <label for="">JENIS E Katalog</label><br>
                    <input type="radio" value="1" name="stse_kat"<?php echo $c1=$stse_kat; if($c1=='1') echo " checked "?> >E Katalog<br>
                     <input type="radio" value="0" name="stse_kat"<?php echo $c1=$stse_kat; if($c1=='0') echo " checked "?> >Non E Katalog</div>
                         <div class="form-group">
                        <label for="">JENIS Register</label><br>
                    <input type="radio" value="1" name="stsregister" <?php echo $c1=$stsregister; if($c1=='1') echo " checked "?>>Register<br>
                      <input type="radio" value="0" name="stsregister" <?php echo $c1=$stsregister; if($c1=='0') echo " checked "?>>Non Register</div>
                       <div class="form-group">
                        <label for="">Biaya Ongkir</label><br>
                    <input type="radio" value="1" name="includeongkir" <?php echo $c1=$includeongkir; if($c1=='1') echo " checked "?>>Include Ongkir<br>
                      <input type="radio" value="0" name="includeongkir" <?php echo $c1=$includeongkir; if($c1=='0') echo " checked "?>>Exclude Ongkir</div>     
                      <label for="">Keterangan</label><br>
                        <textarea name="ket" rows="4" cols="50"><?php echo $ket;?></textarea><br><br>
                      <label for="">Catatan</label><br>
                       <textarea name="note" rows="4" cols="50"><?php echo $note;?></textarea>                   
                       </div> 
              

               <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Attachment</label>
                      <input type="hidden" name="foto" value="<?php echo $foto; ?>">
                        <input type="file" class="form-control" value="<?php echo $foto; ?>" id="" name="file_uploadttd" placeholder="">
                        <div style="color:blue;font-weight:bold;"><?php echo $foto; ?></div>
                       <!--  <embed src="<?php echo base_url(); ?>assets/upload/<?php echo $foto; ?>" style="width:150px;height:150px;"/> -->    
                    </div>
                  <div class="form-group">
                      <label for="">GARANSI</label><br>
                       <label>Full GARANSI</label><input type="text" class="form-control" value="<?php echo $garansi;?>" name="garansi" placeholder="FULL WARANTY" readonly /><br>
                        <input type="checkbox" name="" value="1" id="garansicheck" onclick="myfungsigaransi();"><b>&nbspFree Garansi</b><br><br> 
                         <div id="divgaransi" style="display:none">
                      <label>Free GARANSI</label><input type="text" class="form-control" value="<?php echo $garansifree;?>" name="garansifree" placeholder="Free WARANTY" id="garansifree" onkeyup="garansifreeuul();"/><br>
                        <div class="col-lg-3">
                       <label>Tahun ke 1</label><input type="text" class="form-control" value="<?php echo $tahunke1;?>" name="tahunke1" placeholder="Tahun ke 1" readonly  />  
                        <label>Tahun ke 2</label><input type="text" class="form-control" value="<?php echo $tahunke2;?>" name="tahunke2" placeholder="Tahun ke 2" readonly />
                         <label>Tahun ke 3</label><input type="text" class="form-control" value="<?php echo $tahunke3;?>" name="tahunke3" placeholder="Tahun ke 3" readonly />  
                        <label>Tahun ke 4</label><input type="text" class="form-control" value="<?php echo $tahunke4;?>" name="tahunke4" placeholder="Tahun ke 4" readonly />
                         <label>Tahun ke 5</label><input type="text" class="form-control" value="<?php echo $tahunke5;?>" name="tahunke5" placeholder="Tahun ke 5" readonly />      
                     
                    </div> 
                     <div class="col-lg-4">
                       <label>Persentase ke 1</label><input type="text" class="form-control" value="<?php echo $persentase1;?>" name="persentase1" placeholder="Persentase1" id="mobileno1" readonly/>  
                        <label>Persentase ke 2</label><input type="text" class="form-control" value="<?php echo $persentase2;?>" name="persentase2" placeholder="Persentase2" id="mobileno2" readonly/>  
                          <label>Persentase ke 3</label><input type="text" class="form-control" value="<?php echo $persentase3;?>" name="persentase3" placeholder="Persentase3" id="mobileno3" readonly/>  
                        <label>Persentase ke 4</label><input type="text" class="form-control" value="<?php echo $persentase4;?>" name="persentase4" placeholder="Persentase4" id="mobileno4" readonly/> 
                        <label>Persentase ke 5</label><input type="text" class="form-control" value="<?php echo $persentase5;?>" name="persentase5" placeholder="Persentase5" id="mobileno5" readonly/></div><br>
  
                   </div> 
                  </div> </div>
                    
                   </div></div>         
                     <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>Alkesrr/adddetail/<?php echo $kode_transaksi; ?>/<?php echo $jenis_listing; ?>/<?php echo $koper; ?>" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div>
                </div><!-- /.item -->

                 <!-- /.col -->
 
               
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
                

      </section><!-- /.content -->
    
    
  
    
  
