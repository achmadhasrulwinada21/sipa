<!DOCTYPE html>
<html>
<head>
	<title>IMPORT DATA LOKASI</title>
	
</head>

<body>
	<div class="container">
	
		<br />
		<h3 align="center">IMPORT DATA LOKASI</h3>
		<a style="margin-bottom:3px; margin-left: 5px" href="<?php echo base_url("download/detail_lokasi.xlsx");?>" 
			  class="btn btn-info no-radius dropdown-toggle"><i class="glyphicon glyphicon-floppy-save"></i> DOWNLOAD FORMAT UPLOAD </a>
			 

			  <span style="color: red;">*download format excel jika belum ada</span>
			  <br>
			  <br>
<form method="post" id="import_lokasi21" enctype="multipart/form-data">
			<p align="center"><label>Select Excel File</label>
				
			<input type="file" name="file" id="file" class="btn btn-default no-radius dropdown-toggle" required accept=".xls, .xlsx, .ods" /></p>
			<p align="center" style="color: red;">Format .xls .xlsx .ods
			<br />
			<!-- <input type="text" name="status" id="uul" value="1"/><br> -->
			<div align="center">
			<input type="submit" name="import" value="Import" class="btn btn-warning no-radius dropdown-toggle" />
			 <a href="<?php echo base_url("master_lokasi"); ?>"></i> Kembali </a></p> </div>
		</form>
		<br />
		<div class="table-responsive" id="lokasi_dara">
		</div>
		</div>
	</div>
</body>
</html>


