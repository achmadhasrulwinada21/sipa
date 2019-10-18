       <section class="content-header">
    <h1>
        Data Paket Kerja Rekanan Listrik
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Setting</a></li>
        <li class="active">Menu STPD</li>
    </ol>
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
                <h3 class="box-title">FORM EDIT</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>cisii/updatecisi" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
					

                    <div class="form-group">
                      <label for="">NAMA MATERIAL</label>
                        <input type="text" class="form-control" value="<?php echo $pkj['nm_material']; ?>" id="" name="nm_material">
                    </div>

                    <!--  <div class="form-group">
                      <label for="">KOMPONEN</label>
                        <input type="text" class="form-control" value="<?php echo $nama_kom; ?>" id="" name="nama_kom">                        
                    </div>-->
                          <div class="form-group">
                      <label for="">SUB KOMPONEN</label>
                        <input type="text" class="form-control" value="<?php echo $sub_kom; ?>" id="" name="sub_kom">                        
                    </div>
                    <div class="form-group">
                      <label for="">JUMLAH</label>
                        <input type="text" class="form-control" value="<?php echo $jumlah; ?>" id="" name="jumlah">                        
                    </div>
                    <div class="form-group">
                      <label for="">PENDIDIKAN</label>
                        <input type="text" class="form-control" value="<?php echo $pendidikan; ?>" id="" name="pendidikan">                        
                    </div>
                    <div class="form-group">
                      <label for="">SERTIFIKASI</label>
                        <input type="text" class="form-control" value="<?php echo $sertifikasi; ?>" id="" name="sertifikasi">                        
                    </div>                  
					
					<div class="form-group">
                      <label for="">PENCAPAIAN</label>
                        <input type="text" class="form-control" value="<?php echo $pencapaian; ?>" id="" name="pencapaian">                        
                    </div>

                  </div>
                  </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>cisii" class="btn btn-warning btn-block btn-flat">Kembali</a>
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
      <strong>Copyright &copy; <?php echo date('Y');?> CIS.</strong> All rights reserved.
    </footer>
  </div><!-- ./wrapper -->
  <!-- page script -->  
