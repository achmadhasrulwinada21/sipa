

      <section class="content-header">
        <h1>
          <b>EDIT DATA PRODUK ALUM</b>
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
                <h3 class="box-title">EDIT ALUM</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>C_mstproduk/updatealum" method="POST" enctype="multipart/form-data">
                  
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $idproduk; ?>" id="" name="idproduk">
                      <input type="hidden" class="form-control" value="<?php echo $tipe_produk; ?>" id="" name="tipe_produk">
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">KODE PRODUK</label>&nbsp<label style="color: red;">*</label>
                        <input type="text" class="form-control" value="<?php echo $kode_produk; ?>" id="" name="kode_produk" readonly>
                    </div>

                    <div class="form-group">
                      <label for="">NAMA PRODUK</label>&nbsp<label style="color: red;">*</label>
                        <input type="text" class="form-control" value="<?php echo $nama_produk; ?>" id="" name="nama_produk" > 
                      </div> 

                      
                    <div class="form-group">
                      <label for="">SPESIFIKASI TEKNIS / TIPE</label>
                        <textarea  class="form-control" value="<?php echo $deskripsi; ?>" id="" name="deskripsi"><?php echo $deskripsi; ?></textarea>
                    </div>
			</div>

                   
		<div class="col-lg-6">
                    <div class="form-group">
                      <label for="">PERUSAHAAN</label>&nbsp<label style="color: red;">*</label>
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

                    <!--  <div class="form-group">
                      <label for="">HARGA</label>
                        <input type="text" class="form-control" value="<?php echo $harga; ?>" id="" name="harga" required>
                    </div> -->

                    <div class="form-group">
                      <label for="">VOLUME</label>
                        <input type="text" class="form-control" value="<?php echo $volume; ?>" id="" name="volume" > 
                      </div> 

                    <div class="form-group">
                      <label for="">SATUAN</label>
                         <select id="satuanid" name="satuanid" class="form-control chosen">
                          <option required></option>
                            <?php foreach($prinsss as $data) {
                          if(!in_array($data['satuanid'],$for_prinsss)){ ?>
                              <option  value="<?php echo $data['satuanid'] ?>" required><?php echo $data['satuannama'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['satuanid'] ?>" required><?php echo  $data['satuannama'] ?></option>
                          <?php }} ?>
                        </select>  
                    </div>

                     <div class="form-group">
                      <label for="">MERK</label>
                        <input type="text" class="form-control" value="<?php echo $merk; ?>" id="" name="merk">
                    </div>
 <div class="form-group">
                      <label for="">JENIS BARANG</label>&nbsp<label style="color: red;">*</label>
                         <select id="" name="kd_jns_brg" class="form-control chosen" required>
                          <option required></option>
                            <?php foreach($prinssss as $data) {
                          if(!in_array($data['kd_jns_brg'],$for_prinssss)){ ?>
                              <option  value="<?php echo $data['kd_jns_brg'] ?>" required><?php echo $data['jns_barang'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['kd_jns_brg'] ?>" required><?php echo  $data['jns_barang'] ?></option>
                          <?php }} ?>
                        </select>  
                    </div>
                   
                    </div>
                  </div>
                                                                     
                   
                           </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>C_mstproduk/alum" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div>
               </form>   
             </div>
           </div>
         </div>
       </section>
     </div>
   </section>
    
    

