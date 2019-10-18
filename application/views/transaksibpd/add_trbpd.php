<!DOCTYPE html>
<html>
<head>
  <link href="<?php echo base_url(); ?>assets/dist/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <?php $this->load->view('inc/head'); ?>
  <script type="text/javascript" src="libs/jquery.latest.js"></script>
    <script type="text/javascript" src="libs/jquery.maskMoney.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      $('#angka1').maskMoney();
      $('#angka2').maskMoney({prefix:'US$'});
      $('#angka3').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
      $('#angka4').maskMoney();
    });
    </script>
  <script type="text/javascript">

function tandaPemisahTitik(b){
var _minus = false;
if (b<0) _minus = true;
b = b.toString();
b=b.replace(".","");
b=b.replace("-","");
c = "";
panjang = b.length;
j = 0;
for (i = panjang; i > 0; i--){
j = j + 1;
if (((j % 3) == 1) && (j != 1)){
c = b.substr(i-1,1) + "." + c;
} else {
c = b.substr(i-1,1) + c;
}
}
if (_minus) c = "-" + c ;
return c;
}

function numbersonly(ini, e){
if (e.keyCode>=49){
if(e.keyCode<=57){
a = ini.value.toString().replace(".","");
b = a.replace(/[^\d]/g,"");
b = (b=="0")?String.fromCharCode(e.keyCode):b + String.fromCharCode(e.keyCode);
ini.value = tandaPemisahTitik(b);
return false;
}
else if(e.keyCode<=105){
if(e.keyCode>=96){
//e.keycode = e.keycode - 47;
a = ini.value.toString().replace(".","");
b = a.replace(/[^\d]/g,"");
b = (b=="0")?String.fromCharCode(e.keyCode-48):b + String.fromCharCode(e.keyCode-48);
ini.value = tandaPemisahTitik(b);
//alert(e.keycode);
return false;
}
else {return false;}
}
else {
return false; }
}else if (e.keyCode==48){
a = ini.value.replace(".","") + String.fromCharCode(e.keyCode);
b = a.replace(/[^\d]/g,"");
if (parseFloat(b)!=0){
ini.value = tandaPemisahTitik(b);
return false;
} else {
return false;
}
}else if (e.keyCode==95){
a = ini.value.replace(".","") + String.fromCharCode(e.keyCode-48);
b = a.replace(/[^\d]/g,"");
if (parseFloat(b)!=0){
ini.value = tandaPemisahTitik(b);
return false;
} else {
return false;
}
}else if (e.keyCode==8 || e.keycode==46){
a = ini.value.replace(".","");
b = a.replace(/[^\d]/g,"");
b = b.substr(0,b.length -1);
if (tandaPemisahTitik(b)!=""){
ini.value = tandaPemisahTitik(b);
} else {
ini.value = "";
}

return false;
} else if (e.keyCode==9){
return true;
} else if (e.keyCode==17){
return true;
} else {
//alert (e.keyCode);
return false;
}

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
          <b>TAMBAH DATA TRANSAKSI BIAYA BPD</b>
        </h1>
        
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
                <h3 class="box-title">FORM TAMBAH DATA TRANSAKSI BIAYA BPD</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>transaksibpd/savedata" method="POST" enctype="multipart/form-data">
                <!--   <div class="col-lg-6">
                    <div class="form-group">



                      <label for="">KODE KOMPONEN BIAYA</label>
                        <input type="text" class="form-control" value="" id="" name="kode_komponenbiaya" placeholder="Kode Komponen Biaya" required>
                        <?php foreach($data_gabbpd as $row) { ?>
                              <option value="<?php echo $row['kode_komponenbiaya'] ?>"><?php echo $row['id_bpd'] ?></option>
                          <?php } ?>
                    </div> -->

                    <div class="col-lg-6">
                   <div class="form-group">
                      <label for="">KODE KOMPONEN BIAYA</label>
                        <select type="text" name="kode_komponenbiaya" class="form-control" required >
                          
                          <?php foreach($data_gabbpd as $row) { ?>
                              <option  value="<?php echo $row['id_bpd'] ?>"><?php echo $row['id_bpd'] ?></option>
                          <?php } ?>
                        </select>                        
                    </div>


                    <div class="form-group">
                      <label for="">KODE URAIAN BIAYA</label>
                        <input type="text" class="form-control" value="" id="" name="kode_uraianbiaya" placeholder="Kode Uraian Biaya" required>                              
                    </div>
                     <!--  <div class="form-group">
                      <label for="">NILAI BIAYA</label>
                        <input type="text" class="form-control" value="" id="" name="nilaibiaya" placeholder="Nilai Biaya"  required>
                        <script type="text/javascript">
                          

                        </script>
                                             
                    </div> -->
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

                    <div class="form-group">
                      <label for="">NILAI BIAYA</label>
                       <input type="text" class="form-control" name="nilaibiaya" id="num" onkeyup="document.getElementById('format').innerHTML = formatCurrency(this.value);"/><span  id="format"></span>                  
                    </div>
                    <div class="form-group">
                      <label for="">RINCIAN</label>
                        <input type="text" class="form-control" value="" id="" name="rincian" placeholder="Rincian" required>                        
                    </div>
                    <div class="form-group">
                      <label for="">KETERANGAN</label>
                        <input type="text" class="form-control" value="" id="" name="keterangan" placeholder="Keterangan" required>                        
                    </div>
                    <div class="form-group">
                      <label for="">QTY</label>
                        <input type="text" class="form-control" value="" id="" name="qty" placeholder="Qty" required>                        
                    </div>

                    <div class="form-group">
                      <label for="">STATUS</label>
                       <!--  <input type="text" class="form-control" value="" id="" name="status" placeholder="Status" required> -->      
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
        <!-- <b>Version</b>   .0 -->
      </div>
      <strong>Copyright &copy; <?php echo date('Y');?> <a href="#"></a></strong>
    </footer>
  </div><!-- ./wrapper -->
  <!-- page script -->
  

    
    <?php $this->load->view('inc/footer'); ?>
</body>
</html>