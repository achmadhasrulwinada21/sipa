      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <b>EDIT DATA MATERIAL</b>
        </h1>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box">
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">FORM EDIT DATA MATERIAL</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>Cmaterial/updatematerial" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                    <div class="form-group">

                      <label for="">ID</label>
                        <input type="char" class="form-control" value="<?php echo $id_material;?>" id="" name="id_material" placeholder="" readonly="" >
                      </div>

                    <div class="form-group">

                      <label for="">No Urut</label>
                        <input type="text" class="form-control" value="<?php echo $nm_material; ?>" id="" name="nm_material" placeholder="" required>
                    </div>

                    <div class="form-group">
                      <label for="">Nama Kebutuhan</label>
                        <input type="text" class="form-control" value="<?php echo $satuan; ?>" id="" name="satuan" placeholder="" required> 
				     </div>		

					 <div class="form-group">
                      <label for="">Harga Satuan</label>
                        <input type="text" class="form-control" value="<?php echo $harga; ?>" id="" name="harga" placeholder="" required> 
				     </div>		

					 
					 
                    <!--</div>
                      <div class="form-group">
                      <label for="">Kode Kebutuhan</label>
                        <input type="text" class="form-control" value="<?php echo $kd_kebutuhan; ?>" id="" name="kd_kebutuhan" placeholder="Kode Uraian" required>                        
                    </div>-->
                    
                    
                <!-- /.item -->

                 <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>Cmaterial" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
              
               
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
		
     </section><!-- right col -->
	 
  