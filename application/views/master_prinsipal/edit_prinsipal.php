  <section class="content-header">
    <h1>
        Edit Tipe Rekanan
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
                <h3 class="box-title">FORM EDIT </h3>
              </div>
              <div class="box-body chat" id="chat-box">
                 <div class="item">
                   <form role="form" action="<?php echo base_url(); ?>cmastertiprek/update_mastertiprek" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                   
                   <div hidden class="form-group">
                      <label for="">ID </label>
                        <input  type="hidden" class="form-control" value="<?php echo $id_tipe_rekanan; ?>" id="" name="id_venlis" placeholder="Isikan Kode Perusahaan" readonly>
                    </div>

                    <div class="form-group">
                      <label for="">No Tipe Rekanan</label>
                        <input readonly type="text" class="form-control" value="<?php echo $no_tipe_rekanan; ?>" id="" name="kode_vendlis" placeholder="Isikan Kode Perusahaan" required>
                    </div>

                    <div class="form-group">
                      <label for="">Nama Tipe Rekanan</label>
                        <input type="text" class="form-control" value="<?php echo $nm_tipe_rekanan; ?>" id="" name="nm_vendor" placeholder="Nama Vendor" required>                        
                    </div>
                     
                  </div>
                  </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>cmastertiprek" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->

   