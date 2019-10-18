
      <section class="content-header">
        <h1>
          <b>DATA MASTER JENIS PEKERJAAN</b>
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
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>Masterjenis/addjenis" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH MASTER JENIS PEKERJAAN </a>
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
                <div class="box-body">
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>JENIS PEKERJAAN</th>
                      <th> AKSI</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_jenis as $row)
                     { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['jenis_pekerjaan']; ?></td>
                      <td>
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>Masterjenis/editmasterjenis/<?php echo $row['id_jenpek']; ?>"><i class="fa fa-pencil"></i></a>
                      <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>Masterjenis/hapusmasterjenis/<?php echo $row['id_jenpek']; ?>"><i class="fa fa-trash"></i></a>
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
         
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    