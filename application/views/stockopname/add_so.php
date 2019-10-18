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
        <h1>
          <b>TAMBAH SURAT STOCK OPNAME</b>
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
                <h3 class="box-title">FORM TAMBAH SURAT STOCK OPNAME</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>stockopname/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">

                    <div class="form-group">
                      <label for="">Tanggal</label>
                        <input type="text" class="form-control" id="datepicker1" name="tanggal" placeholder="yyyy-mm-dd" required>                        
                    </div>

                    <div class="form-group">

                      <label for="">No. Surat</label>
                        <input type="text" class="form-control" name="no_sp" placeholder="Isi No Surat" required>
                    </div>

                    <div class="form-group">
                      <label for="">Lampiran</label>
                        <input type="text" class="form-control" name="lampiran" placeholder="Isi Lampiran" required>                        
                    </div>
                      <div class="form-group">
                      <label for="">Perihal</label>
                        <input type="text" class="form-control" name="perihal" placeholder="Isi Perihal" required>                        
                    </div>

                     <div class="form-group">
                        <label for="">Tanggal Data Asset</label>
                        <input type="date" class="form-control" value="" id="" name="tgl_dataaset" placeholder="Isi data" required>
                    </div>

                    <div class="form-group">
                        <label for="">Batas Tanggal Di Tanda Tangani Oleh Penanggung Jawab Ruangan Serta Petugas Fixed Asset</label>
                        <input type="date" class="form-control" value="" id="" name="tgl_stockopname" placeholder="Isi data" required>
                    </div>

                <div class="form-group">
                        <label for="">Batas Tanggal Melaporkan Hasil Stock Opname kepada DepJangUm dan DepJangMed</label>
                        <input type="date" class="form-control" value="" id="" name="tgl_analisanilai" placeholder="Isi data" required>
                    </div>

                <div class="form-group">
                        <label for="">Batas Tanggal Diserahkannya Hasil Stock Opname ke Departemen Keuangan</label>
                        <input type="date" class="form-control" value="" id="" name="tgl_hasil" placeholder="Isi data" required>
                    </div>

                    <div class="form-group">
                        <label for="">Batas Tanggal Departemen Keuangan Melakukan Koreksi Atas Laporan Hasil Stock Opname</label>
                        <input type="date" class="form-control" value="" id="" name="tgl_koreksi" placeholder="Isi data" required>
                    </div>

                  
                </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>stockopname" class="btn btn-warning btn-block btn-flat">Kembali</a>
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

      $(function() {
    $( "#datepicker4" ).datepicker({ dateFormat: "yy-mm-dd"});
    });


      $(function() {
    $( "#datepicker5" ).datepicker({ dateFormat: "yy-mm-dd"});
    });

      $(function() {
    $( "#datepicker6" ).datepicker({ dateFormat: "yy-mm-dd"});
    });


  </script>
