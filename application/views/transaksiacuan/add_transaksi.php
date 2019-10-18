

<style>


.setting{

  margin-left: 0px;



}
</style>
      <section class="content-header">
        <h1>
          <b></b>
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
                <h3 class="box-title">FORM TAMBAH TRANSAKSI EKSEKUTIF REPORT I(TARGET)</h3>
              </div>
              <div class="box-body chat" id="chat-box"> 
                <!-- chat item -->
                <div class="item">
                 <form role="form" action="<?php echo base_url(); ?>transaksiacuan/insert_keDBacuan" method="POST" enctype="multipart/form-data">
                 <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">Nama Rumah Sakit</label>
                        <select name="koders" class="form-control" required="">
                          <option>--Pilih Cabang RS--</option>
                          <?php foreach($optRumahSakit as $row) { ?>
                              <option value="<?php echo $row['koders'] ?>"><?php echo $row['namars'] ?></option>
                          <?php } ?>
                        </select>    
                  </div>

                    <div class="form-group">
                      <label for="">Periode</label>
                        <input type="text" class="form-control" id="tanggal" name="periode" placeholder="Isikan Periode" required="">
                    </div>




<div class="col-lg-6">
         
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


  <td><input type="text" placeholder="" value="No"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>
  <td><input type="text" placeholder="" value="Nama Uraian"  style="height:40px;width:170px;text-align: center;font-weight:bold;" readonly=""></td> 
 <td><input type="text"  placeholder="" value="Nilai"  style="height:40px;width:110px;text-align: center;font-weight:bold;" readonly=""></td> 

   </tr>


    <tr>

     <td><input type="text" placeholder="" value="1"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>

  <td><input type="text" name="" placeholder="" value="Tempat Tidur"  style="height:40px;width:170px;" readonly=""/></td> 
 
  <td><input type="text" name="TT[]" placeholder="" value=""  style="height:40px;width:110px;"/></td> 
</tr>
  <tr>

     <td><input type="text" placeholder="" value="2"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>

  <td><input type="text" name="" placeholder="" value="Rawat Jalan"  style="height:40px;width:170px;" readonly=""/></td> 
 
  <td><input type="text" name="TT[]" placeholder="" value=""  style="height:40px;width:110px;"/></td> 
</tr>
  <tr>

     <td><input type="text" placeholder="" value="3"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>

  <td><input type="text" name="" placeholder="" value="Rawat Inap"  style="height:40px;width:170px;" readonly=""/></td> 
 
  <td><input type="text" name="TT[]" placeholder="" value=""  style="height:40px;width:110px;"/></td> 
</tr>
  <tr>

     <td><input type="text" placeholder="" value="4"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>

  <td><input type="text" name="" placeholder="" value="BOR(%)"  style="height:40px;width:170px;" readonly=""/></td> 
 
  <td><input type="text" name="TT[]" placeholder="%" value=""  style="height:40px;width:110px;text-align: center;"/></td> 
</tr>
  <tr>

     <td><input type="text" placeholder="" value="5"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>

  <td><input type="text" name="" placeholder="" value="Lahir"  style="height:40px;width:170px;" readonly=""/></td> 
 
  <td><input type="text" name="TT[]" placeholder="" value=""  style="height:40px;width:110px;"/></td> 
</tr>
  <tr>

     <td><input type="text" placeholder="" value="6"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>

  <td><input type="text" name="" placeholder="" value="Operasi"  style="height:40px;width:170px;" readonly=""/></td> 
 
  <td><input type="text" name="TT[]" placeholder="" value=""  style="height:40px;width:110px;"/></td> 
</tr>
  <tr>

     <td><input type="text" placeholder="" value="7"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>

  <td><input type="text" name="" placeholder="" value="Revenue/Bulan"  style="height:40px;width:170px;" readonly=""/></td> 
 
  <td><input type="text" name="TT[]" placeholder="" value=""  style="height:40px;width:110px;"/></td> 
