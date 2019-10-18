
<style type="text/css">
  
button{

margin-left: center;


}


</style>

      <section class="content-header">
        <h1>
          <b >DATA TRANSAKSI URAIAN EKSEKUTIF REPORT(REAL)</b>
        </h1>
        
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">

              <div id="tomboltambahkan">
                
              
       <div <?php $kd_akses=$this->session->userdata('koderole');if($kd_akses=='13') echo "hidden=''"?>>
              <a  style="margin-bottom:3px" href="<?php echo base_url(); ?>transaksi/addtransaksi" class="btn btn-primary form-control"><i class="fa fa-plus" ></i> TAMBAH TRANSAKSI </a>
            </div>

            <br/>
              <br/>

            <div class='row'>


      
        </div>

                 </div>  
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
                <table id="tb-datatables6" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO</th>
                   
                      <th>NAMA RUMAH SAKIT</th>
                      <th>PERIODE</th>
                      <th>TANGGAL CETAK</th>
                      <th>TANGGAL DIUPDATE</th>
                      <th>DIUPDATE OLEH</th>
                  
                    
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_transaksi as $row) { $no++ ?>
                    <tr>
                    
                      <td><?php echo $no; ?></td>
                  
                      <td><a href="<?php echo base_url(); ?>transaksi/detailinfoeksdir/<?php echo $row['periode']; ?>/<?php echo $row['koders']; ?>" class="btn btn-info btn-sm glyphicon glyphicon-edit"   ><?php echo $row['namars']; ?></a></td>
                      <td><?php echo $row['periode']; ?></td>
                      <td><?php echo $row['createddate']; ?></td>
                      <td><?php echo $row['updateddate']; ?></td>
                      <td><?php echo $row['updatedby']; ?></td>


                        <td><a href="<?php echo base_url(); ?>transaksi/edittransaksieksdirsatu/<?php echo $row['periode']; ?>/<?php echo $row['koders']; ?>" class="btn btn-warning btn-sm glyphicon glyphicon-edit">Edit</a></td>

                   
                      </td>

                      <td>
                        <div <?php $kd_akses=$this->session->userdata('koderole');if($kd_akses=='5') echo "hidden=''";if($kd_akses=='13') echo "hidden=''"?>>
                    <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>transaksi/hapustransaksieksdirsatu/<?php echo $row['periode']; ?>/<?php echo $row['koders']; ?>"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                  </div>
                   
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

