 <section class="content-header"><br><br>
    <h1 style="text-align:center;font-weight:bold;font-family:verdana;" >
        RR LISTING PRODUK OBAT
        <small></small>
    </h1><br>
    <div class="col-lg-4" style="margin-left:32%;">
    <div class="panel panel-primary"></div>
  </div>
    </section>      
	<section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <!-- Left col --><span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
          <section class="col-lg-12">
            <!-- Chat box --><div class="box">
           <br>
              <?php
                    $dara=($this->session->userdata('koderole'));
                   if($dara =='67'):?>
            <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>Obattr/savedata_aprovefarmasi" method="POST"  enctype="multipart/form-data">
                  <div class="col-lg-12">
				  
				  <div class="box-body chat" id="chat-box">

            <div class="col-lg-6">
					        <div class="form-group">
                    <label>Tanggal Transaksi</label>
                       <input type="text" name="tanggal" value="" id="datepicker11" autocomplete="off" placeholder="masukan tanggal" class="form-control" required>
                    </div>       

                    <input type="hidden" name="id_tipe_produk" value="TP001" id="" autocomplete="off" placeholder="" class="form-control">          
                                             
					
					</div></div></div>
				</div>
        <div style="text-align:left;margin-left:3%;" class="form-actions">
            <button  type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            
        </div><br><br>
    </form>
</div></div></section>
 <section class="col-lg-12">
<?php endif;?> 
 <?php
                          $darabus=($this->session->userdata('koderole'));
                   if($darabus =='71'):?>
 <a style="margin-bottom:3px;" target="blank" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>Excelcobaimport"><i class="fa fa-download">&nbspImpor to excel</i></a> <?php endif;?> 
