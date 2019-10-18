
      <section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>TAMBAH DATA TTD</b>
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
                <h3 class="box-title">FORM TAMBAH DATA TTD</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>ttddir/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">
                     <div class="form-group">
                  <label for="">Nama Lengkap</label>
                  <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama') ?>" id="" name="nama_user" readonly>
                  </div>    
                    <div class="form-group" hidden>
                      <label for="">Kode TTD</label>
                      <input type="text" class="form-control" value="DR" id="" name="kode_ttd" readonly>
                       </div>
                         <div class="form-group">
                      <label for="">Cabang RS</label>
                  <input type="hidden" class="form-control" value="<?php echo $this->session->userdata('koders') ?>" id="" name="cbgrs" readonly>
                  <input type="text" class="form-control" value="<?php echo $this->session->userdata('namars') ?>" id="" name="" readonly>
                  </div>
                       <div class="form-group">
                      <label for="">Upload ttd</label>
                        <input type="file" class="form-control" value="" id=""  name="file_uploadttd" placeholder="">                        
                      </div> 

                  

                    <div class="form-group" hidden>
                      <label for="">Role</label>
                <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama_role') ?>" id="" name="role" readonly>
                  </div>
                      <div class="form-group" hidden>
                      <label for="">Tanggal</label>
                        <input type="text" class="form-control" value="" id="datepicker3" name="tanggal" placeholder="yyyy-mm-dd" autocomplete="off">                        
                    </div>
                  </div>
                 
                  
                </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>ttddir" class="btn btn-warning btn-block btn-flat">Kembali</a>
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



  </script>


