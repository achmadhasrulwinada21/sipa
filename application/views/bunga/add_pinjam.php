
<section class="content-header">
   <!--  <h1>
        TAMBAH DATA 
        <small></small>
    </h1> -->
    
</section>

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <b>TAMBAH DATA </b>
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
                <i class="fa fa-plus"></i>
                <h3 class="box-title">FORM TAMBAH</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>Pinjaman/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">

                     <div class="form-group">
                   </div>
                     <div class="form-group">
                        <label for="">No Surat</label>
                        <input type="text" class="form-control" value="" id="" name="no_surat" placeholder="Isi no surat" required>
                    </div>

                    <div class="form-group">
                        <label for="">Nama Rumah Sakit</label>
                        <input type="text" class="form-control" 
                        value="<?php echo $this->session->userdata('namars'); ?>" id="" name="namars" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Perihal</label>
                        <input type="text" class="form-control" value="" id="" name="perihal" placeholder="Isi perihal" required>
                    </div>

                    <div class="form-group">
                        <label for="">Lampiran</label>
                        <input type="text" class="form-control" value="" id="" name="lampiran" placeholder="Isi lampiran" required>
                    </div>

                    <div class="form-group">
                      <label for="">Attachment</label>
                        <input type="file" class="form-control"  id=""  name="file_uploadttd" placeholder="">                        
                      </div> 

                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="date" class="form-control" value="" id="" name="tanggal" required>
                    </div>

                    <div class="form-group">
                      <label for="">Tujuan</label>
                        <input type="text" class="form-control" value="" id="" name="tujuan" placeholder="Isi tujuan" required>                        
                    </div>
                      
                 <div class="form-group">
                      <label for="">Pemberi Pinjaman</label>
                        <select name="bank" class="form-control" required>
                          <option value="-">--Pilih Pemberi Pinjaman--</option>
                          <?php foreach($pinjam as $row) { ?>
                              <option value="<?php echo $row['pemberi_pinjaman'] ?>"><?php echo $row['pemberi_pinjaman'] ?></option>
                          <?php } ?>
                        </select>    
                  </div>   

                    <div class="form-group">
                      <label for="">Pinjaman</label>
                        <input type="text" class="form-control" value="0" id="" name="pinjaman" placeholder="Isi Pinjaman" required>                        
                    </div> 

                    <div class="form-group">
                      <input type="hidden" class="form-control" value="0" id="" name="bunga">                        
                    </div>

                     <div class="form-group">
                      <label for="">Email</label>
                        <input type="text" class="form-control" value="" id="" name="kontak" placeholder="Isi Email Anda" required>                        
                    </div> 

                    <div class="form-group">
                      <input type="hidden" class="form-control" value="Draf" id="" name="mengetahuidirekturcheck">                        
                    </div>

                     <div class="form-group">
                      <input type="hidden" class="form-control" value="-" id="" name="catatan">                        
                    </div>

                     <div class="form-group">
                      <input type="hidden" class="form-control" value="-" id="" name="catatan_kadep">                        
                    </div>
                    
                    <div class="form-group">
                      
                        <input type="hidden" class="form-control" value="<?php echo $nama_user; ?>" id="" name="createby" readonly>                        
                    </div>
                                                                                    
                  </div>
                   
                </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>Pinjaman" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>

              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
         
        </div><!-- /.row (main row) -->

     
    
  
    


  