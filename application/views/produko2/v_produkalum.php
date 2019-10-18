	<!-- <ul class="nav nav-tabs">
	  <li class="active"><a href="<?php echo base_url(); ?>produko">Data Produk</a></li>
	  <li class=""><a href="<?php echo base_url(); ?>produko/aprove">Perbandingan Produk Ecatalog</a></li>
	 
	</ul> -->

 
 <section class="content-header">
        <h4 style="text-align: center;">
          <b><span> DATA PRODUK ALUM<br>
           <b>tanggal transaksi <span> : </span><?php echo $tr->tanggal ?></b>
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
                 <a style="margin-top:5px;" class="btn btn-success btn-md" href="<?php echo base_url(); ?>produko2/alum"><i class="glyphicon glyphicon-home"></i>&nbsp KEMBALI</a><br>
                <div class="item">
                 
            <div  class="col-md-12">
                      <br>                

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        
                     
                </div><!-- /.box-title -->
               
                <div class="table-responsive">
                   <table id="datatables4" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr bgcolor="grey" style="font-family:verdana;color:white;font-weight:bold;">
                      <th style="vertical-align: middle;text-align: center;">NO</th>
                      <th style="vertical-align: middle;text-align: center;">PERUSAHAAN</th>
                      <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode =='10' or $kode =='52' or $kode =='82'):?>
                      <th style="vertical-align: middle;text-align: center;">AKSI</th>
                    <?php endif;?>
                    </tr>
                  </thead>
                  <tbody>
                   <?php $no=0;
                    
                     foreach($data_alum as $row) { 
                               $no++                              
                             
                      ?>
                    <tr class="danger" style="font-family:verdana;color:black;font-weight:bold;">
                      <td style="vertical-align: middle;text-align: center;"><?php echo $no; ?></td>
                      <td style="vertical-align: middle;text-align: justify;"><a data-toggle="modal" href="#modal_edit<?php echo $row['idpr2']; ?>"><?php echo $row['nm_perusahaan']; ?></a></td>
                       <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode =='10' or $kode =='52' or $kode =='82'):?>
                       <td style="vertical-align: middle;text-align: center;">
                         
                        <a style="margin-bottom:3px;" class="btn btn-success btn-sm" href="<?php echo base_url(); ?>produko2/adddetail_alumc/<?php echo $row['idpr2']; ?>/<?php echo $row['koper']; ?>"><i class="fa fa-plus">&nbspdetail</i></a>
                        <a style="margin-bottom:3px;" data-toggle="modal" href="#modal_editdara<?php echo $row['idpr2']; ?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove">&nbspditolak</i></a>
                       </td>
                      <?php endif;?>
                    </tr>
                              <?php
                    
                             }?>
                  </tbody>
                
                </table>
              
          </div><!-- /.col -->
           <br>
        </div>
        </div><!-- /.row -->

    <!-- /.content -->

<?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode =='10' or $kode =='52' or $kode =='82'):?>
<?php
        foreach($data_reject as $i){
       $idpr2=$i['idpr2'];
      $tanggal_tr = $i['tanggal_tr'];
      $id_tipe_produk = $i['id_tipe_produk'];
      $nm_perusahaan = $i['nm_perusahaan'];
      $ket = $i['catatanheadrevisi'];
      $kode_th = $i['kode_th'];
       ?>
<div id="modal_editdara<?php echo $idpr2;?>" class="modal fade">
  <div class="modal-dialog modal-md">
    <!-- <div class="modal-content"> --> 
  <div class="panel panel-primary">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Reject</h4></td>
      </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>produko2/updaterejecthead" method="POST" enctype="multipart/form-data">
                  <div class="col-md-6">
                     <input type="hidden" class="form-control" value="<?php echo $idpr2;?>" id="" name="idpr2">
                      <input type="hidden" class="form-control" value="<?php echo $tanggal_tr;?>" id="" name="tanggal">
                      <input type="hidden" class="form-control" value="<?php echo $id_tipe_produk;?>" id="" name="id_tipe_produk">
                      <input type="hidden" class="form-control" value="<?php echo $kode_th;?>" id="" name="kode_th">
                      <input type="hidden" class="form-control" value="1" id="" name="statushead">
                    <div class="form-group">
                      <label for="">Catatan</label><br>
                        <textarea name="catatanheadrevisi" rows="4" cols="50"><?php echo $ket;?></textarea></div>                                 
                    </div>
                             <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat"><i class="glyphicon glyphicon-ok"></i>&nbsp&nbspyakin ditolak perusahaan : <?php echo $nm_perusahaan ;?>?</button>
                   </div><!-- /.col -->                     
                   
                           </div><!-- /.item -->
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>
              <?php endif;?>
              <!-- END MODAL edit -->


<?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode =='10' or $kode =='52' or $kode =='82'):?>
<?php
        foreach($data_reject as $i){
       $idpr2=$i['idpr2'];
      $tanggal_tr = $i['tanggal_tr'];
      $id_tipe_produk = $i['id_tipe_produk'];
      $nm_perusahaan = $i['nm_perusahaan'];
      // $ket = $i['catatanheadrevisi'];
      $kode_th = $i['kode_th'];
       ?>
<div id="modal_editdaranisa<?php echo $idpr2;?>" class="modal fade">
  <div class="modal-dialog modal-md">
    <!-- <div class="modal-content"> --> 
  <div class="panel panel-primary">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Reject</h4></td>
      </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>produko2/updaterejecthead2" method="POST" enctype="multipart/form-data">
                  <div class="col-md-6">
                     <input type="hidden" class="form-control" value="<?php echo $idpr2;?>" id="" name="idpr2">
                      <input type="hidden" class="form-control" value="<?php echo $tanggal_tr;?>" id="" name="tanggal">
                      <input type="hidden" class="form-control" value="<?php echo $id_tipe_produk;?>" id="" name="id_tipe_produk">
                      <input type="hidden" class="form-control" value="<?php echo $kode_th;?>" id="" name="kode_th">
                      <input type="hidden" class="form-control" value="01" id="" name="statushead">
                    <!-- <div class="form-group">
                      <label for="">Catatan</label><br>
                        <textarea name="catatanheadrevisi" rows="4" cols="50"><?php echo $ket;?></textarea></div>  -->                               
                    </div> 
                             <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat"><i class="glyphicon glyphicon-ok"></i>&nbspOK</button>
                   </div><!-- /.col -->                     
                   
                           </div><!-- /.item -->
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>
              <?php endif;?>
              <!-- END MODAL edit -->

<!------- modal -------->

<?php
      foreach($data_alum as $i){
       $idpr2 = $i['idpr2'];        
         ?>

<div id="modal_edit<?php echo $idpr2;?>" class="modal fade">
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
          if (isset($idpr2)) {
      
    $tampil= $this->produkom2->Getprodukms2alum("where kode_tr='$idpr2' and (statusdetil='0'
      or statusdetil is null) ")->result_array();
    $prod = $this->db->get_where('v_produkoalum',['idpr2'=>$idpr2])->row();

    }
        ?>
                        <?php include 'tampil_produkalum2.php';?>
                 
                </div>                
                   
                           </div>
                
               
 
              </div></div></div></div> 
             <?php } ?>


  
    
