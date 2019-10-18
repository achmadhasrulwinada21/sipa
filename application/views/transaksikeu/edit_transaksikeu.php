
      <section class="content-header">
        <h1>
          <b>EDIT DATA TRANSAKSI VAR</b>
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
                <h3 class="box-title">FORM EDIT TRANSAKSI KAV</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>transaksikeu/updatetransaksikeu" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                  <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $id_trkeu; ?>" id="" name="id_trkeu" placeholder="ID" required>
     
                    </div>     
                 <div class="form-group">
                      <label type="text" for="">Nama Rumah Sakit</label>
                        <select disabled name="koders" class="form-control" readonly>
                          <option>--Pilih Kode RS--</option>
                            <?php foreach($kdrs as $datakd) {
                if(!in_array($datakd['koders'],$kdrs_post)){ ?>
                              <option value="<?php echo $datakd['namars'] ?>"><?php echo $datakd['namars'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datakd['namars'] ?>"><?php echo $datakd['namars'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>
                    <div class="form-group">
                      <label for="">Periode</label>
                        <input type="text" class="form-control" value="<?php echo $periode; ?>" id="" name="periode" placeholder="Periode" required>                        
                    </div>
                    <div class="form-group">
                      <label for="">Tanggal</label>
                        <input type="text" class="form-control" value="<?php echo $cdate; ?>" id="datepicker1" name="cdate" placeholder="Tanggal" required>                        
                    </div>
                  </div>         
                  </div>
                   <div class="col-lg-6">
                  <div class="form-group">
                      <label for="">Kode Uraian</label>
                        <select disabled name="kd_uraian" class="form-control" readonly>
                          <option>--Pilih Kode Uraian--</option>
                            <?php foreach($uraianrs as $dataurai) {
                          if(!in_array($dataurai['kd_uraian'],$uraianrs_post)){ ?>
                              <option  value="<?php echo $dataurai['kd_uraian'] ?>"><?php echo $dataurai['kd_uraian'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $dataurai['kd_uraian'] ?>"><?php echo $dataurai['kd_uraian'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>
                    <div class="form-group">
                      <label for="">Nilai Uraian</label>
                        <input type="text" class="form-control" value="<?php echo $nilai_uraian; ?>" id="" name="nilai_uraian" placeholder="Nilai Uraian" required>                        
                    </div>

                       <div class="form-group">
                      <label for="">Warna Sel Cabang</label>
                        <input type="text" class="form-control" value="<?php echo $colorcell; ?>" name="warnatabel" placeholder="Warna Sel Tabel" required>                        
                    </div>

                  <?php if($this->session->userdata('roles')=='10'):?>
                    <div class="form-group">
                      <label for="">STATUS</label>
                   <select name="statusdokumen" class="form-control" required>
                          <option>--Pilih Status--</option>
                            <?php foreach($statusdokumen as $datadoc) {

                          if(!in_array($datadoc['kodestatusdoc'],$statusdokumen_post)){ ?>
                              <option  value="<?php echo $datadoc['kodestatusdoc'] ?>"><?php echo $datadoc['nama_statusdoc'] ?></option>

                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datadoc['kodestatusdoc'] ?>"><?php echo $datadoc['nama_statusdoc'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>
                   <div class="form-group">
                      <label for="">Catatan</label>
                        <textarea rows="4" cols="50" value="" class="form-control" name="catatan"><?php echo $catatan; ?></textarea>
                  </div>

          <?php endif;?>

                    </div>
                  </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>transaksikeu" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>
               
               </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->


  
    
