
      <section class="content-header">
          <div  id="clock">
        </div>
        <h4>
          <b>DATA TTD</b>
        </h4>
         </section>

      

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">

            <a style="margin-bottom:3px" href="<?php echo base_url(); ?>ttddir/addttd" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH DATA TTD </a>
            <br/>
            <br/>
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?>


                <div class="box-title">
                </div><!-- /.box-title -->
                <div class="box-body">
                  <div class="table-responsive">
                 <table id="tb-datatables" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr bgcolor="grey" style="color:white">
                      <th>NO</th>
                      <th>NAMA LENGKAP</th>
                      <th>CABANG RS</th>
                      <th>ROLE</th>
                      <th>TANGGAL</th>  
                      <th>FOTO</th>               
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_ttd as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['nama_user']; ?></td>
                      <td><?php echo $row['cbgrs']; ?></td>
                      <td><?php echo $row['role']; ?></td>
                      <td><?php echo $row['tanggal']; ?></td>
                
                      <td>
                      <img style="width:80px;height:80px" src="<?php echo base_url(); ?>assets/upload/<?php echo $row['foto']; ?>" class="img-circl" alt="User Image" />
                      </td>


                      <td>
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>ttddir/editttd/<?php echo $row['idttd']; ?>"><i class="glyphicon glyphicon-edit"></i> </a>
                       <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>ttddir/hapusttd/<?php echo $row['idttd']; ?>"><i class="glyphicon glyphicon-trash"></i></a> 
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Main row -->
      </section><!-- /.content -->