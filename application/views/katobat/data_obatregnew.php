<section class="content-header">

        <h4 style="text-align: center;">
          <b><span> RR-LISTING OBAT REGULER </b><br>
          <!--  <b>TANGGAL TRANSAKSI<span>&nbsp:&nbsp</span></b><b><?php echo $tr->tanggal ?></b></span>-->
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
                <div class="item">
                   <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode !='10' and $kode !='57' and $kode !='82' and $kode !='56' and $kode !='71'  ):?>
                  <form role="form" action="<?php echo base_url(); ?>obat_reg/savedatas" method="POST"  enctype="multipart/form-data">
                  <div class="col-lg-12">
          
				  <div class="box-body chat" id="chat-box">

				  <!--<div class="col-lg-12">
              <input type="hidden" class="form-control" value="<?php echo $tr->kode_trans ?>" id="" name="kode_trans">                              
              <input type="hidden" class="form-control" value="<?php echo $tr->tanggal ?>" id="" name="tanggal_tr"> 
-->			   <div class="col-lg-4"></div>
			  <div class="col-lg-4">
			 <div class="form-group">
                      <label for="">Kode Transaksi</label>
                        <input type="text" class="form-control" value="<?php echo $kodereg ?>" id="" name="kode_trans" required readonly>
                    </div>


            <?php  date_default_timezone_set("Asia/Jakarta");
                   $waktusaatini =date("Y-m-d");  ?>

					        <div class="form-group">
                    <label>Tanggal Transaksi</label>
                       <input type="text" name="tanggal" value="<?php echo $waktusaatini; ?>" id="datepicker11" autocomplete="off" placeholder="masukan tanggal" class="form-control" required>
                    </div>       

                     <input type="hidden" name="id_tipe_produk2" value="TP005" id="" autocomplete="off" placeholder="" class="form-control"> 
			  
			  
          
            
                 <div id="obatreg" class="form-group">
                      <label for="foto">NAMA PRINSIPAL</label>
					             <br> <select id="koper" name="koper" class="form-control" required>
                          <option value="" required>pilih prinsipal</option>
                          <?php foreach($kode_pabrik as $row) { ?>
                              <option value="<?php echo $row['koper'] ?>" required><?php echo $row['nm_perusahaan'] ?></option>
                          <?php } ?>
						  </select><br><br>
               
                                     
                      <label for="">KODE DISTRIBUTOR</label>
                        <input type="text" class="form-control" value="" id="" name="kodis" readonly><br>
                   <label for="">NAMA DISTRIBUTOR</label>
                        <input type="text" class="form-control" value="" id="" name="nm_distributor" readonly><br>
              <label for="">JENIS LISTING</label><br>
                        <input type="radio" id="obat" name="flagobat" value="1" onclick="myFunction6()" required> Listing Obat Baru<br>
                        <input type="radio" id="obat" name="flagobat" value="2" onclick="myFunction7()" required> Listing Obat Lama<br>
                        <input type="hidden"   value="kosong" id="" name="status"><br>
            </div> 
			<div style="text-align:left;margin-left:35%" class="form-actions">
            <button  type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
           <a href="<?php echo base_url(); ?>obat_reg/addtrfarmasinew" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
			
			
			</div>    

    </form>
	
