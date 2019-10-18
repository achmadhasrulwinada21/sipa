     <section class="content-header">
    <h1 style="text-align:center;">
        Data Master Regional
        <small></small>
    </h1>
      
</section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
              <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>masterregional/addregional" class="btn btn-default no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH </a>-->
			 <!-- <a style="margin-bottom:3px" href="<?php echo base_url(); ?>ci_to_excel/form" class="btn btn-default no-radius dropdown-toggle"><i class="fa fa-folder-open"></i>IMPORT</a>
			  <a style="margin-bottom:3px" href="<?php echo base_url(); ?>ci_to_excel/export_perush" class="btn btn-default no-radius dropdown-toggle"><i class="fa fa-external-link"></i> EXPORT </a> -->
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
				
				
				
			<div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>masterregional/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="">Kode Regional</label>
                        <input type="text" class="form-control" value="" id="" name="kode_regional" placeholder="Isikan Kode regional" required>
                    </div>
                    <div class="form-group">
                      <label for="">Nama Regional</label>
                        <input type="text" class="form-control" value="" id="" name="nm_regional" placeholder="Isikan Nama regional" required>                        
                    </div>
		
			<!--		
					<div class="form-group" >
                      <label for="">Tipe Regional</label>
                        <select id="id_tipe_produk" name="id_tipe_produk" class="form-control" required>
                         <option value="-">--Pilih Tipe Regional--</option>
                          <?php foreach($dd_tipe as $row) { ?>
                              <option value="<?php echo $row['id_tipe_produk'] ?>"><?php echo $row['tipe_produk'] ?></option>
                          <?php } ?>
                        </select>    
					</div> -->
			   
				
		<!--	<input type="hidden" class="form-control" value="" id="" name="tipe_produk" required readonly> -->
			


                   <!-- <div class="form-group">
                      <label for="">Tanggal</label>
                        <input type="datepicker1" class="form-control" value="" id="datepicker1" name="createdate" placeholder="Isikan Tanggal" required>                        
                    </div>
                  </div>-->
                   
                <!--</div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>masterregional" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div>
               </form>-->

		<div style="text-align:center;" class="form-actions">
            <button onclick="return confirm('Apakah Data Detail Sudah Terisi ?... ');" type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo site_url('masterregional')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
	   
                  <div class="box-body">
                  <div class="box-body table-responsive">
              <table id="tb-datatables" class="table table-bordered table-striped">

                  <thead bgcolor="#b8e6fd" >
                    <tr>
                      <th style="text-align:center;">NO</th>
                      <th style="text-align:center;">KODE</th>
                      <th style="text-align:center;">NAMA REGIONAL</th>
					  <th style="text-align:center;">AKSI</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_regional as $row)
                     { $no++ ?>
                    <tr>
                      <td style="text-align:center;"><?php echo $no; ?></td>
                      <td style="text-align:center;"><?php echo $row['kode_regional']; ?></td>
                      <td><?php echo $row['nm_regional']; ?></td>
                      <td style="text-align:center;">
					  <a  href="<?php echo base_url(); ?>masterregional/editmasterregional/<?php echo $row['id_regional']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                      <!--<a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $row['id_regional']; ?>"><i class="fa fa-edit"></i></a>-->
                      <a onclick="return confirm('Anda Yakin Hapus Data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>masterregional/hapus_regional/<?php echo $row['kode_regional']; ?>"><i class="fa fa-close"></i></a>

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
	   
	   
	   
	   
	   <?php
      foreach($data_regional as $i){
      $id_kode_regional= $i['id_regional'];
	  $kode_regional= $i['kode_regional'];
      $nm_regional = $i['nm_regional'];


              
         ?>

	<div id="modal_edit<?php echo $id_kode_regional;?>" class="modal fade">
		<div class="modal-dialog modal-md">
			<div class="modal-content"> 
				<div class="panel panel-danger">
					<div class="panel-heading">
						<button type="button" class="close" tabindex="-1" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">EDIT</h4></td>
			</div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>masterregional/update_regional" method="POST" enctype="multipart/form-data">
                 
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $id_kode_regional; ?>" id="" name="id_detail" readonly>
                    </div>

					<div class="form-group">
                      <label for="">Kode Regional</label>
                        <input type="text" class="form-control" value="<?php echo $kode_regional; ?>" id="" name="uraian" required >
                    </div>
					
					
                    <div class="form-group">
                      <label for="">Nama Regional</label>
                        <input type="text" class="form-control" value="<?php echo $nm_regional; ?>" id="" name="uraian" required >
                    </div>
					
					<div class="form-group" >
							  <label for="">Tipe Regional</label>
								<select id="id_tipe_produk_modal" name="id_tipe_produk_m" class="form-control" required>
								 <option value="-">--Pilih Tipe regional--</option>
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

	   
	   
	   
	   
