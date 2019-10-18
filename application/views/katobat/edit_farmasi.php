<section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>PRODUK OBAT</b>
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
                <?php
                          $kode=($this->session->userdata('koderole'));
                   if($kode !='10' && $kode !='15'):?>
                <i class="fa fa-pencil"></i>
                <h3 class="box-title">EDIT DATA</h3>
                 <?php endif;?> 
                   <?php
                          $kode=($this->session->userdata('koderole'));
                   if($kode =='10' || $kode =='15'):?>
                <i class="fa fa-pencil"></i>
                <h3 class="box-title">APPROVE</h3>
                 <?php endif;?> 
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                  <div class="panel panel-primary"></div>
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>Obattr/updatefarmasihead" method="POST" enctype="multipart/form-data">
                 <input type="hidden" class="form-control" value="<?php echo $idpr2;?>" name="idpr2">    
                  <input type="hidden" class="form-control" value="<?php echo $kode_th;?>" name="kode_th">
                    <div class="col-lg-6">       
                 <div class="form-group">
                      <label for="">NAMA PRINSIPAL</label>
                       <select id="koper" name="koper" class="form-control">
                          <option value="-">--NAMA PRINSIPAL--</option>
                            <?php foreach($prins as $data) {
                          if(!in_array($data['koper'],$for_prins)){ ?>
                              <option  value="<?php echo $data['koper'] ?>"><?php echo $data['nm_perusahaan'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['koper'] ?>"><?php echo  $data['nm_perusahaan'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                   <div class="form-group">
               <label for="">KODE DISTRIBUTOR</label>
                     <input type="text" name="kodis" class="form-control" value="<?php echo $kodis; ?>" readonly>
                 </div>
                 <div class="form-group">
               <label for="">NAMA DISTRIBUTOR</label>
                       <input type="text" name="nm_distributor" class="form-control" value="" readonly>
                 </div>


              <div class="form-group" hidden>
                     <label for="">TANGGAL</label>
                      <input type="text" class="form-control" id="datepicker11" value="<?php echo $tanggal_tr; ?>"  name="tanggal_tr">
                    </div>
               </div>
                  <div class="col-lg-6">
                  
                    <input type="hidden" name="id_tipe_produk" class="form-control" value="<?php echo $id_tipe_produk; ?>" readonly>
                 </div></div>
                   </div></div>
                     <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>Obattr/addtrfarmasi/<?php echo $kode_th; ?>/<?php echo $tanggal_tr; ?>" class="btn btn-warning btn-block btn-flat">Kembali</a>
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
