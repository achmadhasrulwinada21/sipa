
      <section class="content-header">
        <h1>
          <b>TAMBAH DATA DEPARTEMEN</b>
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
                <h3 class="box-title">FORM TAMBAH DEPARTEMEN</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>departemen/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                   
				   <!--<div class="form-group">
					<label for="">No Urut Komponen Biaya</label>
					<input type="text" class="form-control" value="" id="" name="nourut_layout" placeholder="No Urut" required>
					</div>-->	

                    <div class="form-group">
                      <label for="">Kode </label>
                        <input type="text" class="form-control" value="" id="" name="kode_depar" placeholder="Kode Departemen" required>                        
                    </div>
					
					           <div class="form-group">
                      <label for="">Nama Departemen</label>
                        <input type="text" class="form-control" value="" id="" name="nama_depar" placeholder="Nama Departemen" required>                        
                    </div>
                     <div class="form-group">
                      <label for="">Email Departemen</label>
                        <input type="text" class="form-control" value="" id="" name="email" placeholder="Email Departemen" required>                        
                    </div>
               </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>departemen" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          

      </section><!-- /.content -->
</div>