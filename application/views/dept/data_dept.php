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
        <?php foreach ($jd_dept as $v) { ?>
        <h4>
          <b>
            <?php echo $v->jdl_dept ;?>
          </b>
          <a href="<?php echo base_url(); ?>dept/editjd/<?php echo $v->id_jd ?>"><i class="fa fa-pencil"></i></a></h4>
            
       <?php
               
        } ?>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
              <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>dept/adddept" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH </a> -->
                <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>DataDepartemen_Pdf" target='blank' class="btn btn-success"><i class="fa fa-thumb-tack"></i> PRINT </a>  -->
              
			  
			  <div class="box">
                 <!--<span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>-->
                <!--<span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>-->
				<div class="table-responsive">
                <div class="box-body">
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <!-- <th>no</th>-->
                      <th>NAMA DEPARTEMEN</th>
                      <th>ALAMAT</th>
                      <th>KEPALA DEPARTEMEN</th>
                      <th>DIREKTUR</th>
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_dept as $dt) { $no++ ?>
                    <tr>
                       <!--<td><?php echo $no; ?></td>-->
                      <td><?php echo $dt['nama_dept']; ?></td>
                      <td><?php echo $dt['alamat']; ?></td>
                      <td><?php echo $dt['kepala_dept']; ?></td>
                      <td><?php echo $dt['direktur']; ?></td>
                      <td>
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>dept/editdept/<?php echo $dt['kode_dept']; ?>"><i class="fa fa-pencil"></i></a>
                      <!--<a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>dept/hapusdept/<?php echo $dt['kode_dept']; ?>"><i class="fa fa-trash"></i></a>-->
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Main row -->
       
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
      <script src="<?php echo base_url(); ?>assets/dist/datatables/jquery.dataTables.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/dist/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
      <script type="text/javascript">
        $(function() {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": true,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
            //waktu flash data :v
      $(function(){
      $('#pesan-flash').delay(4000).fadeOut();
      $('#pesan-error-flash').delay(5000).fadeOut();
      });
    </script>
</body>
</html>