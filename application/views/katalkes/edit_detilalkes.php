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
                  <form role="form" form name="form2"  action="<?php echo base_url(); ?>Alkestransaksi/updateabksd" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                  <input type="hidden" class="form-control" value="<?php echo $iddetailalkes;?>" name="iddetailalkes">
                  <input type="hidden" class="form-control" value="<?php echo $kode_alkes;?>" name="kode_alkes"><input type="hidden" class="form-control" value="<?php echo $kode_trans;?>" name="kode_trans">
                  <input type="hidden" class="form-control" value="<?php echo $koper;?>" name="koper">
				           
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
                 <div class="form-group">
                      <label for="">Merk</label>
                       <input type="text" class="form-control" value="" name="merk" id=""  autocomplete="off" readonly/>
                    </div>
               <div class="form-group">
                      <label for="">Type</label>
                       <input type="text" class="form-control" value="" name="type" id=""  autocomplete="off" readonly />
                    </div>
                  <div class="form-group">
                      <label for="">Rekanan</label>
                       <input type="text" class="form-control" value="" name="nm_perusahaan" id=""  autocomplete="off" readonly/>
                    </div>

 <div class="form-group">
                      <label for="">HARGA</label>
                       <input type="text" class="form-control" value="<?php echo $harga;?>" name="harga" id="" placeholder="harga" onFocus="startCalc2();" onBlur="stopCalc2();"  required/>                 
                    </div> 
              <div class="form-group">
                      <label for="">DISCOUNT</label>
                       <input type="text" class="form-control" value="<?php echo $discount;?>" name="discount" id="" placeholder="discount" onFocus="startCalc2();" onBlur="stopCalc2();"  required/>                 
                    </div> 
                 <div class="form-group">
                      <label for="">PPN(%)</label>
                       <input type="text" class="form-control" value="<?php echo $ppn;?>" name="ppn" id="" placeholder="PPN(%)" onFocus="startCalc2();" onBlur="stopCalc2();"  required/>                 
                    </div> 
                   <div class="form-group">
                      <label for="">HARGA AKHIR</label>
                       <input type="text" class="form-control" value="0" name="harga_akhir" id="" placeholder="harga" required autocomplete="off" onFocus="startCalc2();" onBlur="stopCalc2();" readonly/>                 
                    </div>
                    <div class="form-group">
                      <label for="">E-KAT</label><br>
                    <input type="checkbox" value="1" name="e_kat"<?php echo $c1=$e_kat; if($c1=='1') echo " checked "?> ><br>
                      <label for="">NON E-KAT</label><br>
                    <input type="checkbox" value="1" name="non_e_kat"<?php echo $c1=$non_e_kat; if($c1=='1') echo " checked "?> ></div>
                         <div class="form-group">
                      <label for="">Register</label><br>
                    <input type="checkbox" value="1" name="register" <?php echo $c1=$register; if($c1=='1') echo " checked "?>><br>
                      <label for="">NON Register</label><br>
                    <input type="checkbox" value="1" name="non_register" <?php echo $c1=$non_register; if($c1=='1') echo " checked "?>></div> 

                      <label for="">Cashback</label>
                       <input type="text" class="form-control" value="<?php echo $cashback;?>" name="cashback" id="" placeholder="cashback" required/>
                       <div class="form-group">
                      <label for="">Biaya Free</label><br>
                    <input type="checkbox" value="1" name="biayafree" <?php echo $c1=$biayafree; if($c1=='1') echo " checked "?>><br>
                      <label for="">Biaya NON Free</label><br>
                    <input type="checkbox" value="1" name="biayanonfree" <?php echo $c1=$biayanonfree; if($c1=='1') echo " checked "?>></div>
                      <div class="form-group">
                      <label for="">Nominal Biaya</label>
                       <input type="text" class="form-control" value="<?php echo $nominalbiaya;?>" name="nominalbiaya" id="" placeholder="Nominal Biaya" required/>
                    </div>
 
                       </div> 

               <div class="col-lg-6">
                  <div class="form-group">
                      <label for="">GARANSI</label><br>
                       <label>Full WARANTY</label><input type="text" class="form-control" value="<?php echo $garansi;?>" name="garansi" placeholder="FULL WARANTY" /><br>
                      <label>Free WARANTY</label><input type="text" class="form-control" value="<?php echo $garansifree;?>" name="garansifree" placeholder="Free WARANTY" /><br>
                        <div class="col-lg-3">
                       <label>Tahun ke 1</label><input type="text" class="form-control" value="<?php echo $tahunke1;?>" name="tahunke1" placeholder="Tahun ke 1" readonly  />  
                        <label>Tahun ke 2</label><input type="text" class="form-control" value="<?php echo $tahunke2;?>" name="tahunke2" placeholder="Tahun ke 2" readonly />
                         <label>Tahun ke 3</label><input type="text" class="form-control" value="<?php echo $tahunke3;?>" name="tahunke3" placeholder="Tahun ke 3" readonly />  
                        <label>Tahun ke 4</label><input type="text" class="form-control" value="<?php echo $tahunke4;?>" name="tahunke4" placeholder="Tahun ke 4" readonly />
                         <label>Tahun ke 5</label><input type="text" class="form-control" value="<?php echo $tahunke5;?>" name="tahunke5" placeholder="Tahun ke 5" readonly />               
                    </div> 
                     <div class="col-lg-4">
                       <label>Persentase ke 1</label><input type="text" class="form-control" value="<?php echo $persentase1;?>" name="persentase1" placeholder="Persentase1"/>  
                        <label>Persentase ke 2</label><input type="text" class="form-control" value="<?php echo $persentase2;?>" name="persentase2" placeholder="Persentase2"/>  
                          <label>Persentase ke 3</label><input type="text" class="form-control" value="<?php echo $persentase3;?>" name="persentase3" placeholder="Persentase3"/>  
                        <label>Persentase ke 4</label><input type="text" class="form-control" value="<?php echo $persentase4;?>" name="persentase4" placeholder="Persentase4"/> 
                        <label>Persentase ke 5</label><input type="text" class="form-control" value="<?php echo $persentase5;?>" name="persentase5" placeholder="Persentase5"/><br>            
                   </div>
                  </div></div>
                     <div class="form-group">
                      <label for="">Keterangan</label><br>
                        <textarea name="ket" rows="4" cols="50"><?php echo $ket;?></textarea><br><br>
                      <label for="">Catatan</label><br>
                       <textarea name="note" rows="4" cols="50"><?php echo $note;?></textarea></div>
                   </div></div>           
                     <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>Alkestransaksi/adddetail/<?php echo $kode_alkes; ?>" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div>
                </div><!-- /.item -->

                 <!-- /.col -->
 
               
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
                

      </section><!-- /.content -->
	  
	  
	
	  
	
