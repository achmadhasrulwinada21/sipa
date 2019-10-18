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

<!-- <script type="text/javascript"> 
    $(document).ready(function() {
        var max_fields      = 10; //maximum input boxes allowed
        var wrapper         = $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('</br><div><input class="input form-control"" name="uraian_rsk[]"/><input class="input form-control"" name="target_rsk[]"/><input class="input form-control"" name="real_rsk[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
            }
        });

        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });
    </script> -->

<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<script language="javascript">
  $(document).ready(function() {
        var max_fields      = 14; //maximum input boxes allowed
        var stre            = $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID

        var x = 0; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
             $(stre).append("<p id='srow" + id_krs +  "'><div><input type='text' size='40' name='uraian_rsk[]' placeholder='Masukan Uraian' required /> <input type='text' size='30' value='0' name='real_rsk[]' placeholder='Masukan Nilai Real' required/> <input type='hidden' size='30' value='0' name='target_rsk[]' placeholder='Masukan Nilai Target' required />  <a href='#' class=\"btn btn-danger btn-sm remove_field\"  onclick='hapusElemen(\"#srow" + id_krs + "\"); return false;'><i class=\"glyphicon glyphicon-trash\"></i></a></div></p>");

         }
        });

        $(stre).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });
</script>

<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript">
  $(function(){
    $("#bntclick").click(function(){
      $("#divpopup").dialog({
        title: "Petunjuk Penggunaan",
        width: 430,
        height: 200,
        modal:true,
        buttons: {
          Kembali:
          function(){
            $(this).dialog('close');
          }
        }
      });
    });
  })

</script>
   
