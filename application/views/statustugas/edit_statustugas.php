
        <section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box">
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title"> EDIT DATA STATUS TUGAS</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>statustugas/updatestatustugas" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">
                     <div class="form-group">

                      <label for=""></label>
                        <input type="hidden" class="form-control" value="<?php echo $id_tugas;?>" id="" name="id_tugas" placeholder="" readonly="" >
                    </div>
                      
                    <div class="form-group">
                      <label for="">1.No Surat</label>
                        <input type="text" class="form-control" value="<?php echo $nosurat;?>" id="" name="nosurat" placeholder="No Surat" required>
                    </div>

                    <div class="form-group">
                      <label for="">2.Nama Kepala Departemen</label>
                        <input type="text" class="form-control" value="<?php echo $namakadep;?>" id="" name="namakadep" placeholder="Isikan nama kepala departemen" required>                        
                    </div>
                      <div class="form-group">
                      <label for="">3.Jabatan Kepala Departemen</label>
                        <input type="text" class="form-control" value="<?php echo $jabatankadep;?>" id="" name="jabatankadep" placeholder="Isikan jabatan kepala departemen" required>                        
                    </div>
                    <div class="form-group">
                      <label for="">4.Nama Petugas</label>
                        <input type="text" class="form-control" value="<?php echo $namayangditugaskan;?>" id="" name="namayangditugaskan" placeholder="Nama Petugas Yang Ditugaskan" required>                        
                    </div>

                   
                     <div class="form-group">
                      <label for="">5.Jabatan Petugas</label>
                        <input type="text" class="form-control" value="<?php echo $jabatanyangtugas;?>" id="" name="jabatanyangtugas" placeholder="Jabatan Yang Ditugaskan" required>                        
                    </div>
                     <div class="form-group">
                      <label for="">6.Waktu Tugas</label>
                        <input type="text" class="form-control" value="<?php echo $waktutugas;?>" id="" name="waktutugas" placeholder="waktu tugas" required>                        
                    </div>
                     <div class="form-group">
                      <label for="">7.Tujuan Tempat</label>
                          <input type="text" class="form-control" value="<?php echo $tujuantempat;?>" id="" name="tujuantempat" placeholder="Tujuan" required> 
                    </div>

                     <div class="form-group">
                      <label for="">8.Dasar Penugasan</label>
                      <input type="text" class="form-control" value="<?php echo $dasarpenugasan;?>" id="" name="dasarpenugasan" placeholder="Dasar Penugasan" required> 
                    </div>
                     
                    <div class="form-group">
                      <label for="">9.Kegiatan Penugasan</label>
                      <textarea rows="4" cols="50" value="<?php echo $kegiatanpenugasan;?>" class="form-control" name="kegiatanpenugasan"><?php echo $kegiatanpenugasan;?> </textarea> 
                       
                    </div>
                      <div class="form-group">
                      <label for="">10.Mengetahui Sekretaris Direktur Regional</label>
                       <input type="text" class="form-control" value="<?php echo $mengetahuisekretarisdirekturregional;?>"  name="mengetahuisekretarisdirekturregional"> </input> 
                       
                    </div>

                    <div class="form-group">
                    <label for="">11.Foto</label>
                      <input type="hidden" name="foto" value="<?php echo $foto; ?>">
                        <input type="file" class="form-control" value="" id="" name="file_uploadstatus" placeholder="">
                        <img style="width:80px;height:80px" src="<?php echo base_url(); ?>assets/upload/<?php echo $foto; ?>" class="img-circl" alt="User Image" />  
                             
                    </div>

                
                    <div class="form-group">
                     <label type="hidden" for="">12.Status Dokumen</label>
                      <select name="status" id="status" class="form-control">
                      <option>--Pilih Status--</option>
                      <option <?php if( $status=='Approve'){echo "selected"; } ?> value='Approve'>Disetujui</option>
                      <option <?php if( $status=='Not Approved'){echo "selected"; } ?> value='Not Approved'>Ditolak</option>
                      <option <?php if( $status=='Revisi'){echo "selected"; } ?> value='Revisi'>Revisi</option>
                      <option <?php if( $status=='Draf'){echo "selected"; } ?> value='Draf'>Draf</option>
                      </select><option>
                  </div>

                     <!--  <div class="form-group">
                      <label for="">13.Cabang RS</label>
                        <input type="text" class="form-control" value="<?php echo $cbgrs;?>" id="" name="cbgrs" placeholder="Cabang RS" required>
                    </div>
                  </div> -->

                  <div class="form-group">
                      <label for="">13.Cabang RS</label>
            <input type="text" class="form-control" value="<?php echo $this->session->userdata('namars'); ?>" id="" name="cbgrs" readonly>
                    </div>
                 
    
                </div><!-- /.item -->

				
                 <div class="form-group">
                  <input type="submit" class="btn btn-primary btn-block btn-flat" value="Simpan" name="simpan" onClick="form.action='../../statustugas/updatestatustugas?action=simpan';form.submit();">
                  <a href="<?php echo base_url(); ?>statustugas" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>
               </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
    