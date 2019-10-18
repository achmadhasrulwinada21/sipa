

<section class="content-header">
    <h1>
        Tambah User
        <small>Menu Dinamis</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i></a></li>
        <li class="active"></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                <div class="col-md-5">
                <?php
                    echo form_open('user/savedata');
                ?> 
                  
                    <div class="box-body">
                <div class="form-group">



                      <label for="">Nama User</label>
                        <input type="text" class="form-control" value="" id="" name="namalengkap" placeholder="Nama Lengkap" required>
                    </div>

                    <div class="form-group">
                      <label for="">User Name</label>
                        <input type="text" class="form-control" value="" id="" name="namauser" placeholder="User Name" required>                        
                    </div>
                      <div class="form-group">
                      <label for="">Password</label>
                        <input type="password" class="form-control" value="" id="" name="password" placeholder="Password" required>                        
                    </div>
                    <div class="form-group">
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
                          <?php foreach($status as $row)  {  $macamstatus=$row['nama_status']; $kodemacamstatus=$row['id_status'];?>
                           
                              <option value="<?php echo $row['id_status'] ?>"><?php echo $row['nama_status'] ?></option>


                          <?php } ?>

                        </select> 
                    </div>
                     <div class="form-group">
                      <label for="">Role</label>
                        <select name="namarole" class="form-control" required>
                          <option>--Pilih Role--</option>
                          <?php foreach($optrole as $row)  {  $macamrole=$row['nama_role']; $kodemacamrole=$row['koderole'];?>
                           
                              <option value="<?php echo $row['koderole'] ?>"><?php echo $row['nama_role'] ?></option>


                          <?php } ?>
                        </select> 
                    </div>

                     <div class="form-group">
                      <label for="">Cabang RS</label>
                        <select name="namacabang" class="form-control" required>
                          <option>--Pilih Cabang --</option>
                          <?php foreach($optcabang as $row) { $macamcabang=$row['namars']; $kodemacamcabang=$row['koders'];?>
                           
                              <option value="<?php echo $row['koders'] ?>"><?php echo $row['namars'] ?></option>


                          <?php } ?>
                        </select> 
                    </div>
                      <div class="form-group">
                      <label for="">Foto</label>
                        <input type="file" class="form-control" value="" id="" name="file_upload" placeholder="">                        
                    </div>

                      <div class="form-group">
                      <label for="">Departemen</label>
                        <select name="namadepartemen" class="form-control" required>
                          <option>--Pilih Cabang --</option>
                          <?php foreach($optdepartemen as $row) { $macamcabang=$row['nama_depar']; $kodemacamcabang=$row['id_depar'];?>
                           
                              <option value="<?php echo $row['nama_depar'] ?>"><?php echo $row['nama_depar'] ?></option>


                          <?php } ?>
                        </select> 
                    </div>
               
                    
                  </div>
                 
                  
                </div><!-- /.item --> 
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>                        
                        <a href="<?php echo site_url('user'); ?>" class="btn btn-primary">Kembali</a>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
