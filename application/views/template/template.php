<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SIPA | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url('assets/css/ionicons.min.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="<?php echo base_url('assets/js/plugins/morris/morris.css'); ?>" rel="stylesheet">
        <!-- jvectormap -->
        <link href="<?php echo base_url('assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?php echo base_url('assets/js/plugins/daterangepicker/daterangepicker-bs3.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins 
             folder instead of downloading all of them to reduce the load. -->
        <link href="<?php echo base_url('assets/css/skins/_all-skins.min.css'); ?>" rel="stylesheet" type="text/css" />

              <link rel="stylesheet" href="<?php echo base_url('assets/css/chosen.min.css');?>">
        <link href="<?php echo base_url('assets/js/plugins/datatables/dataTables.bootstrap.css' ); ?>" rel="stylesheet" type="text/css" /> 

<script src="<?php echo base_url('assets/js/jquery-1.12.4.min.js'); ?>"

   <!---  integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"

        crossorigin="anonymous"> -->

</script>

<script src="jQuery.fixTableHeader.js"></script>

    
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->



<style type="text/css">

#ct{


    margin-left:300px;


}

.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 400px;
  height: 400px;
}

</style>

<style>
           ::selection { background-color: #E13300; color: white; }
           ::-moz-selection { background-color: #E13300; color: white; }
 
          
 
           main {
                width: 80%;
                padding: 20px;
                background-color: white;
                min-height: 300px;
                border-radius: 5px;
                margin: 30px auto;
                box-shadow: 0 0 8px #D0D0D0;
           }
           table {
                border-top: solid thin #000;
                border-collapse: collapse;
           }
           th, td {
                border-top: border-top: solid thin #000;
                padding: 6px 12px;
           }
 
           a {
                color: #003399;
                background-color: transparent;
                font-weight: normal;
           }
      </style>

<SCRIPT type="text/javascript">
    window.history.forward();
    function noBack() { window.history.forward(); }
</SCRIPT>
    </head>
    <body class="skin-blue" onload="noBack();"onpageshow="if (event.persisted) noBack();" onunload="">
        <div class="wrapper">
            <?php echo $_header; ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php echo $_sidebar; ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <?php echo $_content; ?> 
            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                 <b>SIPA</b>&nbsp;<b>Version</b> 1.0.0
                </div>
                <strong >Copyright &copy; 2019 <a href="https://herminahospitals.com/">PT. Medikaloka Hermina, Tbk</a>.</strong> All Rights Reserved.
            </footer>
        </div><!-- ./wrapper -->
        <!-- jQuery 2.1.3 -->
        <script src="<?php echo base_url('assets/js/plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url('assets/js/plugins/fastclick/fastclick.min.js'); ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('assets/js/AdminLTE/app.min.js'); ?>" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="<?php echo base_url('assets/js/plugins/sparkline/jquery.sparkline.min.js'); ?>" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="<?php echo base_url('assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="<?php echo base_url('assets/js/plugins/daterangepicker/daterangepicker.js'); ?>" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="<?php echo base_url('assets/js/plugins/datepicker/bootstrap-datepicker.js'); ?>" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url('assets/js/plugins/iCheck/icheck.min.js'); ?>" type="text/javascript"></script>
        <!-- SlimScroll 1.3.0 -->
        <script src="<?php echo base_url('assets/js/plugins/slimScroll/jquery.slimscroll.min.js'); ?>" type="text/javascript"></script>
        <!-- ChartJS 1.0.1 -->
        <script src="<?php echo base_url('assets/js/plugins/chartjs/Chart.min.js'); ?>" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!--   <script src="<?php echo base_url('assets/js/AdminLTE/dashboard2.js'); ?>" type="text/javascript"></script>  
 -->
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url('assets/js/AdminLTE/demo.js'); ?>"></script> 

          <script src="<?php echo base_url('assets/js/plugins/datatables/jquery.dataTables.js'); ?>" type="text/javascript"></script> 

        <script src="<?php echo base_url('assets/js/plugins/datatables/jquery.dataTables.min.js'); ?>" type="text/javascript"></script>
        
       <script src="<?php echo base_url('assets/js/plugins/datatables/dataTables.bootstrap.js'); ?>" type="text/javascript"></script> 
               <script src="<?php echo base_url('assets/js/chosen.jquery.min.js'); ?>"></script>

   





    </body>
</html>
<script>

    $(function () {
        $('#tb-datatables').dataTable({"aoColumnDefs": [{"bSortable": true, "aTargets": [0]}]});       
        $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Search');
    }); 
	
     $(function () {
        $('#tb-datatables_baswin').dataTable({"lengthMenu": [[1000,  -1], ["All"]]} );       
        $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Search');
    }); 

    //   $(function () {
    //   $('#myTableHasmoro').dataTable({"aoColumnDefs": [{"bSortable": true, "aTargets": [0]}]});  
    // }); 
  
  $(function () {
        $('#tb-datatables3').dataTable({"lengthMenu": [[10, 25,  -1], [10,25, "All"]]} );       
        $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Search');
    }); 


    $(function () {
        $('#tb-datatables6').dataTable({"lengthMenu": [[5, 10,25,  -1], [5,10,25, "All"]]} );       
        $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Search');
    }); 
  
  
  $(function () {
        $('#datatables4').dataTable({"lengthMenu": [[5, 10, 25,  -1], [5, 10, 25, "All"]]} );       
        $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Search');
    });  
  
  $(function () {
        $('#datatables5').dataTable({"lengthMenu": [[5, 10, 25,  -1], [5, 10, 25, "All"]]} );       
        $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Search');
    });  

 $(function () {
        $('#datatables9').dataTable({"lengthMenu": [[5, 10, 25,  -1], [5, 10, 25, "All"]]} );       
        $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Search');
    }); 
       
           $(function () {
        $('.datatables49').dataTable({"lengthMenu": [[1000,  -1], [1000, "All"]]} );
        $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Search');
    });

(function () {
        $('.datatables57').dataTable({"lengthMenu": [[5, 10, 25,  -1], [5, 10, 25, "All"]]} );
        $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Search');
    });

               $(function () {
        $('.datatables58').dataTable({"lengthMenu": [[5, 10, 25,  -1], [5, 10, 25, "All"]]} );
        $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Search');
    });



   $(function() {

    $( "#datepicker1" ).datepicker({  format: 'dd-MM-yyyy'});

   
    });
$(function() {
    $( "#datepicker11" ).datepicker({  format: 'yyyy-mm-dd'});
    });

$(function() {
    $( "#datepicker51" ).datepicker({  format: 'yyyy-mm-dd'});
    });

    $(function() {
    $( "#datepicker2" ).datepicker({  format: 'dd-MM-yyyy'});
    });

      $(function() {
    $( "#datepicker3" ).datepicker({  format: 'dd-MM-yyyy'});
    });


      $(function() {
    $( "#datepicker4" ).datepicker({  format: 'MM-yyyy'});
    });
  

     $("#tanggal").datepicker({ 
        format: 'yyyymm'
    });

       $("#tanggal1").datepicker({ 
        format: 'yyyymm'
    });

     $(function() {

    $( "#datepicker5" ).datepicker({  format: 'mm-dd-yyyy'});

   
    });
 $(function() {
    $( "#datepicker7" ).datepicker({  format: 'mm-dd-yyyy'});
    });

  $(function() {
    $( "#datepicker8" ).datepicker({  format: 'mm-dd-yyyy'});
    });

    $(function() {
    $( "#datepicker6" ).datepicker({  format: 'mm-dd-yyyy'});
    });

         $("#tanggal2").datepicker({ 
        format: 'yyyymm'
    });






function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("tb-datatables6");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}


function myFunctionperiode() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myPeriode");
  filter = input.value.toUpperCase();
  table = document.getElementById("tb-datatables6");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}



function myFunctionhasmoro() {
  var input, filter, table, tr, td, j;
  input = document.getElementById("myInputhasmoro");
  filter = input.value.toUpperCase();
  table = document.getElementById("tb-datatables6");
  tr = table.getElementsByTagName("tr");
  for (j = 0; j < tr.length; j++) {
    td = tr[j].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[j].style.display = "";
      } else {
        tr[j].style.display = "none";
      }
    }       
  }
}


