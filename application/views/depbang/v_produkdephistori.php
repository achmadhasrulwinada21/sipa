	<section class="content-header">
        <h4 style="text-align: center;">
          <b><span> Data Produk Depbang Out Standing<br>
          </span></b>
        </h4>
        </section>
               
        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <section class="col-lg-12">
            <!-- Chat box -->
            
            <div class="box">       
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                 <a style="margin-top:5px;" class="btn btn-success btn-md" href="<?php echo base_url(); ?>Depbangtr"><i class="glyphicon glyphicon-home"></i>&nbsp KEMBALI</a><br>
                <div class="item">
                 
            <div  class="col-md-12">
                      <br>                

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        
                     
                </div><!-- /.box-title -->
               
                <div class="table-responsive">
                  <table id="table88" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr bgcolor="#4682B4" style="font-family: arial; color: white;">
                    <th style="vertical-align: middle; text-align: center;">No</th>
                    <th style="vertical-align: middle; text-align: center;">Perusahaan</th>
                  <th style="vertical-align: middle; text-align: center;">Nama Produk</th>
                    <th style="vertical-align: middle; text-align: center;">Tanggal</th>
                    <th style="vertical-align: middle; text-align: center;">catatan perusahaan</th>
                    <th style="vertical-align: middle; text-align: center;">catatan produk</th>
                    <th style="vertical-align: middle; text-align: center;">Detail</th>
                    <?php
                    $kode=($this->session->userdata('koderole'));
                     if($kode !='10' and $kode !='59' and $kode !='70'  and $kode !='82'): ?>
                    <th style="vertical-align: middle; text-align: center;">Update</th>
                  <?php endif; ?>
                    <th style="vertical-align: middle; text-align: center;">Approve</th>
                    <?php
                    $kode=($this->session->userdata('koderole'));
        if($kode !='68'): ?>
                    <th style="vertical-align: middle; text-align: center;">Reject</th>
                  <?php endif; ?>
                </tr>
            </thead>
            <tbody>
            </tbody>
 
            <tfoot>
                   <tr bgcolor="grey" style="font-family: arial; color: white;">
                     <th style="vertical-align: middle; text-align: center;">No</th>
                    <th style="vertical-align: middle; text-align: center;">Perusahaan</th>
                     <th style="vertical-align: middle; text-align: center;">Nama Produk</th>
                    <th style="vertical-align: middle; text-align: center;">Tanggal</th>
                    <th style="vertical-align: middle; text-align: center;">catatan perusahaan</th>
                    <th style="vertical-align: middle; text-align: center;">catatan produk</th>
                    <th style="vertical-align: middle; text-align: center;">Detail</th>
                    <?php
                    $kode=($this->session->userdata('koderole'));
                     if($kode !='10' and $kode !='59' and $kode !='70'  and $kode !='82'): ?>
                    <th style="vertical-align: middle; text-align: center;">Update</th>
                  <?php endif; ?>
                    <th style="vertical-align: middle; text-align: center;">Approve</th>
                    <?php
                    $kode=($this->session->userdata('koderole'));
        if($kode !='68'): ?>
                    <th style="vertical-align: middle; text-align: center;">Reject</th>
                  <?php endif; ?>
                  </tr>
            </tfoot>
        </table>
              
          </div><!-- /.col -->
           <br>
        </div>
        </div><!-- /.row -->

    <!-- /.content -->


<?php
      foreach($data_prod as $i){
       $iddetilalum = $i['iddetilalum'];        
         ?>

<div id="modal_edit<?php echo $iddetilalum;?>" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content modal-lg"> 
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">DETAIL</h4></td>
      </div>
        <div class="modal-body modal-lg">
          <?php 
              $this->load->model('produkom2');
          if (isset($iddetilalum)) {
      
    $tampil= $this->produkom2->Getprodukms2alum("where iddetilalum='$iddetilalum' and (statusdetil='1'
      or statusdetil='01' or statusdetil='2' or statusdetil='3' or statusdetil='4' or statusdetil='82')")->result_array();
    $prod = $this->db->get_where('v_produkodepbang',['iddetilalum'=>$iddetilalum])->row();

    }
        ?>
                        <?php include 'tampil_produkdephistori.php';?>
                 
                </div>                
                   
                           </div>
                
               
 
              </div></div></div></div> 
             <?php } ?>


