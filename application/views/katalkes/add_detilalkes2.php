 <section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>DETAIL PRODUK ALKES</b><br><br>
          <b><?php echo $prod->nm_perusahaan ?></b>
        </h4>
    
			
        </section>
		<?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode =='75' or $kode =='76' ):?>
        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
           <div class="box">
		
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">TAMBAH DATA</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
				
				
				
                <div class="item">
                  <form role="form" form name="form2"  action="<?php echo base_url(); ?>Alkestransaksi/savedata" method="POST" enctype="multipart/form-data" id="multiple_select_form">
                    <table class="table-common">
                         
                      
                 <div class="panel panel-primary"></div>
              <div class="col-lg-6">
                    
                     <input type="hidden" class="form-control" value="<?php echo $prod->idpr2 ?>" id="" name="kode_alkes">                              
                    <input type="hidden" class="form-control" value="<?php echo $prod->koper ?>" id="" name="koper"> 
                     <input type="hidden" class="form-control" value="<?php echo $prod->kode_trans ?>" id="" name="kode_trans"> 
                    
              <div class="form-group">
                      <label for="">NAMA PRODUK (ALKES)</label><b style="color:red;">&nbsp*harus diisi</b><br>
                        <select id="kode_produk_v2" name="kode_produk" class="form-control" required>
                          <option value="" required>pilih Alkes</option>
                          <?php foreach($alkes as $row) { ?>
                              <option value="<?php echo $row['kode_produk'] ?>" required><?php echo $row['kode_produk'] ?> : <?php echo $row['nama_produk'] ?></option>
                          <?php } ?>
                        </select> <br>   
                   </div>
                  <div class="form-group">
                      <label for="">Merk</label>
                       <input type="text" class="form-control" value="" name="merk" id=""  autocomplete="off" readonly/>
                    </div>
               <div class="form-group">
                      <label for="">Type</label>
                       <input type="text" class="form-control" value="" name="type" id=""  autocomplete="off" readonly />
                    </div>
                  <div class="form-group">
                      <label for="">Rekanan</label>
                       <input type="text" class="form-control" value="" name="nm_perusahaan" id=""  autocomplete="off" readonly/>
                    </div>

                  <div class="form-group">
                      <label for="">HARGA</label><b style="color:red;">&nbsp*harus diisi</b>
                       <input type="text" class="form-control" value="" name="harga" id="" placeholder="harga" required autocomplete="off" onFocus="startCalc2();" onBlur="stopCalc2();"  />                 
                    </div>
                     <div class="form-group">
                      <label for="">DISCOUNT(%)</label>
                       <input type="text" class="form-control" value="0" name="discount" id="" placeholder="discount" autocomplete="off" onFocus="startCalc2();" onBlur="stopCalc2();" />                 
                    </div>
                         
                      <div class="form-group">
                      <label for="">PPN(%)</label><b style="color:red;">&nbsp*harus diisi</b>
                       <input type="text" class="form-control" value="" name="ppn" id="" placeholder="PPN(%)" autocomplete="off" required onFocus="startCalc2();" onBlur="stopCalc2();"/>                 
                    </div>
                   
                   <div class="form-group">
                      <label for="">HARGA AKHIR</label>
                       <input type="text" class="form-control" value="0" name="harga_akhir" id="" placeholder="harga" required autocomplete="off" onFocus="startCalc2();" onBlur="stopCalc2();" readonly/>                 
                    </div>
                 <div id="daraanisa">   
                    <div class="form-group"><b style="color:red;">&nbsp*harus diisi</b><br>
                      <label for="">E-KAT</label><br>
                    <input type="checkbox" value="1" name="e_kat" required><br>
                      <label for="">NON E-KAT</label><br>

                    <input type="checkbox" value="1" name="non_e_kat" required></div>
                     </div>
                    <div id="alkes">
                   <div class="form-group"><b style="color:red;">&nbsp*harus diisi</b><br>
                      <label for="">Register</label><br>
                    <input type="checkbox" value="1" name="register" required><br>
                      <label for="">NON Register</label><br>
                   
                    <input type="checkbox" value="1" name="non_register" required>
					</div> 
					</div>
                      <label for="">Cashback(%)</label>
                       <input type="text" class="form-control" value="0" name="cashback" id="" placeholder="cashback"/><br>
                    <div id="daraanisa21"><br>
                    <div class="form-group"><b style="color:red;">&nbsp*harus diisi</b><br>
                      <label for="">BIAYA FREE</label><br>
                    <input type="checkbox" value="1" name="biayafree" required><br>
                      <label for="">BIAYA NON FREE</label><br>
                    <input type="checkbox" value="1" name="biayanonfree" required></div>
                <label>BIAYA</label><input type="text" class="form-control" value="0" name="nominalbiaya" placeholder="BIAYA" /><br></div> 
       
                 </div> 
                                    
                   </div> 
                    
               <div class="col-lg-6">
                   <div class="form-group">
                      <label for="">GARANSI</label><br>
                             <label>Full WARANTY</label><input type="text" class="form-control" value="0" name="garansi" placeholder="FULL WARANTY" /><br>
                      <label>Free WARANTY</label><input type="text" class="form-control" value="0" name="garansifree" placeholder="Free WARANTY" /><br>
                        <div class="col-lg-3">
                       <label>Tahun ke 1</label><input type="text" class="form-control" value="1" name="tahunke1" placeholder="Tahun ke 1" readonly />  
                        <label>Tahun ke 2</label><input type="text" class="form-control" value="2" name="tahunke2" placeholder="Tahun ke 2" readonly />
                         <label>Tahun ke 3</label><input type="text" class="form-control" value="3" name="tahunke3" placeholder="Tahun ke 3" readonly />  
                        <label>Tahun ke 4</label><input type="text" class="form-control" value="4" name="tahunke4" placeholder="Tahun ke 4" readonly />
                         <label>Tahun ke 5</label><input type="text" class="form-control" value="5" name="tahunke5" placeholder="Tahun ke 5" readonly />               
                    </div> 
                     <div class="col-lg-3">
                       <label>Persentase ke 1</label><input type="text" class="form-control" value="0" name="persentase1" placeholder="Persentase1"/>  
                        <label>Persentase ke 2</label><input type="text" class="form-control" value="0" name="persentase2" placeholder="Persentase2"/>  
                          <label>Persentase ke 3</label><input type="text" class="form-control" value="0" name="persentase3" placeholder="Persentase3"/>  
                        <label>Persentase ke 4</label><input type="text" class="form-control" value="0" name="persentase4" placeholder="Persentase4"/> 
                        <label>Persentase ke 5</label><input type="text" class="form-control" value="0" name="persentase5" placeholder="Persentase5"/>            
                    </div> </div></div><br>
                     <label for="">Keterangan</label><br>
                       <textarea rows="4" cols="50" name="ket"></textarea><br>
                       <label for="">Catatan</label><br>
                       <textarea rows="4" cols="50" name="note"></textarea><br>
 		       <label for="">Contact Person</label><br>
                       <textarea rows="4" cols="50" name="contact"></textarea><br>





         </div>                
                  </table>
                </div>
                <div style="text-align:center;" class="form-actions">
            <button  type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            
			 
			<a href="<?php echo base_url(); ?>Alkestransaksi/addtralkes/<?php echo $prod->tanggal_tr ?>/<?php echo $prod->kode_trans ?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
      
		</div>
               
               </form>
			   
                            
