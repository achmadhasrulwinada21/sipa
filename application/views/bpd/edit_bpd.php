
  <?php 

  $kd_role=$this->session->userdata('koderole');

  $kd_approval=$this->session->userdata('approval');
  ?>



<section class="content-header">
    <h1>
        Edit STPD
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <a href="#"><i class="fa fa-suitcase"></i>Form Edit</a>
        <li class="active"></li>
    </ol>
</section>


<section class="content">
    <div class="row">
     
        <div class="col-md-12">
      
            <div class="box box-primary">
                <div class="box-header">
                <div class="col-md-5">

                  
                <?php
                    echo form_open_multipart('bpd/updatebpd') ;
                ?>
                    
                    <div class="box-body">

                        <div class="form-group">
                      <label for=""></label>
                        <input type="hidden" class="form-control" value="<?php echo $id_bpd;?>" name="id_bpd" placeholder="" readonly="" >
                    </div>

                     <div class="form-group">
                      <label for="">1.Nomor Surat</label>
                        <input type="text" class="form-control" value="<?php echo $nosurat;?>" id="" name="nomorsurat" placeholder="Nomor Surat" required>
                    </div>

                    <div class="form-group">
                      <label for="">2.Nama Sekretaris</label>
                        <input type="text" class="form-control" value="<?php echo $namasekretaris;?>" id="" name="namasekretaris" placeholder="Nama Sekretaris" required>
                    </div>

                    <div class="form-group">
                      <label for="">3.Jabatan Sekretaris</label>
                        <input type="text" class="form-control" value="<?php echo $jabatansekretaris;?>" id="" name="jabatansekretaris" placeholder="Jabatan Sekretaris" required>                        
                    </div>
                      <div class="form-group">
                      <label for="">4.Nama Kadep</label>
                        <input type="text" class="form-control" value="<?php echo $namakadep;?>" id="" name="namakadep" placeholder="Dari Pemohon/Kepala Departemen" required>                        
                    </div>
                    <div class="form-group">
                      <label for="">5.Jabatan Kadep</label>
                        <input type="text" class="form-control" value="<?php echo $jabatankadep;?>"  name="jabatankadep" placeholder="Jabatankadep" required>                        
                    </div>
                     <div class="form-group">
                      <label for="">6.Nama Yang Ditugaskan</label>
                        <input type="text" class="form-control" value="<?php echo $namayangditugaskan;?>" id="" name="namayangditugaskan" placeholder="perihal" required>                        
                    </div>
                     <div class="form-group">
                      <label for="">7.Waktu Tugas</label>
                        <input type="text" class="form-control" value="<?php echo $waktutugas;?>" id="datepicker1" name="waktutugas" placeholder="lampiran" required>                        
                    </div>
                     <div class="form-group">
                      <label for="">8.Tujuan Tempat</label>
                          <input type="text" class="form-control" value="<?php echo $tujuantempat;?>" id="" name="tujuantempat" placeholder="Nama yang ditugaskan" required> 
                    </div>

                     <div class="form-group">
                      <label for="">9.Dasar Penugasan</label>
                      <input type="text" class="form-control" value="<?php echo $dasarpenugasan;?>" id="" name="dasarpenugasan" placeholder="Tanggal Pelaksanaan" required> 
                    </div>
                     
                    <div class="form-group">
                      <label for="">10.Kegiatan Penugasan</label>
                      <textarea rows="4" cols="50"  class="form-control" name="kegiatanpenugasan"><?php echo $kegiatanpenugasan;?> </textarea> 
                       
                    </div>


                      <div class="form-group">
                      <label for="">10.Mengetahui Sekretaris</label>
                      <input type="text"  class="form-control" name="mengetahuisekretaris" value="<?php echo $mengetahuisekretaris;?>" >

                    
                       
                    </div>
                      

                    <div class="form-group">
                      <label for="">11.Approve Sekretaris Direktur</label>
                      <br/>
                  
                       <input type="checkbox"   name="sekretarischeck" <?php echo $c2=$sekretarischeck; if($c2=='t') echo " Checked "?>
                       >Ya,Sudah Dilihat Dan Dibaca</input> 


                      
                    </div>
                      <div class="form-group">
                      <label for="">12.Status Dokumen(Director Secretary Only)</label>
                   <select name="statusdokumen" class="form-control" required <?php   
                      
                      $kd_approval=$this->session->userdata('approval'); if($kd_approval=='') echo "readonly=''"?>>
                          <option>--Pilih Status Dokumen--</option>
                            <?php foreach($statusdokumen as $datadoc) {

                          if(!in_array($datadoc['kodestatusdoc'],$statusdokumen_post)){ ?>
                              <option  value="<?php echo $datadoc['kodestatusdoc'] ?>"><?php echo $datadoc['nama_statusdoc'] ?></option> 

                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datadoc['kodestatusdoc'] ?>"><?php echo $datadoc['nama_statusdoc'] ?></option>
                          <?php }} ?>
 
                       
                        </select>  
                    </div>

                      <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>                        
                        <a href="<?php echo site_url('bpd'); ?>" class="btn btn-primary">Kembali</a>
                    </div>

               
                      
                    </div>

                 
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>