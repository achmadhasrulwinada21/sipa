<section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>SUMBER DANA</b>
        </h4>
        
        </section>
 
        <!-- Main content -->
        <section class="content">

           <div class="box">
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">TAMBAH DATA</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>form_kegiatan/savedata_dana" method="POST" enctype="multipart/form-data">
                    <table class="table-common">
                         
                      
                 <div class="panel panel-primary"></div>
              <div class="col-lg-4">
                    
                     <input type="hidden" class="form-control" value="<?php echo $abk->idfkeg ?>" id="" name="kode_dana">                              
                               
                    <div class="form-group">
                      <label for="">Sumber Dana</label>
                       <input type="text" class="form-control" value="" name="sumber_dana" id="" placeholder="sumber dana" required/>                 
                    </div>

                  </div>
                    <div class="col-lg-4">
                 
                    <div class="form-group">
                      <label for="">JUMLAH</label>
                       <input type="text" onkeypress="return wajibAngka(event)" class="form-control" value="" name="qty" id="" placeholder="jumlah" required/>                 
                    </div>

                    </div>
                    <div class="col-lg-4">

                  <div class="form-group">
                  <label for="">HARGA</label>
                  <input type="text" onkeypress="return wajibAngka(event)" class="form-control" value="" name="harga" id="" placeholder="harga" required/> </div> 
                  </div>
          <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit">Simpan</button>
                  <a href="<?php echo base_url(); ?>form_kegiatan" class="btn btn-warning btn-block btn-flat">Kembali</a>
               </div>
                </table>
                
                
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Chat box -->
            
              
          
          <div class="row">
            <div class="col-md-12">
                      
              
              <div class="box">
                 

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        
       
           <!-- <?php  // foreach($data_abk as $row) { ?> -->
              <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr>
                  
                     <td width="80">NAMA ACARA</td><td width="10">:</td><td width="300"><?php echo $abk->nama_kegiatan ?> </td></tr>
                     <?php if($abk->departemen !='-' and $abk->nama_rs =='-' ): ?>
                      <tr>  <td width="100">DEPARTEMEN</td><td width="10">:</td><td width="300"><?php echo $abk->departemen ?> </td></tr>
                      <?php endif;?>
                       <?php if($abk->nama_rs !='-' and $abk->departemen =='-' ): ?>
                    <tr>   <td width="100">RUMAH SAKIT</td><td width="10">:</td><td width="300"><?php echo $abk->nama_rs ?> </td>
                   </tr>
                   <?php endif;?>
                    <tr>   <td width="120">TANGGAL ACARA</td><td width="10">:</td><td width="300"><?php echo $abk->tanggal_acara ?> </td>
                   </tr>
                    <!-- <?php// } ?> -->
                 </table>
                 <br>
                </div><!-- /.box-title -->
                <div class="table-responsive">
                <div class="box-body">

                  <table id="tb-datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr align="center" class="danger">
                      <th style="vertical-align: middle;text-align: center;">No</th>
                      <th style="vertical-align: middle;text-align: center;">Sumber Dana</th>
                      <th style="vertical-align: middle;text-align: center;">JUMLAH</th>
                      <th style="vertical-align: middle;text-align: center;">HARGA</th>
                      <th style="vertical-align: middle;text-align: center;">TOTAL</th>
                       <th style="vertical-align: middle;text-align: center;">AKSI</th>
                                                       
                    </tr>
                  </thead>
                  <tbody>
                   <?php $no=0;
                    
                     foreach($data_abks as $row) { 
                               $no++                              
                             
                      ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['sumber_dana']; ?></td>
                      <td style="text-align: center;"><?php echo $row['qty']; ?></td>
                      <td>Rp.<?php echo (number_format($row['harga'], 2,',','.')); ?></td>
                      <td>Rp.<?php echo (number_format($row['total'], 2,',','.')); ?></td>
                       <td>                                          
                     <a style="margin-bottom:3px;" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $row['iddana'];?>"><i class="glyphicon glyphicon-remove"></i></a>
                     </td>
                      
                    </tr>
                              <?php
                    // SUB TOTAL per sesi
                             }?>
                  </tbody>
                
                </table>
               </div>
              
                <!-- /.col -->
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Main row -->
       
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

<?php
        foreach($data_abks as $i){
        $iddana = $i['iddana'];
        $kode_dana = $i['kode_dana'];
        $sumber_dana = $i['sumber_dana'];
        $qty = $i['qty'];
        $harga = $i['harga'];
             
              
              
         ?>
<div id="modal_edit<?php echo $iddana;?>" class="modal fade">
  <div class="modal-dialog modal-sm">
    <!-- <div class="modal-content"> -->
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">HAPUS</h4></td>
      </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>form_kegiatan/hapusdana" method="POST" enctype="multipart/form-data">
                  <div class="col-md-6">
                     <input type="hidden" class="form-control" value="<?php echo $iddana;?>" id="" name="iddana">
                      <input type="hidden" class="form-control" value="<?php echo $kode_dana;?>" id="" name="kode_dana">
                      <input type="hidden" class="form-control" value="<?php echo $sumber_dana;?>" id="" name="sumber_dana">
                      <input type="hidden" class="form-control" value="<?php echo $qty;?>" id="" name="qty">
                      <input type="hidden" class="form-control" value="<?php echo $harga;?>" id="" name="harga">
                     

                    </div>
                             <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat">yakin hapus</button>
                   </div><!-- /.col -->                     
                   
                           </div><!-- /.item -->
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>
              <!-- END MODAL edit -->

