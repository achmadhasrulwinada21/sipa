
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
                  <form role="form" action="<?php echo base_url(); ?>Masterjenis/updatemasterjenis" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                   
                   <div class="form-group">
                      <label for="">ID perusahaan</label>
                        <input readonly type="char" class="form-control" value="<?php echo $id_jenpek; ?>" id="" name="id_jenpek" placeholder="Isikan Kode Perusahaan" readonly>
                    </div>

                <!--    <div class="form-group">
                      <label for="">Kode perusahaan</label>
                        <input type="char" class="form-control" value="<?php echo $kodep; ?>" id="" name="kodep" placeholder="Isikan Kode Perusahaan" required>
                    </div>-->

                    <div class="form-group">
                      <label for="">Jenis Pekerjaan</label>
                        <input type="text" class="form-control" value="<?php echo $jenis_pekerjaan; ?>" id="" name="jenis_pekerjaan" placeholder="isi jenis pekerjaan" required>                        
                    </div>
                  <!--  <div class="form-group">
                      <label for="">Tanggal</label>
                        <input type="date" class="form-control" value="<?php echo $cdate; ?>" id="" name="cdate" placeholder="Tanggal" required>                        
                    </div>-->
                  </div>
                  </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>Masterjenis" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
         
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
