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
          <b>EDIT DATA</b>
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
                <h3 class="box-title">FORM EDIT</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>machine/updatemachine" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
					<div class="form-group">
                      <!-- <label for="">ID</label>-->
                        <input type="hidden" class="form-control" value="<?php echo $id_machine; ?>" id="" name="id_machine" readonly>
					</div>
                    <div class="form-group">
                      <label for="">KODE UNIT</label>
                        <input type="text" class="form-control" value="<?php echo $kode_machine; ?>" id="" name="kode_machine">
                    </div>

                    <div class="form-group">
                      <label for="">NO</label>
                        <input type="text" class="form-control" value="<?php echo $no; ?>" id="" name="no" required>                        
                    </div>
                    <div class="form-group">
                      <label for="">SATUAN</label>
                        <input type="text" class="form-control" value="<?php echo $sat; ?>" id="" name="sat" required>                        
                    </div>
                    <div class="form-group">
                      <label for="">JUMLAH</label>
                        <input type="text" class="form-control" value="<?php echo $jumlah; ?>" id="" name="jumlah" required>                        
                    </div>
                    
                         <div class="form-group">
                      <label for="">KETERANGAN</label>
                        <input type="text" class="form-control" value="<?php echo $ket; ?>" id="" name="ket">                        
                    </div>

                  </div>
                  </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>machine" class="btn btn-warning btn-block btn-flat">Kembali</a>
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
      <strong>Copyright &copy; <?php echo date('Y');?> CIS.</strong> All rights reserved.
    </footer>
  </div><!-- ./wrapper -->
  <!-- page script -->  
  <?php $this->load->view('inc/footer'); ?>
</body>
</html>