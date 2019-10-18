
      <section class="content-header">
        <h1>
          <b>DATA KEBUTUHAN</b>
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
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>ckebutuhan/addkebutuhan" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH KEBUTUHAN </a>
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
                <div class="box-body">
                 <table id="tb-datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th width="80">NO URUT</th>
                      <th>KODE</th>
                      <th>KEBUTUHAN</th>
                      <th>CREATE DATE</th>
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_kebutuhan as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['kd_kebutuhan']; ?></td>
                      <td><?php echo $row['nama_kebutuhan']; ?></td>
                      <td><?php echo $row['cdate']; ?></td>
                      <td>
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>ckebutuhan/editkebutuhan/<?php echo $row['id_kebutuhan']; ?>"><i class="fa fa-pencil"></i></a>
                      <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>ckebutuhan/hapuskebutuhan/<?php echo $row['id_kebutuhan']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
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
