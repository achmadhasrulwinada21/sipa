     <section class="content-header">
    <h1>
        Tambah Rekanan Listrik
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
                <h3 class="box-title">FORM REKANAN</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>rekananlistrik/savedata" method="POST" enctype="multipart/form-data">

                 <div class="col-lg-6">

                    <div class="form-group">
                      <label for="">Nama Rumah Sakit</label>
                        <select name="nm_rs" class="form-control" required>
                          <option>--Pilih Nama RS--</option>

                          <?php foreach($optRumahSakit as $row) { ?>
                              <option value="<?php echo $row['namars'] ?>"><?php echo $row['namars'] ?></option>
                          <?php } ?>
                        </select>    
                  </div>
                   
                  <!-- <div class="form-group">
                      <label for="">periode</label>
                        <input type="text" class="form-control" value="" id="datepicker4" name="periode" placeholder="mohon di isi" required>
                    </div>-->

                     <div class="form-group">
                        <label for="">Uraian Kerja</label>
                           <select name="uraian_kerja" class="form-control" required>
                            <option>--Pilih Uraian Kerja--</option>
                            <?php foreach($optUraian as $row) { ?>
                                <option value="<?php echo $row['uraian_kerja'] ?>"><?php echo $row['uraian_kerja'] ?></option>
                            <?php } ?>
                          </select>    
                      </div>

                     <div class="form-group">
                      <label for="">KM Mandiri</label>
                      <br/>
                    <input type="checkbox"   name="km_mandiri" value="1"> Ya </input> 
                    </div>

                   <div class="form-group">
                      <label for="">Trisandira</label>
                      <br/>
                    <input type="checkbox"   name="trisandira" value="1"> Ya </input> 
                    </div>
 
                     <div class="form-group">
                      <label for="">Trisahabat</label>
                      <br/>
                    <input type="checkbox"   name="trisahabat" value="1"> Ya </input> 
                    </div>

                    </div>

                     <div class="form-group">
                      <label for="">Trabas Reka Buana</label>
                      <br/>
                    <input type="checkbox"   name="tribas_reka_buana" value="1"> Ya </input> 
                    </div>

                     <div class="form-group">
                      <label for="">Sekawan Kontrindo</label>
                      <br/>
                    <input type="checkbox"   name="sekawan_kontrindo" value="1"> Ya </input> 
                    </div>

 <!--                 <div class="form-group">
                      <label for="">Tanggal</label>
                        <input type="text" class="form-control" value="" id="datepicker1" name="cdate" placeholder="Isikan Tanggal" required>                        
                    </div> -->           


                <!--  <div class="col-lg-6">
                   <div class="form-group">
                      <label for="">Kode Uraian</label>
                        <select name="kd_uraian" class="form-control" required>
                          <option>--Pilih Kode Uraian--</option>
                          <?php foreach($optUraian as $row) { ?>
                              <option value="<?php echo $row['kd_uraian'] ?>"><?php echo $row['nama_uraian'] ?></option>
                          <?php } ?>
                        </select>                        
                    </div> 
                    
                    <div class="form-group">
                      <label for="">Nilai Uraian</label>
                        <input type="text" class="form-control" value="" id="" name="nilai_uraian" placeholder="Isikan Nilai Uraian" required>                        
                    </div>-->
                                        
                  </div>
                                 
                  
                </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>rekananlistrik" class="btn btn-warning btn-block btn-flat">Kembali</a>
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
      <strong>TeamHermina &copy; 2018 <a href="#"></a></strong>
    </footer>
  </div><!-- ./wrapper -->
  <!-- page script -->
  

