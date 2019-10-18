
      <section class="content-header">
        <h1>
          <b>EDIT DATA MEMORANDUM</b>
          <small></small>
        </h1>
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
                <h3 class="box-title">FORM EDIT MEMORANDUM</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>memo/updatememo" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                      <div class="form-group">
                      <label for="">ID MEMO</label>
                        <input type="hidden" class="form-control" value="<?php echo $id_memo; ?>" id="" name="id_memo" placeholder="Isikan Kepada" required>
                    </div>

                    <div class="form-group">
                      <label type="hidden" for="">KEPADA</label>
                        <select name="tujuan" class="form-control">
                          <option>--PEMOHON--</option>
                            <?php foreach($id_tujuan as $data) {
                          if(!in_array($data['nama_depar'],$for_tujuan)){ ?>
                              <option  value="<?php echo $data['nama_depar'] ?>"><?php echo $data['nama_depar'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['nama_depar'] ?>"><?php echo  $data['nama_depar'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                    <div class="form-group">
                      <label type="hidden" for="">DARI</label>
                        <select name="dari" class="form-control">
                          <option>--DARI--</option>
                            <?php foreach($id_dari as $data) {
                          if(!in_array($data['nama_depar'],$for_dari)){ ?>
                              <option  value="<?php echo $data['nama_depar'] ?>"><?php echo $data['nama_depar'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['nama_depar'] ?>"><?php echo  $data['nama_depar'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>
                    <div class="form-group">
                      <label for="">TANGGAL</label>
                        <input type="date" class="form-control" value="<?php echo $tanggal; ?>" id="" name="tanggal" placeholder="Tanggal" required>
                    </div>
                    <div class="form-group">
                      <label for="">PERIHAL</label>
                        <input type="text" class="form-control" value="<?php echo $perihal; ?>" id="" name="perihal" placeholder="Perihal" required>
                    </div>
                    <div class="form-group">
                      <label for="">UNTUK</label>
                        <input type="text" class="form-control" value="<?php echo $untuk; ?>" id="" name="untuk" placeholder="Untuk" required>
                    </div>
                    <div class="form-group">
                      <label for="">Deskripsi</label>
                    <textarea rows="4" cols="50" value="<?php echo $deskripsi;?>" class="form-control" name="deskripsi"><?php echo $deskripsi;?> </textarea>
                  </div>
                    <div class="form-group">
                      <label for="">Nama PIC</label>
                        <input type="text" class="form-control" value="<?php echo $pic; ?>" id="" name="pic" placeholder="Nama PIC" required>
                    </div>

                    <div class="form-group">
                      <label type="hidden" for="">TTD Pemohon</label>
                        <select name="ttd_pemohon" class="form-control">
                          <option>--TTD Pemohon--</option>
                            <?php foreach($id_mengetahui as $data) {
                          if(!in_array($data['foto'],$for_ttdpemohon)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                    <!-- ADMIN ROLES 1 -->
                      <?php if($this->session->userdata('roles')=='1'):?>
                    <div class="form-group">
                      <label for="">APPROVAL</label>
                      <br/>
                        <input type="checkbox"   name="approval" <?php echo $c1=$approval; if($c1=='t') echo " Checked "?>
                       >Ya,Sudah Dilihat Dan Dibaca</input>
                    </div>
                     <?php endif;?>

                    <!-- ADMIN ROLES 2 -->
                      <?php if($this->session->userdata('roles')=='2'):?>
                    <div class="form-group">
                      <label for="">APPROVAL</label>
                      <br/>
                        <input type="checkbox"   name="approval" <?php echo $c1=$approval; if($c1=='t') echo " Checked "?>
                       >Ya,Sudah Dilihat Dan Dibaca</input>
                    </div>
                     <?php endif;?>
                  </div>
                  </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>memo" class="btn btn-warning btn-block btn-flat">Kembali</a>
               </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
