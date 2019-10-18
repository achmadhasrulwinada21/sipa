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
          <b>DATA TRANSAKSI VAR</b>
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
              <div id="tomboltambahkan">
            <a  style="margin-bottom:3px" href="<?php echo base_url(); ?>transaksikeuangan/addtransaksikeuangan" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH TRANSAKSI KEUANGAN </a>
                 </div>             
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div  class="box-title">
                  
                </div><!-- /.box-title -->
                <div class="box-body">
                  <div class="table-responsive">
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>IDTRKEU</th>
                      <!--   -->
                      <th>NAMA RUMAH SAKIT</th>
                      <th>PERIODE</th>
                      <th>KODE URAIAN</th>
                      <th>NILAI URAIAN</th>
                      <th>TANGGAL</th>
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $id_trkeu=0; foreach($data_transaksikeuangan as $row) { $id_trkeu++ ?>
                    <tr>
                      <td><?php echo $id_trkeu; ?></td>
                    <!--<td><?php echo $row['id_trkeu']; ?></td> -->
                      <td><?php echo $row['namars']; ?></td>
                      <td><?php echo $row['periode']; ?></td>
                      <td><?php echo $row['kodeur']; ?></td>
                      <td><?php echo $row['nilai_uraian']; ?></td>
                      <td><?php echo $row['cdate']; ?></td>            
                      <td>
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>transaksikeuangan/edittransaksikeuangan/<?php echo $row['id_trkeu']; ?>"><i class="fa fa-pencil"></i></a>
                      <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>transaksikeuangan/hapustransaksikeuangan/<?php echo $row['id_trkeu']; ?>"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Main row -->
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <!-- <b>Version</b> 2.0 -->
      </div>
      <strong>Copyright &copy; 2018 <a href="#"></a></strong> <div id="time"></div>
    </footer>
  </div><!-- ./wrapper -->
  <!-- page script -->

  
<!--Modal-->
<div class="modal fade" id="modalwaktu" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Peringatan!!</h4>
            </div>
            <div class="modal-body">
                <p>Batas Waktu Pengisian Eksekutif Keuangan Sampai Dengan Tanggal 10. Diharapkan Untuk Segera Mengisi Data Dengan Benar. </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
 
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
    </script>
</body>
</html>

<script>
  function updateClock() {
    var now = new Date(), 
        date = [now.getDate()];
    var setwaktu=document.getElementById('time').innerHTML = [date].join('');

if(setwaktu>'4'){
  $('#modalwaktu').modal({
       show: 'true'
     });

} else if (setwaktu<='15'){

  $('#modalwaktu').modal({
       show: 'true'
     });
 } else {
  function hide (elements) {
  elements = elements.length ? elements : [elements];
   for (var index = 0; index < elements.length; index++) {
     elements[index].style.display = 'none';
   }
 }
hide(document.getElementById('tomboltambahkan'));
} 
}
updateClock(); 
</script>