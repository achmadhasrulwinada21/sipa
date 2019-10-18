<section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>ANGGARAN REALISASI</b>
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
                  <form role="form" action="<?php echo base_url(); ?>form_kegiatan/savedata_real" method="POST" enctype="multipart/form-data">
                    <table class="table-common">
                         
                      
                 <div class="panel panel-primary"></div>
                 <?php  foreach ($data_abkss as $ab) {
                   
                 ?> <div class="col-lg-12">
              <div class="col-lg-3">
                     <input type="hidden" class="form-control" value="<?php echo $abk->idfkeg ?>" id="" name="kode_angreal" style="background-color:#7FFFD4">                              
                               
                      <div class="form-group">
                      <label for="">Kegiatan</label>
                        <select name="rincian_kegiatan[]" class="form-control" required readonly style="background-color:#7FFFD4">
                          <option value="<?php echo $ab['rincian_kegiatan'] ?>"><?php echo $ab['nama_sesi'] ?></option>
                          
                        </select>    
                    </div>

                  </div>
                    <div class="col-lg-3">

                    <div class="form-group">
                      <label for="">Rincian Kegiatan</label>
                       <input type="text" class="form-control" value="<?php echo $ab['kegiatan'] ?>" name="kegiatan[]" id="" readonly style="background-color:#7FFFD4"/>                 
                    </div>

                  </div>
                    <div class="col-lg-1">

                    <div class="form-group">
                      <label for="">Qty</label>
                       <input type="text" class="form-control" value="<?php echo $ab['jumlah'] ?>" name="jumlah[]" id="" readonly style="background-color:#7FFFD4"/>                 
                    </div>
                 </div>
                    <div class="col-lg-2">

                  <div class="form-group">
                  <label for="">Harga</label>
                  <input type="text" class="form-control" value="<?php echo $ab['harga'] ?>" name="harga[]" id="" placeholder="harga" readonly style="background-color:#7FFFD4"/> </div> 

                  </div>
                  <div class="col-lg-1">
                      <div class="form-group">
                  <label for="">Qty Real</label>
                  <input onkeypress="return wajibAngka(event)" type="text" class="form-control" value="<?php echo $ab['jumlah'] ?>" name="jumlah_real[]" placeholder="qty" id="" required/> </div> 
                  </div>

                    <div class="col-lg-2">
                      <div class="form-group">
                  <label for="">Harga Real</label>
                  <input onkeypress="return wajibAngka(event)" type="text" class="form-control"  value="<?php echo $ab['harga'] ?>"  name="harga_real[]" id="" placeholder="harga realisasi" required/> </div> 
                  </div><br><br><br><br>
                  <div class="panel panel-primary"></div>
                   </div>
                    <?php } ?>
          <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat" onclick="return confirm('Apakah Data Detail Sudah Terisi ?... ');">Simpan</button>
                  <a href="<?php echo base_url(); ?>form_kegiatan/disetujui_rencana" class="btn btn-warning btn-block btn-flat">Kembali</a>
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
                  
                     <td width="120">NAMA ACARA</td><td width="10">:</td><td width="300"><?php echo $abk->nama_kegiatan ?> </td></tr>
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
                      <th style="vertical-align: middle;text-align: center;">Kegiatan</th>
                      <th style="vertical-align: middle;text-align: center;">Rincian Kegiatan</th>
                      <th style="vertical-align: middle;text-align: center;">Jumlah</th>
                      <th style="vertical-align: middle;text-align: center;">Harga</th>
                       <th style="vertical-align: middle;text-align: center;">JUMLAH Realisasi</th>
                      <th style="vertical-align: middle;text-align: center;">Harga Realisasi</th>
                     <!--  <th style="vertical-align: middle;text-align: center;">Perencanaan</th>
                      <th style="vertical-align: middle;text-align: center;">Realisasi</th>
                      <th style="vertical-align: middle;text-align: center;">Selisih</th> -->
                      <th style="vertical-align: middle;text-align: center;">Aksi</th>
                                                       
                    </tr>
                  </thead>
                  <tbody>
                   <?php $no=0;
                    
                     foreach($data_abks as $row) { 
                               $no++                              
                             
                      ?>
                    <tr class="info">
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['nama_sesi']; ?></td>
                      <td><?php echo $row['kegiatan']; ?></td>
                      <td style="text-align: center;"><?php echo $row['jumlah']; ?></td>
                      <td>Rp.<?php echo (number_format($row['harga'], 0,',','.')); ?>,- </td>
                      <td><?php echo (number_format($row['jumlah_real'], 0,',','.')); ?></td>
                       <td>Rp.<?php echo (number_format($row['harga_real'], 0,',','.')); ?>,-</td>
                     <!--  <td>Rp.<?php //echo (number_format($row['perencanaan'], 0,',','.')); ?>,- </td>
                      <td>Rp.<?php// echo (number_format($row['realisasi'], 0,',','.')); ?>,-</td>
                       <td>Rp.<?php// echo (number_format($row['selisih'], 0,',','.')); ?>,-</td> -->
                      <td style="text-align: center;">
                      <a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>form_kegiatan/editreal/<?php echo $row['idangreal']; ?>"><i class="fa fa-edit"></i></a>                                         
                      <!-- <a style="margin-bottom:3px;" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_edit<?php //echo $row['idangreal'];?>"><i class="glyphicon glyphicon-remove"></i></a> -->
                     </td>
                      
                    </tr>
                              <?php
                    
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
        $idangreal = $i['idangreal'];
        $kode_angreal = $i['kode_angreal'];
        $rincian_kegiatan = $i['rincian_kegiatan'];
        $kegiatan = $i['kegiatan'];
        $jumlah = $i['jumlah'];
        $harga = $i['harga'];
        $harga_real = $i['harga_real'];
             
              
              
         ?>
<div id="modal_edit<?php echo $idangreal;?>" class="modal fade">
  <div class="modal-dialog modal-sm">
    <!-- <div class="modal-content"> -->
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">HAPUS</h4></td>
      </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>form_kegiatan/hapusreal" method="POST" enctype="multipart/form-data">
                  <div class="col-md-6">
                     <input type="hidden" class="form-control" value="<?php echo $idangreal;?>" id="" name="idangreal">
                      <input type="hidden" class="form-control" value="<?php echo $kode_angreal;?>" id="" name="kode_angreal">
                      <input type="hidden" class="form-control" value="<?php echo $rincian_kegiatan;?>" id="" name="rincian_kegiatan">
                      <input type="hidden" class="form-control" value="<?php echo $kegiatan;?>" id="" name="kegiatan">
                       <input type="hidden" class="form-control" value="<?php echo $jumlah;?>" id="" name="jumlah">
                      <input type="hidden" class="form-control" value="<?php echo $harga;?>" id="" name="harga">
                     <input type="hidden" class="form-control" value="<?php echo $harga_real;?>" id="" name="harga_real">

                    </div>
                             <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat">yakin hapus</button>
                   </div><!-- /.col -->                     
                   
                           </div><!-- /.item -->
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>
              <!-- END MODAL edit -->

