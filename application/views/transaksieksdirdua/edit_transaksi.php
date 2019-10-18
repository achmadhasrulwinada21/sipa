




<style>


.setting{

  margin-left: 0px;



}
</style>
      <section class="content-header">
        <h1>
          <b>TAMBAH DATA TRANSAKSI EKSEKUTIF DIREKTUR II(TOTAL)</b>
        </h1>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
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
               
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>transaksieksdirdua/updatetransaksieksdidua" method="POST" enctype="multipart/form-data">
                 <div class="col-lg-6">
                  <div class="form-group">
                      <label for="">Nama Rumah Sakit</label>
                      <select name="cabangrs" class="form-control" >
                          <option>--Pilih Nama RS--</option>
                      
                            <?php foreach($kdrs as $datakd) {

                          if(!in_array($datakd['koders'],$kdrs_post)){ ?>
                              <option  value="<?php echo $datakd['koders'] ?>"><?php echo $datakd['namars'] ?></option> 

                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datakd['koders'] ?>"><?php echo $datakd['namars'] ?></option>


                          <?php }} ?>

                        </select> 
                  </div>

                    <div class="form-group">
                      <label for="">Periode</label>
                        <input type="text" class="form-control" id="tanggal" name="periode" placeholder="Isikan Periode" value="<?php echo $periode?>" required>
                    </div>

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
                         
  <td><input type="text" placeholder="" value="Nama Uraian"  style="height:40px;width:250px;text-align: center;font-weight:bold;"></td> 
 <td><input type="text"  placeholder="" value="Nilai"  style="height:40px;width:250px;text-align: center;font-weight:bold;"></td> 

    <tr>

    <tr>
                         
  <td><input type="text"  placeholder="Total Kunjungan Poliklinik Pagi Hari" value="Total Kunjungan Poliklinik"  style="height:40px;width:250px;"></td> 
 <td><input type="text" name="TT[]" placeholder="" value="<?php echo $nilai_uraian1?>"  style="height:40px;width:250px;"></td> 

    <tr>

  <td><input type="text"  placeholder="Rata-Rata Kunjungan Poliklinik/Hari" value="Rata-Rata Kunjungan Poliklinik/Hari"  style="height:40px;width:250px;"></td> 
 <td><input type="text" name="TT[]" placeholder="" value="<?php echo $nilai_uraian2?>"  style="height:40px;width:250px;"></td> 

    </tr>
    <tr>
                         
