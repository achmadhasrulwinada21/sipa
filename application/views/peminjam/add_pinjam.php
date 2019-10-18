
      <section class="content-header">
        <br/>

        <!-- <h4 style="text-align: center;">
          <b>TAMBAH</b>
        </h4>
         -->
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
                <h3 class="box-title">FORM TAMBAH DATA </h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>Pempinjam/savedata" method="POST" enctype="multipart/form-data">
                 
                  <div class="form-group">
                      <label for="">KODE PINJAM</label>
                        <input type="text" class="form-control" value="" id="" name="kode_pinjam" placeholder="KODE PINJAM" required>            
                    </div>
                    <div class="form-group">
                      <label for="">PEMBERI PINJAMAN</label>
                        <input type="text" class="form-control" value="" id="" name="pemberi_pinjaman" placeholder="PEMBERI PINJAMAN" required>            
                    </div>

                  </div>
                 
                  
                </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>Pempinjam" class="btn btn-warning btn-block btn-flat">Kembali</a>
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

<!-- <script>
    $(function() {
    $( "#datepicker1" ).datepicker({ dateFormat: "yy-mm-dd"});
    });


    $(function() {
    $( "#datepicker2" ).datepicker({ dateFormat: "yy-mm-dd"});
    });


      $(function() {
    $( "#datepicker3" ).datepicker({ dateFormat: "yy-mm-dd"});
    });



  </script> -->