</section>
<?php endif;?>
				<?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode =='10' or $kode =='82' or $kode =='57' ):?>
				<a  style="margin-left:10px" href="<?php echo base_url(); ?>Alkestransaksi/viewtralkes/<?php echo $prod->tanggal_tr ?>/<?php echo $prod->kode_trans ?>" class="btn btn-info"><i class="icon-remove-sign"></i> KEMBALI </a>
				<?php endif;?>
					   <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode =='10' or $kode =='82' or $kode =='57'  ):?>
				<button style="margin-left:1100px" id="btn-delete2" class="btn btn-danger no-radius dropdown-toggle"><i class="fa fa-close"></i> REJECT </button>
                <?php endif;?>


                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>

                <div class="box-title"><br>
         <div class="panel panel-primary"></div>
       
           
             
                 <br>
                </div>
                 <div class="table-responsive">
				 <form method="post" action="<?php echo base_url(); ?>Alkestransaksi/update_viewdetilalkes" id="form-delete2">
                <div class="box-body">
		
			   
			   <table id="tb-datatables" class="table table-bordered table-striped table-hover" style="vertical-align: middle;width:100%;">
                   <thead>
                  <tr class="danger" style="font-weight:bold;font-size:10px;">
                    <th rowspan="2" style="vertical-align: middle;text-align: center;">No</th>
                    <th rowspan="2" style="vertical-align: middle;text-align: center;width:20%">Nama Produk</th>
                     <th rowspan="2" style="vertical-align: middle;text-align: center;width:20%">Merk</th>
                    <th rowspan="2" style="vertical-align: middle;text-align: center;width:20%">Tipe</th>
                  
                     <th rowspan="" style="vertical-align: middle;text-align: center;">Aksi</th>
					 
					 
                  </tr>
                 
                  <tr class="danger" style="font-weight:bold;font-size:10px;">
                    <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode =='10' or $kode =='82' or $kode =='57' ):?>
					<th rowspan="" style="text-align:center;"><input type="checkbox" id="check-all"><br>ALL DITOLAK</th>
					<?php endif;?>
                  </tr>
				  
                    
                  </thead><tbody>
