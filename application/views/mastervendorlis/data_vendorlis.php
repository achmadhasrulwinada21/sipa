     <section class="content-header">
    <h1>
        Data Master Vendor Listrik
        <small></small>
    </h1>
      
</section>

        <!-- Main content -->
        <section class="content">

          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>mastervendorlis/addvendorlis" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH </a>
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->

                  <div class="box-body">
                  <div class="box-body table-responsive">
              <table id="tb-datatables" class="table table-bordered table-striped">

                  <thead bgcolor="#DCDCDC" >
                    <tr>
                      <th style="text-align:center;">NO</th>
                      <th style="text-align:center;">KODE VENDOR</th>
                      <th style="text-align:center;">NAMA VENDOR</th>
					  <th style="text-align:center;">ALAMAT</th>
					  <th style="text-align:center;">NO TELP</th>
                      <th style="text-align:center;">AKSI</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_vendorlis as $row)
                     { $no++ ?>
                    <tr>
                      <td style="text-align:center;"><?php echo $no; ?></td>
                      <td style="text-align:center;"><?php echo $row['kode_vendlis']; ?></td>
                      <td style="text-align:left;"><?php echo $row['nm_vendor']; ?></td>
					  <td style="text-align:left;"><?php echo $row['alamat']; ?></td>
                      <td style="text-align:left;"><?php echo $row['no_telp']; ?></td>
                      <td style="text-align:center;">
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>mastervendorlis/edit/<?php echo $row['id_venlis']; ?>"><i class="fa fa-pencil"></i></a>
                      <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>mastervendorlis/hapus/<?php echo $row['id_venlis']; ?>"><i class="fa fa-trash"></i></a>

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
     </section><!-- right col -->
     </div><!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <!-- <b>Version</b> 2.0 -->
      </div>
      <strong>TeamHermina &copy; 2018 <a href="#"></a></strong>
    </footer>
  </div><!-- ./wrapper -->
 