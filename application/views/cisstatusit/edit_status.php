      <section class="content-header">
        <h1>
          <b>EDIT STATUS </b>
		  <br>CIS DEP TI RSH BARU TIPE C
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
                <h3 class="box-title">
				EDIT STATUS</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>cis_it_status/update" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
					<div class="form-group">
                     <!-- <label for="">ID</label> -->
                        <input type="hidden" class="form-control" value="<?php echo $id_status; ?>" id="" name="id_status" readonly>
                    </div>
					
					<?php 
						$koderole=($this->session->userdata('koderole'));
						if($koderole=='1' OR $koderole=='5'):
					?>
					
					<div class="form-group">
                      <label for="">Departemen</label>
                       <select name="kode_role" class="form-control" required>
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
					if($koderole!='1' && $koderole!='5' && $koderole!='15' && $koderole!='10' && $koderole!='4' && $koderole!='14' && $koderole!='25' && $koderole!='27' && $koderole!='35' && $koderole!='26'):
					?> 
					
					<div class="form-group">
                      <label for="">Departemen</label>
						<input type="text" class="form-control" value="<?php echo $this->session->userdata('nama_role'); ?>" id="" name="kode_role" readonly>
                    </div>
					<?php endif;?>
					
					<?php 
					$koderole=($this->session->userdata('koderole'));
					if($koderole=='4'):
					?> 
					
					<div class="form-group">
                      <label for="">Departemen</label>
						<input type="text" class="form-control" value="<?php echo $this->session->userdata('nama_role'); ?>" id="" name="kode_role" readonly>
                    </div>
					<?php endif;?>
					
					<?php 
						$koderole=($this->session->userdata('koderole'));
						if($koderole=='1' OR $koderole=='5' OR $koderole=='4'):
					?>
					<div class="form-group">
                      <label type="hidden" for="">CIS</label>
                        <select name="nama_cis" class="form-control">
                          <option>--PILIH CIS--</option>
                          <option <?php if( $nama_cis=='induk'){echo "selected"; } ?> value='induk'>1. CIS INDUK</option>
							<option <?php if( $nama_cis=='man'){echo "selected"; } ?> value='man'>2. CIS MAN</option>
							<option <?php if( $nama_cis=='methode'){echo "selected"; } ?> value='methode'>3. CIS METHODE</option>
							<option <?php if( $nama_cis=='material'){echo "selected"; } ?> value='material'>4. MATERIAL</option> 
							<option <?php if( $nama_cis=='machine'){echo "selected"; } ?> value='machine'>5. MACHINE</option> 
							<option <?php if( $nama_cis=='money'){echo "selected"; } ?> value='money'>6. MONEY</option> 
                        </select> 
                    </div>
					
					<div class="form-group">
						<!-- <label type="hidden" for="">Mengetahui</label> agar tidak nol -->
						<input type="hidden" class="form-control" value="-" id="" name="mengetahui">
                    </div>
					
					<div class="form-group">
						<!-- <label type="hidden" for="">Menyetujui</label> agar tidak nol -->
						<input type="hidden" class="form-control" value="-" id="" name="menyetujui">
                    </div>
					<?php endif;?>
			
			
					<!-- untuk Mengetahui (Manager / KA.DEPT)  -->
					<?php 
					$koderole=($this->session->userdata('koderole'));
					if($koderole=='14' OR $koderole=='25' OR $koderole=='27' OR $koderole=='35' OR $koderole=='15' OR $koderole=='26'):
					?> 
					
					<div class="form-group">
						<label type="text" for="">Departemen</label>
						<input type="text" class="form-control" value="<?php echo $kode_role; ?>" id="" name="kode_role" readonly>
                    </div>
					
					<div class="form-group">
						<label type="text" for="">CIS</label>
						 <select name="nama_cis" class="form-control" readonly>
                          <option>--PILIH CIS--</option>
                          <option <?php if( $nama_cis=='induk'){echo "selected"; } ?> value='induk'>1. CIS INDUK</option>
							<option <?php if( $nama_cis=='man'){echo "selected"; } ?> value='man'>2. CIS MAN</option>
							<option <?php if( $nama_cis=='methode'){echo "selected"; } ?> value='methode'>3. CIS METHODE</option>
							<option <?php if( $nama_cis=='material'){echo "selected"; } ?> value='material'>4. MATERIAL</option> 
							<option <?php if( $nama_cis=='machine'){echo "selected"; } ?> value='machine'>5. MACHINE</option> 
							<option <?php if( $nama_cis=='money'){echo "selected"; } ?> value='money'>6. MONEY</option> 
                        </select> 
                    </div>
					
					<div class="form-group">
					<label for="">MENGETAHUI</label>
					<input type="text" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" id="" name="mengetahui" readonly>
                    </div>

                    <div class="form-group">
                      <label type="hidden" for="">TTD MENGETAHUI</label>
                        <select name="ttd_mengetahui" class="form-control">
                            <?php foreach($idmengetahui as $data) {
                          if(!in_array($data['foto'],$for_ttdmengetahui)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>
					
					<div class="form-group">
					<label type="hidden" for="">Approve Kepala Departemen</label>
                      <select name="status" id="status" class="form-control">
						<option value="Draf">--Pilih Status--</option>
						<option <?php if( $status=='Approve_mk'){echo "selected"; } ?> value='Approve_mk'>Disetujui Kepala Departemen</option>
						<option <?php if( $status=='Not_Approved_mk'){echo "selected"; } ?> value='Not_Approved_mk'>Ditolak Kepala Departemen</option>
						<option <?php if( $status=='Revisi_mk'){echo "selected"; } ?> value='Revisi_mk'>Revisi Kepala Departemen</option>
						<option <?php if( $status=='Draf'){echo "selected"; } ?> value='Draf'>Menunggu</option>
                      </select><option>
                  </div>
					
					<div class="form-group">
						<!-- <label type="hidden" for="">Menyetujui</label> agar tidak nol -->
						<input type="hidden" class="form-control" value="-" id="" name="menyetujui">
                    </div>
					
					<div class="form-group">
					<label type="text" for="">Tanggal Approve</label>
					<input type="text" class="form-control" value="<?php echo date("d-m-Y"); ?>" id="" name="tanggal" placeholder="" readonly>
                    </div>
					
					<?php endif;?>
					<!-- end untuk Mengetahui  -->
					

					<!-- untuk Menyutujui (Direktur Utama) -->
					<?php 
					$koderole=($this->session->userdata('koderole'));
					if($koderole=='17' OR $koderole=='28' OR $koderole=='29' OR $koderole=='10'):
					?>
					
					<div class="form-group">
						<label type="text" for="">Departemen</label>
						<input type="text" class="form-control" value="<?php echo $kode_role; ?>" id="" name="kode_role" readonly>
                    </div>
					
					<div class="form-group">
						<label type="text" for="">CIS</label>
						 <select name="nama_cis" class="form-control" readonly>
                          <option>--PILIH CIS--</option>
                          <option <?php if( $nama_cis=='induk'){echo "selected"; } ?> value='induk'>1. CIS INDUK</option>
							<option <?php if( $nama_cis=='man'){echo "selected"; } ?> value='man'>2. CIS MAN</option>
							<option <?php if( $nama_cis=='methode'){echo "selected"; } ?> value='methode'>3. CIS METHODE</option>
							<option <?php if( $nama_cis=='material'){echo "selected"; } ?> value='material'>4. MATERIAL</option> 
							<option <?php if( $nama_cis=='machine'){echo "selected"; } ?> value='machine'>5. MACHINE</option> 
							<option <?php if( $nama_cis=='money'){echo "selected"; } ?> value='money'>6. MONEY</option> 
                        </select> 
                    </div>
					
					<div class="form-group">
					<label for="">MENGETAHUI</label>
					<input type="text" class="form-control" value="<?php echo $mengetahui; ?>" id="" name="mengetahui" placeholder="" readonly>
                    </div>
					
					<div class="form-group">
                     <!-- <label type="hidden" for="">TTD MENGETAHUI</label>-->
					<input type="hidden" class="form-control" value="<?php echo $ttd_mengetahui; ?>" id="" name="ttd_mengetahui" placeholder="" required>
                    </div>
					
					<div class="form-group">
                     <!-- <label type="hidden" for="">Tanggal</label>-->
					<input type="hidden" class="form-control" value="<?php echo $tanggal; ?>" id="" name="tanggal" placeholder="" required>
                    </div>

					<div class="form-group">
						<label type="hidden" for="">Status Approve Direktur</label>
	                    <select name="status" id="status" class="form-control">
							<option>--Pilih Status--</option>
							<option <?php if( $status=='Approve_dir'){echo "selected"; } ?> value='Approve_dir'>Disetujui Direktur</option>
							<option <?php if( $status=='Not_Approved_dir'){echo "selected"; } ?> value='Not_Approved_dir'>Ditolak Direktur</option>
							<option <?php if( $status=='Revisi_dir'){echo "selected"; } ?> value='Revisi_dir'>Revisi Direktur</option>
							<option <?php if( $status=='Draf'){echo "selected"; } ?> value='Draf'>Menunggu</option>
	                    </select><option>
	                </div>
					
					<div class="form-group">
                      <label for="">MENYETUJUI</label>
                          <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" id="" name="menyetujui" readonly>
                    </div>
					
					<div class="form-group">
                      <label type="hidden" for="">TTD MENYETUJUI</label>
                        <select name="ttd_menyetujui" class="form-control">
                            <?php foreach($idmenyetujui as $data) {
                          if(!in_array($data['foto'],$for_ttdmenyetujui)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>
					<?php endif;?>
					<!-- end Menyutujui (Direktur Utama) -->
					
					
					</div>

                  </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>cis_it_status" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
        </div><!-- /.row (main row) -->
      </section><!-- /.content -->