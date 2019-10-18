 <section class="content-header">
    <h1 style="text-align:center;" >
        RR-LISTING PRODUK OBAT
        <small></small>
    </h1>
      
    </section>
          
	<section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <!-- Left col --><span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
          <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box"> 	<br>
            
 <div class="box-body">
				  
           <div class="box-body table-responsive">
              <table id="datatables9" class="table table-bordered table-striped">

                  <thead bgcolor="#DCDCDC" >
                    <tr>
                     
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
              <a style="margin-bottom:3px;" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>Obattr/lihatlap_trfarmasi/<?php echo $pkj['idtrcom']; ?>/<?php echo $pkj['tanggal']; ?>"><i class="fa fa-desktop">&nbsplihat</i></a> 
            
             <a style="margin-bottom:3px;" target="blank" class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>Laporanprinsipal/cetak_compare_obat2/<?php echo $pkj['idtrcom']; ?>"><i class="fa fa-print">&nbspPRINT</i></a> 
             </td>
            <?php } ?>
                  </tbody> 				  
        </table>

    </form>
</div>
</div></tr></tbody></table></div></div></div></div></section>


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
                      <input type="hidden" class="form-control" value="9" id="" name="status">
                      <input type="hidden" class="form-control" value="<?php echo $id_tipe_produk;?>" id="" name="id_tipe_produk">                                      
                    </div>
                             <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat">yakin publish!</button>
                   </div><!-- /.col -->                     
                   
                           </div><!-- /.item -->
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>
              <!-- END MODAL edit -->
