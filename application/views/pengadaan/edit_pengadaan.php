  <?php 

  $kd_role=$this->session->userdata('koderole');

  $kd_approval=$this->session->userdata('approval');
  ?>



<section class="content-header">
    <h1>
        Edit Data
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <a href="#"><i class="fa fa-suitcase"></i>Form Edit</a>
        <li class="active"></li>
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
                  <form role="form" action="<?php echo base_url(); ?>pengadaan/updatepengadaan" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
					<div class="form-group">
                      <label for="">ID</label>
                        <input type="text" class="form-control" value="<?php echo $id_pengadaan; ?>" id="" name="id_pengadaan" readonly>
					</div>
                    <div class="form-group">
                      <label for="">NO PKS</label>
                        <input type="text" class="form-control" value="<?php echo $no_pks; ?>" id="" name="no_pks">
                    </div>

                    <div class="form-group">
                      <label for="">RS / PT</label>
                        <select name="rs" class="form-control" >
                          <option>--Pilih RS / PT--</option>
                      
                            <?php foreach($rs as $namars) {

                          if(!in_array($namars['namars'],$rs_post)){ ?>
                              <option  value="<?php echo $namars['namars'] ?>"><?php echo $namars['namars'] ?></option> 

                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $namars['namars'] ?>"><?php echo $namars['namars'] ?></option>


                          <?php }} ?>

                        </select> 
                    </div>
                    <div class="form-group">
                      <label for="">REKANAN</label>
                        <input type="text" class="form-control" value="<?php echo $rekanan; ?>" id="" name="rekanan" required>                        
                    </div>
                    <div class="form-group">
                      <label for="">TENTANG</label>
                        <input type="text" class="form-control" value="<?php echo $tentang; ?>" id="" name="tentang" required>                        
                    </div>
                    
                         <div class="form-group">
                      <label for="">TANGGAL PERJANJIAN</label>
                        <input type="date" class="form-control" value="<?php echo $tanggal_perjanjian; ?>" id="" name="tanggal_perjanjian">                        
                    </div>
                    <div class="form-group">
                      <label for="">JANGKA WAKTU PERJANJIAN</label>
                        <input type="text" class="form-control" value="<?php echo $jangka_waktu; ?>" id="" name="jangka_waktu">                        
                    </div>

                    <div class="form-group">
                      <label for="">HARGA / DISKON</label>
                        <input type="text" class="form-control" value="<?php echo $harga; ?>" id="" name="harga">                        
                    </div>
                    <div class="form-group">
                      <label for="">HAK DAN KEWAJIBAN (RS)</label>
                        <textarea type="text" class="form-control" id="" name="hak_rs"><?php echo $hak_rs; ?></textarea>                        
                    </div>
                    <div class="form-group">
                      <label for="">HAK DAN KEWAJIBAN (REKANAN)</label>
                         <textarea type="text" class="form-control" id="" name="hak_rekanan"><?php echo $hak_rekanan; ?></textarea>                       
                    </div>
                    <div class="form-group">
                      <label for="">PIC</label>
                        <input type="text" class="form-control" value="<?php echo $pic; ?>" id="" name="pic">                        
                    </div>
                    <div class="form-group">
                      <label for="">
                      STATUS</label>
                        <input type="text" class="form-control" value="<?php echo $status; ?>" id="" name="status">                        
                    </div>

                  </div>
                  </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>pengadaan" class="btn btn-warning btn-block btn-flat">Kembali</a>
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
   