function myFunctionperiodehasmoro() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myPeriodehasmoro");
  filter = input.value.toUpperCase();
  table = document.getElementById("tb-datatables6");
  tr = table.getElementsByTagName("tr");
  for (j = 0; j < tr.length; j++) {
    td = tr[j].getElementsByTagName("td")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[j].style.display = "";
      } else {
        tr[j].style.display = "none";
      }
    }       
  }
}

</script>





</script>



</script>

<script type="text/javascript">
     function myFunction3() {
      //var ket_1= document.getElementById("ket_1");
      if ( document.getElementById("obat").checked == true){
        textobat.style.display = "block";
      } else {
         textobat.style.display = "none";
      }
    }
     </script>

     <script type="text/javascript">
     function myFunction4() {
      //var ket_1= document.getElementById("ket_1");
      if ( document.getElementById("alum").checked == true){
        textalum.style.display = "block";
      } else {
         textalum.style.display = "none";
      }
    }
     </script>

     <script type="text/javascript">
     function myFunction5() {
      //var ket_1= document.getElementById("ket_1");
      if ( document.getElementById("alkes").checked == true){
        textalkes.style.display = "block";
      } else {
         textalkes.style.display = "none";
      }
    }
     </script>



</script>



</script>


<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      //('#modalBarang').modal('show');
       $('#kode_rs').on('input',function(){
                
                var koders=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('c_targetkinerja/get_koders')?>",
                    dataType : "JSON",
                    data : {koders: koders},
                    cache:false,
                    success: function(data){
                        $.each(data,function(koders, namars){
              $('[name="kode_rs"]').val(data.koders);
              $('[name="nama_rs"]').val(data.namars);
                                
                            
                        });
                        
                    }
                });
                return false;
           });
       
    });
  
</script>

<script type="text/javascript">
 function wajibAngka(evt) {
 var charCode = (evt.which) ? evt.which : event.keyCode
 if (charCode > 31 && (charCode < 48 || charCode > 57))
 return false;
 }
</script>

<script type="text/javascript">
   function myFunction() {
      //var ket_1= document.getElementById("ket_1");
      if ( document.getElementById("rs").checked == true){
        text.style.display = "block";
      } else {
         text.style.display = "none";
      }
    }

    function myFunction2() {
      //var ket_1= document.getElementById("ket_1");
      if ( document.getElementById("dept").checked == true){
        textt.style.display = "block";
      } else {
         textt.style.display = "none";
      }
    }
   
 </script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      //('#modalBarang').modal('show');
       $('#kode_rs').on('input',function(){
                
                var koders=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('C_targetkinerja/get_koders')?>",
                    dataType : "JSON",
                    data : {koders: koders},
                    cache:false,
                    success: function(data){
                        $.each(data,function(koders, namars){
              $('[name="kode_rs"]').val(data.koders);
              $('[name="nama_rs"]').val(data.namars);
                                
                            
                        });
                        
                    }
                });
                return false;
           });
       
    });
  
</script>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
 
  <script type="text/javascript">
    $(document).ready(function(){
      //('#modalBarang').modal('show');
      $(".pabrikid").chosen();
       $('#pabrikid').on('change',function(){
               
                var pabrikid=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Masterpt/getprinsipal_db2')?>",
                    dataType : "JSON",
                    data : {pabrikid: pabrikid},
                    cache:false,
                    success: function(data){
                        $.each(data,function(pabrikid, pabriknama){
              $('[name="pabrikid"]').val(data.pabrikid);
              $('[name="pabriknama"]').val(data.pabriknama);
                      });
                        
                    }
                });
                return false;
           });
        
    });
   
</script>

<script type="text/javascript">
    $(document).ready(function(){
      //('#modalBarang').modal('show');
      $("#koper").chosen();
        $('#koper').on('change',function(){
                
                var koper=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('c_po/get_perush_PO')?>",
                    dataType : "JSON",
                    data : {koper: koper},
                    cache:false,
                    success: function(data){
                        $.each(data,function(koper, nm_perusahaan, s_alamat, s_telp, s_fax, s_kontak, s_email){
                $('[name="koper"]').val(data.koper);
                $('[name="nm_perusahaan"]').val(data.nm_perusahaan);
                $('[name="s_alamat"]').val(data.s_alamat);
                $('[name="s_telp"]').val(data.s_telp);
                $('[name="s_fax"]').val(data.s_fax  );
                $('[name="s_kontak"]').val(data.s_kontak);
                $('[name="s_email"]').val(data.s_email);
             
                        
                        });
                        
                    }
                });
                return false;
           });
       
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
      //('#modalBarang').modal('show');
      $(".dara99").chosen({width: '100%'});
        $('.dara99').on('change',function(){
       
        $(this).closest('tr').find('.dd').val($('option:selected', this).data('harga'));
               });
                return false;
              
           });

</script>

<script type="text/javascript">
    $(document).ready(function(){
      //('#modalBarang').modal('show');
      $(".dara100").chosen({width: '100%'});
        $('.dara100').on('change',function(){
       
                var kode_produk=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('c_po/get_detilbarangpo')?>",
                    dataType : "JSON",
                    data : {kode_produk: kode_produk},
                    cache:false,
                    success: function(data){
                        $.each(data,function(kode_produk, total){
                     $('[name="kode_produk"]').val(data.kode_produk);
                     $('[name="total"]').val(data.total);    
                        });
                        
                    }
                });
                return false;
           });
       
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
      //('#modalBarang').modal('show');
      $("#kode_produk_v3").chosen({width: '100%'});
        $('#kode_produk_v3').on('change',function(){
       
                var kode_produk=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('c_po/get_detilbarangpo21')?>",
                    dataType : "JSON",
                    data : {kode_produk: kode_produk},
                    cache:false,
                    success: function(data){
                        $.each(data,function(kode_produk, nama_produk, harga_akhir_baru, biaya_kirim, includeongkir, biaya_ongkir){
                    $('[name="kode_produk"]').val(data.kode_produk);
                    $('[name="nama_produk"]').val(data.nama_produk);    
                    $('[name="harga_akhir_baru"]').val(data.harga_akhir_baru); 
                    $('[name="biaya_kirim"]').val(data.biaya_kirim); 
                    $('[name="includeongkir"]').val(data.includeongkir); 
                    $('[name="biaya_ongkir"]').val(data.biaya_ongkir); 
                        });
                        
                    }
                });
                return false;
           });
       
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
      //('#modalBarang').modal('show');
      $(".v3").chosen({width: '100%'});
        $('.v3').on('change',function(){
       
                var kode_produk=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('c_po/get_detilbarangpo21')?>",
                    dataType : "JSON",
                    data : {kode_produk: kode_produk},
                    cache:false,
                    success: function(data){
                        $.each(data,function(kode_produk, nama_produk, harga_akhir_baru, biaya_kirim, includeongkir, biaya_ongkir){
                    $('[name="kode_produk"]').val(data.kode_produk);
                    $('[name="nama_produk"]').val(data.nama_produk);    
                    $('[name="harga_akhir_baru"]').val(data.harga_akhir_baru); 
                    $('[name="biaya_kirim"]').val(data.biaya_kirim); 
                    $('[name="includeongkir"]').val(data.includeongkir); 
                    $('[name="biaya_ongkir"]').val(data.biaya_ongkir); 
                        });
                        
                    }
                });
                return false;
           });
       
    });
</script>


<script type="text/javascript">
    $(document).ready(function(){
      //('#modalBarang').modal('show');
      $(".daraanisa99").chosen({width: '100%'});
        $('.daraanisa99').on('change',function(){
                
                var kode_lokasi=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('c_po/get_lokasi')?>",
                    dataType : "JSON",
                    data : {kode_lokasi: kode_lokasi},
                    cache:false,
                    success: function(data){
                        $.each(data,function(kode_lokasi, nm_lokasi){
                $('[name="kode_lokasi"]').val(data.kode_lokasi);
                $('[name="nm_lokasi"]').val(data.nm_lokasi);         
                        });
                        
                    }
                });
                return false;
           });
       
    });
</script>


<script>
$("#dara").chosen({width: '100%'});
</script>
<script>
$(".daracui").chosen({width: '75%'});
</script>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      //('#modalBarang').modal('show');
      $(".chosen").chosen();
       $('#obatid').on('change',function(){
               
                var obatid=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('produko/get_obatss')?>",
                    dataType : "JSON",
                    data : {obatid: obatid},
                    cache:false,
                    success: function(data){
                        $.each(data,function(obatid, obatnama, pabrikid, supplier){
              $('[name="obatid"]').val(data.obatid);
              $('[name="produko"]').val(data.obatnama);
               $('[name="pabrikid"]').val(data.pabrikid);
              $('[name="s_kode"]').val(data.supplier);                              
                            
                        });
                        
                    }
                });
                return false;
           });
        
    });
  
