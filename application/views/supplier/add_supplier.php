
<section class="content-header">
    <h1>
        TAMBAH SUPPLIER
        <small></small>
    </h1>
    
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
                <h3 class="box-title">FORM TAMBAH SUPPLIER</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>supplier/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">Kode Supplier</label>
                        <input type="text" class="form-control" value="" id="" name="kode_supplier" placeholder="Isi Kode Supplier" required>
                    </div>

                    <div class="form-group">
                      <label for="">Nama Supplier</label>
                        <input type="text" class="form-control" value="" id="" name="nama_supplier" placeholder="Isi Nama Supplier" required>                        
                    </div>

                    <div class="form-group">
                      <label for="">Alamat Supplier</label>
                        <input type="text" class="form-control" value="" id="" name="alamat" placeholder="Isi Alamat Supplier">                        
                    </div>

                    <div class="form-group">
                      <label for="">No. Tlp Supplier</label>
                        <input type="text" class="form-control" value="" id="" name="no_tlp" placeholder="Isi No Tlp Supplier">                        
                    </div>

                    <div class="form-group">
                      <label for="">Email Supplier</label>
                        <input type="text" class="form-control" value="" id="" name="email" placeholder="Isi Email Supplier">                        
                    </div>
                 
                  
                </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>supplier" class="btn btn-warning btn-block btn-flat">Kembali</a>
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
   