<!--  <td><input type="text" name="TT[]"  placeholder="Jumlah SC"></td> 
 -->
 <td><input type="text"  placeholder="Total Kunjungan Poliklinik Pagi Hari" value="Jumlah Hari Buka Poliklinik"  style="height:40px;width:250px;"></td> 
 <td><input type="text" name="TT[]" placeholder="" value="<?php echo $nilai_uraian3?>"  style="height:40px;width:250px;"></td> 

    
    </tr>
    <tr>
                         
 <!-- <td><input type="text" name="TT[]"  placeholder="Jumlah Pasien Fisioterapi(RJ+RI)"></td> -->
  <td><input type="text" placeholder="Total Kunjungan Poliklinik Pagi Hari" value="Jumlah Pasien Masuk Rawat Inap"  style="height:40px;width:250px;"></td> 
 <td><input type="text" name="TT[]" placeholder="" value="<?php echo $nilai_uraian4?>"  style="height:40px;width:250px;"></td> 

      
    </tr>
    <tr>
                         
 <!-- <td><input type="text" name="TT[]"  placeholder="Pemeriksaan CT Scan"></td> -->
 <td><input type="text"  placeholder="Total Kunjungan Poliklinik Pagi Hari" value="Hari Rawat"  style="height:40px;width:250px;"></td> 
 <td><input type="text" name="TT[]" placeholder="" value="<?php echo $nilai_uraian5?>"  style="height:40px;width:250px;"></td> 


      
    </tr>
      <tr>
                         
 <!-- <td><input type="text" name="TT[]"  placeholder="Jumlah Pasien Fisioterapi(RJ+RI)"></td> -->
  <td><input type="text"  placeholder="Total Kunjungan Poliklinik Pagi Hari" value="BOR"  style="height:40px;width:250px;"></td> 
 <td><input type="text" name="TT[]" placeholder="" value="<?php echo $nilai_uraian6?>"  style="height:40px;width:250px;"></td> 

    </tr>
      <tr>
                         
 <!-- <td><input type="text" name="TT[]"  placeholder="Jumlah Pasien Fisioterapi(RJ+RI)"></td> -->
  <td><input type="text"  placeholder="Total Kunjungan Poliklinik Pagi Hari" value="Jumlah Kelahiran"  style="height:40px;width:250px;"></td> 
 <td><input type="text" name="TT[]" placeholder="" value="<?php echo $nilai_uraian7?>"  style="height:40px;width:250px;"></td> 

      
    </tr>
      <tr>
                         
 <!-- <td><input type="text" name="TT[]"  placeholder="Jumlah Pasien Fisioterapi(RJ+RI)"></td> -->
 <td><input type="text"  placeholder="Total Kunjungan Poliklinik Pagi Hari" value="Jumlah SC"  style="height:40px;width:250px;"></td> 
 <td><input type="text" name="TT[]" placeholder="" value="<?php echo $nilai_uraian8?>"  style="height:40px;width:250px;"></td> 

      
    </tr>
      <tr>
                         
 <!-- <td><input type="text" name="TT[]"  placeholder="Jumlah Pasien Fisioterapi(RJ+RI)"></td> -->
 <td><input type="text"  placeholder="Total Kunjungan Poliklinik Pagi Hari" value="Total Kunjungan Poliklinik Pagi Hari"  style="height:40px;width:250px;"></td> 
 <td><input type="text" name="TT[]" placeholder="" value="<?php echo $nilai_uraian9?>"  style="height:40px;width:250px;"></td> 

    </tr>
      <tr>
                         
 <!-- <td><input type="text" name="TT[]"  placeholder="Jumlah Pasien Fisioterapi(RJ+RI)"></td> -->
  <td><input type="text"  placeholder="Total Kunjungan Poliklinik Pagi Hari" value="Jumlah Operasi+Tindakan"  style="height:40px;width:250px;"></td> 
 <td><input type="text" name="TT[]" placeholder="" value="<?php echo $nilai_uraian10?>"  style="height:40px;width:250px;"></td> 

      
    </tr>
      <tr>
                         
 <!-- <td><input type="text" name="TT[]"  placeholder="Jumlah Pasien Fisioterapi(RJ+RI)"></td> -->
  <td><input type="text"  placeholder="Total Kunjungan Poliklinik Pagi Hari" value="Jumlah Sub R"  style="height:40px;width:250px;"></td> 
 <td><input type="text" name="TT[]" placeholder="" value="<?php echo $nilai_uraian11?>"  style="height:40px;width:250px;"></td> 

    </tr>
      <tr>
                         
 <!-- <td><input type="text" name="TT[]"  placeholder="Jumlah Pasien Fisioterapi(RJ+RI)"></td> -->
 <td><input type="text"  placeholder="Total Kunjungan Poliklinik Pagi Hari" value="Jumlah Pemeriksa Laboratorium"  style="height:40px;width:250px;"></td> 
 <td><input type="text" name="TT[]" placeholder="" value="<?php echo $nilai_uraian12?>"  style="height:40px;width:250px;"></td> 

      
    </tr>
      <tr>
                         
 <!-- <td><input type="text" name="TT[]"  placeholder="Jumlah Pasien Fisioterapi(RJ+RI)"></td> -->
 <td><input type="text"  placeholder="Total Kunjungan Poliklinik Pagi Hari" value="Jumlah Pasien Fisioterapi(RJ+RI)"  style="height:40px;width:250px;"></td> 
 <td><input type="text" name="TT[]" placeholder="" value="<?php echo $nilai_uraian13?>"  style="height:40px;width:250px;"></td> 

      
    </tr>
      <tr>
                         
 <!-- <td><input type="text" name="TT[]"  placeholder="Jumlah Pasien Fisioterapi(RJ+RI)"></td> -->
 <td><input type="text" placeholder="Total Kunjungan Poliklinik Pagi Hari" value="Jumlah Pemeriksaan Rontgen/Radiologi"  style="height:40px;width:250px;"></td> 
 <td><input type="text" name="TT[]" placeholder="" value="<?php echo $nilai_uraian14?>"  style="height:40px;width:250px;"></td> 

      
    </tr>
      <tr>
                         
 <!-- <td><input type="text" name="TT[]"  placeholder="Jumlah Pasien Fisioterapi(RJ+RI)"></td> -->
 <td><input type="text"  placeholder="Total Kunjungan Poliklinik Pagi Hari" value="Jumlah KTK"  style="height:40px;width:250px;"></td> 
 <td><input type="text" name="TT[]" placeholder="" value="<?php echo $nilai_uraian15?>"  style="height:40px;width:250px;"></td> 

      
    </tr>
      <tr>
                         
 <!-- <td><input type="text" name="TT[]"  placeholder="Jumlah Pasien Fisioterapi(RJ+RI)"></td> -->
  <td><input type="text" placeholder="Total Kunjungan Poliklinik Pagi Hari" value="Jumlah Pemeriksa CTScan"  style="height:40px;width:250px;"></td> 
 <td><input type="text" name="TT[]" placeholder="" value="<?php echo $nilai_uraian16?>"  style="height:40px;width:250px;"></td> 

      
    </tr>
      <tr>
                         
 <!-- <td><input type="text" name="TT[]"  placeholder="Jumlah Pasien Fisioterapi(RJ+RI)"></td> -->
  <td><input type="text" placeholder="Total Kunjungan Poliklinik Pagi Hari" value="Jumlah Pemeriksaan PA"  style="height:40px;width:250px;"></td> 
 <td><input type="text" name="TT[]" placeholder="" value="<?php echo $nilai_uraian17?>"  style="height:40px;width:250px;"></td> 

      
    </tr>

      <tr>
                         
 <!-- <td><input type="text" name="TT[]"  placeholder="Jumlah Pasien Fisioterapi(RJ+RI)"></td> -->
  <td><input type="text" placeholder="" value="Validitas Keabsahan Data"  style="height:40px;width:250px;"></td> 
   <!-- <td><input type="checkbox"  name="VD" style="height:40px;width:250px;"></td> -->
   <td><input type="checkbox" name="VD"  style="width:250px;"  <?php echo $a1=$validitasdata ; if( $a1=='t') echo ' Checked '?>
