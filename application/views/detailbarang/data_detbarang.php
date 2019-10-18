        <section class="content-header">
        <h4>
          <b>DATA FORMULIR PERSETUJUAN DIREKSI GROUP </b> 
		  <br>ATAS PERMINTAAN ALAT KESEHATAN / ALAT UMUM INVESTASI
        </h4>
        </section>
	 
	 <?php 
	 //if($this->session->userdata('koderole')=='1'):
		$koderole=($this->session->userdata('koderole'));
		if($koderole=='1' OR $koderole=='5' OR $koderole=='10'):
	 ?> 
	 
        <!-- Main content -->
        <section class="content">
		
	<!--MENU ATAS-->	
	<div class="row">
	<div class="col-md-12 clearfix">
		<ul id="example-tabs" class="nav nav-tabs" style="border-width:5px" data-toggle="tabs">
			<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>perbarang"><span class="glyphicon glyphicon-envelope"></span> Form Surat</a></li>
			
			<li class="active"  style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>detailbarang"><span class="glyphicon glyphicon-tasks"></span> Detail Barang</a></li>
			
			<!--<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>perbarang/disetujui">Status (Disetujui)</a></li>
			
			<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>perbarang/ditolak">Status (Ditolak)</a></li>-->
			
			<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>perbarang/statussurat"><span class="glyphicon glyphicon-option-vertical"></span>STATUS</a></li>
			
			<!--<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>perbarang/status">Status Revisi</a></li>-->
        </ul>							
	</div>
	</div>
	<!--END MENU ATAS-->
	
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
			<div class="box box-primary">
              <div class='box-header with-border'> 
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>detailbarang/adddetbarang" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH </a>
				 <!-- <button data-toggle="modal" data-target="#myModal2" class="btn btn-success"><span class="fa fa-thumb-tack"></span>CETAK RINCIAN BARANG</button>-->
				<!--<button data-toggle="modal" data-target="#myModal" class="btn btn-danger"><span class="fa fa-thumb-tack"></span> CETAK FOR. PERSETUJUAN</button>-->
				<button data-toggle="modal" data-target="#myModal1" class="btn btn-success"><span class="fa fa-thumb-tack"></span> VIEW BY DEPT.</button>
				<!-- <button data-toggle="modal" data-target="#myModalsurat" class="btn btn-success"><span class="fa fa-thumb-tack"></span> VIEW BY NAMA SURAT.</button>-->
				</div>
				
				<span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
				<span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?>
	
				<div class="box-body table-responsive">
                 <table id="datatables4" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th style="vertical-align:middle;text-align:center">NO</th>
                      <th width="100" style="vertical-align:middle;text-align:center">NAMA DEPT</th>
                      <th style="vertical-align:middle;text-align:center">No. Formulir</th>
                      <th width="100" style="vertical-align:middle;text-align:center">Nama Barang</th>
                      <th style="vertical-align:middle;text-align:center">Jumlah</th>
                      <th style="vertical-align:middle;text-align:center">Harga Satuan</th>
                      <th style="vertical-align:middle;text-align:center">Disc %</th>
                      <th style="vertical-align:middle;text-align:center">Disc (Nilai)</th>
                      <th style="vertical-align:middle;text-align:center">Extra Dics %</th>
                      <th style="vertical-align:middle;text-align:center">Extra Dics (Nilai) %</th>
                      <th style="vertical-align:middle;text-align:center">PPN %</th>
                      <th style="vertical-align:middle;text-align:center">TOTAL</th>
                      <th style="vertical-align:middle;text-align:center">EDIT</th>
                      <th style="vertical-align:middle;text-align:center">HAPUS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($detbrgnew as $dt) { $no++ ?>
                    <tr>
                      <td style="vertical-align:middle;text-align:center"><?php echo $no; ?></td>
                      <td width="100" style="vertical-align:middle;text-align:left"><?php echo $dt['namadepartemen']; ?></td>
                      <td style="vertical-align:middle;text-align:left"><?php echo $dt['no_formulir']; ?></td>
                      <td width="100" style="vertical-align:middle"><?php echo $dt['nama_barang']; ?></td>
                      <td style="vertical-align:middle;text-align:center"><?php echo number_format ($dt['jumlah'], 0, ".", "."); ?> Unit</td>
                      <td width="100" style="vertical-align:middle">Rp. <?php echo number_format ($dt['harga'], 0, ".", "."); ?></td>
                      <td width="50" style="vertical-align:middle;text-align:center"><?php echo number_format ($dt['discper'], 0, ".", "."); ?> %</td>
                      <td width="100" style="vertical-align:middle">Rp. <?php echo number_format ($dt['discnil'], 0, ".", "."); ?></td>
                      <td width="50" style="vertical-align:middle;text-align:center"><?php echo number_format ($dt['e_discper'], 0, ".", "."); ?> %</td>
                      <td width="100" style="vertical-align:middle">Rp. <?php echo number_format ($dt['e_discnil'], 0, ".", "."); ?></td>
                      <td width="50" style="vertical-align:middle;text-align:center"><?php echo $dt['ppn']; ?> %</td>
                      <td width="100" style="vertical-align:middle">Rp. <?php echo number_format ($dt['grand_total'], 0, ".", "."); ?></td>
                      <td width="50" style="vertical-align:middle;text-align:center">
                      <a class="btn btn-warning btn-sm" title="Edit" href="<?php echo base_url(); ?>detailbarang/editdetbarang/<?php echo $dt['id_transbarang']; ?>"><i class="fa fa-pencil"></i></a>
                      </td>
					  <td width="50" style="vertical-align:middle;text-align:center">
					  <a onclick="return confirm('Yakin Akan Hapus Data??');" class="btn btn-danger btn-sm" title="Hapus" href="<?php echo base_url(); ?>detailbarang/hapusdetbarang/<?php echo $dt['id_transbarang']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
	  <?php endif;?>

	 <?php 
		$koderole=($this->session->userdata('koderole'));
		if($koderole!='1' && $koderole!='5' && $koderole!='10'):
	 ?> 
	 
	 <section class="content">
	 
	<!--MENU ATAS-->	
	<div class="row">
	<div class="col-md-12 clearfix">
		<ul id="example-tabs" class="nav nav-tabs" style="border-width:5px" data-toggle="tabs">
			<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>perbarang"><span class="glyphicon glyphicon-envelope"></span> Form Surat</a></li>
			
			<li class="active"  style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>detailbarang"><span class="glyphicon glyphicon-tasks"></span> Detail Barang</a></li>
			
			<!--<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>perbarang/disetujui">Status (Disetujui)</a></li>
			
			<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>perbarang/ditolak">Status (Ditolak)</a></li>-->
			
			<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>perbarang/statussurat"><span class="glyphicon glyphicon-option-vertical"></span>STATUS</a></li>
			
			<!--<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>perbarang/status">Status Revisi</a></li>-->
        </ul>							
	</div>
	</div>
	<!--END MENU ATAS-->
	
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
			<div class="box box-primary">
              <div class='box-header with-border'> 
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>detailbarang/adddetbarang" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH </a>
				 <!-- <button data-toggle="modal" data-target="#myModal2" class="btn btn-success"><span class="fa fa-thumb-tack"></span>CETAK RINCIAN BARANG</button>-->
				<!--<button data-toggle="modal" data-target="#myModalnew" class="btn btn-danger"><span class="fa fa-thumb-tack"></span> CETAK FOR. PERSETUJUAN</button>-->
				</div>
				
				<span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
				<span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?>
	
				<div class="box-body table-responsive">
                 <table id="datatables5" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th style="vertical-align:middle;text-align:center">NO</th>
                      <th width="100" style="vertical-align:middle;text-align:center">NAMA DEPT</th>
                      <th style="vertical-align:middle;text-align:center">No. Formulir</th>
                      <th width="100" style="vertical-align:middle;text-align:center">Nama Barang</th>
                      <th style="vertical-align:middle;text-align:center">Jumlah</th>
                      <th style="vertical-align:middle;text-align:center">Harga Satuan</th>
                      <th style="vertical-align:middle;text-align:center">Disc %</th>
                      <th style="vertical-align:middle;text-align:center">Disc (Nilai)</th>
                      <th style="vertical-align:middle;text-align:center">Extra Dics %</th>
                      <th style="vertical-align:middle;text-align:center">Extra Dics (Nilai) %</th>
                      <th style="vertical-align:middle;text-align:center">PPN %</th>
                      <th style="vertical-align:middle;text-align:center">TOTAL</th>
                      <th style="vertical-align:middle;text-align:center">EDIT</th>
                      <th style="vertical-align:middle;text-align:center">HAPUS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_detbarang as $dt) { $no++ ?>
                    <tr>
                      <td style="vertical-align:middle;text-align:center"><?php echo $no; ?></td>
                      <td width="100" style="vertical-align:middle;text-align:left"><?php echo $dt['namadepartemen']; ?></td>
                      <td style="vertical-align:middle;text-align:left"><?php echo $dt['no_formulir']; ?></td>
                      <td width="100" style="vertical-align:middle"><?php echo $dt['nama_barang']; ?></td>
                      <td style="vertical-align:middle;text-align:center"><?php echo number_format ($dt['jumlah'], 0, ".", "."); ?> Unit</td>
                      <td width="100" style="vertical-align:middle">Rp. <?php echo number_format ($dt['harga'], 0, ".", "."); ?></td>
                      <td width="50" style="vertical-align:middle;text-align:center"><?php echo number_format ($dt['discper'], 0, ".", "."); ?> %</td>
                      <td width="100" style="vertical-align:middle">Rp. <?php echo number_format ($dt['discnil'], 0, ".", "."); ?></td>
                      <td width="50" style="vertical-align:middle;text-align:center"><?php echo number_format ($dt['e_discper'], 0, ".", "."); ?> %</td>
                      <td width="100" style="vertical-align:middle">Rp. <?php echo number_format ($dt['e_discnil'], 0, ".", "."); ?></td>
                      <td width="50" style="vertical-align:middle;text-align:center"><?php echo $dt['ppn']; ?> %</td>
                      <td width="100" style="vertical-align:middle">Rp. <?php echo number_format ($dt['grand_total'], 0, ".", "."); ?></td>
                      <td width="50" style="vertical-align:middle;text-align:center">
                      <a class="btn btn-warning btn-sm" title="Edit" href="<?php echo base_url(); ?>detailbarang/editdetbarang/<?php echo $dt['id_transbarang']; ?>"><i class="fa fa-pencil"></i></a>
                      </td>
					  <td width="50" style="vertical-align:middle;text-align:center">
					  <a onclick="return confirm('Yakin Akan Hapus Data??');" class="btn btn-danger btn-sm" title="Hapus" href="<?php echo base_url(); ?>detailbarang/hapusdetbarang/<?php echo $dt['id_transbarang']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
	  <?php endif;?>
	  
	  <section class="content-header">
		<h4>
          <b>DATA RINCIAN BARANG</b>
		 <br>FORMULIR L.02
        </h4>
		</section>
		
	 <?php 
		//if($this->session->userdata('koderole')=='1'):
		$koderole=($this->session->userdata('koderole'));
		if($koderole=='1' OR $koderole=='5' OR $koderole=='10'):
	 ?> 
	 
		 <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
			<div class="box box-primary">
              <div class='box-header with-border'>
				<button data-toggle="modal" data-target="#myModal3" class="btn btn-success"><span class="fa fa-thumb-tack"></span> CETAK FORMULIR L.02</button>
				</div>

				<div class="box-body table-responsive">
                 <table id="datatables5" class="table table-bordered table-striped">
                  <thead>
                    <tr style="vertical-align:middle;text-align:center">
                      <th style="vertical-align:middle;text-align:center">NO</th>
                      <th width="150" style="vertical-align:middle;text-align:center">NAMA DEPT</th>
                      <th width="50" style="vertical-align:middle;text-align:center">No. Formulir</th>
                      <th width="150" style="vertical-align:middle;text-align:center">NAMA BARANG</th>
                      <th width="100" style="vertical-align:middle;text-align:center">JUMLAH UNIT / SATUAN</th>
                      <th width="150" style="vertical-align:middle;text-align:center">PENGAJUAN BARANG BARU / PENGGANTIAN BARANG LAMA</th>
                      <th width="150" style="vertical-align:middle;text-align:center">UNTUK RUANGAN / INSTALASI</th>
                      <th style="vertical-align:middle;text-align:center">HARGA UNIT</th>
                      <th style="vertical-align:middle;text-align:center">TOTAL</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($detbrgnew as $dt) { $no++ ?>
                    <tr>
                      <td style="vertical-align:middle;text-align:center"><?php echo $no; ?></td>
                      <td style="vertical-align:middle;text-align:left"><?php echo $dt['namadepartemen']; ?></td>
                      <td style="vertical-align:middle;text-align:left"><?php echo $dt['no_formulir']; ?></td>
                      <td style="vertical-align:middle"><?php echo $dt['nama_barang']; ?></td>
                      <td style="vertical-align:middle;text-align:center"><?php echo number_format ($dt['jumlah'], 0, ".", "."); ?> Unit</td>
					  <td style="vertical-align:middle"><?php echo $dt['kondisi_barang']; ?></td>
					  <td style="vertical-align:middle"><?php echo $dt['instalasi']; ?></td>
                      <td style="vertical-align:middle">Rp. <?php echo number_format ($dt['harga'], 0, ".", "."); ?></td>
                      <td style="vertical-align:middle">Rp. <?php echo number_format ($dt['grand_total'], 0, ".", "."); ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
         </div><!-- /.row -->
		</section>  
  	  <?php endif;?>
	   
	 <?php 
		$koderole=($this->session->userdata('koderole'));
		if($koderole!='1' && $koderole!='5' && $koderole!='10'):
	 ?> 
  		 <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
			<div class="box box-primary">
              <div class='box-header with-border'>
				<button data-toggle="modal" data-target="#myModal3" class="btn btn-success"><span class="fa fa-thumb-tack"></span> CETAK FORMULIR L.02</button>
				</div>

				<div class="box-body table-responsive">
                 <table id="datatables4" class="table table-bordered table-striped">
                  <thead>
                    <tr style="vertical-align:middle;text-align:center">
                      <th style="vertical-align:middle;text-align:center">NO</th>
                      <th width="150" style="vertical-align:middle;text-align:center">NAMA DEPT</th>
                      <th width="50" style="vertical-align:middle;text-align:center">No. Formulir</th>
                      <th width="150" style="vertical-align:middle;text-align:center">NAMA BARANG</th>
                      <th width="100" style="vertical-align:middle;text-align:center">JUMLAH UNIT / SATUAN</th>
                      <th width="150" style="vertical-align:middle;text-align:center">PENGAJUAN BARANG BARU / PENGGANTIAN BARANG LAMA</th>
                      <th width="150" style="vertical-align:middle;text-align:center">UNTUK RUANGAN / INSTALASI</th>
                      <th style="vertical-align:middle;text-align:center">HARGA UNIT</th>
                      <th style="vertical-align:middle;text-align:center">TOTAL</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_detbarang as $dt) { $no++ ?>
                    <tr>
                      <td style="vertical-align:middle;text-align:center"><?php echo $no; ?></td>
                      <td style="vertical-align:middle;text-align:left"><?php echo $dt['namadepartemen']; ?></td>
                      <td style="vertical-align:middle;text-align:left"><?php echo $dt['no_formulir']; ?></td>
                      <td style="vertical-align:middle"><?php echo $dt['nama_barang']; ?></td>
                      <td style="vertical-align:middle;text-align:center"><?php echo number_format ($dt['jumlah'], 0, ".", "."); ?> Unit</td>
					  <td style="vertical-align:middle"><?php echo $dt['kondisi_barang']; ?></td>
					  <td style="vertical-align:middle"><?php echo $dt['instalasi']; ?></td>
                      <td style="vertical-align:middle">Rp. <?php echo number_format ($dt['harga'], 0, ".", "."); ?></td>
                      <td style="vertical-align:middle">Rp. <?php echo number_format ($dt['grand_total'], 0, ".", "."); ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
         </div><!-- /.row -->
		</section> 
		<?php endif;?>
		
  <!-- modal -->
     <div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
  <div class="panel panel-primary">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">CETAK FORMULIR PERSETUJUAN</h4></td>
      </div>
        <div class="modal-body">

<form action="<?php echo base_url(); ?>LaporanDetailBarang/cetak_gabung" target='blank' method="POST">
        <div class="form-group"> 
		<label type="hidden" for="">Pilih Nama Departemen (No.Formulir) :</label>
		  
		  <select name="id_formulir" class="form-control">
                          <option value='0'>--Pilih Nama Departemen (No.Formulir) :--</option>
                            <?php foreach($formulir as $datakd) {
                          if(!in_array($datakd['id_formulir'],$idfor_post)){ ?>
                              <option  value="<?php echo $datakd['id_formulir'] ?>">
							<?php echo $datakd['namadepartemen']?> :  ( <?php echo $datakd['no_formulir'] ?> ) </option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datakd['id_formulir'] ?>">
							 <?php echo $datakd['namadepartemen']?> : ( <?php echo $datakd['no_formulir'] ?> ) </option>
                          <?php }} ?>
						  
						  
                        </select> 
        </div>
          
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          <input type="submit" class="btn btn-primary" value="CETAK">
        </div>
                </fieldset>
                </form>   
                </div></div></div></div></div>                       
  <!-- end modal -->
  
  <!-- modal 
     <div id="myModal2" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
  <div class="panel panel-primary">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">CETAK FORMULIR PERSETUJUAN</h4></td>
      </div>
        <div class="modal-body">

<form action="<?php echo base_url(); ?>LaporanDetailBarang/cetak_gabung" method="POST">
        <div class="form-group"> 
		<label type="hidden" for="">No. FORMULIR :</label>
		  
		  <select name="id_formulir" class="form-control">
                          <option value='0'>--Pilih No. FORMULIR--</option>
                            <?php foreach($formulir as $datakd) {
                          if(!in_array($datakd['id_formulir'],$idfor_post)){ ?>
                              <option  value="<?php echo $datakd['id_formulir'] ?>"><?php echo $datakd['no_formulir'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datakd['id_formulir'] ?>"><?php echo $datakd['no_formulir'] ?></option>
                          <?php }} ?>
						  
						  
                        </select> 
        </div>
          
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          <input type="submit" class="btn btn-primary" value="CETAK">
        </div>
                </fieldset>
                </form>   
                </div></div></div></div></div>                       
  end modal -->
  
<!-- modal -->
     <div id="myModal3" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
  <div class="panel panel-primary">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">CETAK FORMULIR L.02</h4></td>
      </div>
        <div class="modal-body">

<form action="<?php echo base_url(); ?>LaporanBarang/cetak_rincian" target='blank' method="POST">
        <div class="form-group"> 
		<label type="hidden" for="">No. FORMULIR :</label>
		  
		  		  <select name="id_formulir" class="form-control">
                          <option value='0'>--Pilih Nama Departemen (No.Formulir) :--</option>
                            <?php foreach($optformulir as $datakd) {
                          if(!in_array($datakd['id_formulir'],$idfor_post)){ ?>
                              <option  value="<?php echo $datakd['id_formulir'] ?>">
							<?php echo $datakd['namadepartemen']?> :  ( <?php echo $datakd['no_formulir'] ?> ) </option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datakd['id_formulir'] ?>">
							 <?php echo $datakd['namadepartemen']?> : ( <?php echo $datakd['no_formulir'] ?> ) </option>
                          <?php }} ?>
						  
						  
                        </select>
        </div>
          
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          <input type="submit" class="btn btn-primary" value="CETAK">
        </div>
                </fieldset>
                </form>   
                </div></div></div></div></div>                       
  <!-- end modal -->  

    <!-- modal -->
      <div id="myModal1" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
	<div class="panel panel-primary">
	     <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">TAMPIL</h4></td>
      </div>
	      <div class="modal-body">

<form action="<?php echo base_url(); ?>detailbarang" method="POST">
        <div class="form-group"> 
             Departemen :<br>
         <select name="id_departemen" class="form-control">
       <option value='0'> Pilih Departemen : </option>
	   <?php foreach($namadept as $dt) { ?>
            <option value=<?php echo $dt['id_departemen'] ; ?>>
             <?php echo $dt['namadepartemen']?></option>
            <?php  } ?>
          </select>
        </div>
          
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          <input type="submit" class="btn btn-primary" value="VIEW">
        </div>
                </fieldset>
                </form>   
                </div></div></div></div></div>                           
  <!-- end modal --> 
  
    <!-- modal new -->
     <div id="myModalnew" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
  <div class="panel panel-primary">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">CETAK FORMULIR PERSETUJUAN</h4></td>
      </div>
        <div class="modal-body">

<form action="<?php echo base_url(); ?>LaporanDetailBarang/cetak_gabung" target='blank' method="POST">
        <div class="form-group"> 
		<label type="hidden" for="">Pilih Nama Departemen (No.Formulir) :</label>
		  
		  <select name="id_formulir" class="form-control">
                          <option value='0'>--Pilih Nama Departemen (No.Formulir) :--</option>
                            <?php foreach($optformulir as $datakd) {
                          if(!in_array($datakd['id_formulir'],$idfor_post)){ ?>
                              <option  value="<?php echo $datakd['id_formulir'] ?>">
							<?php echo $datakd['namadepartemen']?> :  ( <?php echo $datakd['no_formulir'] ?> ) </option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datakd['id_formulir'] ?>">
							 <?php echo $datakd['namadepartemen']?> : ( <?php echo $datakd['no_formulir'] ?> ) </option>
                          <?php }} ?>
						  
						  
                        </select> 
        </div>
          
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          <input type="submit" class="btn btn-primary" value="CETAK">
        </div>
                </fieldset>
                </form>   
                </div></div></div></div></div>                       
  <!-- end modal -->
  
      <!-- modal 
      <div id="myModalsurat" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
	<div class="panel panel-primary">
	     <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">TAMPIL</h4></td>
      </div>
	      <div class="modal-body">

<form action="<?php echo base_url(); ?>detailbarang" method="POST">
        <div class="form-group"> 
             Departemen :<br>
         <select name="id_formulir" class="form-control">
       <option value='0'> Pilih Departemen : </option>
	   <?php foreach($idsuratdept as $dt) { ?>
            <option value=<?php echo $dt['id_formulir'] ; ?>>
             <?php echo $dt['namadepartemen']?></option>
            <?php  } ?>
          </select>
        </div>
          
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          <input type="submit" class="btn btn-primary" value="VIEW">
        </div>
                </fieldset>
                </form>   
                </div></div></div></div></div>                           
end modal --> 