
<section class="content-header">

          <h1>
        TAMBAH DATA RENCANA KENDALI ANGGARAN TENAGA KERJA RS BARU
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
                <h3 class="box-title">FORM TAMBAH DATA RENCANA KENDALI ANGGARAN</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>detailnota/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                    <div class="form-group">



                      <label for="">NAMA KEGIATAN</label>
                        <input type="text" class="form-control" value="" name="nama_kegiatan" placeholder="Nama Kegiatan" required>
                    </div>

                     <div class="form-group">
                      <label for="">NAMA RUMAH SAKIT</label>
                        <select name="nama_rs" class="form-control" required>
                          <option>--Pilih Rumah Sakit--</option>
                          <?php foreach($optrs as $row) { ?>
                              <option value="<?php echo $row['koders'] ?>"><?php echo $row['namars'] ?></option>
                          <?php } ?>
                        </select>    
                  </div>

                  <div class="form-group">
                      <label for="">NAMA PERUSAHAAN</label>
                        <select name="nama_pt" class="form-control" required>
                          <option>--Pilih Rumah Sakit--</option>
                          <?php foreach($optperusahaan as $row) { ?>
                              <option value="<?php echo $row['kodep'] ?>"><?php echo $row['nm_perusahaan'] ?></option>
                          <?php } ?>
                        </select>    
                  </div>

                   <div class="form-group">
                      <label for="">Nama Supplier</label>
                        <select name="kontraktor" class="form-control" required>
                          <option>--Pilih Nama Supplier--</option>
                          <?php foreach($optsupp as $row) { ?>
                              <option value="<?php echo $row['kode_supplier'] ?>"><?php echo $row['nama_supplier'] ?></option>
                          <?php } ?>
                        </select>                        
                    </div>

                  <!--   <div class="form-group">
                      <label for="">Kontraktor</label>
                        <input type="text" class="form-control" value="" name="kontraktor" placeholder="Kontraktor" required>                        
                    </div> -->
                      <div class="form-group">
                      <label for="">PO</label>
                        <input type="text" class="form-control" value="" name="po" placeholder="PO" required>                        
                    </div>
                    <div class="form-group">
                      <label for="">No Giro Cek</label>
                        <input type="text" class="form-control" value="" name="no_girocek" placeholder="No Giro Cek" required>                        
                    </div>
                    <div class="form-group">
                      <label for="">Rencana Pembayaran</label>
                        <input type="text" class="form-control" value="" id="" name="renc_pembayaran" placeholder="Rencana Pembayaran" required>                        
                    </div>

                    <div class="form-group">
                      <label for="">Bulan Dibayar</label>
                        <input type="date" class="form-control" value="" id="" name="bulan_dibayar" required>                        
                    </div>


                    <div class="form-group">
                      <label for="">Keterangan</label>
                        <input type="text" class="form-control" value="" id="" name="keterangan" placeholder="Keterangan" >                        
                    </div>
                  
                </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>detailnota" class="btn btn-warning btn-block btn-flat">Kembali</a>
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
   
    