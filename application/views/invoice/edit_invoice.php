
      <section class="content-header">
        <h1>
          <b>EDIT DATA INVOICE</b>
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
                <h3 class="box-title">FORM EDIT INVOICE</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>invoice/updateinvoice" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                      <div class="form-group">
                      <label for="">ID INVOICE</label>
                        <input type="hidden" class="form-control" value="<?php echo $id_inv; ?>" id="" name="id_inv" placeholder="Invoice" required>
                    </div>

                    <div class="form-group">
                      <label for="">KEPADA</label>
                        <input type="text" class="form-control" value="<?php echo $kepada; ?>" id="" name="kepada" placeholder="Isikan Kepada" required>
                    </div>
                    <div class="form-group">
                      <label for="">ALAMAT</label>
                        <input type="text" class="form-control" value="<?php echo $alamat; ?>" id="" name="alamat" placeholder="Isikan Alamat" required>                        
                    </div>
                    <div class="form-group">
                      <label for="">INVOICE NO</label>
                        <input type="text" class="form-control" value="<?php echo $invoice_no; ?>" id="" name="invoice_no" placeholder="No Invoice" required>
                    </div>
                    <div class="form-group">
                      <label for="">INVOICE DATE</label>
                        <input type="date" class="form-control" value="<?php echo $invoice_date; ?>" id="" name="invoice_date" placeholder="Isikan Tanggal Invoice" required>
                    </div>
                    <div class="form-group">
                      <label for="">TERM OF PAYMENT</label>
                        <input type="date" class="form-control" value="<?php echo $term_pay; ?>" id=""  name="term_pay" placeholder="Isikan Term of Payment" required>
                    </div>
                    <div class="form-group">
                      <label for="">Tanggal</label>
                        <input type="date" class="form-control" value="<?php echo $tanggal; ?>" id="" name="tanggal" placeholder="Isikan Tanggal" required>
                    </div>
                    <div class="form-group">
                      <label for="">KETERANGAN</label>
                        <input type="text" class="form-control" value="<?php echo $keterangan; ?>" id="" name="keterangan" placeholder="Masukan Keterangan" required>
                    </div>
                    <div class="form-group">
                      <label for="">NOMINAL</label>
                        <input type="text" class="form-control" value="<?php echo $nominal; ?>" id="" name="nominal" placeholder="Masukan Nominal" required>
                    </div>
                    <div class="form-group">
                      <label for="">PPN</label>
                        <input type="text" class="form-control" value="<?php echo $ppn; ?>" id="" name="ppn" placeholder="Masukan PPN" required>
                    </div>

<!-- 					          <div class="form-group">
                      <label for="">TOTAL</label>
                        <input type="text" class="form-control" value="<?php echo $total; ?>" id="" name="total" placeholder="Masukan Total" required> -->

<!-- 					          <div class="form-group">
                      <label for="">TOTAL</label>
                        <input type="text" class="form-control" value="<?php echo $total; ?>" id="" name="total" placeholder="Masukan Total" required>

                    </div> -->
                   <!--  </div> -->
                    <div class="form-group">
                      <label type="hidden" for="">ATAS NAMA</label>
                        <select name="nama_perusahaan" class="form-control">
                          <option>--PILIH NAMA PERUSAHAAN--</option>
                            <?php foreach($id_atasnama as $data) {
                          if(!in_array($data['nm_perusahaan'],$for_atasnama)){ ?>
                              <option  value="<?php echo $data['nm_perusahaan'] ?>"><?php echo $data['nm_perusahaan'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['nm_perusahaan'] ?>"><?php echo  $data['nm_perusahaan'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                    <div class="form-group">
                      <label type="hidden" for="">BANK</label>
                        <select name="bank" class="form-control">
                          <option>--PILIH NAMA BANK--</option>
                            <?php foreach($id_bank as $data) {
                          if(!in_array($data['nama_bank'],$for_bank)){ ?>
                              <option  value="<?php echo $data['nama_bank'] ?>"><?php echo $data['nama_bank'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['nama_bank'] ?>"><?php echo  $data['nama_bank'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

<!--                      <div class="form-group">
                      <label for="">BANK</label>
                        <input type="text" class="form-control" value="<?php echo $bank; ?>" id="" name="bank" placeholder="Masukan Nama Bank" required>
                    </div> -->
                     <div class="form-group">
                      <label for="">NOMOR REKENING</label>

                        <input type="text" class="form-control" value="<?php echo $no_rekening; ?>" id="" name="no_rekening" placeholder="Masukan Nomor Rekening" required>
                      </div>

                    <div class="form-group">
                      <label for="">Nama PIC</label>
                        <input type="text" class="form-control" value="<?php echo $pic; ?>" id="" name="pic" placeholder="Nama PIC" required>
                    </div>


                       <div class="form-group">
                  <label type="hidden" for="">Approve Direktur Operasional Dan Umum</label>
                      <select name="status" id="status" class="form-control">
                      <option>--Pilih Status--</option>
                      <option <?php if( $status=='Approve'){echo "selected"; } ?> value='Approve'>Disetujui</option>
                      <option <?php if( $status=='Not Approved'){echo "selected"; } ?> value='Not Approved'>Ditolak</option>
                      <option <?php if( $status=='Revisi'){echo "selected"; } ?> value='Revisi'>Revisi</option>
                      <option <?php if( $status=='Menunggu Disetujui'){echo "selected"; } ?> value='Menunggu Disetujui'>Draf</option>
                      </select></option>
                  </div>

                    <div class="form-group">
                      <label type="hidden" for="">TTD Mengetahui</label>
                        <select name="ttd_direktur" class="form-control">
                          <option>--TTD Mengetahui--</option>
                            <?php foreach($id_mengetahui as $data) {
                          if(!in_array($data['foto'],$dirut)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                   <div class="form-group">
                      <label for="">Catatan</label>
                        <textarea rows="4" cols="50" value="" class="form-control" name="catatan"><?php echo $catatan; ?></textarea>
                  </div>

                  </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>invoice" class="btn btn-warning btn-block btn-flat">Kembali</a>
               </div>
                </form>
                </div>
            </div>
            </div>
       </div>
  </section>   

