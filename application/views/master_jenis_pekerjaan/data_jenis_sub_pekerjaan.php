     <ul class="nav nav-tabs">

	  <li class=""><a href="<?php echo base_url(); ?>master_jenis_pekerjaan/master_jenis_dan_sub_pekerjaan">Master Jenis Pekerjaan</a></li>
	  <li class="active"><a href="<?php echo base_url(); ?>master_jenis_pekerjaan/master_sub_jenis_pekerjaan">Master Sub Jenis Pekerjaan</a></li>
	 
	  
	</ul>
	 
	 
	 
	 
	 <section class="content-header">
    <h1 style="text-align:center;">
       <b> DATA MASTER SUB JENIS PEKERJAAN (DEPBANG)</b>
        <small></small>
    </h1>
      
</section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
		  <div id="form_perush">
          <div class="row">
            <div class="col-md-12">
              <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>master_jenis_pekerjaan/addperusahaan" class="btn btn-default no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH </a>-->
			  <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>excel_import" class="btn btn-default no-radius dropdown-toggle"><i class="fa fa-folder-open"></i>IMPORT_new</a>-->
			  <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>ci_to_excel/form" class="btn btn-warning no-radius dropdown-toggle"><i class="fa fa-folder-open"></i> IMPORT DATA FROM EXCEL </a>
			  <a style="margin-bottom:3px" href="<?php echo base_url(); ?>ci_to_excel/export_perush_depbang" class="btn btn-danger no-radius dropdown-toggle"><i class="fa fa-external-link"></i> EXPORT DATA TO EXCEL  </a>-->
			  <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>rpt_alum/report_alum" class="btn btn-default no-radius dropdown-toggle"><i class="fa fa-print"></i> CETAK EXCEL </a>-->
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
				
					
			<div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>master_jenis_pekerjaan/savemaster_sub_jenis" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">
				  
				  
	
                    <div class="form-group">
                      <label for="">Kode Sub Jenis</label>
                        <input type="text" class="form-control" value="" id="" name="kode_sub_jenis_pekerjaan" placeholder="Isikan Kode Perusahaan" maxlength="8" required>
                    </div>
                    <div class="form-group">
                      <label for="">Nama Sub Pekerjaan</label>
                        <input type="text" class="form-control" value="" id="" name="nm_sub_jenis_pekerjaan" placeholder="Isikan Nama Perusahaan" required>                        
                    </div>
					
					  <div class="form-group" >
                      <label for="">Bidang Pekerjaan</label>
                        <select id="kode_jenis" name="kode_jenis" class="form-control tip_prod" required>
                         <option value="-">--Pilih Bidang Pekerjaan--</option>
                          <?php foreach($dd_jenis_pekerjaan as $row) { ?>
                              <option value="<?php echo $row['kode_jenis'] ?>"><?php echo $row['kode_jenis'] ?> || <?php echo $row['nm_pekerjaan'] ?></option>
                          <?php } ?>
                        </select>    
					</div>
			   
		
		
		<div style="text-align:center;" class="form-actions">
            <button onclick="return confirm('Apakah Data Detail Sudah Terisi ?... ');" type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo site_url('master_jenis_pekerjaan/master_sub_jenis_pekerjaan')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
	   </form>   
                  <div class="box-body">
                  <div class="box-body table-responsive">
              <table id="tb-datatables" class="table table-bordered table-hover">

                  <thead bgcolor="#4682B4" style="font-family: arial; color: white;" >
                    <tr>
                      <th style="text-align:center;">NO</th>
                      <th style="text-align:center;">KODE</th>
                      <th style="text-align:center;">NAMA SUB PEKERJAAN</th>
					  <th style="text-align:center;">KODE PEKERJAAN</th>
                      <th style="text-align:center;">AKSI</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_sub_jenis_pekerjaan as $row)
                     { $no++ ?>
                    <tr>
                      <td style="text-align:center;"><?php echo $no; ?></td>
                      <td style="text-align:center;"><?php echo $row['kode_sub_jenis_pekerjaan']; ?></td>
                      <td><?php echo $row['nm_sub_jenis_pekerjaan']; ?></td>
					  <td><?php echo $row['kode_jenis']; ?></td>
                      <td style="text-align:center;">
					  <!--<a href="<?php echo base_url(); ?>modal_edit<?php echo $id_subkode_jenis;?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>-->
                      <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $row['id_sub_jenis_pekerjaan']; ?>"><i class="fa fa-edit"></i></a>
                      <a onclick="return confirm('Anda Yakin Hapus Data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>master_jenis_pekerjaan/hapus_master_sub_jenis_pekerjaan/<?php echo $row['kode_sub_jenis_pekerjaan']; ?>"><i class="fa fa-close"></i></a>

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
	  
	   
	   
      foreach($data_sub_jenis_pekerjaan as $i){
      $id_subkode_jenis= $i['id_sub_jenis_pekerjaan'];
	  $kode_sub_jenis_pekerjaan=$i['kode_sub_jenis_pekerjaan'];
      $nm_sub_jenis_pekerjaan = $i['nm_sub_jenis_pekerjaan'];
	  $kojen= $i['kode_jenis'];
         ?>

	<div id="modal_edit<?php echo $id_subkode_jenis;?>" class="modal fade">
		<div class="modal-dialog modal-md">
			<div class="modal-content"> 
				<div class="panel panel-danger">
					<div class="panel-heading">
						<button type="button" class="close" tabindex="-1" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">EDIT</h4></td>
			</div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>master_jenis_pekerjaan/updatemaster_sub_jenis" method="POST" enctype="multipart/form-data">
                 
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $id_subkode_jenis; ?>" id="" name="id_sub_jenis_pekerjaan" readonly>
                    </div>

					<div class="form-group">
                      <label for="">Kode Perusahaan</label>
                        <input type="text" class="form-control" value="<?php echo $kode_sub_jenis_pekerjaan; ?>" id="" name="kode_sub_jenis_pekerjaan" required >
                    </div>
					
					
                    <div class="form-group">
                      <label for="">Nama Perusahaan</label>
                        <input type="text" class="form-control" value="<?php echo $nm_sub_jenis_pekerjaan ; ?>" id="" name="nm_sub_jenis_pekerjaan" required >
                    </div>
					
					
					<div class="form-group" >
                      <label for="">Bidang Pekerjaan</label>
                        <select id="kode_jenis" name="kode_jenis" class="form-control tip_prod" required>
                         <option value="-">--Pilih Bidang Pekerjaan--</option>
                          <?php foreach($dd_jenis_pekerjaan as $row) { ?>
                              <option value="<?php echo $row['kode_jenis'] ?>" <?php echo $row['kode_jenis'] == $kojen ? 'selected="selected"' : '' ?>><?php echo $row['kode_jenis'] ?> || <?php echo $row['nm_pekerjaan'] ?></option>
                          <?php } ?>
                        </select>    
					</div>
					
					  
			      <br></br>
                    
                             <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat">Simpan</button>
                 
                </div>                
                   
                </div>
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>

	   
	   
	   
	   
