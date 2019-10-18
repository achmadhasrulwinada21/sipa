     <section class="content-header">
    <h1 style="text-align:center;">
        Edit Data Master Perusahaan Departemen Pembangunan
        <small></small>
    </h1>
      
</section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
		  <div id="edit_form_perush">
          <div class="row">
            <div class="col-md-12">
              <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>masterperusahaan/addperusahaan" class="btn btn-default no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH </a>-->
			  <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>excel_import" class="btn btn-default no-radius dropdown-toggle"><i class="fa fa-folder-open"></i>IMPORT_new</a>-->
			 <!-- <a style="margin-bottom:3px" href="<?php echo base_url(); ?>ci_to_excel/form" class="btn btn-default no-radius dropdown-toggle"><i class="fa fa-folder-open"></i>IMPORT</a>
			  <a style="margin-bottom:3px" href="<?php echo base_url(); ?>ci_to_excel/export_perush" class="btn btn-default no-radius dropdown-toggle"><i class="fa fa-external-link"></i> EXPORT </a>
			  <a style="margin-bottom:3px" href="<?php echo base_url(); ?>rpt_alum/report_alum" class="btn btn-default no-radius dropdown-toggle"><i class="fa fa-print"></i> CETAK EXCEL </a>-->
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
				
					
			<div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form  method="POST" action="<?php echo base_url(); ?>masterperusahaan/updatedepbang"  enctype="multipart/form-data">
                  <div class="col-lg-12">
				  
				  
				    <div hidden class="form-group">
                      <label for="">ID Distributor</label>
                        <input readonly type="text" class="form-control" value="<?php echo $id_perusahaan; ?>" id="" name="id_perusahaan" placeholder="Isikan Kode Perusahaan" readonly>
                    </div> 
				  
				  
				<div hidden  class="form-group">
                      <label type="text" for="">Tipe Perusahaan</label>
                        <select id="id_tipe_produk" name="id_tipe_produk" class="form-control tip_prod">
                          <option>--Pilih Tipe--</option>
                            <?php foreach($dd_tipe as $datakd) {
								if(!in_array($datakd['id_tipe_produk'],$dd_tipe_post)){ ?>
									<option value="<?php echo $datakd['id_tipe_produk'] ?>"><?php echo $datakd['tipe_produk'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datakd['id_tipe_produk'] ?>"><?php echo $datakd['tipe_produk'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>
			   
				
			    <input type="hidden" class="form-control" value="<?php echo $tipe_produk; ?>" id="" name="tipe_produk" required readonly>
				
			
				  
                    <div class="form-group">
                      <label for="">Kode perusahaan</label>
                        <input type="text" class="form-control" value="<?php echo $koper; ?>" id="" name="koper" placeholder="Isikan Kode Perusahaan" readonly>
                    </div>
                    <div class="form-group">
                      <label for="">Nama Perusahaan</label>
                        <input type="text" class="form-control" value="<?php echo $nm_perusahaan; ?>" id="" name="nm_perusahaan" placeholder="Isikan Nama Perusahaan" required>                        
                    </div>
		
					
			
			
		
                 <div id="obat" hidden class="col-lg-12"> 

			    <div class="form-group">
                      <label for="">Isian Checklist :</label>
                                              
                   </div>

			    <div class="form-group">
                      <label for="">FOI</label>
                        <input type="checkbox"  value="1" id="foi" name="foi" >                        
                   </div>

           
				   <div  class="form-group">
                      <label for="">MOU</label>
                        <input type="checkbox"  value="1" id="" name="mou">                        
                   </div>
	
                 
				     <div  class="form-group">
                      <label for="">Pks Renewal</label>
                        <input type="text" class="form-control" value="" id="" name="pks" placeholder="Isikan Pks Renewal">                        
                   </div>
				
				   
				   </div>
				   
				   
				   
				   
				 
				   <!--
				   <div class="form-group">
                      <label type="text" for="">Bidang Pekerjaan</label>
                        <select id="kode_jenis" name="kode_jenis" class="form-control tip_prod">
                          <option>--Pilih Bidang Pekerjaan--</option>
                            <?php foreach($dd_jenis_pekerjaan as $datakerja) {
								if(!in_array($datakerja['kode_jenis'],$dd_kerja_post)){ ?>
									<option value="<?php echo $datakerja['kode_jenis'] ?>"><?php echo $datakerja['nm_pekerjaan'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datakerja['kode_jenis'] ?>"><?php echo $datakerja['nm_pekerjaan'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>
			   
				
			    <input type="hidden" class="form-control" value="<?php echo $bidang_pekerjaan; ?>" id="" name="bidang_pekerjaan" required readonly>
				-->
				   
				   
				   
				   <!--
				     <div class="form-group">
                      <label for="">Isian Checklist :</label>
                                              
                   </div>
				   
				    <div class="col-lg-4">
				     <div class="checkbox">
						<label><input type="checkbox" value='1' name="maincon" <?php echo $c1=$maincon; if($c1=='1') echo " checked "?>>Maincon</label>
						</div>
				    </div>
				   
				   <div class="col-lg-4">
				     <div class="checkbox">
						<label><input type="checkbox" value='1' name="subcon" <?php echo $c1=$subcon; if($c1=='1') echo " checked "?>>Subcon</label>
						</div>
				    </div>
					
					 <div class="col-lg-4">
				     <div class="checkbox">
						<label><input type="checkbox" value='1' name="konsultan" <?php echo $c1=$konsultan; if($c1=='1') echo " checked "?>>Konsultan</label>
						</div>
				    </div>
				   
				  
				   
				      <div class="form-group">
                      <label for="">Keterangan</label>
                        <input type="text" class="form-control" value="<?php echo $keterangan; ?>" id="" name="keterangan" placeholder="Isikan Keterangan">                       
                   </div>-->
				   
				   	</div>  
				   
				   
				   
				  				   
				   
				 <div id="alkes" hidden class="col-lg-12"> 
			
				  <div class="form-group">
                      <label for="">Isian Checklist :</label>
                                              
                   </div>
				
				 <div class="col-lg-3">   
				     <div class="form-group">
                      <label for="">Principal</label>
                        <input type="checkbox"  value="1" id="" name="principal">                        
                   </div>
				   </div>
				   
				    <div class="col-lg-3">   
				     <div class="form-group">
                      <label for="">Solo agent</label>
                        <input type="checkbox"  value="1" id="" name="solo_agent">                        
                   </div>
				   </div>

				    <div class="col-lg-3">    
				     <div class="form-group">
                      <label for="">Distributor</label>
                        <input type="checkbox"  value="1" id="" name="distributor">                        
                   </div>
				    </div>
				   
				    <div class="col-lg-3"> 
				     <div class="form-group">
                      <label for="">Subdistributor</label>
                        <input type="checkbox"  value="1" id="" name="subdistributor">                        
                   </div>
				    </div>
				 </div>  
				   
				   
                   <!-- <div class="form-group">
                      <label for="">Tanggal</label>
                        <input type="datepicker1" class="form-control" value="" id="datepicker1" name="createdate" placeholder="Isikan Tanggal" required>                        
                    </div>
                  </div>-->
                   
                <!--</div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>masterperusahaan" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div>
               </form>-->

		<div style="text-align:center;" class="form-actions">
            <button  type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
             </form>           
		   <a href="<?php echo site_url('masterperusahaan/dataperusahaan_depbang')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
	   
                  
	   
