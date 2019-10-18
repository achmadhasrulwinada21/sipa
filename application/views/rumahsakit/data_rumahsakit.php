
      <section class="content-header">
        <h1>
          <b>DATA RUMAH SAKIT</b>
        </h1>
        </section>

        <!-- Main content -->
          <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>rumahsakit/addrumahsakit" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH RUMAH SAKIT </a>
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
                <div class="box-body">
                 <table id="tb-datatables6" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>KODE</th>
                      <th>RUMAH SAKIT</th>
                      <th>EMAIL RUMAH SAKIT</th>
                      <!-- <th>TANGGAL</th> -->
                      <th>KELOLA DATA</th>
                       <th>HAPUS DATA</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_rumahsakit as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['koders']; ?></td>
                      <td><?php echo $row['namars']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <!-- <td><?php echo $row['cdate']; ?></td> -->
                      <td>

                  
                  

                      <a  class="btn btn-warning btn-sm glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"   href="<?php echo base_url(); ?>rumahsakit/editrumahsakit/<?php echo $row['koders']; ?>"></a></td>
                      <td><a href="<?php echo base_url(); ?>rumahsakit/hapusrumahsakit/<?php echo $row['koders']; ?>" class="btn-sm btn-danger glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete" onclick="return confirm(' Anda Benar Akan Menghapus data ini??');"></a></td>
                    </td>

                    </tr>
                    <?php } ?>
                  </tbody>
                </table>

          
          </div>
        </div>
     
        </div>

    

          </div>
        </div>

</section>

