 <section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>DETAIL PRODUK OBAT BARU (OUTSTANDING)</b><br>
      <b>PRINSIPAL</b><span> : </span><b><?php echo $prod->nm_perusahaan ?></b><br>
      <b>DISTRIBUTOR</b><span> : </span><b><?php echo $prod->nm_distributor ?></b>
      
	   </h4>
        </section>
		
			  <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode == '67' or $kode == '56' ):?> 
				 
<a  style="margin-left:10px" href="<?php echo base_url(); ?>obat_reg/addtrfarmasinew" class="btn btn-info"><i class="icon-remove-sign"></i> KEMBALI </a>
     <?php endif;?>


	


	 

	<?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode =='10' or $kode =='82' or $kode =='57'):?>
				<a  style="margin-left:10px" href="<?php echo base_url(); ?>obat_reg/addtrfarmasinew" class="btn btn-info"><i class="icon-remove-sign"></i> KEMBALI </a>
				<?php endif;?>
			
	 
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>

                <div class="box-title"><br>
         <div class="panel panel-primary"></div>
       
         
   
                 <br>
                </div>
                <div class="table-responsive">
                <div class="box-body">
				<form method="post" action="<?php echo base_url(); ?>obat_reg/save_ditolak_item" id="form-delete2">
                  <table id="tb-datatables" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr class="danger">
                      <th style="vertical-align: middle;text-align: center;">NO</th>
                      <th style="vertical-align: middle;text-align: center;">DISTRIBUTOR</th>
					  <th style="vertical-align: middle;text-align: center;">KODE PRODUK</th>
                      <th style="vertical-align: middle;text-align: center;">NAMA PRODUK</th>
                      <th style="vertical-align: middle;text-align: center;">GOLONGAN</th>
                      <th style="vertical-align: middle;text-align: center;">KOMPOSISI</th>
                      <th style="vertical-align: middle;text-align: center;">HARGA SATUAN</th>
                      <th style="vertical-align: middle;text-align: center;">DISKON</th>
                      <th style="vertical-align: middle;text-align: center;">HARGA AKHIR</th>
                      <th style="vertical-align: middle;text-align: center;">CATATAN</th>

					  <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode == '67' ):?> 
                      <th style="vertical-align: middle;text-align: center;">AKSI</th>
					  <th style="vertical-align: middle;text-align: center;">STATUS</th>
					  <?php endif;?>
					  
			       <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode =='10' or $kode =='82' ):?> 
                     <th style="text-align:center;"><input type="checkbox" id="check-all"><b style="color:red;">&nbsp*ceklist ini untuk all reject</b><br><br><button id="btn-delete" class="btn btn-danger no-radius dropdown-toggle"><i class="fa fa-close"></i> REJECT </button></th>
					
					  <?php endif;?>
					  
				  <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode =='10' or $kode =='82' or $kode =='57' or $kode =='56' ):?> 
                     
					  <th style="vertical-align: middle;text-align: center;">STATUS</th>
					  <?php endif;?>
					
                   
                  </tr>
				  
                                                       
                    </tr>
                    
                  </thead>
                  <tbody>
                   <?php $no=0;
                    
                     foreach($data_prods2 as $row) { 
                               $no++                              
                             
                      ?>
                    <tr>
                       <td style="text-align: center;"><?php echo $no; ?></td>
                       <td><?php echo $row['nm_distributor']; ?></td>
					   <td><?php echo $row['kode_obat']; ?></td>
                       <td><?php echo $row['nama_obat']; ?></td>
                       <td><?php echo $row['golonganid']; ?></td>
                       <td><?php echo $row['komposisi']; ?></td>
                       <td style="text-align: center;">Rp.<?php echo number_format($row['harga_baru'], 2,',','.'); ?></td>
                       <td style="text-align: center;"><?php echo $row['discount_baru']; ?> %</td>
                       <td style="text-align: center;">Rp.<?php echo number_format($row['harga_akhir_baru'], 2,',','.'); ?></td>
                       <td><?php echo $row['catatan']; ?></td>
					  
				<?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode == '67' ):?> 
                      <td style="text-align: center;">                                     
                      
                     <a style="margin-bottom:3px;" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_edit_outs<?php echo $row['iddetailprod2'];?>"><i class="fa fa-desktop">&nbspUpdate transaksi</i></a>
					 <a style="margin-bottom:3px;" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_editdaraanisa<?php echo $row['iddetailprod2'];?>"><i class="glyphicon glyphicon-ok">&nbspAjukan Kembali</i></a>
					 <td>
					 <?php 
					   
							$bky=($row['statusdetil_obat']); 
							
				
	   
							if ($bky == "ditolak" ) {
							  echo '<p style="background-color:red; color:white; "text-align:center;">&nbsp Data <b>Ditolak</b></p>';

							}
							else{
						
							  //echo '<p style="background-color:grey; color:yellow; text-align:center;"><b>Terisi</b> </p>';
							}
							?>
					 
					 
					 </td>
					 </td>
					 
				<?php endif;?>	 
					 <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode =='10' or $kode =='82'):?>
					 
					 
					 <td style="vertical-align: middle;text-align: center;">   
						&nbsp&nbsp 
							<input type='checkbox' class='check-item' name='iddetailprod2[]' value="<?php echo $row['iddetailprod2']; ?>">
							<input  type='hidden' name='koded_prod' value="<?php echo $row['koded_prod']; ?>">
						&nbsp&nbsp
						<input type="text" class="text form-control" autocomplete="off"  value=""  id="show"   name='catatan3[]' placeholder="Isikan Catatan Ditolak"  disabled>
						 <input  type='hidden' name='statusdetil_obat' value="ditolak">
			<?php endif;?>	   
				   
				   </td>
				   
				   <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode =='57' or $kode =='56' ):?> 
                      <td style="text-align: center;">                                     
                      
					 <a style="margin-bottom:3px;" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_editdaraanisa<?php echo $row['iddetailprod2'];?>"><i class="glyphicon glyphicon-ok">&nbspAjukan Kembali</i></a>
					 </td>
					<?php 
					  elseif($kode =='10' or $kode =='82'): ?>
					    <td style="text-align: center;">   
					  <a style="margin-bottom:3px;" class="btn btn-success btn-sm" ><i class="glyphicon glyphicon-ok" disabled>&nbspAjukan Kembali</i></a>
				
					 </td>
				    <?php 
					  else: ?>
				   
				   <?php endif;?>	
				   
				   
				   
                      
                    </tr>
                        <?php
                             }?>
                  </tbody>
                
                </table>

                 <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr  bgcolor="skyblue">  <td width="140"><b>JUMLAH PRODUK</b></td><td width="10">:</td><td width="10"><b> <?php echo count($data_prods2); ?></b></td></tr>
                   </tr>
                    </table>
				</form>
                </div>
               </div>
            </div>
            </div>
          </div>
        </div>


