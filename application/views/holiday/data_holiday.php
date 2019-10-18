
            




<section class="content-header">
    <h1>
         Master Hari Libur & Nasional
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Setting</a></li>
        <li class="active">Hari Libur & Nasional</li>
    </ol>
</section>
<section class="content">   

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>holiday/addholiday" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH HARI LIBUR & NASIONAL </a>

                 <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?>
                <div class="box-title">
                  
                </div><!-- /.box-title -->

                 <div class="box-body table-responsive">
                  <!--   <table id="example1" class="table table-bordered table-striped" cellspacing="0" width="100%"> -->
                      <table id="tb-datatables6" class="table table-bordered table-striped">


  <thead>
                    <tr>
                      <th>NO</th>
                      <th>ID</th>
                      <th>NAMA HARI LIBUR</th>
                      <th>TANGGAL TERDAFTAR RESMI</th>
                      <th>JUMLAH HARI</th>
                      <th>TANGGAL CETAK</th>
                      <th>TANGGAL UPDATE</th>
                      <th>DICETAK OLEH</th>
                      <th>DIUPDATE OLEH</th>
                      
                      <th>KELOLA DATA</th>
                      <th>HAPUS DATA</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_holiday as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['id_holiday']; ?></td>
                      <td><?php echo $row['namaharilibur']; ?></td>
                      <td><?php echo $row['tanggalterdaftar']; ?></td>
                      <td><?php echo $row['jumlahhari']; ?></td>
                      <td><?php echo $row['createdate']; ?></td>
                      <td><?php echo $row['updatedate']; ?></td>
                      <td><?php echo $row['createby']; ?></td>
                      <td><?php echo $row['updateby']; ?></td>
                      <td>
               


                      <a  class="btn btn-info btn-sm glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"   href="<?php echo base_url(); ?>holiday/editholiday/<?php echo $row['id_holiday']; ?>"></a></td>

                      <td><a href="<?php echo base_url(); ?>holiday/hapusholiday/<?php echo $row['id_holiday']; ?>" class="btn-sm btn-info glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete" onclick="return confirm(' Anda Benar Akan Menghapus data ini??');"></a></td>


                      </td>
                    </tr>

                   
               
                    <?php } ?>
                  </tbody>
                </table>
              </div>


                <div class="box-body table-responsive" hidden="">
                  <!--   <table id="example1" class="table table-bordered table-striped" cellspacing="0" width="100%"> -->
                      <table id="tb-datatables" class="table table-bordered table-striped">


  <thead>
                    <tr>
                      <th>NO</th>
                      <th>PERIODE</th>
                      <th>JUMLAH TOTAL LIBUR</th>
                      <th>JUMLAH TOTAL SELISIH LIBUR/BULAN</th>
                  
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_countholiday as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['tanggalterdaftar']; ?></td>
                      <td><?php echo $row['totallibur']; ?></td>
                       <td><?php echo $row['totalselisihbulanlibur']; ?></td>
                     
                  


                    
                    </tr>

                   
               
                    <?php } ?>
                  </tbody>
                </table>


                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section>