<?php
        foreach($data_prod as $i){
       $iddetilalum=$i['iddetilalum'];
      $kode_th = $i['kode_th'];
      $kode_tr = $i['kode_tr'];
      $koper = $i['koper'];
      $nama_produk = $i['nama_produk'];
       ?>
<div id="modal_edits<?php echo $iddetilalum;?>" class="modal fade">
  <div class="modal-dialog modal-md">
    <!-- <div class="modal-content"> --> 
  <div class="panel panel-primary">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Reject</h4></td>
      </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>Depbangtr/updateaprovedetil2" method="POST" enctype="multipart/form-data">
                  <div class="col-md-6">
                     <input type="hidden" class="form-control" value="<?php echo $iddetilalum;?>" id="" name="iddetilalum">
                      <input type="hidden" class="form-control" value="<?php echo $kode_tr;?>" id="" name="kode_tr">
                      <input type="hidden" class="form-control" value="<?php echo $kode_th;?>" id="" name="kode_th">
                      <input type="hidden" class="form-control" value="<?php echo $koper;?>" id="" name="koper">
                      <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode =='68'):?>
                      <input type="hidden" class="form-control" value="2" id="" name="statusdetil">   
                      <?php endif;?> 
                      <?php
                    $kode2=($this->session->userdata('koderole'));
                   if($kode2 =='59'):?>
                      <input type="hidden" class="form-control" value="3" id="" name="statusdetil">   
                      <?php endif;?>
                       <?php  
                       $kode2=($this->session->userdata('koderole'));
                   if($kode2 =='70'):?>
                      <input type="hidden" class="form-control" value="82" id="" name="statusdetil">   
                      <?php endif;?> 
                        <?php
                $kode2=($this->session->userdata('koderole'));
                   if($kode2 =='82'):?>
                      <input type="hidden" class="form-control" value="4" id="" name="statusdetil">
                      <?php endif;?>

                       <?php  
                       $kode2=($this->session->userdata('koderole'));
                   if($kode2 =='10'):?>
                      <input type="hidden" class="form-control" value="5" id="" name="statusdetil">   
                      <?php endif;?>                  
                    </div> 
                             <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat"><i class="glyphicon glyphicon-ok"></i>&nbsp&nbspyakin approve produk : <?php echo $nama_produk ;?>?</button>
                   </div><!-- /.col -->                     
                   
                           </div><!-- /.item -->
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>
              <!-- END MODAL edit -->


<?php
        foreach($data_prod as $i){
       $iddetilalum=$i['iddetilalum'];
      $ket = $i['cttndetilrevisi'];
      $kode_th = $i['kode_th'];
      $kode_tr = $i['kode_tr'];
      $koper = $i['koper'];
      $nama_produk = $i['nama_produk'];
       ?>
<div id="modal_editss<?php echo $iddetilalum;?>" class="modal fade">
  <div class="modal-dialog modal-md">
    <!-- <div class="modal-content"> --> 
  <div class="panel panel-primary">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Reject</h4></td>
      </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>Depbangtr/updaterejectdetil21" method="POST" enctype="multipart/form-data">
                  <div class="col-md-6">
                     <input type="hidden" class="form-control" value="<?php echo $iddetilalum;?>" id="" name="iddetilalum">
                      <input type="hidden" class="form-control" value="<?php echo $kode_tr;?>" id="" name="kode_tr">
                      <input type="hidden" class="form-control" value="<?php echo $kode_th;?>" id="" name="kode_th">
                      <input type="hidden" class="form-control" value="<?php echo $koper;?>" id="" name="koper">
                      <input type="hidden" class="form-control" value="01" id="" name="statusdetil">
                     <div class="form-group">
                      <label for="">Catatan</label><br>
                        <textarea name="cttndetilrevisi" rows="4" cols="50"><?php echo $ket;?></textarea></div>                               
                    </div> 
                             <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat"><i class="glyphicon glyphicon-ok"></i>&nbsp&nbspyakin ditolak produk : <?php echo $nama_produk ;?>?</button>
                   </div><!-- /.col -->                     
                   
                           </div><!-- /.item -->
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>
            
              <!-- END MODAL edit -->



  
    
