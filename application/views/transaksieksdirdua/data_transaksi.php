
<style type="text/css">
  
button{

margin-left: center;


}



</style>

      <section class="content-header">
        <h1>
          <b>DATA TRANSAKSI EKSEKUTIF DIREKTUR II(TOTAL)</b>
        </h1>
        
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">

              <div id="tomboltambahkan">





                <div class="table-responsive">
<table id="options-table">
  <tbody>
    <tr>      
      <td>
      </td>
      <td>
      </td>
      <td>
      </td>
    </tr>


    <tr>
                         
 

    <tr>

    <tr>
                         

 


  <!--     <a  style="margin-bottom:3px" href="<?php echo base_url(); ?>transaksieksdirdua/addtransaksi" class="btn btn-primary form-control"><i class="fa fa-plus" ></i> TAMBAH TRANSAKSI </a>
 -->
       <a name="tomboltambahkan" style="margin-bottom:3px" href="<?php echo base_url(); ?>transaksieksdirdua/addtransaksi" class="btn btn-primary form-control"><i class="fa fa-plus" ></i> TAMBAH TRANSAKSI </a>

 <td>  <form role="form" action="<?php  echo base_url(); ?>transaksieksdirdua/cetakdirnew2" method="POST" enctype="multipart/form-data"> <div <?php $kd_akses=$this->session->userdata('koderole');if($kd_akses=='4') echo "hidden=''"?>>

   <div  <?php  $kd_role=$this->session->userdata('koderole'); if($kd_role=='5') echo "hidden=''"; ?> >
        <div class="form-group">

    <div class="input-group col-sm-5"> 
    
      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
      <input type="text" id="tanggal" name="inputtanggal" class="form-control"  style="width:250px;height:40px;"  >
      <br/>

      <span class="input-group-btn">

       
     <button formtarget="_blank" type="submit" class="btn btn-success btn-block btn-flat"  >CETAK REPORT EKSEKUTIF REPORT II</button> 
   </div> 
     </span> 

 
</div>

     </form> 

   </div>     
 </div>
       </td> 

   
  </tbody>
</table>

</div>
<br/>
<br/>

    
         

           
            <br/>
              <br/>

            <div class='row'>

           <!--    <div class='col-lg-6'>

                 <form role="form" action="<?php echo base_url(); ?>transaksieksdirdua/edittransaksieksdirdua" method="POST" enctype="multipart/form-data"> 

            <input type="text"  name="periode" id="tanggal2" placeholder="yyyymm" style="height:30px;" class='form-control'>
            <br/>
          
            <select name="cabangrs" style="height:30px;" required class='form-control'>
                          <option>--Pilih Nama RS--</option>
                          <?php foreach($optRumahSakit as $row) { ?>
                              <option value="<?php echo $row['koders'] ?>"><?php echo $row['namars'] ?></option>
                          <?php } ?>
                        </select> 
                        <br/>

            <button   type="submit" class="btn btn-primary no-radius dropdown-toggle"  >Edit Data</button> 


          

          </form>
        </div> -->
      
   
 
     <!--    <div class='col-lg-6'  <?php $kd_approval=$this->session->userdata('koderole'); if($kd_approval=='t') echo "''";if($kd_approval=='5') echo "hidden=''"?> >

                 <form role="form" action="<?php echo base_url(); ?>transaksieksdirdua/hapustransaksieksdirdua" method="POST" enctype="multipart/form-data"> 

            <input type="text"  name="periode" id="tanggal1" placeholder="yyyymmdd" style="height:30px;" class='form-control'>
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
        </div>
 -->
      
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
                  
                      <td><a href="<?php echo base_url(); ?>transaksieksdirdua/detailinfo/<?php echo $row['periode']; ?>/<?php echo $row['koders']; ?>" class="btn btn-info btn-sm glyphicon glyphicon-edit"   ><?php echo $row['namars']; ?></a></td>

                      <td><?php echo $row['periode']; ?></td>
                      <td><?php echo $row['createddate']; ?></td>
                      <td><?php echo $row['updateddate']; ?></td>
                      <td><?php echo $row['updatedby']; ?></td>

                                
                      <td>
               
                    <td><a href="<?php echo base_url(); ?>transaksieksdirdua/edittransaksieksdirdua/<?php echo $row['periode']; ?>/<?php echo $row['koders']; ?>" class="btn btn-info btn-sm glyphicon glyphicon-edit"   >Edit Data</a></td>

                   
                      </td>

                      <td>
                          <div <?php $kd_akses=$this->session->userdata('koderole');if($kd_akses=='5') echo "hidden=''"?>>
                    <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>transaksieksdirdua/hapustransaksieksdirdua/<?php echo $row['periode']; ?>/<?php echo $row['koders']; ?>"><i class="glyphicon glyphicon-trash"> Hapus</i></a>
                  </div>
                   
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

        <div class="form-group"> 
             TABEL INFORMASI EKSEKUTIF REPORT II :<br>
             <div class="table-responsive">

               <table id="tb-datatables6" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO</th>
                   
                      <th>NAMA RUMAH SAKIT</th>
                      <th>PERIODE</th>
                      <th>KODE URAIAN</th>
                      <th>NILAI URAIAN</th> 
                      <th>TANGGAL CETAK</th>
                      <th>TANGGAL DIUPDATE</th>
                      <th>DIUPDATE OLEH</th>
             
                     
                    
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
               
                </div></div></div></div></div>                          
<!--- end modal -->


<script>

  function updateClock() {
    var now = new Date(), // current date
        months = ['January', 'February', '...']; // you get the idea
        time = now.getHours() + ':' + now.getMinutes(), // again, you get the idea

        // a cleaner way than string concatenation
        date = [now.getDate()];
                months[now.getMonth()],
                now.getFullYear()].join(' ');

    // set the content of the element with the ID time to the formatted string
   //document.getElementById('time').innerHTML = [date, time].join(' / ');

    var setwaktu=document.getElementById('time').innerHTML = [date].join('');


    //alert(setwaktu);


    // call this function again in 1000ms
    setTimeout(updateClock, 1000);

    //Fungsi Warning Tanggal Habis

    //echo (setwaktu);


if(setwaktu>'31'){

  //document.getElementById('id dari div').innerHTML.hidden=true;

  $('#modalwaktu').modal({
       show: 'true'
     });

   //alert("Berhasil")

} else if (setwaktu<='2'){

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

