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
        <?php foreach ($jd_detail as $v) { ?>
        <h4>
          <b>
            <?php echo $v->jdl_detail ;?>
          </b>
          <a href="<?php echo base_url(); ?>detail/editjd/<?php echo $v->id_jd ?>"><i class="fa fa-pencil"></i></a></h4>
            
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
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>detail/adddetail" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH </a>
				<a style="margin-bottom:3px" href="<?php echo base_url(); ?>LaporanDetail/cetak_detail" target='blank' class="btn btn-danger"><i class="fa fa-thumb-tack"></i> PRINT ALL </a>
			  <button data-toggle="modal" data-target="#myModal" class="btn btn-success"><span class="fa fa-thumb-tack"></span>PRINT BY ID</button>
			  <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
				<div class="table-responsive">
                <div class="box-body">
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>DETAIL</th>
                      <th>QTY</th>
                      <th>SATUAN</th>
                      <th>KETERANGAN</th>
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_detail as $de) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $de['kode_detail']; ?></td>
                      <td><?php echo $de['qty']; ?></td>
                      <td><?php echo $de['sat']; ?></td>
                      <td><?php echo $de['ket']; ?></td>
                      <td>
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>detail/editdetail/<?php echo $de['id_detail']; ?>"><i class="fa fa-pencil"></i></a>
                      <a onclick="return confirm('Anda Yakin Hapus Data ini??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>detail/hapusdetail/<?php echo  $de['id_detail']; ?>"><i class="fa fa-trash"></i></a>
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
  
  <!-- modal -->
      <div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
	<div class="panel panel-primary">
	     <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">CETAK</h4></td>
      </div>
	      <div class="modal-body">

<form action="<?php echo base_url(); ?>LaporanDetail/cetak_detail" method="POST">
        <div class="form-group"> 
             KODE:<br>
         <select name="kode_detail" class="form-control">
       <option> Pilih Kode : </option>
	   <?php foreach($id_detail as $dt) { ?>
            <option value=<?php echo $dt['kode_detail'] ; ?>>
             <?php echo $dt['kode_detail']?></option>
            <?php  } ?>
          </select>
        </div>
          
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          <input type="submit" class="btn btn-primary" value="CETAK">
        </div>
                </fieldset>
                </form>   
                </div></div></div></div></div>                          
  <!-- end modal -->
    
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