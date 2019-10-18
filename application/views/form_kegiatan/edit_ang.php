<section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>ANGGARAN</b>
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
                  <form role="form" action="<?php echo base_url(); ?>form_kegiatan/updateabk" method="POST" enctype="multipart/form-data">
                  
                   <input type="hidden" class="form-control" value="<?php echo $idfkeg;?>" name="idfkeg">
                      

                     <?php if($this->session->userdata('koderole')!='10'):?>

                      <div class="form-group">
                      <label for="">NAMA ACARA</label>
                       <select name="kode_kegiatan" class="form-control">
                          <option value="-">--nama acara--</option>
                            <?php foreach($banku as $data) {
                          if(!in_array($data['kode_kegiatan'],$for_bankum)){ ?>
                              <option  value="<?php echo $data['kode_kegiatan'] ?>"><?php echo $data['nama_kegiatan'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['kode_kegiatan'] ?>"><?php echo  $data['nama_kegiatan'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                      <div class="form-group">
                      <label for="">Deskripsi</label>
                        <input type="text" class="form-control" value="<?php echo $judul_kegiatan; ?>" id="" name="judul_kegiatan"  />                      
                    </div> 
                 
                  <div class="form-group">

                      <label for="">DEPARTEMEN</label>
                      
                        <input type="text" class="form-control" value="<?php echo $departemen; ?>"  name="departemen" readonly>
                    </div>
                    
                       

                      <div class="form-group">
                      <label for="">RUMAH SAKIT</label>
                        <input type="text" class="form-control" value="<?php echo $nama_rs; ?>" id="" name="nama_rs" readonly  />                      
                    </div>
                   
                            <div class="form-group">
                      <label for="">TANGGAL ACARA</label>
                        <input type="date" class="form-control" value="<?php echo $tanggal_acara; ?>" id="" name="tanggal_acara" />                      
                    </div> 
                     <div class="form-group">
                        <input type="hidden" class="form-control" value="Menunggu Disetujui" id="" name="status">                        
                    </div>

                     <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $catatan; ?>" id="" name="catatan">                        
                    </div>
                    <?php endif;?>
                     <?php if($this->session->userdata('koderole')=='10'):?>
                      <div class="form-group" >
                      <label for="">NAMA ACARA</label>
                       <select name="kode_kegiatan" class="form-control" readonly>
                          <option value="-">--nama acara--</option>
                            <?php foreach($banku as $data) {
                          if(!in_array($data['kode_kegiatan'],$for_bankum)){ ?>
                              <option  value="<?php echo $data['kode_kegiatan'] ?>"><?php echo $data['nama_kegiatan'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['kode_kegiatan'] ?>"><?php echo  $data['nama_kegiatan'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                    <div class="form-group">
                      <label for="">Deskripsi</label>
                        <input type="text" class="form-control" value="<?php echo $judul_kegiatan; ?>" id="" name="judul_kegiatan" readonly  />                      
                    </div> 
                 
                  
                  <div class="form-group">

                      <label for="">DEPARTEMEN</label>
                      
                        <input type="text" class="form-control" value="<?php echo $departemen; ?>"  name="departemen" readonly>
                    </div>
                    

                      <div class="form-group">
                      <label for="">RUMAH SAKIT</label>
                        <input type="text" class="form-control" value="<?php echo $nama_rs; ?>" id="" name="nama_rs" readonly  />                      
                    </div>
                    
                            <div class="form-group" >
                      <label for="">TANGGAL ACARA</label>
                        <input type="date" class="form-control" value="<?php echo $tanggal_acara; ?>" id="" name="tanggal_acara" readonly />                      
                    </div> 
                    <div class="form-group">
            <label type="hidden" for="">Approve</label>
                      <select name="status" id="status" class="form-control">
              <option value="Draf">--Pilih Status--</option>
              <option <?php if( $status=='Approve_rencana'){echo "selected"; } ?> value='Approve_rencana'>Disetujui Anggaran</option>
              <option <?php if( $status=='Not_Approved_rencana'){echo "selected"; } ?> value='Not_Approved_rencana'>Ditolak Anggaran</option>
              <option <?php if( $status=='Revisi_rencana'){echo "selected"; } ?> value='Revisi_rencana'>Revisi Anggaran</option>
              <option <?php if( $status=='Menunggu Disetujui'){echo "selected"; } ?> value='Menunggu Disetujui'>Menunggu Disetujui</option>
                      </select><option>
                  </div>       
                    <div class="form-group">
                      <label for="">CATATAN</label>
                        <input type="text" class="form-control" value="<?php echo $catatan; ?>" id="" name="catatan" />                      
                    </div>  
                     <?php endif;?>                   
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