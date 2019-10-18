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
                  <form role="form" action="<?php echo base_url(); ?>obat_reg/updateabksd" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                  <input type="hidden" class="form-control" value="<?php echo $iddetailprod2;?>" name="iddetailprod2">
                  <input type="hidden" class="form-control" value="<?php echo $koded_prod;?>" name="koded_prod"><input type="hidden" class="form-control" value="<?php echo $kode_trans;?>" name="kode_trans">
                  <input type="hidden" class="form-control" value="<?php echo $koper;?>" name="koper">
				  <input type="hidden" class="form-control" value="<?php echo $flag;?>" name="flagobat">
				           
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

					<div class="form-group">
                      <label for="">GOLONGAN</label>
                       <input type="text" class="form-control" value="<?php echo $golonganid; ?>" name="golonganid" readonly>                 
                    </div> 

                    <div class="form-group">
                      <label for="">KOMPOSISI</label>
                       <input type="text" class="form-control" value="<?php echo $komposisi; ?>" name="komposisi" readonly>                 
                    </div> 

                    <div class="form-group">
                      <label for="">HARGA SATUAN</label>
                       <input type="text" class="form-control" value="<?php echo $harga_baru; ?>" name="harga" id="" placeholder="HARGA SATUAN" required/ >                 
                    </div> 
					
	           </div>
			<div class="col-lg-6">
                   

                    <div class="form-group">
                      <label for="">DISKON</label>
                       <input type="text" class="form-control" value="<?php echo $discount_baru; ?>" name="discount" id="" placeholder="DISKON" required/>                 
                    </div> 

                    <div class="form-group">
                      <label for="">CATATAN</label>
                       <input type="text" class="form-control" value="<?php echo $catatan; ?>" name="catatan" id="" placeholder="NOTE"/>                 
                    </div> 
          
                                       
                    </div></div>
                     <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>obat_reg/adddetailnew/<?php echo $koded_prod; ?>/<?php echo $koper; ?>/<?php echo $flag; ?>" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div>
                </div><!-- /.item -->

                 <!-- /.col -->
 
               
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
                

      </section><!-- /.content -->
	  
	  
	
	  
	