<br><br>
 		  <div class="table-responsive">
              <table id="datatables9" class="table table-bordered table-striped table-hover">

                  <thead>
                    <tr bgcolor="grey"  style="color:white;font-weight:bold;font-family:verdana;">
                     
					     <th style="text-align:center;">No</th>
               <th style="text-align:center;">Tanggal</th>
                <th style="text-align:center;">Aksi</th>
               </tr>
                  </thead>
                  <tbody>

                    <?php $no=0; foreach($data_aprove as $pkj) 
					{

					$no++ ?>
				<tr>
                     
					  <td style="text-align:center;"><?php echo $no; ?></td>
					  <td style="text-align:center;"><?php echo ($pkj['tanggal']); ?></td>
           
             <td style="text-align:center;"> 
              <?php
                  $dara21=($this->session->userdata('koderole'));
                   if($dara21 !='10' and $dara21 !='57' and $dara21 !='71' and $dara !='82' ):?>
 
              <a style="margin-bottom:3px;" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>Obattr/addtrfarmasi/<?php echo $pkj['idtrcom']; ?>/<?php echo $pkj['tanggal']; ?>"><i class="fa fa-plus">&nbsptambah data</i></a> 
                     <?php endif;?>

                <a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>Obattr/viewtrfarmasi/<?php echo $pkj['idtrcom']; ?>/<?php echo $pkj['tanggal']; ?>"><i class="fa fa-desktop">&nbsplihat transaksi</i></a> 
                 <?php
                          $darabus=($this->session->userdata('koderole'));
                   if($darabus =='67'):?>
              <a style="margin-bottom:3px;" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $pkj['idtrcom'];?>"><i class="glyphicon glyphicon-ok">&nbspkirim data</i></a>
                 <?php endif;?> 
                  <?php
                          $darabus=($this->session->userdata('koderole'));
                   if($darabus =='71'):?>
               <a style="margin-bottom:3px;" target="blank" class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>Laporanfarmasi/cetak_farmasi/<?php echo $pkj['idtrcom']; ?>"><i class="fa fa-print">&nbspExpor to excel</i></a>
            <a style="margin-bottom:3px;" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>Obattr/lihatlap_trfarmasi/<?php echo $pkj['idtrcom']; ?>/<?php echo $pkj['tanggal']; ?>"><i class="fa fa-desktop">&nbsplihat hasil import</i></a>                 
            <a style="margin-bottom:3px;" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_editdara<?php echo $pkj['idtrcom'];?>">
               <i class="glyphicon glyphicon-ok">&nbspkirim data</i></a>
<?php endif;?> 
               <?php
                          $darabus=($this->session->userdata('koderole'));
                   if($darabus =='69' || $darabus =='56' ):?>
               <a style="margin-bottom:3px;" class="btn btn-success btn-sm" href="<?php echo base_url(); ?>Obattr/editaprovefarmasi/<?php echo $pkj['idtrcom']; ?>"><i class="glyphicon glyphicon-ok">&nbsptanda tangan</i></a> 
                 <?php endif;?> 
                  <?php
                          $darakuy=($this->session->userdata('koderole'));
                   if($darakuy =='57' ):?>
               <a style="margin-bottom:3px;" class="btn btn-success btn-sm" href="<?php echo base_url(); ?>Obattr/editaprovefarmasi/<?php echo $pkj['idtrcom']; ?>"><i class="glyphicon glyphicon-ok">&nbspverifikasi</i></a> 
                    <a style="margin-bottom:3px;" class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>Obattr/editrejectfarmasi/<?php echo $pkj['idtrcom']; ?>"><i class="glyphicon glyphicon-ok">&nbspreject</i></a>
 <?php endif;?> 
                  <?php
                          $daradev=($this->session->userdata('koderole'));
                   if($daradev =='10' || $daradev =='82'):?>
               <a style="margin-bottom:3px;" class="btn btn-success btn-sm" href="<?php echo base_url(); ?>Obattr/editaprovefarmasi/<?php echo $pkj['idtrcom']; ?>"><i class="glyphicon glyphicon-ok">&nbspapprove</i></a> 
                                       
                  <a style="margin-bottom:3px;" class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>Obattr/editrejectfarmasi/<?php echo $pkj['idtrcom']; ?>"><i class="glyphicon glyphicon-ok">&nbspreject</i></a>
                 <?php endif;?> 
                    <?php
                  $darauy=($this->session->userdata('koderole'));
                   if($darauy !='57' and $darauy !='10' and $darauy !='71' and $darauy !='69' and $darauy !='56' and $darauy !='82' ):?>
 
                <a  style="margin-bottom:3px;" onclick="return confirm('Hapus data beserta detail??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>Obattr/hapustrfarmasi/<?php echo $pkj['idtrcom']; ?>"><i class="glyphicon glyphicon-remove"></i></a>
                    <?php endif;?>                
             </td>
            <?php } ?>
                  </tbody> 				  
        </table>

    </form>
</div>
</div></tr></tbody></table>
<?php
                $darabusdev=($this->session->userdata('koderole'));
                   if($darabusdev =='56' || $darabusdev =='69' || $darabusdev =='67'):?>
<br><br><br>
<div class="panel panel-primary"></div>
<section class="content-header">
    <h1 style="text-align:center;" >
       E-KATALOG PRODUK OBAT REJECTED
        <small></small>
    </h1>
      
    </section>
<br><br>
<div class="box-body">
          
           <div class="table-responsive">
              <table id="datatables5" class="table table-bordered table-striped">

            <thead>
            <tr bgcolor="grey"  style="color:white;font-weight:bold;font-family:verdana;">    
               <th style="text-align:center;">No</th>
               <th style="text-align:center;">Tanggal</th>
               <th style="text-align:center;">Catatan</th> 
                <th style="text-align:center;">Aksi</th>
               </tr>
                  </thead>
                  <tbody>

                    <?php $no=0; foreach($data_reject as $pkj) 
          {

          $no++ ?>
        <tr>
                     
            <td style="text-align:center;"><?php echo $no; ?></td>
            <td style="text-align:center;"><?php echo ($pkj['tanggal']); ?></td>
            <td style="text-align:justify;"><?php echo ($pkj['catatan']); ?></td>
             <td style="text-align:center;"> 
             

                <a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>Obattr/rejecttrfarmasi/<?php echo $pkj['idtrcom']; ?>/<?php echo $pkj['tanggal']; ?>"><i class="fa fa-desktop">&nbsplihat transaksi</i></a> 
                <a style="margin-bottom:3px;" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_editdaraanisa<?php echo $pkj['idtrcom'];?>"><i class="glyphicon glyphicon-ok">&nbspreset</i></a>
               
               
             </td>
            <?php } ?>
                  </tbody>          
        </table>

    </form>