</head>
<body class="skin-blue" onload="menampilkan_jam()">
  
  
      <section class="content-header">
        <h1>
          <b>TAMBAH DATA KINERJA RUMAH SAKIT</b>
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
                <h3 class="box-title">FORM TAMBAH DATA KINERJA <?php echo $this->session->userdata('namars'); ?></h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
               <div class="item">
                  <div class="clock">
                        <div id="Date"></div>
                        <div id="livejam"></div>
                       <!--  <ul>
                        <li id="hours">:</li>
                        <li id="point">:</li>
                        <li id="min"></li>
                        <li id="point">:</li>
                        <li id="sec"></li>
                        </ul> -->
                  </div>  
                  <br>
                  <br>

                  <form role="form" action="<?php echo base_url(); ?>kinerjarusak/savedata" method="POST" enctype="multipart/form-data">
                    <table class="table table-bordered table-striped">
                     
                     <!--  <div class="form-group">
                      <label for="">PERIODE</label>
                        <input type="text" class="form-control" value="" id="datepicker" name="periode" placeholder="dd/mm/yyyy" required>    --> 
                                               
                    </div>

                     
                      <!-- <div id="divpopup" style="display:none">
                        TEKAN TOMBOL <B>TAMBAH URAIAN</B> UNTUK MENGISI DATA. TERIMA KASIH :)
                      </div>
                      <div class="form-group col-lg-12">
                      <button type="button" class="btn btn-primary btn-block btn-flat" id="bntclick">Cara Penggunaan</button>
                    </div> -->

                   
                    <div class="form-group col-lg-3">

                      <label for="">PERIODE</label>
                        <input type="date" class="form-control"  name="periode" placeholder="PERIODE" >
                    </div>

                     <div class="form-group col-lg-3">
                      <input type="hidden" class="form-control" value="<?php echo $this->session->userdata('namars'); ?>"  name="nama_rs" placeholder="Nama RS" readonly>
                    </div>
                
                </div>
               <!--  <div class="form-group"> 
                <div class="input_fields_wrap">
                    <div class="form-group">
                    <button type="button" class="btn btn-success add_field_button">Add More Fields</button> 
                    </div>
                    <div>
                    <input class="input form-control" name="uraian_rsk[]" placeholder="Masukan Uraian">
                    <input class="input form-control" name="target_rsk[]" placeholder="Masukan Target">
                    <input class="input form-control" name="real_rsk[]" placeholder="Masukan Real">
                    </div>
                </div> 
                </div>  -->
                <br>
                <br>
                <br>
                <br>
                

                    <div class="form-group col-lg-4">
                        <input type="text" style="background-color: #ccfcc4 " class="form-control" value="RWJ"  name="uraian_rsk[]" placeholder="RWJ" readonly>
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" value="0"  name="real_rsk[]" placeholder="Nilai" >
                    </div>

                    <div class="form-group col-lg-4">
                        <input type="text" style="background-color: #ccfcc4 " class="form-control" value="RWI"  name="uraian_rsk[]" placeholder="RWI" readonly>
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" value="0"  name="real_rsk[]" placeholder="Nilai" >
                    </div>


                     <div class="form-group col-lg-4">
                        <input type="text" style="background-color: #ccfcc4 " class="form-control" value="RWI OBG"  name="uraian_rsk[]" placeholder="RWI OBG" readonly>
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" value="0"  name="real_rsk[]" placeholder="Nilai" >
                    </div>

                     <div class="form-group col-lg-4">
                        <input type="text" style="background-color: #ccfcc4 " class="form-control" value="RWI ANAK"  name="uraian_rsk[]" placeholder="RWI ANAK" readonly>
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" value="0"  name="real_rsk[]" placeholder="Nilai" >
                    </div>

                    <div class="form-group col-lg-4">
                        <input type="text" style="background-color: #ccfcc4 " class="form-control" value="RWI UMUM"  name="uraian_rsk[]" placeholder="RWI UMUM" readonly>
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" value="0"  name="real_rsk[]" placeholder="Nilai" >
                    </div>

                    <div class="form-group col-lg-4">
                        <input type="text" style="background-color: #ccfcc4 " class="form-control" value="RWI PERINA"  name="uraian_rsk[]" placeholder="RWI PERINA" readonly>
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" value="0"  name="real_rsk[]" placeholder="Nilai" >
                    </div>

                    <div class="form-group col-lg-4">
                        <input type="text" style="background-color: #ccfcc4 " class="form-control" value="RWI ISOLASI"  name="uraian_rsk[]" placeholder="RWI ISOLASI" readonly>
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" value="0"  name="real_rsk[]" placeholder="Nilai" >
                    </div>

                    <div class="form-group col-lg-4">
                        <input type="text" style="background-color: #ccfcc4 " class="form-control" value="LAHIR"  name="uraian_rsk[]" placeholder="LAHIR" readonly>
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" value="0"  name="real_rsk[]" placeholder="Nilai" >
                    </div>

                    <div class="form-group col-lg-4">
                        <input type="text" style="background-color: #ccfcc4 " class="form-control" value="OPERASI"  name="uraian_rsk[]" placeholder="OPERASI" readonly>
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" value="0"  name="real_rsk[]" placeholder="Nilai" >
                    </div>

                    <div class="form-group col-lg-4">
                        <input type="text" style="background-color: #ccfcc4 " class="form-control" value="IGD"  name="uraian_rsk[]" placeholder="IGD" readonly>
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" value="0"  name="real_rsk[]" placeholder="Nilai" >
                    </div>

                    <div class="form-group col-lg-4">
                        <input type="text" style="background-color: #ccfcc4 " class="form-control" value="BPJS RWJ"  name="uraian_rsk[]" placeholder="BPJS RWJ" readonly>
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" value="0"  name="real_rsk[]" placeholder="Nilai" >
                    </div>

                    <div class="form-group col-lg-4">
                        <input type="text" style="background-color: #ccfcc4 " class="form-control" value="BPJS RWI"  name="uraian_rsk[]" placeholder="BPJS RWI" readonly>
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" value="0"  name="real_rsk[]" placeholder="Nilai" >
                    </div>

                    <div class="form-group col-lg-4">
                        <input type="text" style="background-color: #ccfcc4 " class="form-control" value="BPJS LAHIR"  name="uraian_rsk[]" placeholder="BPJS LAHIR" readonly>
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" value="0"  name="real_rsk[]" placeholder="Nilai" >
                    </div>

                    <div class="form-group col-lg-4">
                        <input type="text" style="background-color: #ccfcc4 " class="form-control" value="BPJS OPERASI"  name="uraian_rsk[]" placeholder="BPJS OPERASI" readonly>
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" value="0"  name="real_rsk[]" placeholder="Nilai" >
                    </div>

                    <div class="form-group col-lg-12 input_fields_wrap">
                  <!-- <div class="input_fields_wrap"> -->
                  <input id="id_krs" value="1" type="hidden" />
                  <button type="button" class="btn btn-primary btn-flat add_field_button">Tambah Uraian</button> (* Klik Disini Untuk Masukan Uraian Tambahan
                  <br>
                  <br>  
                  </div>


                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>kinerjarusak" class="btn btn-warning btn-block btn-flat">Kembali</a>
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
