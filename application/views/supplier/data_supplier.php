
      <section class="content-header">

          <h1>
        DATA SUPPLIER
        <small></small>
    </h1>

        </section>


        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>supplier/addsupplier" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH SUPPLIER</a>
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
                <div class="box-body">
                 <table id="tb-datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO URUT</th>
                      <th>NAMA SUPPLIER</th>
                      <th>ALAMAT SUPPLIER</th>
                      <th>NO TLP SUPPLIER</th>
                      <th>EMAIL SUPPLIER</th>
                      <th>EDIT</th>
                      <th>HAPUS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_supplier as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['nama_supplier']; ?></td>
                      <td><?php echo $row['alamat']; ?></td>
                      <td><?php echo $row['no_tlp']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td>
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>supplier/editsupplier/<?php echo $row['id_supplier']; ?>"><i class="glyphicon glyphicon-edit"></i></a></td>
                      <td>
                      <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>supplier/hapussupplier/<?php echo $row['id_supplier']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
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
       

      </section><!-- /.content -->
   
