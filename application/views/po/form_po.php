     <!--<ul class="nav nav-tabs">
	  <li class="active"><a href="<?php echo base_url(); ?>masterperusahaan">Master Perusahaan Obat</a></li>
	  <li class=""><a href="<?php echo base_url(); ?>masterperusahaan/dataperusahaan_depbang">Master Perusahaan Depbang</a></li>
	  <li class=""><a href="<?php echo base_url(); ?>masterperusahaan/dataperusahaan_alum">Master Perusahaan Alum</a></li>
	  <li class=""><a href="<?php echo base_url(); ?>masterperusahaan/dataperusahaan_alkes">Master Perusahaan Alkes</a></li>
	</ul> -->
	 
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
        <div class="form-group">
               <label for="">Nomor PO :</label> <a style="color: red;">*</a>
               <input type="text" style="color: #fffff; font-weight: bold;" class="form-control" autocomplete="off"  value="<?php echo $kodeunik; ?>" id="" name="nopo" placeholder="" readonly>   
               <input type="hidden" name="k_nopo" value="<?= $kodeunik21; ?>" readonly>         
        </div>
        
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
                <div class="box-title">
                  
                </div><!-- /.box-title -->
				
					
			<div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                
					<form action="<?php echo site_url('c_po/simpan_po') ?>" method="post" enctype="multipart/form-data">
			 
					 
        		<div class='col-sm-12'>
					<h5 class='judul-transaksi'>
					<a href="<?php echo site_url('c_po'); ?>" class='pull-right'><i class='fa fa-refresh fa-fw'></i> Refresh Halaman</a>
					</h5><br><br>
					<div class="table-responsive">
					<table class='table table-bordered table-hover' id='tb-datatables'>
						<thead bgcolor="#DCDCDC">
							<tr>
								<th style='width:35px;text-align:center;'>No</th>
								<th style='width:70px;text-align:center;'>Kode Barang</th>
								<th style='width:210px;text-align:center;'>Nama Barang</th>
								<th style='width:40px;text-align:center;'>Qty</th>
								<th style='width:100px;text-align:center;'>Harga</th>
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
						<td style='width:70px;text-align:left;'><?php echo $items['id']; ?></td>
						<td style='width:210px;text-align:left;'><?php echo $items['name']; ?></td>
						<td style='width:40px;text-align:center;'><?php echo $items['qty']; ?></td>
						<td style='width:100px;text-align:left;'>Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
						<td style='width:125px;text-align:left;'>Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
							<td style='width:50px;text-align:center;'>
							<a href="<?php echo base_url().'c_po/remove/'.$items['rowid'];?>" class="btn btn-danger btn-xs"><span class="fa fa-close"></span> Batal</a>
							</td>
							</tr>

						<?php $i++; $no++;?>
					<?php endforeach; ?>
						
					</tbody>
					</table>
					</div>

					
					<div class='alert alert-success TotalBayar'>
						
						<h2 style="margin-left:70%;">Total : <span id='TotalBayar'>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></span></h2>
						<input type="hidden" id='TotalBayarHidden'>
						
					</div>
				<input type="hidden" name="nopo" value="<?= $kodeunik; ?>" readonly>
				<input type="hidden" name="k_nopo" value="<?= $kodeunik21; ?>" readonly>
					<div class='row'>
															
					<br><br>
					<div class="col-lg-12">
                  <div class="col-lg-6">
					
					
					</div>
												
						<div >
							<div class="form-horizontal">
						
								<div class='row'>
									<div class='col-sm-6' style='padding-right: 0px;'>
									</div>
									<div class='col-sm-6'>
										<!-- <button type='submit' class='btn btn-primary btn-block' id='Simpann'>
											<i class='fa fa-floppy-o'></i> Simpan
										</button> -->
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
                    <select class="form-control" id="kode_produk" name="kode_produk" data-placeholder="Pilih Barang">
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
                    </select>
                </div>
            </div>
            <div id="detail_barang"></div>
        </div>

        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button type="submit" class="btn btn-primary" disabled="disabled" id="add" name="add">Simpan</button>
        </div>
    </form>

	      </div>

	   </div>

	</div>
<div id="myModal2" class="modal fade mymodal2">
	<div class="modal-dialog">
    <div class="modal-content">
	<div class="panel panel-primary">
	     <div class="panel-heading">

        <h4 class="modal-title">TAMBAH PO !!!</h4></td>
      </div>
	      <div class="modal-body">

 <!----> 	<form action="<?php echo base_url(); ?>c_po/simpan_header_po" method="POST" enctype="multipart/form-data">
			<div class="col-lg-12">
 		<!-- <div class="col-lg-6"> -->
			<div class="form-group"> 
				<label>Nama Perusahaan :</label><b style="color:red;">&nbsp*harus diisi</b><br>
					<select name="koper" class="dara form-control" required>
								<option required></option>
									<?php foreach($kode_alkes as $row) { ?>
									<option required value=<?php echo $row['koper'] ; ?>><?php echo $row['nm_perusahaan']?>
								</option>
						<?php  } ?>
					</select>
				</div>
				<!--  <div class="form-group">
                      <label for="">Upload Berkas</label>
                        <input type="file" class="form-control" value="" id=""  name="file_uploadttd" placeholder="">                        
                      </div> 	 -->			
					   <!--  	</div>
						<div class="col-lg-6"> -->
						<div class="form-group" hidden>
                      <label for="">RUMAH SAKIT</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $this->session->userdata('koders'); ?>" id="" name="koders" placeholder="" readonly>            
                    </div>
            <!--  <div class="form-group"> 
                <label>Jenis Permintaan :</label><b style="color:red;">&nbsp*harus diisi</b><br>
                 <select  name="jenis_permintaan" class="dara form-control" required>
                    <option required></option>
                    <option value="Reguler" required>Reguler</option>
                    <option value="Urgent" required>Urgent</option>
                </select>
           </div> -->
          <!--  <?php
           date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d"); ?>
               <div class="form-group">
                      <label for="">Tanggal Kebutuhan</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $waktusaatini; ?>" id="datepicker11" name="tgl_kebutuhan" placeholder="">            
                    </div> -->
      <!--  </div> -->
              <div class="form-group">
                      <label for="">Keterangan</label>
							<textarea name='keterangan' class='form-control' rows='2' placeholder="Keterangan Transaksi (Jika Ada)" style='resize: vertical; width:83%;'></textarea>

						</div>
          </div>

			<input type="hidden" style="color: #fffff; font-weight: bold;" class="form-control" autocomplete="off"  value="<?php echo $kodeunik; ?>" id="" name="nopo" placeholder="" readonly>   
               <input type="hidden" name="k_nopo" value="<?= $kodeunik21; ?>" readonly> 

       <div class="modal-footer">
          <a href="<?php echo base_url(); ?>c_po/viewallpo" class="btn btn-default" >BATAL</a>
          <input type="submit" target='blank' class="btn btn-primary" value="PILIH">
        </div>
                </fieldset>
                </form>   
                </div></div></div></div></div>  
	