
      <section class="content-header">
        <h1>
          <b>EDIT DATA KOMPONEN BIAYA</b>
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
                <h3 class="box-title">EDIT DATA KOMPONEN BIAYA</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>komponenbiaya/updatekomponenbiaya" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                    <div class="form-group">

                      <label for=""></label>
                        <input type="char" class="form-control" value="<?php echo $id_komponenbiaya;?>" id="" name="id_komponenbiaya" placeholder="" readonly="" >
                      </div>

                    <div class="form-group">

                    <!--  <label for="">No Urut</label>
                        <input type="text" class="form-control" value="<?php echo $id_komponenbiaya; ?>" id="" name="nourut_layout" placeholder="No Urut" required>
                    </div>-->

                    <div class="form-group">
                      <label for="">Kode Komponen Biaya</label>
                        <input type="text" class="form-control" value="<?php echo $kodebiaya; ?>" id="" name="kodebiaya" placeholder="Kode Komponen Biaya" required>                        
                    </div>
					
					<div class="form-group">
                      <label for="">Nama Komponen Biaya</label>
                        <input type="text" class="form-control" value="<?php echo $komponenbiaya; ?>" id="" name="komponenbiaya" placeholder="Nama Komponen Biaya" required>                        
                    </div>
                      
                    
                    
                </div><!-- /.item -->

                 <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>komponenbiaya" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
              
               
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
        
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
</div>