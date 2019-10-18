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
          <b>DATA REKANAN LISTRIK</b>
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
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>rekananlistrik/addrekanan" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH DATA REKANAN </a>
               <a style="margin-bottom:3px" href="<?php echo base_url(); ?>laporanrekanan/cetak_rekanan" target='blank' class="btn btn-danger"><i class="fa fa-thumb-tack"></i> PRINT ALL </a>
       <!-- <button data-toggle="modal" data-target="#myModal" class="btn btn-success"><span class="fa fa-thumb-tack"></span>PRINT BY ID</button> -->
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
                    
                <div class="box-body">
                  <div class="table-responsive">
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                  <!--    <th>NO</th>-->
                    <!--   <th>IDTR</th> -->
                      <th>NO</th>
                      <th>NAMA RUMAH SAKIT</th>
                      <th>URAIAN KERJA</th>
                      <th>KM MANDIRI</th>
                      <th>TRISANDIRA</th>
                      <th>TRISAHABAT</th>
                      <th>TRABAS REKA BUANA</th>
                      <th>SEKAWAN KONTRINDO</th>
                     <!-- <th>Tanggal</th>
                      <th>createddate</th>
                      <th>updateby</th>
                      <th>createddate</th>
                      <th>updatedate</th>-->
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_rekanan as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                          <!--<td><?php echo $row['id_tr']; ?></td>--> 
                      <!--<td><?php echo $row ['id_rek_listrik'] ; ?></td>-->
                      <td><?php echo $row['nm_rs'] ; ?></td>
                      <td><?php echo $row['uraian_kerja'] ; ?></td>
                      <td><input type="checkbox" disabled="" <?php echo $c1= $row['km_mandiri']; if($c1=='t') echo " Checked "?>></td>
                      <td><input type="checkbox" disabled="" <?php echo $c1= $row['Trisandira']; if($c1=='t') echo " Checked "?>></td>
                      <td><input type="checkbox" disabled="" <?php echo $c1= $row['Trisahabat']; if($c1=='t') echo " Checked "?>></td>
                      <td><input type="checkbox" disabled="" <?php echo $c1= $row['Tribas_reka_buana']; if($c1=='t') echo " Checked "?></td> 
                      <td><input type="checkbox" disabled="" <?php echo $c1= $row['sekawan_kontrindo']; if($c1=='t') echo " Checked "?>></td> 
                    <!--  <td><?php echo $row['tanggal'] ; ?></td>    
                      <td><?php echo $row['createdby']; ?></td> 
                      <td><?php echo $row['updateby'] ; ?></td> 
                      <td><?php echo $row['createddate']; ?></td>         
                      <td><?php echo $row['updatedate']; ?></td>--> 
                      <td>
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>rekananlistrik/editrekanan/<?php echo $row['id_rek_listrik']; ?>"><i class="fa fa-pencil"></i></a>
                      <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>rekananlistrik/hapusrekanan/<?php echo $row['id_rek_listrik']; ?>"><i class="fa fa-trash"></i></a>
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
      <strong>Team Hermina &copy; 2018 <a href="#"></a></strong> 

      <div hidden="" id="time"></div>
    </footer>
  </div><!-- ./wrapper -->
  <!-- page script -->
  
<!--Modal-->

<!--<div class="modal fade" id="modalwaktu" role="dialog">
    <div class="modal-dialog">-->

        <!-- Modal content-->
<!--        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Peringatan!!</h4>
            </div>

            <div class="modal-body">
              
                <p>Batas Waktu Pengisian Eksekutif Direktur Sampai Dengan Tanggal 10. Diharapkan Untuk Segera Mengisi Data Dengan Benar. </p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
               
            </div>
        </div>

    </div>
</div>-->
    
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
    var now = new Date(), // current date
        //months = ['January', 'February', '...']; // you get the idea
        //time = now.getHours() + ':' + now.getMinutes(), // again, you get the idea

        // a cleaner way than string concatenation
        date = [now.getDate()];
                //months[now.getMonth()],
                //now.getFullYear()].join(' ');

    // set the content of the element with the ID time to the formatted string
   // document.getElementById('time').innerHTML = [date, time].join(' / ');

    var setwaktu=document.getElementById('time').innerHTML = [date].join('');


    //alert(setwaktu);


    // call this function again in 1000ms
    //setTimeout(updateClock, 1000);

    //Fungsi Warning Tanggal Habis

    //echo (setwaktu);


if(setwaktu>'4'){

  //document.getElementById('id dari div').innerHTML.hidden=true;

  $('#modalwaktu').modal({
       show: 'true'
     });

   //alert("Berhasil")

} else if (setwaktu<='20'){

  $('#modalwaktu').modal({
       show: 'true'
     });

   //alert("Oke")

 } else {

  function hide (elements) {
  elements = elements.length ? elements : [elements];
   for (var index = 0; index < elements.length; index++) {
     elements[index].style.display = 'none';
   }
 }

hide(document.getElementById('tomboltambahkan'));

//alert("NO")
} 


}

updateClock(); // initial call  


</script>


<!-- 
<table border="1" cellspacing="0" cellpadding= "20">
    <tr>
    <td id="id1" ></td>
    </tr>
</table>


<script>
    document.getElementById('id1').style.backgroundColor='#003F87';
</script> -->