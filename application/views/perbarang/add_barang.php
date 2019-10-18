      <section class="content-header">
        <h1>
          <b>FORM DATA </b>
		  <br>FORMULIR PERSETUJUAN DIREKSI GROUP 
		  <br>ATAS PERMINTAAN ALAT KESEHATAN / ALAT UMUM INVESTASI
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
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                   <form role="form" action="<?php echo base_url(); ?>perbarang/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
					<div class="box-header">
						<i class="fa fa-plus"></i>
						<h3 class="box-title">FORM TAMBAH SURAT</h3>
					</div>
					
					<?php 
						$koderole=($this->session->userdata('koderole'));
						if($koderole=='1' OR $koderole=='5'):
					?> 
                    <div class="form-group">
                      <label for="">Departemen</label>
                       <select name="namadepartemen" class="form-control" required>
                          <option>--Pilih Departemen--</option>
                          <?php foreach($optrole as $row)  {  $macamrole=$row['nama_role']; $kodemacamrole=$row['nama_role'];?>
                           
                              <option value="<?php echo $row['nama_role'] ?>"><?php echo $row['nama_role'] ?></option>


                          <?php } ?>
                        </select>  
                    </div>
					<?php endif;?>
					
					<?php 
							$koderole=($this->session->userdata('koderole'));
							if($koderole!='1' && $koderole!='5'):
							?> 
					<div class="form-group">
                      <label for="">Departemen</label>
						<input type="text" class="form-control" value="<?php echo $this->session->userdata('nama_role'); ?>" id="" name="namadepartemen" readonly>
                    </div>
					<?php endif;?>
					
					<div class="form-group">
                        <label for="">Tanggal Pengajuan</label>
                        <input type="date" class="form-control" value="" id="" name="tanggal" placeholder="Isi Tanggal" required>
                    </div>
					
					<div class="form-group">
                        <label for="">Perihal</label>
						<textarea rows="4" class="form-control" value=""  id="" name="perihal" placeholder="Isi Perihal"></textarea>
                    </div>
					
					<div class="form-group">
                        <label for="">Lampiran</label>
						<textarea rows="4" class="form-control" value=""  id="" name="lampiran" placeholder="Isi Lampiran"></textarea>
                    </div>
					
					<div class="form-group">
                      <label for="">Attachment</label>
                        <input type="file" class="form-control"  id=""  name="file_attachment" placeholder="">                        
                    </div>
					
					<div class="form-group">
                        <label for="">Pembuka surat</label>
						<textarea rows="4" class="form-control" value=""  id="" name="pembuka" placeholder="Isi Pembuka Surat"></textarea>
                    </div>

					<div class="form-group">
						<label for="">Isi Surat</label>
						<textarea rows="8" class="form-control" value=""  id="" name="isi" placeholder="Isi Surat"></textarea>
					</div>
					
					<div class="form-group">
						<label for="">Penutup Surat</label>
						<textarea rows="4" class="form-control" value=""  id="" name="penutup" placeholder="Isi Penutup Surat"></textarea>
					</div>
					
					
					<div class="form-group">
                      <label for="">Pemohon <!--yang Mengajukan--></label>
                          <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" id="" name="mengajukan" readonly>
                    </div>
					
					<div class="form-group">
                      <label type="hidden" for="">TTD Pemohon <!--yang Mengajukan--></label>
                        <select name="ttd_mengajukan" class="form-control">
                          <!-- <option>--TTD Pemohon--</option> -->
                            <?php foreach($idpemohon as $data) {
                          if(!in_array($data['foto'],$for_ttdpemohonsurat)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

					
					<!--<div class="form-group">
						<label for="">Hormat Saya,</label>
						<input type="text" class="form-control" value="" id="" name="mengajukan" placeholder="Isi Nama yang mengajukan Surat" required>
					</div>-->
					
					<!--<div class="form-group">
                      <label for="">Upload Foto TTD yang Mengajukan</label>
                        <input type="file" class="form-control" value="" id=""  name="file_uploadttd" placeholder="">                        
                    </div>-->
				</div>

					<div class="col-lg-6">   
					<div class="box-header" class="col-lg-6">
						<i class="fa fa-plus"></i>
						<h3 class="box-title">FORM TAMBAH FORMULIR</h3>
					</div>
                    <div class="form-group">
                        <label for="">No. Formulir</label>
                        <input type="text" class="form-control" value="" id="" name="no_formulir" placeholder="Isi No. Formulir" required>
                    </div>
					
                    <div class="form-group">
                        <label for="">Supplier</label>
                        <input type="text" class="form-control" value="" id="" name="supplier" placeholder="Isi Supplier" required>
                    </div>
					
					<div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" class="form-control" value="" id="" name="alamat" placeholder="Isi Alamat" required>
                    </div>
					
					<div class="form-group">
                        <label for="">No. Telp</label>
                        <input type="text" class="form-control" value="" id="" name="no_telp" placeholder="Isi Telp">
                    </div>
					
					<div class="form-group">
                        <label for="">FAX</label>
                        <input type="fax" class="form-control" value="" id="" name="fax" placeholder="Isi Fax">
                    </div>
					
					<div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" value="" id="" name="email" placeholder="Isi Email">
                    </div>
					
					<div class="form-group">
                        <label for="">Nama Contact Person</label>
                        <input type="text" class="form-control" value="" id="" name="cp" placeholder="Isi Contact Person" required>
                    </div>
					
					<div class="form-group">
                        <label for="">No.Hp Contact Person</label>
                        <input type="text" class="form-control" value="" id="" name="no_hp" placeholder="Isi No Hp Contact Person" required>
                    </div>

					<div class="form-group">
                      <label for="">RSIA / RS yang meminta :</label>
                        <select name="koders" class="form-control" required>
                          <option>--Pilih Nama RS--</option>
                          <?php foreach($optRumahSakit as $row) { ?>
                              <option value="<?php echo $row['namars'] ?>"><?php echo $row['namars'] ?></option>
                          <?php } ?>
                        </select>    
                  </div>
					
					<div class="form-group">
						<label for="">Catatan Surat</label>
						<textarea rows="5" class="form-control" value=""  id="" name="catatan" placeholder="Isi Catatan"></textarea><br/>
					</div>

					<div class="form-group">
                       <!-- <label for="">Catatan Manager/KA.DEPT</label>-->
                        <input type="hidden" class="form-control" value="-" id="" name="catatan_direk">
                    </div>
					
					<div class="form-group">
						<!-- <label for="">Status</label>-->
	                    <input type="hidden" name="mengetahuidirekturcheck" id="mengetahuidirekturcheck" class="form-control" value="Draf">
	                </div>

                </div>
                 </div>
                </div><!-- /.item -->
				
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>perbarang" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>

              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
      </section><!-- /.content -->
