
      <section class="content-header">
        <h1>
          <b>DATA REPORT INVOICE</b>
        </h1>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
              <!-- <a style="margin-bottom:3px" href="<?php echo base_url(); ?>Laporanreport/cetak_report" class="btn btn-danger"><i class="fa fa-print"></i> PRINT </a> -->
              <!--<a style="margin-bottom:3px" target='_blank' href="<?php echo base_url(); ?>laporaninvoicepdf/cetak_invo" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> PRINT </a>-->
			  <button data-toggle="modal" data-target="#myModal" class="btn btn-success"><span class="fa fa-print"></span>PRINT</button>
			  
			  
			  <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
                <div class="box-body">
                <div class="table-responsive">
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>ACCOUNT NO</th>
                      <th>DATE</th>
                      <th>VALUE DATE</th>
                      <th>ACCOUNT NO ALIAS</th>
                      <th>DESCRIPTION</th>
                      <th>REFERENCE NO</th>
                      <th>DEBIT</th>
                      <th>CREDIT</th>					 
                      <th>BALANCE</th>
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_report as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['no_rek']; ?></td>
                      <td><?php echo $row['tanggal']; ?></td>
                      <td><?php echo $row['val_tanggal']; ?></td>
                      <td><?php echo $row['atas_nama']; ?></td>
                      <td><?php echo $row['deskripsi']; ?></td>
                      <td><?php echo $row['reference_no']; ?></td>
                      <td><?php echo $row['debit']; ?></td>
                      <td><?php echo $row['credit']; ?></td>					 
                      <td><?php echo $row['balance']; ?></td>
                      <td>
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>reportinv/editreportinv/<?php echo $row['id_invrep']; ?>"><i class="fa fa-pencil"></i></a>
                      <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>reportinv/hapusreportinv/<?php echo $row['id_invrep']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Main row -->
       
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
        
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->


  
  <!-- modal -->
    <div id="myModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">CETAK</h4></td>
					</div>
						<div class="modal-body">
							<form action="<?php echo base_url(); ?>laporaninvoicepdf/cetak_invo" target='_blank' method="POST">
								<div class="form-group"> 
								PILIH:<br>
									<select name="no_rek" class="form-control">
										<option>  No. Rekening : </option>
											<?php foreach($no_rek as $dt) { ?>
										<option value=<?php echo $dt['no_rek'] ; ?>>
											<?php echo $dt['no_rek']?></option>
											<?php  } ?>
									</select>
								</div>
							
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
										<input type="submit" class="btn btn-primary" value="CETAK">
								</div>
									</fieldset>
							</form>   
						</div>
				</div>
			</div>
		</div>
	</div>                          
  <!-- end modal -->

