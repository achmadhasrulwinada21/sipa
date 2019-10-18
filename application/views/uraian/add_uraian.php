
      <section class="content-header">
        <h1>
          <b>TAMBAH DATA URAIAN</b>
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
                <h3 class="box-title">FORM TAMBAH URAIAN</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>uraian/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                    <div class="form-group">



                      <label for="">No Urut Uraian</label>
                        <input type="text" class="form-control" value="" id="" name="nourut_layout" placeholder="No Urut" required>
                    </div>

                    <div class="form-group">
                      <label for="">Nama Uraian</label>
                        <input type="text" class="form-control" value="" id="" name="nama_uraian" placeholder="Nama Uraian" required>                        
                    </div>
                      <div class="form-group">
                      <label for="">Kode Uraian</label>
                        <input type="text" class="form-control" value="" id="" name="kd_uraian" placeholder="Kode Uraian" required>                        
                    </div>
                    <!-- <div class="form-group">
                      <label for="">Alamat</label>
                        <input type="text" class="form-control" value="" id="" name="alamat" placeholder="Alamat" required>                        
                    </div>
                     <div class="form-group">
                      <label for="">Email</label>
                        <input type="text" class="form-control" value="" id="" name="email" placeholder="Email" required>                        
                    </div>
                     <div class="form-group">
                      <label for="">Status</label>
                        <select name="status" class="form-control" required>
                          <option>--Pilih Status--</option>
                          <?php foreach($status as $row) { ?>
                              <option value="<?php echo $row['nama_status'] ?>"><?php echo $row['nama_status'] ?></option>
                          <?php } ?>
                        </select>  -->
                    <!-- </div>
                     <div class="form-group">
                      <label for="">Role</label>
                        <select name="namarole" class="form-control" required>
                          <option>--Pilih Role--</option>
                          <?php foreach($optrole as $row)  {  $macamrole=$row['nama_role']; $kodemacamrole=$row['koderole'];?>
                           
                              <option value="<?php echo $row['koderole'] ?>"><?php echo $row['nama_role'] ?></option>
 -->

                         <!--  <?php } ?>
                        </select> 
                    </div>
                      <div class="form-group">
                      <label for="">Foto</label>
                        <input type="file" class="form-control" value="" id="" name="file_upload" placeholder="">                        
                    </div>
                    
                    
                  </div> -->
                 
                  
                </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>uraian" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
 