
      <section class="content-header">
        <h1>
          <b>DATA ROLE</b>
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

					<a style="margin-bottom:3px" href="<?php echo base_url(); ?>role/addrole" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH ROLE </a>
					<div class="box">
						<span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
						<span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?>
						<div class="box-title">
                  
						</div><!-- /.box-title -->                              
							<div class="table-responsive">
								<div class="box-body">
									<table id="tb-datatables" class="table table-bordered table-striped">
										<thead>
											<tr>
											<th>NO</th>
											<th>NAMA ROLE</th>
											<th>NAMA RUMAH SAKIT</th>
											<th>KODE ROLE</th>
											<!-- <th>KODE RS</th> -->
											<th>AKSI</th>
											</tr>
										</thead>
										<tbody>
											<?php $no=0; foreach($data_role as $row) { $no++ ?>
											<tr>
											<td><?php echo $no; ?></td>
											<td><?php echo $row['nama_role']; ?></td>
											<td><?php echo $row['cbgrs']; ?></td>
											<td><?php echo $row['koderole']; ?></td>
											<!-- <td><?php echo $row['koders']; ?></td> -->
											<td>
											<a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>role/editrole/<?php echo $row['idrole']; ?>"><i class="glyphicon glyphicon-edit"></i></a>
											<a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>role/hapusrole/<?php echo $row['idrole']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
											</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>            
							</div><!-- /.box -->
					</div><!-- /.box -->
         
				</div><!-- /.row -->
			</div><!-- /.row -->
        <!-- Main row -->
      </section><!-- /.content -->
    
    
  

    
