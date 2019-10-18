<section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>PRODUK</b>
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
                  <form role="form" action="<?php echo base_url(); ?>Obattr/updateabksd" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                  <input type="hidden" class="form-control" value="<?php echo $iddetailprod2;?>" name="iddetailprod2">
                  <input type="hidden" class="form-control" value="<?php echo $koded_prod;?>" name="koded_prod"><input type="hidden" class="form-control" value="<?php echo $kode_th;?>" name="kode_th">
                  <input type="hidden" class="form-control" value="<?php echo $koper;?>" name="koper">
				           
               <div class="form-group">
                      <label for="">NAMA PRODUK (OBAT)</label><br>
                       <select id="idobat" name="idobat" class="form-control">
                          <option value="-">pilih obat</option>
                            <?php foreach($prins as $data) {
                          if(!in_array($data['idobat'],$for_prins)){ ?>
                              <option  value="<?php echo $data['idobat'] ?>"><?php echo $data['nama_obat'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['idobat'] ?>"><?php echo  $data['nama_obat'] ?></option>
                          <?php }} ?>
                        </select> </div>
                        <div class="form-group" hidden>
                       <label for="">kode obat</label>
             <input type="text" class="form-control" value="<?php echo $kode_obat; ?>" name="kode_obat" id="" placeholder=""/>
                    </div>  
                        <div class="form-group">
                       <label for="">Distributor</label><br>
                           <select id="" name="kodis" class="chosen form-control">
                          <option value="-">pilih distributor</option>
                            <?php foreach($dist as $data) {
                          if(!in_array($data['kodis'],$for_dists)){ ?>
                              <option  value="<?php echo $data['kodis'] ?>"><?php echo $data['nm_distributor'] ?></option>
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['kodis'] ?>"><?php echo  $data['nm_distributor'] ?></option>
                          <?php }} ?>
                        </select>
                    </div>  
	           </div>
<div class="col-lg-6">
                    <div class="form-group">
                      <label for="">TIPE HARGA</label><br>
                        <select id="" name="tipe_harga" class="chosen" required>
                          <option value="" required>pilih tipe harga</option>
                            <?php foreach($hargas as $data) {
                          if(!in_array($data['tipe_harga'],$for_harga)){ ?>
                              <option  value="<?php echo $data['idtipeharga'] ?>"><?php echo $data['tipe_harga'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['idtipeharga'] ?>"><?php echo  $data['tipe_harga'] ?></option>
                          <?php }} ?>
                        </select> 
                          </div>   

                    <div class="form-group">
                      <label for="">HARGA</label>
                       <input type="text" class="form-control" value="<?php echo $harga; ?>" name="harga" id="" placeholder="harga" required/>                 
                    </div> 

                    <div class="form-group">
                      <label for="">DISKON</label>
                       <input type="text" class="form-control" value="<?php echo $discount; ?>" name="discount" id="" placeholder="DISKON" required/>                 
                    </div> 

                    <div class="form-group">
                      <label for="">NOTE</label>
                       <input type="text" class="form-control" value="<?php echo $catatan; ?>" name="catatan" id="" placeholder="NOTE"/>                 
                    </div> 
          
                                       
                    </div></div>
                     <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>Obattr/adddetail/<?php echo $koded_prod; ?>/<?php echo $koper; ?>" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div>
                </div><!-- /.item -->

                 <!-- /.col -->
 
               
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
                

      </section><!-- /.content -->
	  
	  
	
	  
	
