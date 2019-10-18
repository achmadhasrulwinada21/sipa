
      <section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>EDIT DATA TTD</b>
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
                <h3 class="box-title"> FORM EDIT DATA TTD</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>ttd/updatettd" method="POST" enctype="multipart/form-data">
                    
                  <div class="col-lg-12">
                    <div class="form-group">

                      <label for=""></label>
                        <input type="text" class="form-control" value="<?php echo $idttd;?>" id="" name="idttd" placeholder="" readonly="" >
                    </div>

                    <div class="form-group">
                      <label for="">Nama Lengkap</label>
                      <input type="text"  class="form-control" name="nama_user" value="<?php echo $nama_user;?>" placeholder="Nama Lengkap"> </input>               
                    </div>

                   <div class="form-group">
                      <label for="">Kode TTD</label>
                        <select name="kode_ttd" class="form-control" required>
                          <option>--Pilih Kode TTD--</option>
                            <?php foreach($kodettd as $datattd) {
                          if(!in_array($datattd['kodettd'],$kodettd_post)){ ?>
                              <option  value="<?php echo $datattd['kodettd'] ?>"><?php echo $datattd['jabatan'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datattd['kodettd'] ?>"><?php echo $datattd['jabatan'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div> 


                   <div class="form-group">
                    <label for="">Foto TTD</label>
                      <input type="hidden" name="foto" value="<?php echo $foto; ?>">
                        <input type="file" class="form-control" value="" id="" name="file_uploadttd" placeholder="">
                        <img style="width:80px;height:80px" src="<?php echo base_url(); ?>assets/upload/<?php echo $foto; ?>" class="img-circl" alt="User Image" />  
                             
                    </div>

                   <div class="form-group">
                      <label for="">Nama Cabang RS</label>
                        <select name="cbgrs" class="form-control" required>
                          <option>--Pilih Nama Cabang RS--</option>
                            <?php foreach($cbgrs as $datars) {
                          if(!in_array($datars['koders'],$cbgrs_post)){ ?>
                              <option  value="<?php echo $datars['koders'] ?>"><?php echo $datars['namars'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datars['koders'] ?>"><?php echo $datars['namars'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                   <div class="form-group">
                      <label for="">Nama Role</label>
                        <select name="role" class="form-control" required>
                          <option>--Pilih Nama Role--</option>
                            <?php foreach($role as $datarole) {
                          if(!in_array($datarole['nama_role'],$role_post)){ ?>
                              <option  value="<?php echo $datarole['nama_role'] ?>"><?php echo $datarole['nama_role'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datarole['nama_role'] ?>"><?php echo $datarole['nama_role'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>
                      <div class="form-group">
                      <label for="">Tanggal</label>
                      <input type="text"  class="form-control" id="datepicker3" name="tanggal" value="<?php echo $tanggal;?>"placeholder="yyyy-mm-dd"> </input>               
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
	
    $("#tanggal").datepicker({ 
        format: 'yyyymm'
    });

     $("#tanggal").datepicker({ 
        format: 'yyyymm'
    });
 

  </script>
