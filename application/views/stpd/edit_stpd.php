

       
        <section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box">
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title"> A. FORM ISIAN MEMORANDUM</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>stpd/updatestpd" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">


                     <div class="form-group">

                      <label for=""></label>
                        <input type="hidden" class="form-control" value="<?php echo $id_stpd;?>" id="" name="id_stpd" placeholder="" readonly="" >
                    </div>
                      
                    <div class="form-group">

                      <label for="">1.Kepada YTH</label>
                        <input type="text" class="form-control" value="<?php echo $kepadayth1;?>" id="" name="kepadayth1" placeholder="Kepada YTH" required>
                    </div>

                    <div class="form-group">
                      <label for="">2.Sekretaris</label>
                        <input type="text" class="form-control" value="<?php echo $kepadayth2;?>" id="" name="kepadayth2" placeholder="Kepada YTH" required>                        
                    </div>
                      <div class="form-group">
                      <label for="">3.Dari</label>
                        <input type="text" class="form-control" value="<?php echo $daripemohon;?>" id="" name="kepaladepartemen" placeholder="Dari Pemohon/Kepala Departemen" required>                        
                    </div>
                    <div class="form-group">
                      <label for="">4.Hari/Tanggal</label>
                        <input type="text" class="form-control" value="<?php echo $haritanggal;?>" id="datepicker1" name="haritanggal" placeholder="yyyy-mm-dd" required>                        
                    </div>

                   
                     <div class="form-group">
                      <label for="">5.Perihal</label>
                        <input type="text" class="form-control" value="<?php echo $perihal;?>" id="" name="perihal" placeholder="perihal" required>                        
                    </div>
                     <div class="form-group">
                      <label for="">6.Lampiran</label>
                        <input type="text" class="form-control" value="<?php echo $lampiran;?>" id="" name="lampiran" placeholder="lampiran" required>                        
                    </div>
                     <div class="form-group">
                      <label for="">7.Nama Yang Ditugaskan</label>
                          <input type="text" class="form-control" value="<?php echo $namakaryawanditugaskan1;?>" id="" name="namakaryawanditugaskan1" placeholder="Nama yang ditugaskan" required> 
                    </div>

                     <div class="form-group">
                      <label for="">8.Tanggal Pelaksanaan</label>
                      <input type="text" class="form-control" value="<?php echo $tanggalpelaksanaan;?>" id="" name="tanggalpelaksanaan" placeholder="Tanggal Pelaksanaan" required> 
                    </div>
                     
                    <div class="form-group">
                      <label for="">9.Kegiatan</label>
                      <textarea rows="4" cols="50" value="<?php echo $kegiatan;?>" class="form-control" name="kegiatan"><?php echo $kegiatan;?> </textarea> 
                       
                    </div>
                      <div class="form-group">
                      <label for="">10.Mengetahui Kepala Departemen</label>
                       <input type="text" class="form-control" value="<?php echo $mengetahuikadep;?>"  name="kadep"> </input> 
                       
                    </div>

                    <div class="form-group">
                      <label for="">11.Approve Kepala Departemen</label>
                      <br/>
                    

                    
                       <input type="checkbox"   name="kadepcheck" <?php echo $c1=$mengetahuikadepcheck; if($c1=='t') echo " Checked "?>
                       >Ya,Sudah Dilihat Dan Dibaca</input> 


                      
                    </div>
                      <div class="form-group">
                      <label for="">12.Mengetahui Direktur Operasional Dan Umum</label>
                      <input type="text" class="form-control" value="<?php echo $mengetahuidirektur;?>" <?php   
                      
                      $kd_approval=$this->session->userdata('approval'); if($kd_approval=='') echo "disabled=''"?>   name="direktur"> </input> 
                       
                    </div>
                     <div class="form-group">
                      <label for="">13.Approve Direktur Operasional Dan Umum</label>
                      <br/>
                    

                           <input type="checkbox"   name="direkturcheck"   <?php   
                      
                      $kd_approval=$this->session->userdata('approval'); if($kd_approval=='') echo "disabled=''"?> <?php echo $c2=$mengetahuidirekturcheck; if($c2=='t') echo " Checked "?>
                       >Ya,Sudah Dilihat Dan Dibaca</input> 

                       
                    </div>
                    <div class="form-group">
                      <label for="">14.Catatan Direktur(Director Only)</label>
                     <textarea rows="4" cols="50"    class="form-control" <?php   
                      
                      $kd_approval=$this->session->userdata('approval'); if($kd_approval=='') echo "disabled=''"?>  value="<?php echo $catatandirektur;?>" name="catatandirektur" > <?php echo $catatandirektur;?></textarea> 
                       
                    </div>


                    <div class="form-group">
                      <label for="">15.Status Dokumen(Director Only)</label>
                   <select name="statusdokumen" class="form-control" <?php   
                      
                      $kd_approval=$this->session->userdata('approval'); if($kd_approval=='') echo "disabled=''"?>  required>
                          <option>--Pilih Status Dokumen--</option>
                            <?php foreach($statusdokumen as $datadoc) {

                          if(!in_array($datadoc['kodestatusdoc'],$statusdokumen_post)){ ?>
                              <option  value="<?php echo $datadoc['kodestatusdoc'] ?>"><?php echo $datadoc['nama_statusdoc'] ?></option> 

                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datadoc['kodestatusdoc'] ?>"><?php echo $datadoc['nama_statusdoc'] ?></option>
                          <?php }} ?>
 
                          <!-- <?php foreach($namars as $datars) {

                          if(!in_array($datars['koders'],$namars_post)){ ?>
                              <option  value="<?php echo $datars['koders'] ?>"><?php echo $datars['namars'] ?></option> 

                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datars['koders'] ?>"><?php echo $datars['namars'] ?></option>


                          <?php }} ?>
 -->
                        </select>  
                    </div>
                    
                  </div><div class="col-lg-6">
                     <div class="box-header">
                <i class="fa fa-plus"></i>
                      <h3 class="box-title"> B. FORM ISIAN RKK (RENCANA KUNJUNGAN KERJA)</h3>
                    </div>
                    <div class="form-group">
                      <label for="">1.Nama Project</label>
                      <input type="text"  class="form-control" name="namaproject" value="<?php echo $namaproject;?>" placeholder="Nama Project"> </input>               
                    </div>

                     <div class="form-group">
                      <label for="">2. Nama Rumah Sakit(RS)</label>
                        <select name="namacabangrs" class="form-control" required>
                          <option>--Pilih Cabang --</option>
                           <?php foreach($namars as $datars) {

                          if(!in_array($datars['koders'],$namars_post)){ ?>
                              <option  value="<?php echo $datars['koders'] ?>"><?php echo $datars['namars'] ?></option> 

                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datars['koders'] ?>"><?php echo $datars['namars'] ?></option>


                          <?php }} ?>

                        </select> 
                    </div>
                    <div class="form-group">
                      <label for="">3. Departemen</label>
                       <select name="namadepartemen" class="form-control" required>
                          <option>--Pilih Departemen--</option>
                            <?php foreach($role as $datarole) {

                          if(!in_array($datarole['koderole'],$role_post)){ ?>
                              <option  value="<?php echo $datarole['koderole'] ?>"><?php echo $datarole['nama_role'] ?></option> 

                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datarole['koderole'] ?>"><?php echo $datarole['nama_role'] ?></option>


                          <?php }} ?>

                        </select>  
                    </div>
                    <div class="form-group">
                      <label for="">4.Waktu Pelaksanaan</label>
                      <input type="text"  class="form-control" id="datepicker3" name="waktupelaksanaan" value="<?php echo $waktupelaksanaan;?>"placeholder="yyyy-mm-dd"> </input>               
                    </div>
                    <div class="form-group">
                      <label for="">5. Nama PIC</label>
                        <input type="text" class="form-control" value="<?php echo $namapic;?>"  name="namapic" placeholder="Nama PIC">                        
                    </div>
                    
                  </div>


                  <div class="col-lg-6">

                    <div class="form-group">
                      <label for="">6.Nama Karyawan Yang Bertugas</label>
                      <input type="text" class="form-control"  name="namakaryawan" value="<?php echo $namakaryawanditugaskan;?>" placeholder="Nama Karyawan">       
                    </div>

                    <div class="form-group">
                      <label for="">7. Nama Kegiatan</label>
                      

                            <textarea style="height:100px"  class="form-control" name="namakegiatan" value="<?php echo $namakegiatan;?>" placeholder="Tulis Kegiatan"><?php echo $namakegiatan;?></textarea>    
                      
                    </div>
                    <div class="form-group">
                      <label for="">8. Sarana Dan Prasarana Yang Diperlukan</label>
                      
                          <textarea style="height:100px"  class="form-control" name="saranaprasarana" value="<?php echo $saranadanprasarana;?>" placeholder="Tulis Sarana/Prasarana"><?php echo $saranadanprasarana;?></textarea>    
                      
                    </div>
                    <div class="form-group">
                      <label for="">9.Target Kegiatan</label>
                        <textarea style="height:100px"  class="form-control" name="targetkegiatan" value="<?php echo $targetkegiatan;?>" placeholder="Target Kegiatan"><?php echo $targetkegiatan;?></textarea>                
                    </div>
					
					<div class="form-group">
                      <label for="">10.Uraian Kegiatan</label>
                        <textarea style="height:100px"  class="form-control" name="targeturaian" value="<?php echo $targeturaian;?>" placeholder="Target Uraian"><?php echo $targeturaian;?></textarea>                
                    </div>

                 

                       <div class="form-group">
                      <label for="">11.Kendala</label>
                        <textarea style="height:100px"  class="form-control" name="kendala" placeholder="Uraian Kegiatan"><?php echo $kendala;?></textarea>                
                    </div>
                       <div class="form-group">
                      <label for="">12.Solusi</label>
                        <textarea style="height:100px"  class="form-control" name="solusi" placeholder="Solusi"><?php echo $solusi;?></textarea>                
                    </div>
                       <div class="form-group">
                      <label for="">13.Output Kegiatan</label>
                        <textarea style="height:100px"  class="form-control" name="hasilkegiatan" value="<?php echo $hasilkegiatan;?>" placeholder="Output Kegiatan"><?php echo $hasilkegiatan;?></textarea>                
                    </div>

                      <div class="form-group">
                      <label for="">14.Mengetahui Kepala Departemen</label>
                      <input type="text" class="form-control"   name="namakadep" value="<?php echo $namakadep;?>" placeholder="Nama Kepala Departemen">  
                    </div>
                       <div class="form-group">
                      <label for="">15.Approve Kepala Departemen </label>
                      <br/>
                      <input type="checkbox"   name="mengetahuikadeprkk"  <?php echo $c3=$mengetahuikadeprkk; if($c3=='t') echo " Checked "?> >Ya,Sudah Dilihat Dan Dibaca</input> 
    
                    </div>

                     <!--   <div class="form-group">
                      <label for="">15. Upload CIS Jika Ada</label>
                        <input type="file" class="form-control" value="" id="" name="file_upload" placeholder="">                        
                    </div> -->
                   
                    
                  </div>
                 
    
                </div><!-- /.item -->

                  <div class="form-group">
                  
                <!--<a href="<?php echo base_url(); ?>assets/cis/upload/<?php echo $datacis; ?>" class="btn btn-success btn-block btn-flat">Download CIS</a>
 -->
                <!--<a class="btn btn-success btn-block btn-flat">Download CIS</a> -->
               <!--<button formtarget="_blank" type="submit" name="validasi" value="1" class="btn btn-primary btn-block btn-flat" >Download CIS</button> 
 -->
                 
                 <!--<a href="<?php echo base_url(); ?>assets/cis/upload/<?php echo $datacis; ?>" class="btn btn-success btn-block btn-flat">Download CIS</a> -->

                  <form role="form" method="POST" enctype="multipart/form-data"> 
                       <div class="form-group">
                  <input type="hidden" name="bulanini" value="<?php echo $bulanini ?>" class="form-control" >
                  <input type="submit" class="btn btn-success btn-block btn-flat" value="Download CIS" name="download" onClick="form.action='../../Laporan/cetak_gab?action=download';form.submit();"> 
				   </div>
				 
				
					<!--<div class="form-group">               
					<input type="hidden" name="id_stpd" value="<?php echo $id_stpd ?>" class="form-control" >
					<input type="submit" formtarget="_blank" class="btn btn-success btn-block" value="Download Rencana Kunjungan Kerja" name="downloadst"  onClick="form.action='../../laporanrkk/cetak_renckeg?action=downloadst';form.submit();">				 
					</div>-->
					
					<div class="form-group">               
					<input type="hidden" name="id_stpd" value="<?php echo $id_stpd ?>" class="form-control" >
					<input type="submit" formtarget="_blank" class="btn btn-success btn-block" value="Download Surat Tugas" name="downloadst"  onClick="form.action='../../laporanrkk/cetak_renckeg?action=downloadst';form.submit();">
					</div>
											
	
                  <a href="<?php echo base_url(); ?>assets/itenary/upload/<?php echo $dataitenary; ?>" class="btn btn-success btn-block btn-flat">Download Itenary</a>
               <!-- /.col -->
                <br/>
                </div><br/>
				
                 <div class="form-group">
                  <input type="submit" class="btn btn-primary btn-block btn-flat" value="simpan" name="simpan" onClick="form.action='../../stpd/updatestpd?action=simpan';form.submit();">
                  <a href="<?php echo base_url(); ?>stpd" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>
               </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
    