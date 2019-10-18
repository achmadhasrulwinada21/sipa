
       <section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>TAMBAH DATA BANK</b>
        </h4>
        
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
                <h3 class="box-title">TAMBAH DATA BANK</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>Bank/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">Kode Bank</label>
                        <input type="text" class="form-control" value="" id="" name="kode_bank" placeholder="Isi Kode Bank" required>
                    </div>

                    <div class="form-group">
                      <label for="">Nama Bank</label>
                        <input type="text" class="form-control" value="" id="" name="nama_bank" placeholder="Isi Nama Bank" required>                        
                    </div>
                 
                  
                </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>Bank" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

          </section><!-- right col -->
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
    <!-- ./wrapper -->
  <!-- page script -->