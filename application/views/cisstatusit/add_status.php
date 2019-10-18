      <section class="content-header">
        <h1>
          <b>ADD STATUS </b>
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
				ADD STATUS</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>cis_it_status/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
				  
				 	<?php 
						$koderole=($this->session->userdata('koderole'));
						if($koderole=='1' OR $koderole=='5' OR $koderole=='10'):
					?> 
				    <div class="form-group">
                      <label for="">Departemen</label>
                       <select name="kode_role" class="form-control" required>
                          <option>--Pilih Departemen--</option>
                          <?php foreach($optrole as $row)  {  $macamrole=$row['nama_role']; $kodemacamrole=$row['nama_role'];?>
                              <option value="<?php echo $row['nama_role'] ?>"><?php echo $row['nama_role'] ?></option>
                          <?php } ?>
                        </select>  
                    </div>
					<?php endif;?>
					
						  <?php 
							$koderole=($this->session->userdata('koderole'));
							if($koderole!='1' && $koderole!='5' && $koderole!='10' && $koderole!='4'):
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

					<!-- <div class="form-group">
                      <label for="">CIS</label>
                          <select name="nama_cis" id="nama_cis" class="form-control" required>
							<option>--Pilih Status--</option>
							<option <?php// if( $nama_cis=='Approve_dir'){echo "selected"; } ?> value='Approve_dir'>Disetujui Direktur</option>
							<option <?php// if( $nama_cis=='Not_Approved_dir'){echo "selected"; } ?> value='Not_Approved_dir'>Ditolak Direktur</option>
							<option <?php// if( $nama_cis=='Revisi_dir'){echo "selected"; } ?> value='Revisi_dir'>Revisi Direktur</option>
							<option <?php //if( $nama_cis=='Draf'){echo "selected"; } ?> value='Draf'>Menunggu</option>
	                    </select>  
					</div>-->
					
					<div class="form-group">
						<label for="">DOKUMEN CIS</label>
	                    <select name="nama_cis" id="nama_cis" class="form-control">
	                    	<option value=" ">-PILIH DOKUMEN CIS-</option>
	                    	<option value="induk">1. CIS INDUK</option>
	                    	<option value="man">2. CIS MAN</option>
	                    	<option value="methode">3. CIS METHODE</option>
	                    	<option value="material">4. MATERIAL</option>
	                    	<option value="machine">5. MACHINE</option>
	                    	<option value="money">6. MONEY</option>
	                    </select>
	                </div>
					
					<!--<div class="form-group">
						<label for="">STATUS (Approve Direktur)</label>
	                    <select name="status" id="status" class="form-control">
	                    	<option value=" ">-PILIH STATUS-</option>
	                    	<option value="Approve_dir">1. Disetujui Direktur</option>
	                    	<option value="Not_Approved_dir">2. Ditolak Direktur</option>
	                    	<option value="Revisi_dir">3. Revisi Direktur</option>
	                    	<option value="Draf">4. Menunggu</option>
	                    </select>
	                </div>-->
					
					<div class="form-group">
						<!--<label type="hidden" for="">Mengetahui</label>-->
						<input type="hidden" class="form-control" value="-" id="" name="mengetahui">
                    </div>
					
					<div class="form-group">
						<!--<label type="hidden" for="">Menyetujui</label>-->
						<input type="hidden" class="form-control" value="-" id="" name="menyetujui">
                    </div>
					
					<!--<div class="form-group">
						 <label type="hidden" for="">TTD Menyetujui</label>
						<input type="hidden" class="form-control" value="Draf" id="" name="status">
                    </div>-->
					
					
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
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
          </section><!-- right col -->
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->

  