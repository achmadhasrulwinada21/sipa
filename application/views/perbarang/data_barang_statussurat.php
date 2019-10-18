        <section class="content-header">
		<h4>
          <b>DATA SURAT DAN FORMULIR</b>
		 <br> FORMULIR PERSETUJUAN DIREKSI GROUP
		 <br> ATAS PERMINTAAN ALAT KESEHATAN / ALAT UMUM INVESTASI
        </h4>
        </section>

<style type="text/css">

th{
    border:0px solid black;
	font-weight: bold;
	color:#000000;
    }
	
td{
    border:0px solid black;
    }
	
	.col3{
		color:#000000;
        position: absolute;
        width: 1.5em;
		height: 4em;
        left: 1.5em;
        top: 9em;
    }
    .col4{
		color:#000000;
        position: absolute;
        width: 10em;
		height: 4em;
        left: 4em;
        top: 9em;
    }
	
	.col5{
		color:#000000;
        position: absolute;
        width: 14.5em;
		height: 4em;
        left: 15em;
         top: 9em;
    }

	    .col1{
		background-color: #E6E6FA;
        position: absolute;
        width: 1.5em;
		height: 4em;
        left: 1.5em;
        top: auto;
		font-weight: bold;
		color:#000000;
		text-align:center;
    }
    .col2{
		background-color: #E6E6FA;
        position: absolute;
        width: 10em;
		height: 4em;
        left: 4em;
        top: auto;
		font-weight: bold;
		color:#000000;
    }
	
	.col6{
		background-color: #E6E6FA;
        position: absolute;
        width: 14.5em;
		height: 4em;
        left: 15em;
        top: auto;
		font-weight: bold;
		color:#000000;
    }
	