<?php
$no=0;
          foreach ($data_prods2 as $tr){
            $no++
?>
        <tr class="success" style="font-weight:bold;font-family:verdana;font-size:10px;">
          <td style="vertical-align: middle;text-align: center;" ><?php echo $no; ?></td>         
          <td style="vertical-align: middle;text-align: left;"><?php echo $tr['nama_produk']; ?></td>
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['merk']; ?></td>
            <td style="vertical-align: middle;text-align: center;"><?php echo $tr['type']; ?></td>
          
            <td style="vertical-align: middle;text-align: center;">   
            
			<?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode =='75' or $kode =='76' ):?>
			<a style="margin-bottom:3px;" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>Alkestransaksi/editabks/<?php echo $tr['iddetailalkes']; ?>"><i class="glyphicon glyphicon-edit"></i></a>  
                     <a  style="margin-bottom:3px;" onclick="return confirm('Hapus data beserta detail??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>Alkestransaksi/hapusdetail/<?php echo $tr['iddetailalkes'];  ?>"><i class="glyphicon glyphicon-remove"></i></a>
			<?php endif;?>			
					
					<a target="blank"  style="margin-bottom:3px;" class="btn btn-success btn-sm" href="<?php echo base_url(); ?>Laporanalkes/cetak_alkesproduk/<?php echo $tr['iddetailalkes']; ?>"><i class="glyphicon glyphicon-search"></i> Detail </a> 					 
                   
			<?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode =='10' or $kode =='82' or $kode =='57' ):?>
						&nbsp&nbsp 
							<input type='checkbox' class='check-item' name='iddetailalkes[]' value="<?php echo $tr['iddetailalkes']; ?>">
		
					 <input  type='hidden' name='kode_alkes' value="<?php echo $tr['kode_alkes']; ?>">
						&nbsp&nbsp<input type="text" class="form-control" autocomplete="off"  value=""  id="catatheadrev" name='cttndetilrevisi[]' placeholder="Isikan Catatan Ditolak"  >
					   
							<select style="display: none;" name='statusdetil[]' class="form-control">
						
								<option value="1"></option>

							</select>	   
			<?php endif;?>	   
				   
				   </td>
				   

				   
        </tr>
            <?php  } ?>
               </tbody></table>

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
		