</div></section><br><br>
<?php endif;?> <section>
            <div class="col-md-12">
                      <br>
              
                             

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        <?php	 
			$darabus=($this->session->userdata('koderole'));
                   if($darabus =='71'):?>
 <a style="margin-bottom:3px;" target="blank" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>Excelcobaimport_lop"><i class="fa fa-download">&nbspImpor to excel</i></a> <?php endif;?> 
                
                </div><!-- /.box-title -->
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
					  	 <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode !='10' and $kode !='82' and $kode !='57' and $kode !='71' ):?>
					  <th style="vertical-align: middle;text-align: center;">STATUS APPROVE</th>					  
                    <?php endif;?>
					 	 <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode !='10' and $kode !='82' and $kode !='57' and $kode !='71' ):?>
					  <th style="vertical-align: middle;text-align: center;">OUTSTANDING</th>					  
                    <?php endif;?>
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
					  <td style="vertical-align: middle;text-align: left;"><?php echo $row['nm_perusahaan']; ?></a></td>
                       <td style="vertical-align: middle;text-align: left;"><?php echo $row['nm_distributor']; ?></td>
                       
                       <td style="vertical-align: middle;text-align: justify;"><?php 
					   
					   $bk=($row['flagobat']);
				
	   
							if ($bk == '1') {
							  echo '<p style="background-color:blue; color:white; text-align:center;">Baru</p>';

							}else{
							  echo '<p style="background-color:grey; color:white; text-align:center;">Lama</p>';
							}
							?></td>
							
							<td style="vertical-align: middle;text-align: center;">
								 
				<?php
					$status_app = ($row['status']);
                    $kode=($this->session->userdata('koderole'));
                   if($kode =='57' or $kode =='82' or $kode =='10' ):
					   if ($row['outstanding']=='0' && $row['status']== $status_app )
					   
					   { ?>				 
                <a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>obat_reg/adddetailnew/<?php echo $row['idpr2']; ?>/<?php echo $row['koper']; ?>/<?php echo $row['flagobat']; ?>"><i class="fa fa-desktop">&nbsplihat transaksi</i></a> 
			 <?php } elseif($row['outstanding']=='outs' && $row['status']==$status_app){	?>			 
                <a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>obat_reg/detail_outs/<?php echo $row['idpr2']; ?>/<?php echo $row['koper']; ?>/<?php echo $row['flagobat']; ?>"><i class="fa fa-desktop">&nbsplihat transaksi fdsrreqrw</i></a> 
               
			   <?php }
				   
				endif;?>
			   
			   

			   <?php
			   
			 if($kode =='82'):
			 if ($row['outstanding']=='outs' && $row['status']== $status_app )
					   
					   { ?>				 
                <a style="margin-bottom:3px;" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $row['idpr2'];?>"><i class="glyphicon glyphicon-ok">&nbspApproved</i></a> 
                 <a style="margin-bottom:3px;" class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>obat_reg/editrejectfarmasi/<?php echo $row['idpr2']; ?>"><i class="glyphicon glyphicon-ok">&nbspReject</i></a>
   
			 
				<?php }
				   
				endif;?>



				<?php
                        $darabus=($this->session->userdata('koderole'));
                   if(($darabus=='67') && $row['status'] == "kosong" ):  
				   
				   ?>
              <a style="margin-bottom:3px;" class="btn btn-sm" data-toggle="modal" ><i class="glyphicon glyphicon-ok">&nbspkirim data</i></a>
		      <?php endif;?> 
			  
			  
			<?php
                        $darabus=($this->session->userdata('koderole'));
                   if(($darabus=='67') && $row['status'] <> null && $row['status'] <> "kosong" && $row['status'] <> "0" && $row['status'] <> "1" && $row['status'] <> "2" && $row['status'] <> "3" && $row['status'] <> "82" && $row['status'] <> "10" ):  
				   
				   ?>
			  <a style="margin-bottom:3px;" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $row['idpr2'];?>"><i class="glyphicon glyphicon-ok">&nbspkirim data</i></a>
                 <?php endif;?> 
				 
                  <?php
                     $darabus=($this->session->userdata('koderole'));
                   if(($darabus =='71') && $row['statusdetil_obat'] == '3' && $row['outstanding'] == '0'):?>
               <a style="margin-bottom:3px;" target="blank" class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>Laporanfarmasi_lop/cetak_farmasi/<?php echo $row['idpr2']; ?>"><i class="fa fa-print">&nbspExpor to excel</i></a>
            <!--<a style="margin-bottom:3px;" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>obat_reg/lihatlap_trfarmasi/<?php echo $row['idpr2']; ?>/<?php echo $row['tanggal_tr']; ?>"><i class="fa fa-desktop">&nbsplihat hasil import</i></a> -->                
             <a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>obat_reg/adddetailnew/<?php echo $row['idpr2']; ?>/<?php echo $row['koper']; ?>/<?php echo $row['flagobat']; ?>"><i class="fa fa-desktop">&nbsp lihat </i></a> 
			<a style="margin-bottom:3px;" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_editdara<?php echo $row['idpr2'];?>">
               <i class="glyphicon glyphicon-ok">&nbspkirim data</i></a>
			   <?php
                     $darabus=($this->session->userdata('koderole'));
                   elseif(($darabus =='71' )&& $row['statusdetil_obat'] == '3' && $row['outstanding'] == "outs"):?>
			  <a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>obat_reg/detail_outs/<?php echo $row['idpr2']; ?>/<?php echo $row['koper']; ?>/<?php echo $row['flagobat']; ?>"><i class="fa fa-edit">&nbsp Lihat Transaksi </i></a>
			  <?php else: ?>  
			   
	<?php endif;?> 
	
				
	
               <?php
                    $darabus=($this->session->userdata('koderole'));
                   if(($darabus =='56') && $row['statusdetil_obat'] == '0' && $row['outstanding'] == "0"):?>
				<a style="margin-bottom:3px;" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>obat_reg/adddetailnew/<?php echo $row['idpr2']; ?>/<?php echo $row['koper']; ?>/<?php echo $row['flagobat']; ?>"><i class="fa fa-plus">&nbsptambah detail</i></a>   
               <a style="margin-bottom:3px;" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $row['idpr2'];?>"><i class="glyphicon glyphicon-ok">&nbspApproved</i></a> 
                 <a style="margin-bottom:3px;" class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>obat_reg/editrejectfarmasi/<?php echo $row['idpr2']; ?>"><i class="glyphicon glyphicon-ok">&nbspReject</i></a>
				 
						  <?php elseif(($darabus =='56') && $row['statusdetil_obat'] == '0' && ($row['outstanding'] == "rev" or $row['outstanding'] == "outs")): ?> 
						<a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>obat_reg/detail_outs/<?php echo $row['idpr2']; ?>/<?php echo $row['koper']; ?>/<?php echo $row['flagobat']; ?>"><i class="fa fa-edit">&nbsp Lihat Transaksi </i></a>
						<!--<a style="margin-bottom:3px;" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $row['idpr2'];?>"><i class="glyphicon glyphicon-ok">&nbspApproved</i></a> 
						<a style="margin-bottom:3px;" class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>obat_reg/editrejectfarmasi/<?php echo $row['idpr2']; ?>"><i class="glyphicon glyphicon-ok">&nbspReject</i></a>-->
						<!--<a style="margin-bottom:3px;" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $row['idpr2'];?>"><i class="glyphicon glyphicon-ok">&nbspkirim data</i></a>-->
						<?php else: ?> 
						
				 <?php endif;?>



				 
                  <?php
                          $darakuy=($this->session->userdata('koderole'));
					if(($darakuy =='57' )&& $row['statusdetil_obat'] == '1' && $row['outstanding'] == "0"):?>
					<a style="margin-bottom:3px;" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $row['idpr2'];?>"><i class="glyphicon glyphicon-ok">&nbspApproved</i></a> 
                    <a style="margin-bottom:3px;" class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>obat_reg/editrejectfarmasi/<?php echo $row['idpr2']; ?>"><i class="glyphicon glyphicon-ok">&nbspReject</i></a>
				  
				  
						<?php else: ?> 
  
				  <?php endif;?>




				
				<?php
				  $darakuys=($this->session->userdata('koderole'));
                   if(($darakuys =='82' )&& $row['statusdetil_obat'] == '82' && $row['outstanding'] == "0"):?>
               <a style="margin-bottom:3px;" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $row['idpr2'];?>"><i class="glyphicon glyphicon-ok">&nbspApproved</i></a> 
                    <a style="margin-bottom:3px;" class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>obat_reg/editrejectfarmasi/<?php echo $row['idpr2']; ?>"><i class="glyphicon glyphicon-ok">&nbspReject</i></a>
				<?php endif;?> 
                  <?php
                          $daradev=($this->session->userdata('koderole'));
                   if(($daradev =='10')&& $row['statusdetil_obat'] == '2' && $row['outstanding'] == "0"):?>
               <a style="margin-bottom:3px;" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $row['idpr2'];?>"><i class="glyphicon glyphicon-ok">&nbspApproved</i></a>                             
                  <a style="margin-bottom:3px;" class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>obat_reg/editrejectfarmasi/<?php echo $row['idpr2']; ?>"><i class="glyphicon glyphicon-ok">&nbspReject</i></a>
                 <?php endif;?> 
				 
			
						 
				<?php
                    $kode=($this->session->userdata('koderole'));
                   if(($kode =='67') && $row['outstanding'] <> "outs" && $row['status'] <> "0" && $row['status'] <> "1" && $row['status'] <> "2" && $row['status'] <> "82" && $row['status'] <> "3" && $row['status'] <> "10" ):?>
                        <a style="margin-bottom:3px;" class="btn btn-success btn-sm" href="<?php echo base_url(); ?>obat_reg/adddetailnew/<?php echo $row['idpr2']; ?>/<?php echo $row['koper']; ?>/<?php echo $row['flagobat']; ?>"><i class="fa fa-plus">&nbsptambah detail</i></a> 
                            <a  style="margin-bottom:3px;" onclick="return confirm('Hapus data beserta detail??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>obat_reg/hapusheadfarmasi_lop/<?php echo $row['idpr2']; ?>/<?php echo $row['kode_trans']; ?>/<?php echo $row['tanggal_tr']; ?>"><i class="glyphicon glyphicon-remove"></i></a>

                        <?php elseif(($kode =='67') && $row['outstanding'] == "outs" && ($row['status'] == "0" or $row['status'] == "1" or $row['status'] == "2" or $row['status'] == "82" or $row['status'] == "3" or $row['status'] == "10") ): ?> 
						<a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>obat_reg/detail_outs/<?php echo $row['idpr2']; ?>/<?php echo $row['koper']; ?>/<?php echo $row['flagobat']; ?>"><i class="fa fa-edit">&nbsp Perbaikan </i></a> 
						<!--<a style="margin-bottom:3px;" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $row['idpr2'];?>"><i class="glyphicon glyphicon-ok">&nbspkirim data</i></a>-->
						
						<?php elseif(($kode =='67') && $row['outstanding'] == "outs" && ($row['status'] == "0" or $row['status'] == "1" or $row['status'] == "2" or $row['status'] == "82" or $row['status'] == "3" or $row['status'] == "10") ): ?> 
						<a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>obat_reg/detail_outs/<?php echo $row['idpr2']; ?>/<?php echo $row['koper']; ?>/<?php echo $row['flagobat']; ?>"><i class="fa fa-edit">&nbsp Perbaikan </i></a> 
						
						<?php else: ?> 
						 <?php endif;?> 
						 
	
					 
						 
                         
                       <!--<a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>obat_reg/editheadfarmasi/<?php echo $row['idpr2']; ?>"><i class="glyphicon glyphicon-edit"></i></a> -->
                     
                     </td>
					 <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode !='10' and $kode !='82' and $kode !='57' and $kode !='71' ):?>
					 <td style="vertical-align: middle;text-align: justify;"><?php 
					   
							$bky=($row['status']); 
							$bkyr=($row['outstanding']);
				            
	   
							if ($bky == "0" ) {
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
							  echo '<p style="text-align:center;"> Waiting... Publish <b>KADEP PENGADAAN</b></p>';

							}
							elseif($bky == "draft") {
						
							  echo '<p style="background-color:yellow; color:black; text-align:center;"> Draft </p>';
							}
							elseif($bky == "ditolak") {
						
							  echo '<p style="background-color:red; color:white; text-align:center;"> Ditolak '.$row['catatan'].' </p>';
							}
							elseif($bky == "0" && $bkyr == "outs") {
						
							  echo '<p style="background-color:red; color:white; text-align:center;"> Ditolak '.$row['catatan'].' </p>';
							}
							
							elseif($bky == null && $bkyr == "outs") {
						
							  echo '<p style="background-color:grey; color:white; text-align:center;"> Outs '.$row['catatan'].' </p>';
							}
							
							
							else{
						
							  echo '<p style="background-color:grey; color:yellow; text-align:center;"> Belum <b>Terisi</b> </p>';
							}
							?></td>
							<?php endif;?> 
							 <?php
                   
						   $kode=($this->session->userdata('koderole'));
						   if($kode !='10' and $kode !='82' and $kode !='57' and $kode !='71' ):?>	 
							 
							 <td style="vertical-align: middle;text-align: justify;"><?php 
					   
							$bkt=($row['outstanding']);
				
	   
							if ($bkt == 'outs') {
							  echo '<p style="background-color:blue; color:white; text-align:center;">ADA</p>';

							}elseif ($bkt == 'rev'){
							  echo '<p style="background-color:green; color:white; text-align:center;">Revisi (Per Item)</p>';
							}else{
							  echo '<p style="background-color:grey; color:white; text-align:center;">BERSIH</p>';
							}
							?></td>
                    <?php endif;?> 
                    </tr>
                              <?php
                    
                             }?>
                  </tbody>
                
                </table>
				
				
         
				
				
				
               </div>
			   
			     
            </div>
		<?php
                    // $kode=($this->session->userdata('koderole'));
                   // if($kode !='10' and $kode !='82' and $kode !='57' ):?>
			   <?php //include 'view_obat_out_lop.php';?> 
			   <?php //endif;?> 
           </div>
			   
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Main row -->
     
      </section><!-- /.content -->

