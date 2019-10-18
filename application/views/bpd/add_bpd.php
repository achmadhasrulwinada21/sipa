<!DOCTYPE html>
<html>
<head>
  <link href="<?php echo base_url(); ?>assets/dist/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <?php $this->load->view('inc/head'); ?>
  
</head>
<body class="skin-blue">
  <!-- wrapper di bawah footer -->
  <div class="wrapper">

    <?php $this->load->view('inc/head2'); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <?php $this->load->view('inc/sidebar'); ?>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>TAMBAH DATA STPD</b>
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
                <i class="fa fa-plus"></i>
                <h3 class="box-title"> A. FORM ISIAN MEMORANDUM</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>stpd/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                    <div class="form-group">

                      <label for="">1.Kepada YTH</label>
                        <input type="text" class="form-control" value="" id="" name="kepadayth1" placeholder="Kepada YTH" required>
                    </div>

                    <div class="form-group">
                      <label for="">2.Sekretaris</label>
                        <input type="text" class="form-control" value="" id="" name="kepadayth2" placeholder="Kepada YTH" required>                        
                    </div>
                      <div class="form-group">
                      <label for="">3.Dari</label>
                        <input type="text" class="form-control" value="" id="" name="kepaladepartemen" placeholder="Dari Pemohon/Kepala Departemen" required>                        
                    </div>
                    <div class="form-group">
                      <label for="">4.Hari/Tanggal</label>
                        <input type="text" class="form-control" value="" id="datepicker1" name="haritanggal" placeholder="yyyy-mm-dd" required>                        
                    </div>
                     <div class="form-group">
                      <label for="">5.Perihal</label>
                        <input type="text" class="form-control" value="" id="" name="perihal" placeholder="perihal" required>                        
                    </div>
                     <div class="form-group">
                      <label for="">6.Lampiran</label>
                        <input type="text" class="form-control" value="" id="" name="lampiran" placeholder="lampiran" required>                        
                    </div>
                     <div class="form-group">
                      <label for="">7.Nama Yang Ditugaskan</label>
                          <input type="text" class="form-control" value="" id="" name="namakaryawanditugaskan1" placeholder="Nama yang ditugaskan" required> 
                    </div>

                     <div class="form-group">
                      <label for="">8.Tanggal Pelaksanaan</label>
                      <input type="text" class="form-control" value="" id="datepicker2" name="tanggalpelaksanaan" placeholder="Tanggal Pelaksanaan" required> 
                    </div>
                     
                    <div class="form-group">
                      <label for="">9.Kegiatan</label>
                      <textarea rows="4" cols="50"  class="form-control" name="kegiatan"> </textarea> 
                       
                    </div>
                      <div class="form-group">
                      <label for="">10.Mengetahui Kepala Departemen</label>
                       <input type="text"  class="form-control" name="kadep"> </input> 
                       
                    </div>

                    <div class="form-group">
                      <label for="">11.Approve Kepala Departemen</label>
                      <br/>
                      <input type="checkbox"   name="kadepcheck" value="1" text="Sudah Dilihat" >Ya,Sudah Dilihat Dan Dibaca</input> 

                       
                    </div>
                      <div class="form-group">
                      <label for="">12.Mengetahui Direktur Operasional Dan Umum</label>
                      <input type="text"  class="form-control" name="direktur"> </input> 
                       
                    </div>
                     <div class="form-group">
                      <label for="">13.Approve Direktur Operasional Dan Umum</label>
                      <br/>
                      <input type="checkbox"   name="direkturcheck"  text="Sudah Dilihat" >Ya,Sudah Dilihat Dan Dibaca</input> 

                       
                    </div>
                    <div class="form-group">
                      <label for="">14.Catatan Direktur(Director Only)</label>
                     <textarea rows="4" cols="50"  class="form-control" name="catatandirektur"> </textarea> 
                       
                    </div>


                    <div class="form-group">
                      <label for="">15.Status Dokumen(Director Only)</label>
                   <select name="statusdokumen" class="form-control" required>
                          <option>--Pilih Status Dokumen--</option>
                          <?php foreach($optstatusdoc as $row)  {  $macamstatusdoc=$row['nama_statusdoc']; $kodemacamstatusdoc=$row['kodestatusdoc'];?>
                           
                              <option value="<?php echo $row['kodestatusdoc'] ?>"><?php echo $row['nama_statusdoc'] ?></option>


                          <?php } ?>
                        </select>  
                    </div>
                    
                  </div><div class="col-lg-6">
                     <div class="box-header">
                <i class="fa fa-plus"></i>
                      <h3 class="box-title"> B. FORM ISIAN RKK (RENCANA KUNJUNGAN KERJA)</h3>
                    </div>
                    <div class="form-group">
                      <label for="">1.Nama Project</label>
                      <input type="text"  class="form-control" name="namaproject" placeholder="Nama Project"> </input>               
                    </div>

                     <div class="form-group">
                      <label for="">2. Nama Rumah Sakit(RS)</label>
                        <select name="namacabangrs" class="form-control" required>
                          <option>--Pilih Cabang --</option>
                          <?php foreach($optcabang as $row) { $macamcabang=$row['namars']; $kodemacamcabang=$row['koders'];?>
                           
                              <option value="<?php echo $row['koders'] ?>"><?php echo $row['namars'] ?></option>


                          <?php } ?>
                        </select> 
                    </div>
                    <div class="form-group">
                      <label for="">3. Departemen</label>
                       <select name="namadepartemen" class="form-control" required>
                          <option>--Pilih Departemen--</option>
                          <?php foreach($optrole as $row)  {  $macamrole=$row['nama_role']; $kodemacamrole=$row['koderole'];?>
                           
                              <option value="<?php echo $row['koderole'] ?>"><?php echo $row['nama_role'] ?></option>


                          <?php } ?>
                        </select>  
                    </div>
                    <div class="form-group">
                      <label for="">4.Waktu Pelaksanaan</label>
                      <input type="text"  class="form-control" id="datepicker3" name="waktupelaksanaan" placeholder="yyyy-mm-dd"> </input>               
                    </div>
                    <div class="form-group">
                      <label for="">5. Nama PIC</label>
                        <input type="text" class="form-control" value="" id="" name="namapic" placeholder="Nama PIC">                        
                    </div>
                    
                  </div>


                  <div class="col-lg-6">

                    <div class="form-group">
                      <label for="">6.Nama Karyawan Yang Bertugas</label>
                      <input type="text" class="form-control" value="" id="" name="namakaryawan" placeholder="Nama Karyawan">       
                    </div>

                    <div class="form-group">
                      <label for="">7. Nama Kegiatan</label>
                      

                            <textarea style="height:100px"  class="form-control" name="namakegiatan" placeholder="Tulis Kegiatan"></textarea>    
                      
                    </div>
                    <div class="form-group">
                      <label for="">8. Sarana Dan Prasarana Yang Diperlukan</label>
                      
                          <textarea style="height:100px"  class="form-control" name="saranaprasarana" placeholder="Tulis Sarana/Prasarana"></textarea>    
                      
                    </div>
                    <div class="form-group">
                      <label for="">9.Target Kegiatan</label>
                        <textarea style="height:100px"  class="form-control" name="targetkegiatan" placeholder="Target Kegiatan"></textarea>                
                    </div>

                 

                       <div class="form-group">
                      <label for="">10.Kendala</label>
                        <textarea style="height:100px"  class="form-control" name="kendala" placeholder="Uraian Kegiatan"></textarea>                
                    </div>
                       <div class="form-group">
                      <label for="">11.Solusi</label>
                        <textarea style="height:100px"  class="form-control" name="solusi" placeholder="Uraian Kegiatan"></textarea>                
                    </div>
                       <div class="form-group">
                      <label for="">12.Output Kegiatan</label>
                        <textarea style="height:100px"  class="form-control" name="outputkegiatan" placeholder="Output Kegiatan"></textarea>                
                    </div>

                      <div class="form-group">
                      <label for="">13.Mengetahui Kepala Departemen</label>
                      <input type="text" class="form-control" value="" id="" name="namakadep" placeholder="Nama Kepala Departemen">  
                    </div>
                       <div class="form-group">
                      <label for="">14.Approve Kepala Departemen </label>
                      <br/>
                      <input type="checkbox"   name="mengetahuikadeprkk"  text="Sudah Dilihat" >Ya,Sudah Dilihat Dan Dibaca</input> 
    
                    </div>

                       <div class="form-group">
                      <label for="">15. Upload Dokumen CIS</label>
                        <input type="file" class="form-control"  name="file_uploadcis" placeholder="">                        
                    </div>

                      <div class="form-group">
                      <label for="">16. Upload Dokumen Surat Tugas</label>
                        <input type="file" class="form-control"  name="file_uploadsurattugas" placeholder="">                        
                    </div>

                      <div class="form-group">
                      <label for="">17. Upload Dokumen Itenary </label>
                        <input type="file" class="form-control" name="file_uploaditenary" placeholder="">                        
                    </div>
                   
                   
                    
                  </div>
                 
                  
                </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>stpd" class="btn btn-warning btn-block btn-flat">Kembali</a>
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
  

    
    <?php $this->load->view('inc/footer'); ?>
</body>
</html>



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
