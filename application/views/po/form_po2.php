     

<ul class="nav nav-tabs">
  <?php
   $kodedara=($this->session->userdata('koderole'));
     if($kodedara =='1' or $kodedara =='67' ):?>
        <li class="active"><a href="<?php echo base_url(); ?>c_po">PO ALKES</a></li>
    <?php endif;?>


   </ul>    
	 
	 
	 <section class="content-header">
    <h1 style="text-align:center;">
       <b> FORM PO ALKES</b>
        <small></small>
    </h1>
	
	   <div class="col-lg-6">
          </div>
					
</section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
		  <div id="form_perush">
          <div class="row">
            <div class="col-md-12">
            
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
               <!--  <div class="box-title">
                  
                </div> /.box-title -->
				
					
			<!-- <div class="box-body chat" id="chat-box">
                 chat item -->
                <div class="item"> 
                
				<div class="col-lg-4">

            <div class="form-group">
               <label for="">Nomor PO :</label>
               <input type="text" style="color: #fffff; font-weight: bold;" class="form-control" autocomplete="off"  value="<?php echo $tr->nopo; ?>" id="" name="nopo"  readonly>   
               <input type="hidden" name="k_nopo" value="<?= $tr->k_nopo; ?>" readonly>         
           </div>
						<div class="form-group">
                      <label for="">Status Permintaan :</label>
                        <input type="text" class="form-control" autocomplete="off"  value="<?php echo $pr->jenis_permintaan; ?>" id=""  placeholder="" readonly >            
                    </div>
					
					 <div class="form-group">
                      <label for="">Tanggal Kebutuhan :</label>
                        <input type="text" class="form-control" autocomplete="off"  value="<?php echo $pr->tgl_kebutuhan; ?>" id=""  placeholder="" readonly >            
                    </div>				
					</div>	
				<div class="col-lg-4">
				             <div class="form-group">
                      <label for="">Nama Perusahaan :</label>
                        <input type="text" class="form-control" autocomplete="off"  value="<?php echo $pr->nm_perusahaan; ?>" id=""  placeholder="" readonly>            
                    </div>
                   
                   <div class="form-group">
                      <label for="">Fax :</label>
                        <input type="text" class="form-control" autocomplete="off"  value="<?php echo $pr->s_fax; ?>" id=""  placeholder=""  readonly>            
                    </div>                   			
										
					<div class="form-group">
                      <label for="">Telp :</label>
                        <input type="text" class="form-control" autocomplete="off"  value="<?php echo $pr->s_telp; ?>" id=""  placeholder=""  readonly>            
                    </div>
					
					</div>
					
					<div class="col-lg-4">		
					<div class="form-group">
                      <label for="">Kontak :</label>
                        <input type="text" class="form-control" autocomplete="off"  value="<?php echo $pr->s_kontak; ?>" id=""  placeholder="" readonly >            
                    </div>
					
					 <div class="form-group">
                      <label for="">Email :</label>
                        <input type="text" class="form-control" autocomplete="off"  value="<?php echo $pr->s_email; ?>" id=""  placeholder="" readonly >            
                    </div>	
                    <div class="form-group">
					<label for="">Alamat :</label><br>
                       <textarea rows="4" class="form-control" cols="50"  readonly><?php echo $pr->s_alamat; ?></textarea>
					</div></div>
				</div>
		
			
					<form role="form" form name="form2" action="<?php echo site_url('c_po/simpan_po') ?>" method="post" enctype="multipart/form-data">
			 
					 
        		<div class='col-sm-12'>
					<h5 class='judul-transaksi'>
					<!-- <a href="<?php echo site_url('c_po'); ?>" class='pull-right'><i class='fa fa-refresh fa-fw'></i> Refresh Halaman</a> -->
					</h5><br><br>
					<div class="table-responsive">
					<table class='table table-bordered table-hover' id='tb-datatables'>
						<thead bgcolor="#DCDCDC">
							<tr>
								<th style='width:35px;text-align:center;'>No</th>
								<th style='width:70px;text-align:center;'>Status Pengajuan</th>
								<th style='width:210px;text-align:center;'>Peruntukan</th>
								<th style='width:70px;text-align:center;'>Target Penggunaan Per Bulan</th>
								<th style='width:210px;text-align:center;'>Tarif per Penggunaan</th>
								<th style='width:70px;text-align:center;'>Kode Barang</th>
								<th style='width:210px;text-align:center;'>Nama Barang</th>
								<th style='width:40px;text-align:center;'>Qty</th>
								<th style='width:100px;text-align:center;'>Harga</th>
								<th style='width:210px;text-align:center;'>Ongkir</th>
								<th style='width:125px;text-align:center;'>Sub Total</th>
								<th style='width:50px;text-align:center;' class="span3">
									<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><i class='fa fa-plus fa-fw' data-toggle="modal"></i>Item Barang</button>
								</th>
							</tr>
						</thead>
						<tbody>
						 <?php $i=1; $no=1;?>
							<?php foreach($this->cart->contents() as $items): ?>
							<?php echo form_hidden('rowid[]', $items['rowid']); ?>

						<tr class="gradeX">
						<td style='width:20px;text-align:center;'><?php echo $no; ?></td>
						<td style='width:70px;text-align:left;'><?php echo $items['status_pengajuan']; ?></td>
						<td style='width:210px;text-align:left;'><?php echo $items['nm_lokasi']; ?></td>
						<td style='width:70px;text-align:left;'><?php echo $items['tgtjml_guna_perbulan']; ?></td>
						<td style='width:210px;text-align:left;'><?php echo $items['trf_perguna']; ?></td>
						<td style='width:70px;text-align:left;'><?php echo $items['id']; ?></td>
						<td style='width:210px;text-align:left;'><?php echo $items['name']; ?></td>
						<td style='width:40px;text-align:center;'><?php echo $items['qty']; ?></td>
						<td style='width:100px;text-align:left;'>Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
						<td style='width:100px;text-align:left;'>Rp. <?php echo $this->cart->format_number($items['biaya_kirim']); ?></td>
						<td style='width:125px;text-align:left;'>Rp. <?php echo $this->cart->format_number($items['subtotal']+$items['biaya_kirim']); ?></td>
							<td style='width:50px;text-align:center;'>
							<a href="<?php echo base_url().'c_po/remove/'.$items['rowid'].'/'.$tr->koper.'/'.$tr->k_nopo.'';?>" class="btn btn-danger btn-xs"><span class="fa fa-close"></span> Batal</a>
							</td>
							</tr>

						<?php $i++; $no++;?>
					<?php endforeach; ?>
						
					</tbody>
					</table>
					</div>

           <!-- <?php 
                $totalharga=$this->cart->format_number($this->cart->total());
                $bil_bagi_fix = str_replace(",", "", $totalharga);
            ?> -->
					<div class='alert alert-success TotalBayar'>
						
						<h2 style="margin-left:70%;">Total : <span id='TotalBayar'>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></span></h2>
						<input type="hidden" id='TotalBayarHidden'>
						
					</div>
					<!-- <div class='alert alert-success TotalBayar'>
							<h5 style="margin-left:70%;">
						<table class='table table-bordered' cellpadding="0" cellspacing="0">
							<tr>
								<td>Total(Rp.)</td>
								<td width="15">:</td>
								<td><input type="text" class="form-control" value="<?php echo $totalharga; ?>" name="totalharga2" id="" placeholder="total harga" autocomplete="off"/>

                               <input type="hidden" class="form-control" value="<?php echo $bil_bagi_fix; ?>" name="totalharga" id="" placeholder="discount" autocomplete="off" onFocus="startCalc3();" onBlur="stopCalc3();"  />
								</td>
							</tr>
							<tr>
								<td>Discount(%)</td>
								<td width="15">:</td>
								<td><input type="text" class="form-control" value="0" name="disc" id="" placeholder="discount" autocomplete="off" onFocus="startCalc3();" onBlur="stopCalc3();" /></td>
							</tr>
							<tr>
								<td>Ppn(%)</td>
								<td width="15">:</td>
								<td><input type="text" class="form-control" value="0" name="ppn" id="" placeholder="ppn" autocomplete="off" onFocus="startCalc3();" onBlur="stopCalc3();"/></td>
							</tr>
							<tr>
								<td>Grand Total(Rp.)</td>
								<td width="15">:</td>
								<td><input type="hidden" class="form-control" value="0" name="grandtotal" id="" placeholder="Grand Total" autocomplete="off" onFocus="startCalc3();" onBlur="stopCalc3();" />
                                <input type="text" class="form-control" value="0" name="hasil" id="" placeholder="Grand Total" autocomplete="off" onFocus="startCalc3();" onBlur="stopCalc3();" />
								</td>
							</tr>
						</table>
						    
                        <input type="hidden" id='TotalBayarHidden'></h5>
                  	</div> -->
				<input type="hidden" name="nopo" value="<?= $tr->nopo;; ?>" readonly>
				<input type="hidden" name="k_nopo" value="<?= $tr->k_nopo;; ?>" readonly>
					<div class='row'>
															
					
					<div class="col-lg-12">
                  <div class="col-lg-6">
					
					
					
							</div>					
						<div >
							<div class="form-horizontal">
						
								<div class='row'>
									<div class='col-sm-12' style='padding-right: 0px;'>
									</div>
									<div class='col-sm-6'></div>
									<div class='col-sm-6' style="margin-left:80%;">
										<button onclick="return confirm('Apakah Data Detail Sudah Terisi ?... ');" type='submit' class='btn btn-primary btn-plat btn-md' id='Simpann'>
											<i class='fa fa-floppy-o'></i> Simpan
										</button>
										<a class="btn btn-danger btn-sm" title="batal" href="<?php echo base_url(); ?>c_po/hapus/<?php echo $pr->k_nopo; ?>" onclick="return confirm('anda yakin batal?');"> <i class="glyphicon glyphicon-remove"></i>Batal</a>
									</div>
								</div>
							</div>
						</div>
					</div>

					<br />
				</div>
			</div>
			</form>
		</div>
	</div>
