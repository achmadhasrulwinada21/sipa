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
                <h3 class="box-title">FORM TAMBAH EVALUASI PEKERJAAN</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>EvaluasiPekRekLis/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">
                   <div class="form-group">
                      <label for="">Nama Rumah Sakit</label>
                        <select name="koders" class="form-control" required>
                          <option>--Pilih Nama RS--</option>
                          <?php foreach($optRumahSakit as $row) { ?>
                              <option value="<?php echo $row['koders'] ?>"><?php echo $row['namars'] ?></option>
                          <?php } ?>
                        </select>    
                  </div>

                 <!--   <div class="form-group">
                      <label for="">Dari</label>
                        <input type="text" class="form-control" value="" id="" name="dari" placeholder="Isikan data dari" required>                     
                    </div>

                    <div class="form-group">
                      <label for="">Tanggal</label>
                        <input type="datepicker1" class="form-control" value="" id="datepicker1" name="tanggal" placeholder="Isikan Tanggal" required>
                    </div>-->

                    <!-- <div class="form-group">
                      <label for="">Jenis Pekerjaan</label>
                        <input type="text" class="form-control" value="" id="jenis_pek" name="jenis_pek" placeholder="Isikan jenis Pekerjaan" required>
                    </div>
 -->
                       <div class="form-group">
                      <label for="">Jenis Pekerjaan</label>
                        <select name="jenis_pek" class="form-control" required>
                          <option>--Pilih Pekerjaan--</option>
                          <?php foreach($optjenispekerjaan as $row) { ?>
                              <option value="<?php echo $row['jenis_pekerjaan'] ?>"><?php echo $row['jenis_pekerjaan'] ?></option>
                          <?php } ?>
                        </select>    
                    </div>
                <!--     <div class="form-group">
                      <label for="">Untuk</label>
                        <input type="text" class="form-control" value="" id="Perihal" name="untuk" placeholder="Isikan Untuk" required>
                    </div> -->
                       
                    <div class="form-group">
                      <label for="">Keterangan</label>
                        <input type="text" class="form-control" value="" id="keterangan" name="keterangan" placeholder="Isikan Keterangan" required>
                    </div>

                     <div class="form-group">
                      <label for="">Penanggung jawab</label>
                        <input type="text" class="form-control" value="" id="pen_jwb" name="pen_jwb" placeholder="Isikan Keterangan" required>
                    </div>
                   <!-- <div class="form-group">
                      <label for="">Approve</label>
                      <br/>
                      <input type="checkbox"   name="approve" value="1" text="Sudah Dilihat" >Ya,Sudah Dilihat Dan Dibaca</input> 
                    </div>
                  </div>-->
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
