
      <section class="content-header">
        <h1>
          <b>EDIT DATA ROLE</b>
        </h1>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
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
                <h3 class="box-title">FORM EDIT ROLE</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>role/updaterole" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">

                     <div class="form-group">

                      <label for="">Id Role</label>
                        <input type="text" class="form-control" value="<?php echo $idrole; ?>"  name="idrole" placeholder="Id Role" readonly="">
                    </div>

                     <div class="form-group">
                      <label for="">Nama Role</label>
                         <input type="text" class="form-control" value="<?php echo $namarole; ?>"  name="namarole" placeholder="Nama Role" required>
                    </div>

                     <div class="form-group">
                      <label for="">Nama Cabang RS</label>
                        <select name="namars" class="form-control" required>
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
                      <label for=""></label>
                        <input type="hidden" class="form-control" value="<?php echo $koderole; ?>" id="" name="koderole" placeholder="Kode Role" required>                        
                    </div> 
<!--                   </div> -->
                </div><!-- /.item -->

                 <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>role" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
              
               
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
         
         
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->