</div>



<div class="modal fade" id="myModal" role="dialog">

	   <div class="modal-dialog" >

	      <div class="modal-content">

	<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Tambah Barang</h3>
    </div>
 
    <form id="frm" name="frm"  method="post" action="<?php echo site_url('c_po/tambah_item_to_cart')?>">
        <div class="modal-body" style="min-height: 200px">
            <div class="form-group">
                <label class="control-label">Daftar Barang ALKES :</label>
                <div class="controls">
                   <!--  <select class="form-control" id="kode_produk" name="kode_produk" data-placeholder="Pilih Barang">
                        <option value=""></option>
                        <?php
                        if(isset($data_barang)){
                            foreach($data_barang as $row){
                                ?>
                                <option value="<?php echo $row->kode_produk?>"><?php echo $row->kode_produk?>___<?php echo $row->nama_produk?></option>
                            <?php
                            }
                        }
                        ?>
                    </select> -->
                    <select id="kode_produk_v3" name="kode_produk" class="form-control" required>
                          <option value="" required>pilih Alkes</option>
                          <?php foreach($data_barang as $row) { ?>
                              <option value="<?php echo $row->kode_produk?>" required><?php echo $row->kode_produk?>___<?php echo $row->nama_produk?></option>
                          <?php } ?>
                        </select> <br>   
                   </div>
                 <div class="form-group" hidden>
                    <label class="control-label">Nama Barang</label>
                    <div class="controls">
                        <input class="form-control" name="nama_produk" type="text" value="<?php echo $row->nama_produk; ?>" readonly="readonly">
                    </div></div>
                   <div class="form-group"><br> 
                    <label class="control-label">Harga</label>
                    <div class="controls">
                        <input class="form-control" name="harga_akhir_baru" type="text" value="" readonly="readonly">
                    </div>
                   <div class="form-group"><br> 
                    <label class="control-label">Ongkir</label>
                    <div class="controls">
                        <input class="form-control" name="biaya_kirim" type="text" value="" readonly="readonly">
                    </div>
                     <div class="form-group"><br> 
                    <label class="control-label">Biaya Ongkir</label>
                    <div class="controls" hidden>
                        <input class="form-control" id="ong" name="includeongkir" type="text" value="" >
                     </div>
                     <b><i><p id="hasil"><input class="form-control" id="" name="biaya_ongkir" type="text" value="" readonly></p></i></b>
                </div>
                <input type="hidden" name="koper" value="<?= $tr->koper; ?>" readonly>
				<input type="hidden" name="k_nopo" value="<?= $tr->k_nopo; ?>" readonly>
            </div>
              <div class="form-group">
                    <label class="control-label">Jumlah Pengadaan</label>
                    <div class="controls">
                        <input class="form-control" name="jumlah" type="text" class="" placeholder="Input Jumlah Pengadaan...">
                    </div></div>
           <!--  <div id="detail_barang"></div> -->
            <div class="form-group">
            	<label>Target Jumlah Penggunaan Perbulan :</label><br>
            		 <input type="text" name="tgtjml_guna_perbulan" value="0" required>
            </div>
             <div class="form-group">
            	<label>Tarif Per Penggunaan :</label><br>
            		 <input type="text" name="trf_perguna" value="0" required>
            </div>
             <div class="form-group"> 
                <label>Status Pengajuan :</label><b style="color:red;">&nbsp*harus diisi</b><br>
                 <select   name="status_pengajuan" class="dara form-control" required>
                    <option required></option>
                    <option value="Baru" required>Baru</option>
                    <option value="Pergantian Barang Lama" required>Pergantian Barang Lama</option>
                    <option value="Service" required>Service</option>
                    <option value="Kalibrasi" required>Kalibrasi</option>
                </select>
           </div>
            <div class="form-group"> 
                <label>Peruntukan :</label><b style="color:red;">&nbsp*harus diisi</b><br>
                 <select   name="peruntukan" class="daraanisa99 form-control" required>
                    <option required></option>
                  <?php foreach($lokasi as $row) { ?>
                  <option value=<?php echo $row['kode_lokasi'] ; ?>><?php echo $row['nm_lokasi']?>
                </option>
            <?php  } ?>
                  </select>
           </div>
             <input type="hidden" name="nm_lokasi" value="" readonly>
        </div>

        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button type="submit" class="btn btn-primary"  id="add" name="add">Simpan</button>
        </div>
    </form>

	      </div>

	   </div>

	</div>

	