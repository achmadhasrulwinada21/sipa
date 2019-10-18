
      <section class="content-header">
        <br/>

        <!-- <h4 style="text-align: center;">
          <b>EDIT DATA TTD</b>
        </h4> -->
        
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
                <h3 class="box-title"> FORM EDIT DATA</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>Pempinjam/updatepinjam" method="POST" enctype="multipart/form-data">
                    
                  <div class="col-lg-12">
                    <div class="form-group">

                     <input type="hidden" class="form-control" value="<?php echo $idpinjam;?>" id="" name="idpinjam" placeholder="" readonly >
                    </div>

                  <div class="form-group">
                      <label for="">KODE PINJAM</label>
                      <input type="text"  class="form-control" name="kode_pinjam" value="<?php echo $kode_pinjam;?>" placeholder="KODE PINJAM" readonly> </input>               
                    </div>

                    <div class="form-group">
                      <label for="">PEMBERI PINJAMAN</label>
                      <input type="text"  class="form-control" name="pemberi_pinjaman" value="<?php echo $pemberi_pinjaman;?>" placeholder="PEMBERI PINJAMAN"> </input>               
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
	
    $("#tanggal").datepicker({ 
        format: 'yyyymm'
    });

     $("#tanggal").datepicker({ 
        format: 'yyyymm'
    });
 

  </script>
 -->