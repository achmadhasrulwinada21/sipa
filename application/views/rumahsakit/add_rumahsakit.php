
      <section class="content-header">
        <h1>
          <b>TAMBAH DATA RUMAH SAKIT</b>
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
                <h3 class="box-title">FORM TAMBAH RUMAH SAKIT</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>rumahsakit/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="">Kode Rumah Sakit</label>
                        <input type="text" class="form-control" value="" id="" name="koders" placeholder="Isikan koders" required>
                    </div>
                    <div class="form-group">
                      <label for="">Nama Rumah Sakit</label>
                        <input type="text" class="form-control" value="" id="" name="namars" placeholder="Isikan Nama Rumah Sakit" required>                        
                    </div> 
                      <div class="form-group">
                      <label for="">Email Rumah Sakit</label>
                        <input type="text" class="form-control" value="" id="" name="email" placeholder="Isikan Email Rumah Sakit" required>                        
                    </div>                      
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

          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
          </section><!-- right col -->

          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
          </section><!-- right col -->
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
 