</tr>
  <tr>

     <td><input type="text" placeholder="" value="8"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>

  <td><input type="text" name="" placeholder="" value="Biaya"  style="height:40px;width:170px;" readonly=""/></td> 
 
  <td><input type="text" name="TT[]" placeholder="" value=""  style="height:40px;width:110px;"/></td> 
</tr>
  <tr>

     <td><input type="text" placeholder="" value="9"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>

  <td><input type="text" name="" placeholder="" value="Laba Bersih"  style="height:40px;width:170px;" readonly=""/></td> 
 
  <td><input type="text" name="TT[]" placeholder="" value=""  style="height:40px;width:110px;"/></td> 
</tr>
  <tr>

     <td><input type="text" placeholder="" value="10"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>

  <td><input type="text" name="" placeholder="" value="Ebitda/Bulan"  style="height:40px;width:170px;" readonly=""/></td> 
 
  <td><input type="text" name="TT[]" placeholder="" value=""  style="height:40px;width:110px;"/></td> 
</tr>
  <tr>

     <td><input type="text" placeholder="" value="11"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>

  <td><input type="text" name="" placeholder="" value="P.Margin(%)"  style="height:40px;width:170px;" readonly=""/></td> 
 
  <td><input type="text" name="TT[]" placeholder="%" value=""  style="height:40px;width:110px;text-align: center;"/></td> 
</tr>
  <tr>

     <td><input type="text" placeholder="" value="12"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>

  <td><input type="text" name="" placeholder="" value="Resep"  style="height:40px;width:170px;" readonly=""/></td> 
 
  <td><input type="text" name="TT[]" placeholder="" value=""  style="height:40px;width:110px;"/></td> 
</tr>
  <tr>

     <td><input type="text" placeholder="" value="13"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>

  <td><input type="text" name="" placeholder="" value="Rik Lab"  style="height:40px;width:170px;" readonly=""/></td> 
 
  <td><input type="text" name="TT[]" placeholder="" value=""  style="height:40px;width:110px;"/></td> 
</tr>
  <tr>

     <td><input type="text" placeholder="" value="14"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>

  <td><input type="text" name="" placeholder="" value="Fisioterapi"  style="height:40px;width:170px;" readonly=""/></td> 
 
  <td><input type="text" name="TT[]" placeholder="" value=""  style="height:40px;width:110px;"/></td> 
</tr>
  <tr>

     <td><input type="text" placeholder="" value="15"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>

  <td><input type="text" name="" placeholder="" value="KTK"  style="height:40px;width:170px;" readonly=""/></td> 
 
  <td><input type="text" name="TT[]" placeholder="" value=""  style="height:40px;width:110px;"/></td> 
</tr>

    
  </tbody>
</table>

</div>


</div>


<div class="col-lg-6">
         
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


  <td><input type="text" placeholder="" value="No"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>
  <td><input type="text" placeholder="" value="Nama Uraian"  style="height:40px;width:170px;text-align: center;font-weight:bold;" readonly=""></td> 
 <td><input type="text"  placeholder="" value="Nilai"  style="height:40px;width:110px;text-align: center;font-weight:bold;" readonly=""></td> 

   </tr>


    <tr>

     <td><input type="text" placeholder="" value="16"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>

  <td><input type="text" name="" placeholder="" value="Rik Ronsen"  style="height:40px;width:170px;" readonly=""/></td> 
 
  <td><input type="text" name="TT[]" placeholder="" value=""  style="height:40px;width:110px;" required="" /></td> 
</tr>
  <tr>

     <td><input type="text" placeholder="" value="17"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>

  <td><input type="text" name="" placeholder="" value="CT Scan"  style="height:40px;width:170px;" readonly=""/></td> 
 
  <td><input type="text" name="TT[]" placeholder="" value=""  style="height:40px;width:110px;" required="" /></td> 
</tr>
  <tr>

     <td><input type="text" placeholder="" value="18"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>

  <td><input type="text" name="" placeholder="" value="Pat Anatomi"  style="height:40px;width:170px;" readonly=""/></td> 
 
  <td><input type="text" name="TT[]" placeholder="" value=""  style="height:40px;width:110px;" required="" /></td> 
