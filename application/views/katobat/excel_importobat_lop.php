<!DOCTYPE html>
<html>
<head>
	<title>IMPORT DATA</title>
	
</head>

<body>
	<div class="container">
		<div class="box">
		<br />
		<h3 align="center">IMPORT DATA</h3><br><br>
		<form method="post" id="import_formobatcui" enctype="multipart/form-data">
			 <p align="center"><label>Select Excel File</label>
				
			<input type="file" name="file" id="file" class="btn btn-default no-radius dropdown-toggle" required accept=".xls, .xlsx, .ods" /></p>
			<p align="center" style="color: red;">Format .xls .xlsx .ods
			<br />
			<div align="center">
			<input type="submit" name="import" value="Import" class="btn btn-warning no-radius dropdown-toggle" />
			 <a href="<?php echo base_url("obat_reg/addtrfarmasinew"); ?>"></i> Kembali </a></p> </div>
		</form>
		<br />
		<div class="table-responsive" id="obat_excelcui">
			</div>
		</div>
	</div>
</body>
</html>


