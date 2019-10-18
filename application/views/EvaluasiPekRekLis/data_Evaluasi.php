    
	<ul class="nav nav-tabs">
	  <li><a href="<?php echo base_url(); ?>PktKerjaListrik">Compare Harga</a></li>
	  <li class="active"><a href="<?php echo base_url(); ?>EvaluasiPekRekLis">Rekap Evaluasi</a></li>
	  <li><a href="<?php echo base_url(); ?>rekananlistrik">Database Rekanan</a></li>
	</ul>
	
	
	<section class="content-header">
    <h1>
        Data Rekap Evaluasi Paket Rekanan Listrik
        <small></small>
    </h1>
   
</section>

        <!-- Main content -->
        <section class="content">
        <!-- <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>EvaluasiPekRekLis/addEvaluasi" class="btn btn-danger no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH </a>
                <a style="margin-bottom:3px" href="<?php echo base_url(); ?>laporanevaluasi/cetak_evaluasi" target='_blank' class="btn btn-warning"><i class="fa fa-print"></i> PRINT ALL</a>  
                  <button style="margin-bottom:3px" data-toggle="modal" data-target="#myModal" target='_blank' class="btn btn-success"><span class="fa fa-print"></span> CETAK DATA RS</button>
       <!-- <button data-toggle="modal" data-target="#myModal" class="btn btn-success"><span class="fa fa-thumb-tack"></span>PRINT</button>-->
          <div class="row">
            <div class="col-md-12">
<!--               <a style="margin-bottom:3px" href="<?php echo base_url(); ?>memo/addmemo" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH DATA MEMORANDUM </a> -->
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"> 
                  
                </div><!-- /.box-title -->
                <div class="box-body">
                <div class="table-responsive">
                 <table id="tb-datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th style="text-align:center;">NO</th>
                      <th style="text-align:center;"> NAMA RUMAH SAKIT</th>
                      <th style="text-align:center;">JENIS PEKERJAAN</th>
                      <th style="text-align:center;">KETERANGAN</th>
                      <th style="text-align:center;">PENANGGUNG JAWAB</th>
                      <th style="text-align:center;">AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_Evaluasi as $row) { $no++ ?>
                    <tr>
                      <td style="text-align:center;"><?php echo $no; ?></td>
                      <td><?php echo $row['namars']; ?></td>
                      <td><?php echo $row['jenis_pek']; ?></td>
                      <td><?php echo $row['keterangan']; ?></td>
                      <td style="text-align:center;"><?php echo $row['pen_jwb']; ?></td>
                      <td style="text-align:center;">
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>EvaluasiPekRekLis/editEvaluasi/<?php echo $row['id_eva']; ?>"><i class="fa fa-pencil"></i></a>
                      <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>EvaluasiPekRekLis/hapusevaluasi/<?php echo $row['id_eva']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Main row -->
          <div id="myModal" class="modal fade">
      <div class="modal-dialog">
      <div class="modal-content">
      <div class="panel panel-primary">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">CETAK</h4></td>
      </div>
        <div class="modal-body">

      <form action="<?php echo base_url(); ?>laporanevaluasi/cetak_evaluasii" target='_blank' method="POST">
        <div class="form-group"> 
             CARI RUMAH SAKIT :<br>
         <select name="koders" class="form-control">
       <option> Pilih Rumah Sakit : </option>
     <?php foreach($optRumahSakit as $dt) { ?>
            <option value=<?php echo $dt['koders'] ; ?>>
             <?php echo $dt['namars']?></option>
            <?php  } ?>
          </select>
        </div>
          
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          <input type="submit" class="btn btn-primary" value="CETAK">
        </div>
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

          </section><!-- right col -->
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <!-- <b>Version</b> 2.0 -->
      </div>
      <strong>Team Hermina Kemayoran &copy; 2018 <a href="#"></a></strong>
    </footer>
  </div><!-- ./wrapper -->
  <!-- page script -->
  </div></div></div></div></div>   
  