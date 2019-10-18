     <ul class="nav nav-tabs">
	  <li class="active"><a href="<?php echo base_url(); ?>master_jenis_pekerjaan/master_jenis_dan_sub_pekerjaan">Master Jenis Pekerjaan</a></li>
	  <li class=""><a href="<?php echo base_url(); ?>master_jenis_pekerjaan/master_sub_jenis_pekerjaan">Master Sub Jenis Pekerjaan</a></li>
	  
	</ul>
	 
	 
	 
	 
	 <section class="content-header">
    <h1 style="text-align:center;">
       <b> DATA MASTER JENIS PEKERJAAN (DEPBANG)</b>
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
			  <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>ci_to_excel/form" class="btn btn-warning no-radius dropdown-toggle"><i class="fa fa-folder-open"></i> IMPORT DATA FROM EXCEL </a>-->
			  <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>ci_to_excel/export_perush_depbang" class="btn btn-danger no-radius dropdown-toggle"><i class="fa fa-external-link"></i> EXPORT DATA TO EXCEL  </a>-->
			  <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>rpt_alum/report_alum" class="btn btn-default no-radius dropdown-toggle"><i class="fa fa-print"></i> CETAK EXCEL </a>-->
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
				
					
			<div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>master_jenis_pekerjaan/savemasterdara" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">
				  
			
                    <div class="form-group">
                      <label for="">Kode Jenis</label>
                        <input type="text" class="form-control" value="" id="" name="kode_jenism" placeholder="Isikan Kode Perusahaan" maxlength="8">
                    </div>
                    <div class="form-group">
                      <label for="">Nama Pekerjaan</label>
                        <input type="text" class="form-control" value="" id="" name="nm_pekerjaanm" placeholder="Isikan Nama Perusahaan">                        
                    </div>
		
		
		<div style="text-align:center;" class="form-actions">
            <button onclick="return confirm('Apakah Data Detail Sudah Terisi ?... ');" type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            </form>
			<a href="<?php echo site_url('master_jenis_pekerjaan/master_jenis_dan_sub_pekerjaan')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
	   
                  <div class="box-body">
                  <div class="box-body table-responsive">
              <table id="tb-datatables" class="table table-bordered table-hover">

                  <thead bgcolor="#4682B4" style="font-family: arial; color: white;" >
                    <tr>
                      <th style="text-align:center;">NO</th>
                      <th style="text-align:center;">KODE</th>
                      <th style="text-align:center;">NAMA PEKERJAAN</th>
                      <th style="text-align:center;">AKSI</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_jenis_pekerjaan as $row)
                     { $no++ ?>
                    <tr>
                      <td style="text-align:center;"><?php echo $no; ?></td>
                      <td style="text-align:center;"><?php echo $row['kode_jenis']; ?></td>
                      <td><?php echo $row['nm_pekerjaan']; ?></td>
                      <td style="text-align:center;">
					 <!-- <a href="<?php echo base_url(); ?>master_jenis_pekerjaan/editmaster_jenis_pekerjaan_depbang/<?php echo $row['id_jenis_pekerjaan']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>-->
                      <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $row['id_jenis_pekerjaan']; ?>"><i class="fa fa-edit"></i></a>
                      <a onclick="return confirm('Anda Yakin Hapus Data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>master_jenis_pekerjaan/hapus_master_jenis_pekerjaan/<?php echo $row['kode_jenis']; ?>"><i class="fa fa-close"></i></a>

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
      foreach($data_jenis_pekerjaan as $i){
      $id_jenis_pekerjaan= $i['id_jenis_pekerjaan'];
	  $kojen= $i['kode_jenis'];
      $nm_pekerjaan = $i['nm_pekerjaan'];    
         ?>

<div id="modal_edit<?php echo $id_jenis_pekerjaan;?>" class="modal fade">
  <div class="modal-dialog modal-md">
    <div class="modal-content"> 
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">EDIT</h4></td>
      </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>master_jenis_pekerjaan/updatemasteranisa" method="POST" enctype="multipart/form-data">
                 
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $id_jenis_pekerjaan; ?>" id="" name="dara1" readonly>
                    </div>

                    <div class="form-group">
                      <label for="">Kode Jenis</label>
                        <input type="text" class="form-control" value="<?php echo $kojen; ?>" id="" name="dara" required >
                    </div>
					
					  <div class="form-group">
                      <label for="">Nama Pekerjaan</label>
                        <input type="text" class="form-control" value="<?php echo $nm_pekerjaan; ?>" id="" name="dara_anisa" required >
                    </div>
					
			

                	<br></br>
                    
                             <div class="form-group">
                  <button  type="submit" name="uul" class="btn btn-success btn-block btn-flat">Simpan</button>
                 
                </div>                
                   
                </div>
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>
	   
	   
	   
