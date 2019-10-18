
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <b>EDIT FORM DATA KONSUMSI</b>
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
                <h3 class="box-title">FORM</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>Konsumsi/UpdateKonsumsi" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                      <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $idkonsumsi; ?>" id="" name="idkonsumsi">
                    </div>

                    <div class="form-group">
                      <label for="">KODE FORM KONSUMSI</label>
                        <input type="text" class="form-control" value="<?php echo $kode_kons; ?>"  name="kode_kons" placeholder="Kode Konsumsi" required readonly="">
                    </div>

                    <div class="form-group">
                      <label for="">DESKRIPSI</label>
                        <input type="text" class="form-control" value="<?php echo $deskripsi; ?>" id="" name="deskripsi" placeholder="Isikan deskripsi" required>
                    </div>

                    <div class="form-group">
                      <label for="">HARGA</label>
                        <input type="text" class="form-control" value="<?php echo $harga; ?>" id="" name="harga" >                        
                    </div>
                    <div class="form-group">
                      <label for="">QTY</label>
                        <input type="text" class="form-control" value="<?php echo $qty; ?>" id="" name="qty" placeholder="qty">
                    </div>
                 </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>Konsumsi" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
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
      <strong>Copyright &copy; 2018 <a href="#"></a></strong>
    </footer>
  </div><!-- ./wrapper -->
  <!-- page script -->  
 