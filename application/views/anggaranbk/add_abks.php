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
                <i class="fa fa-plus"></i>
                <h3 class="box-title">TAMBAH DATA</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>anggaranbk/savedatas" method="POST" enctype="multipart/form-data">
                    <table class="table-common">
                         
                 <div class="panel panel-primary"></div>
              <div class="col-lg-12">
               
                  <div class="panel-heading">
                              
                                         
                    <div class="form-group">
                      <label for="">NAMA ACARA</label>
                        <input type="text" class="form-control" value="" id="" name="nama_acara" placeholder="nama acara" >                              
                    </div>
                    <div class="form-group">
                      <label for="">DEPARTEMEN</label>
                       <input type="text" class="form-control" value="<?php echo $this->session->userdata('departemen') ?>" name="departemen" id=""/>                 
                    </div>
                     <div class="form-group">
                      <label for="">RUMAH SAKIT</label>
                        <input type="text" class="form-control" value="<?php echo $this->session->userdata('namars') ?>" id="" name="rumah_sakit" placeholder="rumah sakit" >                              
                    </div>
                    <div class="form-group">
                      <label for="">RUANGAN</label>
                       <input type="text" class="form-control" value="" name="ruangan" id=""/>                 
                    </div>
                  </div>
               
                </table>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>anggaranbk" class="btn btn-warning btn-block btn-flat">Kembali</a>
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
