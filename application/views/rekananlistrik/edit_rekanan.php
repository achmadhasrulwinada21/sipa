    <section class="content-header">
    <h1>
        Edit Rekanan Listrik
        <small></small>
    </h1>
    <ol class="breadcrumb">
       
    </ol>
</section>


      <section class="content-header">
        <h1>
          <b>EDIT DATA TRANSAKSI</b>
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
                <h3 class="box-title">FORM EDIT TRANSAKSI</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>rekananlistrik/updatelistrik" method="POST" enctype="multipart/form-data">

                  <div class="col-lg-6">

                  <div class="form-group">
                      <!-- <label for="">ID</label> -->
                        <input type="hidden" class="form-control" value="<?php echo $id_rek_listrik; ?>" id="" name="id_rek_listrik" placeholder="ID" required>                        
                    </div>     
                    
                  <!--<div class="form-group">
                      <label type="hidden" for="">Nama Rumah Sakit</label>
                        <select name="koders" class="form-control" readonly="">
                          <option>--Pilih Nama RS--</option>
                      
                            <?php foreach($kdrs as $datakd) {

                          if(!in_array($datakd['koders'],$kdrs_post)){ ?>
                              <option  value="<?php echo $datakd['koders'] ?>"><?php echo $datakd['namars'] ?></option> 

                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datakd['koders'] ?>"><?php echo $datakd['namars'] ?></option>

                          <?php }} ?>

                        </select> 
                    </div>-->
                    <div class="form-group">
                      <label for="">Nama rumah sakit</label>
                        <input readonly type="text" class="form-control" value="<?php echo $nm_rs ;?>" id="" name="nm_rs" placeholder="" readonly>                       
                    </div>

       <!--             <div class="form-group">
                      <label for="">periode</label>
                        <input type="text" class="form-control" value="" id="datepicker4" name="periode" placeholder="mohon di isi" required>
                    </div>-->

                 <div class="form-group">
                      <label for="">Uraian Kerja</label>
                        <input readonly type="text" class="form-control" value="<?php echo $uraian_kerja ;?>" id="" name="uraian_kerja" placeholder="" readonly>
                    </div>
                  
                    
                      <div class="form-group">
                      <label for="">KM Mandiri</label>
                      <br/>
                    <input type="checkbox"   name="km_mandiri" <?php echo $c1=$km_mandiri; if($c1=='t') echo " checked "?>> Ya </input> 
                    </div>

                   <div class="form-group">
                      <label for="">Trisandira</label>
                      <br/>
                    <input type="checkbox"   name="trisandira" <?php echo $c1=$trisandira; if($c1=='t') echo " checked "?> > Ya </input> 
                    </div>
 
                     <div class="form-group">
                      <label for="">Trisahabat</label>
                      <br/>
                    <input type="checkbox"   name="trisahabat" <?php echo $c1=$trisahabat; if($c1=='t') echo " checked "?> > Ya </input> 
                    </div>

                     <div class="form-group">
                      <label for="">Tribas Reka Buana</label>
                      <br/>
                    <input type="checkbox"   name="tribas_reka_buana" <?php echo $c1=$tribas_reka_buana; if($c1=='t') echo " checked "?> > Ya </input> 
                    </div>

                     <div class="form-group">
                      <label for="">Sekawan Kontrindo</label>
                      <br/>
                    <input type="checkbox"   name="sekawan_kontrindo" <?php echo $c1=$sekawan_kontrindo; if($c1=='t') echo " checked "?> > Ya </input> 
                    </div>

                    <!--<div class="form-group">
                      <label for="">Tanggal</label>
                        <input value="<?php echo $cdate; ?>" type="text" id="datepicker1"   class="form-control"   name="cdate" placeholder="Tanggal" required>                        
                    </div> -->
                    
                  </div>
                                
                
                  <!-- <div class="col-lg-6">
                  <div class="form-group">
                      <label for="">Kode Uraian</label>
                        <select name="kd_uraian" class="form-control"  readonly="">
                          <option>--Pilih Kode Uraian--</option>
                      
                            <?php foreach($uraianrs as $dataurai) {

                          if(!in_array($dataurai['kd_uraian'],$uraianrs_post)){ ?>
                              <option  value="<?php echo $dataurai['kd_uraian'] ?>"><?php echo $dataurai['kd_uraian'] ?></option> 

                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $dataurai['kd_uraian'] ?>"><?php echo $dataurai['kd_uraian'] ?></option>

                          <?php }} ?>
                        </select> 
                    </div>-->

                   <!-- <div class="form-group">
                      <label for="">Nilai Uraian</label>
                        <input type="text" class="form-control" value="<?php echo $nilai_uraian; ?>" id="" name="nilai_uraian" placeholder="Nilai Uraian" required>                        
                    </div>

                       <div class="form-group">
                      <label for="">Warna Sel Cabang</label>
                        <input type="text" class="form-control" value="<?php echo $colorcell; ?>"  name="warnaseltabel" placeholder="Warna Sel Tabel" required>                        
                    </div>
                                        
                    </div>-->
                  </div><!-- /.item -->
				  
			     <?php if($this->session->userdata('koderole')=='10'):?>
				  
				  
				  <div class="form-group">
	                <label for="">TTD Mengetahui</label>
                        <select readonly name="mengetahui" class="form-control">
                          <option>--TTD Mengetahui--</option>
                            <?php foreach($idmengetahuii as $data) {
                          if(!in_array($data['foto'],$for_ttdmeng)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
				  </div>
				  
				  <?php endif;?>
				  
				  
				  
				  
				  
				<?php if($this->session->userdata('koderole')=='10'):?>
                    <div class="form-group">
                      <label for="">STATUS PERSETUJUAN</label>
                   <select name="status" class="form-control"u required>
                          <option>--Pilih Status Persetujuan--</option>
                            <?php foreach($statusdokumen as $datadoc) {

                          if(!in_array($datadoc['kodestatusdoc'],$statusdokumen_post)){ ?>
                              <option  value="<?php echo $datadoc['kodestatusdoc'] ?>"><?php echo $datadoc['nama_statusdoc'] ?></option>

                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datadoc['kodestatusdoc'] ?>"><?php echo $datadoc['nama_statusdoc'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>
				  
				   <?php endif;?>
				  
				  
				  
				   <?php if($this->session->userdata('koderole')=='3'):?>
				  
				  	 <div class="form-group">
                      <label for="">TTD Mengetahui</label>
                        <select name="mengetahui" class="form-control">
                          <option>--TTD Mengetahui--</option>
                            <?php foreach($idmengetahuii as $data) {
                          if(!in_array($data['foto'],$for_ttdmeng)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>  
				  
				  <?php endif;?>
				  
				  
				  <?php if($this->session->userdata('koderole')=='10'):?>
				  
				  
				  	 <div class="form-group">
                      <label type="hidden" for="">TTD Menyetujui</label>
                        <select name="menyetujui" class="form-control">
                          <option>--TTD Menyetujui--</option>
                            <?php foreach($idmengetahui as $data) {
                          if(!in_array($data['foto'],$for_ttdmeny)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>
					
			
				  
				  <?php endif;?>
				  
				</div>
				  
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>rekananlistrik" class="btn btn-warning btn-block btn-flat">Kembali</a>
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
         </div>
      <strong>TeamHermina &copy; 2018 <a href="#"></a></strong>
    </footer>
  </div>
  