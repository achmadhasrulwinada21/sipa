<!DOCTYPE html>
<html>
<head>
  <link href="<?php echo base_url(); ?>assets/dist/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <?php $this->load->view('inc/head'); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript">

function formatCurrency(num) {
num = num.toString().replace(/\$|\,/g,'');
if(isNaN(num))
num = "0";
sign = (num == (num = Math.abs(num)));
num = Math.floor(num*100+0.50000000001);
cents = num%100;
num = Math.floor(num/100).toString();
if(cents<10)
cents = "0" + cents;
for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
num = num.substring(0,num.length-(4*i+3))+'.'+
num.substring(num.length-(4*i+3));
return (((sign)?'':'-') + 'Rp. ' + num + ',' + cents);
}
</script>
  
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
          <b>EDIT DATA TRANSAKSI BIAYA BPD</b>
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
                <h3 class="box-title">EDIT DATA TRANSAKSI BIAYA BPD</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>transaksibpd/updatebpd" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                    <div class="form-group">

                      <label for=""></label>
                        <input type="hidden" class="form-control" value="<?php echo $id_trbpd;?>" id="" name="id_trbpd" placeholder="" readonly="" >
                      </div> 

                    <div class="form-group">

                      <label for="">KODE KOMPONEN BIAYA</label>
                        <input type="text" class="form-control" value="<?php echo $kode_komponenbiaya; ?>"  name="kode_komponenbiaya" placeholder="Kode Komponen Biaya" required readonly>
                    </div>

                    <div class="form-group">
                      <label for="">KODE URAIAN BIAYA</label>
                        <input type="text" class="form-control" value="<?php echo $kode_uraianbiaya; ?>" id="" name="kode_uraianbiaya" placeholder="Kode Uraian Biaya" required>                        
                    </div>
                      <div class="form-group">
                      <label for="">NILAI BIAYA</label>
                        <input type="text" class="form-control" onkeyup="document.getElementById('format').innerHTML = formatCurrency(this.value);" value="<?php echo $nilaibiaya; ?>" id="" name="nilaibiaya" placeholder="Nilai Biaya" required/><span  id="format"></span>                       
                    </div>
                    <div class="form-group">
                      <label for="">RINCIAN</label>
                        <input type="text" class="form-control" value="<?php echo $rincian; ?>" id="" name="rincian" placeholder="Rincian" required>                        
                    </div>
                    <div class="form-group">
                      <label for="">KETERANGAN</label>
                        <input type="text" class="form-control" value="<?php echo $keterangan; ?>" id="" name="keterangan" placeholder="Keterangan" required>                        
                    </div>
                    <div class="form-group">
                      <label for="">QTY</label>
                        <input type="text" class="form-control" value="<?php echo $qty; ?>" id="" name="qty" placeholder="Qty" required>                        
                    </div>
                    <div class="form-group">
                      <label for="">STATUS</label>
                        <!-- <input type="text" class="form-control" value="<?php echo $status; ?>" id="" name="status" placeholder="Status" required>  -->   
                        <!-- <td><input type="checkbox" class="" name="status" echo $ai = $status
                      if ($ai='t') { Checked };/></td>   -->
                       <td><input type="checkbox" class="inline checkbox" name="status" value="false" id="checkbox1">
                       <script> $('#checkbox-value').text($('#checkbox1').val());
                      $("#checkbox1").on('change', function() {
                      if ($(this).is(':checked')) {
                      $(this).attr('value', 'Setuju');
                     } else {
                     $(this).attr('value', 'Menunggu');
                      }
                      $('#checkbox-value').text($('#checkbox1').val());});</script> </td> 
                    <div class="form-group" id="checkbox-value"></div>                  
                    </div>
                    
                    
                </div><!-- /.item -->

                 <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>transaksibpd" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
              
               
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
      <strong>Copyright &copy; <?php echo date('Y');?> <a href="#"></a></strong>
    </footer>
  </div><!-- ./wrapper -->
  <!-- page script -->
  

    
    <?php $this->load->view('inc/footer'); ?>


</body>
</html>