</div>
</div>
 <?php endif;?>
</div></div></div></section>

<?php
        foreach($data_aprove as $i){
       $idtrcom=$i['idtrcom'];
      $tanggal = $i['tanggal'];
      $id_tipe_produk = $i['id_tipe_produk'];
       ?>
<div id="modal_edit<?php echo $idtrcom;?>" class="modal fade">
  <div class="modal-dialog modal-sm">
    <!-- <div class="modal-content"> -->
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">STATUS</h4></td>
      </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>Obattr/updateaprovecek" method="POST" enctype="multipart/form-data">
                  <div class="col-md-6">
                     <input type="hidden" class="form-control" value="<?php echo $idtrcom;?>" id="" name="idtrcom">
                      <input type="hidden" class="form-control" value="<?php echo $tanggal;?>" id="" name="tanggal">
                      <input type="hidden" class="form-control" value="0" id="" name="status">
                      <input type="hidden" class="form-control" value="<?php echo $id_tipe_produk;?>" id="" name="id_tipe_produk">                                      
                    </div>
                             <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat">anda yakin kirim data?</button>
                   </div><!-- /.col -->                     
                   
                           </div><!-- /.item -->
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>
              <!-- END MODAL edit -->

<?php
        foreach($data_aprove as $i){
       $idtrcom=$i['idtrcom'];
      $tanggal = $i['tanggal'];
      $id_tipe_produk = $i['id_tipe_produk'];
       ?>
<div id="modal_editdara<?php echo $idtrcom;?>" class="modal fade">
  <div class="modal-dialog modal-sm">
    <!-- <div class="modal-content"> -->
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">STATUS</h4></td>
      </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>Obattr/updateaprovecek" method="POST" enctype="multipart/form-data">
                  <div class="col-md-6">
                     <input type="hidden" class="form-control" value="<?php echo $idtrcom;?>" id="" name="idtrcom">
                      <input type="hidden" class="form-control" value="<?php echo $tanggal;?>" id="" name="tanggal">
                      <input type="hidden" class="form-control" value="10" id="" name="status">
                      <input type="hidden" class="form-control" value="<?php echo $id_tipe_produk;?>" id="" name="id_tipe_produk">                                      
                    </div>
                             <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat">anda yakin kirim data?</button>
                   </div><!-- /.col -->                     
                   
                           </div><!-- /.item -->
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>
              <!-- END MODAL edit -->

<?php
        foreach($data_reject as $i){
       $idtrcom=$i['idtrcom'];
      $tanggal = $i['tanggal'];
      $id_tipe_produk = $i['id_tipe_produk'];
       ?>
<div id="modal_editdaraanisa<?php echo $idtrcom;?>" class="modal fade">
  <div class="modal-dialog modal-md">
    <!-- <div class="modal-content"> -->
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">STATUS</h4></td>
      </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>Obattr/updateaprovecekcui" method="POST" enctype="multipart/form-data">
                  <div class="col-md-6">
                     <input type="hidden" class="form-control" value="<?php echo $idtrcom;?>" id="" name="idtrcom">
                      <input type="hidden" class="form-control" value="<?php echo $tanggal;?>" id="" name="tanggal">
                      <input type="hidden" class="form-control" value="01" id="" name="status">
                      <input type="hidden" class="form-control" value="<?php echo $id_tipe_produk;?>" id="" name="id_tipe_produk">
                    </div>
                             <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat">anda yakin merubah data tanggal : <?php echo $tanggal;?>?</button>
                   </div><!-- /.col -->

                           </div><!-- /.item -->

               </form>

              </div></div></div></div>
             <?php } ?>
              <!-- END MODAL edit -->
