

      <section class="content-header">
        <h1>
          <b>EDIT DATA SETUP DISTRIBUTOR</b>
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
                <h3 class="box-title">EDIT SETUP DISTRIBUTOR</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>C_mstsetdis/update" method="POST" enctype="multipart/form-data">
                  
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $idsetdis; ?>" id="" name="idsetdis">
                    </div>

                                       
                    <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">PERUSAHAAN</label>
                         <select id="koper" name="koper" class="form-control chosen" required>
                          <option required></option>
                            <?php foreach($prins as $data) {
                          if(!in_array($data['koper'],$for_prinsw)){ ?>
                              <option  value="<?php echo $data['koper'] ?>" required><?php echo $data['nm_perusahaan'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['koper'] ?>" required><?php echo  $data['nm_perusahaan'] ?></option>
                          <?php }} ?>
                        </select>  
                    </div>

                    <div class="form-group">
                      <label for="">DISTRIBUTOR</label>
                         <select id="kodis" name="kodis" class="form-control chosen" required>
                          <option required></option>
                            <?php foreach($ini as $data) {
                          if(!in_array($data['kodis'],$for_thisw)){ ?>
                              <option  value="<?php echo $data['kodis'] ?>" required><?php echo $data['nm_distributor'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['kodis'] ?>" required><?php echo  $data['nm_distributor'] ?></option>
                          <?php }} ?>
                        </select>  
                    </div>
                    </div>
                  </div>
                  </div>
                                                                     
                   
                           </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>C_mstsetdis" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div>
               </form>   
             </div>
           </div>
         </div>
       </section>
     </div>
   </section>
    
    

