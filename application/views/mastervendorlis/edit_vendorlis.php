  <section class="content-header">
    <h1>
        Edit Master VENDOR
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
                <h3 class="box-title">FORM EDIT VENDOR</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                 <div class="item">
                   <form role="form" action="<?php echo base_url(); ?>mastervendorlis/update" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                   
                   <div hidden class="form-group">
                      <label for="">ID </label>
                        <input  type="hidden" class="form-control" value="<?php echo $id_venlis; ?>" id="" name="id_venlis" placeholder="Isikan Kode Perusahaan" readonly>
                    </div>

                    <div class="form-group">
                      <label for="">Kode Vendor</label>
                        <input readonly type="text" class="form-control" value="<?php echo $kode_vendlis; ?>" id="" name="kode_vendlis" placeholder="Isikan Kode Perusahaan" required>
                    </div>

                    <div class="form-group">
                      <label for="">Nama Vendor</label>
                        <input type="text" class="form-control" value="<?php echo $nm_vendor; ?>" id="" name="nm_vendor" placeholder="Nama Vendor" required>                        
                    </div>
                     <div class="form-group">
                      <label for="">Alamat</label>
                        <input type="text" class="form-control" value="<?php echo $alamat; ?>" id="" name="alamat" placeholder="Alamat Vendor" required>                        
                    </div>
					 <div class="form-group">
                      <label for="">No Telp</label>
                        <input type="text" class="form-control" value="<?php echo $no_telp; ?>" id="" name="no_telp" placeholder="No Telp Vendor" required>                        
                    </div>
                  </div>
                  </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>mastervendorlis" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->

   