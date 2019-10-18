<section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>ANGGARAN</b>
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
                <i class="fa fa-pencil"></i>
                <h3 class="box-title">EDIT DATA</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                  <div class="panel panel-primary"></div>
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>anggaranbk/updateabk" method="POST" enctype="multipart/form-data">
                  
                   <input type="hidden" class="form-control" value="<?php echo $idacara;?>" name="idacara">
                      

                      <div class="form-group">

                     <div class="form-group">
                      <label for="">NAMA ACARA</label>
                        <input type="text" name="nama_acara" class="form-control" value="<?php echo $nama_acara; ?>">
                          
                  </div>

                  <div class="form-group">
                      <label for="">RUANGAN</label>
                        <input type="text" class="form-control" value="<?php echo $ruangan; ?>" id="" name="ruangan"  />                      
                    </div>

                    <div class="form-group">

                      <label for="">DEPARTEMEN</label>
                      
                        <input type="text" class="form-control" value="<?php echo $departemen; ?>"  name="departemen"  readonly>
                    </div>

                      <div class="form-group">
                      <label for="">RUMAH SAKIT</label>
                        <input type="text" class="form-control" value="<?php echo $rumah_sakit; ?>" id="" name="rumah_sakit" readonly  />                      
                    </div>

                     <div class="form-group">
                    <input type="hidden" class="form-control" value="<?php echo $createby;?>" name="createby" placeholder="" readonly="" >
                      </div> 
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $createdate;?>" name="createdate" placeholder="" readonly="" >
                      </div>
                    
                    </div></div>
                     <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>anggaranbk" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div>
                </div><!-- /.item -->

                 <!-- /.col -->
              
               
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

          </section><!-- right col -->
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->