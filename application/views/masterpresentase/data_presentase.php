     <section class="content-header">
    <h1 style="text-align:center;">
        Data Master Presentase
        <small></small>
    </h1>
      
</section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
              <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>masterpresentase/addpresentase" class="btn btn-default no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH </a>-->
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
                  <form role="form" action="<?php echo base_url(); ?>masterpresentase/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="">Kode Presentase</label>
                        <input type="text" class="form-control" value="" id="" name="kode_presentase" placeholder="Isikan Kode Presentase" required>
                    </div>
                    <div class="form-group">
                      <label for="">Nilai Presentase</label>
                        <input type="text" class="form-control" value="" id="" name="prensentase" placeholder="Isikan Nilai Presentase" required>                        
                    </div>
		
			<!--		
					<div class="form-group" >
                      <label for="">Tipe presentase</label>
                        <select id="id_tipe_produk" name="id_tipe_produk" class="form-control" required>
                         <option value="-">--Pilih Tipe presentase--</option>
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
                  <a href="<?php echo base_url(); ?>masterpresentase" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div>
               </form>-->

		<div style="text-align:center;" class="form-actions">
            <button onclick="return confirm('Apakah Data Detail Sudah Terisi ?... ');" type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo site_url('masterpresentase')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
	   
                  <div class="box-body">
                  <div class="box-body table-responsive">
              <table id="" class="tb_present table table-bordered table-striped ">

                  <thead bgcolor="#b8e6fd" >
                    <tr>
                      <th style="text-align:center;">NO</th>
                      <th style="text-align:center;">KODE</th>
                      <th style="text-align:center;">NILAI</th>
					  <th style="text-align:center;">AKSI</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_presentase as $row)
                     { $no++ ?>
                    <tr>
                      <td style="text-align:center;"><?php echo $no; ?></td>
                      <td style="text-align:center;"><?php echo $row['kode_presentase']; ?></td>
                      <td style="text-align:center;"><?php echo $row['prensentase']; ?></td>
                      <td style="text-align:center;">
					  <a  href="<?php echo base_url(); ?>masterpresentase/editmasterpresentase/<?php echo $row['kode_presentase']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                      <!--<a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $row['id_presentase']; ?>"><i class="fa fa-edit"></i></a>-->
                      <a onclick="return confirm('Anda Yakin Hapus Data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>masterpresentase/hapus_presentase/<?php echo $row['kode_presentase']; ?>"><i class="fa fa-close"></i></a>

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
	   
	   
	   
	 
