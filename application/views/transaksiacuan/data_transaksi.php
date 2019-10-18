
<style type="text/css">
  
button{

margin-left: center;


}

</style>



      <section class="content-header">
        <h1>
          <b>DATA TRANSAKSI URAIAN EKSEKUTIF REPORT I (TARGET)</b>
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

              <div id="tomboltambahkan">
                
             

            <div  <?php  $kd_role=$this->session->userdata('koderole'); if($kd_role=='10') echo "hidden=''"; ?> >
          <!--   <a  style="margin-bottom:3px" href="<?php echo base_url(); ?>transaksiacuan/addtransaksi" class="btn btn-primary no-radius dropdown-toggle" ><i class="fa fa-plus" ></i> TAMBAH TRANSAKSI </a> -->

               <a  style="margin-bottom:3px" href="<?php echo base_url(); ?>transaksiacuan/addtransaksi" class="btn btn-primary form-control"><i class="fa fa-plus" ></i> TAMBAH TRANSAKSI </a>

          </div>
            <br/>
              <br/>

            <div class='row'>

             <!--  <div class='col-lg-6'  <?php $kd_role=$this->session->userdata('koderole'); if($kd_role=='18') echo "''";if($kd_role=='1') echo "''";if($kd_role=='18') echo "hidden=''";if($kd_role=='10') echo "hidden=''";?> >

                 <form role="form" action="<?php echo base_url(); ?>transaksiacuan/edittransaksi" method="POST" enctype="multipart/form-data"> 

            <input type="text"  name="periode" id="tanggal" placeholder="yyyymm" style="height:30px;" class='form-control'>
            <br/>
          
            <select name="cabangrs" style="height:30px;" required class='form-control'>
                          <option>--Pilih Nama RS--</option>
                          <?php foreach($optRumahSakit as $row) { ?>
                              <option value="<?php echo $row['koders'] ?>"><?php echo $row['namars'] ?></option>
                          <?php } ?>
                        </select> 
                        <br/>

            <button  type="submit" class="btn btn-primary no-radius dropdown-toggle"  >Edit Data</button> 

<br/>
        <br/>

          

          </form>
        </div> -->


   
       
       <!--  <div class='col-lg-6'  <?php $kd_role=$this->session->userdata('koderole');if($kd_role=='1') echo "''";if($kd_role=='18') echo "hidden=''";if($kd_role=='10') echo "hidden=''";?> >

<?php $kd_approval=$this->session->userdata('approval'); if($kd_approval=='') echo "hidden=''" ;?> 

                 <form role="form" action="<?php echo base_url(); ?>transaksiacuan/hapustransaksiacuan" method="POST" enctype="multipart/form-data"> 

            <input type="text"  name="periode" id="tanggal2" placeholder="yyyymm" style="height:30px;" class='form-control'>
             <br/>
          
            <select name="cabangrs" style="height:30px;" required class='form-control'>
                          <option>--Pilih Nama RS--</option>
                          <?php foreach($optRumahSakit as $row) { ?>
                              <option value="<?php echo $row['koders'] ?>"><?php echo $row['namars'] ?></option>
                          <?php } ?>
                        </select> 
                        <br/>

          

          <button  type="submit" class="btn btn-danger glyphicon glyphicon-trash"  >  Hapus Data</button> 


          </form>
        </div> -->
     
                 <br/>
                    
       
           <div class="row">
            <div class="col-md-12">
         
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
                <div class="box-body">
                  <div class="table-responsive">

                 <Label>Pencarian Rumah Sakit :</Label>&nbsp;&nbsp;<input type="text" id="myInputhasmoro" onkeyup="myFunctionhasmoro()" class="form-control" placeholder="Cari Berdasar Rumah Sakit.." title="Type in a name">
                  <Label>Periode :</Label>&nbsp;&nbsp;<input type="text" id="myPeriodehasmoro" onkeyup="myFunctionperiodehasmoro()" class="form-control"  placeholder="Cari Berdasar Periode.." title="Type in a name">

 
                 <table id="tb-datatables6" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO</th>
                    <!--   <th>IDTR</th> -->
                      <th>NAMA RUMAH SAKIT</th>
                      <th>PERIODE</th>
                     <!--  <th>KODE URAIAN</th>
                      <th>NILAI URAIAN</th> -->
                      <th>TANGGAL CETAK</th>
                      <th>TANGGAL DIUPDATE</th>
                      <th>DIUPDATE OLEH</th>
                   <!--    <th>WARNA CELL</th> -->
                     
                    
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_transaksi as $row) { $no++ ?>
                    <tr>
                    
                      <td><?php echo $no; ?></td>
                  
                      <td><a href="<?php echo base_url(); ?>transaksiacuan/detailinfoeksdiracuan/<?php echo $row['periode']; ?>/<?php echo $row['kodeur']; ?>" class="btn btn-info btn-sm glyphicon glyphicon-edit"   ><?php echo $row['namars']; ?></a></td>
                      <td><?php echo $row['periode']; ?></td>
                      <td><?php echo $row['createddate']; ?></td>
                      <td><?php echo $row['updateddate']; ?></td>
                      <td><?php echo $row['updatedby']; ?></td>


                 
                        <td><a href="<?php echo base_url(); ?>transaksiacuan/edittransaksiacuan/<?php echo $row['periode']; ?>/<?php echo $row['kodeur']; ?>" class="btn btn-info btn-sm glyphicon glyphicon-edit"   >Edit Data</a></td>

                   
                      </td>

                      <td>
                    <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>transaksiacuan/hapustransaksiacuan/<?php echo $row['periode']; ?>/<?php echo $row['kodeur']; ?>"><i class="glyphicon glyphicon-trash"> Hapus</i></a>
                   
                      </td>
                 
                                          
                      <td>
                  
                   
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








      </section><!-- /.content -->

  
<!--Modal-->

<div class="modal fade" id="modalwaktu" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
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
</div>




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

} else if (setwaktu<='10'){

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

updateClock(); // initial call  ]


  $(function () {
        $('#myTable').dataTable({"aoColumnDefs": [{"bSortable": true, "aTargets": [0]}]});       
     
    }); 



</script>


