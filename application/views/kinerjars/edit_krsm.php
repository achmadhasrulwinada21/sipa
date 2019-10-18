

      <section class="content-header">
        <h1>
          <b>EDIT DATA KINERJA RUMAH SAKIT</b>
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
                <h3 class="box-title">EDIT KINERJA RUMAH SAKIT</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>kinerjarusak/updatekrs" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                    <div class="form-group">

                      <label for=""></label>
                        <input type="hidden" class="form-control" value="<?php echo $id_krs;?>" name="id_krs" placeholder="" readonly="" >
                      </div> 

                      <div class="form-group">

                    <!--   <label for="">PERIODE</label>
                        <input type="text" class="form-control" id="periode" value="<?php echo $periode; ?>"  name="periode" placeholder="dd/mm/yyyy" required>
                    </div> -->

                    <div class="form-group">

                      <label for="">URAIAN</label>
                        <input type="text" class="form-control" value="<?php echo $uraian_rsk; ?>"  name="uraian_rsk" placeholder="Uraian" readonly>
                    </div>

                    <div class="form-group">
                      <label for="">DATA REAL</label>
                        <input type="text" class="form-control" value="<?php echo $real_rsk; ?>" id="" name="real_rsk" placeholder="Data Real" readonly>                        
                    </div>
                    <div class="form-group">
                      <label for="">DATA TARGET</label>
                        <input type="text" class="form-control" value="<?php echo $target_rsk; ?>" id="" name="target_rsk" placeholder="Data Target" required>                        
                    </div> 
                    
                    
                    
                </div><!-- /.item -->

                 <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>kinerjarusak" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
              
               
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

          </section><!-- right col -->
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
    
    