<!-- modal -->
      <div id="myModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="panel panel-primary">
				<div class="panel-heading">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">IMPORT DATA</h4></td>
      </div>
	      <div class="modal-body">

	
				<script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
	
	<script>
	$(document).ready(function(){
		// Sembunyikan alert validasi kosong
		$("#kosong").hide();
	});
	</script>	
	
	<div class="col-sm-12">	
	<!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
					<form method="post" action="<?php echo base_url("obat_reg/import_detail"); ?>" enctype="multipart/form-data">
						<!-- -- Buat sebuah input type file-->
						<input type="hidden" class="form-control" value="<?php echo $prod->idpr2 ?>" id="" name="koded_prod">                              
                     <input type="hidden" class="form-control" value="<?php echo $prod->koper ?>" id="" name="koper">
					 <input type="hidden" class="form-control" value="<?php echo $prod->kodis ?>" id="" name="kodis"> 					 
                     <input type="hidden" class="form-control" value="<?php echo $prod->kode_trans ?>" id="" name="kode_trans">
					 <input type="hidden" class="form-control" value="<?php echo $prod->tanggal_tr ?>" id="" name="tanggal"> 
					 <input type="hidden" class="form-control" value="<?php echo $prod->flagobat ?>" id="" name="flagobat">
					<input type="hidden" class="form-control" value='draft' id="" name="statusdetil_obat">					 
					
					 <br>
					 <a style="margin-bottom:3px" href="<?php echo base_url("excel/template.xlsx");?>" 
					  class="btn btn-info no-radius dropdown-toggle"><i class="glyphicon glyphicon-floppy-save"></i> DOWNLOAD FORMAT UPLOAD </a>
					  <p style="color: red;">*download format excel jika belum ada</p>	
						<br>
						
				<div class="col-sm-6">	
					<input type="file" name="file" class="btn btn-default no-radius dropdown-toggle">
				<!---- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import-->
				
				<br>
				*) File harus dengan ekstensi .xlsx
				<br>
					</div>				
			</div> 			
				<div class="modal-footer">
				
					<button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
						<input type="submit" target='blank' class="btn btn-primary" value="IMPORT">
					</div>
                </fieldset>
                  </form>
                </div></div></div></div></div>                         