<!------- modal -------->
			<?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode =='71'):?>
			  
			     

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
                  <form role="form" action="<?php echo base_url(); ?>obat_reg/updateaprovecek" method="POST" enctype="multipart/form-data">
                  <div class="col-md-6">
                     <input type="hidden" class="form-control" value="<?php echo $idpr2;?>" id="" name="idpr2">
                      <input type="hidden" class="form-control" value="<?php echo $tanggal_tr;?>" id="" name="tanggal_tr">
                      <input type="text" class="form-control" value="7" id="" name="status">
                      <input type="hidden" class="form-control" value="TP005" id="" name="id_tipe_produk">                                      
                    </div>
                             <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat">anda yakin kirim data?</button>
                   </div><!-- /.col -->                     
                   
                           </div><!-- /.item -->
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>
              <!-- END MODAL edit -->
<?php endif;?> 




<?php
        foreach($data_produko as $i){
       $idpr2=$i['idpr2'];
      $tanggal_tr = $i['tanggal_tr'];
      $id_tipe_produk = $i['id_tipe_produk'];
	  $menyetujui = $i['menyetujui'];
	  $ttd_menyetujui = $i['ttd_menyetujui'];
	  $jb_menyetujui = $i['jb_menyetujui'];
	  $mengetahui = $i['mengetahui'];
	  $ttd_mengetahui = $i['ttd_mengetahui'];
	  $jb_mengetahui = $i['jb_mengetahui'];
	  $nama_satu = $i['nama_satu'];
	  $ttd_satu = $i['ttd_satu'];
	  $jb_satu = $i['jb_satu'];
	  $flagobat = $i['flagobat'];
	  
	  
	  
	  
	  
       ?>
<div id="modal_edit<?php echo $idpr2;?>" class="modal fade">
  <div class="modal-dialog modal-md"> 
    <!-- <div class="modal-content"> -->
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">STATUS</h4></td>
      </div>
	  
	  <?php
            $kode=($this->session->userdata('koderole'));
                  if($kode =='67'):?>
				<div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>obat_reg/updateaprovecek" method="POST" enctype="multipart/form-data">
                  <div class="col-md-6">
                     <input type="hidden" class="form-control" value="<?php echo $idpr2;?>" id="" name="idpr2">
                      <input type="hidden" class="form-control" value="<?php echo $tanggal_tr;?>" id="" name="tanggal_tr">
                      <input type="hidden" class="form-control" value="0" id="" name="status">
                      <input type="hidden" class="form-control" value="<?php echo $id_tipe_produk;?>" id="" name="id_tipe_produk">                                      
                    </div>
                 <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat">anda yakin kirim data?farq</button>
                   </div><!-- /.col -->                     
                   
                </div><!-- /.item -->
                
               </form>   
			<?php endif;?>
			
			
			 <?php
            $kode=($this->session->userdata('koderole'));
                  if($kode !='67'):?>
			<div class="modal-body">
			  <form role="form" action="<?php echo base_url(); ?>obat_reg/updateaprove" method="POST" enctype="multipart/form-data">

                  <?php
                          $dara=($this->session->userdata('koderole'));
                   if($dara =='10'):?>
                   <input type="hidden" class="form-control" value="<?php echo $idpr2;?>" name="idpr2">
                       <input type="hidden" class="form-control" value="TP005" id="" name="id_tipe_produk">

                     <div class="form-group" hidden>
                      <label for="">tanggal_tr</label>
                        <input type="text" class="form-control" value="<?php echo $tanggal_tr; ?>" id="" name="tanggal_tr"  />                      
                    </div> 
                 <input type="hidden" class="form-control" value="<?php echo $mengetahui; ?>" id="" name="mengetahui">
                 <input type="hidden" class="form-control" value="<?php echo $ttd_mengetahui; ?>" id="" name="ttd_mengetahui">
                 <input type="hidden" class="form-control" value="<?php echo $jb_mengetahui; ?>" id="" name="jb_mengetahui">
                   <input type="hidden" class="form-control" value="<?php echo $nama_satu; ?>" id="" name="nama_satu">
                 <input type="hidden" class="form-control" value="<?php echo $ttd_satu; ?>" id="" name="ttd_satu">
                  <input type="hidden" class="form-control" value="<?php echo $jb_satu; ?>" id="" name="jb_satu">
                    <input type="hidden" class="form-control" value="<?php echo $flagobat; ?>" id="" name="flagobat">
				   
				   <?php 
				   $flag=$flagobat;
				   if ($flag=='1'): ?>
				   <input type="hidden" class="form-control" value="3" id="" name="status">
                 <?php endif;?>
				 
				   <?php 
				  $flag=$flagobat;
				   if ($flag=='2'): ?>
				   <input type="hidden" class="form-control" value="10" id="" name="status">
                 <?php endif;?>
				 
                 
                    
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $this->session->userdata('nama')?>"  name="menyetujui">
                    </div>
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $this->session->userdata('nama_role')?>"  name="jb_menyetujui">  
                 
                    </div>
                   <div class="form-group">
               <label type="hidden" for="">Mengetahui</label>
                        <select name="ttd_menyetujui" class="form-control">
                          <option>Mengetahui</option>
                            <?php foreach($idmenyetujui as $data) {
                          if(!in_array($data['foto'],$for_ttdmen)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>
                      <?php endif;?>  
                      <?php
                          $daradev=($this->session->userdata('koderole'));
                   if($daradev =='57'):?>
                       <input type="hidden" class="form-control" value="<?php echo $idpr2;?>" name="idpr2">
                        <input type="hidden" class="form-control" value="TP005" id="" name="id_tipe_produk">
                     <div class="form-group" hidden>
                      <label for="">tanggal_tr</label>
                        <input type="text" class="form-control" value="<?php echo $tanggal_tr; ?>" id="" name="tanggal_tr"  />  

                    </div> 
                     <input type="hidden" class="form-control" value="<?php echo $menyetujui; ?>" id="" name="menyetujui">
                 <input type="hidden" class="form-control" value="<?php echo $ttd_menyetujui; ?>" id="" name="ttd_menyetujui">
                  <input type="hidden" class="form-control" value="<?php echo $jb_menyetujui; ?>" id="" name="jb_menyetujui">
                  <input type="hidden" class="form-control" value="<?php echo $nama_satu; ?>" id="" name="nama_satu">
                 <input type="hidden" class="form-control" value="<?php echo $ttd_satu; ?>" id="" name="ttd_satu">
                  <input type="hidden" class="form-control" value="<?php echo $jb_satu; ?>" id="" name="jb_satu">  
                  <input type="hidden" class="form-control" value="82" id="" name="status">
                       <div class="form-group">
               <label type="hidden" for="">Disetujui Oleh</label>
                        <select name="ttd_mengetahui" class="form-control">
                          <option>Disetujui Oleh</option>
                            <?php foreach($idmengetahui as $data) {
                          if(!in_array($data['foto'],$for_ttdmeng)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>
                   <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $this->session->userdata('nama')?>"  name="mengetahui">  
                     </div>
					 <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $this->session->userdata('nama_role')?>"  name="jb_mengetahui">  
                 
                    </div>
                       <?php endif;?> 
                        <?php
                          $dara21=($this->session->userdata('koderole'));
                   if($dara21 =='56' || $dara21 =='69' ):?>
                   <input type="hidden" class="form-control" value="<?php echo $idpr2;?>" name="idpr2">
                      <input type="hidden" class="form-control" value="1" id="" name="status">
                      <input type="hidden" class="form-control" value="TP005" id="" name="id_tipe_produk">
                      
                  <div class="form-group" hidden>
                      <label for="">tanggal_tr</label>
                        <input type="text" class="form-control" value="<?php echo $tanggal_tr; ?>" id="" name="tanggal_tr"  />                      
                    </div> 
                   <div class="form-group">
               <label type="hidden" for="">Dibuat Oleh</label>
                        <select name="ttd_satu" class="form-control">
                          <option>--Dibuat Oleh--</option>
                            <?php foreach($idpengajuan as $data) {
                          if(!in_array($data['foto'],$for_ttdsatus)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $this->session->userdata('nama')?>"  name="nama_satu">  
                 
                    </div>
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $this->session->userdata('nama_role')?>"  name="jb_satu">  
                 
                    </div>
                   
                   
                      <?php endif;?>   
                   <?php
                          $daradev=($this->session->userdata('koderole'));
                   if($daradev =='82'):?>
                       <input type="hidden" class="form-control" value="<?php echo $idpr2;?>" name="idpr2">
                        <input type="hidden" class="form-control" value="TP005" id="" name="id_tipe_produk">
                     <div class="form-group">
                      <label for="">Tanggal Transaksi</label>
                        <input type="text" class="form-control" value="<?php echo $tanggal_tr; ?>" id="" name="tanggal_tr" readonly />

                    </div>
                     <input type="hidden" class="form-control" value="<?php echo $menyetujui; ?>" id="" name="menyetujui">
                 <input type="hidden" class="form-control" value="<?php echo $ttd_menyetujui; ?>" id="" name="ttd_menyetujui">
                  <input type="hidden" class="form-control" value="<?php echo $jb_menyetujui; ?>" id="" name="jb_menyetujui">
                  <input type="hidden" class="form-control" value="<?php echo $nama_satu; ?>" id="" name="nama_satu">
                 <input type="hidden" class="form-control" value="<?php echo $ttd_satu; ?>" id="" name="ttd_satu">
                  <input type="hidden" class="form-control" value="<?php echo $jb_satu; ?>" id="" name="jb_satu">
                  <input type="hidden" class="form-control" value="2" id="" name="status">
                      <input type="hidden" class="form-control" value="<?php echo $mengetahui; ?>" id="" name="mengetahui">
                 <input type="hidden" class="form-control" value="<?php echo $ttd_mengetahui; ?>" id="" name="ttd_mengetahui">
                  <input type="hidden" class="form-control" value="<?php echo $jb_mengetahui; ?>" id="" name="jb_mengetahui">
                    
                       <?php endif;?>
                      
                    
					
			
					<div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat">Approved</button>
                   </div><!-- /.col --> 
				</div>
				   
			</div>
			    </div><!-- /.item -->
                
               </form>   
			<?php endif;?>
			   
			
			
              </div></div></div></div> 
             <?php } ?>
              <!-- END MODAL edit -->
			  
			<?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode !='71'  and $kode !='10' and $kode !='82' and $kode !='57' and $kode !='56' ):?>
			  
			     
	  <?php
		  
		   
		   
		  foreach($data_reject as $i){
		  $iddetailprod2 = $i['iddetailprod2'];
		  $koded_prod =$i['koded_prod'];
		  $kode_trans = $i['kode_trans'];
		  $koper = $i['koper'];
		  $idobat = $i['idobat'];
		  $kode_obat= $i['kode_obat'];
		  $koded_prod=$i['koded_prod'];
		  $kodist = $i['kodis'];
		  $golonganid= $i['golonganid'];
		  $komposisi= $i['komposisi'];
		  $harga_lama= $i['harga_lama'];
		  $discount_lama= $i['discount_lama'];
		  $catatan= $i['catatan'];
		  
			 ?>
<div id="modal_edit_outs<?php echo $iddetailprod2;?>" class="modal fade">
  <div class="modal-dialog modal-lg">
    <!-- <div class="modal-content"> -->
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">STATUS</h4></td>
      </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>obat_reg/update_transaksi_outstand" method="POST" enctype="multipart/form-data">
	 <div class="col-lg-6">
                  <input type="hidden" class="form-control" value="<?php echo $iddetailprod2;?>" name="iddetailprod2">
                  <input type="hidden" class="form-control" value="<?php echo $koded_prod;?>" name="koded_prod"><input type="hidden" class="form-control" value="<?php echo $kode_trans;?>" name="kode_trans">
                  <input type="hidden" class="form-control" value="<?php echo $koper;?>" name="koper">
				
				<div class="form-group" >
                      <label for="">NAMA PRODUK (OBAT)</label>
                        <select id="idobat" name="idobat" class="form-control" required>
                         <option value="-">--Pilih Obat--</option>
                          <?php foreach($obat as $row) { ?>
                              <option value="<?php echo $row['idobat'] ?>" <?php echo $row['idobat'] == $idobat ? 'selected="selected"' : '' ?>><?php echo $row['idobat'] ?> || <?php echo $row['nama_obat'] ?></option>
                          <?php } ?>
                        </select>    
					</div>
					
					<div class="form-group">
                       <label for="">kode obat</label>
             <input type="text" class="form-control" value="<?php echo $kode_obat; ?>" name="kode_obat" id="" placeholder=""/>
                    </div>  

				<div class="form-group" >
                      <label for="">Distributor</label>
                        <select id="" name="kodis" class="form-control" required>
                         <option value="-">--Pilih Dist--</option>
                          <?php foreach($distrib as $rows) { ?>
                              <option value="<?php echo $rows['kodis'] ?>" <?php echo $rows['kodis'] == $kodist ? 'selected="selected"' : '' ?>><?php echo $rows['kodis'] ?> || <?php echo $rows['nm_distributor'] ?></option>
                          <?php } ?>
                        </select>    
					</div>



					<div class="form-group">
                      <label for="">GOLONGAN</label>
                       <input type="text" class="form-control" value="<?php echo $golonganid; ?>" name="golonganid" readonly>                 
                    </div> 

                    <div class="form-group">
                      <label for="">KOMPOSISI</label>
                       <input type="text" class="form-control" value="<?php echo $komposisi; ?>" name="komposisi" readonly>                 
                    </div> 

                    <div class="form-group">
                      <label for="">HARGA SATUAN</label>
                       <input type="text" class="form-control" value="<?php echo $harga_lama; ?>" name="harga" id="" placeholder="HARGA SATUAN" required/ >                 
                    </div> 
					
	           </div>
			<div class="col-lg-6">
                   

                    <div class="form-group">
                      <label for="">DISKON</label>
                       <input type="text" class="form-control" value="<?php echo $discount_lama; ?>" name="discount" id="" placeholder="DISKON" required/>                 
                    </div> 

                    <div class="form-group">
                      <label for="">CATATAN</label>
                       <input type="text" class="form-control" value="<?php echo $catatan; ?>" name="catatan" id="" placeholder="Catatan"/>                 
                    </div> 
          
                                       
                    </div></div>
                     <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>obat_reg/addtrfarmasinew" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div>
                </div>
				
					
					
				
                </div>                
                   
                </div>
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>
			  
			  <?php endif;?>




			  
