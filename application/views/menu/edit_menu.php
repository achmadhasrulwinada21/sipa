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
          <b>EDIT DATA MENU</b>
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
                  <form role="form" action="<?php echo base_url(); ?>menu/updatemenu" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">ID</label>
                        <input type="text" class="form-control" value="<?php echo $id; ?>" id="" name="id" readonly>
                    </div>

                    <div class="form-group">
                      <label for="">MENU 1</label>
                        <input type="text" class="form-control" value="<?php echo $menu1; ?>" id="" name="menu1" required>                        
                    </div>
					
					<div class="form-group">
                      <label for="">MENU 2</label>
                        <input type="text" class="form-control" value="<?php echo $menu2; ?>" id="" name="menu2" required>                        
                    </div>
					<div class="form-group">
                      <label for="">MENU 3</label>
                        <input type="text" class="form-control" value="<?php echo $menu3; ?>" id="" name="menu3" required>                        
                    </div>
					<div class="form-group">
                      <label for="">MENU 4</label>
                        <input type="text" class="form-control" value="<?php echo $menu4; ?>" id="" name="menu4" required>                        
                    </div>
					<div class="form-group">
                      <label for="">MENU 5</label>
                        <input type="text" class="form-control" value="<?php echo $menu5; ?>" id="" name="menu5" required>                        
                    </div>
					<div class="form-group">
                      <label for="">MENU 6</label>
                        <input type="text" class="form-control" value="<?php echo $menu6; ?>" id="" name="menu6" required>                        
                    </div>
					<div class="form-group">
                      <label for="">MENU 7</label>
                        <input type="text" class="form-control" value="<?php echo $menu7; ?>" id="" name="menu7" required>                        
                    </div>
                                            

                  </div>
                  </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>menu" class="btn btn-warning btn-block btn-flat">Kembali</a>
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