</script>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      //('#modalBarang').modal('show');
       $(".chosen").chosen();
        $('#pabrikid').on('change',function(){
                
                var pabrikid=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('cmasterprinsp/getprinsipal_db1')?>",
                    dataType : "JSON",
                    data : {pabrikid: pabrikid},
                    cache:false,
                    success: function(data){
                        $.each(data,function(pabrikid, pabriknama, nama_pt){
              $('[name="pabrikid"]').val(data.pabrikid);
              $('[name="pabriknama"]').val(data.pabriknama);
              $('[name="nama_pt"]').val(data.nama_pt);                
                            
                        });
                        
                    }
                });
                return false;
           });
       
    });
  
</script>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      //('#modalBarang').modal('show');
       $(".chosen").chosen();
       $('#alumid').on('change',function(){
                
                var alumid=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('cmasterprinsp/getalum_db1')?>",
                    dataType : "JSON",
                    data : {alumid: alumid},
                    cache:false,
                    success: function(data){
                        $.each(data,function(alumid, alumnama, pt_alum){
              $('[name="alumid"]').val(data.alumid);
              $('[name="alumnama"]').val(data.alumnama);
              $('[name="pt_alum"]').val(data.pt_alum);                
                            
                        });
                        
                    }
                });
                return false;
           });
       
    });
  
</script>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      //('#modalBarang').modal('show');
       $(".chosen").chosen();
       $('#alkesid').on('change',function(){
                
                var alkesid=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('cmasterprinsp/getalkes_db1')?>",
                    dataType : "JSON",
                    data : {alkesid: alkesid},
                    cache:false,
                    success: function(data){
                        $.each(data,function(alkesid, alkesnama, pt_alkes){
              $('[name="alkesid"]').val(data.alkesid);
              $('[name="alkesnama"]').val(data.alkesnama);
              $('[name="pt_alkes"]').val(data.pt_alkes);                
                            
                        });
                        
                    }
                });
                return false;
           });
       
    });
  
</script>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      //('#modalBarang').modal('show');
       $(".s_kode").chosen();
       $('#s_kode').on('change',function(){
                
                var s_kode=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('cmasterprinsp/getsuplier_db2')?>",
                    dataType : "JSON",
                    data : {s_kode: s_kode},
                    cache:false,
                    success: function(data){
                        $.each(data,function(s_kode, s_nama){
              $('[name="s_kode"]').val(data.s_kode);
              $('[name="s_nama"]').val(data.s_nama);
                              
                            
                        });
                        
                    }
                });
                return false;
           });
       
    });
  
</script>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      //('#modalBarang').modal('show');
      $(".chosen").chosen();
        $('#pabrik_id').on('change',function(){
                
                var pabrik_id=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('produko/get_prinsipal')?>",
                    dataType : "JSON",
                    data : {pabrik_id: pabrik_id},
                    cache:false,
                    success: function(data){
                        $.each(data,function(pabrik_id, nama_pt, s_kode, pabriknama){
              $('[name="pabrik_id"]').val(data.pabrik_id);
              $('[name="nama_pt"]').val(data.nama_pt);
              $('[name="s_kode"]').val(data.s_kode);                     
               $('[name="pabriknama"]').val(data.pabriknama);             
                        });
                        
                    }
                });
                return false;
           });
       
    });
  
</script>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      //('#modalBarang').modal('show');
      $(".chosen").chosen();
        $('#idpr').on('change',function(){
                
                var idpr=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('produko/get_prinsipalcompare')?>",
                    dataType : "JSON",
                    data : {idpr: idpr},
                    cache:false,
                    success: function(data){
                        $.each(data,function(idpr, pabrik_id, nama_pt, s_kode, harga_kecil_e_cat, harga_sama_e_cat, harga_dibawahten, harga_diataten){
                          $('[name="idpr"]').val(data.idpr);
                          $('[name="pabrikid"]').val(data.pabrik_id);
                          $('[name="nama_pt"]').val(data.nama_pt);
                          $('[name="s_kode"]').val(data.s_kode);                     
                           $('[name="harga_kecil_e_cat"]').val(data.harga_kecil_e_cat);
                           $('[name="harga_sama_e_cat"]').val(data.harga_sama_e_cat);
                          $('[name="harga_dibawahten"]').val(data.harga_dibawahten);                     
                           $('[name="harga_diataten"]').val(data.harga_diataten);             
                        });
                        
                    }
                });
                return false;
           });
       
    });
  
</script>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      //('#modalBarang').modal('show');
      $(".chosen").chosen();
        $('#alumid').on('change',function(){
                
                var alumid=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('produko/get_alum')?>",
                    dataType : "JSON",
                    data : {alumid: alumid},
                    cache:false,
                    success: function(data){
                        $.each(data,function(alumid, pt_alum, distalumid, alumnama){
              $('[name="alumid"]').val(data.alumid);
              $('[name="pt_alum"]').val(data.pt_alum);
              $('[name="distalumid"]').val(data.distalumid);                     
               $('[name="alumnama"]').val(data.alumnama);             
                        });
                        
                    }
                });
                return false;
           });
       
    });

    <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      //('#modalBarang').modal('show');
      $(".chosen").chosen();
        $('#barangid').on('change',function(){
                
                var barangid=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('produko/get_alumcss')?>",
                    dataType : "JSON",
                    data : {barangid: barangid},
                    cache:false,
                    success: function(data){
                        $.each(data,function(barangid, barangnama){
              $('[name="alumpbkid"]').val(data.barangid);
              $('[name="produkom"]').val(data.barangnama);
                    
                        });
                        
                    }
                });
                return false;
           });
       
    });
  
</script>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $(".chosen").chosen();
      //('#modalBarang').modal('show');
        $('#alkesid').on('change',function(){
                
                var alkesid=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('produko/get_alkes')?>",
                    dataType : "JSON",
                    data : {alkesid: alkesid},
                    cache:false,
                    success: function(data){
                        $.each(data,function(alkesid, pt_alkes, distalkesid, alkesnama){
              $('[name="alkesid"]').val(data.alkesid);
              $('[name="pt_alkes"]').val(data.pt_alkes);
              $('[name="distalkesid"]').val(data.distalkesid);                     
               $('[name="alkesnama"]').val(data.alkesnama);             
                        });
                        
                    }
                });
                return false;
           });
       
    });
  
</script>

 <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      //('#modalBarang').modal('show');
       $(".chosen").chosen();
       $('#koders').on('change',function(){
                
                var koders=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Ebitda/get_koders')?>",
                    dataType : "JSON",
                    data : {koders: koders},
                    cache:false,
                    success: function(data){
                        $.each(data,function(koders, namars){
              $('[name="koders"]').val(data.koders);
              $('[name="namars"]').val(data.namars);
                              
                            
                        });
                        
                    }
                });
                return false;
           });
       
    });
  
</script>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      //('#modalBarang').modal('show');
       $(".chosen").chosen();
       $('#kodebulan').on('change',function(){
                
                var kodebulan=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Ebitda/get_kodebulan')?>",
                    dataType : "JSON",
                    data : {kodebulan: kodebulan},
                    cache:false,
                    success: function(data){
                        $.each(data,function(kodebulan, namabulan){
              $('[name="kodebulan"]').val(data.kodebulan);
              $('[name="namabulan"]').val(data.namabulan);
                              
                            
                        });
                        
                    }
                });
                return false;
           });
       
    });
  
</script>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      //('#modalBarang').modal('show');
       $(".chosen").chosen();
       $('#idtarebit').on('change',function(){
                
                var idtarebit=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Ebitda/get_target')?>",
                    dataType : "JSON",
                    data : {idtarebit: idtarebit},
                    cache:false,
                    success: function(data){
                        $.each(data,function(idtarebit, kodebulan, namabulan, nilai_target){
              $('[name="idtarebit"]').val(data.idtarebit);
              $('[name="namabulan"]').val(data.namabulan);
               $('[name="kodebulan"]').val(data.kodebulan);
              $('[name="nilai_target"]').val(data.nilai_target);
                              
                            
                        });
                        
                    }
                });
                return false;
           });
       
    });
  
</script>

<script type="text/javascript">
$(function() {
    $( "#datepicker21" ).datepicker({  format: 'yyyy'});
    });
