<section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>ANGGARA REALISASI</b>
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
                  <form role="form" action="<?php echo base_url(); ?>form_kegiatan/updatereal" method="POST" enctype="multipart/form-data">
                  
                   <input type="hidden" class="form-control" value="<?php echo $idangreal;?>" name="idangreal">
                   <input type="hidden" class="form-control" value="<?php echo $kode_angreal;?>" name="kode_angreal">
        

                  <div hidden class="form-group">

                      <label for="">KEGIATAN</label>
                      
                        <input type="text" class="form-control" value="<?php echo $rincian_kegiatan; ?>"  name="rincian_kegiatan"  readonly>
                    </div>

                      <div class="form-group">
                      <label for="">RINCIAN KEGIATAN</label>
                        <input type="text" class="form-control" value="<?php echo $kegiatan; ?>" id="" name="kegiatan" readonly  />                      
                    </div>

                    <div class="form-group">

                      <label for="">JUMLAH</label>
                      
                        <input type="text" class="form-control" value="<?php echo $jumlah; ?>"  name="jumlah"  readonly>
                    </div>

                      <div class="form-group">
                      <label for="">HARGA</label>
                        <input type="text" class="form-control" value="<?php echo $harga; ?>" id="" name="harga" readonly  />                      
                    </div>

                     <div class="form-group">
                      <label for="">JUMLAH REALISASI</label>
                        <input type="text" class="form-control" value="<?php echo $jumlah_real; ?>" id="" name="jumlah_real" required  />                      
                    </div>

                    <div class="form-group">
                      <label for="">HARGA REALISASI</label>
                        <input type="text" class="form-control" value="<?php echo $harga_real; ?>" id="" name="harga_real" required  />                      
                    </div>

                                       
                    </div></div>
                     <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>form_kegiatan" class="btn btn-warning btn-block btn-flat">Kembali</a>
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