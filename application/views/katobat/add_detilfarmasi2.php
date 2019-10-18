 <script src="<?php echo base_url('assets/js/my.js'); ?>" type="text/javascript"></script>
 
 <section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>DETAIL PRODUK OBAT LAMA</b><br>
      <b>PRINSIPAL</b><span> : </span><b><?php echo $prod->nm_perusahaan ?></b><br>
      <b>DISTRIBUTOR</b><span> : </span><b><?php echo $prod->nm_distributor ?></b>
        
		
		</h4>
        </section>
        
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>

                <div class="box-title"><br>
                <div class="panel panel-primary"></div>

          <!-- <div class="col-md-12"> -->
           <a style="margin-left:3px" href="<?php echo base_url(); ?>obat_reg/addtrfarmasinew" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> KEMBALI </a>
           
          
                 <br>
                 <br>
                </div>

                <div class="table-responsive">
			
                <div class="box-body">
				<form method="post" onload='document.form4.harga_baru[].focus()' name="form4" action="<?php echo base_url(); ?>obat_reg/save_viewdetil_lamafarmasi"/>
                  <table id="tb-datatables_baswin" class="table table-bordered table-striped table-hover">
                  <input type='hidden' name='idpr21' value="<?php echo $prod->idpr2 ?>">
				  <thead>
                    <tr class="danger">
                      <th  style="vertical-align: middle;text-align: center;">NO</th>
                      <th  style="vertical-align: middle;text-align: center;">DISTRIBUTOR</th>
                      <th style="vertical-align: middle;text-align: center;">NAMA PRODUK</th>
                       <th style="vertical-align: middle;text-align: center;">GOLONGAN</th>
                      <th style="vertical-align: middle;text-align: center;">KOMPOSISI</th>
                      <th  style="vertical-align: middle;text-align: center;">HARGA LAMA (Rp.)</th>
					  <th  style="vertical-align: middle;text-align: center;">DISKON LAMA</th>
					  <th  style="vertical-align: middle;text-align: center;">HARGA AKHIR LAMA (Rp.)</th>
                       <th  style="vertical-align: middle;text-align: center;">HARGA BARU (Rp.)</th>
                         <th  style="vertical-align: middle;text-align: center;">DISKON BARU (%)</th>                         
						 <th  style="vertical-align: middle;text-align: center;">HARGA AKHIR BARU (Rp.)</th>
						 <th  style="vertical-align: middle;text-align: center;">DISCONTINUE</th>
                          <th  style="vertical-align: middle;text-align: center;">CATATAN I</th>
                          <th  style="vertical-align: middle;text-align: center;">CATATAN II</th>
                          <th  style="vertical-align: middle;text-align: center;">STATUS</th>
                         <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode == '67' ):?> 
                     
					  <th style="vertical-align: middle;text-align: center;">AKSI<br><!--<input type="checkbox" id="check-all">--><br><button type="submit" onclick="enterNumber()" title="simpan" class="btn btn-success no-radius dropdown-toggle"><i class="fa fa-plane"></i> ALL SIMPAN </button></th>
					 <?php endif;?>

					 <?php
						$kode=($this->session->userdata('koderole'));
							if($kode =='10' or $kode =='82' or $kode =='57' or $kode =='56' ):?>
						<th style="vertical-align: middle;text-align: center;">AKSI<br><input type="checkbox" id="check-all"><b style="color:red;">&nbsp*ceklist ini untuk all reject</b><br><br><br><button id="btn-delete" class="btn btn-danger no-radius dropdown-toggle"><i class="fa fa-close"></i> REJECT </button></th>					   
                  <?php endif;?>
					  
                                                       
                    </tr>
                    
                  </thead>
                  <tbody onload="">
                   <?php $no=0;
						  // $hbaru=$_POST['harga_baru'];
						  // $discbaru=$_POST['discount_baru']/100;
						 // $habar= $_POST['harga_baru'];	  
						// $hasil_habar = str_replace(".", "", $habar); 
					
                     foreach($data_prods2 as $row) { 
                          $hlama= $row['harga_baru'];
						  $disclama= $row['discount_baru']/100;
						  $hasil_lama= $hlama*$disclama;
						 $hasil_lama2= $hlama-$hasil_lama;
						 
						 
						   // $hasil_baru= $hbaru*$discbaru;
						   // $hasil_baru2= $hbaru-$hasil_baru;
							  $no++  
							 
                          
                      ?>
                    <tr>
                      <td style="vertical-align: middle;text-align: center;"><?php echo $no; ?></td>
                       <td style="vertical-align: middle;text-align: center;"><?php echo $row['nm_distributor']; ?><input type="hidden" name="kodis[]" value="<?php echo $row['kodis']; ?>"><input type="hidden" name="koper[]" value="<?php echo $row['koper']; ?>"></td>
                       <td style="vertical-align: middle;text-align: center;"><?php echo $row['nama_obat']; ?><input type="hidden" name="kode_obat[]" value="<?php echo $row['kode_obat']; ?>"></td>
                      <td style="vertical-align: middle;text-align: center;"><?php echo $row['golonganid']; ?></td>
                       <td style="vertical-align: middle;text-align: center;"><?php echo $row['komposisi']; ?></td>
					   
					       <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode != '67' ):?> 
					   <td style="vertical-align: middle;text-align: center;" ><input type="label" name="harga_lama[]" class="form-control"  value="<?php echo $row['harga_lama']; ?>" readonly></td>
					   <td style="vertical-align: middle;text-align: center;" ><input type="text" name="discount_lama[]" class="form-control"  value="<?php echo $row['discount_lama']; ?>" readonly> </td>
					   <td style="vertical-align: middle;text-align: center;" ><input type="text" class="form-control"  name="harga_akhir_lama[]" value="<?php echo number_format ($row['harga_akhir_lama']); ?>" readonly></td>
					<?php endif;?>	
					<?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode == '67' ):?> 					
                      <td style="vertical-align: middle;text-align: center;" ><input type="label" name="harga_lama[]" class="form-control"  value="<?php echo $row['harga_baru']; ?>" readonly></td>
					   <td style="vertical-align: middle;text-align: center;" ><input type="text" name="discount_lama[]" class="form-control"  value="<?php echo $row['discount_baru']; ?>" readonly> </td>
					   <td style="vertical-align: middle;text-align: center;" ><input type="text" class="form-control"  name="harga_akhir_lama[]" value="<?php echo number_format($hasil_lama2); ?>" readonly></td>
					     <?php endif;?>	
						 <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode == '67' ):?> 
                      <td style="vertical-align: middle;text-align: center;"><input bgcolor="#e1fbf5" type="text" autocomplete="off" class="harbar form-control"  value="" id="text_harbar" name="harga_baru[]" placeholder="Isikan harga baru" ></td>		 
                        <td style="vertical-align: middle;text-align: center;"><input type="text" autocomplete="off" class="disco form-control" value="" id="" name="discount_baru[]" placeholder="Isikan diskon baru" ></td>
					 <?php endif;?>	
					     <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode !='67' ):?> 
						<td style="vertical-align: middle;text-align: center;"><input bgcolor="#e1fbf5" type="text" autocomplete="off" class="harbar2 form-control"  value="<?php echo $row['harga_baru']; ?>" id="text_harbar2" onclick="enterNumber()" name="harga_baru[]" placeholder="Isikan harga baru" readonly></td>		 
                        <td style="vertical-align: middle;text-align: center;"><input type="text" autocomplete="off" class="disco form-control" value="<?php echo number_format($row['discount_baru']); ?>" id="" name="discount_baru[]" placeholder="Isikan diskon baru" readonly></td>
					<?php endif;?>		
                      <td style="vertical-align: middle;text-align: center;"><input type="text" class="total form-control"  name="harga_akhir_baru[]" value="<?php echo number_format($row['harga_akhir_baru']); ?>" readonly></td>
                         <td style="vertical-align: middle;text-align: center;"><input type="checkbox" value="1" name="discontinue[]" ></td>
						 
						  <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode == '67' ):?> 
                         <td style="vertical-align: middle;text-align: center;"><input type="text" name="catatan[]" class="form-control"  value="" required></td>
                         <td style="vertical-align: middle;text-align: center;"><input type="text" name="catatan2[]" class="form-control"  value="" required></td>
					<?php endif;?>
					<?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode != '67' ):?> 
                         <td style="vertical-align: middle;text-align: center;"><input type="text" name="catatan[]" class="form-control"  value="<?php echo $row['catatan']; ?>" readonly></td>
                         <td style="vertical-align: middle;text-align: center;"><input type="text" name="catatan2[]" class="form-control"  value="<?php echo $row['catatan2']; ?>" readonly></td>
					<?php endif;?>						
						 
						 
                         <td style="vertical-align: middle;text-align: center;"><?php 
					   
							$bk=($row['statusdetil_obat']);
				
	   
							if ($bk == '01') {
							  echo '<p style="background-color:blue; color:yellow; text-align:center;">Need Approve</p>';

							}else{
							  echo '<p style="background-color:grey; color:yellow; text-align:center;">Draft</p>';
							}
							?></td>
                     
					 <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode == '67' ):?> 
                         <td style="vertical-align: middle;text-align: center;">                                     
							<a  style="margin-bottom:3px;" class="btn btn-success btn-sm" ><i class="glyphicon glyphicon-ok"></i></a>
					
                     
                     
					 &nbsp&nbsp 
					 
							<input type='hidden' name='flagobat[]' value="2">
							<input type='hidden' name='statusdetil_obat[]' value="draft">
							<input type='hidden' name='iddetailprod2[]' value="<?php echo $row['iddetailprod2']; ?>">
		
					 <input  type='hidden' name='koded_prod[]' value="<?php echo $row['koded_prod']; ?>">
					
							&nbsp&nbsp 
							<!--<a  style="margin-bottom:3px;" onclick="return confirm('Hapus data beserta detail??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>obat_reg/hapusdetail/<?php echo $row['iddetailprod2']; ?>/<?php echo $row['koded_prod']; ?>/<?php echo $row['koper']; ?>"><i class="glyphicon glyphicon-remove"></i></a>-->
					 
					</td>
					<?php endif;?>
					 
					 <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode =='10' or $kode =='82' or $kode =='57' or $kode =='56' ):?>
				 <td style="vertical-align: middle;text-align: center;"> 
				   
										   
						&nbsp&nbsp 
							<input type='checkbox' class='check-item' name='iddetailprod2[]' value="<?php echo $row['iddetailprod2']; ?>">
		
					 <input  type='hidden' name='koded_prod' value="<?php echo $row['koded_prod']; ?>">
						&nbsp&nbsp<input type="text" class="form-control" autocomplete="off"  value=""  id="catatheadrev" name='catatan3[]' placeholder="Isikan Catatan Ditolak"  >
					   
	
												
                   </td>
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




