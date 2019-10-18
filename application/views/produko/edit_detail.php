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
                  <form role="form" action="<?php echo base_url(); ?>produko/updateabksd" method="POST" enctype="multipart/form-data">
                     <div class="col-lg-6">                  
                  <input type="hidden" class="form-control" value="<?php echo $iddetailprod;?>" name="iddetailprod">
                  <input type="hidden" class="form-control" value="<?php echo $koded_prod;?>" name="koded_prod">   
                  <input type="hidden" class="form-control" value="<?php echo $pabrikid;?>" name="pabrikid">
				          <input type="hidden" class="form-control" value="<?php echo $tanggal;?>" name="tanggal">
                     
                     <div class="form-group">
                      <label for="">NAMA PRODUK (OBAT)</label><br>
                       <select id="obatid" name="obatid" class="chosen">
                          <option value="-">pilih obat</option>
                            <?php foreach($prins as $data) {
                          if(!in_array($data['obatid'],$for_prins)){ ?>
                              <option  value="<?php echo $data['obatid'] ?>"><?php echo $data['obatnama'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['obatid'] ?>"><?php echo $data['obatid'] ?> : <?php echo  $data['obatnama'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>
               <input type="hidden" class="form-control" value="<?php echo $produko; ?>" name="produko" id="" placeholder="nama produk"/>   
                       <div class="form-group">
          <label for="">KOMPOSISI</label>
           <input type="text" class="form-control" value="<?php echo $komposisi; ?>" name="komposisi" id="" placeholder="komposisi"/>
             </div>				
	<div class="form-group">
          <label for="">Distributor</label>
					 <input type="text" class="form-control" value="<?php echo $s_kode; ?>" name="s_kode" id="" placeholder="nama produk"/>
	           </div>

                   </div>
<div class="col-lg-6">
                    <div class="form-group">
                      <label for="">TIPE HARGA</label><br>
                        <select id="" name="tipe_harga" class="chosen">
                          <option value="-">pilih tipe harga</option>
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
                       
                                       
                    </div></div>
                     <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>produko/adddetail/<?php echo $koded_prod; ?>/<?php echo $pabrikid; ?>" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div>
                </div><!-- /.item -->

                 <!-- /.col -->
 
               
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
                

      </section><!-- /.content -->
	  
	  
	
	  
	