</tr>
  <tr>

     <td><input type="text" placeholder="" value="19"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>

  <td><input type="text" name="" placeholder="" value="RWJ Minggu"  style="height:40px;width:170px;" readonly=""/></td> 
 
  <td><input type="text" name="TT[]" placeholder="" value=""  style="height:40px;width:110px;" required="" /></td> 
</tr>
  <tr>

     <td><input type="text" placeholder="" value="20"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>

  <td><input type="text" name="" placeholder="" value="Hamil Baru"  style="height:40px;width:170px;" readonly=""/></td> 
 
  <td><input type="text" name="TT[]" placeholder="" value=""  style="height:40px;width:110px;" required="" /></td> 
</tr>
  <tr>

     <td><input type="text" placeholder="" value="21"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>

  <td><input type="text" name="" placeholder="" value="Registrasi"  style="height:40px;width:170px;" readonly=""/></td> 
 
  <td><input type="text" name="TT[]" placeholder="" value=""  style="height:40px;width:110px;" required="" /></td> 
</tr>
  <tr>

     <td><input type="text" placeholder="" value="22"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>

  <td><input type="text" name="" placeholder="" value="% Registrasi/HB"  style="height:40px;width:170px;" readonly=""/></td> 
 
  <td><input type="text" name="TT[]" placeholder="%" value=""  style="height:40px;width:110px;text-align: center;" required="" /></td> 
</tr>
  <tr>

     <td><input type="text" placeholder="" value="23"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>

  <td><input type="text" name="" placeholder="" value="% Lahir/HB"  style="height:40px;width:170px;" readonly=""/></td> 
 
  <td><input type="text" name="TT[]" placeholder="%" value=""  style="height:40px;width:110px;text-align: center;" required="" /></td> 
</tr>
  <tr>

     <td><input type="text" placeholder="" value="24"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>

  <td><input type="text" name="" placeholder="" value="IGD"  style="height:40px;width:170px;" readonly=""/></td> 
 
  <td><input type="text" name="TT[]" placeholder="" value=""  style="height:40px;width:110px;" required="" /></td> 
</tr>

 <tr>

     <td><input type="text" placeholder="" value="25"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>

  <td><input type="text" name="" placeholder="" value="R Inap IGD"  style="height:40px;width:170px;" readonly=""/></td> 
 
  <td><input type="text" name="TT[]" placeholder="" value=""  style="height:40px;width:110px;text-align: center;" required="" /></td> 
</tr>
  <tr>

     <td><input type="text" placeholder="" value="26"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>

  <td><input type="text" name="" placeholder="" value="% R Inap IGD"  style="height:40px;width:170px;" readonly=""/></td> 
 
  <td><input type="text" name="TT[]" placeholder="%" value=""  style="height:40px;width:110px;text-align: center;" required="" /></td> 
</tr>
  <tr>

     <td><input type="text" placeholder="" value="27"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>

  <td><input type="text" name="" placeholder="" value="Mortality"  style="height:40px;width:170px;" readonly=""/></td> 
 
  <td><input type="text" name="TT[]" placeholder="" value=""  style="height:40px;width:110px;" required="" /></td> 
</tr>
  <tr>

     <td><input type="text" placeholder="" value="28"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>

  <td><input type="text" name="" placeholder="" value="Sentinel"  style="height:40px;width:170px;" readonly=""/></td> 
 
  <td><input type="text" name="TT[]" placeholder="" value=""  style="height:40px;width:110px;" required="" /></td> 
</tr>
  <tr>

     <td><input type="text" placeholder="" value="29"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly=""></td>

  <td><input type="text" name="" placeholder="" value="KTD"  style="height:40px;width:170px;" readonly=""/></td> 
 
  <td><input type="text" name="TT[]" placeholder="" value=""  style="height:40px;width:110px;" required="" /></td> 
