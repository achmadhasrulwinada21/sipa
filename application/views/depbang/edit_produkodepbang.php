<section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>PRODUK DEPBANG</b>
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
                  <form role="form" action="<?php echo base_url(); ?>Depbangtr/updateprodalum" method="POST" enctype="multipart/form-data">
                  
                   <input type="hidden" class="form-control" value="<?php echo $idpr2;?>" name="idpr2">             
                    <input type="hidden" class="form-control" value="<?php echo $kode_th;?>" name="kode_th"> 
                     <input type="hidden" class="form-control" value="<?php echo $tanggal_tr;?>" name="tanggal_tr"> 
                     <div class="form-group">
                      <label for="">NAMA PERUSAHAAN</label><br>
                       <select id="" name="koper" class="chosen form-control" required>
                          <option required></option>
                            <?php foreach($prins as $data) {
                          if(!in_array($data['koper'],$for_prins)){ ?>
                              <option  value="<?php echo $data['koper'] ?>" required><?php echo $data['nm_perusahaan'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['koper'] ?>" required><?php echo  $data['nm_perusahaan'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                   
                  <div class="form-group">
                  <input type="hidden" name="tipe_produk" class="form-control" value="<?php echo $id_tipe_produk; ?>">
                 </div>

                       </div></div>
                     <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>Depbangtr/addtralum/<?php echo $kode_th;?>/<?php echo $tanggal_tr;?>" class="btn btn-warning btn-block btn-flat">Kembali</a>
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
