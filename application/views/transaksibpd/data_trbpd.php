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
          <b>DATA TRANSAKSI BIAYA BPD</b>
        </h1>
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
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>transaksibpd/addbpd" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH TRANSAKSI </a>
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
                <div class="box-body">
                  <div class="table-responsive">
                  <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO URUT</th>
                      <th>ID BPD</th>
                      <th>NAMA SEKRETARIS</th>
                      <th>JABATAN SEKRETARIS</th>
                      <th>NAMA KADEP</th>
                      <th>JABATAN KADEP</th>
                      <th>WAKTU TUGAS</th>
                      <th>STATUS</th>
                     
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_gabbpd as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['id_bpd']; ?></td>
                      <td><?php echo $row['namasekretaris']; ?></td>
                      <td><?php echo $row['jabatansekretaris']; ?></td>
                      <td><?php echo $row['namakadep']; ?></td>
                      <td><?php echo $row['jabatankadep']; ?></td>
                      <td><?php echo $row['waktutugas']; ?></td>     
                      <!-- <td><?php echo $row['status']; ?></td> -->
                      <td><input type="checkbox" name="status" echo $ai = $status
                      if ($ai='f') { Checked };/></td>
                     
                     <!--  <td> -->
                    <!--   <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>transaksibpd/addbpd <?php echo $row['id_bpd']; ?>"><i class="fa fa-plus"></i></a> -->
                      <!-- <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>transaksibpd/hapusbpd/<?php echo $row['id_trbpd']; ?>"><i class="fa fa-trash"> --></i></a>
                     <!--  </td>  -->
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO URUT</th>
                      <th>KODE KOMPONEN BIAYA</th>
                      <th>KODE URAIAN BIAYA</th>
                      <th>NILAI BIAYA</th>
                      <th>RINCIAN</th>
                      <th>KETERANGAN</th>
                      <th>QTY</th>
                      <th>CREATED DATE</th>
                      <!-- <th>STATUS</th> -->
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_trbpd as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['kode_komponenbiaya']; ?></td>
                      <td><?php echo $row['kode_uraianbiaya']; ?></td>
                      <td>Rp. <?php echo (number_format($row['nilaibiaya'], 2,',','.')); ?></td>
                      <td><?php echo $row['rincian']; ?></td>
                      <td><?php echo $row['keterangan']; ?></td>
                      <td><?php echo $row['qty']; ?></td>
                      <td><?php echo $row['createddate']; ?></td>
                      <!-- <td><?php echo $row['status']; ?></td> -->
                      <td>
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>transaksibpd/editbpd/<?php echo $row['id_trbpd']; ?>"><i class="fa fa-pencil"></i></a>
                      <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>transaksibpd/hapusbpd/<?php echo $row['id_trbpd']; ?>"><i class="fa fa-trash"></i></a>
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
      <strong>Copyright &copy; <?php echo date('Y');?> <a href="#"></a></strong>
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
      // $(function(){
      // $('#pesan-flash').delay(4000).fadeOut();
      // $('#pesan-error-flash').delay(5000).fadeOut();
      // });
    </script>
</body>
</html>