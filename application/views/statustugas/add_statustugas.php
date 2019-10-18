
      <section class="content-header">
        <h1>
          <b>TAMBAH DATA STATUS TUGAS</b>
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
                <h3 class="box-title">FORM TAMBAH STATUS TUGAS</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>statustugas/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="">1. No Surat</label>
                        <input type="text" class="form-control" value="" id="" name="nosurat" placeholder="Isikan No Surat" required>
                    </div>

                    <div class="form-group">
                      <label for="">2. Nama Kepala Departemen</label>
                        <input type="text" class="form-control" value="" id="" name="namakadep" placeholder="Nama Kepala Departemen" required>                        
                    </div>
                      <div class="form-group">
                      <label for="">3. Jabatan Kepala Departemen</label>
                        <input type="text" class="form-control" value="" id="" name="jabatankadep" placeholder="Jabatan Kepala Departemen" required>                        
                    </div>
                    <div class="form-group">
                      <label for="">4. Nama Yang Ditugaskan</label>
                        <input type="text" class="form-control" value="" id="" name="namayangditugaskan" placeholder="Nama Yang Ditugaskan" required>                        
                    </div>
                     <div class="form-group">
                      <label for="">5. Jabatan Yang Ditugaskan</label>
                        <input type="text" class="form-control" value="" id="" name="jabatanyangtugas" placeholder="Jabatan Yang Tugas" required>                        
                    </div>
                     <div class="form-group">
                      <label for="">6. Waktu Tugas</label>
                        <input type="text" class="form-control" value="" id="datepicker1" name="waktutugas" placeholder="Waktu Tugas" required>                        
                    </div>
                     <div class="form-group">
                      <label for="">7. Tujuan Tempat</label>
                          <input type="text" class="form-control" value="" id="" name="tujuantempat" placeholder="Tujuan Tempat" required> 
                    </div>

                     <div class="form-group">
                      <label for="">8. Dasar Penugasan</label>
                      <input type="text" class="form-control" value="" id="" name="dasarpenugasan" placeholder="Dasar Penugasan" required> 
                    </div>
                     
                    <div class="form-group">
                      <label for="">9. Kegiatan Penugasan</label>
                      <textarea rows="4" cols="50"  class="form-control" name="kegiatanpenugasan"> </textarea> 
                       
                    </div>
                      <div class="form-group">
                      <label for="">10. Mengetahui Sekretatis Direktur Regional</label>
                       <input type="text"  class="form-control" name="mengetahuisekretarisdirekturregional"> </input> 
                    </div>
                      <div class="form-group">
                      <label for="">11.Upload Foto</label>
                        <input type="file" class="form-control" value="" id=""  name="file_uploadstatus" placeholder="">                        
                      </div> 
                      <div class="form-group">
                      <label for="">12.Cabang RS</label>
                      <input type="text" class="form-control" value="<?php echo $this->session->userdata('namars'); ?>" id="" name="cbgrs">
                    </div>

                    <!-- <div id="director only" hidden=""> -->
<!--                       <div class="form-group">
                      <label for="">12.Status Dokumen(Director Only)</label>
                      <select name="status" class="form-control" required>
                          <option>--Pilih Status Dokumen--</option>
                          <?php foreach($optstatusdoc as $row)  {  $macamstatusdoc=$row['nama_statusdoc']; $kodemacamstatusdoc=$row['kodestatusdoc'];?>
                           
                              <option value="<?php echo $row['kodestatusdoc'] ?>"><?php echo $row['nama_statusdoc'] ?></option>


                          <?php } ?>
                        </select>  
                    </div> -->

                     <!-- <div class="form-group">
                      <label for="">13.Approve Direktur Operasional Dan Umum</label>
                      <br/>
                      <input type="checkbox"   name="direkturcheck"  text="Sudah Dilihat" >Ya,Sudah Dilihat Dan Dibaca</input> 

                                   
                </div><!-- /.item --> 
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>                        
                        <a href="<?php echo site_url('statustugas'); ?>" class="btn btn-primary">Kembali</a>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>


