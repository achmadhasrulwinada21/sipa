
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <b>EDIT FORMULIR PERMOHONAN</b>
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
                <h3 class="box-title">FORM EDIT FORMULIR PERMOHONAN</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>formpermohonan/updateformulirmhn" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">

                   
                      <div class="form-group">
                      <label for="">ID FORMULIR PERMOHONAN</label>
                        <input type="hidden" class="form-control" value="<?php echo $id_form_mhn; ?>" id="" name="id_form_mhn" placeholder="Formulir" required>
                    </div>
                    <div class="form-group">
                      <label for="">PERIHAL</label>
                        <input type="text" class="form-control" value="<?php echo $perihal_formulir; ?>" id="" name="perihal_formulir" placeholder="Isikan Perihal" required>
                    </div>
                    <div class="form-group">
                      <label for="">BAGIAN</label>
                        <input type="text" class="form-control" value="<?php echo $bagian; ?>" id="" name="bagian" placeholder="Isikan Bagian" required>                        
                    </div>
                    <div class="form-group">
                      <label for="">PEMBAYARAN</label>
                        <input type="text" class="form-control" value="<?php echo $untuk_byr; ?>" id="" name="untuk_byr" placeholder="Isikan Tujuan Pembayaran" required readonly>                        
                    </div>
                    <div class="form-group">
                      <label for="">JUMLAH</label>
                        <input type="text" class="form-control" value="<?php echo $jumlah; ?>" id="" name="jumlah" placeholder="Isikan Jumlah" required readonly>                        
                    </div>
                    <div class="form-group">
                      <label for="">TANGGAL PEMBAYARAN</label>
                        <input type="text" class="form-control" value="<?php echo $tgl_byr; ?>" id="" name="tgl_byr" placeholder="Isikan Tanggal Bayar" required readonly>
                    </div>
                    
                   <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $pemohon; ?>" id="" name="pemohon" placeholder="" readonly>
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $mengetahui; ?>" id="" name="mengetahui" placeholder="" >
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $menyetujui; ?>" id="" name="menyetujui" placeholder="">
                    </div>



                    <div class="form-group">
                      <label for="">TANGGAL FORMULIR</label>
                        <input type="text" class="form-control" value="<?php echo $tgl_formulir; ?>" id="datepicker1" name="tgl_formulir" placeholder="Isikan Tanggal" required>
                    </div>

                    <div class="form-group">
                     <!--  <label type="hidden" for="">TTD Pemohon</label> -->
                  <input type="hidden" class="form-control" value="<?php echo $ttd_mengetahui; ?>" id="" name="ttd_mengetahui" placeholder="">
                    </div>

                     <div class="form-group">
                     <!--  <label type="hidden" for="">TTD Pemohon</label> -->
                  <input type="hidden" class="form-control" value="<?php echo $ttd_pemohon; ?>" id="" name="ttd_pemohon" placeholder="">
                    </div>

                     <div class="form-group">
                     <!--  <label type="hidden" for="">TTD Pemohon</label> -->
                  <input type="hidden" class="form-control" value="<?php echo $ttd_menyetujui; ?>" id="" name="ttd_menyetujui" placeholder="">
                    </div>


 <!-- if($koderole=='19' OR $koderole=='4' OR $koderole=='21' OR $koderole=='18' AND $nama=='Manager Personalia' OR $nama=='Manager Depti' OR $nama=='Manager Depker' OR $nama=='Manager HRD' ): -->

 <!-- untuk Pemohon (Manager)  -->
                    <?php 
            $koderole=($this->session->userdata('koderole'));
            $nama=($this->session->userdata('nama'));
            if($koderole=='19' AND $nama=='Manager Personalia'):
          ?> 


