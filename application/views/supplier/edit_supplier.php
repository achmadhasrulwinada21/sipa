 <section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>EDIT MASTER SUPPLIER</b>
        </h4>
        
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
                <h3 class="box-title">EDIT DATA SUPPLIER</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>supplier/updatesupplier" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                    <div class="form-group">

                      <label for=""></label>
                        <input type="hidden" class="form-control" value="<?php echo $id_supplier;?>" id="" name="id_supplier">
                      </div>

                      <div class="form-group">
                      <label for="">Kode Supplier</label>
                        <input type="text" class="form-control" value="<?php echo $kode_supplier; ?>" id="" name="kode_supplier" placeholder="Kode Supplier" required>                        
                    </div>

                    <div class="form-group">
                      <label for="">Nama Supplier</label>
                        <input type="text" class="form-control" value="<?php echo $nama_supplier; ?>" id="" name="nama_supplier" placeholder="Nama Supplier" required>                        
                    </div>

                    <div class="form-group">
                      <label for="">Alamat Supplier</label>
                        <input type="text" class="form-control" value="<?php echo $alamat; ?>" id="" name="alamat" placeholder="Alamat Supplier">                        
                    </div>

                    <div class="form-group">
                      <label for="">No. Tlp Supplier</label>
                        <input type="text" class="form-control" value="<?php echo $no_tlp; ?>" id="" name="no_tlp" placeholder="No. Tlp Supplier">                        
                    </div>

                    <div class="form-group">
                      <label for="">Email Supplier</label>
                        <input type="text" class="form-control" value="<?php echo $email; ?>" id="" name="email" placeholder="Email Supplier">                        
                    </div>
                    
                    
                    
                </div><!-- /.item -->

                 <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>supplier" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
              
               
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

          </section><!-- right col -->
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
  
   