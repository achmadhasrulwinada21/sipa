        <section class="content-header">
            <h1>
                Tambah Data Master Perusahaan
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-suitcase"></i>Setting</a></li>
                <li class="active">Menu STPD</li>
            </ol>
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
                <h3 class="box-title">FORM TAMBAH PERUSAHAAN</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>masterperusahaan/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="">Kode perusahaan</label>
                        <input type="text" class="form-control" value="<?php echo $koper; ?>" id="" name="kodep" placeholder="Isikan " required readonly>
                    </div>
                    <div class="form-group">
                      <label for="">Nama Perusahaan</label>
                        <input type="text" class="form-control" value="" id="" name="nm_perusahaan" placeholder="Isikan Nama Perusahaan" required>                        
                    </div>
					 <div class="form-group">
                      <label for="">Tipe Perusahaan</label>
                        <input type="text" class="form-control" value="" id="" name="nm_perusahaan" placeholder="Isikan Nama Perusahaan" required>                        
                    </div>


                   <!-- <div class="form-group">
                      <label for="">Tanggal</label>
                        <input type="datepicker1" class="form-control" value="" id="datepicker1" name="createdate" placeholder="Isikan Tanggal" required>                        
                    </div>
                  </div>-->
                   
                </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>masterperusahaan" class="btn btn-warning btn-block btn-flat">Kembali</a>
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
    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <!-- <b>Version</b> 2.0 -->
      </div>
      <strong>TEAM HERMINA KEMAYORAN &copy; 2018 <a href="#"></a></strong>
    </footer>
  </div><!-- ./wrapper -->
  <!-- page script -->
