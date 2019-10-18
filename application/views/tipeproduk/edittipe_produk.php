<section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>EDIT DATA</b>
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
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>tipeproduk/updateproduk" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                    <div class="form-group">

                      
                        <input type="hidden" class="form-control" value="<?php echo $idpro;?>" id="" name="idpro">
                      </div>

                      <div class="form-group">
                      <label for="">ID TIPE PRODUK</label>
                        <input type="text" class="form-control" value="<?php echo $id_tipe_produk; ?>" id="" name="id_tipe_produk" required>                        
                    </div>

                    <div class="form-group">
                      <label for="">TIPE PRODUK</label>
                        <input type="text" class="form-control" value="<?php echo $tipe_produk; ?>" id="" name="tipe_produk"  required>                        
                    </div>
                    
                     <div class="form-group">
                  <button type="submit" class="btn btn-success">Simpan</button>
                  <a href="<?php echo base_url(); ?>tipeproduk" class="btn btn-danger">Kembali</a>
                </div><!-- /.col -->
              
                    
                </div><!-- /.item -->

                
               
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

          </section><!-- right col -->
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->