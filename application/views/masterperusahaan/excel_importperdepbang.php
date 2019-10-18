<!DOCTYPE html>
<html>
<head>
	<title>IMPORT DATA PERUSAHAAN DEPBANG</title>
	
</head>

<body>
	<div class="container">
		<div class="box">
		<br />
		<h3 align="center">IMPORT DATA PERUSAHAAN DEPBANG</h3><br><br>
		<form method="post" id="import_formperdepbang" enctype="multipart/form-data">
			<a style="margin-bottom:3px; margin-left: 5px" href="<?php echo base_url("download/perusahaan_depbang.xlsx");?>" 
			  class="btn btn-info no-radius dropdown-toggle"><i class="glyphicon glyphicon-floppy-save"></i> DOWNLOAD FORMAT UPLOAD </a>
                           <a style="margin-bottom:3px; " class="btn btn-success no-radius " data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i> PETUNJUK IMPORT DATA </a>
			  <p style="color: red;">*download format excel jika belum ada</p>
			  
			  <br>
			  <br>

			<p align="center"><label>Select Excel File</label>
				
			<input type="file" name="file" id="file" class="btn btn-default no-radius dropdown-toggle" required accept=".xls, .xlsx, .csv, .ods" /></p>
			<p align="center" style="color: red;">Format .xls .xlsx .ods
			<br />
			<div align="center">
			<input type="submit" name="import" value="Import" class="btn btn-warning no-radius dropdown-toggle" />
			 <a href="<?php echo base_url("masterperusahaan/dataperusahaan_depbang"); ?>"></i> Kembali </a></p> </div>
		</form>
		<br />
		<div class="table-responsive" id="perdepbang_data">
			</div>
		</div>
	</div>
</body>
</html>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel"><b>Cara Pengisian Format Excel / Import Data</b></h4>
	      </div>
	      <div class="modal-body">
		  1. Jika belum memiliki format file excel terlebih dahulu download file template yang sudah terformat pilih tombol <b>"DOWNLOAD FORMAT UPLOAD"</b>
		  <br>
		  2. Kemudian isi sesuai dengan format template yang sudah disediakan
		  <br>
		  3. Untuk pengisian kolom foi dan mou gunakan angka 1 jika kolom tersebut yang dipilih dan isikan angka 0 jika tidak dipilih
		  <br>
		  4. Pastikan semua kolom terisi data agar tidak terjadi <b style="color: red;">ERROR</b> pada saat Upload data
		  <br>
		  5. Pengisian tipe produk :
		  <br>
		  - TP001 = OBAT 
		  <br>
		  - TP002 = depbang
		  <br>
		  - TP003 = ALKES
		  <br>
		  - TP004 = DEPBANG
		  <br>
		  <br>
	      	<center>	
	        	 <img src="<?php echo base_url('assets/img/petunjuk_depbang2.JPG'); ?>" alt="Hermina Hospital" class="img-responsive" >
	        </center>
			**) Pastikan file excel yang terupload dalam bentuk ekstensi <b>.xlsx</b>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>	
	      </div>
	    </div>
	  </div>
	</div>


