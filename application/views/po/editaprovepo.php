<section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>APPROVE</b>
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
                  <form role="form" action="<?php echo base_url(); ?>c_po/updateapprove" method="POST" enctype="multipart/form-data">

                  <div class="form-group"> 
        <label>Tanda Tangan Disetujui :</label><br>
          <select name="menyetujui" class="form-control" required>
                          <option value="" required>-- Pilih Tanda Tangan Disetujui  --</option>
                            <?php foreach($idmenyetujui as $data) {
                          if(!in_array($data['foto'],$for_ttdmen)){ ?>
                              <option  value="<?php echo $data['foto'] ?>" required><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>" required><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
        </div>
         <div class="form-group"> 
        <label>Status Disetujui :</label><br>
          <select name="nm_acc" class="form-control">
                <option> -- Pilih status Disetujui --</option>
                 <option value="Disetujui Direktur Ops & Umum">Disetujui Direktur Ops & Umum</option>
                 <option value="ditolak Direktur Ops & Umum">ditolak Direktur Ops & Umum</option>
           </select>
        </div>
        <div class="form-group" hidden>
                      <label for="">nama</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $this->session->userdata('nama'); ?>" id="" name="nm_menyetujui" placeholder="" readonly>            
                    </div>
        <div class="form-group" hidden>
                      <label for="">Jabatan</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $this->session->userdata('nama_role'); ?>" id="" name="jb_menyetujui" placeholder="" readonly>            
                    </div>
                    
                      
                    </div></div>
                     <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>c_po/viewallpo" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div>
                </div><!-- /.item -->

                 <!-- /.col -->
              
               
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
         
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
