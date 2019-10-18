     <ul class="nav nav-tabs">
	  <li class=""><a href="<?php echo base_url(); ?>masterperusahaan">Master Perusahaan Obat</a></li>
	  <li class="active"><a href="<?php echo base_url(); ?>masterperusahaan/dataperusahaan_depbang">Master Perusahaan Depbang</a></li>
	  <li class=""><a href="<?php echo base_url(); ?>masterperusahaan/dataperusahaan_alum">Master Perusahaan Alum</a></li>
	  <li class=""><a href="<?php echo base_url(); ?>masterperusahaan/dataperusahaan_alkes">Master Perusahaan Alkes</a></li>
	</ul>
	 
	 
	 
	 
	 <section class="content-header">
    <h1 style="text-align:center;">
       <b> DATA MASTER PERUSAHAAN DEPARTEMEN PEMBANGUNAN </b>
        <small></small>
    </h1>
      
</section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
		  <div id="form_perush">
          <div class="row">
            <div class="col-md-12">
              <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>masterperusahaan/addperusahaan" class="btn btn-default no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH </a>-->
			  <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>excel_import" class="btn btn-default no-radius dropdown-toggle"><i class="fa fa-folder-open"></i>IMPORT_new</a>-->
			  <a style="margin-bottom:3px" href="<?php echo base_url(); ?>ci_to_excel/form" class="btn btn-warning no-radius dropdown-toggle"><i class="fa fa-folder-open"></i> IMPORT DATA FROM EXCEL </a>
			  <a style="margin-bottom:3px" href="<?php echo base_url(); ?>ci_to_excel/export_perush_depbang" class="btn btn-danger no-radius dropdown-toggle"><i class="fa fa-external-link"></i> EXPORT DATA TO EXCEL  </a>
			  <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>rpt_alum/report_alum" class="btn btn-default no-radius dropdown-toggle"><i class="fa fa-print"></i> CETAK EXCEL </a>-->
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
				
					
			<div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>masterperusahaan/savedata_depbang" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">
				  
				  
			<input type="hidden" class="form-control" value="TP004" id="" name="id_tipe_produk" required readonly>
			    <input type="hidden" class="form-control" value="DEPBANG" id="" name="tipe_produk" required readonly>
			   
				
				
			
				  
                    <div class="form-group">
                      <label for="">Kode perusahaan</label>
                        <input type="text" class="form-control" value="" id="" name="koper" placeholder="Isikan Kode Perusahaan" required>
                    </div>
                    <div class="form-group">
                      <label for="">Nama Perusahaan</label>
                        <input type="text" class="form-control" value="" id="" name="nm_perusahaan" placeholder="Isikan Nama Perusahaan" required>                        
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
				   
				   
				   
				   
				  
				   
								   
				    <div class="form-group" >
                      <label for="">Bidang Pekerjaan</label>
                        <select id="kode_jenis" name="kode_jenis" class="form-control tip_prod" required>
                         <option value="-">--Pilih Tipe Pekerjaan--</option>
                          <?php foreach($dd_jenis_pekerjaan as $row) { ?>
                              <option value="<?php echo $row['kode_jenis'] ?>"><?php echo $row['nm_pekerjaan'] ?></option>
                          <?php } ?>
                        </select>    
					</div>
			   
				
			    <input type="hidden" class="form-control" value="" id="" name="bidang_pekerjaan" required readonly>
				   
				     <div class="form-group">
                      <label for="">Isian Checklist :</label>
                                              
                   </div>
				   
				    <div class="col-lg-4">
				     <div class="checkbox">
						<label><input type="checkbox" value="1" name="maincon">Maincon</label>
						</div>
				    </div>
				   
				   <div class="col-lg-4">
				     <div class="checkbox">
						<label><input type="checkbox" value="1" name="subcon">Subcon</label>
						</div>
				    </div>
					
					 <div class="col-lg-4">
				     <div class="checkbox">
						<label><input type="checkbox" value="1" name="konsultan">Konsultan</label>
						</div>
				    </div>
				   
				  
				   
				      <div class="form-group">
                      <label for="">Keterangan</label>
                        <input type="text" class="form-control" value="" id="" name="keterangan" placeholder="Isikan Keterangan">                       
                   </div>
				   
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
            <button onclick="return confirm('Apakah Data Detail Sudah Terisi ?... ');" type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo site_url('masterperusahaan')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
	   
                  <div class="box-body">
                  <div class="box-body table-responsive">
              <table id="tb-datatables" class="table table-bordered table-hover">

                  <thead bgcolor="#4682B4" style="font-family: arial; color: white;" >
                    <tr>
                      <th style="text-align:center;">NO</th>
                      <th style="text-align:center;">KODE</th>
                      <th style="text-align:center;">NAMA PERUSAHAAN</th>
					  <th style="text-align:center;">TIPE</th>
                      <th style="text-align:center;">AKSI</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_perusahaan as $row)
                     { $no++ ?>
                    <tr>
                      <td style="text-align:center;"><?php echo $no; ?></td>
                      <td style="text-align:center;"><?php echo $row['koper']; ?></td>
                      <td><?php echo $row['nm_perusahaan']; ?></td>
					   <td style="text-align:center;"><?php echo $row['tipe_produk']; ?></td>
                      <td style="text-align:center;">
					  <a href="<?php echo base_url(); ?>masterperusahaan/editmasterperusahaan_depbang/<?php echo $row['id_perusahaan']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                      <!--<a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $row['id_perusahaan']; ?>"><i class="fa fa-edit"></i></a>-->
                      <a onclick="return confirm('Anda Yakin Hapus Data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>masterperusahaan/hapus_perusahaan_depbang/<?php echo $row['koper']; ?>"><i class="fa fa-close"></i></a>

                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.chat -->
        </div>
		</div>
		</div>
       </section>
	   </div>
	   
	   
	   
	   <?php
      foreach($data_perusahaan as $i){
      $id_koper= $i['id_perusahaan'];
	  $koper= $i['koper'];
      $nm_perusahaan = $i['nm_perusahaan'];


              
         ?>

	<div id="modal_edit<?php echo $id_koper;?>" class="modal fade">
		<div class="modal-dialog modal-md">
			<div class="modal-content"> 
				<div class="panel panel-danger">
					<div class="panel-heading">
						<button type="button" class="close" tabindex="-1" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">EDIT</h4></td>
			</div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>masterperusahaan/update_perusahaan" method="POST" enctype="multipart/form-data">
                 
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $id_koper; ?>" id="" name="id_detail" readonly>
                    </div>

					<div class="form-group">
                      <label for="">Kode Perusahaan</label>
                        <input type="text" class="form-control" value="<?php echo $koper; ?>" id="" name="uraian" required >
                    </div>
					
					
                    <div class="form-group">
                      <label for="">Nama Perusahaan</label>
                        <input type="text" class="form-control" value="<?php echo $nm_perusahaan; ?>" id="" name="uraian" required >
                    </div>
					
					<div class="form-group" >
							  <label for="">Tipe Perusahaan</label>
								<select id="id_tipe_produk_modal" name="id_tipe_produk_m" class="form-control" required>
								 <option value="-">--Pilih Tipe Perusahaan--</option>
								  <?php foreach($dd_tipe as $row) { ?>
									  <option value="<?php echo $row['id_tipe_produk'] ?>"><?php echo $row['tipe_produk'] ?></option>
								  <?php } ?>
								</select>    
							</div>
			   
				
				<input type="text" class="form-control" value="" id="" name="tipe_produk_modal" required readonly>

                	<br></br>
                    
                             <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat">Simpan</button>
                 
                </div>                
                   
                </div>
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>

	   
	   
	   
	   