</script>
<script type="text/javascript">
$(function() {
    $( "#datepicker22" ).datepicker({  format: 'yyyy'});
    });
</script>
<script type="text/javascript">
$(function() {
    $( "#datepicker23" ).datepicker({  format: 'yyyy'});
    });
</script>

<script type="text/javascript">
$(function() {
    $( "#datepicker24" ).datepicker({  format: 'yyyy'});
    });
</script>
<script type="text/javascript">
$(function() {
    $( "#datepicker25" ).datepicker({  format: 'yyyy'});
    });
</script>
<script type="text/javascript">
$(function() {
    $( "#datepicker26" ).datepicker({  format: 'yyyy'});
    });
</script>
<script type="text/javascript">
$(function() {
    $( "#datepicker27" ).datepicker({  format: 'yyyy'});
    });
</script>



<script src="<?php echo base_url('assets/js/html2canvas.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jspdf.min.js'); ?>"></script>
<script type="text/javascript">
$(document).ready(function(){

  
var element = $("#html-content-holder"); // global variable
var getCanvas; // global variable
 
    $("#btn-Preview-Image").on('click', function () {
         html2canvas(element, {
         onrendered: function (canvas) {
                $("#previewImage").append(canvas);
                getCanvas = canvas;
             }
         });
    });

    

  $("#btn-Convert-Html2Image").on('click', function () {
    var imgageData = getCanvas.toDataURL("image/png");
    // Now browser starts downloading it instead of just showing it
    var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
    $("#btn-Convert-Html2Image").attr("download", "EBITDA <?php echo trim($namars) ?>.png").attr("href", newData);
  });

});

</script>


<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      //('#modalBarang').modal('show');
      $("#koper").chosen();
        $('#koper').on('change',function(){
                
                var koper=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('produko2/get_prinsipal')?>",
                    dataType : "JSON",
                    data : {koper: koper},
                    cache:false,
                    success: function(data){
                        $.each(data,function(koper, nm_perusahaan, kodis, nm_distributor, id_tipe_produk){
              $('[name="koper"]').val(data.koper);
              $('[name="nm_perusahaan"]').val(data.nm_perusahaan);
              $('[name="kodis"]').val(data.kodis); 
              $('[name="nm_distributor"]').val(data.nm_distributor);
              $('[name="id_tipe_produk"]').val(data.id_tipe_produk);                                         
                        });
                        
                    }
                });
                return false;
           });
       
    });
  
</script>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      //('#modalBarang').modal('show');
      $(".chosen").chosen();
        $('#idpr2').on('change',function(){
                
                var idpr2=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('produko2/get_prinsipalcompare')?>",
                    dataType : "JSON",
                    data : {idpr2: idpr2},
                    cache:false,
                    success: function(data){
                        $.each(data,function(idpr2, koper, nm_perusahaan, kodis, harga_kecil_e_cat, harga_sama_e_cat, harga_dibawahten, harga_diataten){
                          $('[name="idpr2"]').val(data.idpr2);
                          $('[name="koper"]').val(data.koper);
                          $('[name="nm_perusahaan"]').val(data.nm_perusahaan);
                          $('[name="kodis"]').val(data.kodis);                     
                           $('[name="harga_kecil_e_cat"]').val(data.harga_kecil_e_cat);
                           $('[name="harga_sama_e_cat"]').val(data.harga_sama_e_cat);
                          $('[name="harga_dibawahten"]').val(data.harga_dibawahten);                     
                           $('[name="harga_diataten"]').val(data.harga_diataten);             
                        });
                        
                    }
                });
                return false;
           });
       
    });
  
</script>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      //('#modalBarang').modal('show');
      $("#kode_produk").chosen({width:'100%'});
       $('#kode_produk').on('change',function(){
               
                var kode_produk=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('produko2/get_obatss')?>",
                    dataType : "JSON",
                    data : {kode_produk: kode_produk},
                    cache:false,
                    success: function(data){
                        $.each(data,function(kode_produk, nama_produk, koper, kodis, deskripsi){
              $('[name="kode_produk"]').val(data.kode_produk);
              $('[name="nama_produk"]').val(data.nama_produk);
               $('[name="koper"]').val(data.koper);
              $('[name="kodis"]').val(data.kodis);
               $('[name="deskripsi"]').val(data.deskripsi);                              
                            
                        });
                        
                    }
                });
                return false;
           });
        
    });
  
</script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
  <script type="text/javascript">
    
      $(".chosen-select").chosen({no_results_text: "Oopss, Data tidak ada!"});
         $(".dara-select").chosen({width:'100%'});   
         $(".dara-select21").chosen({width:'100%'});
  
</script>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
  <script type="text/javascript">
    
      $(".chosen1").chosen({no_results_text: "Oopss, Data tidak ada!"});
      $(".chosendara1").chosen({width:'100%'});
  
</script>

<script type="text/javascript">
		$(document).ready(function(){
			//('#modalBarang').modal('show');
                         $('#kode_jenis').chosen({width:'100%'});
			 $('#kode_jenis').on('change',function(){
                
                var kode_jenis=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('masterperusahaan/get_jenis_pekerjaan')?>",
                    dataType : "JSON",
                    data : {kode_jenis: kode_jenis},
                    cache:false,
                    success: function(data){
                        $.each(data,function(kode_jenis, nm_pekerjaan){
							$('[name="kode_jenis"]').val(data.kode_jenis);
                            $('[name="bidang_pekerjaan"]').val(data.nm_pekerjaan);
                  
                        });
                        
                    }
                });
                return false;
           });
		   
                    $('#id_tipe_produk_modal').chosen({width:'100%'});
		    $('#id_tipe_produk_modal').on('change',function(){
                
                var id_tipe_produk=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('masterperusahaan/get_tipe_produk')?>",
                    dataType : "JSON",
                    data : {id_tipe_produk: id_tipe_produk},
                    cache:false,
                    success: function(data){
                        $.each(data,function(id_tipe_produk, tipe_produk){
							$('[name="id_tipe_produk_m"]').val(data.id_tipe_produk);
                            $('[name="tipe_produk_modal"]').val(data.tipe_produk);
                  
                        });
                        
                    }
                });
                return false;
           });
		   

		 });

</script>












<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      //('#modalBarang').modal('show');
      $("#koper").chosen();
        $('#koper').on('change',function(){
                
                var koper=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('produko2/get_alum21')?>",
                    dataType : "JSON",
                    data : {koper: koper},
                    cache:false,
                    success: function(data){
                        $.each(data,function(koper, id_tipe_produk){
              $('[name="koper"]').val(data.koper);
              $('[name="id_tipe_produk"]').val(data.id_tipe_produk);
                        
                        });
                        
                    }
                });
                return false;
           });
       
    });
</script>



<script>
$(document).ready(function(){

	load_data();

	function load_data()
	{
		$.ajax({
			url:"<?php echo base_url(); ?>excel_import/fetch",
			method:"POST",
			success:function(data){
				$('#customer_data').html(data);

			}
		})
	}

	$('#import_form').on('submit', function(event){
		event.preventDefault();
		$.ajax({
			url:"<?php echo base_url(); ?>excel_import/import",
			method:"POST",
			data:new FormData(this),
			contentType:false,
			cache:false,
			processData:false,
			success:function(data){
				$('#file').val('');
				load_data();
				alert(data);
				
			}
			// 
		});
		 
	});
	

});
</script>


<script src="<?php echo base_url('assets/datatables/js/datatables.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/datatables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.buttons.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/buttons.flash.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jszip.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/pdfmake.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/vfs_fonts.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/buttons.html5.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/buttons.print.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/css/jquery.dataTables.min.css')?>"></script>
<script src="<?php echo base_url('assets/datatables/css/buttons.dataTables.min.css')?>"></script>
<script src="<?php echo base_url('assets/datatables/css/semantic.min.css')?>"></script>
<script src="<?php echo base_url('assets/datatables/css/dataTables.semanticui.min.css')?>"></script>

 
 
<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#table').DataTable({  
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('C_mstsatuan/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});
 
</script>


<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#table1').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('C_mstproduk/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});
 
</script>

<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#table2').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('C_mstproduk/ajax_listalkes')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});
 
</script>

<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#table3').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('C_mstproduk/ajax_listalum')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});
 
</script>

<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#table4').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('C_mstproduk/ajax_listdepbang')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});
 
</script>


<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#table5').DataTable({


        
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],

        "lengthMenu":[[100, -1], [100, "All"]],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('C_rekananobat/ajax_list')?>",
            "type": "POST"
        },

        
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
         
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
         
       
    });
 
});
 
