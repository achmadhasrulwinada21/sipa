 <section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>DETAIL PRODUK OBAT BARU</b><br>
      <b>PRINSIPAL</b><span> : </span><b><?php echo $prod->nm_perusahaan ?></b><br>
      <b>DISTRIBUTOR</b><span> : </span><b><?php echo $prod->nm_distributor ?></b>
      
	   </h4>
        </section>
		
			  <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode == '67' or $kode == '56' ):?> 
				 
				   
		
         <section class="content">
		 
			
		 
          
			<div class="row">
              <div class="box">
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">TAMBAH DATA</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form  role="form" form name="form1" action="<?php echo base_url(); ?>obat_reg/savedata" method="POST" enctype="multipart/form-data" id="multiple_select_form">
                    <table class="table-common">
                    
					<a style="margin-bottom:3px;" data-toggle="modal" data-target="#myModal" target='blank' class="btn btn-success btn-sm" ><i class="fa fa-download">&nbsp</i>IMPORT EXCEL</a> 
      
                      
                 <div class="panel panel-primary"></div>
                  <div class="col-lg-6">
                    
                     <input type="hidden" class="form-control" value="<?php echo $prod->idpr2 ?>" id="" name="koded_prod">                              
                     <input type="hidden" class="form-control" value="<?php echo $prod->koper ?>" id="" name="koper"> 
                     <input type="hidden" class="form-control" value="<?php echo $prod->kode_trans ?>" id="" name="kode_trans">
					 <input type="hidden" class="form-control" value="<?php echo $prod->tanggal_tr ?>" id="" name="tanggal"> 
					 <input type="hidden" class="form-control" value="<?php echo $prod->flagobat ?>" id="" name="flagobat"> 					 
                    
              <div class="form-group">
                      <label for="">NAMA PRODUK (OBAT)</label><b style="color:red;">&nbsp*harus diisi</b><br>
                        <select id="idobat" name="idobat" class="form-control" required>
                          <option value="" required>pilih obat</option>
                          <?php foreach($obat as $row) { ?>
                              <option value="<?php echo $row['idobat'] ?>" required><?php echo $row['nama_obat'] ?></option>
                          <?php } ?>
                        </select> <br>   
                   </div>
                   <div class="form-group" hidden>
                       <label for="">KODE PRODUK</label>
                  <input type="text" class="form-control" value="" name="kode_obat" id=""/></div>

                    <div class="form-group">
                       <label for="">DISTRIBUTOR</label><b style="color:red;">&nbsp*harus diisi</b><br>
                            <select id="" name="kodis" class="chosen form-control" required="true">
                          <option required></option>
                          <?php foreach($distri as $row) { ?>
                              <option value="<?php echo $row['kodis'] ?>" required><?php echo $row['nm_distributor'] ?></option>
                          <?php } ?>
                        </select> <br></div>


                        
                  <div class="form-group">
                      <label for="">GOLONGAN</label>
                       <input type="text" class="form-control" value="" name="golonganid" readonly>                 
                    </div> 

                    <div class="form-group">
                      <label for="">KOMPOSISI</label>
                       <input type="text" class="form-control" value="" name="komposisi" readonly>                 
                    </div> 

                    <div class="form-group">
                      <label for="">HARGA SATUAN</label>
                       <input type="text" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" value="0" name="harga" id="" placeholder="HARGA SATUAN" required/ >                 
                    </div> 

                                
                   </div>     
               <div class="col-lg-6">
                   <div class="form-group">
                      <label for="">DISKON</label>
                       <input type="text" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" value="0" name="discount" id="" placeholder="DISKON" required/>                 
                    </div> 

                    <div class="form-group">
                      <label for="">HARGA AKHIR</label>
                       <input type="text" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" value="0" name="harga_akhir_baru" readonly>                 
                    </div> 

                    <div class="form-group">
                      <label for="">CATATAN</label><br>
                       <textarea rows="4" cols="50" name="catatan"></textarea><br>                 
                    </div> 
                                   
                </table>
                </div>
                <div style="text-align:center;" class="form-actions">
            <button  type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo base_url(); ?>obat_reg/addtrfarmasinew" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
               
               </form>
                            
</section>
     <?php endif;?>  

	<?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode =='10' or $kode =='82' or $kode =='57' or $kode =='71'):?>
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
					  <?php endif;?>
					
                    <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode =='10' or $kode =='82'):?>
			
					<th style="text-align:center;"><input type="checkbox" id="check-all"><b style="color:red;">&nbsp*ceklist ini untuk all reject</b><br><br><button id="btn-delete" class="btn btn-danger no-radius dropdown-toggle"><i class="fa fa-close"></i> REJECT </button></th>					   
                 
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
                      <a style="margin-bottom:3px;" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>obat_reg/editabks/<?php echo $row['iddetailprod2']; ?>/<?php echo $row['koper']; ?>/<?php echo $row['flagobat']; ?>"><i class="glyphicon glyphicon-edit"></i></a>  
                      <a style="margin-bottom:3px;" onclick="return confirm('Hapus data beserta detail??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>obat_reg/hapusdetail/<?php echo $row['iddetailprod2']; ?>/<?php echo $row['koded_prod']; ?>/<?php echo $row['koper']; ?>/<?php echo $row['flagobat']; ?>"><i class="glyphicon glyphicon-remove"></i></a>
                     </td>
				<?php endif;?>	 
					 <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode =='10' or $kode =='82'):?>
					 
					 
					 <td style="vertical-align: middle;text-align: center;">   
						&nbsp&nbsp 
							<input type='checkbox' class="cek check-item" name='iddetailprod2[]' value="<?php echo $row['iddetailprod2']; ?>">
							<input  type='hidden' name='koded_prod' value="<?php echo $row['koded_prod']; ?>">
						&nbsp&nbsp
						<input type="text" class="text2 form-control" autocomplete="off"  value=""  id="" name='catatan3[]' placeholder="Isikan Catatan Ditolak"  disabled>
						 <input  type='hidden' name='statusdetil_obat' value="ditolak">
			<?php endif;?>	   
				   
				   </td>
                      
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
    
	



