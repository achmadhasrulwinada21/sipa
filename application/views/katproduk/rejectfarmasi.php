<section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>REJECT</b>
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
                <h3 class="box-title"></h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                  <div class="panel panel-primary"></div>
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>Farmasitransaksi/updatereject" method="POST" enctype="multipart/form-data">

                  <?php
                          $dara=($this->session->userdata('koderole'));
                   if($dara =='10' || $dara =='57' || $dara =='1'):?>
                   <input type="hidden" class="form-control" value="<?php echo $idtrcom;?>" name="idtrcom">
                       <input type="hidden" class="form-control" value="TP001" id="" name="id_tipe_produk">

                     <div class="form-group" hidden >
                      <label for="">tanggal</label>
                        <input type="text" class="form-control" value="<?php echo $tanggal; ?>" id="" name="tanggal"  />                      
                    </div> 
                     <div class="form-group" >
                      <label for="">catatan</label>
                        <input type="text" class="form-control" value="<?php echo $catatan; ?>" id="" name="catatan"  />                      
                    </div> 
                 <input type="hidden" class="form-control" value="4" id="" name="status">
                 
                    </div>
                                    
                    </div>
                 
                      <?php endif;?>  
                                          
                    </div></div>
                     <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>Farmasitransaksi" class="btn btn-warning btn-block btn-flat">Kembali</a>
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