</script>

<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#table6').DataTable({


        
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],

        "lengthMenu":[[50, -1], [50, "All"]],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('C_rekananalkes/ajax_list')?>",
            "type": "POST"
        },

        
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
         
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
         
       
    });
 
});
 
</script>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>

  <script type="text/javascript">

    $(document).ready(function(){
      //('#modalBarang').modal('show');
      $("#koper").chosen({width: '100%'});
        $('#koper').on('change',function(){
                
                var koper=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Farmasitransaksi/get_prinsipal')?>",
                    dataType : "JSON",
                    data : {koper: koper},
                    cache:false,
                    success: function(data){
                        $.each(data,function(koper, kodis){
              $('[name="koper"]').val(data.koper);
              $('[name="kodis"]').val(data.kodis);                           
                        });
                        
                    }
                });
                return false;
           });
       
    });
  
</script>

 <script>
            function startCalc(){
            interval = setInterval("calc()",1);}
            function calc(){
            dara = document.form1.harga_baru.value;
            document.form1.harga_excppn.value = (dara);
            document.form1.harga_incppn.value =((dara*0.1) + (dara*1));
               }
            function stopCalc(){
            clearInterval(interval);}
          </script>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      //('#modalBarang').modal('show');
      $("#koper").chosen({width: '100%'});
        $('#koper').on('change',function(){
                
                var koper=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Obattr/get_prinsipal')?>",
                    dataType : "JSON",
                    data : {koper: koper},
                    cache:false,
                    success: function(data){
                        $.each(data,function(koper, kodis){
              $('[name="koper"]').val(data.koper);
              $('[name="kodis"]').val(data.kodis);
              $('[name="nm_distributor"]').val(data.nm_distributor);                           
                        });
                        
                    }
                });
                return false;
           });
       
    });
  
</script>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      //('#modalBarang').modal('show');
      $("#idobat").chosen({width: '100%'});
        $('#idobat').on('change',function(){
                
                var idobat=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Obattr/get_produkobat')?>",
                    dataType : "JSON",
                    data : {idobat: idobat},
                    cache:false,
                    success: function(data){
                               $.each(data,function(idobat, kode_obat, harga, golonganid, komposisi){
                $('[name="idobat"]').val(data.idobat);
               $('[name="kode_obat"]').val(data.kode_obat);
               $('[name="harga"]').val(data.harga);
			   $('[name="golonganid"]').val(data.golonganid);
			   $('[name="komposisi"]').val(data.komposisi);
                        });
                        
                    }
                });
                return false;
           });
       
    });
  
</script>


  <script type="text/javascript">
    $(document).ready(function(){
      //('#modalBarang').modal('show');
      $("#kode_produk_v2").chosen({width: '100%'});
        $('#kode_produk_v2').on('change',function(){

                var kode_produk=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Alkestransaksi/get_alkesdara')?>",
                    dataType : "JSON",
                    data : {kode_produk: kode_produk},
                    cache:false,
                    success: function(data){
                        $.each(data,function(kode_produk, merk, type, nm_perusahaan, jns_barang){
                $('[name="kode_produk"]').val(data.kode_produk);
               $('[name="merk"]').val(data.merk);
               $('[name="type"]').val(data.type);
              $('[name="nm_perusahaan"]').val(data.nm_perusahaan);
               $('[name="jns_barang"]').val(data.jns_barang);
                        });

                    }
                });
                return false;
           });

    });

</script>


 <script type="text/javascript">
    $(document).ready(function(){
      //('#modalBarang').modal('show');
      $("#kode_produkuul").chosen({width: '100%'});
        $('#kode_produkuul').on('change',function(){

                var kode_produk=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Alkesrr/get_alkesdara')?>",
                    dataType : "JSON",
                    data : {kode_produk: kode_produk},
                    cache:false,
                    success: function(data){
                        $.each(data,function(kode_produk, merk, type, nm_perusahaan, jns_barang){
                $('[name="kode_produk"]').val(data.kode_produk);
               $('[name="merk"]').val(data.merk);
               $('[name="type"]').val(data.type);
              $('[name="nm_perusahaan"]').val(data.nm_perusahaan);
              $('[name="jns_barang"]').val(data.jns_barang);
                        });

                    }
                });
                return false;
           });

    });

</script>






<script>
$(document).ready(function(){

  load_data();

  function load_data()
  {
    $.ajax({
      url:"<?php echo base_url(); ?>Excel_import/fetch",
      method:"POST",
      success:function(data){
        $('#satuan_data').html(data);
      }
    })
  }

  $('#import_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"<?php echo base_url(); ?>Excel_import/import",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      success:function(data){
        $('#file').val('');
        load_data();
        alert(data);
      }
    })
  });

});
</script>

<script>
$(document).ready(function(){

  load_data();

  function load_data()
  {
    $.ajax({
      url:"<?php echo base_url(); ?>Excel_import/fetchsetdis",
      method:"POST",
      success:function(data){
        $('#setdis_data').html(data);
      }
    })
  }

  $('#import_formsetdis').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"<?php echo base_url(); ?>Excel_import/importsetdis",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      success:function(data){
        $('#file').val('');
        load_data();
        alert(data);
      }
    })
  });

});
</script>


<script>
$(document).ready(function(){

  load_data();

  function load_data()
  {
    $.ajax({
      url:"<?php echo base_url(); ?>Excel_import/fetchalum",
      method:"POST",
      success:function(data){
        $('#alum_data').html(data);
      }
    })
  }

  $('#import_formalum').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"<?php echo base_url(); ?>Excel_import/importalum",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      success:function(data){
        $('#file').val('');
        load_data();
        alert(data);
      }
    })
  });

});
</script>


<script>
$(document).ready(function(){

  load_data();

  function load_data()
  {
    $.ajax({
      url:"<?php echo base_url(); ?>Excel_import/fetchobat",
      method:"POST",
      success:function(data){
        $('#obat_data').html(data);
      }
    })
  }

  $('#import_formobat').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"<?php echo base_url(); ?>Excel_import/importobat",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      success:function(data){
        $('#file').val('');
        load_data();
        alert(data);
      }
    })
  });

});
</script>


<script>
$(document).ready(function(){

  load_data();

  function load_data()
  {
    $.ajax({
      url:"<?php echo base_url(); ?>Excel_import/fetchalkes",
      method:"POST",
      success:function(data){
        $('#alkes_data').html(data);
      }
    })
  }

  $('#import_formalkes').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"<?php echo base_url(); ?>Excel_import/importalkes",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      success:function(data){
        $('#file').val('');
        load_data();
        alert(data);
      }
    })
  });

});
</script>


<script>
$(document).ready(function(){

  load_data();

  function load_data()
  {
    $.ajax({
      url:"<?php echo base_url(); ?>Excel_import/fetchdepbang",
      method:"POST",
      success:function(data){
        $('#depbang_data').html(data);
      }
    })
  }

  $('#import_formdepbang').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"<?php echo base_url(); ?>Excel_import/importdepbang",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      success:function(data){
        $('#file').val('');
        load_data();
        alert(data);
      }
    })
  });

});
</script>

<!-- perusahaan -->

<script>
$(document).ready(function(){

  load_data();

  function load_data()
  {
    $.ajax({
      url:"<?php echo base_url(); ?>Excel_import/fetchperalum",
      method:"POST",
      success:function(data){
        $('#peralum_data').html(data);
      }
    })
  }

  $('#import_formperalum').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"<?php echo base_url(); ?>Excel_import/importperalum",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      success:function(data){
        $('#file').val('');
        load_data();
        alert(data);
      }
    })
  });

});
</script>




<script> $(document).ready(function(){
  load_data();
  function load_data()
  {
    $.ajax({
      url:"<?php echo base_url(); ?>Excel_import/fetchperobat",
      method:"POST",
      success:function(data){
        $('#perobat_data').html(data);
      }
    })
  }
  $('#import_formperobat').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"<?php echo base_url(); ?>Excel_import/importperobat",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      success:function(data){
        $('#file').val('');
        load_data();
        alert(data);
      }
    })
  });
});
</script>




