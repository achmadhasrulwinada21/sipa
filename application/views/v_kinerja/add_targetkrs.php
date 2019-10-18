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
          <b>TAMBAH DATA TARGET KINERJA RUMAH SAKIT</b>
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
                <h3 class="box-title">FORM TAMBAH DATA TARGET KINERJA RUMAH SAKIT</h3>
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

                  <form role="form" action="<?php echo base_url(); ?>C_targetkinerja/savedata" method="POST" enctype="multipart/form-data">
                    <table class="table table-bordered table-striped">
                     
                      
                                               
                    </div>

                     
                   
                    <div class="form-group col-lg-3 ">

                      <label for="">PILIH NAMA RUMAH SAKIT</label>
                        
                        <select id="kode_rs" name="kode_rs" class="form-control" required>
                          <option required> </option>
                          <?php foreach($get_rs as $row) { ?>
                              <option value="<?php echo $row['koders'] ?>"> <?php echo $row['namars'] ?></option>
                          <?php } ?>
                        </select> 
                    </div>
                    <input type="hidden" class="form-control" value="" id="" name="nama_rs" required readonly>

                  </table>
                  <table class="table table-bordered table-striped">
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
