 <section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>DETAIL PRODUK OBAT</b><br>
      <b>PRINSIPAL</b><span> : </span><b><?php echo $prod->nm_perusahaan ?></b><br>
      <b>DISTRIBUTOR</b><span> : </span><b><?php echo $prod->nm_distributor ?></b>
        </h4>
        </section>
		
		
		<?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode =='67' ):?>
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
                  <form role="form" action="<?php echo base_url(); ?>Obattr/savedata" method="POST" enctype="multipart/form-data" id="multiple_select_form">
                    <table class="table-common">
                         
                      
                 <div class="panel panel-primary"></div>
              <div class="col-lg-6">
                    
                     <input type="hidden" class="form-control" value="<?php echo $prod->idpr2 ?>" id="" name="koded_prod">                              
                    <input type="hidden" class="form-control" value="<?php echo $prod->koper ?>" id="" name="koper"> 
                     <input type="hidden" class="form-control" value="<?php echo $prod->kode_th ?>" id="" name="kode_th"> 
                    
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
                  <input type="text" class="form-control" value="" name="kode_obat" id=""/> </div>
                    <div class="form-group">
                       <label for="">DISTRIBUTOR</label><br>
                            <select id="" name="kodis" class="chosen form-control">
                          <option value="-">pilih distributor</option>
                          <?php foreach($distri as $row) { ?>
                              <option value="<?php echo $row['kodis'] ?>"><?php echo $row['nm_distributor'] ?></option>
                          <?php } ?>
                        </select> </div>
                  <div class="form-group">
                      <label for="">HARGA SATUAN</label><b style="color:red;">&nbsp*harus diisi</b>
                       <input type="text" class="form-control" value="" name="harga" id="" placeholder="harga" required/>                 
                    </div> 

                                
                   </div>     
               <div class="col-lg-6">
                   <div class="form-group">
                      <label for="">DISKON</label>
                       <input type="text" class="form-control" value="0" name="discount" id="" placeholder="DISKON" required/>                 
                    </div> 

                    <div class="form-group">
                      <label for="">TIPE HARGA</label><b style="color:red;">&nbsp*harus diisi</b><br>
                        <select id="" name="tipe_harga" class="chosen" required>
                          <option value="" required>--Pilih Tipe Produk--</option>
                          <?php foreach($tipe_harga as $row) { ?>
                              <option value="<?php echo $row['idtipeharga'] ?>" required><?php echo $row['tipe_harga'] ?></option>
                          <?php } ?>
                        </select>    
                          </div> 
                          <div class="form-group">
                      <label for="">NOTE</label>
                       <input type="text" class="form-control" name="catatan" id="" placeholder="NOTE" required/>                 
                    </div> 
          
                </table>
                </div>
                <div style="text-align:center;" class="form-actions">
            <button  type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo base_url(); ?>Obattr/addtrfarmasi/<?php echo $prod->kode_th ?>/<?php echo $prod->tanggal_tr ?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
               
               </form>
                            
</section>
<?php endif;?>



                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>

                <div class="box-title"><br>
         <div class="panel panel-primary"></div>
       
         
             
                 <br>
                </div>
				  <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode =='10' or $kode =='82' or $kode =='57' or $kode == '69' ):?>
				
				<a style="margin-left:10px"  class="btn btn-success btn-md" href="<?php echo base_url(); ?>Obattr/viewtrfarmasi/<?php echo $prod->kode_th ?>/<?php echo $prod->tanggal_tr ?>"><i class="glyphicon glyphicon-home"></i>&nbsp KEMBALI</a><br>
				<?php endif;?>
                <div class="table-responsive">
                <div class="box-body">

                  <table id="tb-datatables" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr class="danger">
                      <th  style="vertical-align: middle;text-align: center;">NO</th>
                      <th  style="vertical-align: middle;text-align: center;">DISTRIBUTOR</th>
                      <th style="vertical-align: middle;text-align: center;">NAMA PRODUK</th>
                       <th style="vertical-align: middle;text-align: center;">GOLONGAN</th>
                      <th style="vertical-align: middle;text-align: center;">KOMPOSISI</th>
                      <th  style="vertical-align: middle;text-align: center;">HARGA SATUAN</th>
                      <th  style="vertical-align: middle;text-align: center;">DISKON</th>
                      <th  style="vertical-align: middle;text-align: center;">TIPE HARGA</th>
                      <th  style="vertical-align: middle;text-align: center;">NOTE</th>
                               <?php
						$kodedara=($this->session->userdata('koderole'));
							if($kodedara =='67'):?>
						                      <th  style="vertical-align: middle;text-align: center;">aksi</th>				   
                  <?php endif;?>

					  <?php
						$kodedara=($this->session->userdata('koderole'));
							if($kodedara =='82' or $kodedara =='57' or $kodedara =='10' or $kodedara =='69'):?>
						<th style="vertical-align: middle;text-align: center;">AKSI<br><input type="checkbox" id="check-all"><br><button id="btn-delete" class="btn btn-danger no-radius dropdown-toggle"><i class="fa fa-close"></i> ALL REJECT </button></th>					   
                  <?php endif;?>
                                                       
                    </tr>
                    
                  </thead>
                  <tbody>
                   <?php $no=0;
                    
                     foreach($data_prods2 as $row) { 
                               $no++                              
                             
                      ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                       <td><?php echo $row['nm_distributor']; ?></td>
                       <td><?php echo $row['nama_obat']; ?></td>
                      <td><?php echo $row['klasifikasinama']; ?></td>
                       <td><?php echo $row['komposisi']; ?></td>
              <td style="text-align: center;">Rp.<?php echo number_format($row['harga'], 2,',','.'); ?></td>
                        <td style="text-align: center;"><?php echo $row['discount']; ?> %</td>
                      <td style="text-align: center;"><?php echo $row['tipe_harga']; ?></td>
                       <td style="text-align: center;"><?php echo $row['catatan']; ?></td>
                         <td style="text-align: center;">  

						 <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode !='10' and $kode !='82' and $kode !='57' ):?>
                      <a style="margin-bottom:3px;" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>Obattr/editabks/<?php echo $row['iddetailprod2']; ?>/<?php echo $row['koper']; ?>"><i class="glyphicon glyphicon-edit"></i></a>  
                     <a  style="margin-bottom:3px;" onclick="return confirm('Hapus data beserta detail??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>Obattr/hapusdetail/<?php echo $row['iddetailprod2']; ?>/<?php echo $row['koded_prod']; ?>/<?php echo $row['koper']; ?>"><i class="glyphicon glyphicon-remove"></i></a>
                      <?php endif;?>
					  
					  
					 <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode =='10' or $kode =='82' or $kode =='57' ):?>
			   
						&nbsp&nbsp 
							<input type='checkbox' class='check-item' name='iddetailprod2[]' value="<?php echo $row['iddetailprod2']; ?>">
		
					 <input  type='hidden' name='kode_alkes' value="<?php echo $row['koded_prod']; ?>">
						&nbsp&nbsp<input type="text" class="form-control" autocomplete="off"  value=""  id="catatheadrev" name='cttndetilrevisi[]' placeholder="Isikan Catatan Ditolak"  >
					   
							<select style="display: none;" name='statusdetil[]' class="form-control">
						
								<option value="1"></option>

							</select>
												
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
                </div>
               </div>
            </div>
            </div>
          </div>
        </div>




