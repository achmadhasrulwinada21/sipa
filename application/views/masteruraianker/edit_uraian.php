
      <section class="content-header">
        <h1>
          <b>EDIT DATA JENIS PEKERJAAN</b>
        </h1>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
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
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>masteruraianker/updatemasteruraian" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                   
                   <div class="form-group">
                      <label for="">ID perusahaan</label>
                        <input readonly type="char" class="form-control" value="<?php echo $id_urker; ?>" id="" name="id_urker" placeholder="Isikan Kode Perusahaan" readonly>
                    </div>

                <!--    <div class="form-group">
                      <label for="">Kode perusahaan</label>
                        <input type="char" class="form-control" value="<?php echo $kodep; ?>" id="" name="kodep" placeholder="Isikan Kode Perusahaan" required>
                    </div>-->

                    <div class="form-group">
                      <label for="">Uraian kerja</label>
                        <input type="text" class="form-control" value="<?php echo $uraian_kerja; ?>" id="" name="uraian_kerja" placeholder="isi jenis pekerjaan" required>                        
                    </div>
                  <!--  <div class="form-group">
                      <label for="">Tanggal</label>
                        <input type="date" class="form-control" value="<?php echo $cdate; ?>" id="" name="cdate" placeholder="Tanggal" required>                        
                    </div>-->
                  </div>
                  </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>masteruraianker" class="btn btn-warning btn-block btn-flat">Kembali</a>
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
      <strong>Team Hermina Kemayoran &copy; 2018 <a href="#"></a></strong>
    </footer>
  </div><!-- ./wrapper -->
  