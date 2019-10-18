<?php
                $darabusdev=($this->session->userdata('koderole'));
                   if($darabusdev =='56' || $darabusdev =='67'):?>
<br><br><br>
<section class="content-header">

        <h4 style="text-align: center;">
          <b><span> RR-LISTING OBAT REGULER ("Ditolak Per Item") </b><br>
          <!--  <b>TANGGAL TRANSAKSI<span>&nbsp:&nbsp</span></b><b><?php echo $tr->tanggal ?></b></span>-->
        </h4>
        </section>
<br><br>
<div class="box-body">
          
           <div class="table-responsive">
              <table id="datatables5" class="table table-bordered table-striped">

            <thead>
            <tr bgcolor="grey"  style="color:white;font-weight:bold;font-family:verdana;">    
               <th style="text-align:center;">No</th>
			   <th style="text-align:center;">Tanggal</th>
			   <th style="text-align:center;">Kode Trans</th>
               <th style="text-align:center;">Perusahaan</th>
               <th style="text-align:center;">Nama Obat</th>
				<th style="text-align:center;">Catatan Ditolak</th>	
				<?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode !='56' ):?>				
                <th style="text-align:center;">Aksi</th>
				<?php endif;?> 
               </tr>
                  </thead>
                  <tbody>

                    <?php $no=0; foreach($data_reject as $pkj) 
          {

          $no++ ?>
        <tr>
                     
            <td style="text-align:center;"><?php echo $no; ?></td>
			<td style="text-align:center;"><?php echo ($pkj['tanggal_tr']); ?></td>
			<td style="text-align:center;"><?php echo ($pkj['kode_trans']); ?></td>
            <td style="text-align:center;"><?php echo ($pkj['nm_perusahaan']); ?></td>
			<td style="text-align:center;"><?php echo ($pkj['nama_obat']); ?></td>
            <td style="text-align:center;"><?php echo ($pkj['catatan3']); ?></td>
             <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode !='56' ):?>
			 <td style="text-align:center;">       
                <a style="margin-bottom:3px;" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_edit_outs<?php echo $pkj['iddetailprod2'];?>"><i class="fa fa-desktop">&nbspUpdate transaksi</i></a> 
                <a style="margin-bottom:3px;" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_editdaraanisa<?php echo $pkj['idpr2'];?>"><i class="glyphicon glyphicon-ok">&nbspAjukan Kembali</i></a>			
             </td>
			 <?php endif;?> 
            <?php } ?>
                  </tbody>          
        </table>

    </form>
</div>
</div>

</div></div></div>


<?php
      foreach($data_reject as $i){
      $idpr2=$i['idpr2'];
      $tanggal_tr = $i['tanggal_tr'];
      $id_tipe_produk = $i['id_tipe_produk'];
	  $iddetailprod2 = $i['iddetailprod2'];
	 // $statusdetil_obat = $i['statusdetil_obat'];
       ?>
<div id="modal_editdaraanisa<?php echo $idpr2;?>" class="modal fade">
  <div class="modal-dialog modal-md">
    <!-- <div class="modal-content"> -->
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">STATUS</h4></td>
      </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>obat_reg/updateaprovecekcui" method="POST" enctype="multipart/form-data">
                  <div class="col-md-6">
                     <input type="hidden" class="form-control" value="<?php echo $idpr2;?>" id="" name="idpr2">
					 <input type="hidden" class="form-control" value="<?php echo $iddetailprod2;?>" id="" name="iddetailprod2">
                      <input type="hidden" class="form-control" value="<?php echo $tanggal_tr;?>" id="" name="tanggal_tr">
                      <input type="hidden" class="form-control" value="draft" id="" name="statusdetil_obat">
                      <input type="hidden" class="form-control" value="<?php echo $id_tipe_produk;?>" id="" name="id_tipe_produk">
                    </div>
                             <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat">anda yakin merubah data tanggal : <?php echo $tanggal_tr;?>?</button>
                   </div><!-- /.col -->

                           </div><!-- /.item -->

               </form>

              </div></div></div></div>
             <?php } ?>
			 
			 
			  <?php endif;?>
			  
			  
			  
			  
