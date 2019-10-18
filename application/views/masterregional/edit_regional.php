  <section class="content-header">
    <h1>
        Edit Master Regional
        <small></small>
    </h1>
    
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
                <i class="fa fa-plus"></i>
                <h3 class="box-title">FORM EDIT REGIONAL</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                 <div class="item">
                   <form role="form" action="<?php echo base_url(); ?>masterregional/update_regional" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                   
                   <div hidden class="form-group">
                      <label for="">ID Regional</label>
                        <input readonly type="char" class="form-control" value="<?php echo $id_regional; ?>" id="" name="id_regional" placeholder="Isikan Kode regional" readonly>
                    </div>

                    <div class="form-group">
                      <label for="">Kode Regional</label>
                        <input type="char" class="form-control" value="<?php echo $kode_regional; ?>" id="" name="kode_regional" placeholder="Isikan Kode regional" required>
                    </div>

                    <div class="form-group">
                      <label for="">Nama Regional</label>
                        <input type="text" class="form-control" value="<?php echo $nm_regional; ?>" id="" name="nm_regional" placeholder="Nama regional" required>                        
                    </div>
              
					<!--<div class="form-group" >
							  <label for="">Tipe regional</label>
								<select id="id_tipe_produk_modal" name="id_tipe_produk_modal" class="form-control" required>
								 <option value="-">--Pilih Tipe regional--</option>
								 <?php foreach($dd_tipe as $row) { ?>
									  <option value="<?php echo $row['id_tipe_produk'] ?>"><?php echo $row['tipe_produk'] ?></option>
								<?php } ?>
						</select>    
					</div>-->
			   
			   <!--
			        <div class="form-group">
                      <label type="text" for="">Tipe Regional</label>
                        <select id="id_tipe_produk_modal" name="id_tipe_produk_m" class="form-control">
                          <option>--Pilih Tipe--</option>
                            <?php foreach($dd_tipe as $datakd) {
								if(!in_array($datakd['id_tipe_produk'],$dd_tipe_post)){ ?>
									<option value="<?php echo $datakd['id_tipe_produk'] ?>"><?php echo $datakd['tipe_produk'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datakd['id_tipe_produk'] ?>"><?php echo $datakd['tipe_produk'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div> -->
			   
			   
				
				<input type="hidden" class="form-control" value="" id="" name="tipe_produk_modal" required readonly>
                  </div>
                  </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>masterregional" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->

   