></td> 


      
    </tr>
    
  </tbody>
</table>

</div>


<div class="table-responsive" hidden="">

  <table id="isianprivilege" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th></th>  
                      <th></th>
                      <th></th>
                   
                   
                    
                      

                   
                    
                    </tr>
                  </thead>
                  <tbody>

                      <tr>


                      
                     
 <td><input type="text" name="KD[]" value="TKP"></td>
 <td><input type="text" name="KD[]" value="RKPP"></td>
 <td><input type="text" name="KD[]" value="TKPPH"></td>
 <td><input type="text" name="KD[]" value="JHBP"></td>
 <td><input type="text" name="KD[]" value="JPMRI"></td>
 <td><input type="text" name="KD[]" value="HR"></td>
 <td><input type="text" name="KD[]" value="BOR"></td>
 <td><input type="text" name="KD[]" value="JK"></td>
 <td><input type="text" name="KD[]" value="JSC"></td>
 <td><input type="text" name="KD[]" value="JOT"></td>
 <td><input type="text" name="KD[]" value="JSR"></td>
 <td><input type="text" name="KD[]" value="JPL"></td>
 <td><input type="text" name="KD[]" value="JPF"></td>
 <td><input type="text" name="KD[]" value="JPRR"></td>
 <td><input type="text" name="KD[]" value="JKTK"></td>
 <td><input type="text" name="KD[]" value="JPCTS"></td>
 <td><input type="text" name="KD[]" value="JPPA"></td>
 <t


                    
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
                  <a href="<?php echo base_url(); ?>transaksieksdirdua" class="btn btn-warning btn-block btn-flat">Kembali</a>
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

$('.add').live('click',function(){
  $(this).val('Delete');
  $(this).attr('class','del');

  var appendTxt = "<tr><td><input type="text" name="input_box_one[]" /></td><td><input type="text" name="input_box_two[]" /></td><td><input class="add" type="button" value="Add More" /></td></tr>";
  $("tr:last").after(appendTxt);
});

  </script>

