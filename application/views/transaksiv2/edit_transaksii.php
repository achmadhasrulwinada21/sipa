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
          <b>EDIT DATA TRANSAKSI</b>
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
                <h3 class="box-title">FORM EDIT TRANSAKSI</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>transaksii/updatetransaksi" method="POST" enctype="multipart/form-data">

                

                  <div class="col-lg-6">

                  <div class="form-group">
                      <!-- <label for="">ID</label> -->
                        <input type="hidden" class="form-control" value="<?php echo $id_tr; ?>" id="" name="id_tr" placeholder="ID" required>                        
                    </div>     
                    
                  <div class="form-group">
                      <label type="hidden" for="">Nama Rumah Sakit</label>
                        <select name="koders" class="form-control" readonly="">
                          <option>--Pilih Nama RS--</option>
                      
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
                        <input type="text" class="form-control" value="<?php echo $periode; ?>" id="" name="periode" placeholder="Periode" required>                        
                    </div>
                    
                    <!--<div class="form-group">
                      <label for="">Tanggal</label>
                        <input value="<?php echo $cdate; ?>" type="text" id="datepicker1"   class="form-control"   name="cdate" placeholder="Tanggal" required>                        
                    </div> -->
                    
                  </div>
                                
                  </div>
                   <div class="col-lg-6">
                  <div class="form-group">
                      <label for="">Kode Uraian</label>
                        <select name="kd_uraian" class="form-control"  readonly="">
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
                        <input type="text" class="form-control" value="<?php echo $nilai_uraian; ?>" id="" name="nilai_uraian" placeholder="Nilai Uraian" required>                        
                    </div>
                                                             
                    <div class="form-group">
                       <input type="hidden" class="form-control" value="<?php echo $nama; ?>" id="" name="updateby" readonly>                  
                    </div>
                    
                                       
                    
                    </div>
                  </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>transaksii" class="btn btn-warning btn-block btn-flat">Kembali</a>
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
      <strong>Copyright &copy; 2015 <a href="#"></a></strong>
    </footer>
  </div><!-- ./wrapper -->
  <!-- page script -->
  
  <?php $this->load->view('inc/footer'); ?>
</body>
</html>


<script>

   



      // $(document).ready(function() {
      //   $('.datepicker1').datepicker({
      //     singleDatePicker: true,
          
      //     calender_style: "picker_4",
        
      // startDate: new Date(),
      // showDropdowns: true,
      // autoUpdateInput: true,

      // locale: {
      // format: 'YYYYMMDD '},
      



      //   },


      //    function(start, end, label) {
      //     console.log(start.toISOString(), end.toISOString(), label);
      //   });
      // });

$(document).ready(function() {


   $('#datepicker1').datepicker();
     function today(){
    var d = new Date();
    var curr_date = d.getDate();
    var curr_month = d.getMonth() + 1;
    var curr_year = d.getFullYear();
    document.write(curr_date + "-" + curr_month + "-" + curr_year);
}
   
  
});



  </script>

  
    
