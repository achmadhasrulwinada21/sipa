
      <section class="content-header">
        <h1>
          <b>TAMBAH DATA INVOICE</b>
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
                <h3 class="box-title">FORM TAMBAH INVOICE</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>invoice/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="">Kepada</label>
                        <input type="text" class="form-control" value="" id="" name="kepada" placeholder="Isikan kepada" required>
                    </div>
                    <div class="form-group">
                      <label for="">Alamat</label>
                        <input type="text" class="form-control" value="" id="" name="alamat" placeholder="Isikan alamat dari" required>                     
                    </div>

                    <div class="form-group">
                      <label for="">Invoice No</label>
                        <input type="text" class="form-control" value="" id="" name="invoice_no" placeholder="Isikan Invoice No" required>
                    </div>

                    <div class="form-group">
                      <label for="">Invoice Date </label>
                        <input type="datepicker1" class="form-control" value="" id="datepicker1" name="invoice_date" placeholder="Isikan Perihal" required>
                    </div>

                    <div class="form-group">
                      <label for="">Term Of Payment</label>
                        <input type="datepicker2" class="form-control" value="" id="datepicker2" name="term_pay" placeholder="Isikan termpay" required>
                    </div>
                       
                    <div class="form-group">
                      <label for="">Tanggal</label>
                        <input type="datepicker3" class="form-control" value="" id="datepicker3" name="tanggal" placeholder="Isikan Tanggal" required>
                    </div>
                    <div class="form-group">
                      <label for="">Keterangan</label>
                         <input type="text" class="form-control" value="" id="" name="keterangan" placeholder="Isikan Keterangan" required>
                    </div>
                    <div class="form-group">
                      <label for="">Nominal</label>
                         <input type="text" class="form-control" value="" id="" name="nominal" placeholder="Isikan Nominal" required>
                    </div>
                    <div class="form-group">
                      <label for="">PPN</label>
                        <input type="text" class="form-control" value="" id="" name="ppn" placeholder="Nilai PPN" required>
                    </div>
           <!--<div class="form-group">
                   <label for="">Total</label>
                         <input type="text" class="form-control" value="" id="" name="total" placeholder="Isikan Total" required>
                    </div>-->
                    <div class="form-group">
                      <label for="">Atas Nama</label>
                        <select name="nama_perusahaan" class="form-control" required>
                          <option>--Pilih Nama Perusahaan--</option>
                          <?php foreach($optperusahaan as $row) { ?>
                              <option value="<?php echo $row['nm_perusahaan'] ?>"><?php echo $row['nm_perusahaan'] ?></option>
                          <?php } ?>
                        </select>    
                  </div>
                    <div class="form-group">
                      <label for="">Bank</label>
                        <select name="bank" class="form-control" required>
                          <option>--Pilih Nama Bank--</option>
                          <?php foreach($optbank as $row) { ?>
                              <option value="<?php echo $row['nama_bank'] ?>"><?php echo $row['nama_bank'] ?></option>
                          <?php } ?>
                        </select>    
                  </div>
                    <div class="form-group">
                      <label for="">No Rekening</label>
                         <input type="text" class="form-control" value="" id="" name="no_rekening" placeholder="Isikan Nomor Rekening" required>
                    </div>
                    <div class="form-group">
                      <label for="">Nama PIC</label>
                        <input type="text" class="form-control" value="" id="pic" name="pic" placeholder="Isikan Nama PIC" required>
                    </div>

                      <?php if($this->session->userdata('roles')=='1'):?>
                   <div class="form-group">
                  <label type="hidden" for="">Approve Direktur Operasional Dan Umum</label>
                      <select name="status" id="status" class="form-control">
              <option>--Pilih Status--</option>
              <option  value='Approve'>Disetujui</option>
              <option value='Not Approved'>Ditolak</option>
              <option value='Revisi'>Revisi</option>
              <option  value='Menunggu Disetujui'>Draf</option>
                      </select><option>
                  </div>

                   <div class="form-group">
                  <label for="">Catatan</label>
                  <textarea rows="4" cols="50" value="" class="form-control" name="catatan"> </textarea>
                  </div>
                  <?php endif;?>

                </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>invoice" class="btn btn-warning btn-block btn-flat">Kembali</a>

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
