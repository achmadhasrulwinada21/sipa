<section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>LISTING PRODUK ALAT KESEHATAN</b>
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
                          $kodedara=($this->session->userdata('koderole'));
                   if($kodedara !='10' && $kodedara !='57' && $kodedara !='82'):?>
                <i class="fa fa-pencil"></i>
                <h3 class="box-title">EDIT DATA</h3>
                 <?php endif;?> 
                   <?php
                          $dara21=($this->session->userdata('koderole'));
                   if($dara21 =='10' || $dara21 =='57' || $dara21 =='82'):?>
                <i class="fa fa-pencil"></i>
                <h3 class="box-title">APPROVE</h3>
                 <?php endif;?> 
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                  <div class="panel panel-primary"></div>
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>Alkestransaksi/updatealkeshead" method="POST" enctype="multipart/form-data">
                 <input type="hidden" class="form-control" value="<?php echo $idpr2;?>" name="idpr2">    
                  <input type="hidden" class="form-control" value="<?php echo $kode_trans;?>" name="kode_trans">
                    <div class="col-lg-6">       
                 <div class="form-group">
                      <label for="">PERUSAHAAN</label>
                       <select id="koper" name="koper" class="form-control">
                          <option value="-">--PERUSAHAAN--</option>
                            <?php foreach($prins as $data) {
                          if(!in_array($data['koper'],$for_prins)){ ?>
                              <option  value="<?php echo $data['koper'] ?>"><?php echo $data['nm_perusahaan'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['koper'] ?>"><?php echo  $data['nm_perusahaan'] ?></option>
                          <?php }} ?>
                        </select> 
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
                  <a href="<?php echo base_url(); ?>Alkestransaksi/addtralkes/<?php echo $tanggal_tr; ?>/<?php echo $kode_trans; ?>" class="btn btn-warning btn-block btn-flat">Kembali</a>
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
