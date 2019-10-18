

<section class="content-header">
    <h1>
        Edit
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Setting</a></li>
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
                    echo form_open_multipart('user/updateuser') ;
                ?>
                    
                    <div class="box-body">

                         <div class="form-group" hidden="">

                      <label for="">Id User</label>
                        <input type="text" class="form-control" value="<?php echo $u_id; ?>"  name="u_id" placeholder="Id User" readonly="">
                    </div>

                       <div class="form-group">

                      <label for="">Nama User</label>
                        <input type="text" class="form-control" value="<?php echo $nama; ?>" id="" name="namalengkap" placeholder="Nama Lengkap" required>
                    </div>


                    <div class="form-group">
                      <label for="">User Name</label>
                        <input type="text" class="form-control" value="<?php echo $u_name ?>" id="" name="namauser" placeholder="User Name" required>                        
                    </div>
                      <div class="form-group">
                      <label for="">Password</label>
                        <input type="password" class="form-control" value="<?php echo $u_paswd; ?>" id="" name="password" placeholder="Password" required>                        
                    </div>

                       <div class="form-group">
                      <label for="">Alamat</label>
                        <input type="text" class="form-control" value="<?php echo $alamat; ?>" id="" name="alamat" placeholder="Alamat" required>                        
                    </div>
                     <div class="form-group">
                      <label for="">Email</label>
                        <input type="text" class="form-control" value="<?php echo $email; ?>" id="" name="email" placeholder="Email" required>                        
                    </div>
                     <div class="form-group">
                      <label for="">Status</label>
                        <select name="status" class="form-control" required>
                         <option>--Pilih Status--</option>
                          <?php foreach($statususer as $datastatus) {

                          if(!in_array($datastatus['id_status'],$status_post)){ ?>
                              <option  value="<?php echo $datastatus['id_status'] ?>"><?php echo $datastatus['nama_status'] ?></option> 

                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datastatus['id_status'] ?>"><?php echo $datastatus['nama_status'] ?></option>


                          <?php }} ?> 

                        
                        </select> 
                    </div>

                      <div class="form-group">
                      <label for="">Role</label>
                        <select name="namarole" class="form-control" required>
                          <option>--Pilih Role--</option>
                      
                            <?php foreach($role as $datarole) {

                          if(!in_array($datarole['koderole'],$role_post)){ ?>
                              <option  value="<?php echo $datarole['koderole'] ?>"><?php echo $datarole['nama_role'] ?></option> 

                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datarole['koderole'] ?>"><?php echo $datarole['nama_role'] ?></option>


                          <?php }} ?>

                        </select> 
                    </div>

                     <div class="form-group">
                      <label for="">Cabang RS</label>
                        <select name="namars" class="form-control" required>
                          <option>--Pilih Cabang RS--</option>
                      
                            <?php foreach($cabangrs as $datars) {

                          if(!in_array($datars['koders'],$cabangrs_post)){ ?>
                              <option  value="<?php echo $datars['koders'] ?>"><?php echo $datars['namars'] ?></option> 

                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datars['koders'] ?>"><?php echo $datars['namars'] ?></option>


                          <?php }} ?>

                        </select> 
                    </div>

                      <div class="form-group">
                      <label for="">Foto </label>
                        <input type="text" value="<?php echo $fotoprofil;?>"  name="foto" >
                        <input type="file" class="form-control" value="" id="" name="file_upload" placeholder="">   
                        <br/>
                        <br/>
                          <img style="width:80px;height:80px" src="<?php echo base_url(); ?>assets/upload/<?php echo $fotoprofil; ?>" class="img-circl" alt="User Image" />                             
                    </div>

                      
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
                        <a href="<?php echo site_url('dashboard/profile'); ?>" class="btn btn-primary">Kembali</a>
                    </div>
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>