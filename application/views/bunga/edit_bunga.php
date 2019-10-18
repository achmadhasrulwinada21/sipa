
      <section class="content-header">
        <h1>
          <b>EDIT DATA</b>
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
                <h3 class="box-title">FORM EDIT</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>Bunga/updatebunga" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                    <?php
             $uul=($this->session->userdata('koderole'));  
           if($uul!='10' AND $uul!='28' AND $uul!='29' AND $uul!='15' AND $uul!='17'):?>

					<div class="form-group">
            <input type="hidden" class="form-control" value="<?php echo $id_sbunga; ?>" id="" name="id_sbunga"> 
					</div>
					     <div class="form-group">
                      <label for="">No Surat</label>
                        <input type="text" class="form-control" value="<?php echo $no_surat; ?>" id="" name="no_surat" readonly>                        
                    </div>
					
                   <div class="form-group">
                      <label for="">Nama Rumah Sakit</label>
                        <input type="text" class="form-control" value="<?php echo $namars; ?>" id="" name="namars" readonly>                        
                    </div>


                    <div class="form-group">
                      <label for="">Perihal</label>
                        <input type="text" class="form-control" value="<?php echo $perihal; ?>" id="" name="perihal">                        
                    </div>
                    <div class="form-group">
                      <label for="">Lampiran</label>
                        <input type="text" class="form-control" value="<?php echo $lampiran; ?>" id="" name="lampiran">                        
                    </div>

                     <div class="form-group">
                    <label for="">Attachment</label>
                      <input type="hidden" name="foto" value="<?php echo $foto; ?>">
                        <input type="file" class="form-control" value="<?php echo $foto; ?>" id="" name="file_uploadttd" placeholder="">
                        <div style="color:blue;font-weight:bold;"><?php echo $foto; ?></div>
                        <embed src="<?php echo base_url(); ?>assets/upload/<?php echo $foto; ?>" style="width:150px;height:150px;"/> 
                             
                    </div>

                    <div class="form-group">
                      <label for="">Tanggal</label>
                        <input type="date" class="form-control" value="<?php echo $tanggal; ?>" id="" name="tanggal" required>                        
                    </div>
                    
                         <div class="form-group">
                      <label for="">Tujuan</label>
                        <input type="text" class="form-control" value="<?php echo $tujuan; ?>" id="" name="tujuan">                        
                    </div>

                    <div class="form-group">
                      <label for="">Bank</label>
                       <select name="banku" class="form-control">
                          <option value="-">--Bank--</option>
                            <?php foreach($banku as $data) {
                          if(!in_array($data['nama_bank'],$for_bankum)){ ?>
                              <option  value="<?php echo $data['nama_bank'] ?>"><?php echo $data['nama_bank'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['nama_bank'] ?>"><?php echo  $data['nama_bank'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                    <div class="form-group">
                      <label for="">Pemberi Pinjaman</label>
                       <select name="bank" class="form-control">
                          <option value="-">--Pemberi Pinjaman--</option>
                            <?php foreach($bank as $data) {
                          if(!in_array($data['pemberi_pinjaman'],$for_pinjamm)){ ?>
                              <option  value="<?php echo $data['pemberi_pinjaman'] ?>"><?php echo $data['pemberi_pinjaman'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['pemberi_pinjaman'] ?>"><?php echo  $data['pemberi_pinjaman'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                    <div class="form-group">
                      <label for="">Bunga</label>
                        <input type="text" class="form-control" value="<?php echo $bunga; ?>" id="" name="bunga">                        
                    </div>

                    <div class="form-group">
                      <label for="">Email</label>
                        <input type="text" class="form-control" value="<?php echo $kontak; ?>" id="" name="kontak">                        
                    </div>

                    <!-- <div class="form-group">
                      <label for="">Pinjaman</label>
                        <input type="text" class="form-control" value="<?php echo $pinjaman; ?>" id="" name="pinjaman">                        
                    </div> -->

                     <div class="form-group">
                        <input type="hidden" class="form-control" value="Draf" id="" name="mengetahuidirekturcheck">                        
                    </div>

                     <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $catatan_kadep; ?>" id="" name="catatan_kadep">                        
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $catatan_dirut; ?>" id="" name="catatan_dirut">                        
                    </div>

                     <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $catatan; ?>" id="" name="catatan">                        
                    </div>

                     <?php endif;?>


 <?php
             $uul=($this->session->userdata('koderole'));  
           if($uul=='10' OR $uul=='28' OR $uul=='29' OR $uul=='15' OR $uul=='17'):?>

          <div class="form-group">
            <input type="hidden" class="form-control" value="<?php echo $id_sbunga; ?>" id="" name="id_sbunga"> 
          </div>
               <div class="form-group">
                      <label for="">No Surat</label>
                        <input type="text" class="form-control" value="<?php echo $no_surat; ?>" id="" name="no_surat" readonly>                        
                    </div>
          
                   <div class="form-group">
                      <label for="">Nama Rumah Sakit</label>
                        <input type="text" class="form-control" value="<?php echo $namars; ?>" id="" name="namars" readonly>                        
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
                      <input type="hidden" name="foto" value="<?php echo $foto; ?>">
                        <input type="file" class="form-control" value="<?php echo $foto; ?>" id="" name="file_uploadttd" placeholder="">
                        <div style="color:blue;font-weight:bold;"><?php echo $foto; ?></div>
                        <embed src="<?php echo base_url(); ?>assets/upload/<?php echo $foto; ?>" style="width:150px;height:150px;"/> 
                             
                    </div>

                    <div class="form-group">
                      <label for="">Tanggal</label>
                        <input type="date" class="form-control" value="<?php echo $tanggal; ?>" id="" name="tanggal" required readonly>                        
                    </div>
                    
                         <div class="form-group">
                      <label for="">Tujuan</label>
                        <input type="text" class="form-control" value="<?php echo $tujuan; ?>" id="" name="tujuan" readonly>                        
                    </div>

                    <div class="form-group">
                      <label for="">Bank</label>
                       <select name="banku" class="form-control" readonly>
                          <option value="-">--Bank--</option>
                            <?php foreach($banku as $data) {
                          if(!in_array($data['nama_bank'],$for_bankum)){ ?>
                              <option  value="<?php echo $data['nama_bank'] ?>"><?php echo $data['nama_bank'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['nama_bank'] ?>"><?php echo  $data['nama_bank'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                    <div class="form-group">
                      <label for="">Pemberi Pinjaman</label>
                       <select name="bank" class="form-control" readonly>
                          <option value="-">--Pemberi Pinjaman--</option>
                            <?php foreach($bank as $data) {
                          if(!in_array($data['pemberi_pinjaman'],$for_pinjamm)){ ?>
                              <option  value="<?php echo $data['pemberi_pinjaman'] ?>"><?php echo $data['pemberi_pinjaman'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['pemberi_pinjaman'] ?>"><?php echo  $data['pemberi_pinjaman'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                    <div class="form-group">
                      <label for="">Bunga</label>
                        <input type="text" class="form-control" value="<?php echo $bunga; ?>" id="" name="bunga" readonly>                        
                    </div>

                    <div class="form-group">
                      <label for="">Email</label>
                        <input type="text" class="form-control" value="<?php echo $kontak; ?>" id="" name="kontak" readonly>                        
                    </div>

                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $pinjaman; ?>" id="" name="pinjaman" readonly>                        
                    </div>

                     <div class="form-group">
                        <input type="hidden" class="form-control" value="Draf" id="" name="mengetahuidirekturcheck">                        
                    </div>

                     <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $catatan_kadep; ?>" id="" name="catatan_kadep">                        
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $catatan_dirut; ?>" id="" name="catatan_dirut">                        
                    </div>

                     <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $catatan; ?>" id="" name="catatan">                        
                    </div>

                     <?php endif;?>




            <?php if($this->session->userdata('koderole')=='15'):?>
            
                    <div class="form-group">
            <label type="hidden" for="">Approve Kadep</label>
                      <select name="mengetahuidirekturcheck" id="mengetahuidirekturcheck" class="form-control">
              <option value="Draf">--Pilih Status--</option>
              <option <?php if( $mengetahuidirekturcheck=='Approve_kadep'){echo "selected"; } ?> value='Approve_kadep'>Disetujui Kadep</option>
              <option <?php if( $mengetahuidirekturcheck=='Not_Approved_kadep'){echo "selected"; } ?> value='Not_Approved_kadep'>Ditolak Kadep</option>
              <option <?php if( $mengetahuidirekturcheck=='Revisi_kadep'){echo "selected"; } ?> value='Revisi_kadep'>Revisi Kadep</option>
              <option <?php if( $mengetahuidirekturcheck=='Draf'){echo "selected"; } ?> value='Draf'>Draf</option>
                      </select><option>
                  </div>
             <div class="form-group">
                      <label for="">Catatan Kadep</label>
                        <textarea type="text" cols="8" rows="8" class="form-control" id="" name="catatan_kadep"><?php echo $catatan_kadep; ?></textarea>                      
                    </div>

                     <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $catatan_dirut; ?>" id="" name="catatan_dirut">                        
                    </div>

                     <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $catatan; ?>" id="" name="catatan">                        
                    </div>



            <?php endif;?>

					<?php
             $uul=($this->session->userdata('koderole'));  
           if($uul=='10' OR $uul=='28' OR $uul=='29'):?>
            
                    <div class="form-group">
						<label type="hidden" for="">Approve Direktur</label>
	                    <select name="mengetahuidirekturcheck" id="mengetahuidirekturcheck" class="form-control">
							<option value="Draf">--Pilih Status--</option>
							<option <?php if( $mengetahuidirekturcheck=='Approve'){echo "selected"; } ?> value='Approve'>Disetujui</option>
							<option <?php if( $mengetahuidirekturcheck=='Not Approved'){echo "selected"; } ?> value='Not Approved'>Ditolak</option>
							<option <?php if( $mengetahuidirekturcheck=='Revisi'){echo "selected"; } ?> value='Revisi'>Revisi</option>
							<option <?php if( $mengetahuidirekturcheck=='Draf'){echo "selected"; } ?> value='Draf'>Draf</option>
	                    </select><option>
	                </div>

                  <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $this->session->userdata('nama_role'); ?>" id="" name="role">                        
                    </div>
					<div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" id="" name="mengetahui">                        
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control" value="Direktur Utama" id="" name="tembusan1">                        
                    </div>
          <div class="form-group">
                        <input type="hidden" class="form-control" value="Kadep Keuangan" id="" name="tembusan2">                        
                    </div>

					<div class="form-group">
               <label type="hidden" for="">TTD Mengetahui</label>
                        <select name="ttd_mengetahui" class="form-control">
                          <option>--TTD Mengetahui--</option>
                            <?php foreach($idmengetahui as $data) {
                          if(!in_array($data['foto'],$for_ttdmeng)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>
                                  
          <!-- <div class="form-group">
                      <b style="color:blue;">*NOTE : JIKA PINJAMAN DIATAS 1 MILIAR RUPIAH</b><br>
                      <label type="hidden" for="">PARAF</label>
                        <select name="paraf" class="form-control">
                          <option>--paraf--</option>
                            <?php foreach($idparaf as $data) {
                          if(!in_array($data['foto'],$for_paraf)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div> -->
					
					<div class="form-group">
                      <label for="">Catatan Direktur</label>
                        <textarea type="text" cols="8" rows="8" class="form-control" id="" name="catatan"><?php echo $catatan; ?></textarea>                      
                    </div>

                     <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $catatan_dirut; ?>" id="" name="catatan_dirut">                        
                    </div>

                     <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $catatan_kadep; ?>" id="" name="catatan_kadep">                        
                    </div>
					<?php endif;?>

          <?php if($this->session->userdata('koderole')=='17'):?>
            
                    <div class="form-group">
            <label type="hidden" for="">Approve Direktur Utama</label>
                      <select name="mengetahuidirekturcheck" id="mengetahuidirekturcheck" class="form-control">
              <option value="Draf">--Pilih Status--</option>
              <option <?php if( $mengetahuidirekturcheck=='Approve_dirut'){echo "selected"; } ?> value='Approve_dirut'>Disetujui Dirut</option>
              <option <?php if( $mengetahuidirekturcheck=='Not_Approved_dirut'){echo "selected"; } ?> value='Not_Approved_dirut'>Ditolak Dirut</option>
              <option <?php if( $mengetahuidirekturcheck=='Revisi_dirut'){echo "selected"; } ?> value='Revisi_dirut'>Revisi Dirut</option>
              <option <?php if( $mengetahuidirekturcheck=='Draf'){echo "selected"; } ?> value='Draf'>Draf</option>
                      </select><option>
                  </div>

          <div class="form-group">
                      <label type="hidden" for="">TTD Mengetahui</label>
                        <select name="ttd_mengetahui" class="form-control">
                          <option>--TTD Mengetahui--</option>
                            <?php foreach($idmengetahui as $data) {
                          if(!in_array($data['foto'],$for_ttdmeng)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                    <div class="form-group">
                      <label for="">Catatan Dirut</label>
                        <textarea type="text" cols="8" rows="8" class="form-control" id="" name="catatan_dirut"><?php echo $catatan_dirut; ?></textarea>                      
                    </div>

                     <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $catatan_kadep; ?>" id="" name="catatan_kadep">                        
                    </div>

                     <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $catatan; ?>" id="" name="catatan">                        
                    </div>

                     <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $this->session->userdata('nama_role'); ?>" id="" name="role">                        
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $paraf; ?>" id="" name="paraf">                        
                    </div>

                     <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" id="" name="mengetahui">                        
                    </div>

                     <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $role; ?>" id="" name="tembusan1">                        
                    </div>
          <div class="form-group">
                        <input type="hidden" class="form-control" value="Kadep Keuangan" id="" name="tembusan2">                        
                    </div>


                  <?php endif;?>  
					
                    <div class="form-group">
                      
                        <input type="hidden" class="form-control" value="<?php echo $createby; ?>" id="" name="createby" readonly>                        
                    </div>
                    <!-- <div class="form-group">
                      
                        <input type="hidden" class="form-control" value="<?php echo $nama_user; ?>" id="" name="updateby" readonly>                  
                    </div> -->
                    
                    <div class="form-group">
                       <input type="hidden" class="form-control" value="<?php echo $createdate; ?>" id="" name="createdate">                        
                    </div>
</div>
                  </div>
                  </div><!-- /.item -->
               <!--  <div class="form-group">

                 <?php if($this->session->userdata('koderole')=='15'):?>

            <a href="<?php echo base_url(); ?>email/kirim_email/<?php echo $id_sbunga; ?>" class="btn btn-danger btn-block btn-flat">Konfirmasi Approve</a> 
 
                  <?php endif;?>

                  <?php
                  $uul=($this->session->userdata('koderole'));  
                     if($uul=='10' OR $uul=='28' OR $uul=='29'):?>

             <a href="<?php echo base_url(); ?>email/kirim_emaill/<?php echo $id_sbunga; ?>" class="btn btn-danger btn-block btn-flat" target="blank">Konfirmasi Approve</a>

                  <?php endif;?>

                  <?php if($this->session->userdata('koderole')=='17'):?>

             <a href="<?php echo base_url(); ?>email/kirim_emailll/<?php echo $id_sbunga; ?>" class="btn btn-danger btn-block btn-flat" target="blank">Konfirmasi Approve</a>

                  <?php endif;?> -->
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>Bunga" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
   
   