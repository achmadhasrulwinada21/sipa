
       <section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>DATA BANK</b>
        </h4>
        
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>Bank/addbank" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH BANK</a>
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
                      <th>NAMA BANK</th>
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_bank as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['nama_bank']; ?></td>
                      <td>
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>Bank/editbank/<?php echo $row['id_bank']; ?>"><i class="glyphicon glyphicon-edit"></i></a>
                      <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>Bank/hapusbank/<?php echo $row['id_bank']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                      </td>
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
