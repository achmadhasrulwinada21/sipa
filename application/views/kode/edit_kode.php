
      <section class="content-header">
        <h1>
          <b>EDIT DATA KODE</b>
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
                <h3 class="box-title">EDIT DATA KODE</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>kode/updatekode" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">

                    <div class="form-group">

                      <label for=""></label>
                        <input type="text" class="form-control" value="<?php echo $idkode;?>" id="" name="idkode" placeholder="" readonly="" >
                    </div>

                    <div class="form-group">

                      <label for="">Jabatan</label>
                        <input type="text" class="form-control" value="<?php echo $jabatan; ?>" id="" name="jabatan" placeholder="Jabatan" required>
                    </div>

                    <div class="form-group">
                      <label for="">Kode TTD</label>
                        <input type="text" class="form-control" value="<?php echo $kodettd; ?>" id="" name="kodettd" placeholder="Kodettd" required>                        
                    </div>
<!--                       <div class="form-group">
                      <label for="">Create Date</label>
                        <input type="text" class="form-control" value="<?php echo $createdate; ?>" id="" name="createdate" placeholder="createdate" required>                        
                    </div>
 -->
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
  </section>  