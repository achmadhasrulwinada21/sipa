 <section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>EDIT DATA RENCANA KENDALI ANGGARAN TENAGA KERJA RS BARU</b>
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
                <h3 class="box-title">EDIT DATA RENCANA KENDALI ANGGARAN</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>detailnota/updatedetail" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                           <?php if($this->session->userdata('koderole')=='18'):?>
                    <div class="form-group">
                   
                      <label for=""></label>
                        <input type="hidden" class="form-control" value="<?php echo $id_nota;?>" id="" name="id_nota" placeholder="" readonly="" >
                    </div>

                    <div class="form-group">

                      <label for="">Nama Kegiatan</label>
                        <input type="text" class="form-control" value="<?php echo $nama_kegiatan; ?>" id="" name="nama_kegiatan" placeholder="Nama Kegiatan" required>
                    </div>

                 <!--  <div class="form-group">
                      <label for="">Nama Rumah Sakit</label>
                        <input type="text" class="form-control" value="<?php echo $nama_rs; ?>"  name="nama_rs" placeholder="Nama Rumah Sakit"  readonly>
                    </div>
 -->
                    <div class="form-group">
                      <label for="">Nama Rumah Sakit</label>
                        <select name="nama_rs" class="form-control">
                          <option>--Pilih Nama RS--</option>
                      
                            <?php foreach($rs as $datakd) {

                          if(!in_array($datakd['koders'],$rs_post_array)){ ?>
                              <option  value="<?php echo $datakd['koders'] ?>"><?php echo $datakd['namars'] ?></option> 

                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datakd['koders'] ?>"><?php echo $datakd['namars'] ?></option>


                          <?php }} ?>

                        </select> 
                    </div>

                   

                    <div class="form-group">
                      <label for="">Nama Perusahaan</label>
                        <select name="nama_pt" class="form-control" >
                          <option>--Pilih Perusahaan--</option>
                      
                            <?php foreach($perusahaan as $datapt) {

                          if(!in_array($datapt['kodep'],$pt_post)){ ?>
                              <option  value="<?php echo $datapt['kodep'] ?>"><?php echo $datapt['nm_perusahaan'] ?></option> 

                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datapt['kodep'] ?>"><?php echo $datapt['nm_perusahaan'] ?></option>


                          <?php }} ?>

                        </select> 
                    </div>

                    <div class="form-group">
                      <label for="">Kontraktor</label>
                        <select name="kontraktor" class="form-control" >
                          <option>--Pilih Kontraktor--</option>
                      
                            <?php foreach($supplier as $datasupp) {

                          if(!in_array($datasupp['kode_supplier'],$supp_post)){ ?>
                              <option  value="<?php echo $datasupp['kode_supplier'] ?>"><?php echo $datasupp['nama_supplier'] ?></option> 

                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datasupp['kode_supplier'] ?>"><?php echo $datasupp['nama_supplier'] ?></option>


                          <?php }} ?>

                        </select> 
                    </div>

                    <!-- <div class="form-group">
                      <label for="">Kontraktor</label>
                        <input type="text" class="form-control" value="<?php echo $kontraktor; ?>" name="kontraktor" placeholder="Kontraktor"  readonly>                        
                    </div>
 -->
                      <div class="form-group">
                      <label for="">PO</label>
                        <input type="text" class="form-control" value="<?php echo $po; ?>" id="" name="po" placeholder="PO" >                        
                    </div>

                    <div class="form-group">
                      <label for="">No Giro Cek</label>
                        <input type="text" class="form-control" value="<?php echo $no_girocek; ?>" id="" name="no_girocek" placeholder="No Giro Cek" required>                        
                    </div>

                    <div class="form-group">
                      <label for="">Rencana Pembayaran</label>
                        <input type="text" class="form-control" value="<?php echo $renc_pembayaran; ?>" id="" name="renc_pembayaran" placeholder="Rencana Pembayaran" required>                        
                    </div>
                    
                    <div class="form-group">
                      <label for="">Bulan Dibayar</label>
                        <input type="date" class="form-control" value="<?php echo $bulan_dibayar;?>" id="" name="bulan_dibayar" required>                        
                    </div>
                    
                    <div class="form-group">
                      <label for="">Keterangan</label>
                        <input type="text" class="form-control" value="<?php echo $keterangan; ?>" id="" name="keterangan" placeholder="Keterangan" >                        
                    </div>

                <?php endif;?>
             
                     <?php
                    $edit=($this->session->userdata('koderole'));

                  if($edit=='7' OR $edit=='10' OR $edit=='25' OR $edit=='26' OR $edit=='27' OR $edit=='29' OR $edit=='28' OR $edit=='17'):?>
                    <div class="form-group">
                   
                      <label for=""></label>
                        <input type="hidden" class="form-control" value="<?php echo $id_nota;?>" id="" name="id_nota" placeholder="" readonly="" >
                    </div>

                    <div class="form-group">

                      <label for="">Nama Kegiatan</label>
                        <input type="text" class="form-control" value="<?php echo $nama_kegiatan; ?>" id="" name="nama_kegiatan" placeholder="Nama Kegiatan" required>
                    </div>

                 <div class="form-group">
                      <label for="">Nama Rumah Sakit</label>
                        <input type="text" class="form-control" value="<?php echo $nama_rs; ?>"  name="nama_rs" placeholder="Nama Rumah Sakit"  readonly>
                    </div>
 
                           <div class="form-group">
                      <label for="">Nama Perusahaan</label>
                        <input type="text" class="form-control" value="<?php echo $nama_pt; ?>"  name="nama_pt" placeholder="Nama Perusahaan"  readonly>
                    </div>
                   
                    <div class="form-group">
                      <label for="">Kontraktor</label>
                        <input type="text" class="form-control" value="<?php echo $kontraktor; ?>" name="kontraktor" placeholder="Kontraktor"  readonly>                        
                    </div>

                      <div class="form-group">
                      <label for="">PO</label>
                        <input type="text" class="form-control" value="<?php echo $po; ?>" id="" name="po" placeholder="PO" readonly>                        
                    </div>

                    <div class="form-group">
                      <label for="">No Giro Cek</label>
                        <input type="text" class="form-control" value="<?php echo $no_girocek; ?>" id="" name="no_girocek" placeholder="No Giro Cek" readonly>                        
                    </div>

                    <div class="form-group">
                      <label for="">Rencana Pembayaran</label>
                        <input type="text" class="form-control" value="<?php echo $renc_pembayaran; ?>" id="" name="renc_pembayaran" placeholder="Rencana Pembayaran" readonly>                        
                    </div>
                    
                    <div class="form-group">
                      <label for="">Bulan Dibayar</label>
                        <input type="date" class="form-control" value="<?php echo $bulan_dibayar;?>" id="" name="bulan_dibayar" readonly>                        
                    </div>
                    
                    <div class="form-group">
                      <label for="">Keterangan</label>
                        <input type="text" class="form-control" value="<?php echo $keterangan; ?>" id="" name="keterangan" placeholder="Keterangan" readonly >                        
                    </div>

                    <?php endif;?>

                </div><!-- /.item -->

                 <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>detailnota" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
              
               
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

          </section><!-- right col -->
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
  