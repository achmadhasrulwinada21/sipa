
      <section class="content-header">
        <h1>
          <b>DATA MASTER KODE</b>
        </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>kode/addkode" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH DATA </a>

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
                      <th>JABATAN</th>
                      <th>KODE TTD</th>
                      <th>KELOLA DATA</th>
                      <th>HAPUS DATA</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_kode as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['jabatan']; ?></td>
                      <td><?php echo $row['kodettd']; ?></td>
                      <!-- <td><?php echo $row['createdate']; ?></td> -->
                        <td>
                      <a  class="btn btn-warning  btn-sm glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"   href="<?php echo base_url(); ?>kode/editkode/<?php echo $row['idkode']; ?>"></a></td>
                      <td><a href="<?php echo base_url(); ?>kode/hapuskode/<?php echo $row['idkode']; ?>" class="btn-sm btn-danger glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete" onclick="return confirm(' Anda Benar Akan Menghapus data ini??');"></a></td>
                    </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section>
