<script language="JavaScript">
function menampilkan_jam(){
 if (!document.layers&&!document.all&&!document.getElementById)
 return
 var Digital=new Date()
 var jam=Digital.getHours()
 var menit=Digital.getMinutes()
 var detik=Digital.getSeconds()
 var dn="AM" 
 if (jam>12){
 dn="PM"
 jam=jam-12
 }
 if (jam==0)
 jam=12
 if (menit<=9)
 menit="0"+menit
 if (detik<=9)
 detik="0"+detik
//mengubah ukuran font jam
jamdigital="<font size='4' face='Impact' ><font size='4'>"+jam+":"+menit+":"
 +detik+" "+dn+"</font>"
if (document.layers){
document.layers.livejam.document.write(jamdigital)
document.layers.livejam.document.close()
}
else if (document.all)
livejam.innerHTML=jamdigital
else if (document.getElementById)
document.getElementById("livejam").innerHTML=jamdigital
setTimeout("menampilkan_jam()",1000)
 }

//-->
</script>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
// Create two variable with the names of the months and days in an array
    var monthNames = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
    var dayNames= ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"]

// Create a newDate() object
    var newDate = new Date();
// Extract the current date from Date object
    newDate.setDate(newDate.getDate());
// Output the day, date, month and year
    $('#Date').html(dayNames[newDate.getDay()] + ", " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

    setInterval( function() {
// Create a newDate() object and extract the seconds of the current time on the visitor's
    var seconds = new Date().getSeconds();
// Add a leading zero to seconds value
    $("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
    },1000);

    setInterval( function() {
// Create a newDate() object and extract the minutes of the current time on the visitor's
    var minutes = new Date().getMinutes();
// Add a leading zero to the minutes value
    $("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
    },1000);

    setInterval( function() {
// Create a newDate() object and extract the hours of the current time on the visitor's
    var hours = new Date().getHours();
// Add a leading zero to the hours value
    $("#hours").html(( hours < 10 ? "0" : "" ) + hours);
    }, 1000);
    });
</script>
<script type="text/javascript">
function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

    return false;
    return true;
}
</script>

<body class="skin-blue" onload="menampilkan_jam()">
      <section class="content-header">
        <h1>
          <b>DATA TARGET KINERJA RUMAH SAKIT  </b>
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
              <div class="clock">
                        
                        <div id="livejam"></div>
                        <div id="Date"></div>
                        <br>
                        <br>
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>C_targetkinerja" class="btn btn-primary no-radius dropdown-toggle"><i class="glyphicon glyphicon-circle-arrow-left"></i> KEMBALI </a>
              
        <!-- <form role="form" action="<?php echo base_url(); ?>laporan_kinerjahermina/cetak_kinerja" method="POST" enctype="multipart/form-data">  -->
        
        <div class="form-group">
          <!-- <div class="input-group col-sm-5" >
          
            <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
              <input type="text" autocomplete="off" id="tanggal" name="inputtanggal" class="form-control" >
            <span class="input-group-btn">

          <button formtarget="_blank" type="submit" class="btn btn-primary btn-block btn-flat" >Print PDF</button> 

      </form>  -->
       </div>  
        
        <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>laporan_kinerjahermina/cetak_kinerja" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> PRINT </a>-->
               <div class="row">
                <div class="col-md-12">
             
               <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
        <div class="table-responsive">
                <div class="box-body">
                 <table id="tb-datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr align="center">
                      <th>NO URUT</th>
                      <th>PERIODE</th>
                     
                      <th>NAMA URAIAN</th>
                      <th>NILAI TARGET PERTAHUN</th>
                      <th>NILAI TARGET PERHARI</th>
                      <th>NILAI TARGET PERMINGGU</th>
                      <th>NILAI TARGET PERBULAN</th>
                      
                     
                      <th>AKSI</th>
                     
                     
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_abks as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['periode']; ?></td>
                       
                       <td><?php echo $row['nama_uraiankrs']; ?></td>      
                       <td><?php echo $row['nilai_target']; ?></td>
                       <td><?php echo number_format($row['nilai_targeth'],2,",","."); ?></td>
                       <td><?php echo number_format($row['nilai_targetm'],2,",","."); ?></td>
                       <td><?php echo number_format($row['nilai_targetb'],2,",","."); ?></td>
                      
                      
                    
                     
                     <td>
                     <a class="btn btn-warning btn-sm" data-toggle="modal"  data-target="#modal_edit<?php echo $row['id_targetkrs'];?>"><i class="glyphicon glyphicon-edit"></i></a> 
                      <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>C_targetkinerja/hapustargetkrs/<?php echo $row['id_targetkrs']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                     </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                
                </table>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
		</div>
        <!-- Main row -->


