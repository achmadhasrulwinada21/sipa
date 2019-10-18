
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <b>TAMBAH DATA DAFTAR KEHADIRAN</b>
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
                <h3 class="box-title">FORM TAMBAH DATA DAFTAR KEHADIRAN</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>dafdir/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">

                   <div class="form-group">
                      <label for="">KODE FORM HADIR</label>
                        <select type="" name="kd_form_hdr" class="form-control" >
                          
                          <?php foreach($bangvaigantengih as $row) { ?>
                              <option ="" value="<?php echo $row['idkonfirmpeserta'] ?>"><?php echo $row['idkonfirmpeserta'] ?></option>
                          <?php } ?>
                        </select>                        
                    </div> 

                    <div class="form-group">
                      <label for="">Judul Acara</label>
                        <input type="text" class="form-control" value="" id="" name="nama_acara" placeholder="Isikan judul acara" required>
                    </div>
                    <div class="form-group">
                      <label for="">Waktu Acara</label>
                        <input type="text" class="form-control" value="" id="datepicker1" name="tanggal_acara" placeholder="Isikan waktu acara" required>                     
                    </div>

                    <div class="form-group">
                      <label for="">Nama</label>
                        <input type="text" class="form-control" value="" id="" name="nm_peserta" placeholder="Isikan Nama" required>
                    </div>

                    <div class="form-group">
                      <label for="">Jumlah</label>
                        <input type="text" class="form-control" value="" id="" name="jumlah_biaya" placeholder="Isikan Jumlah" required>
                    </div>

                    <div class="form-group">
                      <label for="">Keterangan</label>
                        <input type="text" class="form-control" value="" id="" name="keterangan" placeholder="Isikan Keterangan" required>
                    </div>
                       
                    <div class="form-group">
                      <label for="">Tanggal Surat</label>
                         <input type="datepicker2" class="form-control" value="" id="datepicker2" name="tgl_suratdafdir" placeholder="Isikan Tanggal" required>
                    </div>
                    <!-- <div class="form-group">
                      <label for="">Mengetahui</label>
                         <input type="text" class="form-control" value="" id="" name="mengetahui" placeholder="Isikan Nama" required>
                    </div>
                    <div class="form-group">
                      <label for="">Menyetujui</label>
                         <input type="text" class="form-control" value="" id="" name="menyetujui" placeholder="Isikan Nama" required>
                    </div> -->
                   
                  
                   

                    <?php 
            $koderole=($this->session->userdata('koderole'));
            if($koderole=='1' OR $koderole=='5' OR $koderole=='10'):
          ?> 
            <div class="form-group">
                      <label for="">Departemen</label>
                       <select name="departemen3" class="form-control" required>
                          <option>--Pilih Departemen--</option>
                          <?php foreach($optrole as $row)  {  $macamrole=$row['nama_role']; $kodemacamrole=$row['nama_role'];?>
                           
                              <option value="<?php echo $row['nama_role'] ?>"><?php echo $row['nama_role'] ?></option>


                          <?php } ?>
                        </select>  
                    </div>
          <?php endif;?>          

          <?php 
              $koderole=($this->session->userdata('koderole'));
              if($koderole!='1' && $koderole!='5' && $koderole!='10'):
              ?> 
          <div class="form-group">
                      <label for="">Departemen</label>
            <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama_role'); ?>" id="" name="departemen3" readonly>
                    </div>
          <?php endif;?>

                   <!-- <div class="form-group">
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
                  </div>
                   
                </div><!-- /.item -->
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
