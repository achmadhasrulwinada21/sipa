
  <section class="content-header">
    <h1>
        TAMBAH DATA
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i></a></li>
        <li class="active"></li>
    </ol>
</section

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
                  <form role="form" action="<?php echo base_url(); ?>pengadaan/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">

                     <div class="form-group">
                   </div>
                     <div class="form-group">
                        <label for="">NO PKS</label>
                        <input type="text" class="form-control" value="" id="" name="no_pks" placeholder="Isi no PKS" required>
                    </div>
                   
                      <div class="form-group">
                      <label for="">NAMA RUMAH SAKIT</label>
                        <select name="rs" class="form-control" required>
                          <option>--Pilih Rumah Sakit--</option>
                          <?php foreach($rs as $row) { ?>
                              <option value="<?php echo $row['namars'] ?>"><?php echo $row['namars'] ?></option>
                          <?php } ?>
                        </select>    
                  </div>

                    <div class="form-group">
                        <label for="">REKANAN</label>
                        <input type="text" class="form-control" value="" id="" name="rekanan" placeholder="Isi data" required>
                    </div>
                    <div class="form-group">
                        <label for="">TENTANG</label>
                        <input type="text" class="form-control" value="" id="" name="tentang" placeholder="Isi data" required>
                    </div>
                     <div class="form-group">
                        <label for="">TANGGAL PERJANJIAN</label>
                        <input type="date" class="form-control" value="" id="" name="tanggal_perjanjian" placeholder="Isi data" required>
                    </div>
                     <div class="form-group">
                        <label for="">JANGKA WAKTU PERJANJIAN</label>
                        <input type="text" class="form-control" value="" id="" name="jangka_waktu" placeholder="Isi data" required>
                    </div>
                     <div class="form-group">
                        <label for="">HARGA / DISKON</label>
                        <input type="text" class="form-control" value="" id="" name="harga" placeholder="Isi data" required>
                    </div>

                     <div class="form-group">
                        <label for="">HAK DAN KEWAJIBAN (RS)</label>
                         <textarea type="text" class="form-control" placeholder="isi data" name="hak_rs"></textarea>
                    </div>
                      <div class="form-group">
                        <label for="">HAK DAN KEWAJIBAN (REKANAN)</label>
                         <textarea type="text" class="form-control" placeholder="isi data" name="hak_rekanan"></textarea>
                    </div>
                   </div>
                      <div class="form-group">
                        <label for="">PIC</label>
                        <input type="text" class="form-control" value="" id="" name="pic" placeholder="Isi data" required>
                    </div>
                        <div class="form-group">
                        <label for="">STATUS</label>
                        <input type="text" class="form-control" value="" id="" name="status" placeholder="Isi data" required>
                    </div>
                                             
                  </div>
                   
                </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>pengadaan" class="btn btn-warning btn-block btn-flat">Kembali</a>
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

  


  