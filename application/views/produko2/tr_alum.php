 <section class="content-header">
    <h1 style="text-align:center;" >
        RR-LISTING PRODUK ALUM
        <small></small>
    </h1>
      
    </section>
          
	<section class="content">
        <!-- Main row -->
        <div class="row">
        <!--  <a style="margin-left:2%;margin-bottom:1%;"class="btn btn-success btn-md" href="<?php echo base_url(); ?>produko2/cetaklum"><i class="glyphicon glyphicon-print"></i>&nbsp LAPORAN</a><br>
         --> <!-- Left col -->
          <!-- Left col --><span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
          <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box"> 	<br>
              <?php
                    $dara=($this->session->userdata('koderole'));
                   if($dara =='72' || $dara=='66' || $dara=='1' || $dara=='74'): ?>
          <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>produko2/savedata_aprovealum" method="POST"  enctype="multipart/form-data">
                  <div class="col-lg-12">
				  
				  <div class="box-body chat" id="chat-box">

          	  <div class="col-lg-6">
					        <div class="form-group">
                    <label>Tanggal Transaksi</label>
                       <input type="text" name="tanggal" value="" id="datepicker11" autocomplete="off" placeholder="masukan tanggal" class="form-control" required>
                    </div> 
                                
               <input type="hidden" name="id_tipe_produk" value="TP002" id="" autocomplete="off" placeholder="" class="form-control">
					
					</div></div></div>
				</div>
        <div style="text-align:left;margin-left:3%;" class="form-actions">
            <button onclick="return confirm('Apakah Data Detail Sudah Terisi ?... ');" type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            
        </div>
    </form>
</div>
<?php endif;?> 
 <div class="box-body">
				  
           <div class="box-body table-responsive">
              <table id="datatables4" class="table table-bordered table-striped">

            <thead>
            <tr bgcolor="grey"  style="color:white;font-weight:bold;font-family:verdana;">    
					     <th style="text-align:center;">No</th>
               <th style="text-align:center;">Tanggal</th>
               <!-- <th style="text-align:center;">Rumah Sakit</th> -->
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
            <!-- <td style="text-align:justify;"><?php echo ($pkj['namars']); ?></td> -->
             <td style="text-align:center;">
                      <?php
                  $dara21=($this->session->userdata('koderole'));
                   if($dara21 !='53' and $dara21 !='52' and $dara21 !='10' and $dara21 !='82'):?>
 
              <a style="margin-bottom:3px;" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>produko2/addtralum/<?php echo $pkj['idtrcom']; ?>/<?php echo $pkj['tanggal']; ?>"><i class="fa fa-plus">&nbsptambah data</i></a> 
                     <?php endif;?>

                <a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>produko2/lihattralum/<?php echo $pkj['idtrcom']; ?>/<?php echo $pkj['tanggal']; ?>"><i class="fa fa-desktop">&nbsplihat transaksi</i></a> 
               <?php
                          $daraanisa=($this->session->userdata('koderole'));
                   if($daraanisa =='66' || $daraanisa=='72'  || $daraanisa=='1'  || $daraanisa=='74'):?>
               <a style="margin-bottom:3px;" class="btn btn-success btn-sm" href="<?php echo base_url(); ?>produko2/editaprovealum/<?php echo $pkj['idtrcom']; ?>"><i class="glyphicon glyphicon-ok">&nbsptanda tangan</i></a> 
          <?php endif;?> 
                  <?php
                          $kode=($this->session->userdata('koderole'));
                   if($kode =='53' || $kode=='1' ):?>
               <a style="margin-bottom:3px;" class="btn btn-success btn-sm" href="<?php echo base_url(); ?>produko2/editaprovealum/<?php echo $pkj['idtrcom']; ?>"><i class="glyphicon glyphicon-ok">&nbspverifikasi</i></a> 
                    <a style="margin-bottom:3px;" class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>produko2/editrejectalum/<?php echo $pkj['idtrcom']; ?>"><i class="glyphicon glyphicon-ok">&nbspreject</i></a>
 <?php endif;?> 
                  <?php
                          $kode=($this->session->userdata('koderole'));
                   if($kode =='10' || $kode =='52'  || $kode=='1' || $kode =='82'):?>
               <a style="margin-bottom:3px;" class="btn btn-success btn-sm" href="<?php echo base_url(); ?>produko2/editaprovealum/<?php echo $pkj['idtrcom']; ?>"><i class="glyphicon glyphicon-ok">&nbspapprove</i></a> 
                  <a style="margin-bottom:3px;" class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>produko2/editrejectalum/<?php echo $pkj['idtrcom']; ?>"><i class="glyphicon glyphicon-ok">&nbspreject</i></a>
                 <?php endif;?> 
                    <?php
                  $darauy=($this->session->userdata('koderole'));
                   if($darauy !='53' and $darauy !='52' and $darauy !='10' and $darauy !='82' ):?>
 
                <a  style="margin-bottom:3px;" onclick="return confirm('Hapus data beserta detail??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>produko2/hapustralum/<?php echo $pkj['idtrcom']; ?>"><i class="glyphicon glyphicon-remove"></i></a>
                    <?php endif;?>                
<!-- <a style="margin-bottom:3px;" target="blank" class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>LaporanCompare/cetak_compare_obat2/<?php echo $pkj['idtrcom']; ?>"><i class="fa fa-print">&nbspPRINT</i></a>   -->
             </td>
            <?php } ?>
                  </tbody> 				  
        </table>

    </form>
</div>
</div>
<?php
                $darabusdev=($this->session->userdata('koderole'));
                   if($darabusdev =='72' || $darabusdev =='66'  || $darabusdev=='1' || $darabusdev =='74'):?>
<br><br><br>
<div class="panel panel-primary"></div>
<section class="content-header">
    <h1 style="text-align:center;" >
       	RR-LISTING  PRODUK ALUM REJECTED
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
             

                <a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>produko2/lihattralum/<?php echo $pkj['idtrcom']; ?>/<?php echo $pkj['tanggal']; ?>"><i class="fa fa-desktop">&nbsplihat transaksi</i></a> 
 <a style="margin-bottom:3px;" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_editdara<?php echo $pkj['idtrcom'];?>"><i class="glyphicon glyphicon-ok">&nbspreset</i></a>
                              
             </td>
            <?php } ?>
                  </tbody>          
        </table>

    </form>
</div>
</div>
 <?php endif;?>
</div></div></div></div></section>


<?php
        foreach($data_reject as $i){
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
                  <form role="form" action="<?php echo base_url(); ?>produko2/updateaprovecek" method="POST" enctype="multipart/form-data">
                  <div class="col-md-6">
                     <input type="hidden" class="form-control" value="<?php echo $idtrcom;?>" id="" name="idtrcom">
                      <input type="hidden" class="form-control" value="<?php echo $tanggal;?>" id="" name="tanggal">
                      <input type="hidden" class="form-control" value="01" id="" name="status">
                      <input type="hidden" class="form-control" value="<?php echo $id_tipe_produk;?>" id="" name="id_tipe_produk">                                      
                    </div>
                             <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat">yakin reset status tanggal : <?php echo $tanggal;?>?</button>
                   </div><!-- /.col -->                     
                   
                           </div><!-- /.item -->
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>
              <!-- END MODAL edit -->