</style>

	<span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
	<span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?>
			
	<?php 
	 //if($this->session->userdata('koderole')=='1'):
		$koderole=($this->session->userdata('koderole'));
		if($koderole=='1' OR $koderole=='5' OR $koderole=='14' OR $koderole=='25' OR $koderole=='27' OR $koderole=='35' OR $koderole=='15' OR $koderole=='26' OR $koderole=='17' OR $koderole=='28' OR $koderole=='29' OR $koderole=='10'):
	 ?> 
	 
        <!-- Main content -->
        <section class="content">
	
	<!--MENU ATAS-->	
	<div class="row">
	<div class="col-md-12 clearfix">
		<ul id="example-tabs" class="nav nav-tabs" style="border-width:5px" data-toggle="tabs">
			<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>perbarang"><span class="glyphicon glyphicon-envelope"></span> Form Surat</a></li>
			
			<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>detailbarang"><span class="glyphicon glyphicon-tasks"></span> Detail Barang</a></li>
			
			<!--<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>perbarang/disetujui">Status (Disetujui)</a></li>
			
			<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>perbarang/ditolak">Status (Ditolak)</a></li>-->
			
			<li class="active" style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
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
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>perbarang/disetujui" class="btn btn-success"><i class="glyphicon glyphicon-ok-circle"></i> Disetujui </a>
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>perbarang/ditolak" class="btn btn-danger"><i class="glyphicon glyphicon-remove-circle"></i> Ditolak </a>
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>perbarang/revisi" class="btn btn-primary"><i class="glyphicon glyphicon-refresh"></i> Revisi </a>
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>perbarang/allstatus" class="btn btn-info"><i class="glyphicon glyphicon-retweet"></i> All Status </a>
              <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>perbarang/addbarang" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH </a>-->
                <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>DataDepartemen_Pdf" target='blank' class="btn btn-success"><i class="fa fa-thumb-tack"></i> PRINT </a>  -->
				<!--<button data-toggle="modal" data-target="#myModal" class="btn btn-danger"> <span class="fa fa-thumb-tack"></span> CETAK SURAT</button> -->
				<!--<button data-toggle="modal" data-target="#myModal1" class="btn btn-success"><span class="fa fa-thumb-tack"></span> VIEW BY DEPT.</button>-->
		      </div>
			  	
				<div class="box-body table-responsive">
                 <table id="tb-datatables3" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                      <!-- <th>no</th>-->

                      <th width="30" style="vertical-align:middle;text-align:center;color:white;">................................................................................................</th>
                      <th class="col3" style="vertical-align:middle;text-align:center;background-color:#D3D3D3;" width="30">No.</th>
                      <th class="col4" style="vertical-align:middle;text-align:center;background-color:#D3D3D3;" width="150">DEPARTEMEN</th>
                      <th class="col5" style="vertical-align:middle;text-align:center;background-color:#D3D3D3;" width="150">No.FORMULIR</th>
                      <th style="vertical-align:middle;text-align:center" width="150">RSIA / RS</th>
                      <th style="vertical-align:middle;text-align:center" width="50">TANGGAL</th>
                      <th style="vertical-align:middle;text-align:center" width="80">STATUS</th>
					  <th style="vertical-align:middle;text-align:center" width="80">PEMOHON</th>
                      <th style="vertical-align:middle;text-align:center" width="100">MENGETAHUI</th>
					  <th style="vertical-align:middle;text-align:center" width="100">MENYETUJUI</th>
					  <th style="vertical-align:middle;text-align:center" width="100">CATATAN MANAGER/KA.DEPT</th>
                      <th style="vertical-align:middle;text-align:center" width="100">CATATAN DIREKTUR</th>
                      <th style="vertical-align:middle;text-align:center" width="50">LIHAT</th>
					  <th style="vertical-align:middle;text-align:center" width="50">DOWNLOAD LAMPIRAN</th>
					  <th style="vertical-align:middle;text-align:center" width="50">PRINT</th>
                      <th style="vertical-align:middle;text-align:center" width="50">EDIT</th>
                      <th style="vertical-align:middle;text-align:center" width="50">HAPUS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($barangnewid as $dt) { $no++ ?>
                    <tr>
                      <td width="470" style="vertical-align:middle;text-align:center;color:white;">................................................................................................</td>
                      <td class="col1" style="vertical-align:middle;text-align:center;" width="30"><?php echo $no; ?></td>
                      <td class="col2" style="vertical-align:middle;text-align:left;" width="150"><?php echo $dt['namadepartemen']; ?></td>
					  <td class="col6" style="vertical-align:middle;text-align:left;" width="150">
					  <!--  <a data-toggle="modal" data-target="#modal_lihat<?php //echo $dt['id_formulir'];?>">-->
					  <?php echo $dt['no_formulir']; ?>
					  
					  </td>

                      <td style="vertical-align:middle;text-align:left" width="150"><?php echo $dt['koders']; ?></td>
                      <td style="vertical-align:middle;text-align:center" width="50"><?php echo $dt['tanggal']; ?></td>
					  <td style="vertical-align:middle;text-align:center" width="80">
						<?php 
						if($dt['mengetahuidirekturcheck'] == "Approve_dir") {
							echo '<p style="background-color:green;color:white;"><b>Disetujui Direktur</b></p>';
						}elseif($dt['mengetahuidirekturcheck'] == "Not_Approved_dir"){
							echo '<p style="background-color:red;color:white;"><b>Ditolak Direktur</b></p>';
						}elseif($dt['mengetahuidirekturcheck'] == "Revisi_dir"){
							echo '<p style="background-color:blue;color:white;"><b>Revisi Direktur</b></p>';
						}elseif($dt['mengetahuidirekturcheck'] == "Approve_mk"){
							echo '<p style="background-color:green;color:white;"><b>Disetujui Manager/Kadep</b></p>';
						}elseif($dt['mengetahuidirekturcheck'] == "Not_Approved_mk"){
							echo '<p style="background-color:red;color:white;"><b>Ditolak Manager/Kadep</b></p>';
						}elseif($dt['mengetahuidirekturcheck'] == "Revisi_mk"){
							echo '<p style="background-color:blue;color:white;"><b>Revisi Manager/Kadep</b></p>';
						}else{
							echo '<p style="background-color:gold;color:black;"><b>Menunggu</b></p>';
						}
						?>
					  </td>
					  <td style="vertical-align:middle;text-align:left" width="80"><?php echo $dt['mengajukan']; ?></td>
					  <td style="vertical-align:middle;text-align:left" width="100"><?php echo $dt['mengetahui']; ?></td>
					  <td style="vertical-align:middle;text-align:left" width="100"><?php echo $dt['menyetujui']; ?></td>
					  <td style="vertical-align:middle;text-align:left" width="100"><?php echo $dt['catatan_direk']; ?></td>
					  <td style="vertical-align:middle;text-align:left" width="100"><?php echo $dt['catatan_menyetujui']; ?></td>
                      <td style="vertical-align:middle;text-align:center" width="50">
					  <a a class="btn btn-primary btn-md" title="Lihat" data-toggle="modal" data-target="#modal_edit<?php echo $dt['id_formulir'];?>"><i class="glyphicon glyphicon-eye-open"></i></a>	
                      </td>
					 <!-- DOWNLOAD-->
					  <td style="text-align: center; vertical-align:middle;" width="50">
                      <a class="btn btn-info btn-md" title="Download Lampiran" href="<?php echo base_url(); ?>assets/upload/<?php echo $dt['attachment']; ?>" download="<?php echo $dt['attachment']; ?>"><i class="glyphicon glyphicon-download"></i></a>
                      </td>
					  <!-- PRINT-->
					  <td style="text-align: center;vertical-align: middle;">
                      <a target="blank" class="btn btn-success btn-md" title="PRINT" href="<?php echo base_url(); ?>LaporanFormulir/cetak_formulir_surat/<?php echo $dt['id_formulir']; ?>"><i class="glyphicon glyphicon-print"></i></a>
					  </td>
					  <td style="vertical-align:middle;text-align:center" width="50">
					  <a class="btn btn-warning btn-md" title="Edit" href="<?php echo base_url(); ?>perbarang/editbarang/<?php echo $dt['id_formulir']; ?>"><i class="fa fa-pencil"></i></a>
					  </td>
					  <td style="vertical-align:middle;text-align:center" width="50">
                      <a onclick="return confirm('Yakin Akan Hapus Data??');" title="Hapus"  class="btn btn-danger btn-md" href="<?php echo base_url(); ?>perbarang/hapusbarang/<?php echo $dt['id_formulir']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
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
		if($koderole!='1' && $koderole!='5' && $koderole!='14' && $koderole!='25' && $koderole!='27' && $koderole!='35' && $koderole!='15' && $koderole!='26' && $koderole!='17' && $koderole!='28' && $koderole!='29' && $koderole!='10'):
	 ?> 
	 
        <!-- Main content -->
                <!-- Main content -->
        <section class="content">
	
	<!--MENU ATAS-->	
	<div class="row">
	<div class="col-md-12 clearfix">
		<ul id="example-tabs" class="nav nav-tabs" style="border-width:5px" data-toggle="tabs">
			<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>perbarang"><span class="glyphicon glyphicon-envelope"></span> Form Surat</a></li>
			
			<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>detailbarang"><span class="glyphicon glyphicon-tasks"></span> Detail Barang</a></li>
			
			<!--<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>perbarang/disetujui">Status (Disetujui)</a></li>
			
			<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>perbarang/ditolak">Status (Ditolak)</a></li>-->
			
			<li class="active" style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
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
			  <a style="margin-bottom:3px" href="<?php echo base_url(); ?>perbarang/disetujui" class="btn btn-success"><i class="glyphicon glyphicon-ok-circle"></i> Disetujui </a>
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>perbarang/ditolak" class="btn btn-danger"><i class="glyphicon glyphicon-remove-circle"></i> Ditolak </a>
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>perbarang/revisi" class="btn btn-primary"><i class="glyphicon glyphicon-refresh"></i> Revisi </a>
			  <a style="margin-bottom:3px" href="<?php echo base_url(); ?>perbarang/allstatus" class="btn btn-info"><i class="glyphicon glyphicon-retweet"></i> All Status </a>
              <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>perbarang/addbarang" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH </a>-->
                <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>DataDepartemen_Pdf" target='blank' class="btn btn-success"><i class="fa fa-thumb-tack"></i> PRINT </a>  -->
				<!--<button data-toggle="modal" data-target="#myModal" class="btn btn-danger"> <span class="fa fa-thumb-tack"></span> CETAK SURAT</button> -->
				<!--<button data-toggle="modal" data-target="#myModal1" class="btn btn-success"><span class="fa fa-thumb-tack"></span> VIEW BY DEPT.</button>-->
		      </div>
	
				<div class="box-body table-responsive">
                 <table id="tb-datatables3" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                      <!-- <th>no</th>-->

                      <th width="30" style="vertical-align:middle;text-align:center;color:white;">................................................................................................</th>
                      <th class="col3" style="vertical-align:middle;text-align:center;background-color:#D3D3D3;" width="30">No.</th>
                      <th class="col4" style="vertical-align:middle;text-align:center;background-color:#D3D3D3;" width="150">DEPARTEMEN</th>
                      <th class="col5" style="vertical-align:middle;text-align:center;background-color:#D3D3D3;" width="150">No.FORMULIR</th>
                      <th style="vertical-align:middle;text-align:center" width="150">RSIA / RS</th>
                      <th style="vertical-align:middle;text-align:center" width="50">TANGGAL</th>
                      <th style="vertical-align:middle;text-align:center" width="80">STATUS</th>
					  <th style="vertical-align:middle;text-align:center" width="80">PEMOHON</th>
                      <th style="vertical-align:middle;text-align:center" width="100">MENGETAHUI</th>
					  <th style="vertical-align:middle;text-align:center" width="100">MENYETUJUI</th>
					  <th style="vertical-align:middle;text-align:center" width="100">CATATAN MANAGER/KA.DEPT</th>
                      <th style="vertical-align:middle;text-align:center" width="100">CATATAN DIREKTUR</th>
                      <th style="vertical-align:middle;text-align:center" width="50">LIHAT</th>
					  <th style="vertical-align:middle;text-align:center" width="50">DOWNLOAD LAMPIRAN</th>
					  <th style="vertical-align:middle;text-align:center" width="50">PRINT</th>
                      <th style="vertical-align:middle;text-align:center" width="50">EDIT</th>
                      <th style="vertical-align:middle;text-align:center" width="50">HAPUS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_barang as $dt) { $no++ ?>
                    <tr>
                      <td width="470" style="vertical-align:middle;text-align:center;color:white;">................................................................................................</td>
                      <td class="col1" style="vertical-align:middle;text-align:center;" width="30"><?php echo $no; ?></td>
                      <td class="col2" style="vertical-align:middle;text-align:left;" width="150"><?php echo $dt['namadepartemen']; ?></td>
					  <td class="col6" style="vertical-align:middle;text-align:left;" width="150">
					  <!--  <a data-toggle="modal" data-target="#modal_lihat<?php //echo $dt['id_formulir'];?>">-->
					  <?php echo $dt['no_formulir']; ?>
					  
					  </td>

                      <td style="vertical-align:middle;text-align:left" width="150"><?php echo $dt['koders']; ?></td>
                      <td style="vertical-align:middle;text-align:center" width="50"><?php echo $dt['tanggal']; ?></td>
					  <td style="vertical-align:middle;text-align:center" width="80">
						<?php 
						if($dt['mengetahuidirekturcheck'] == "Approve_dir") {
							echo '<p style="background-color:green;color:white;"><b>Disetujui Direktur</b></p>';
						}elseif($dt['mengetahuidirekturcheck'] == "Not_Approved_dir"){
							echo '<p style="background-color:red;color:white;"><b>Ditolak Direktur</b></p>';
						}elseif($dt['mengetahuidirekturcheck'] == "Revisi_dir"){
							echo '<p style="background-color:blue;color:white;"><b>Revisi Direktur</b></p>';
						}elseif($dt['mengetahuidirekturcheck'] == "Approve_mk"){
							echo '<p style="background-color:green;color:white;"><b>Disetujui Manager/Kadep</b></p>';
						}elseif($dt['mengetahuidirekturcheck'] == "Not_Approved_mk"){
							echo '<p style="background-color:red;color:white;"><b>Ditolak Manager/Kadep</b></p>';
						}elseif($dt['mengetahuidirekturcheck'] == "Revisi_mk"){
							echo '<p style="background-color:blue;color:white;"><b>Revisi Manager/Kadep</b></p>';
						}else{
							echo '<p style="background-color:gold;color:black;"><b>Menunggu</b></p>';
						}
						?>
					  </td>
					  <td style="vertical-align:middle;text-align:left" width="80"><?php echo $dt['mengajukan']; ?></td>
					  <td style="vertical-align:middle;text-align:left" width="100"><?php echo $dt['mengetahui']; ?></td>
					  <td style="vertical-align:middle;text-align:left" width="100"><?php echo $dt['menyetujui']; ?></td>
					  <td style="vertical-align:middle;text-align:left" width="100"><?php echo $dt['catatan_direk']; ?></td>
					  <td style="vertical-align:middle;text-align:left" width="100"><?php echo $dt['catatan_menyetujui']; ?></td>
                      <td style="vertical-align:middle;text-align:center" width="50">
					  <a a class="btn btn-primary btn-md" title="Lihat" data-toggle="modal" data-target="#modal_edit<?php echo $dt['id_formulir'];?>"><i class="glyphicon glyphicon-eye-open"></i></a>	
                      </td>
					 <!-- DOWNLOAD-->
					  <td style="text-align: center; vertical-align:middle;" width="50">
                      <a class="btn btn-info btn-md" title="Download Lampiran" href="<?php echo base_url(); ?>assets/upload/<?php echo $dt['attachment']; ?>" download="<?php echo $dt['attachment']; ?>"><i class="glyphicon glyphicon-download"></i></a>
                      </td>
					  <!-- PRINT-->
					  <td style="text-align: center;vertical-align: middle;">
                      <a target="blank" class="btn btn-success btn-md" title="PRINT" href="<?php echo base_url(); ?>LaporanFormulir/cetak_formulir_surat/<?php echo $dt['id_formulir']; ?>"><i class="glyphicon glyphicon-print"></i></a>
					  </td>
					  <td style="vertical-align:middle;text-align:center" width="50">
					  <a class="btn btn-warning btn-md" title="Edit" href="<?php echo base_url(); ?>perbarang/editbarang/<?php echo $dt['id_formulir']; ?>"><i class="fa fa-pencil"></i></a>
					  </td>
					  <td style="vertical-align:middle;text-align:center" width="50">
                      <a onclick="return confirm('Yakin Akan Hapus Data??');" title="Hapus"  class="btn btn-danger btn-md" href="<?php echo base_url(); ?>perbarang/hapusbarang/<?php echo $dt['id_formulir']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
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
		  
  <!-- page script -->

    <!-- modal print -->
     <div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
  <div class="panel panel-primary">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <!--<h4 class="modal-title">CETAK SURAT</h4></td> -->
      </div>
        <div class="modal-body">

<form action="<?php echo base_url(); ?>LaporanFormulir/cetak_formulir_surat" target='blank' method="POST">
        <div class="form-group"> 
             Pilih Nama Departemen (No.Formulir) :<br>
         <select name="no_formulir" class="form-control">
       <option value='0'>--Pilih Nama Departemen (No.Formulir) : --</option>
     <?php foreach($no_barang as $nb) { ?>
            <option value=<?php echo $nb['no_formulir'] ; ?>>
             <?php echo $nb['namadepartemen']?> : ( <?php echo $nb['no_formulir']?> )</option>
            <?php  } ?>
          </select>
        </div>
          
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          <input type="submit" class="btn btn-primary" value="CETAK">
        </div>
                </fieldset>
                </form>   
                </div></div></div></div></div>                       
  <!-- end modal print -->
  

			  
<!-- MODAL EDIT -->
                <?php
        foreach($data_getbarang as $i){
        $id_formulir = $i['id_formulir'];
        $no_formulir = $i['no_formulir'];
        $namadepartemen = $i['namadepartemen'];
        $tanggal = $i['tanggal'];
        $perihal = $i['perihal'];
        $lampiran = $i['lampiran'];
        $pembuka = $i['pembuka'];
        $isi = $i['isi'];
        $penutup = $i['penutup'];
        $no_formulir = $i['no_formulir'];
        $koders = $i['koders'];
		$supplier = $i['supplier'];
        $alamat = $i['alamat'];
		$no_telp = $i['no_telp'];
        $fax = $i['fax'];
        $email = $i['email'];
		$cp = $i['cp'];
		$no_hp = $i['no_hp'];
        $koders = $i['koders'];
        $mengetahuidirekturcheck = $i['mengetahuidirekturcheck'];
        $catatan_direk = $i['catatan_direk'];
        $catatan_menyetujui = $i['catatan_menyetujui'];
		$catatan = $i['catatan'];
        $mengajukan = $i['mengajukan'];
        $mengetahui = $i['mengetahui'];
        $menyetujui = $i['menyetujui'];
		?>
<div id="modal_edit<?php echo $id_formulir;?>" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
	  <div class="panel panel-primary">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">DETAIL SURAT</h4></td>
      </div>
        <div class="modal-body">
                  <div class="col-md-6">

				  		<table border="0">
						<thead>
							<tr>
								<th style="vertical-align:top;text-align:left">-</th>
								<th style="vertical-align:top;text-align:left" width="130">Departemen</th>
								<th style="vertical-align:top;text-align:left"> : </th>
								<th style="vertical-align:top;text-align:left"><?php echo $namadepartemen; ?></th>
							</tr>
							<tr>
								<th style="vertical-align:top;text-align:left">-</th>
								<th style="vertical-align:top;text-align:left" width="130">Tanggal Pengajuan </th>
								<th style="vertical-align:top;text-align:left"> : </th>
								<th style="vertical-align:top;text-align:left"><?php echo $tanggal; ?></th>
							</tr>
						</thead>
						</table>
						<br>
                    <div class="form-group">
						<label for="">-Perihal : </label> <br> <?php echo  $perihal;?>                      
						<br><br>
						<label for="">-Lampiran : </label> <br> <?php echo $lampiran;?>		
						<br><br>
						<label for="">-Pembuka surat :</label> <br> <?php echo $pembuka;?> 
						<br><br>
						<label for="">-Isi Surat : </label> <br> <?php echo $isi;?>   
						<br><br>
						<label for="">-Penutup : </label> <br> <?php echo $penutup;?>
						<br><br>
						<label for="">-Catatan Surat : </label> <br> <?php echo $catatan;?>
                    </div>   						
                  </div>

				<div class="col-md-6">
                    <div class="form-group">
						<table border="0">
						<thead>
							<tr>
								<th style="vertical-align:top;text-align:left">-</th>
								<th style="vertical-align:top;text-align:left" width="170">No. Formulir</th>
								<th style="vertical-align:top;text-align:left" width="10"> : </th>
								<th style="vertical-align:top;text-align:left"><?php echo $no_formulir; ?></th>
							</tr>
							<tr>
								<th style="vertical-align:top;text-align:left">-</th>
								<th style="vertical-align:top;text-align:left" width="170">RSIA / RS yang meminta</th>
								<th style="vertical-align:top;text-align:left" width="10"> : </th>
								<th style="vertical-align:top;text-align:left"><?php echo $koders; ?></th>
							</tr>
							<tr>
								<th style="vertical-align:top;text-align:left">-</th>
								<th style="vertical-align:top;text-align:left" width="170">Supplier</th>
								<th style="vertical-align:top;text-align:left" width="10"> : </th>
								<th style="vertical-align:top;text-align:left"><?php echo $supplier; ?></th>
							</tr>
							<tr>
								<th style="vertical-align:top;text-align:left">-</th>
								<th style="vertical-align:top;text-align:left" width="170">Alamat</th>
								<th style="vertical-align:top;text-align:left" width="10"> : </th>
								<th style="vertical-align:top;text-align:left"><?php echo $alamat; ?></th>
							</tr>
							<tr>
								<th style="vertical-align:top;text-align:left">-</th>
								<th style="vertical-align:top;text-align:left" width="170">Nama Contact Person</th>
								<th style="vertical-align:top;text-align:left" width="10"> : </th>
								<th style="vertical-align:top;text-align:left"><?php echo $cp; ?></th>
							</tr>
							<tr>
								<th style="vertical-align:top;text-align:left">-</th>
								<th style="vertical-align:top;text-align:left" width="170">No.Hp Contact Person</th>
								<th style="vertical-align:top;text-align:left" width="10"> : </th>
								<th style="vertical-align:top;text-align:left"><?php echo $no_hp; ?></th>
							</tr>
							<tr>
								<th style="vertical-align:top;text-align:left">-</th>
								<th style="vertical-align:top;text-align:left" width="170">No. Telp</th>
								<th style="vertical-align:top;text-align:left" width="10"> : </th>
								<th style="vertical-align:top;text-align:left"><?php echo $no_telp; ?></th>
							</tr>
							<tr>
								<th style="vertical-align:top;text-align:left">-</th>
								<th style="vertical-align:top;text-align:left" width="170">FAX</th>
								<th style="vertical-align:top;text-align:left" width="10"> : </th>
								<th style="vertical-align:top;text-align:left"><?php echo $fax; ?></th>
							</tr>
							<tr>
								<th style="vertical-align:top;text-align:left">-</th>
								<th style="vertical-align:top;text-align:left" width="170">Email</th>
								<th style="vertical-align:top;text-align:left" width="10"> : </th>
								<th style="vertical-align:top;text-align:left"><?php echo $email; ?></th>
							</tr>							
						</thead>
						</table>
						<br><br>
						<table border="0">
						<thead>
						
							<tr>
							<th>-</th>
							<th style="color:blue;" width="120">PEMOHON</th>
								<th width="10"> : </th>
								<th><?php echo $mengajukan;?> </th>
							</tr>

							<tr>
							<th>-</th>
							<th style="color:blue;" width="120">MENGETAHUI</th>
								<th width="10"> : </th>
								<th><?php echo $mengetahui;?> </th>
							</tr>
							
							<tr>
							<th>-</th>
							<th style="color:blue;" width="120">MENYETUJUI</th>
								<th width="10"> : </th>
								<th><?php echo $menyetujui;?> </th>
							</tr>
							
							<tr>
								<th>-</th>
								<th style="color:blue;">Status</th>
								<th> : </th>
								<th> 
								<?php if($i['mengetahuidirekturcheck'] == "Approve_dir") {
											echo '<p style="background-color:green;color:white;"><b>Disetujui Direktur</b></p>';
										}elseif($i['mengetahuidirekturcheck'] == "Not_Approved_dir"){
											echo '<p style="background-color:red;color:white;"><b>Ditolak Direktur</b></p>';
										}elseif($i['mengetahuidirekturcheck'] == "Revisi_dir"){
											echo '<p style="background-color:blue;color:white;"><b>Revisi Direktur</b></p>';
										}elseif($i['mengetahuidirekturcheck'] == "Approve_mk"){
											echo '<p style="background-color:green;color:white;"><b>Disetujui Manager/Kadep</b></p>';
										}elseif($i['mengetahuidirekturcheck'] == "Not_Approved_mk"){
											echo '<p style="background-color:red;color:white;"><b>Ditolak Manager/Kadep</b></p>';
										}elseif($i['mengetahuidirekturcheck'] == "Revisi_mk"){
											echo '<p style="background-color:blue;color:white;"><b>Revisi Manager/Kadep</b></p>';
										}else{
											echo '<p style="background-color:gold;color:black;"><b>Menunggu</b></p>';
										}
								?> 
								</th>
							</tr>
							
							<tr></tr>
							
							<tr>
							<th>-</th>
							<th style="color:blue;" width="120">Catatan Manager/Ka.Dept</th>
								<th width="10"> : </th>
								<th><?php echo $catatan_direk;?> </th>
							</tr>
							
							<tr></tr>
							
							<tr>
							<th>-</th>
							<th style="color:blue;" width="120">Catatan Direktur</th>
								<th width="10"> : </th>
								<th><?php echo $catatan_menyetujui;?> </th>
							</tr>
							
							
							
						</thead>
						</table>
					</div>   						
                </div>
				
		</div>			

                <div class="modal-footer">
                  <button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">Kembali</button>
                </div>
	</div>
	</div>

              </div></div></div></div>
			  <?php } ?>
              
              <!-- END MODAL EDIT -->
			  
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

<form action="<?php echo base_url(); ?>perbarang" method="POST">
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
  
  <!-- MODAL LIHAT
                <?php
    //   foreach($lihatdetail as $i){
    //   $id_formulir = $i['id_formulir'];
    //    $id_departemen = $i['id_departemen'];
    //    $namadepartemen = $i['namadepartemen'];
    //    $no_formulir = $i['no_formulir'];
    //    $nama_barang = $i['nama_barang'];
    //    $jumlah = $i['jumlah'];
    //    $kondisi_barang = $i['kondisi_barang'];
    //    $instalasi = $i['instalasi'];
    //    $harga = $i['harga'];
    //    $grand_total = $i['grand_total'];
	//	?>
<div id="modal_lihat<?php// echo $id_formulir;?>" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
	  <div class="panel panel-primary">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">DETAIL BARANG</h4></td>
      </div>
        <div class="modal-body">
            <div class="col-md-6">

			<table id="tb-datatables" class="table table-bordered table-striped">
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
                    <?php // $no=0; foreach($cetak_detail_barang as $i) { $no++ ?>
                    <tr>
                      <td style="vertical-align:middle;text-align:center"><?php //echo $no; ?></td>
                      <td style="vertical-align:middle;text-align:left"><?php //echo $i['namadepartemen']; ?></td>
                      <td style="vertical-align:middle;text-align:left"><?php //echo $i['no_formulir']; ?></td>
                      <td style="vertical-align:middle"><?php //echo $i['nama_barang']; ?></td>
                      <td style="vertical-align:middle;text-align:center"><?php //echo number_format ($i['jumlah'], 0, ".", "."); ?> Unit</td>
					  <td style="vertical-align:middle"><?php// echo $i['kondisi_barang']; ?></td>
					  <td style="vertical-align:middle"><?php //echo $i['instalasi']; ?></td>
                      <td style="vertical-align:middle">Rp. <?php //echo number_format ($i['harga'], 0, ".", "."); ?></td>
                      <td style="vertical-align:middle">Rp. <?php // echo number_format ($i['grand_total'], 0, ".", "."); ?></td>
                    </tr>
                    <?php// } ?>
                  </tbody>
                </table>		

					
            </div>
		</div>			

                <div class="modal-footer">
                  <button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">Kembali</button>
                </div>
	</div>
	</div>

</div></div></div></div>
			  <?php// } ?>
              
 END MODAL LIHAT -->