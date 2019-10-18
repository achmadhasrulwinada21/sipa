
       <section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>DATA group_rl</b>
        </h4>
        
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>group_rl/addgroup_rl" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH group_rl</a>
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
            <div class="table-responsive">
                <div class="box-body">
                 <table id="tb-datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO URUT</th>
					  <th>KODE RS</th>
                      <th>NAMA RS</th>
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
					
					//if (is_array($Dokter) || is_object($Dokter))
					$no=0; foreach($Dokter as $row=>$data) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
					   <td><?php echo $data->koders; ?></td>
                      <td><?php echo $data->namars; ?></td>
                      <td>
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>group_rl/ubah/<?php echo $data->koders; ?>/<?php echo $data->namars; ?>"><i class="glyphicon glyphicon-edit"></i></a>
                     <!-- <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>group_rl/hapusgroup_rl/<?php echo $row['id_group_rl']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                     --></td>
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
          <section class="col-lg-5 connectedSortable">

          </section><!-- right col -->
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
