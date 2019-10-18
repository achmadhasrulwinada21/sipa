
      <section class="content-header">
        <h1>
          <b>TAMBAH DATA ROLE</b>
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
                <h3 class="box-title">FORM TAMBAH ROLE</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>role/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                     <div class="form-group">
                      <label for="">Nama Role</label>
                        <input type="text" class="form-control" value="" id="" name="nama_role" placeholder="Role" required>
                    </div>
                    <div class="form-group">
                      <label for="">Kode RS</label>
                        <select name="cbgrs" class="form-control" required>
                          <option>--Pilih Nama RS--</option>
                          <?php foreach($optrs as $row) { ?>
                              <option value="<?php echo $row['koders'] ?>"><?php echo $row['namars'] ?></option>
                          <?php } ?>
                        </select>    
                  </div>    
<!--                       <div class="form-group">
                      <label for="">Kode Role</label>
                        <input type="text" class="form-control" value="" id="" name="koderole" placeholder="Kode Role" required>
                  </div>  -->
                 
                  
                </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>role" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->         
          </section><!-- right col -->
		</div><!-- /.box (chat box) -->   