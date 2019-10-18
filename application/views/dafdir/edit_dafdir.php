
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <b>EDIT DATA DAFTAR KEHADIRAN</b>
        </h1>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
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
                <h3 class="box-title">FORM EDIT DAFTAR KEHADIRAN</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>dafdir/updatedafdir" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                      <div class="form-group" hidden="">
                      <label for="">ID DAFTAR HADIR</label>
                        <input type="text" class="form-control" value="<?php echo $id_dafdir; ?>"  name="id_dafdir" placeholder="Daftar Hadir" required>
                    </div>
                      <div class="form-group">
                      <label for="">KODE FORM HADIR</label>
                        <input type="text" class="form-control" value="<?php echo $kd_form_hdr; ?>"  name="kd_form_hdr" placeholder="Kode Form Hadir" required readonly>
                    </div>
                    <div class="form-group">
                      <label for="">NAMA</label>
                        <input type="text" class="form-control" value="<?php echo $nm_peserta; ?>"  name="nm_peserta" placeholder="Isikan Nama" required>
                    </div>
                    <div class="form-group">
                      <label for="">JUMLAH</label>
                        <input type="text" class="form-control" value="<?php echo $jumlah_biaya; ?>"  name="jumlah_biaya" placeholder="Isikan Jumlah" required>                        
                    </div>
                    <div class="form-group">
                      <label for="">KETERANGAN</label>
                        <input type="text" class="form-control" value="<?php echo $keterangan; ?>"  name="keterangan" placeholder="Isikan Keterangan" required>
                    </div>
                    
                    <div class="form-group">
                      <label for="">TANGGAL SURAT</label>
                        <input type="datepicker1" class="form-control" value="<?php echo $tgl_suratdafdir; ?>" id="datepicker1" name="tgl_suratdafdir" placeholder="Isikan Tanggal" required>
                    </div>
                    
                    <!-- <div class="form-group">
                      <label for="">MENGETAHUI</label>
                        <input type="text" class="form-control" value="<?php echo $mengetahui; ?>" id="" name="mengetahui" placeholder="Isikan Nama" required>
                    </div>
                    <div class="form-group">
                      <label for="">MENYETUJUI</label>
                        <input type="text" class="form-control" value="<?php echo $menyetujui; ?>" id="" name="menyetujui" placeholder="Isikan Nama" required>
                    </div> -->

                  <!--   <div class="form-group">
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
 -->

                    <!-- <div class="form-group">
                      <label for="">STATUS</label>
                   <select name="statusdokdafdir" class="form-control" required>
                          <option>--Pilih Status--</option>
                            <?php foreach($statusdoc as $datadoc) {

                          if(!in_array($datadoc['kodestatusdoc'],$statusdokumen_post)){ ?>
                              <option  value="<?php echo $datadoc['kodestatusdoc'] ?>"><?php echo $datadoc['nama_statusdoc'] ?></option> 

                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datadoc['kodestatusdoc'] ?>"><?php echo $datadoc['nama_statusdoc'] ?></option>
                          <?php }} ?>
 
                        </select>  
                    </div> -->
                  </div>
                  </div><!-- /.item -->

                  <!-- <div class="form-group">
                      <label type="hidden" for="">TTD Mengetahui</label>
                        <select name="ttd_mengetahui" class="form-control">
                          <option>--TTD Mengetahui--</option>
                            <?php foreach($idmengetahui as $data) {
                          if(!in_array($data['foto'],$for_ttdmeng)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>
                    <div class="form-group">
                      <label type="hidden" for="">TTD Menyetujui</label>
                        <select name="ttd_menyetujui" class="form-control">
                          <option>--TTD Menyetujui--</option>
                            <?php foreach($idmenyetujui as $data) {
                          if(!in_array($data['foto'],$for_ttdmeng2)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div> -->

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>Konfirmpeserta" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
          </section><!-- right col -->
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->

 <script>
    $(function() {
    $( "#datepicker1" ).datepicker({ dateFormat: "dd-mm-yy"});
    });

    $(function() {
    $( "#datepicker2" ).datepicker({ dateFormat: "dd-mm-yy"});
    });

      $(function() {
    $( "#datepicker3" ).datepicker({ dateFormat: "dd-mm-yy"});
    });

</script>