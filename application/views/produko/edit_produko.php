<section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>PRODUK</b>
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
                <h3 class="box-title">EDIT DATA</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                  <div class="panel panel-primary"></div>
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>produko/updateprod" method="POST" enctype="multipart/form-data">
                  
                   <input type="hidden" class="form-control" value="<?php echo $idpr;?>" name="idpr">
                      

                      <div class="form-group">

                     <div hidden class="form-group">
                      <label for="">KODE TRANSAKSI</label>
                        <input type="text" name="prid" class="form-control" value="<?php echo $prid; ?>" readonly>
                          
                  </div>

                  
                    

                     <div class="form-group">
                      <label for="">NAMA PRINSIPAL</label><br>
                       <select id="pabrik_id" name="pabrik_id" class="chosen" required>
                          <option required></option>
                            <?php foreach($prins as $data) {
                          if(!in_array($data['pabrik_id'],$for_prins)){ ?>
                              <option  value="<?php echo $data['pabrik_id'] ?>" required><?php echo $data['nama_pt'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['pabrik_id'] ?>" required><?php echo  $data['nama_pt'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                    <input type="hidden" name="nama_pt" class="form-control" value="<?php echo $nama_pt; ?>" readonly>
                    <input type="hidden" name="pabriknama" class="form-control" value="<?php echo $pabriknama; ?>" readonly>
            <div class="form-group">
               <label for="">Kode Distributor</label>
                     <input type="text" name="s_kode" class="form-control" value="<?php echo $s_kode; ?>">
                 </div>

                  <div class="form-group">
                  <input type="hidden" name="tipe_produk" class="form-control" value="<?php echo $tipe_produk; ?>" readonly>
                 </div>

                    <!--   <div class="form-group">
                      <label for="">NAMA DISTRIBUTOR</label>
                       <select name="s_kode" class="form-control">
                          <option value="-">--NAMA DISTRIBUTOR--</option>
                            <?php //foreach($distr as $data) {
                        //  if(!in_array($data['s_kode'],$for_distr)){ ?>
                              <option  value="<?php //echo $data['s_kode'] ?>"><?php// echo $data['s_kode'] ?></option> 
                               <?php //} else { ?>
                              <option selected="selected" value="<?php //echo $data['s_kode'] ?>"><?php //echo  $data['s_kode'] ?></option>
                          <?php// }} ?>
                        </select> 
                    </div> -->

                     <div class="form-group">
                    <input type="hidden" class="form-control" value="<?php echo $createby;?>" name="createby" placeholder="" readonly="" >
                      </div> 
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $createdate;?>" name="createdate" placeholder="" readonly="" >
                      </div>

                       </div></div>
                     <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>produko" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div>
                </div><!-- /.item -->

                 <!-- /.col -->
              
               
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

          </section><!-- right col -->
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