<script> $(document).ready(function(){
  load_data();
  function load_data()
  {
    $.ajax({
      url:"<?php echo base_url(); ?>Excel_import/fetchperdisobat",
      method:"POST",
      success:function(data){
        $('#perdisobat_data').html(data);
      }
    })
  }
  $('#import_formperdisobat').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"<?php echo base_url(); ?>Excel_import/importperdisobat",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      success:function(data){
        $('#file').val('');
        load_data();
        alert(data);
      }
    })
  });
});
</script>






<!-- perusahaan alkes--> <script> $(document).ready(function(){
  load_data();
  function load_data()
  {
    $.ajax({
      url:"<?php echo base_url(); ?>Excel_import/fetchperalkes",
      method:"POST",
      success:function(data){
        $('#peralkes_data').html(data);
      }
    })
  }
  $('#import_formperalkes').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"<?php echo base_url(); ?>Excel_import/importperalkes",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      success:function(data){
        $('#file').val('');
        load_data();
        alert(data);
      }
    })
  });
});
</script>

<script>
$(document).ready(function(){

  load_data();

  function load_data()
  {
    $.ajax({
      url:"<?php echo base_url(); ?>Excelcobaimport/fetchobat",
      method:"POST",
      success:function(data){
        $('#obat_excelcui').html(data);
      }
    })
  }

  $('#import_formobatcui').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"<?php echo base_url(); ?>Excelcobaimport/importobat",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      success:function(data){
        $('#file').val('');
        load_data();
        alert(data);
      }
    })
  });

});
</script>


<script> $(function(){
    var requiredCheckboxes = $('#alkes :checkbox[required]');
    requiredCheckboxes.change(function(){
        if(requiredCheckboxes.is(':checked')) {
            requiredCheckboxes.removeAttr('required');
        } else {
            requiredCheckboxes.attr('required', 'required');
        }
    });
});
</script>

<script> $(function(){
    var requiredCheckboxes = $('#daraanisa :checkbox[required]');
    requiredCheckboxes.change(function(){
        if(requiredCheckboxes.is(':checked')) {
            requiredCheckboxes.removeAttr('required');
        } else {
            requiredCheckboxes.attr('required', 'required');
        }
    });
});
</script>

<script> $(function(){
    var requiredCheckboxes = $('#daraanisa21 :checkbox[required]');
    requiredCheckboxes.change(function(){
        if(requiredCheckboxes.is(':checked')) {
            requiredCheckboxes.removeAttr('required');
        } else {
            requiredCheckboxes.attr('required', 'required');
        }
    });
});
</script>


<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#table21').DataTable({ 
        
        "lengthMenu": [[5, 10,25,  -1], [5,10,25, "All"]],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Alkesview/ajax_listalkesview')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});
 
</script>

<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#table31').DataTable({ 
        
        "lengthMenu": [[5, 10,25,  -1], [5,10,25, "All"]],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Alumview/ajax_listalumview')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});
 
</script>


<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#table91').DataTable({ 
        
        "lengthMenu": [[5, 10,25,  -1], [5,10,25, "All"]],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Obattrview/ajax_listdaraview')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});
 
</script>


<script>
            function startCalc2(){
            interval = setInterval("calcdaraannisa()",1);}
            function calcdaraannisa(){

               if ( document.getElementById("ppncheck").checked == true){
                         uulcek=10;
                         } else {
                         uulcek=0;  
                         }
            daraannisa = document.form2.harga.value;
            daraannisa2 = document.form2.discount.value;
            daraannisa21=uulcek;
           // daraannisa21 = document.form2.ppn.value;
          document.form2.harga_akhir.value = ((daraannisa)-((daraannisa*daraannisa2)/100)*1) + ((daraannisa)-((daraannisa*daraannisa2)/100)*1)*daraannisa21/100;
              }
            function stopCalc2(){
            clearInterval(interval);}
          </script>

<script>
            function startCalc3(){
            interval = setInterval("calc31()",1);}
            function calc31(){
            ynwa = document.form2.totalharga.value;
            ynwa2 = document.form2.disc.value;
            ynwa21 = document.form2.ppn.value;
            cui= document.form2.grandtotal.value = ((ynwa)-((ynwa*ynwa2)/100)*1) + ((ynwa)-((ynwa*ynwa2)/100)*1)*ynwa21/100;

            bilangan=cui.toFixed(2)
               
            var number_string = bilangan.toString(),
              split = number_string.split(','),
              sisa  = split[0].length % 3,
              rupiah  = split[0].substr(0, sisa),
              ribuan  = split[0].substr(sisa).match(/\d{1,3}/gi);
    
              if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
              }
              rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;

            document.form2.hasil.value= rupiah;

                        }
            function stopCalc3(){
            clearInterval(interval);}
          </script>


<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#table77').DataTable({ 
        
        "lengthMenu": [[5, 10,25,  -1], [5,10,25, "All"]],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Depbangview/ajax_listdepbangview')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});
 
</script>



<!-- perusahaan depbang--> <script> $(document).ready(function(){
  load_data();
  function load_data()
  {
    $.ajax({
      url:"<?php echo base_url(); ?>Excel_import/fetchperdepbang",
      method:"POST",
      success:function(data){
        $('#perdepbang_data').html(data);
      }
    })
  }
  $('#import_formperdepbang').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"<?php echo base_url(); ?>Excel_import/importperdepbang",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      success:function(data){
        $('#file').val('');
        load_data();
        alert(data);
      }
    })
  });
});
</script>


<script>
function doconfirm()
{
    job=confirm("Anda Yakin Hapus?");
    if(job!=true)
    {
        return false;
    }
}
</script>

<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#table64').DataTable({ 
        
        "lengthMenu": [[5, 10,25,  -1], [5,10,25, "All"]],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('produko2/ajax_listalumviewhistori')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});
 
</script>


<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#table88').DataTable({ 
        
        "lengthMenu": [[5, 10,25,  -1], [5,10,25, "All"]],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Depbangtr/ajax_listdepviewhistori')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});
 
</script>


<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#table101').DataTable({ 
        
        "lengthMenu": [[5, 10,25,  -1], [5,10,25, "All"]],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Approval/ajax_listaproveview')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});
 
</script>


<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#table17').DataTable({ 
        
        "lengthMenu": [[5, 10,25,  -1], [5,10,25, "All"]],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('c_po/ajax_listalkespo')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});
 
</script>




<script type="text/javascript">
    $(document).ready(function() {
        $("#kode_produk").change(function(){
            var kode_produk = $("#kode_produk").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('c_po/get_detail'); ?>",
                data: "kode_produk="+kode_produk,
                cache:false,
                success: function(data){
                    $('#detail_barang').html(data);
                    document.frm.add.disabled=false;
                }
            });
        });
	$(".delbutton").click(function(){
            var element = $(this);
            var del_id = element.attr("id");
            var info = del_id;
            if(confirm("Anda yakin akan menghapus?"))
            {
                $.ajax({
                    url: "<?php echo base_url(); ?>penjualan/hapus_penjualan",
                    data: "kode="+info,
                    cache: false,
                    success: function(){
                    }
                });
                $(this).parents(".gradeX").animate({ opacity: "hide" }, "slow");
            }
            return false;
        });
	      //Hapus Item Cart
        $(document).on('click','.hapus_cart',function(){
            var row_id=$(this).attr("id"); //mengambil row_id dari artibut id
            $.ajax({
                url : "<?php echo base_url();?>c_po/hapus_cart",
                method : "POST",
                data : {row_id : row_id},
                success :function(data){
                    $('#detail_barang').html(data);
                }
            });
        });
		
	  });
</script> 


<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#table65').DataTable({ 
        
        "lengthMenu": [[5, 10,25,  -1], [5,10,25, "All"]],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('produko2/ajax_listalkesviewhistori')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});
 
</script>




<script>
	$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
		$("#check-all").click(function(){ // Ketika user men-cek checkbox all
			if($(this).is(":checked")) // Jika checkbox all diceklis
				$(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
				
			else // Jika checkbox all tidak diceklis
				$(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
		});
		
		$("#btn-delete").click(function(){ // Ketika user mengklik tombol delete
			
			var checked = $("input[type=checkbox]:checked").length;
			
			//var confirm = window.confirm("Apakah Anda yakin ingin menghapus data-data ini?"); // Buat sebuah alert konfirmasi
			if(!checked) {// Jika user mengklik tombol "Ok"
				
				alert("Belum ada yang di cek.");
				return false
			}
		});
		
			$("#btn-delete2").click(function(){ // Ketika user mengklik tombol delete
			var confirm = window.confirm("Apakah Anda yakin ingin menghapus data-data ini?"); // Buat sebuah alert konfirmasi
			
			if(confirm) // Jika user mengklik tombol "Ok"
				$("#form-delete2").submit(); // Submit form
				else return false
		});
	});
	</script>

