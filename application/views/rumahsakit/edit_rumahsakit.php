
      <section class="content-header">
        <h1>
          <b>EDIT DATA RUMAH SAKIT</b>
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
                <h3 class="box-title">FORM EDIT RUMAH SAKIT</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>rumahsakit/updaterumahsakit" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">Kode Rumah Sakit</label>
                        <input type="char" class="form-control" value="<?php echo $koders; ?>" id="" name="koders" placeholder="Isikan Kode Rumah Sakit" required>
                    </div>

                    <div class="form-group">
                      <label for="">Nama Rumah Sakit</label>
                        <input type="text" class="form-control" value="<?php echo $namars; ?>" id="" name="namars" placeholder="Nama Rumah Sakit" required>                        
                    </div>
                    <div class="form-group">
                      <label for="">Email Rumah Sakit</label>
                        <input type="text" class="form-control" value="<?php echo $email; ?>" id="" name="email" placeholder="Email Rumah Sakit" required>                        
                    </div>
                  </div>
                  </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>rumahsakit" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
