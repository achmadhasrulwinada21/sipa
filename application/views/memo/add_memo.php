
      <section class="content-header">
        <h1>
          <b>TAMBAH DATA MEMORANDUM</b>
             <small></small>
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
                <h3 class="box-title">FORM TAMBAH MEMORANDUM</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>memo/savememo" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="">KEPADA</label>
                        <select name="tujuan" class="form-control" required>
                          <option>--Pilih Nama Departemen--</option>
                          <?php foreach($optPemohon as $row) { ?>
                              <option value="<?php echo $row['nama_depar'] ?>"><?php echo $row['kode_depar'] ?></option>
                          <?php } ?>
                        </select>    
                  </div>
                    <div class="form-group">
                      <label for="">Dari</label>
                        <select name="dari" class="form-control" required>
                          <option>--Pilih Nama Departemen--</option>
                          <?php foreach($optPemohon as $row) { ?>
                              <option value="<?php echo $row['nama_depar'] ?>"><?php echo $row['kode_depar'] ?></option>
                          <?php } ?>
                        </select>    
                  </div>

                    <div class="form-group">
                      <label for="">Tanggal</label>
                        <input type="datepicker1" class="form-control" value="" id="datepicker1" name="tanggal" placeholder="Isikan Tanggal" required>
                    </div>

                    <div class="form-group">
                      <label for="">Perihal</label>
                        <input type="text" class="form-control" value="" id="Perihal" name="perihal" placeholder="Isikan Perihal" required>
                    </div>

                    <div class="form-group">
                      <label for="">Untuk</label>
                        <input type="text" class="form-control" value="" id="untuk" name="untuk" placeholder="Isikan Untuk" required>
                    </div>

                     <div class="form-group">
                      <label for="">Deskripsi</label>
                    <textarea rows="4" cols="50" value="" class="form-control" name="deskripsi"> </textarea>
                  </div>

                    <div class="form-group">
                      <label for="">Nama PIC</label>
                        <input type="text" class="form-control" value="" id="pic" name="pic" placeholder="Isikan Nama PIC" required>
                    </div>

                    <?php if($this->session->userdata('roles')=='10'):?>
                    <div class="form-group">
                      <label for="">Approve</label>
                      <br/>
                      <input type="checkbox"   name="approve" value="1" text="Sudah Dilihat" >Ya,Sudah Dilihat Dan Dibaca</input> 
                    </div>
                     <?php endif;?>
                  </div>
                   
                </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>memo" class="btn btn-warning btn-block btn-flat">Kembali</a>
               </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
