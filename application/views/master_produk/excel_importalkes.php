<!DOCTYPE html>
<html>
<head>
	<title>IMPORT DATA ALKES</title>
	
</head>

<body>
	<div class="container">
		<div class="box">
		<br />
		<h3 align="center">IMPORT DATA ALKES</h3>
		<form method="post" id="import_formalkes" enctype="multipart/form-data">
			<a style="margin-bottom:3px; margin-left: 5px" href="<?php echo base_url("download/detail_produkalkes.xlsx");?>" 
			  class="btn btn-info no-radius dropdown-toggle"><i class="glyphicon glyphicon-floppy-save"></i> DOWNLOAD FORMAT UPLOAD </a>
			 

			 <a style="margin-bottom:3px; margin-left: 30px" href="<?php echo base_url("download/detail_kodealkes.xlsx");?>" 
			  class="btn btn-success no-radius dropdown-toggle"><i class="glyphicon glyphicon-floppy-save"></i> DOWNLOAD FORMAT KODE </a><br>
			  <span style="color: red;">*download format excel jika belum ada</span>
			  <span style="color: red; margin-left: 20px">*download format kode jika belum ada</span>
			  <br>
			  <br>

			<p align="center"><label>Select Excel File</label>
				
			<input type="file" name="file" id="file" class="btn btn-default no-radius dropdown-toggle" required accept=".xls, .xlsx, .csv, .ods" /></p>
			<p align="center" style="color: red;">Format .xls .xlsx .ods
			<br />
			<div align="center">
			<input type="submit" name="import" value="Import" class="btn btn-warning no-radius dropdown-toggle" />
			 <a href="<?php echo base_url("C_mstproduk/alkes"); ?>"></i> Kembali </a></p> </div>
		</form>
		<br />
		<div class="table-responsive" id="alkes_data">
			</div>
		</div>
	</div>
</body>
</html>


