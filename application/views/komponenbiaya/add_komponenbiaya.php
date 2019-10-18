
      <section class="content-header">
        <h1>
          <b>TAMBAH DATA KOMPONEN BIAYA</b>
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
                <h3 class="box-title">FORM TAMBAH KOMPONEN BIAYA</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>komponenbiaya/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                   
				   <!--<div class="form-group">
					<label for="">No Urut Komponen Biaya</label>
					<input type="text" class="form-control" value="" id="" name="nourut_layout" placeholder="No Urut" required>
					</div>-->	

                    <div class="form-group">
                      <label for="">Kode </label>
                        <input type="text" class="form-control" value="" id="" name="kodebiaya" placeholder="kodebiaya" required>                        
                    </div>
					
					<div class="form-group">
                      <label for="">Nama Komponen Biaya</label>
                        <input type="text" class="form-control" value="" id="" name="komponenbiaya" placeholder="Nama Komponen Biaya" required>                        
                    </div>
               </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>komponenbiaya" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
         

      </section><!-- /.content -->
 </div>