<!--                     <div class="form-group">
                      <label for="">PEMOHON</label>
                        <input type="text" class="form-control" value="<?php echo $pemohon; ?>" id="" name="pemohon" placeholder="Isikan Nama" required readonly>
                    </div>
 -->
                    <div class="form-group">
                      <label for="">PEMOHON</label>
                          <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" id="" name="pemohon" readonly>
                    </div>
                    
					
					           <div class="form-group">
                      <label type="hidden" for="">TTD Pemohon</label>
                        <select name="ttd_pemohon" class="form-control">
                          <option>--TTD Pemohon--</option>
                            <?php foreach($idpemohon as $data) {
                          if(!in_array($data['foto'],$for_ttdmenggg)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>


                     <div class="form-group">
                     <!--  <label type="hidden" for="">TTD Pemohon</label> -->
                  <input type="hidden" class="form-control" value="<?php echo $ttd_mengetahui; ?>" id="" name="ttd_mengetahui" placeholder="">
                    </div>

                     <div class="form-group">
                     <!--  <label type="hidden" for="">TTD Pemohon</label> -->
                  <input type="hidden" class="form-control" value="<?php echo $ttd_menyetujui; ?>" id="" name="ttd_menyetujui" placeholder="">
                    </div>

                 <?php endif;?>

    <?php 
            $koderole=($this->session->userdata('koderole'));
            $nama=($this->session->userdata('nama'));
            if($koderole=='4' AND $nama=='Manager Depti'):
          ?> 


<!--                     <div class="form-group">
                      <label for="">PEMOHON</label>
                        <input type="text" class="form-control" value="<?php echo $pemohon; ?>" id="" name="pemohon" placeholder="Isikan Nama" required readonly>
                    </div>
 -->
                    <div class="form-group">
                      <label for="">PEMOHON</label>
                          <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" id="" name="pemohon" readonly>
                    </div>
                    
          
                     <div class="form-group">
                      <label type="hidden" for="">TTD Pemohon</label>
                        <select name="ttd_pemohon" class="form-control">
                          <option>--TTD Pemohon--</option>
                            <?php foreach($idpemohon as $data) {
                          if(!in_array($data['foto'],$for_ttdmenggg)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>


                     <div class="form-group">
                     <!--  <label type="hidden" for="">TTD Pemohon</label> -->
                  <input type="hidden" class="form-control" value="<?php echo $ttd_mengetahui; ?>" id="" name="ttd_mengetahui" placeholder="">
                    </div>

                     <div class="form-group">
                     <!--  <label type="hidden" for="">TTD Pemohon</label> -->
                  <input type="hidden" class="form-control" value="<?php echo $ttd_menyetujui; ?>" id="" name="ttd_menyetujui" placeholder="">
                    </div>

                 <?php endif;?>

<?php 
            $koderole=($this->session->userdata('koderole'));
            $nama=($this->session->userdata('nama'));
            if($koderole=='21' AND $nama=='Manager Depker'):
          ?> 


<!--                     <div class="form-group">
                      <label for="">PEMOHON</label>
                        <input type="text" class="form-control" value="<?php echo $pemohon; ?>" id="" name="pemohon" placeholder="Isikan Nama" required readonly>
                    </div>
 -->
                    <div class="form-group">
                      <label for="">PEMOHON</label>
                          <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" id="" name="pemohon" readonly>
                    </div>
                    
          
                     <div class="form-group">
                      <label type="hidden" for="">TTD Pemohon</label>
                        <select name="ttd_pemohon" class="form-control">
                          <option>--TTD Pemohon--</option>
                            <?php foreach($idpemohon as $data) {
                          if(!in_array($data['foto'],$for_ttdmenggg)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>


                     <div class="form-group">
                     <!--  <label type="hidden" for="">TTD Pemohon</label> -->
                  <input type="hidden" class="form-control" value="<?php echo $ttd_mengetahui; ?>" id="" name="ttd_mengetahui" placeholder="">
                    </div>

                     <div class="form-group">
                     <!--  <label type="hidden" for="">TTD Pemohon</label> -->
                  <input type="hidden" class="form-control" value="<?php echo $ttd_menyetujui; ?>" id="" name="ttd_menyetujui" placeholder="">
                    </div>

                 <?php endif;?>

                 <?php 
            $koderole=($this->session->userdata('koderole'));
            $nama=($this->session->userdata('nama'));
            if($koderole=='18' AND $nama=='Manager HRD'):
          ?> 


<!--                     <div class="form-group">
                      <label for="">PEMOHON</label>
                        <input type="text" class="form-control" value="<?php echo $pemohon; ?>" id="" name="pemohon" placeholder="Isikan Nama" required readonly>
                    </div>
 -->
                    <div class="form-group">
                      <label for="">PEMOHON</label>
                          <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" id="" name="pemohon" readonly>
                    </div>
                    
          
                     <div class="form-group">
                      <label type="hidden" for="">TTD Pemohon</label>
                        <select name="ttd_pemohon" class="form-control">
                          <option>--TTD Pemohon--</option>
                            <?php foreach($idpemohon as $data) {
                          if(!in_array($data['foto'],$for_ttdmenggg)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>


                     <div class="form-group">
                     <!--  <label type="hidden" for="">TTD Pemohon</label> -->
                  <input type="hidden" class="form-control" value="<?php echo $ttd_mengetahui; ?>" id="" name="ttd_mengetahui" placeholder="">
                    </div>

                     <div class="form-group">
                     <!--  <label type="hidden" for="">TTD Pemohon</label> -->
                  <input type="hidden" class="form-control" value="<?php echo $ttd_menyetujui; ?>" id="" name="ttd_menyetujui" placeholder="">
                    </div>

                 <?php endif;?>



 <!-- end untuk Pemohon  -->
<!-- if($koderole=='19' OR $koderole=='4' OR $koderole=='21' OR $koderole=='18' AND $nama=='Kepala Departemen Personalia' OR $nama=='Kepala Departemen TI' OR $nama=='Kepala Departemen Keperawatan' OR $nama=='Kepala Departemen HRD' ):
 -->
 <!-- untuk Mengetahui (Kepala Departemen)  -->
                     <?php 
            $koderole=($this->session->userdata('koderole'));
            $nama=($this->session->userdata('nama'));
            if($koderole=='19' AND $nama=='Kepala Departemen Personalia'):
          ?> 

            <div class="form-group">
                    <!--   <label for="">PEMOHON</label> -->
                  <input type="hidden" class="form-control" value="<?php echo $pemohon; ?>" id="" name="pemohon" placeholder="">
                    </div>
                    
          
                     <div class="form-group">
                     <!--  <label type="hidden" for="">TTD Pemohon</label> -->
                  <input type="hidden" class="form-control" value="<?php echo $ttd_pemohon; ?>" id="" name="ttd_pemohon" placeholder="" >
                    </div>

                     <div class="form-group">
                     <!--  <label type="hidden" for="">TTD Pemohon</label> -->
                  <input type="hidden" class="form-control" value="<?php echo $ttd_menyetujui; ?>" id="" name="ttd_menyetujui" placeholder="">
                    </div>


                    <div class="form-group">
                      <label for="">MENGETAHUI</label>
                          <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" id="" name="mengetahui" readonly>
                    </div>


<!--                     <div class="form-group">
                      <label for="">MENGETAHUI</label>
                        <input type="text" class="form-control" value="<?php echo $mengetahui; ?>" id="" name="mengetahui" placeholder="Isikan Nama" required readonly>
                    </div> -->
                    
					
					         <div class="form-group">
                      <label type="hidden" for="">TTD Mengetahui</label>
                        <select name="ttd_mengetahui" class="form-control">
                          <!-- <option>--TTD Mengetahui--</option> -->
                            <?php foreach($idmengetahuii as $data) {
                          if(!in_array($data['foto'],$for_ttdmengg)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                     <?php endif;?>


                     <?php 
            $koderole=($this->session->userdata('koderole'));
            $nama=($this->session->userdata('nama'));
            if($koderole=='4' AND $nama=='Kepala Departemen TI'):
          ?> 

            <div class="form-group">
                    <!--   <label for="">PEMOHON</label> -->
                  <input type="hidden" class="form-control" value="<?php echo $pemohon; ?>" id="" name="pemohon" placeholder="">
                    </div>
                    
          
                     <div class="form-group">
                     <!--  <label type="hidden" for="">TTD Pemohon</label> -->
                  <input type="hidden" class="form-control" value="<?php echo $ttd_pemohon; ?>" id="" name="ttd_pemohon" placeholder="" >
                    </div>

                     <div class="form-group">
                     <!--  <label type="hidden" for="">TTD Pemohon</label> -->
                  <input type="hidden" class="form-control" value="<?php echo $ttd_menyetujui; ?>" id="" name="ttd_menyetujui" placeholder="">
                    </div>


                    <div class="form-group">
                      <label for="">MENGETAHUI</label>
                          <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" id="" name="mengetahui" readonly>
                    </div>


<!--                     <div class="form-group">
                      <label for="">MENGETAHUI</label>
                        <input type="text" class="form-control" value="<?php echo $mengetahui; ?>" id="" name="mengetahui" placeholder="Isikan Nama" required readonly>
                    </div> -->
                    
          
                   <div class="form-group">
                      <label type="hidden" for="">TTD Mengetahui</label>
                        <select name="ttd_mengetahui" class="form-control">
                          <!-- <option>--TTD Mengetahui--</option> -->
                            <?php foreach($idmengetahuii as $data) {
                          if(!in_array($data['foto'],$for_ttdmengg)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                     <?php endif;?>

                     <?php 
            $koderole=($this->session->userdata('koderole'));
            $nama=($this->session->userdata('nama'));
            if($koderole=='21' AND $nama=='Kepala Departemen Keperawatan'):
          ?> 

            <div class="form-group">
                    <!--   <label for="">PEMOHON</label> -->
                  <input type="hidden" class="form-control" value="<?php echo $pemohon; ?>" id="" name="pemohon" placeholder="">
                    </div>
                    
          
                     <div class="form-group">
                     <!--  <label type="hidden" for="">TTD Pemohon</label> -->
                  <input type="hidden" class="form-control" value="<?php echo $ttd_pemohon; ?>" id="" name="ttd_pemohon" placeholder="" >
                    </div>

                     <div class="form-group">
                     <!--  <label type="hidden" for="">TTD Pemohon</label> -->
                  <input type="hidden" class="form-control" value="<?php echo $ttd_menyetujui; ?>" id="" name="ttd_menyetujui" placeholder="">
                    </div>


                    <div class="form-group">
                      <label for="">MENGETAHUI</label>
                          <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" id="" name="mengetahui" readonly>
                    </div>


<!--                     <div class="form-group">
                      <label for="">MENGETAHUI</label>
                        <input type="text" class="form-control" value="<?php echo $mengetahui; ?>" id="" name="mengetahui" placeholder="Isikan Nama" required readonly>
                    </div> -->
                    
          
                   <div class="form-group">
                      <label type="hidden" for="">TTD Mengetahui</label>
                        <select name="ttd_mengetahui" class="form-control">
                          <!-- <option>--TTD Mengetahui--</option> -->
                            <?php foreach($idmengetahuii as $data) {
                          if(!in_array($data['foto'],$for_ttdmengg)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                     <?php endif;?>

                     <?php 
            $koderole=($this->session->userdata('koderole'));
            $nama=($this->session->userdata('nama'));
            if($koderole=='18' AND $nama=='Kepala Departemen HRD'):
          ?> 

            <div class="form-group">
                    <!--   <label for="">PEMOHON</label> -->
                  <input type="hidden" class="form-control" value="<?php echo $pemohon; ?>" id="" name="pemohon" placeholder="">
                    </div>
                    
          
                     <div class="form-group">
                     <!--  <label type="hidden" for="">TTD Pemohon</label> -->
                  <input type="hidden" class="form-control" value="<?php echo $ttd_pemohon; ?>" id="" name="ttd_pemohon" placeholder="" >
                    </div>

                     <div class="form-group">
                     <!--  <label type="hidden" for="">TTD Pemohon</label> -->
                  <input type="hidden" class="form-control" value="<?php echo $ttd_menyetujui; ?>" id="" name="ttd_menyetujui" placeholder="">
                    </div>


                    <div class="form-group">
                      <label for="">MENGETAHUI</label>
                          <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" id="" name="mengetahui" readonly>
                    </div>


<!--                     <div class="form-group">
                      <label for="">MENGETAHUI</label>
                        <input type="text" class="form-control" value="<?php echo $mengetahui; ?>" id="" name="mengetahui" placeholder="Isikan Nama" required readonly>
                    </div> -->
                    
          
                   <div class="form-group">
                      <label type="hidden" for="">TTD Mengetahui</label>
                        <select name="ttd_mengetahui" class="form-control">
                          <!-- <option>--TTD Mengetahui--</option> -->
                            <?php foreach($idmengetahuii as $data) {
                          if(!in_array($data['foto'],$for_ttdmengg)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                     <?php endif;?>
 <!-- end untuk Mengetahui  -->

 <!-- untuk Menyetujui (Direktur Utama) -->
					<?php 
            $koderole=($this->session->userdata('koderole'));
            if($koderole=='10'):
          ?> 

                            <div class="form-group">
                    <!--   <label for="">PEMOHON</label> -->
                  <input type="hidden" class="form-control" value="<?php echo $pemohon; ?>" id="" name="pemohon" placeholder="" >
                    </div>
                    
          
                     <div class="form-group">
                     <!--  <label type="hidden" for="">TTD Pemohon</label> -->
                  <input type="hidden" class="form-control" value="<?php echo $ttd_pemohon; ?>" id="" name="ttd_pemohon" placeholder="">
                    </div>

                  <div class="form-group">
                    <!--   <label for="">Mengetahui</label> -->
                  <input type="hidden" class="form-control" value="<?php echo $mengetahui; ?>" id="" name="mengetahui" placeholder="" >
                    </div>
                    
          
                     <div class="form-group">
                     <!--  <label type="hidden" for="">TTD Mengetahui</label> -->
                  <input type="hidden" class="form-control" value="<?php echo $ttd_mengetahui; ?>" id="" name="ttd_mengetahui" placeholder="">
                    </div>

                    <div class="form-group">
                      <label for="">MENYETUJUI</label>
                          <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" id="" name="menyetujui" readonly>
                    </div>

<!-- 					         <div class="form-group">
                      <label for="">MENYETUJUI</label>
                        <input type="text" class="form-control" value="<?php echo $menyetujui; ?>" id="" name="menyetujui" placeholder="Isikan Nama" required >
                    </div> -->
					
					         <div class="form-group">
                      <label type="hidden" for="">TTD Menyetujui</label>
                        <select name="ttd_menyetujui" class="form-control">
                          <!-- <option>--TTD Menyetujui--</option> -->
                            <?php foreach($idmengetahui as $data) {
                          if(!in_array($data['foto'],$for_ttdmeng)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>
 <?php endif;?>
 <!-- end untuk Menyutujui  -->



                   <!--  <div class="form-group">
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
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>formpermohonan" class="btn btn-warning btn-block btn-flat">Kembali</a>
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
    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <!-- <b>Version</b> 2.0 -->
      </div>
      <strong>Copyright &copy; 2018 <a href="#"></a></strong>
    </footer>
  </div><!-- ./wrapper -->
  <!-- page script -->  
 

<script>
    $(function() {
    $( "#datepicker1" ).datepicker({ dateFormat: "yy-mm-dd"});
    });
    $(function() {
    $( "#datepicker2" ).datepicker({ dateFormat: "yy-mm-dd"});
    });
      $(function() {
    $( "#datepicker3" ).datepicker({ dateFormat: "yy-mm-dd"});
    });
  </script>
