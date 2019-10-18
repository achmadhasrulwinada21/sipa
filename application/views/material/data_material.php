    
	<!--<ul class="nav nav-tabs">
	  <li><a href="<?php echo base_url(); ?>PktKerjaListrik">Compare Harga</a></li>
	  <li class="active"><a href="<?php echo base_url(); ?>EvaluasiPekRekLis">Rekap Evaluasi</a></li>
	  <li><a href="<?php echo base_url(); ?>rekananlistrik">Database Rekanan</a></li>
	</ul>-->
	
	
	<section class="content-header">
    <h1>
        Database Material Listrik
        <small></small>
    </h1>
   
</section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>Cmaterial/addmaterial" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH </a>
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
                <div class="box-body">
                 <table id="tb-datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th style="text-align:center" width="30">NO</th>
                      <th>NAMA MATERIAL</th>
                      <th>SATUAN</th>
                      <th>HARGA SATUAN</th>
                      <th style="text-align:center" width="180">AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_material as $row) { $no++ ?>
                    <tr>
                      <td style="text-align:center" width="30"><?php echo $no; ?></td>
                      <td><?php echo $row['nm_material']; ?></td>
                      <td><?php echo $row['satuan']; ?></td>
                      <td><?php echo number_format($row['harga']); ?></td>
                      <td style="text-align:center" width="180" >
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>cmaterial/editmaterial/<?php echo $row['id_material']; ?>"><i class="fa fa-pencil"></i></a>
                      <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>cmaterial/hapusmaterial/<?php echo $row['id_material']; ?>"><i class="fa fa-trash"></i></a>
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

		<strong>Copyright &copy; 2018 <a href="#"></a></strong>
          </section><!-- right col -->

  


  