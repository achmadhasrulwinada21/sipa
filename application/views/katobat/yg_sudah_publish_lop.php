 <section class="content-header">
    <h1 style="text-align:center;" >
        RR LISTING PRODUK OBAT REGULER ("PUBLISH")
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
						<th style="vertical-align: middle;text-align: center;">STATUS</th>
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
							 <td style="vertical-align: middle;text-align: justify;"><?php 
					   
							$bky=($row['status']);
				
	   
							if ($bky == "0") {
							  echo '<p style="text-align:center;"> Waiting... Approval <b>MANAGER</b></p>';

							}
							elseif ($bky == "1") {
							  echo '<p style="text-align:center;"> Waiting... Approval <b>KADEP</b></p>';

							}elseif ($bky == "82") {
							  echo '<p style="text-align:center;"> Waiting... Approval <b>KADEP PENGADAAN</b></p>';

							}elseif ($bky == "2") {
							  echo '<p style="text-align:center;"> Waiting... Approval <b>DIREKTUR</b></p>';

							}elseif ($bky == "3") {
							  echo '<p style="text-align:center;"> Waiting... Upload <b>DATA MASTER TEAM</b></p>';

							}elseif ($bky == "10") {
							  echo '<p style="text-align:center;"> Waiting... Publish <b>Manager</b></p>';

							}elseif ($bky == "9") {
							  echo '<p style="text-align:center;"> Obat Sudah di <b>PUBLISH...!!!</b></p>';

							}
							elseif($bky == "draft") {
						
							  echo '<p style="background-color:yellow; color:black; text-align:center;"> Draft </p>';
							}
							elseif($bky == "ditolak") {
						
							  echo '<p style="background-color:red; color:white; text-align:center;"> Ditolak </p>';
							}
							
							else{
						
							  echo '<p style="background-color:grey; color:yellow; text-align:center;"> Belum <b>Terisi</b> </p>';
							}
							?></td>
							 <td style="vertical-align: middle;text-align: center;">
							<a style="margin-bottom:3px;" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_edit_publish<?php echo $row['idpr2'];?>"><i class="glyphicon glyphicon-info"></i>&nbsp Lihat</a>
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
<div id="modal_edit_publish<?php echo $idpr2;?>" class="modal fade">
  <div class="modal-dialog modal-lg">
    <!-- <div class="modal-content"> -->
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">LIST DETAIL</h4></td>
      </div>
        <div class="modal-body modal-lg" >
              <?php include 'lihat_trfarmasi_lop.php'; ?>             
                   
                           </div><!-- /.item -->
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>
              <!-- END MODAL edit -->
