<section class="content-header">
    <h1>
        Data Evaluasi Paket Rekanan Listrik
        <small></small>
    </h1>
    <ol class="breadcrumb">
       
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
                <h3 class="box-title">FORM EDIT EVALUASI PEKERJAAN REKANAN LISTRIK</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>EvaluasiPekRekLis/updateevaluasi" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                       <div class="form-group">
                        <input readonly type="hidden" class="form-control" value="<?php echo $id_eva; ?>" id="" name="id_eva" placeholder="Isikan Kode Perusahaan" readonly>
                    </div>

                      <div class="form-group">
                      <label for="">kode rumah sakit</label>
                        <input readonly type="text" class="form-control" value="<?php echo $koders ;?>" id="" name="koders" placeholder="" readonly>                       
                      </div>

                 
                    <!--<div class="form-group">
                      <label for="">TANGGAL</label>
                        <input type="date" class="form-control" value="<?php echo $tanggal; ?>" id="" name="tanggal" placeholder="Tanggal" required>
                    </div>-->
                    <div class="form-group">
                      <label for="">JENIS PEKERJAAN</label>
                        <input readonly type="text" class="form-control" value="<?php echo $jenis_pek; ?>" id="" name="jenis_pek" placeholder="jenis_pek" required>
                    </div>
                  <!--  <div class="form-group">
                      <label for="">UNTUK</label>
                        <input type="text" class="form-control" value="<?php echo $untuk; ?>" id="" name="untuk" placeholder="Untuk" required>
                    </div>-->
                    <div class="form-group">
                      <label for="">KETERANGAN</label>
                    <textarea rows="4" cols="50" value="<?php echo $keterangan;?>" class="form-control" name="keterangan"><?php echo $keterangan;?> </textarea>


                  <div class="form-group">
                      <label for="">PENANGGUNG JAWAB</label>
                        <input readonly type="text" class="form-control" value="<?php echo $pen_jwb ;?>" id="" name="pen_jwb" placeholder="" readonly>                       
                    </div>
                 <!--   <div class="form-group">
                      <label for="">APPROVAL</label>
                      <br/>
                        <input type="checkbox"   name="approval" <?php echo $c1=$approval; if($c1=='t') echo " Checked "?>
                       >Ya,Sudah Dilihat Dan Dibaca</input>
                        </div>-->
                    </div>
                  </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>EvaluasiPekRekLis" class="btn btn-warning btn-block btn-flat">Kembali</a>
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
  <!-- page script -->  
