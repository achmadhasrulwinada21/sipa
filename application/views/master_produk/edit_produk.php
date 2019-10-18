

      <section class="content-header">
        <h1>
          <b>EDIT DATA PRODUK</b>
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
                <h3 class="box-title">EDIT OBAT</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>C_mstproduk/update" method="POST" enctype="multipart/form-data">
                  
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $idobat; ?>" id="" name="idobat">
                      <input type="hidden" class="form-control" value="<?php echo $tipe_produk; ?>" id="" name="tipe_produk">
                    </div>
                    <div class="col-lg-12">
          </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">KODE OBAT</label>
                        <input type="text" class="form-control" value="<?php echo $kode_obat; ?>" id="" name="kode_obat" readonly>
                    </div>

                    <div class="form-group">
                      <label for="">NAMA OBAT</label>
                        <input type="text" class="form-control" value="<?php echo $nama_obat; ?>" id="" name="nama_obat" > 
                      </div> 

                      <div class="form-group">
                      <label for="">KOMPOSISI</label>
                        <textarea class="form-control" value="<?php echo $komposisi; ?>" id="" name="komposisi"><?php echo $komposisi; ?> </textarea> 
                      </div> 

                      <div class="form-group">
                      <label for="">GOLONGAN</label><br>
                         <select id="golonganid" name="golonganid" class="form-control chosen" required>
                          <option required></option>
                            <?php foreach($prinsss as $data) {
                          if(!in_array($data['klasifikasiid'],$for_prinsss)){ ?>
                              <option  value="<?php echo $data['klasifikasiid'] ?>" required><?php echo $data['klasifikasinama'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['klasifikasiid'] ?>" required><?php echo  $data['klasifikasinama'] ?></option>
                          <?php }} ?>
                        </select>  
                    </div>

                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">PERUSAHAAN</label><br>
                         <select id="koper" name="koper" class="form-control chosen" required>
                          <option required></option>
                            <?php foreach($prins as $data) {
                          if(!in_array($data['koper'],$for_prins)){ ?>
                              <option  value="<?php echo $data['koper'] ?>" required><?php echo $data['nm_perusahaan'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['koper'] ?>" required><?php echo  $data['nm_perusahaan'] ?></option>
                          <?php }} ?>
                        </select>  
                    </div>

                    <div class="form-group">
                      <label for="">DISTRIBUTOR</label><br>
                         <select id="kodis" name="kodis" class="form-control chosen" required>
                          <option required></option>
                            <?php foreach($prinss as $data) {
                          if(!in_array($data['kodis'],$for_prinss)){ ?>
                              <option  value="<?php echo $data['kodis'] ?>" required><?php echo $data['nm_distributor'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['kodis'] ?>" required><?php echo  $data['nm_distributor'] ?></option>
                          <?php }} ?>
                        </select>  
                    </div>


                    <div class="form-group">
                      <label for="">HARGA</label>
                        <input type="text" class="form-control" value="<?php echo $harga; ?>" id="" name="harga" > 
                      </div>

                      <div class="form-group">
                      <label for="">DISKON</label>
                        <input type="text" class="form-control" value="<?php echo $discount; ?>" id="" name="discount" > 
                      </div>
                    
                    

                      <div class="form-group">
                      <label for="">SATUAN</label><br>
                         <select id="satuanid" name="satuanid" class="form-control chosen" required>
                          <option required></option>
                            <?php foreach($prinssss as $data) {
                          if(!in_array($data['satuanid'],$for_prinssss)){ ?>
                              <option  value="<?php echo $data['satuanid'] ?>" required><?php echo $data['satuannama'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['satuanid'] ?>" required><?php echo  $data['satuannama'] ?></option>
                          <?php }} ?>
                        </select>  
                    </div>

                   <!-- <div class="form-group">
                      <label for="">PERSENTASE</label>
                        <input type="text" class="form-control" value="<?php echo $persentase; ?>" id="" name="persentase" > 
                      </div>

                      <div class="form-group">
                      <label for="">MERK</label>
                        <input type="text" class="form-control" value="<?php echo $merk; ?>" id="" name="merk" > 
                      </div> -->


                    </div>
                  </div>
                                                                     
                   
                           </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>C_mstproduk" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div>
               </form>   
             </div>
           </div>
         </div>
       </section>
     </div>
   </section>
    
    

