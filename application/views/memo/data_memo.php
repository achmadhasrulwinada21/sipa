
      <section class="content-header">
        <h1>
          <b>DATA MEMORANDUM</b>
        </h1>
        </section>
			  
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>memo/addmemo" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH DATA MEMORANDUM </a> 
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
                      <th>KEPADA</th>
                      <th>DARI</th>
                      <th>TANGGAL</th>
                      <th>PERIHAL</th>
                      <th>UNTUK</th>
                      <th>DESKRIPSI</th>
                      <th>NAMA PIC</th>
<!--                       <th>TTD PEMOHON</th> -->
                      <th>KELOLA DATA</th>
                      <th>HAPUS DATA</th>
                      <th>CETAK DATA</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_memo as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['tujuan']; ?></td>
                      <td><?php echo $row['dari']; ?></td>
                      <td><?php echo $row['tanggal']; ?></td>
                      <td><?php echo $row['perihal']; ?></td>
                      <td><?php echo $row['untuk']; ?></td>
                      <td><?php echo $row['deskripsi']; ?></td>
                      <td><?php echo $row['pic']; ?></td>
<!--                       <td><?php echo $row['ttd_pemohon']; ?></td> -->
                      <td>
                       <a  class="btn btn-info btn-sm glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"   href="<?php echo base_url(); ?>memo/editmemo/<?php echo $row['id_memo']; ?>"></a></td>

                      <td><a href="<?php echo base_url(); ?>memo/hapusmemo/<?php echo $row['id_memo']; ?>" class="btn-sm btn-info glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete" onclick="return confirm(' Anda Benar Akan Menghapus data ini??');"></a></td>

                       <td><a target="_blank"  class="btn btn-info btn-sm glyphicon glyphicon-print" data-toggle="tooltip" title="Print"   href="<?php echo base_url(); ?>laporanmemo/cetak_memo/<?php echo $row['id_memo']; ?>"></a></td>

                    </tr>
                    <?php } ?>
                  </tbody>
                </table>

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section>