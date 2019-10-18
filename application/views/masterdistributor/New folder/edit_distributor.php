  <section class="content-header">
    <h1>
        Edit Master Distributor
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
                <h3 class="box-title">FORM EDIT DISTRIBUTOR</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                 <div class="item">
                   <form role="form" action="<?php echo base_url(); ?>masterdistributor/update_distributor" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                   
                   <div hidden class="form-group">
                      <label for="">ID Distributor</label>
                        <input readonly type="char" class="form-control" value="<?php echo $id_distributor; ?>" id="" name="id_distributor" placeholder="Isikan Kode Perusahaan" readonly>
                    </div>

                    <div class="form-group">
                      <label for="">Kode Distributor</label>
                        <input type="char" class="form-control" value="<?php echo $kodis; ?>" id="" name="kodis" placeholder="Isikan Kode Perusahaan" readonly>
                    </div>

                    <div class="form-group">
                      <label for="">Nama Distributor</label>
                        <input type="text" class="form-control" value="<?php echo $nm_distributor; ?>" id="" name="nm_distributor" placeholder="Nama Perusahaan" required>                        
                    </div>

					
		<div class="form-group">
                      <label type="text" for="">Tipe Distributor</label>
                        <select id="id_tipe_produk_modal" name="id_tipe_produk_m" class="form-control">
                          <option>--Pilih Tipe Produk--</option>
                            <?php foreach($dd_tipe as $datakd) {
								if(!in_array($datakd['id_tipe_produk'],$dd_tipe_post)){ ?>
									<option value="<?php echo $datakd['id_tipe_produk'] ?>"><?php echo $datakd['tipe_produk'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datakd['id_tipe_produk'] ?>"><?php echo $datakd['tipe_produk'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>
			   
			   
				
	<input type="hidden" class="form-control" value="<?php echo $tipe_produk; ?>" id="" name="tipe_produk_modal" required readonl
					

                  </div>
                  </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>masterdistributor" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->

   
