<!DOCTYPE html>
<html>
<head>
  <link href="<?php echo base_url(); ?>assets/dist/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <?php $this->load->view('inc/head'); ?>
</head>
<body class="skin-blue">
  <div class="wrapper">

    <?php $this->load->view('inc/head2'); ?>
    <aside class="main-sidebar">
      <?php $this->load->view('inc/sidebar'); ?>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
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
                  <form role="form" action="<?php echo base_url(); ?>transaksikeuangan/updatetransaksikeuangan" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                  <div class="form-group">
                        <input type="text" class="form-control" value="<?php echo $id_trkeu; ?>"  name="id_trkeu" placeholder="ID" required>
     
                    </div>     
                   <div class="form-group">
                      <label type="hidden" for="">Nama Rumah Sakit</label>
                        <select name="koders" class="form-control" readonly>
                          <option>--Pilih Kode RS--</option>
                            <?php foreach($kdrs as $datakd) {
                          if(!in_array($datakd['koders'],$kdrs_post)){ ?>
                              <option  value="<?php echo $datakd['koders'] ?>"><?php echo $datakd['namars'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datakd['koders'] ?>"><?php echo $datakd['namars'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>
                    <div class="form-group">
                      <label for="">Periode</label>
                        <input type="text" class="form-control" value="<?php echo $periode; ?>"  name="periode" placeholder="Periode" required>                        
                    </div>
                    <div class="form-group">
                      <label for="">Tanggal</label>
                        <input type="date" class="form-control" value="<?php echo $cdate; ?>"  name="cdate" placeholder="Tanggal" required>                        
                    </div>
                  </div>         
                  </div>
                   <div class="col-lg-6">
                  <div class="form-group">
                      <label for="">Kode Uraian</label>
                        <select name="kd_uraian" class="form-control" readonly>
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
                        <input type="text" class="form-control" value="<?php echo $nilai_uraian; ?>" name="nilai_uraian" placeholder="Nilai Uraian" required>                        
                    </div>
                    </div>
                  </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>transaksikeuangan" class="btn btn-warning btn-block btn-flat">Kembali</a>
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

  
    