<!--- end modal -->
    
	<?php
      foreach($data_prods2 as $i){
      $idpr2=$i['iddetailprod2'];
      $tanggal_tr = $i['tanggal'];
      $kode_obat = $i['kode_obat'];
	 $iddetailprod2 = $i['koded_prod'];
	 $koper = $i['koper'];
	 $flagobat = $i['flagobat'];
	 //$status_revisi = $i['outstanding'];
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
                     <input type="hidden" class="form-control" value="<?php echo $iddetailprod2; ?>" id="" name="idpr2">
					 <input type="hidden" class="form-control" value="<?php echo $idpr2; ?>" id="" name="iddetailprod2">
                      <input type="hidden" class="form-control" value="<?php echo $tanggal_tr;?>" id="" name="tanggal_tr">
					  <input type="hidden" class="form-control" value="<?php echo $kode_obat;?>" id="" name="kode_obat">
					  <input type="hidden" class="form-control" value="<?php echo $koper;?>" id="" name="koper">
					  <input type="hidden" class="form-control" value="<?php echo $flagobat;?>" id="" name="flagobat">
					  <input type="hidden" class="form-control" value="-" id="" name="status_revisi">
                         <?php
							$kode=($this->session->userdata('koderole'));
						   if($kode =='67' ):?>
					   <input type="text" class="form-control" value="0" id="" name="statusdetil_obat">
                    <?php endif;?>	
					   
					   <?php
							$kode=($this->session->userdata('koderole'));
						   if($kode =='56' ):?>
					   <input type="text" class="form-control" value="1" id="" name="statusdetil_obat">
                    <?php endif;?>	
					  <?php
							$kode=($this->session->userdata('koderole'));
						   if($kode =='57' ):?>
					   <input type="text" class="form-control" value="82" id="" name="statusdetil_obat">
                    <?php endif;?>
					  <?php
							$kode=($this->session->userdata('koderole'));
						   if($kode =='82' ):?>
					   <input type="text" class="form-control" value="2" id="" name="statusdetil_obat">
                    <?php endif;?>
					  <?php
							$kode=($this->session->userdata('koderole'));
						   if($kode =='10' ):?>
					   <input type="text" class="form-control" value="3" id="" name="statusdetil_obat">
                    <?php endif;?>
					</div>
                             <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat">anda yakin merubah Data ?... <p> Tanggal : <?php echo $tanggal_tr;?><br>Kode obat : <b> <?php echo $kode_obat;?></b></button>
                   </div><!-- /.col -->

                           </div><!-- /.item -->

               </form>

              </div></div></div></div>
             <?php } ?>
			 





<?php
    $kode=($this->session->userdata('koderole'));
        if($kode !='71'  and $kode !='10' and $kode !='82' and $kode !='57' and $kode !='56' ):?>


<?php
		  
		   
		   
		  foreach($data_prods2 as $i){
		  $iddetailprod2 = $i['iddetailprod2'];
		  $koded_prod =$i['koded_prod'];
		  $kode_trans = $i['kode_trans'];
		  $koper = $i['koper'];
		  $idobat = $i['idobat'];
		  $kode_obat= $i['kode_obat'];
		  $koded_prod=$i['koded_prod'];
		  $kodis = $i['kodis'];
		  $golonganid= $i['golonganid'];
		  $komposisi= $i['komposisi'];
		  $harga_lama= $i['harga_baru'];
		  $discount_lama= $i['discount_baru'];
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
                        <select id="kodis" name="kodis" class="form-control" required>
                         <option value="-">--Pilih Dist--</option>
                          <?php foreach($distri as $rows) { ?>
                              <option value="<?php echo $rows['kodis'] ?>" <?php echo $rows['kodis'] == $kodis ? 'selected="selected"' : '' ?>><?php echo $rows['kodis'] ?> || <?php echo $rows['nm_distributor'] ?></option>
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

                </div>
                </div>
				
					
					
				
                </div>                
                   
                </div>
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>
			  
			  <?php endif;?>