<script>
          $('#myModal2').modal('show');
           $(".dara").chosen({width: '100%'});
    </script>

<script type='text/javascript'>
function fun_show()
{
  var select_status=$('#messagetype').val();
  if(select_status == 'ditolak Direktur RS' || select_status == 'ditolak Direktur Ops & Umum' || select_status == 'ditolak Direktur Regional' || select_status == 'ditolak Direktur Utama' )
  {
    $('.mobileno').show();
  }else{
    $('.mobileno').hide();
  }
}
</script> 


<script>


$(document).ready(function () {
    $('.box-body').on('keyup', 'input', sumtotal);
    function sumtotal() {
        var hour= 0;
      	var rate = 0;
        var subtotal = 0;

        $('.box-body tbody tr').each(function () {
            hour =  parseNumber($(this).find('[name="harga_baru[]"]').val()); 
            rate = parseNumber($(this).find('[name="discount_baru[]"]').val());
           
            subtotal = hour-(hour * rate)/100;

           $(this).find('[name="harga_akhir_baru[]"]').val(subtotal);
		  //$(this).find('[name="catatan[]"]').prop("readonly", false);
		   
			//$('[name="harga_akhir_baru[]"]').val(subtotal);
            //total += subtotal;
        });
        
    }
    function parseNumber(n) {
        var f = parseFloat(n); //Convert to float number.
        return isNaN(f) ? 0 : f; //treat invalid input as 0;
    }
});

</script>


<script type="text/javascript">
/* function validasi_input(form4){
   pola_username=/^[a-zA-Z0-9\_\-]{6,100}$/;
   if (!pola_username.test(document.form4.harga_baru.value)){
      alert ('Username minimal 6 karakter dan hanya boleh Huruf atau Angka!');
      document.form4.harga_baru.focus();
      return false;
   }
return (true);
} */
$(document).ready(function () {
function allnumeric(inputtxt)
      {
      var numbers = /^[0-9]+$/;
      if(inputtxt.value.match(numbers))
      {
      alert('Your Registration number has accepted....');
      document.form4.harga_baru[].focus();
      return true;
      }
      else
      {
      alert('Please input numeric characters only');
      document.form4.harga_baru[].focus();
      return false;
      }
      }
});

</script>


<script type="text/javascript">

    function enterNumber(){

	var e = document.getElementById('text_harbar');

	if (!/^[0-9]+$/.test(e.value)) 
		{ 
			alert("Inputan Mengandung Karakter Bukan Angka.");
			e.value = e.value.substring(0,e.value.length-1);
		}
	} 

</script>



<script>
var harga_baru = document.harga_baru.value('input[name="harga_baru[]"]');
var harga_baru2 = document.harga_baru2.value('input[name="harga_baru2[]"]');
harga_baru.onkeyup = function() {
  harga_baru2.onkeyup = this.value.replaceALL(/\,/g,'');
  // return harga_baru2[har];
} 
</script>

<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#table117').DataTable({ 
        
        "lengthMenu": [[5, 10,25,  -1], [5,10,25, "All"]],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('C_poacc/ajax_listalkespoacc')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});
 
</script>

<script>
$(document).ready(function(){

  load_data();

  function load_data()
  {
    $.ajax({
      url:"<?php echo base_url(); ?>Excel_importlokasi/fetchlokasi",
      method:"POST",
      success:function(data){
        $('#lokasi_dara').html(data);
      }
    })
  }

  $('#import_lokasi21').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"<?php echo base_url(); ?>Excel_importlokasi/importlokasi2",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      success:function(data){
        $('#file').val('');
        // $('#uul').val('')
        load_data();
        alert(data);
        
      }
    })
  });

});
</script>


<script> $(function(){
    var requiredCheckboxes = $('#obatreg :checkbox[required]');
    requiredCheckboxes.change(function(){
        if(requiredCheckboxes.is(':checked')) {
            requiredCheckboxes.removeAttr('required');
        } else {
            requiredCheckboxes.attr('required', 'required');
        }
    });
});
</script>

<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#tablealkesrr').DataTable({ 
        
        "lengthMenu": [[10,25,  -1], [10,25, "All"]],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Alkesrr/alkeslistingrrview')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});
 
</script>

<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#tablealkesrr21').DataTable({ 
        
        "lengthMenu": [[10,25,  -1], [10,25, "All"]],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Alkesrr/alkeslistingrrviewcetak')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});
 
</script>

<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#tablehistori').DataTable({ 
        
        "lengthMenu": [[10,25,  -1], [10,25, "All"]],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Alkesrr/listingrrhistori')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});
 
</script>

<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#tablelive').DataTable({ 
        
        "lengthMenu": [[10,25,  -1], [10,25, "All"]],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Alkesrr/listingrrlive')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});
 
</script>

<script>
$(document).ready(function(){

  load_data();

  function load_data()
  {
    $.ajax({
      url:"<?php echo base_url(); ?>Excel_importrralkes/fetchrrsalkes",
      method:"POST",
      success:function(data){
        $('#rralkes_dara').html(data);
      }
    })
  }

  $('#import_alkesrr21').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"<?php echo base_url(); ?>Excel_importrralkes/importrrsalkes",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      success:function(data){
        $('#file').val('');
        $('#uul1').val('');
         $('#uul2').val('');
          $('#uul3').val('');
           //$('#uul4').val('');
            $('#uul5').val('');
             $('#uul6').val('');
              $('#uul7').val('');
               $('#uul8').val('');
                $('#uul9').val('');
        load_data();
        alert(data);
        
      }
    })
  });

});
</script>

<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#darasetwil').DataTable({ 
        
        "lengthMenu": [[10,25,  -1], [10,25, "All"]],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('C_set_wil/ajaxmst_setwil')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});
 
</script>

<script type="text/javascript">
 function show1(){
  document.getElementById('divdara1').style.display ='block';
  document.getElementById('divdara2').style.display ='none';
  
}
function show2(){
  document.getElementById('divdara1').style.display ='none';
  document.getElementById('divdara2').style.display = 'block';
}
   
 </script>

 <script type='text/javascript'>

$(document).on('input', '#hargabaru', function() {
    var hl = $(this).closest('tr').find("#hargalama").val();
      var hb = $(this).closest('tr').find("#hargabaru").val();
       // var uul21 = $(this).closest('tr').find("#show").val();
       var hl2=Number(hl);
        var hb2=Number(hb);
  if (hb2 >= hl2) {
    $(this).closest('tr').find("#show").show();
      $(this).closest('tr').find("#show").prop('required',true);
 
    } else {
     $(this).closest('tr').find("#show").hide();
     $(this).closest('tr').find("#show").prop('required',false);
           }
    return false;
});

$(document).on('input','#diskonbaru', function() {
      var dl = $(this).closest('tr').find("#diskonlama").val();
      var db = $(this).closest('tr').find("#diskonbaru").val();
        var dl2=Number(dl);
        var db2=Number(db);
    if (dl2 >= db2) {
    $(this).closest('tr').find("#showdiskon").show();
     $(this).closest('tr').find("#showdiskon").prop('required',true);
  } else {
     $(this).closest('tr').find("#showdiskon").hide();
      $(this).closest('tr').find("#showdiskon").prop('required',false);
           }
    return false;
});

</script> 

<script type='text/javascript'>

$(document).on('change', '#messagetype', function() {
    var hl = $(this).closest('tr').find("#messagetype").val();
               
  if (hl=="ditolak") {
    $(this).closest('tr').find("#showapp").show();
      $(this).closest('tr').find("#showapp").prop('required',true);
 
    } else {
     $(this).closest('tr').find("#showapp").hide();
     $(this).closest('tr').find("#showapp").prop('required',false);
           }
    return false;
});
</script>

<script type='text/javascript'>

$(document).on('change', '#status_prinsipal21', function() {
    var hl = $(this).closest('tr').find("#status_prinsipal21").val();
               
  if (hl=="non aktif") {
    $(this).closest('tr').find("#catatan_stsprinsipal21").show();
      $(this).closest('tr').find("#catatan_stsprinsipal21").prop('required',true);
 
    } else {
     $(this).closest('tr').find("#catatan_stsprinsipal21").hide();
     $(this).closest('tr').find("#catatan_stsprinsipal21").prop('required',false);
           }
    return false;
});
</script>


