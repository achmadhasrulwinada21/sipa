<!DOCTYPE html>
<html>
<head>
  <link href="<?php echo base_url(); ?>assets/dist/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <?php $this->load->view('inc/head'); ?>
  <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet"> 
  <link href="<?php echo base_url('assets/css/font-awesome.css');?>" rel="stylesheet">
  <script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
  <script src="<?php echo base_url('assets/js/jquery-1.8.3.min.js');?>"></script>

  <link rel="stylesheet" type="text/css" href="jquery-ui/jquery-ui.min.css">
  
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
      

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
				<a style="margin-bottom:3px" href="<?php echo base_url(); ?>LaporanEksekutifVar/cetak_eksekutifvar" target='blank' class="btn btn-danger"><i class="fa fa-thumb-tack"></i> PRINT ALL </a>
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
                      <th>Uraian</th>
                      <th>SAS HHG</th>
                      <th>Jtn</th>
                      <th>Kmyr</th>
                      <th>Bekasi</th>
                      <th>Depok</th>
                      <th>DM</th>
                      <th>Bogor</th>
                      <th>Pst</th>
                      <th>Pdrn</th>
                      <th>Tprahu</th>
                      <th>Skbm</th>
                      <th>Tgr</th>
                      <th>GW</th>
                      <th>Arca</th>
                      <th>Glxy</th>
                      <th>Plb</th>
                      <th>Cpt</th>
                      <th>Mks</th>
                      <th>Spg</th>
                      <th>Bymk</th>
                      <th>Solo</th>
                      <th>Ciruas</th>
                      <th>Yogya</th>
                      <th>Bitung</th>
                      <th>Mksr</th>
                      <th>Blkppn</th>
                      <th>Medan</th>
                      <th>Podomoro</th>
                      <th>Purwekerto</th>
                      <th>Capai</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; 
                       foreach($dataeksvar as $mo) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $mo['nama_uraian']; ?></td>
                      <td><?php echo $mo['hhg']; ?></td>
                      <td><?php echo $mo['jtn']; ?></td>
                      <td><?php echo $mo['kmyr']; ?></td>
                      <td><?php echo $mo['bks']; ?></td>
                      <td><?php echo $mo['depok']; ?></td>
                      <td><?php echo $mo['dm']; ?></td>
                      <td><?php echo $mo['bogor']; ?></td>
                      <td><?php echo $mo['pst']; ?></td>
                      <td><?php echo $mo['pdrn']; ?></td>
                      <td><?php echo $mo['tprahu']; ?></td>
                      <td><?php echo $mo['skbm']; ?></td>
                      <td><?php echo $mo['tgr']; ?></td>
                      <td><?php echo $mo['gw']; ?></td>
                      <td><?php echo $mo['arca']; ?></td>
                      <td><?php echo $mo['glxy']; ?></td>
                      <td><?php echo $mo['plb']; ?></td>
                      <td><?php echo $mo['cpt']; ?></td>
                      <td><?php echo $mo['mks']; ?></td>
                      <td><?php echo $mo['spg']; ?></td>
                      <td><?php echo $mo['bymk']; ?></td>
                      <td><?php echo $mo['solo']; ?></td>
                      <td><?php echo $mo['ciruas']; ?></td>
                      <td><?php echo $mo['yogya']; ?></td>
                      <td><?php echo $mo['bitung']; ?></td>
                      <td><?php echo $mo['mksr']; ?></td>
                      <td><?php echo $mo['blkppn']; ?></td>
                      <td><?php echo $mo['mdn']; ?></td>
                      <td><?php echo $mo['pdm']; ?></td>
                      <td><?php echo $mo['pwt']; ?></td>
                      <td><?php echo number_format ($mo['capai']); ?></td>
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
      <strong>Copyright &copy; <?php echo date('Y');?> </strong> All rights reserved.
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

<form action="<?php echo base_url(); ?>LaporanEksekutifVar/cetak_eksekutifvar" method="POST">
        <div class="form-group"> 
             Periode:<br>
         <select name="periode" class="form-control">
       <option> Pilih Periode : </option>
	   <?php foreach($periode as $dt) { ?>
            <option value=<?php echo $dt['periode'] ; ?>>
             <?php echo $dt['periode']?></option>
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