<!-- EDIT -->
        <?php
        foreach($data_targetkrs as $i){
        $id_targetkrs = $i['id_targetkrs'];
        $nama_rs = $i['nama_rs'];
        $kode_rs = $i['kode_rs'];
        $nama_uraiankrs = $i['nama_uraiankrs'];
        $nilai_target = $i['nilai_target'];
        $nilai_targeth = $i['nilai_targeth'];
        $nilai_targetm = $i['nilai_targetm'];
        $nilai_targetb = $i['nilai_targetb'];
        
        
         ?>
<div id="modal_edit<?php echo $id_targetkrs;?>" class="modal fade">
  <div class="modal-dialog modal-md">
    <!-- <div class="modal-content"> -->
  <div class="panel panel-primary">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">EDIT</h4></td>
      </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>C_targetkinerja/updatetargetkrs" method="POST" enctype="multipart/form-data">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $id_targetkrs; ?>" id="" name="id_targetkrs">
                    </div>

                    <div class="form-group">
                      <label for="">NAMA RS</label>
                        <input type="text" class="form-control" value="<?php echo $nama_rs; ?>" id="" name="nama_rs" readonly>
                    </div>
                    <div class="form-group">
                      
                        <input type="hidden" class="form-control" value="<?php echo $kode_rs; ?>" id="" name="kode_rs" readonly>
                    </div>

                     <div class="form-group">
                      <label for="">URAIAN</label>
                        <input type="text" class="form-control" value="<?php echo $nama_uraiankrs; ?>" id="" name="nama_uraiankrs" required>
                    </div>

                     <div class="form-group">
                      <label for="">NILAI TARGET</label>
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" value="<?php echo $nilai_target; ?>" id="" name="nilai_target" > 
                      </div>         
                    </div>
                                                                     
                   
                           </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>C_targetkinerja" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>   
              
              </div>
            </div>
          </div>
        </div> 
             <?php } ?>


<!-- TAMBAH -->
       <?php
        foreach($data_targetkrs as $i){
        $id_targetkrs = $i['id_targetkrs'];
        $nama_rs = $i['nama_rs'];
        $nilai_target = $i['nilai_target'];
        
        
         ?>

<div id="modal_tambah" class="modal fade">
  <div class="modal-dialog modal-md">
    <!-- <div class="modal-content"> -->
  <div class="panel panel-primary">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">TAMBAH</h4></td>
      </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>C_targetkinerja/savedata" method="POST" enctype="multipart/form-data">
                    <table class="table table-bordered table-striped">
                     
                      
                                               
                    </div>

                     
                   
                    <div class="form-group col-lg-12 ">

                      <label for="">NAMA RS</label>
                        <select name="nama_rs" class="form-control" required>
                          <option>--Pilih Nama Rumah Sakit--</option>
                          <?php foreach($get_rs as $row) { ?>
                              <option value="<?php echo $row['namars'] ?>"> <?php echo $row['namars'] ?></option>
                          <?php } ?>
                        </select> 
                    </div>

                     <div class="form-group col-lg-6 ">
                      <?php
                          foreach($get_uraian as $row){ ?>
                     <input type="text" name="nama_uraiankrs[]" class="form-control" value="<?php echo $row -> nama_uraiankrs; ?>" readonly> <input type="text" name="nilai_target[]" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="Nilai Target" required="">
                     <br>
                         <?php } ?>
                    </div>

                   
 
                   
                     
                
                </div>
               
                

                   


                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>C_targetkinerja" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
                </table>
               </form>
              
              </div>
            </div>
 
        </div> 
             <?php } ?>
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
   