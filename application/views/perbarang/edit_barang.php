      <section class="content-header">
        <h1>
          <b>EDIT DATA</b>
		  <br>FORMULIR PERSETUJUAN DIREKSI GROUP 
		  <br>ATAS PERMINTAAN ALAT KESEHATAN / ALAT UMUM INVESTASI
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
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>perbarang/updatebarang" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">

<!-- menu admin -->					
<?php 
	$koderole=($this->session->userdata('koderole'));
	if($koderole=='1' OR $koderole=='5'):
?> 
					<div class="col-lg-6">
					
					<div class="box-header">
						<i class="fa fa-plus"></i>
						<h3 class="box-title">FORM EDIT SURAT</h3>
					</div>
					
					<div class="form-group">
                     <!-- <label for="">ID</label> -->
                        <input type="hidden" class="form-control" value="<?php echo $id_formulir; ?>" id="" name="id_formulir" readonly>
                    </div>

					<?php 
						$koderole=($this->session->userdata('koderole'));
						if($koderole=='1' OR $koderole=='5'):
					?> 

					<div class="form-group">
                      <label for="">Departemen</label>
                       <select name="namadepartemen" class="form-control" required>
                          <option>--Pilih Departemen--</option>
                            <?php foreach($role as $datarole) {
                          if(!in_array($datarole['nama_role'],$role_post)){ ?>
                              <option  value="<?php echo $datarole['nama_role'] ?>"><?php echo $datarole['nama_role'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datarole['nama_role'] ?>"><?php echo $datarole['nama_role'] ?></option>
                          <?php }} ?>
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
                        <input type="date" class="form-control" value="<?php echo $tanggal; ?>" id="" name="tanggal" required>                        
                    </div>
					
					<div class="form-group">
                      <label for="">Perihal</label>
                        <input type="text" class="form-control" value="<?php echo $perihal; ?>" id="" name="perihal" required>                        
                    </div>
					
					
					<div class="form-group">
                      <label for="">Lampiran</label>
                        <input type="text" class="form-control" value="<?php echo $lampiran; ?>" id="" name="lampiran" required>                        
                    </div>
					
					<div class="form-group">
                    <label for="">Attachment</label>
                      <input type="hidden" name="attachment" value="<?php echo $attachment; ?>">
                        <input type="file" class="form-control" value="<?php echo $attachment; ?>" id="" name="file_attachment" placeholder="">
                        <div style="color:blue;font-weight:bold;"><?php echo $attachment; ?></div>
                        <embed src="<?php echo base_url(); ?>assets/upload/<?php echo $attachment; ?>" style="width:270px;height:150px;"/> 
                    </div>
					

                    <div class="form-group">
                      <label for="">Pembuka surat</label>
						<textarea  rows="4" class="form-control" name="pembuka" placeholder="pembuka"><?php echo $pembuka;?></textarea>       						
                    </div>
					
					<div class="form-group">
                      <label for="">Isi Surat</label>
					   <textarea  rows="4" class="form-control" name="isi" placeholder="isi"><?php echo $isi;?></textarea>                      
                    </div>
					
					<div class="form-group">
                      <label for="">Penutup</label>
					   <textarea  rows="4" class="form-control" name="penutup" placeholder="penutup"><?php echo $penutup;?></textarea>                      
                    </div>
					
					
					<?php 
						$koderole=($this->session->userdata('koderole'));
						if($koderole=='1' OR $koderole=='5'):
					?> 
					
					<div class="form-group">
                      <label for="">Pemohon</label>
                        <input type="text" class="form-control" value="<?php echo $mengajukan; ?>" id="" name="mengajukan" readonly>                        
                    </div>
					
					<div class="form-group">
                    <!--<label type="hidden" for="">TTD Pemohon</label>-->
					<input type="hidden" class="form-control" value="<?php echo $ttd_mengajukan; ?>" id="" name="ttd_mengajukan" placeholder="" readonly>
                    </div>
<?php endif;?>


<!-- menu admin -->					
        <?php 
        	$koderole=($this->session->userdata('koderole'));
        	if($koderole!='1' && $koderole!='5'):
        ?> 
					<div class="form-group">
                      <label for="">Pemohon</label>
                        <input type="text" class="form-control" value="<?php echo $mengajukan; ?>" id="" name="mengajukan" readonly>                        
                    </div>
					
					<div class="form-group">
                    <!-- <label type="hidden" for="">TTD Pemohon</label>-->
					<input type="hidden" class="form-control" value="<?php echo $ttd_mengajukan; ?>" id="" name="ttd_mengajukan" placeholder="" readonly>
                    </div>
					<?php endif;?>
					
					</div>
					
					<div class="col-lg-6">   
					<div class="box-header" class="col-lg-6">
						<i class="fa fa-plus"></i>
						<h3 class="box-title">FORM EDIT FORMULIR</h3>
					</div>
					
					<div class="form-group"></div>
					
					<div class="form-group">
                       <label for="">No. Formulir</label>
                        <input type="text" class="form-control" value="<?php echo $no_formulir; ?>" id="" name="no_formulir" required>                        
                    </div>
					
					<div class="form-group">
                      <label for="">Supplier</label>
                        <input type="text" class="form-control" value="<?php echo $supplier; ?>" id="" name="supplier" required>                        
                    </div>
					
					<div class="form-group">
                       <label for="">Alamat</label>
                        <input type="text" class="form-control" value="<?php echo $alamat; ?>" id="" name="alamat" required>                        
                    </div>
					
					<div class="form-group">
                       <label for="">No. Telp</label>
                        <input type="text" class="form-control" value="<?php echo $no_telp; ?>" id="" name="no_telp">                        
                    </div>
					
					<div class="form-group">
                       <label for="">FAX</label>
                        <input type="text" class="form-control" value="<?php echo $fax; ?>" id="" name="fax">                        
                    </div>
					
					<div class="form-group">
                       <label for="">Email</label>
                        <input type="text" class="form-control" value="<?php echo $email; ?>" id="" name="email">                        
                    </div>
					
					<div class="form-group">
                        <label for="">Nama Contact Person</label>
                        <input type="text" class="form-control" value="<?php echo $cp; ?>" id="" name="cp" required>                        
                    </div>

					<div class="form-group">
                       <label for="">No.Hp Contact Person</label>
                        <input type="text" class="form-control" value="<?php echo $no_hp; ?>" id="" name="no_hp">                        
                    </div>
					
					<div class="form-group">
                      <label type="hidden" for="">RSIA / RS yang meminta :</label>
                        <select name="koders" class="form-control">
                          <option>--Pilih Kode RS--</option>
                            <?php foreach($namars as $datakd) {
                          if(!in_array($datakd['namars'],$namars_post)){ ?>
                              <option  value="<?php echo $datakd['namars'] ?>"><?php echo $datakd['namars'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datakd['namars'] ?>"><?php echo $datakd['namars'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>
					
					<div class="form-group">
                       <label for="">Catatan Surat</label>
					    <textarea  rows="4" class="form-control" name="catatan" placeholder="catatan"><?php echo $catatan;?></textarea>                        
                    </div>
					
					<div class="form-group">
                       <!--<label for="">Status</label> --> 
					    <input type="hidden" class="form-control" value="Draf" id="" name="mengetahuidirekturcheck" readonly>                        
						<!--Biar gak 0 Manager/Kadep -->
						<input type="hidden" class="form-control" value="-" id="" name="mengetahui">
						<input type="hidden" class="form-control" value="-" id="" name="ttd_mengetahui">						
						<input type="hidden" class="form-control" value="-" id="" name="catatan_direk">  
						<!--Biar gak 0 Direktur -->
						<input type="hidden" class="form-control" value="-" id="" name="menyetujui">
						<input type="hidden" class="form-control" value="-" id="" name="ttd_menyetujui">						
						<input type="hidden" class="form-control" value="-" id="" name="catatan_menyetujui">                  
                    </div>
                    
					</div>
<?php endif;?>
<!-- end menu admin/pemohon --> 					

<!-- untuk Mengetahui (Manager / KA.DEPT)  -->
<?php 
	$koderole=($this->session->userdata('koderole'));
	if($koderole=='14' OR $koderole=='25' OR $koderole=='27' OR $koderole=='35' OR $koderole=='15' OR $koderole=='26'):
?> 
				<div class="col-lg-6"> 	 
					<div class="form-group">
                     <!-- <label for="">ID</label> -->
                        <input type="hidden" class="form-control" value="<?php echo $id_formulir; ?>" id="" name="id_formulir" readonly>
                    </div>

					<div class="form-group">
                      <label for="">Departemen</label>
						<input type="text" class="form-control" value="<?php echo $namadepartemen; ?>" id="" name="namadepartemen" readonly>
                    </div>

										
					<div class="form-group">
                       <label for="">Tanggal Pengajuan</label>
                        <input type="date" class="form-control" value="<?php echo $tanggal; ?>" id="" name="tanggal" readonly>                        
                    </div>
					
					<div class="form-group">
                      <label for="">Perihal</label>
                        <input type="text" class="form-control" value="<?php echo $perihal; ?>" id="" name="perihal" readonly>                        
                    </div>
					
					
					<div class="form-group">
                      <label for="">Lampiran</label>
                        <input type="text" class="form-control" value="<?php echo $lampiran; ?>" id="" name="lampiran" readonly>                        
                    </div>
					
					<div class="form-group">
                    <label for="">Attachment</label>
                      <input type="hidden" name="attachment" value="<?php echo $attachment; ?>">
                        <input type="file" class="form-control" value="<?php echo $attachment; ?>" id="" name="file_attachment" placeholder="">
                        <div style="color:blue;font-weight:bold;"><?php echo $attachment; ?></div>
                        <embed src="<?php echo base_url(); ?>assets/upload/<?php echo $attachment; ?>" style="width:270px;height:150px;"/> 
                    </div>
					

                    <div class="form-group">
                      <!-- <label for="">Pembuka surat</label> -->
						<input type="hidden" class="form-control" value="<?php echo $pembuka; ?>" id="" name="pembuka" readonly>						
                    </div>
					
					<div class="form-group">
                      <!-- <label for="">Isi Surat</label>   -->                  
						<input type="hidden" class="form-control" value="<?php echo $isi; ?>" id="" name="isi" readonly>
					</div>
					
					<div class="form-group">
                    <!--   <label for="">Penutup</label> -->
						<input type="hidden" class="form-control" value="<?php echo $penutup; ?>" id="" name="penutup" readonly> 
					</div>
                   
				</div>
				<div class="col-lg-6">
				
					<div class="form-group"></div>
					
					<div class="form-group">
                       <label for="">No. Formulir</label>
                        <input type="text" class="form-control" value="<?php echo $no_formulir; ?>" id="" name="no_formulir" readonly>                        
                    </div>
					
					<div class="form-group">
                      <label for="">Supplier</label>
                        <input type="text" class="form-control" value="<?php echo $supplier; ?>" id="" name="supplier" readonly>                        
                    </div>
					
					<div class="form-group">
                       <!-- <label for="">Alamat</label> -->
                        <input type="hidden" class="form-control" value="<?php echo $alamat; ?>" id="" name="alamat" readonly>                        
                    </div>
					
					<div class="form-group">
                      <!--  <label for="">No. Telp</label> -->
                        <input type="hidden" class="form-control" value="<?php echo $no_telp; ?>" id="" name="no_telp" readonly>                        
                    </div>
					
					<div class="form-group">
                      <!--  <label for="">FAX</label> -->
                        <input type="hidden" class="form-control" value="<?php echo $fax; ?>" id="" name="fax" readonly>                        
                    </div>
					
					<div class="form-group">
                      <!--  <label for="">Email</label> -->
                        <input type="hidden" class="form-control" value="<?php echo $email; ?>" id="" name="email" readonly>                        
                    </div>
					
					<div class="form-group">
                       <!--  <label for="">Nama Contact Person</label> -->
                        <input type="hidden" class="form-control" value="<?php echo $cp; ?>" id="" name="cp" required readonly>                        
                    </div>

					<div class="form-group">
                      <!--  <label for="">No.Hp Contact Person</label> -->
                        <input type="hidden" class="form-control" value="<?php echo $no_hp; ?>" id="" name="no_hp" readonly>                        
                    </div>
					
					<div class="form-group">
                       <label for="">RSIA / RS yang meminta :</label>
                        <input type="text" class="form-control" value="<?php echo $koders; ?>" id="" name="koders" readonly>                        
                    </div>
					
					<div class="form-group">
                      <!--  <label for="">Catatan Surat</label> -->
						<input type="hidden" class="form-control" value="<?php echo $catatan; ?>" id="" name="catatan" readonly>                       
                    </div>
					
					<div class="form-group">
					<!--   <label for="">PEMOHON</label> -->
					<input type="hidden" class="form-control" value="<?php echo $mengajukan; ?>" id="" name="mengajukan" placeholder="" readonly>
                    </div>

                     <div class="form-group">
                     <!--  <label type="hidden" for="">TTD Pemohon</label> -->
					<input type="hidden" class="form-control" value="<?php echo $ttd_mengajukan; ?>" id="" name="ttd_mengajukan" placeholder="" readonly>
                    </div>
					
					<div class="form-group">
                      <label for="">MENGETAHUI</label>
                          <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" id="" name="mengetahui" readonly>
                    </div>
					
					<div class="form-group">
					<label type="hidden" for="">Approve Manager / Kepala Departemen</label>
                      <select name="mengetahuidirekturcheck" id="mengetahuidirekturcheck" class="form-control">
						<option value="Draf">--Pilih Status--</option>
						<option <?php if( $mengetahuidirekturcheck=='Approve_mk'){echo "selected"; } ?> value='Approve_mk'>Disetujui Manager/Kadep</option>
						<option <?php if( $mengetahuidirekturcheck=='Not_Approved_mk'){echo "selected"; } ?> value='Not_Approved_mk'>Ditolak Manager/Kadep</option>
						<option <?php if( $mengetahuidirekturcheck=='Revisi_mk'){echo "selected"; } ?> value='Revisi_mk'>Revisi Manager/Kadep</option>
						<option <?php if( $mengetahuidirekturcheck=='Draf'){echo "selected"; } ?> value='Draf'>Menunggu</option>
                      </select><option>
                  </div>
				  
					<div class="form-group">
                      <label type="hidden" for="">TTD Mengetahui</label>
                        <select name="ttd_mengetahui" class="form-control">
                          <!-- <option>--TTD Mengetahui--</option> -->
                            <?php foreach($idmengetahui as $data) {
                          if(!in_array($data['foto'],$for_ttdmeng)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

					<div class="form-group">
                       <label for="">Catatan Kepala Departemen</label>
					    <textarea  rows="4" class="form-control" name="catatan_direk" placeholder="Catatan..."><?php echo $catatan_direk;?></textarea>                        
                    </div>
					
					<div class="form-group">
                       <!--<label for="">Direktur agat tabel tidak kosong</label>-->
						<input type="hidden" class="form-control" value="-" id="" name="menyetujui">
						<input type="hidden" class="form-control" value="-" id="" name="ttd_menyetujui">						
						<input type="hidden" class="form-control" value="-" id="" name="catatan_menyetujui">
					</div>
					
					
                    
			</div>
<?php endif;?>
<!-- end untuk Mengetahui  -->
					
					
					
<!-- untuk Menyutujui (Direktur Utama) -->
<?php 
	$koderole=($this->session->userdata('koderole'));
	if($koderole=='17' OR $koderole=='28' OR $koderole=='29' OR $koderole=='10'):
?> 
			<div class="col-lg-6"> 	 
					<div class="form-group">
                     <!-- <label for="">ID</label> -->
                        <input type="hidden" class="form-control" value="<?php echo $id_formulir; ?>" id="" name="id_formulir" readonly>
                    </div>

					<div class="form-group">
                      <label for="">Departemen</label>
						<input type="text" class="form-control" value="<?php echo $namadepartemen; ?>" id="" name="namadepartemen" readonly>
                    </div>

										
					<div class="form-group">
                       <label for="">Tanggal Pengajuan</label>
                        <input type="date" class="form-control" value="<?php echo $tanggal; ?>" id="" name="tanggal" readonly>                        
                    </div>
					
					<div class="form-group">
                      <label for="">Perihal</label>
                        <input type="text" class="form-control" value="<?php echo $perihal; ?>" id="" name="perihal" readonly>                        
                    </div>
					
					
					<div class="form-group">
                      <label for="">Lampiran</label>
                        <input type="text" class="form-control" value="<?php echo $lampiran; ?>" id="" name="lampiran" readonly>                        
                    </div>
					
					<div class="form-group">
                    <label for="">Attachment</label>
                      <input type="hidden" name="attachment" value="<?php echo $attachment; ?>">
                        <input type="file" class="form-control" value="<?php echo $attachment; ?>" id="" name="file_attachment" placeholder="">
                        <div style="color:blue;font-weight:bold;"><?php echo $attachment; ?></div>
                        <embed src="<?php echo base_url(); ?>assets/upload/<?php echo $attachment; ?>" style="width:270px;height:150px;"/> 
                    </div>
					

                    <div class="form-group">
                      <!-- <label for="">Pembuka surat</label> -->
						<input type="hidden" class="form-control" value="<?php echo $pembuka; ?>" id="" name="pembuka" readonly>						
                    </div>
					
					<div class="form-group">
                      <!-- <label for="">Isi Surat</label>   -->                  
						<input type="hidden" class="form-control" value="<?php echo $isi; ?>" id="" name="isi" readonly>
					</div>
					
					<div class="form-group">
                    <!--   <label for="">Penutup</label> -->
						<input type="hidden" class="form-control" value="<?php echo $penutup; ?>" id="" name="penutup" readonly> 
					</div>

					<div class="form-group">
                      <label for="">Pemohon</label>
                        <input type="text" class="form-control" value="<?php echo $mengajukan; ?>" id="" name="mengajukan" readonly>                        
                    </div>
					
					<div class="form-group">
                    <!--<label type="hidden" for="">TTD Pemohon</label>-->
					<input type="hidden" class="form-control" value="<?php echo $ttd_mengajukan; ?>" id="" name="ttd_mengajukan" placeholder="" readonly>
                    </div>
                   
				</div>
				<div class="col-lg-6">
				
					<div class="form-group"></div>
					
					<div class="form-group">
                       <label for="">No. Formulir</label>
                        <input type="text" class="form-control" value="<?php echo $no_formulir; ?>" id="" name="no_formulir" readonly>                        
                    </div>
					
					<div class="form-group">
                      <label for="">Supplier</label>
                        <input type="text" class="form-control" value="<?php echo $supplier; ?>" id="" name="supplier" readonly>                        
                    </div>
					
					<div class="form-group">
                       <!-- <label for="">Alamat</label> -->
                        <input type="hidden" class="form-control" value="<?php echo $alamat; ?>" id="" name="alamat" readonly>                        
                    </div>
					
					<div class="form-group">
                      <!--  <label for="">No. Telp</label> -->
                        <input type="hidden" class="form-control" value="<?php echo $no_telp; ?>" id="" name="no_telp" readonly>                        
                    </div>
					
					<div class="form-group">
                      <!--  <label for="">FAX</label> -->
                        <input type="hidden" class="form-control" value="<?php echo $fax; ?>" id="" name="fax" readonly>                        
                    </div>
					
					<div class="form-group">
                      <!--  <label for="">Email</label> -->
                        <input type="hidden" class="form-control" value="<?php echo $email; ?>" id="" name="email" readonly>                        
                    </div>
					
					<div class="form-group">
                       <!--  <label for="">Nama Contact Person</label> -->
                        <input type="hidden" class="form-control" value="<?php echo $cp; ?>" id="" name="cp" required readonly>                        
                    </div>

					<div class="form-group">
                      <!--  <label for="">No.Hp Contact Person</label> -->
                        <input type="hidden" class="form-control" value="<?php echo $no_hp; ?>" id="" name="no_hp" readonly>                        
                    </div>
					
					<div class="form-group">
                       <label for="">RSIA / RS yang meminta :</label>
                        <input type="text" class="form-control" value="<?php echo $koders; ?>" id="" name="koders" readonly>                        
                    </div>
					
					<div class="form-group">
                      <!--  <label for="">Catatan Surat</label> -->
						<input type="hidden" class="form-control" value="<?php echo $catatan; ?>" id="" name="catatan" readonly>                       
                    </div>
					
					<div class="form-group">
					<!--   <label for="">PEMOHON</label> -->
					<input type="hidden" class="form-control" value="<?php echo $mengajukan; ?>" id="" name="mengajukan" placeholder="" readonly>
                    </div>

                     <div class="form-group">
                     <!--  <label type="hidden" for="">TTD Pemohon</label> -->
					<input type="hidden" class="form-control" value="<?php echo $ttd_mengajukan; ?>" id="" name="ttd_mengajukan" placeholder="" readonly>
                    </div>
					
					<div class="form-group">
					<label for="">MENGETAHUI</label>
					<input type="text" class="form-control" value="<?php echo $mengetahui; ?>" id="" name="mengetahui" placeholder="" readonly>
                    </div>

                     <div class="form-group">
                     <!--  <label type="hidden" for="">TTD MENGETAHUI</label> -->
					<input type="hidden" class="form-control" value="<?php echo $ttd_mengetahui; ?>" id="" name="ttd_mengetahui" placeholder="" required>
                    </div>
					
					<div class="form-group">
                       <label for="">Catatan Manager / Kepala Departemen</label>
					   <input type="text" class="form-control" value="<?php echo $catatan_direk; ?>" id="" name="catatan_direk" placeholder="" readonly>                  
                    </div>
					
					
					 <div class="form-group">
                      <label for="">MENYETUJUI</label>
                          <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" id="" name="menyetujui" readonly>
                    </div>
					
					<div class="form-group">
                      <label type="hidden" for="">TTD Menyetujui</label>
                        <select name="ttd_menyetujui" class="form-control">
                          <!-- <option>--TTD Menyetujui--</option> -->
                            <?php foreach($idmenyetujui as $data) {
                          if(!in_array($data['foto'],$for_ttdmenyetujui)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>
					
					<div class="form-group">
						<label type="hidden" for="">Approve Direktur</label>
	                    <select name="mengetahuidirekturcheck" id="mengetahuidirekturcheck" class="form-control">
							<option>--Pilih Status--</option>
							<option <?php if( $mengetahuidirekturcheck=='Approve_dir'){echo "selected"; } ?> value='Approve_dir'>Disetujui Direktur</option>
							<option <?php if( $mengetahuidirekturcheck=='Not_Approved_dir'){echo "selected"; } ?> value='Not_Approved_dir'>Ditolak Direktur</option>
							<option <?php if( $mengetahuidirekturcheck=='Revisi_dir'){echo "selected"; } ?> value='Revisi_dir'>Revisi Direktur</option>
							<option <?php if( $mengetahuidirekturcheck=='Draf'){echo "selected"; } ?> value='Draf'>Menunggu</option>
	                    </select><option>
	                </div>
					
					<div class="form-group">
                       <label for="">Catatan Direktur</label>
					    <textarea  rows="4" class="form-control" name="catatan_menyetujui" placeholder="Catatan..."><?php echo $catatan_menyetujui;?></textarea>                        
                    </div>
                    
				</div>
<?php endif;?>
<!-- end untuk Menyutujui (Direktur Utama) -->
				
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
