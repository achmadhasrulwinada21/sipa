
      <section class="content-header">
        <h1>
          <b>TAMBAH DATA KODE</b>
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
                <h3 class="box-title">FORM TAMBAH DATA KODE</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>kode/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">Jabatan</label>
                        <input type="text" class="form-control" value="" name="jabatan" placeholder="Jabatan" required>
                    </div>

                    <div class="form-group">
                      <label for="">Kode TTD</label>
                        <input type="text" class="form-control" value="" name="kodettd" placeholder="Kode TTD" required>                        
                    </div>
<!--                       <div class="form-group">
                      <label for="">Create Date</label>
                        <input type="text" class="form-control" value="" id="datepicker1" name="createdate" placeholder="createdate" required>                        
                    </div> -->
                    
                </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>kode" class="btn btn-warning btn-block btn-flat">Kembali</a>
               </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
