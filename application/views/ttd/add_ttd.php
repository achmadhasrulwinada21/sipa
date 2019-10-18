
      <section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>TAMBAH DATA TTD</b>
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
                <h3 class="box-title">FORM TAMBAH DATA TTD</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>ttd/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">
                     <div class="form-group">
                      <label for="">Nama Lengkap</label>
                        <select name="nama_user" class="form-control" required>
                          <option>--Pilih Nama User--</option>
                          <?php foreach($optuser as $row) { ?>
                              <option value="<?php echo $row['nama'] ?>"><?php echo $row['nama'] ?></option>
                          <?php } ?>
                        </select>    
                  </div>    
                    <div class="form-group">
                      <label for="">Kode TTD</label>
                       <select name="kode_ttd" class="form-control" required>
                          <option>--Pilih Kode TTD--</option>
                          <?php foreach($optkode as $row) { ?>
                              <option value="<?php echo $row['kodettd'] ?>"><?php echo $row['jabatan'] ?></option>
                          <?php } ?>
                        </select> 

                       <div class="form-group">
                      <label for="">Upload Foto</label>
                        <input type="file" class="form-control" value="" id=""  name="file_uploadttd" placeholder="">                        
                      </div> 

                    <div class="form-group">
                      <label for="">Cabang RS</label>
                        <select name="cbgrs" class="form-control" required>
                          <option>--Pilih Nama RS--</option>
                          <?php foreach($optrs as $row) { ?>
                              <option value="<?php echo $row['koders'] ?>"><?php echo $row['namars'] ?></option>
                          <?php } ?>
                        </select>    
                  </div>

                    <div class="form-group">
                      <label for="">Role</label>
                        <select name="role" class="form-control" required>
                          <option>--Pilih Nama Role--</option>
                          <?php foreach($optrole as $row) { ?>
                              <option value="<?php echo $row['nama_role'] ?>"><?php echo $row['nama_role'] ?></option>
                          <?php } ?>
                        </select>    
                  </div>
                      <div class="form-group">
                      <label for="">Tanggal</label>
                        <input type="text" class="form-control" value="" id="datepicker3" name="tanggal" placeholder="yyyy-mm-dd" required>                        
                    </div>
                  </div>
                 
                  
                </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>ttd" class="btn btn-warning btn-block btn-flat">Kembali</a>
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

<script>
    $(function() {
    $( "#datepicker1" ).datepicker({ dateFormat: "yy-mm-dd"});
    });


    $(function() {
    $( "#datepicker2" ).datepicker({ dateFormat: "yy-mm-dd"});
    });


      $(function() {
    $( "#datepicker3" ).datepicker({ dateFormat: "yy-mm-dd"});
    });



  </script>


