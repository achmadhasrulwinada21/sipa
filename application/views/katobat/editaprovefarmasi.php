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
                  <form role="form" action="<?php echo base_url(); ?>Obattr/updateaprove" method="POST" enctype="multipart/form-data">

                  <?php
                          $dara=($this->session->userdata('koderole'));
                   if($dara =='10'):?>
                   <input type="hidden" class="form-control" value="<?php echo $idtrcom;?>" name="idtrcom">
                       <input type="hidden" class="form-control" value="TP001" id="" name="id_tipe_produk">

                     <div class="form-group" hidden>
                      <label for="">tanggal</label>
                        <input type="text" class="form-control" value="<?php echo $tanggal; ?>" id="" name="tanggal"  />                      
                    </div> 
                 <input type="hidden" class="form-control" value="<?php echo $mengetahui; ?>" id="" name="mengetahui">
                 <input type="hidden" class="form-control" value="<?php echo $ttd_mengetahui; ?>" id="" name="ttd_mengetahui">
                 <input type="hidden" class="form-control" value="<?php echo $jb_mengetahui; ?>" id="" name="jb_mengetahui">
                   <input type="hidden" class="form-control" value="<?php echo $nama_satu; ?>" id="" name="nama_satu">
                 <input type="hidden" class="form-control" value="<?php echo $ttd_satu; ?>" id="" name="ttd_satu">
                  <input type="hidden" class="form-control" value="<?php echo $jb_satu; ?>" id="" name="jb_satu">
                   <input type="hidden" class="form-control" value="3" id="" name="status">
                 
                    </div>
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $this->session->userdata('nama')?>"  name="menyetujui">
                    </div>
                                        <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $this->session->userdata('nama_role')?>"  name="jb_menyetujui">  
                 
                    </div>
                   <div class="form-group">
               <label type="hidden" for="">Mengetahui</label>
                        <select name="ttd_menyetujui" class="form-control">
                          <option>Mengetahui</option>
                            <?php foreach($idmenyetujui as $data) {
                          if(!in_array($data['foto'],$for_ttdmen)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>
                      <?php endif;?>  
                      <?php
                          $daradev=($this->session->userdata('koderole'));
                   if($daradev =='57'):?>
                       <input type="hidden" class="form-control" value="<?php echo $idtrcom;?>" name="idtrcom">
                        <input type="hidden" class="form-control" value="TP001" id="" name="id_tipe_produk">
                     <div class="form-group" hidden>
                      <label for="">tanggal</label>
                        <input type="text" class="form-control" value="<?php echo $tanggal; ?>" id="" name="tanggal"  />  

                    </div> 
                     <input type="hidden" class="form-control" value="<?php echo $menyetujui; ?>" id="" name="menyetujui">
                 <input type="hidden" class="form-control" value="<?php echo $ttd_menyetujui; ?>" id="" name="ttd_menyetujui">
                  <input type="hidden" class="form-control" value="<?php echo $jb_menyetujui; ?>" id="" name="jb_menyetujui">
                  <input type="hidden" class="form-control" value="<?php echo $nama_satu; ?>" id="" name="nama_satu">
                 <input type="hidden" class="form-control" value="<?php echo $ttd_satu; ?>" id="" name="ttd_satu">
                  <input type="hidden" class="form-control" value="<?php echo $jb_satu; ?>" id="" name="jb_satu">  
                  <input type="hidden" class="form-control" value="82" id="" name="status">
                       <div class="form-group">
               <label type="hidden" for="">Disetujui Oleh</label>
                        <select name="ttd_mengetahui" class="form-control">
                          <option>Disetujui Oleh</option>
                            <?php foreach($idmengetahui as $data) {
                          if(!in_array($data['foto'],$for_ttdmeng)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $this->session->userdata('nama')?>"  name="mengetahui">  
                                          <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $this->session->userdata('nama_role')?>"  name="jb_mengetahui">  
                 
                    </div>
                       <?php endif;?> 
                        <?php
                          $dara21=($this->session->userdata('koderole'));
                   if($dara21 =='56' || $dara21 =='69' ):?>
                   <input type="hidden" class="form-control" value="<?php echo $idtrcom;?>" name="idtrcom">
                      <input type="hidden" class="form-control" value="1" id="" name="status">
                      <input type="hidden" class="form-control" value="TP001" id="" name="id_tipe_produk">
                      
                  <div class="form-group" hidden>
                      <label for="">tanggal</label>
                        <input type="text" class="form-control" value="<?php echo $tanggal; ?>" id="" name="tanggal"  />                      
                    </div> 
                   <div class="form-group">
               <label type="hidden" for="">Dibuat Oleh</label>
                        <select name="ttd_satu" class="form-control">
                          <option>--Dibuat Oleh--</option>
                            <?php foreach($idpengajuan as $data) {
                          if(!in_array($data['foto'],$for_ttdsatus)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $this->session->userdata('nama')?>"  name="nama_satu">  
                 
                    </div>
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $this->session->userdata('nama_role')?>"  name="jb_satu">  
                 
                    </div>
                   
                   
                      <?php endif;?>   
                   <?php
                          $daradev=($this->session->userdata('koderole'));
                   if($daradev =='82'):?>
                       <input type="hidden" class="form-control" value="<?php echo $idtrcom;?>" name="idtrcom">
                        <input type="hidden" class="form-control" value="TP001" id="" name="id_tipe_produk">
                     <div class="form-group">
                      <label for="">tanggal</label>
                        <input type="text" class="form-control" value="<?php echo $tanggal; ?>" id="" name="tanggal" readonly />

                    </div>
                     <input type="hidden" class="form-control" value="<?php echo $menyetujui; ?>" id="" name="menyetujui">
                 <input type="hidden" class="form-control" value="<?php echo $ttd_menyetujui; ?>" id="" name="ttd_menyetujui">
                  <input type="hidden" class="form-control" value="<?php echo $jb_menyetujui; ?>" id="" name="jb_menyetujui">
                  <input type="hidden" class="form-control" value="<?php echo $nama_satu; ?>" id="" name="nama_satu">
                 <input type="hidden" class="form-control" value="<?php echo $ttd_satu; ?>" id="" name="ttd_satu">
                  <input type="hidden" class="form-control" value="<?php echo $jb_satu; ?>" id="" name="jb_satu">
                  <input type="hidden" class="form-control" value="2" id="" name="status">
                      <input type="hidden" class="form-control" value="<?php echo $mengetahui; ?>" id="" name="mengetahui">
                 <input type="hidden" class="form-control" value="<?php echo $ttd_mengetahui; ?>" id="" name="ttd_mengetahui">
                  <input type="hidden" class="form-control" value="<?php echo $jb_mengetahui; ?>" id="" name="jb_mengetahui">
                    
                       <?php endif;?>
                      
                    </div></div>
                     <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>Obattr" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div>
                </div><!-- /.item -->

                 <!-- /.col -->
              
               
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          </div><!-- /.row (main row) -->

      </section><!-- /.content -->
