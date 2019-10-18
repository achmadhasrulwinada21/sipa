<section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>EDIT DATA API</b>
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
                <h3 class="box-title">EDIT DATA API RSH</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>group_rl/save_post" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                    <div class="form-group">

                   

                      <div class="form-group">
                      <label for="">Kode RSH</label>
                        <input type="text" class="form-control" value="<?php echo $koders; ?>" id="" name="koders" placeholder="Kode Bank" readonly>                        
                    </div>

                    <div class="form-group">
                      <label for="">Nama RSH</label>
                        <input type="text" class="form-control" value="<?php echo $namars; ?>" id="" name="namars" placeholder="Nama Bank" readonly>                        
                    </div>
                    
                    
                    
                </div><!-- /.item -->

                 <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>group_rl" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
              
               
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

          </section><!-- right col -->
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->