	 
	 <section class="content-header">
    <h1 style="text-align:center;">
       <b> DATA MASTER LOKASI</b>
        <small></small>
    </h1>
      
</section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
		  <div id="form_perush">
          <div class="row">
            <div class="col-md-12">
             <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
				
					
			<div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>master_lokasi/savemaster_lokasi" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">
				                      <div class="col-lg-4"></div>
                         <div class="col-lg-4">
                   <div class="form-group">
                      <label for="">Kode lokasi</label><b style="color:red;">*</b>
                        <input type="text" class="form-control" value="<?php echo $kodeunik; ?>" id="" name="kode_lokasi" placeholder="Isikan Nama lokasi" autocomplete="off" required readonly>                        
                     </div>
                   <div class="form-group">
                      <label for="">Nama lokasi</label><b style="color:red;">*</b>
                        <input type="text" class="form-control" value="" id="" name="nm_lokasi" placeholder="Isikan Nama lokasi" autocomplete="off" required>                        
                     </div>
                      <div class="form-group">
                      <label for="">Status</label>
                        <select name="status" class="dara form-control" required>
                          <option value="0" required>--Pilih Status--</option>
                          <option value="0">AKTIF</option>
                           <option value="1">NON AKTIF</option>
                        </select>    
                    </div>
                   <div class="form-group">
                      <label for="">Rumah Sakit</label>
                        <select name="koders" class="dara form-control" required>
                          <option value="<?php echo  $this->session->userdata('koders') ?>"><?php echo  $this->session->userdata('namars') ?></option>
                           <?php foreach($kode_rs as $row) { ?>
                              <option value="<?php echo $row['koders'] ?>"><?php echo $row['namars'] ?></option>
                          <?php } ?>
                        </select>    
                    </div>
                  </div>
                         <div class="col-lg-4"></div></div>
		
		
		<div style="text-align:center;" class="form-actions">
            <button  type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            </form>
			<a href="<?php echo site_url('master_lokasi')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
	   
<div class='box-header with-border'> 
        <a style="margin-bottom:3px" href="<?php echo base_url("Excel_importlokasi"); ?>" class="btn btn-warning no-radius dropdown-toggle">
        <i class="glyphicon glyphicon-download-alt"></i> IMPORT DATA FROM EXCEL </a>

      <!--   <a style="margin-bottom:3px" href="<?php echo base_url('C_mstsatuan/v_export_excel') ?>" class="btn btn-danger no-radius dropdown-toggle">
        <i class="glyphicon glyphicon-upload"></i> EXPORT DATA TO EXCEL </a> -->
      </div>

                  <div class="box-body">
                  <div class="box-body table-responsive">
              <table id="tb-datatables" class="table table-bordered table-hover">

                  <thead bgcolor="#4682B4" style="font-family: arial; color: white;" >
                    <tr>
                      <th style="text-align:center;">No</th>
                      <th style="text-align:center;">Kode Lokasi</th>
                      <th style="text-align:center;">Lokasi</th>
                      <th style="text-align:center;">Rumah Sakit</th>
                      <th style="text-align:center;">Status</th>
                      <th style="text-align:center;">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                     <?php
                    $status=0;
                     $no=0; foreach($data_jenis_lokasi as $row)
                     { $no++ ;
                          $status=$row->status;

                              if($status==0){
                              $status="AKTIF";
                            }else{
                              $status="NON AKTIF";
                            }
                      ?>
                    <tr>
                      <td style="text-align:center;"><?php echo $no; ?></td>
                       <td><?php echo $row->kode_lokasi; ?></td>
                      <td><?php echo $row->nm_lokasi; ?></td>
                      <td><?php echo $row->namars; ?></td>
                       <td><?php echo $status; ?></td>
                      <td style="text-align:center;">
					            <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $row->id_lokasi; ?>"><i class="fa fa-edit"></i></a>
                      <a onclick="return confirm('Anda Yakin Hapus Data <?php echo $row->nm_lokasi; ?> ....??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>master_lokasi/hapus_master_lokasi/<?php echo $row->id_lokasi; ?>"><i class="fa fa-close"></i></a>

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
      foreach($data_jenis_lokasi as $i){
      $id_lokasi= $i->id_lokasi;
      $kode_lokasi = $i->kode_lokasi; 
	    $nm_lokasi = $i->nm_lokasi;  
      $koders=$i->koders;
      $namars=$i->namars;
       $status=$i->status;
      ?>

<div id="modal_edit<?php echo $id_lokasi;?>" class="modal fade">
  <div class="modal-dialog modal-md">
    <div class="modal-content"> 
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">EDIT</h4></td>
      </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>master_lokasi/updatemaster_lokasi" method="POST" enctype="multipart/form-data">
                 
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $id_lokasi; ?>" id="" name="id_lokasi" readonly>
                    </div>

                     <div class="form-group">
                      <label for="">Kode lokasi</label>
                        <input type="text" class="form-control" value="<?php echo $kode_lokasi; ?>" id="" name="kode_lokasi" required readonly >
                    </div>
				
					  <div class="form-group">
                      <label for="">Nama lokasi</label>
                        <input type="text" class="form-control" value="<?php echo $nm_lokasi; ?>" id="" name="nm_lokasi" required >
                    </div>
                   <div class="form-group">
                      <label for="">Status</label>
                        <select name="status" class="dara form-control" required>
                          <option value="0" required>--Pilih Status--</option>
                          <option <?php if ($status == 0) echo 'selected' ; ?> value="0">AKTIF</option>
                           <option <?php if ($status == 1) echo 'selected' ; ?>  value="1">NON AKTIF</option>
                        </select>    
                    </div>
                    <div class="form-group">
                      <label for="">Rumah Sakit</label>
                        <select name="koders" class="dara form-control" required>
                          <option required>--Pilih Rumah Sakit--</option>
                          <?php foreach($kode_rs as $row) { ?>
                              <option <?php if ($row['koders'] == $koders) echo 'selected' ; ?> value="<?php echo $row['koders'] ?>"><?php echo $row['namars'] ?></option>
                          <?php } ?>
                        </select>    
                    </div>
					

                	<br></br>
                    
                             <div class="form-group">
                  <button  type="submit" name="uul" class="btn btn-success btn-block btn-flat">Simpan</button>
                 
                </div>                
                   
                </div>
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>
	   
	   
	   
