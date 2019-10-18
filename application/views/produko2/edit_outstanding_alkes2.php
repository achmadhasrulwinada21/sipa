 <section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>DETAIL PRODUK ALKES</b><br><br>
       
        </h4>
        
        </section>
 
       </section>
            <script>
            function startCalc(){
            interval = setInterval("calc()",1);}
            function calc(){
            dara = document.form1.harga_baru.value;
            document.form1.harga_excppn.value = (dara);
            document.form1.harga_incppn.value = ((dara*10)/100);
               }
            function stopCalc(){
            clearInterval(interval);}
          </script>
				<?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode =='76' or $kode =='75' ):?>
        
        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
           <div class="box">
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">TAMBAH DATA</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" form name="form2"  action="<?php echo base_url(); ?>produko2/updateoutstanding_alkes" method="POST" enctype="multipart/form-data" id="multiple_select_form">
                    <table class="table-common">
                     
                      
                 <div class="panel panel-primary"></div>
             
                    
          <input type="hidden" class="form-control" value="<?php echo $iddetailalkes;?>" name="iddetilalum">
                  <input type="hidden" class="form-control" value="<?php echo $kode_alkes;?>" name="kode_alkes">   
                   <input type="hidden" class="form-control" value="<?php echo $tanggal_tr;?>" name="tanggal_tr"> 

                   <input type="hidden" class="form-control" value="<?php echo $statushead;?>" name="statushead">
                  <input type="hidden" class="form-control" value="<?php echo $catatanheadrevisi;?>" name="catatanheadrevisi">   
                   <input type="hidden" class="form-control" value="<?php echo $statusdetil;?>" name="statusdetil">
                   <input type="hidden" class="form-control" value="<?php echo $cttndetilrevisi;?>" name="cttndetilrevisi"> 

             <div class="form-group">
                  <input type="hidden" name="id_tipe_produk" class="form-control" value="<?php echo $id_tipe_produk; ?>">
                 </div>
					<input type="hidden" class="form-control" value="<?php echo $kode_trans;?>" name="kode_th">
                     <div class="col-lg-6">
                     <div class="form-group">
                      <label for="">NAMA PRODUK (ALUM)</label><b style="color:red;">&nbsp*harus diisi</b><br>
                       <select id="kode_produk" name="kode_produk" class="form control">
                          <option value="">pilih produk(alum)</option>
                            <?php foreach($prins as $data) {
                          if(!in_array($data['kode_produk'],$for_prins)){ ?>
                              <option  value="<?php echo $data['kode_produk'] ?>"><?php echo $data['nama_produk'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['kode_produk'] ?>"><?php echo $data['kode_produk'] ?> : <?php echo  $data['nama_produk'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>
                  <div class="form-group">
                      <label for="">Merk</label>
                       <input type="text" class="form-control" value="<?php echo $merk;?>" name="merk" id=""  autocomplete="off" readonly/>
                    </div>
               <div class="form-group">
                      <label for="">Type</label>
                       <input type="text" class="form-control" value="<?php echo $type;?>" name="type" id=""  autocomplete="off" readonly />
                    </div>
                  <div class="form-group">
                      <label for="">Rekanan</label>
                       <input type="text" class="form-control" value="<?php echo $nm_perusahaan;?>" name="nm_perusahaan" id=""  autocomplete="off" readonly/>
                    </div>

                  <div class="form-group">
                      <label for="">HARGA</label><b style="color:red;">&nbsp*harus diisi</b>
                       <input type="text" class="form-control" value="<?php echo $harga;?>" name="harga" id="" placeholder="harga" required autocomplete="off" onFocus="startCalc2();" onBlur="stopCalc2();"  />                 
                    </div>
                     <div class="form-group">
                      <label for="">DISCOUNT(%)</label>
                       <input type="text" class="form-control" value="<?php echo $discount;?>" name="discount" id="" placeholder="discount" autocomplete="off" onFocus="startCalc2();" onBlur="stopCalc2();" />                 
                    </div>
                         
                      <div class="form-group">
                      <label for="">PPN(%)</label><b style="color:red;">&nbsp*harus diisi</b>
                       <input type="text" class="form-control" value="<?php echo $ppn;?>" name="ppn" id="" placeholder="PPN(%)" autocomplete="off" required onFocus="startCalc2();" onBlur="stopCalc2();"/>                 
                    </div>
                   
                   <div class="form-group">
                      <label for="">HARGA AKHIR</label>
                       <input type="text" class="form-control" value="<?php echo $harga_akhir;?>" name="harga_akhir" id="" placeholder="harga" required autocomplete="off" onFocus="startCalc2();" onBlur="stopCalc2();" readonly/>                 
                    </div>
                 <div id="daraanisa">   
                    <div class="form-group"><b style="color:red;">&nbsp*harus diisi</b><br>
                      <label for="">E-KAT</label><br>
                    <input type="checkbox" value="1" name="e_kat" <?php echo $c1=$e_kat; if($c1=='v') echo " checked "?>required><br>
                      <label for="">NON E-KAT</label><br>

                    <input type="checkbox" value="1" name="non_e_kat" <?php echo $c1=$non_e_kat; if($c1=='v') echo " checked "?> required></div>
                     </div>
                    <div id="alkes">
                   <div class="form-group"><b style="color:red;">&nbsp*harus diisi</b><br>
                      <label for="">Register</label><br>
                    <input type="checkbox" value="1" name="register" <?php echo $c1=$register; if($c1=='v') echo " checked "?> required><br>
                      <label for="">NON Register</label><br>
                   
                    <input type="checkbox" value="1" name="non_register" <?php echo $c1=$non_register; if($c1=='v') echo " checked "?>required>
</div> </div>
                      <label for="">Cashback(%)</label>
                       <input type="text" class="form-control" value="<?php echo $nominal_cashback;?>" name="cashback" id="" placeholder="cashback"/><br>
                    <div id="daraanisa21"><br>
                    <div class="form-group"><b style="color:red;">&nbsp*harus diisi</b><br>
                      <label for="">BIAYA FREE</label><br>
                    <input type="checkbox" value="1" name="biayafree" <?php echo $c1=$biayafree; if($c1=='v') echo " checked "?>required><br>
                      <label for="">BIAYA NON FREE</label><br>
                    <input type="checkbox" value="1" name="biayanonfree" <?php echo $c1=$biayanonfree; if($c1=='v') echo " checked "?>required></div>
                <label>BIAYA</label><input type="text" class="form-control" value="<?php echo $nominalbiaya;?>" name="nominalbiaya"  placeholder="BIAYA" /><br></div> 
       
                 </div> 
                                    
                   
                    
               <div class="col-lg-6">
                   <div class="form-group">
                      <label for="">GARANSI</label><br>
                             <label>Full WARANTY</label><input type="text" class="form-control" value="<?php echo $garansi;?>" name="garansi" placeholder="FULL WARANTY" /><br>
                      <label>Free WARANTY</label><input type="text" class="form-control" value="<?php echo $garansifree;?>" name="garansifree" placeholder="Free WARANTY" /><br>
                        <div class="col-lg-3">
                       <label>Tahun ke 1</label><input type="text" class="form-control" value="<?php echo $tahunke1; ?>" name="tahunke1" placeholder="Tahun ke 1" readonly />  
                        <label>Tahun ke 2</label><input type="text" class="form-control" value="<?php echo $tahunke2;?>" name="tahunke2" placeholder="Tahun ke 2" readonly />
                         <label>Tahun ke 3</label><input type="text" class="form-control" value="<?php echo $tahunke3;?>" name="tahunke3" placeholder="Tahun ke 3" readonly />  
                        <label>Tahun ke 4</label><input type="text" class="form-control" value="<?php echo $tahunke4;?>" name="tahunke4" placeholder="Tahun ke 4" readonly />
                         <label>Tahun ke 5</label><input type="text" class="form-control" value="<?php echo $tahunke5;?>" name="tahunke5" placeholder="Tahun ke 5" readonly />               
                    </div> 
                     <div class="col-lg-3">
                       <label>Persentase ke 1</label><input type="text" class="form-control" value="<?php echo $persentase1;?>" name="persentase1" placeholder="Persentase1"/>  
                        <label>Persentase ke 2</label><input type="text" class="form-control" value="<?php echo $persentase2;?>" name="persentase2" placeholder="Persentase2"/>  
                          <label>Persentase ke 3</label><input type="text" class="form-control" value="<?php echo $persentase3;?>" name="persentase3" placeholder="Persentase3"/>  
                        <label>Persentase ke 4</label><input type="text" class="form-control" value="<?php echo $persentase4;?>" name="persentase4" placeholder="Persentase4"/> 
                        <label>Persentase ke 5</label><input type="text" class="form-control" value="<?php echo $persentase5;?>" name="persentase5" placeholder="Persentase5"/>            
                    </div> </div></div><br>
                     <label for="">Keterangan</label><br>
                       <textarea rows="4" cols="50" name="ket" value="<?php echo $ket;?>"></textarea><br>
                       <label for="">Catatan</label><br>
                       <textarea rows="4" cols="50" name="note" value="<?php echo $note;?>"></textarea><br>
 		       <label for="">Contact Person</label><br>
                       <textarea rows="4" cols="50" name="contact" value="<?php echo $contact;?>"></textarea><br>





         </div>                
                  </table>
                </div>
                <div style="text-align:center;" class="form-actions">
<button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                             <a href="<?php echo base_url(); ?>produko2/lihattralkeshistori" class="btn btn-warning btn-block btn-flat">Kembali</a>
        </div>
               
               </form>
                            
</section>
<?php endif;?>

				

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
