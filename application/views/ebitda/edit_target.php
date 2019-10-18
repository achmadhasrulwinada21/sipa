<section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>TARGET EBITDA</b>
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
                  <form role="form" action="<?php echo base_url(); ?>Ebitda/updatedetail" method="POST" enctype="multipart/form-data">
                  
                   <input type="hidden" class="form-control" value="<?php echo $idtarebit;?>" name="idtarebit">
                   <input type="hidden" class="form-control" value="<?php echo $kode_target;?>" name="kode_target">
        

                  <div class="form-group">
                      <label for="">Bulan</label>
                        <select name="kodebulan" class="form-control" required readonly>
                          <option value="<?php echo $kodebulan ?>"><?php echo $namabulan ?></option>
                          
                        </select>    
                    </div>

                     <input type="hidden" class="form-control" value="<?php echo $namabulan; ?>" id="" name="namabulan" readonly /> 

                      <div class="form-group">
                      <label for="">Nilai Target</label>
                        <input type="text" class="form-control" value="<?php echo $nilai_target; ?>" id="" name="nilai_target"  />                      
                    </div>                  
                                       
                    </div></div>
                     <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>Ebitda" class="btn btn-warning btn-block btn-flat">Kembali</a>
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