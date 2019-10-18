<!DOCTYPE html>
<html>
<head>
  <link href="<?php echo base_url(); ?>assets/dist/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/locale/id.js"></script>

  <script type="text/javascript" src="libs/jquery.latest.js"></script>
    <script type="text/javascript" src="libs/jquery.maskMoney.min.js"></script>
    <script type="text/javascript">
        $(function(){
$( "#datepicker" ).datepicker({format : "dd/mm/yyyy"});
  

});

    function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

    return false;
    return true;
}
    </script>

<!-- <span id="livejam" style="position:absolute;left:0;top:0;">
</span> -->

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
jamdigital="<font size='2' face='Arial' ><font size='2'>"+jam+":"+menit+":"
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



   
</head>
<body class="skin-blue" onload="menampilkan_jam()">
  
  
      <section class="content-header">
        <h1>
          <b>TAMBAH DATA REAL KINERJA RUMAH SAKIT</b>
        </h1>
        
        </section>

        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box box-primary">
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">FORM TAMBAH DATA REAL KINERJA RUMAH SAKIT</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
               <div class="item">
                  <div class="clock">
                        <div id="Date"></div>
                        <div id="livejam"></div>
                      
                  </div>  
                  <br>
                  <br>

                  <form role="form" action="<?php echo base_url(); ?>C_realkinerja/savedata" method="POST" enctype="multipart/form-data">
                    <table class="table table-bordered table-striped">                       
                   
                    <div class="form-group col-lg-3">
                      <label></label>
                      <input type="text" style="background-color: #ccfcc4" class="form-control" value="<?php echo trim($this->session->userdata('namars')); ?>"  name="nama_rs" placeholder="Nama RS" readonly>
                    </div>
                    <div class="form-group col-lg-3">
                      <label></label>
                    <input type="hidden" style="background-color: #ccfcc4" class="form-control" value="<?php echo trim($this->session->userdata('koders')); ?>"  name="kode_rs" placeholder="Kode RS" readonly>
                    </div>


                     <!--  <div class="form-group col-lg-3">

                     <label for="">TANGGAL</label>
                        <input type="text" class="form-control" value="<?php echo $date = date('d m Y', strtotime('-1 day')); ?>"  name="tanggal" readonly >
                    </div>  -->
                    <br>
                    <br>
                    <br>
                    <br>
                <div class="form-group col-lg-3">

                     <label for="">TANGGAL</label>
                        <input type="date" class="form-control" name="tanggal" required>
                    </div>
 


                    
                    <table class="table table-bordered table-striped"> 
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

                    <input type="hidden" name="nilai_target[]" class="form-control" value="<?php echo $row -> nilai_target; ?>" readonly>
                     <input type="hidden" name="nilai_targeth[]" class="form-control" value="<?php echo $row -> nilai_targeth; ?>" readonly>
                      <input type="hidden" name="nilai_targetm[]" class="form-control" value="<?php echo $row -> nilai_targetm; ?>" readonly>
                       <input type="hidden" name="nilai_targetb[]" class="form-control" value="<?php echo $row -> nilai_targetb; ?>" readonly> 
                     <br>
                         <?php } ?>
                    </div>
 
                   
                     
                
                </div>
               
                

                   


                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>C_realkinerja" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
                </table>
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
           <footer style="text-align: center;">
      
      <strong>Copyright &copy; <?php echo date('Y');?> <a href="#"></a></strong>
    </footer>
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
  
   
  
</body>
</html>
