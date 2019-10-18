<section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>PRODUK</b>
        </h4>
        
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
                  <form role="form" form name="form1"  action="<?php echo base_url(); ?>produko2/updateabksdalum" method="POST" enctype="multipart/form-data">
                     <div class="col-lg-12">                  
                  <input type="hidden" class="form-control" value="<?php echo $iddetilalum;?>" name="iddetilalum">
                  <input type="hidden" class="form-control" value="<?php echo $kode_tr;?>" name="kode_tr">   
                  <input type="hidden" class="form-control" value="<?php echo $koper;?>" name="koper">
					<input type="hidden" class="form-control" value="<?php echo $kode_th;?>" name="kode_th">
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
                      <label for="">REGIONAL</label><br>
                       <select id="" name="kode_regional" class="chosen">
                          <option value="">pilih regional</option>
                            <?php foreach($reg as $data) {
                          if(!in_array($data['kode_regional'],$for_regs)){ ?>
                              <option  value="<?php echo $data['kode_regional'] ?>"><?php echo $data['nm_regional'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['kode_regional'] ?>"><?php echo $data['kode_regional'] ?> : <?php echo  $data['nm_regional'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>
					
					<div class="form-group">
                      <label for="">GARANSI(Per Tahun)</label>
                       <input type="text" class="form-control" value="<?php echo $garansi; ?>" name="garansi" id="" placeholder="garansi"/>                 
                    </div>  
					
					<div class="form-group">
                      <label for="">GARANSI</label><br>
                             <label>Full WARANTY</label><input type="text" class="form-control" value="<?php echo $garansifull; ?>" name="garansifull" placeholder="FULL WARANTY" /><br>
                      <label>Free WARANTY</label><input type="text" class="form-control" value="<?php echo $garansifree; ?>" name="garansifree" placeholder="Free WARANTY" /><br>
                        <div class="col-lg-3">
                       <label>Tahun ke 1</label><input type="text" class="form-control" value="1" name="tahunke1" placeholder="Tahun ke 1" readonly />  
                        <label>Tahun ke 2</label><input type="text" class="form-control" value="2" name="tahunke2" placeholder="Tahun ke 2" readonly />
                         <label>Tahun ke 3</label><input type="text" class="form-control" value="3" name="tahunke3" placeholder="Tahun ke 3" readonly />  
                        <label>Tahun ke 4</label><input type="text" class="form-control" value="4" name="tahunke4" placeholder="Tahun ke 4" readonly />
                         <label>Tahun ke 5</label><input type="text" class="form-control" value="5" name="tahunke5" placeholder="Tahun ke 5" readonly />               
                    </div> 
                     <div class="col-lg-4">
                       <label>Persentase ke 1</label><input type="text" class="form-control" value="<?php echo $persentase1; ?>" name="persentase1" placeholder="Persentase1"/>  
                        <label>Persentase ke 2</label><input type="text" class="form-control" value="<?php echo $persentase2; ?>" name="persentase2" placeholder="Persentase2"/>  
                          <label>Persentase ke 3</label><input type="text" class="form-control" value="<?php echo $persentase3; ?>" name="persentase3" placeholder="Persentase3"/>  
                        <label>Persentase ke 4</label><input type="text" class="form-control" value="<?php echo $persentase4; ?>" name="persentase4" placeholder="Persentase4"/> 
                        <label>Persentase ke 5</label><input type="text" class="form-control" value="<?php echo $persentase5; ?>" name="persentase5" placeholder="Persentase5"/>            
                    </div> </div></div>
					
					
					<div  class="col-lg-6">
              
					<div class="form-group">
                      <label for="">HARGA LAMA</label>
                       <input type="text" class="form-control"  value="<?php echo $harga_lama; ?>" name="harga_lama" id="" placeholder="harga lama" />                 
                    </div> 
				  			  
                    <div class="form-group">
                      <label for="">HARGA BARU</label><b style="color:red;">&nbsp*harus diisi</b>
                       <input type="text" class="form-control" onFocus="startCalc();" onBlur="stopCalc();"  value="<?php echo $harga_baru; ?>" name="harga_baru" id="" placeholder="harga" required/>                 
                    </div> 
          
                        <div hidden class="form-group">
                      <label for="">HARGA EXC PPN</label><b style="color:red;">&nbsp*harus diisi</b>
                       <input type="text" class="form-control" value="<?php echo $harga_excppn; ?>" onFocus="startCalc();" onBlur="stopCalc();"  name="harga_excppn" id="" placeholder="HARGA EXC PPN" required/>                 
                    </div> 
                    <div class="form-group">
                      <label for="">HARGA INC PPN</label><b style="color:red;">&nbsp*harus diisi</b>
                       <input type="text" class="form-control" onFocus="startCalc();" onBlur="stopCalc();"  value="<?php echo $harga_incppn; ?>" name="harga_incppn" id="" placeholder="HARGA INC PPN" readonly/>                 
                    </div> 

                   <div class="form-group">
                      <label for="">JUMLAH FEE</label><b style="color:red;">&nbsp*harus diisi</b><br>
                       <select id="" name="prensentase" class="chosen">
                          <option value="">pilih fee</option>
                            <?php foreach($per as $data) {
                          if(!in_array($data['prensentase'],$for_pers)){ ?>
                              <option  value="<?php echo $data['prensentase'] ?>"><?php echo $data['prensentase'] ?> %</option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['prensentase'] ?>"><?php echo  $data['prensentase'] ?> %</option>
                          <?php }} ?>
                        </select> 
                    </div>
                  
	<div class="form-group">
                      <label for="">Keterangan</label>
					   <textarea rows="4" cols="54" class="form-control"  name="ket" placeholder="Keterangan"><?php echo $ket; ?></textarea>              
                    </div>
                     
					 <div class="form-group">
                      <label for="">Catatan</label>
					   <textarea rows="4" cols="54" class="form-control"  name="note" placeholder="Catatan"><?php echo $note; ?></textarea>
                    </div> 

                     <div class="form-group">
                      <label for="">Contact Person</label>
					  <textarea rows="4" cols="54" class="form-control"  name="contact" placeholder="Contact Person"><?php echo $contact; ?></textarea>
                    </div>


					</div>					
                                       
                    </div></div>
                     <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>produko2/adddetail_alumc/<?php echo $kode_tr; ?>/<?php echo $koper; ?>" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div>
                </div><!-- /.item -->

                 <!-- /.col -->
 
               
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
                

      </section><!-- /.content -->
	  
	  
	
	  
	
