     <section class="content-header">
    <h1 style="text-align:center;">
        <b>DATABASE REKANAN ALUM</b>
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
			  <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>ci_to_excel/form" class="btn btn-default no-radius dropdown-toggle"><i class="fa fa-folder-open"></i>IMPORT</a>-->
			  <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>ci_to_excel/export_perush" class="btn btn-default no-radius dropdown-toggle"><i class="fa fa-external-link"></i> EXPORT </a>-->
			  <a style="margin-bottom:3px" href="<?php echo base_url(); ?>rpt_alum/report_alum" class="btn btn-danger no-radius dropdown-toggle"><i class="fa fa-print"></i> EXPORT DATA TO EXCEL </a>
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
				

	   
                  <div class="box-body">
                  <div class="box-body table-responsive">
              <table id="tb-datatables" class="table table-bordered table-hover">

                  <thead bgcolor="#4682B4" style="font-family: arial; color: white;" >
                    <tr>
                      <th style="text-align:center;">NO</th>
                      <th style="text-align:center;">KODE</th>
                      <th style="text-align:center;">NAMA PERUSAHAAN</th>
					  <th style="text-align:center;">TIPE</th>
                     
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

	   
	   
	   
	   
