  <section class="content-header">
    <h1>
        Edit Master presentase
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
                <h3 class="box-title">FORM EDIT presentase</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                 <div class="item">
                   <form role="form" action="<?php echo base_url(); ?>masterpresentase/update_presentase" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                   
                   <div hidden class="form-group">
                      <label for="">ID presentase</label>
                        <input readonly type="char" class="form-control" value="<?php echo $id_presentase; ?>" id="" name="id_presentase" placeholder="Isikan Kode presentase" readonly>
                    </div>

                    <div class="form-group">
                      <label for="">Kode presentase</label>
                        <input type="char" class="form-control" value="<?php echo $kode_presentase; ?>" id="" name="kode_presentase" placeholder="Isikan Kode presentase" required>
                    </div>

                    <div class="form-group">
                      <label for="">Nilai presentase</label>
                        <input type="text" class="form-control" value="<?php echo $prensentase; ?>" id="" name="prensentase" placeholder="Isikan presentase" required>                        
                    </div>
              
					<!--<div class="form-group" >
							  <label for="">Tipe presentase</label>
								<select id="id_tipe_produk_modal" name="id_tipe_produk_modal" class="form-control" required>
								 <option value="-">--Pilih Tipe presentase--</option>
								 <?php foreach($dd_tipe as $row) { ?>
									  <option value="<?php echo $row['id_tipe_produk'] ?>"><?php echo $row['tipe_produk'] ?></option>
								<?php } ?>
						</select>    
					</div>-->
			   
			   <!--
			        <div class="form-group">
                      <label type="text" for="">Tipe presentase</label>
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
                  <a href="<?php echo base_url(); ?>masterpresentase" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->

   