<script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    $("#check-all").click(function(){ // Ketika user men-cek checkbox all
      if($(this).is(":checked")) // Jika checkbox all diceklis
        $(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
        
      else // Jika checkbox all tidak diceklis
        $(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
    });
    
    $("#btn-delete").click(function(){ // Ketika user mengklik tombol delete
      
      var checked = $("input[type=checkbox]:checked").length;
      
      //var confirm = window.confirm("Apakah Anda yakin ingin menghapus data-data ini?"); // Buat sebuah alert konfirmasi
      if(!checked) {// Jika user mengklik tombol "Ok"
        
        alert("Belum ada yang di cek.");
        return false
      }
    });
    
      $("#btn-delete2").click(function(){ // Ketika user mengklik tombol delete
      var confirm = window.confirm("Apakah Anda yakin ingin menghapus data-data ini?"); // Buat sebuah alert konfirmasi
      
      if(confirm) // Jika user mengklik tombol "Ok"
        $("#form-delete2").submit(); // Submit form
        else return false
    });
  });
  </script>

  <script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    $("#check-all21").click(function(){ // Ketika user men-cek checkbox all
      if($(this).is(":checked")) // Jika checkbox all diceklis
        $(".check-item21").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
      else // Jika checkbox all tidak diceklis
        $(".check-item21").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
    });
    
    $("#btn-delete21").click(function(){ // Ketika user mengklik tombol delete
      
      var checked = $("input[type=checkbox]:checked").length;
      
      //var confirm = window.confirm("Apakah Anda yakin ingin menghapus data-data ini?"); // Buat sebuah alert konfirmasi
      if(!checked) {// Jika user mengklik tombol "Ok"
        
        alert("Belum ada yang di cek.");
        return false
      }
    });
    
      $("#btn-delete2").click(function(){ // Ketika user mengklik tombol delete
      var confirm = window.confirm("Apakah Anda yakin ingin menghapus data-data ini?"); // Buat sebuah alert konfirmasi
      
      if(confirm) // Jika user mengklik tombol "Ok"
        $("#form-delete21").submit(); // Submit form
        else return false
    });
  });
  </script>
<script type='text/javascript'>

$(document).on('change', '#liverpool', function() {
    var hl = $(this).closest('tr').find("#liverpool").val();
               
  if (hl=="non aktif") {
    $(this).closest('tr').find("#kopites").show();
      $(this).closest('tr').find("#kopites").prop('required',true);
 
    } else {
     $(this).closest('tr').find("#kopites").hide();
     $(this).closest('tr').find("#kopites").prop('required',false);
           }
    return false;
});
</script>


<script type="text/javascript">
   function myfungsi23() {
      //var ket_1= document.getElementById("ket_1");
      if ( document.getElementById("ppncheck").checked == true){
        divuul.style.display = "block";
      } else {
         divuul.style.display = "none";
      }
    }
  </script>

  <script type="text/javascript">
   function myfungsigaransi() {
      //var ket_1= document.getElementById("ket_1");
      if ( document.getElementById("garansicheck").checked == true){
        divgaransi.style.display = "block";
      } else {
         divgaransi.style.display = "none";
      }
    }
  </script>

<script type='text/javascript'>

function garansifreeuul()
{
      var hl = $("#garansifree").val();
               
          if (hl=="1"){
            document.getElementById("mobileno1").readOnly  = true;
            document.getElementById("mobileno2").readOnly  = false;
            document.getElementById("mobileno3").readOnly  = false;
            document.getElementById("mobileno4").readOnly  = false;
            document.getElementById("mobileno5").readOnly  = false;
          }
          if(hl=="2") {
            document.getElementById("mobileno1").readOnly  = true;
            document.getElementById("mobileno2").readOnly  = true;
            document.getElementById("mobileno3").readOnly  = false;
            document.getElementById("mobileno4").readOnly  = false;
            document.getElementById("mobileno5").readOnly  = false;
          }
           if(hl=="3") {
            document.getElementById("mobileno1").readOnly  = true;
            document.getElementById("mobileno2").readOnly  = true;
            document.getElementById("mobileno3").readOnly  = true;
            document.getElementById("mobileno4").readOnly  = false;
            document.getElementById("mobileno5").readOnly  = false;
          }
           if(hl=="4") {
            document.getElementById("mobileno1").readOnly  = true;
            document.getElementById("mobileno2").readOnly  = true;
            document.getElementById("mobileno3").readOnly  = true;
            document.getElementById("mobileno4").readOnly  = true;
            document.getElementById("mobileno5").readOnly  = false;
          }
         if (hl=="5") {
            document.getElementById("mobileno1").readOnly  = true;
            document.getElementById("mobileno2").readOnly  = true;
            document.getElementById("mobileno3").readOnly  = true;
            document.getElementById("mobileno4").readOnly  = true;
            document.getElementById("mobileno5").readOnly  = true;
          }
           if (hl!="1" && hl!="2" && hl!="3" && hl!="4" && hl!="5") {
            document.getElementById("mobileno1").readOnly  = false;
            document.getElementById("mobileno2").readOnly  = false;
            document.getElementById("mobileno3").readOnly  = false;
            document.getElementById("mobileno4").readOnly  = false;
            document.getElementById("mobileno5").readOnly  = false;
          }
        
    }
</script>

<script type="text/javascript">
  function kodevalidasi()
    {

        var kd_pdk = $("#kode_produk").val();

        var ep="select * from Employ;"

        if (kd_pdk=="ALKES-0060")
          {
          alert("data kapeg !");
          return false;
          };
     }
</script>


<script type='text/javascript'>
function francors()
{
  var select_status=$('#regfranco').val();
  if(select_status == 'RE517')
  {
    $('#francors').show();
     $('#francors21').hide();
      $("#rs31").prop('required',true);
       $("#rs21").prop('required',false);
  }else{
    $('#francors').hide();
      $('#francors21').show();
       $("#rs31").prop('required',false);
        $("#rs21").prop('required',true);
  }
}
</script> 






<script> $(function(){
    var requiredCheckboxes = $('#obatreg :checkbox[required]');
    requiredCheckboxes.change(function(){
        if(requiredCheckboxes.is(':checked')) {
            requiredCheckboxes.removeAttr('required');
        } else {
            requiredCheckboxes.attr('required', 'required');
        }
    });
   
});
 
</script>



<script type='text/javascript'>

$(document).on('input', '#text_harbar', function() {
 

    var hl = $(this).closest('tr').find("#text_harlama").val();
      var hb = $(this).closest('tr').find("#text_harbar").val();
       // var uul21 = $(this).closest('tr').find("#show").val();
       var hl2=Number(hl);
        var hb2=Number(hb);
  if (hb2 >= hl2) {
    $(this).closest('tr').find("#show").show();
      $(this).closest('tr').find("#show").prop('required',true);
 
    } else {
     $(this).closest('tr').find("#show").hide();
     $(this).closest('tr').find("#show").prop('required',false);
    }
    return false;
});

   

</script> 



<script>
[].forEach.call(document.querySelectorAll('.check-item[type="checkbox"]'), function(elem) {
  elem.addEventListener('change', function() {
    this.parentNode.parentNode.querySelector('.text[type="text"]').disabled = !this.checked;

  });
})
</script>


<script>
[].forEach.call(document.querySelectorAll('.cek[type="checkbox"]'), function(elem) {
  elem.addEventListener('change', function() {
    this.parentNode.parentNode.querySelector('.text2[type="text"]').disabled = !this.checked;
																										

  });
})
</script>

		   

				<script>
						function startCalc(){
						interval = setInterval("calc()",1);}
						function calc(){
						one = document.form1.harga.value;
						two = document.form1.discount.value;
						
						document.form1.harga_akhir_baru.value = (one)-(one * two)/100;;
				
						}
						function stopCalc(){
						clearInterval(interval);}
					</script>

<script type="text/javascript">
     function myFunction_cariob() {
      //var ket_1= document.getElementById("ket_1");
      if ( document.getElementById("obatregx").checked == true){
		  document.getElementById('obatregxy').style.display = 'block';
		  document.getElementById('obatregst').style.display = 'none';
        //textalkes.style.display = "block";
      } else {
		  document.getElementById('obatregst').style.display = 'block';
		  document.getElementById('obatregxy').style.display = 'none';
        // textalkes.style.display = "none";
      }
    }
     </script>