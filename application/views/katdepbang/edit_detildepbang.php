<section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>PRODUK DEPBANG</b>
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
                  <form role="form" action="<?php echo base_url(); ?>Depbangtransaksi/updateabksd" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                  <input type="hidden" class="form-control" value="<?php echo $id_detail_depbang;?>" name="id_detail_depbang">
                  <input type="hidden" class="form-control" value="<?php echo $idpr2;?>" name="idpr2"><input type="hidden" class="form-control" value="<?php echo $kode_trans;?>" name="kode_trans">
                  <input type="hidden" class="form-control" value="<?php echo $koper;?>" name="koper">
				           
               <div class="form-group">
                      <label for="">NAMA PRODUK (DEPBANG)</label><br>
                       <select id="kode_produk" name="kode_produk" class="form-control">
                          <option value="-">pilih obat</option>
                            <?php foreach($prins as $data) {
                          if(!in_array($data['kode_produk'],$for_prins)){ ?>
                              <option  value="<?php echo $data['kode_produk'] ?>"><?php echo $data['nama_produk'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['kode_produk'] ?>"><?php echo $data['kode_produk'] ?> : <?php echo  $data['nama_produk'] ?></option>
                          <?php }} ?>
                        </select> </div>
 <div class="form-group">
                      <label for="">HARGA Saat Ini</label>
                       <input type="text" class="form-control" value="<?php echo $harga_saat_ini;?>" name="harga_saat_ini" id="" placeholder="HARGA Saat Ini" required/>                 
                    </div> 
                    <div class="form-group">
                    <label for="">harga jual</label>
                       <input type="text" class="form-control" value="<?php echo $harga_jual;?>" name="harga_jual" id="" placeholder="harga jual" required/> 

                       <div class="form-group">
                        <label for="">harga penawaran</label>
                       <input type="text" class="form-control" value="<?php echo $harga_penawaran;?>" name="harga_penawaran" id="" placeholder="harga penawaran" required/>   
                 </div>          
                 <div class="form-group">
                        <label for="">Jumlah Fee</label>
                       <input type="text" class="form-control" value="<?php echo $jumlah_fee;?>" name="jumlah_fee" id="" placeholder="Jumlah Fee" required/>   
                 </div>                      
                  </div>
                   </div></div>           
                     <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>Depbangtransaksi/adddetail/<?php echo $idpr2; ?>" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div>
                </div><!-- /.item -->

                 <!-- /.col -->
 
               
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
                

      </section><!-- /.content -->
	  
	  
	
	  
	
