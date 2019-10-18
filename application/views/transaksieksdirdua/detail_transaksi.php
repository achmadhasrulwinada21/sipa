
<style type="text/css">
  
button{

margin-left: center;


}


</style>

      <section class="content-header">
        <h1>
          <b>DETAIL TRANSAKSI EKSEKUTIF DIREKTUR II(TOTAL)</b>
        </h1>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
        </section>
        <br/>
        <br/>

         <div class="form-group">
               
                  <a href="<?php echo base_url(); ?>transaksieksdirdua" class="btn btn-primary btn-block btn-flat" >Kembali</a>
                </div><!-- /.col -->

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">

              <div id="tomboltambahkan">





                
         

                 <br/>
                    
                                     
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div  class="box-title">


                  
                </div><!-- /.box-title -->
                <div class="box-body">
                  <div class="table-responsive">
                
                 <Label>Pencarian Rumah Sakit :</Label>&nbsp;&nbsp;<input type="text" id="myInput" onkeyup="myFunction()" class="form-control"  placeholder="Cari Berdasar Rumah Sakit.." title="Type in a name">
                  <Label>Periode :</Label>&nbsp;&nbsp;<input type="text" id="myPeriode" onkeyup="myFunctionperiode()" class="form-control"  placeholder="Cari Berdasar Periode.." title="Type in a name">
                 <table id="tb-datatables5" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO</th>
                    <!--   <th>IDTR</th> -->
                      <th>NAMA RUMAH SAKIT</th>
                      <th>PERIODE</th>
                      <th>KODE URAIAN</th>
                      <th>NILAI URAIAN</th> 
                      <th>TANGGAL CETAK</th>
                      <th>TANGGAL DIUPDATE</th>
                      <th>DIUPDATE OLEH</th>
                   <!--    <th>WARNA CELL</th> -->
                     
                    
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_transaksiall as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                 
                      <td><?php echo $row['namars']; ?></td>
                      <td><?php echo $row['periode']; ?></td>
                      <td><?php echo $row['kodeur']; ?></td>
                      <td><?php echo $row['nilai_uraian']; ?></td> 
                      <td><?php echo $row['createddate']; ?></td>
                      <td><?php echo $row['updateddate']; ?></td>
                      <td><?php echo $row['updatedby']; ?></td>
                 
                                          
                      <td>
                    <!--   <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>transaksi/edittransaksi/<?php echo $row['id_tr']; ?>"><i class="fa fa-pencil"></i></a> -->
                   
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

 
<!-- modal -->
      <div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
  <div class="panel panel-primary">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">DETAIL INFORMASI</h4></td>
      </div>
        <div class="modal-body">

 <!----> <form action="<?php echo base_url(); ?>LaporanPktkrjListrik/cetak_pkjlistriku" target='blank' method="POST">
        <div class="form-group"> 
             TABEL INFORMASI EKSEKUTIF REPORT II :<br>
             <div class="table-responsive">

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
                    <?php $no=0; foreach($data_transaksiall as $rowall) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td> <?php echo $rowall['namars']; ?></td>
                      <td><?php echo $rowall['periode']; ?></td>
                      <td><?php echo $rowall['kodeur']; ?></td> 
                      <td><?php echo $rowall['nilai_uraian']; ?></td> 
                      <td><?php echo $rowall['createddate']; ?></td>
                      <td><?php echo $rowall['updateddate']; ?></td>
                      <td><?php echo $rowall['updatedby']; ?></td>
                 
                                          
                      <td>
                   
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
       
        </div>

       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          <input type="submit" target='blank' class="btn btn-primary" value="CETAK">
        </div>
                </fieldset>
                </form>   
                </div></div></div></div></div>                          
<!--- end modal -->


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

updateClock(); // initial call  


</script>

