
      <section class="content-header">
        <h1>
          <b>EDIT DATA URAIAN</b>
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
                <i class="fa fa-pencil"></i>
                <h3 class="box-title">EDIT DATA URAIAN</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>uraian/updateuraian" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                    <div class="form-group">

                      <label for=""></label>
                        <input type="char" class="form-control" value="<?php echo $id_uraian;?>" id="" name="id_uraian" placeholder="" readonly="" >
                      </div>

                    <div class="form-group">

                      <label for="">No Uraian</label>
                        <input type="text" class="form-control" value="<?php echo $nourut_layout; ?>" id="" name="nourut_layout" placeholder="No Urut" required>
                    </div>

                    <div class="form-group">
                      <label for="">Nama Uraian</label>
                        <input type="text" class="form-control" value="<?php echo $nama_uraian; ?>" id="" name="nama_uraian" placeholder="Nama Uraian" required>                        
                    </div>
                      <div class="form-group">
                      <label for="">Kode Uraian</label>
                        <input type="text" class="form-control" value="<?php echo $kd_uraian; ?>" id="" name="kd_uraian" placeholder="Kode Uraian" required>                        
                    </div>
                    
                    
                </div><!-- /.item -->

                 <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>uraian" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
              
               
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

          </section><!-- right col -->
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
