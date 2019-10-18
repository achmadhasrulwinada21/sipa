
      <section class="content-header">
          <div  id="clock">
        </div>
        <h4>
          <b>MASTER PEMBERI PINJAMAN</b>
        </h4>
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

            <a style="margin-bottom:3px" href="<?php echo base_url(); ?>Pempinjam/addkon" class="btn btn-info no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH </a>
            <br/>
             <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?>


                <div class="box-title">
                </div><!-- /.box-title -->
                <div class="box-body">
                  <div class="table-responsive">
                 <table id="tb-datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr class="info">
                      <th>NO</th>
                      <th>KODE PINJAM</th>
                      <th>PEMBERI PINJAMAN</th>               
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_pinjam as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['kode_pinjam']; ?></td>
                      <td><?php echo $row['pemberi_pinjaman']; ?></td>
                      <td>
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>Pempinjam/editpinjam/<?php echo $row['idpinjam']; ?>"><i class="glyphicon glyphicon-edit"></i></a>
                       <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>Pempinjam/hapuspinjam/<?php echo $row['idpinjam']; ?>"><i class="glyphicon glyphicon-trash"></i></a> 
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

   <!--  <script type="text/javascript">
     


      var second = 1000,
    times = [];

function pad(num) {
  return ('0' + num).slice(-2);
}

function updateClock() {
  var clockEl = document.getElementById('clock'),
    dateObj = new Date(),
    currentTime = +dateObj; 
    
  addTimeShowTimes(currentTime);
    </script> -->


