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
                  <form role="form" action="<?php echo base_url(); ?>Depbangtransaksi/updatedepbanghead" method="POST" enctype="multipart/form-data">
                 <input type="hidden" class="form-control" value="<?php echo $idpr2;?>" name="idpr2">    
                  <input type="hidden" class="form-control" value="<?php echo $kode_trans;?>" name="kode_trans">
                  <input type="hidden" class="form-control" value="<?php echo $koders;?>" name="koders">
                    <div class="col-lg-6">       
                 <div class="form-group">
                      <label for="">PERUSAHAAN</label>
                       <select id="koper" name="koper" class="form-control">
                          <option value="">--PERUSAHAAN--</option>
                            <?php foreach($prins as $data) {
                          if(!in_array($data['koper'],$for_prins)){ ?>
                              <option  value="<?php echo $data['koper'] ?>"><?php echo $data['nm_perusahaan'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['koper'] ?>"><?php echo  $data['nm_perusahaan'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

               <div class="form-group">
                      <label for="">Sub Jenis Pekerjaan</label>
                       <select id="" name="kode_sub_jenis_pekerjaan" class=" chosen form-control">
                          <option value="">--PILIH Sub Jenis Pekerjaan--</option>
                            <?php foreach($prins2 as $data) {
                          if(!in_array($data['kode_sub_jenis_pekerjaan'],$for_prins2)){ ?>
                              <option  value="<?php echo $data['kode_sub_jenis_pekerjaan'] ?>"><?php echo $data['nm_sub_jenis_pekerjaan'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['kode_sub_jenis_pekerjaan'] ?>"><?php echo  $data['nm_sub_jenis_pekerjaan'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                    <div class="form-group">
                      <label for="">Lokasi</label>
                       <select id="" name="kodelokasi" class="chosen form-control">
                          <option value="">--PILIH Lokasi--</option>
                            <?php foreach($prins3 as $data) {
                          if(!in_array($data['kodelokasi'],$for_prins3)){ ?>
                              <option  value="<?php echo $data['kodelokasi'] ?>"><?php echo $data['deskripsi'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['kodelokasi'] ?>"><?php echo  $data['deskripsi'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                   <div class="form-group" hidden>
                     <label for="">TANGGAL</label>
                      <input type="text" class="form-control" id="datepicker11" value="<?php echo $tanggal_tr; ?>"  name="tanggal_tr">
                    </div>
               </div>
                  <div class="col-lg-6">
                  
                    <input type="hidden" name="id_tipe_produk" class="form-control" value="<?php echo $id_tipe_produk; ?>" readonly>
                 </div></div>
                   </div></div>
                     <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>Depbangtransaksi/addtrdepbang/<?php echo $tanggal_tr; ?>/<?php echo $kode_trans; ?>" class="btn btn-warning btn-block btn-flat">Kembali</a>
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
