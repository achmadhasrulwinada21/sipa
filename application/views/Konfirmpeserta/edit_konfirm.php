
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <b>EDIT DATA KONFIRM PESERTA</b>
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
                <h3 class="box-title">FORM EDIT KONFIRM PESERTA</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>Konfirmpeserta/Updatekonfirmpeserta" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                      <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $idkonfirmpeserta; ?>" id="" name="idkonfirmpeserta">
                    </div>
                    <div class="form-group">
                      <label for="">KEPADA Yth</label>
                        <input type="text" class="form-control" value="<?php echo $pemohon; ?>" id="" name="pemohon" placeholder="Isikan Pemohon" required readonly>
                    </div>
                    <div class="form-group">
                      <label for="">TANGGAL MEMO</label>
                        <input type="date" class="form-control" value="<?php echo $tgl_memo; ?>" id="" name="tgl_memo" >                        
                    </div>
                    <div class="form-group">
                      <label for="">ACARA</label>
                        <input type="text" class="form-control" value="<?php echo $perihal_acara; ?>" id="" name="perihal_acara" placeholder="Acara" required>
                    </div>



                    <div class="form-group">
                      <label for="">JUMLAH PESERTA</label>
                        <input type="text" class="form-control" value="<?php echo $jumlah_peserta; ?>" id="" name="jumlah_peserta" placeholder="jumlah peserta" required>
                    </div>
                    <div class="form-group">
                      <label for="">PANITIA</label>
                         <input type="text" class="form-control" value="<?php echo $panitia; ?>" id="" name="panitia" placeholder="Panitia" required>
                          </div>

                          <!-- <div class="form-group">
                      <label for="">DEPARTEMEN</label>
                        <input type="text" class="form-control" value="<?php echo $departemen; ?>" id="" name="departemen" placeholder="Isikan Departemen" required>                        
                    </div> -->



                  </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>Konfirmpeserta" class="btn btn-warning btn-block btn-flat">Kembali</a>
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
      <strong>Copyright &copy; 2018 <a href="#"></a></strong>
    </footer>
  </div><!-- ./wrapper -->
  <!-- page script -->  
 