</tr>
 
 
 
 

   <tr>

     <td><input type="text" placeholder="" value="30"  style="height:40px;width:40px;text-align: center;font-weight:bold;" readonly="" required=""></td>

  <td><input type="text" placeholder="" value="Validitas Keabsahan Data"   style="height:40px;width:170px;" readonly=""></td> 
 
  <td><input type="checkbox"  name="VD"  style="height:40px;width:40px;text-align: center;font-weight:bold;" checked="" required="" ></td> 
</tr> 




      
    </tr>
    
  </tbody>
</table>

</div>


</div>



<br/>

<br/>






<div class="table-responsive" hidden="">

  <table id="isianprivilege" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>1.Tempat Tidur</th>  
                      <th>2.Rawat Jalan</th>
                      <th>3.Rawat Inap</th>
                   
                   
                    
                      

                   
                    
                    </tr>
                  </thead>
                  <tbody>

                      <tr>


                      
                     
 <td><input type="text" name="KD[]" value="TT"></td>
 <td><input type="text" name="KD[]" value="RJ"></td>
 <td><input type="text" name="KD[]" value="RI"></td>

 <td><input type="text" name="KD[]" value="BOR"></td>
 <td><input type="text" name="KD[]" value="LHR"></td>
 <td><input type="text" name="KD[]" value="OPR"></td>
 <td><input type="text" name="KD[]" value="RVN"></td>
 <td><input type="text" name="KD[]" value="BIAYA"></td>
 <td><input type="text" name="KD[]" value="LB"></td>
 <td><input type="text" name="KD[]" value="EBD"></td>
 <td><input type="text" name="KD[]" value="PM"></td>
 <td><input type="text" name="KD[]" value="RSP"></td>
 <td><input type="text" name="KD[]" value="RL"></td>
 <td><input type="text" name="KD[]" value="FST"></td>
 <td><input type="text" name="KD[]" value="KTK"></td>
 <td><input type="text" name="KD[]" value="RR"></td>
 <td><input type="text" name="KD[]" value="CT"></td>
 <td><input type="text" name="KD[]" value="PA"></td>
 <td><input type="text" name="KD[]" value="RJM"></td>
 <td><input type="text" name="KD[]" value="HB"></td>
 <td><input type="text" name="KD[]" value="REG"></td>

<td><input type="text" name="KD[]" value="RGH"></td>
 <td><input type="text" name="KD[]" value="LHH"></td>
 <td><input type="text" name="KD[]" value="IGD"></td>
 <td><input type="text" name="KD[]" value="RIGD"></td>
 <td><input type="text" name="KD[]" value="PRII"></td>
 <td><input type="text" name="KD[]" value="MRT"></td>
 <td><input type="text" name="KD[]" value="SNT"></td>
 <td><input type="text" name="KD[]" value="KTD"></td>



                    
                    </tr>  


                   
               
                   
                  </tbody>






</table>



</div>




                    </div>




                  <div class="col-lg-6">
                 <!--   <div class="form-group">
                      <label for="">Kode Uraian</label>
                        <select name="kd_uraian" class="form-control" required>
                          <option>--Pilih Kode Uraian--</option>
                          <?php foreach($optUraian as $row) { ?>
                              <option value="<?php echo $row['kd_uraian'] ?>"><?php echo $row['nama_uraian'] ?></option>
                          <?php } ?>
                        </select>                        
                    </div> -->
                    
                  <!--   <div class="form-group">
                      <label for="">Nilai Uraian</label>
                        <input type="text" class="form-control" value="" id="" name="nilai_uraian" placeholder="Isikan Nilai Uraian" required>                        
                    </div>
 -->








                                        
                  </div>
                                 
                  
                </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>transaksiacuan" class="btn btn-warning btn-block btn-flat">Kembali</a>
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



<script>
    $(function() {
    $( "#datepicker1" ).datepicker({ dateFormat: "yy-mm-dd"});
    });


    $(function() {
    $( "#datepicker2" ).datepicker({ dateFormat: "yy-mm-dd"});
    });


      $(function() {
    $( "#datepicker3" ).datepicker({ dateFormat: "yy-mm-dd"});
    });



  </script>
