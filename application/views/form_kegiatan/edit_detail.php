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
                  <form role="form" action="<?php echo base_url(); ?>form_kegiatan/updatedetail" method="POST" enctype="multipart/form-data">
                  
                   <input type="hidden" class="form-control" value="<?php echo $iddetkeg;?>" name="iddetkeg">
                   <input type="hidden" class="form-control" value="<?php echo $kode_detail;?>" name="kode_detail">
        

                  <div class="form-group">
                      <label for="">Kegiatan</label>
                        <select name="rincian_kegiatan" class="form-control" required readonly>
                          <option value="<?php echo $rincian_kegiatan ?>"><?php echo $nama_sesi ?></option>
                          
                        </select>    
                    </div>

                      <div class="form-group">
                      <label for="">RINCIAN KEGIATAN</label>
                        <input type="text" class="form-control" value="<?php echo $kegiatan; ?>" id="" name="kegiatan" readonly />                      
                    </div>

                    <div class="form-group">

                      <label for="">JUMLAH</label>
                      
                        <input type="text" class="form-control" value="<?php echo $jumlah; ?>"  name="jumlah" required>
                    </div>

                      <div class="form-group">
                      <label for="">HARGA</label>
                        <input type="text" class="form-control" value="<?php echo $harga; ?>" id="" name="harga" required  />                      
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