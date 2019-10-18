 <section class="content-header">
    <h1 style="text-align:center;" >
        RR LISTING PRODUK OBAT
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
				  
             <div class="table-responsive">
                <div class="box-body">

                  <table id="datatables4" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr align="center" class="danger">
                      <th style="vertical-align: middle;text-align: center;">NO</th>
					  <th style="vertical-align: middle;text-align: center;">TANGGAL</th>
					  <th style="vertical-align: middle;text-align: center;">KODE TRANSAKSI</th>
                      <th style="vertical-align: middle;text-align: center;">NAMA PRINSIPAL</th>
                      <th style="vertical-align: middle;text-align: center;">NAMA DISTRIBUTOR</th>
                       <th style="vertical-align: middle;text-align: center;">JENIS LISTING</th>			 					   
                      <th style="vertical-align: middle;text-align: center;">AKSI</th>

					</tr>
                  </thead>
                  <tbody>
                   <?php $no=0;
                    
                     foreach($data_produko as $row) { 
                               $no++                              
                             
                      ?>
                    <tr>
                      <td style="vertical-align: middle;text-align: center;"><?php echo $no; ?></td>
					  <td style="vertical-align: middle;text-align: center;"><?php echo $row['tanggal_tr']; ?></td>
					  <td style="vertical-align: middle;text-align: center;"><?php echo $row['kode_trans']; ?></td>
					  <td style="vertical-align: middle;text-align: center;"><?php echo $row['nm_perusahaan']; ?></a></td>
                      <!--<td><a data-toggle="modal" href="#modal_edit<?php //echo $row['idpr2']; ?>"><?php echo $row['nm_perusahaan']; ?></a></td>-->
                       <td style="vertical-align: middle;text-align: center;"><?php echo $row['nm_distributor']; ?></td>
                       
                       <td style="vertical-align: middle;text-align: justify;"><?php 
					   
					   $bk=($row['flagobat']);
				
	   
							if ($bk == '1') {
							  echo '<p style="background-color:blue; color:white; text-align:center;">Baru</p>';

							}else{
							  echo '<p style="background-color:grey; color:white; text-align:center;">Lama</p>';
							}
							?></td>
							
							<td style="vertical-align: middle;text-align: center;">
								 
								<a style="margin-bottom:3px;" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>obat_reg/lihattrfarmasi/<?php echo $row['idpr2']; ?>/<?php echo $row['tanggal_tr']; ?>/<?php echo $row['flagobat']; ?>/<?php echo $row['koper']; ?>"><i class="fa fa-desktop">&nbsplihat</i></a> 
 
								<?php
									$darabus=($this->session->userdata('koderole'));
									if($darabus =='82'):?>
								<a style="margin-bottom:3px;" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_editdara<?php echo $row['idpr2'];?>"><i class="glyphicon glyphicon-ok"></i>&nbsppublish</a>
								<?php endif;?> 
	
                         
                       <!--<a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>obat_reg/editheadfarmasi/<?php echo $row['idpr2']; ?>"><i class="glyphicon glyphicon-edit"></i></a> -->
                     
                     </td>
					
                    
                    </tr>
                              <?php
                    
                             }?>
                  </tbody>
                
                </table>
				
				
         
				
				
				
               </div>
			   
			     
            </div></section>


<?php
        foreach($data_produko as $i){
       $idpr2=$i['idpr2'];
      $tanggal_tr = $i['tanggal_tr'];
      $id_tipe_produk = $i['id_tipe_produk'];
       ?>
<div id="modal_editdara<?php echo $idpr2;?>" class="modal fade">
  <div class="modal-dialog modal-sm">
    <!-- <div class="modal-content"> -->
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">STATUS</h4></td>
      </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>obat_reg/updateaprovepublis" method="POST" enctype="multipart/form-data">
                  <div class="col-md-6">
                     <input type="hidden" class="form-control" value="<?php echo $idpr2;?>" id="" name="idpr2">
                      <input type="hidden" class="form-control" value="<?php echo $tanggal_tr;?>" id="" name="tanggal_tr">
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
