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
          <b>DATA REAL KINERJA RUMAH SAKIT  </b>
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
                        
                <a style="margin-bottom:3px" href="<?php echo base_url(); ?>C_realkinerja/addrealkrs" class="btn btn-primary no-radius dropdown-toggle"><i class="glyphicon glyphicon-plus"></i> TAMBAH REAL KINERJA </a>
              
        <!-- <form role="form" action="<?php echo base_url(); ?>laporan_kinerjahermina/cetak_kinerja" method="POST" enctype="multipart/form-data">  -->
        
        <div class="form-group">
          <!-- <div class="input-group col-sm-5" > -->
         
            <!-- <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span> 
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
                      <th>TANGGAL</th>
                       <th>CETAK</th>
                        <th>AKSI</th>
                      
                      
                     
                     
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_real2krs as $row) { $no++ ?>

                    <tr>
                      <td><?php echo $no; ?></td>
                       <td><a href="<?php echo base_url(); ?>C_realkinerja/tampil/<?php echo $row['tanggal']; ?>/<?php echo $row['kode_rs']; ?>"><button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo $row['tanggal']; ?></button></a></td>
                      
                      <td style="vertical-align: middle;text-align: center;">
                        <a target="blank" class="btn btn-secondary btn-lg" href="<?php echo base_url(); ?>Cetak_laporankinerja/cetak_detheaderreal/<?php echo $row['tanggal']; ?>/<?php echo $row['kode_rs']; ?>"><i class="fa fa-print"></i></a></td>

                       <td style="vertical-align: middle;text-align: center;">
                      <a  style="margin-bottom:3px;" onclick="return confirm('Hapus data beserta detail??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>C_realkinerja/hapusdatareal/<?php echo $row['tanggal']; ?>/<?php echo $row['kode_rs']; ?>"><i class="glyphicon glyphicon-remove"></i></a>
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


<!-- EDIT -->
        <?php
        foreach($data_realkrs as $i){
        $id_realkrs = $i['id_realkrs'];
        $tanggal = $i['tanggal'];
        $nama_rs = $i['nama_rs'];
        $kode_rs = $i['kode_rs'];
        $nama_uraiankrs = $i['nama_uraiankrs'];
        $nilai_real = $i['nilai_real'];
        $nilai_target = $i['nilai_target'];
        $nilai_targeth = $i['nilai_targeth'];
        $nilai_targetm = $i['nilai_targetm'];
        $nilai_targetb = $i['nilai_targetb'];
        
        
         ?>
<div id="modal_edit<?php echo $id_realkrs;?>" class="modal fade">
  <div class="modal-dialog modal-md">
    <!-- <div class="modal-content"> -->
  <div class="panel panel-primary">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">EDIT</h4></td>
      </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>C_realkinerja/updaterealkrs" method="POST" enctype="multipart/form-data">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $id_realkrs; ?>" id="" name="id_realkrs">
                    </div>

                    <div class="form-group">
                      <label for="">TANGGAL</label>
                        <input type="date" class="form-control" value="<?php echo $tanggal; ?>" id="" name="tanggal" readonly>
                    </div>

                    <div class="form-group">
                      <label for="">NAMA RS</label>
                        <input type="text" class="form-control" value="<?php echo $nama_rs; ?>" id="" name="nama_rs" readonly>
                    </div>

                    <div class="form-group">
                      <label for="">NAMA URAIAN</label>
                        <input type="text" class="form-control" value="<?php echo $nama_uraiankrs; ?>" id="" name="nama_uraiankrs" readonly>
                    </div>

                     <div class="form-group">
                      <label for="">NILAI REAL</label>
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" value="<?php echo $nilai_real; ?>" id="" name="nilai_real" > 
                      </div> 

                      <div class="form-group">
                      <!-- <label for="">NILAI TARGET</label> -->
                        <input type="hidden" onkeypress="return hanyaAngka(event)" class="form-control" value="<?php echo $nilai_target; ?>" id="" name="nilai_target" > 
                      </div>  

                      <div class="form-group">
                      <!-- <label for="">NILAI TARGET HARIAN</label> -->
                        <input type="hidden" onkeypress="return hanyaAngka(event)" class="form-control" value="<?php echo $nilai_targeth; ?>" id="" name="nilai_targeth" > 
                      </div>  

                      <div class="form-group">
                      <!-- <label for="">NILAI TARGET MINGGUAN</label> -->
                        <input type="hidden" onkeypress="return hanyaAngka(event)" class="form-control" value="<?php echo $nilai_targetm; ?>" id="" name="nilai_targetm" > 
                      </div>  

                      <div class="form-group">
                      <!--  <label for="">NILAI TARGET BULANAN</label> -->
                        <input type="hidden" onkeypress="return hanyaAngka(event)" class="form-control" value="<?php echo $nilai_targetb; ?>" id="" name="nilai_targetb" > 
                      </div>          
                    </div>
                                                                     
                   
                           </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>C_realkinerja" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>   
              
              </div>
            </div>
          </div>
        </div> 
             <?php } ?>


<!-- TAMBAH -->
       <?php
        foreach($data_realkrs as $i){
        $id_realkrs = $i['id_realkrs'];
        $tanggal = $i['tanggal'];
        $nama_rs = $i['nama_rs'];

        $nilai_real = $i['nilai_real'];
        $nilai_target = $i['nilai_target'];
        $nilai_targeth = $i['nilai_targeth'];
        $nilai_targetm = $i['nilai_targetm'];
        $nilai_targetb = $i['nilai_targetb'];
        
        
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
                  <form role="form" action="<?php echo base_url(); ?>C_realkinerja/savedata" method="POST" enctype="multipart/form-data">
                    <table class="table table-bordered table-striped">                       
                   

                      <div class="form-group col-lg-12">

                     <label for="">TANGGAL</label> -->
                        <input type="date" class="form-control"   name="tanggal" placeholder="dd/mm/yyyy" >
                    </div>
                   
                    <div class="form-group col-lg-12 ">
                      <input type="text" class="form-control" value="<?php echo $this->session->userdata('namars'); ?>"  name="nama_rs" placeholder="Nama RS" readonly>
                    </div>

                     <div class="form-group col-lg-6 ">
                      <?php
                          foreach($get_uraian as $row){ ?>
                     <input type="text" name="nama_uraiankrs[]" class="form-control" value="<?php echo $row -> nama_uraiankrs; ?>" readonly> <input type="text" name="nilai_real[]" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="Nilai Real" required="">
                     <br>
                         <?php } ?>
                    </div>

                     <div class="form-group col-lg-6 ">
                      <?php
                          foreach($get_target as $row){ ?>
                    <input type="text" name="nilai_target[]" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="Nilai Target" required="">
                     <input type="text" name="nilai_targeth[]" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="Nilai Target" required="">
                      <input type="text" name="nilai_targetm[]" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="Nilai Target" required="">
                       <input type="text" name="nilai_targetb[]" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="Nilai Target" required="">
                     <br>
                         <?php } ?>
                    </div>

                  
 
                   
                     
                
                </div>
               
                

                   


                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>C_realkinerja" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
                </table>
               </form>
              
              </div>
          
          </div>
       
             <?php } ?>
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->