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


      <body class="skin-blue" onload="menampilkan_jam()">
      <section class="content-header">
        <h1>
          <b>DATA URAIAN KINERJA RUMAH SAKIT  </b>
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
                        <div id="Date"></div>
                        <div id="livejam"></div>
                        <br>
                        <br>
              <a style="margin-bottom:3px" data-toggle="modal"  data-target="#modal_tambah" class="btn btn-primary no-radius dropdown-toggle"><i class="glyphicon glyphicon-plus"></i> TAMBAH URAIAN KINERJA </a>
              
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
                      
                      <th>KODE URAIAN</th>
                      <th>URAIAN</th>
                      
                     
                      <th>AKSI</th>
                     
                     
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_uraiankrs as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                     
                       <td><?php echo $row['kd_uraiankrs']; ?></td>      
                       <td><?php echo $row['nama_uraiankrs']; ?></td>
                      
                      
                    
                     
                     <td>
                     <a class="btn btn-warning btn-sm" data-toggle="modal"  data-target="#modal_edit<?php echo $row['id_uraiankrs'];?>"><i class="glyphicon glyphicon-edit"></i></a> 
                      <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>C_kinerja/hapusuraiankrs/<?php echo $row['id_uraiankrs']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                     </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                
                </table>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div>
		</div><!-- /.row -->
        <!-- Main row -->


<!-- EDIT DATA -->
        <?php
        foreach($data_uraiankrs as $i){
        $id_uraiankrs = $i['id_uraiankrs'];
        $kd_uraiankrs = $i['kd_uraiankrs'];
        $nama_uraiankrs = $i['nama_uraiankrs'];
        
        
         ?>
<div id="modal_edit<?php echo $id_uraiankrs;?>" class="modal fade">
  <div class="modal-dialog modal-md">
    <!-- <div class="modal-content"> -->
  <div class="panel panel-primary">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">EDIT</h4></td>
      </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>C_kinerja/updateuraiankrs" method="POST" enctype="multipart/form-data">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $id_uraiankrs; ?>" id="" name="id_uraiankrs">
                    </div>

                    <div class="form-group">
                      <label for="">KODE URAIAN</label>
                        <input type="text" class="form-control" value="<?php echo $kd_uraiankrs; ?>" id="" name="kd_uraiankrs" required>
                    </div>

                    <div class="form-group">
                      <label for="">NAMA URAIAN</label>
                        <input type="text" class="form-control" value="<?php echo $nama_uraiankrs; ?>" id="" name="nama_uraiankrs" > 
                      </div>         
                    </div>
                                                                     
                   
                           </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>C_kinerja" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>   
              
              </div>
            </div>
          </div>
        </div> 
             <?php } ?>

<!-- TAMBAH DATA -->
<?php
        foreach($data_uraiankrs as $i){
        $id_uraiankrs = $i['id_uraiankrs'];
        $kd_uraiankrs = $i['kd_uraiankrs'];
        $nama_uraiankrs = $i['nama_uraiankrs'];
        
        
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
                  <form role="form" action="<?php echo base_url(); ?>C_kinerja/savedata" method="POST" enctype="multipart/form-data">
                    <table class="table table-bordered table-striped">
                     
                      
                                               
                    </div>

                     
                   
                    <!-- <div class="form-group col-lg-3">

                      <label for="">PERIODE</label>
                        <input type="date" class="form-control"  name="periode" placeholder="PERIODE" >
                    </div> -->

                     
                
                </div>
               
                

                    <div class="form-group col-lg-12 input_fields_wrap">
                  <!-- <div class="input_fields_wrap"> -->

                  <input id="id_uraiankrs" value="1" type="hidden" />
                  <button type="button" class="btn btn-primary btn-flat add_field_button">Tambah Uraian</button> (* Klik Disini Untuk Masukan Uraian Tambahan

                  <p id='srow" + id_uraiankrs +  "'><div><input type='text' size='20' name='kd_uraiankrs[]' placeholder='Masukan Kode Uraian' required /> <input type='text' size='50' name='nama_uraiankrs[]' placeholder='Masukan Nama Uraian' required/> </div></p>
                    
                  </div>


                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>C_kinerja" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
                </table>
               </form>
              
              </div>
            </div>
         
        </div> 
             <?php } ?>
       
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          
      
      </section><!-- /.content -->

    
  </body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/locale/id.js"></script>
<script type="text/javascript" src="libs/jquery.latest.js"></script>
<script type="text/javascript" src="libs/jquery.maskMoney.min.js"></script>
<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<script language="javascript">
  $(document).ready(function() {
        var max_fields      = 14; //maximum input boxes allowed
        var stre            = $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
             $(stre).append("<p id='srow" + id_uraiankrs +  "'><div><input type='text' size='20' name='kd_uraiankrs[]' placeholder='Masukan Kode Uraian' required /> <input type='text' size='50' name='nama_uraiankrs[]' placeholder='Masukan Nama Uraian' required/> <a href='#' class=\"btn btn-danger btn-sm remove_field\"  onclick='hapusElemen(\"#srow" + id_uraiankrs + "\"); return false;'><i class=\"glyphicon glyphicon-trash\"></i></a></div></p>");

         }
        });

        $(stre).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });
</script>